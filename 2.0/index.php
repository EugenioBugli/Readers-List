<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="./style.css" type="text/css">
    <title>Reader's List</title>
    <style>
        .home-text {
            background-image: linear-gradient(to top, rgba(7, 70, 33,0), rgba(7, 70, 33,1));
            /*background-color: rgba(7,70,33,0.8);*/
            box-shadow: 0 0 10px;
            overflow: hidden;
            width: 60vw;
            height: 60vh;
            grid-template: 
            'a a'
            'b c'
            'd e';
            display: grid;
            grid-template: auto;
        }
        
        .title-desc {
            font-weight: 1000;
            font-size: 40px;
            grid-area: a;
            margin-right: auto;
            margin-left: auto;
            margin-top: auto;
            margin-bottom: auto;
        }

        h2 {
            color: blanchedalmond;
            font-size: 25px;
            font-weight: 800;
            text-align: center;
        }

        .text1 {
            grid-area: c;
            background-color: blue;
            margin-right: auto;
            margin-left: auto;
            margin-top: auto;
            margin-bottom: auto;
            white-space: initial;
        }

        .text2 {
            grid-area: d;
            background-color: blue;
            margin-right: auto;
            margin-left: auto;
            margin-top: auto;
            margin-bottom: auto;
            white-space: initial;
        }

        img {
            width: 240px;
            height: 240px;
        }

        .gif {
            grid-area: e;
            margin-right: auto;
            margin-left: auto;
            margin-top: auto;
            margin-bottom: auto;
        }

        figure {
            grid-area: b;
            margin-right: auto;
            margin-left: auto;
            margin-top: auto;
            margin-bottom: auto;
        }

        blockquote {
            margin: 0;
        }

        blockquote q {
            padding: 40px;
            background: rgb(47, 79, 79);
            color: blanchedalmond;
            border-radius: 5px;
            font-size: 20px;
            font-weight: 700;
        }

        figcaption {
            color: blanchedalmond;
            right:0;
        }
        
    </style>

</head>
<body>
    <?php include("navbar.php"); ?>
    <div class="home-text">
        <h2 class="title-desc">
            Questo sito web permette di creare una Reading List
        </h2>
        <br>
        <div class="text1">
            <h2>
                Creating a Reading List allows you to save all your books and keep track of every reading you are tackling.
                 Each user has the ability to save all the books they are interested in reading and is able to save their progress
                 concerning the pages read.
            </h2>
        </div>

        <figure>
            <blockquote>
                <q>A room without books is like a body without a soul.</q>
            </blockquote>
            <figcaption>—Marcus Tullius Cicero</figcaption>
        </figure>

        <img class="gif" src="https://7551bdfc54adf45425bb-e1819ba959867bdb3382b3652a5f5ff1.ssl.cf5.rackcdn.com/animations/467/1435256441-Young_animation_education062515_02.gif">

        <div class="text2">
            <h2>
                <strong>All Reader's List users are competing with each other!</strong>
                 in fact, each reader has the opportunity to deal with all the other people who have the same passion.
            </h2>
        </div>
    </div>
</body>
</html>