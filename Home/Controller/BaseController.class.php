<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller{
    function _initialize(){
        $userid = session('user')['userid'];
        $Comment = M('comment');
        $ifcomment = $Comment->where(['touserid'=>$userid,'status'=>0])->count();
        $this->assign('ifcomment',$ifcomment);

    }
}