<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="./style.css" type="text/css">
    <title>About Us</title>
    <style> /* responsiveness */
        @media screen and (min-width: 851px) {
            .grid{
                grid-template:
                    'a .'
                    'a b'
                    'a .';
            }

            .central-sheet {
                width:60%;
            }

            .photo img{
                max-width: 300px;
            }
        }

        @media screen and (max-width: 850px) {
            .grid{
                grid-template:
                    '. a .'
                    'b b b';
            }

            .central-sheet {
                width:90%;
            }

            .photo img{
                max-width: 250px;
            }
        }
    </style>
    <style>
        .central-sheet {
            position: relative;
            background-color: rgba(46, 43, 43, 0.522); 
            box-shadow: 0 0 10px;
            border-radius: 30px;
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

        .photo img{
            width:90%;
        }

        .info {
            grid-area: b;
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
</head>
<body>
    <?php include("navbar.php"); ?>
        <div class="central-sheet">
            <h1 class="about">Creator's Contacts :</h1>
            <hr>
            
            <div class="grid">
            
                <div class="photo infophotogrid">
                    <img src="https://th.bing.com/th/id/OIP.q-cdNfHrqcd8sGbscdNjzQHaKx?pid=ImgDet&rs=1">
                    <h3 class="creator">Eugenio Bugli</h3>
                </div>
                <div class="info infophotogrid ">
                        <h3 class="attrib">E-Mail:</h3><br>
                        <p><a class="link" href="mailto:eugeniobugli15.com">EugenioBugli15@gmail.com</a></p><br>
                        
                        <h3 class="attrib">GitHub:</h3><br>
                        <p><a class="link" href="https://github.com/EugenioBugli">EugenioBugli</a></p><br>

                        <h3 class="attrib">Twitter:</h3><br>
                        <p><a class="link" href="https://twitter.com/BugliEugenio">EugenioBugli</a></p><br>
                </div>

            </div>
            
            <hr>

            <div class="grid">

                <div class="photo infophotogrid">
                    <img src="https://th.bing.com/th/id/OIP.q-cdNfHrqcd8sGbscdNjzQHaKx?pid=ImgDet&rs=1">
                    <h3 class="creator">Filippo Ansalone</h3>
                </div>
                <div class="info infophotogrid">
                        <h3 class="attrib">E-Mail:</h3><br>
                        <p><a class="link" href="mailto:ansalone.1950936@studenti.uniroma1.it">filippoa2000@gmail.com</a></p><br>
                        
                        <h3 class="attrib">GitHub:</h3><br>
                        <p><a class="link" href="https://github.com/Filippo29">Filippo29</a></p><br>

                        <h3 class="attrib">Twitter:</h3><br>
                        <p><a class="link" href="https://twitter.com/filippoansa">Filippo29</a></p><br>
                </div>

            </div>
        </div>
</body>
</html>