<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once("../common/login_check.php");
include_once("../class/admin.php");
include_once($C_Patch."/include/newpage.php");

check_quanxian("财务审核");

$ok			=	$_GET["ok"];
$m_id		=	intval($_GET["id"]);
$msg		=	'操作失败';

$sql = "select user_list.user_id,money.order_num,money.order_value,user_list.money as assets from money,user_list where money.user_id=user_list.user_id  and money.id='$m_id'";
$query = $mysqli->query($sql);
$row    =	$query->fetch_array();
$uid = $row["user_id"];
$m_orderid = $row["order_num"];
$m_oamount = $row["order_value"];
$assets = $row["assets"];
$balance = $m_oamount + $assets;

if($ok==1){ //充值成功
	$sql	=	"update money,user_list set money.status='成功',money.update_time=now(),user_list.money=user_list.money+money.order_value,money.about='该订单手工操作成功',money.sxf=money.order_value/100,money.balance=user_list.money+money.order_value where money.user_id=user_list.user_id and money.id='$m_id' and money.`status`='未结算'";
    $mysqli->query($sql);
    $q1		=	$mysqli->affected_rows;
    if($q1 == 2){
        $sql  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$m_orderid','".""."',now(),'该订单手工操作成功','$m_oamount','$assets','$balance');";
        $mysqli->query($sql);
        $q3		=	$mysqli->affected_rows;
        if($q3 != 1){
            $sql	=	"update money,user_list set money.status='未结算',money.update_time=now(),user_list.money=user_list.money-money.order_value,money.about='该订单手工操作失败',money.sxf=money.order_value/100,money.balance=user_list.money-money.order_value where money.user_id=user_list.user_id and money.id='$m_id' and money.`status`='成功'";
            $mysqli->query($sql);
            echo "支付失败，插入金钱记录失败";
            exit;
        }
        $msg	=	'操作成功';
        $msg_info = "审核了编号为".$m_id."充值成功";
        admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg_info,session_id(),"",$bj_time_now);
    }else{
        $msg = '操作失败';
    }
}else{
	$sql	=	"update money set status='失败',about='该订单手工操作失败',balance=assets where money.id=$m_id and money.`status`='未结算'";
    $mysqli->query($sql);
    $q1		=	$mysqli->affected_rows;
    if($q1 == 1){
        $msg	=	'操作成功';
        $msg_info = "审核了编号为".$m_id."充值失败";
        admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg_info,session_id(),"",$bj_time_now);
    }else{
        $msg = '操作失败';
    }
}

message($msg,$_SERVER['HTTP_REFERER']);
?>