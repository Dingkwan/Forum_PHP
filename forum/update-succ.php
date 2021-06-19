<?php
    $username=$_COOKIE["username"];     //因为表单没有提交username，所以从cookie中获取
    $password=$_POST["password"];
    $mail=$_POST["mail"];
    $sex=$_POST["sex"];
    $tel=$_POST["tel"];

    require_once ("dbtool.inc");
    $link=conDB();
    if ($_COOKIE['isAdmin']=="TRUE") {
        $sql = "UPDATE `admin` SET `password` = '$password',`mail` = '$mail',`sex` = '$sex', `tel` = '$tel' WHERE `admin`.`username` = '$username' ";
    }
    else{
        $sql = "UPDATE `user` SET `password` = '$password',`mail` = '$mail',`sex` = '$sex', `tel` = '$tel' WHERE `user`.`username` = '$username' ";
    }
    mysqli_query($link,$sql);
    mysqli_close($link);

    setcookie("username",$username);
    setcookie("password",$password);
    setcookie("mail",$mail);
    setcookie("sex",$sex);
    setcookie("tel",$tel);

    echo "<script>";
    echo "alert ('更新信息成功');";
    echo "window.location.href='dashboard.php'";
    echo "</script>";
?>
