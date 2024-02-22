<?php

include('connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills Data Dunmp</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<body>

    <script>

    const xAxis = [1,2,3,4,5,6,7,8,9,10,11,12,13,14];

    </script>
    
    <h1>Priority 3 Results</h1>

    <?php

    $query = 'SELECT students.*,(
            SELECT COUNT(*)
            FROM skill_student
            WHERE student_id = students.id
        ) AS skill_count
        FROM students
        INNER JOIN skill_student
        ON students.id = skill_student.student_id
        WHERE students.id NOT IN(100024, 100023)
        GROUP BY students.id
        HAVING skill_count > 35
        ORDER BY students.id';
    $students = mysqli_query($connect, $query);

    while($student = mysqli_fetch_assoc($students))
    {
        echo '<hr>';
        echo '<h2>Student #'.$student['id'].'</h2>';

        $query = 'SELECT *
            FROM skills
            ORDER BY name';
        $skills = mysqli_query($connect, $query);

        echo '<canvas id="chart-'.$student['id'].'" style="width:600px; height:400px;"></canvas>';

        echo '<table border="1" cellpadding="3" cellspacing="0">';

        $data = [];

        while($skill = mysqli_fetch_assoc($skills))
        {

            echo '<tr>';
            echo '<td width="60">'.$skill['name'].'</td>';
            echo '<td width="30" style="background-color:'.$skill['colour'].';"></td>';

            $query = 'SELECT *
                FROM skill_student
                WHERE student_id = "'.$student['id'].'"
                AND skill_id = "'.$skill['id'].'"
                ORDER BY created_at';
            $links = mysqli_query($connect, $query);

            $row = [];

            while($link = mysqli_fetch_assoc($links))
            {

                echo '<td width="20">'.$link['rating'].'</td>';
                array_push($row, $link['rating']);

            }

            array_push($data, array(
                'data' => $row,
                'colour' => $skill['colour'],
                'fill' => false
            ));

            echo '</tr>';

        }

        echo '</table>';

        echo '<script>

            new Chart("chart-'.$student['id'].'", {
                type: "line",
                data: {
                    labels: xAxis,
                    datasets: [';

        
        foreach($data as $key => $row)
        {
            if($key > 0) echo ',';
            echo '{
                data: ['.implode(',', $row['data']).'],
                borderColor: "'.$row['colour'].'",
                fill: false
            }';

        }

        echo ']
                },
                options: {
                    legend: {display: false}
                }
            });

            </script>';

    }

    ?>

</body>
</html>