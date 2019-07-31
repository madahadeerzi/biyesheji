<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">

    <title><?php echo ($title); ?></title>
    <script type="text/javascript" src="/Public/js/jquery.min.js"></script>
    <script src="/Public/js/ajax.js"></script>
    <script src="/Public/js/layer/layer-min.js"></script>
</head>
<body>
<!--最顶部-->
<link rel="stylesheet" href="<?php echo STATIC_CSS_URL;?>index.css" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo STATIC_CSS_URL;?>reg_log.css">
<div class="site-topbar">
    <div class="layout">
        <div class="t1-l">
            <ul class="t1-l-ul">
                <li class="t1font"><a  href="/">首页</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="/Home/Product/productlist">商品列表</a></li>
                <li class="t1img">&nbsp;</li>
            </ul>
        </div>
        <div class="t1-r">
            <?php if (session('user')) {?>
            <ul class="t1-r-ul islogin">
                <li class="t1font"> <a href="{:U('Home/User/index')}" class="logon userinfo"><?php echo session('user')['nickname'];?></a></li>
                <li class="t1img"><a href="/Home/User/dologout.html">退出</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="/Home/User/center">个人中心</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="/Home/User/sell">我的订单</a></li>
                <li class="t1img">&nbsp;</li>
                <?php if(($ifcomment != 0)): ?><li class="t1font"><a href="/Home/Comment/comment">你有未读的消息</a></li>
                    <li class="t1img">&nbsp;</li>
                    <?php else: ?>
                    <li class="t1font"><a href="/Home/Comment/comment">我的消息</a></li>
                    <li class="t1img">&nbsp;</li><?php endif; ?>
                <li class="t1font"><a href="/Home/Product/postproduct">发布订单</a></li>
                <li class="t1img">&nbsp;</li>
            </ul>
            <?php }else{ ?>
            <ul class="t1-r-ul nologin" style="display:block;">
                <li class="t1font"><a href="/Home/User/login">登录</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="/Home/User/register">注册</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="/Home/Product/postproduct">发布订单</a></li>
                <li class="t1img">&nbsp;</li>
            </ul>
            <?php } ?>
        </div>
    </div>
</div>
<!--最顶部-->
    <link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/Public/css/postproduct.css">

<div class="postproduct" style="width: 1200px; margin: auto">
    <h1>发布页面</h1>
    <label>图片</label>
    <br>
    <img id="userimg" src="<?php echo ($product["img"]); ?>" width="400" style="display: block">
    <br>
    <form name="form1" id="form1">
        <input type="file" name="photo" id="photo">
        <p><input type="button" class="btn btn-info submit-img" name="b1" value="上传图片" onclick="fsubmit()"></p>
    </form>
    <form action="/Home/Product/doupdate"  onsubmit="return ajaxform(this, '/')" method="post" accept-charset="utf-8" >
        <label>标题:</label>
        <input type="text" name="title" id="title" placeholder="请输入你的标题" class="form-control" value="<?php echo ($product["title"]); ?>">
        <label>价格：</label>
        <input type="number" name="price" id="price" placeholder="请输入你的价格" class="form-control" value="<?php echo ($product["price"]); ?>">
        <label>类别</label>
        <select name="category"  class="form-control">
            <option value="1" <?php echo $product['category']==1?'selected':'' ?>>电子产品</option>
            <option value="2" <?php echo $product['category']==2?'selected':'' ?>>生活用品</option>
            <option value="3" <?php echo $product['category']==3?'selected':'' ?>>情趣用品</option>
            <option value="4" <?php echo $product['category']==4?'selected':'' ?>>二手书本</option>
        </select>
        <label>产品介绍:</label>
        <!-- 加载编辑器的容器 -->
        <script id="introduction" name="introduction" type="text/plain" style="height:300px;"><?php echo html_entity_decode($product['introduction'], ENT_COMPAT ,'utf-8');?></script>
        <!-- 配置文件 -->
        <script type="text/javascript" src="/Public/plugins/Ueditor/ueditor.config.js"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="/Public/plugins/Ueditor/ueditor.all.js"></script>
        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            var ue = UE.getEditor('introduction');
        </script>
        <!--<textarea placeholder="请输入你的介绍" rows="50" cols="100" name="introduction" class="form-control"></textarea>-->
        <label>联系人:</label>
        <input type="text" name="contacts" id="contacts" placeholder="输入你的姓名" class="form-control" value="<?php echo ($product["contacts"]); ?>">
        <label>联系方式:</label>
        <input type="text" name="phone" id="phone" placeholder="输入你的联系号码" class="form-control" value="<?php echo ($product["phone"]); ?>">
        <br>
        <input type="hidden" id="imgurl" name="img" value="<?php echo ($product["img"]); ?>">
        <input type="hidden" id="productid" name="productid" value="<?php echo ($product["productid"]); ?>">
        <input type="submit"  value="确认提交" class="btn btn-warning submit">
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
                        $("#userimg").attr("src","/Public/userimg/"+json['photo']).show();
                        $("#imgurl").val('/Public/userimg/'+json['photo']);
                    }
                }
            }
            oReq.open("POST", "/Home/product/dopostimg");
            oReq.send(formData);
            return false;
        }
    </script>

</div>

<!--footer开始-->
<div class="footer">
    <div class="layout quality layer">
        <ul class="footer_quality">
            <li><i></i>品质保证</li>
            <li  class="f2"><i></i>365天退换 天天换货</li>
            <li  class="f3"><i></i>1元起免运费</li>
            <li  class="f4"><i></i>1000家维修网点 全国联保</li>
        </ul>
    </div>
    <div class="helpful layout">
        <dl>
            <dt>
                帮助中心
            </dt>
            <dd>
                <ol>
                    <li>
                        <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>" target="_blank">购物指南</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>" target="_blank">配送方式</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>" target="_blank">支付方式</a>
                    </li>
                </ol>
            </dd>
        </dl>
        <dl class="jszc">
            <dt>
                帮助中心
            </dt>
            <dd>
                <ol>
                    <li>
                        <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>" target="_blank">购物指南</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>" target="_blank">配送方式</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>" target="_blank">支付方式</a>
                    </li>
                </ol>
            </dd>
        </dl>
        <dl class="jszc">
            <dt>
                帮助中心
            </dt>
            <dd>
                <ol>
                    <li>
                        <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>" target="_blank">购物指南</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>" target="_blank">配送方式</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>" target="_blank">支付方式</a>
                    </li>
                </ol>
            </dd>
        </dl>
        <dl class="jszc">
            <dt>
                帮助中心
            </dt>
            <dd>
                <ol>
                    <li>
                        <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>" target="_blank">购物指南</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>" target="_blank">配送方式</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>" target="_blank">支付方式</a>
                    </li>
                </ol>
            </dd>
        </dl>

    </div>
    <div class="keep-on-record">
        <p>
            Copyright © 2016-2025 二手商城  版权所有 保留一切权利 备案号:粤00-888888号

            <!--您好,请您给TPshop留个友情链接-->
            &nbsp;&nbsp;<a href="http://www.tp-shop.cn/">思棠二手商城</a>
            <!--您好,请您给TPshop留个友情链接-->
        </p>
    </div>
</div>
<!--footer借宿-->

</body>
</html>