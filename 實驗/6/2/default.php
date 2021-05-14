<?php
    header("Content-type:text/html;charset=utf-8");
    session_start();
    if (!isset($_SESSION["user"])){             //判断是否已经有SESSION，若无则赋值
        $_SESSION["user"]=$_POST["username"];
        $_SESSION["pwd"]=$_POST["password"];
    }
    echo "当前用户：",$_SESSION["user"],"<br>";
    if ($_SESSION["user"]=="admin" && $_SESSION["pwd"]=="admin"){ 
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"\">1.添加功能</a><br>";
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"\">2.删除功能</a><br>";
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"user.php\">3.用户信息</a><br>";    //重定位至user.php
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"safe.php\">4.注销用户</a><br>";    //重定位至safe.php
    }
    elseif ($_SESSION["user"]=="123" && $_SESSION["pwd"]=="123"){
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"\">1.浏览功能</a><br>";
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"user.php\">2.用户信息</a><br>";    //重定位至user.php
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"safe.php\">3.注销用户</a><br>";    //重定位至safe.php
    }
    else {
        echo "输入账号信息错误，请重新输入<br>";
        echo "<button onclick=\"window.location.href='login.php'\">返回登录界面</button>";  //设置按钮返回登录界面,注意"的转义
    }
?>
