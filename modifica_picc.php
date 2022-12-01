<?php
session_start();
require('_config.php');
require('_dbFunc.php');
$conn=db_connect();

$idP=$_GET["idP"];
$idPicc=$_GET["idPicc"];
$dp=$_GET["dp"];

$tipo=tipopicc($conn,$idPicc);

$interaapp=SelApplicazione($conn,$idP,$idPicc,$dp);

$dr=$interaapp["dataRimozione"];
$motivo=$interaapp["causarimozione"];
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
            <h1>Modifica Picc</h1>
            <form method="get" action="update_picc.php" autocomplete="off">
                <label>Tipo del Picc:</label><br>
                <select id="tipo" name="tipo" >
                    <option value="minint monolume 4fr" <?php echo $tipo=='minint monolume 4fr'?  "selected" : "";?>>minint monolume 4fr </option>
                    <option value="alfamed monolume 4fr" <?php echo $tipo=='alfamed monolume 4fr'?  "selected" :  "";?>>alfamed monolume 4fr</option>
                    <option value="bow monolume 4fr" <?php echo $tipo=='bow monolume 4fr'?  "selected" :  "";?>>bow monolume 4fr</option>
                    <option value="bow bilume 5fr" <?php  echo $tipo=='bow bilume 5fr'?  "selected" :  "";?>>bow bilume 5fr</option>
                </select><br>

                <label>Data di posizionamento:</label><br>
                <input type="date" name="datapos" value="<?=$dp?>" required><br>
                
                <label>Data di rimozione:</label><br>
                <input type="date" name="datarim" value="<?=$dr?>"><br>
                
                <label>Motivo della rimozione:</label><br>
                <select id="motivo" name="motivo" >
                    <option value="NULL" default>-</option>
                    <option value="fine uso" <?php echo ($motivo=='fine uso')?  "selected" : "";?>>fine uso</option>
                    <option value="complicanze infettive" <?php echo ($motivo=='complicanze infettive')?  "selected" : "";?>>complicanze infettive</option>
                    <option value="tromboflebiti" <?php echo ($motivo=='tromboflebiti')?  "selected" : "";?>>tromboflebiti</option>
                    <option value="malfunzionamento" <?php echo ($motivo=='malfunzionamento')?  "selected" : "";?>>malfunzionamento</option>
                    <option value="dislocazione accidentale" <?php echo ($motivo=='dislocazione accidentale')?  "selected" : "";?>>dislocazione accidentale</option>
                </select><br>

                <input type="hidden" name="idP" value="<?=$idP?>"><br>
                <button type="submit">Modifica Picc</button><br>
            </form>
        </div>
        
    </body>
</html>