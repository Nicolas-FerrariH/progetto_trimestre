<?php
require('_config.php');
require('_dbFunc.php');

$conn=db_connect();

$user=$_GET["user"];
$pw=$_GET["pw"];



if (userexist($conn,$user)){
    trylogin($conn,$user,$pw);
}
else{
    echo "Username inesistente";
    header('Location: login.php');
}


?>
