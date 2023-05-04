<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="./login.css" type="text/css">
    <title>Profile</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel=stylesheet href="fontawesome-free-6.4.0-web/css/all.css">
    <style>
        .change-form {
            position: relative;
            padding: 40px 30px;
            background-color: rgba(46, 43, 43, 0.622); 
            box-shadow: 0 0 10px ;
            border-radius: 20px;
            text-align: center;
        }

        .change-field {
            position: relative;
            height: 90px;
        }
        .change-field input{
            position: relative;
            color: blanchedalmond;
            height: 40px;
            width: 350px;
            font-size: 16px;
            border: none;
            outline: none;
            transition: all 0.2s ease;
            border-bottom: 2px solid blanchedalmond;
            border-top: 2px solid transparent;
        }
        .change-field ::placeholder{
            color: blanchedalmond;
        }
        input[type="text"] {
          background-color: transparent;
          color: white;
        }
        .change-field button{
            position: relative;
            color: blanchedalmond;
            background-color: rgb(7, 70, 33);
            color: blanchedalmond;
            height: 50px;
            width: 175px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .change-field button:hover{
            background-color: #078c57;
        }
    </style>
</head>
<body>
    <?php include("navbar.php"); ?>
    <?php if(!isset($_SESSION["username"])){echo("<script>window.location.href = 'login.php'</script>");} 
        require("db_utils.php");
        $dbconn = connect();

        $name = $_POST["change_name"];
        $surname = $_POST["change_surname"];
        $user = $_POST["change_username"];
        $email = $_POST["change_email"];
        $id = $_SESSION["id"];

        if(isset($name) && isset($surname) && isset($user) && isset($email)){
            $change = changes($id, $name, $surname, $email, $user);
            if($change == -1) echo("<script>alert('Libro Già Inserito');</script>");
            else echo("<script>alert('Libro Inserito Correttamente');</script>");
        }
        
    ?>
    <div id="change-form">
        <form class="change-form" action="profilesettings.php" method="post">
            <div class="change-field">
                <input type='text' name="change_name" placeholder="Change your Name Here" required>
            </div>
            <div class="change-field">
                <input type='text' name="change_surname" placeholder="Change your Surname Here" required>
            </div>
            <div class="change-field">
                <input type='text' name="change_username" placeholder="Change your Username Here" required>
            </div>
            <div class="change-field">
                <input type='text' name="change_email" placeholder="Change your Email Here" required>
            </div>
            <div class="change-field">
                <button type="submit">Apply Changes</button>
                <button type="reset">Back to Profile</button>
            </div>
        </form>
    </div>
</body>
</html>