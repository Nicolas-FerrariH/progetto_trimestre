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
            <h1>Nuovo PICC</h1>
            <form method="get" action="aggiungi_picc.php" autocomplete="off">
                <label>Tipo del Picc:</label>
                <select id="tipo" name="tipo">
                    <option value="minint monolume 4fr ">minint monolume 4fr </option>
                    <option value="alfamed monolume 4fr">alfamed monolume 4fr</option>
                    <option value="bow monolume 4fr">bow monolume 4fr</option>
                    <option value="bow bilume 5fr">bow bilume 5fr</option>
                </select><br>
                
                <label>Cognome:</label>
                <input type="text" name="cognome" value="" placeholder="Cognome" required><br>
                <label>Data di nascita:</label>
                <input type="date" name="date" value="" required><br>

                <button type="submit">Crea Paziente</button><br>
            </form>
        </div>
        
    </body>
</html>