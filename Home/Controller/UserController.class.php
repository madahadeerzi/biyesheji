<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;

class UserController extends BaseController{

    //登录界面
    function login(){
        $this->assign('title','登录页面');
        $this->display();
    }

    //注册界面
    function register(){
        $this->assign('title','注册页面');
        $this->display();
    }

    //忘记密码界面
    function forget(){
        $this->assign('title','找回密码');
       $this->display();
    }

    //个人信息界面
    function userinfo(){
        $this->assign('title','个人信息');
        $userid = session('user')['userid'];
        $Userinfo = M('userinfo');
        //如果有数据传过来，先判断是否有数据，如果没有则保存
        $datas = I('post.');
        if($datas){
            $datas['userid']= $userid;
            $userinfo = $Userinfo->where(['cardid' => $datas['cardid']])->find();
            if($userinfo){
                json(['error'=>'该卡号以被绑定']);
            }else{
                $Userinfo->add($datas);
                json(['code'=>0]);
            }
        }
        $userinfo = $Userinfo->where(['userid' => $userid])->find();
        if($userinfo){
            $this->assign('userinfo',$userinfo);
        }
        $this->display();
    }

    //我要卖界面，里面负责放用户卖出去的界面
    function sell(){
        $this->assign('title','我要卖');
        $userid = session('user')['userid'];
        $Product = M('product');
        $productlist = $Product
            ->field('*, (SELECT statusname FROM poststatus WHERE statusid=product.status) AS statusname')
            ->where(['userid'=>$userid])
            ->select();
        $this->assign('productlist',$productlist);


        $this->display();
    }

    //我的地址
    function address(){
        $this->assign('title','我的地址');
        $Address = M('address');
        $address = $Address->where('userid='.session('user')['userid'])->select();
        $this->assign('address',$address);
        $this->display();
    }

    //修改和新增地址
    function editaddress(){
        $datas = I('post.');
        if(!$datas['address']) json(['error'=>'姓名不能为空']);
        if(!$datas['address']) json(['error'=>'地址不能为空']);
        if(!$datas['address']) json(['error'=>'电话不能为空']);
        $Address = M('address');
        $datas['userid'] = session('user')['userid'];
        if ($datas['addressid']) {
            $Address->where([
                'userid'=>session('user')['userid'],
                'addressid' => $datas['addressid'],
            ])->save($datas);
        } else {
            $Address->add($datas);
        }
        json(['success'=>0]);
    }

    //删除地址
    function deladdress(){
        $addressid= I('get.id');

        if (M('address')->where([
            'userid'=>session('user')['userid'],
            'addressid' => $addressid,
        ])->delete()) {
            json(['code'=>0]);
        } else {
            json(['error'=>'删除失败']);
        }
    }

    //获得地址信息
    function getaddress(){
        $addressid= I('get.id');
        json(M('address')->where([
            'userid'=>session('user')['userid'],
            'addressid' => $addressid,
        ])->find());
    }

    //我的订单
    function center(){
        $this->assign('title','我要买');
        $userid = session('user')['userid'];
        $Product = M('product');
        $productlist = $Product
            ->field('*, (SELECT statusname FROM poststatus WHERE statusid=product.status) AS statusname')
            ->where(['touserid'=>$userid])
            ->select();
        $this->assign('productlist',$productlist);
        $this->display();
    }

    //注册功能
    function doreg(){
        $datas = I('post.');            //获得前端传来的数据
        $User = M('user');              //连接数据库，并且选中user数据表

        //判断输入的数据，如果有错误，则返回错误值
        if(!$datas['username']) json(['error'=>'用户为空']);
        if(!$datas['nickname']) json(['error'=>'昵称为空']);
        if(!$datas['password']) json(['error'=>'密码为空']);
        if($datas['password']!=$datas['repassword']) json(['error'=>'密码不相同']);
        if(!$datas['email']) json(['error'=>'邮箱为空']);
        if(!$datas['consent']) json(['error'=>'没阅读协议']);

        //判断用户名和邮箱是否被占用
        if($User->where(['username' => $datas['username']])->count()!=0) json(['error'=>'用户已存在']);
        if($User->where(['email' =>$datas['email']])->count()!=0) json(['error'=>'该邮箱已被注册，请换个邮箱']);

        $datas['password'] = password($datas['password']);
        $datas['createtime'] = time();
        $User->add($datas);

        //制作随机口令
        $code = rand(100000000000000,9999999999999999);
        $User->where(['username' => $datas['username']])->save(['regcode'=>$code,'regtime'=>time()]);
        $user = $User->where(['username'=> $datas['username']])->find();

        //发送邮件
        $str = '请点击下方链接激活您的帐号   http://www.hsjshop.com/Home/User/activate?code='.base64_encode(sha1($code)).'&id='.$user['userid'];
        $this->email($user['email'],'激活帐号',$str);
        $this->success('恭喜你注册成功，请您去邮箱激活您的帐号','/',3);

        json(['code'=>0]);
    }

