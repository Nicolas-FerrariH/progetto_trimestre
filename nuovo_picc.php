<?php
session_start();

$idP=$_GET["idP"];
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
                <label>Tipo del Picc:</label><br>
                <select id="tipo" name="tipo">
                    <option value="1">minint monolume 4fr </option>
                    <option value="2">alfamed monolume 4fr</option>
                    <option value="3">bow monolume 4fr</option>
                    <option value="4">bow bilume 5fr</option>
                </select><br>

                <label>Data di posizionamento:</label><br>
                <input type="date" name="datapos" value="" required><br>
                
                <label>Data di rimozione:</label><br>
                <input type="date" name="datarim" value="NULL"><br>
                
                <label>Motivo della rimozione:</label><br>
                <select id="motivo" name="motivo" >
                    <option value="NULL" default>-</option>
                    <option value="fine uso">fine uso</option>
                    <option value="complicanze infettive">complicanze infettive</option>
                    <option value="tromboflebiti">tromboflebiti</option>
                    <option value="malfunzionamento">malfunzionamento</option>
                    <option value="dislocazione accidentale">dislocazione accidentale</option>
                </select><br>

                <input type="hidden" name="idP" value="<?=$idP?>"><br>
                <button type="submit">Aggiungi Picc</button><br>
            </form>
        </div>
        
    </body>
</html>