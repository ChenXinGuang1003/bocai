<?php

class lottery_schedule
{
    static function getNewestLottery($lotteryName){
        global $mysqli;
        $sql	=	"SELECT lottery_type, qishu, kaipan_time, fenpan_time, kaijiang_time
                    FROM lottery_schedule WHERE lottery_type='$lotteryName'
                    AND kaipan_time<='".date("H:i:s",time())."'
                    AND kaijiang_time>'".date("H:i:s",time())."' ORDER BY id ASC limit 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row;
    }

    static function getPrevLottery($lotteryName, $qishu){
        global $mysqli;
        $sql	=	"SELECT lottery_type, qishu, kaipan_time, fenpan_time, kaijiang_time
                    FROM lottery_schedule WHERE lottery_type='$lotteryName' AND qishu='$qishu' limit 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row;
    }

    static function getFirstLottery($lotteryName){
        global $mysqli;
        $sql	=	"SELECT lottery_type, qishu, kaipan_time, fenpan_time, kaijiang_time
                    FROM lottery_schedule WHERE lottery_type='$lotteryName' ORDER BY id ASC limit 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row;
    }

    static function getLastLottery($lotteryName){
        global $mysqli;
        $sql	=	"SELECT lottery_type, qishu, kaipan_time, fenpan_time, kaijiang_time
                    FROM lottery_schedule WHERE lottery_type='$lotteryName' ORDER BY id DESC limit 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row;
    }
}