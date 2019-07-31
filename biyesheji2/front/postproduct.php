
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8" />
    <title>发布页面--二手商城</title>
    <link rel="stylesheet" href="/biyesheji2/css/nav.css">
    <script type="text/JavaScript" src="../js/jquery-3.1.1.min.js"></script>

</head>
<body>
    <h1>发布页面</h1>
    <?php require 'nav.php'; ?>
    <p>图片</p>
    <img id="userimg" src="../img/test.png" width="400">
    <br>
    <form name="form1" id="form1">
        <p>photo:<input type="file" name="photo" id="photo"></p>
        <p><input type="button" name="b1" value="上传图片" onclick="fsubmit()"></p>
    </form>
    <form action="../back/postproduct/postproduct.php" method="post" accept-charset="utf-8" >
        <p>标题:</p>
        <input type="text" name="title" id="title" placeholder="请输入你的标题">
        <p>价格：</p>
        <input type="number" name="price" id="price" placeholder="请输入你的价格">
        <p>类别</p>
        <select name="category" >
            <option value="1">电子产品</option>
            <option value="2">生活用品</option>
            <option value="3">情趣用品</option>
            <option value="4">二手书本</option>gd
        </select>
        <p>产品介绍:</p>
        <textarea placeholder="请输入你的介绍" rows="50" cols="100" name="introduction"></textarea>
        <p>联系人:</p>
        <input type="text" name="contacts" id="contacts" placeholder="输入你的姓名">
        <p>联系方式:</p>
        <input type="text" name="number" id="number" placeholder="输入你的联系号码">
        <br>
        <input type="hidden" id="imgurl" name="imgurl" value="">
        <input type="submit"  value="确认提交" >
    </form>
    <br>



    <script type="text/javascript">
        function fsubmit() {
            var form=document.getElementById("form1");
            var formData=new FormData(form);
            var oReq = new XMLHttpRequest();
            oReq.onreadystatechange=function(){
                if(oReq.readyState==4){
                    if(oReq.status==200){
                        var json=JSON.parse(oReq.responseText);
                        $("#userimg").attr("src","../back/userimg/"+json['photo']);
                        $("#imgurl").val('/biyesheji2/back/userimg/'+json['photo']);
                    }
                }
            }
            oReq.open("POST", "../back/upload/upload.php");
            oReq.send(formData);
            return false;
        }
    </script>
</body>
</html>