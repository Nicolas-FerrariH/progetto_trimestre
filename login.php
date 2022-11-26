<?php
require('_config.php');
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
        </div>
        <div class="form_login">
            <img src="img/login_Utente.jpg" alt="Login">
            <br><br>
            <form method="get" action="try_login.php">
                <label>Username:</label> <br>
                <input type="text" name="username" value="" placeholder="Username " required><br>
                <label>Password:</label><br>
                <input type="text" name="pw" value="" placeholder="Password" required><br>
                <button type="submit">Login</button><br>
            </form>
        </div>
        
    </body>
</html>