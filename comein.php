<?php

//定义运行环境
defined('ENVIRONMENT') || define('ENVIRONMENT', 'dev');//dev开发；test测试；rel正式

//开发环境，开启报错
if(ENVIRONMENT == 'dev'){
	error_reporting(-1);
	ini_set('display_errors', 1);
}

//定义路径分隔符
defined('DS') || define('DS', DIRECTORY_SEPARATOR);

//定义目录常量

defined('BASE_PATH') || define('BASE_PATH', dirname(__FILE__) . DS);//项目根目录

//$static_filePath = "static/";// echo $_SERVER["REQUEST_URI"];
defined('STATIC_PATH') || define('STATIC_PATH', 'static' . DS);//静态文件目录
defined('STATIC_COMMON_PATH') || define('STATIC_COMMON_PATH', 'static' . DS . 'common' . DS);

defined('API_PATH') || define('API_PATH', 'api' . DS );//api目录
defined('BASE_CLASS_PATH') || define('BASE_CLASS_PATH', 'base' . DS );//公有父类目录


defined('TEMPLATE_EXT') || define('TEMPLATE_EXT', 'html' );

//请求路径 http://192.168.10.128:9090/user?login_mobile=&login_pwd=
//$get_path = str_replace("/", "", $_SERVER["REQUEST_URI"]);
//var_dump($_SERVER);die;

//$request_uri = isset($_SERVER["REQUEST_URI"]) ? str_replace("/", "", $_SERVER["REQUEST_URI"]) : '';// /user?login_mobile=&login_pwd=
//$script_name = str_replace("/", "", $_SERVER["SCRIPT_NAME"]);// /user
//$query = isset($_SERVER["QUERY_STRING"]) ? str_replace("/", "", $_SERVER["QUERY_STRING"]) : '';// login_mobile=&login_pwd=

$script_name = substr($_SERVER["SCRIPT_NAME"], 1);

$service = $script_name;

//默认登陆页面
if($service == ''){
	$service = 'login.html';
}

//include (STATIC_PATH . 'test.html');die;

if (file_exists(STATIC_PATH . $service)) {//进入静态资源	
	include (STATIC_PATH . $service);
//	$pathinfo = pathinfo(STATIC_PATH . $service);
//	if($pathinfo['extension'] == TEMPLATE_EXT){//模板文件
//		include (STATIC_PATH . $service);
//	}else{//其他js、css、图片等资源文件
//		include (STATIC_PATH . $service);
//	}
} else if(file_exists(API_PATH . $service . ".service")) {// 加载 controller

		//加载公用function，其他父类
		require ("functions");
		require (BASE_CLASS_PATH . "base.service");
		require (BASE_CLASS_PATH . "base.model");
		
		require (API_PATH . $service . ".service");
	
		$class_name = ucfirst($service) . "Service";
//		$loadClass = new $class_name();
//		$loadClass -> run();
		(new $class_name())->run();
} else {	
	include (STATIC_PATH . '404.html');	
}
