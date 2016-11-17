<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");//后台登陆验证
$uid=$_SESSION["adminid"];
$session_str=$_SESSION["ssid"];
$quanxian=$_SESSION["purview"];

if(!isset($session_str)){
	echo "<script  charset=\"utf-8\" language=\"javascript\" type=\"text/javascript\">alert(\"请重新登录!\");</script>";
	echo "<script>window.parent.location.href='/'</script>";
	exit();
}else{
	$C_Patch=$_SERVER['DOCUMENT_ROOT'];

	@include_once($C_Patch."/app/member/include/address.mem.php");

	@include_once($C_Patch."/app/member/include/config.inc.php");

	$sql = "select * from sys_manage_online where session_str='$session_str'";
	$result	=	$mysqli->query($sql);
	$cou= $result->num_rows;
	if($cou==0){
		unset($_SESSION["adminid"]);
		unset($_SESSION["ssid"]);
		unset($_SESSION["purview"]);
		unset($_SESSION["login_name"]);
		unset($_SESSION["login_time"]);
		echo "<script  charset=\"utf-8\" language=\"javascript\" type=\"text/javascript\">alert(\"您已离线,请重新登录!\");</script>";
		echo "<script>window.parent.location.href='/'</script>";
		exit();
	}


	$datetime=date('Y-m-d H:i:s',time());
	$outtime=date('Y-m-d H:i:s',time()-60);
	$sql = "update sys_manage_online set onlinetime='$datetime' where session_str='$session_str'";//更新在線時長
	$mysqli->query($sql);
	$sql = "delete from sys_manage_online where onlinetime<'$outtime'";//刪除超時用戶
	
	$mysqli->query($sql);
}



function check_quanxian($qx){
	
	$quanxian=$_SESSION["purview"];
	if(!strpos($quanxian,$qx)){

		$C_Patch=$_SERVER['DOCUMENT_ROOT'];
		include_once($C_Patch."/app/member/include/address.mem.php");

		include_once($C_Patch."/app/member/include/config.inc.php");

		include_once($C_Patch."/app/member/common/function.php");

		include_once($C_Patch."/app/member/ip.php");

		include_once("../class/admin.php");
		
		$ClientSity	=	iconv("GB2312","UTF-8",convertip(get_ip(),'../'));   //取出客户端IP所在城市
		admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$ClientSity,"越权操作失败[".$qx."]",$_SESSION["ssid"],"",$bj_time_now);
		unset($_SESSION["adminid"]);
		unset($_SESSION["ssid"]);
		unset($_SESSION["purview"]);
		unset($_SESSION["login_name"]);
		unset($_SESSION["login_time"]);
		message('越权操作!');
		exit();
	}
}

function wtype($tp){
	switch($tp){
		case "R":      ////讓球
		$arr = array("match_ho","match_ao");
		break;
				
		case "OU":      ////大小  滾球大小
		$arr = array('match_dxdpl','match_dxxpl');
		break;
		
		case "ROU":      ////滾球大小
		$arr = array('match_dxdpl','match_dxxpl');
		break;
		
		case "PD":      ////波膽
		$arr = array("match_bd10","match_bd20","match_bd21","match_bd30","match_bd31","match_bd32","match_bd40","match_bd41","match_bd42","match_bd43","match_bdg10","match_bdg20","match_bdg21","match_bdg30","match_bdg31","match_bdg32","match_bdg40","match_bdg41","match_bdg42","match_bdg43","match_bd00","match_bd11","match_bd22","match_bd33","match_bd44","match_bdup5");
		break;
		
		case "T":      ////入球
		$arr = array("match_total01pl","match_total23pl","match_total46pl","match_total7uppl");
		break;
		
		case "M":      ////獨贏
		$arr = array("match_bzm","match_bzg","match_bzh");
		break;
		
		case "F":      ////半全場
		$arr = array("match_bqmm","match_bqmh","match_bqmg","match_bqhm","match_bqhh","match_bqhg","match_bqgm","match_bqgh","match_bqgg");
		break;
		
		case "HR":      ////上半場讓球(分) 上半滾球讓球(分)
		$arr = array("match_bho","match_bao");
		break;
		
		case "HRE":      ////上半場讓球(分) 上半滾球讓球(分)
		$arr = array("match_bho","match_bao");
		break;
		
		case "HOU":      ////上半場大小   上半滾球大小
		$arr = array("match_bdpl","match_bxpl");
		break;
		
		case "HROU":      ////上半場大小   上半滾球大小
		$arr = array("match_bdpl","match_bxpl");
		break;
		
		case "HM":      ////上半場獨贏
		$arr = array("match_bmdy","match_bgdy","match_bhdy");
		break;
		
		case "HPD":      ////上半波膽
		$arr = array("match_hr_bd10","match_hr_bd20","match_hr_bd21","match_hr_bd30","match_hr_bd31","match_hr_bd32","match_hr_bd40","match_hr_bd41","match_hr_bd42","match_hr_bd43","match_hr_bdg10","match_hr_bdg20","match_hr_bdg21","match_hr_bdg30","match_hr_bdg31","match_hr_bdg32","match_hr_bdg40","match_hr_bdg41","match_hr_bdg42","match_hr_bdg43","match_hr_bd00","match_hr_bd11","match_hr_bd22","match_hr_bd33","match_hr_bd44","match_hr_bdup5");
		break;
		
		default:
		$arr = array("");
		
	}
	return $arr;
}


/**
*写文件函数
**/
function write_file($filename,$data,$method="rb+",$iflock=1){
	@touch($filename);
	$handle=@fopen($filename,$method);
	if($iflock){
		@flock($handle,LOCK_EX);
	}
	@fputs($handle,$data);
	if($method=="rb+") @ftruncate($handle,strlen($data));
	@fclose($handle);
	@chmod($filename,0777);	
	if( is_writable($filename) ){
		return true;
	}else{
		return false;
	}
}


?>