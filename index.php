<?php

//设置模式为开发者模式
define('APP_DEBUG',true);
//给系统静态资源文件请求路径设置常量
define('CSS_URL','/Public/css/');
define('JS_URL','/Public/js/');
define('IMG_URL','/Public/images/');
define('STATIC_CSS_URL','/Public/Static/css/');
define('STATIC_JS_URL','/Public/Static/js/');
define('STATIC_IMG_URL','/Public/Static/images/');


include './ThinkPHP/ThinkPHP.php';
?>