<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo '当前服务器根目录:',$_SERVER['DOCUMENT_ROOT'],'<br>';
    echo '浏览当前页面用户的IP地址:',$_SERVER['REMOTE_ADDR'],'<br>';
    echo '文件中的当前行号:',__LINE__,'<br>';
    echo '文件的完整路径和文件名:',__FILE__,'<br>';
    echo '当前使用的PHP版本:',PHP_VERSION,'<br>';
    echo 'PHP所在的操作系统名字:',PHP_OS,'<br>';
    ?>
</body>
</html>