    //登录功能
    function dologin(){

        $very = new Verify();
        $datas = I('post.');
        $User = M('user');

        if(!$datas['username']) json(['error'=>'用户名为空']);      //判断用户名是否为空

        if(!$datas['password']) json(['error'=>'密码为空']);       //判断密码是否为空

        if(!$very->check($datas['verycode'])) json(['error' => '验证码错误']); //判断验证码是否正确

        //先判断是否有该用户，然后判断密码是否正确
        $user = $User->where(['username' => $datas['username']])->find();
        if(!$user) json(['error' =>'用户不存在']);

        if($user['password'] != password($datas['password'])) json(['error' => '密码错误']);
        if($user['status']!=1) json(['error'=>'您的帐号尚未激活，请激活后再登录']);

        session('user',$user);
        json(['code' => 0]);
    }

    //找回密码功能
    function doforget(){
            $very = new Verify();
            $datas = I('post.');
            $User = M('user');

            if(!$datas['username']) json(['error'=>'用户名或邮箱为空']);      //判断用户名是否为空

            if(!$very->check($datas['verycode'])) json(['error' => '验证码错误']); //判断验证码是否正确

            //先判断是否有该用户
            $user = $User->where(['username' => $datas['username']])->find();

            //制作随机的口令
            $code = rand(100000000000000,9999999999999999);
            $User->where(['username' => $datas['username']])->save(['forgetcode'=>$code,'forgettime'=>time()]);

            $str = '请点击下方链接进行重置密码   http://www.hsjshop.com/Home/User/editpassword?code='.base64_encode(sha1($code)).'&id='.$user['userid'];

            if(!$user) {
                $mail =$User->where(['email'=>$datas['username']])->find();
                $str = '请点击下方链接进行重置密码   http://www.hsjshop.com/Home/User/editpassword?code='.base64_encode(sha1($code)).'&id='.$mail['userid'];
                if(!$mail){
                    json(['error'=>'没有该用户或者邮箱不正确']);
                }else {
                    $User->where(['email'=>$datas['username']])->limit(1)->save(['forgetcode'=>$code,'forgettime'=>time()]);
                    $this->email($mail['email'],'找回密码',$str);
                }
            }else{
                $this->email($user['email'],'找回密码',$str);
            }
            json(['error' => '邮箱已发送']);
    }

    //激活帐号功能
    function activate(){
        $this->assign('title','激活帐号');
        if (base64_decode(I('code')) == sha1(M('user')->where(['userid'=>I('id')])->getField('regcode')) && (time()-(M('user')->where(['userid'=>I('id')])->getField('regtime')))<=900){
            M('user')->where(['userid'=>I('id')])->save(['status'=>1]);
            $this->success('恭喜你激活成功','/Home/User/login',3);
        }else if(base64_decode(I('code')) == sha1(M('user')->where(['userid'=>I('id')])->getField('regcode')) && (time()-(M('user')->where(['userid'=>I('id')])->getField('regtime')))>900){
            M('user')->where(['userid'=>I('id')])->delete();
            $this->error('你已超过激活时间，请重新注册','/Home/User/register',3);
        }else{
            $this->error('该链接已失效','/',3);
        }


    }

    //注销功能
    function dologout(){
        session('user',null);
        redirect('/');
    }

    //发送邮箱功能
    function email($email,$title,$str){
        require 'PHPMailer/PHPMailerAutoload.php';
        $mail = new \PHPMailer;

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.163.com';                          // Specify main and backup SMTP servers
        $mail->CharSet= 'UTF-8';
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'madahadeerzi@163.com';                        // SMTP username
        $mail->Password = 'qweasd123';                 // SMTP password otozudkjbpvybjfg
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom('madahadeerzi@163.com', 'HuangSzeKit');
        $mail->addAddress($email);  // Add a recipient

        $mail->Subject = $title;
        $mail->Body    = $str;

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    function editpassword() {
        if (base64_decode(I('code')) == sha1(M('user')->where(['userid'=>I('id')])->getField('forgetcode')) && (time()-(M('user')->where(['userid'=>I('id')])->getField('forgettime')))<=900) {
            $this->assign('title','修改密码');
            $datas = I('post.');
            if($datas){
                if(!$datas['password'] || !$datas['repassword']) {json(['error'=>'密码为空']);}
                if($datas['repassword'] != $datas['password']) {json(['error' =>'两次密码不为空']);}
                $password= password($datas['password']);
                $User = M('user');
                $User->where(['userid' => I('id')])->save(['password'=>$password]);
                $this->success('修改成功','/',3);
                exit;
            }

            $this->display();
        }else{
            $this->error('该链接已失效，请重新获取','/Home/User/forget',3);
        }
    }
}
