<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="./login.css" type="text/css">
    <title>Reading List</title>
    <style>
        .grid {
            display: grid;
            text-align: center;
            grid-column-gap: 5vw;
            grid-row-gap: 8vh;
        }
        @media only screen and (max-width: 800px) {
            .grid {
                grid-template:
                    '. a .'
                    '. b .'
                    '. c .'
                    '. d .'
                    'e e e';
            }

            .grid-col{
                width: 40vw;
            }
        }
        @media only screen and (min-width: 801px) {
            .grid {
                grid-template:
                    'a b c'
                    '. d .'
                    'e e e';
            }

            .grid-col {
                width: 25vw;
            }
        }
        .read {
            grid-area: a;
        }
        .current {
            grid-area: b;
        }
        .want {
            grid-area: c;
        }

        .grid-col {
            background-color: rgba(46, 43, 43, 0.522); 
            box-shadow: 0 0 10px;
            border-radius: 30px;
            overflow: hidden;
        }

        hr {
            display: block;
            height: 1px;
            border: 0;
            border-top: 5px solid blanchedalmond;
            margin: 1em 0;
            padding: 0;
        }

        th {
            text-align: center;
            font-size: 30px;
            font-weight: 1000;
            letter-spacing: 1px;
            color:rgb(127, 238, 30);
        }

        tr>td {
            padding-bottom: 5px;  /*spazio tra una riga e la successiva*/
        }

        td{
            max-width: 20vw;
            overflow: hidden;
            text-overflow: ellipsis;  /*adds ... to the name of a book if too long*/
            white-space: nowrap;
        }

        .table {
            height: auto;
            max-width: 23vw;
            font-size: 20px;
            font-weight: 300;  
            padding: 20px;
            color:blanchedalmond;
            table-layout: auto;
            margin: auto auto;
        }

        input[type="checkbox"] {
            background:blanchedalmond;
        }

        #progressbar {
            background-color: rgb(7, 70, 33);
            border-radius: 13px;
            /* (height of inner div) / 2 + padding */
            padding: 3px;
        }

        #progressbar > div {
            background-color: green;
            width: 0%;
            /* Adjust with JavaScript */
            height: 20px;
            border-radius: 10px;
            color:blanchedalmond;
        }
        
        .addbutton {
            grid-area: d;
        }

        .addbutton button{
            width: 20vw;
        }

        .addbutton button:hover {
            background-color: #078c57;
        }

        #dialog-books {
            transform: scale(0);
            text-align: center;
            grid-area: e;
            margin-left: 26vw;
            margin-right: 26vw;
            margin-bottom: 10vh;
        }

        .book-form {
            position: relative;
            padding: 40px 30px;
            background-color: rgba(46, 43, 43, 0.622); 
            box-shadow: 0 0 10px ;
            border-radius: 20px;
            text-align: center;
        }

        .book-field {
            position: relative;
            height: 90px;
        }
        .book-field input{
            position: relative;
            color: blanchedalmond;
            height: 40px;
            width: 350px;
            font-size: 16px;
            border: none;
            outline: none;
            transition: all 0.2s ease;
            border-bottom: 2px solid blanchedalmond;
            border-top: 2px solid transparent;
        }
        .book-field ::placeholder{
            color: blanchedalmond;
        }
        input[type="text"], input[type="number"] {
          background-color: transparent;
          color: white;
        }
        .book-field button{
            position: relative;
            color: blanchedalmond;
            background-color: rgb(7, 70, 33);
            color: blanchedalmond;
            height: 50px;
            width: 350px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            
        }
        .book-field button:hover {
            background-color: #078c57;
        }
        .closebutton button{
            color:blanchedalmond;
            /*background-color: rgba(7, 70, 33,0.622);*/
            background-color: transparent;
            height: 30px;
            width: 30px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            outline: none;
        }

        .closebutton button:hover {
            background-color: red;
        }

        .closebutton {
            position: fixed;
            right: 0;
            top: 0;
        }

        #dialog-pages {
            grid-area: e;
            transform: scale(0);
            text-align: center;
            margin-left: 26vw;
            margin-right: 26vw;
            margin-bottom: 10vh;
        }
        #dialog-pages h2 {
            color: blanchedalmond;
            height: 40px;
            font-size: 16px;
            text-align: center;
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function(){
            //var obj = $("<tr> <td> <div id='progressbar'><button class='progressbutton'>0%</button></div> </td> </tr>");

            $("#want_table input[type='checkbox']").click(function(){
                e = $("#row"+this.value);
                obj = $("<tr> <td> <div id='progressbar'><button class='progressbutton'>0%</button></div> </td> </tr>");
                $(e).fadeOut();
                setTimeout(() => {
                    $("#current_table").append($(e));
                    $("#current_table").append(obj);
                    $(e).fadeIn();
                }, 400); //400 is the default duration for fadeOut
                $(this).prop("checked",false);
                
                //need to change the id 

                obj.click(function(){
                    /*$("progressbar > div").css('width',)*/
                    $("#dialog-pages").css('transform','scale(1)');
                    $("#dialog-books").css('transform','scale(0)');
                    $(".addbutton").css('transform','scale(1)');
                    document.getElementById("bookname").value = e.text();
                    document.getElementById("updatetitle").innerHTML = "Update your current page for ".concat(e.text());
                });
            });

            $("#current_table input[type='checkbox']").click(function(){
                var e = $("#row"+this.value);
                $(e).fadeOut();
                setTimeout(() => {
                    $("#read_table").append($(e));
                    $(e).fadeIn();
                }, 400); //400 is the default duration for fadeOut
                $(this).prop("checked",false); 
            });

            $(".addbutton button").click(function(){
                $("#dialog-books").css('transform','scale(1)');
                $(".addbutton").css('transform','scale(0)');
                $("#dialog-pages").css('transform','scale(0)');
            });
            
            $(".closebutton button").click(function(){
                $("#dialog-books").css('transform','scale(0)');
                $(".addbutton").css('transform','scale(1)');
                $("#dialog-pages").css('transform','scale(0)');
            });

        })
    </script>
