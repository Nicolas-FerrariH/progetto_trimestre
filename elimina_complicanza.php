<?php

require('_config.php');
require('_dbFunc.php');
$conn=db_connect();

$idP=$_GET["idP"];
$idPicc=$_GET["idPicc"];
$dc=$_GET["dc"];
$dp=$_GET["dp"];
delete_comp($conn, $idP,$idPicc,$dc);


header("Location: picc.php?idP=$idP&idPicc=$idPicc&dp=$dp");

?>