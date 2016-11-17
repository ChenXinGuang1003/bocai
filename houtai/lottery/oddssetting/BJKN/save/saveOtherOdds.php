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

if(strpos($quanxian,'修改彩票赔率')){
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_1[0]', h2='$ball_1[1]', h3='$ball_1[2]', h4='$ball_1[3]',h5='$ball_1[4]',
      h6='$ball_1[5]', h7='$ball_1[6]', h8='$ball_1[7]', h9='$ball_1[8]', h10='$ball_1[9]',
      h11='$ball_1[10]', h12='$ball_1[11]', h13='$ball_1[12]', h14='$ball_1[13]',h15='$ball_1[14]',
      h16='$ball_1[15]', h17='$ball_1[16]', h18='$ball_1[17]', h19='$ball_1[18]', h20='$ball_1[19]'
                WHERE lottery_type='北京快乐8' AND sub_type='其他' AND ball_type='ball_1'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败。';
        exit;
    }

    echo '保存成功';
}