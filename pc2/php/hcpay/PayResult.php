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
if($rows_pay["pay_type"]!=9){
    echo "支付失败，请联系管理员";
    $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'汇潮','类型不对')";
    $mysqli->query($sql);
    exit;
}
		//MD5私钥
	$MD5key = $rows_pay["pay_key"];

	//订单号
	$BillNo = $_POST["BillNo"];
	//金额
	$Amount = $_POST["Amount"];
	//支付状态
	$Succeed = $_POST["Succeed"];
	//支付结果
	$Result = $_POST["Result"];
	//取得的MD5校验信息
	$MD5info = $_POST["SignMD5info"];
	//备注
	$Remark = $_POST["Remark"];



	//校验源字符串
    $md5src = $BillNo."&".$Amount."&".$Succeed."&".$MD5key;
  //MD5检验结果
	$md5sign = strtoupper(md5($md5src));
	
?>
<html>
<head>
<title>php</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<!-- 请加上你们网站的框架。就是你们网站的头部top，左部left等。还有字体等你们都要做调整。 -->

 <?

 $arr = explode("_",$BillNo);
  $Remark=$arr[0];
 //$fp=fopen('pay.log',"a+");
//date_default_timezone_set('PRC');
//fwrite($fp,date("Y-m-d H:i:s").$uname."|".$BillNo."|".$MD5info."|".$md5sign."|".$Succeed."|".$Remark.PHP_EOL);
//fclose($fp);

 if ($MD5info==$md5sign){
	 if($Succeed=="88" && $Remark!="")
	 {
         $sql="select user_id,user_name,money from user_list where user_name='$Remark' limit 1";
         $query	=	$mysqli->query($sql);
         $rows	 =	$query->fetch_array();
         $cou	=	$query->num_rows;
         if($cou<=0){
             echo "返回信息错误!";
             $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'汇潮','返回信息错误')";
             $mysqli->query($sql);
             exit;
         }
         $assets	 =	$rows['money'];
         $uid	 =	$rows['user_id'];
         $username=	$rows['user_name'];

                 $sql="select count(*) as s from money where order_num = '".$BillNo."'";
                 $query	=	$mysqli->query($sql);
                 $cou	 =	$query->fetch_array();

				if ($cou['s']==0){
                    $sql		=	"insert into money(user_id,order_value,order_num,status,assets,balance) values($uid,$Amount,'$BillNo','确认',$assets,$assets)";
                    $mysqli->query($sql);
                    $m_id = $mysqli->insert_id;
                    $sql	=	"update money,user_list set money.status='成功',money.update_time=now(),user_list.money=user_list.money+money.order_value,money.about='该订单在线冲值操作成功',money.sxf=money.order_value/100,money.balance=user_list.money+money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='确认'";
                    $mysqli->query($sql);
                    $q1			=	$mysqli->affected_rows;
                    if($q1 != 2){
                        echo "更新用户金额失败";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'汇潮','更新用户金额失败')";
                        $mysqli->query($sql);
                        exit;
                    }
                    $balance = $assets+$Amount;
                    $sql  =   "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$BillNo','".""."',now(),'在线冲值操作成功','$Amount','$assets','$balance');";
                    $mysqli->query($sql);
                    $q3		=	$mysqli->affected_rows;
                    if($q3 != 1){
                        $sql		=	"update money,user_list set money.status='未结算',money.update_time=now(),user_list.money=user_list.money-money.order_value,money.about='该订单在线冲值操作失败',money.sxf=money.order_value/100,money.balance=user_list.money-money.order_value where money.user_id=user_list.user_id and money.id=$m_id and money.`status`='成功'";
                        $mysqli->query($sql);
                        echo "支付失败，插入金钱记录失败";
                        $sql = "insert into pay_error_log (sign_info,update_time,pay_type,error_type) values('--',now(),'汇潮','支付失败，插入金钱记录失败')";
                        $mysqli->query($sql);
                        exit;
                    }
                    $sql = "DROP TRIGGER BeforeUpdatePayset;";
                    $mysqli->query($sql);
                    $mysqli->query("update pay_set set money_Already=money_Already+".$Amount." where id='".$rows_pay["id"]."'");
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
 
 }
else
{
?>
 <!-- MD5验证失败 -->
<table width="728" border="0" cellspacing="0" cellpadding="0" align="center">
 <tr>
    <td  align="center" valign="top" style="color:red;">Validation failed!</td>
	</tr>
	</table>

<? }?>
<p align="center"><a href="#" onClick="javascript:window.close()"><font size=2 color=blove>Close</font></a></p>
</body>
</html>
