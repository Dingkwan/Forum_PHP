<?php
    $title=$_POST["title"];
    $type=$_POST["type"];
    $content=$_POST["content"];
    $username=$_COOKIE["username"];
    $date=date("Y-m-d H:i:s");

    if ($title=="" or $content==""){ header("location:new-mess.php"); die();}
    require_once ("dbtool.inc");
    $link=conDB();
    $sql="INSERT INTO `message` (`username`, `title`, `content`, `date`, `type`) VALUES ( '$username', '$title', '$content', '$date', '$type')";
    mysqli_query($link,$sql);
    echo "<script>";
    echo "alert('发帖成功');";
    echo "window.location.href='forum.php';";
    echo "</script>";
    mysqli_close($link);
?>
