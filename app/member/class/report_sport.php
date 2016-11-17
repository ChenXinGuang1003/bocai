<?php

class report_sport
{
    static function getAllBetMoneyAndCount($dayStart,$dayEnd,$user_group="",$statusString=""){
        $oneDayStart = $dayStart.' 00:00:00';
        $oneDayEnd = $dayEnd.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT COUNT(id) AS bet_count, IFNULL(SUM(IFNULL(bet_money,0)),0) AS bet_money
                FROM k_bet
                WHERE bet_time>= '".$oneDayStart."' AND bet_time<='".$oneDayEnd."'
            ";
        if($user_group != ""){
            $sql .= " AND user_id IN $user_group";
        }
        if($statusString != "" && strlen($statusString)<4){
            $sql .= " AND status = $statusString ";
        }elseif($statusString != ""){
            $sql .= $statusString;
        }
        $sql .= " LIMIT 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row;
    }
    static function getAllTotalWin($dayStart,$dayEnd,$user_group="",$statusString=""){
        $oneDayStart = $dayStart.' 00:00:00';
        $oneDayEnd = $dayEnd.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT SUM(IF(win>0,win,0)+IF(fs>0,fs,0)) AS win_money
                FROM k_bet
                WHERE bet_time>= '".$oneDayStart."' AND bet_time<='".$oneDayEnd."'
            ";
        if($user_group != ""){
            $sql .= " AND user_id IN $user_group";
        }
        if($statusString != ""){
            $sql .= $statusString;
        }
        $sql .= " LIMIT 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row["win_money"];
    }

    static function getBetMoneyAndCount($dayStart,$dayEnd,$gType,$user_group="",$statusString=""){
        $oneDayStart = $dayStart.' 00:00:00';
        $oneDayEnd = $dayEnd.' 23:59:59';
        $sql_where = "";
        if($gType == "足球"){
            $sql_where.=" and (ball_sort='足球早餐' or ball_sort='足球单式' or ball_sort='足球滚球' or ball_sort='足球上半场')";
        }elseif($gType == "篮球"){
            $sql_where.=" and (ball_sort='篮球早餐' or ball_sort='篮球单式' or ball_sort='篮球滚球' or ball_sort='篮球单节')";
        }elseif($gType == "网球"){
            $sql_where.=" and (ball_sort='网球早餐' or ball_sort='网球单式')";
        }elseif($gType == "排球"){
            $sql_where.=" and (ball_sort='排球早餐' or ball_sort='排球单式')";
        }elseif($gType == "棒球"){
            $sql_where.=" and (ball_sort='棒球早餐' or ball_sort='棒球单式')";
        }elseif($gType == "冠军"){
            $sql_where.=" and ball_sort='冠军'";
        }elseif($gType == "单式"){
            $sql_where.=" and ball_sort != '冠军'";
        }elseif($gType == "其他"){
            $sql_where.=" and (ball_sort='其他早餐' or ball_sort='其他单式')";
        }
        global $mysqli;
        $sql	=	"SELECT COUNT(id) AS bet_count, IFNULL(SUM(IFNULL(bet_money,0)),0) AS bet_money
                FROM k_bet
                WHERE bet_time>= '".$oneDayStart."' AND bet_time<='".$oneDayEnd."' $sql_where
            ";
        if($user_group != ""){
            $sql .= " AND user_id IN $user_group";
        }
        if($statusString != "" && strlen($statusString)<4){
            $sql .= " AND status = $statusString ";
        }elseif($statusString != ""){
            $sql .= $statusString;
        }
        $sql .= " LIMIT 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row;
    }

    static function getTotalWin($dayStart,$dayEnd,$gType,$user_group="",$statusString=""){
        $oneDayStart = $dayStart.' 00:00:00';
        $oneDayEnd = $dayEnd.' 23:59:59';
        $sql_where = "";
        if($gType == "足球"){
            $sql_where.=" and (ball_sort='足球早餐' or ball_sort='足球单式' or ball_sort='足球滚球' or ball_sort='足球上半场')";
        }elseif($gType == "篮球"){
            $sql_where.=" and (ball_sort='篮球早餐' or ball_sort='篮球单式' or ball_sort='篮球滚球' or ball_sort='篮球单节')";
        }elseif($gType == "网球"){
            $sql_where.=" and (ball_sort='网球早餐' or ball_sort='网球单式')";
        }elseif($gType == "排球"){
            $sql_where.=" and (ball_sort='排球早餐' or ball_sort='排球单式')";
        }elseif($gType == "棒球"){
            $sql_where.=" and (ball_sort='棒球早餐' or ball_sort='棒球单式')";
        }elseif($gType == "冠军"){
            $sql_where.=" and ball_sort='冠军'";
        }elseif($gType == "单式"){
            $sql_where.=" and ball_sort != '冠军'";
        }elseif($gType == "其他"){
            $sql_where.=" and (ball_sort='其他早餐' or ball_sort='其他单式')";
        }
        global $mysqli;
        $sql	=	"SELECT SUM(IF(win>0,win,0)+IF(fs>0,fs,0)) AS win_money
                FROM k_bet
                WHERE bet_time>= '".$oneDayStart."' AND bet_time<='".$oneDayEnd."' $sql_where
            ";
        if($user_group != ""){
            $sql .= " AND user_id IN $user_group";
        }
        if($statusString != ""){
            $sql .= $statusString;
        }
        $sql .= " LIMIT 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row["win_money"];
    }

