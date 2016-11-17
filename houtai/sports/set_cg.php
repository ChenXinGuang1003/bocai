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

include_once("../class/admin.php");

include_once("../common/login_check.php"); 

check_quanxian("手工结算注单");

include_once("class_bet_cg.php");

if($_GET["ok"]	==	1){
	$gid	=	$_GET["id"];
	
	$msg	=	bet_cg::js($gid) ? '操作成功' : '操作失败';
	admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,"串关手动结算[".$gid."]",session_id(),"",$bj_time_now);
	message($msg,$_SERVER['HTTP_REFERER']);
}

if($_GET["ok"]	==	2){
	$arr	=	$_POST["gid"];
	
	$sum	=	$true	=	$false	=	0;
	foreach($arr as $k=>$gid){
		$sum++;
		bet_cg::js($gid) ? $true++ : $false++;
	}
	if($_POST["gid"])
	{
		$id_str	=	implode(',',$_POST["gid"]);
		admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,"串关手动结算[".$id_str."]",session_id(),"",$bj_time_now);
	}
	
	message("共结算：$sum 条串关注单；\\n成功有：$true 条；\\n失败有：$false 条。",$_SERVER['HTTP_REFERER']);
}
?>