<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P2</title>
</head>
<body>
    <?php
    
    $Score=array(
        array(5,7.7,8),
        array(8.8,5.8,8),
        array(6,9,8.1),
        array(7.6,8.5,9.5),
        array(9,9,9.2),
        array(4,6.3,7.9),
        array(8.2,7,9.6),
        array(9.1,8.5,8.9)
    );


    //总分
    function getTotalScore($array){
        $Total=0;
        for ($i=0;$i<=7;$i++){
            for ($j=0;$j<=2;$j++){
                $Total+=$array[$i][$j];
            }
        }
        return $Total;
    }

    //总分平均分
    function getAvgScore($totalScore){
        return $totalScore/8;
    }

    //每个学生的总分
    function getEachTotalScore($array,$stu_num){
        $Total=0;
        for ($i=0;$i<=2;$i++){
            $Total+=$array[$stu_num-1][$i];
        }
        return $Total;
    }

    //每个学生的平均分
    function getEachAvgScore($totalScore){
        return $totalScore/3;
    }

    //每一轮的平均分
    function getRoundTotalScore($array,$round){
        $Total=0;
        for ($i=0;$i<=7;$i++){
            $Total+=$array[$i][$round-1];
        }
        return $Total;
    }

    //输出每个学生分数
    function printStu($array){
        for ($i=0;$i<=7;$i++){
            echo "<tr>";
            echo "<td>学生",$i+1,"</td>";
            for ($j=0;$j<=2;$j++) {
                echo "<td>",$array[$i][$j],"</td>";
            }
            echo "<td>",getEachTotalScore($array,$i+1),"</td>";
            echo "<td>",getEachAvgScore(getEachTotalScore($array,$i+1)),"</td>";
            echo "</tr>";
        }
    }

    echo "<table border='1'><tr><th>姓名</th><th>第1轮</th><th>第2轮</th><th>第3轮</th><th>总分</th><th>平均分</th></tr>";

    echo printStu($Score);

    echo "<tr>";
    echo "<td>总分</td>";
    for ($i=1;$i<=3;$i++){
        echo "<td>",getRoundTotalScore($Score,$i),"</td>";
    }
    echo "<td>",getTotalScore($Score),"</td>";
    echo "<td>",getEachAvgScore(getTotalScore($Score)),"</td>";
    echo "</tr>";



    echo "<tr>";
    echo "<td>平均分</td>";
    $avgTotal=0;
    for ($i=1;$i<=3;$i++){
        echo "<td>",getAvgScore(getRoundTotalScore($Score,$i)),"</td>";
        $avgTotal+=getAvgScore(getRoundTotalScore($Score,$i));
    }
    echo "<td>",$avgTotal,"</td>";
    echo "<td>",getEachAvgScore($avgTotal),"</td>";
    echo "</table>";
    ?>
</body>
</html>