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
$orderid=$_REQUEST["orderid"];
$opstate=$_REQUEST["opstate"];
$ovalue=$_REQUEST["ovalue"];
$sign=$_REQUEST["sign"];
$reply=$_REQUEST["reply"];//1����첽���͡�2���ͬ������
$textmsg=$_REQUEST["textmsg"];// �Զ��巵�ز���

$sql_pay="select * from pay_set where b_start=1 limit 1";
$query_pay	=	$mysqli->query($sql_pay);

$rows_pay	=	$query_pay->fetch_array();
if($rows_pay["pay_type"]!=4){
    echo "支付失败，请联系管理员";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'捷付通','类型不对')";
    $mysqli->query($sql);
    exit;
}

$preEncodeStr="orderid=".$orderid."&opstate=".$opstate."&ovalue=".$ovalue;

$P_PostKey=md5($preEncodeStr.$rows_pay["pay_key"]);
$signInfo = $preEncodeStr.$rows_pay["pay_key"];

if($sign==$P_PostKey)
{
	if($opstate=="0") //֧���ɹ�
	{
		if($reply=="1" || $reply=="2")
		{
			//echo "opstate=0";
			$sql="select user_id,user_name,money from user_list where user_name='$textmsg' limit 1";
			$query	=	$mysqli->query($sql);
			$rows	 =	$query->fetch_array();
			$cou	=	$query->num_rows;
			if($cou<=0){
				echo "返回信息错误!";
                $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'聚付通','返回信息错误')";
                $mysqli->query($sql);
				exit;
			}
			$assets	 =	$rows['money'];
			$uid	 =	$rows['user_id'];
			$username=	$rows['user_name'];
				$sql="select * from money where order_num = '".$orderid."'";
				$query	=	$mysqli->query($sql);
				$cou	=	$query->num_rows;
				if ($cou==0){
                    $sql		=	"insert into money(user_id,order_value,order_num,status,assets,balance) values($uid,$ovalue,'$orderid','确认',$assets,$assets)";
					$mysqli->query($sql);
					$m_id = $mysqli->insert_id;
                    $sql	=	"update money,user_list set money.status='成功',money.update_time=now(),user_list.money=user_list.money+money.order_value,money.about='该订单在线冲值操作成功',money.sxf=money.order_value/100,money.balance=user_list.money+money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='确认'";
					$mysqli->query($sql);
                    $q1			=	$mysqli->affected_rows;
                    if($q1 != 2){
                        echo "更新用户金额失败";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'聚付通','更新用户金额失败')";
                        $mysqli->query($sql);
                        exit;
                    }
                    $balance = $assets+$ovalue;
                    $sql  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$orderid','".""."',now(),'在线冲值操作成功','$ovalue','$assets','$balance');";
                    $mysqli->query($sql);
                    $q3		=	$mysqli->affected_rows;
                    if($q3 != 1){
                        $sql		=	"update money,user_list set money.status='未结算',money.update_time=now(),user_list.money=user_list.money-money.order_value,money.about='该订单在线冲值操作失败',money.sxf=money.order_value/100,money.balance=user_list.money-money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='成功'";
                        $mysqli->query($sql);
                        echo "支付失败，插入金钱记录失败";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'聚付通','支付失败，插入金钱记录失败')";
                        $mysqli->query($sql);
                        exit;
                    }

                    $sql = "DROP TRIGGER BeforeUpdatePayset;";
                    $mysqli->query($sql);
					$mysqli->query("update pay_set set money_Already=money_Already+".$ovalue." where id='".$rows_pay["id"]."'");
                    $sql = "   CREATE TRIGGER `BeforeUpdatePayset` BEFORE update ON `pay_set`
                              FOR EACH ROW BEGIN
                                insert into pay_set(id) values (old.id);
                              END;
                        ";
                    $mysqli->query($sql);
					

				}
				echo "<Script language=javascript>alert('交易成功,请回首页重新登入.');window.open('".$rows_pay["f_url"]."','_top')</script>";
	}
	else if($opstate=="-1")
	{
		//֧��ʧ��
        echo "请求参数错误";
        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('$signInfo',now(),'聚付通','请求参数错误')";
        $mysqli->query($sql);
	}
}
else
{
    echo "签名错误";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type) values('$signInfo',now(),'聚付通')";
    $mysqli->query($sql);
}
}
?>