<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>search type</title>
    <style>
        body{
            background-color: black;
        }
        *{
            color: white;
        }
    </style>
</head>
<body>

    <h1 style="text-align: center;background-color: blue;padding: 20px">搜 索 帖 子</h1>
    <h3><a href="forum.php"><--返回论坛</a></h3>

    <?php
        $type=$_POST["type"];

        require_once ("dbtool.inc");
        $link=conDB();


        $sql="SELECT * FROM message WHERE type='$type' ORDER BY date DESC";
        $result=mysqli_query($link,$sql);

        echo "<table border='1' width='1500' align='center'>";
        echo "<tr style='text-align: center'><td>标题</td><td>用户</td><td>时间</td><td>类别</td></tr>";
        while ($rows=mysqli_fetch_object($result)){
            echo "<tr>";
            echo "<td><a href='search-type.php?id=$rows->id'>",$rows->title,"</a></td>";
            echo "<td>",$rows->username,"</td>";
            echo "<td>",$rows->date,"</td>";
            echo "<td>",$rows->type,"</td>";
            echo "<tr>";
        }
        echo "</table>";

    ?>
</body>
</html>
