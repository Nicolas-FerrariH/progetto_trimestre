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