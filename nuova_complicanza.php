<?php
session_start();

$idP=$_GET["idP"];
$idPicc=$_GET["idPicc"];
$dp=$_GET["dp"];


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
            <h1>Nuova Medicazione</h1>
            <form method="get" action="aggiungi_complicanza.php" autocomplete="off">
                
                <label>Data Complicanza:</label><br>
                <input type="date" name="datacomp" value=""><br>
                
                <label>Descrizione: </label><br>
                <input type="text" name="desc" value="NULL"><br>
                
                
                <input type="hidden" name="idP" value="<?=$idP?>"><br>
                <input type="hidden" name="idPicc" value="<?=$idPicc?>"><br>
                <input type="hidden" name="dp" value="<?=$dp?>"><br>

                <button type="submit">Aggiungi Complicanza</button><br>
            </form>
        </div>
        
    </body>
</html>