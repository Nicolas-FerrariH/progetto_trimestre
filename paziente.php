<?php
require('_config.php');
require('_dbFunc.php');
$conn=db_connect();
session_start();

$id=$_GET["id"];
$sql="SELECT * FROM paziente where idP='$id'";

$result=$conn->query($sql);
$paz=$result-> fetch_assoc();

$picc=SelectAllPICC($conn,$id);

?>
<?php require('_header.php');?>
        <div class="contain_paziente">
            <img src="img/login_Utente_Blu.jpg" alt="">
            <p>Nome:<?=$paz["nome"]?></p>
            <p>Cognome:<?=$paz["cognome"]?></p>
            <p>Data di Nascita:<?=$paz["dataNascita"]?></p>
            <a class="dx" href="nuovo_picc.php">Nuovo Picc</a>
        </div>
        <br>
        <div class="table_picc">
        <table>
                <tr>
                    <th>
                        Tipo PICC
                    </th>
                    <th>
                        Data Posizionamento
                    </th>
                    <th>
                        Data Rimozione
                    </th>
                    <th>
                        Causa Rimozione
                    </th>
                </tr>
                <?php foreach($picc as $pp){?>
                <tr>
                    <td>
                    <a href="PICC.php?id=<?=$pp["idP"]?>&pw=<?=$pp["dataPosizionamento"]?>"><?=tipopicc($conn,$pp["idPicc"])?></a>
                    </td>
                    <td>
                    <a href="PICC.php?id=<?=$pp["idP"]?>&pw=<?=$pp["dataPosizionamento"]?>"><?=$pp["dataPosizionamento"]?></a>
                    </td>
                    <td>
                    <a href="PICC.php?id=<?=$pp["idP"]?>&pw=<?=$pp["dataPosizionamento"]?>"><?=$pp["dataRimozione"]?></a>
                    </td>
                    <td>
                    <a href="PICC.php?id=<?=$pp["idP"]?>&pw=<?=$pp["dataPosizionamento"]?>"><?=$pp["causarimozione"]?></a>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
        
    </body>
</html>