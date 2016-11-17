<?php
class bet{
    static function set($bid,$status,$mb_inball=NULL,$tg_inball=NULL){ //审核当前投注项1，2， 4，5 赢，输，赢一半，输一半
	
		if(!$bid)
		{
			$msg = "游戏手工结算-失败[ID不能为空]";
			return $msg;
		}
		$sql	=	"";
		$msg	=	"";
		$bid=intval($bid);
		global $mysqli;
		$sql = "select user_list.money from k_bet left join user_list on k_bet.user_id=user_list.user_id where k_bet.id=".$bid." and k_bet.status=0 limit 0,1";
		$query	=	$mysqli->query($sql);
		if(!$query)
		{
			$msg = "游戏手工结算-失败1";
			return $msg;
		}
		$rows	 =	$query->fetch_array();
        $assets = $rows["money"];
		if(!isset($assets))
		{
			$msg = "游戏手工结算-该订单已经结算过";
			return $msg;
		}

    	switch ($status){
    		case "1": //赢
                $sql = "update user_list,k_bet set k_bet.check=1,user_list.money=user_list.money+k_bet.bet_win+(k_bet.bet_money*k_bet.bet_reb/100),k_bet.win=k_bet.bet_win,k_bet.fs=(k_bet.bet_money*k_bet.bet_reb/100),k_bet.status=1 ,k_bet.update_time=now(),k_bet.MB_Inball='".$mb_inball."',k_bet.TG_Inball='".$tg_inball."',k_bet.sys_about='手动结算-赢' where user_list.user_id=k_bet.user_id and k_bet.id=".$bid." and k_bet.status=0";
				$msg = "游戏手工结算-赢";
				break; 
   			case "2": //输
				$sql = "update user_list,k_bet set k_bet.check=1,user_list.money=user_list.money+(k_bet.bet_money*k_bet.bet_reb/100),k_bet.win=0,k_bet.fs=(k_bet.bet_money*k_bet.bet_reb/100),k_bet.status=2,update_time=now(),k_bet.MB_Inball='".$mb_inball."',k_bet.TG_Inball='".$tg_inball."',k_bet.sys_about='手动结算-输' where user_list.user_id=k_bet.user_id and k_bet.id=".$bid." and k_bet.status=0";
                $msg = "游戏手工结算-输";
   				break;
   		    case "3": //无效或取消
   				$sql = "update user_list,k_bet set k_bet.check=1,user_list.money=user_list.money+k_bet.bet_money,k_bet.win=k_bet.bet_money,k_bet.fs=0,k_bet.bet_yx=0,k_bet.status=3,k_bet.update_time=now(),k_bet.sys_about='手动结算-无效',k_bet.MB_Inball='".$mb_inball."',k_bet.TG_Inball='".$tg_inball."' where user_list.user_id=k_bet.user_id and k_bet.id=".$bid." and k_bet.status=0";
                $msg = "游戏手工结算-注单无效";
   				break;
		    case "4": //赢一半
   				$sql = "update user_list,k_bet set k_bet.check=1,user_list.money=user_list.money+k_bet.bet_money+((k_bet.bet_money/2)*k_bet.bet_point)+(k_bet.bet_money/2*k_bet.bet_reb/100),k_bet.fs=(k_bet.bet_money/2*k_bet.bet_reb/100),k_bet.win=k_bet.bet_money+((k_bet.bet_money/2)*k_bet.bet_point),k_bet.bet_yx=k_bet.bet_yx/2,k_bet.status=4 ,k_bet.update_time=now(),k_bet.sys_about='手动结算-赢一半',k_bet.MB_Inball='".$mb_inball."',k_bet.TG_Inball='".$tg_inball."' where user_list.user_id=k_bet.user_id and k_bet.id=".$bid." and k_bet.status=0";
                $msg = "游戏手工结算-赢一半";
   				break;
			case "5": //输一半
   				$sql = "update user_list,k_bet set k_bet.check=1,user_list.money=user_list.money+(k_bet.bet_money/2)+(k_bet.bet_money/2*k_bet.bet_reb/100),k_bet.fs=(k_bet.bet_money/2*k_bet.bet_reb/100),k_bet.win=k_bet.bet_money/2,k_bet.bet_yx=k_bet.bet_yx/2,k_bet.status=5,k_bet.update_time=now(),k_bet.sys_about='手动结算-输一半',k_bet.MB_Inball='".$mb_inball."',k_bet.TG_Inball='".$tg_inball."' where user_list.user_id=k_bet.user_id and k_bet.id=".$bid." and k_bet.status=0";
                $msg = "游戏手工结算-输一半";
   				break;
   		    case "8": //和局
   				$sql = "update user_list,k_bet set k_bet.check=1,user_list.money=user_list.money+k_bet.bet_money,k_bet.fs=0,k_bet.win=k_bet.bet_money,k_bet.bet_yx=0,k_bet.status=8,k_bet.update_time=now(),k_bet.sys_about='手动结算-和',k_bet.MB_Inball='".$mb_inball."',k_bet.TG_Inball='".$tg_inball."' where user_list.user_id=k_bet.user_id and k_bet.id=".$bid." and k_bet.status=0";
                $msg = "游戏手工结算-和局";
   				break;
   			
			default:break;
    	}

		if($sql!="")
		{
			$query=$mysqli->query($sql);
			if(!$query){
				$msg = "游戏手工结算-失败1";
				return $msg;
			}

			$sql = "select k_bet.order_num,k_bet.win,k_bet.fs,user_list.money,user_list.user_id from k_bet left join user_list on k_bet.user_id=user_list.user_id where k_bet.id=".$bid." and k_bet.status!=0 limit 0,1";
			$query	=	$mysqli->query($sql);
			if(!$query)
			{
				$msg = "游戏手工结算-失败2";
				return $msg;
			}
			$rows	 =	$query->fetch_array();
			$win = round($rows["win"],2);
            $fs = round($rows["fs"],2);
            $order_num = $rows["order_num"];
            $user_id = $rows["user_id"];
            $balance = $rows["money"];


            $sql = "select balance from money_log where user_id='".$user_id."' order by id desc limit 0,1";
			$query	=	$mysqli->query($sql);
			$rows	 =	$query->fetch_array();
            $balance_2 = $rows["balance"];
			$allmoney=round($assets + $win + $fs,2);
			$val=$win + $fs;
			if (abs(floatval($assets) - floatval($balance_2))>0.2 || abs(floatval($allmoney) - floatval($balance))>0.2)
			{
				$sql = "update user_list set online=0,Oid='',status='异常',remark='体育(".$order_num.")手工结算后资金异常' where user_id='".$user_id."'";
				$mysqli->query($sql);
			}
			$sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('".$user_id."','".$order_num."','体育单式',now(),'".$msg."','".$val."','".$assets."','".$balance."');";
	
			$mysqli->query($sql);
			return $msg;
		}
		$msg = "游戏手工结算-失败3";
		return $msg;
    }
	
