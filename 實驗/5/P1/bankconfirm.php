<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bank confirm</title>
</head>
<body>
    <?php
    $name=$_GET["name"];
    $mail=$_GET["mail"];
    $cache=$_GET["cache"];
    $rate=$_GET["rate"];
    $month=$_GET["month"];


    echo "<h1>&nbsp;&nbsp;",$name,"(",$mail,")","&nbsp;&nbsp;你好！</h1>";
    echo "你的本金是&nbsp;&nbsp;&nbsp;CNY",$cache,"&nbsp;&nbsp;&nbsp;，年利率为&nbsp;&nbsp;&nbsp;",$rate,"&nbsp;&nbsp;&nbsp;月数是&nbsp;&nbsp;&nbsp;",$month,"&nbsp;&nbsp;&nbsp;本息和是&nbsp;&nbsp;&nbsp;",$cache+$cache*$rate*$month/12;
    ?>
    <br>
    <a href="bank.html">返回</a>
</body>
</html>