<?php

//开发，开启报错
error_reporting(-1);
ini_set('display_errors', 1);

//定义路径分隔符
defined('DS') || define('DS', DIRECTORY_SEPARATOR);

//定义静态文件目录
//$static_filePath = "static/";// echo $_SERVER["REQUEST_URI"];
defined('STATIC_PATH') || define('STATIC_PATH', 'static' . DS);
defined('STATIC_COMMON_PATH') || define('STATIC_COMMON_PATH', 'static' . DS . 'common' . DS);

defined('API_PATH') || define('API_PATH', 'api' . DS );

//请求路径 http://192.168.10.128:9090/user?login_mobile=&login_pwd=
//$get_path = str_replace("/", "", $_SERVER["REQUEST_URI"]);
//var_dump($_SERVER);die;

$request_uri = isset($_SERVER["REQUEST_URI"]) ? str_replace("/", "", $_SERVER["REQUEST_URI"]) : '';// /user?login_mobile=&login_pwd=
$script_name = str_replace("/", "", $_SERVER["SCRIPT_NAME"]);// /user
$query = isset($_SERVER["QUERY_STRING"]) ? str_replace("/", "", $_SERVER["QUERY_STRING"]) : '';// login_mobile=&login_pwd=

$service = $script_name;

if (file_exists(STATIC_PATH . $service)) {//进入静态资源
	
	//加载header.html
	include (STATIC_COMMON_PATH . 'header.html');
	
	include (STATIC_PATH . $service);
	
	//加载footer.html
	include (STATIC_COMMON_PATH . 'footer.html');
} else if(file_exists(API_PATH . $service . ".service")) {// 加载 controller

		//公用function
		require ("functions");
		
		require (API_PATH . "base.service");
		require (API_PATH . $service . ".service");
		
		$class_name = ucfirst($service) . "Service";
//		$loadClass = new $class_name();
//		$loadClass -> run();
		(new $class_name())->run();
} else {
	echo '404';
}
