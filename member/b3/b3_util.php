<?php

//引用此文件必须引入各种文件，参考b3.php、quick_action.php、quickB3_act.php、D3_order.php、action.php、odds_action2.php、
$lottery_name = getZhPageTitle($gType);
$rTypeName = getZhRTypeName($gType,$rType);
$row = user_group::getLimitAndFsMoney($_SESSION["userid"]);
$lowestMoney = $row[strtolower($gType)."_lower_bet"];
$maxMoney = $row[strtolower($gType)."_max_bet"];
$userMoney = $_SESSION["user_money"];

//取得期数
if($gType=="D3" || $gType=="P3"){
    $times=date("H:i:s",time());
    $lasttime=$Lottery_set[strtolower($gType)]['ktime']." ".$times;
    $thistime=date("Y-m-d H:i:s",time());
    $re_date=retimeDiffs($lasttime,$thistime);
    $lost_days=$re_date[ ' day ' ];
    $qishu=$lost_days+$Lottery_set[strtolower($gType)]['knum'];
    if($gType=="P3"){
        $qishu = "20".$qishu;
    }
    $isNeedReload = "false";

    if("23:59:59" >= date("H:i:s",time()) && date("H:i:s",time()) >= "21:00:00"){
        $qishu = $qishu + 1;
        $differTime = strtotime(date("Y-m-d",time() + 86400).' 20:28:00')-strtotime($bj_time_now);
    }else{
        $differTime = strtotime(date("Y-m-d",time()).' 20:28:00')-strtotime($bj_time_now);
    }
    if(!$qishu || $qishu < 0){
        $is_close = "true";
    }

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
    $endTime = date("Y-m-d",time()).' 20:28:00';
    $FCDH = $hour.':'.$minute.':'.$second;

    if((strtotime($bj_time_now)-strtotime(date("Y-m-d",time()).' 20:28:00'))<60 && (strtotime($bj_time_now)-strtotime(date("Y-m-d",time()).' 20:28:00'))>0){
        $isNeedReload = "true";
    }
}elseif($gType=="T3"){
    $firstLottery = lottery_schedule::getFirstLottery($lottery_name);
    $lastLottery = lottery_schedule::getLastLottery($lottery_name);
    if($firstLottery["kaipan_time"] >= date("H:i:s",time()) || date("H:i:s",time()) >= $lastLottery["kaijiang_time"]){
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

    $isNeedReload = "false";
    if((strtotime($bj_time_now)-$kaipanTime)<30&&(strtotime($bj_time_now)-$kaipanTime)>0){
        $isNeedReload = "true";
    }
}


if($gType=="D3" && $Lottery_set['d3']['close']==1){
    $is_close = "true";
}elseif($gType=="P3" && $Lottery_set['p3']['close']==1){
    $is_close = "true";
}elseif($gType=="T3" && $Lottery_set['t3']['close']==1){
    $is_close = "true";
}

if(($gType == "D3" || $gType == "P3") && "21:00:00" > date("H:i:s",time()) && date("H:i:s",time()) >= "20:28:00"){
    $is_close = "true";
}
if(($gType == "T3") && date("Y-m-d H:i:s",$fengpanTime) <= $bj_time_now && $bj_time_now <= date("Y-m-d H:i:s",$kaijiangTime)){
    $is_close = "true";
}