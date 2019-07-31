<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8" />
    <title>修改页面--二手商城</title>
    <link rel="stylesheet" href="/biyesheji2/css/nav.css">
</head>
<body>
<h1>修改页面</h1>
<?php require 'nav.php'; ?>
<form action="../back/postproduct/postproduct.php" method="post" accept-charset="utf-8">
    <p>标题:</p>
    <input type="text" name="title" id="title" placeholder="请输入你的标题">
    <p>价格：</p>
    <input type="number" name="price" id="price" placeholder="请输入你的价格">
    <p>图片</p>
    <img src="../img/test.png">
    <p>类别</p>
    <select name="category" >
        <option value="1">电子产品</option>
        <option value="2">生活用品</option>
        <option value="3">情趣用品</option>
        <option value="4">二手书本</option>
    </select>
    <p>产品介绍:</p>
    <textarea placeholder="请输入你的介绍" rows="50" cols="100"></textarea>
    <p>联系人:</p>
    <input type="text" name="contacts" id="contacts" placeholder="输入你的姓名">
    <p>联系方式:</p>
    <input type="text" name="number" id="number" placeholder="输入你的联系号码">
    <br>
    <input type="submit"  value="确认提交" >
</form>
</body>
</html>