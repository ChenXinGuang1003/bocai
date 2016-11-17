<?php

class user_list
{
    static function getUserMoney($userId){
        global $mysqli;
        $sql		= 	"select money from user_list where user_id='$userId' limit 1";
        $query 		=	$mysqli->query($sql)or die ("error!");
        $rs			=	$query->fetch_array();
        return $rs;
    }
}