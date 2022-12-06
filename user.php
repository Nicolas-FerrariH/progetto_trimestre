<?php

require('_config.php');
require('_dbFunc.php');
$conn=db_connect();

?>
<html>
    <head>
        <title>Ambulatorio PICC</title>
        <link rel="stylesheet" href="stile.css">
        
    </head>
    <body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="#picc">PICC</a></li>
            <li><a href="#med">Medicazioni</a></li>
            <li><a href="#comp">Complicanze</a></li>
        </ul>

        <div id="picc" class="stats">
            <h1>Statistiche PICC</h1>
            <canvas id="chartPicc" style="width:100%;"></canvas>
        </div>

        <div id="med" class="stats">
        <h1>Statistiche Medicazioni</h1>
        </div>

        <div id="comp" class="stats">
            <h1>Statistiche Complicanze</h1>
            <canvas id="chartComp" style="width:100%;"></canvas>
        </div>


<script>
    var xValuesComp = ["fine uso","complicanze infettive","tromboflebiti","malfunzionamento","dislocazione accidentale"];
    var yValuesComp = [<?=conta_mot_rim($conn,'fine uso')?>, 
                    <?=conta_mot_rim($conn,'complicanze infettive')?>,
                    <?=conta_mot_rim($conn,'tromboflebiti')?>, 
                    <?=conta_mot_rim($conn,'malfunzionamento')?>, 
                    <?=conta_mot_rim($conn,'dislocazione accidentale')?>,0];
    var barColorsComp = ["blue","blue","blue","blue","blue"];

    new Chart("chartComp", {
        type: "bar",
        data: {
            labels: xValuesComp,
            datasets: [{backgroundColor: barColorsComp,data: yValuesComp}]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
                text: "PICC rimossi per ogni motivazione"
            }
        }
    });

    var xValuesPicc = ["meno di 3 mesi","tra i 3 e i 6 mesi","più di 6 mesi "];
    var yValuesPicc = [];
    var barColorsPicc = ["blue","blue","blue","blue","blue"];

    new Chart("chartPicc", {
        type: "bar",
        data: {
            labels: xValuesPicc,
            datasets: [{backgroundColor: barColorsPicc,data: yValuesPicc}]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
                text: "Quanti Picc per ogni durata"
            }
        }
    });
</script>


    </body>
</html>
