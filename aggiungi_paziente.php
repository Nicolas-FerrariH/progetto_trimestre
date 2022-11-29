<?php

require('_config.php');
require('_dbFunc.php');
$conn=db_connect();

$nome=$_GET["nome"];
$cognome=$_GET["cognome"];
$data=$_GET["date"];
insert_paziente($conn, $nome,$cognome,$data);

header('Location: admin.php')
?>