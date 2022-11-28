<?php
require('_config.php');
require('_dbFunc.php');



$user=$_GET["user"];
$pw=$_GET["pw"];
$conn=db_connect();


register($conn,$user,$pw);

require("login.php");
?>
