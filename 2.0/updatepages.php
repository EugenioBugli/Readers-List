<?php
    function ask_pages($id, $name) {
        $query = "select num_pages from books where id ='".$id."' and book='".$name."' ";
        $result = pg_query($query);
        while($line = pg_fetch_row($result, null , PGSQL_ASSOC)) {
            echo("
                <div class='book-field'>
                <h2>".$name." has a total of ".$line["num_pages"]." pages</h2>
                </div>
                ");
        }
    }

    function change_page($number, $name, $id) {
        $page = (int) $number;
        $query_c = "update books set current_page=".$page." where id='".$id."' and book='".$name."'";
        $result_c = pg_query($query_c) or die('Error message: ' . pg_last_error());
        pg_free_result($result_c);
    }

    function book_finished($name, $id) {
        $query = "update books set current_page=num_pages, finished=true where id='".$id."' and book='".$name."'";
        $result = pg_query($query) or die('Error message: ' . pg_last_error());
        //need to add :
        //ogni volta che un libro viene finito bisogna aggiungere i punti ottenuti al punteggio dell'username
        update_points($name, $id);
        pg_free_result($result);
    }
    
    function update_points($book_name, $id) {
        $query = "select num_pages,foreign_lang from books where book = '".$book_name."' and id='".$id."' ";
        $res = pg_query($query) or die('Error Message: ' . pg_last_error());
        $line = pg_fetch_row($res, null, PGSQL_ASSOC);
        $num_points = ((int) $line["num_pages"]) / 100;
        if($line["foreign_lang"]) {
            $num_points = $num_points * 2;
        }
        $sql = "update users set num_points = num_points + ".$num_points." where id='".$id."' ";
        $result = pg_query($sql) or die('Error message: ' . pg_last_error());
        pg_free_result($result);
    }
?>