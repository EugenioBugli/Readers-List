<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="./login.css" type="text/css">
    <title>Profile</title>
    <style>
        .user_img {
            width: 40%
        }

        .grid {
            display: grid;
            grid-template:
            'a b'
            'c c';
            text-align: center;
            column-gap: 1vw;
            row-gap: 8vh;
        }

        .central-sheet {
            position: relative;
            background-color: rgb(7, 70, 33); 
            box-shadow: 0 0 10px;
            border-radius: 30px;
            width:60%;
            height: auto;
        }

        .about {
            text-align: center;
            font-size: 50px;
            font-weight: 1000;
            letter-spacing: 1px;
            color:blanchedalmond;
        }

        hr {
            display: block;
            height: 1px;
            border: 0;
            border-top: 5px solid blanchedalmond;
            margin: 1em 0;
            padding: 0;
        }
        
        .infophotogrid {
            text-align: center;
            position: relative;
        }
        .photo {
            grid-area: a;
        }

        .info {
            grid-area: b;
        }
        

        .creator {
            background-color:blue;
            grid-area: c;
        }

        .user h3{
            text-align: center;
            font-size: 35px;
            font-weight: 8000;
            letter-spacing: 1px;
            color:rgb(127, 238, 30);
        }

        .attrib {
            text-align: center;
            font-size: 27px;
            font-weight: 500;
            color: blanchedalmond;
        }

        .link{
            text-align: center;
            font-size: 23px;
            font-weight: 350;
            letter-spacing: 1px;
            color: rgb(32, 178, 170);
        }
        .creator button{
            color:blanchedalmond;
            background-color: rgba(7, 70, 33,0.622);
            height: 40px;
            width: 180px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            outline: none;
        }

        .creator button:hover {
            background-color: red;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css">
</head>
<body>
    <?php include("navbar.php"); ?>
    <?php if(!isset($_SESSION["username"])){echo("<script>window.location.href = 'login.php'</script>");} ?>
    
    <div class='central-sheet'>
        <h1 class='about'>Personal Profile:</h1>
        <hr>
        
        <div class='grid'>

            <div class='photo infophotogrid'>
                <img class='user_img' src='https://th.bing.com/th/id/OIP.q-cdNfHrqcd8sGbscdNjzQHaKx?pid=ImgDet&rs=1'>
                <?php echo("
                <div class='user'>
                <h3>".$_SESSION["username"]."</h3>
                </div>
                "); ?>
            </div>
            <div class="creator">
                <button id="logout">Logout</button>
            </div>
            
            <div class='info infophotogrid'>
                <h3 class='attrib'>Name:</h3>
                <h3 class='link'><?php echo($_SESSION["name"]); ?></h3><br>
                
                <h3 class='attrib'>Surname:</h3>
                <h3 class='link'><?php echo($_SESSION["surname"]); ?></h3><br>

                <h3 class='attrib'>BirthDay:</h3>
                <p><h3 class='link'><?php echo($_SESSION["birth"]); ?></h3><br>

                <h3 class='attrib'>User from:</h3>
                <p><h3 class='link'>2023</h3><br>

                
                <i class="fa-regular fa-gear fa-xl settings" onclick="window.location.href = 'profilesettings.php';"></i>
            </div>
        </div>
    </div>
</body>
</html>