<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css">
    <link rel=stylesheet href="./style.css" type="text/css">
    <title>Leaderboard</title>
    <style>
        .grid {
            display: grid;
            grid-template:
            'a a b'
            'c c c'
            '. d .';
            width: 100vw;
            overflow: auto;  /* show scrollbar if needed */
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

        .filter-selection button {
            color: blanchedalmond;
            background-color: rgb(7, 70, 33);
            border: none;
            outline: none;
            font-size: 20px;
            width: auto;
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

                $query = "with num_libri as (
                        select u.id, count(b.book) as num , sum(b.current_page) as pag
                        from users u join books b on b.id=u.id
                        group by u.id
                        )
                        select u.username,u.id,cast (count(b.book)::decimal / n.num::decimal * 100 as decimal(1000,1)) as percentage, n.num as num_books , n.pag as num_pages
                        from users u join books b on b.id=u.id join num_libri n on n.id = u.id
                        where b.foreign_lang is true
                        group by u.username,n.num,n.pag,u.id
                        union
                        select u.username,u.id, 0 , 0 , 0
                        from users u
                        where (
                                select count(books)
                                from books
                                where id=u.id
                                ) = 0";

                $result = pg_query($query) or die('Error Message: ' . pg_last_error());
                $num = 1;

                while($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                    $query_points = "with basic as(		
                        select u.id, cast(sum(b.num_pages) / 100 as decimal(1000,2)) as normal_p
                        from books b join users u on u.id = b.id
                        where b.finished is true and foreign_lang is false
                        group by u.id
                        )
                        select u.username, cast(sum(b.num_pages) / 50 as decimal(1000,2)) + a.normal_p as points
                        from books b join users u on u.id = b.id join basic a on a.id = u.id
                        where b.finished is true and foreign_lang is true and u.id = ".$line["id"]."
                        group by u.username,a.normal_p
                        union
                        select u.username, 0
                        from users u
                        where (
                            select count(books)
                            from books
                            where id=u.id
                            ) = 0 and u.id = ".$line["id"]."" ;
                    $res_p = pg_query($query_points) or die('Error Message: ' . pg_last_error());
                    $points = pg_fetch_row($res_p, NULL, PGSQL_ASSOC);
                    echo("
                        <tr>
                            <td class='numb'>
                            ".$num."
                            </td>
                            <td>
                            ".$line["username"]."
                            </td>

                            <td>
                            ".$line["num_books"]."
                            </td>

                            <td>
                            ".$line["percentage"]."
                            </td>

                            <td>
                            ".$line["num_pages"]."
                            </td>

                            <td>
                            ".$points["points"]."
                            </td>
                        </tr>
                    ");
                    $num++;
                }
            ?>
        </table>
        <div class="filter-selection">
            <button>Num Books</button>
            <button>% foreign</button>
            <button>Points</button>
            <button>Num Pages</button>
        </div>
    </div>
</body>
</html>