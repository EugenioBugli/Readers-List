<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="login.css" type="text/css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="https://kit.fontawesome.com/1a8c6dd550.js" crossorigin="anonymous"></script>
    <title>Log in</title>

</head>
<body>
    <?php
        require("db_utils.php");
        if(isset($_POST["email"]) && isset($_POST["password"])){
            //login database
            $ret = signin($_POST["email"], $_POST["password"]);
            if($ret["res"] == 0){
                echo("<script>alert('".$ret["birth"]."');</script>");
                $_SESSION["username"] = $ret["username"];//////////////////////
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
                <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="input-field">
                <input type="password" placeholder="Enter your password" id="passwordInput" name="password" required />
                <i class="uil uil-lock icon"></i>
                <i class="fa-regular fa-eye-slash showHidePassword"></i>
            </div>
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