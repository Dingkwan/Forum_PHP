<?php
    header("Content-type:text/html;charset=utf-8");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form action="default.php" method="post">
            <p>用户名：<input type="text" name="username"></p>
            <p>密码：<input type="text" name="password"></p>
            <br>
            <input type="submit" value="提交">
            <input type="reset" value="重填">
    </form>
    <br>
    <?php
    echo "管理员账号：admin 密码：admin <br>";
    echo "普通用户账号：123 密码：123";
    ?>
</body>
</html>