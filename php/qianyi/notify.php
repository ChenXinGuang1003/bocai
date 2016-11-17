<?php
ini_set('display_errors','on');

require_once ("mysqli.php");	
require_once ("config.php");
header("Content-type:text/html; charset=utf-8"); 

$returncode=$_GET["returncode"];
$userid=$_GET["userid"];
$orderid=$_GET["orderid"];
$money=$_GET["money"];
$sign=$_GET["sign"];
$ext=$_GET["ext"];

$md5src = "returncode=".$returncode."&userid=".$p1_usercode."&orderid=".$orderid."&money=".$money."&keyvalue=".$CompKey;
$md5sign = md5($md5src);


if ($returncode=="1"){

	if ($sign==$md5sign){
		$p11_remark=$ext;
		$order_no=$orderid;
		$order_amount=$money;
		if ($p11_remark==""){
			echo "no!";
			exit;
		}else{
			$sql="select user_id,user_name,money from user_list where user_name='$p11_remark' limit 1";
			
			$query	=	$mysqli->query($sql);
			$rows	 =	$query->fetch_array();
			$cou	=	$query->num_rows;
			
			if($cou<=0){
				echo "no! no!";
				exit;
			}
			$uid	 =	$rows['user_id'];
			$username=	$rows['user_name'];
			$assets = $rows['money'];
		}
				
		$sql="select * from money where order_num = '".$order_no."' and status = '成功'";
		$query	=	$mysqli->query($sql);
		$cou	=	$query->num_rows;
		if ($cou==0){
			$sql = "insert into money (user_id,order_value,order_num,status,about,pay_name,assets,update_time) values('$uid','$order_amount','$order_no','等待','在线充值','仟易充值','$assets',now())";
			echo $sql;
			$mysqli->query($sql);
			$m_id = $mysqli->insert_id;
			$sql	=	"update money set status='成功',balance = '$assets' +'$order_amount' where order_num = '$order_no'";
			echo $sql;
			$mysqli->query($sql);
			$sql	=	"update user_list set money = money + $order_amount where user_name = '$username'";
			$mysqli->query($sql);
		}
		echo "success";
    }else {
		echo "fail";
	}
}else{
	echo "error";
}

?>
