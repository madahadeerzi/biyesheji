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
    <!--头部-->
<header>

    <div class="layout">

        <!--logo开始-->
        <div class="logo"><a href="/" title="TPshop"><img src="/Public/images/TP-shop_logo.png" alt="TPshop"></a></div>
        <!--logo结束-->

        <!-- 搜索开始-->
        <div class="searchBar">
    <div class="searchBar-form">
        <form name="sourch_form" id="sourch_form" method="post" action="/Home/Product/productlist">
            <select name="category" class="select1" >
                <option value="0">所有</option>
                <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["category"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                <!--<option value="1">电子产品</option>-->
                <!--<option value="2">生活用品</option>-->
                <!--<option value="3">情趣用品</option>-->
                <!--<option value="4">二手书本</option>-->
            </select>
            <input type="text" class="text" name="q" id="q" value=""  placeholder="  搜索关键字"/>
            <input type="button" class="button" value="搜索" onclick="if($.trim($('#q').val()) != '') $('#sourch_form').submit();"/>
        </form>
    </div>
</div>
        <!-- 搜索结束-->



        <div class="qr-code">
            <img src="/Public/Static/images/qrcode_vmall_app01.png" alt="二维码" />
            <p>扫一扫</p>
        </div>
    </div>
</header>
<!--头部-->

<!-- 导航-开始-->
<div class="navigation">
    <div class="layout">


        <div class="ongoods">
            <ul class="navlist">
                <li class="homepage"><a href="/"><span>首页</span></a></li>
                <li class="page"><a href="/Home/Product/postproduct" ><span>发布订单</span></a></li>
                <li class="page"><a href="/Home/Product/productlist" ><span>商品列表</span></a></li>

            </ul>
        </div>
    </div>
</div>
<!-- 导航-结束-->

<div class="layout ov-hi">
    <div class="breadcrumb-area">
        <a href="/">首页</a>&gt;
        <a href="/Home/User/center">个人中心</a>;
    </div>
</div>
<div class="layout pa-to-10 fo-fa-ar">
    <div class="fl wi240 myimall">
        <div class="li-hi-20 ba-co-danhui">
            <div class="pa-28-0-22">
                <a class="fo-si-18" href="<?php echo U('/Home/User');?>"><span>我的商城</span></a>
            </div>
            <div class="fuy-xim pa-bo-20">
                <ul>
                    <li>
                        <h3><span>个人中心</span></h3>
                        <ol>
                            <li id="order_list"><a href="/Home/User/center"><span>我要买<!--<i class="w-i">1</i>--></span></a></li>
                            <li id="goods_collect"><a href="/Home/User/sell"><span>我要卖</span></a></li>
                            <li id="goods_collect"><a href="/Home/Comment/comment"><span>我的消息</span></a></li>
                            <li id="goods_collect"><a href="/Home/User/address"><span>我的地址</span></a></li>
                            <li id="goods_collect"><a href="/Home/User/userinfo"><span>个人信息</span></a></li>
                        </ol>
                    </li>

                </ul>
            </div>
        </div>
    </div>


    <div class="order-address-list address_current" style="    width: 900px;
    float: left;
    margin: 0 10px;">
        <table width="100%" cellspacing="0" cellpadding="0" border="1" class="address">
            <tbody>
            <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <!--<input type="hidden" value="<?php echo ($vo["addressid"]); ?>" id="edit">-->
                <td width="60" class="address_id" align="center">
                    <input type="radio" data-province-id="338" data-city-id="339" data-district-id="340" name="address_id" value="2" checked="checked"></td>
                <td width="160" class="consignee"> <b>收货人:<?php echo ($vo["buyname"]); ?></b>
                </td>
                <td width="460" class="address2">
                    <span>地址:<?php echo ($vo["address"]); ?></span>
                </td>
                <td width="200" class="mobile">
                    <span>电话：<?php echo ($vo["buyphone"]); ?></span>
                </td>
                <td width="60" class="wi100">
                    <span>默认地址</span>
                </td>
                <td width="60" class="wi100">
                                        <span>
                                            <a onclick="editaddress(<?php echo ($vo["addressid"]); ?>);">修改</a>
                                        </span>
                </td>
                <td>
                    <a onclick="deladdress(<?php echo ($vo["addressid"]); ?>);">
                        <div class="gwc-gb ma-ri-20"></div>
                    </a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <tr id="newaddress">
                <td><input type="hidden" value="" name="addressid"></td>
                <td><input type="text" placeholder="请输入你的收货人姓名" name="name"></td>
                <td><input type="text" placeholder="请输入你的地址" name="address"></td>
                <td><input type="text" placeholder="请输入你的电话" name="phone"></td>
                <td><input type="submit" value="添加新地址" onclick="newaddress()"></td>
            </tr>
            </tbody>
        </table>
    </div>

<script>
    function newaddress(){
        var $newaddress = $('#newaddress');
        $.post('/Home/User/editaddress', {
            'addressid': $newaddress.find('[name="addressid"]').val(),
            'buyname': $newaddress.find('[name="name"]').val(),
            'address': $newaddress.find('[name="address"]').val(),
            'buyphone': $newaddress.find('[name="phone"]').val(),
        }, function(data){
            if (data.error)  {
                layer.alert(data.error);
            }else{
                location.reload();
            }
        }, 'json');
    }

    function editaddress(id) {
        $.get('/Home/User/getaddress?id='+id, function (data) {
            var $newaddress = $('#newaddress');

            $newaddress.find('[name="addressid"]').val(data.addressid);
            $newaddress.find('[name="name"]').val(data.buyname);
            $newaddress.find('[name="address"]').val(data.address);
            $newaddress.find('[name="phone"]').val(data.buyphone);
            $newaddress.find('[type="submit"]').val('修改');
        }, 'json');
    }

    function deladdress(id) {
        layer.confirm('是否删除', function() {
            $.get('/Home/User/deladdress?id='+id, function (data) {
                if (data.error)  {
                    layer.alert(data.error);
                }else{
                    location.reload();
                }
            }, 'json');
        });

    }
</script>


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