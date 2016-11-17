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
/* *
 *功能：即时到账交易接口接入页
 *版本：3.0
 *日期：2013-08-01
 *说明：
 *以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,
 *并非一定要使用该代码。该代码仅供学习和研究智付接口使用，仅为提供一个参考。
 **/
 ////////////////////////////////////请求参数//////////////////////////////////////

function getOrderId()
	{
		return rand(100,999)."".date("YmdHis");
	}

$payid=intval($_GET["payid"]);

$sql_pay="select * from pay_set where id=".$payid;
$query_pay	=	$mysqli->query($sql_pay);
$cou_pay	=	$query_pay->num_rows;
if($cou_pay<=0){
	echo "<script>alert(\"非常抱歉，在线支付暂时无法使用！\");location.href='http://".$conf_www."/';</script>";
	exit();
}
	$rows_pay	=	$query_pay->fetch_array();
	$p1_MerId		=	$rows_pay["pay_id"];
	$key	=	$rows_pay["pay_key"];

	$s_name		=	$_POST['pa_MP'];
    $sql_user="select id from user_list where user_name='$s_name'";
    $query_user	=	$mysqli->query($sql_user);
    $cou	=	$query_user->num_rows;
    if($cou<=0){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'快捷宝','用户名不正确')";
        $mysqli->query($sql);
        echo "<script>alert(\"请登录后再进行存款和提款操作\");location.href='/cl/reg.php';</script>";
        exit();
    }
	$m_orderid	=	$s_name."_".getOrderId();
	$m_oamount	=	intval($_REQUEST["MOAmount"]);

	if($m_oamount<$rows_pay["money_Lowest"])
	{
		echo "<script>alert(\"对不起！充值金额错误！最低充值".$rows_pay["money_Lowest"]."元!\");location.href='http://".$conf_www."/';</script>";
		exit();
	}

if (isset($m_orderid)){
	
	#	商家设置用户购买商品的支付信息.
	##快捷宝支付平台统一使用UTF-8编码方式,参数如用到中文，请注意转码
	
	#快捷宝支付请求正式地址
	$reqURL_onLine = "http://www.slmmyy.com/bankinterface/pay";
	
	$p0_Cmd = 'Buy';
		
	#	用户订单号,选填.
	##若不为""，提交的订单号必须在自身账户交易中唯一;为""时，快捷宝支付会自动生成随机的用户订单号.
	$p2_Order					= $m_orderid;
	
	#	支付金额,必填.
	##单位:元，精确到分.
	$p3_Amt						= $m_oamount;
	
	#	交易币种,固定值"CNY".
	$p4_Cur						= "CNY";
	
	#	商品名称
	##用于支付时显示在易宝支付网关左侧的订单产品信息.
	$p5_Pid						= "在线充值";
	
	#	商品种类
	$p6_Pcat					= "producttype";
	
	#	商品描述
	$p7_Pdesc					= "在线充值";
	
	#	用户接收支付成功数据的地址,支付成功后易宝支付会向该地址发送两次成功通知.
	$p8_Url						= "http://".$rows_pay["pay_domain"]."/php/kjbpay/pay_callback.php";
	
	$p9_SAF                     = '0';
	
	#	用户扩展信息
	##用户可以任意填写1K 的字符串,支付成功时将原样返回.
	$pa_MP						= $_REQUEST['pa_MP'];
	
	#	支付通道编码
	##默认为""，到易宝支付网关.若不需显示易宝支付的页面，直接跳转到各银行、神州行支付、骏网一卡通等支付页面，该字段可依照附录:银行列表设置参数值.
	$pd_FrpId					= $_REQUEST['pd_FrpId'];
    if(strlen($pd_FrpId)>20){
        exit;
    }
	
	#	应答机制
	##默认为"1": 需要应答机制;
	$pr_NeedResponse	= "1";
	
	#调用签名函数生成签名串
	$hmac = strtoupper (md5( "p0_Cmd$p0_Cmd" . "p1_MerId$p1_MerId" . "p2_Order$p2_Order" . "p3_Amt$p3_Amt" . "p4_Cur$p4_Cur" . "p5_Pid$p5_Pid" . "p6_Pcat$p6_Pcat" . "p7_Pdesc$p7_Pdesc" . "p8_Url$p8_Url" . "p9_SAF$p9_SAF" . "pa_MP$pa_MP" . "pd_FrpId$pd_FrpId" . "pr_NeedResponse$pr_NeedResponse" . $key ));
	

	
	echo "<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
	<title></title>
	</head>
	<body onLoad=\"document.kuaiyin.submit();\">
	<form name='kuaiyin' action='$reqURL_onLine' method='post'>
	<input type='hidden' name='p0_Cmd'					value='$p0_Cmd'>
	<input type='hidden' name='p1_MerId'				value='$p1_MerId'>
	<input type='hidden' name='p2_Order'				value='$p2_Order'>
	<input type='hidden' name='p3_Amt'					value='$p3_Amt'>
	<input type='hidden' name='p4_Cur'					value='$p4_Cur'>
	<input type='hidden' name='p5_Pid'					value='$p5_Pid'>
	<input type='hidden' name='p6_Pcat'					value='$p6_Pcat'>
	<input type='hidden' name='p7_Pdesc'				value='$p7_Pdesc'>
	<input type='hidden' name='p8_Url'					value='$p8_Url'>
	<input type='hidden' name='p9_SAF'					value='$p9_SAF'>
	<input type='hidden' name='pa_MP'						value='$pa_MP'>
	<input type='hidden' name='pd_FrpId'				value='$pd_FrpId'>
	<input type='hidden' name='pr_NeedResponse'	value='$pr_NeedResponse'>
	<input type='hidden' name='hmac'						value='$hmac'>
	</form>
	</body>
	</html>";
	
}
?>