<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        *{
            color: white;
        }

        p{
            text-align: center;
        }
    </style>
    <title>register success</title>
</head>
<body style="background-color: black">
<!--  提交到数据库  -->
    <?php
        require_once ("dbtool.inc");
        $username=$_POST["username"];
        $password=$_POST["password"];
        $mail=$_POST["mail"];
        $sex=$_POST["sex"];
        $tel=$_POST["tel"];
        $sql="INSERT INTO `user` (`username`, `password`, `mail`, `sex`, `tel`) VALUES ('$username','$password','$mail','$sex','$tel')";
        $link=conDB();
        mysqli_query($link,$sql);
    ?>
    <h1 style="text-align: center;background-color: blue;padding: 20px">注 册 成 功 ！</h1>
    <p><a href="login.html" >返回登录界面</a></p>

    <?php mysqli_close($link); ?>
</body>
</html>
