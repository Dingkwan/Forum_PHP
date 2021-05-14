<?php
header("Content-type:text/html;charset=utf-8");
$username=$_POST["username"];
$password=$_POST["password"];
$time=$_POST["time"];

if ($time=="hour"){
    $time=time()+60*60;
}
if ($time=="day"){
    $time==time()+60*60*24;
}

echo "你的用户名：",$username,"<br>";
echo "你的密码：",$password;
setcookie("user[0]",$username,$time);
setcookie("user[1]",$password,$time);       //以数组形式储存cookie
?>