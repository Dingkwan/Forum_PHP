<?php header("Content-type:text/html;charset=utf-8");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>

    <form action="ok.php" method="post">
        <p>用户名：<input type="text" name="username"
        value="<?php
        if (isset($_COOKIE["user"])){           //如果cookie存在，读取它的第0号元素（用户名）
            echo $_COOKIE["user"][0];
        }
        ?>">
        </p>

        <p>密码：<input type="text" name="password"
        value="<?php
        if (isset($_COOKIE["user"])){
            echo $_COOKIE["user"][1];           //如果cookie存在，读取它的第1号元素（密码）
        }
        ?>">
        </p>

        <input type="radio" name="time" value="hour" checked>1小时
        <input type="radio" name="time" value="day">1天
        <br>
        <input type="submit" value="登录">
    </form>
</body>
</html>