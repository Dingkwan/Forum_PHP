<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>new message</title>
    <style>
        body{
            background-color: black;
        }
        *{
            color: white;
        }
        input,textarea,select {
            color: black;
        }
        form{
            padding: 50px;
            text-align: center;
            vertical-align: middle;
            font-size: 20px;
        }
    </style>
    <script>
        function check_data(){
            if (document.message.title.value.length==0) {alert("标题字段不能为空");}
            else if (document.message.content.value.length==0) {alert("内容字段不能为空");}
            else {document.message.submit();}
        }
    </script>
</head>
<body>

<?php
    if (!isset($_COOKIE["username"])){
        echo "<script>";
        echo "alert('你尚未登录，请登录后发帖');";
        echo "window.location.href='forum.php';";
        echo "</script>";
    }
?>

    <div style="text-align: right">
        <?php
        if (!isset($_COOKIE["username"])){
            echo "你尚未登录，请<a href='login.html'>登录/注册</a>";
        }
        else{
            $username=$_COOKIE["username"];
            echo "你好，<a href='dashboard.php'>$username</a>";
        }
        ?>
    </div>
    <h1 style="text-align: center;background-color: blue;padding: 20px">欢 迎 发 贴</h1>

    <h3><a href="forum.php"><--返回</a></h3>

    <form name="message" action="post-mess.php" method="post">
        标题：<input type="text" name="title" placeholder="请在这里输入帖子标题">
        <br><br>
        类别：<select name="type">
            <option value="新闻" selected>新闻</option>
            <option value="体育">体育</option>
            <option value="游戏">游戏</option>
        </select>
        <br><br>
        内容
        <br>
        <textarea name="content" cols="50" rows="20" placeholder="请在这里输入帖子内容"></textarea>
        <br><br>
        <input type="submit" value="确定" onclick="check_data()">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="重新输入">
    </form>
</body>
</html>
