<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="login.css" type="text/css">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css">
    <title>Log in</title>

</head>
<body>
    <?php
        require("db_utils.php");
        if(isset($_POST["email"]) && isset($_POST["password"])){
            //login database
            $ret = signin($_POST["email"], $_POST["password"]);
            if($ret["res"] == 0){
                $_SESSION["id"] = $ret["id"];
                $_SESSION["name"] = $ret["name"];
                $_SESSION["surname"] = $ret["surname"];
                $_SESSION["birth"] = $ret["birth"];
                $_SESSION["username"] = $ret["username"];//////////////////////
                $_SESSION["email"] = $ret["email"];
                $_SESSION["time"] = time();
            }else{
                echo("<script>alert('".$ret["res"]."');</script>");
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
                <i class="fa-regular fa-lock"></i>
                <i class="fa-regular fa-eye-slash showHidePassword" onclick="showPassword('passwordInput')"></i>
            </div>
            <script src="passwordValidator.js"></script>
            <div class="checkbox-text">
                <div class="checkbox-content">
                    <input type="checkbox" />
                    <label for="logCheck">Remember me</label>
                </div>
                <a href="./resetpassword.html" class="form-link">Forgot password?</a>
            </div>
            <div class="input-field button">
                <button type="submit">Log in</button>
            </div>

            <div class="login-signup">
                <p>Don't have an account yet? <a href="./signup.php">Sign up</a></p>
            </div>
        </form>
    </div>

    <div class="note">
        <h3>Trinity College Dublin</h3>
    </div>
    <?php
    //$dbconn = pg_connect("host=localhost dbname=ReadersListDB password=postgres user=postgres port=5432");
    ?>
</body>
</html>