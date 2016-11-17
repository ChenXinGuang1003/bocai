<?php

class live_info
{
    static function getUserAndLife($userId,$lifeType='AG'){
        global $mysqli;
        $sql = "select u.money,u.user_name,l.live_money_a normal_money,l.live_money_b vip_money,l.update_time,l.live_type,l.live_username,l.live_password
                    from user_list u,live_user l
                    where u.user_id=l.user_id and live_type='$lifeType' and u.user_id='$userId' limit 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row;
    }

    static function getAllowLive($userId){
        global $mysqli;
        $sql = "select is_allow_live
                    from user_list
                    where user_id='$userId' limit 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row["is_allow_live"];
    }

    static function getLifeRecordByUser($userId){
        global $mysqli;
        $get_time = date('Y-m-d',strtotime('-6 day'))." 00:00:00";
        $sql = "select id,order_num, live_type, zz_type, user_id, live_username, zz_money, status, result, add_time, do_time
                from live_log where user_id='$userId' and do_time>'$get_time' order by do_time desc";
        $query	=	$mysqli->query($sql);
        while($row = $query->fetch_array()){
            $rs[] = $row;
        }
        return $rs;
    }
}