	static function set_cg($bid,$status,$mb_inball=NULL,$tg_inball=NULL){ //设置串关
    	
		$bid=intval($bid);
		global $mysqli;
		$sql		=	"select gid,ben_add,bet_point from k_bet_cg where id=".$bid;
		$query		=	$mysqli->query($sql);
		$rows 		=	$query->fetch_array();
		$ben_add	=	$rows["ben_add"];
		$bet_point	=	$rows["bet_point"]; //获得赔率计算
		$gid		=	$rows["gid"];
		$q1			=	$q2	=	true;

			switch($status){
			
				case 1: //注单设为赢
					$sql			=	"update k_bet_cg set `check`=1,status=1,mb_inball=".$mb_inball.",tg_inball=".$tg_inball.",update_time=now(),sys_about='串关手动结算-赢' where id=$bid and status=0";

					$mysqli->query($sql);
					$show_msg	=	"串关手动结算-赢";
					$sql			=	"select win,bet_money from k_bet_cg_group where id=$gid and `status`=0";
					$query			=	$mysqli->query($sql);
					$rows 			=	$query->fetch_array();
					$win			=	$rows["win"];
					$bet_money		=	$rows["bet_money"];
					$point			=	$ben_add+$bet_point;
					if($win!="")
					{

						if($win			==	0){ //如果该组第一次结算
							$win		=	$bet_money*$point;	
						}else{ //第二次结算
							$win		=	$win*$point;
						}
				  
						$sql			=	"update k_bet_cg_group set win=$win where id=$gid"; //金额设置
						$mysqli->query($sql);
						$q2				=	$mysqli->affected_rows;
						if($q2 != 1){
							$show_msg  .=	"-加钱错误";
						}
					}
					break;
					
				case 2://输
			  
					$sql			=	"update k_bet_cg set `check`=1,status=2,mb_inball=".$mb_inball.",tg_inball=".$tg_inball.",update_time=now(),sys_about='串关手动结算-输' where id=$bid and status=0";
					$mysqli->query($sql);
					$show_msg	=	"串关手动结算-输";
					$sql			=	"update k_bet_cg_group set win=0,status=2 where id=$gid";
					$mysqli->query($sql);
					$q2				=	$mysqli->affected_rows;
					break;
					
				case 3: //无效
			  
					$sql			=	"update k_bet_cg set `check`=1,status=3,mb_inball=".$mb_inball.",tg_inball=".$tg_inball.",update_time=now(),sys_about='串关手动结算-取消' where id=$bid and status=0";
					$mysqli->query($sql);
					$show_msg	=	"串关手动结算-取消";
					$sql = "update k_bet_cg_group set cg_count=(select count(*) from k_bet_cg where gid=k_bet_cg_group.id and `status` <>3) where id=$gid";
					//$sql			=	"update k_bet_cg_group set cg_count=cg_count-1 where id=$gid";
					$mysqli->query($sql);
					$q2				=	$mysqli->affected_rows;
					if($q2 != 1){
						$show_msg	.=	"-减一出错";
					}
					break;
			  
				case 4://赢一半
			  
					$sql			=	"update k_bet_cg set `check`=1,status=4,mb_inball=".$mb_inball.",tg_inball=".$tg_inball.",update_time=now(),sys_about='串关手动结算-赢一半' where id=$bid and status=0";
					$mysqli->query($sql);
					$show_msg	=	"串关手动结算-赢一半";
					$sql			=	"select win,bet_money from k_bet_cg_group where id=$gid and `status`=0";
					$query			=	$mysqli->query($sql);
					$rows 			=	$query->fetch_array();
					$win			=	$rows["win"];
					$bet_money		=	$rows["bet_money"];
					$point			=	1+$bet_point/2;
					if($win			==	0){ //如果该组第一次结算
						$win		=	$bet_money*$point;	
					}else{ //第二次结算
						$win		=	$win*$point;
					}
			  
					$sql			=	"update k_bet_cg_group set win=$win where id=$gid and `status`=0";
					$mysqli->query($sql);
					$q2				=	$mysqli->affected_rows;
					if($q2 != 1){
						$show_msg  .=	"-加钱错误2";
					}
					break;
			  
				case 5://输一半
			  
					$sql			=	"update k_bet_cg set `check`=1,status=5,mb_inball=".$mb_inball.",tg_inball=".$tg_inball.",update_time=now(),sys_about='串关手动结算-输一半' where id=$bid and status=0";
					$mysqli->query($sql);
					$show_msg	=	"串关手动结算-输一半";
					$sql			=	"select win,bet_money from k_bet_cg_group where id=$gid and `status`=0";
					$query			=	$mysqli->query($sql);
					$rows 			=	$query->fetch_array();
					$win			=	$rows["win"];
					$bet_money		=	$rows["bet_money"];
					$point			=	0.5;
					if($win			==	0){ //如果该组第一次结算
						$win		=	$bet_money*$point;	
					}else{ //第二次结算
						$win		=	$win*$point;
					}
			  
					$sql			=	"update k_bet_cg_group set win=$win where id=$gid and `status`=0";
					$mysqli->query($sql);
					$q2				=	$mysqli->affected_rows;
					if($q2 != 1){
						$show_msg  .=	"-加钱错误3";
					}
					break; 
			  
				case 8: //平手
			  
					$sql			=	"update k_bet_cg set `check`=1,status=8,mb_inball=".$mb_inball.",tg_inball=".$tg_inball.",update_time=now(),sys_about='串关手动结算-和' where id=$bid and status=0";
					$mysqli->query($sql);
					$show_msg	=	"串关手动结算-和";
					break; 
				
					
				default:break;
			}
		 	
			return  $show_msg;
	}
	
