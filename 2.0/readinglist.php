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
            display:grid ;
            grid-template:
            'a b c';
            text-align: center;
            column-gap: 70px;
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
            position: relative;
            padding: 190px 180px;
            background-color: rgba(46, 43, 43, 0.522); 
            box-shadow: 0 0 10px;
            border-radius: 30px;
            height: 70vh;
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
        .table {
            width: auto;
            font-size: 20px;
            font-weight: 300;  
            padding: 20px;
            color:blanchedalmond;
            table-layout: auto;
        }

        input[type="checkbox"] {
            background:blanchedalmond;
        }
        
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function(){
            $("input[type='checkbox']").click(function(){
                e = document.getElementById("row"+this.value);
                $("#row"+this.value).fadeOut();
                setTimeout(() => {
                    $("#current_table").append($("#row"+this.value));
                    $("#row"+this.value).fadeIn();
                }, 400); //400 is the default duration for jquery fadeOut
            });
        })
    </script>
</head>
<body>
    <?php include("navbar.php"); ?>

    <div class="grid ">
        <div class="read grid-col">
            <table class="read_table table">
                <th>
                    <h2>Read</h2><hr>
                </th>
                <?php
                    for($i = 0; $i < 3; $i++){
                        echo("<tr id=row1".$i.">
                                <td>Libro ".$i."</td>
                                <td><input type='checkbox' value='1".$i."'></td>
                            </tr>");
                    }
                ?>
            </table>
        </div>
        <div class="current grid-col">
            <table class="current_table table" id="current_table">
                <th>
                    <h2>Reading</h2><hr>
                </th>
                <?php
                    for($i = 0; $i < 3; $i++){
                        echo("<tr id=row2".$i.">
                                <td>Libro ".$i."</td>
                                <td><input type='checkbox' value='2".$i."'></td>
                            </tr>");
                    }
                ?>
            </table>
        </div>
        <div class="want grid-col">
            <table class="want_table table">
                <th>
                    <h2>Want to Read</h2><hr>
                </th>
                <?php
                    for($i = 0; $i < 3; $i++){
                        echo("<tr id=row3".$i.">
                                <td>Libro ".$i."</td>
                                <td><input type='checkbox' value='3".$i."'></td>
                            </tr>");
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>