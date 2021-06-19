<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show message</title>
    <style>
        body{
            background-color: black;
        }
        *{
            color: white;
        }
        h2{
            text-align: center;
        }
        .info{
            text-align: center;
        }
        pre,p,span{
            margin-left: 100px;
            margin-right: 100px;
        }
        input,textarea{
            color: black;
        }
        pre{
            font-size: 18px;
        }
    </style>
    <script>
        function check_data(){
            if (document.reply.content.value.length==0) {alert("标题字段不能为空");}
            else document.reply.submit();
        }
    </script>
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
        $date=$row->date;
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
    <h1 style="text-align: center;background-color: blue;padding: 20px">查 看 帖 子</h1>
    <h3><a href="forum.php"><--返回论坛</a></h3>

    <br>

    <h2><?php echo $title; ?></h2>
    <p class="info">用户：<?php echo $username; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;类别：<?php echo $type; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;发帖时间：<?php echo $date; ?></p>
    <hr>
    <h2>正文</h2>
    <pre><?php echo $content; ?></pre>

    <br><hr>

    <?php if(isset($_COOKIE["username"])){ ?>
    <h3>你的回复：</h3>
    <form method="post" action="post-reply.php" name="reply">
        <input type="hidden" name="reply_id" value="<?php echo $id; ?>">
        <input type="hidden" name="title" value="<?php echo $title; ?>">
        <textarea name="content" cols="50" rows="10" placeholder="请在这里输入回复内容"></textarea>
        <input type="submit" value="回复" onclick="check_data()">
        <input type="reset" value="重新输入">
    </form>
    <hr>
    <?php } ?>

    <h2>回复</h2>
    <?php
    $showRly="SELECT * FROM `reply_message` WHERE reply_id='$id' ORDER BY date DESC ";
    $resultRly=mysqli_query($link,$showRly);

    while ($reply=mysqli_fetch_object($resultRly)){
        echo "<hr width='80%'>";
        echo "<br>";
        echo "<p>用户：$reply->username</p>";
        echo "<p>时间：$reply->date</p>";
        echo "<span>内容：</span><pre>$reply->content</pre>";
    }
    ?>
</body>
</html>
