<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
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
if($rows_pay["pay_type"]!=10){
    echo "支付失败，请联系管理员";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'快银','类型不对-不是10')";
    $mysqli->query($sql);
    exit;
}

#订单金额
    $ky_back['order_amount']     = $_REQUEST['order_amount'];
#商户订单号
	$ky_back['order_id']         = $_REQUEST['order_id'];
#快银订单号
	$ky_back['kuaiyin_order_id'] = $_REQUEST['kuaiyin_order_id'];
#订单提交时间
	$ky_back['order_time']       = $_REQUEST['order_time'];
#实际支付金额
	$ky_back['paid_amount']      = $_REQUEST['paid_amount'];
#交易流水号
	$ky_back['deal_id']          = $_REQUEST['deal_id'];
#订单的结账日期
	$ky_back['account_date']     = $_REQUEST['account_date'];
#快银交易处理时间
	$ky_back['deal_time']        = $_REQUEST['deal_time'];
#支付结果
	$ky_back['result']           = $_REQUEST['result'];
#返回错误代码
	$ky_back['code']             = $_REQUEST['code'];
#银行订单号
	$ky_back['bank_order_id']    = $_REQUEST['bank_order_id'];
#自定义字段
	$ky_back['cust_param']       = $_REQUEST['cust_param'];
#商户编号
	$ky_back['merchant_id']      = $rows_pay["pay_id"];
#版本号
	$ky_back['version']          = '1.0.0';
#返回验证签名
	$signMsg         = $_REQUEST['signMsg'];

#md5加密
#快银网络密钥
	$sign_kypay = array_diff($ky_back, array(''));
	ksort($sign_kypay);
	$str_sign = '';
	foreach($sign_kypay as $k=>$v){
		$str_sign .=$k.'='.$v.'&';
	}
	
	$back_signMsg  = strtoupper(md5(urlencode($str_sign.'key='.$rows_pay["pay_key"])));

    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$str_sign',now(),'快银','测试数据001')";
    $mysqli->query($sql);


#	签名正确.
if($back_signMsg == $signMsg){	
	if($ky_back['result']=="Y"){//只有result=Y时才进行数据的处理
	#	需要比较返回的金额与商家数据库中订单的金额是否相等，只有相等的情况下才认为是交易成功.
	#	并且需要对返回的处理进行事务控制，进行记录的排它性处理，在接收到支付结果通知后，判断是否进行过业务逻辑处理，不要重复进行业务逻辑处理，防止对同一条交易重复发货的情况发生.
	#   判断您平台的数据是否已经处理过了，已处理则无需再处理，以免造成重复处理。
		#成功处理完您的平台数据后，向快银支付输出如下内容，把www.kuaiyinpay.com改成您平台的支付结果url
        $extra_return_param = $ky_back['cust_param'];
        $sql="select user_id,user_name,money from user_list where user_name='$extra_return_param' limit 1";
        $query	=	$mysqli->query($sql);
        $rows	 =	$query->fetch_array();
        $cou	=	$query->num_rows;
        if($cou<=0){
            echo "返回信息错误!";
            $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$extra_return_param',now(),'快银','返回信息错误')";
            $mysqli->query($sql);
            exit;
        }
        $assets	 =	$rows['money'];
        $uid	 =	$rows['user_id'];
        $username=	$rows['user_name'];
        $order_no = $username."_".rand(100,999)."".date("YmdHis");
        $order_amount = $ky_back['order_amount'];

        $sql="select count(*) as s from money where order_num = '".$order_no."'";
        $query	=	$mysqli->query($sql);
        $cou	 =	$query->fetch_array();
        if ($cou['s']==0){
            $sql		=	"insert into money(user_id,order_value,order_num,status,assets,balance) values($uid,$order_amount,'$order_no','确认',$assets,$assets)";
            $mysqli->query($sql);
            $m_id = $mysqli->insert_id;

            $sql="select user_id,order_num from money where order_num='$order_no' limit 1";
            $query	=	$mysqli->query($sql);
            $rows	 =	$query->fetch_array();
            $user_id	 =	$rows['user_id'];
            $order_array_2 = explode("_",$rows["order_num"]);

            $sql="select user_name from user_list where user_id=$user_id limit 1";
            $query	=	$mysqli->query($sql);
            $rows	 =	$query->fetch_array();
            $username=	$rows['user_name'];

            if(str_replace(" ","",strtolower($order_array_2[0]))==str_replace(" ","",strtolower($username)) || str_replace(" ","",strtolower($order_array_2[1]))==str_replace(" ","",strtolower($username))){

            }else{
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'快银','类型不对27-$extra_return_param-$username')";
                $mysqli->query($sql);
                $sql = "delete from money where id=$m_id";
                $mysqli->query($sql);
                exit;
            }

            $sql	=	"update money,user_list set money.status='成功',money.update_time=now(),user_list.money=user_list.money+money.order_value,money.about='该订单在线冲值操作成功',money.sxf=money.order_value/100,money.balance=user_list.money+money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='确认'";
            $mysqli->query($sql);
            $q1			=	$mysqli->affected_rows;
            if($q1 != 2){
                echo "更新用户金额失败";
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$str_sign',now(),'快银','更新用户金额失败')";
                $mysqli->query($sql);
                exit;
            }
            $balance = $assets+$order_amount;
            $sql  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$order_no','".""."',now(),'在线冲值操作成功','$order_amount','$assets','$balance');";
            $mysqli->query($sql);
            $q3		=	$mysqli->affected_rows;
            if($q3 != 1){
                $sql		=	"update money,user_list set money.status='未结算',money.update_time=now(),user_list.money=user_list.money-money.order_value,money.about='该订单在线冲值操作失败',money.sxf=money.order_value/100,money.balance=user_list.money-money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='成功'";
                $mysqli->query($sql);
                echo "支付失败，插入金钱记录失败";
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$str_sign',now(),'快银','支付失败，插入金钱记录失败')";
                $mysqli->query($sql);
                exit;
            }
            $sql = "DROP TRIGGER BeforeUpdatePayset;";
            $mysqli->query($sql);
            $mysqli->query("update pay_set set money_Already=money_Already+".$order_amount." where pay_id='".$merchant_code."'");
            $sql = "   CREATE TRIGGER `BeforeUpdatePayset` BEFORE update ON `pay_set`
                              FOR EACH ROW BEGIN
                                insert into pay_set(id) values (old.id);
                              END;
                        ";
            $mysqli->query($sql);
        }

        echo "<Script language=javascript>alert('交易成功,请回首页重新登入.');window.open('".$rows_pay["f_url"]."','_top')</script>";
	}
	
}else{
	#失败处理完后，向快银支付输出如下内容，把www.kuaiyinpay.com改成您平台的支付结果url
    echo "<Script language=javascript>alert('交易失败,请联系管理员.');</script>";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type) values('$str_sign',now(),'快银')";
    $mysqli->query($sql);
}
?>