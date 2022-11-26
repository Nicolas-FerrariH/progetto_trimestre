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

function try_login($conn,$username,$password){

    $user=$conn->real_escape_string($username);
    $pw=$conn->real_escape_string($password);
    $hash=password_hash($pw, PASSWORD_BCRYPT);
    if(password_verify($pw,$hash))
    {
        require("admin.php");
    }
    else
    { 
        echo "Errore Username o Password errati";
        require("login.php");
    }
}