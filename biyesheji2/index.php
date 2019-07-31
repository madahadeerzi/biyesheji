<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>二手商城主页</title>
    <link rel="stylesheet" href="/biyesheji2/css/nav.css">
</head>
<body>
<?php
    require 'front/nav.php';
    if(!empty($_SESSION['userid'])){
        echo "登录成功啦,用户名为".$_SESSION['userid'];
        echo "<br>";
        echo '<a href="front/postproduct.php">发布产品</a>';
    }else{
        echo "当前没有登录";
        echo '<a href="./front/login.php">赶紧去登录吧</a>';
    }

?>
</body>
</html>