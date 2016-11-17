<? header("content-Type: text/html; charset=UTF-8");?>
<?php
	
	require_once('dinpayTool.php');
    
	//////////////////////////		接收智付返回通知数据  /////////////////////////////////
	////////////////////////// To receive notification data from Dinpay ////////////////////
	
  
	$merchant_code	= $_POST["merchant_code"];	

	$interface_version = $_POST["interface_version"];

	$sign_type = $_POST["sign_type"];

	$dinpaySign = $_POST["sign"];

	$notify_type = $_POST["notify_type"];

	$notify_id = $_POST["notify_id"];

	$order_no = $_POST["order_no"];

	$order_time = $_POST["order_time"];	

	$order_amount = $_POST["order_amount"];

	$trade_status = $_POST["trade_status"];

	$trade_time = $_POST["trade_time"];

	$trade_no = $_POST["trade_no"];

	$bank_seq_no = $_POST["bank_seq_no"];

	$extra_return_param = $_POST["extra_return_param"];


	

	
	$signStr = "";
	
	if($bank_seq_no != ""){
		$signStr = $signStr."bank_seq_no=".$bank_seq_no."&";
	}

	if($extra_return_param != ""){
		$signStr = $signStr."extra_return_param=".$extra_return_param."&";
	}	

	$signStr = $signStr."interface_version=".$interface_version."&";	

	$signStr = $signStr."merchant_code=".$merchant_code."&";

	$signStr = $signStr."notify_id=".$notify_id."&";

	$signStr = $signStr."notify_type=".$notify_type."&";

    $signStr = $signStr."order_amount=".$order_amount."&";	

    $signStr = $signStr."order_no=".$order_no."&";	

    $signStr = $signStr."order_time=".$order_time."&";	

    $signStr = $signStr."trade_no=".$trade_no."&";	

    $signStr = $signStr."trade_status=".$trade_status."&";

	$signStr = $signStr."trade_time=".$trade_time;
	
	
	
	$flag = verifySign($signStr,$dinpaySign);


	
	if($flag){		//验签成功（Signature correct）
	
	$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
	$attach=$extra_return_param; 
	$amount=$order_amount;
	$billno=$order_no;
				
				$sql="select user_id,user_name,money from user_list where user_name='$attach' limit 1";
			$query	=	$mysqli->query($sql);
			$rows	 =	$query->fetch_array();
			$cou	=	$query->num_rows;
			if($cou<=0){
				echo "返回信息错误!";
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'环讯','返回信息错误')";
                $mysqli->query($sql);
				exit;
			}
			$assets	 =	$rows['money'];
			$uid	 =	$rows['user_id'];
			$username=	$rows['user_name'];

            $order_array = explode("_",$billno);
            if(strtolower($order_array[0])==strtolower($username) || strtolower($order_array[1])==strtolower($username)){

            }else{
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'环讯','类型不对26-$username-$billno')";
                $mysqli->query($sql);
                exit;
            }

				$sql="select count(*) as s from money where order_num = '".$billno."'";
				$query	=	$mysqli->query($sql);
				$cou	 =	$query->fetch_array();
				if ($cou['s']==0){
                    $sql		=	"insert into money(user_id,order_value,order_num,status,assets,balance) values($uid,$amount,'$billno','确认',$assets,$assets)";
					$mysqli->query($sql);
					$m_id = $mysqli->insert_id;
                    $sql	=	"update money,user_list set money.status='成功',money.update_time=now(),user_list.money=user_list.money+money.order_value,money.about='该订单在线充值操作成功',money.sxf=money.order_value/100,money.balance=user_list.money+money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='确认'";
					$mysqli->query($sql);
                    $q1			=	$mysqli->affected_rows;
                    if($q1 != 2){
                        echo "更新用户金额失败";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'智付','更新用户金额失败')";
                        $mysqli->query($sql);
                        exit;
                    }
                    $balance = $assets+$amount;
                    $sql  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$billno','".""."',now(),'在线冲值操作成功','$amount','$assets','$balance');";
                    $mysqli->query($sql);
                    $q3		=	$mysqli->affected_rows;
                    if($q3 != 1){
                        $sql		=	"update money,user_list set money.status='未结算',money.update_time=now(),user_list.money=user_list.money-money.order_value,money.about='该订单在线充值操作失败',money.sxf=money.order_value/100,money.balance=user_list.money-money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='成功'";
                        $mysqli->query($sql);
                        echo "支付失败，插入金钱记录失败";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'智付','支付失败，插入金钱记录失败')";
                        $mysqli->query($sql);
                        exit;
                    }
                    $sql = "DROP TRIGGER BeforeUpdatePayset;";
                    $mysqli->query($sql);
					$mysqli->query("update pay_set set money_Already=money_Already+".$amount." where id='".$rows_pay["id"]."'");
                    $sql = "   CREATE TRIGGER `BeforeUpdatePayset` BEFORE update ON `pay_set`
                              FOR EACH ROW BEGIN
                                insert into pay_set(id) values (old.id);
                              END;
                        ";
                    $mysqli->query($sql);
				}
		echo "SUCCESS";		
	$url="http://wwww.yl00853.com/ok.php";
    header("Location:".$url);

	}else{

		echo "Signature Error";  //验签失败，业务结束（End of the business）
	}
?>