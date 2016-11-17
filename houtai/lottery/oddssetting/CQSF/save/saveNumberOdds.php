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
$ball_6 = $_POST["ball_6"];
$ball_7 = $_POST["ball_7"];
$ball_8 = $_POST["ball_8"];

if(strpos($quanxian,'修改彩票赔率')){
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_1[0]', h2='$ball_1[1]', h3='$ball_1[2]', h4='$ball_1[3]',h5='$ball_1[4]',
      h6='$ball_1[5]', h7='$ball_1[6]', h8='$ball_1[7]', h9='$ball_1[8]', h10='$ball_1[9]',
      h11='$ball_1[10]', h12='$ball_1[11]', h13='$ball_1[12]', h14='$ball_1[13]', h15='$ball_1[14]',
      h16='$ball_1[15]', h17='$ball_1[16]', h18='$ball_1[17]', h19='$ball_1[18]', h20='$ball_1[19]',
      h21='$ball_1[20]', h22='$ball_1[21]', h23='$ball_1[22]', h24='$ball_1[23]', h25='$ball_1[24]',
      h26='$ball_1[25]', h27='$ball_1[26]', h28='$ball_1[27]'
                WHERE lottery_type='重庆十分彩' AND sub_type='正码和特别号' AND ball_type='ball_1'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第一球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_2[0]', h2='$ball_2[1]', h3='$ball_2[2]', h4='$ball_2[3]',h5='$ball_2[4]',
      h6='$ball_2[5]', h7='$ball_2[6]', h8='$ball_2[7]', h9='$ball_2[8]', h10='$ball_2[9]',
      h11='$ball_2[10]', h12='$ball_2[11]', h13='$ball_2[12]', h14='$ball_2[13]', h15='$ball_2[14]',
      h16='$ball_2[15]', h17='$ball_2[16]', h18='$ball_2[17]', h19='$ball_2[18]', h20='$ball_2[19]',
      h21='$ball_2[20]', h22='$ball_2[21]', h23='$ball_2[22]', h24='$ball_2[23]', h25='$ball_2[24]',
      h26='$ball_2[25]', h27='$ball_2[26]', h28='$ball_2[27]'
                WHERE lottery_type='重庆十分彩' AND sub_type='正码和特别号' AND ball_type='ball_2'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第二球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_3[0]', h2='$ball_3[1]', h3='$ball_3[2]', h4='$ball_3[3]',h5='$ball_3[4]',
      h6='$ball_3[5]', h7='$ball_3[6]', h8='$ball_3[7]', h9='$ball_3[8]', h10='$ball_3[9]',
      h11='$ball_3[10]', h12='$ball_3[11]', h13='$ball_3[12]', h14='$ball_3[13]', h15='$ball_3[14]',
      h16='$ball_3[15]', h17='$ball_3[16]', h18='$ball_3[17]', h19='$ball_3[18]', h20='$ball_3[19]',
      h21='$ball_3[20]', h22='$ball_3[21]', h23='$ball_3[22]', h24='$ball_3[23]', h25='$ball_3[24]',
      h26='$ball_3[25]', h27='$ball_3[26]', h28='$ball_3[27]'
                WHERE lottery_type='重庆十分彩' AND sub_type='正码和特别号' AND ball_type='ball_3'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第三球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_4[0]', h2='$ball_4[1]', h3='$ball_4[2]', h4='$ball_4[3]',h5='$ball_4[4]',
      h6='$ball_4[5]', h7='$ball_4[6]', h8='$ball_4[7]', h9='$ball_4[8]', h10='$ball_4[9]',
      h11='$ball_4[10]', h12='$ball_4[11]', h13='$ball_4[12]', h14='$ball_4[13]', h15='$ball_4[14]',
      h16='$ball_4[15]', h17='$ball_4[16]', h18='$ball_4[17]', h19='$ball_4[18]', h20='$ball_4[19]',
      h21='$ball_4[20]', h22='$ball_4[21]', h23='$ball_4[22]', h24='$ball_4[23]', h25='$ball_4[24]',
      h26='$ball_4[25]', h27='$ball_4[26]', h28='$ball_4[27]'
                WHERE lottery_type='重庆十分彩' AND sub_type='正码和特别号' AND ball_type='ball_4'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第四球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_5[0]', h2='$ball_5[1]', h3='$ball_5[2]', h4='$ball_5[3]',h5='$ball_5[4]',
      h6='$ball_5[5]', h7='$ball_5[6]', h8='$ball_5[7]', h9='$ball_5[8]', h10='$ball_5[9]',
      h11='$ball_5[10]', h12='$ball_5[11]', h13='$ball_5[12]', h14='$ball_5[13]', h15='$ball_5[14]',
      h16='$ball_5[15]', h17='$ball_5[16]', h18='$ball_5[17]', h19='$ball_5[18]', h20='$ball_5[19]',
      h21='$ball_5[20]', h22='$ball_5[21]', h23='$ball_5[22]', h24='$ball_5[23]', h25='$ball_5[24]',
      h26='$ball_5[25]', h27='$ball_5[26]', h28='$ball_5[27]'
                WHERE lottery_type='重庆十分彩' AND sub_type='正码和特别号' AND ball_type='ball_5'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第五球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_6[0]', h2='$ball_6[1]', h3='$ball_6[2]', h4='$ball_6[3]',h5='$ball_6[4]',
      h6='$ball_6[5]', h7='$ball_6[6]', h8='$ball_6[7]', h9='$ball_6[8]', h10='$ball_6[9]',
      h11='$ball_6[10]', h12='$ball_6[11]', h13='$ball_6[12]', h14='$ball_6[13]', h15='$ball_6[14]',
      h16='$ball_6[15]', h17='$ball_6[16]', h18='$ball_6[17]', h19='$ball_6[18]', h20='$ball_6[19]',
      h21='$ball_6[20]', h22='$ball_6[21]', h23='$ball_6[22]', h24='$ball_6[23]', h25='$ball_6[24]',
      h26='$ball_6[25]', h27='$ball_6[26]', h28='$ball_6[27]'
                WHERE lottery_type='重庆十分彩' AND sub_type='正码和特别号' AND ball_type='ball_6'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第六球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_7[0]', h2='$ball_7[1]', h3='$ball_7[2]', h4='$ball_7[3]',h5='$ball_7[4]',
      h6='$ball_7[5]', h7='$ball_7[6]', h8='$ball_7[7]', h9='$ball_7[8]', h10='$ball_7[9]',
      h11='$ball_7[10]', h12='$ball_7[11]', h13='$ball_7[12]', h14='$ball_7[13]', h15='$ball_7[14]',
      h16='$ball_7[15]', h17='$ball_7[16]', h18='$ball_7[17]', h19='$ball_7[18]', h20='$ball_7[19]',
      h21='$ball_7[20]', h22='$ball_7[21]', h23='$ball_7[22]', h24='$ball_7[23]', h25='$ball_7[24]',
      h26='$ball_7[25]', h27='$ball_7[26]', h28='$ball_7[27]'
                WHERE lottery_type='重庆十分彩' AND sub_type='正码和特别号' AND ball_type='ball_7'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第七球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_8[0]', h2='$ball_8[1]', h3='$ball_8[2]', h4='$ball_8[3]',h5='$ball_8[4]',
      h6='$ball_8[5]', h7='$ball_8[6]', h8='$ball_8[7]', h9='$ball_8[8]', h10='$ball_8[9]',
      h11='$ball_8[10]', h12='$ball_8[11]', h13='$ball_8[12]', h14='$ball_8[13]', h15='$ball_8[14]',
      h16='$ball_8[15]', h17='$ball_8[16]', h18='$ball_8[17]', h19='$ball_8[18]', h20='$ball_8[19]',
      h21='$ball_8[20]', h22='$ball_8[21]', h23='$ball_8[22]', h24='$ball_8[23]', h25='$ball_8[24]',
      h26='$ball_8[25]', h27='$ball_8[26]', h28='$ball_8[27]'
                WHERE lottery_type='重庆十分彩' AND sub_type='正码和特别号' AND ball_type='ball_8'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第八球。';
        exit;
    }

    echo '保存成功';
}