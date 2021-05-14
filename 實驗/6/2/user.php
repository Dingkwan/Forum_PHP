<?php
    header("Content-type:text/html;charset=utf-8");
    session_start();
    echo "用户名：",$_SESSION["user"],"<br>";
    echo "密码：",$_SESSION["pwd"],"<br>";
    echo "<button onclick=\"window.location.href='default.php'\">返回上级界面</button>";
?>