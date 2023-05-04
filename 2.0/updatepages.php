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
        //echo("<h2>".$name." has a total of ".$number." pages<h2>");
        $query_c = "update books set current_page=".$page." where id='".$id."' and book='".$name."'";
        $result_c = pg_query($query_c) or die('Error message: ' . pg_last_error());
        pg_free_result($result_c);
    }
?>