<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>结算界面--二手商城</title>
    <link rel="stylesheet" href="/biyesheji2/css/nav.css">
</head>
<body>
    <?php require './nav.php';?>
    <?php $productid = $_GET['productid']?>
    <h1>结算界面</h1>
    <div>
        <img src="../img/test.png">
        <?php require '../back/showproduct/showproduct.php'; ?>
        <?= '<a href="showproduct.php"'.$productid.'>'.$title.'</a>';?>

    </div>
    <button>购买</button>
</body>
</html>