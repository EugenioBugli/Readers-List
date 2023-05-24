<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css">
    <link rel=stylesheet href="./style.css" type="text/css">
    <link rel="icon" type="image/png" href="../openbook.png">
    <title>Leaderboard</title>
    <style>
        .grid {
            display: grid;
            grid-template:
            'a a a'
            'c c c';
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

        .pos1{
            color: gold;
            display: block !important;
        }

        .pos2{
            color: silver;
            display: block !important;
        }

        .pos3{
            color: #CD7F32; /* bronze */
            display: block !important;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
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

               
                $num = 1;

                $query_points = "with basic_p as(		
                    select u.id, cast(sum(b.num_pages) / 100 as decimal(1000,2)) as normal_p
                    from books b join users u on u.id = b.id
                    where b.finished is true and foreign_lang is false
                    group by u.id
                    union
                    select u.id , 0
                    from users u
                    where (
                            select count(book)
                            from books
                            where finished is true and foreign_lang is false and id = u.id
                    ) = 0
                    ),
                    for_p as(
                    select u.id, cast(sum(b.num_pages) / 50 as decimal(1000,2)) as double_p
                    from books b join users u on u.id = b.id
                    where b.finished is true and foreign_lang is true
                    group by u.id
                    union
                    select u.id , 0
                    from users u
                    where (
                            select count(book)
                            from books
                            where finished is true and foreign_lang is true and id = u.id
                    ) = 0
                    )
                    
                    select u.id,f.double_p + b.normal_p as points
                    from users u join basic_p b on b.id = u.id join for_p f on f.id = u.id
                    order by points desc" ;

                $res_p = pg_query($query_points) or die('Error Message: ' . pg_last_error());

                while($points = pg_fetch_array($res_p, null, PGSQL_ASSOC)) {
                    $query = "with num_libri as (
                        select u.id, count(b.book) as num , sum(b.current_page) as pag
                        from users u join books b on b.id=u.id
                        group by u.id
                        union
                        select u.id, 0, 0
                        from users u
                        where (
                                select count(books)
                                from books
                                where id=u.id
                                ) = 0
                        ),
                        num_for as(							
                        select u.id , count(b.book) as fore
                        from users u join books b on b.id = u.id
                        where foreign_lang is true
                        group by u.id
                        union
                        select u.id , 0
                        from users u
                        where (select count(book)
                            from books
                            where foreign_lang is true) = 0
                        )
                            select u.username,u.id,cast (f.fore::decimal / n.num::decimal * 100 as decimal(1000,1)) as percentage, n.num as num_books , n.pag as num_pages
                            from users u join books b on b.id=u.id join num_libri n on n.id = u.id join num_for f on f.id = u.id
                            where u.id = ".$points["id"]."
                            union
                            select u.username,u.id, 0.0 , 0 , 0
                            from users u
                            where (
                                    select count(books)
                                    from books
                                    where id=u.id
                                    ) = 0";
    
                    $result = pg_query($query) or die('Error Message: ' . pg_last_error());
                    $line = pg_fetch_row($result, null, PGSQL_ASSOC);
                    $style = "";
                    if($line["id"] == $_SESSION["id"]){
                        $style = "style='background-color: rgba(7, 70, 33, 0.5);'";
                    }
                    echo("
                        <tr ".$style.">
                            <td class='numb'>
                            ".$num."
                            <i class='fa-solid fa-medal pos".$num."' style='display: none;'></i>
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
    </div>
</body>
</html>