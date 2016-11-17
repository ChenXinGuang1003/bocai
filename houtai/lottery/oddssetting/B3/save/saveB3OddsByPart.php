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
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once("../../../../common/login_check.php");


$oddsArray = $_POST["aOdds"];
$gType = $_POST["gtype"];
$rType = $_POST["MyRtype"];

$lottery_type = getZhPageTitle($gType);
$sub_type = getZhRTypeName($gType, $rType);

if(strpos($quanxian,'修改彩票赔率')){
    global $mysqli;
    $sql	=	"UPDATE odds_lottery_normal
    SET h0='$oddsArray[0]', h1='$oddsArray[1]', h2='$oddsArray[2]', h3='$oddsArray[3]',h4='$oddsArray[4]',
      h5='$oddsArray[5]', h6='$oddsArray[6]', h7='$oddsArray[7]', h8='$oddsArray[8]', h9='$oddsArray[9]',
      h10='$oddsArray[10]', h11='$oddsArray[11]', h12='$oddsArray[12]', h13='$oddsArray[13]', h14='$oddsArray[14]',
      h15='$oddsArray[15]', h16='$oddsArray[16]', h17='$oddsArray[17]', h18='$oddsArray[18]', h19='$oddsArray[19]',
      h20='$oddsArray[20]', h21='$oddsArray[21]', h22='$oddsArray[22]', h23='$oddsArray[23]', h24='$oddsArray[24]',
      h25='$oddsArray[25]', h26='$oddsArray[26]', h27='$oddsArray[27]', h28='$oddsArray[28]', h29='$oddsArray[29]',
      h30='$oddsArray[30]', h31='$oddsArray[31]', h32='$oddsArray[32]', h33='$oddsArray[33]', h34='$oddsArray[34]',
      h35='$oddsArray[35]', h36='$oddsArray[36]', h37='$oddsArray[37]', h38='$oddsArray[38]', h39='$oddsArray[39]',
      h40='$oddsArray[40]', h41='$oddsArray[41]', h42='$oddsArray[42]', h43='$oddsArray[43]', h44='$oddsArray[44]',
      h45='$oddsArray[45]', h46='$oddsArray[46]', h47='$oddsArray[47]', h48='$oddsArray[48]', h49='$oddsArray[49]'
                WHERE lottery_type='$lottery_type' AND sub_type='$sub_type' AND ball_type='part1'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败。';
        exit;
    }

    global $mysqli;
    $sql	=	"UPDATE odds_lottery_normal
    SET h0='$oddsArray[50]', h1='$oddsArray[51]', h2='$oddsArray[52]', h3='$oddsArray[53]',h4='$oddsArray[54]',
      h5='$oddsArray[55]', h6='$oddsArray[56]', h7='$oddsArray[57]', h8='$oddsArray[58]', h9='$oddsArray[59]',
      h10='$oddsArray[60]', h11='$oddsArray[61]', h12='$oddsArray[62]', h13='$oddsArray[63]', h14='$oddsArray[64]',
      h15='$oddsArray[65]', h16='$oddsArray[66]', h17='$oddsArray[67]', h18='$oddsArray[68]', h19='$oddsArray[69]',
      h20='$oddsArray[70]', h21='$oddsArray[71]', h22='$oddsArray[72]', h23='$oddsArray[73]', h24='$oddsArray[74]',
      h25='$oddsArray[75]', h26='$oddsArray[76]', h27='$oddsArray[77]', h28='$oddsArray[78]', h29='$oddsArray[79]',
      h30='$oddsArray[80]', h31='$oddsArray[81]', h32='$oddsArray[82]', h33='$oddsArray[83]', h34='$oddsArray[84]',
      h35='$oddsArray[85]', h36='$oddsArray[86]', h37='$oddsArray[87]', h38='$oddsArray[88]', h39='$oddsArray[89]',
      h40='$oddsArray[90]', h41='$oddsArray[91]', h42='$oddsArray[92]', h43='$oddsArray[93]', h44='$oddsArray[94]',
      h45='$oddsArray[95]', h46='$oddsArray[96]', h47='$oddsArray[97]', h48='$oddsArray[98]', h49='$oddsArray[99]'
                WHERE lottery_type='$lottery_type' AND sub_type='$sub_type' AND ball_type='part2'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败。';
        exit;
    }

    echo '保存成功';
}