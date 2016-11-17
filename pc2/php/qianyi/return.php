<?php
ini_set('display_errors','off');
error_reporting(E_ALL);

include 'mysqli.php';	
require_once ("config.php");
header("Content-type:text/html; charset=utf-8"); 

$returncode=$_GET["returncode"];
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
			$sql="select user_id,user_name from user_list where user_name='$p11_remark' limit 1";
			$query	=	$mysqli->query($sql);
			$rows	 =	$query->fetch_array();
			$cou	=	$query->num_rows;
			if($cou<=0){
				echo "no! no!";
				exit;
			}
			$uid	 =	$rows['uid'];
			$username=	$rows['user_name'];
		}
				
		$sql="select * from money where order_num = '".$order_no."'";
		$query	=	$mysqli->query($sql);
		$cou	=	$query->num_rows;
		if ($cou==0){
			echo "<Script language=javascript>alert('交易成功!');window.close()</script>";
			exit;
		}
		echo "success";
    }else {
		echo "fail";
	}
}else{
	echo "error";
}

?>
