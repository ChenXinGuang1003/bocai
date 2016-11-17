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
include_once("../../common/login_check.php");

$config = $_POST["config"];
$group_id = $_POST["group_id"];

if(strpos($quanxian,'修改彩票赔率')){
    global $mysqli;
    $sql	=	"UPDATE user_group
    SET cq_lower_bet='$config[0]', cq_bet='$config[1]', cq_bet_reb='$config[2]',
      jx_lower_bet='$config[3]', jx_bet='$config[4]', jx_bet_reb='$config[5]',
      tj_lower_bet='$config[6]', tj_bet='$config[7]', tj_bet_reb='$config[8]',
      gdsf_lower_bet='$config[9]', gdsf_bet='$config[10]', gdsf_bet_reb='$config[11]',
      gxsf_lower_bet='$config[12]', gxsf_bet='$config[13]',gxsf_bet_reb='$config[14]',
      tjsf_lower_bet='$config[15]', tjsf_bet='$config[16]', tjsf_bet_reb='$config[17]',
      bjpk_lower_bet='$config[18]', bjpk_bet='$config[19]', bjpk_bet_reb='$config[20]',
      bjkn_lower_bet='$config[21]', bjkn_bet='$config[22]', bjkn_bet_reb='$config[23]',
      gd11_lower_bet='$config[24]', gd11_bet='$config[25]', gd11_bet_reb='$config[26]',
      t3_lower_bet='$config[27]', t3_bet='$config[28]', t3_bet_reb='$config[29]',
      d3_lower_bet='$config[30]', d3_bet='$config[31]', d3_bet_reb='$config[32]',
      p3_lower_bet='$config[33]', p3_bet='$config[34]', p3_bet_reb='$config[35]',
      lhc_lower_bet='$config[36]', lhc_bet='$config[37]', lhc_bet_reb='$config[38]',

      cq_max_bet='$config[39]', jx_max_bet='$config[40]', tj_max_bet='$config[41]',
      gdsf_max_bet='$config[42]', gxsf_max_bet='$config[43]', tjsf_max_bet='$config[44]',
      bjpk_max_bet='$config[45]', bjkn_max_bet='$config[46]', gd11_max_bet='$config[47]',
      t3_max_bet='$config[48]', d3_max_bet='$config[49]', p3_max_bet='$config[50]',
      lhc_max_bet='$config[51]',cqsf_lower_bet='$config[52]', cqsf_max_bet='$config[53]',
      cqsf_bet='$config[54]', cqsf_bet_reb='$config[55]', sports_lower_bet='$config[56]',
      sports_bet='$config[57]', sports_bet_reb='$config[58]'
                WHERE group_id='$group_id'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败。';
        exit;
    }

    echo '保存成功';
}