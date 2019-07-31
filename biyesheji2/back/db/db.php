<?php
$db = new mysqli('localhost','root','root','biyesheji');
if(mysqli_connect_errno()){
    echo 'Error:不能连接数据库';
    exit;
}
else{
    echo '连接成功';
}