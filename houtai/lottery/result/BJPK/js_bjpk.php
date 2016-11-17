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
include_once($C_Patch."/app/member/class/lottery_result_bjpk.php");
include_once($C_Patch."/app/member/class/lottery_order.php");
include_once($C_Patch."/app/member/class/user_list.php");
include_once("../Js_Class.php");

if(strpos($quanxian,'手工录入彩票结果')){
    $qi 		= $_GET['qi'];
    $jsType 		= $_GET['jsType'];
    $query_time 		= $_GET['s_time'];

    //获取开奖号码
    $rs = lottery_result_bjpk::getLotteryResult($qi);
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

    $jiesuanString = "结算成功。";
    $url = "result_bjpk.php?s_time=$query_time";
    $stateType = "1";

    if($jsType==1){//状态为已结算，对所有的订单进行结算，需要从客户那边收回钱然后再进行结算
        //获取已结算的订单
        $orders = lottery_order::getOrdersJs("BJPK",$qi);
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
                            VALUES ('$userid','$datereg','北京PK拾',now(),'彩票重新结算-扣钱','$bet_money_total','$assets','$balance');";
                    $mysqli->query($sql) or die ("插入金钱记录失败!!!".$order['sub_id']);
                }
            }
        }

        $jiesuanString = "重算成功。";
        $stateType = "2";
    }



    //获取未结算的订单
    $orders = lottery_order::getOrdersByStatus("BJPK",$qi,"0");
    if($orders==null){
        $msql="update lottery_result_bjpk set state='$stateType' WHERE qishu='".$qi."'";
        $mysqli->query($msql) or die ("期数修改失败!!!");
        message($jiesuanString,$url);
        exit;
    }

    $hms[]		= Pk10_Auto_quick($hm,1);
    $hms[]		= Pk10_Auto_quick($hm,2);
    $hms[]		= Pk10_Auto_quick($hm,3);
    $hms[]		= Pk10_Auto_quick($hm,4);
    $hms[]		= Pk10_Auto_quick($hm,5);
    $hms[]		= Pk10_Auto_quick($hm,6);
    $hms[]		= Pk10_Auto_quick($hm,7);
    $hms[]		= Pk10_Auto_quick($hm,8);
    $ds_1 = Ssc_Ds($rs['ball_1']);
    $dx_1 = pk10_Dx($rs['ball_1']);
    $lh_1 = Pk10_long_hu($rs['ball_1'],$rs['ball_10']);
    $ds_2 = Ssc_Ds($rs['ball_2']);
    $dx_2 = pk10_Dx($rs['ball_2']);
    $lh_2 = Pk10_long_hu($rs['ball_2'],$rs['ball_9']);
    $ds_3 = Ssc_Ds($rs['ball_3']);
    $dx_3 = pk10_Dx($rs['ball_3']);
    $lh_3 = Pk10_long_hu($rs['ball_3'],$rs['ball_8']);
    $ds_4 = Ssc_Ds($rs['ball_4']);
    $dx_4 = pk10_Dx($rs['ball_4']);
    $lh_4 = Pk10_long_hu($rs['ball_4'],$rs['ball_7']);
    $ds_5 = Ssc_Ds($rs['ball_5']);
    $dx_5 = pk10_Dx($rs['ball_5']);
    $lh_5 = Pk10_long_hu($rs['ball_5'],$rs['ball_6']);
    $ds_6 = Ssc_Ds($rs['ball_6']);
    $dx_6 = pk10_Dx($rs['ball_6']);
    $ds_7 = Ssc_Ds($rs['ball_7']);
    $dx_7 = pk10_Dx($rs['ball_7']);
    $ds_8 = Ssc_Ds($rs['ball_8']);
    $dx_8 = pk10_Dx($rs['ball_8']);
    $ds_9 = Ssc_Ds($rs['ball_9']);
    $dx_9 = pk10_Dx($rs['ball_9']);
    $ds_10 = Ssc_Ds($rs['ball_10']);
    $dx_10 = pk10_Dx($rs['ball_10']);
    foreach($orders as $order){
        $betInfo = explode(":",$order["number"]);
        $rTypeName = $order["rtype_str"];
        $quick_type = $order["quick_type"];
        if($betInfo[1]=="LOCATE"){//每球定位
            $selectBall = $betInfo[2];
            $betContent = $betInfo[0];
        }elseif($betInfo[2]=="DRAGON" || $betInfo[2]=="TIGER"){//龙虎
            $selectBall = $betInfo[0];
            $betContent = $betInfo[0].":".$betInfo[1].":".$betInfo[2];
        }elseif($betInfo[0].":".$betInfo[1].":".$betInfo[2]=="SUM:FIRST:2"){//冠亚军和
            $selectBall = "冠亚军和";
            if(count($betInfo)==4){
                $betContent = $betInfo[3];
            }else{
                $zhArray 		= array();
                if($betInfo[4]=="11"){
                    $zhArray[] = $betInfo[4];
                }else{
                    $zhArray[] = $betInfo[4];
                    $zhArray[] = $betInfo[5];
                    $zhArray[] = $betInfo[6];
                    $zhArray[] = $betInfo[7];
                }
            }
        }elseif($rTypeName=="快速-北京PK拾"){
            $selectBall = "quick";
        }else{//每球 其他，如龙虎、大小、单双
            $selectBall = $betInfo[0];
            $betContent = $betInfo[1];
        }

        $userid = $order['user_id'];
        $datereg = $order['order_sub_num'];
        $rsMoney	= user_list::getUserMoney($userid);
        $assets	=	round($rsMoney['money'],2);

        if(in_array($selectBall,array("1","2","3","4","5","6","7","8","9","10"))){
            //各种玩法，算法
            $ds		= convertToEn(Pk10_Auto($hm , 10 ,$rs['ball_'.$selectBall]));
            $dx		= convertToEn(Pk10_Auto($hm , 9 ,$rs['ball_'.$selectBall]));
            if(in_array($selectBall,array("1","2","3","4","5"))){
                $lh		= convertToEnPK10(Pk10_Auto($hm , $selectBall+3 , 0),$selectBall);
            }

            if(in_array($betContent, array($rs['ball_'.$selectBall],$ds, $dx,$lh))){
                $win_sign = "1";
                $bet_money_total = $order['win']+$order['fs'];
                $bet_type = "彩票手工结算-彩票中奖";
            }else{
                $win_sign = "0";
                $bet_money_total = $order['fs'];
                $bet_type = "彩票手工结算-彩票反水";
            }
        }elseif($selectBall=="冠亚军和"){
            $zhdx   = convertToEnPK10(Pk10_Auto($hm , 2 , 0),null);   //总和大小
            $zhds   = convertToEnPK10(Pk10_Auto($hm , 3 , 0),null);   //总和单双
            $zh		= Pk10_Auto($hm , 1 , 0);

            if(in_array($betContent, array($zhdx,$zhds)) || in_array($zh,$zhArray)){
                $win_sign = "1";
                $bet_money_total = $order['win']+$order['fs'];
                $bet_type = "彩票手工结算-彩票中奖";
            }elseif(in_array($betContent, array("OVER","UNDER","ODD","EVEN")) && $zhdx=='SUM:TIE'){
                $win_sign = "2";
                $bet_money_total = $order['bet_money'];
                $bet_type = "彩票手工结算-彩票和局";
            }else{
                $win_sign = "0";
                $bet_money_total = $order['fs'];
                $bet_type = "彩票手工结算-彩票反水";
            }
        }elseif($selectBall=="quick"){//快速彩票
            $betInfo = $order["number"];
            $is_win = "false";
            if($quick_type=="冠军"){
                if($betInfo==$rs['ball_1'] || $betInfo==$ds_1 || $betInfo==$dx_1 || $betInfo==$lh_1){
                    $is_win = "true";
                }
            }elseif($quick_type=="亚军"){
                if($betInfo==$rs['ball_2'] || $betInfo==$ds_2 || $betInfo==$dx_2 || $betInfo==$lh_2){
                    $is_win = "true";
                }
            }elseif($quick_type=="第三名"){
                if($betInfo==$rs['ball_3'] || $betInfo==$ds_3 || $betInfo==$dx_3 || $betInfo==$lh_3){
                    $is_win = "true";
                }
            }elseif($quick_type=="第四名"){
                if($betInfo==$rs['ball_4'] || $betInfo==$ds_4 || $betInfo==$dx_4 || $betInfo==$lh_4){
                    $is_win = "true";
                }
            }elseif($quick_type=="第五名"){
                if($betInfo==$rs['ball_5'] || $betInfo==$ds_5 || $betInfo==$dx_5 || $betInfo==$lh_5){
                    $is_win = "true";
                }
            }elseif($quick_type=="第六名"){
                if($betInfo==$rs['ball_6'] || $betInfo==$ds_6 || $betInfo==$dx_6){
                    $is_win = "true";
                }
            }elseif($quick_type=="第七名"){
                if($betInfo==$rs['ball_7'] || $betInfo==$ds_7 || $betInfo==$dx_7){
                    $is_win = "true";
                }
            }elseif($quick_type=="第八名"){
                if($betInfo==$rs['ball_8'] || $betInfo==$ds_8 || $betInfo==$dx_8){
                    $is_win = "true";
                }
            }elseif($quick_type=="第九名"){
                if($betInfo==$rs['ball_9'] || $betInfo==$ds_9 || $betInfo==$dx_9){
                    $is_win = "true";
                }
            }elseif($quick_type=="第十名"){
                if($betInfo==$rs['ball_10'] || $betInfo==$ds_10 || $betInfo==$dx_10){
                    $is_win = "true";
                }
            }elseif($quick_type=="冠亚军和"){
                if($betInfo==$hms[0] || $betInfo==$hms[1] || $betInfo==$hms[2]){
                    $is_win = "true";
                }
                if(11==($hm[0]+$hm[1]) && in_array($betInfo,array("大","小","双","单"))){
                    $is_win = "tie";
                }
            }
            if($is_win == "true"){
                $win_sign = "1";
                $bet_money_total = $order['win']+$order['fs'];
                $bet_type = "彩票手工结算-彩票中奖";
            }elseif($is_win == "tie"){
                $win_sign = "2";
                $bet_money_total = $order['bet_money'];
                $bet_type = "彩票手工结算-彩票和局";
            }else{
                $win_sign = "0";
                $bet_money_total = $order['fs'];
                $bet_type = "彩票手工结算-彩票反水";
            }
        }else{//选号
            $selectBall="选号";
            $betContentArray = explode(",",$order["number"]);
            $oddsArray = explode(",",$order["bet_rate"]);
            $isWinMulti = "false";

            if(count($betContentArray)==2){
                if($betContentArray[0]== $rs['ball_1'] && $betContentArray[1]== $rs['ball_2']){
                    $h2nus = 2;
                }elseif($betContentArray[0]== $rs['ball_1'] || $betContentArray[1]== $rs['ball_2']){
                    $h2nus=1;
                }else{
                    $h2nus=0;
                }
                if($h2nus==2){
                    $isWinMulti = "true";
                    $win_money = $order["bet_money"]*$oddsArray[0];
                }elseif($h2nus==1){
                    $isWinMulti = "true";
                    $win_money = $order["bet_money"]*$oddsArray[1];
                }
            }elseif(count($betContentArray)==3){
                if($betContentArray[0]== $rs['ball_1'] && $betContentArray[1]== $rs['ball_2'] && $betContentArray[2]== $rs['ball_3']){
                    $h2nus = 3;
                }elseif(($betContentArray[0]== $rs['ball_1'] && $betContentArray[1]== $rs['ball_2'])
                        || ($betContentArray[1]== $rs['ball_2'] && $betContentArray[2]== $rs['ball_3'])
                        || ($betContentArray[0]== $rs['ball_1'] && $betContentArray[2]== $rs['ball_3'])
                        ){
                    $h2nus=2;
                }else{
                    $h2nus=0;
                }

                if($h2nus==3){
                    $isWinMulti = "true";
                    $win_money = $order["bet_money"]*$oddsArray[0];
                }elseif($h2nus==2){
                    $isWinMulti = "true";
                    $win_money = $order["bet_money"]*$oddsArray[1];
                }
            }elseif(count($betContentArray)==4){
                if($betContentArray[0]== $rs['ball_1'] && $betContentArray[1]== $rs['ball_2'] && $betContentArray[2]== $rs['ball_3'] && $betContentArray[3]== $rs['ball_4']){
                    $h2nus = 4;
                }elseif(($betContentArray[0]== $rs['ball_1'] && $betContentArray[1]== $rs['ball_2']&& $betContentArray[2]== $rs['ball_3'])
                    || ($betContentArray[0]== $rs['ball_1'] && $betContentArray[1]== $rs['ball_2']&& $betContentArray[3]== $rs['ball_4'])
                    || ($betContentArray[0]== $rs['ball_1'] && $betContentArray[2]== $rs['ball_3']&& $betContentArray[3]== $rs['ball_4'])
                    || ($betContentArray[1]== $rs['ball_2'] && $betContentArray[2]== $rs['ball_3']&& $betContentArray[3]== $rs['ball_4'])
                ){
                    $h2nus=3;
                }elseif(($betContentArray[0]== $rs['ball_1'] && $betContentArray[1]== $rs['ball_2'])
                    || ($betContentArray[0]== $rs['ball_1'] && $betContentArray[2]== $rs['ball_3'])
                    || ($betContentArray[0]== $rs['ball_1'] && $betContentArray[3]== $rs['ball_4'])
                    || ($betContentArray[1]== $rs['ball_2'] && $betContentArray[2]== $rs['ball_3'])
                    || ($betContentArray[1]== $rs['ball_2'] && $betContentArray[3]== $rs['ball_4'])
                    || ($betContentArray[2]== $rs['ball_3'] && $betContentArray[3]== $rs['ball_4'])
                ){
                    $h2nus=2;
                }else{
                    $h2nus=0;
                }

                if($h2nus==4){
                    $isWinMulti = "true";
                    $win_money = $order["bet_money"]*$oddsArray[0];
                }elseif($h2nus==3){
                    $isWinMulti = "true";
                    $win_money = $order["bet_money"]*$oddsArray[1];
                }elseif($h2nus==2){
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
                        VALUES ('$userid','$datereg','北京PK拾',now(),'$bet_type','$bet_money_total','$assets','$balance');";
            $mysqli->query($sql) or die ("插入金钱记录失败!!!".$order['sub_id']);
        }
    }


    //最后更新彩票结果表，状态修改
    $msql="update lottery_result_bjpk set state='$stateType' WHERE qishu='".$qi."'";
    $mysqli->query($msql) or die ("期数修改失败!!!");
    message($jiesuanString,$url);
}