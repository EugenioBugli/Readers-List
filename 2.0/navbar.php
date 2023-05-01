<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$SESSION_TIME = 5*60;
if(isset($_SESSION["time"]) && time() - $_SESSION["time"] > $SESSION_TIME){
    //session expired
    session_destroy();
}else{
    $_SESSION["time"] = time();
}
?>
<style>
    header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 80px;
        padding: 20px 100px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 99;
        background-color: rgb(7, 70, 33);
        margin-bottom:100px;
    }

    .title {
        color: blanchedalmond;
    }
    .navigation a{
        position: relative;
        font-size: 1.1em;
        color:blanchedalmond;
        text-decoration: wavy;
        font-weight: 500;
        margin-left: 50px;
    }
    
    .navigation a::after{
        content: '';
        position: absolute;
        left: 0;
        bottom: -6px;
        width: 100%;
        height: 3px;
        background-color:blanchedalmond;
        transform-origin: right;
        transform: scaleX(0);
        transition: tranform 0.5s;
    }
    
    .navigation a:hover::after {
        transform: scaleX(1);
    }

    li {
        float: left;
    }
    li a {
        display: block;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        border-radius: 5px;
        transition: 0.3s;
    }

    li .navbtn:hover {
        background-color: #006110;
    }

    li .logout:hover {
        background-color: rgb(212, 0, 25);
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }
    ul .dropdown {
        display: inline-block;
    }

    ul .dropdown a {
        color: #fff;
        text-decoration: none;
    }

    .dropdown-menu {
        height: 0; /* set height to 0 to hide it */
        overflow: hidden;
        transition: opacity 0.3s ease-out;
        opacity: 0;
        position: absolute;
        /*background-color: rgb(1, 56, 15, 0.2);*/
        border-radius: 10px;
        padding: 10px;
        padding-right: 20px;
        list-style-type: none;
    }

    .dropdown:hover .dropdown-menu {
        opacity: 1;
        height: auto;
    }

    .logout {
        background-color: rgb(7, 70, 33);
    }
</style>
<?php
    echo("<header>
            <h1 class='title'>Reader's List</h1>
            <div class='navigation'>
                <ul>
                    <li><a class='navbtn' href='index.php'>Home</a></li>
                    <li><a class='navbtn' href='readinglist.php'>Reading List</a></li>
                    <li><a class='navbtn' href='aboutus.php'>About us</a></li>");
    if(!isset($_SESSION["username"])){
        echo("      <li><a class='navbtn' href='login.php'>Login</a></li>");
    }else{
        echo("
                    <li class='dropdown'>
                        <a class='navbtn' href='profile.php'>".$_SESSION["username"]."</a>
                        <ul class='dropdown-menu'>
                            <li ><a href='logout.php' class='logout'>Logout</a></li>
                        </ul>
                    </li>");
    }
     echo("     </ul>
            </div>
        </header>");
?>