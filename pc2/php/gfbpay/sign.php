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

require_once("HttpClient.class.php");
$http='https://gateway.gopay.com.cn/Trans/WebClientAction.do';

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
$m_id		=	$rows_pay["pay_id"];

$s_name		=	$_POST['S_Name'];
$sql_user="select id from user_list where user_name='$s_name'";
$query_user	=	$mysqli->query($sql_user);
$cou	=	$query_user->num_rows;
if($cou<=0){
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3.0','用户名不正确')";
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
$m_url		=	"http://".$rows_pay["pay_domain"]."/php/gfbpay/res.php";//返回地址

$pBank             =     $_POST['bank_name'];
if(strlen($pBank)>20){
    exit;
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body onLoad="document.returnfunc.submit();">
正在跳转 ...
<form action="<?echo "$http"; ?>" name="returnfunc" id= "returnfunc" method="POST">
		<? 
		
		$version = "2.1";
		$charset = "2";
		$language = "1";
		$signType = "1";
		$tranCode = "8888";
		$merchantID = $m_id;

		$merOrderNum = $m_orderid;
		$tranAmt = $m_oamount;
		$feeAmt = 0;
		$currencyType = "156";
		$frontMerUrl = $rows_pay["f_url"];
		$backgroundMerUrl = $m_url;
		$tranDateTime = date("YmdHis");
		$virCardNoIn = $rows_pay["pay_name"];

		$tranIP = get_ip();
		//$isRepeatSubmit = $_POST["isRepeatSubmit"];
		//$goodsName = $_POST["goodsName"];
		//$goodsDetail = $_POST["goodsDetail"];
		$buyerName = $s_name;
		//$buyerContact = $_POST["buyerContact"];
		//$merRemark1 = $_POST["merRemark1"];
		//$merRemark2 = $_POST["merRemark2"];
		$bankCode = $pBank;
		$userType = 1;
		$gopayServerTime = HttpClient::getGopayServerTime();

    $signStr='version=['.$version.']tranCode=['.$tranCode.']merchantID=['.$merchantID.']merOrderNum=['.$merOrderNum.']tranAmt=['.$tranAmt.']feeAmt=['.$feeAmt.']tranDateTime=['.$tranDateTime.']frontMerUrl=['.$frontMerUrl.']backgroundMerUrl=['.$backgroundMerUrl.']orderId=[]gopayOutOrderId=[]tranIP=['.$tranIP.']respCode=[]gopayServerTime=['.$gopayServerTime.']VerficationCode=['.$rows_pay["pay_key"].']';

    
		$signValue = md5($signStr);
		
		//echo "$signStr";
		?>
		
		<input type="hidden" id="version" name="version" value="<?echo "$version"; ?>" size="50"/>
		<input type="hidden" id="charset" name="charset" value="<?echo "$charset"; ?>"  size="50"/>
		<input type="hidden" id="language" name="language" value="<?echo "$language"; ?>"  size="50"/>
		<input type="hidden" id="signType" name="signType" value="<?echo "$signType"; ?>"  size="50"/>
		<input type="hidden" id="tranCode" name="tranCode" value="<?echo "$tranCode"; ?>"  size="50"/>
		<input type="hidden" id="merchantID" name="merchantID" value="<?echo "$merchantID"; ?>"  size="50"/>
		<input type="hidden" id="merOrderNum" name="merOrderNum" value="<?echo "$merOrderNum"; ?>"  size="50" />
		<input type="hidden" id="tranAmt" name="tranAmt" value="<?echo "$tranAmt"; ?>"  size="50"/>
		<input type="hidden" id="feeAmt" name="feeAmt" value="<?echo "$feeAmt"; ?>"  size="50"/>
		<input type="hidden" id="currencyType" name="currencyType" value="<?echo "$currencyType"; ?>"  size="50"/>
		<input type="hidden"  id="frontMerUrl" name="frontMerUrl" value="<?echo "$frontMerUrl"; ?>"  size="50"/>
		<input type="hidden"  id="backgroundMerUrl" name="backgroundMerUrl" value="<?echo "$backgroundMerUrl"; ?>"  size="50"/>
		<input type="hidden"  id="tranDateTime" name="tranDateTime" value="<?echo "$tranDateTime"; ?>"  size="50"/>
		<input type="hidden"  id="virCardNoIn" name="virCardNoIn" value="<?echo "$virCardNoIn"; ?>"  size="50"/>
		<input type="hidden"  id="tranIP" name="tranIP" value="<?echo "$tranIP"; ?>"  size="50"/>
		<input type="hidden"  id="buyerName" name="buyerName" value="<?echo "$buyerName"; ?>"  size="50"/>
		<input type="hidden"  id="signValue" name="signValue" value="<?echo "$signValue"; ?>"  size="50"/>
		<input type="hidden"  id="bankCode" name="bankCode" value="<?echo "$bankCode"; ?>"  size="50"/>
		<input type="hidden"  id="userType" name="userType" value="<?echo "$userType"; ?>"  size="50"/>
		<input type="hidden"  id="gopayServerTime" name="gopayServerTime" value="<?echo "$gopayServerTime"; ?>"  size="50"/>
</form>
</body>
</html>