    static function getBetMoneyAndCountCg($dayStart,$dayEnd,$user_group="",$statusString=""){
        $oneDayStart = $dayStart.' 00:00:00';
        $oneDayEnd = $dayEnd.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT COUNT(id) AS bet_count, IFNULL(SUM(IFNULL(bet_money,0)),0) AS bet_money
                FROM k_bet_cg_group
                WHERE bet_time>= '".$oneDayStart."' AND bet_time<='".$oneDayEnd."'
            ";
        if($user_group != ""){
            $sql .= " AND user_id IN $user_group";
        }
        if($statusString != "" && strlen($statusString)<4){
            $sql .= " AND status = $statusString ";
        }elseif($statusString != ""){
            $sql .= $statusString;
        }
        $sql .= " LIMIT 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row;
    }

    static function getTotalWinCg($dayStart,$dayEnd,$user_group="",$statusString=""){
        $oneDayStart = $dayStart.' 00:00:00';
        $oneDayEnd = $dayEnd.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT SUM(IF(win>0,win,0)+IF(fs>0,fs,0)) AS win_money
                FROM k_bet_cg_group
                WHERE bet_time>= '".$oneDayStart."' AND bet_time<='".$oneDayEnd."'
            ";
        if($user_group != ""){
            $sql .= " AND user_id IN $user_group";
        }
        if($statusString != ""){
            $sql .= $statusString;
        }
        $sql .= " LIMIT 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row["win_money"];
    }

    static function getSportListByUser($userId,$oneDate,$gtype){
        global $mysqli;
        $start_time = $oneDate." 00:00:00";
        $end_time = $oneDate." 23:59:59";
        $sql	=	"select user_id,order_num,ball_sort,point_column,match_name,master_guest,match_id,
                           bet_info,bet_money,bet_point,bet_win,win,bet_time,bet_time_et,match_time,match_endtime,
                           status,balance,assets,ip,www,fs,MB_Inball,TG_Inball,lose_ok
                     from k_bet where user_id='$userId' and bet_time>='$start_time' and bet_time<='$end_time' ";
        if($gtype == "足球"){
            $sql.=" and (ball_sort='足球早餐' or ball_sort='足球单式' or ball_sort='足球滚球' or ball_sort='足球上半场')";
        }elseif($gtype == "篮球"){
            $sql.=" and (ball_sort='篮球早餐' or ball_sort='篮球单式' or ball_sort='篮球滚球' or ball_sort='篮球单节')";
        }elseif($gtype == "网球"){
            $sql.=" and (ball_sort='网球早餐' or ball_sort='网球单式')";
        }elseif($gtype == "排球"){
            $sql.=" and (ball_sort='排球早餐' or ball_sort='排球单式')";
        }elseif($gtype == "棒球"){
            $sql.=" and (ball_sort='棒球早餐' or ball_sort='棒球单式')";
        }elseif($gtype == "冠军"){
            $sql.=" and ball_sort='冠军'";
        }elseif($gtype == "单式"){
            $sql.=" and ball_sort != '冠军'";
        }elseif($gtype == "其他"){
            $sql.=" and (ball_sort='其他早餐' or ball_sort='其他单式')";
        }
        $sql.=" ORDER BY STATUS ASC ,bet_time desc ";
        $query	=	$mysqli->query($sql);
        while($row = $query->fetch_array()){
            $rs[] = $row;
        }
        return $rs;
    }

    static function getSportCgListByUser($userId,$oneDate){
        global $mysqli;
        $start_time = $oneDate." 00:00:00";
        $end_time = $oneDate." 23:59:59";
        $sql	=	"select id,user_id,order_num,cg_count, bet_money, bet_win, win,
                             bet_time, bet_time_et, status, fs, balance, assets, www
                     from k_bet_cg_group where user_id='$userId' and bet_time>='$start_time' and bet_time<='$end_time' ";
        $sql.=" ORDER BY STATUS ASC ,bet_time desc ";
        $query	=	$mysqli->query($sql);
        while($row = $query->fetch_array()){
            $rs[] = $row;
        }
        return $rs;
    }

    static function getSportCgDetailsByUser($userId,$gid){
        global $mysqli;
        $sql	=	"select match_name,master_guest,bet_info,bet_time, status, match_endtime
                     from k_bet_cg where user_id='$userId' and gid='$gid'";
        $sql.=" order by id desc ";
        $query	=	$mysqli->query($sql);
        while($row = $query->fetch_array()){
            $rs[] = $row;
        }
        return $rs;
    }
}