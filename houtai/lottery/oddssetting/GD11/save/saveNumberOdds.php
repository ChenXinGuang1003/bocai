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
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_1[0]', h2='$ball_1[1]', h3='$ball_1[2]', h4='$ball_1[3]',h5='$ball_1[4]',
      h6='$ball_1[5]', h7='$ball_1[6]', h8='$ball_1[7]', h9='$ball_1[8]', h10='$ball_1[9]',
      h11='$ball_1[10]', h12='$ball_1[11]', h13='$ball_1[12]', h14='$ball_1[13]', h15='$ball_1[14]',
      h16='$ball_1[15]', h17='$ball_1[16]', h18='$ball_1[17]', h19='$ball_1[18]'
                WHERE lottery_type='广东十一选五' AND sub_type='正码和特别号' AND ball_type='ball_1'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第一球。'.$ball_1[0];
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_2[0]', h2='$ball_2[1]', h3='$ball_2[2]', h4='$ball_2[3]',h5='$ball_2[4]',
      h6='$ball_2[5]', h7='$ball_2[6]', h8='$ball_2[7]', h9='$ball_2[8]', h10='$ball_2[9]',
      h11='$ball_2[10]', h12='$ball_2[11]', h13='$ball_2[12]', h14='$ball_2[13]', h15='$ball_2[14]',
      h16='$ball_2[15]', h17='$ball_2[16]', h18='$ball_2[17]', h19='$ball_2[18]'
                WHERE lottery_type='广东十一选五' AND sub_type='正码和特别号' AND ball_type='ball_2'";
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
      h16='$ball_3[15]', h17='$ball_3[16]', h18='$ball_3[17]', h19='$ball_3[18]'
                WHERE lottery_type='广东十一选五' AND sub_type='正码和特别号' AND ball_type='ball_3'";
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
      h16='$ball_4[15]', h17='$ball_4[16]', h18='$ball_4[17]', h19='$ball_4[18]'
                WHERE lottery_type='广东十一选五' AND sub_type='正码和特别号' AND ball_type='ball_4'";
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
      h16='$ball_5[15]', h17='$ball_5[16]', h18='$ball_5[17]', h19='$ball_5[18]'
                WHERE lottery_type='广东十一选五' AND sub_type='正码和特别号' AND ball_type='ball_5'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第五球。';
        exit;
    }
    echo '保存成功';
}