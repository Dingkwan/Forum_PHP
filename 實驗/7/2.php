<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>compare</title>
</head>
<body>
    
    <h3>请输入4个整数</h3>
    <form action="2.php">
        <input type="hidden" name="send" value="TRUE">
        <table border="1">
            <tr><td>数1</td><td><input type="text" name="x[]"></td></tr>
            <tr><td>数2</td><td><input type="text" name="x[]"></td></tr>
            <tr><td>数3</td><td><input type="text" name="x[]"></td></tr>
            <tr><td>数4</td><td><input type="text" name="x[]"></td></tr>
        </table>
        <input type="submit" value="提交">
        <input type="reset" value="重新输入">
    </form>
    <br>
    <br>
    <br>
    <?php
        if (isset($_GET["send"])){
            $sorted=sort($_GET["x"]);   //升序排序
            echo "排序后的结果为：<br>";
            foreach ($_GET["x"] as $val){
                echo $val,"  ";
            }
        }
    ?>

</body>
</html>