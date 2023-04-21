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

li a:hover {
    background-color: #006110;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}
</style>
<?php
    echo("<header>
            <h1 class='title'>Reader's List</h1>
            <div class='navigation'>
                <ul>
                    <li><a href='index.php'>Home</a></li>
                    <li><a href='login.php'>Login</a></li>
                    <li><a href='readinglist.php'>Reading List</a></li>
                    <li><a href='../contacts.html'>About us</a></li>
                </ul>
            </div>
        </header>");
?>