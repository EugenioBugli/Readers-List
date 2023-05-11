<?php
    session_start();

    if(!isset($_SESSION["id"])){
        echo("<script>window.location.href = 'login.php'</script>");
    }

    require "db_utils.php";
    $dbconn = connect();

    $query = "delete from books where id=".$_SESSION["id"];
    $query_result = pg_query($query) or die('Error Message: ' . preg_last_error());
    $query = "delete from users where id=".$_SESSION["id"];
    $query_result = pg_query($query) or die('Error Message: ' . preg_last_error());

    pg_free_result($query_result);
    pg_close($dbconn);

    echo(" <script>window.location.href = 'logout.php'</script>");
?>