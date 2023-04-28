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

        $ret = array("res"=>0, "name"=>decrypt($row["name"], $password), "surname"=>decrypt($row["surname"], $password), "birth"=>decrypt($row["birth"], $password), "username"=>$row["username"], "email"=>$row["email"]);

        pg_free_result($result);
        pg_close($dbconn);
        return $ret;
    }

    function connect(){
        try {
            $dbconn = pg_connect("host=localhost dbname=ReaderListDB password=filo200011 user=postgres port=5432");
            return $dbconn;
        } Catch (exception $e) {
            die($e->getMessage());
        }
    }

    //$hash_password = hash('sha256', $password)
    //$crypted_email = 
/*
    $dbconn = connect();
    $sql = "select * from users";
    $result = pg_query($sql) or die('Error message: ' . pg_last_error());
    while ($row = pg_fetch_row($result)) {
        var_dump($row);
        $clear = "aaaaaaaaaafilippoa2000@gmail.com";
        echo("<br>".strlen($clear)."<br>");
        echo(encrypt($clear, hash('sha256', $row[2])));
        echo("<br>".strlen(encrypt($clear, hash('sha256', $row[2]))));
    }

    pg_free_result($result);
    pg_close($dbconn);*/
?>