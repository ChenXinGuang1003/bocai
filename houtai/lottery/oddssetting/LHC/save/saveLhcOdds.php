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
$rType = $_POST["MyRtype"];
$sub_type = $rType;

if(strpos($quanxian,'修改彩票赔率')){
    $size = count($oddsArray);
    for($i=1;$i<=$size;$i++){
        if($i==$size){
            $sqlSub .= "h".$i."='".$oddsArray[$i-1]."'";
        }else{
            $sqlSub .= "h".$i."='".$oddsArray[$i-1]."',";
        }
    }

    global $mysqli;
    $sql	=	"UPDATE six_lottery_odds
                  SET $sqlSub
                  WHERE sub_type='$sub_type' AND ball_type is NULL";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败';
        exit;
    }

    echo '保存成功';
}