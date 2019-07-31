<?php
require('../db/db.php');
$username = isset($_POST['username']) ? addslashes($_POST['username']) : '';
$userpass = isset($_POST['userpass']) ? addslashes($_POST['userpass']) : '';
$nickname = isset($_POST['nickname']) ? addslashes($_POST['nickname']) : '';
$mail =isset($_POST['mail']) ? addslashes($_POST['mail']) : '';
//查询是否存在该帐号
$query = "select username,email from user where username='".$username."'";
$result =$db->query($query);
$row = $result->fetch_assoc();
if(!empty($row)){
    echo $row['username']."<br>";
   echo '已经有相同的用户名了';
}else if($row['email'] == $mail){
    echo '该邮箱已经被注册过了';
} else{
    $query = "insert into user (username,userpass,createtime,nickname,email) values('".$username."','".$userpass."',".time().",'".$nickname."','".$mail."');";
    $result = $db->query($query);
    if($result){
        echo "插入成功";
    }else{
        echo "插入失败";
    }
}

?>