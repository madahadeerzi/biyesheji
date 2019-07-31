<?php
/**
 * @Author: Marte
 * @Date:   2017-02-27 11:25:21
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-03-20 21:41:46
 */
require("../db/db.php");
$username = isset($_POST['username']) ? $_POST['username'] : '';
$userpass = isset($_POST['userpass']) ? $_POST['userpass'] : '';
$query = "select userid,userpass from user where username='" . $username . "'";
$result = $db->query($query);
$row = $result->fetch_assoc();
$userid = $row['userid'];
if (($username!='') && ($userpass != '') && $userpass == $row['userpass']) {
    $_SESSION['userid'] = $userid;
    echo $_SESSION['userid'];
//     setcookie("userid", $userid, time() + 3600 * 2, "/");
     //header("location:../../index.php");
} else {
    echo "密码错误";
}

?>