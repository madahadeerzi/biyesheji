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
                <li class="t1font"><a href="/Home/User/center">我的订单</a></li>
                <li class="t1img">&nbsp;</li>
                <?php if(($ifcomment != 0)): ?><li class="t1font"><a href="/Home/Comment/comment">你有未读的消息</a></li>
                    <li class="t1img">&nbsp;</li>
                    <?php else: ?>
                    <li class="t1font"><a href="/Home/Comment/comment2">我的消息</a></li>
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
        <div class="logo"><a href="/" title="TPshop"><img src="<?php echo IMG_URL;?>newLogo.png" alt="TPshop"></a></div>
    <!--logo结束-->
    
    <!-- 搜索开始-->
        <div class="searchBar">
            <div class="searchBar-form">
                <form name="sourch_form" id="sourch_form" method="post" action="<?php echo U("/Home/Goods/search");?>">
                    <input type="text" class="text" name="q" id="q" value=""  placeholder="  搜索关键字"/>
                    <input type="button" class="button" value="搜索" onclick="if($.trim($('#q').val()) != '') $('#sourch_form').submit();"/>
                </form>
            </div>
            <div class="searchBar-hot">
                <b>热门搜索</b>
               	<a target="_blank" href="/index.php/Home/Goods/search/q/%E6%89%8B%E6%9C%BA.html" class="ht">手机</a>
               	<a target="_blank" href="/index.php/Home/Goods/search/q/%E6%89%8B%E6%9C%BA.html" class="ht">小米</a>
               	<a target="_blank" href="/index.php/Home/Goods/search/q/%E6%89%8B%E6%9C%BA.html" class="ht">红米</a>
            </div>
        </div>
        <!-- 搜索结束-->
        
        <div class="ri-mall">
            <div class="my-mall">
            <!---我的商城-开始 -->
                <div class="mall">
                    <div class="le"><a href="<?php echo U('/Home/User');?>" >我的商城</a></div> 
                </div>
                <!---我的商城-结束 -->
            </div>
            <div class="my-mall" id="header_cart_list">
                <!---购物车-开始 -->
                <div class="micart">
                    <div class="le les">
                    	<a href="<?php echo U('Home/Cart/cart');?>" >我的购物车
                            <span class="shopping-num"><em id="cart_quantity">3</em><b></b></span>
                        </a>                       
                    </div>
                    
                    <div class="ri ris" style="display:">
                       <?php if(count($cartList) == 0): ?><div class="micart-about">
                                <span class="micart-xg">您的购物车是空的，赶紧选购吧！</span>
                            </div><?php endif; ?>
                        <div class="commod">
                        <ul>
                        <?php if(is_array($cartList)): foreach($cartList as $k=>$v): ?><li class="goods">
                                <div>
                                    <div class="p-img">
                                        <a href="">
                                            <img src="" alt="">
                                        </a>
                                     </div>
                                     <div class="p-name">
                                        <a href="">
                                            <span class="p-slogan"><?php echo ($v[goods_name]); ?></span>
                                            <span class="p-promotions hide"></span>
                                        </a>
                                     </div>
                                     <div class="p-status">
                                        <div class="p-price">
                                            <b>¥&nbsp;<?php echo ($v[goods_price]); ?></b>
                                            <em>x</em>
                                            <span><?php echo ($v[goods_num]); ?></span>
                                        </div>
                                        <div class="p-tags"></div>
                                     </div>
                                     <!--
                                     <a href="" class="icon-minicart-del" title="删除">删除</a>
                                       -->
                                </div>
                            </li><?php endforeach; endif; ?>   							
                        </ul>
                        </div>
                        <div class="settle">
                            <p>共<em><?php echo ($cart_total_price[anum]); ?></em>件商品，金额合计<b>¥&nbsp;<?php echo ($cart_total_price[total_fee]); ?></b></p>
                            <a class="js-button" href="<?php echo U('Home/Cart/cart');?>">去结算</a>
                        </div>
                    </div>
                </div>
                <!---购物车-结束 -->
                
            </div>
        </div>
        <div class="qr-code">
            <img src="<?php echo STATIC_IMG_URL;?>qrcode_vmall_app01.png" alt="二维码" />
            <p>扫一扫</p>
        </div>
    </div>
