<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="./style.css" type="text/css">
    <title>Reader's List</title>
    <style>
        @media screen and (min-width: 1001px) {
            .home-text{
                width: 60vw;
            }
        }
        @media screen and (max-width: 1000px) {
            .home-text{
                width: 80vw;
            }
        }
        @media screen and (min-width: 601px) {
            .home-text{
                grid-template: 
                'a a'
                'b c'
                'd e';
            }
        }
        @media screen and (max-width: 600px) {
            .home-text{
                padding: 3vw;
                grid-template: 
                'a a a'
                '. b .'
                '. c .'
                '. d .'
                '. e .';
            }
        }
        @media screen and (max-width: 350px) {
            img{
                display: none;
            }
        }
    </style>
    <style>
        .home-text {
            background-color: rgba(46, 43, 43, 0.822);
            box-shadow: 0 0 10px;
            overflow-x: hidden;
            overflow-y: auto; /* show scrollbar if needed */
            height: 80vh;
            max-height: 500px;
            border-radius: 10px;
            display: grid;
            grid-template: auto;
            row-gap: 10px;
            column-gap: 10px;
        }
        
        .title-desc {
            font-weight: 1000;
            font-size: 40px;
            grid-area: a;
        }

        h2 {
            color: blanchedalmond;
            font-size: 25px;
            font-weight: 800;
            text-align: center;
        }

        .text1 {
            grid-area: c;
        }

        .text2 {
            grid-area: d;
        }

        .text1.text2{
            border-radius: 10px;
        }

        img {
            width: 240px;
            height: 240px;
            margin-right: auto;
            margin-left: auto;
        }

        .gif {
            grid-area: e;
        }

        figure {
            grid-area: b;
            margin-top: auto;
            margin-bottom: auto;
        }

        blockquote {
            margin: 0;
            /*background-color: rgb(47, 79, 79);*/
            background-color: rgb(7,70,33);
            border-radius: 5px;
            text-align: center;
        }

        blockquote q {
            padding: 40px;
            color: blanchedalmond;
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
           This website let you create your Reading List
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
                <figcaption>-Marcus Tullius Cicero-</figcaption>
            </blockquote>
        </figure>

        <img class="gif" src="https://7551bdfc54adf45425bb-e1819ba959867bdb3382b3652a5f5ff1.ssl.cf5.rackcdn.com/animations/467/1435256441-Young_animation_education062515_02.gif">

        <div class="text2">
            <h2>
                <strong>All Reader's List users are competing with each other!</strong>
                 In fact, each reader has the opportunity to deal with all the other people who have the same passion.
            </h2>
        </div>
    </div>
</body>
</html>