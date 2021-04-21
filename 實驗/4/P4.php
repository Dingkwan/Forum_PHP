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

    $num=array(10,4,15,7,44,56,6,13,20,78);

    function sortUp($array){
        $temp=0;
        for ($i=1;$i<=count($array)-1;$i++){
            for ($j=1;$j<=count($array)-$i;$j++){
                if($array[$j-1]>$array[$j]){
                    $temp=$array[$j-1];
                    $array[$j-1]=$array[$j];
                    $array[$j]=$temp;
                }
            }
        }
        return $array;
    }

    function binsearch($target,$array){
        $c=count($array);
        $lower=0;
        $high=$c-1;
        while($lower<=$high){
            $middle=intval(($lower+$high)/2);
            if($array[$middle]>$target){
                $high=$middle-1;
            } elseif($array[$middle]<$target){
                $lower=$middle+1;
            } else{
                return $middle;
            }
        }
        return "CAN NOT FIND";
    }
    
    echo "Array:<br>";
    foreach ($num as $v){
        echo $v," ";
    }
    echo "<br>";

    $sortedNum=sortUp($num);
    echo "Sorted array:<br>";
    foreach ($sortedNum as $v){
        echo $v," ";
    }
    echo "<br>";

    $findTarget=20;
    echo "Target ",$findTarget," in array[",binsearch($findTarget,$sortedNum),"]."
    ?>
</body>
</html>