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

$sql_pay="select * from pay_set where b_start=1 limit 1";
$query_pay	=	$mysqli->query($sql_pay);

$rows_pay	=	$query_pay->fetch_array();
if($rows_pay["pay_type"]!=8){
    echo "支付失败，请联系管理员";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'宝付','类型不对')";
    $mysqli->query($sql);
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>充值接口-服务器返回结果</title>
<?php
$MemberID=$_REQUEST['MemberID'];//商户号
$TerminalID =$_REQUEST['TerminalID'];//商户终端号
$TransID =$_REQUEST['TransID'];//流水号
$Result=$_REQUEST['Result'];//支付结果
$ResultDesc=$_REQUEST['ResultDesc'];//支付结果描述
$FactMoney=$_REQUEST['FactMoney'];//实际成功金额
$AdditionalInfo=$_REQUEST['AdditionalInfo'];//订单附加消息
$SuccTime=$_REQUEST['SuccTime'];//支付完成时间
$Md5Sign=$_REQUEST['Md5Sign'];//md5签名
$Md5key = $rows_pay["pay_key"];
$MARK = "~|~";
$s_name=$AdditionalInfo;
$m_orderid=$TransID;
$signInfo = 'MemberID='.$MemberID.$MARK.'TerminalID='.$TerminalID.$MARK.'TransID='.$TransID.$MARK.'Result='.$Result.$MARK.'ResultDesc='.$ResultDesc.$MARK.'FactMoney='.$FactMoney.$MARK.'AdditionalInfo='.$AdditionalInfo.$MARK.'SuccTime='.$SuccTime.$MARK.'Md5Sign='.$Md5key;
if($Result!='1')
{
echo "支付可能失败了,请先查看帐户上的资金";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'宝付','支付可能失败了,请先查看帐户上的资金')";
    $mysqli->query($sql);
exit;
}
//MD5签名格式
$WaitSign=md5('MemberID='.$MemberID.$MARK.'TerminalID='.$TerminalID.$MARK.'TransID='.$TransID.$MARK.'Result='.$Result.$MARK.'ResultDesc='.$ResultDesc.$MARK.'FactMoney='.$FactMoney.$MARK.'AdditionalInfo='.$AdditionalInfo.$MARK.'SuccTime='.$SuccTime.$MARK.'Md5Sign='.$Md5key);
if ($Md5Sign == $WaitSign) {
			$m_oamount=$FactMoney/100;
            $sql="select user_id,user_name,money from user_list where user_name='$s_name' limit 1";
            $query	=	$mysqli->query($sql);
            $rows	 =	$query->fetch_array();
            $cou	=	$query->num_rows;
			if($cou<=0){
				echo "返回信息错误!";
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'宝付','返回信息错误')";
                $mysqli->query($sql);
				exit;
			}
            $assets	 =	$rows['money'];
            $uid	 =	$rows['user_id'];
            $username=	$rows['user_name'];

				echo "支付成功".'<br>';
				//echo "商家号=".$m_id.'<br>';
				echo "订单号=".$m_orderid.'<br>';
				echo "金额=".$m_oamount.'<br>';
				//echo "币种=".$m_ocurrency.'<br>';
				//echo ".................";
                $sql="select * from money where order_num = '".$m_orderid."'";
                $query	=	$mysqli->query($sql);
                $cou	=	$query->num_rows;
				if ($cou==0){
                    $sql		=	"insert into money(user_id,order_value,order_num,status,assets,balance) values($uid,$m_oamount,'$m_orderid','确认',$assets,$assets)";
                    $mysqli->query($sql);
                    $m_id = $mysqli->insert_id;
                    $sql	=	"update money,user_list set money.status='成功',money.update_time=now(),user_list.money=user_list.money+money.order_value,money.about='该订单在线冲值操作成功',money.sxf=money.order_value/100,money.balance=user_list.money+money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='确认'";
                    $mysqli->query($sql);
                    $q1			=	$mysqli->affected_rows;
                    if($q1 != 2){
                        echo "更新用户金额失败";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'宝付','更新用户金额失败')";
                        $mysqli->query($sql);
                        exit;
                    }
                    $balance = $assets+$m_oamount;
                    $sql  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$m_orderid','".""."',now(),'在线冲值操作成功','$m_oamount','$assets','$balance');";
                    $mysqli->query($sql);
                    $q3		=	$mysqli->affected_rows;
                    if($q3 != 1){
                        $sql		=	"update money,user_list set money.status='未结算',money.update_time=now(),user_list.money=user_list.money-money.order_value,money.about='该订单在线冲值操作失败',money.sxf=money.order_value/100,money.balance=user_list.money-money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='成功'";
                        $mysqli->query($sql);
                        echo "支付失败，插入金钱记录失败";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'宝付','支付失败，插入金钱记录失败')";
                        $mysqli->query($sql);
                        exit;
                    }
                    $sql = "DROP TRIGGER BeforeUpdatePayset;";
                    $mysqli->query($sql);
                    $mysqli->query("update pay_set set money_Already=money_Already+".$m_oamount." where id='".$rows_pay["id"]."'");
                    $sql = "   CREATE TRIGGER `BeforeUpdatePayset` BEFORE update ON `pay_set`
                              FOR EACH ROW BEGIN
                                insert into pay_set(id) values (old.id);
                              END;
                        ";
                    $mysqli->query($sql);
				}

                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'宝付','成功支付')";
                $mysqli->query($sql);
				
				echo "<Script language=javascript>alert('交易成功,请回首页重新登入.');window.open('".$rows_pay["f_url"]."','_top')</script>";
	//校验通过开始处理订单		
	echo ("定单支付成功");//全部正确了输出OK
	//处理想处理的事情，验证通过，根据提交的参数判断支付结果
} else {
	echo "<Script language=javascript>alert('交易成功,请回首页重新登入.');window.open('".$rows_pay["f_url"]."','_top')</script>";
	echo("定单支付失败,请联系客服'");//MD5校验失败
   //处理想处理的事情
    echo "交易信息被篡改";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type) values('$signInfo',now(),'宝付')";
    $mysqli->query($sql);
} 

?>
</head>

<body>
<form id="form1">
</form>
</body>
</html>
