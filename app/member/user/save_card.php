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
include_once($C_Patch."/app/member/class/user.php");

//设置银行卡信息
if($_GET["action"]=="save"){

    $yzm	=	strtolower($_POST["vlcodes"]);
    if($yzm!=$_SESSION["randcode"]){
        echo "验证码错误,请重新输入";
        exit;
    }
    $_SESSION["randcode"]	=	rand(10000,99999); //更换一下验证码

    $rs		=	user::get_paycard($_SESSION["userid"]);
    if($rs['qk_pass'] != md5($_POST["qk_pwd"])){
        echo "取款密码错误,请重新输入";
        exit;
    }
    $address=	htmlEncode($_POST["add1"]).htmlEncode($_POST["add2"]).htmlEncode($_POST["add3"]);
    if(user::update_paycard($_SESSION["userid"],htmlEncode($_POST["pay_card"]),htmlEncode($_POST["pay_num"]),$address,$rs['pay_name'],$_SESSION["username"])){
        echo "save_card_success";
    }else{
        message('设置出错，请重新设置你的银行卡信息','/app/member/user/set_card.php');
    }
}else{
    echo "2";
}