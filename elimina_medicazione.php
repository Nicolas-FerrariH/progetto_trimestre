<?php

require('_config.php');
require('_dbFunc.php');
$conn=db_connect();

$idP=$_GET["idP"];
$idPicc=$_GET["idPicc"];
$dm=$_GET["dm"];
$dp=$_GET["dp"];
delete_med($conn, $idP,$idPicc,$dm);


header("Location: picc.php?idP=$idP&idPicc=$idPicc&dp=$dp");

?>