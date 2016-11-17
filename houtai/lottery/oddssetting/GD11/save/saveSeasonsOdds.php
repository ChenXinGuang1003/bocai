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
include_once("../../../../common/login_check.php");

$ball_1 = $_POST["ball_1"];
$ball_2 = $_POST["ball_2"];
$ball_3 = $_POST["ball_3"];

if(strpos($quanxian,'修改彩票赔率')){
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_1[0]', h2='$ball_1[1]', h3='$ball_1[2]'
                WHERE lottery_type='广东十一选五' AND sub_type='顺子杂六' AND ball_type='ball_1'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,前三球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_2[0]', h2='$ball_2[1]', h3='$ball_2[2]'
                WHERE lottery_type='广东十一选五' AND sub_type='顺子杂六' AND ball_type='ball_2'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,中三球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_3[0]', h2='$ball_3[1]', h3='$ball_3[2]'
                WHERE lottery_type='广东十一选五' AND sub_type='顺子杂六' AND ball_type='ball_3'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,后三球。';
        exit;
    }

    echo '保存成功';
}