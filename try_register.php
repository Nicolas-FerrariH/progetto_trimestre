<?php
require('_config.php');
require('_dbFunc.php');



$user=$_GET["user"];
$pw=$_GET["pw"];
$conn=db_connect();


if (userexist($conn,$user)){
    echo "Username già esistente inserirne un altro";
    header('Location: register.php');
}
else{
    tryregister($conn,$user,$pw);
    header('Location: login.php');
}

?>
