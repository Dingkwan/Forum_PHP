<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>

        *{
            color: white;
        }

        .title{
            font-size: 20px;
        }

        .in{
            margin-left: 20px;
            margin-right: 20px;
        }

        .bottom{
            text-align: center;
            margin: 5px;
            font-size: 12px;
            background-color: yellow;
        }

        .bottom a{
            color: black;
        }

        input{
            color: black;
        }

    </style>
    <title>forum</title>
</head>

<body style="background-color: black">

<!--  登录/注册  -->
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
    <h1 style="text-align: center;background-color: blue;padding: 20px"><i>欢 迎 来 到 你 条 论 坛</i></h1>

<!--搜索-->

    <hr>
    <div class="title">检索帖子：</div>

    <form class="in" method="post" action="search-title.php">
        按标题检索:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input style="width: 200px" type="text" name="search" placeholder="输入帖子的名称"/>
        <input type="submit" value="检索">
        <br>
    </form>

    <form class="in" method="post" action="search-type.php">
        按类别检索：&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="type" value="新闻" checked>新闻
        <input type="radio" name="type" value="体育">体育
        <input type="radio" name="type" value="游戏">游戏
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="检索">
    </form>

<!--发帖-->

    <hr>
    <div class="title" style="text-align: center"><a href="new-mess.php" style="color: orange">发帖</a></div>
    <hr>

<!--  读出帖子  -->

    <div class="title">最近帖子：</div>
    <?php
        require_once ("dbtool.inc");
        $link=conDB();

        $records_per_page=7;

        if (isset($_GET["page"])){$page=$_GET["page"];}
        else {$page=1;}

        $sql="SELECT * FROM `message` ORDER BY date DESC";
        $result=mysqli_query($link,$sql);

        $total_records=mysqli_num_rows($result);

        $total_pages=ceil($total_records/$records_per_page);

        $start_record=$records_per_page*($page-1);

        mysqli_data_seek($result,$start_record);

        $j=1;
        echo "<table border='1' width='1500' align='center'>";
        echo "<tr style='text-align: center'><td>标题</td><td>用户</td><td>时间</td><td>类别</td></tr>";
        while ($rows=mysqli_fetch_object($result) and $j<=$records_per_page){
            echo "<tr>";
            echo "<td><a href='show-mess.php?id=$rows->id'>",$rows->title,"</a></td>";
            echo "<td>",$rows->username,"</td>";
            echo "<td>",$rows->date,"</td>";
            echo "<td>",$rows->type,"</td>";
            echo "<tr>";
            $j++;
        }
        echo "</table>";


        echo "<p align='center'>";
        if ($page>1){echo "<a href='forum.php?page".($page-1)."'>上一页&nbsp;&nbsp;&nbsp;</a>";}
        for ($i=1;$i<=$total_pages;$i++){
            if ($i==$page){echo "&nbsp;&nbsp;&nbsp;$i&nbsp;&nbsp;&nbsp;";}
            else {echo "<a href='forum.php?page=$i'>&nbsp;&nbsp;&nbsp;$i&nbsp;&nbsp;&nbsp;</a>";}
        }
        if (($page<$total_pages)){echo "<a href='forum.php?page=".($page+1)."'>&nbsp;&nbsp;&nbsp;下一页</a>";}
        echo "</p>";
    ?>

    <br><br>
<!--  底部导航栏  -->
    <div class="bottom">
        <a href="https://tieba.baidu.com">百度贴吧</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="https://weibo.com">新浪微博</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="https://news.qq.com">腾讯新闻</a>
    </div>
</body>
</html>