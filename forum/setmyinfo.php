<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{
            background-color: black;
        }

        *{
            color: white;
        }

        input{
            color: black;
        }

        form{
            padding: 50px;
            text-align: center;
            vertical-align: middle;
            font-size: 20px;
        }
    </style>
    <title>set my info</title>
</head>
<body>
    <?php
        $username=$_COOKIE["username"];
        $password=$_COOKIE["password"];
        $mail=$_COOKIE["mail"];
        $sex=$_COOKIE["sex"];
        $tel=$_COOKIE["tel"];
    ?>
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
    <h1 style="text-align: center;background-color: blue;padding: 20px">更 新 个 人 信 息</h1>

    <h3><a href="dashboard.php"><--返回</a></h3>

    <p style="text-align: center"><b>你的个人信息</b>&nbsp;&nbsp;&nbsp;用户名：<?php echo $username; ?>&nbsp;&nbsp;&nbsp;密码：<?php echo $password; ?>&nbsp;&nbsp;&nbsp;电邮地址：<?php echo $mail; ?>&nbsp;&nbsp;&nbsp;性别：<?php echo $sex; ?>&nbsp;&nbsp;&nbsp;电话：<?php echo $tel; ?></p>
    <form method="post" action="update-succ.php">
        用户名：<span><?php echo $username;?><span style="font-size: 15px">（你不能修改用户名）</span></span>
        <br>&nbsp;&nbsp;&nbsp;
        密码：<input type="text" name="password" value="<?php echo $password; ?>"/>
        <br>&nbsp;&nbsp;&nbsp;
        电邮：<input type="text" name="mail" value="<?php echo $mail; ?>"/>
        <br>&nbsp;&nbsp;&nbsp;
        性别:&nbsp;&nbsp;&nbsp;
        <input type="radio" name="sex" value="男" <?php if ($sex=="男"){echo "checked";} ?>/>男
        <input type="radio" name="sex" value="女" <?php if ($sex=="女"){echo "checked";} ?>/>女
        <br>
        电话号码：<input type="text" name="tel" value="<?php echo $tel; ?>"/>
        <br>
        <br>
        <input style="color: black" type="submit" value="更新">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input style="color: black" type="reset" value="重置">
    </form>
</body>
</html>

