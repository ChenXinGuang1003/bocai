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
$ball_4 = $_POST["ball_4"];
$ball_5 = $_POST["ball_5"];

if(strpos($quanxian,'修改彩票赔率')){
    global $mysqli;
    $sql	=	"UPDATE odds_lottery SET h1='$ball_1[0]', h2='$ball_1[1]', h3='$ball_1[2]', h4='$ball_1[3]',
                                          h5='$ball_1[4]', h6='$ball_1[5]', h7='$ball_1[6]', h8='$ball_1[7]'
                WHERE lottery_type='广西十分彩' AND sub_type='主盘势' AND ball_type='ball_1'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第一球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery SET h1='$ball_2[0]', h2='$ball_2[1]', h3='$ball_2[2]', h4='$ball_2[3]',
                                          h5='$ball_2[4]', h6='$ball_2[5]', h7='$ball_2[6]', h8='$ball_2[7]'
                WHERE lottery_type='广西十分彩' AND sub_type='主盘势' AND ball_type='ball_2'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第二球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery SET h1='$ball_3[0]', h2='$ball_3[1]', h3='$ball_3[2]', h4='$ball_3[3]',
                                          h5='$ball_3[4]', h6='$ball_3[5]', h7='$ball_3[6]', h8='$ball_3[7]'
                WHERE lottery_type='广西十分彩' AND sub_type='主盘势' AND ball_type='ball_3'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第三球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery SET h1='$ball_4[0]', h2='$ball_4[1]', h3='$ball_4[2]', h4='$ball_4[3]',
                                          h5='$ball_4[4]', h6='$ball_4[5]', h7='$ball_4[6]', h8='$ball_4[7]'
                WHERE lottery_type='广西十分彩' AND sub_type='主盘势' AND ball_type='ball_4'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第四球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery SET h1='$ball_5[0]', h2='$ball_5[1]', h3='$ball_5[2]', h4='$ball_5[3]',
                                          h5='$ball_5[4]', h6='$ball_5[5]', h7='$ball_5[6]', h8='$ball_5[7]'
                WHERE lottery_type='广西十分彩' AND sub_type='主盘势' AND ball_type='ball_5'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,特别号。';
        exit;
    }
    echo '保存成功';
}