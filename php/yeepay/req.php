<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/php/yeepay/yeepayCommon.php");
$payid=intval($_GET["payid"]);

$sql_pay="select * from pay_set where id=".$payid;
$query_pay	=	$mysqli->query($sql_pay);
$cou_pay	=	$query_pay->num_rows;
if($cou_pay<=0){
	echo "<script>alert(\"非常抱歉，在线支付暂时无法使用！\");location.href='http://".$conf_www."/';</script>";
	exit();
}

$rows_pay	=	$query_pay->fetch_array();


#	商家设置用户购买商品的支付信息.
##易宝支付平台统一使用GBK/GB2312编码方式,参数如用到中文，请注意转码



#	支付金额,必填.
##单位:元，精确到分.
$p3_Amt						= intval($_REQUEST['p3_Amt']);

if($p3_Amt<$rows_pay["money_Lowest"])
	{
		echo "<script>alert(\"对不起！充值金额错误！最低充值".$rows_pay["money_Lowest"]."元!\");location.href='http://".$conf_www."/';</script>";
		exit();
	}

#	交易币种,固定值"CNY".
$p4_Cur						= "CNY";

#	商品名称
##用于支付时显示在易宝支付网关左侧的订单产品信息.
$p5_Pid						= "";

#	商品种类
$p6_Pcat					= "";

#	商品描述
$p7_Pdesc					= "";

#	商户接收支付成功数据的地址,支付成功后易宝支付会向该地址发送两次成功通知.
$p8_Url						= "http://".$rows_pay["pay_domain"]."/php/yeepay/callback.php";

#	商户扩展信息
##商户可以任意填写1K 的字符串,支付成功时将原样返回.												
$pa_MP						= $_REQUEST['pa_MP'];

//校验：用户名
$sql_user="select id from user_list where user_name='$pa_MP'";
$query_user	=	$mysqli->query($sql_user);
$cou	=	$query_user->num_rows;
if($cou<=0){
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'易宝','用户名不正确')";
    $mysqli->query($sql);
    echo "<script>alert(\"请登录后再进行存款和提款操作\");location.href='/cl/reg.php';</script>";
    exit();
}

#	商户订单号,选填.
##若不为""，提交的订单号必须在自身账户交易中唯一;为""时，易宝支付会自动生成随机的商户订单号.
$p2_Order					= $pa_MP."_".getOrderId();


#	支付通道编码
##默认为""，到易宝支付网关.若不需显示易宝支付的页面，直接跳转到各银行、神州行支付、骏网一卡通等支付页面，该字段可依照附录:银行列表设置参数值.			
$pd_FrpId					= $_REQUEST['pd_FrpId'];
if(strlen($pd_FrpId)>20){
    echo "支付失败，请联系管理员";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'易宝','银行卡不对')";
    $mysqli->query($sql);
    exit;
}
#	应答机制
##为"1": 需要应答机制;为"0": 不需要应答机制.
$pr_NeedResponse	= "1";

#调用签名函数生成签名串
$hmac = getReqHmacString($p2_Order,$p3_Amt,$p4_Cur,$p5_Pid,$p6_Pcat,$p7_Pdesc,$p8_Url,$pa_MP,$pd_FrpId,$pr_NeedResponse,$rows_pay["pay_key"],$rows_pay["pay_id"]);
 
	 function getOrderId()
	{
		return rand(100,999)."".date("YmdHis");
	}
?>
<html>
<head>
<title>To YeePay Page</title>
</head>
<body onLoad="document.yeepay.submit();">
<form name='yeepay' action='<?php echo $reqURL_onLine; ?>' method='post'>
<input type='hidden' name='p0_Cmd'					value='<?php echo $p0_Cmd; ?>'>
<input type='hidden' name='p1_MerId'				value='<?php echo $rows_pay["pay_id"]; ?>'>
<input type='hidden' name='p2_Order'				value='<?php echo $p2_Order; ?>'>
<input type='hidden' name='p3_Amt'					value='<?php echo $p3_Amt; ?>'>
<input type='hidden' name='p4_Cur'					value='<?php echo $p4_Cur; ?>'>
<input type='hidden' name='p5_Pid'					value='<?php echo $p5_Pid; ?>'>
<input type='hidden' name='p6_Pcat'					value='<?php echo $p6_Pcat; ?>'>
<input type='hidden' name='p7_Pdesc'				value='<?php echo $p7_Pdesc; ?>'>
<input type='hidden' name='p8_Url'					value='<?php echo $p8_Url; ?>'>
<input type='hidden' name='p9_SAF'					value='<?php echo $p9_SAF; ?>'>
<input type='hidden' name='pa_MP'						value='<?php echo $pa_MP; ?>'>
<input type='hidden' name='pd_FrpId'				value='<?php echo $pd_FrpId; ?>'>
<input type='hidden' name='pr_NeedResponse'	value='<?php echo $pr_NeedResponse; ?>'>
<input type='hidden' name='hmac'						value='<?php echo $hmac; ?>'>
<input type="hidden" name="noLoadingPage" value="1"> 
</form>
</body>
</html>