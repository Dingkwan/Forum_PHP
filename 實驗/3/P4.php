<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P4</title>
</head>
<body>
    <?php
    $course=array(
        array(1,"php",301,85),
        array(2,"asp",401,90),
        array(3,"java",203,75),
        array(4,"c++",304,100)
    );

    echo "<table border='1'><tr><th>课程编号</th><th>课程</th><th>地点</th><th>人数</th></tr>";
    for ($i=0;$i<=3;$i++){
        echo "<tr>";
        for($j=0;$j<=3;$j++){ 
            echo "<td>",$course[$i][$j],"</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>