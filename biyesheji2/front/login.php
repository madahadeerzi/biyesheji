

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>二手商城</title>
    <link rel="stylesheet" href="/biyesheji2/css/nav.css">
    <link rel="stylesheet" href="/biyesheji2/css/login.css">
    <link rel="stylesheet" href="/biyesheji2/css/bottom.css">
</head>
<body>
    <div>
        <div id="Layer1" style="position:fixed; left:0px; top:0px; width:100%;z-index:-1">
        <img src="/biyesheji2/pictures/background.jpg" width="100%" />
        </div>
        <nav>
            <div class="container">
                <div class="leftlist">
                    <ul>
                        <li><a href="/biyesheji2/index.php">首页</a></li>
                        <li><a href="/biyesheji2/front/login.php">登录</a></li>
                        <li><a href="/biyesheji2/front/register.php">注册</a></li>
                    </ul>
                </div>
                <div class="rightlist">
                    <ul>
                        <li><a href="#">我的订单</a></li>
                        <li><a href="#">商品分类</a></li>
                        <li><a href="#">卖家中心</a></li>
                    </ul>
                </div>
            </div>
        </nav>

            <form action="/biyesheji2/back/login/login.php" method="post" accept-charset="utf-8">
                <div class="login">
            <h2>
                <strong>登录</strong>
                <b>|</b>
            </h2>
            <div class="account">
                <label for="account">账号：
                <input type="text" name="username" id="account">
            </label>
            </div>
            <div class="password">
               <label for="userpass">密码：
                <input type="password" name="userpass" id="userpass">
            </label>
            </div>
            <div class="button">
                <br>
                <input type="submit" value="登录" id="button">
                <button onclick="window.location.href='/biyesheji2/front/register.php'">还没有帐号？</button>
            </div>
        </div>
            </form>

        <nav>
            <div class="bottom">
                <div class="leftlist">
                    <ul>
                    <li><a href="#">关于我们</a></li>
                    <li><a href="#">合作伙伴</a></li>
                    <li><a href="#">营销中心</a></li>
                    </ul>
                </div>
                <div class="rightlist">
                    <ul>
                        <li><a href="#">联系客服</a></li>
                        <li><a href="#">诚征英才</a></li>
                        <li><a href="#">知识产权</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <script type="text/javascript">
    function check(){
    var account=document.getElementById('account').value;//用户名
    var password=document.getElementById('userpass').value;
       if(account==""){
                    alert('账号不能为空');
                    }else
       if(password==""){
            alert('用户密码不能为空');
                    }
    };
    var btn = document.getElementById("button");
    btn.onclick = function(){
        check();
    }
    </script>
</body>
</html>
