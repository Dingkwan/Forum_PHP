<?php
    $del=$_POST["select"];

    require_once ("dbtool.inc");
    $link=conDB();
    $sql="DELETE FROM `message` WHERE `message`.`id` = $del";
    $sql_reply="DELETE FROM `reply_message` WHERE `reply_message`.`reply_id` = $del";

    mysqli_query($link,$sql);
    mysqli_query($link,$sql_reply);

    echo "<script>";
    echo "alert ('删除成功');";
    echo "window.location.href='del-mess.php';";
    echo "</script>";
?>