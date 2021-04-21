<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P1</title>
</head>
<body>
    <?php

    function randomCode($length){
        $letters="1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";     //字符池
        $code="";
        for ($i=0;$i<$length;$i++){
            $code.=$letters[mt_rand(0,61)];     //建议使用mt_rand()替代rand()，mt_rand()的返回速度是rand()的4倍
        }
        return $code;
    }

    echo randomCode(8);
    ?>
</body>
</html>