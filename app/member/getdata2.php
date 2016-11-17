<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
//header("Content-type: text/html; charset=utf-8");
header('Content-type: text/json; charset=utf-8');
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
@include_once("cache/website.php");
@include_once("include/com_chk.php");
@include_once($C_Patch."/live/agid.php");
//ini_set("display_errors","yes");

echo $userid;exit;


$callback	= $_GET['callback'];
if($web_site['close'] == 1) {
	$json['close']				= 1;
	echo $callback."(".json_encode($json).");";
    exit();
}

	include_once("include/config.inc.php");

	//投注金额 
	if($uid && $userid>0){ //已登陆
		$sql		=	"SELECT sum(bet_money) as s FROM `k_bet` where user_id='$userid' and status='0'";
		$query		=	$mysqli->query($sql);
		$rs1			=	$query->fetch_array();
        if(!$rs1 || !$rs1["s"]){
            $touzhu1 = 0;
        }else{
            $touzhu1 = $rs1["s"];
        }

		$sql		=	"SELECT sum(bet_money) as s FROM `order_lottery` where user_id='$userid' and status='0'";
		$query		=	$mysqli->query($sql);
		$rs2			=	$query->fetch_array();
        if(!$rs2 || !$rs2["s"]){
            $touzhu2 = 0;
        }else{
            $touzhu2 = $rs2["s"];
        }

		$sql		=	"SELECT sum(bet_money_total) as s FROM `six_lottery_order` where user_id='$userid' and status='0'";
		$query		=	$mysqli->query($sql);
		$rs3			=	$query->fetch_array();
        if(!$rs3 || !$rs3["s"]){
            $touzhu3 = 0;
        }else{
            $touzhu3 = $rs3["s"];
        }

        $sql		=	"SELECT sum(bet_money) as s FROM `k_bet_cg_group` where user_id='$userid' and status='0'";
        $query		=	$mysqli->query($sql);
        $rs4			=	$query->fetch_array();
        if(!$rs4 || !$rs4["s"]){
            $touzhu4 = 0;
        }else{
            $touzhu4 = $rs4["s"];
        }

		$tz_money	=	sprintf("%.2f",($touzhu1+$touzhu2+$touzhu3+$touzhu4));

		$sql		=	"select money as s from user_list where user_id='$userid' limit 1";
		$query		=	$mysqli->query($sql);
		$rs			=	$query->fetch_array();
		$user_money	=	sprintf("%.2f",$rs['s']);

		//AG余额
       /* $sql = "select u.money,u.user_name,l.live_money_a normal_money,l.live_money_b vip_money,l.update_time,l.live_type,l.live_username
                    from user_list u,live_user l
                    where u.user_id=l.user_id and u.user_id='$userid' and l.live_type='AG' limit 0,1";
        $query	=	$mysqli->query($sql);
        $rs    =	$query->fetch_array();
		$live_money	=	sprintf("%.2f",($rs['normal_money']+$rs['vip_money']));*/
		$sql = "select ag_money,bb_money from user_list where user_id='$userid' ";
		$query	=	$mysqli->query($sql);
        $rs    =	$query->fetch_array();
		$ag_money	=	sprintf("%.2f",($rs['ag_money']));
		$bb_money	=	sprintf("%.2f",($rs['bb_money']));
		$json['ag_money'] = $ag_money;
		$json['bb_money'] = $bb_money;


		//BBIN余额
		/*$sql = "select u.money,u.user_name,l.live_money_a normal_money,l.update_time,l.live_type,l.live_username
                    from user_list u,live_user l
                    where u.user_id=l.user_id and u.user_id='$userid' and l.live_type='BBIN' limit 0,1";
        $query	=	$mysqli->query($sql);
        $rs    =	$query->fetch_array();
		$live_money_bbin	=	sprintf("%.2f",($rs['normal_money']));*/


        $sql		=	"select count(msg_id) as s from user_msg where user_id='$userid' and islook=0 limit 0,1";
        $query		=	$mysqli->query($sql);
        $rs			=	$query->fetch_array();
        $unread_count	= $rs ?	$rs['s'] : 0;

	}

	$json['close']				= 0;
	
	$json['tz_money']		= $tz_money;
	$json['user_money']		= $user_money;
	if($bbinid!="")
	{
		$json['live_money']		= "AG:".$live_money." BB:".$live_money_bbin;
	}else{
		$json['live_money']		= $live_money;
	}
	$json['unread_count']		= $unread_count;
	$_SESSION["user_money"]= $user_money;

$mysqli->close();
echo $callback."(".json_encode($json).");";
exit;
?>