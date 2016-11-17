<?php
session_start();
include 'proterties.php';
if (isset($_POST['pb_TrxId'])){
	include 'HttpClient.class.php';	
	$reqURL_RefOrd = "http://www.slmmyy.com/bankinterface/refundOrd";// 退款接口请求正式地址址	
	
	$p0_Cmd = "RefundOrd"; // 接口口类型
		
	$pb_TrxId = $_REQUEST['pb_TrxId'];//快捷宝交易流水号
	
	$p3_Amt = $_REQUEST['p3_Amt'];//退款金额
	
	$p4_Cur = "CNY"; // 交易币种,固定值"CNY".
	
	$p5_Desc = $_REQUEST['p5_Desc']; // 详细描述退款原因的信息.
	
	// 进行签名处理，一定按照文档中标明的签名顺序进行
	$hmac = strtoupper (md5( "p0_Cmd$p0_Cmd" . "p1_MerId$p1_MerId" . "pb_TrxId$pb_TrxId" . "p3_Amt$p3_Amt" . "p4_Cur$p4_Cur" . "p5_Desc$p5_Desc" . $key ));
	
	// logstr($pb_TrxId,$sbOld,HmacMd5($sbOld,$merchantKey));
	
	// 进行签名处理，一定按照文档中标明的签名顺序进行
	// 加入订单查询请求，固定值"QueryOrdDetail"
	$params = array (
			'p0_Cmd' => $p0_Cmd,
			// 加入用户编号
			'p1_MerId' => $p1_MerId,
			// 加入易宝支付交易流水号
			'pb_TrxId' => $pb_TrxId,
			// 加入易宝支付交易流水号
			'p3_Amt' => $p3_Amt,
			// 加入易宝支付交易流水号
			'p4_Cur' => $p4_Cur,
			// 加入易宝支付交易流水号
			'p5_Desc' => $p5_Desc,
			// 加入校验码
			'hmac' => $hmac
	);
	
	$pageContents = HttpClient::quickPost ( $reqURL_RefOrd, $params );
	$result = explode ( "\n", $pageContents );
	
	// 声明查询结果
	$r0_Cmd = ""; // 业务类型
	$r1_Code = ""; // 退款申请结果
	$r2_TrxId = ""; // 易宝支付交易流水号
	$r3_Amt = ""; // 退款金额
	$r4_Cur = ""; // 交易币种
	$hmac = ""; // 签名数据
	// cho "result.count:".count($result);
	for($index = 0; $index < count ( $result ); $index ++) { // 数组循环
		$result [$index] = trim ( $result [$index] );
		if (strlen ( $result [$index] ) == 0) {
			continue;
		}
		$aryReturn = explode ( "=", $result [$index] );
		$sKey = $aryReturn [0];
		$sValue = $aryReturn [1];
		if ($sKey == "r0_Cmd") { // 业务类型
			$r0_Cmd = $sValue;
		} elseif ($sKey == "r1_Code") { // 退款申请结果
			$r1_Code = $sValue;
		} elseif ($sKey == "r2_TrxId") { // 快捷宝支付交易流水号
			$r2_TrxId = $sValue;
		} elseif ($sKey == "r3_Amt") { // 退款金额
			$r3_Amt = $sValue;
		} elseif ($sKey == "r4_Cur") { // 交易币种
			$r4_Cur = $sValue;
		} elseif ($sKey == "hmac") { // 取得签名数据
			$hmac = $sValue;
		} else {
			echo $result [$index];
			return;
		}
	}
	
	$sNewString = strtoupper (md5( "r0_Cmd$r0_Cmd" . "r1_Code$r1_Code" . "r2_TrxId$r2_TrxId" . "r3_Amt$r3_Amt" . "r4_Cur$r4_Cur" . $key ));
	
	if ($sNewString == $hmac) {// 校验码正确
		if($r1_Code=="1"){
			echo "<br>订单退款请求成功!";
			echo "<br>快捷宝支付交易流水号:".$r2_TrxId;
			echo "<br>退款金额:".$r3_Amt;
		} else{
			echo "<br>订单退款请求失败";
			exit;
		}
	} else {//交易签名无效
		echo '交易签名无效';
		echo "<br>localhost::".$sNewString;
		echo "<br>kuaiyin:".$hmac;
		echo "<br>交易签名无效.";
		exit;
	}
	
}else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>订单退款接口演示</title>
</head>
<body>
<center>当前商户编号：<?php echo $p1_MerId;?></center>
<form method="post" action="" target="_blank">
<table width="50%"border="0" align="center" >
		  <tr>
		  	<td align="left" width="30%">&nbsp;&nbsp;快捷宝支付交易流水号</td>
		  	<td align="left">&nbsp;&nbsp;<input type="text" name="pb_TrxId" id="pb_TrxId" value="" />&nbsp;<span style="color:#FF0000;font-weight:100;">*</span></td>
        </tr>
		  <tr>
		  	<td align="left" width="30%">&nbsp;&nbsp;退款金额</td>
		  	<td align="left">&nbsp;&nbsp;<input type="text" name="p3_Amt" id="p3_Amt" value="" />&nbsp;<span style="color:#FF0000;font-weight:100;">*</span></td>
      </tr>
		  <tr>
		  	<td align="left" width="30%">&nbsp;&nbsp;退款说明</td>
		  	<td align="left">&nbsp;&nbsp;<input size="50" type="text" name="p5_Desc" id="p5_Desc" value="" /></td>
      </tr>
		  <tr>
		  	<td align="left">&nbsp;</td>
		  	<td align="left">&nbsp;&nbsp;<input type="submit" value="提交" /></td>
      </tr>
</table>
</form>
</body>
</html>
<?php }?>