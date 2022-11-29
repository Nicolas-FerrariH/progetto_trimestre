<?php
session_start();

?>

<html>
    <head>
        <title>Ambulatorio PICC</title>
        <link rel="stylesheet" href="stilenuovi.css">
    </head>
    <body>
        <div class="nav_admin">
            <a href="admin.php"><img src="img/casetta.jpg" alt=""></a>
        </div>
        <div class="form_nuovo">
            <h1>Nuovo Paziente</h1>
            <form method="get" action="aggiungi_paziente.php" autocomplete="off">
                <label>Nome:</label>
                <input type="text" name="nome" value="" placeholder="Nome" required><br>
                <label>Cognome:</label>
                <input type="text" name="cognome" value="" placeholder="Cognome" required><br>
                <label>Data di nascita:</label>
                <input type="date" name="date" value="" required><br>

                <button type="submit">Crea Paziente</button><br>
            </form>
        </div>
        
    </body>
</html>