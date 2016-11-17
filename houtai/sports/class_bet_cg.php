<?php
class bet_cg{
	static function js($gid){
		
		global $mysqli;
		$sql		=	"select count(*) as nums from k_bet_cg where gid=$gid";
		$query		=	$mysqli->query($sql);
		$rows 		=	$query->fetch_array();
		$cg_count	=	$rows["nums"];
		$sql		=	"select g.bet_win,g.id,g.order_num,g.user_id,g.bet_reb,g.bet_money from k_bet_cg_group g where $cg_count=(select count(b.gid) from k_bet_cg b where `status` in(1,2,3,4,5,8) and b.gid=g.id) and $cg_count>(select count(b.gid) from k_bet_cg b where `status` in(3,8) and b.gid=g.id) and g.id=$gid";
		$query		=	$mysqli->query($sql);
		$rows 		=	$query->fetch_array();
		$order_num	=	$rows['order_num'];
		$user_id	=	$rows['user_id'];
		$bet_win	=	$rows['bet_win'];
		$bet_money=	$rows['bet_money'];
		$bet_reb=	$rows['bet_reb'];
		$b =false;

		$sql		= 	"select money from user_list where user_id='$user_id' limit 1";
		$query 		=	$mysqli->query($sql);
		$rs			=	$query->fetch_array();
		if($rs['money']){
			$assets	=	$rs['money'];
		}


		if($query->num_rows > 0){    ///判断串关中的子项是否都已结算,且所有的子项不全是平手或无效
			$sql = "select count(g.id) as c from k_bet_cg_group g where $cg_count=(select count(b.gid) from k_bet_cg b where b.gid=g.id and b.status in(1,2,3,4,5,8)) and (select count(b.gid) from k_bet_cg b where b.gid=g.id and b.status=2)>0 and g.id='$gid'";
			$query		=	$mysqli->query($sql);
			$rows 		=	$query->fetch_array();
			$c	=	$rows["c"];
			
			if($c>0)
			{//输
				$sql_g	=	"update user_list,k_bet_cg_group set k_bet_cg_group.check=1,user_list.money=user_list.money+(k_bet_cg_group.bet_money*k_bet_cg_group.bet_reb/100),k_bet_cg_group.status=2,k_bet_cg_group.win=0,k_bet_cg_group.fs=(k_bet_cg_group.bet_money*k_bet_cg_group.bet_reb/100),k_bet_cg_group.update_time=now() where user_list.user_id=k_bet_cg_group.user_id and k_bet_cg_group.id=$gid";
				$mysqli->query($sql_g);
				$val	=	$bet_money*$bet_reb/100;
				$b =true;
			}else{//赢

				$sql_g	=	"update user_list,k_bet_cg_group set k_bet_cg_group.check=1,user_list.money=user_list.money+k_bet_cg_group.win+(k_bet_cg_group.bet_money*k_bet_cg_group.bet_reb/100),k_bet_cg_group.status=1,k_bet_cg_group.update_time=now(),k_bet_cg_group.fs=(k_bet_cg_group.bet_money*k_bet_cg_group.bet_reb/100) where user_list.user_id=k_bet_cg_group.user_id and k_bet_cg_group.id=$gid and k_bet_cg_group.status=0";
				$mysqli->query($sql_g);
				$sqlw		= 	"select win from k_bet_cg_group where id='$gid' limit 1";
				$queryw 		=	$mysqli->query($sqlw);
				$rsw			=	$queryw->fetch_array();
				$val	=	$rsw['win']+$bet_money*$bet_reb/100;
				$b =true;
			}
		}else{
			$sql	=	"select g.bet_money from k_bet_cg_group g where $cg_count=(select count(b.gid) from k_bet_cg b where b.status in(3,8) and b.gid=g.id) and g.id=$gid";
			$query	=	$mysqli->query($sql);
			
			if($query->num_rows > 0){    /////如果所有子项都是平手或无效,则把串关状态设为3,并把串关的已赢金额设为下注金额.
				$sql_g=	"update user_list,k_bet_cg_group set user_list.money=user_list.money+k_bet_cg_group.bet_money,k_bet_cg_group.status=3,k_bet_cg_group.win=k_bet_cg_group.bet_money,k_bet_cg_group.update_time=now(),k_bet_cg_group.check=1 where user_list.user_id=k_bet_cg_group.user_id and k_bet_cg_group.id=$gid and k_bet_cg_group.status=0";
				$mysqli->query($sql_g);
				$val=$bet_money;
				$b =true;

			}
		}
		if($b)
		{
			

			
		

			$sql = "select balance from money_log where user_id='".$user_id."' order by id desc limit 0,1";
			$query	=	$mysqli->query($sql);
			$rows	 =	$query->fetch_array();
            $balance_2 = $rows["balance"];
			$allmoney=round($assets + $val,2);


			$sql		= 	"select money from user_list where user_id='$user_id' limit 1";
			$query 		=	$mysqli->query($sql);
			$rs			=	$query->fetch_array();
			if($rs['money']){
				$balance	=	$rs['money'];
			}
			if (abs(floatval($assets) - floatval($balance_2))>0.2 || abs(floatval($allmoney) - floatval($balance))>0.2)
			{
				$sql = "update user_list set online=0,Oid='',status='异常',remark='串关(".$order_num.")结算后资金异常' where user_id='".$user_id."'";
				$mysqli->query($sql);
			}

			$sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$user_id','$order_num','体育串关',now(),'手动结算','$val','$assets','$balance');";
			$mysqli->query($sql);

			return true;
		}else{
			return false;
		}
		
	}
}
?>