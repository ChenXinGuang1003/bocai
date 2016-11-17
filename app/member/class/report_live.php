<?php

class report_live
{
	static function getZhenRenCount($dayStart,$dayEnd){
		$oneDayStart = $dayStart.' 00:00:00';
        $oneDayEnd = $dayEnd.' 23:59:59';
		global $mysqli;
		$sql	=	"SELECT count(about) as bishu,sum(order_value) as zonge, about  FROM money_log where type='真人转账' AND update_time>= '".$oneDayStart."' AND update_time <='".$oneDayEnd."' GROUP BY about";
		//echo $sql;
		//$query	=	$mysqli->query($sql);
		//if($query)
        //$row    =	$query->fetch_array();
        return $sql;

	}

    static function getBetMoneyAndCount($dayStart,$dayEnd,$gType,$rType,$user_group=""){
        $oneDayStart = $dayStart.' 00:00:00';
        $oneDayEnd = $dayEnd.' 23:59:59';
        $sql_where = "";
        if($gType == "AG" || $gType=="TYC"|| $gType=="BBIN"){
            $sql_where.=" and live_type='".$gType."'";
        }
        if($gType == "All"){
            if($rType == "转入"){
                $sql_where.=" and (zz_type='d' or zz_type='vd' or zz_type='i')";
            }elseif($rType == "转出"){
                $sql_where.=" and (zz_type='w' or zz_type='vw' or zz_type='o')";
            }
        }elseif($gType == "AG"){
            if($rType == "转入"){
                $sql_where.=" and (zz_type='d' or zz_type='vd')";
            }elseif($rType == "转出"){
                $sql_where.=" and (zz_type='w' or zz_type='vw')";
            }
        }elseif($gType == "BBIN"){
            if($rType == "转入"){
                $sql_where.=" and (zz_type='d') ";
            }elseif($rType == "转出"){
                $sql_where.=" and (zz_type='w') ";
            }
        }elseif($gType == "TYC"){
            if($rType == "转入"){
                $sql_where.=" and zz_type='i' ";
            }elseif($rType == "转出"){
                $sql_where.=" and zz_type='o' ";
            }
        }
        global $mysqli;
        $sql	=	"SELECT COUNT(id) AS bet_count, IFNULL(SUM(IFNULL(zz_money,0)),0) AS bet_money
                FROM live_log
                WHERE result like '%[成功]%' AND add_time>= '".$oneDayStart."' AND add_time<='".$oneDayEnd."' $sql_where
            ";
        if($user_group != ""){
            $sql .= " AND user_id IN $user_group";
        }
        $sql .= " LIMIT 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row;
    }

    static function getTotalWin($dayStart,$dayEnd,$gType,$user_group=""){
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
        $sql	=	"SELECT IFNULL(SUM(IFNULL(win,0)),0) AS win_money
                FROM k_bet
                WHERE bet_time>= '".$oneDayStart."' AND bet_time<='".$oneDayEnd."' $sql_where
            ";
        if($user_group != ""){
            $sql .= " AND user_id IN $user_group";
        }
        $sql .= " LIMIT 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row["win_money"];
    }

    static function getBetMoneyAndCountCg($dayStart,$dayEnd,$user_group=""){
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
        $sql .= " LIMIT 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row;
    }

    static function getTotalWinCg($dayStart,$dayEnd,$user_group=""){
        $oneDayStart = $dayStart.' 00:00:00';
        $oneDayEnd = $dayEnd.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT SUM(IFNULL(win,0)) AS win_money
                FROM k_bet_cg_group
                WHERE bet_time>= '".$oneDayStart."' AND bet_time<='".$oneDayEnd."'
            ";
        if($user_group != ""){
            $sql .= " AND user_id IN $user_group";
        }
        $sql .= " LIMIT 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row["win_money"];
    }

    static function getLiveBetMoneyAndCount($dayStart,$dayEnd,$user_group="",$statusString=""){
        $oneDayStart = $dayStart.' 00:00:00';
        $oneDayEnd = $dayEnd.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT count(lo.id) bet_count,SUM(IF(lo.bet_money>0,lo.bet_money,0)) bet_money_total,SUM(IF(lo.live_win is not null,lo.live_win,0)) win_total
                    FROM live_user l,live_order lo
                    WHERE l.live_username=lo.live_username
                    AND lo.order_time>= '".$oneDayStart."' AND lo.order_time<='".$oneDayEnd."'
                    ";
        if($user_group != ""){
            $sql .= " AND l.user_id IN $user_group";
        }
        if($statusString != ""){
            $sql .= $statusString;
        }
        $sql .= " LIMIT 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row;
    }
}