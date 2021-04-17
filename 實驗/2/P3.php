<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
    $r=3;       //圆的半径
    define("PI",3.14);
    echo '当前圆的半径是',$r,'<br>';
    echo '它的周长是',2*$r*PI,'<br>';
    echo '它的面积是',$r*pow(PI,2);
    ?>
</body>
</html>