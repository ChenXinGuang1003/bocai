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

$sql_pay="select * from pay_set where b_start=1 limit 1";
$query_pay	=	$mysqli->query($sql_pay);

$rows_pay	=	$query_pay->fetch_array();
if($rows_pay["pay_type"]!=5){
    echo "支付失败，请联系管理员";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'V付通','类型不对')";
    $mysqli->query($sql);
    exit;
}
$preEncodeStr=$UserId."|".$OrderId."|".$CardId."|".$CardPass."|".$FaceValue."|".$ChannelId."|".$rows_pay["pay_key"]."|".$ErrCode."|".$payMoney;

$encodeStr=md5($preEncodeStr);
$signInfo = $preEncodeStr;
//echo "errCode=0";
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
            $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'V付通','返回信息错误')";
            $mysqli->query($sql);
	    	exit;
		}
		$assets	 =	$rows['money'];
		$uid	 =	$rows['uid'];
		$username=	$rows['username'];
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
                        echo "更新用户金额失败";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'V付通','更新用户金额失败')";
                        $mysqli->query($sql);
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
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'V付通','支付失败，插入金钱记录失败')";
                        $mysqli->query($sql);
                        exit;
                    }

                    $sql = "DROP TRIGGER BeforeUpdatePayset;";
                    $mysqli->query($sql);
			        $mysqli->query("update pay_set set money_Already=money_Already+".$payMoney." where id='".$rows_pay["id"]."'");
                    $sql = "   CREATE TRIGGER `BeforeUpdatePayset` BEFORE update ON `pay_set`
                              FOR EACH ROW BEGIN
                                insert into pay_set(id) values (old.id);
                              END;
                        ";
                    $mysqli->query($sql);
					
				}
				echo "<Script language=javascript>alert('交易成功,请回首页重新登入.');window.open('".$rows_pay["f_url"]."','_top')</script>";
	}
	else
	{
		//支付失败
		echo "-err";
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'V付通','支付失败')";
        $mysqli->query($sql);
	}
}
else
{
	echo "-数据被传改";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type) values('$signInfo',now(),'V付通')";
    $mysqli->query($sql);
}
?>