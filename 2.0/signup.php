<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel=stylesheet href="style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@latest/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@latest/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/1a8c6dd550.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <style> /* responsiveness */
        @media screen and (max-width: 500px) {
            .form{
                width: 90vw;
            }

            .button button{
                width: 60%;
            }
        }
    </style>
</head>
<body>
    <?php
        require("db_utils.php");
        if(isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["username"]) && isset($_POST["birth"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confpassword"])){
            $id = signup($_POST["name"], $_POST["surname"], $_POST["birth"], $_POST["username"], strtolower($_POST["email"]), $_POST["password"]);
            if($id > 0){
                echo("<script>window.location.href = 'login.php';</script>");
            }elseif($id == -1){
                echo('<script>alert("The selected email has already been used for another account");</script>');
            }elseif($id == -2){
                echo('<script>alert("The selected username is already taken.");</script>');
            }
        }
    ?>

    <?php 
        include("navbar.php");
    ?>

    <div class="form">
        <h2>Sign up</h2>
        <form action="signup.php" method="post">
            <div class="input-field">
                <input type="text" placeholder="Enter your Name" name="name" required>
            </div>
            <div class="input-field">
                <input type="text" placeholder="Enter your Surname" name="surname" required>
            </div>
            <div class="input-field">
                <input type="text" placeholder="Enter your Username" name="username" required>
            </div>
            <div class="input-field">
                <input type="date" name="birth" required>
            </div>
            <div class="input-field">
                <input type="text" placeholder="Enter your Email" name="email" id="emailInput" required />
            </div>
            <div class="input-field">
                <input data-toggle="tooltip" type="password" placeholder="Enter your Password" id="passwordInput" name="password" required />
                <i class="fa-regular fa-eye-slash showHidePassword" onclick="showPassword('passwordInput')"></i>
            </div>
            <div class="input-field">
                <input type="password" placeholder="Confirm your Password" id="confirmInput" name="confpassword" required />
                <i class="fa-regular fa-eye-slash showHidePassword" onclick="showPassword('confirmInput')"></i>
            </div>
            <!--style for green animation when the password is valid-->
            <style> 
                @keyframes fadeOK {
                    0% {border-bottom-color: green;}
                    75% {border-bottom-color: green;}
                    100% {border-bottom-color: blanchedalmond;}
                }
                .fadeOKanimation{
                    animation: fadeOK 2s linear;
                    animation-fill-mode: forwards;
                }
            </style>
            <div class="input-field button">
                <button id="confirm" type="submit">Sign Up</button>
            </div>
            <script src="passwordValidator.js"></script>

            <script> //script for showing tooltip when password is invalid
                i = 0
                $("#passwordInput").hover(function(){
                    if(!isPasswordValid(document.getElementById("passwordInput"))){
                        $(this).tooltip({placement: "bottom", title: "Your password must contain at least: a lower case character, an upper case character, a number."}); 
                    }else{
                        $(this).tooltip('dispose');
                    }
                });
            </script>

            <div class="login-signup">
                <p>Already have an account? <a href="./login.php">Log in</a></p>
            </div>
        </form>
    </div>

    <div class="note">
        <h3>Trinity College Dublin</h3>
    </div>
</body>
</html>