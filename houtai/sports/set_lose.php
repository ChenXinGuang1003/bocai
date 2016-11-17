<?php
error_reporting(1);
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

//echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/class/sys_config.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");

check_quanxian("手工结算注单");
$bid				=	intval($_GET["bid"]);
$isok				=	intval($_GET["lose_ok"]);
$status				=	intval($_GET["status"]);
$num				=	0;

if($bid<1){
	message('操作失败','gq_lose.php');
}

$sql	=	"select user_id,bet_money,order_num from k_bet where id='$bid' limit 0,1";
	$query	=	$mysqli->query($sql);
	$row 	=	$query->fetch_array();
	$bet_money	=	$row['bet_money'];
	$user_id=	$row['user_id'];
	$order_num	=	$row['order_num'];	

if($isok==1){ //注单有效,滚球通过确认
	$sql_r			=	"update k_bet set lose_ok=1,update_time=now() where id='$bid' and lose_ok=0";
	$msg			=	"滚球注单有效";
	$num			=	1;
}

if($isok==0){ //注单无效
	$sql			=	"select bet_info,master_guest from k_bet where id='$bid' limit 1";
	$query			=	$mysqli->query($sql);
	$t				=	$query->fetch_array();
	$match_info		=	$t["bet_info"]; 
	$msg_title		=	$t["master_guest"]."_注单已取消";
	$why			=	'';

	if($status==7){
		$why		=	'红卡无效';
		$msg		=	"滚球注单红卡无效";
		$msg_info	=	$t["master_guest"].'<br/>'.$t["bet_info"].'<br /><font style="color:#F00"/>因红卡无效，该注单取消，已返还本金。</font>';
	}
	
	if($status==6){
		$why		=	'进球无效';
		$msg		=	"滚球注单进球无效";
		$msg_info	=	$t["master_guest"].'<br/>'.$t["bet_info"].'<br /><font style="color:#F00"/>因进球无效，该注单取消，已返还本金。</font>';
	}
	
	if($status==3){
		$why		=	'手工无效';
		$msg		=	"注单无效";
		$msg_info	=	$t["master_guest"].'<br/>'.$t["bet_info"].'<br /><font style="color:#F00"/>该注单取消，已返还本金。</font>';
	}
	
	$sql_r			=	"update k_bet,user_list set k_bet.lose_ok=1,k_bet.status=$status,user_list.money=user_list.money+k_bet.bet_money,k_bet.win=k_bet.bet_money,k_bet.update_time=now(),k_bet.sys_about='$why' where user_list.user_id=k_bet.user_id and k_bet.id=$bid";
	$num			=	2;
}

if($num==2)
{
	$sql		= 	"select money from user_list where user_id='$user_id' limit 1";
	$query 		=	$mysqli->query($sql);
	$rs			=	$query->fetch_array();
	if($rs['money']){
		$assets	=	$rs['money'];
	}

	$mysqli->query($sql_r);
	$q1		=	$mysqli->affected_rows;
	if($q1>0)
	{
		$sql = "select balance from money_log where user_id='".$user_id."' order by id desc limit 0,1";
		$query	=	$mysqli->query($sql);
		$rows	 =	$query->fetch_array();
		$balance_2 = $rows["balance"];
		$allmoney=round($assets + $bet_money,2);


		$sql		= 	"select money from user_list where user_id='$user_id' limit 1";
		$query 		=	$mysqli->query($sql);
		$rs			=	$query->fetch_array();
		if($rs['money']){
			$balance	=	$rs['money'];
		}

		if (floatval($assets) != floatval($balance_2) || floatval($allmoney) != floatval($balance))
		{
			$sql = "update user_list set online=0,Oid='',status='异常',remark='体育(".$order_num.")".$msg."后资金异常' where user_id='".$user_id."'";
			$mysqli->query($sql);
		}

		$sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$user_id','$order_num','体育单式',now(),'".$msg.",退款','$val','$assets','$balance');";
		$mysqli->query($sql);
	}
	admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,"滚球手工审核_".$msg,session_id(),"",$bj_time_now);
}else{
	$mysqli->query($sql_r);
	admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now,"滚球手工审核_".$msg,session_id(),"",$bj_time_now);
}
message("$msg 操作成功",'gq_lose.php');
?>