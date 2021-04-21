<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P3</title>
</head>
<body>
    <?php

    $prime=array();

    function isPrime($start,$end){
        if ($start>=2 && $end>=2 && $start<=$end){   //判断输入参数是否合乎规则（全大于2、后数比前数大）
            global $prime;
            while ($start<=$end){
                $i=2;
                while ($i<=sqrt($start)){
                    if ($start%$i==0){break;}        //可以和一个数整除则跳过
                    $i+=1;
                }
                if ($i>sqrt($start)){
                    $prime[]=$start;
                }
                $start+=1;
            }
            return $prime;
        }
        else echo "参数规则错误";
    }

    function disPerRow($array,$perrow){
        $count=0;
        foreach ($array as $val){
            echo $val;
            $count+=1;
            if ($count%$perrow==0){
                echo "<br>";
            }
            else echo " ";
        }
    }

    isPrime(2,1000);
    disPerRow($prime,10);
    ?>
</body>
</html>