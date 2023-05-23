<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="./style.css" type="text/css">
    <title>Profile</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel=stylesheet href="fontawesome-free-6.4.0-web/css/all.css">
    <style> /* responsiveness */
        @media only screen and (min-width: 451px)  {
            .change-field input{
                width: 350px;
            }
        }

        @media only screen and (max-width: 450px)  {
            body{
                padding-left:20px;
            }

            .change-form{
                margin: 10px;
                width: 80vw;
            }
            .change-field input{
                width: 95%;
            }
        }
    </style>
    <style>
        .grid{
            display: grid;
            grid-template:
                    'a'
                    'b';
            grid-row-gap: 20px;
            grid-column-gap: 20px;
            padding-top: 20px;
        }

        .change-data{
            grid-area: a;
        }

        .change-pwd{
            grid-area: b;
        }
        .change-form {
            position: relative;
            padding: 40px 30px;
            background-color: rgba(46, 43, 43, 0.622); 
            box-shadow: 0 0 10px ;
            border-radius: 20px;
            text-align: center;
        }

        form{
            overflow:hidden;
        }

        .change-field {
            position: relative;
            height: 90px;
        }
        .change-field input{
            position: relative;
            color: blanchedalmond;
            height: 40px;
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
        .button button{
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <?php include("navbar.php"); ?>
    <?php 
        if(!isset($_SESSION["username"])){echo("<script>window.location.href = 'login.php'</script>");} 
        if(isset($_POST["password"]) && (isset($_POST["change_name"]) || isset($_POST["change_surname"]) || isset($_POST["change_username"]) || isset($_POST["change_email"]))){
            require("db_utils.php");
            
            $name = $_SESSION["name"];
            if(isset($_POST["change_name"]) && $_POST["change_name"] != ""){$name = $_POST["change_name"];}

            $surname = $_SESSION["surname"];
            if(isset($_POST["change_surname"]) && $_POST["change_surname"] != ""){echo("bbb");$surname = $_POST["change_surname"];}
            
            $user = $_SESSION["username"];  ////check validity
            if(isset($_POST["change_username"]) && $_POST["change_username"] != ""){$user = $_POST["change_username"];}

            $email = $_SESSION["email"];
            if(isset($_POST["change_email"]) && $_POST["change_email"] != ""){$email = $_POST["change_email"];}

            $id = $_SESSION["id"];

            if(isset($name) && isset($surname) && isset($user) && isset($email)){
                $change = applyChanges($id, $name, $surname, $email, $user, $_POST["password"]);
                if($change == -1) echo("<script>alert('Wrong password');</script>");
                else {
                    echo("<script>alert('Updated correctly');</script>");
                    $_SESSION["name"] = $name;
                    $_SESSION["surname"] = $surname;
                    $_SESSION["username"] = $user;
                    $_SESSION["email"] = $email;
                    echo("<script>window.location.href = 'profile.php'</script>");
                }
            }
        }
        if(isset($_POST["old_password"]) && isset($_POST["change_password"]) && isset($_POST["change_password2"])){
            if($_POST["change_password"] != $_POST["change_password2"]){echo("<script>alert('The confirmation password is not correct');</script>");}
            require("db_utils.php");
            $change = changePassword($_POST["old_password"], $_POST["change_password"]);
            if($change == -1){echo("<script>alert('Wrong old password');</script>");}
            else{
                echo("<script>alert('Password changed correctly');</script>");
                echo("<script>window.location.href = 'profile.php'</script>");
            }
        }

    ?>
    <div class="grid">
        <div id="change-form change-data">
            <form class="change-form" action="profilesettings.php" method="post">
                <div class="change-field">
                    <input type='text' name="change_name" placeholder="Change your Name Here">
                </div>
                <div class="change-field">
                    <input type='text' name="change_surname" placeholder="Change your Surname Here">
                </div>
                <div class="change-field">
                    <input type='text' name="change_username" placeholder="Change your Username Here">
                </div>
                <div class="change-field">
                    <input type='text' name="change_email" placeholder="Change your Email Here">
                </div>
                <div class="change-field">
                    <input type='password' name="password" placeholder="Confirm your password" required>
                </div>
                <div class="change-field button">
                    <button type="submit">Apply Changes</button>
                    <button type="reset"><a title="Profile" href="profile.php" style="color:blanchedalmond; text-decoration:none;">Back to Profile</a></button>
                </div>
            </form>
        </div>
        <div id="change-form change-pwd">
            <form class="change-form" action="profilesettings.php" method="post">
                <div class="change-field">
                    <input type='password' name="old_password" placeholder="Old password here" required>
                </div>
                <div class="change-field">
                    <input type='password' id="change_password" name="change_password" placeholder="New password here">
                </div>
                <div class="change-field">
                    <input type='password' id="change_password2" name="change_password2" placeholder="Confirm new password here">
                </div>
                <div class="change-field button">
                    <button type="submit">Apply Changes</button>
                    <button type="reset"><a title="Profile" href="profile.php" style="color:blanchedalmond; text-decoration:none;">Back to Profile</a></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>