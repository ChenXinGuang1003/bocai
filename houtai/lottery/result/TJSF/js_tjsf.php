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
include_once($C_Patch."/app/member/class/lottery_result_tjsf.php");
include_once($C_Patch."/app/member/class/lottery_order.php");
include_once($C_Patch."/app/member/class/user_list.php");
include_once("../Js_Class.php");

if(strpos($quanxian,'手工录入彩票结果')){
    $qi 		= $_GET['qi'];
    $jsType 		= $_GET['jsType'];
    $query_time 		= $_GET['s_time'];

    //获取开奖号码
    $rs = lottery_result_tjsf::getLotteryResult($qi);
    $hm 		= array();
    $hm[]		= $rs['ball_1'];
    $hm[]		= $rs['ball_2'];
    $hm[]		= $rs['ball_3'];
    $hm[]		= $rs['ball_4'];
    $hm[]		= $rs['ball_5'];
    $hm[]		= $rs['ball_6'];
    $hm[]		= $rs['ball_7'];
    $hm[]		= $rs['ball_8'];

    $jiesuanString = "结算成功。";
    $url = "result_tjsf.php?s_time=$query_time";
    $stateType = "1";

    if($jsType==1){//状态为已结算，对所有的订单进行结算，需要从客户那边收回钱然后再进行结算
        //获取已结算的订单
        $orders = lottery_order::getOrdersJs("TJSF",$qi);
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
                            VALUES ('$userid','$datereg','天津十分彩',now(),'彩票重新结算-扣钱','$bet_money_total','$assets','$balance');";
                    $mysqli->query($sql) or die ("插入金钱记录失败!!!".$order['sub_id']);
                }
            }
        }

        $jiesuanString = "重算成功。";
        $stateType = "2";
    }

    $hms[]		= G10_Auto($hm,1);
    $hms[]		= G10_Auto($hm,2);
    $hms[]		= G10_Auto($hm,3);
    $hms[]		= G10_Auto($hm,4);
    $hms[]		= G10_Auto($hm,5);

    $ds_1		= G10_Ds($rs['ball_1']);
    $ds_2		= G10_Ds($rs['ball_2']);
    $ds_3		= G10_Ds($rs['ball_3']);
    $ds_4		= G10_Ds($rs['ball_4']);
    $ds_5		= G10_Ds($rs['ball_5']);
    $ds_6		= G10_Ds($rs['ball_6']);
    $ds_7		= G10_Ds($rs['ball_7']);
    $ds_8		= G10_Ds($rs['ball_8']);

    $dx_1		= G10_Dx($rs['ball_1']);
    $dx_2		= G10_Dx($rs['ball_2']);
    $dx_3		= G10_Dx($rs['ball_3']);
    $dx_4		= G10_Dx($rs['ball_4']);
    $dx_5		= G10_Dx($rs['ball_5']);
    $dx_6		= G10_Dx($rs['ball_6']);
    $dx_7		= G10_Dx($rs['ball_7']);
    $dx_8		= G10_Dx($rs['ball_8']);

    $wsdx_1	= G10_WsDx($rs['ball_1']);
    $wsdx_2	= G10_WsDx($rs['ball_2']);
    $wsdx_3	= G10_WsDx($rs['ball_3']);
    $wsdx_4	= G10_WsDx($rs['ball_4']);
    $wsdx_5	= G10_WsDx($rs['ball_5']);
    $wsdx_6	= G10_WsDx($rs['ball_6']);
    $wsdx_7	= G10_WsDx($rs['ball_7']);
    $wsdx_8	= G10_WsDx($rs['ball_8']);

    $hsds_1	= G10_HsDs($rs['ball_1']);
    $hsds_2	= G10_HsDs($rs['ball_2']);
    $hsds_3	= G10_HsDs($rs['ball_3']);
    $hsds_4	= G10_HsDs($rs['ball_4']);
    $hsds_5	= G10_HsDs($rs['ball_5']);
    $hsds_6	= G10_HsDs($rs['ball_6']);
    $hsds_7	= G10_HsDs($rs['ball_7']);
    $hsds_8	= G10_HsDs($rs['ball_8']);

    $fw_1		= G10_Fw($rs['ball_1']);
    $fw_2		= G10_Fw($rs['ball_2']);
    $fw_3		= G10_Fw($rs['ball_3']);
    $fw_4		= G10_Fw($rs['ball_4']);
    $fw_5		= G10_Fw($rs['ball_5']);
    $fw_6		= G10_Fw($rs['ball_6']);
    $fw_7		= G10_Fw($rs['ball_7']);
    $fw_8		= G10_Fw($rs['ball_8']);

    $zfb_1	= G10_Zfb($rs['ball_1']);
    $zfb_2	= G10_Zfb($rs['ball_2']);
    $zfb_3	= G10_Zfb($rs['ball_3']);
    $zfb_4	= G10_Zfb($rs['ball_4']);
    $zfb_5	= G10_Zfb($rs['ball_5']);
    $zfb_6	= G10_Zfb($rs['ball_6']);
    $zfb_7	= G10_Zfb($rs['ball_7']);
    $zfb_8	= G10_Zfb($rs['ball_8']);

    //获取未结算的订单
    $orders = lottery_order::getOrdersByStatus("TJSF",$qi,"0");
    if($orders==null){
        $msql="update lottery_result_tjsf set state='$stateType' WHERE qishu='".$qi."'";
        $mysqli->query($msql) or die ("期数修改失败!!!");
        message($jiesuanString,$url);
        exit;
    }
    foreach($orders as $order){
        $betInfo = explode(":",$order["number"]);
        $rTypeName = $order["rtype_str"];
        $quick_type = $order["quick_type"];
        if($betInfo[1]=="LOCATE"){//每球定位
            $selectBall = $betInfo[2];
            $betContent = $betInfo[0];
            if($betInfo[2]=="S"){
                $selectBall = "8";
            }
        }elseif($betInfo[1]=="MATCH"){//一中一
            $selectBall = "一中一";
            $betContent = $betInfo[0];
        }elseif($betInfo[0]!="ALL" && in_array($betInfo[1].":".$betInfo[2],array("LAST:OVER","LAST:UNDER","SUM:ODD","SUM:EVEN"))){//每球 尾数，总和
            $selectBall = $betInfo[0];
            $betContent = $betInfo[1].':'.$betInfo[2];
            if($betInfo[0]=="S"){
                $selectBall = "8";
            }
        }elseif($betInfo[0]=="ALL" || in_array($betInfo[1].":".$betInfo[2],array("S:DRAGON","S:TIGER"))){//所有球总和
            $selectBall = "总和";
            $betContent = $betInfo[1].':'.$betInfo[2];
            if($order["number"]=="ALL:SUM:LAST:OVER" || $order["number"]=="ALL:SUM:LAST:UNDER"){
                $betContent = $betInfo[1].':'.$betInfo[2].':'.$betInfo[3];
            }
        }elseif($rTypeName=="快速-天津快乐十分"){
            $selectBall = "quick";
        }else{//每球 其他，如中发白、四季五行、龙虎、大小、单双
            $selectBall = $betInfo[0];
            $betContent = $betInfo[1];
            if($betInfo[0]=="S"){
                $selectBall = "8";
            }
        }

        $userid = $order['user_id'];
        $datereg = $order['order_sub_num'];
        $rsMoney	= user_list::getUserMoney($userid);
        $assets	=	round($rsMoney['money'],2);

        if(in_array($selectBall,array("1","2","3","4","5","6","7","8"))){
            //各种玩法，算法
            $ds		= convertToEn(G10_Ds($rs['ball_'.$selectBall]));
            $dx		= convertToEn(G10_Dx($rs['ball_'.$selectBall]));
            $wsdx	= convertToEn(G10_WsDx($rs['ball_'.$selectBall]));
            $hsds	= convertToEn(G10_HsDs($rs['ball_'.$selectBall]));
            $fw		= convertToEn(G10_Fw($rs['ball_'.$selectBall]));
            $zfb	= convertToEn(G10_Zfb($rs['ball_'.$selectBall]));
            $season	= convertToEn(G10_season($rs['ball_'.$selectBall]));
            $wuxing	= convertToEn(G10_wuxing($rs['ball_'.$selectBall]));

            if(in_array($betContent, array($rs['ball_'.$selectBall],$ds, $dx, $wsdx, $hsds, $fw, $zfb, $season, $wuxing))){
                $win_sign = "1";
                $bet_money_total = $order['win']+$order['fs'];
                $bet_type = "彩票手工结算-彩票中奖";
            }else{
                $win_sign = "0";
                $bet_money_total = $order['fs'];
                $bet_type = "彩票手工结算-彩票反水";
            }
        }elseif($selectBall=="总和"){
            $zhdx   = convertToEn(G10_Auto($hm,2));   //总和大小
            $zhds   = convertToEn(G10_Auto($hm,3));   //总和单双
            $zhwsdx = convertToEn(G10_Auto($hm,4));   //总和尾大小
            $lh     = convertToEn(G10_Auto($hm,5));   //总和龙虎

            if(in_array($betContent, array($zhdx,$zhds,$zhwsdx,$lh))){
                $win_sign = "1";
                $bet_money_total = $order['win']+$order['fs'];
                $bet_type = "彩票手工结算-彩票中奖";
            }elseif(in_array($betContent, array("SUM:OVER","SUM:UNDER")) && $zhdx=='SUM:TIE'){
                $win_sign = "2";
                $bet_money_total = $order['bet_money'];
                $bet_type = "彩票手工结算-彩票和局";
            }else{
                $win_sign = "0";
                $bet_money_total = $order['fs'];
                $bet_type = "彩票手工结算-彩票反水";
            }
        }elseif($selectBall=="一中一"){
            if(in_array($betContent, array($rs['ball_1'],$rs['ball_2'],$rs['ball_3'],$rs['ball_4'],$rs['ball_5'],
                $rs['ball_6'],$rs['ball_7'],$rs['ball_8']))){
                $win_sign = "1";
                $bet_money_total = $order['win']+$order['fs'];
                $bet_type = "彩票手工结算-彩票中奖";
            }else{
                $win_sign = "0";
                $bet_money_total = $order['fs'];
                $bet_type = "彩票手工结算-彩票反水";
            }
        }elseif($selectBall=="quick"){
            $betInfo = $order["number"];
            $is_win = "false";
            if($quick_type=="第一球"){
                if($betInfo==$rs['ball_1'] || $betInfo==$ds_1 || $betInfo==$dx_1 || $betInfo==$wsdx_1|| $betInfo==$hsds_1|| $betInfo==$fw_1|| $betInfo==$zfb_1){
                    $is_win = "true";
                }
            }elseif($quick_type=="第二球"){
                if($betInfo==$rs['ball_2'] || $betInfo==$ds_2 || $betInfo==$dx_2 || $betInfo==$wsdx_2|| $betInfo==$hsds_2|| $betInfo==$fw_2|| $betInfo==$zfb_2){
                    $is_win = "true";
                }
            }elseif($quick_type=="第三球"){
                if($betInfo==$rs['ball_3'] || $betInfo==$ds_3 || $betInfo==$dx_3 || $betInfo==$wsdx_3|| $betInfo==$hsds_3|| $betInfo==$fw_3|| $betInfo==$zfb_3){
                    $is_win = "true";
                }
            }elseif($quick_type=="第四球"){
                if($betInfo==$rs['ball_4'] || $betInfo==$ds_4 || $betInfo==$dx_4 || $betInfo==$wsdx_4|| $betInfo==$hsds_4|| $betInfo==$fw_4|| $betInfo==$zfb_4){
                    $is_win = "true";
                }
            }elseif($quick_type=="第五球"){
                if($betInfo==$rs['ball_5'] || $betInfo==$ds_5 || $betInfo==$dx_5 || $betInfo==$wsdx_5|| $betInfo==$hsds_5|| $betInfo==$fw_5|| $betInfo==$zfb_5){
                    $is_win = "true";
                }
            }elseif($quick_type=="第六球"){
                if($betInfo==$rs['ball_6'] || $betInfo==$ds_6 || $betInfo==$dx_6|| $betInfo==$wsdx_6|| $betInfo==$hsds_6|| $betInfo==$fw_6|| $betInfo==$zfb_6){
                    $is_win = "true";
                }
            }elseif($quick_type=="第七球"){
                if($betInfo==$rs['ball_7'] || $betInfo==$ds_7 || $betInfo==$dx_7|| $betInfo==$wsdx_7|| $betInfo==$hsds_7|| $betInfo==$fw_7|| $betInfo==$zfb_7){
                    $is_win = "true";
                }
            }elseif($quick_type=="第八球"){
                if($betInfo==$rs['ball_8'] || $betInfo==$ds_8 || $betInfo==$dx_8|| $betInfo==$wsdx_8|| $betInfo==$hsds_8|| $betInfo==$fw_8|| $betInfo==$zfb_8){
                    $is_win = "true";
                }
            }elseif($quick_type=="总和龙虎"){
                if($betInfo==$hms[1] || $betInfo==$hms[2] || $betInfo==$hms[3] || $betInfo==$hms[4]){
                    $is_win = "true";
                }
                if($hms[1]=="和" && ($betInfo=="总和小" || $betInfo=="总和大")){
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
                        VALUES ('$userid','$datereg','天津十分彩',now(),'$bet_type','$bet_money_total','$assets','$balance');";
            $mysqli->query($sql) or die ("插入金钱记录失败!!!".$order['sub_id']);
        }
    }


    //最后更新彩票结果表，状态修改
    $msql="update lottery_result_tjsf set state='$stateType' WHERE qishu='".$qi."'";
    $mysqli->query($msql) or die ("期数修改失败!!!");
    message($jiesuanString,$url);
}