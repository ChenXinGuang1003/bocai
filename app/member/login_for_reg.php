<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/app/member/ip.php");
include_once($C_Patch."/app/member/city.php");
include_once($C_Patch."/app/member/common/log.php");


if(@$_POST["action"]=="login"){

    $uid	=	user::login_reg($_POST["username"],$_POST["password"]);
	$mysqli->close();
	
    if(!$uid){
		echo '2'; //用户名称或密码错误
		exit;
	}
	echo '5'; //成功
	exit;
}
exit;