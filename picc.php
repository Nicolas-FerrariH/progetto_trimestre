<?php
session_start();
require('_config.php');
require('_dbFunc.php');
$conn=db_connect();

$idP=$_GET["idP"];
$idPicc=$_GET["idPicc"];
$dp=$_GET["dp"];
$tipo=tipopicc($conn,$idPicc);

$listaComp=SelComp($conn,$idP,$idPicc,$dp);
$listaMed=SelMed($conn,$idP,$idPicc,$dp);




$sql="SELECT * FROM paziente where idP='$idP'";
$result=$conn->query($sql);
$paz=$result-> fetch_assoc();
?>

<?php require('_header.php');?>
        <div class="contain_paziente">
            <img src="img/login_Utente_Blu.jpg" alt="">
            <p>Nome:<?=$paz["nome"]?>
            <p>Cognome:<?=$paz["cognome"]?></p>
            <p>Data di Nascita:<?=$paz["dataNascita"]?></p>
            <br>
            <p>Tipo PICC: <?=$tipo?></p>
            <p>Data posizionamento: <?=$dp?></p>
        </div>
        <br>
        <div class="table_med">
            <table>
                    <tr>
                        <th>
                            <a href="nuova_medicazione.php?idP=<?=$idP?>&idPicc=<?=$idPicc?>&dp=<?=$dp?>">Aggiungi medicazione</a>
                        </th>
                        <th>
                            Data Medicazione
                        </th>
                        <th>
                            Tipo
                        </th>
                        <th>
                            ECOG
                        </th>
                        <th>
                            Nota
                        </th>
                    </tr>
                    <?php foreach($listaMed as $m){?>
                    <tr>
                        <td></td>
                        <td>
                            <a href=""><?=$m["dataMedicazione"]?></a>
                        </td>
                        <td>
                            <a href=""><?=$m["tipo"]?></a>
                        </td>
                        <td>
                            <a href=""><?=$m["ECOG"]?></a>
                        </td>
                        <td>
                            <a href=""><?=$m["nota"]?></a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
        </div>
        <div class="table_comp">
            <table>
                    <tr>
                        <th>
                            <a href="nuova_complicanza.php?idP=<?=$idP?>&idPicc=<?=$idPicc?>&dp=<?=$dp?>">Aggiungi complicanza</a>
                        </th>
                        <th>
                            Data complicanza
                        </th>
                        <th>
                            Descrizione
                        </th>
                    </tr>
                    <?php foreach($listaComp as $c){?>
                    <tr>
                    <td></td>
                        <td>
                            <a href=""><?=$c["dataComplicanza"]?></a>
                        </td>
                        <td>
                            <a href=""><?=$c["descrizione"]?></a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
        </div>
        
    </body>
</html>