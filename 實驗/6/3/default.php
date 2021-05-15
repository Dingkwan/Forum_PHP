<?php
    header("Content-type:text/html;charset=utf-8");
    session_start();

    $file=fopen("pwd.txt","r");                 //打开文件核对输入信息
    $file_arr=array();
    if (!$file){
        echo "<script>alert('文件不存在');</script>";
        exit();
    }
    else {
        $i=0;
        while(!feof($file)){
            $file_arr[$i]=fgets($file);             //将读取出的数据存入数组中
            $file_arr[$i]=str_replace(PHP_EOL,'',$file_arr[$i]);    //由于fgets()函数会将换行符读入，使用str_replace()函数去除
            $i++;
        }
        fclose($file);
    }
    
    //核对用户名和密码
    for ($i=0;$i<count($file_arr);$i++){
        if (strcmp($file_arr[$i],$_POST["username"])==0 && !empty($_POST["username"])){
            if (strcmp($file_arr[$i+1],$_POST["password"])==0){
                break;
            }
            else {
                echo "<script>alert('用户名、密码不正确');</script>";
                break;
            }
        }
        if ($i==count($file_arr)-1){        //若遍历完数组还没匹配到用户名，则说明用户名输入错误
            echo "<script>alert('用户名、密码不正确');</script>";
            break;
        }
    }

    if (!isset($_SESSION["user"])){             //判断是否已经有SESSION，若无则赋值
        $_SESSION["user"]=$_POST["username"];
        $_SESSION["pwd"]=$_POST["password"];
    }

    if (!isset($_COOKIE["user"])){              //判断是否已经有COOKIE，若无则赋值
        $username=$_POST["username"];
        $password=$_POST["password"];
        $time=$_POST["time"];

        if ($time=="hour"){
            $time=time()+60*60;
        }
        if ($time=="day"){
            $time==time()+60*60*24;
        }

        setcookie("user[0]",$username,$time);       //设置cookie,用数组表示
        setcookie("user[1]",$password,$time);
    }

    echo "当前用户：",$_SESSION["user"],"<br>";
    if ($_SESSION["user"]=="admin" && $_SESSION["pwd"]=="admin"){ 
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"\">1.添加功能</a><br>";
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"\">2.删除功能</a><br>";
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"user.php\">3.用户信息</a><br>";    //重定位至user.php
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"safe.php\">4.注销用户</a><br>";    //重定位至safe.php
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"safec.php\">5.注销用户（清除cookie）</a><br>";    //重定位至safec.php
    }
    elseif ($_SESSION["user"]=="123" && $_SESSION["pwd"]=="123"){
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"\">1.浏览功能</a><br>";
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"user.php\">2.用户信息</a><br>";    //重定位至user.php
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"safe.php\">3.注销用户</a><br>";    //重定位至safe.php
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"safec.php\">4.注销用户（清除cookie）</a><br>";    //重定位至safec.php
    }
    else {
        echo "输入账号信息错误，请重新输入<br>";
        echo "<button onclick=\"window.location.href='login.php'\">返回登录界面</button>";  //设置按钮返回登录界面,注意"的转义
    }
?>
