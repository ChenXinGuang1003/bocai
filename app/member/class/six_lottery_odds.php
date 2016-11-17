<?php

class six_lottery_odds
{
    static function getOdds($sub_type){
        global $mysqli;
        $sql	=	"SELECT * FROM six_lottery_odds
                WHERE sub_type='$sub_type' AND ball_type IS NULL limit 0,1";
        $query	=	$mysqli->query($sql)or die ("error!");
        $row    =	$query->fetch_array();
        return $row;
    }

    static function getOddsByBallType($sub_type, $ball_type){
        global $mysqli;
        $sql	=	"SELECT * FROM six_lottery_odds
                WHERE sub_type='$sub_type' AND ball_type='$ball_type' limit 0,1";
        $query	=	$mysqli->query($sql)or die ("error!");
        $row    =	$query->fetch_array();
        return $row;
    }
}