</header>
<!--头部-->

<!-- 导航-开始-->
	<div class="navigation">
	<div class="layout">
    	<!--全部商品-开始-->
    	<div class="allgoods">
        	<div class="goods_num"><h2>全部商品</h2><i class="trinagle"></i></div>
        	<div class="list">
               <ul class="list_ul"> 
                   <li class="list-li">
                        <div class="list_a">
                            <h3><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v[id]));?>"><span>手机、电脑、平板</span></a></h3>
                            <p> <!--$v[id][name] 数组中括号 里面的 id name 不能有 引号 sql 参数 必须双引号-->
                           	 	<a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>">手机配件</a>
                           	 	<a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>">摄影摄像</a>
                           	 	<a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>">运营商</a>
                            </p>
                        </div>
                        <div class="list_b">
                            <div class="list_bigfl">          
                                <a class="list_big_o ma-le-30" href="<?php echo U('Home/Goods/goodsList',array('id'=> $v2[id]));?>">手机配件 <i>＞</i>
                                </a>
                                <a class="list_big_o ma-le-30" href="<?php echo U('Home/Goods/goodsList',array('id'=> $v2[id]));?>">手机配件 <i>＞</i>
                                </a>
                                <a class="list_big_o ma-le-30" href="<?php echo U('Home/Goods/goodsList',array('id'=> $v2[id]));?>">手机配件
                                	<i>＞</i>
                                </a>
                                <a class="list_big_o ma-le-30" href="<?php echo U('Home/Goods/goodsList',array('id'=> $v2[id]));?>">手机配件
                                	<i>＞</i>
                                </a>                                   
                            </div>
                            <div class="subitems">                                        
                               <dl class="ma-to-20 cl-bo">
                                    <dt class="bigheader wh-sp"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>">手机配件</a><i>＞</i></dt>
                                    <dd class="ma-le-100">
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                    </dd>
                                </dl>
                                <dl class="ma-to-20 cl-bo">
                                    <dt class="bigheader wh-sp"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>">手机配件</a><i>＞</i></dt>
                                    <dd class="ma-le-100">
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                    </dd>
                                </dl>
                                <dl class="ma-to-20 cl-bo">
                                    <dt class="bigheader wh-sp"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>">手机配件</a><i>＞</i></dt>
                                    <dd class="ma-le-100">
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <i class="list_img"></i>
                    </li>
                    <li class="list-li">
                        <div class="list_a">
                            <h3><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v[id]));?>"><span>手机、电脑、平板</span></a></h3>
                            <p> <!--$v[id][name] 数组中括号 里面的 id name 不能有 引号 sql 参数 必须双引号-->
                           	 	<a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>">手机配件</a>
                           	 	<a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>">摄影摄像</a>
                           	 	<a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>">运营商</a>
                            </p>
                        </div>
                        <div class="list_b">
                            <div class="list_bigfl">          
                                <a class="list_big_o ma-le-30" href="<?php echo U('Home/Goods/goodsList',array('id'=> $v2[id]));?>">手机配件 <i>＞</i>
                                </a>
                                <a class="list_big_o ma-le-30" href="<?php echo U('Home/Goods/goodsList',array('id'=> $v2[id]));?>">手机配件 <i>＞</i>
                                </a>
                                <a class="list_big_o ma-le-30" href="<?php echo U('Home/Goods/goodsList',array('id'=> $v2[id]));?>">手机配件
                                	<i>＞</i>
                                </a>
                                <a class="list_big_o ma-le-30" href="<?php echo U('Home/Goods/goodsList',array('id'=> $v2[id]));?>">手机配件
                                	<i>＞</i>
                                </a>                                   
                            </div>
                            <div class="subitems">                                        
                               <dl class="ma-to-20 cl-bo">
                                    <dt class="bigheader wh-sp"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>">手机配件</a><i>＞</i></dt>
                                    <dd class="ma-le-100">
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                    </dd>
                                </dl>
                                <dl class="ma-to-20 cl-bo">
                                    <dt class="bigheader wh-sp"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>">手机配件</a><i>＞</i></dt>
                                    <dd class="ma-le-100">
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                    </dd>
                                </dl>
                                <dl class="ma-to-20 cl-bo">
                                    <dt class="bigheader wh-sp"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>">手机配件</a><i>＞</i></dt>
                                    <dd class="ma-le-100">
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                       <a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>">电池 电源 充电宝</a>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <i class="list_img"></i>
                    </li>
            	</ul>
            </div>
        </div>
        <!--全部商品-结束-->
        
        <div class="ongoods">
        	<ul class="navlist">
        		<li class="homepage"><a href="/"><span>首页</span></a></li>
                <li class="page"><a href="<?php echo ($v[url]); ?>" <span>积分商城</span></a></li>
                <li class="page"><a href="<?php echo ($v[url]); ?>" <span>个人中心</span></a></li>
                <li class="page"><a href="<?php echo ($v[url]); ?>" <span>个人中心</span></a></li>
                <li class="page"><a href="<?php echo ($v[url]); ?>" <span>个人中心</span></a></li>
                <li class="page"><a href="<?php echo ($v[url]); ?>" <span>个人中心</span></a></li>
                <li class="page"><a href="<?php echo ($v[url]); ?>" <span>个人中心</span></a></li>
                <li class="page"><a href="<?php echo ($v[url]); ?>" <span></span></a></li>
        	</ul>
        </div>
    </div>
