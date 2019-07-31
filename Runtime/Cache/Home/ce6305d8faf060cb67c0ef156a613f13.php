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
                <div class="progress-area-tx" style="display:block">填写核对订单信息</div>
                <div class="progress-area-cg" style="display:none">成功提交订单</div>
            </div>
        </div>
    </div>
</div>
<style>
    /*.address tr td { border:#F00 solid 1px; }*/
    /*没选中的 收货地址*/
    .order-address-list table{background-color:inherit; border: 0px solid #CCC;}
    .order-address-list .default{visibility:hidden;}
    /*选中的 收货地址*/    
    .address_current{ background-color:#fffde6; border: 1px solid #fadccf;} 
    .address_current .default{visibility:visible;}          
</style>
<form action="/Home/Pay/confirmpay?productid=<?php echo ($product["productid"]); ?>" name="pay" id="cart2_form" method="post">
    <div class="layout be-table fo-fa ma-bo-45">
        <div class="con-info">
            <div class="con-y-info ma-bo-35">
                <div class="order-address-list address_current" >
                    <table width="100%" cellspacing="0" cellpadding="0" border="1" class="address">
                        <tbody>
                        <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <!--<input type="hidden" value="<?php echo ($vo["addressid"]); ?>" id="edit">-->
                                <td width="60" class="address_id" align="center">
                                    <input type="radio" data-province-id="338" data-city-id="339" data-district-id="340" name="address_id" value="<?php echo ($vo["addressid"]); ?>" checked="checked"></td>
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




            </div>

        </div>
        <div class="sc-area">
            <div class="dt-order-area">
                <div class="order-pro-list">
                    <div class="order-pro-list">
                        <div class="yxspy">
                            <div class="hv">您购买的以下商品</div>
                            <div class="bv">
                                <table border="0" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="tr-pro">商品</th>
                                            <th class="tr-price">单价（元）</th>
                                            <th class="tr-quantity">数量</th>
                                            <th class="tr-subtotal">小计（元）</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="leiliste">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="tr-pro">
                                            <ul class="pro-area-2">
                                                <li style="text-align:center;">
                                                  <a title="<?php echo ($product["title"]); ?>"  href="/Home/Product/showproduct?productid=<?php echo ($product["productid"]); ?>" seed="item-name" ><?php echo ($product["title"]); ?></a>
                                                </li> 
                                             </ul>
                                         </td>
                                        <!-- 预付订金商品的价格为空 -->
                                        <td class="tr-price te-al">¥<?php echo ($product["price"]); ?></td>

                                        <td class="tr-quantity te-al">1</td>
                                        <td rowspan="1" class="tr-subtotal te-al">
                                        <p><b>￥<?php echo ($product["price"]); ?></b></p>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="order-pro-total">

                    <div class="fr wcnhy">
                        <div class="fzoubddv">

                            <p class="yifje-order">
                                <span class="p-subtotal-price"> 应付金额：
                                    <b class="total" id="payables" style="float: right;">¥<?php echo ($product["price"]); ?></b>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-action-area te-al-ri">
                <div class="woypdbe sc-acti-list pa-to-20">
                    <!--<span class="p-subtotal-price">应付总额：<b>¥<span class="vab" id="payableTotal">2276.00</span></b></span>-->
                    <input style="padding: 10px 10px;border:0;" class="Sub-orders gwc-qjs" type="submit" value="确认购买" />
                </div>
            </div>
        </div>
    </div>
</form> 



    <script type="text/javascript">
        /**
        * 新增修改收货地址
        * id 为零 则为新增, 否则是修改
        *  使用 公共的 layer 弹窗插件  参考官方手册 http://layer.layui.com/
        */
        function add_edit_address(id)
        {
            if(id > 0) 
                var url = "http://demo2.tp-shop.cn///index.php?m=Home&c=User&a=edit_address&scene=1&call_back=call_back_fun&95"; // 修改地址  '<?php echo U('Home/User/add_address',array('scene'=>'1','call_back'=>'call_back_fun','id'=>id));?>' //iframe的url /index.php/Home/User/add_address
            else
                var url = "http://demo2.tp-shop.cn///index.php?m=Home&c=User&a=edit_address&scene=1&call_back=call_back_fun&95"; // 新增地址
            layer.open({
                type: 2,
                title: '添加收货地址',
                shadeClose: true,
                shade: 0.8,
                area: ['880px', '580px'],
                content: url,
            });     
        } 

        //更换自提点
        function replace_pickup(province_id, city_id, district_id) {
            var url = "http://demo2.tp-shop.cn///index.php?m=Home&c=Cart&a=replace_pickup&call_back=call_back_pickup&province_id="+province_id+"&city_id="+city_id+"&district_id="+district_id;
            layer.open({
                type: 2,
                title: '添加收货地址',
                shadeClose: true,
                shade: 0.8,
                area: ['880px', '580px'],
                content: url,
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