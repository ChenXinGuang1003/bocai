<? header("content-Type: text/html; charset=utf-8");?>
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
 功能：智付页面跳转同步通知页面
 版本：3.0
 日期：2013-08-01
 说明：
 以下代码仅为了方便商户安装接口而提供的样例具体说明以文档为准，商户可以根据自己网站的需要，按照技术文档编写。

 * */
exit;
$sql_pay="select * from pay_set where b_start=1 limit 1";
$query_pay	=	$mysqli->query($sql_pay);

$rows_pay	=	$query_pay->fetch_array();


	//获取智付GET过来反馈信息
//商号号
	$merchant_code	= $_POST["merchant_code"];

	//通知类型
	$notify_type = $_POST["notify_type"];

	//通知校验ID
	$notify_id = $_POST["notify_id"];

	//接口版本
	$interface_version = $_POST["interface_version"];

	//签名方式
	$sign_type = $_POST["sign_type"];

	//签名
	$dinpaySign = $_POST["sign"];

	//商家订单号
	$order_no = $_POST["order_no"];

	//商家订单时间
	$order_time = $_POST["order_time"];

	//商家订单金额
	$order_amount = $_POST["order_amount"];

	//回传参数
	$extra_return_param = $_POST["extra_return_param"];

	//智付交易定单号
	$trade_no = $_POST["trade_no"];

	//智付交易时间
	$trade_time = $_POST["trade_time"];

	//交易状态 SUCCESS 成功  FAILED 失败
	$trade_status = $_POST["trade_status"];

	//银行交易流水号
	$bank_seq_no = $_POST["bank_seq_no"];


	/**
	 *签名顺序按照参数名a到z的顺序排序，若遇到相同首字母，则看第二个字母，以此类推，
	*同时将商家支付密钥key放在最后参与签名，组成规则如下：
	*参数名1=参数值1&参数名2=参数值2&……&参数名n=参数值n&key=key值
	**/


	//组织订单信息
	$signStr = "";
	if($bank_seq_no != "") {
		$signStr = $signStr."bank_seq_no=".$bank_seq_no."&";
	}
	if($extra_return_param != "") {
	    $signStr = $signStr."extra_return_param=".$extra_return_param."&";
	}
	$signStr = $signStr."interface_version=V3.0&";
	$signStr = $signStr."merchant_code=".$merchant_code."&";
	if($notify_id != "") {
        $signStr = $signStr."notify_id=".$notify_id."&notify_type=".$notify_type."&";
	}

        $signStr = $signStr."order_amount=".$order_amount."&";
        $signStr = $signStr."order_no=".$order_no."&";
        $signStr = $signStr."order_time=".$order_time."&";
        $signStr = $signStr."trade_no=".$trade_no."&";
        $signStr = $signStr."trade_status=".$trade_status."&";

	if($trade_time != "") {
	     $signStr = $signStr."trade_time=".$trade_time."&";
	}
	$key=$rows_pay["pay_key"];
	$signStr = $signStr."key=".$key;
	$signInfo = $signStr;
	//将组装好的信息MD5签名
	$sign = md5($signInfo);
	//echo "sign=".$sign."<br>";

	//比较智付返回的签名串与商家这边组装的签名串是否一致
	if($dinpaySign==$sign) {
		//验签成功
		/**
		此处进行商户业务操作
		业务结束
		*/

//        echo "支付成功".'<br>';
        //echo "商家号=".$merchant_code.'<br>';
//        echo "订单号=".$order_no.'<br>';
//        echo "金额=".$order_amount.'<br>';
        //echo "币种=".$m_ocurrency.'<br>';
        //echo ".................";

        echo "<Script language=javascript>alert('交易成功,请回首页重新登入.');window.open('".$rows_pay["f_url"]."','_top')</script>";

	}else
        {
		//验签失败 业务结束
            echo "<Script language=javascript>alert('签名失败,请咨询客服.');</script>";
	}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<!-- 此处可添加页面展示  提示相关信息给消费者  -->
</body>
</html>