</div>
<!-- 导航-结束-->

<div class="layout">
    <div class="breadcrumb-area">
        <a href="/">首页</a>
        >>
            <a  href="<?php echo U('/Home/Goods/goodsList',array('id'=>$k));?>">手机</a>
            >>
        <span>手机详情页</span>
    </div>
        <div class="layout pa-to-10">            
            <!--商品图片轮播-->            
            <div class="left-area">
              <div class="left-area-tb">
               <div class="pro-gallery-img">
                  <div class="jqzoom" style="position: absolute;top: 50%;height: 300px;margin-top: -150px;overflow: hidden;">
                      <img id="zoomimg" src="<?php echo ($product["img"]); ?>"  id="bigImage" width="480px"  alt=""/>
                  </div>
              </div>
              </div>
            </div>      
            <!--商品图片轮播 end-->        
                
            <div class="right-area-num">
                <div class="right-area">
                    <div class="right-area-le30">
                        <h1><?php echo ($product["title"]); ?></h1>
                    </div>
                </div>
                <div class="right-area ma-to--1">
                    
                <!--商品促销 start--> 


                    </if>
                    <!--商品促销 end-->               
                    <div class="right-area-le30 pa-3-0-0-30">
                        
                        <div class="pro-promotions-area">
                            <table class="promotions-tab" width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="70px" align="right">价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格：</td>
                                <td>
                                    <p class="co-red fo-si-24 ma-le-6">
                                        ￥<span class="co-red fo-si-24" id="goods_price"><?php echo ($product["price"]); ?></span>
                                    </p>                                    
                                </td>
                              </tr>

                              <tr>
                                <td align="right">商品编号：</td>
                                <td>
                                    <p class=" ma-le-6"><?php echo ($product["productid"]); ?> <a onClick="" style="color:#00F;">收藏</a></p>
                                    <!--用户评价-end-->                           
                                </td>
                              </tr>

                              <tr>
                                <td align="right">运&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;费：</td>
                                <td><p class="ma-le-6">满99免运费</p></td>
                              </tr>
                              <tr>
                                <td align="right">服&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;务：</td>
                                <td><p class="ma-le-6">由校园二手商城负责发货，并提供售后服务</p></td>
                              </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <form name="buy_goods_form" method="post" id="buy_goods_form" >
                <div class="right-area he315 ma-to--1">
                    <div class="right-area-le30 pa-3-0-0-30">
                        <div class="pro-promotions-area">
                            <table class="promotions-tab he40-tr-td" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <?php if(is_array($filter_spec)): foreach($filter_spec as $k=>$v): ?><tr>
                                <td align="right">尺寸：</td>
                                <td>
                                    <ul class="choice-colol ma-le-6">
                                        <li>
                                            <div class="color-sku-fant">
                                                <div class="sku  sku-bo-blo">
                                                    <a class="choice-size" onClick="switch_spec(this)">55英寸4K</a>
                                                    <input type="radio" style="display:none;" name="" value=""/>
                                                    <s></s>
                                                </div>
                                                <p></p>
                                            </div>                                            
                                        </li>
                                    </ul>
                                </td>
                              </tr><?php endforeach; endif; ?>   
                              <tr>
                                <td width="70px" align="right">联系人：</td>
                                <td><?php echo ($product["contacts"]); ?></td>
                              </tr>
                              <?php if(empty($filter_spec)): ?><tr>
                                <td align="right" >联系电话：</td>
                                <td><?php echo ($product["phone"]); ?></td>
                              </tr><?php endif; ?>
                            </table>
                        </div>
                        <div class="join-a-shopping-cart fl"><!-- location.href='<?php echo U('Home/Cart/cart');?>-->
                            <a class="jrgwc-shopping-img jrgwc-shopping-img2" href="/Home/Pay/pay?productid=<?php echo ($product["productid"]); ?>" >
                                <span>立即购买</span>
                            </a>
                        </div>

                        
                    </div>
                </div>
                    <input type="hidden" name="goods_id" value="<?php echo ($goods["goods_id"]); ?>" />
                </form>
            </div>
        </div>
    </div>
    
    <div style="display:none;" id="shopdilog">
            <div class="ui-popup ui-popup-modal ui-popup-show ui-popup-focus">
            <div i="dialog" class="ui-dialog">
            <div class="ui-dialog-arrow-a"></div>
            <div class="ui-dialog-arrow-b"></div>
            <table class="ui-dialog-grid">
                <tbody>
                <tr>
                    <td i="body" class="ui-dialog-body">
                        <div i="content" class="ui-dialog-content" id="content:1459321729418" style="width: 450px; height: auto;">
                            <div id="addCartBox" class="collect-public" style="display: block;">
                                <div class="colect-top">
                                    <i class="colect-icon"></i>
                                    <!--<i class="colect-fail"></i>-->
                                    <div class="conect-title">
                                        <span>添加成功</span>
                                        <div class="add-cart-btn fn-clear">
                                            <a href="javascript:;" class="ui-button ui-button-f80 fl go-shopping">继续购物</a>
                                            <a href="<?php echo U('Home/Cart/index');?>" class="ui-button ui-button-122 fl">去购物车结算</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="watch">
                                    <span>购买此宝贝的用户还购买了：</span>
                                    <ul class="fn-clear buy-list">              
                                    <li><a href="http://www.tp-shop.cn/item/201512CM310001099" class="watch-img" target="_blank"><img src="http://img01.fn-mart.com/C/item/2015/1231/201512C310000310/201512C310000245_134377335_200x200.jpg" alt=""></a><h4><a href="http://www.tp-shop.cn/item/201512CM310001099" target="_blank">巨圣冬季2015新款马丁靴女 中跟粗跟保暖英伦骑士风短靴流苏套筒圆头L854174068</a></h4><p><q class="fn-rmb">¥</q><strong class="fn-rmb-num">89</strong></p></li><li><a href="http://www.tp-shop.cn/item/201504CM150040438" class="watch-img" target="_blank"><img src="http://img02.fn-mart.com/C/item/2015/0415/201504C150036513/201504C150002841_817918286_200x200.jpg" alt=""></a><h4><a href="http://www.tp-shop.cn/item/201504CM150040438" target="_blank">百依恋歌 夏装新款大码显瘦短袖T恤女士韩版图案棉打底衫</a></h4><p><q class="fn-rmb">¥</q><strong class="fn-rmb-num">89</strong></p></li><li><a href="http://www.tp-shop.cn/item/201505CM210000863" class="watch-img" target="_blank"><img src="http://img03.fn-mart.com/C/item/2015/0521/201505C210000474/_328370304_200x200.jpg" alt=""></a><h4><a href="http://www.tp-shop.cn/item/201505CM210000863" target="_blank">洁婷透气双U日用纤巧棉柔卫生巾尝4片/包</a></h4><p><q class="fn-rmb">¥</q><strong class="fn-rmb-num">4.2</strong></p></li><li><a href="http://www.tp-shop.cn/item/201508CM240002876" class="watch-img" target="_blank"><img src="http://img04.fn-mart.com/C/item/2015/0824/201508C240000788/201508C240000750_047866800_200x200.jpg" alt=""></a><h4><a href="http://www.tp-shop.cn/item/201508CM240002876" target="_blank">美纳福 真空收纳压缩袋 2特大4大4中2手卷送电泵</a></h4><p><q class="fn-rmb">¥</q><strong class="fn-rmb-num">135</strong></p></li></ul>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td i="footer" class="ui-dialog-footer" style="display: none;">
                        <div i="statusbar" class="ui-dialog-statusbar" style="display: none;"></div>
                        <div i="button" class="ui-dialog-button"></div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
       </div>
    </div>
    <div class="layout ma-to-20 ov-hi">
        <!--<div class="wi240 ov-hi fl">-->
            <!--<div class="product-history-area">-->
                <!--<div class="hi47 co-grey">-->
                    <!--<h3 class="fl browse-his">推荐商品</h3>-->
                    <!--&lt;!&ndash;<span class="fr pa-15-16-0-0"><a class="del-dust cu-po"></a></span>&ndash;&gt;-->
                <!--</div>-->
                <!--<div class="history-bott">-->
                    <!--<ul class="history-comm">-->
                        <!--<li>-->
                            <!--<div>-->
                                <!--<p class="p-img-comm fl">-->
                                    <!--<a href=""><img class="img-comm" src="/Public/upload/goods/thumb/56/goods_sub_thumb_151_400_400.jpeg" alt=""></a>-->
                                <!--</p>-->
                                <!--<p class="p-name-comm">-->
                                    <!--<a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v[goods_id]));?>">华为 HUAWEI C199S 麦芒3S 电信4G智能手机FDD-LTE /TD-LTE/CDMA2000/GSM（麦芒金）</a>-->
                                <!--</p>-->
                                <!--<p class="p-price-comm">-->
                                    <!--<b>￥1999</b>-->
                                <!--</p>-->
                            <!--</div>-->
                        <!--</li>-->
                        <!--<li>-->
                            <!--<div>-->
                                <!--<p class="p-img-comm fl">-->
                                    <!--<a href=""><img class="img-comm" src="/Public/upload/goods/thumb/56/goods_sub_thumb_151_400_400.jpeg" alt=""></a>-->
                                <!--</p>-->
                                <!--<p class="p-name-comm">-->
                                    <!--<a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v[goods_id]));?>">华为 HUAWEI C199S 麦芒3S 电信4G智能手机FDD-LTE /TD-LTE/CDMA2000/GSM（麦芒金）</a>-->
                                <!--</p>-->
                                <!--<p class="p-price-comm">-->
                                    <!--<b>￥1999</b>-->
                                <!--</p>-->
                            <!--</div>-->
                        <!--</li>-->
                    <!--</ul>-->
                <!--</div>                -->
            <!--</div>-->
        <!--</div>-->
        <div class="ov-hi fr" style="width:100%">
            <div class="comm-param">
                <div class="parame-title">
                    <div class="par-titles co-grey">
                        <ul class="commodity-xq tab_li">
                            <li class="current cliks" onClick="switch_tab(this,'tab1')">
                                <a>商品详情</a>
                            </li>
                            <li class="cliks" onClick="switch_tab(this,'tab2')" id="commect">
                                <a>用户留言（99）</a>
                            </li>
                        </ul>
                    </div>
                </div>
                    <!---商品详情-->
                <div class="parame-bott cliks-bn" style="display:block" id="tab1">
                        <div class="commodity-num pro-feature-area">
                            <div clss="pro-disclaimer-area ma-to-20">
                            <?php echo ($product["introduction"]); ?>
                        </div>
                    </div>
                </div>
                <div class="parame-bott ov-hi" style="display:none"  id="tab2">
                    <div class="evaluation-top fo-fa di-in-bl">
                        <style>



                        </style>
                        <div class="cmt-list">
                            <?php if(($comment != null) ): if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="cmt-item clearfix" data-cmtid="1632212923" data-nick="t*********9" data-userid="0">
                                        <a href="javascript:;" target="_blank" class="cmt-reply-user">
                                            <img src="//wwc.alicdn.com/avatar/getAvatar.do?userId=0&amp;width=30&amp;height=30&amp;type=sns" alt="">
                                        </a>
                                        <div class="cmt-cont-wrap">
                                            <p class="cmt-cont">
                                                <span class="cmt-user-name"><?php echo ($vo["nickname"]); ?></span>
                                                <span class="cmt-cont-text">回复@<?php echo ($vo["to_nickname"]); ?>:<?php echo ($vo["comment"]); ?></span>
                                                <a href="##" style="float: right;" onclick="huifu(<?php echo ($vo["commentid"]); ?>,'<?php echo ($vo["nickname"]); ?>')">回复</a>
                                            </p>
                                            <p class="cmt-date">2017-02-04 13:37:25</p>
                                        </div>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div><?php echo ($page); ?></div><?php endif; ?>

                            <h3 class="fastpostreturn"><span>发表回复</span></h3>
                            <p id="reply" style="height:30px;line-height: 40px;"></p>
                            <form action="/Home/Comment/docomment" onsubmit="return ajaxcomment(this)" name="commentform" id="commentform">
                                <textarea class="huifuk_area" id="comment" name="comment"></textarea>
                                <input type="hidden" name="productid" value="<?php echo ($product["productid"]); ?>">
                                <input type="hidden" name="commentid" id="commentid" value="">
                                <input class="huifuk_btn jrgwc-shopping-img jrgwc-shopping-img2" type="submit" value="发表评论">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    function switch_tab(cur,tab)
    {
        $("#tab1,#tab2,#tab3,#tab4").hide(); // 先全部隐藏
        $("#"+tab).show();  // 再显示其中一个
        $("ul.tab_li li").removeClass("current"); // 先全部样式去除
        $(cur).addClass("current"); //  单独的给当前点击这个加上
    }

    function huifu(id,nickname){
        $("#reply").text("回复 @"+nickname+" :");
        $("#commentid").val(id);
    }


</script>
<?php if(I('p')>1) { ?>
<script>$('#commect').click();</script>
<?php } ?>





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
            &nbsp;&nbsp;<a href="http://www.tp-shop.cn/">TPshop开源商城</a>
            <!--您好,请您给TPshop留个友情链接-->
        </p>
    </div>
</div>
<!--footer借宿-->

</body>
</html>