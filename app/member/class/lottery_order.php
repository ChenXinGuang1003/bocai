<?php

class lottery_order
{
    static function getOrders($lotteryType, $qishu){
        global $mysqli;
        $sql	=	"SELECT o.order_num,o.user_id,o.lottery_number AS qishu,o.bet_info,
                        o.bet_money AS bet_monel_total,o.win AS win_total,o.status AS order_status,
                        o_sub.number,o_sub.bet_rate, o_sub.bet_money,o_sub.win,o_sub.fs,
                        o_sub.status AS sub_status
                    FROM order_lottery o,order_lottery_sub o_sub
                    WHERE o.Gtype='$lotteryType' AND o.lottery_number='$qishu'
                        AND o.order_num=o_sub.order_num";
        $query	=	$mysqli->query($sql)or die ("error!");
        while($row = $query->fetch_array()){
            $rs[] = $row;
        }
        return $rs;
    }
    static function getOrdersByStatus($lotteryType, $qishu, $status){
        global $mysqli;
        $sql	=	"SELECT o.id,o.order_num,o.user_id,o.lottery_number AS qishu,o.bet_info,o.rtype_str,
                        o.bet_money AS bet_monel_total,o.win AS win_total,o.status AS order_status,
                        o_sub.number,o_sub.bet_rate, o_sub.bet_money,o_sub.win,o_sub.fs,o_sub.order_sub_num,o_sub.quick_type,
                        o_sub.id AS sub_id,o_sub.status AS sub_status,o_sub.is_win
                    FROM order_lottery o,order_lottery_sub o_sub
                    WHERE o.Gtype='$lotteryType' AND o.lottery_number='$qishu'
                        AND o.order_num=o_sub.order_num AND o.status = '$status' AND o_sub.status = '$status'";
        $query	=	$mysqli->query($sql)or die ("error!");
        while($row = $query->fetch_array()){
            $rs[] = $row;
        }
        return $rs;
    }

    static function getOrdersJs($lotteryType, $qishu){
        global $mysqli;
        $sql	=	"SELECT o.id,o.order_num,o.user_id,o.lottery_number AS qishu,o.bet_info,o.rtype_str,
                        o.bet_money AS bet_monel_total,o.win AS win_total,o.status AS order_status,
                        o_sub.number,o_sub.bet_rate, o_sub.bet_money,o_sub.win,o_sub.fs,o_sub.order_sub_num,o_sub.quick_type,
                        o_sub.id AS sub_id,o_sub.status AS sub_status,o_sub.is_win
                    FROM order_lottery o,order_lottery_sub o_sub
                    WHERE o.Gtype='$lotteryType' AND o.lottery_number='$qishu'
                        AND o.order_num=o_sub.order_num AND o.status IN ('1','2')";
        $query	=	$mysqli->query($sql)or die ("error!");
        while($row = $query->fetch_array()){
            $rs[] = $row;
        }
        return $rs;
    }


    static function getOneDayOrder($user_id,$day,$gType,$statusString = ""){
        $oneDayStart = $day.' 00:00:00';
        $oneDayEnd = $day.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT COUNT(o_sub.id) AS bet_count, IFNULL(SUM(IFNULL(o_sub.bet_money,0)),0) AS bet_money
                FROM order_lottery o,order_lottery_sub o_sub
                WHERE o.user_id='$user_id' AND o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
                AND o.Gtype = '$gType'
            ";
        if($statusString != ""){
            $sql .= " AND o_sub.status='$statusString' ";
        }
        $sql .= " LIMIT 0,1 ";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row;
    }

    static function getOneDayTotalCount($user_id,$day,$statusString = ""){
        $oneDayStart = $day.' 00:00:00';
        $oneDayEnd = $day.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT COUNT(o_sub.id) AS bet_count, IFNULL(SUM(IFNULL(o_sub.bet_money,0)),0) AS bet_money
                FROM order_lottery o,order_lottery_sub o_sub
                WHERE o.user_id='$user_id' AND o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
            ";
        if($statusString != ""){
            $sql .= " AND o_sub.status='$statusString' ";
        }
        $sql .= " LIMIT 0,1 ";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row;
    }

