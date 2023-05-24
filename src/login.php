<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="style.css" type="text/css">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css">
    <link rel="icon" type="image/png" href="../openbook.png">
    <title>Log in</title>

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
        if(isset($_POST["email"]) && isset($_POST["password"])){
            //login database
            $ret = signin(strtolower($_POST["email"]), $_POST["password"]);
            if($ret["res"] == 0){
                $_SESSION["id"] = $ret["id"];
                $_SESSION["name"] = $ret["name"];
                $_SESSION["surname"] = $ret["surname"];
                $_SESSION["birth"] = $ret["birth"];
                $_SESSION["username"] = $ret["username"];//////////////////////
                $_SESSION["email"] = $ret["email"];
                $_SESSION["time"] = time();
            }else{
                if($ret["res"]==-1){
                    echo("<script>alert('The selected email doesn't correspond to any account');</script>");
                }elseif($ret["res"]==-2){
                    echo("<script>alert('Wrong password');</script>");
                }else{
                    echo("<script>alert('".$ret["res"]."');</script>");
                }
            }
        }
        if(isset($_SESSION["username"])){echo("<script>window.location.href = 'profile.php'</script>");} 
    ?>

    <?php include("navbar.php"); ?>

    <div class="form">
        <h2>Log in</h2>
        <form action="login.php" method="post">
            <div class="input-field">
                <input type="text" placeholder="Enter your email" name="email" required />
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="input-field">
                <input type="password" placeholder="Enter your password" id="passwordInput" name="password" required />
                <i class="fa-solid fa-lock"></i>
                <i class="fa-regular fa-eye-slash showHidePassword" onclick="showPassword('passwordInput')"></i>
            </div>
            <script>
                var showingPassword = false;
                function showPassword(id){
                    showingPassword = !showingPassword;
                    let e = document.getElementById(id);
                    if(showingPassword)
                        e.type = "text"
                    else
                        e.type = "password"
                }
            </script>
            <div class="input-field button">
                <button type="submit">Log in</button>
            </div>

            <div class="login-signup">
                <p>Don't have an account yet? <a href="./signup.php">Sign up</a></p>
            </div>
        </form>
    </div>
</body>
</html>