<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="./style.css" type="text/css">
    <title>Document</title>
    <style>
        .history{
            overflow: auto;  /* show scrollbar if needed */
        }

        .history-table {
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
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css">
</head>
<body>
    <?php include("navbar.php"); ?>
    <div class="history">
        <table class="history-table">
            <th>Book</th>
            <th>Author</th>
            <th>Number Of Pages</th>
            <th>Foreing language</th>
            <?php
                require("db_utils.php");
                require("updatepages.php");
                $dbconn = connect();
                history($_SESSION["id"]);
            ?>
        </table>
    </div>
</body>
</html>