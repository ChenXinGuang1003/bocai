<?php

class lottery_sf
{
    static function add_order($userid,$bet_money,$bet_money_total,$balance,$bet_win_total,$assets,
                              $lottery_name,$gType,$rtype_name,$rType,$selectArray,
                              $odds,$numArray,$orders,
                              $lottery_number,$bet_time){

        if($gType == "BJKN" && $rType=="MULTI_CHOOSE"){
            if(!count($selectArray)>0){
                error2("子订单没有内容-彩票。");
                return false;
            }
        }elseif($gType == "BJPK" && $rType=="MULTI_CHOOSE"){
            if(!count($selectArray)>0){
                error2("子订单没有内容-彩票2。");
                return false;
            }
        }else{
            if(!count($orders)>0){
                error2("子订单没有内容-彩票3。");
                return false;
            }
        }


        function str_leng($str){ //取字符串长度
            mb_internal_encoding("UTF-8");
            return mb_strlen($str)*12;
        }
        $C_Patch=$_SERVER['DOCUMENT_ROOT'];
        include_once($C_Patch."/app/member/utils/convert_name.php");
        include_once($C_Patch."/resource/lottery/getContentName.php");
        $fnt	=	$C_Patch."/app/member/ttf/simhei.ttf";
        global $mysqli;

        $sql	=	"insert into order_lottery(user_id,Gtype,rtype_str,rtype,bet_info,bet_money,win,lottery_number,bet_time)
                    values ('$userid','$gType','$rtype_name','$rType','bet_info','$bet_money_total','$bet_win_total','$lottery_number','$bet_time')"; //新增一个投注项
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
            $sql	=	"delete from order_lottery where id=$id";//操作失败，删除订单
            $mysqli->query($sql);
            error2("更新用户金额失败。");
            return false;
        }
        $sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$userid','$datereg','$lottery_name',now(),'彩票下注','$bet_money_total','$assets','$balance');";
        $mysqli->query($sql);
        $q8		=	$mysqli->affected_rows;
        $money_log_id 	=	$mysqli->insert_id;
        if($q8!=1){
            $sql	=	"update user_list set money=money+$bet_money_total where user_id='$userid'";//操作失败，还原客户资金
            $mysqli->query($sql);
            return false;
        }

