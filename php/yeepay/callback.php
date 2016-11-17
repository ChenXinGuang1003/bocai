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
include_once($C_Patch."/php/yeepay/yeepayCommon.php");

$sql_pay="select * from pay_set where b_start=1 limit 1";
$query_pay	=	$mysqli->query($sql_pay);

$rows_pay	=	$query_pay->fetch_array();
if($rows_pay["pay_type"]!=2){
    echo "支付失败，请联系管理员";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'易宝','类型不对')";
    $mysqli->query($sql);
    exit;
}

#	只有支付成功时易宝支付才会通知商户.
##支付成功回调有两次，都会通知到在线支付请求参数中的p8_Url上：浏览器重定向;服务器点对点通讯.

#	解析返回参数.
$return = getCallBackValue($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType,$hmac);

#	判断返回签名是否正确（True/False）
$bRet = CheckHmac($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType,$hmac,$rows_pay["pay_key"],$rows_pay["pay_id"]);
#	以上代码和变量不需要修改.
//http://xxxxxxxx/YeePay/callback.php?p1_MerId=10001049131&r0_Cmd=Buy&r1_Code=1&r2_TrxId=919415822326771H&r3_Amt=0.01&r4_Cur=RMB&r5_Pid=&r6_Order=yeepay_14349227&r7_Uid=&r8_MP=kka1234&r9_BType=1&ru_Trxtime=20091209210537&ro_BankOrderId=197905920&rb_BankId=BOCO-NET&rp_PayDate=20091209210532&rq_CardNo=&rq_SourceFee=0.0&rq_TargetFee=0.0&hmac=ef475752a7003855f75e19ef3f7eb8cc#	校验码正确.
$signInfo = "$r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType,$hmac,".$rows_pay["pay_key"].",".$rows_pay["pay_id"];
if ($bRet){
	#检查返回的会员帐号
	if ($r8_MP==""){
	    echo "返回信息错误!";
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'易付','返回信息错误')";
        $mysqli->query($sql);
	    exit;
	}else{
		$sql="select user_id,user_name,money from user_list where user_name='$r8_MP' limit 1";
		$query	=	$mysqli->query($sql);
		$rows	 =	$query->fetch_array();
		$cou	=	$query->num_rows;
		if($cou<=0){
			echo "返回信息错误!";
            $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'易付','返回信息错误2')";
            $mysqli->query($sql);
	    	exit;
		}
		$assets	 =	$rows['money'];
		$uid	 =	$rows['user_id'];
		$username=	$rows['user_name'];
		
	}
	if ($r1_Code=="1"){
		
	#	需要比较返回的金额与商家数据库中订单的金额是否相等，只有相等的情况下才认为是交易成功.
	#	并且需要对返回的处理进行事务控制，进行记录的排它性处理，防止对同一条交易重复发货的情况发生.      	  	
		
		    if ($r9_BType=="1"){
				$sql="select * from money where order_num = '".$r6_Order."'";
				$query	=	$mysqli->query($sql);
				$cou	=	$query->num_rows;
				if ($cou==0){
                    $sql		=	"insert into money(user_id,order_value,order_num,status,assets,balance) values($uid,$r3_Amt,'$r6_Order','确认',$assets,$assets)";
					$mysqli->query($sql);
					$m_id = $mysqli->insert_id;
                    $sql	=	"update money,user_list set money.status='成功',money.update_time=now(),user_list.money=user_list.money+money.order_value,money.about='该订单在线冲值操作成功',money.sxf=money.order_value/100,money.balance=user_list.money+money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='确认'";
                    $mysqli->query($sql);
                    $q1			=	$mysqli->affected_rows;
                    if($q1 != 2){
                        echo "更新用户金额失败";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'易付','更新用户金额失败')";
                        $mysqli->query($sql);
                        exit;
                    }
                    $balance = $assets+$r3_Amt;
                    $sql  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$r6_Order','".""."',now(),'在线冲值操作成功','$r3_Amt','$assets','$balance');";
                    $mysqli->query($sql);
                    $q3		=	$mysqli->affected_rows;
                    if($q3 != 1){
                        $sql		=	"update money,user_list set money.status='未结算',money.update_time=now(),user_list.money=user_list.money-money.order_value,money.about='该订单在线冲值操作失败',money.sxf=money.order_value/100,money.balance=user_list.money-money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='成功'";
                        $mysqli->query($sql);
                        echo "支付失败，插入金钱记录失败";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'易付','支付失败，插入金钱记录失败')";
                        $mysqli->query($sql);
                        exit;
                    }

                    $sql = "DROP TRIGGER BeforeUpdatePayset;";
                    $mysqli->query($sql);
			    $mysqli->query("update pay_set set money_Already=money_Already+".$r3_Amt." where id='".$rows_pay["id"]."'");
                    $sql = "   CREATE TRIGGER `BeforeUpdatePayset` BEFORE update ON `pay_set`
                              FOR EACH ROW BEGIN
                                insert into pay_set(id) values (old.id);
                              END;
                        ";
                    $mysqli->query($sql);
				echo "<Script language=javascript>alert('交易成功,请回首页重新登入.');window.open('".$rows_pay["f_url"]."','_top')</script>";
				}
		    }else if ($r9_BType=="2"){
				
			#如果需要应答机制则必须回写流,以success开头,大小写不敏感.
				$sql="select * from money where order_num = '".$r6_Order."'";
				$query	=	$mysqli->query($sql);
				$cou	=	$query->num_rows;
				if ($cou==0){
                    $sql		=	"insert into money(user_id,order_value,order_num,status,assets,balance) values($uid,$r3_Amt,'$r6_Order','确认',$assets,$assets)";
                    $mysqli->query($sql);
                    $m_id = $mysqli->insert_id;
                    $sql	=	"update money,user_list set money.status='成功',money.update_time=now(),user_list.money=user_list.money+money.order_value,money.about='该订单在线冲值操作成功',money.sxf=money.order_value/100,money.balance=user_list.money+money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='确认'";
                    $mysqli->query($sql);
                    $q1			=	$mysqli->affected_rows;
                    if($q1 != 2){
                        echo "更新用户金额失败";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'易付','更新用户金额失败2')";
                        $mysqli->query($sql);
                        exit;
                    }
                    $balance = $assets+$r3_Amt;
                    $sql  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$r6_Order','".""."',now(),'在线冲值操作成功','$r3_Amt','$assets','$balance');";
                    $mysqli->query($sql);
                    $q3		=	$mysqli->affected_rows;
                    if($q3 != 1){
                        $sql		=	"update money,user_list set money.status='未结算',money.update_time=now(),user_list.money=user_list.money-money.order_value,money.about='该订单在线冲值操作失败',money.sxf=money.order_value/100,money.balance=user_list.money-money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='成功'";
                        $mysqli->query($sql);
                        echo "支付失败，插入金钱记录失败";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'易付','支付失败，插入金钱记录失败2')";
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
				echo "<Script language=javascript>alert('交易成功,请回首页重新登入.');window.open('".$rows_pay["f_url"]."','_top')</script>";
			}
	}
	
}else{
	echo "交易信息被篡改";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type) values('$signInfo',now(),'易付')";
    $mysqli->query($sql);
}
   
?>
<html>
<head>
<title>Return from YeePay Page</title>
</head>
<body>
</body>
</html>