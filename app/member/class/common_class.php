<?php

class common_class
{
    static function getMaxMoney($user_id){
        global $mysqli;
        $sql	=	"SELECT allow_total_money FROM user_list WHERE user_id='$user_id' limit 0,1";
        $query	=	$mysqli->query($sql);
        if($query){
            $row    =	$query->fetch_array();
            return $row["allow_total_money"];
        }else{
            return 0;
        }

    }

    static function getMaxMoneyAlready($user_id,$lottery_type,$qishu){
        global $mysqli;
        $sql	=	"SELECT sum(bet_money) total_money FROM order_lottery WHERE Gtype='$lottery_type' and lottery_number='$qishu' and user_id='$user_id' group by user_id";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row["total_money"];
    }

    static function getMaxMoneyAlready_lhc($user_id,$qishu){
        global $mysqli;
        $sql	=	"SELECT sum(bet_money_total) total_money FROM six_lottery_order WHERE lottery_number='$qishu' and user_id='$user_id' group by user_id";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row["total_money"];
    }
}