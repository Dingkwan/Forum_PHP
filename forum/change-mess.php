<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>change your message</title>
    <style>
        *{
            color: white;
        }
        body{
            background-color: black;
        }
        input,select,textarea{
            color: black;
        }
        form{
            padding: 50px;
            text-align: center;
            vertical-align: middle;
            font-size: 20px;
        }
    </style>
</head>
<body>

    <?php
    $id=$_GET["id"];

    require_once ("dbtool.inc");
    $link=conDB();
    $sql="SELECT * FROM message WHERE id='$id'";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_object($result);

    $username=$row->username;
    $title=$row->title;
    $content=$row->content;
    $type=$row->type;
    $id=$row->id;
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
    <h1 style="text-align: center;background-color: blue;padding: 20px">修 改 帖 子</h1>
    <h3><a href="select-change.php"><--返回选择界面</a></h3>


    <form action="change-succ.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        标题：<input type="text" name="title" value="<?php echo $title; ?>">
        <br><br>
        类别：<select name="type">
            <option value="新闻" <?php if ($type=="新闻"){ echo "selected"; } ?> >新闻</option>
            <option value="体育" <?php if ($type=="体育"){ echo "selected"; } ?>>体育</option>
            <option value="游戏" <?php if ($type=="游戏"){ echo "selected"; } ?>>游戏</option>
        </select>
        <br><br>
        内容
        <br>
        <textarea name="content" cols="50" rows="20"><?php echo $content; ?></textarea>
        <br><br>
        <input type="submit" value="确定" onclick="check_data()">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="重新输入">
    </form>

</body>
</html>