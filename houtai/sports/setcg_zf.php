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
//注单取消审核

$gid		=	intval($_GET["gid"]);
$count		=	0;
$sql		=	"select `status`,cg_count,win,fs,user_id,order_num,bet_money from k_bet_cg_group where `status` in(0,1,2) and id=$gid limit 1";
$query		=	$mysqli->query($sql);
$rows 		=	$query->fetch_array();
$count		=	$rows['cg_count'];
$user_id	=	$rows['user_id'];
$win		=	$rows['win'];
$fs			=	$rows['fs'];
$val		=	$win+$fs;
$bet_money  =	$rows['bet_money'];
$order_num	=	$rows['order_num'];
$sql		= 	"select money from user_list where user_id='$user_id' limit 1";
$query 		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
if($rs['money']){
	$assets	=	$rs['money'];
}
$sql="";
	if($rows["status"] == 1){
		$sql	=	"update user_list,k_bet_cg_group set user_list.money=user_list.money-k_bet_cg_group.win-k_bet_cg_group.fs,k_bet_cg_group.check=1,k_bet_cg_group.status=3,k_bet_cg_group.fs=0,k_bet_cg_group.update_time=null,k_bet_cg_group.cg_count=(select count(*) from k_bet_cg where gid=k_bet_cg_group.id) where user_list.user_id=k_bet_cg_group.user_id and k_bet_cg_group.id=$gid";
	}elseif($rows["status"]==2){
		$sql	=	"update user_list,k_bet_cg_group set user_list.money=user_list.money-k_bet_cg_group.win-k_bet_cg_group.fs,k_bet_cg_group.check=1,k_bet_cg_group.status=3,k_bet_cg_group.fs=0,k_bet_cg_group.update_time=null,k_bet_cg_group.cg_count=(select count(*) from k_bet_cg where gid=k_bet_cg_group.id) where user_list.user_id=k_bet_cg_group.user_id and k_bet_cg_group.id=$gid";
	}elseif($rows["status"]==0){
		$val	=	$bet_money;
		$sql	=	"update user_list,k_bet_cg_group set user_list.money=user_list.money+k_bet_cg_group.bet_money,k_bet_cg_group.win=0,k_bet_cg_group.check=1,k_bet_cg_group.status=3,k_bet_cg_group.fs=0,k_bet_cg_group.update_time=null,k_bet_cg_group.cg_count=(select count(*) from k_bet_cg where gid=k_bet_cg_group.id) where user_list.user_id=k_bet_cg_group.user_id and k_bet_cg_group.id=$gid";
	}
	if($sql=="")
	{
	message("执行完成,请结算",$_SERVER["HTTP_REFERER"]);
	exit;
	}
	$sql2="update k_bet_cg set `status`=3 where gid='$gid'";
	$mysqli->query($sql);
	$q1		=	$mysqli->affected_rows;
	$mysqli->query($sql2);
			$sql = "select balance from money_log where user_id='".$user_id."' order by id desc limit 0,1";
			$query	=	$mysqli->query($sql);
			$rows	 =	$query->fetch_array();
            $balance_2 = $rows["balance"];
			$allmoney=round($assets - $val,2);


			$sql		= 	"select money from user_list where user_id='$user_id' limit 1";
			$query 		=	$mysqli->query($sql);
			$rs			=	$query->fetch_array();
			if($rs['money']){
				$balance	=	$rs['money'];
			}

		
			if (abs(floatval($assets) - floatval($balance_2))>0.2 || abs(floatval($allmoney) - floatval($balance))>0.2)
			{
				$sql = "update user_list set online=0,Oid='',status='异常',remark='串关(".$order_num.")作废后资金异常' where user_id='".$user_id."'";
				$mysqli->query($sql);
			}

			$sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$user_id','$order_num','体育串关',now(),'串关作废退款','$val','$assets','$balance');";
			$mysqli->query($sql);

	//$sql	=	"update k_bet_cg set status=0 where gid=$gid"; //输，所有该组都需要重新审核
	//$mysqli->query($sql);

	//$q2		=	$mysqli->affected_rows;

	admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,"串关作废-[".$order_num."]",session_id(),"",$bj_time_now);



message("执行完成",$_SERVER["HTTP_REFERER"]);
?>