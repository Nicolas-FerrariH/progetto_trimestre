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
            <form method="get" action="aggiungi_medicazione.php" autocomplete="off">
                
                <label>Data Medicazione:</label><br>
                <input type="date" name="dataMed" value=""><br>
                
                <label>Tipo della Medicazione:</label><br>
                <select id="tipomed" name="tipomed">
                    <option value="Standard">Standard </option>
                    <option value="Non standard (nota)">Non standard (inserire nota)</option>
                </select><br>
                
                <label>ECOG:</label><br>
                <select id="ecog" name="ecog" >
                    <option value="0" default>0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select><br>

                <label>Nota (solo se medicazione non standard): </label><br>
                <input type="text" name="nota" placeholder="Inserire la nota qua" value="" ><br>
                
                
                <input type="hidden" name="idP" value="<?=$idP?>"><br>
                <input type="hidden" name="idPicc" value="<?=$idPicc?>"><br>
                <input type="hidden" name="dp" value="<?=$dp?>"><br>

                <button type="submit">Aggiungi Medicazione</button><br>
            </form>
        </div>
        
    </body>
</html>