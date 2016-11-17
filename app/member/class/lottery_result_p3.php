<?php

class lottery_result_p3
{
    static function getLastLotteryResult(){
        global $mysqli;
        $sql	=	"SELECT qishu, create_time, state, ball_1,ball_2,ball_3
                    FROM lottery_result_p3 ORDER BY qishu+0 DESC limit 0,1";
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
        $sql	=	"SELECT qishu, create_time, state, ball_1,ball_2,ball_3
                    FROM lottery_result_p3 ORDER BY qishu+0 DESC limit 0,1";
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
        $sql	=	"SELECT qishu, create_time, state, ball_1,ball_2,ball_3
                    FROM lottery_result_p3 WHERE qishu='$qishu' limit 0,1";
        $query	=	$mysqli->query($sql);
        if($query){
            $row    =	$query->fetch_array();
            return $row;
        }else{
            return null;
        }
    }
}