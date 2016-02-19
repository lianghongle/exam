<?php

//定义路径分隔符
defined('DS') || define('DS', DIRECTORY_SEPARATOR);

//定义目录常量
defined('STATIC_PATH') || define('STATIC_PATH', 'static' . DS);//静态文件目录

//定义静态文件扩展名
defined('TEMPLATE_EXT') || define('TEMPLATE_EXT', '.html');

$service = substr($_SERVER["SCRIPT_NAME"], 1);

//默认登陆页面
if(empty($service)){
	$service = 'login'.TEMPLATE_EXT;
}

if (file_exists(STATIC_PATH . $service)) {//进入静态资源
	include (STATIC_PATH . $service);
} else {
	include (STATIC_PATH . '404'.TEMPLATE_EXT);
}