	static function qx_bet($bid,$status){ //单式重新结算
    	
		global $mysqli;
		$money		=	0;
		if($status==1 || $status==2 || $status==4 || $status==5 || $status==8){ //有退水
			$sql	=	"select fs,user_id,win,order_num from k_bet where id='$bid' limit 0,1";
			$query	=	$mysqli->query($sql);
			$row 	=	$query->fetch_array();
			$money	=	$row['fs'];
			$user_id=	$row['user_id'];
			$win	=	$row['win'];
			$order_num	=	$row['order_num'];	
			$val=$win+$money;

			$sql		= 	"select money from user_list where user_id='$user_id' limit 1";
			$query 		=	$mysqli->query($sql);
			$rs			=	$query->fetch_array();
			if($rs['money']){
				$assets	=	$rs['money'];
			}

			$sql		=	"update k_bet,user_list set user_list.money=user_list.money-k_bet.win-$money where user_list.user_id=k_bet.user_id and k_bet.id=$bid and k_bet.status>0";
			$mysqli->query($sql);

			$sql = "select balance from money_log where user_id='".$user_id."' order by id desc limit 0,1";
			$query	=	$mysqli->query($sql);
			$rows	 =	$query->fetch_array();
            $balance_2 = $rows["balance"];
			$allmoney=round($assets - $val,2);


			$sql		= 	"select money from user_list where user_id='$user_id' limit 1";
			$query 		=	$mysqli->query($sql);
			$rs			=	$query->fetch_array();
			if($rs['money']){
				$balance	=	$rs['money'];
			}

			if (floatval($assets) != floatval($balance_2) || floatval($allmoney) != floatval($balance))
			{
				$sql = "update user_list set online=0,Oid='',status='异常',remark='体育(".$order_num.")重新结算后资金异常' where user_id='".$user_id."'";
				$mysqli->query($sql);
			}

			$sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$user_id','$order_num','体育单式',now(),'重新结算,先退款','$val','$assets','$balance');";
			$mysqli->query($sql);

			$sql		=	"update k_bet set status=0,win=0,update_time=null,fs=0 where k_bet.id=$bid and k_bet.status>0";
			$mysqli->query($sql);

		}elseif($status==3){
			$sql	=	"select fs,user_id,win,order_num,bet_money from k_bet where id='$bid' limit 0,1";
			$query	=	$mysqli->query($sql);
			$row 	=	$query->fetch_array();
			$money	=	$row['fs'];
			$user_id=	$row['user_id'];
			$win	=	$row['win'];
			$order_num	=	$row['order_num'];	
			$bet_money=	$row['bet_money'];	
			$val=$bet_money;

			$sql		= 	"select money from user_list where user_id='$user_id' limit 1";
			$query 		=	$mysqli->query($sql);
			$rs			=	$query->fetch_array();
			if($rs['money']){
				$assets	=	$rs['money'];
			}

			$sql		=	"update k_bet,user_list set user_list.money=user_list.money-k_bet.bet_money where user_list.user_id=k_bet.user_id and k_bet.id=$bid and k_bet.status>0";
			$mysqli->query($sql);

			$sql = "select balance from money_log where user_id='".$user_id."' order by id desc limit 0,1";
			$query	=	$mysqli->query($sql);
			$rows	 =	$query->fetch_array();
            $balance_2 = $rows["balance"];
			$allmoney=round($assets - $val,2);


			$sql		= 	"select money from user_list where user_id='$user_id' limit 1";
			$query 		=	$mysqli->query($sql);
			$rs			=	$query->fetch_array();
			if($rs['money']){
				$balance	=	$rs['money'];
			}

			if (floatval($assets) != floatval($balance_2) || floatval($allmoney) != floatval($balance))
			{
				$sql = "update user_list set online=0,Oid='',status='异常',remark='体育(".$order_num.")重新结算后资金异常' where user_id='".$user_id."'";
				$mysqli->query($sql);
			}

			$sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$user_id','$order_num','体育单式',now(),'无效注单重新结算,先扣款','$val','$assets','$balance');";
			$mysqli->query($sql);

			$sql		=	"update k_bet set status=0,win=0,update_time=null,fs=0 where k_bet.id=$bid and k_bet.status>0";
			$mysqli->query($sql);
		}
			return true;
	}
	
