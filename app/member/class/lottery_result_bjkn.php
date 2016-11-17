<?php

class lottery_result_bjkn
{
    static function getLastLotteryResult(){
        global $mysqli;
        $sql	=	"SELECT qishu, create_time, state, ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8,ball_9,ball_10,
                            ball_11,ball_12,ball_13,ball_14,ball_15, ball_16,ball_17,ball_18,ball_19,ball_20
                    FROM lottery_result_bjkn ORDER BY qishu+0 DESC limit 0,1";
        $query	=	$mysqli->query($sql);
        if($query){
            $row    =	$query->fetch_array();
            return $row;
        }else{
            return null;
        }
    }
    static function getLastLotteryQishu(){
        global $mysqli;
        $sql	=	"SELECT qishu, create_time, state, ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8,ball_9,ball_10,
                            ball_11,ball_12,ball_13,ball_14,ball_15, ball_16,ball_17,ball_18,ball_19,ball_20
                    FROM lottery_result_bjkn ORDER BY qishu+0 DESC limit 0,1";
        $query	=	$mysqli->query($sql);
        if($query){
            $row    =	$query->fetch_array();
            return $row["qishu"];
        }else{
            return null;
        }
    }

    static function getLotteryResult($qishu){
        global $mysqli;
        $sql	=	"SELECT qishu, create_time, state, ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8,ball_9,ball_10,
                            ball_11,ball_12,ball_13,ball_14,ball_15, ball_16,ball_17,ball_18,ball_19,ball_20
                    FROM lottery_result_bjkn WHERE qishu='$qishu' limit 0,1";
        $query	=	$mysqli->query($sql);
        if($query){
            $row    =	$query->fetch_array();
            return $row;
        }else{
            return null;
        }
    }
}