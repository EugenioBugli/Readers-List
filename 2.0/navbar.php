<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$SESSION_TIME = 20*60;
if(isset($_SESSION["time"]) && time() - $_SESSION["time"] > $SESSION_TIME){
    //session expired
    session_destroy();
    session_abort();
    header("Refresh:0"); //needed because $_SESSION is still available until refresh
}else{
    $_SESSION["time"] = time();
}
?>
<style> /* responsiveness */
    @media screen and (min-width: 1001px) {
        .header{
            position: fixed;
            padding: 20px 100px;
        }

        li {
            float: left;
        }
    }

    @media screen and (max-width: 1000px) and (min-width: 401px) {
        .header{
            position: absolute;
            padding-left: 100px;
            padding-right: 50px;
        }
        
        li {
            float: none;
        }

        body{
            padding-top: 205px;
        }

        .username{
            transition: 0s;
            padding-left: 60px;
        }

        .dropdown-menu{
            padding-left: 40px;
        }
    }

    @media screen and (max-width: 400px) {
        .title{
            display: none;
        }

        .header{
            position: absolute;
            padding-left: 100px;
            padding-right: 50px;
            height: 195px;
        }

        body{
            padding-top: 205px;
        }
        
        li {
            float: none;
        }

        .username{
            transition: 0s;
            padding-left: 60px;
        }

        .dropdown-menu{
            display: none;
        }

        ul {
            position: absolute;
            top: 0px;
            right: 0px;
        }
    }
</style>
<style>
    .header {
        top: 0;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 99;
        background-color: rgb(7, 70, 33);
    }

    .title {
        color: blanchedalmond;
    }
    .navigation a{
        position: relative;
        font-size: 1.1em;
        color:blanchedalmond;
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
        background-color: blanchedalmond;
        transform-origin: right;
        transform: scaleX(0);
        transition: tranform 0.5s;
    }
    
    .navigation a:hover::after {
        transform: scaleX(1);
    }
    
    li a {
        display: block;
        text-align: right;
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
        border-radius: 10px;
        padding-top: 10px;
        padding-right: 20px;
        list-style-type: none;
        width: auto;
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
    echo("<div class='header'>
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
                        <a class='navbtn username' href='profile.php'>".$_SESSION["username"]."</a>
                        <ul class='dropdown-menu'>
                            <li ><a href='logout.php' class='logout'>Logout</a></li>
                        </ul>
                    </li>");
    }
     echo("     </ul>
            </div>
        </div>");
?>