    static function getOneDayTotalCountByType($user_id,$day,$gType,$statusString = ""){
        $oneDayStart = $day.' 00:00:00';
        $oneDayEnd = $day.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT COUNT(o_sub.id) AS bet_count, IFNULL(SUM(IFNULL(o_sub.bet_money,0)),0) AS bet_money
                FROM order_lottery o,order_lottery_sub o_sub
                WHERE o.user_id='$user_id' AND o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."' AND o.Gtype = '$gType'
            ";
        if($statusString != ""){
            $sql .= " AND o_sub.status='$statusString' ";
        }
        $sql .= " LIMIT 0,1 ";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row;
    }

    static function getOneDayTotalWin($user_id,$day){
        $oneDayStart = $day.' 00:00:00';
        $oneDayEnd = $day.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT IFNULL(SUM(IFNULL(o_sub.win,0)+IFNULL(o_sub.fs,0)),0) AS win_money
                FROM order_lottery o,order_lottery_sub o_sub
                WHERE o.user_id='$user_id' AND o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
                AND o_sub.is_win = '1' LIMIT 0,1
            ";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        $winTotal = $row["win_money"];
        $sql	=	"SELECT IFNULL(SUM(IFNULL(o_sub.fs,0)),0) AS win_fs
                FROM order_lottery o,order_lottery_sub o_sub
                WHERE o.user_id='$user_id' AND o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
                AND o_sub.is_win = '0' LIMIT 0,1
            ";
        $query	=	$mysqli->query($sql);
        $row2    =	$query->fetch_array();
        $winTotal += $row2["win_fs"];
        $sql	=	"SELECT IFNULL(SUM(IFNULL(o_sub.bet_money,0)),0) AS win_back
                FROM order_lottery o,order_lottery_sub o_sub
                WHERE o.user_id='$user_id' AND o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
                AND (o_sub.is_win = '2' OR o_sub.status = '3') LIMIT 0,1
            ";
        $query	=	$mysqli->query($sql);
        $row3    =	$query->fetch_array();
        $winTotal += $row3["win_back"];
        return $winTotal;
    }

    static function getOneDayTotalWinByType($user_id,$day,$gType){
        $oneDayStart = $day.' 00:00:00';
        $oneDayEnd = $day.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT IFNULL(SUM(IFNULL(o_sub.win,0)+IFNULL(o_sub.fs,0)),0) AS win_money
                FROM order_lottery o,order_lottery_sub o_sub
                WHERE o.user_id='$user_id' AND o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
                AND o_sub.is_win = '1' AND o.Gtype = '$gType' LIMIT 0,1
            ";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        $winTotal = $row["win_money"];
        $sql	=	"SELECT IFNULL(SUM(IFNULL(o_sub.fs,0)),0) AS win_fs
                FROM order_lottery o,order_lottery_sub o_sub
                WHERE o.user_id='$user_id' AND o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
                AND o_sub.is_win = '0' AND o.Gtype = '$gType' LIMIT 0,1
            ";
        $query	=	$mysqli->query($sql);
        $row2    =	$query->fetch_array();
        $winTotal += $row2["win_fs"];
        $sql	=	"SELECT IFNULL(SUM(IFNULL(o_sub.bet_money,0)),0) AS win_back
                FROM order_lottery o,order_lottery_sub o_sub
                WHERE o.user_id='$user_id' AND o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
                AND (o_sub.is_win = '2' OR o_sub.status = '3') AND o.Gtype = '$gType' LIMIT 0,1
            ";
        $query	=	$mysqli->query($sql);
        $row3    =	$query->fetch_array();
        $winTotal += $row3["win_back"];
        return $winTotal;
    }

