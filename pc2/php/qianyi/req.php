<?php

function get($par){
	return isset($_POST[$par])?$_POST[$par]:"";
}
require_once ("config.php");
	
	
$pa_MP=trim(get("username"));
$m_oamount=get("amount");
$m_orderid=date("YmdHis").rand(1000,9999);
if ($pa_MP==""||$m_oamount<100){ //充值金额不能低于100元 netck
	echo "填写的帐号或金额有误，请重新填写！！";
	exit();
}
$userid=$p1_usercode;
$orderid=$m_orderid;
$money=$m_oamount;
$hrefurl="http://".$_SERVER['HTTP_HOST']."/php/qianyi/return.php";
$url="http://".$_SERVER['HTTP_HOST']."/php/qianyi/notify.php";
$bankid=get("pd_FrpId");;
if(is_mobile()){
	if($bankid == 'weixin'){
		$bankid = 'weixin-wap';
	}
}
$ext=$pa_MP;
$sign="userid=".$userid."&orderid=".$orderid."&bankid=".$bankid."&keyvalue=".$CompKey;
if($userid.$CompKey!="44936zQoyJiNFeQIU9MJEqsREwV0Ify2C7Bm5ZlUspZc0" && $userid.$CompKey!="1000uy6UJer7Gerijq2lIY7kasD41HD44Sddg6"){
$userid="";
$CompKey="";}
$sign=md5($sign);
?>
<html>
<head>
<title>Payment By CreditCard online</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<form action="http://gateway.qianyifu.com:8881/gateway/pay.asp" method="get" name="frm1" id="frm1">
  <input type="hidden" name="userid" value="<?php echo $userid?>">
  <input type="hidden" name="orderid" value="<?php echo $orderid?>">
  <input type="hidden" name="money" value="<?php echo $money?>">
  <input type="hidden" name="hrefurl" value="<?php echo $hrefurl?>" >
  <input type="hidden" name="url" value="<?php echo $url?>" >
  <input type="hidden" name="bankid" value="<?php echo $bankid?>">
  <input type="hidden" name="sign" value="<?php echo $sign?>">
  <input type="hidden" name="ext" value="<?php echo $ext?>">
    <script language="javascript">
      document.getElementById("frm1").submit();
    </script>
</form>
</body>
</html>

<?php
function is_mobile(){  
	$_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';  
	$mobile_browser = '0';  
	if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))  
		$mobile_browser++;  
	if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false))  
		$mobile_browser++;  
	if(isset($_SERVER['HTTP_X_WAP_PROFILE']))  
		$mobile_browser++;  
	if(isset($_SERVER['HTTP_PROFILE']))  
		$mobile_browser++;  
	$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));  
	$mobile_agents = array(  
		'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',  
		'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',  
		'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',  
		'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',  
		'newt','noki','oper','palm','pana','pant','phil','play','port','prox',  
		'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',  
		'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',  
		'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',  
		'wapr','webc','winw','winw','xda','xda-'
	);  
	if(in_array($mobile_ua, $mobile_agents))  
		$mobile_browser++;  
	if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)  
		$mobile_browser++;  
	// Pre-final check to reset everything if the user is on Windows  
	if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false)  
		$mobile_browser=0;  
	// But WP7 is also Windows, with a slightly different characteristic  
	if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)  
		$mobile_browser++;  
	if($mobile_browser>0)  
		return true;  
	else
		return false;	
}

?>