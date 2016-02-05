/*
<!-- 1. 引用静态资源,msui提供了CDN地址可以直接使用，并且强烈建议使用我们的CDN而不是下载到本地。 -->
<link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
<link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">

<!-- 如果你用到了拓展包中的组件，还需要引用extend扩展包，为减少请求数，可以使用阿里CDN的combo功能 -->
<link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/??sm.min.css,sm-extend.min.css">
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/??sm.min.js,sm-extend.min.js' charset='utf-8'></script>

<!-- 本地开发使用，防止没有网络 -->
<link rel="stylesheet" href="/plugins/msui/sm/0.6.2/sm.min.css">
<link rel="stylesheet" href="/plugins/msui/sm/0.6.2/sm-extend.min.css">
<script type='text/javascript' src='/plugins/zepto/zepto.min.js' charset='utf-8'></script>
<script type='text/javascript' src='/plugins/msui/sm/0.6.2/sm.min.js' charset='utf-8'></script>
<script type='text/javascript' src='/plugins/msui/sm/0.6.2/sm-extend.min.js' charset='utf-8'></script>
 */

var all_script = document.getElementsByTagName("script");
var current_script = all_script[0];//代表自己

//加载msui
var css_msui = document.createElement("link");
css_msui.rel = "stylesheet";
css_msui.href ="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css";
current_script.parentNode.insertBefore(css_msui, current_script);

//加载msui extend扩展包
var css_msui_extend = document.createElement("link");
css_msui_extend.rel = "stylesheet";
css_msui_extend.href ="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css";
current_script.parentNode.insertBefore(css_msui_extend, current_script);

//using("//g.alicdn.com/sj/lib/zepto/zepto.min.js");
//using("//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js");
//using("//g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js");

function using(jsURL, callback = '')
{
	
	var script = document.createElement("script");
	script.src = jsURL;
	script.type =" text/javascript";
	
    current_script.parentNode.insertBefore(script, current_script);
    
    script.onload = function()
    {
    	//代表 脚本加载成功
		if(callback){
			callback();
		}    	 
    }	
}