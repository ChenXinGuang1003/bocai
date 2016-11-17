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

check_quanxian("删除代理");

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
if($go == 6){ //delete
    $sql = "delete from agents_list where id in ($uid)";
    $mysqli->query($sql);

    $sql = "delete from agents_money_log where agents_id in ($uid)";
    $mysqli->query($sql);

    $sql = "update user_list set top_id='' where top_id in ($uid)";
    $mysqli->query($sql);

    $msg	=	'操作成功！';
}

message($msg,'list.php?page='.$page);
?>