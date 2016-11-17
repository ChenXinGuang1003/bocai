<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/utils/login_check.php");
include_once($C_Patch."/app/member/class/user.php");

$uid	=	$_SESSION["userid"];

if($_GET["into"]){
	$yzm=	strtolower($_POST["vlcodes"]);
	if($yzm!=$_SESSION["randcode"]){
        echo "验证码错误，请重新输入。";
        exit;
	}else{
		$_SESSION["randcode"]	=	rand(10000,99999); //更换一下验证码
		
		$sql	 =	"select money from user_list where user_id='$uid' limit 0,1"; //取汇款前会员余额
		$query	 =	$mysqli->query($sql);
		$rows	 =	$query->fetch_array();
		$assets	 =	$rows['money'];
		
		$money	 =	htmlEncode($_POST["v_amount"]);
		$bank	 =	htmlEncode($_POST["IntoBank"]);
		$date	 =	htmlEncode($_POST["cn_date"]);
		$date1	 =	$date." ".$_POST["s_h"].":".$_POST["s_i"].":".$_POST["s_s"];
		$manner	 =	htmlEncode($_POST["InType"]);
		$address =	htmlEncode($_POST["v_site"]);
        $balance = $assets + $money;
		
		if($manner == "网银转账"){
			$manner .=	"<br />持卡人姓名：".htmlEncode($_POST["v_Name"]);
		}else{
			$manner .=	"持卡人姓名：".htmlEncode($_POST["v_Name"]);
		}
		if($manner == "0"){
			$manner	=	htmlEncode($_POST["IntoType"]);
		}
		
		$sql		=	"Insert Into `money` (order_value,pay_card,date,manner,pay_address,update_time,status,user_id,order_num,assets,balance,type) values ($money,'$bank','$date1','$manner','$address',now(),'未结算','".$uid."','".date("YmdHis").'_'.$_SESSION['username']."',$assets,$balance,'银行汇款')";
        $mysqli->query($sql);
        $q1			=	$mysqli->affected_rows;
        if($q1 != 1){
            echo "对不起，由于网络堵塞原因。\\n您提交的汇款信息失败，请您重新提交。";
            exit;
        }else{
            echo "chakan_huikuan";
            exit;
        }

		$mysqli->autocommit(FALSE);
		$mysqli->query("BEGIN"); //事务开始
		try{
			$mysqli->query($sql);
			$q1		=	$mysqli->affected_rows;
			if($q1 == 1){
				$mysqli->commit(); //事务提交
				message("恭喜您，汇款信息提交成功。\\n我们将近快审核，谢谢您对".$web_site['web_name']."的支持。","user/cha_huikuan.php?s_time=".$date."&e_time=".$date);
			}else{
				$mysqli->rollback(); //数据回滚
				message("对不起，由于网络堵塞原因。\\n您提交的汇款信息失败，请您重新提交。");
			}
		}catch(Exception $e){
			$mysqli->rollback(); //数据回滚
			message("对不起，由于网络堵塞原因。\\n您提交的汇款信息失败，请您重新提交。");
		}
	}
}