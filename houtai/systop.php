<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header('Content-type: text/json; charset=utf-8');

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");

include_once($C_Patch."/app/member/include/config.inc.php");

include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/cache/website.php");
include_once($C_Patch."/app/member/cache/vertime.php");

include_once("common/login_check.php"); 

$callback	=	@$_GET['callback'];

$tknum	=	0;//提款
$hknum	=	0;//汇款
$cknum	=	0;//汇款

if(strpos($quanxian,'加款扣款'))
{
	$sql		=	"select count(id) as s from money where  type='用户提款' and status='未结算'";
	$query		=	$mysqli->query($sql);
	$rs			=	$query->fetch_array();
	$tknum		=	$rs['s'];
	
	$sql		=	"select count(id) as s from money where order_value>0 and type='银行汇款' and status='未结算'";
	$query		=	$mysqli->query($sql);
	$rs			=	$query->fetch_array();
	$hknum		=	$rs['s'];

	$sql		=	"select count(id) as s from money where order_value>0 and type='在线支付' and status='未结算'";
	$query		=	$mysqli->query($sql);
	$rs			=	$query->fetch_array();
    $cknum		=	$rs['s'];
}

$ernum	=	0;//异常会员
$ssnum	=	0;//会员申诉
if(strpos($quanxian,'修改会员'))
{
	$sql		=	"select count(id) as s from user_list where status='异常'";
	$query		=	$mysqli->query($sql);
	$rs			=	$query->fetch_array();
	$ernum		=	$rs['s'];
}


$dlnum	=	0;//代理申请
if(strpos($quanxian,'添加代理'))
{
	
}


$cgnum	=	0;//未结算串关
if(strpos($quanxian,'手工结算注单'))
{
    $sql	=	"select COUNT(id) as s from k_bet_cg_group where 1=1  and status=0 order by bet_time desc ";
    $query	=	$mysqli->query($sql);
    $row    =	$query->fetch_array();
    $cgnum = $row["s"];
}else{

}


$gqnum	=	0;//滚球未审核
if(strpos($quanxian,'手工结算注单'))
{
	
}else{

}

$ver_time_num	=	0;//三天内续费，否则提醒
if(strpos($quanxian,'修改网站信息'))
{
    $ver_time_num = (strtotime($vertime)-time()<259200) ? 1 : 0;
}else{

}

$ag_hall_num	=	0;//AG 普通厅余额
if(strpos($quanxian,'修改网站信息'))
{
    $sql	=	"select ag_hall from sys_config limit 0,1";
    $query	=	$mysqli->query($sql);
    $row    =	$query->fetch_array();
    $ag_hall_num = ($row["ag_hall"]<$web_site['ag_hall']) ? 1 : 0;
    if($row["ag_hall"]==0){
        $ag_hall_num = 0;
    }
}else{

}

$ag_viphall_num	=	0;//AG 普通厅余额
if(strpos($quanxian,'修改网站信息'))
{
    $sql	=	"select ag_viphall from sys_config limit 0,1";
    $query	=	$mysqli->query($sql);
    $row    =	$query->fetch_array();
    $ag_viphall_num = ($row["ag_viphall"]<$web_site['ag_viphall']) ? 1 : 0;
    if($row["ag_viphall"]==0){
        $ag_viphall_num = 0;
    }
}else{

}

$tyc_hall_num	=	0;//太阳城余额
if(strpos($quanxian,'修改网站信息'))
{
    $sql	=	"select tyc_hall from sys_config limit 0,1";
    $query	=	$mysqli->query($sql);
    $row    =	$query->fetch_array();
    $tyc_hall_num = ($row["tyc_hall"]<$web_site['tyc_hall']) ? 1 : 0;
    if($row["tyc_hall"]==0){
        $tyc_hall_num = 0;
    }
}else{

}
$tyc_hall_num = 0;

$tyc_connect_num	=	0;//太阳城是否已连接上
if(strpos($quanxian,'修改网站信息'))
{
    $sql	=	"select status from tyc_status limit 0,1";
    $query	=	$mysqli->query($sql);
    $row    =	$query->fetch_array();
    $tyc_connect_num = ($row["status"]!="0") ? 0 : 1;
}else{

}
$tyc_connect_num = 0;

$add_number_new = 0;
$time_before_3 = date("Y-m-d H:i:s",time()-60);
$sql	=	"SELECT COUNT(id) record_count FROM user_list WHERE regtime>'$time_before_3'";
$query	=	$mysqli->query($sql);
$row    =	$query->fetch_array();
if($row && $row["record_count"]){
    $add_number_new = $row["record_count"];
    if($web_site['notice_regster']!="1"){
        $add_number_new = 0;
    }
}

$auto_zhenren_num = 0;
$sql	=	"SELECT COUNT(id) auto_zhenren_num FROM live_log WHERE status='4'";
$query	=	$mysqli->query($sql);
$row    =	$query->fetch_array();
if($row && $row["auto_zhenren_num"]){
    $auto_zhenren_num = $row["auto_zhenren_num"];
}

$sql = "update user_list set online=0,Oid='' where OnlineTime<'".date('Y-m-d H:i:s',strtotime('-1 hour'))."' and (Oid<>'' or online=1 or online='是')";//刪除超時用戶
$mysqli->query($sql);

//删除无效订单
//$sql = "update order_lottery set status=3 where order_num='' and status=0";
//$mysqli->query($sql);
//$sql = "update order_lottery o set status=3 WHERE not EXISTS( select order_num from order_lottery_sub s where o.order_num=s.order_num )  and o.status=0";
//$mysqli->query($sql);

$json['sum']  		=	$cknum+$tknum+$hknum+$ernum+$ssnum+$dlnum+$cgnum+$gqnum+$add_number_new+$ag_hall_num+$ver_time_num+$auto_zhenren_num;
$json['tknum']=$tknum;
$json['hknum']=$hknum;
$json['cknum']=$cknum;
$json['ernum']=$ernum;
$json['dlnum']=$dlnum;
$json['cgnum']=$cgnum;
$json['gqnum']=$gqnum;
$json['ag_hall_num']=$ag_hall_num;
$json['add_number_new']=$add_number_new;
$json['ver_time_num']=$ver_time_num;
$json['auto_zhenren_num']=$auto_zhenren_num;

echo $callback."(".json_encode($json).");";
exit;
?>