<?php
namespace Home\Controller;

class CommentController extends BaseController{



    //所有消息
    function comment(){
        $this->assign('title','我的消息');
        $userid = session('user')['userid'];
        $Commentlist = M('comment');
        $commentlist = $Commentlist->field('*,(select nickname from user where userid=comment.userid) AS nickname')->where(['touserid'=>$userid])->order('status,createtime desc')->select();
        $this->assign('commentlist',$commentlist);
        $this->display('comment');
    }

    function docomment(){
        $datas = I('post.');

        if(!$datas['comment']) json(['error'=>'评论为空']);
        $userid = session('user')['userid'];
        if(!$userid) json(['error'=>'请先登录帐号']);
        $Comment = M('comment');
        $Product = M('product');
        $productid = $datas['productid'];
        $goodsuserid = $Product->where(['productid'=>$productid])->getField('userid');
        if($userid == $goodsuserid) json(['error'=>'您不能给自己评论']);
        $commentid = $datas['commentid'];
        $comment = $Comment->where(['commentid'=>$commentid])->find();
        if($userid == $comment['userid']) json(['error'=>'您不能回复自己']);
        //if($productid != $comment['productid']) json(['error'=>'别乱改input值！']);
        $touserid = !$comment['userid'] ? $goodsuserid : $comment['userid'];
        $Comment->add(['userid'=>$userid,'touserid'=>$touserid,'comment'=>$datas['comment'],'createtime'=>time(),'productid'=>$datas['productid']]);
        json(['code'=> 0]);
    }
}