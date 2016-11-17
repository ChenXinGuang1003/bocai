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
include_once("../common/login_check.php");
include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/include/newpage.php");

$page	=	$_GET["page"];
$go		=	$_GET["go"];
$arr	=	$_POST['uid'];
$uid	=	'';
$i		=	0; //会员个数
foreach($arr as $k=>$v){
	$uid .= $v.',';
	$i++;
}
$uid	=	rtrim($uid,',');

if($go == 1){ //停用
	$sql = "UPDATE agents_list set status='停用',remark=concat_ws('，',remark,'管理员：".$_SESSION['login_name']." 停用此账户') where id in ($uid) and status='正常'";
}else if($go == 0){ //启用
	$sql = "UPDATE agents_list set status='正常' where id in ($uid) and (status='停用' or status='异常')";
}
$mysqli->query($sql);
$msg	=	'操作成功！';
message($msg,'list.php?page='.$page);
?>