<?
$global_vars = array(
	"BROWSER_IP"		=>	"http://".$_SERVER['SERVER_NAME'],
	"CASINO"            =>  "SI2",
);
while (list($key, $value) = each($global_vars)) {
  define($key, $value);
}
function get_ip(){

   if($_SERVER['HTTP_X_FORWARDED_FOR']){
  
    $onlineip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    $c_agentip=1;
   
   }elseif($_SERVER['HTTP_CLIENT_IP']){
  
    $onlineip = $_SERVER['HTTP_CLIENT_IP'];
    $c_agentip=1;
   
   }else{
  
    $onlineip = $_SERVER['REMOTE_ADDR'];
    $c_agentip=0;
   
   }
   //$c_agentip记录是否为代理ip
   return $onlineip;
}


function get_client_browser()
{
	if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("360SE")))  
		return "360浏览器";
	else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("360EE")))
		return "360极速浏览器";
	else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("theworld")))
		return "世界之窗";
	else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("Maxthon")))
		return "傲游浏览器";
	else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("TencentTraveler")))
		return "腾讯TT";
	else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("QQBrowser")))
		return "QQ浏览器";
	else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("MetaSr")))
		return "搜狗高速浏览器";
	else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("Alibrowser")))
		return "阿云浏览器";
	else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("TaoBrowser")))
		return "淘宝浏览器";
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 8.0")) 
		return "Internet Explorer 8.0";  
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 7.0"))  
		return "Internet Explorer 7.0";  
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 6.0"))  
		return "Internet Explorer 6.0";  
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"Firefox/3"))  
		return "火狐3";  
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"Firefox/2"))  
		return "火狐2";  
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"Chrome"))  
		return "Google Chrome";  
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"Safari"))  
		return "Safari";  
	else if(strpos($_SERVER["HTTP_USER_AGENT"],"Opera"))  
		return "Opera";  
	else 
		return"未知"; 
}
?>