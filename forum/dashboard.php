<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
    <style>
        *{
            color: white;
        }

        h2{
            margin-right: 100px;
            margin-left: 100px;
        }

        div a{
            font-size: 25px;
        }

        .func_con{
            text-align: center;
            margin-top: 50px;
        }
        p a{
            color: aqua;
        }
    </style>
</head>
<body style="background-color: black">
    <?php
        $username=$_COOKIE["username"];
        $password=$_COOKIE["password"];
        $mail=$_COOKIE["mail"];
        $sex=$_COOKIE["sex"];
        $tel=$_COOKIE["tel"];
    ?>
    <h1>个人中心</h1>
    <h2><i><b><?php echo $username ?></b></i>，你好</h2>
    <hr>
    <p style="text-align: center"><b>你的个人信息</b>&nbsp;&nbsp;&nbsp;用户名：<?php echo $username; ?>&nbsp;&nbsp;&nbsp;密码：<?php echo $password; ?>&nbsp;&nbsp;&nbsp;电邮地址：<?php echo $mail; ?>&nbsp;&nbsp;&nbsp;性别：<?php echo $sex; ?>&nbsp;&nbsp;&nbsp;电话：<?php echo $tel; ?>&nbsp;&nbsp;&nbsp;<a href="forum.php">返回论坛</a></p>
    <div class="func_con">
        <a href="setmyinfo.php">1.修改个人信息</a>
        <br>
        <a href="my-mess.php">2.我发过的帖子</a>
        <br>
        <a href="select-change.php">3.修改我发过的帖子</a>
        <br>
        <a href="del-mess.php">4.删除我发过的帖子</a>
        <br>
        <a href="my-reply.php">5.查看我发过的回复</a>
        <br>
        <a href="del-reply.php">6.删除我发过的回复</a>
        <br>
        <a href="logout.php">7.登出账号</a>
    </div>
    <hr>
    <?php
        if ($_COOKIE["isAdmin"]=="TRUE"){ ?>
    <h2 style="color: red">管理员功能</h2>
    <div class="func_con">
        <a href="ad-select-change.php">8.修改帖子</a>
        <br>
        <a href="ad-del-mess.php">9.删除帖子</a>
        <br>
        <a href="ad-view-reply.php">10.查看所有回复</a>
        <br>
        <a href="ad-del-reply.php">11.删除回复</a>
        <br>
        <a href="ad-view-user.php">12.查看所有用户信息</a>
        <br>
    </div>
    <?php } ?>
</body>
</html>
