<?php
namespace Home\Controller;

class IndexController extends BaseController
{
    public function index()
    {
        $this->assign('title','首页');

        //把商品前4个放到网站
        $Product = M('product');
        $first_product = $Product->order('createtime desc')->limit(4)->select();
        $this->assign('first',$first_product);

        //把商品分类放到首页
        $Category = M('category');
        $category = $Category->select();


        //商品分类显示到首页
        for($i = 0;$i<count($category);$i++){
            $product = $Product->where('category = '.$category[$i]['id'])->order('createtime desc')->limit(7)->select();
            $category[$i]['products'] = $product;
        }


        $this->assign('category',$category);
        $this->display();

    }
}