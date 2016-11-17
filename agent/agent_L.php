<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");

include_once($C_Patch."/app/member/include/config.inc.php");

include_once($C_Patch."/app/member/common/function.php");

include_once($C_Patch."/app/member/ip.php");

$yzm		=	@$_POST["C"];

if($yzm	!=	$_SESSION["randcode"]){
	message('验证码错误');
}

$username	=	@$_POST["A"];
$password	=	@$_POST["B"];

include_once("class/admin.php");

$arr	=	array();
$sql	=	"select id,agents_name from agents_list where agents_name='$username' and agents_pass='".md5($password)."' limit 1";
$query	=	$mysqli->query($sql);
$t		=	$query->fetch_array();
if($t["id"] && $t["id"]>0){
    $id = $t["id"];
    $sql="update `agents_list` set logintime=now(),loginip='".BROWSER_IP."',lognum=lognum+1 where id='$id'";
    $mysqli->query($sql);
    $_SESSION["agent_id"] = $t["id"];
    $_SESSION["agents_name"] = $t["agents_name"];
    header('Content-Type: text/html; charset=utf-8');
    echo "<script>location.href='agent_index.php';</script>";
    exit();
}else{
    message('用户名或密码错误');
}