<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P2</title>
</head>
<body>
    <?php
    $week="周一，周二，周三，周四，周五，周六，周日";
    $week=str_replace("周","星期",$week);
    $week=explode("，",$week);
    foreach ($week as $val){
        echo $val,"<br>";
    }
    ?>
</body>
</html>