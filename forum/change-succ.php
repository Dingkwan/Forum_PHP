<?php
    $id=$_POST["id"];
    $title=$_POST["title"];
    $type=$_POST["type"];
    $content=$_POST["content"];

    require_once ("dbtool.inc");
    $link=conDB();
    $sql="UPDATE `message` SET `title` = '$title', `content` = '$content', `type` = '$type' WHERE `message`.`id` = $id";
    $sql_reply="UPDATE `reply_message` SET `title` = '$title' WHERE `reply_message`.`reply_id` = $id ";
    mysqli_query($link,$sql);
    mysqli_query($link,$sql_reply);

    echo "<script>";
    echo "alert ('修改成功');";
    echo "window.location.href='dashboard.php'";
    echo "</script>";
?>