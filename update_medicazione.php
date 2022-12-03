<?php

require('_config.php');
require('_dbFunc.php');
$conn=db_connect();

$idP=$_GET["idP"];
$idPicc=$_GET["idPicc"];
$dp=$_GET["dp"];
$dm=$_GET["dataMed"];
$tipomed=$_GET["tipomed"];
$ecog=$_GET["ecog"];
$nota=$_GET["nota"];

update_med($conn, $idP,$idPicc,$dp,$dm,$tipomed,$ecog,$nota);

header("Location: picc.php?idP=$idP&idPicc=$idPicc&dp=$dp")
?>