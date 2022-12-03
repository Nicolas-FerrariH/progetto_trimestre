<?php
session_start();
require('_config.php');
require('_dbFunc.php');
$conn=db_connect();


$idP=$_GET["idP"];
$idPicc=$_GET["idPicc"];
$dc=$_GET["dc"];

$compintera=SelComp($conn,$idP,$idPicc,$dc);

$tipomed=$compintera["dataComplicanza"];
$desc=$compintera["descrizione"];
$dp=$compintera["dataPosizionamento"];
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
            <h1>Modifica Complicanza</h1>
            <form method="get" action="update_complicanza.php" autocomplete="off">
                
                <label>Data Complicanza:</label><br>
                <input type="date" name="datacomp" value="<?=$dc?>" readonly><br>
                
                <label>Descrizione: </label><br>
                <input type="text" name="desc" value="<?=$desc?>" placeholder="Inserire qua la descrizione"><br>
                
                
                <input type="hidden" name="idP" value="<?=$idP?>"><br>
                <input type="hidden" name="idPicc" value="<?=$idPicc?>"><br>
                <input type="hidden" name="dp" value="<?=$dp?>"><br>

                <button type="submit">Modifica Complicanza</button><br>
            </form>
        </div>
        
    </body>
</html>