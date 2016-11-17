<?php

class odds_lottery_normal
{
    static function getOdds($lottery_type, $sub_type){
        global $mysqli;
        $sql	=	"SELECT * FROM odds_lottery_normal
                WHERE lottery_type='$lottery_type' AND sub_type='$sub_type' limit 0,1";
        $query	=	$mysqli->query($sql)or die ("error!");
        $row    =	$query->fetch_array();
        return $row;
    }

    static function getOddsByPart($lottery_type, $sub_type, $ball_type){
        global $mysqli;
        $sql	=	"SELECT * FROM odds_lottery_normal
                WHERE lottery_type='$lottery_type' AND sub_type='$sub_type' AND ball_type='$ball_type' limit 0,1";
        $query	=	$mysqli->query($sql)or die ("error!");
        $row    =	$query->fetch_array();
        return $row;
    }
}