</head>
<body>
    <?php include("navbar.php");?>
    
    <div class="grid ">
        <div class="read grid-col">
            <table class="read_table table" id="read_table">
                <th>
                    <h2>Read</h2><hr>
                </th>
                <?php
                    require("db_utils.php");
                    $dbconn = connect();
                    if(isset($_POST["book_name"]) && isset($_POST["author_name"]) && isset($_POST["num_pages"]) && isset($_SESSION["id"])){
                        $add = book_addition($_SESSION["id"], $_POST["book_name"], $_POST["author_name"], $_POST["num_pages"]);
                        if($add == -1) echo("<script>alert('Libro Già Inserito');</script>");
                        else echo("<script>alert('Libro Inserito Correttamente');</script>");
                    }
                    $query = "select book from books where id ='".$_SESSION["id"]."' and finished is true";
                    $result = pg_query($query);
                    $num = 0;
                    while($line = pg_fetch_array($result , null , PGSQL_ASSOC)) {
                        foreach($line as $row) {
                            echo("<tr id='row3".$num."'>
                                <td>".$row."</td>
                                <td><input type='checkbox' value='3".$num."'></td>
                                </tr>");
                            $num++;
                        }
                    }
                    pg_close($dbconn);
                ?>
            </table>
        </div>

        <div class="current grid-col">
            <table class="current_table table" id="current_table">
                <th>
                    <h2>Reading</h2><hr>
                </th>
                <?php /*da cambiare con un ciclo che itera sui risultati della query risultante dal database dei libri*/
                    $dbconn = connect();
                    $query = "select book from books where id ='".$_SESSION["id"]."' and current_page <> 0";
                    $result = pg_query($query);
                    $num = 0;
                    while($line = pg_fetch_array($result , null , PGSQL_ASSOC)) {
                        foreach($line as $row) {
                            echo("<tr id='row2".$num."'>
                                <td>".$row."</td>
                                <td><input type='checkbox' value='3".$num."'></td>
                                </tr>");
                            $num++;
                        }
                    }
                    pg_close($dbconn);
                ?>
            </table>
        </div>

        <div class="want grid-col">
            <table class="want_table table" id="want_table">
                <th>
                    <h2>Want to Read</h2><hr>
                </th>
                <?php
                    $dbconn = connect();
                    $query = "select book from books where id ='".$_SESSION["id"]."' ";
                    $result = pg_query($query);
                    $num = 0;
                    while($line = pg_fetch_array($result , null , PGSQL_ASSOC)) {
                        foreach($line as $row) {
                            echo("<tr id='row1".$num."'>
                            <td>".$row."</td>
                            <td><input type='checkbox' value='1".$num."'></td>
                            </tr>");
                            $num++;
                        }
                    }
                    pg_close($dbconn);
                ?>
            </table>
        </div>

        <div class="addbutton button">
            <button>Add a Book</button>
        </div>
        <div id="dialog-books">
            <form class="book-form" method="post" action="updatepages.php">
                <div class="book-field">
                    <input type="text" placeholder="Enter Book's Name" name="book_name" required>
                </div>
                <div class="book-field">
                    <input type="text" placeholder="Enter Author's Name" name="author_name" required>
                </div>
                <div class="book-field">
                    <input type="number" placeholder="Enter Number of pages" name="num_pages" required>
                </div>
                <div class="book-field button"> 
                    <button type="submit">Add Book</button>
                </div>
                <div class="closebutton">
                    <button type="reset">X</button>
                </div>
            </form>
        </div>

        <div id="dialog-pages">
            <form class="book-form" method="post" action="readinglist.php">
                <input name="bookname" id="bookname" type="text" hidden></input>
                <h2 id="updatetitle"></h2>
                <div class="book-field">
                    <input type="number" placeholder="New page" name="current_page" id="current_page" required>
                </div>
                <?php
                    include("updatepages.php");
                ?>
                <div class="book-field button">
                    <button type="submit">Update</button>
                </div>
                <div class="closebutton">
                    <button type="reset">X</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>