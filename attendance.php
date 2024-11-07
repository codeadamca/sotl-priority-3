<?php

include('connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Data Dunmp</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <style>

    body {
        font-family: Arial;
    }
    table {
        border-top: 1px solid #ccc;
        border-left: 1px solid #ccc;
        border-collapse: collapse;
    }
    td {
        border-bottom: 1px solid #ccc;
        border-right: 1px solid #ccc;
    }
    tr {
        border: none;
    }

    </style>
</head>
<body>

    <script>

    const xAxis = [1,2,3,4,5,6,7,8,9,10,11,12,13];

    </script>
    
    <h1>Priority 3 Results</h1>

    <canvas id="chart-attendance" style="width:100%;max-width:600px; max-height:400px;" width="600" height="400"></canvas>

    <script>

    new Chart("chart-attendance", {
        type: "line",
        data: {
            labels: xAxis,
            datasets: [{
                borderColor: "#fa6d00",
                data: [95,90,88,85,93,90,93,93,93,83,93,95,95],
                fill: false
            },{
                borderColor: "#ff2b34",
                data: [93,100,71,36,36,71,43,50,57,43,57,43,50],
                fill: false
            }]
        },
        options: {
            legend: {display: false}
        }
    });

    </script>

    <table border="1" cellpadding="3" cellspacing="0">
        <tr>
            <td width="190">Winter 2023 (before WIC)</td>
            <td width="30" style="background-color:#ff2b34;"></td>
        </tr>
        <tr>
            <td width="190">Fall 2023 (WIC case study)</td>
            <td width="30" style="background-color:#fa6d00;"></td>
        </tr>
    </table>

</body>
</html>