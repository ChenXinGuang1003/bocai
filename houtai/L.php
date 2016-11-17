<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");

include_once($C_Patch."/app/member/include/config.inc.php");

include_once($C_Patch."/app/member/common/function.php");

include_once($C_Patch."/app/member/ip.php");

$yzm		=	@$_POST["C"];

/*
function message($value,$url=""){ //默认返回上一页
	header("Content-type: text/html; charset=utf-8");
	
	$js  = "<script type=\"text/javascript\" language=\"javascript\">\r\n";
	$js .= "alert(\"".$value."\");\r\n";
	if($url) $js .= "window.location.href=\"$url\";\r\n";
	else $js .= "window.history.go(-1);\r\n";
	$js .= "</script>\r\n";

	echo $js;
	exit;
}
*/
if($yzm	!=	$_SESSION["randcode"]){
	message('验证码错误');
}

$username	=	@$_POST["A"];
$password	=	@$_POST["B"];

include_once("class/admin.php");

$arr	=	array();
$temp	=	admin::login($username,$password);

$arr	=	explode(',',$temp);

if($arr[0] > 0){
	header('Content-Type: text/html; charset=utf-8');
	echo "<script>location.href='admin_index.php';</script>";
	exit();
}else{
	if($arr[1] == 1){
		message('用户名或密码错误');
	}elseif($arr[1] == 2){
		message($arr[2]);
	}elseif($arr[1] == 3){
		message($arr[2]);
	}else{
		message('验证失败');
	}
}
?>