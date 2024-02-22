<?php

include('connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    
    <h1>Priority 3 Results</h1>

    <?php

    $query = 'SELECT students.*
        FROM students
        INNER JOIN skill_student
        ON students.id = skill_student.student_id
        GROUP BY students.id
        ORDER BY students.id';
    $students = mysqli_query($connect, $query);

    while($student = mysqli_fetch_assoc($students))
    {
        echo '<hr>';
        echo '<h2>'.$student['first'].' '.$student['last'].'</h2>';

        $query = 'SELECT *
            FROM skills
            ORDER BY name';
        $skills = mysqli_query($connect, $query);

        echo '<table border="1" cellpadding="3" cellspacing="0">';

        while($skill = mysqli_fetch_assoc($skills))
        {

            echo '<tr>';
            echo '<td>'.$skill['name'].'</td>';

            $query = 'SELECT *
                FROM skill_student
                WHERE student_id = "'.$student['id'].'"
                AND skill_id = "'.$skill['id'].'"
                ORDER BY created_at';
            $links = mysqli_query($connect, $query);

            while($link = mysqli_fetch_assoc($links))
            {

                echo '<td>'.$link['rating'].'</td>';

            }


            echo '</tr>';

        }

        echo '</table>';

    }

    ?>

</body>
</html>