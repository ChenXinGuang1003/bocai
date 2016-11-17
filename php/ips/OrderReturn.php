<?php
session_start();
header("Content-type:text/html; charset=gb2312");
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
if($rows_pay["pay_type"]!=3){
    echo "支付失败，请联系管理员";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'环讯','类型不对')";
    $mysqli->query($sql);
    exit;
}
//----------------------------------------------------
//  接收数据
//  Receive the data
//----------------------------------------------------
$billno = $_GET['billno'];
$amount = $_GET['amount'];
$mydate = $_GET['date'];
$succ = $_GET['succ'];
$msg = $_GET['msg'];
$attach = $_GET['attach'];
$ipsbillno = $_GET['ipsbillno'];
$retEncodeType = $_GET['retencodetype'];
$currency_type = $_GET['Currency_type'];
$signature = $_GET['signature'];

//'----------------------------------------------------
//'   Md5摘要认证
//'   verify  md5
//'----------------------------------------------------

//RetEncodeType设置为17（MD5摘要数字签名方式）
//交易返回接口MD5摘要认证的明文信息如下：
//billno+【订单编号】+currencytype+【币种】+amount+【订单金额】+date+【订单日期】+succ+【成功标志】+ipsbillno+【IPS订单编号】+retencodetype +【交易返回签名方式】+【商户内部证书】
//例:(billno000001000123currencytypeRMBamount13.45date20031205succYipsbillnoNT2012082781196443retencodetype17GDgLwwdK270Qj1w4xho8lyTpRQZV9Jm5x4NwWOTThUa4fMhEBK9jOXFrKRT6xhlJuU2FEa89ov0ryyjfJuuPkcGzO5CeVx5ZIrkkt1aBlZV36ySvHOMcNv8rncRiy3DQ)

//返回参数的次序为：
//billno + mercode + amount + date + succ + msg + ipsbillno + Currecny_type + retencodetype + attach + signature + bankbillno
//注2：当RetEncodeType=17时，摘要内容已全转成小写字符，请在验证的时将您生成的Md5摘要先转成小写后再做比较
$content = 'billno'.$billno.'currencytype'.$currency_type.'amount'.$amount.'date'.$mydate.'succ'.$succ.'ipsbillno'.$ipsbillno.'retencodetype'.$retEncodeType;
//请在该字段中放置商户登陆merchant.ips.com.cn下载的证书
$cert = $rows_pay["pay_key"];
$signature_1ocal = md5($content . $cert);
$signInfo = $content.$cert;

$sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$content',now(),'环讯','测试数据003')";
$mysqli->query($sql);

if ($signature_1ocal == $signature)
{
	//----------------------------------------------------
	//  判断交易是否成功
	//  See the successful flag of this transaction
	//----------------------------------------------------
	if ($succ == 'Y')
	{
		/**----------------------------------------------------
		*比较返回的订单号和金额与您数据库中的金额是否相符
		*compare the billno and amount from ips with the data recorded in your datebase
		*----------------------------------------------------
		
		if(不等)
			echo "从IPS返回的数据和本地记录的不符合，失败！"
			exit
		else
			'----------------------------------------------------
			'交易成功，处理您的数据库
			'The transaction is successful. update your database.
			'----------------------------------------------------
		end if
		**/

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
                    $sql	=	"update money,user_list set money.status='成功',money.update_time=now(),user_list.money=user_list.money+money.order_value,money.about='该订单在线冲值操作成功',money.sxf=money.order_value/100,money.balance=user_list.money+money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='确认'";
					$mysqli->query($sql);
                    $q1			=	$mysqli->affected_rows;
                    if($q1 != 2){
                        echo "更新用户金额失败";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'环讯','更新用户金额失败')";
                        $mysqli->query($sql);
                        exit;
                    }
                    $balance = $assets+$amount;
                    $sql  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$billno','".""."',now(),'在线冲值操作成功','$amount','$assets','$balance');";
                    $mysqli->query($sql);
                    $q3		=	$mysqli->affected_rows;
                    if($q3 != 1){
                        $sql		=	"update money,user_list set money.status='未结算',money.update_time=now(),user_list.money=user_list.money-money.order_value,money.about='该订单在线冲值操作失败',money.sxf=money.order_value/100,money.balance=user_list.money-money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='成功'";
                        $mysqli->query($sql);
                        echo "支付失败，插入金钱记录失败";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'环讯','支付失败，插入金钱记录失败')";
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


        echo "<Script language=javascript>alert('交易成功,请回首页重新登入.');window.open('".$rows_pay["f_url"]."','_top')</script>";
		echo '交易成功';
	}
	else
	{
        echo '交易失败！';
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'环讯','交易失败')";
        $mysqli->query($sql);
		exit;
	}
}
else
{
    echo '签名不正确！';
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type) values('$signInfo',now(),'环讯')";
    $mysqli->query($sql);
	exit;
}
?>
