<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="login.css" type="text/css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="https://kit.fontawesome.com/1a8c6dd550.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    
    <?php include("navbar.php"); ?>

    <div class="form">
        <h2>Sign up</h2>
        <form action="profile.php" method="post">
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
                <input type="text" placeholder="Enter your Email" name="email" required />
            </div>
            <div class="input-field">
                <input type="password" placeholder="Enter your Password" id="passwordInput" required />
                <i class="fa-regular fa-eye-slash showHidePassword" onclick="showPassword('passwordInput')"></i>
            </div>
            <div class="input-field">
                <input type="password" placeholder="Confirm your Password" id="confirmInput" required />
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
            <script src="passwordValidator.js"></script>
            <div class="checkbox-text">
                <div class="checkbox-content">
                    <input type="checkbox" />
                    <label for="logCheck">Remember me</label>
                </div>
            </div>
            <div class="input-field button">
                <button type="submit">Sign Up</button>
            </div>

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