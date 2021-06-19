<?php
    $del=$_POST["select"];

    require_once ("dbtool.inc");
    $link=conDB();
    $sql_reply="DELETE FROM `reply_message` WHERE `reply_message`.`id` = $del";

    mysqli_query($link,$sql_reply);

    echo "<script>";
    echo "alert ('删除成功');";
    echo "window.location.href='del-reply.php';";
    echo "</script>";
?>
