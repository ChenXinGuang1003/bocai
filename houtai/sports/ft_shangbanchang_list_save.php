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
include_once("bet.php");


$mid	=	$_POST["match_id"];
$bool	=	true;

//单式
if(count($_POST["bid"])>0){
	foreach ($_POST['bid'] as $i=>$bid){  
		$status=intval($_POST['status'][$i]);
		$mb_inball=$_POST['mb_inball'][$i];
		$tg_inball=$_POST['tg_inball'][$i];
		$msg	=	bet::set($bid,$status,$mb_inball,$tg_inball);
		$sql = "select order_num from k_bet where id='$bid'";
		$query	=	$mysqli->query($sql);
		$rows	 =	$query->fetch_array();
		$order_num=$rows["order_num"];
		admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,$msg."[".$order_num."]",session_id(),"",$bj_time_now);
		//if($msg=="游戏手工结算-失败") break;
	}
}

//串关
if(count($_POST["bid_cg"])>0){
	foreach ($_POST['bid_cg'] as $i=>$bid){
		$status=intval($_POST['status_cg'][$i]);
		$mb_inball=$_POST['mb_inball_cg'][$i];
		$tg_inball=$_POST['tg_inball_cg'][$i];
		$msg	=	bet::set_cg($bid,$status,$mb_inball,$tg_inball);
		$sql = "select id from k_bet_cg where id='$bid'";
		$query	=	$mysqli->query($sql);
		$rows	 =	$query->fetch_array();
		$id=$rows["id"];
		admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,$msg."[子单ID：".$id."]",session_id(),"",$bj_time_now);
		//if(!$bool) break;
	}
}

	$mysqli->query("update bet_match set match_sbjs='1' where match_id in($mid)");
	
	admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,"批量结算了足球上半场赛事".$mid."注单",session_id(),"",$bj_time_now);

header('location:zqbf.php');
?>