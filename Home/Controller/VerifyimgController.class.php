<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
class VerifyimgController extends Controller{
    function  verifyimg(){
        $cfg = array(
            'imageH' =>  38,
            'imageW' => 102,
            'length' =>   4,
            'fontSize' =>15,
            'fontttf' => '4.ttf',
        );
        $very = new Verify($cfg);
        $very->entry();
    }
}