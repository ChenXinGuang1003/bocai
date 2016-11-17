<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/utils/time_util.php");
include_once($C_Patch."/app/member/class/lottery_sf.php");
include_once($C_Patch."/app/member/class/lottery_schedule.php");
include_once($C_Patch."/app/member/class/odds_sf.php");
include_once($C_Patch."/app/member/cache/ltConfig.php");

$gType = $_GET["game"];
$titleName = getZhPageTitle($gType);

//判断是否关闭彩票
if($gType=="CQSF" && $Lottery_set['cqsf']['close']==1){
    $is_close = "true";
}

if(in_array($gType, array("CQSF"))){
    $firstLottery = lottery_schedule::getFirstLottery($titleName);
    $lastLottery = lottery_schedule::getLastLottery($titleName);
    if("23:53:00" <= date("H:i:s",time()) || date("H:i:s",time()) <= "00:03:00"){
        $rs = $firstLottery;
        if(date("H:i:s",time()) >= "23:53:00"){
            $isLateNight = "true";
        }
        if("00:03:00" >= date("H:i:s",time())){
            $isEarlyMorning = "true";
        }
        $isOutTime = "true";
    }else{
        $rs = lottery_schedule::getNewestLottery($titleName);
        $isNormalLottery = "true";
    }
}

$odds_result = "null";
if($rs){
    $isLateNight=="true" ? ($time = time() + 86400) : ($time = time());
    $qishu		= date("Ymd",$time).$rs['qishu'];
    if($isLateNight=="true"){
        $kaipanTime	    = strtotime(date("Y-m-d",$time - 86400).' '.$rs['kaipan_time']);
    }else{
        $kaipanTime	    = strtotime(date("Y-m-d",$time).' '.$rs['kaipan_time']);
    }
    $fengpanTime	= strtotime(date("Y-m-d",$time).' '.$rs['fenpan_time']);
    $kaijiangTime	= strtotime(date("Y-m-d",$time).' '.$rs['kaijiang_time']);
}else{
    $qishu		= -1;
    $kaipanTime	    = -1;
    $fengpanTime	= -1;
    $kaijiangTime	= -1;
}