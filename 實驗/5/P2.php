<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bank2</title>
</head>
<body>
    <?php if (!isset ($_GET["Send"])){ ?>


        <form action="bank2.php">
            <input type="hidden" name="Send" value="TURE">
            <fieldset>
                <legend>个人资料</legend>
                请输入姓名：&nbsp;&nbsp;&nbsp; <input type="text" name="name"><br>
                请输入E-Mail：&nbsp;&nbsp;&nbsp; <input type="text" name="mail"><br>
            </fieldset>

            <fieldset>
                <legend>计算存款本息和</legend>
                请输入本金：&nbsp;&nbsp;&nbsp; <input type="text" name="cache">
                请输入年利率：&nbsp;&nbsp;&nbsp; <input type="text" name="rate">
                请输入月数：&nbsp;&nbsp;&nbsp; <input type="text" name="month">
            </fieldset>

            <input type="submit" value="提交">
            <input type="reset" value="重新输入">
        </form>


        <?php
        }
        else{
            $name=$_GET["name"];
            $mail=$_GET["mail"];
            $cache=$_GET["cache"];
            $rate=$_GET["rate"];
            $month=$_GET["month"];


        echo "<h1>&nbsp;&nbsp;",$name,"(",$mail,")","&nbsp;&nbsp;你好！</h1>";
        echo "你的本金是&nbsp;&nbsp;&nbsp;CNY",$cache,"&nbsp;&nbsp;&nbsp;，年利率为&nbsp;&nbsp;&nbsp;",$rate,"&nbsp;&nbsp;&nbsp;月数是&nbsp;&nbsp;&nbsp;",$month,"&nbsp;&nbsp;&nbsp;本息和是&nbsp;&nbsp;&nbsp;",$cache+$cache*$rate*$month/12;
        ?>
        
    <?php } ?>
</body>
</html>