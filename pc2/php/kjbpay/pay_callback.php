<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Content-Type:text/html; charset=utf-8");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
##支付成功回调有两次，都会通知到在线支付请求参数中的p8_Url上：浏览器重定向;服务器点对点通讯.

$sql_pay="select * from pay_set where b_start=1 limit 1";
$query_pay	=	$mysqli->query($sql_pay);

$rows_pay	=	$query_pay->fetch_array();
if($rows_pay["pay_type"]!=7){
    echo "支付失败，请联系管理员";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'快捷宝','类型不对')";
    $mysqli->query($sql);
    exit;
}

#	获取返回参数
$r0_Cmd = $_REQUEST['r0_Cmd'];
$r1_Code = $_REQUEST['r1_Code'];
$r2_TrxId = $_REQUEST['r2_TrxId'];
$r3_Amt = $_REQUEST['r3_Amt'];
$r4_Cur = $_REQUEST['r4_Cur'];
//$r5_Pid = urldecode($_REQUEST['r5_Pid']);
$r5_Pid = $_REQUEST['r5_Pid'];
$r6_Order = $_REQUEST['r6_Order'];
$r7_Uid = $_REQUEST['r7_Uid'];
//$r8_MP = urldecode($_REQUEST['r8_MP']);
$r8_MP = $_REQUEST['r8_MP'];
$r9_BType = $_REQUEST['r9_BType'];
$rb_BankId = $_REQUEST['rb_BankId'];
$ro_BankOrderId = $_REQUEST['ro_BankOrderId'];
$rp_PayDate = $_REQUEST['rp_PayDate'];
$rq_CardNo = $_REQUEST['rq_CardNo'];
$ru_Trxtime = $_REQUEST['ru_Trxtime'];
$hmac = $_REQUEST['hmac'];

$p1_MerId = $rows_pay["pay_id"];//商户id
$key = $rows_pay["pay_key"];//由商户id获取key

$str = "p1_MerId$p1_MerId" . "r0_Cmd$r0_Cmd" . "r1_Code$r1_Code" . "r2_TrxId$r2_TrxId" . "r3_Amt$r3_Amt" . "r4_Cur$r4_Cur" . "r5_Pid$r5_Pid" . "r6_Order$r6_Order" . "r7_Uid$r7_Uid" . "r8_MP$r8_MP" . "r9_BType$r9_BType";

$hmac1 = strtoupper ( md5 ( $str . $key ) );

$fp=fopen('pay_callback.log',"a+");
date_default_timezone_set('PRC');
fwrite($fp,date("Y-m-d H:i:s")."|".$str."|".$hmac."|".$hmac1.PHP_EOL);
fclose($fp);


$signInfo = $str . $key;
#	签名正确.
if($hmac==$hmac1){

	if($r1_Code=="1"){
	#	需要比较返回的金额与商家数据库中订单的金额是否相等，只有相等的情况下才认为是交易成功.
	#	并且需要对返回的处理进行事务控制，进行记录的排它性处理，在接收到支付结果通知后，判断是否进行过业务逻辑处理，不要重复进行业务逻辑处理，防止对同一条交易重复发货的情况发生.      	  	
		
		if($r9_BType=="1"){
			echo "交易成功";
			echo "<Script language=javascript>alert('交易成功,请回首页重新登入.');window.open('".$rows_pay["f_url"]."','_top')</script>";
			exit;
			
			$sql="select user_id,user_name,money from user_list where user_name='$r8_MP' limit 1";
			$query	=	$mysqli->query($sql);
			$rows	 =	$query->fetch_array();
			$cou	=	$query->num_rows;
			if($cou<=0){
				echo "返回信息错误!";
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'快捷宝','返回信息错误')";
                $mysqli->query($sql);
				exit;
			}
			$assets	 =	$rows['money'];
			$uid	 =	$rows['user_id'];
			$username=	$rows['user_name'];


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
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'快捷宝','更新用户金额失败')";
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
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'快捷宝','支付失败，插入金钱记录失败')";
                        $mysqli->query($sql);
                        exit;
                    }
                    $sql = "DROP TRIGGER BeforeUpdatePayset;";
                    $mysqli->query($sql);
					$mysqli->query("update pay_set set money_Already=money_Already+".$r3_Amt." where pay_id='".$p1_MerId."'");
                    $sql = "   CREATE TRIGGER `BeforeUpdatePayset` BEFORE update ON `pay_set`
                              FOR EACH ROW BEGIN
                                insert into pay_set(id) values (old.id);
                              END;
                        ";
                    $mysqli->query($sql);
				}
				
				echo "<Script language=javascript>alert('交易成功,请回首页重新登入.');window.open('".$rows_pay["f_url"]."','_top')</script>";

    			 




		}elseif($r9_BType=="2"){
			#如果需要应答机制则必须回写流,以success开头,大小写不敏感.
			echo "success";
			echo "<br />交易成功";

			$sql="select user_id,user_name,money from user_list where user_name='$r8_MP' limit 1";
			$query	=	$mysqli->query($sql);
			$rows	 =	$query->fetch_array();
			$cou	=	$query->num_rows;
			if($cou<=0){
				echo "返回信息错误!";
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'快捷宝','返回信息错误2')";
                $mysqli->query($sql);
				exit;
			}
			$assets	 =	$rows['money'];
			$uid	 =	$rows['user_id'];
			$username=	$rows['user_name'];


				$sql="select count(*) as c from money where order_num = '".$r6_Order."'";
				$query	=	$mysqli->query($sql);
				$cou	=	$query->num_rows;
				$rows	 =	$query->fetch_array();
				if ($rows['c']==0){
                    $sql		=	"insert into money(user_id,order_value,order_num,status,assets,balance) values($uid,$r3_Amt,'$r6_Order','确认',$assets,$assets)";
					$mysqli->query($sql);
					$m_id = $mysqli->insert_id;
                    $sql	=	"update money,user_list set money.status='成功',money.update_time=now(),user_list.money=user_list.money+money.order_value,money.about='该订单在线冲值操作成功',money.sxf=money.order_value/100,money.balance=user_list.money+money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='确认'";
					$mysqli->query($sql);
                    $q1			=	$mysqli->affected_rows;
                    if($q1 != 2){
                        echo "更新用户金额失败2";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'快捷宝','更新用户金额失败2')";
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
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'快捷宝','支付失败，插入金钱记录失败2')";
                        $mysqli->query($sql);
                        exit;
                    }
                    $sql = "DROP TRIGGER BeforeUpdatePayset;";
                    $mysqli->query($sql);
					$mysqli->query("update pay_set set money_Already=money_Already+".$r3_Amt." where pay_id='".$p1_MerId."'");
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
	echo "<br/>交易信息被篡改";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type) values('$signInfo',now(),'快捷宝')";
    $mysqli->query($sql);
}

//echo '<br>',$str;

/**
 * 由商户id获取key
 * @param  $user_id
 * @return string
 */
function getKeyByUserid($user_id){
	$xml = simplexml_load_file('userid_key.xml');
	foreach($xml->user as $u){
		if ($u->userid == $user_id) {
			return $u->key;
		}
	}
	return '';
}
?>