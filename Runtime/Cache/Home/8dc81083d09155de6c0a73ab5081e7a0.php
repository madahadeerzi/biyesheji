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
        <div class="logo"><a href="/" title="Logo"><img src="<?php echo IMG_URL;?>TP-shop_logo.png" alt="TPshop"></a></div>
    <!--logo结束-->


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



        <div class="qr-code">
            <img src="Static/images/qrcode_vmall_app01.png" alt="二维码" />
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

<!-- 首页轮播图片 轮播js 广告-->
<script src="<?php echo STATIC_JS_URL;?>slider.js"></script>
<script type="text/javascript">
	// 首页轮播图片 轮播js 广告
	$(function() {
		var bannerSlider = new Slider($('#banner_tabs'), {
			time: 5000,
			delay: 400,
			event: 'hover',
			auto: true,
			mode: 'fade',
			controller: $('#bannerCtrl'),
			activeControllerCls: 'active'
		});
		$('#banner_tabs .flex-prev').click(function() {
			bannerSlider.prev()
		});
		$('#banner_tabs .flex-next').click(function() {
			bannerSlider.next()
		});
	})
</script>
<!-- 首页轮播图片 轮播js 广告 end-->


<!--热卖-首发-新闻-公告-开始-->
<div class="layout">
	<div class="bs-le">
    	<div class="first">
        	<ul>
                <?php if(is_array($first)): $i = 0; $__LIST__ = $first;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="sellers">
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
                                <div class="price">
                                    <em>￥<?php echo ($vo["price"]); ?></em>
                                </div>
                                <div class="imm-button">
                                    <a href="/Home/Product/showproduct?productid=<?php echo ($vo["productid"]); ?>"><span>立即抢购</span></a>
                                </div>

                            </div>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>


        	</ul>
        </div>
    </div>

</div>
<!--热卖-首发-新闻-公告-结束-->

<!--中部banner-开始-->
<div class="layout">
	<div class="cen-banne">
        <adv  pid = "3" limit="1" item="v">            
	        <a href="<?php echo ($v['ad_link']); ?>">
    	        <img src="/Public/images/banner4.jpg" width="1200" height="160"  title="<?php echo ($v[title]); ?>" style="<?php echo ($v[style]); ?>"/>
            </a>    
         </adv>   
    </div>
</div>
<!--中部banner-结束-->