	static function qx_cgbet($bid){ //串关重新结算
		
		global $mysqli;
		$sql		=	"select cg.user_id,cg.status,cgg.id,cgg.status as status_cgg,cg.bet_point,cg.match_id,cg.ben_add,cgg.win,cgg.user_id,cgg.bet_money,cgg.fs,cgg.order_num from k_bet_cg cg,k_bet_cg_group cgg where cg.status>0 and cg.gid=cgg.id and cg.id=$bid";
		$query		=	$mysqli->query($sql);
		$t 			=	$query->fetch_array();
		
		$status_cgg	=	$t["status_cgg"];
		$status		=	$t["status"];
		$gid		=	$t["id"];
		$win		=	$t["win"];
		$ben_add	=	$t["ben_add"];
		$bet_point	=	$t["bet_point"];
		$mid		=	$t["match_id"];
		$fs		=	$t['fs'];
		$user_id	=	$t['user_id'];
		$win		=	$t['win'];
		$order_num	=	$t['order_num'];
		$val=$win+$fs;
		$b1	=	$b3	=	$b4	=	$b6	=	false;
			
			$sql		= 	"select money from user_list where user_id='$user_id' limit 1";
			$query 		=	$mysqli->query($sql);
			$rs			=	$query->fetch_array();
			if($rs['money']){
				$assets	=	round($rs['money'],2);

			}


			if($status_cgg == 1 || $status_cgg == 2){ //已结算，扣相应的钱，并设为未结算
				$b1		=	true;
				$sql	=	"select count(gid) as s from k_bet_cg where gid=$gid and status=2 and id!=$bid";
				$query	=	$mysqli->query($sql);
				$t 		=	$query->fetch_array();
				
				if($t["s"] > 0){  ///判断子项中是否有输的
					$sql=	"update user_list,k_bet_cg_group set user_list.money=user_list.money-k_bet_cg_group.win-k_bet_cg_group.fs,k_bet_cg_group.status=2 where user_list.user_id=k_bet_cg_group.user_id and k_bet_cg_group.id=$gid";
				}else{
					$sql=	"update user_list,k_bet_cg_group set user_list.money=user_list.money-k_bet_cg_group.win-k_bet_cg_group.fs,k_bet_cg_group.status=0 where user_list.user_id=k_bet_cg_group.user_id and k_bet_cg_group.id=$gid";
				}
				$mysqli->query($sql);
				$q1		=	$mysqli->affected_rows;
				
			}elseif($status_cgg	== 3){     ////如果状态等于3,说明该串关全是平手或无效,则把状态设为0,且扣去相应的钱..
				$b1		=	true;
				$sql	=	"update user_list,k_bet_cg_group set user_list.money=user_list.money-k_bet_cg_group.win,k_bet_cg_group.status=0,k_bet_cg_group.win=0 where user_list.user_id=k_bet_cg_group.user_id and k_bet_cg_group.id=$gid";
				$win	=	0;
				$mysqli->query($sql);
				$q1		=	$mysqli->affected_rows;
			}

			if($status_cgg	>0)
			{
				$sql = "select balance from money_log where user_id='".$user_id."' order by id desc limit 0,1";
				$query	=	$mysqli->query($sql);
				$rows	 =	$query->fetch_array();
				$balance_2 = $rows["balance"];
				$allmoney=round($assets - $val,2);


				$sql		= 	"select money from user_list where user_id='$user_id' limit 1";
				$query 		=	$mysqli->query($sql);
				$rs			=	$query->fetch_array();
				if($rs['money']){
					$balance	=	$rs['money'];
				}

				if (floatval($assets) != floatval($balance_2) || floatval($allmoney) != floatval($balance))
				{
					$sql = "update user_list set online=0,Oid='',status='异常',remark='串关(".$order_num.")重新结算后资金异常' where user_id='".$user_id."'";
					$mysqli->query($sql);
				}

				$sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$user_id','$order_num','体育串关',now(),'重新结算,先退款','$win+$fs','$assets','$balance');";
				$mysqli->query($sql);
			
			
			}
			
			$sql		=	"update k_bet_cg set status=0 where id=$bid";
			$mysqli->query($sql);
			$q3			=	$mysqli->affected_rows;
			
			$sql		=	"update k_bet_cg_group set update_time=null,fs=0,win=0,`check`=0 where id=$gid"; //更新时间设为空
			$mysqli->query($sql);


				//$sql	=	"update k_bet_cg_group g set g.status=0 where g.cg_count=(select count(b.gid) from k_bet_cg b where b.gid=g.gid and b.status!=2) and g.id=$gid";
				//$mysqli->query($sql);
				//重新结算子单
				$sql 	=	"select status,gid,ben_add,bet_point from k_bet_cg where gid=$gid and status not in(0,3,6,7,8) and  id!=$bid";
				$query	=	$mysqli->query($sql);
				
				while($infos	=	$query->fetch_array()){
					$benadd		=	$infos["ben_add"];
					$betpoint	=	$infos["bet_point"]; //获得赔率计算
					$gid		=	$infos["gid"];
					
					$sql		=	"select win,bet_money from k_bet_cg_group where id=$gid and status=0";

					$query1		=	$mysqli->query($sql);
					$tx			=	$query1->fetch_array();
					
					$txwin		=	$tx["win"];
					$betmoney	=	$tx["bet_money"];
					$points		=	$benadd+$betpoint;
					
					if($infos["status"] == 1){
						if($txwin==0){ 				//如果该组第一次结算
							$txwin=$betmoney*$points;
						}else{						//第二次结算
							$txwin=$txwin*$points;
						}
						
						$sql="update k_bet_cg_group set win=$txwin where id=$gid and status=0"; //金额设置
						$mysqli->query($sql);
					}		
						
					if($infos["status"] == 2){
						$sql="update k_bet_cg_group set win=0,status=2 where id=$gid";
						$mysqli->query($sql);
					}			
						
					if($infos["status"] == 4){
						$points=1+$betpoint/2;
						
						if($txwin==0){ 				//如果该组第一次结算
							$txwin=$betmoney*$points;
						}else{						//第二次结算
							$txwin=$txwin*$points;
						}
						
						$sql="update k_bet_cg_group set win=$txwin where id=$gid and status=0";
						$mysqli->query($sql);
					}			
						
					if($infos["status"] == 5){
						$points=0.5;
						
						if($txwin==0){ 				//如果该组第一次结算
							$txwin=$betmoney*$points;
						}else{						//第二次结算
							$txwin=$txwin*$points;
						}
						
						$sql="update k_bet_cg_group set win=$txwin where id=$gid and status=0";
						$mysqli->query($sql);
					}
				}

			return true;
	}
}
?>