<?php

class odds_sf
{
    static function getOddsByBall($lottery_type, $sub_type, $ball_type){
        global $mysqli;
        $sql	=	"SELECT * FROM odds_lottery
                WHERE lottery_type='$lottery_type' AND sub_type='$sub_type' AND ball_type='$ball_type' limit 0,1";
        $query	=	$mysqli->query($sql)or die ("error!");
        $row    =	$query->fetch_array();
        return $row;
    }
}