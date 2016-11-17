<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/ip.php");
include_once("../../../common/login_check.php");
include_once($C_Patch."/app/member/class/lottery_result_bjkn.php");
include_once($C_Patch."/app/member/class/lottery_order.php");
include_once($C_Patch."/app/member/class/user_list.php");
include_once("../Js_Class.php");

if(strpos($quanxian,'手工录入彩票结果')){
    $qi 		= $_GET['qi'];
    $jsType 		= $_GET['jsType'];
    $query_time 		= $_GET['s_time'];

    //获取开奖号码
    $rs = lottery_result_bjkn::getLotteryResult($qi);
    $hm 		= array();
    $hm[]		= $rs['ball_1'];
    $hm[]		= $rs['ball_2'];
    $hm[]		= $rs['ball_3'];
    $hm[]		= $rs['ball_4'];
    $hm[]		= $rs['ball_5'];
    $hm[]		= $rs['ball_6'];
    $hm[]		= $rs['ball_7'];
    $hm[]		= $rs['ball_8'];
    $hm[]		= $rs['ball_9'];
    $hm[]		= $rs['ball_10'];
    $hm[]		= $rs['ball_11'];
    $hm[]		= $rs['ball_12'];
    $hm[]		= $rs['ball_13'];
    $hm[]		= $rs['ball_14'];
    $hm[]		= $rs['ball_15'];
    $hm[]		= $rs['ball_16'];
    $hm[]		= $rs['ball_17'];
    $hm[]		= $rs['ball_18'];
    $hm[]		= $rs['ball_19'];
    $hm[]		= $rs['ball_20'];

    $jiesuanString = "结算成功。";
    $url = "result_bjkn.php?s_time=$query_time";
    $stateType = "1";

    if($jsType==1){//状态为已结算，对所有的订单进行结算，需要从客户那边收回钱然后再进行结算
        //获取已结算的订单
        $orders = lottery_order::getOrdersJs("BJKN",$qi);
        if($orders){//订单不为空，进行退钱操作
            foreach($orders as $order){
                $userid = $order['user_id'];
                $datereg = $order['order_sub_num'];
                $rsMoney	= user_list::getUserMoney($userid);
                $assets	=	round($rsMoney['money'],2);

                //修改主单信息
                $msql="update order_lottery set status='0' where id='".$order['id']."'";
                $mysqli->query($msql) or die ("注单修改失败!!!".$order['id']);
                //修改子单
                $msql="update order_lottery_sub set status='0',is_win=NULL where id='".$order['sub_id']."'";
                $mysqli->query($msql) or die ("注单子单修改失败!!!".$order['sub_id']);
                //退回中奖的金额+反水
                if($order['is_win']=="1" || $order['is_win']=="2" || ($order['is_win']=="0" && $order['fs']>0)){
                    //退钱
                    if($order['is_win']=="1"){//中奖金额+反水
                        $bet_money_total = $order['win']+$order['fs'];
                    }elseif($order['is_win']=="2"){//平局的钱，返回的是下注的钱
                        $bet_money_total = $order['bet_money'];
                    }elseif($order['is_win']=="0" && $order['fs']>0){//反水的钱
                        $bet_money_total = $order['fs'];
                    }
                    $msql="update user_list set money=money-".$bet_money_total." where user_id=".$userid."";
                    $mysqli->query($msql) or die ("会员修改失败!!!".$order['sub_id']);
                    //插入金钱记录
                    $balance=	$assets - $bet_money_total;
                    $sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`)
                            VALUES ('$userid','$datereg','北京快乐8',now(),'彩票重新结算-扣钱','$bet_money_total','$assets','$balance');";
                    $mysqli->query($sql) or die ("插入金钱记录失败!!!".$order['sub_id']);
                }
            }
        }

        $jiesuanString = "重算成功。";
        $stateType = "2";
    }



    //获取未结算的订单
    $orders = lottery_order::getOrdersByStatus("BJKN",$qi,"0");
    if($orders==null){
        $msql="update lottery_result_bjkn set state='$stateType' WHERE qishu='".$qi."'";
        $mysqli->query($msql) or die ("期数修改失败!!!");
        message($jiesuanString,$url);
        exit;
    }
    $hms[]		= Kl8_Auto_zh($hm,1);
    $hms[]		= Kl8_Auto_zh($hm,2);
    $hms[]		= Kl8_Auto_zh($hm,3);
    $hms[]		= Kl8_Auto_zh($hm,4);
    $hms[]		= Kl8_Auto_zh($hm,5);
    foreach($orders as $order){
        $betInfo = explode(":",$order["number"]);
        $rTypeName = $order["rtype_str"];
        $quick_type = $order["quick_type"];
        if(in_array($betInfo[0],array("TOP","MIDDLE","BOTTOM","ODD","TIE","EVEN"))){//上中下、奇偶和盘
            $selectBall = "ONE";
            $betContent = $betInfo[0];
        }elseif($betInfo[0]=="ALL"){//所有球总和、五行过关
            $selectBall = "ONE";
            $betContent = $betInfo[1].':'.$betInfo[2];
            if(in_array($betInfo[2].':'.$betInfo[3],array("UNDER:ODD","UNDER:EVEN","OVER:ODD","OVER:EVEN"))){
                $betContent = "SUM:".$betInfo[2].':SUM:'.$betInfo[3];
            }
        }elseif(in_array($quick_type,array("选一","和值","上中下","奇和偶"))){
            $selectBall = "quick";
        }else{//多选
            $selectBall = "multi";
            $betContentArray = explode(",",$order["number"]);
            $oddsArray = explode(",",$order["bet_rate"]);
        }

        $userid = $order['user_id'];
        $datereg = $order['order_sub_num'];
        $rsMoney	= user_list::getUserMoney($userid);
        $assets	=	round($rsMoney['money'],2);

        if($selectBall=="ONE"){
            //各种玩法，算法
            $szx = Kl8_Auto($hm,4);
            $qho = Kl8_Auto($hm,5);
            $zonghedx = Kl8_Auto($hm,2);
            $zongheds = Kl8_Auto($hm,3);
            $wx = Kl8_Auto($hm,7);
            $gg = $zonghedx.":".$zongheds;

            if(in_array($betContent, array($szx,$qho,$zonghedx,$zongheds,$wx,$gg))){
                $win_sign = "1";
                $bet_money_total = $order['win']+$order['fs'];
                $bet_type = "彩票手工结算-彩票中奖";
            }elseif($zonghedx=="SUM:810" && in_array($betContent, array("SUM:OVER","SUM:UNDER","SUM:UNDER:SUM:ODD","SUM:UNDER:SUM:EVEN","SUM:OVER:SUM:ODD","SUM:OVER:SUM:EVEN"))){
                $win_sign = "2";
                $bet_money_total = $order['bet_money'];
                $bet_type = "彩票手工结算-彩票和局";
            }else{
                $win_sign = "0";
                $bet_money_total = $order['fs'];
                $bet_type = "彩票手工结算-彩票反水";
            }
        }elseif($selectBall=="quick"){
            $betInfo = $order["number"];
            $is_win = "false";
            if($quick_type=="选一"){
                if(in_array($betInfo,$hm)){
                    $is_win = "true";
                }
            }elseif($quick_type=="和值"){
                if($betInfo==$hms[1] || $betInfo==$hms[2]){
                    $is_win = "true";
                }
            }elseif($quick_type=="上中下"){
                if($betInfo==$hms[3]){
                    $is_win = "true";
                }
            }elseif($quick_type=="奇和偶"){
                if($betInfo==$hms[4]){
                    $is_win = "true";
                }
            }
            if($is_win == "true"){
                $win_sign = "1";
                $bet_money_total = $order['win']+$order['fs'];
                $bet_type = "彩票手工结算-彩票中奖";
            }else{
                $win_sign = "0";
                $bet_money_total = $order['fs'];
                $bet_type = "彩票手工结算-彩票反水";
            }
        }elseif($selectBall=="multi"){
            $isWinMulti = "false";
            if(count($betContentArray)==1){
                if(in_array($order["number"], array($rs['ball_1'],$rs['ball_2'],$rs['ball_3'],$rs['ball_4'],$rs['ball_5'],
                                                    $rs['ball_6'],$rs['ball_7'],$rs['ball_8'],$rs['ball_9'],$rs['ball_10'],
                                                    $rs['ball_11'],$rs['ball_12'],$rs['ball_13'],$rs['ball_14'],$rs['ball_15'],
                                                    $rs['ball_16'],$rs['ball_17'],$rs['ball_18'],$rs['ball_19'],$rs['ball_20']))){
                    $isWinMulti = "true";
                    $win_money = $order["bet_money"]*$order["bet_rate"];
                }
            }elseif(count($betContentArray)==2){
                $x1rr=$betContentArray;
                $h21=0;
                $h22=0;
                for($i=1;$i<21;$i++){
                    if($x1rr[0]==$rs['ball_'.$i.'']){
                        $h21=1;
                    }
                    if($x1rr[1]==$rs['ball_'.$i.'']){
                        $h22=1;
                    }
                }
                $h2nus=$h21+$h22;
                if($h2nus==2){
                    $isWinMulti = "true";
                    $win_money = $order["bet_money"]*$order["bet_rate"];
                }
            }elseif(count($betContentArray)==3){
                $x1rr=$betContentArray;
                $h31=0;
                $h32=0;
                $h33=0;
                for($i=1;$i<21;$i++){
                    if($x1rr[0]==$rs['ball_'.$i.'']){
                        $h31=1;
                    }
                    if($x1rr[1]==$rs['ball_'.$i.'']){
                        $h32=1;
                    }
                    if($x1rr[2]==$rs['ball_'.$i.'']){
                        $h33=1;
                    }
                }
                $h2nus=$h31+$h32+$h33;
                if($h2nus==3){
                    $isWinMulti = "true";
                    $win_money = $order["bet_money"]*$oddsArray[0];
                }else if($h2nus==2){
                    $isWinMulti = "true";
                    $win_money = $order["bet_money"]*$oddsArray[1];
                }
            }elseif(count($betContentArray)==4){
                $x1rr=$betContentArray;
                $h41=0;
                $h42=0;
                $h43=0;
                $h44=0;
                for($i=1;$i<21;$i++){
                    if($x1rr[0]==$rs['ball_'.$i.'']){
                        $h41=1;
                    }
                    if($x1rr[1]==$rs['ball_'.$i.'']){
                        $h42=1;
                    }
                    if($x1rr[2]==$rs['ball_'.$i.'']){
                        $h43=1;
                    }
                    if($x1rr[3]==$rs['ball_'.$i.'']){
                        $h44=1;
                    }
                }
                $h2nus=$h41+$h42+$h43+$h44;
                if($h2nus==4){
                    $isWinMulti = "true";
                    $win_money = $order["bet_money"]*$oddsArray[0];
                }else if($h2nus==3){
                    $isWinMulti = "true";
                    $win_money = $order["bet_money"]*$oddsArray[1];
                }else if($h2nus==2){
                    $isWinMulti = "true";
                    $win_money = $order["bet_money"]*$oddsArray[2];
                }
            }elseif(count($betContentArray)==5){
                $x1rr=$betContentArray;
                $h51=0;
                $h52=0;
                $h53=0;
                $h54=0;
                $h55=0;
                for($i=1;$i<21;$i++){
                    if($x1rr[0]==$rs['ball_'.$i.'']){
                        $h51=1;
                    }
                    if($x1rr[1]==$rs['ball_'.$i.'']){
                        $h52=1;
                    }
                    if($x1rr[2]==$rs['ball_'.$i.'']){
                        $h53=1;
                    }
                    if($x1rr[3]==$rs['ball_'.$i.'']){
                        $h54=1;
                    }
                    if($x1rr[4]==$rs['ball_'.$i.'']){
                        $h55=1;
                    }
                }
                $h2nus=$h51+$h52+$h53+$h54+$h55;

                if($h2nus==5){
                    $isWinMulti = "true";
                    $win_money = $order["bet_money"]*$oddsArray[0];
                }else if($h2nus==4){
                    $isWinMulti = "true";
                    $win_money = $order["bet_money"]*$oddsArray[1];
                }else if($h2nus==3){
                    $isWinMulti = "true";
                    $win_money = $order["bet_money"]*$oddsArray[2];
                }
            }

            if($isWinMulti=="true"){
                $win_sign = "1";
                $bet_money_total = $win_money+$order['fs'];
                $bet_type = "彩票手工结算-彩票中奖";
            }else{
                $win_sign = "0";
                $bet_money_total = $order['fs'];
                $bet_type = "彩票手工结算-彩票反水";
            }
        }

        //修改主单
        $msql="update order_lottery set status='$stateType' where id='".$order['id']."'";
        $mysqli->query($msql) or die ("注单修改失败!!!".$order['id']);
        //修改子单
        if($isWinMulti == "true"){
            $msql="update order_lottery_sub set status='$stateType',is_win='$win_sign',win='$win_money' where id='".$order['sub_id']."'";
        }else{
            $msql="update order_lottery_sub set status='$stateType',is_win='$win_sign' where id='".$order['sub_id']."'";
        }
        $mysqli->query($msql) or die ("注单子单修改失败!!!".$order['sub_id']);
        if($win_sign == "1" || ($win_sign == "0" && $order['fs']>0 || $win_sign == "2")){
            $msql="update user_list set money=money+".$bet_money_total." where user_id=".$userid."";
            $mysqli->query($msql) or die ("会员修改失败!!!".$order['sub_id']);
            //插入金钱记录
            $balance=	$assets + $bet_money_total;
            $sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`)
                        VALUES ('$userid','$datereg','北京快乐8',now(),'$bet_type','$bet_money_total','$assets','$balance');";
            $mysqli->query($sql) or die ("插入金钱记录失败!!!".$order['sub_id']);
        }
    }


    //最后更新彩票结果表，状态修改
    $msql="update lottery_result_bjkn set state='$stateType' WHERE qishu='".$qi."'";
    $mysqli->query($msql) or die ("期数修改失败!!!");
    message($jiesuanString,$url);
}