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
            
        </div>

        <div id="med" class="stats">
        <h1>Statistiche Medicazioni</h1>
        </div>

        <div id="comp" class="stats">
            <h1>Statistiche Complicanze</h1>
            <canvas id="chartComp" style="width:100%;"></canvas>
        </div>


<script>
    var xValues = ["fine uso","complicanze infettive","tromboflebiti","malfunzionamento","dislocazione accidentale"];
    var yValues = [<?=conta_mot_rim($conn,'fine uso')?>, 
                    <?=conta_mot_rim($conn,'complicanze infettive')?>,
                    <?=conta_mot_rim($conn,'tromboflebiti')?>, 
                    <?=conta_mot_rim($conn,'malfunzionamento')?>, 
                    <?=conta_mot_rim($conn,'dislocazione accidentale')?>,0];
    var barColors = ["blue","blue","blue","blue","blue"];

    new Chart("chartComp", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{backgroundColor: barColors,data: yValues}]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
                text: "PICC rimossi per ogni motivazione"
            }
        }
    });
</script>

<script>
var xValues = [50,60,70,80,90,100,110,120,130,140,150];
var yValues = [7,8,8,9,9,9,10,11,14,14,15];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 6, max:16}}],
    }
  }
});
</script>
    </body>
</html>
