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
/* *
 功能：智付页面跳转同步通知页面
 版本：3.0
 日期：2013-08-01
 说明：
 以下代码仅为了方便商户安装接口而提供的样例具体说明以文档为准，商户可以根据自己网站的需要，按照技术文档编写。

 * */

$sql_pay="select * from pay_set where b_start=1 limit 1";
$query_pay	=	$mysqli->query($sql_pay);

$rows_pay	=	$query_pay->fetch_array();
if($rows_pay["pay_type"]!=6){
    echo "支付失败，请联系管理员";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对')";
    $mysqli->query($sql);
    exit;
}

	//获取智付GET过来反馈信息
//商号号
	$merchant_code	= $_POST["merchant_code"];
    if(strlen($merchant_code)>30 || strpos($merchant_code,"&")!==false){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对1')";
        $mysqli->query($sql);
        exit;
    }

	//通知类型
	$notify_type = $_POST["notify_type"];
    if(strlen($notify_type)>20 || strpos($notify_type,"&")!==false){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对2')";
        $mysqli->query($sql);
        exit;
    }

	//通知校验ID
	$notify_id = $_POST["notify_id"];
    if(strlen($notify_id)>50 || strpos($notify_id,"&")!==false){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对3')";
        $mysqli->query($sql);
        exit;
    }

	//接口版本
	$interface_version = $_POST["interface_version"];
    if(strlen($interface_version)>10 || strpos($interface_version,"&")!==false){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对4')";
        $mysqli->query($sql);
        exit;
    }

	//签名方式
	$sign_type = $_POST["sign_type"];
    if(strlen($sign_type)>10 || strpos($sign_type,"&")!==false){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对5')";
        $mysqli->query($sql);
        exit;
    }

	//签名  无需校验
	$dinpaySign = $_POST["sign"];
    if(strlen($dinpaySign)>50 || strpos($dinpaySign,"&")!==false){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对-签名')";
        $mysqli->query($sql);
        exit;
    }

	//商家订单号
	$order_no = $_POST["order_no"];
    if(strlen($order_no)>50 || strpos($order_no,"&")!==false){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对6')";
        $mysqli->query($sql);
        exit;
    }


	//商家订单时间
	$order_time = $_POST["order_time"];
    $diff = strtotime($bj_time_now)-strtotime($order_time);
    if(strlen($order_time)>20 || strpos($order_time,"&")!==false){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对7')";
        $mysqli->query($sql);
        exit;
    }

	//商家订单金额
	$order_amount = $_POST["order_amount"];
    if(strlen($order_amount)>10 || strpos($order_amount,"&")!==false){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对8')";
        $mysqli->query($sql);
        exit;
    }

	//回传参数
	$extra_return_param = $_POST["extra_return_param"];
    if(strlen($extra_return_param)>30 || strpos($extra_return_param,"&")!==false){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对9')";
        $mysqli->query($sql);
        exit;
    }

    $order_array = explode("_",$order_no);
    if(strtolower($order_array[0])==strtolower($extra_return_param) || strtolower($order_array[1])==strtolower($extra_return_param)){

    }else{
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对26-$extra_return_param-$order_no')";
        $mysqli->query($sql);
        exit;
    }

	//智付交易定单号
	$trade_no = $_POST["trade_no"];
    if(strlen($trade_no)>35 || strpos($trade_no,"&")!==false){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对10')";
        $mysqli->query($sql);
        exit;
    }

	//智付交易时间
	$trade_time = $_POST["trade_time"];
    $diff2 = strtotime($bj_time_now)-strtotime($trade_time);
    if(strlen($trade_time)>20 || strpos($trade_time,"&")!==false){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对11-$trade_time')";
        $mysqli->query($sql);
        exit;
    }

	//交易状态 SUCCESS 成功  FAILED 失败
	$trade_status = $_POST["trade_status"];
    if(strlen($trade_status)>15 || strpos($trade_status,"&")!==false){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对12')";
        $mysqli->query($sql);
        exit;
    }

	//银行交易流水号
	$bank_seq_no = $_POST["bank_seq_no"];
    if(strlen($bank_seq_no)>35 || strpos($bank_seq_no,"&")!==false){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对13')";
        $mysqli->query($sql);
        exit;
    }


	/**
	 *签名顺序按照参数名a到z的顺序排序，若遇到相同首字母，则看第二个字母，以此类推，
	*同时将商家支付密钥key放在最后参与签名，组成规则如下：
	*参数名1=参数值1&参数名2=参数值2&……&参数名n=参数值n&key=key值
	**/


	//组织订单信息
	$signStr = "";
	if($bank_seq_no != "") {
		$signStr = $signStr."bank_seq_no=".$bank_seq_no."&";
	}
	if($extra_return_param != "") {
	    $signStr = $signStr."extra_return_param=".$extra_return_param."&";
	}
	$signStr = $signStr."interface_version=V3.0&";
	$signStr = $signStr."merchant_code=".$merchant_code."&";
	if($notify_id != "") {
        $signStr = $signStr."notify_id=".$notify_id."&notify_type=".$notify_type."&";
	}else{
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对14')";
        $mysqli->query($sql);
        exit;
    }
    if(strlen($notify_id)!=32){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对15-$notify_id')";
        $mysqli->query($sql);
        exit;
    }

    if(strtolower($notify_type)=="page_notify"){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对16-$notify_type')";
        $mysqli->query($sql);
        exit;
    }

    if(strtolower($notify_type)!="offline_notify"){
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对17-$notify_type')";
        $mysqli->query($sql);
        exit;
    }

        $signStr = $signStr."order_amount=".$order_amount."&";
        $signStr = $signStr."order_no=".$order_no."&";
        $signStr = $signStr."order_time=".$order_time."&";
        $signStr = $signStr."trade_no=".$trade_no."&";
        $signStr = $signStr."trade_status=".$trade_status."&";

	if($trade_time != "") {
	     $signStr = $signStr."trade_time=".$trade_time."&";
	}
	$key=$rows_pay["pay_key"];


$sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signStr',now(),'智付3','测试数据001')";
$mysqli->query($sql);

	$signStr = $signStr."key=".$key;
	$signInfo = $signStr;


	//将组装好的信息MD5签名
	$sign = md5($signInfo);
	//echo "sign=".$sign."<br>";

	//比较智付返回的签名串与商家这边组装的签名串是否一致
	if($dinpaySign==$sign) {
		//验签成功
		/**
		此处进行商户业务操作
		业务结束
		*/

			$sql="select user_id,user_name,money from user_list where user_name='$extra_return_param' limit 1";
			$query	=	$mysqli->query($sql);
			$rows	 =	$query->fetch_array();
			$cou	=	$query->num_rows;
			if($cou<=0){
				echo "返回信息错误!";
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'智付3.0','返回信息错误')";
                $mysqli->query($sql);
				exit;
			}
			$assets	 =	$rows['money'];
			$uid	 =	$rows['user_id'];
			$username=	$rows['user_name'];

//				echo "支付成功".'<br>';
				//echo "商家号=".$merchant_code.'<br>';
//				echo "订单号=".$order_no.'<br>';
//				echo "金额=".$order_amount.'<br>';
				//echo "币种=".$m_ocurrency.'<br>';
				//echo ".................";
				$sql="select count(*) as s from money where order_num = '".$order_no."'";
				$query	=	$mysqli->query($sql);
				//$cou	=	$query->num_rows;
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
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付3','类型不对27-$extra_return_param-$username-".$rows["order_num"]."')";
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
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'智付3.0','更新用户金额失败')";
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
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'智付3.0','支付失败，插入金钱记录失败')";
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
				
//				echo "<Script language=javascript>alert('交易成功,请回首页重新登入.');window.open('".$rows_pay["f_url"]."','_top')</script>";

        echo "SUCCESS";
        exit;
	}else
        {
		//验签失败 业务结束
//echo "失败，信息可能被篡改";
            $sql = "insert into pay_error_log (sign_info,update_time,pay_type) values('$signInfo',now(),'智付3.0')";
            $mysqli->query($sql);
	}

?>