<?php
                    $dbconn = connect();
                    if(isset($_POST['action'])) {
                        $query = "select num_pages from books where id ='".$_SESSION["id"]."' and book='".$_POST['action']."'";
                        $result = pg_query($query);
                        while($line = pg_fetch_array($result, null , PGSQL_ASSOC)) {
                            foreach($line as $row) {
                                echo("
                                    <div class='book-field'>
                                        <h3>Total Number of Pages : ".$row."</h3>
                                    </div>
                                    ");
                            }
                        }
                    }
                ?>