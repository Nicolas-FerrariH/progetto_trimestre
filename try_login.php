<?php
require('_config.php');
require("_dbFunc.php");
$conn=db_connect();

$username=$_GET["username"];
$password=$_GET["pw"];

try_login($conn,$username,$password);


?>
