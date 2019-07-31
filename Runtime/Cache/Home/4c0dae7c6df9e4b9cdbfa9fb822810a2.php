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
    <div class="fr wi940">
        <div class="myhome-welcome pa-to-20">
            <div class="fl myhome-tx">
                <div class="w-img"><img src="/Public/images/not_adv.jpg" alt=""></div>
                <div class="w-vip po-ab"><i class="w-v0"></i></div>
            </div>
            <div class="ov-hi ma-le-158">
                <h2 class="n-name"><?php echo session('user')['nickname'];?>，欢迎您！</h2>
                <div class="w-info">
                    <span>我的余额：&nbsp;<em><a href="">0</a></em></span>
                    <span>等级：注册会员</span>
                    <span>
                        <span style="display: none;"><a class="link-non-validated" href="">已验证手机</a></span>
                        <a class="link-non-validated2" href="<?php echo U('Home/User/mobile_validate',array('step'=>1));?>">未验证手机</a>
                    </span>
                    <span>
                        <?php if($user['email_validated'] == 1): ?><span><a class="link-non-validated" href="">已验证邮箱</a></span>
                            <?php else: ?>
                            <a style="display: none;" class="link-non-validated2" href="<?php echo U('Home/User/email_validate',array('step'=>1));?>">未验证邮箱</a><?php endif; ?>
                    </span>
                    <span><a class="link-non-validated" href="">未实名认证</a></span>
                    <span>优惠券&nbsp;<em><a href="">1 </a></em>&nbsp;张</span>
                    <span>站内信&nbsp;<em><a href="">0</a></em>&nbsp;条</span>
                </div>
                <div class="w-ple pa-to-10">
                    <dl>
                        <dt>我的特权：</dt>
                        <dd><a href=""><img src="/Public/Static/images/icon_privilege_vip_small_light.png"/></a></dd>
                        <dd><a href=""><img src="/Public/Static/images/icon_privilege_v_small_light.png"/></a></dd>
                        <dd><a href=""><img src="/Public/Static/images/icon_privilege_yh_small_light.png"/></a></dd>
                        <dd><a href=""><img src="/Public/Static/images/icon_privilege_vipDay_small_gray.png"/></a></dd>
                    </dl>
                </div>
            </div>


            <div class="bs-le">
                <div class="first">
                    <ul>
                        <?php if(is_array($productlist)): $i = 0; $__LIST__ = $productlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="sellers" style="width: 100%">
                                <div class="best">
                                    <div class="best-about">
                                        <div class="best_img" style="margin-top:50px; height:220px;">
                                            <a href="/Home/Product/showproduct?productid=<?php echo ($vo["productid"]); ?>"><img src="<?php echo ($vo["img"]); ?>" style="width:180px; height:180px;"/></a>
                                        </div>
                                        <div class="best_name">
                                            <a href="/Home/Product/showproduct?productid=<?php echo ($vo["productid"]); ?>">
                                                <span><?php echo ($vo["title"]); ?></span>
                                            </a>
                                        </div>
                                        <div class="best_Introduction">
                                            <div class="intr-t"><?php echo mb_substr(strip_tags($vo['introduction']),0,32);?></div>

                                        </div>
                                        <div class="productstatus">
                                            <?php echo ($vo["statusname"]); ?>
                                        </div>
                                        <div class="price">
                                            <em>￥<?php echo ($vo["price"]); ?></em>
                                        </div>
                                        <?php if($vo["status"] == 1 ): ?><div class="imm-button" style="margin-right: 10px;">
                                                <a href="/Home/Product/updateproduct?productid=<?php echo ($vo["productid"]); ?>"><span>我要修改</span></a>
                                            </div>

                                            <div class="imm-button">
                                            <a href="/Home/Product/delproduct?productid=<?php echo ($vo["productid"]); ?>"><span>我要删除</span></a>
                                            </div>
                                            <?php elseif($vo["status"] == 3): ?>
                                            <div class="imm-button">
                                                <a href="/Home/Pay/deliver?productid=<?php echo ($vo["productid"]); ?>"><span>我要发货</span></a>
                                            </div><?php endif; ?>


                                    </div>
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>


                    </ul>
                </div>
            </div>


        </div>
    </div>
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