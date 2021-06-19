<?php
    $username=$_POST["username"];
    $password=$_POST["password"];

    require_once ("dbtool.inc");
    $link=conDB();
    $sql_user="SELECT * FROM user WHERE username='$username' AND password='$password'";
    $sql_admin="SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result_user=mysqli_query($link,$sql_user);
    $result_admin=mysqli_query($link,$sql_admin);

    if (mysqli_num_rows($result_admin)==0 and mysqli_num_rows($result_user)==0){
        mysqli_free_result($result_admin);
        mysqli_free_result($result_user);
        mysqli_close($link);
        echo "<script>";
        echo "alert ('账号密码输入错误');";
        echo "history.back();";
        echo "</script>";
    }
    elseif (mysqli_num_rows($result_admin)!=0){
        $row=mysqli_fetch_object($result_admin);
        $mail=$row->mail;
        $sex=$row->sex;
        $tel=$row->tel;
        mysqli_free_result($result_admin);
        mysqli_close($link);
        setcookie("username",$username);
        setcookie("password",$password);
        setcookie("mail",$mail);
        setcookie("sex",$sex);
        setcookie("tel",$tel);
        setcookie("isAdmin","TRUE");

        header("location:dashboard.php");
    }
    else{
        $row=mysqli_fetch_object($result_user);
        $mail=$row->mail;
        $sex=$row->sex;
        $tel=$row->tel;
        mysqli_free_result($result_user);
        mysqli_close($link);
        setcookie("username",$username);
        setcookie("password",$password);
        setcookie("mail",$mail);
        setcookie("sex",$sex);
        setcookie("tel",$tel);
        setcookie("isAdmin","FALSE");

        header("location:dashboard.php");
    }
?>


