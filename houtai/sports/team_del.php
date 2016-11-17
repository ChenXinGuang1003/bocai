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

check_quanxian("手工录入体育比分");

$sql	=	'';
if($_GET['type'] == 1){
	$sql	=	"update t_guanjun set x_result=null where x_id='".$_GET["xid"]."'";
}
$mysqli->query($sql);
if($mysqli->affected_rows >0){
	if($_GET['type'] == 1){
		admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,"清除了冠军赛事ID为[".$_GET["xid"]."]的结果",session_id(),"",$bj_time_now);
	}
}
header("location:".$_SERVER['HTTP_REFERER']);
?>