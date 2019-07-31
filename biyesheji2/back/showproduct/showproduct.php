<?php
/**
 * Created by PhpStorm.
 * User: HuangSzeKit
 * Date: 2017/2/28
 * Time: 13:41
 */
require '../back/db/db.php';
$query = "select * from product where productid =".$productid;
$result = $db->query($query);
    $row = $result->fetch_assoc();
    $title = stripslashes($row['title']);
    $category = $row['category'];
    $img = $row['img'];
    $introduction = stripslashes($row['introduction']);
    $contacts = stripslashes($row['contacts']);
    $number = stripslashes($row['number']);
    $createtime = $row['createtime'];
    $status = $row['status'];
    $price = stripslashes($row['price']);
//查询评论
$query = "select * from usermessage where productid =".$productid;
$result = $db->query($query);
    $row = $result->fetch_assoc();
if($row!=null){
    $message = $row['message'];
    $date = $row['date'];
}
?>