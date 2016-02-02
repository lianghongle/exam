<?php

//定义路径分隔符
defined('DS') || define('DS', DIRECTORY_SEPARATOR);

//定义静态文件目录
//$static_filePath = "static/";// echo $_SERVER["REQUEST_URI"];
defined('STATIC_PATH') || define('STATIC_PATH', 'static' . DS);
defined('STATIC_COMMON_PATH') || define('STATIC_COMMON_PATH', 'static' . DS . 'common' . DS);

defined('API_PATH') || define('API_PATH', 'api' . DS );

//请求路径
$get_path = str_replace("/", "", $_SERVER["REQUEST_URI"]);

if (file_exists(STATIC_PATH . $get_path)) {//进入静态资源
	
	//加载header.html
	include (STATIC_COMMON_PATH . 'header.html');
	
	include (STATIC_PATH . $get_path);
	
	//加载footer.html
	include (STATIC_COMMON_PATH . 'footer.html');
} else if(file_exists(API_PATH . $get_path . ".service")) {// 加载 controller

		//公用function
		require ("functions");
		
		require (API_PATH . $get_path . ".service");
		
		$class_name = ucfirst($get_path) . "Service";
//		$loadClass = new $class_name();
//		$loadClass -> run();
		(new $class_name())->run();
} else {
	echo '404';
}
