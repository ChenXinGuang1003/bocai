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
include_once($C_Patch."/app/member/class/lottery_result_gxsf.php");
include_once($C_Patch."/app/member/class/lottery_order.php");
include_once($C_Patch."/app/member/class/user_list.php");
include_once("../Js_Class.php");

if(strpos($quanxian,'手工录入彩票结果')){
    $qi 		= $_GET['qi'];
    $jsType 		= $_GET['jsType'];
    $query_time 		= $_GET['s_time'];

    //获取开奖号码
    $rs = lottery_result_gxsf::getLotteryResult($qi);
    $hm 		= array();
    $hm[]		= $rs['ball_1'];
    $hm[]		= $rs['ball_2'];
    $hm[]		= $rs['ball_3'];
    $hm[]		= $rs['ball_4'];
    $hm[]		= $rs['ball_5'];

    $jiesuanString = "结算成功。";
    $url = "result_gxsf.php?s_time=$query_time";
    $stateType = "1";

    if($jsType==1){//状态为已结算，对所有的订单进行结算，需要从客户那边收回钱然后再进行结算
        //获取已结算的订单
        $orders = lottery_order::getOrdersJs("GXSF",$qi);
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
                            VALUES ('$userid','$datereg','广西十分彩',now(),'彩票重新结算-扣钱','$bet_money_total','$assets','$balance');";
                    $mysqli->query($sql) or die ("插入金钱记录失败!!!".$order['sub_id']);
                }
            }
        }

        $jiesuanString = "重算成功。";
        $stateType = "2";
    }

    $hms[]		= gxsf_Auto($hm,1);
    $hms[]		= gxsf_Auto($hm,2);
    $hms[]		= gxsf_Auto($hm,3);
    $hms[]		= gxsf_Auto($hm,4);
    $hms[]		= gxsf_Auto($hm,5);
    $hms[]		= gxsf_Auto($hm,6);
    $hms[]		= gxsf_Auto($hm,7);
    $ds_1 = gxsf_Ds($rs['ball_1']);
    $dx_1 = gxsf_Dx($rs['ball_1']);
    $ds_2 = gxsf_Ds($rs['ball_2']);
    $dx_2 = gxsf_Dx($rs['ball_2']);
    $ds_3 = gxsf_Ds($rs['ball_3']);
    $dx_3 = gxsf_Dx($rs['ball_3']);
    $ds_4 = gxsf_Ds($rs['ball_4']);
    $dx_4 = gxsf_Dx($rs['ball_4']);
    $ds_5 = gxsf_Ds($rs['ball_5']);
    $dx_5 = gxsf_Dx($rs['ball_5']);

    //获取未结算的订单
    $orders = lottery_order::getOrdersByStatus("GXSF",$qi,"0");
    if($orders==null){
        $msql="update lottery_result_gxsf set state='$stateType' WHERE qishu='".$qi."'";
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
                $selectBall = "5";
            }
        }elseif($betInfo[1]=="MATCH"){//一中一
            $selectBall = "一中一";
            $betContent = $betInfo[0];
        }elseif($betInfo[0]!="ALL" && in_array($betInfo[1].":".$betInfo[2],array("LAST:OVER","LAST:UNDER","SUM:ODD","SUM:EVEN"))){//每球 尾数，总和
            $selectBall = $betInfo[0];
            $betContent = $betInfo[1].':'.$betInfo[2];
            if($betInfo[0]=="S"){
                $selectBall = "5";
            }
        }elseif(in_array($betInfo[1].":".$betInfo[2].":".$betInfo[3],array("OVER:S:ODD","OVER:S:EVEN","UNDER:S:ODD","UNDER:S:EVEN"))){//大单、大双、小单、小双
            $selectBall = $betInfo[0];
            $betContent = $betInfo[1].":".$betInfo[2].":".$betInfo[3];
            if($betInfo[0]=="S"){
                $selectBall = "5";
            }
        }elseif($rTypeName=="快速-广西十分彩"){
            $selectBall = "quick";
        }else{//每球 其他，如四季五行、大小、单双、红蓝绿波
            $selectBall = $betInfo[0];
            $betContent = $betInfo[1];
            if($betInfo[0]=="S"){
                $selectBall = "5";
            }
        }

        $userid = $order['user_id'];
        $datereg = $order['order_sub_num'];
        $rsMoney	= user_list::getUserMoney($userid);
        $assets	=	round($rsMoney['money'],2);

        if(in_array($selectBall,array("1","2","3","4","5")) && $rs['ball_'.$selectBall]!=21){//开奖结果不等于21的玩法
            //各种玩法，算法
            $ds		= convertToEn(gxsf_Ds($rs['ball_'.$selectBall]));
            $dx		= convertToEn(gxsf_Dx($rs['ball_'.$selectBall]));
            $wsdx	= convertToEn(gxsf_WsDx($rs['ball_'.$selectBall]));
            $hsds	= convertToEn(gxsf_HsDs($rs['ball_'.$selectBall]));
            $bante  = $dx.":S:".$ds;
            $season	= convertToEn(gxsf_season($rs['ball_'.$selectBall]));
            $wuxing	= convertToEn(gxsf_wuxing($rs['ball_'.$selectBall]));
            $color	= gxsf_color($rs['ball_'.$selectBall]);

            if(in_array($betContent, array($rs['ball_'.$selectBall],$ds, $dx, $wsdx, $hsds, $bante, $season, $wuxing,$color))){
                $win_sign = "1";
                $bet_money_total = $order['win']+$order['fs'];
                $bet_type = "彩票手工结算-彩票中奖";
            }else{
                $win_sign = "0";
                $bet_money_total = $order['fs'];
                $bet_type = "彩票手工结算-彩票反水";
            }
        }elseif(in_array($selectBall,array("1","2","3","4","5")) && $rs['ball_'.$selectBall]==21){//开奖结果等于21的玩法
            if($betContent== 21 || $betContent=="GREEN" || $betContent=="WOOD"){
                $win_sign = "1";
                $bet_money_total = $order['win']+$order['fs'];
                $bet_type = "彩票手工结算-彩票中奖";
            }elseif($betInfo[1]=="LOCATE" && $betContent!= 21 || $betContent=="RED" || $betContent=="BLUE"
                ||$betContent=="METAL" || $betContent=="WATER" || $betContent=="FIRE" || $betContent=="EARTH"){
                $win_sign = "0";
                $bet_money_total = $order['fs'];
                $bet_type = "彩票手工结算-彩票反水";
            }else{
                $win_sign = "2";
                $bet_money_total = $order['bet_money'];
                $bet_type = "彩票手工结算-彩票和局";
            }
        }elseif($selectBall=="一中一"){
            if(in_array($betContent, array($rs['ball_1'],$rs['ball_2'],$rs['ball_3'],$rs['ball_4'],$rs['ball_5']))){
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
                if($betInfo==$dx_1 || $betInfo==$ds_1 || $betInfo==$rs['ball_1']){
                    $is_win = "true";
                }
                if($dx_1=="和" && in_array($betInfo,array("大","小","单","双"))){
                    $is_win = "tie";
                }
            }elseif($quick_type=="第二球"){
                if($betInfo==$dx_2 || $betInfo==$ds_2 || $betInfo==$rs['ball_2']){
                    $is_win = "true";
                }
                if($dx_2=="和" && in_array($betInfo,array("大","小","单","双"))){
                    $is_win = "tie";
                }
            }elseif($quick_type=="第三球"){
                if($betInfo==$dx_3 || $betInfo==$ds_3 || $betInfo==$rs['ball_3']){
                    $is_win = "true";
                }
                if($dx_3=="和" && in_array($betInfo,array("大","小","单","双"))){
                    $is_win = "tie";
                }
            }elseif($quick_type=="第四球"){
                if($betInfo==$dx_4 || $betInfo==$ds_4 || $betInfo==$rs['ball_4']){
                    $is_win = "true";
                }
                if($dx_4=="和" && in_array($betInfo,array("大","小","单","双"))){
                    $is_win = "tie";
                }
            }elseif($quick_type=="第五球"){
                if($betInfo==$dx_5 || $betInfo==$ds_5 || $betInfo==$rs['ball_5']){
                    $is_win = "true";
                }
                if($dx_5=="和" && in_array($betInfo,array("大","小","单","双"))){
                    $is_win = "tie";
                }
            }elseif($quick_type=="总和龙虎和"){
                if(in_array($betInfo,array($hms[1],$hms[2],$hms[3]))){
                    $is_win = "true";
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
                        VALUES ('$userid','$datereg','广西十分彩',now(),'$bet_type','$bet_money_total','$assets','$balance');";
            $mysqli->query($sql) or die ("插入金钱记录失败!!!".$order['sub_id']);
        }
    }


    //最后更新彩票结果表，状态修改
    $msql="update lottery_result_gxsf set state='$stateType' WHERE qishu='".$qi."'";
    $mysqli->query($msql) or die ("期数修改失败!!!");
    message($jiesuanString,$url);
}