<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>delete message</title>
    <style>
        *{
            color: white;
        }
        body{
            background-color: black;
        }
        input{
            color: black;
        }
    </style>
</head>
<body>
    <div style="text-align: right">
        <?php
        if (!isset($_COOKIE["username"])){
            echo "你尚未登录，请<a href='login.html'>登录/注册</a>";
        }
        else{
            $username=$_COOKIE["username"];
            echo "你好，<a href='dashboard.php'>$username</a>";
        }
        ?>
    </div>
    <h1 style="text-align: center;background-color: blue;padding: 20px">选 择 你 要 删 除 的 帖 子</h1>
    <h3><a href="dashboard.php"><--返回</a></h3>

    <?php
        require_once ("dbtool.inc");
        $link=conDB();
        $records_per_page=10;

        if (isset($_GET["page"])){$page=$_GET["page"];}
        else {$page=1;}

        $sql="SELECT * FROM message ORDER BY date DESC";
        $result=mysqli_query($link,$sql);

        $total_records=mysqli_num_rows($result);
        $total_pages=ceil($total_records/$records_per_page);

        $start_record=$records_per_page*($page-1);

        mysqli_data_seek($result,$start_record);

        $j=1;
        echo "<form method='post' action='del-succ.php'>";
        echo "<table border='1' width='1500' align='center'>";
        echo "<tr style='text-align: center'><td>选择</td><td>标题</td><td>用户</td><td>时间</td><td>类别</td></tr>";
        while ($rows=mysqli_fetch_object($result) and $j<=$records_per_page){
            echo "<tr>";
            echo "<td><input name='select' type='radio' value='$rows->id'></td>";
            echo "<td><a href='show-mess.php?id=$rows->id'>",$rows->title,"</a></td>";
            echo "<td>",$rows->username,"</td>";
            echo "<td>",$rows->date,"</td>";
            echo "<td>",$rows->type,"</td>";
            echo "<tr>";
            $j++;
        }
        echo "</table>";

        echo "<p align='center'>";
        if ($page>1){echo "<a href='select-change.php?page=".($page-1)."'>上一页&nbsp;&nbsp;&nbsp;</a>";}
        for ($i=1;$i<=$total_pages;$i++){
            if ($i==$page){echo "&nbsp;&nbsp;&nbsp;$i&nbsp;&nbsp;&nbsp;";}
            else {echo "<a href='select-change.php?page=$i'>&nbsp;&nbsp;&nbsp;$i&nbsp;&nbsp;&nbsp;</a>";}
        }
        if (($page<$total_pages)){echo "<a href='select-change.php?page=".($page+1)."'>&nbsp;&nbsp;&nbsp;下一页</a>";}
        echo "</p>";
        echo "<div align='center'><input type='submit' value='删除'></div>";
        echo "</form>";
    ?>
</body>
</html>
