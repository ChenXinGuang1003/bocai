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


include_once("config.php");


$payid=intval($_GET["payid"]);

$sql_pay="select * from pay_set where id=".$payid;
$query_pay	=	$mysqli->query($sql_pay);
$cou_pay	=	$query_pay->num_rows;
if($cou_pay<=0){
	echo "<script>alert(\"非常抱歉，在线支付暂时无法使用。\");location.href='http://".$conf_www."/';</script>";
	exit();
}

$rows_pay	=	$query_pay->fetch_array();

$parter=$rows_pay["pay_id"];
$banktype=$_REQUEST["rtype"];
if(strlen($banktype)>20){
    exit;
}
$amount=intval($_REQUEST["PayMoney"]);
if($amount<$rows_pay["money_Lowest"])
	{
		echo "<script>alert(\"对不起！充值金额错误。最低充值".$rows_pay["money_Lowest"]."Ԫ!\");location.href='http://".$conf_www."/';</script>";
		exit();
	}
$callbackurl=$result_url;
$textmsg=$_REQUEST["textmsg"];// �Զ��巵�ز������Ϊ��
$sql_user="select id from user_list where user_name='$textmsg'";
$query_user	=	$mysqli->query($sql_user);
$cou	=	$query_user->num_rows;
if($cou<=0){
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'捷付通','用户名不正确')";
    $mysqli->query($sql);
    echo "<script>alert(\"请登录后再进行存款和提款操作\");location.href='/cl/reg.php';</script>";
    exit();
}
$orderid=$textmsg."_".getOrderId();
$preEncodeStr="parter=".$parter."&type=".$banktype."&value=".$amount."&orderid=".$orderid."&callbackurl=".$callbackurl;

$P_PostKey=md5($preEncodeStr.$rows_pay["pay_key"]);

//������Զ���������Ᵽ��
//echo $BankUrl;
header("Location:".$BankUrl."?".$preEncodeStr."&sign=".$P_PostKey."&textmsg=".$textmsg);

function getOrderId()
{
	return rand(100,999)."".date("YmdHis");
}
?>