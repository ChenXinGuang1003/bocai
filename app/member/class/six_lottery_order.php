<?php

class six_lottery_order
{
    static function add_order($userid,$rtype_name,$rType,$lottery_number,
                              $bet_money_total,$balance,$bet_win_total,$assets,
                              $goldArray,$oddsArray,$betInfoArray,
                              $gid,$bet_money_one,$betInfo_one,$bet_rate_one
                              ){

        $C_Patch=$_SERVER['DOCUMENT_ROOT'];
        function str_leng($str){ //取字符串长度
            mb_internal_encoding("UTF-8");
            return mb_strlen($str)*12;
        }
        global $mysqli;
		//error2 ($rtype_name.'-'.$rType.'-'.$gid);
        if($gid=="SPbside"){
            $rType = "SP";
            $bet_info_sp = "SPbside";
        }else{
            $bet_info_sp = "bet_info";
        }
        if(!$rtype_name || !$rType){
            error2("投注玩法为空，请重新投注。");
            return false;
        }

        $sql		= 	"select id from six_lottery_order 
			where user_id='$userid' and rtype_str='$rtype_name' and rtype='$rType' and bet_info='$bet_info_sp' and bet_money_total='$bet_money_total' and bet_time='".date("Y-m-d H:i:s",time())."' and lottery_number='$lottery_number'";
        $query 		=	$mysqli->query($sql);
        $rs			=	$query->fetch_array();
        if($rs["id"]>0){
			error2("插入主单失败2。");
            return false;
		}


        $sql	=	"insert into six_lottery_order(user_id,rtype_str,rtype,bet_info,bet_money_total,win_total,lottery_number,bet_time)
                    values ('$userid','$rtype_name','$rType','$bet_info_sp','$bet_money_total','$bet_win_total','$lottery_number',now())"; //新增一个投注项
					
        $mysqli->query($sql);
        $q1		=	$mysqli->affected_rows;
        if($q1!=1){
            error2("插入主单失败。");
            return false;
        }
        $id 	=	$mysqli->insert_id;
        $datereg=	date("YmdHis").$id;

        $sql		= 	"select money from user_list where user_id='$userid' limit 0,1";
        $query 		=	$mysqli->query($sql);
        $rs			=	$query->fetch_array();
        $assets = $rs["money"];
        $balance = $assets-$bet_money_total;

        $sql	=	"update user_list set money=$balance where money>=$bet_money_total and $balance>=0 and user_id='$userid'";//扣钱
        $mysqli->query($sql);
        $q3		=	$mysqli->affected_rows;
        if($q3!=1){
            $sql	=	"delete from six_lottery_order where id=$id";//操作失败，删除订单
            $mysqli->query($sql);
			if($_GET['style']){
				echo "<script>window.history.go(-1);</script>";
			}else{
				error2("更新用户金额失败。");
			}
            return false;
        }
        $sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$userid','$datereg','六合彩',now(),'彩票下注','$bet_money_total','$assets','$balance');";
        $mysqli->query($sql);
        $q8		=	$mysqli->affected_rows;
        $money_log_id 	=	$mysqli->insert_id;
        if($q8!=1){
            $sql	=	"update user_list set money=money+$bet_money_total where user_id='$userid'";//操作失败，还原客户资金
            $mysqli->query($sql);
            error2("金钱LOG插入失败。");
            return false;
        }

        $sql	=	"update `six_lottery_order` set `order_num`='$datereg' where id='$id'"; //更新订单号
        $mysqli->query($sql);
        $q2		=	$mysqli->affected_rows;
        if($q2!=1){
            $sql	=	"delete from six_lottery_order where id=$id";//操作失败，删除订单
            $mysqli->query($sql);
            $sql = "DROP TRIGGER BeforeDeleteUserList;";
            $mysqli->query($sql);
            $sql	=	"delete from money_log where id=$money_log_id";//操作失败，删除金钱记录
            $mysqli->query($sql);
            $sql = "
                    CREATE TRIGGER `BeforeDeleteMoneyLog` BEFORE delete ON `money_log`
                      FOR EACH ROW BEGIN
                        insert into money_log(id) values (old.id);
                      END;
                    ";
            $mysqli->query($sql);
            $sql	=	"update user_list set money=money+$bet_money_total where user_id='$userid'";//操作失败，还原客户资金
            $mysqli->query($sql);
            error2("更新订单号失败。");
            return false;
        }else{//成功后插入子表
            //获取反水
            $sql   =	"select g.* from user_group g,user_list u
                                where u.user_id='$userid' and g.group_id=u.group_id limit 0,1";
            $query = $mysqli->query($sql);
            $fsRow   =	$query->fetch_array();

            if($gid=="NAP"){
                $bet_rate = $bet_rate_one;
                $bet_info = $betInfo_one;
                if($bet_money_one >= $fsRow['lhc_bet']){
                    $fs_money = 0;//$bet_money_one*$fsRow['lhc_bet_reb'];
                }

                $sql	=	"insert into six_lottery_order_sub (order_num,number,bet_rate,bet_money,win,fs,balance)
                                 value ('$datereg','$bet_info','$bet_rate','$bet_money_one',0,'$fs_money','$balance')";
                $mysqli->query($sql);
                $q4		=	$mysqli->affected_rows;
                $id_sub 	=	$mysqli->insert_id;
                $datereg_sub=	date("YmdHis").$id_sub;

                $sql	=	"update `six_lottery_order_sub` set `order_sub_num`='$datereg_sub' where id='$id_sub'"; //更新订单号
                $mysqli->query($sql);
                $q2		=	$mysqli->affected_rows;

                if($q4!=1 || $q2!=1){
                    $sql	=	"delete from six_lottery_order_sub where order_num='$datereg'";//操作失败，删除子订单
                    $mysqli->query($sql);
                    $sql	=	"delete from six_lottery_order where id=$id";//操作失败，删除订单
                    $mysqli->query($sql);
                    $sql = "DROP TRIGGER BeforeDeleteUserList;";
                    $mysqli->query($sql);
                    $sql	=	"delete from money_log where id=$money_log_id";//操作失败，删除金钱记录
                    $mysqli->query($sql);
                    $sql = "
                    CREATE TRIGGER `BeforeDeleteMoneyLog` BEFORE delete ON `money_log`
                      FOR EACH ROW BEGIN
                        insert into money_log(id) values (old.id);
                      END;
                    ";
                    $mysqli->query($sql);
                    $sql	=	"update user_list set money=money+$bet_money_total where user_id='$userid'";//操作失败，还原客户资金
                    $mysqli->query($sql);
                    error2("更新子单失败。");
                    return false;
                }

                //生成图片
                $tm=date("Y-m-d H:i:s",time());
                $height	=	26; //高
                $gTypeZhName = "六合彩";
                $betInfoIm = $bet_info;
                $width	=	str_leng($gTypeZhName.'='.$lottery_number.'='.$rtype_name.'='.$betInfoIm.'='.$bet_money_one.'='.$fs_money.'='.$bet_rate.'='.$tm); //宽
                $im		=	imagecreate($width,$height);
                $bkg	=	imagecolorallocate($im,255,255,255); //背景色
                $font	=	imagecolorallocate($im,150,182,151); //边框色
                $sort_c	=	imagecolorallocate($im,0,0,0); //字体色
                $name_c	=	imagecolorallocate($im,243,118,5); //字体色
                $guest_c=	imagecolorallocate($im,34,93,156); //字体色
                $info_c	=	imagecolorallocate($im,51,102,0); //字体色
                $money_c=	imagecolorallocate($im,255,0,0); //字体色
                $tm_c=	imagecolorallocate($im,0,0,0); //字体色
                $fnt	=	$C_Patch."/app/member/ttf/simhei.ttf";

                imagettftext($im,10,0,7,18,$sort_c,$fnt,$gTypeZhName); //彩票类别
                imagettftext($im,10,0,str_leng($gTypeZhName.'=='),18,$name_c,$fnt,$lottery_number); //彩票期号
                imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.'==='),18,$guest_c,$fnt,$rtype_name); //投注玩法
                imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.'===='),18,$info_c,$fnt,$betInfoIm); //投注内容
                imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.'====='),18,$info_c,$fnt,$bet_money_one); //交易金额
                imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money_one.'======'),18,$money_c,$fnt,$fs_money); //反水
                imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money_one.$fs_money.'======='),18,$money_c,$fnt,$bet_rate); //赔率
                imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money_one.$fs_money.$bet_rate.'========'),18,$tm_c,$fnt,$tm); //交易时间
                imagerectangle($im,0,0,$width-1,$height-1,$font); //画边框
                if(!is_dir($C_Patch."\\order\\".substr($datereg_sub,0,8))) mkdir($C_Patch."\\order\\".substr($datereg_sub,0,8));
                imagejpeg($im,$C_Patch."\\order\\".substr($datereg_sub,0,8)."/$datereg_sub.jpg"); //生成图片
                imagedestroy($im);
            }elseif($gid=="NX"){
                $bet_rate = $bet_rate_one;
                $bet_info = $betInfo_one;
                $win_money = $bet_rate * $bet_money_one;
                if($bet_money_one >= $fsRow['lhc_bet']){
                    $fs_money = 0;//$bet_money_one*$fsRow['lhc_bet_reb'];
                }

                $sql	=	"insert into six_lottery_order_sub (order_num,number,bet_rate,bet_money,win,fs,balance)
                                 value ('$datereg','$bet_info','$bet_rate','$bet_money_one',$win_money,'$fs_money','$balance')";
                $mysqli->query($sql);
                $q4		=	$mysqli->affected_rows;
                $id_sub 	=	$mysqli->insert_id;
                $datereg_sub=	date("YmdHis").$id_sub;

                $sql	=	"update `six_lottery_order_sub` set `order_sub_num`='$datereg_sub' where id='$id_sub'"; //更新订单号
                $mysqli->query($sql);
                $q2		=	$mysqli->affected_rows;

                if($q4!=1 || $q2!=1){
                    $sql	=	"delete from six_lottery_order_sub where order_num='$datereg'";//操作失败，删除子订单
                    $mysqli->query($sql);
                    $sql	=	"delete from six_lottery_order where id=$id";//操作失败，删除订单
                    $mysqli->query($sql);
                    $sql = "DROP TRIGGER BeforeDeleteUserList;";
                    $mysqli->query($sql);
                    $sql	=	"delete from money_log where id=$money_log_id";//操作失败，删除金钱记录
                    $mysqli->query($sql);
                    $sql = "
                    CREATE TRIGGER `BeforeDeleteMoneyLog` BEFORE delete ON `money_log`
                      FOR EACH ROW BEGIN
                        insert into money_log(id) values (old.id);
                      END;
                    ";
                    $mysqli->query($sql);
                    $sql	=	"update user_list set money=money+$bet_money_total where user_id='$userid'";//操作失败，还原客户资金
                    $mysqli->query($sql);
                    error2("更新子单失败。");
                    return false;
                }

                //生成图片
                $tm=date("Y-m-d H:i:s",time());
                $height	=	26; //高
                $gTypeZhName = "六合彩";
                $betInfoIm = $bet_info;
                $width	=	str_leng($gTypeZhName.'='.$lottery_number.'='.$rtype_name.'='.$betInfoIm.'='.$bet_money_one.'='.$fs_money.'='.$bet_rate.'='.$tm); //宽
                $im		=	imagecreate($width,$height);
                $bkg	=	imagecolorallocate($im,255,255,255); //背景色
                $font	=	imagecolorallocate($im,150,182,151); //边框色
                $sort_c	=	imagecolorallocate($im,0,0,0); //字体色
                $name_c	=	imagecolorallocate($im,243,118,5); //字体色
                $guest_c=	imagecolorallocate($im,34,93,156); //字体色
                $info_c	=	imagecolorallocate($im,51,102,0); //字体色
                $money_c=	imagecolorallocate($im,255,0,0); //字体色
                $tm_c=	imagecolorallocate($im,0,0,0); //字体色
                $fnt	=	$C_Patch."/app/member/ttf/simhei.ttf";

                imagettftext($im,10,0,7,18,$sort_c,$fnt,$gTypeZhName); //彩票类别
                imagettftext($im,10,0,str_leng($gTypeZhName.'=='),18,$name_c,$fnt,$lottery_number); //彩票期号
                imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.'==='),18,$guest_c,$fnt,$rtype_name); //投注玩法
                imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.'===='),18,$info_c,$fnt,$betInfoIm); //投注内容
                imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.'====='),18,$info_c,$fnt,$bet_money_one); //交易金额
                imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money_one.'======'),18,$money_c,$fnt,$fs_money); //反水
                imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money_one.$fs_money.'======='),18,$money_c,$fnt,$bet_rate); //赔率
                imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money_one.$fs_money.$bet_rate.'========'),18,$tm_c,$fnt,$tm); //交易时间
                imagerectangle($im,0,0,$width-1,$height-1,$font); //画边框
                if(!is_dir($C_Patch."\\order\\".substr($datereg_sub,0,8))) mkdir($C_Patch."\\order\\".substr($datereg_sub,0,8));
                imagejpeg($im,$C_Patch."\\order\\".substr($datereg_sub,0,8)."/$datereg_sub.jpg"); //生成图片
                imagedestroy($im);
            }else{
                if(!count($goldArray)>0){
                    $sql	=	"delete from six_lottery_order where id=$id";//操作失败，删除订单
                    $mysqli->query($sql);
                    $sql = "DROP TRIGGER BeforeDeleteUserList;";
                    $mysqli->query($sql);
                    $sql	=	"delete from money_log where id=$money_log_id";//操作失败，删除金钱记录
                    $mysqli->query($sql);
                    $sql = "
                    CREATE TRIGGER `BeforeDeleteMoneyLog` BEFORE delete ON `money_log`
                      FOR EACH ROW BEGIN
                        insert into money_log(id) values (old.id);
                      END;
                    ";
                    $mysqli->query($sql);
                    $sql	=	"update user_list set money=money+$bet_money_total where user_id='$userid'";//操作失败，还原客户资金
                    $mysqli->query($sql);
                    error2("子订单没有内容-六合彩。");
                    return false;
                }

                foreach($goldArray as $key => $value) {
                    if($goldArray[$key]){
                        $fs_money = 0;//0;
                        $bet_money_one = $goldArray[$key];
                        $bet_rate = $oddsArray[$key];
                        $bet_info = $betInfoArray[$key];
                        $win_money = $bet_rate * $bet_money_one;
                        if($bet_money_one >= $fsRow['lhc_bet']){
                            $fs_money = 0;//$bet_money_one*$fsRow['lhc_bet_reb'];
                            if($gid=="SPbside" && intval($bet_info)>0){
                                $fs_money = 0;//0;
                            }
                        }
                        if($gid=="SP" && intval($bet_info)>0){
                            $sql_sp_fs   =	"select * from six_lottery_odds
                                                where sub_type='SP' and ball_type='fs' limit 0,1";
                            $query_sp_fs = $mysqli->query($sql_sp_fs);
                            $row_sp_fs   =	$query_sp_fs->fetch_array();
                            if($bet_money_one >= $row_sp_fs['h1']){
                                $fs_money = $bet_money_one*$row_sp_fs['h2'];
								if($rtype_name!='特别号')
								{//echo 'aaaaa';
									$fs_money = 0;}
                            }else{
                                $fs_money = 0;//0;
                            }
                        }

                        if($bet_info=="" || $bet_info==null){
                            $sql	=	"delete from six_lottery_order_sub where order_num='$datereg'";//操作失败，删除子订单
                            $mysqli->query($sql);
                            $sql	=	"delete from six_lottery_order where id=$id";//操作失败，删除订单
                            $mysqli->query($sql);
                            $sql = "DROP TRIGGER BeforeDeleteUserList;";
                            $mysqli->query($sql);
                            $sql	=	"delete from money_log where id=$money_log_id";//操作失败，删除金钱记录
                            $mysqli->query($sql);
                            $sql	=	"update user_list set money=money+$bet_money_total where user_id='$userid'";//操作失败，还原客户资金
                            $mysqli->query($sql);
                            error2("投注内容为空，请重新投注。");
                            return false;
                        }

                        $sql	=	"insert into six_lottery_order_sub (order_num,number,bet_rate,bet_money,win,fs,balance)
                                 value ('$datereg','$bet_info','$bet_rate','$bet_money_one','$win_money','$fs_money','$balance')";
                        $mysqli->query($sql);
                        $q4		=	$mysqli->affected_rows;
                        $id_sub 	=	$mysqli->insert_id;
                        $datereg_sub=	date("YmdHis").$id_sub;

                        $sql	=	"update `six_lottery_order_sub` set `order_sub_num`='$datereg_sub' where id='$id_sub'"; //更新订单号
                        $mysqli->query($sql);
                        $q2		=	$mysqli->affected_rows;

                        if($q4!=1 || $q2!=1){
                            $sql	=	"delete from six_lottery_order_sub where order_num='$datereg'";//操作失败，删除子订单
                            $mysqli->query($sql);
                            $sql	=	"delete from six_lottery_order where id=$id";//操作失败，删除订单
                            $mysqli->query($sql);
                            $sql = "DROP TRIGGER BeforeDeleteUserList;";
                            $mysqli->query($sql);
                            $sql	=	"delete from money_log where id=$money_log_id";//操作失败，删除金钱记录
                            $mysqli->query($sql);
                            $sql	=	"update user_list set money=money+$bet_money_total where user_id='$userid'";//操作失败，还原客户资金
                            $mysqli->query($sql);
                            error2("更新子单失败。");
                            return false;
                        }

                        //生成图片
                        $tm=date("Y-m-d H:i:s",time());
                        $height	=	26; //高
                        $gTypeZhName = "六合彩";
                        $betInfoIm = $bet_info;
                        $width	=	str_leng($gTypeZhName.'='.$lottery_number.'='.$rtype_name.'='.$betInfoIm.'='.$bet_money_one.'='.$fs_money.'='.$bet_rate.'='.$tm); //宽
                        $im		=	imagecreate($width,$height);
                        $bkg	=	imagecolorallocate($im,255,255,255); //背景色
                        $font	=	imagecolorallocate($im,150,182,151); //边框色
                        $sort_c	=	imagecolorallocate($im,0,0,0); //字体色
                        $name_c	=	imagecolorallocate($im,243,118,5); //字体色
                        $guest_c=	imagecolorallocate($im,34,93,156); //字体色
                        $info_c	=	imagecolorallocate($im,51,102,0); //字体色
                        $money_c=	imagecolorallocate($im,255,0,0); //字体色
                        $tm_c=	imagecolorallocate($im,0,0,0); //字体色
                        $fnt	=	$C_Patch."/app/member/ttf/simhei.ttf";

                        imagettftext($im,10,0,7,18,$sort_c,$fnt,$gTypeZhName); //彩票类别
                        imagettftext($im,10,0,str_leng($gTypeZhName.'=='),18,$name_c,$fnt,$lottery_number); //彩票期号
                        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.'==='),18,$guest_c,$fnt,$rtype_name); //投注玩法
                        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.'===='),18,$info_c,$fnt,$betInfoIm); //投注内容
                        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.'====='),18,$info_c,$fnt,$bet_money_one); //交易金额
                        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money_one.'======'),18,$money_c,$fnt,$fs_money); //反水
                        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money_one.$fs_money.'======='),18,$money_c,$fnt,$bet_rate); //赔率
                        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money_one.$fs_money.$bet_rate.'========'),18,$tm_c,$fnt,$tm); //交易时间
                        imagerectangle($im,0,0,$width-1,$height-1,$font); //画边框
                        if(!is_dir($C_Patch."\\order\\".substr($datereg_sub,0,8))) mkdir($C_Patch."\\order\\".substr($datereg_sub,0,8));
                        imagejpeg($im,$C_Patch."\\order\\".substr($datereg_sub,0,8)."\\$datereg_sub.jpg"); //生成图片
                        imagedestroy($im);
                    }
                }
            }


            //验证订单和子订单的可赢金额是否一致，这里判断POST是否为外边传过来的
            $sql		= 	"select win_total from six_lottery_order where id=$id limit 1";
            $query 		=	$mysqli->query($sql);
            $rs1			=	$query->fetch_array();

            $sql		= 	"select SUM(win) AS sub_win_total from six_lottery_order_sub where order_num='$datereg'";
            $query 		=	$mysqli->query($sql);
            $rs2			=	$query->fetch_array();

            if($rs1['win_total'] != $rs2['sub_win_total']){
                $sql	=	"delete from six_lottery_order_sub where order_num='$datereg'";//操作失败，删除子订单
                $mysqli->query($sql);
                $sql	=	"delete from six_lottery_order where id=$id";//操作失败，删除订单
                $mysqli->query($sql);
                $sql = "DROP TRIGGER BeforeDeleteUserList;";
                $mysqli->query($sql);
                $sql	=	"delete from money_log where id=$money_log_id";//操作失败，删除金钱记录
                $mysqli->query($sql);
                $sql	=	"update user_list set money=money+$bet_money_total where user_id='$userid'";//操作失败，还原客户资金
                $mysqli->query($sql);
                error2("订单和子订单可赢金额不一致。".$bet_win_total."-".$rs1['win_total']."-".$rs2['sub_win_total']);
                return false;
            }
        }

        //验证一下账户金额
        $usermoney=0;
        $sql		= 	"select money from user_list where user_id='$userid' limit 1";
        $query 		=	$mysqli->query($sql);
        $rs			=	$query->fetch_array();

        $usermoney=$rs['money'];


        $sql		= 	"select balance from money_log where user_id='$userid' order by id desc limit 0,1";
        $query 		=	$mysqli->query($sql);
        $rs_l			=	$query->fetch_array();
        if($rs_l['balance']!=$usermoney){
            $now = now();
            $sql = "update user_list set online=0,Oid='',status='异常',remark='六合彩($datereg)下注后资金异常$now' where user_id='$userid'";
            $mysqli->query($sql);
            error2("资金异常。");
            return false;
        }
        return true;
    }



    static function getOrdersByStatus($qishu, $status){
        global $mysqli;
        $sql	=	"SELECT o.id,o.order_num,o.user_id,o.lottery_number AS qishu,o.bet_info,o.rtype_str,o.rtype,
                        o.bet_money_total,o.win_total,o.status AS order_status,
                        o_sub.number,o_sub.bet_rate, o_sub.bet_money,o_sub.win,o_sub.fs,o_sub.balance,
                        o_sub.id AS sub_id,o_sub.status AS sub_status,o_sub.is_win,o_sub.order_sub_num
                    FROM six_lottery_order o,six_lottery_order_sub o_sub
                    WHERE o.lottery_number='$qishu' AND o.order_num=o_sub.order_num AND o.status = '$status' AND o_sub.status = '$status'";
        $query	=	$mysqli->query($sql)or die ("error!");
        while($row = $query->fetch_array()){
            $rs[] = $row;
        }
        return $rs;
    }

    static function getOrdersJs($qishu){
        global $mysqli;
        $sql	=	"SELECT o.id,o.order_num,o.user_id,o.lottery_number AS qishu,o.bet_info,o.rtype_str,o.rtype,
                        o.bet_money_total,o.win_total,o.status AS order_status,
                        o_sub.number,o_sub.bet_rate, o_sub.bet_money,o_sub.win,o_sub.fs,o_sub.balance,
                        o_sub.id AS sub_id,o_sub.status AS sub_status,o_sub.is_win,o_sub.order_sub_num
                    FROM six_lottery_order o,six_lottery_order_sub o_sub
                    WHERE o.lottery_number='$qishu' AND o.order_num=o_sub.order_num AND o.status IN ('1','2')";
        $query	=	$mysqli->query($sql)or die ("error!");
        while($row = $query->fetch_array()){
            $rs[] = $row;
        }
        return $rs;
    }

    static function getOneDayOrder($user_id,$day,$statusString = ""){
        $oneDayStart = $day.' 00:00:00';
        $oneDayEnd = $day.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT COUNT(o_sub.id) AS bet_count, IFNULL(SUM(IFNULL(o_sub.bet_money,0)),0) AS bet_money
                FROM six_lottery_order o,six_lottery_order_sub o_sub
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

    static function getOneDayTotalWin($user_id,$day){
        $oneDayStart = $day.' 00:00:00';
        $oneDayEnd = $day.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT IFNULL(SUM(IFNULL(o_sub.win,0)+IFNULL(o_sub.fs,0)),0) AS win_money
                FROM six_lottery_order o,six_lottery_order_sub o_sub
                WHERE o.user_id='$user_id' AND o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
                AND o_sub.is_win = '1' LIMIT 0,1
            ";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        $winTotal = $row["win_money"];
        $sql	=	"SELECT IFNULL(SUM(IFNULL(o_sub.fs,0)),0) AS win_fs
                FROM six_lottery_order o,six_lottery_order_sub o_sub
                WHERE o.user_id='$user_id' AND o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
                AND o_sub.is_win = '0' LIMIT 0,1
            ";
        $query	=	$mysqli->query($sql);
        $row2    =	$query->fetch_array();
        $winTotal += $row2["win_fs"];
        $sql	=	"SELECT IFNULL(SUM(IFNULL(o_sub.bet_money,0)),0) AS win_back
                FROM six_lottery_order o,six_lottery_order_sub o_sub
                WHERE o.user_id='$user_id' AND o.order_num=o_sub.order_num
                AND o.bet_time>= '".$oneDayStart."' AND o.bet_time<='".$oneDayEnd."'
                AND (o_sub.is_win = '2' OR o_sub.status = '3') LIMIT 0,1
            ";
        $query	=	$mysqli->query($sql);
        $row3    =	$query->fetch_array();
        $winTotal += $row3["win_back"];
        return $winTotal;
    }

    static function getBetMoneyAndCount($dayStart,$dayEnd,$user_group="",$statusString=""){
        $oneDayStart = $dayStart.' 00:00:00';
        $oneDayEnd = $dayEnd.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT COUNT(o_sub.id) AS bet_count, IFNULL(SUM(IFNULL(o_sub.bet_money,0)),0) AS bet_money
                FROM six_lottery_order o,six_lottery_order_sub o_sub
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

    static function getTotalWin($dayStart,$dayEnd,$user_group="",$statusString=""){
        $oneDayStart = $dayStart.' 00:00:00';
        $oneDayEnd = $dayEnd.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT IFNULL(SUM(IFNULL(o_sub.win,0)+IFNULL(o_sub.fs,0)),0) AS win_money
                FROM six_lottery_order o,six_lottery_order_sub o_sub
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
                FROM six_lottery_order o,six_lottery_order_sub o_sub
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
                FROM six_lottery_order o,six_lottery_order_sub o_sub
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