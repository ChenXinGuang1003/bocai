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
include_once($C_Patch."/app/member/class/lottery_result_gd11.php");
include_once($C_Patch."/app/member/class/lottery_order.php");
include_once($C_Patch."/app/member/class/user_list.php");
include_once("../Js_Class.php");

if(strpos($quanxian,'手工录入彩票结果')){
    $qi 		= $_GET['qi'];
    $jsType 		= $_GET['jsType'];
    $query_time 		= $_GET['s_time'];

    //获取开奖号码
    $rs = lottery_result_gd11::getLotteryResult($qi);
    $hm 		= array();
    $hm[]		= $rs['ball_1'];
    $hm[]		= $rs['ball_2'];
    $hm[]		= $rs['ball_3'];
    $hm[]		= $rs['ball_4'];
    $hm[]		= $rs['ball_5'];

    $jiesuanString = "结算成功。";
    $url = "result_gd11.php?s_time=$query_time";
    $stateType = "1";

    if($jsType==1){//状态为已结算，对所有的订单进行结算，需要从客户那边收回钱然后再进行结算
        //获取已结算的订单
        $orders = lottery_order::getOrdersJs("GD11",$qi);
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
                            VALUES ('$userid','$datereg','广东十一选五',now(),'彩票重新结算-扣钱','$bet_money_total','$assets','$balance');";
                    $mysqli->query($sql) or die ("插入金钱记录失败!!!".$order['sub_id']);
                }
            }
        }

        $jiesuanString = "重算成功。";
        $stateType = "2";
    }



    //获取未结算的订单
    $orders = lottery_order::getOrdersByStatus("GD11",$qi,"0");
    if($orders==null){
        $msql="update lottery_result_gd11 set state='$stateType' WHERE qishu='".$qi."'";
        $mysqli->query($msql) or die ("期数修改失败!!!");
        message($jiesuanString,$url);
        exit;
    }

    $ballArray        = array($rs['ball_1'],$rs['ball_2'],$rs['ball_3'],$rs['ball_4'],$rs['ball_5']);
    $beforeThreeArray = array($rs['ball_1'],$rs['ball_2'],$rs['ball_3']);
    $middleThreeArray = array($rs['ball_2'],$rs['ball_3'],$rs['ball_4']);
    $afterThreeArray  = array($rs['ball_3'],$rs['ball_4'],$rs['ball_5']);
    $ball1 = $rs['ball_1'];
    $ball2 = $rs['ball_2'];
    $ball3 = $rs['ball_3'];
    $ball4 = $rs['ball_4'];
    $ball5 = $rs['ball_5'];

    $hms[]		= gd11x5_Auto($ballArray,1);
    $hms[]		= gd11x5_Auto($ballArray,2);
    $hms[]		= gd11x5_Auto($ballArray,3);
    $hms[]		= gd11x5_Auto($ballArray,4);
    $hms[]		= gd11x5_Auto($ballArray,5);
    $hms[]		= gd11x5_Auto($ballArray,6);
    $hms[]		= gd11x5_Auto($ballArray,7);

    $ds_1 = Ssc_Ds($ball1);
    $dx_1 = gd11x5_Dx($ball1);
    $ds_2 = Ssc_Ds($ball2);
    $dx_2 = gd11x5_Dx($ball2);
    $ds_3 = Ssc_Ds($ball3);
    $dx_3 = gd11x5_Dx($ball3);
    $ds_4 = Ssc_Ds($ball4);
    $dx_4 = gd11x5_Dx($ball4);
    $ds_5 = Ssc_Ds($ball5);
    $dx_5 = gd11x5_Dx($ball5);

    $zh_dx = gd11x5_Auto($ballArray,2);
    $zh_ds = gd11x5_Auto($ballArray,3);
    $zh_tiger = gd11x5_Auto($ballArray,4);
    $zh_dx_en = getEnNameGd11($zh_dx);
    $zh_ds_en = getEnNameGd11($zh_ds);
    $zh_tiger_en = getEnNameGd11($zh_tiger);

    $before_shunzi = gd11x5_Auto($beforeThreeArray,5);
    $middle_shunzi = gd11x5_Auto($middleThreeArray,5);
    $after_shunzi = gd11x5_Auto($afterThreeArray,5);
    $before_shunzi_en = getEnNameGd11($before_shunzi);
    $middle_shunzi_en = getEnNameGd11($middle_shunzi);
    $after_shunzi_en = getEnNameGd11($after_shunzi);

    $ball1_Ds = lhc_Ds($ball1);
    $ball2_Ds = lhc_Ds($ball2);
    $ball3_Ds = lhc_Ds($ball3);
    $ball4_Ds = lhc_Ds($ball4);
    $ball5_Ds = lhc_Ds($ball5);
    $ball1_Ds_en = getEnNameGd11($ball1_Ds);
    $ball2_Ds_en = getEnNameGd11($ball2_Ds);
    $ball3_Ds_en = getEnNameGd11($ball3_Ds);
    $ball4_Ds_en = getEnNameGd11($ball4_Ds);
    $ball5_Ds_en = getEnNameGd11($ball5_Ds);

    $ball1_Dx = gd11x5_Dx($ball1);
    $ball2_Dx = gd11x5_Dx($ball2);
    $ball3_Dx = gd11x5_Dx($ball3);
    $ball4_Dx = gd11x5_Dx($ball4);
    $ball5_Dx = gd11x5_Dx($ball5);
    $ball1_Dx_en = getEnNameGd11($ball1_Dx);
    $ball2_Dx_en = getEnNameGd11($ball2_Dx);
    $ball3_Dx_en = getEnNameGd11($ball3_Dx);
    $ball4_Dx_en = getEnNameGd11($ball4_Dx);
    $ball5_Dx_en = getEnNameGd11($ball5_Dx);

    $ball1_HsDs = lhc_HsDs($ball1);
    $ball2_HsDs = lhc_HsDs($ball2);
    $ball3_HsDs = lhc_HsDs($ball3);
    $ball4_HsDs = lhc_HsDs($ball4);
    $ball5_HsDs = lhc_HsDs($ball5);
    $ball1_HsDs_en = getEnNameGd11($ball1_HsDs);
    $ball2_HsDs_en = getEnNameGd11($ball2_HsDs);
    $ball3_HsDs_en = getEnNameGd11($ball3_HsDs);
    $ball4_HsDs_en = getEnNameGd11($ball4_HsDs);
    $ball5_HsDs_en = getEnNameGd11($ball5_HsDs);

    $ball1_WsDx = lhc_WsDx($ball1);
    $ball2_WsDx = lhc_WsDx($ball2);
    $ball3_WsDx = lhc_WsDx($ball3);
    $ball4_WsDx = lhc_WsDx($ball4);
    $ball5_WsDx = lhc_WsDx($ball5);
    $ball1_WsDx_en = getEnNameGd11($ball1_WsDx);
    $ball2_WsDx_en = getEnNameGd11($ball2_WsDx);
    $ball3_WsDx_en = getEnNameGd11($ball3_WsDx);
    $ball4_WsDx_en = getEnNameGd11($ball4_WsDx);
    $ball5_WsDx_en = getEnNameGd11($ball5_WsDx);

    foreach($orders as $order){
        $is_win = "false";
        $betInfo = explode(":",$order["number"]);
        $quick_type = $order["quick_type"];
        $rTypeName = $order["rtype_str"];

        if($betInfo[1]=="LOCATE"){//每球定位
            $selectBall = $betInfo[2];
            if($selectBall == "1"){
                if($betInfo[0]==$ball1){
                    $is_win = "true";
                }
            }elseif($selectBall == "2"){
                if($betInfo[0]==$ball2){
                    $is_win = "true";
                }
            }elseif($selectBall == "3"){
                if($betInfo[0]==$ball3){
                    $is_win = "true";
                }
            }elseif($selectBall == "4"){
                if($betInfo[0]==$ball4){
                    $is_win = "true";
                }
            }elseif($selectBall == "5"){
                if($betInfo[0]==$ball5){
                    $is_win = "true";
                }
            }
        }elseif($betInfo[1]=="MATCH"){
            if(in_array($betInfo[0],$ballArray)){
                $is_win = "true";
            }
        }elseif($betInfo[0]=="TOTAL"){
            if(in_array($betInfo[1],array($zh_dx_en,$zh_ds_en,$zh_tiger_en))){
                $is_win = "true";
            }elseif(($betInfo[1]=="OVER" || $betInfo[1]=="UNDER") && $zh_dx=="总和30"){
                $is_win = "tie";
            }
        }elseif($betInfo[0]=="BEFORE" || $betInfo[0]=="MIDDLE" || $betInfo[0]=="AFTER"){
            if(($betInfo[0]=="BEFORE") && ($betInfo[1]==$before_shunzi_en)){
                $is_win = "true";
            }elseif(($betInfo[0]=="MIDDLE") && ($betInfo[1]==$middle_shunzi_en)){
                $is_win = "true";
            }elseif(($betInfo[0]=="AFTER") && ($betInfo[1]==$after_shunzi_en)){
                $is_win = "true";
            }
        }
        elseif($rTypeName=="快速-广东11选5"){
            $betInfo = $order["number"];
            if($quick_type=="第一球"){
                if($betInfo==$dx_1 || $betInfo==$ds_1 || $betInfo==$ball1){
                    $is_win = "true";
                }
            }elseif($quick_type=="第二球"){
                if($betInfo==$dx_2 || $betInfo==$ds_2 || $betInfo==$ball2){
                    $is_win = "true";
                }
            }elseif($quick_type=="第三球"){
                if($betInfo==$dx_3 || $betInfo==$ds_3 || $betInfo==$ball3){
                    $is_win = "true";
                }
            }elseif($quick_type=="第四球"){
                if($betInfo==$dx_4 || $betInfo==$ds_4 || $betInfo==$ball4){
                    $is_win = "true";
                }
            }elseif($quick_type=="第五球"){
                if($betInfo==$dx_5 || $betInfo==$ds_5 || $betInfo==$ball5){
                    $is_win = "true";
                }
            }elseif($quick_type=="总和龙虎和"){
                if(in_array($betInfo,array($hms[1],$hms[2],$hms[3]))){
                    $is_win = "true";
                }elseif(($betInfo=="总和大" || $betInfo=="总和小") &&$zh_dx=="总和30"){
                    $is_win = "tie";
                }
            }elseif($quick_type=="前三"){
                if($betInfo==$hms[4]){
                    $is_win = "true";
                }
            }elseif($quick_type=="中三"){
                if($betInfo==$hms[5]){
                    $is_win = "true";
                }
            }elseif($quick_type=="后三"){
                if($betInfo==$hms[6]){
                    $is_win = "true";
                }
            }
        }
        else{
            if($betInfo[0]=="1"){
                if(in_array($betInfo[1],array($ball1_Ds_en,$ball1_Dx_en))){
                    $is_win = "true";
                }
                if($betInfo[2]){
                    if(in_array($betInfo[1].":".$betInfo[2],array($ball1_HsDs_en,$ball1_WsDx_en))){
                        $is_win = "true";
                    }
                }
            }elseif($betInfo[0] == "2"){
                if(in_array($betInfo[1],array($ball2_Ds_en,$ball2_Dx_en))){
                    $is_win = "true";
                }
                if($betInfo[2]){
                    if(in_array($betInfo[1].":".$betInfo[2],array($ball2_HsDs_en,$ball2_WsDx_en))){
                        $is_win = "true";
                    }
                }
            }elseif($betInfo[0] == "3"){
                if(in_array($betInfo[1],array($ball3_Ds_en,$ball3_Dx_en))){
                    $is_win = "true";
                }
                if($betInfo[2]){
                    if(in_array($betInfo[1].":".$betInfo[2],array($ball3_HsDs_en,$ball3_WsDx_en))){
                        $is_win = "true";
                    }
                }
            }elseif($betInfo[0] == "4"){
                if(in_array($betInfo[1],array($ball4_Ds_en,$ball4_Dx_en))){
                    $is_win = "true";
                }
                if($betInfo[2]){
                    if(in_array($betInfo[1].":".$betInfo[2],array($ball4_HsDs_en,$ball4_WsDx_en))){
                        $is_win = "true";
                    }
                }
            }elseif($betInfo[0] == "5"){
                if(in_array($betInfo[1],array($ball5_Ds_en,$ball5_Dx_en))){
                    $is_win = "true";
                }
                if($betInfo[2]){
                    if(in_array($betInfo[1].":".$betInfo[2],array($ball5_HsDs_en,$ball5_WsDx_en))){
                        $is_win = "true";
                    }
                }
            }
        }

        $userid = $order['user_id'];
        $datereg = $order['order_sub_num'];
        $rsMoney	= user_list::getUserMoney($userid);
        $assets	=	round($rsMoney['money'],2);

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

        //修改主单
        $msql="update order_lottery set status='$stateType' where id='".$order['id']."'";
        $mysqli->query($msql) or die ("注单修改失败!!!".$order['id']);
        //修改子单
        $msql="update order_lottery_sub set status='$stateType',is_win='$win_sign' where id='".$order['sub_id']."'";
        $mysqli->query($msql) or die ("注单子单修改失败!!!".$order['sub_id']);
        if($win_sign == "1" || ($win_sign == "0" && $order['fs']>0 || $win_sign == "2")){
            $msql="update user_list set money=money+".$bet_money_total." where user_id=".$userid."";
            $mysqli->query($msql) or die ("会员修改失败!!!".$order['sub_id']);
            //插入金钱记录
            $balance=	$assets + $bet_money_total;
            $sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`)
                        VALUES ('$userid','$datereg','广东十一选五',now(),'$bet_type','$bet_money_total','$assets','$balance');";
            $mysqli->query($sql) or die ("插入金钱记录失败!!!".$order['sub_id']);
        }
    }


    //最后更新彩票结果表，状态修改
    $msql="update lottery_result_gd11 set state='$stateType' WHERE qishu='".$qi."'";
    $mysqli->query($msql) or die ("期数修改失败!!!");
    message($jiesuanString,$url);
}