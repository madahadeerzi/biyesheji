<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>查看订单</title>
    <link rel="stylesheet" href="/biyesheji2/css/nav.css">
</head>
<body>
    <?php require './nav.php';?>
    <?php
        $productid = $_GET['productid'];
        require '../back/showproduct/showproduct.php';
    ?>
            <h1>标题：<?=$title;?></h1>
            <p>类别：<?= $category;?></p>
            <p><?= '<img src="'.$img.'"/>';?></p>
            <p>价格:<?= $price;?></p>
            <p>介绍:<?= $introduction;?></p>
            <p>联系人:<?= $contacts;?></p>
            <p>电话:<?= $number;?></p>
            <p>订单号:<?= $productid;?></p>
            <div>
                评论
                <?php echo '<p>'.$message.'</p>'?>
            </div>
            <textarea>评论</textarea>

            <div>
                <?= '<button><a href="order.php?productid='.$productid.'">结算</a></button>';?>
            </div>
        <?php
        //}
    ?>
</body>
</html>