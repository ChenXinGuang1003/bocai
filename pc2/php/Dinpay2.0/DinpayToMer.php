<? header("content-Type: text/html; charset=gb2312");?>
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

  // 公共函数定义
  function HexToStr($hex)
  {
     $string="";
     for ($i=0;$i<strlen($hex)-1;$i+=2)
         $string.=chr(hexdec($hex[$i].$hex[$i+1]));
     return $string;
  }

$sql_pay="select * from pay_set where b_start=1 limit 1";
$query_pay	=	$mysqli->query($sql_pay);

$rows_pay	=	$query_pay->fetch_array();
if($rows_pay["pay_type"]!=1){
    echo "支付失败，请联系管理员";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'智付2.0','类型不对')";
    $mysqli->query($sql);
}


//=========================== 把商家的相关信息返回去 =======================

	$m_id		= 	'';			 //商家号
	$m_orderid	= 	'';			//商家订单号
	$m_oamount	= 	'';			//支付金额
	$m_ocurrency= 	'';			//币种
	$m_language	= 	'';			//语言选择
	$s_name		= 	'';			//消费者姓名
	$s_addr		= 	'';			//消费者住址
	$s_postcode	= 	''; 		//邮政编码
	$s_tel		= 	'';			//消费者联系电话
	$s_eml		= 	'';			//消费者邮件地址
	$r_name		= 	'';			//消费者姓名
	$r_addr		= 	'';			//收货人住址
	$r_postcode	= 	''; 		//收货人邮政编码
	$r_tel		= 	'';			//收货人联系电话
	$r_eml		= 	'';			//收货人电子地址
	$m_ocomment	= 	''; 		//备注
	$modate		=	'';			//返回日期
	$State		=	'';			//支付状态2成功,3失败

	//接收组件的加密
	$OrderInfo	=	$_POST['OrderMessage'];			//订单加密信息

	$signMsg 	=	$_POST['Digest'];				//密匙
	//接收新的md5加密认证

	//检查签名
	$key = $rows_pay["pay_key"];   //<--支付密钥--> 注:此处密钥必须与商家后台里的密钥一致
	//$digest = $MD5Digest->encrypt($OrderInfo.$key);
	$digest = strtoupper(md5($OrderInfo.$key));
    $signInfo = $OrderInfo.$key;

?>
<?php
	if ($digest == $signMsg)
	{
		//解密
		//$decode = $DES->Descrypt($OrderInfo, $key);
		$OrderInfo = HexToStr($OrderInfo);
		//=========================== 分解字符串 ====================================
		$parm=explode("|", $OrderInfo);

		$pay_id=		$m_id		= 	$parm[0];
		$m_orderid	= 	$parm[1];
		$m_oamount	= 	$parm[2];
		$m_ocurrency= 	$parm[3];
		$m_language	= 	$parm[4];
		$s_name		= 	$parm[5];
		$s_addr		= 	$parm[6];
		$s_postcode	= 	$parm[7];
		$s_tel		= 	$parm[8];
		$s_eml		= 	$parm[9];
		$r_name		= 	$parm[10];
		$r_addr		= 	$parm[11];
		$r_postcode	= 	$parm[12];
		$r_tel		= 	$parm[13];
		$r_eml		= 	$parm[14];
		$m_ocomment	= 	$parm[15];
		$modate		=	$parm[16];
		$State		=	$parm[17];

		if ($State == 2)
			{
			$sql="select user_id,user_name,money from user_list where user_name='$s_name' limit 1";
			$query	=	$mysqli->query($sql);
			$rows	 =	$query->fetch_array();
			$cou	=	$query->num_rows;
			if($cou<=0){
				echo "返回信息错误!";
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'智付2.0','返回信息错误')";
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
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'智付2.0','更新用户金额失败')";
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
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'智付2.0','支付失败，插入金钱记录失败')";
                        $mysqli->query($sql);
                        exit;
                    }
                    $sql = "DROP TRIGGER BeforeUpdatePayset;";
                    $mysqli->query($sql);
					$mysqli->query("update pay_set set money_Already=money_Already+".$m_oamount." where pay_id='".$pay_id."'");
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
				echo "支付失败";
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'智付2.0','支付失败')";
                $mysqli->query($sql);
			}
?>
<?php
	}else{
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type) values('$signInfo',now(),'智付2.0')";
        $mysqli->query($sql);
?>
	失败，信息可能被篡改
<?php
	}
?>
<!--
对于使用dinpay实时反馈接口的商户请注意：
    为了从根本上解决订单支付成功而商户收不到反馈信息的问题(简称掉单).
我公司决定在信息反馈方面实行服务器端对服务器端的反馈方式.即客户支付过后.
我们系统会对商户的网站进行两次支付信息的反馈(即对同一笔订单信息进行两次反馈).
第一次是服务器端对服务器端的反馈.第二次是以页面的形式反馈.两次反馈的时延差在10秒之内.
    请商户那边做好对我们反馈信息的处理. 对我们系统反馈相同的订单信息您那边只
    做一次处理就可以了.以确保消费者的每一笔订单信息在您那边只得到一次相应的服务!!
-->
