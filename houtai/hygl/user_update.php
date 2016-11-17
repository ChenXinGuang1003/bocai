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

include_once("../class/admin.php");
include_once("../common/login_check.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

check_quanxian("修改会员");

$ask			=	$_POST["ask"];
$why			=	$_POST["why"];
$answer			=	$_POST["answer"];
$birthday		=	$_POST["birthday"];
$mobile			=	$_POST["mobile"];
$email			=	$_POST["email"];
$pay_name		=	$_POST["pay_name"];
$pay_bank		=	$_POST["pay_card"];
$pay_address	=	$_POST["pay_address"];
$pay_num		=	$_POST["pay_num"];
$hf_pay_num		=	$_POST["hf_pay_num"];
$username		=	$_POST["hf_username"];
$gid			=	$_POST["gid"];
$uid			=	$_POST["uid"];
$QQ				=	$_POST["QQ"];
$live_user_name		    =	$_POST["live_username"];
$live_password			=	$_POST["live_password"];
$live_user_name_tyc		    =	$_POST["live_username_tyc"];
$live_password_tyc			=	$_POST["live_password_tyc"];
$oddlists			    =	$_POST["oddlists"];
//$sql			=	"update k_user set ask='$ask' , answer='$answer' , birthday='$birthday' , mobile='$mobile' , email='$email' , pay_name='$pay_name' , pay_bank='pay_bank' , pay_address='$pay_address' , pay_num='$pay_num',gid='$gid',why='$why',qq='$QQ' where uid=$uid";
$sql			=	"update user_list set ask='$ask' , answer='$answer' , birthday='$birthday' , tel='$mobile' , email='$email' , group_id='$gid',remark='$why',qq='$QQ', pay_name='$pay_name' , pay_bank='$pay_bank' , pay_address='$pay_address' , pay_num='$pay_num' where user_id=$uid";
$result = $mysqli->query($sql);
if($result){
    include_once("../class/admin.php");
    admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],"管理员：".$_SESSION["login_name"]."，修改了会员：".$_POST['hf_username']." 的资料",$_SESSION["ssid"],"",$bj_time_now);

    if($pay_num != $hf_pay_num){ //更新了会员银行卡号
        $sql	=	"insert into history_bank (uid,username,pay_card,pay_num,pay_address,pay_name) values ($uid,'$username','$pay_bank','$pay_num','$pay_address','$pay_name')";
        $mysqli->query($sql);
    }

    if($live_user_name){
        $sql			=	"update live_user set live_username='$live_user_name' , live_password='$live_password' , oddlists='$oddlists' where user_id='$uid' and live_type='AG'";
        $mysqli->query($sql);
    }
    if($live_user_name_tyc){
        $sql			=	"update live_user set live_username='$live_user_name_tyc' , live_password='$live_password_tyc' where user_id='$uid' and live_type='TYC'";
        $mysqli->query($sql);
    }

    message('资料已经修改成功!');
}else{
    message('对不起，资料修改失败!');
}