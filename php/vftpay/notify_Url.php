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
$UserId=$_REQUEST["P_UserId"];
$OrderId=$_REQUEST["P_OrderId"];
$CardId=$_REQUEST["P_CardId"];
$CardPass=$_REQUEST["P_CardPass"];
$FaceValue=$_REQUEST["P_FaceValue"];
$ChannelId=$_REQUEST["P_ChannelId"];

$subject=$_REQUEST["P_Subject"];
$description=$_REQUEST["P_Description"]; 
$price=$_REQUEST["P_Price"];
$quantity=$_REQUEST["P_Quantity"];
$notic=$_REQUEST["P_Notic"];
$ErrCode=$_REQUEST["P_ErrCode"];
$PostKey=$_REQUEST["P_PostKey"];
$payMoney=$_REQUEST["P_PayMoney"];

$preEncodeStr=$UserId."|".$OrderId."|".$CardId."|".$CardPass."|".$FaceValue."|".$ChannelId."|".$SalfStr;

$encodeStr=md5($preEncodeStr);

if($PostKey==$encodeStr)
{
	if($ErrCode=="0") //支付成功
	{
		echo $subject;
			echo "<br>";
		echo	$notic;
		echo "<br>";
		echo "errCode=0";
		//设置为成功订单,主意订单的重复处理
			//设置为成功订单,主意订单的重复处理
		$sql="select user_id,user_name,money from user_list where user_name='$notic' limit 1";
		$query	=	$mysqli->query($sql);
		$rows	 =	$query->fetch_array();
		$cou	=	$query->num_rows;
		if($cou<=0){
			echo "返回信息错误!";
	    	exit;
		}
		$assets	 =	$rows['money'];
		$uid	 =	$rows['user_id'];
		$username=	$rows['user_name'];
				echo "支付成功".'<br>';
				//echo "商家号=".$m_id.'<br>';
				echo "订单号=".$OrderId.'<br>';
				echo "金额=".$FaceValue.'<br>';
				//echo "币种=".$m_ocurrency.'<br>';
				//echo ".................";
				$sql="select * from money where order_num = '".$OrderId."'";
				$query	=	$mysqli->query($sql);
				$cou	=	$query->num_rows;
				if ($cou==0){
                    $sql		=	"insert into money(user_id,order_value,order_num,status,assets,balance) values($uid,$payMoney,'$OrderId','确认',$assets,$assets)";
					$mysqli->query($sql);
					$m_id = $mysqli->insert_id;
                    $sql	=	"update money,user_list set money.status='成功',money.update_time=now(),user_list.money=user_list.money+money.order_value,money.about='该订单在线冲值操作成功',money.sxf=money.order_value/100,money.balance=user_list.money+money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='确认'";
					$mysqli->query($sql);
                    $q1			=	$mysqli->affected_rows;
                    if($q1 != 2){
                        echo "支付失败";
                        exit;
                    }
                    $balance = $assets+$payMoney;
                    $sql  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$OrderId','".""."',now(),'在线冲值操作成功','$payMoney','$assets','$balance');";
                    $mysqli->query($sql);
                    $q3		=	$mysqli->affected_rows;
                    if($q3 != 1){
                        $sql		=	"update money,user_list set money.status='未结算',money.update_time=now(),user_list.money=user_list.money-money.order_value,money.about='该订单在线冲值操作失败',money.sxf=money.order_value/100,money.balance=user_list.money-money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='成功'";
                        $mysqli->query($sql);
                        echo "支付失败，插入金钱记录失败";
                        exit;
                    }
			        echo "<Script language=javascript>alert('交易成功,请回首页重新登入.');window.open('/','_top')</script>";
				}
	}
	else
	{
		//支付失败
		echo "err";
	}
}
else
{
	//echo "数据被传改";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>返回支付结果页面</title>
<style type="text/css">
body{
	font-size:12px;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.STYLE1 {color: #2179DD}
</style>
</head>
<body>
<table width="100%" height="34" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="34"><img src="img/pic_1.gif" width="69" height="60" /></td>
    <td width="100%" background="img/pic_3.gif" bgcolor="#2179DD"><img src="img/pic_4.gif" width="40" height="40" /> 快速充值</td>
    <td width="13" height="34"><img src="img/pic_2.gif" width="69" height="60" /></td>
  </tr>
</table>

<table width="864" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#5c9acf" class="mytable">
  <tr>
    <td width="100%" height="88" bgcolor="#FFFFFF"><br />
	
      	<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" class="table_main">

          <tr>
            <td height="25" align="right" class="STYLE1">订单号：</td>
            <td><span class="STYLE2"><?=$_REQUEST["P_OrderId"]?></span></td>
          </tr>

          <tr>
            <td height="25" align="right" class="STYLE1">实际充值金额：</td>
            <td><span class="STYLE2"><?=$_REQUEST["P_PayMoney"]?></span></td>
          </tr>
          <tr>
            <td height="25" align="right" class="STYLE1">状态标识：</td>
            <td height="25"><span class="STYLE2"><?=$_REQUEST["P_ErrCode"]?>(状态为0表示成功)</span></td>
          </tr>
      </table>
      <br /></td>
  </tr>
</table>
</body>
</html>
