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
    $size = count($oddsArray);
    for($i=0;$i<$size;$i++){
        if($i==($size-1)){
            $sqlSub .= "h".$i."='".$oddsArray[$i]."'";
        }else{
            $sqlSub .= "h".$i."='".$oddsArray[$i]."',";
        }
    }

    global $mysqli;
    $sql	=	"UPDATE odds_lottery_normal
                  SET $sqlSub
                  WHERE lottery_type='$lottery_type' AND sub_type='$sub_type'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败';
        exit;
    }

    echo '保存成功';
}