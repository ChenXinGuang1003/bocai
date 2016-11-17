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

$ball_8 = $_POST["ball_8"];

if(strpos($quanxian,'修改彩票赔率')){
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_8[0]', h2='$ball_8[1]', h3='$ball_8[2]', h4='$ball_8[3]',h5='$ball_8[4]',
      h6='$ball_8[5]', h7='$ball_8[6]', h8='$ball_8[7]', h9='$ball_8[8]', h10='$ball_8[9]',
      h11='$ball_8[10]', h12='$ball_8[11]', h13='$ball_8[12]', h14='$ball_8[13]', h15='$ball_8[14]',
      h16='$ball_8[15]', h17='$ball_8[16]', h18='$ball_8[17]', h19='$ball_8[18]', h20='$ball_8[19]',
      h21='$ball_8[20]', h22='$ball_8[21]', h23='$ball_8[22]', h24='$ball_8[23]', h25='$ball_8[24]',
      h26='$ball_8[25]', h27='$ball_8[26]', h28='$ball_8[27]'
                WHERE lottery_type='天津十分彩' AND sub_type='正码和特别号' AND ball_type='ball_8'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败。';
        exit;
    }

    echo '保存成功';
}