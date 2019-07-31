<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>订单列表</title>
    <link rel="stylesheet" href="/biyesheji2/css/nav.css">
</head>
<body>
<ul>
<?php
require '../back/db/db.php';
$db->select_db('product');
$query = "select * from product";
$result = $db->query($query);
$num_result = $result->num_rows;
echo $num_result;
for ($i = 0; $i < $num_result; $i++) {
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $category = $row['category'];
    $img = $row['img'];
    $introduction = $row['introduction'];
    $contacts = $row['contacts'];
    $number = $row['number'];
    $createtime = $row['createtime'];
    $status = $row['status'];
    $price = $row['price'];
    $productid = $row['productid'];

    echo '<li><a href="showproduct.php?productid=' .$productid.'">'.$title.'</a></li>';
}

?>
</ul>
</body>
</html>
