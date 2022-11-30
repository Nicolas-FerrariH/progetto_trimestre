<?php

require('_config.php');
require('_dbFunc.php');
$conn=db_connect();

$tipo=$_GET["tipo"];
$dp=$_GET["datapos"];
$dr=$_GET["datarim"];
$motivo=$_GET["motivo"];
$idP=$_GET["idP"];

update_picc($conn, $idP,$tipo,$dp,$dr,$motivo);

header("Location: paziente.php?id=$idP")
?>