<!--楼层-开始-->
<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="layout layer">
        <div class="ground-flool">
            <div class="flool-t">
                <h2><a href=""><?php echo ($vo["category"]); ?></a></h2>
                <em><?php echo ($vo["description"]); ?></em>
                <ul><!--
				<li><a href="<?php echo U('/Home/Goods/goodsList',array('brand_id'=>1));?>">诺基亚</a></li>
                -->
                </ul>
            </div>
            <div class="flool-b layer">
                <ul class="flool-cle">
                    <?php if(is_array($vo["products"])): $i = 0; $__LIST__ = $vo["products"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i; if($i == 1 ): ?><li class="sellers sell_ons">
                                <div class="best">
                                    <div class="best-about">
                                        <div class="best_img best_img2">
                                            <a href="/Home/Product/showproduct?productid=<?php echo ($voo["productid"]); ?>">
                                                <img src="<?php echo ($voo["img"]); ?>" />
                                            </a>
                                        </div>
                                        <div class="best_name">
                                            <a href="/Home/Product/showproduct?productid=<?php echo ($voo["productid"]); ?>">
                                                <span><?php echo ($voo["title"]); ?></span>
                                            </a>
                                        </div>
                                        <div class="best_Introduction">
                                            <div class="intr-t"><?php echo mb_substr(strip_tags($voo['introduction']),0,32);?></div>

                                        </div>
                                        <div class="price">
                                            <span>¥</span> <em><?php echo ($voo["price"]); ?></em>
                                        </div>
                                        <div class="imm-button">
                                            <a href="/Home/Product/showproduct?productid=<?php echo ($voo["productid"]); ?>">
                                                <span>立即抢购</span>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            <?php else: ?>
                            <li class="sellers sellers2 sell_ons">
                                <div class="best">
                                    <div class="best-about">
                                        <div class="best_img best_img2 best_img3">
                                            <a href="/Home/Product/showproduct?productid=<?php echo ($voo["productid"]); ?>"><img src="<?php echo ($voo["img"]); ?>" /></a>
                                        </div>
                                        <div class="intr-t intr-t3"><?php echo ($voo["title"]); ?></div>
                                        <div class="price prices">
                                            <a href="/Home/Product/showproduct?productid=<?php echo ($voo["productid"]); ?>" class="price prices">
                                                <span>¥</span><em><?php echo ($voo["price"]); ?></em>
                                            </a>
                                        </div>
                                        <div class="tag">
                                            <!--<img src="__STATIC__/images/1382593860805.png" alt="首发" />-->
                                        </div>
                                    </div>
                                </div>
                            </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                    <!--<li class="sellers sellers2 sell_ons">-->
                        <!--<div class="best">-->
                            <!--<div class="best-about">-->
                                <!--<div class="best_img best_img2 best_img3">-->
                                    <!--<a href="<?php echo U('/Home/Goods/goodsInfo',array('id'=>$v[goods_id]));?>"><img src="/Public/upload/goods/thumb/45/goods_thumb_45_222_222.jpeg" /></a>-->
                                <!--</div>-->
                                <!--<div class="intr-t intr-t3">Apple iPhone 6s Pl...</div>-->
                                <!--<div class="price prices">-->
                                    <!--<span>¥</span><em>1999</em>-->
                                <!--</div>-->
                                <!--<div class="tag">-->
                                    <!--&lt;!&ndash;<img src="__STATIC__/images/1382593860805.png" alt="首发" />&ndash;&gt;-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</li>-->
                    <!--<li class="sellers sellers2 sell_ons">-->
                        <!--<div class="best">-->
                            <!--<div class="best-about">-->
                                <!--<div class="best_img best_img2 best_img3">-->
                                    <!--<a href="<?php echo U('/Home/Goods/goodsInfo',array('id'=>$v[goods_id]));?>"><img src="/Public/upload/goods/thumb/45/goods_thumb_45_222_222.jpeg" /></a>-->
                                <!--</div>-->
                                <!--<div class="intr-t intr-t3">Apple iPhone 6s Pl...</div>-->
                                <!--<div class="price prices">-->
                                    <!--<span>¥</span><em>1999</em>-->
                                <!--</div>-->
                                <!--<div class="tag">-->
                                    <!--&lt;!&ndash;<img src="__STATIC__/images/1382593860805.png" alt="首发" />&ndash;&gt;-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</li>-->
                    <!--<li class="sellers sellers2 sell_ons">-->
                        <!--<div class="best">-->
                            <!--<div class="best-about">-->
                                <!--<div class="best_img best_img2 best_img3">-->
                                    <!--<a href="<?php echo U('/Home/Goods/goodsInfo',array('id'=>$v[goods_id]));?>"><img src="/Public/upload/goods/thumb/45/goods_thumb_45_222_222.jpeg" /></a>-->
                                <!--</div>-->
                                <!--<div class="intr-t intr-t3">Apple iPhone 6s Pl...</div>-->
                                <!--<div class="price prices">-->
                                    <!--<span>¥</span><em>1999</em>-->
                                <!--</div>-->
                                <!--<div class="tag">-->
                                    <!--&lt;!&ndash;<img src="__STATIC__/images/1382593860805.png" alt="首发" />&ndash;&gt;-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</li>-->
                    <!--<li class="sellers sellers2 sell_ons">-->
                        <!--<div class="best">-->
                            <!--<div class="best-about">-->
                                <!--<div class="best_img best_img2 best_img3">-->
                                    <!--<a href="<?php echo U('/Home/Goods/goodsInfo',array('id'=>$v[goods_id]));?>"><img src="/Public/upload/goods/thumb/45/goods_thumb_45_222_222.jpeg" /></a>-->
                                <!--</div>-->
                                <!--<div class="intr-t intr-t3">Apple iPhone 6s Pl...</div>-->
                                <!--<div class="price prices">-->
                                    <!--<span>¥</span><em>1999</em>-->
                                <!--</div>-->
                                <!--<div class="tag">-->
                                    <!--&lt;!&ndash;<img src="__STATIC__/images/1382593860805.png" alt="首发" />&ndash;&gt;-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</li>-->
                    <!--<li class="sellers sellers2 sell_ons">-->
                        <!--<div class="best">-->
                            <!--<div class="best-about">-->
                                <!--<div class="best_img best_img2 best_img3">-->
                                    <!--<a href="<?php echo U('/Home/Goods/goodsInfo',array('id'=>$v[goods_id]));?>"><img src="/Public/upload/goods/thumb/45/goods_thumb_45_222_222.jpeg" /></a>-->
                                <!--</div>-->
                                <!--<div class="intr-t intr-t3">Apple iPhone 6s Pl...</div>-->
                                <!--<div class="price prices">-->
                                    <!--<span>¥</span><em>1999</em>-->
                                <!--</div>-->
                                <!--<div class="tag">-->
                                    <!--&lt;!&ndash;<img src="__STATIC__/images/1382593860805.png" alt="首发" />&ndash;&gt;-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</li>-->
                </ul>
            </div>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>


<!--底部banner-开始-->
	<div class="layout layer">
    	<div class="cen-banne">
            <adv  pid = "4" limit="1" item="v">            
    	        <a href="<?php echo ($v['ad_link']); ?>">
        	        <img src="/Public/upload/ad/2016/03-11/56e29344381c4.jpg" width="1200" height="160" title="<?php echo ($v[title]); ?>" style="<?php echo ($v[style]); ?>"/>
	            </a>    
             </adv>            
        </div>
    </div>
<!--底部banner-结束-->
<!--楼层-结束-->

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