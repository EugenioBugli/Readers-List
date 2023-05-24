<?php
    function history($id) {
        $query = "select book,author,num_pages,foreign_lang from books where id ='".$id."' and finished is true";
        $result = pg_query($query);
        while($line = pg_fetch_row($result, null , PGSQL_ASSOC)) {
            if($line["foreign_lang"] == 't') {
                echo("
                <tr>
                    <td>
                    ".$line["book"]."
                    </td>
                    <td>
                    ".$line["author"]."
                    </td>
                    <td>
                    ".$line["num_pages"]."
                    </td>
                    <td>
                    <i class='fa-solid fa-check' style='color:blanchedalmond'></i>
                    </td>
                </tr>
                ");
            }
            else {
                echo("
                <tr>
                    <td>
                    ".$line["book"]."
                    </td>
                    <td>
                    ".$line["author"]."
                    </td>
                    <td>
                    ".$line["num_pages"]."
                    </td>
                    <td>
                    <i class='fa-solid fa-x' style='color:blanchedalmond'></i>
                    </td>
                </tr>
                ");
            }
        }
    }

    function change_page($number, $name, $id) {
        $page = (int) $number;
        $query_check = "select num_pages from books where id='".$id."' and book='".$name."'";
        $result_check = pg_query($query_check) or die('Error Message: ' . pg_last_error());
        $line = pg_fetch_row($result_check, null, PGSQL_ASSOC);
        if( $page >= (int) $line["num_pages"]) {
            book_finished($name,$id);
            pg_free_result($result_check);
        }
        else {
            $query_c = "update books set current_page=".$page." where id='".$id."' and book='".$name."'";
            $result_c = pg_query($query_c) or die('Error message: ' . pg_last_error());
            pg_free_result($result_c);
        }
    }

    function book_finished($name, $id) {
        $query = "update books set current_page=num_pages, finished=true where id='".$id."' and book='".$name."'";
        $result = pg_query($query) or die('Error message: ' . pg_last_error());
        //need to add :
        //ogni volta che un libro viene finito bisogna aggiungere i punti ottenuti al punteggio dell'username
        pg_free_result($result);
    }
?>