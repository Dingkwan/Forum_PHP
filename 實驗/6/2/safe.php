<?php
    header("Content-type:text/html;charset=utf-8");
    session_start();
    session_unset();
    echo "用户已注销<br>";
    echo "<button onclick=\"window.location.href='login.php'\">返回登录界面</button>";
?>