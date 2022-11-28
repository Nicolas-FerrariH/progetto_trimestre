<?php


require('_config.php');

function db_connect()
{
    global $servername, $username, $password, $dbname;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }
    return $conn;
}

function insert_paziente($conn, $nome,$cognome,$data)
{
    $sql = "INSERT INTO paziente (nome, cognome, dataNascita)
    VALUES ('$nome', '$cognome', '$data')";
    return $conn->query($sql);

}

function trylogin($conn,$user,$pw)
{
    $user=$conn->real_escape_string($user);
    $pw=$conn->real_escape_string($pw);
    $hash=password_hash($pw, PASSWORD_BCRYPT);
    if(password_verify($pw,$hash))
    {
        require("admin.php");
    }
    else
    { 
        echo "Errore username o Password errati";
        require("login.php");
    }
}

function register($conn,$user,$pw){
    $user=$conn->real_escape_string($user);
    $pw=$conn->real_escape_string($pw);
    $hash=password_hash($pw, PASSWORD_BCRYPT);
    $sql = "INSERT INTO admin (username, password) VALUES ('$user', '$hash')";
    return $conn->query($sql);
}

function SelectAllPazienti($conn)
{
    $sql="SELECT * FROM paziente order by Cognome";
    $result=$conn->query($sql);

    $rows=$result-> fetch_all(MYSQLI_ASSOC);
    return $rows;
}
function SelectAllPICC($conn,$idP)
{
    $sql="SELECT * FROM applicazione where idP='$idP'";
    $result=$conn->query($sql);

    $rows=$result-> fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function tipopicc($conn,$idPICC){
    $sql="SELECT tipo FROM picc where idPicc= '$idPICC'";
    $result=$conn->query($sql);
    $res=$result->fetch_assoc();
    $stringafinale= implode("", $res);
    return $stringafinale;
}