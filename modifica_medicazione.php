<?php
session_start();
require('_config.php');
require('_dbFunc.php');
$conn=db_connect();


$idP=$_GET["idP"];
$idPicc=$_GET["idPicc"];
$dm=$_GET["dm"];

$medicazioneintera=SelMed($conn,$idP,$idPicc,$dm);

$tipomed=$medicazioneintera["tipo"];
$ecog=$medicazioneintera["ECOG"];
$nota=$medicazioneintera["nota"];
$dp=$medicazioneintera["dataPosizionamento"];

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
            <h1>Modifica Medicazione</h1>
            <form method="get" action="update_medicazione.php" autocomplete="off">
                
                <label>Data Medicazione:</label><br>
                <input type="date" name="dataMed" value="<?=$dm?>" readonly><br>
                
                <label>Tipo della Medicazione:</label><br>
                <select id="tipomed" name="tipomed">
                    <option value="Standard" <?php echo $tipomed=='Standard'?  "selected" : "";?>>Standard </option>
                    <option value="Non standard (nota)" <?php echo $tipomed=='Non standard (nota)'?  "selected" : "";?>>Non standard (inserire nota)</option>
                </select><br>
                
                <label>ECOG:</label><br>
                <select id="ecog" name="ecog" >
                    <option value="0" <?php echo $ecog=='0'?  "selected" : "";?>>0</option>
                    <option value="1" <?php echo $ecog=='1'?  "selected" : "";?>>1</option>
                    <option value="2" <?php echo $ecog=='2'?  "selected" : "";?>>2</option>
                    <option value="3" <?php echo $ecog=='3'?  "selected" : "";?>>3</option>
                </select><br>

                <label>Nota (solo se medicazione non standard): </label><br>
                <input type="text" name="nota" placeholder="Inserire la nota qua" value="<?=$nota?>" ><br>
                
                
                <input type="hidden" name="idP" value="<?=$idP?>"><br>
                <input type="hidden" name="idPicc" value="<?=$idPicc?>"><br>
                <input type="hidden" name="dp" value="<?=$dp?>"><br>

                <button type="submit">Modifica Medicazione</button><br>
            </form>
            <br>
            <a class="elimina" href="elimina_medicazione.php?idP=<?=$idP?>&idPicc=<?=$idPicc?>&dm=<?=$dm?>&dp=<?=$dp?>">Elimina Medicazione</a>
        
        </div>
        
    </body>
</html>