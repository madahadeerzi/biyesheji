<?php
namespace Home\Controller;
use Think\Controller;

class ProductController extends BaseController{
    function postproduct(){
        $this->assign('title','发布订单');
        if(!session('user')['userid']){
            $this->error('请登录后再发布订单','',3);
//            redirect('/Home/User/login');
        }else
            $Category = M('category');
            $category = $Category->select();
            $this->assign('category',$category);
            $this->display();
    }

    function updateproduct(){
        $this->assign('title','修改订单');
        $Product = M('product');
        $productid = I('productid',0,'int');
        $product = $Product->where(['productid' => $productid])->find();
        $Category = M('category');
        $category = $Category->select();
        if(!session('user')['userid'] || !$product || $product['userid'] != session('user')['userid']){
            $this->error('请登录后再发布订单','/Home/User/login',3);
//            redirect('/Home/User/login');
        }else{
            $this->assign('product',$product);
            $this->assign('category',$category);
            $this->display();
        }

    }

    function showproduct(){

        $Product = M('product');
        $productid = I('productid',0,'int');
        $Comment = M('comment');
        $Comment->where(['touserid'=>session('user')['userid'],'status'=>0])->save(['status'=>1]);

        $product = $Product->where(['productid' => $productid])->find();
        $category = M('category')->where(['id'=> $product['category']])->find();
        $product['catego'] = $category['category'];
        $count      = $Comment->where(['productid'=>$productid])->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性

        $comment = $Comment->field('*
                ,(SELECT nickname FROM user WHERE userid=comment.userid) AS nickname
                ,(SELECT nickname FROM user WHERE userid=comment.touserid) AS to_nickname')
            ->where(['productid'=>$productid])->limit($Page->firstRow.','.$Page->listRows)->select();


        if(!$product ){
            redirect('/Home/User/login');
        }else{
            $this->assign('title',$product['title']);
            $this->assign('page',$show);// 赋值分页输出
            $this->assign('comment',$comment);
            $this->assign('product',$product);
            $cate = M('category')->select();
            $this->assign('category',$cate);
            $this->display();
        }
    }

    function productlist(){
        $datas = I('post.');
        $Product = M('product');
        $category = I('category');


        if($category == 0){

            $count      = $Product->where('title like "%'.$datas["q"].'%"')->count();// 查询满足要求的总记录数
            $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(10)


            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $product = $Product->where('title like "%'.$datas["q"].'%"')->limit($Page->firstRow.','.$Page->listRows)->select();
        }else if($datas['q']){

            $count      = $Product->where('category = "'.$datas["category"].'" and title like "%'.$datas["q"].'%"')->count();// 查询满足要求的总记录数
            $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(10)

            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $product = $Product->where('category = "'.$datas["category"].'" and title like "%'.$datas["q"].'%"')->limit($Page->firstRow.','.$Page->listRows)->select();
        }else{

            $count      = $Product->where('category = "'.$category.'"')->count();// 查询满足要求的总记录数
            $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(10)

            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $product = $Product->where('category = "'.$category.'"')->limit($Page->firstRow.','.$Page->listRows)->select();
        }

        $Page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $show       = $Page->show();// 分页显示输出
        //把商品传到该界面
        $this->assign('productlist',$product);
        $this->assign('page',$show);// 赋值分页输出

        //把分类传到该页面
        $Category = M('category');
        $category = $Category->select();
        $this->assign('category',$category);
        $this->assign('title','商品列表');
        $this->display();
    }



    function dopostimg(){
        $filename = time().substr($_FILES['photo']['name'], strrpos($_FILES['photo']['name'],'.'));
        $response = array();
        if(move_uploaded_file($_FILES['photo']['tmp_name'], "./Public/userimg/".$filename)){
            $img = new \Think\Image();
            $img->open("./Public/userimg/".$filename);
            $img->thumb(480,400);
            $img->save("./Public/userimg/".$filename);
            $response['isSuccess'] = true;
            $response['photo'] = $filename;
        }else{
            $response['isSuccess'] = false;
        }
        echo json_encode($response);
    }

    function dopost(){
        //I是提取数据，M是连接数据库
        $datas = I('post.');
        $Product = M('product');

        if(!$datas['title']) json(['error'=>'标题为空']);
        if(!$datas['img']) json(['error'=>'图片为空']);
        if(!$datas['price']) json(['error'=>'价格为空']);
        if(!$datas['category']) json(['error'=>'分类为空']);
        if(!$datas['introduction']) json(['error'=>'介绍为空']);
        if(!$datas['contacts']) json(['error'=>'联系人为空']);
        if(!$datas['phone']) json(['error'=>'电话为空']);
        $datas['userid'] = session('user')['userid'];
        $datas['createtime'] = time();
        $datas['introduction'] = htmlspecialchars_decode($_POST['introduction']);
        $Product->add($datas);

        json(['code'=>0]);
    }

    function doupdate(){
        $datas = I('post.');
        $Product = M('product');

        if(!$datas['title']) json(['error'=>'标题为空']);
        if(!$datas['img']) json(['error'=>'图片为空']);
        if(!$datas['price']) json(['error'=>'价格为空']);
        if(!$datas['category']) json(['error'=>'分类为空']);
        if(!$datas['introduction']) json(['error'=>'介绍为空']);
        if(!$datas['contacts']) json(['error'=>'联系人为空']);
        if(!$datas['phone']) json(['error'=>'电话为空']);
        $datas['userid'] = session('user')['userid'];
        $datas['createtime'] = time();
        $datas['introduction'] = htmlspecialchars_decode($_POST['introduction']);
        $Product->where(['productid' => $datas['productid']])->save($datas);

        json(['code'=>0]);
    }

    function delproduct(){
        $productid = I('productid');
        if(M('product')->where(['productid'=>$productid])->find()['userid'] != session('user')['userid'])
            $this->error('不能删除别人的订单哦','',3);
        else if(M('product')->where(['productid'=>$productid,'status'=>1])->find()){
            M('product')->where(['productid'=>$productid])->delete();
            $this->success('删除成功','/Home/User/sell',1);
        }
        else{
            $this->error('不能随意删除哦','',2);
        }

    }
}