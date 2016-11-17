<?php
//原始返回url文件。。
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>充值接口-商户充值结果</title>
<?php
$MemberID=$_REQUEST['MemberID'];//商户号
$TerminalID =$_REQUEST['TerminalID'];//商户终端号
$TransID =$_REQUEST['TransID'];//商户流水号
$Result=$_REQUEST['Result'];//支付结果
$ResultDesc=$_REQUEST['ResultDesc'];//支付结果描述
$FactMoney=$_REQUEST['FactMoney'];//实际成功金额
$AdditionalInfo=$_REQUEST['AdditionalInfo'];//订单附加消息
$SuccTime=$_REQUEST['SuccTime'];//支付完成时间
$Md5Sign=$_REQUEST['Md5Sign'];//md5签名
$Md5key = "abcdefg"; ///////////md5密钥（KEY）
$MARK = "~|~";
//MD5签名格式
$WaitSign=md5('MemberID='.$MemberID.$MARK.'TerminalID='.$TerminalID.$MARK.'TransID='.$TransID.$MARK.'Result='.$Result.$MARK.'ResultDesc='.$ResultDesc.$MARK.'FactMoney='.$FactMoney.$MARK.'AdditionalInfo='.$AdditionalInfo.$MARK.'SuccTime='.$SuccTime.$MARK.'Md5Sign='.$Md5key);

if(isset($_SESSION['OrderMoney'])){
	$OrderMoney =$_SESSION['OrderMoney'];//获取提交金额的Session
}
if($Md5Sign == $WaitSign){
	//校验通过开始处理订单
	if($OrderMoney == $FactMoney){
		//卡面金额与用户提交金额一致
		echo("<script>alert('支付成功');</script>");//全部正确了输出OK
	}else{
		echo("<script>alert('实际成交金额与您提交的订单金额不一致，请接收到支付结果后仔细核对实际成交金额，以免造成订单金额处理差错。');</script>");	//实际成交金额与商户提交的订单金额不一致
	}
}else{
	echo("<script>alert('Md5CheckFail');</script>");//MD5校验失败，订单信息不显示
	$TransID=$WaitSign;
	$ResultDesc="";
	$FactMoney="";
	$AdditionalInfo="";
	$SuccTime="";
}

?>

</head>

<body>
<form id="form1">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td height="30" align="center">
				<h1>
					※ 宝付在线支付完成 ※
				</h1>
			</td>
		</tr>
	</table>
	<table bordercolor="#cccccc" cellspacing="5" cellpadding="0" width="400" align="center"
		border="0">		
		<tr>
			<td class="text_12" bordercolor="#ffffff" align="right" width="150" height="20">
				订单号：</td>
			<td class="text_12" bordercolor="#ffffff" align="left">
			<input  name='TransID' value= "<?php echo $TransID;?>" />
				</td>
		</tr>
		<tr>
			<td class="text_12" bordercolor="#ffffff" align="right" width="150" height="20">
				支付结果描述：</td>
			<td class="text_12" bordercolor="#ffffff" align="left">
			<input  name='ResultDesc' value= "<?php echo $ResultDesc;?>"/>
				</td>
		</tr>
		<tr>
			<td class="text_12" bordercolor="#ffffff" align="right" width="150" height="20">
				实际成功金额：</td>
			<td class="text_12" bordercolor="#ffffff" align="left">
			<input  name='FactMoney'  value= "<?php echo $FactMoney;?>"/>
				</td>
		</tr>
		<tr>
			<td class="text_12" bordercolor="#ffffff" align="right" width="150" height="20">
				订单附加消息：</td>
			<td class="text_12" bordercolor="#ffffff" align="left">
			<input  name='AdditionalInfo' value= "<?php echo $AdditionalInfo;?>"/>
				</td>
		</tr>
		<tr>
			<td class="text_12" bordercolor="#ffffff" align="right" width="150" height="20">
				交易成功时间：</td>
			<td class="text_12" bordercolor="#ffffff" align="left">
			<input  name='SuccTime' value= "<?php echo $SuccTime;?>"/>
				</td>
		</tr>		
	</table> 

</form>
</body>
</html>
