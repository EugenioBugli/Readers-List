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

    <?php include("navbar.php"); ?>

    <div class="form">
        <h2>Log in</h2>
        <form action="" method="post">
            <div class="input-field">
                <input type="text" placeholder="Enter your email" name="email" required />
                <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="input-field">
                <input type="password" placeholder="Enter your password" id="passwordInput" required />
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
</body>
</html>