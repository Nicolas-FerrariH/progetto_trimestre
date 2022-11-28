<?php
$conn=db_connect();

$pazienti=SelectAllPazienti($conn);
?>
<?php require('_header.php');?>
        <div class="contain_admin">
            <a class="sx" href="nuovo_paziente.php">Nuovo Paziente</a>
            <img src="img/login_Utente_Blu.jpg" alt="">
        </div>

        <div class="table_pazienti">
            <table>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Nome
                    </th>
                    <th>
                        Cognome
                    </th>
                    <th>
                        Data di Nascita
                    </th>
                </tr>
                <?php foreach($pazienti as $p){?>
                <tr>
                    <td>
                    <a href="paziente.php?id=<?=$p["idP"]?>"><?=$p["idP"]?></a>
                    </td>
                    <td>
                    <a href="paziente.php?id=<?=$p["idP"]?>"><?=$p["nome"]?></a>
                    </td>
                    <td>
                    <a href="paziente.php?id=<?=$p["idP"]?>"><?=$p["cognome"]?></a>
                    </td>
                    <td>
                    <a href="paziente.php?id=<?=$p["idP"]?>"><?=$p["dataNascita"]?></a>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
        
    </body>
</html>