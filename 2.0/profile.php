<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="./login.css" type="text/css">
    <title>Profile</title>
    <style>
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
        
        .grid {
            display: grid;
            grid-template:
            'a c'
            'a b';
            text-align: center;
            column-gap: 8vh;
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
        
        .history {
            grid-area: c;
        }

        .creator {
            text-align: center;
            font-size: 30px;
            font-weight: 1000;
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
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>
    <?php include("navbar.php"); ?>
    
        <?php
        echo("<div class='central-sheet'>
        <h1 class='about'>Personal Profile:</h1>
        <hr>
        
        <div class='grid'>
        
            <div class='photo infophotogrid'>
                <img src='https://th.bing.com/th/id/OIP.q-cdNfHrqcd8sGbscdNjzQHaKx?pid=ImgDet&rs=1'>
                <h3 class='creator'>".$_SESSION["username"]."</h3>
            </div>
            <div class='history infophotogrid'>
                <h3 class='attrib'>History: </h3>
                <h3 class='link'>".$_SESSION["username"]."</h3><br>
            </div>
            <div class='info infophotogrid'>
                <h3 class='attrib'>Name:</h3>
                <h3 class='link'>".$_SESSION["name"]."</h3><br>
                
                <h3 class='attrib'>Surname:</h3>
                <h3 class='link'>".$_SESSION["surname"]."</h3><br>

                <h3 class='attrib'>BirthDay:</h3>
                <p><h3 class='link'>".$_SESSION["birth"]."</h3><br>

                <h3 class='attrib'>User from:</h3>
                <p><h3 class='link'>2023</h3><br>
            </div>

        </div>
    </div>");
        ?>  
</body>
</html>