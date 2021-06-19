<?php
    $title=$_POST["title"];
    $content=$_POST["content"];
    $username=$_COOKIE["username"];
    $date=date("Y-m-d H:i:s");
    $reply_id=$_POST["reply_id"];

    if ($content==""){ header("location:show-mess.php?id=$reply_id"); die();}

    require_once ("dbtool.inc");
    $link=conDB();
    $sql="INSERT INTO `reply_message` (`username`, `title`, `content`, `date`, `reply_id`) VALUES ( '$username', '$title', '$content', '$date', '$reply_id')";
    mysqli_query($link,$sql);

    echo "<script>";
    echo "alert('回复成功');";
    echo "window.location.href='show-mess.php?id=".$reply_id."';";
    echo "</script>";
    mysqli_close($link);
?>
