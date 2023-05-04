<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="./login.css" type="text/css">
    <title>Profile</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css">
</head>
<body>
    <?php include("navbar.php"); ?>
    <?php if(!isset($_SESSION["username"])){echo("<script>window.location.href = 'login.php'</script>");} ?>
    
</body>
</html>