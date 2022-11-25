<?php
require("_dbFunc.php");
$conn=db_connect();

?>

<html>
    <head>
        <title>Ambulatorio PICC</title>
        <link rel="stylesheet" href="stile.css">
    </head>
    <body>
        <div class="nav_index">
            <a class="sx" href="index.php">Ambulatorio PICC</a>
            <a class="dx" href="login.php">Login</a>
        </div>
        <a class="cont_button" href="user.php">
                Statistiche Pubbliche
        </a>
        
    </body>
</html>