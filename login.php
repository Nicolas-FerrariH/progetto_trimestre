<?php


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
            <form method="get" action="try_login.php" autocomplete="off">
                <label>Username:</label> <br>
                <input type="text" name="user" value="" placeholder="Username " required><br>
                <label>Password:</label><br>
                <input type="password" name="pw" value="" placeholder="Password" required><br>
                <button type="submit">Login</button><br>
            </form>
            <br>
            <a href="register.php">Registrazione Qui</a>
        </div>
        
    </body>
</html>