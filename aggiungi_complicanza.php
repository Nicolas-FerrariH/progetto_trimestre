<?php

require('_config.php');
require('_dbFunc.php');
$conn=db_connect();

$idP=$_GET["idP"];
$idPicc=$_GET["idPicc"];
$dp=$_GET["dp"];
$dc=$_GET["datacomp"];
$desc=$_GET["desc"];

insert_comp($conn, $idP,$idPicc,$dp,$dc,$desc);

header("Location: picc.php?idP=$idP&idPicc=$idPicc&dp=$dp")
?>