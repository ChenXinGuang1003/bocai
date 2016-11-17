<?php

class lottery_result_gdsf
{
    static function getLastLotteryResult(){
        global $mysqli;
        $sql	=	"SELECT qishu, create_time, state, ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8
                    FROM lottery_result_gdsf ORDER BY qishu+0 DESC limit 0,1";
        $query	=	$mysqli->query($sql);
        if($query){
            $row    =	$query->fetch_array();
            return $row;
        }else{
            return null;
        }
    }

    static function getLotteryResult($qishu){
        global $mysqli;
        $sql	=	"SELECT qishu, create_time, state, ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8
                    FROM lottery_result_gdsf WHERE qishu='$qishu' ORDER BY qishu+0 DESC limit 0,1";
        $query	=	$mysqli->query($sql);
        if($query){
            $row    =	$query->fetch_array();
            return $row;
        }else{
            return null;
        }
    }

    static function getGXSFLotteryQishu(){
        global $mysqli;
        $sql	=	"SELECT qishu, create_time, state
                    FROM lottery_result_gdsf ORDER BY qishu+0 DESC limit 0,1";
        $query	=	$mysqli->query($sql);
        if($query){
            $row    =	$query->fetch_array();
            return $row["qishu"];
        }else{
            return null;
        }
    }
    static function getBJPKLotteryQishu(){
        global $mysqli;
        $sql	=	"SELECT lottery_type, qishu, create_time, state
                    FROM lottery_result WHERE lottery_type='北京PK拾' ORDER BY id DESC limit 0,1";
        $query	=	$mysqli->query($sql);
        if($query){
            $row    =	$query->fetch_array();
            return $row["qishu"];
        }else{
            return null;
        }
    }
    static function getBJKNLotteryQishu(){
        global $mysqli;
        $sql	=	"SELECT lottery_type, qishu, create_time, state
                    FROM lottery_result WHERE lottery_type='北京快乐8' ORDER BY id DESC limit 0,1";
        $query	=	$mysqli->query($sql);
        if($query){
            $row    =	$query->fetch_array();
            return $row["qishu"];
        }else{
            return null;
        }
    }
}