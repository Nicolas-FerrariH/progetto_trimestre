<?php

require('_config.php');
require('_dbFunc.php');
$conn=db_connect();

$idP=$_GET["idP"];
$idPicc=$_GET["idPicc"];
$dp=$_GET["dp"];

delete_picc($conn, $idP,$idPicc,$dp);


header("Location: paziente.php?id=$idP")

?>