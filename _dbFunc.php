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

function insert_picc($conn, $idP,$idPicc,$datapos,$datarim,$motivorim)
{
    if($motivorim=='NULL'){
        $sql = "INSERT INTO `applicazione` (`idP`, `idPicc`, `dataPosizionamento`) 
        VALUES ('$idP', '$idPicc', '$datapos')";
    }
    else{
        $sql = "INSERT INTO `applicazione` (`idP`, `idPicc`, `dataPosizionamento`, `dataRimozione`, `causarimozione`) 
    VALUES ('$idP', '$idPicc', '$datapos', '$datarim', '$motivorim')";
    }
    
    return $conn->query($sql);
}
function insert_med($conn, $idP,$idPicc,$dp,$dm,$tipomed,$ecog,$nota)
{
    if($nota==""){
        $sql = "INSERT INTO `medicazione` (`idP`, `idPicc`, `tipo`, `ECOG`, `nota`, `dataMedicazione`, `dataPosizionamento`) 
        VALUES ('$idP', '$idPicc', '$tipomed', '$ecog', NULL, '$dm','$dp')";
    }
    else{
        $sql = "INSERT INTO `medicazione` (`idP`, `idPicc`, `tipo`, `ECOG`, `nota`, `dataMedicazione`, `dataPosizionamento`) 
        VALUES ('$idP', '$idPicc', '$tipomed', '$ecog', $nota, '$dm','$dp')";
    }
    
    return $conn->query($sql);
}
function insert_comp($conn, $idP,$idPicc,$dp,$dc,$desc)
{
    $sql = "INSERT INTO `complicanza` (`idP`, `idPicc`, `dataComplicanza`, `descrizione`, `dataPosizionamento`)
            VALUES ('$idP', '$idPicc', '$dc', '$desc', '$dp')";
    
    return $conn->query($sql);
}
function user_get_hash($conn,$user)
{
    $sql="SELECT password FROM admin where username='$user'";
    $result=$conn->query($sql);
        $res=$result-> fetch_assoc();
    $stringafinale= implode("", $res);
    return $stringafinale;
}

function trylogin($conn,$user,$pw)
{
    $user=$conn->real_escape_string($user);
    $pw=$conn->real_escape_string($pw);
    $hash = user_get_hash($conn,$user);
    if(password_verify($pw,$hash))
    {
        session_start();
        $_SESSION["user"]=$user;
        $_SESSION["pw"]=$pw;
        header('Location: admin.php');
    }
    else
    { 
        echo "Errore username o Password errati";
        header('Location: login.php');
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
    $sql="SELECT * FROM applicazione where idP='$idP' order by dataPosizionamento desc";
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

function ricercaidpicc($conn,$tipo){
    $sql="SELECT idPicc FROM picc where tipo='$tipo'";
    $result=$conn->query($sql);
    $res=$result->fetch_assoc();
    var_dump($res);
    $numeropicc= implode("", $res);
    return $numeropicc;
}

function userexist($conn,$user){
    $sql="SELECT * FROM admin where username= '$user'";
    $result=$conn->query($sql);
    $rows=$result-> fetch_all(MYSQLI_ASSOC);
    if(count($rows)>0){
        return true;
    }
    else{
        return false;
    }
}

function SelApplicazione($conn,$idP,$idPicc,$dp){
    $sql="SELECT * FROM applicazione where idP='$idP' and idPicc='$idPicc' and dataPosizionamento='$dp'";
    $result=$conn->query($sql);

    $row=$result->fetch_assoc();
    return $row;
}

function update_picc($conn, $idP,$idPicc,$dp,$dr,$motivo){
    
    $sql="UPDATE applicazione SET dataRimozione = '$dr', causarimozione = '$motivo'
    WHERE idP = '$idP' AND idPicc = '$idPicc' AND dataPosizionamento = '$dp'";
    
    $result=$conn->query($sql);
}

function SelMed($conn,$idP,$idPicc,$dp){
    
    $sql="SELECT * FROM medicazione where idP='$idP' and idPicc='$idPicc' and dataPosizionamento='$dp' order by dataMedicazione";
    $result=$conn->query($sql);

    $med=$result-> fetch_all(MYSQLI_ASSOC);
    return $med;
}
function SelComp($conn,$idP,$idPicc,$dp){
    $sql="SELECT * FROM complicanza where idP='$idP' and idPicc='$idPicc' and dataPosizionamento='$dp' order by dataComplicanza";
    $result=$conn->query($sql);

    $comp=$result-> fetch_all(MYSQLI_ASSOC);
    return $comp;
}