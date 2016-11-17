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
include_once($C_Patch."/php/vftpay/config.php");
$payid=intval($_GET["payid"]);

$sql_pay="select * from pay_set where id=".$payid;
$query_pay	=	$mysqli->query($sql_pay);
$cou_pay	=	$query_pay->num_rows;
if($cou_pay<=0){
	echo "<script>alert(\"非常抱歉，在线支付暂时无法使用！\");location.href='http://".$conf_www."/';</script>";
	exit();
}

$rows_pay	=	$query_pay->fetch_array();



$P_UserId=$rows_pay["pay_id"];

$P_CardId="JW999KDSKJLKDKL9009";
$P_CardPass="8890878989090900000";
$P_FaceValue= intval($_REQUEST["faceValue"]);
$P_ChannelId="22";
$P_Subject="GamePay";
$P_Price="1";
$P_Quantity="1";
$P_Description="1";
$P_Notic=$_REQUEST["notic"];
$sql_user="select id from user_list where user_name='$P_Notic'";
$query_user	=	$mysqli->query($sql_user);
$cou	=	$query_user->num_rows;
if($cou<=0){
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'V付通','用户名不正确')";
    $mysqli->query($sql);
    echo "<script>alert(\"请登录后再进行存款和提款操作\");location.href='/cl/reg.php';</script>";
    exit();
}
$P_Result_url=$result_url;
$P_Notify_url=$notify_url;

if($P_FaceValue<$rows_pay["money_Lowest"])
	{
		echo "<script>alert(\"对不起！充值金额错误！最低充值".$rows_pay["money_Lowest"]."元!\");location.href='http://".$conf_www."/';</script>";
		exit();
	}

$P_OrderId=$P_Notic."_".getOrderId();
$preEncodeStr=$P_UserId."|".$P_OrderId."|".$P_CardId."|".$P_CardPass."|".$P_FaceValue."|".$P_ChannelId."|".$rows_pay["pay_key"];

$P_PostKey=md5($preEncodeStr);

$params="P_UserId=".$P_UserId;
$params.="&P_OrderId=".$P_OrderId;
$params.="&P_CardId=".$P_CardId;
$params.="&P_CardPass=".$P_CardPass;
$params.="&P_FaceValue=".$P_FaceValue;
$params.="&P_ChannelId=".$P_ChannelId;
$params.="&P_Subject=".$P_Subject;
$params.="&P_Price=".$P_Price;
$params.="&P_Quantity=".$P_Quantity;
$params.="&P_Description=".$P_Description;
$params.="&P_Notic=".$P_Notic;
$params.="&P_Result_url=".$P_Result_url;
$params.="&P_Notify_url=".$P_Notify_url;
$params.="&P_PostKey=".$P_PostKey;

//在这里对订单进行入库保存

//下面这句是提交到API
header("location:$gateWary?$params");
function getOrderId()
{
	return rand(100,999)."".date("YmdHis");
}
?>