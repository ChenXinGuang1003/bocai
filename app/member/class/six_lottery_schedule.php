<?php

class six_lottery_schedule
{
    static function getNewestLottery(){
        global $mysqli;
        $sql	=	"SELECT qishu, kaipan_time, fenpan_time, kaijiang_time
                    FROM six_lottery_schedule
                    WHERE kaipan_time<='".date("Y-m-d H:i:s",time())."'
                    AND kaijiang_time>'".date("Y-m-d H:i:s",time())."' ORDER BY create_time DESC limit 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row;
    }
}