        $sql	=	"update `order_lottery` set `order_num`='$datereg' where id='$id'"; //更新订单号
        $mysqli->query($sql);
        $q2		=	$mysqli->affected_rows;
        if($q2!=1){
            $sql	=	"delete from order_lottery where id=$id";//操作失败，删除订单
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
            $row   =	$query->fetch_array();

            if($gType == "BJKN" && $rType=="MULTI_CHOOSE"){//北京快乐8的选号子表
                $sql_odd   =	"select lottery_type, sub_type, ball_type, h1, h2, h3, h4, h5, h6, h7, h8, h9, h10
                          from odds_lottery where lottery_type='北京快乐8' and sub_type='选号' and ball_type='ball_1' limit 0,1";
                $query = $mysqli->query($sql_odd);
                $rowKl   =	$query->fetch_array();
                foreach($selectArray as $selectList){
                    $number = implode(",",$selectList);
                    if(count($selectList)==1){
                        $bet_rate = $rowKl["h10"];
                    }elseif(count($selectList)==2){
                        $bet_rate = $rowKl["h9"];
                    }elseif(count($selectList)==3){
                        $bet_rate = implode(",", array($rowKl["h7"],$rowKl["h8"]));
                    }elseif(count($selectList)==4){
                        $bet_rate = implode(",", array($rowKl["h4"],$rowKl["h5"],$rowKl["h6"]));
                    }elseif(count($selectList)==5){
                        $bet_rate = implode(",", array($rowKl["h1"],$rowKl["h2"],$rowKl["h3"]));
                    }
                    $win_money = 0;
                    if($bet_money >= $row[strtolower($gType).'_bet']){
                        $fs_money = $bet_money*$row[strtolower($gType).'_bet_reb'];
                    }
                    //这里使用$bet_money是因为要记录最原始的数据，背后结算的时候比较好处理
                    $sql	=	"insert into order_lottery_sub (order_num,number,bet_rate,bet_money,win,fs,balance)
                             value ('$datereg','$number','$bet_rate','$bet_money','$win_money','$fs_money','$balance')";
                    $mysqli->query($sql);
                    $q4		=	$mysqli->affected_rows;

                    $id_sub 	=	$mysqli->insert_id;
                    $datereg_sub=	date("YmdHis").$id_sub;

                    $sql	=	"update `order_lottery_sub` set `order_sub_num`='$datereg_sub' where id='$id_sub'"; //更新订单号
                    $mysqli->query($sql);
                    $q2		=	$mysqli->affected_rows;
                    if($q2!=1 || $q4!=1){
                        $sql	=	"delete from order_lottery_sub where order_num='$datereg'";//操作失败，删除子订单
                        $mysqli->query($sql);
                        $sql	=	"delete from order_lottery where id=$id";//操作失败，删除订单
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
                        error2("更新北京快乐8子单失败。");
                        return false;
                    }

                    //生成图片
                    $tm=date("Y-m-d H:i:s",time());
                    $height	=	26; //高
                    $gTypeZhName = getZhPageTitle($gType);
                    $betInfoIm = getName($number,$gType);
                    $width	=	str_leng($gTypeZhName.'='.$lottery_number.'='.$rtype_name.'='.$betInfoIm.'='.$bet_money.'='.$fs_money.'='.$bet_rate.'='.$tm); //宽
                    $im		=	imagecreate($width,$height);
                    $bkg	=	imagecolorallocate($im,255,255,255); //背景色
                    $font	=	imagecolorallocate($im,150,182,151); //边框色
                    $sort_c	=	imagecolorallocate($im,0,0,0); //字体色
                    $name_c	=	imagecolorallocate($im,243,118,5); //字体色
                    $guest_c=	imagecolorallocate($im,34,93,156); //字体色
                    $info_c	=	imagecolorallocate($im,51,102,0); //字体色
                    $money_c=	imagecolorallocate($im,255,0,0); //字体色
                    $tm_c=	imagecolorallocate($im,0,0,0); //字体色

                    imagettftext($im,10,0,7,18,$sort_c,$fnt,$gTypeZhName); //彩票类别
                    imagettftext($im,10,0,str_leng($gTypeZhName.'=='),18,$name_c,$fnt,$lottery_number); //彩票期号
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.'==='),18,$guest_c,$fnt,$rtype_name); //投注玩法
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.'===='),18,$info_c,$fnt,$betInfoIm); //投注内容
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.'====='),18,$info_c,$fnt,$bet_money); //交易金额
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money.'======'),18,$money_c,$fnt,$fs_money); //反水
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money.$fs_money.'======='),18,$money_c,$fnt,$bet_rate); //赔率
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money.$fs_money.$bet_rate.'========'),18,$tm_c,$fnt,$tm); //交易时间
                    imagerectangle($im,0,0,$width-1,$height-1,$font); //画边框
                    if(!is_dir($C_Patch."\\order\\".substr($datereg_sub,0,8))) mkdir($C_Patch."\\order\\".substr($datereg_sub,0,8));
                    imagejpeg($im,$C_Patch."\\order\\".substr($datereg_sub,0,8)."/$datereg_sub.jpg"); //生成图片
                    imagedestroy($im);
                }
            }elseif($gType == "BJPK" && $rType=="MULTI_CHOOSE"){//北京PK拾的选号子表
                $sql_odd   =	"select lottery_type, sub_type, ball_type, h1, h2, h3, h4, h5, h6, h7
                          from odds_lottery where lottery_type='北京PK拾' and sub_type='选号' and ball_type='ball_1' limit 0,1";
                $query = $mysqli->query($sql_odd);
                $rowPk   =	$query->fetch_array();
                foreach($selectArray as $selectList){
                    if(count($selectList)==2){
                        $number = implode(",",array($selectList[1],$selectList[2]));
                        $bet_rate = implode(",", array($rowPk["h1"],$rowPk["h2"]));
                    }elseif(count($selectList)==3){
                        $number = implode(",",array($selectList[1],$selectList[2],$selectList[3]));
                        $bet_rate = implode(",", array($rowPk["h3"],$rowPk["h4"]));
                    }elseif(count($selectList)==4){
                        $number = implode(",",array($selectList[1],$selectList[2],$selectList[3],$selectList[4]));
                        $bet_rate = implode(",", array($rowPk["h5"],$rowPk["h6"],$rowPk["h7"]));
                    }

                    $win_money = 0;
                    if($bet_money >= $row[strtolower($gType).'_bet']){
                        $fs_money = $bet_money*$row[strtolower($gType).'_bet_reb'];
                    }
                    //这里使用$bet_money是因为要记录最原始的数据，背后结算的时候比较好处理
                    $sql	=	"insert into order_lottery_sub (order_num,number,bet_rate,bet_money,win,fs,balance)
                             value ('$datereg','$number','$bet_rate','$bet_money','$win_money','$fs_money','$balance')";
                    $mysqli->query($sql);
                    $q4		=	$mysqli->affected_rows;

                    $id_sub 	=	$mysqli->insert_id;
                    $datereg_sub=	date("YmdHis").$id_sub;

                    $sql	=	"update `order_lottery_sub` set `order_sub_num`='$datereg_sub' where id='$id_sub'"; //更新订单号
                    $mysqli->query($sql);
                    $q2		=	$mysqli->affected_rows;

                    if($q4!=1 || $q2!=1){
                        $sql	=	"delete from order_lottery_sub where order_num='$datereg'";//操作失败，删除子订单
                        $mysqli->query($sql);
                        $sql	=	"delete from order_lottery where id=$id";//操作失败，删除订单
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
                        error2("更新北京PK拾子单失败。");
                        return false;
                    }

                    //生成图片
                    $tm=date("Y-m-d H:i:s",time());
                    $height	=	26; //高
                    $gTypeZhName = getZhPageTitle($gType);
                    $betInfoIm = getName($number,$gType);
                    $width	=	str_leng($gTypeZhName.'='.$lottery_number.'='.$rtype_name.'='.$betInfoIm.'='.$bet_money.'='.$fs_money.'='.$bet_rate.'='.$tm); //宽
                    $im		=	imagecreate($width,$height);
                    $bkg	=	imagecolorallocate($im,255,255,255); //背景色
                    $font	=	imagecolorallocate($im,150,182,151); //边框色
                    $sort_c	=	imagecolorallocate($im,0,0,0); //字体色
                    $name_c	=	imagecolorallocate($im,243,118,5); //字体色
                    $guest_c=	imagecolorallocate($im,34,93,156); //字体色
                    $info_c	=	imagecolorallocate($im,51,102,0); //字体色
                    $money_c=	imagecolorallocate($im,255,0,0); //字体色
                    $tm_c=	imagecolorallocate($im,0,0,0); //字体色

                    imagettftext($im,10,0,7,18,$sort_c,$fnt,$gTypeZhName); //彩票类别
                    imagettftext($im,10,0,str_leng($gTypeZhName.'=='),18,$name_c,$fnt,$lottery_number); //彩票期号
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.'==='),18,$guest_c,$fnt,$rtype_name); //投注玩法
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.'===='),18,$info_c,$fnt,$betInfoIm); //投注内容
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.'====='),18,$info_c,$fnt,$bet_money); //交易金额
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money.'======'),18,$money_c,$fnt,$fs_money); //反水
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money.$fs_money.'======='),18,$money_c,$fnt,$bet_rate); //赔率
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money.$fs_money.$bet_rate.'========'),18,$tm_c,$fnt,$tm); //交易时间
                    imagerectangle($im,0,0,$width-1,$height-1,$font); //画边框
                    if(!is_dir($C_Patch."\\order\\".substr($datereg_sub,0,8))) mkdir($C_Patch."\\order\\".substr($datereg_sub,0,8));
                    imagejpeg($im,$C_Patch."\\order\\".substr($datereg_sub,0,8)."/$datereg_sub.jpg"); //生成图片
                    imagedestroy($im);
                }
            }else{//其他子表
                //获取赔率____________需要从数据库获取
                foreach($orders as $object){
                    $fs_money = 0;
                    $number = $object['number'];
                    $bet_rate = $object['odds'];
                    $bet_money_one = $object['gold'];
                    $win_money = $object['gold']*$object['odds'];
                    //这里需要改数据库字段来适应这个规则_________
                    if($bet_money_one >= $row[strtolower($gType).'_bet']){
                        $fs_money = $bet_money_one*$row[strtolower($gType).'_bet_reb'];
                    }

                    $sql	=	"insert into order_lottery_sub (order_num,number,bet_rate,bet_money,win,fs,balance)
                             value ('$datereg','$number','$bet_rate','$bet_money_one','$win_money','$fs_money','$balance')";
                    $mysqli->query($sql);
                    $q4		=	$mysqli->affected_rows;
                    $id_sub 	=	$mysqli->insert_id;
                    $datereg_sub=	date("YmdHis").$id_sub;

                    $sql	=	"update `order_lottery_sub` set `order_sub_num`='$datereg_sub' where id='$id_sub'"; //更新订单号
                    $mysqli->query($sql);
                    $q2		=	$mysqli->affected_rows;

                    if($q4!=1 || $q2!=1){
                        $sql	=	"delete from order_lottery_sub where order_num='$datereg'";//操作失败，删除子订单
                        $mysqli->query($sql);
                        $sql	=	"delete from order_lottery where id=$id";//操作失败，删除订单
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
                    $gTypeZhName = getZhPageTitle($gType);
                    $betInfoIm = getName($number,$gType);
                    $width	=	str_leng($gTypeZhName.'='.$lottery_number.'='.$rtype_name.'='.$betInfoIm.'='.$bet_money.'='.$fs_money.'='.$bet_rate.'='.$tm); //宽
                    $im		=	imagecreate($width,$height);
                    $bkg	=	imagecolorallocate($im,255,255,255); //背景色
                    $font	=	imagecolorallocate($im,150,182,151); //边框色
                    $sort_c	=	imagecolorallocate($im,0,0,0); //字体色
                    $name_c	=	imagecolorallocate($im,243,118,5); //字体色
                    $guest_c=	imagecolorallocate($im,34,93,156); //字体色
                    $info_c	=	imagecolorallocate($im,51,102,0); //字体色
                    $money_c=	imagecolorallocate($im,255,0,0); //字体色
                    $tm_c=	imagecolorallocate($im,0,0,0); //字体色

                    imagettftext($im,10,0,7,18,$sort_c,$fnt,$gTypeZhName); //彩票类别
                    imagettftext($im,10,0,str_leng($gTypeZhName.'=='),18,$name_c,$fnt,$lottery_number); //彩票期号
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.'==='),18,$guest_c,$fnt,$rtype_name); //投注玩法
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.'===='),18,$info_c,$fnt,$betInfoIm); //投注内容
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.'====='),18,$info_c,$fnt,$bet_money); //交易金额
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money.'======'),18,$money_c,$fnt,$fs_money); //反水
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money.$fs_money.'======='),18,$money_c,$fnt,$bet_rate); //赔率
                    imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$rtype_name.$betInfoIm.$bet_money.$fs_money.$bet_rate.'========'),18,$tm_c,$fnt,$tm); //交易时间
                    imagerectangle($im,0,0,$width-1,$height-1,$font); //画边框
                    if(!is_dir($C_Patch."\\order\\".substr($datereg_sub,0,8))) mkdir($C_Patch."\\order\\".substr($datereg_sub,0,8));
                    imagejpeg($im,$C_Patch."\\order\\".substr($datereg_sub,0,8)."/$datereg_sub.jpg"); //生成图片
                    imagedestroy($im);

                }
            }

            //验证订单和子订单的可赢金额是否一致
            $sql		= 	"select win from order_lottery where id=$id limit 1";
            $query 		=	$mysqli->query($sql);
            $rs1			=	$query->fetch_array();

            $sql		= 	"select SUM(win) AS win_total from order_lottery_sub where order_num='$datereg'";
            $query 		=	$mysqli->query($sql);
            $rs2			=	$query->fetch_array();

            if($rs1['win'] != $rs2['win_total']){
                $sql	=	"delete from order_lottery_sub where order_num='$datereg'";//操作失败，删除子订单
                $mysqli->query($sql);
                $sql	=	"delete from order_lottery where id=$id";//操作失败，删除订单
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
            $sql = "update user_list set online=0,Oid='',status='异常',remark='$lottery_name($datereg)下注后资金异常$bet_time' where user_id='$userid'";
            $mysqli->query($sql);
            return false;
        }
        return true;
    }
}