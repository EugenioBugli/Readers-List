<?php
    //max username length = 32 -> max aes128CTR length = 44
    //max email length = 320 -> max aes128CTR length = 428
    //sha256 length = 32
    function sha256($string){
        return hash('sha256', $string);
    }
    function encrypt($string, $key){
        $ciphering = "AES-128-CTR";
        $options = 0;
        $encryption_iv = '1234567891011121';
            
        //encrypt
        return openssl_encrypt($string, $ciphering, $key, $options, $encryption_iv);
    }
    function decrypt($string, $key){
        $ciphering = "AES-128-CTR";
        $options = 0;
        $decryption_iv = '1234567891011121';
  
        // decrypt
        return openssl_decrypt ($string, $ciphering, $key, $options, $decryption_iv);
    }

    function signup($name, $surname, $birth, $username, $email, $password){ //returns -1 if an account with the same email already exists
        $dbconn = connect();

        $sql = "select count(email) from users where email='".$email."'";
        $result = pg_query($sql) or die('Error message: ' . pg_last_error());
        if(pg_fetch_row($result)[0] > 0){
            return -1;
        }

        $sql = "select count(username) from users where username='".$username."'";
        $result = pg_query($sql) or die('Error message: ' . pg_last_error());
        if(pg_fetch_row($result)[0] > 0){
            return -2;
        }

        $nID = 0;
        $result = pg_query("select max(id) from users") or die('Error message: ' . pg_last_error());
        if(pg_num_rows($result) > 0){
            $nID = pg_fetch_row($result)[0] + 1;
        }
        $hashPassword = sha256($password);
        $encName = encrypt($name, $password);
        $encSurname = encrypt($surname, $password);
        $encBirth = encrypt($birth, $password);
        $encUsername = $username; //email cannot be crypted because it is key for the database
        $encEmail = $email; //email cannot be crypted so you can recover it
        $sql = "INSERT INTO users (ID, name, surname, birth, username, email, password) VALUES (".$nID.", '".$encName."', '".$encSurname."', '".$encBirth."', '".$encUsername."', '".$encEmail."', '".$hashPassword."')";
        $result = pg_query($sql) or die('Error message: ' . pg_last_error());
        pg_free_result($result);
        pg_close($dbconn);
        return $nID;
    }

    function signin($email, $password){ //returns -1 if an account with the specified email doesn't exist and -2 for wrong password
        $dbconn = connect();

        $sql = "select * from users where email='".$email."'";
        $result = pg_query($sql) or die('Error message: ' . pg_last_error());
        if(pg_num_rows($result) == 0){
            return array("res"=>-1);
        }
        $row = pg_fetch_assoc($result);
        if($row["password"] != sha256($password)){
            return array("res"=>-2);
        }

        $ret = array("res"=>0, "id"=>$row["id"], "name"=>decrypt($row["name"], $password), "surname"=>decrypt($row["surname"], $password), "birth"=>decrypt($row["birth"], $password), "username"=>$row["username"], "email"=>$row["email"]);

        pg_free_result($result);
        pg_close($dbconn);
        return $ret;
    }

    function book_addition($id, $name, $author, $num_pages, $foreign) {
        $sql = "select count(book) from books where book='".$name."' and id='".$id."'";
        $result = pg_query($sql) or die('Error message: ' . pg_last_error());
        if(pg_fetch_row($result)[0] > 0){
            return -1;
        }
        $pag = 0;
        if($foreign == 'on'){
            $sql = "INSERT INTO books (id, book, num_pages, author, current_page, finished, foreign_lang) VALUES ('".$id."', '".$name."', '".$num_pages."', '".$author."', ".$pag.", false, true)";
        }
        else $sql = "INSERT INTO books (id, book, num_pages, author, current_page, finished, foreign_lang) VALUES ('".$id."', '".$name."', '".$num_pages."', '".$author."', ".$pag.", false, false)";
        $result = pg_query($sql) or die('Error message: ' . pg_last_error());
        pg_free_result($result);
        return 1;
    }

    function verify_pwd($id, $password){
        $dbconn = connect();
        $sql = "select count(id) from users where password='".sha256($password)."'";
        $result = pg_query($sql) or die('Error message: ' . pg_last_error());
        if(pg_fetch_row($result)[0] == 0){
            return FALSE; // wrong password
        } else {
            return TRUE; //password ok
        }
        pg_free_result($result);
        pg_close($dbconn);
    }

    function applyChanges($id, $name, $surname, $email, $user, $password){
        if(!verify_pwd($id, $password)){return -1;}
        
        $dbconn = connect();
        $query = "update users set
                    name='".encrypt($name, $password)."',
                    surname='".encrypt($surname, $password)."',
                    email='".$email."',
                    username='".$user."' where id='".$id."' ";
        $query_result = pg_query($query) or die('Error Message: ' . preg_last_error());
        pg_free_result($query_result);
        pg_close($dbconn);
        return 0;
    }

    function changePassword($old, $new){
        if(!verify_pwd($_SESSION["id"], $old)){return -1;}
        
        $dbconn = connect();
        $query = "update users set
                    name='".encrypt($_SESSION["name"], $new)."',
                    surname='".encrypt($_SESSION["surname"], $new)."',
                    birth='".encrypt($_SESSION["birth"], $new)."',
                    password='".sha256($new)."' where id='".$_SESSION["id"]."' ";
        $query_result = pg_query($query) or die('Error Message: ' . preg_last_error());
        pg_free_result($query_result);
        pg_close($dbconn);
        return 0;
    }

    function connect(){
        try {
            $dbconn = pg_connect("host=localhost dbname=ReadersListDB password=postgres user=postgres port=5432");
            return $dbconn;
        } Catch (exception $e) {
            die($e->getMessage());
        }
    }
?>