<? header("content-Type: text/html; charset=UTF-8");?>
<?php
	
	require_once('dinpayTool.php');
	/////////////////////////////////初始化提交参数//////////////////////////////////////
	////////////////////////initial the parameter datas/////////////////////////////////
function getOrderId()
  {
	return rand(100000,999999)."".date("YmdHis");
  } 

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
$payid=intval($_GET["payid"]);

$sql_pay="select * from pay_set where id=".$payid;
$query_pay	=	$mysqli->query($sql_pay);
$cou_pay	=	$query_pay->num_rows;
if($cou_pay<=0){
	echo "<script>alert(\"非常抱歉，在线支付暂时无法使用！\");location.href='http://".$conf_www."/';</script>";
	exit();
}
$rows_pay	=	$query_pay->fetch_array();
	$m_id		=	$rows_pay["pay_id"];

	$s_name		=	$_POST['S_Name'];
	$m_orderid	=	$s_name."_".getOrderId();
	$m_oamount	=	$_POST['MOAmount'];

	if($m_oamount<$rows_pay["money_Lowest"])
	{
		echo "<script>alert(\"对不起！充值金额错误！最低充值".$rows_pay["money_Lowest"]."元!\");location.href='http://www.yl66y.com';</script>";
		exit();
	}

	$bank_code = "";
	$merchant_code = "2030012238";

	$service_type ="direct_pay";	

	$interface_version ="V3.0";

	$pay_type = "";

	$sign_type ="RSA";

	$input_charset = "UTF-8";
	
	$notify_url ="http://pays.wmnaa.cn/zfpay/Notify_Url.php";		

	$order_no = $m_orderid;

	$order_time = date('Y-m-d H:i:s',time());	

	$order_amount = number_format($m_oamount, 2, '.', '');

	$product_name =$s_name;	

	$product_code = "";	

	$product_desc = "";	

	$product_num = "";

	$show_url = "";	

	$client_ip ="" ;	

	

	$redo_flag = "";	

	$extend_param = "";

	$extra_return_param = $s_name;	

	$return_url ="";		
	

	
	$signStr= "";
	
	if($bank_code != ""){
		$signStr = $signStr."bank_code=".$bank_code."&";
	}
	if($client_ip != ""){
		$signStr = $signStr."client_ip=".$client_ip."&";
	}
	if($extend_param != ""){
		$signStr = $signStr."extend_param=".$extend_param."&";
	}
	if($extra_return_param != ""){
		$signStr = $signStr."extra_return_param=".$extra_return_param."&";
	}
	
	$signStr = $signStr."input_charset=".$input_charset."&";	
	$signStr = $signStr."interface_version=".$interface_version."&";	
	$signStr = $signStr."merchant_code=".$merchant_code."&";	
	$signStr = $signStr."notify_url=".$notify_url."&";		
	$signStr = $signStr."order_amount=".$order_amount."&";		
	$signStr = $signStr."order_no=".$order_no."&";		
	$signStr = $signStr."order_time=".$order_time."&";	

	if($pay_type != ""){
		$signStr = $signStr."pay_type=".$pay_type."&";
	}

	if($product_code != ""){
		$signStr = $signStr."product_code=".$product_code."&";
	}	
	if($product_desc != ""){
		$signStr = $signStr."product_desc=".$product_desc."&";
	}
	
	$signStr = $signStr."product_name=".$product_name."&";

	if($product_num != ""){
		$signStr = $signStr."product_num=".$product_num."&";
	}	
	if($redo_flag != ""){
		$signStr = $signStr."redo_flag=".$redo_flag."&";
	}
	if($return_url != ""){
		$signStr = $signStr."return_url=".$return_url."&";
	}	

	if($show_url != ""){
		
		$signStr = $signStr."service_type=".$service_type."&";
		$signStr = $signStr."show_url=".$show_url;
	}else{
		
		$signStr = $signStr."service_type=".$service_type;
	}
	
	$sign = getSign($signStr);
		
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>	
	<body onLoad="document.dinpayForm.submit();">
		<form name="dinpayForm" method="post" action="https://pay.dinpay.com/gateway?input_charset=UTF-8" target="_self">
			<input type="hidden" name="sign"		  value="<?php echo $sign?>" />
			<input type="hidden" name="merchant_code" value="<?php echo $merchant_code?>" />
			<input type="hidden" name="bank_code"     value="<?php echo $bank_code?>"/>
			<input type="hidden" name="order_no"      value="<?php echo $order_no?>"/>
			<input type="hidden" name="order_amount"  value="<?php echo $order_amount?>"/>
			<input type="hidden" name="service_type"  value="<?php echo $service_type?>"/>
			<input type="hidden" name="input_charset" value="<?php echo $input_charset?>"/>
			<input type="hidden" name="notify_url"    value="<?php echo $notify_url?>">
			<input type="hidden" name="interface_version" value="<?php echo $interface_version?>"/>
			<input type="hidden" name="sign_type"     value="<?php echo $sign_type?>"/>
			<input type="hidden" name="order_time"    value="<?php echo $order_time?>"/>
			<input type="hidden" name="product_name"  value="<?php echo $product_name?>"/>
			<input Type="hidden" Name="client_ip"     value="<?php echo $client_ip?>"/>
			<input Type="hidden" Name="extend_param"  value="<?php echo $extend_param?>"/>
			<input Type="hidden" Name="extra_return_param" value="<?php echo $extra_return_param?>"/>
			<input Type="hidden" Name="pay_type"  value="<?php echo $pay_type?>"/>
			<input Type="hidden" Name="product_code"  value="<?php echo $product_code?>"/>
			<input Type="hidden" Name="product_desc"  value="<?php echo $product_desc?>"/>
			<input Type="hidden" Name="product_num"   value="<?php echo $product_num?>"/>
			<input Type="hidden" Name="return_url"    value="<?php echo $return_url?>"/>
			<input Type="hidden" Name="show_url"      value="<?php echo $show_url?>"/>
			<input Type="hidden" Name="redo_flag"     value="<?php echo $redo_flag?>"/>
		</form>
	</body>
</html>