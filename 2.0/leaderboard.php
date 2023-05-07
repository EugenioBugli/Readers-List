<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css">
    <link rel=stylesheet href="./login.css" type="text/css">
    <title>Leaderboard</title>
    <style>
        .grid {
            display: grid;
            grid-template:
            'a a b'
            'c c c'
            '. d .';
            width: 100vw;
            overflow: auto;
        }
        .title {
            grid-area: a
        }
        .title h1 {
            font-size: 35px;
            font-weight: 1000;
        }
        .filter {
            grid-area: b;
        }

        .filter-selection {
            grid-area: d;
            background-color: rgba(46, 43, 43, 0.422);
            transform: scale(0);
            text-align: center;
        }

        .filter button{
            color: blanchedalmond;
            background-color: transparent;
            color: blanchedalmond;
            height: 50px;
            font-size: 26px;
            float: right;
            border: none;
            outline: none;
        }

        .board-table {
            border-collapse: collapse;
            grid-area: c;
            box-shadow: 0 0 10px;
            border-radius: 10px;   
        }

        th, td {
            text-align: center;
            padding: 20px;
            color: blanchedalmond;
            font-size: 20px;
            font-weight: 1000;
        }

        .numb {
            background-color: rgba(46, 43, 43, 0.922);
        }

        th {
            background-color: rgba(46, 43, 43, 0.922);
        }

        tr {
            background-color: rgba(46, 43, 43, 0.422);
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function(){
            $(".filter button").click(function() {
                $(".filter-selection").css('transform','scale(1)');
            });
        });
    </script>
</head>
<body>
    <?php 
        include("navbar.php");
        if(!isset($_SESSION["id"])){echo("<script>window.location.href = 'login.php'</script>");}
    ?>
    <div class="grid">

        <div class="title">
            <h1>LeaderBoard</h1>
        </div>

        <div class="filter">
            <button class="fa fa-filter"></button> 
        </div>

        <table class="board-table">
            <th>#</th>
            <th>Username</th>
            <th>Number of books</th>
            <th>% foreign books</th>
            <th>Pages Read</th>
            <th>Points</th>
            <?php
                require("db_utils.php");
                $dbconn = connect();

                $query = "select username from users where id='".$_SESSION["id"]."' ";
                $count_fl = "select count(book) from books where id='".$_SESSION["id"]."' and foreign_lang is true";
                $count_b = "select count(book), sum(num_pages) from books where id='".$_SESSION["id"]."' ";

                $result = pg_query($query) or die('Error Message: ' . pg_last_error());
                $res_fl = pg_query($count_fl) or die('Error Message: ' . pg_last_error());
                $res_b = pg_query($count_b) or die('Error Message: ' . pg_last_error());

                $line = pg_fetch_row($result, null, PGSQL_ASSOC);
                $fl = pg_fetch_row($res_fl, null, PGSQL_ASSOC);
                $num_fl = (int) $fl["count"]; //# foreign language

                $books = pg_fetch_row($res_b, null, PGSQL_ASSOC);
                $num_b = (int) $books["count"]; //total books
                $num_p = (int) $books["sum"]; //total pages

                $percentage = ($num_fl / $num_b) * 100;
                $percentage =  number_format((float) $percentage, 1 , '.', '');

                $query1 = "select sum(num_pages) from books where finished = true and foreign_lang = false and id='".$_SESSION["id"]."'";
                $res1 = pg_query($query1) or die('Error Message: ' . pg_last_error());
                $line1 = pg_fetch_row($res1 , null, PGSQL_ASSOC);
                $value1 = (int) $line1["sum"];

                $query2 = "select sum(num_pages) from books where finished = true and foreign_lang = true and id='".$_SESSION["id"]."'";
                $res2 = pg_query($query2) or die('Error Message: ' . pg_last_error());
                $line2 = pg_fetch_row($res2 , null, PGSQL_ASSOC);
                $value2 = 2* (int) $line2["sum"];
                $points = ($value2 + $value1 ) / 100;
                $num = 1;
                echo("
                    <tr>
                        <td class='numb'>
                        ".$num."
                        </td>
                        <td>
                        ".$line["username"]."
                        </td>

                        <td>
                        ".$num_b."
                        </td>

                        <td>
                        ".$percentage."
                        </td>

                        <td>
                        ".$num_p."
                        </td>

                        <td>
                        ".$points."
                        </td>
                    </tr>
                ");
                $num++;
            ?>
        </table>
        <div class="filter-selection">
            <h2>Filtri per la tabella: max_punti , num_libri , % foreign</h2>
        </div>
    </div>
</body>
</html>