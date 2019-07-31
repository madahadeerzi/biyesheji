<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'biyesheji', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'root', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PARAMS' =>  array(), // 数据库连接参数
//    'DB_PREFIX' => 'think_', // 数据库表前缀
    'DB_CHARSET'=> 'utf8', // 字符集
    'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'LAYOUT_ON'=>   true,
    'LAYOUT_NAME'=>'layout',
    'SESSION_AUTO_START' => true,
    'TMPL_ACTION_ERROR' => 'Tpl/jump',
    'TMPL_ACTION_SUCCESS' => 'Tpl/jump',
    //SHOW_PAGE_TRACE=>true,
);