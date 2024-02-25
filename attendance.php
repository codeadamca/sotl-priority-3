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

</body>
</html>