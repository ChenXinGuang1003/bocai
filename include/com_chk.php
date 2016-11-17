<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
@include_once($C_Patch."/include/config.inc.php");

$uid=$_SESSION["uid"];
$userid=$_SESSION["userid"];
$group_id=$_SESSION["group_id"];
$username=$_SESSION["username"];	

if(isset($_SESSION["uid"]) && $_SESSION["uid"]!=""){
	$datetime=date('Y-m-d H:i:s',time());
	$outtime=date('Y-m-d H:i:s',time()-60*30);
	$sql = "update user_list set online=1,OnlineTime='$datetime' where Oid='$uid'";//更新在線時長
	$mysqli->query($sql);
	$sql = "update user_list set online=0,Oid='' where OnlineTime<'$outtime'";//刪除超時用戶
	$mysqli->query($sql);
	$sql = "select * from user_list where oid='$uid' and Status='正常'";
	$result	=	$mysqli->query($sql);
	$cou= $result->num_rows;
	if($cou==0){
		@include_once($C_Patch."/logout.php");
		exit;
	}
	$result->close();
}

?>
