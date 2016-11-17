<?php

//引用此文件必须引入各种文件，参考b5.php、quick_action.php、quickB5_act.php、D3_order.php、action.php、odds_action2.php、
$row = user_group::getLimitAndFsMoney($_SESSION["userid"]);
$lowestMoney = $row["lhc_lower_bet"];
$maxMoney = $row["lhc_max_bet"];
$userMoney = $_SESSION["user_money"];

//取得期数
$rs = six_lottery_schedule::getNewestLottery();

if($rs){
    $qishu		    = $rs['qishu'];
    $fengpanTime	= strtotime($rs['fenpan_time']);
    $kaijiangTime	= strtotime($rs['kaijiang_time']);
}else{
    $qishu		= -1;
    $fengpanTime	= -1;
    $kaijiangTime	= -1;
}
if($qishu == -1){
    $is_close = "true";
    $is_close_no_game = "true";
    return;
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
$endTime = $rs['fenpan_time'];
$FCDH = $hour.':'.$minute.':'.$second;


if($Lottery_set['lhc']['close']==1){
    $is_close = "true";
    $is_close_admin = "true";
    $is_close_reason = $Lottery_set['lhc']['des'];
}

if(date("Y-m-d H:i:s",$fengpanTime) <= $bj_time_now && $bj_time_now <= date("Y-m-d H:i:s",$kaijiangTime)){
    $is_close = "true";
}

function getNapInfo($enName){
    $name = "";
    $number = "";
    $subString = substr($enName,4);
    if($subString=="_ODD"){
        $name = "单";
        $number = "1";
    }elseif($subString=="_EVEN"){
        $name = "双";
        $number = "2";
    }elseif($subString=="_OVER"){
        $name = "大";
        $number = "3";
    }elseif($subString=="_UNDER"){
        $name = "小";
        $number = "4";
    }elseif($subString=="_SODD"){
        $name = "和单";
        $number = "5";
    }elseif($subString=="_SEVEN"){
        $name = "和双";
        $number = "6";
    }elseif($subString=="_SOVER"){
        $name = "和大";
        $number = "7";
    }elseif($subString=="_SUNDER"){
        $name = "和小";
        $number = "8";
    }elseif($subString=="_FOVER"){
        $name = "尾大";
        $number = "9";
    }elseif($subString=="_FUNDER"){
        $name = "尾小";
        $number = "10";
    }elseif($subString=="_R"){
        $name = "红波";
        $number = "11";
    }elseif($subString=="_G"){
        $name = "绿波";
        $number = "12";
    }elseif($subString=="_B"){
        $name = "蓝波";
        $number = "13";
    }
    $info = array($name,$number);
    return $info;
}

function compile_array($m, $n){ //m为大数，n为小数，如5选3,$m=5，$n=3
    $returnArray = array();
    $end = false;
    $number = array();
    for ($t = 0; $t < $m; $t++) {
        if ($t < $n) {
            $number[$t] = 1;
        } else {
            $number[$t] = 0;
        }
    }

    while (!$end) {
        $findfirst = false;
        $swap = false; //标志复位

        for ($i = 0; $i < $m; $i++) {
            if (!$findfirst && $number[$i] != 0) {
                $k = $i; //k记录下扫描到的第一个1的位置
                $findfirst = true; //设置标志
            }
            if (($number[$i] != 0) && ($number[$i + 1] == 0)) {
                //从左到右扫描第一个“10”组合
                $number[$i] = 0;
                $number[$i + 1] = 1;
                $swap = true; //设置交换标志
                for ($l = 0; $l < $i - $k; $l++)
                    $number[$l] = $number[$k + $l];
                for ($l = $i - $k; $l < $i; $l++)
                    $number[$l] = 0; //交换后将之前的“1”全部移动到最左端
                if (($k == $i) && ($i + 1 == $m - $n))
                    //如果第一个“1”已经移动到了m-n的位置，说明这是最后一个组合了。
                    $end = true;
            }
            if ($swap) //交换一次后就不用继续找“10”组合了
                break;
        }
        $outputString = array();
        for ($b = 0; $b < $m; $b++) {
            if ($number[$b] == 1) {
                $outputString[] = $b + 1;
            }
        }
        $returnArray[] = $outputString;
    }
    return $returnArray;
}