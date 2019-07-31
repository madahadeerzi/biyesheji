<?php
/**
 * @Author: Marte
 * @Date:   2017-02-27 17:27:08
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-02-27 17:49:11
 */
//stripslashes
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : '';
$title = isset($_POST['title']) ? addslashes($_POST['title']) : '';
$category = isset($_POST['category']) ? $_POST['category'] : '';
$img = !empty($_POST['imgurl']) ? $_POST['imgurl'] : '/biyesheji2/img/test.png';
echo $img . "<br>";
$introduction = isset($_POST['introduction']) ? addslashes($_POST['introduction']) : '';
echo $introduction."<br>";
$contacts = isset($_POST['contacts']) ? addslashes($_POST['contacts']) : '';
$number = isset($_POST['number']) ? addslashes($_POST['number']) : '';
$price = isset($_POST['price']) ? addslashes($_POST['price']) : '';

require("../db/db.php");     //连接数据库

$query = "insert into product (userid,title,category,img,introduction,contacts,number,createtime,price) values('" . $userid . "','" . $title . "'," . $category . ",'" . $img . "','" . $introduction . "','" . $contacts . "'," . $number . "," . time() . "," . $price . ")";
$result = $db->query($query);
if ($result) {
    echo "插入成功";
} else {
    echo "插入失败";
}

?>