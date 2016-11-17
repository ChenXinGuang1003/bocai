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
$payid=intval($_GET["payid"]);

$sql_pay="select * from pay_set where id=".$payid;
$query_pay	=	$mysqli->query($sql_pay);
$cou_pay	=	$query_pay->num_rows;
if($cou_pay<=0){
    echo "<script>alert(\"非常抱歉，在线支付暂时无法使用！\");location.href='http://".$conf_www."/';</script>";
    exit();
}

$rows_pay	=	$query_pay->fetch_array();

$s_name		=	$_POST['S_Name'];

    $TradeDate = date("Ymdhis");
    $TransID =  date("Ymdhis");

	$m_url		=	"http://".$rows_pay["pay_domain"]."/php/bfpay/return_url.php";//返回地址
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>充值接口-提交信息处理</title>
<?php
$MemberID=$rows_pay["pay_id"];//商户号
$TransID=$s_name."_".getOrderId();//流水号
$PayID=$_POST['bank_name'];//支付方式
$TradeDate=$TradeDate;//交易时间
$OrderMoney=$_POST['MOAmount']*100;//订单金额
$ProductName="消费";//产品名称
$Amount="1";//商品数量
$Username=$s_name;//支付用户名
$AdditionalInfo=$s_name;//订单附加消息
$PageUrl=$m_url;//通知商户页面端地址
$ReturnUrl=$m_url;//服务器底层通知地址
$NoticeType="1";//通知类型	
$Md5key=$rows_pay["pay_key"];//md5密钥（KEY）
$MARK = "|";
//MD5签名格式
$Signature=md5($MemberID.$MARK.$PayID.$MARK.$TradeDate.$MARK.$TransID.$MARK.$OrderMoney.$MARK.$PageUrl.$MARK.$ReturnUrl.$MARK.$NoticeType.$MARK.$Md5key);
$payUrl="http://gw.baofoo.com/payindex";//借贷混合
$TerminalID = "10000001"; 
$InterfaceVersion = "4.0";
$KeyType = "1";

$_SESSION['OrderMoney']=$OrderMoney; //设置提交金额的Session
//此处加入判断，如果前面出错了跳转到其他地方而不要进行提交

function getOrderId()
	{
		return rand(100,999)."".date("YmdHis");
	}
?>
</head>

<body onload="document.form1.submit()">
<form id="form1" name="form1" method="post" action="<?php echo $payUrl; ?>">
        <input type='hidden' name='MemberID' value="<?php echo $MemberID; ?>" />
		<input type='hidden' name='TerminalID' value="<?php echo $TerminalID; ?>"/>
		<input type='hidden' name='InterfaceVersion' value="<?php echo $InterfaceVersion; ?>"/>
		<input type='hidden' name='KeyType' value="<?php echo $KeyType; ?>"/>
        <input type='hidden' name='PayID' value="<?php echo $PayID; ?>" />
        <input type='hidden' name='TradeDate' value="<?php echo $TradeDate; ?>" />
        <input type='hidden' name='TransID' value="<?php echo $TransID; ?>" />
        <input type='hidden' name='OrderMoney' value="<?php echo $OrderMoney; ?>" />
        <input type='hidden' name='ProductName' value="<?php echo $ProductName; ?>" />
        <input type='hidden' name='Amount' value="<?php echo $Amount; ?>" />
        <input type='hidden' name='Username' value="<?php echo $Username; ?>" />
        <input type='hidden' name='AdditionalInfo' value="<?php echo $AdditionalInfo; ?>" />
        <input type='hidden' name='PageUrl' value="<?php echo $PageUrl; ?>" />
        <input type='hidden' name='ReturnUrl' value="<?php echo $ReturnUrl; ?>" />
        <input type='hidden' name='Signature' value="<?php echo $Signature; ?>" />
		<input type='hidden' name='NoticeType' value="<?php echo $NoticeType; ?>" />
</form>
</body>
</html>
