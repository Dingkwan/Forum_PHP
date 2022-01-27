<?php
    function conDB(){
        $link=mysqli_connect("localhost","root","root","forum") or die("无法建立连接：").mysqli_connect_error();
        mysqli_query($link,"SET NAMES utf8");
        return $link;
    }
?>