    static function getBetMoneyAndCount($dayStart,$dayEnd,$gType,$user_group="",$statusString=""){
        $oneDayStart = $dayStart.' 00:00:00';
        $oneDayEnd = $dayEnd.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT COUNT(o_sub.id) AS bet_count, IFNULL(SUM(IFNULL(o_sub.bet_money,0)),0) AS bet_money
                FROM order_lottery o,order_lottery_sub o_sub
                WHERE o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."' AND o.Gtype = '$gType'
            ";
        if($user_group != ""){
            $sql .= " AND o.user_id IN $user_group";
        }
        if($statusString != ""){
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
        global $mysqli;
        $sql	=	"SELECT IFNULL(SUM(IFNULL(o_sub.win,0)+IFNULL(o_sub.fs,0)),0) AS win_money
                FROM order_lottery o,order_lottery_sub o_sub
                WHERE o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
                AND o_sub.is_win = '1' AND o.Gtype = '$gType'
            ";
        if($user_group != ""){
            $sql .= " AND o.user_id IN $user_group";
        }
        if($statusString != ""){
            $sql .= $statusString;
        }
        $sql .= " LIMIT 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        $winTotal = $row["win_money"];
        $sql	=	"SELECT IFNULL(SUM(IFNULL(o_sub.fs,0)),0) AS win_fs
                FROM order_lottery o,order_lottery_sub o_sub
                WHERE o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
                AND o_sub.is_win = '0' AND o.Gtype = '$gType'
            ";
        if($user_group != ""){
            $sql .= " AND o.user_id IN $user_group";
        }
        if($statusString != ""){
            $sql .= $statusString;
        }
        $sql .= " LIMIT 0,1";
        $query	=	$mysqli->query($sql);
        $row2    =	$query->fetch_array();
        $winTotal += $row2["win_fs"];
        $sql	=	"SELECT IFNULL(SUM(IFNULL(o_sub.bet_money,0)),0) AS win_back
                FROM order_lottery o,order_lottery_sub o_sub
                WHERE o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
                AND (o_sub.is_win = '2' OR o_sub.status = '3') AND o.Gtype = '$gType'
            ";
        if($user_group != ""){
            $sql .= " AND o.user_id IN $user_group";
        }
        if($statusString != ""){
            $sql .= $statusString;
        }
        $sql .= " LIMIT 0,1";
        $query	=	$mysqli->query($sql);
        $row3    =	$query->fetch_array();
        $winTotal += $row3["win_back"];
        return $winTotal;
    }


    static function getAllBetMoneyAndCount($dayStart,$dayEnd,$user_group="",$statusString=""){
        $oneDayStart = $dayStart.' 00:00:00';
        $oneDayEnd = $dayEnd.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT COUNT(o_sub.id) AS bet_count, IFNULL(SUM(IFNULL(o_sub.bet_money,0)),0) AS bet_money
                FROM order_lottery o,order_lottery_sub o_sub
                WHERE o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
            ";
        if($user_group != ""){
            $sql .= " AND o.user_id IN $user_group";
        }
        if($statusString != ""){
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
        $sql	=	"SELECT IFNULL(SUM(IFNULL(o_sub.win,0)+IFNULL(o_sub.fs,0)),0) AS win_money
                FROM order_lottery o,order_lottery_sub o_sub
                WHERE o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
                AND o_sub.is_win = '1'
            ";
        if($user_group != ""){
            $sql .= " AND o.user_id IN $user_group";
        }
        if($statusString != ""){
            $sql .= $statusString;
        }
        $sql .= " LIMIT 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        $winTotal = $row["win_money"];
        $sql	=	"SELECT IFNULL(SUM(IFNULL(o_sub.fs,0)),0) AS win_fs
                FROM order_lottery o,order_lottery_sub o_sub
                WHERE o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
                AND o_sub.is_win = '0'
            ";
        if($user_group != ""){
            $sql .= " AND o.user_id IN $user_group";
        }
        if($statusString != ""){
            $sql .= $statusString;
        }
        $sql .= " LIMIT 0,1";
        $query	=	$mysqli->query($sql);
        $row2    =	$query->fetch_array();
        $winTotal += $row2["win_fs"];
        $sql	=	"SELECT IFNULL(SUM(IFNULL(o_sub.bet_money,0)),0) AS win_back
                FROM order_lottery o,order_lottery_sub o_sub
                WHERE o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
                AND (o_sub.is_win = '2' OR o_sub.status = '3')
            ";
        if($user_group != ""){
            $sql .= " AND o.user_id IN $user_group";
        }
        if($statusString != ""){
            $sql .= $statusString;
        }
        $sql .= " LIMIT 0,1";
        $query	=	$mysqli->query($sql);
        $row3    =	$query->fetch_array();
        $winTotal += $row3["win_back"];
        return $winTotal;
    }
}