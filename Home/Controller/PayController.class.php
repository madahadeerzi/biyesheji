<?php
namespace Home\Controller;

class PayController extends BaseController{
    function pay(){
        $this->assign('title','确认订单');
        $productid = $_GET['productid'];
        $Product = M('product');
        $product = $Product->where(['productid'=>$productid])->find();
        if(!session('user')){
            $this->error('请先登录再购买','/Home/User/login',3);
        }else if($product['status']!=1 && $product['touserid']!=session('user')['userid']){
            $this->error('你的手速太慢了，该订单已被其他人下单','/',3);
        }else if($product['userid']==session('user')['userid'] || $product['userid'] == $product['touserid']){
            $this->error('你不能自己买自己的东西','/',3);
        }
        $this->assign('product',$product);

        $Address = M('address');
        $address = $Address->where('userid = '.session('user')['userid'])->select();
        $this->assign('address',$address);
        $this->display();
    }

    function confirmpay(){

        $Product = M('product');
        $product = $Product->where('productid='.I('get.productid'))->find();
        if(!I('address_id')){
            $this->error('请填写地址再进行购买','',3);
        }
        if($product['status']!=1 && $product['touserid']!=session('user')['userid']){
            $this->error('你的手速太慢了，该订单已被其他人下单','/',3);
        }else if($product['userid']==session('user')['userid'] || $product['userid'] == $product['touserid']){
            $this->error('你不能自己买自己的东西','/',3);
        } else{
            $Address = M('address');
            $datas = I('post.');
            $addressid = $datas['address_id'];
            $address = $Address->field('address,buyname,buyphone')->where('addressid ='.$addressid)->find();
            $address['status']=2;
            $address['touserid']=session('user')['userid'];
            $Product->where('productid='.$_GET['productid'])->save($address);

            $this->assign('product',$product);
            $this->display();
        }
    }

    function dopay(){

        $productid = I('get.productid');
        $Product = M('product');
        $product = $Product->where('productid='.$productid)->find();
        if($product['status']!=2 && $product['touserid']!=session('user')['userid']){
            $this->error('你的手速太慢了，该订单已被其他人下单','/',3);
        }else if($product['userid']==session('user')['userid'] || $product['userid'] == $product['touserid']){
            $this->error('你不能自己买自己的东西','/',3);
        }
        $Product->where('productid='.$productid)->save(['status'=>3]);
        $this->success('恭喜你购物成功，请耐心等待发货','/',3);
    }

    function deliver(){
        $productid = I('get.productid');
        $Product = M('product');
        $product = $Product->where('productid='.$productid)->find();
        $this->assign('product',$product);
        $this->display();
    }

    function dodeliver(){
        $productid = I('get.productid');
        $Product = M('product');
        $Product->where('productid='.$productid)->save(['status'=>4]);
        $this->success('恭喜你发货成功','/Home/User/center',3);
    }

    function confirmok(){
        $productid = I('get.productid');
        $Product = M('product');
        $Product->where('productid='.$productid)->save(['status'=>5]);
        $this->success('你的钱将会转给我，谢谢','/Home/User/center',3);
    }
}