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
    
<!--最顶部-->

    <div class="order-header">
        <div class="layout after">
            <div class="fl">
                <div class="logo pa-to-36 wi345">
                    <a href="/">
                        <img src="/Public/images/TP-shop_logo.png" alt=""></a>
                </div>
            </div>
            <div class="fr">
                <div class="pa-to-36 progress-area">
                    <div class="progress-area-wd" style="display:none">我的购物车</div>
                    <div class="progress-area-tx" style="display:none">填写核对订单信息</div>
                    <div class="progress-area-cg">成功提交订单</div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout after-ta order-ha">
        <div class="erhuh"> <i class="icon-succ"></i>
            <h3>订单提交成功，请您尽快付款！</h3>
            <p class="succ-p">
                订单号：&nbsp;&nbsp;<?php echo ($product["productid"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
            付款金额（元）：&nbsp;&nbsp; <b><?php echo ($product["price"]); ?></b>
                &nbsp; <b>元</b>
            </p>
            <div class="succ-tip">
                请您在&nbsp;&nbsp;
                <b> 10分钟之内</b>
                &nbsp;完成支付，否则订单将自动取消
            </div>
        </div>

        <form action="/Home/Pay/dopay?productid=<?php echo ($product["productid"]); ?>" method="post" name="cart4_form" id="cart4_form">
            <div class="orde-sjyy">
                <h3 class="titls">选择支付方式</h3>
                <div class="bsjy-g">
                    <dl>
                        <dd>

                            <div class="order-payment-area">
                                <div class="dsfzfpte">
                                    <b>选择支付方式</b>
                                </div>
                                <div class="po-re dsfzf-ee">
                                    <ul>
                                        <li>
                                            <div class="payment-area">
                                                <input type="radio" id="input-ALIPAY-1" value="pay_code=<?php echo ($v['code']); ?>" class="radio vam" name="pay_radio" >    
                                                <label for="">
                                                    <img src="/Public/images/icon_pay_zhifubao.jpg" width="120" height="40" onClick="change_pay(this);" />    
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="payment-area">
                                                <input type="radio" id="input-ALIPAY-1" value="pay_code=<?php echo ($v['code']); ?>" class="radio vam" name="pay_radio" >    
                                                <label for="">
                                                    <img src="/Public/images/icon_pay_weixin.jpg" width="120" height="40" onClick="change_pay(this);" />    
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                    </dl>
                    <div class="order-payment-action-area">
                        <input class="button-style-5 button-confirm-payment" type="submit" value="确认支付" >
                    </div>
                </div>
            </div>

        </form>
    </div>

<!--footer开始-->


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