<?php

//引用此文件必须引入各种文件，参考b5.php、quick_action.php、quickB5_act.php、D3_order.php、action.php、odds_action2.php、
$lottery_name = getZhPageTitle($gType);
$rTypeName = getZhRTypeName($gType,$rType);
$row = user_group::getLimitAndFsMoney($_SESSION["userid"]);
$lowestMoney = $row[strtolower($gType)."_lower_bet"];
$maxMoney = $row[strtolower($gType)."_max_bet"];
$userMoney = $_SESSION["user_money"];

//取得期数
if($gType=="CQ" || $gType=="TJ" || $gType=="JX"){
    $firstLottery = lottery_schedule::getFirstLottery($lottery_name);
    $lastLottery = lottery_schedule::getLastLottery($lottery_name);
    $isNeedReload = "false";

    if($gType=="CQ"){
        $rs = lottery_schedule::getNewestLottery($lottery_name);
    }elseif($firstLottery["kaipan_time"] >= date("H:i:s",time()) || date("H:i:s",time()) >= $lastLottery["kaijiang_time"]){
        $rs = $firstLottery;
        if(date("H:i:s",time()) >= $lastLottery["kaijiang_time"]){
            $isLateNight = "true";
        }
    }elseif($firstLottery["kaipan_time"] < date("H:i:s",time()) && date("H:i:s",time()) < $firstLottery["kaijiang_time"]){
        $rs = $firstLottery;
    }else{
        $rs = lottery_schedule::getNewestLottery($lottery_name);
    }

    if($rs){
        $isLateNight=="true" ? ($time = time() + 86400) : ($time = time());
        $qishu		= date("Ymd",$time).$rs['qishu'];
        $kaipanTime	= strtotime(date("Y-m-d",$time).' '.$rs['kaipan_time']);
        $fengpanTime	= strtotime(date("Y-m-d",$time).' '.$rs['fenpan_time']);
        $kaijiangTime	= strtotime(date("Y-m-d",$time).' '.$rs['kaijiang_time']);
    }else{
        $qishu		= -1;
        $kaipanTime	= -1;
        $fengpanTime	= -1;
        $kaijiangTime	= -1;
    }
    if($qishu == -1){
        $is_close = "true";
    }

    $differTime = $fengpanTime-strtotime($bj_time_now);
    $hour = floor($differTime/3600) ;
    if($hour<10){
        $hour = '0'.$hour;
    }
    $minute = floor(fmod($differTime,3600)/60);
    if($minute<10){
        $minute = '0'.$minute;
    }
    $second = fmod($differTime,60);
    if($second<10){
        $second = '0'.$second;
    }
    $endTime = date("Y-m-d",$time).' '.$rs['fenpan_time'];
    $FCDH = $hour.':'.$minute.':'.$second;

    if((strtotime($bj_time_now)-$kaipanTime)<30 && (strtotime($bj_time_now)-$kaipanTime)>0){
        $isNeedReload = "true";
    }
}


if($gType=="CQ" && $Lottery_set['cq']['close']==1){
    $is_close = "true";
}elseif($gType=="TJ" && $Lottery_set['tj']['close']==1){
    $is_close = "true";
}elseif($gType=="JX" && $Lottery_set['jx']['close']==1){
    $is_close = "true";
}

if(($gType=="CQ" || $gType=="TJ" || $gType=="JX") && date("Y-m-d H:i:s",$fengpanTime) <= $bj_time_now && $bj_time_now <= date("Y-m-d H:i:s",$kaijiangTime)){
    $is_close = "true";
}