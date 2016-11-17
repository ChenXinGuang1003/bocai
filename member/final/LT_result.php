<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
@include_once($C_Patch."/app/member/include/address.mem.php");
@include_once($C_Patch."/app/member/include/com_chk.php");
@include_once($C_Patch."/app/member/common/function.php");
include "../../app/member/utils/convert_name.php";
include "../../app/member/class/six_lottery_order.php";
include "../../app/member/class/lottery_order.php";
include "../../resource/lottery/result/Js_Class.php";


$lottery_type = $_GET['gtype'];//彩票类型、3D彩、排列三、上海时时乐
if($lottery_type=="D3" || $lottery_type=="P3" || $lottery_type=="T3"){
    include_once "sub_result/b3.php";
}elseif($lottery_type=="CQ" || $lottery_type=="JX" || $lottery_type=="TJ"){
    include_once "sub_result/b5.php";
}elseif($lottery_type=="CQM"){
	 include_once "sub_result/b5M.php";
}elseif($lottery_type=="GDSF"){
    include_once "sub_result/gdsf.php";
}elseif($lottery_type=="GXSF"){
    include_once "sub_result/gxsf.php";
}elseif($lottery_type=="TJSF"){
    include_once "sub_result/tjsf.php";
}elseif($lottery_type=="CQSF"){
    include_once "sub_result/cqsf.php";
}elseif($lottery_type=="GD11"){
    include_once "sub_result/gd11.php";
}elseif($lottery_type=="BJKN"){
    include_once "sub_result/bjkn.php";
}elseif($lottery_type=="BJPK"){
    include_once "sub_result/bjpk.php";
}elseif($lottery_type=="LT"){
    include_once "sub_result/lhc.php";
}elseif($lottery_type=="BJPK2"){
    include_once "sub_result/bjpk2.php";
}
$mysqli->close();