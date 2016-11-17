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

$ball_5 = $_POST["ball_5"];

if(strpos($quanxian,'修改彩票赔率')){
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_5[0]', h2='$ball_5[1]', h3='$ball_5[2]', h4='$ball_5[3]',h5='$ball_5[4]',
      h6='$ball_5[5]', h7='$ball_5[6]', h8='$ball_5[7]', h9='$ball_5[8]', h10='$ball_5[9]',
      h11='$ball_5[10]', h12='$ball_5[11]', h13='$ball_5[12]', h14='$ball_5[13]', h15='$ball_5[14]',
      h16='$ball_5[15]', h17='$ball_5[16]', h18='$ball_5[17]', h19='$ball_5[18]', h20='$ball_5[19]',
      h21='$ball_5[20]', h22='$ball_5[21]', h23='$ball_5[22]', h24='$ball_5[23]', h25='$ball_5[24]',
      h26='$ball_5[25]', h27='$ball_5[26]', h28='$ball_5[27]', h29='$ball_5[28]', h30='$ball_5[29]',
      h31='$ball_5[30]', h32='$ball_5[31]', h33='$ball_5[32]', h34='$ball_5[33]', h35='$ball_5[34]',
      h36='$ball_5[35]'
                WHERE lottery_type='广西十分彩' AND sub_type='正码和特别号' AND ball_type='ball_5'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败。';
        exit;
    }

    echo '保存成功';
}