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
include_once($C_Patch."/app/member/class/lottery_result_d3.php");
include_once($C_Patch."/app/member/class/lottery_result_p3.php");
include_once($C_Patch."/app/member/class/lottery_result_t3.php");
include_once($C_Patch."/app/member/class/lottery_order.php");
include_once($C_Patch."/app/member/class/user_list.php");
include_once("../Js_Class.php");

if(strpos($quanxian,'手工录入彩票结果')){
    $qi 		= $_GET['qi'];
    $jsType 		= $_GET['jsType'];
    $query_time 		= $_GET['s_time'];
    $gType      = $_GET["gtype"];
    $type      = $_GET["type"];
    $gTypeUpper      = strtoupper($gType);

    //获取开奖号码
    if($gType=="d3"){
        $rs = lottery_result_d3::getLotteryResult($qi);
        $lottery_name = "3D彩";
    }elseif($gType=="p3"){
        $rs = lottery_result_p3::getLotteryResult($qi);
        $lottery_name = "排列三";
    }elseif($gType=="t3"){
        $rs = lottery_result_t3::getLotteryResult($qi);
        $lottery_name = "上海时时乐";
    }
    $hm 		= array();
    $hm[]		= $rs['ball_1'];
    $hm[]		= $rs['ball_2'];
    $hm[]		= $rs['ball_3'];

    $jiesuanString = "结算成功。";
    $url = "result_b3.php?type=$type&s_time=$query_time";
    $stateType = "1";

    if($jsType==1){//状态为已结算，对所有的订单进行结算，需要从客户那边收回钱然后再进行结算
        //获取已结算的订单
        $orders = lottery_order::getOrdersJs($gTypeUpper,$qi);
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
                            VALUES ('$userid','$datereg','$lottery_name',now(),'彩票重新结算-扣钱','$bet_money_total','$assets','$balance');";
                    $mysqli->query($sql) or die ("插入金钱记录失败!!!".$order['sub_id']);
                }
            }
        }

        $jiesuanString = "重算成功。";
        $stateType = "2";
    }



    //获取未结算的订单
    $orders = lottery_order::getOrdersByStatus($gTypeUpper,$qi,"0");
    if($orders==null){
        $msql="update lottery_result_$gType set state='$stateType' WHERE qishu='".$qi."'";
        $mysqli->query($msql) or die ("期数修改失败!!!");
        message($jiesuanString,$url);
        exit;
    }

    $ballArray = array($rs['ball_1'],$rs['ball_2'],$rs['ball_3']);
    $ballHundred = $rs['ball_1'];
    $ballTen = $rs['ball_2'];
    $ballOne = $rs['ball_3'];

    $hms[]		= f3D_Auto($ballArray,1);
    $hms[]		= f3D_Auto($ballArray,2);
    $hms[]		= f3D_Auto($ballArray,3);
    $hms[]		= f3D_Auto($ballArray,4);
    $hms[]		= f3D_Auto($ballArray,5);
    $hms[]		= f3D_Auto($ballArray,6);

    $ds_1 = Ssc_Ds($ballHundred);
    $dx_1 = Ssc_Dx($ballHundred);
    $ds_2 = Ssc_Ds($ballTen);
    $dx_2 = Ssc_Dx($ballTen);
    $ds_3 = Ssc_Ds($ballOne);
    $dx_3 = Ssc_Dx($ballOne);

    $hundredDs = b3_ds($ballHundred,"M");
    $tenDs = b3_ds($ballTen,"C");
    $oneDs = b3_ds($ballOne,"U");
    $mcDs = b3_ds($ballHundred+$ballTen,"MC");
    $muDs = b3_ds($ballHundred+$ballOne,"MU");
    $cuDs = b3_ds($ballTen+$ballOne,"CU");
    $mcuDs = b3_ds($ballHundred+$ballTen+$ballOne,"MCU");

    $hundredDx = b3_dx($ballHundred,"M");
    $tenDx = b3_dx($ballTen,"C");
    $oneDx = b3_dx($ballOne,"U");
    $mcDx = b3_dx($ballHundred+$ballTen,"MC");
    $muDx = b3_dx($ballHundred+$ballOne,"MU");
    $cuDx = b3_dx($ballTen+$ballOne,"CU");
    $mcuDx = ($ballHundred+$ballTen+$ballOne)>13 ? "MCU_OVER" : "MCU_UNDER";

    $hundredZhihe = b3_zhihe($ballHundred,"M");
    $tenZhihe = b3_zhihe($ballTen,"C");
    $oneZhihe = b3_zhihe($ballOne,"U");
    $mcZhihe = b3_zhihe($ballHundred+$ballTen,"MC");
    $muZhihe = b3_zhihe($ballHundred+$ballOne,"MU");
    $cuZhihe = b3_zhihe($ballTen+$ballOne,"CU");
    $mcuZhihe = b3_zhihe($ballHundred+$ballTen+$ballOne,"MCU");

    $oeouArray = array($hundredDs,$tenDs,$oneDs,$mcDs,$muDs,$cuDs,$mcuDs,
        $hundredDx,$tenDx,$oneDx,$mcDx,$muDx,$cuDx,$mcuDx,
        $hundredZhihe,$tenZhihe,$oneZhihe,$mcZhihe,$muZhihe,$cuZhihe,$mcuZhihe);

    $wpArray = array($hundredDs,$tenDs,$oneDs,$hundredDx,$tenDx,$oneDx,$hundredZhihe,$tenZhihe,$oneZhihe);

    $mcF = b3_f($ballHundred+$ballTen);
    $muF = b3_f($ballHundred+$ballOne);
    $cuF = b3_f($ballTen+$ballOne);
    $mcuF = b3_f($ballHundred+$ballTen+$ballOne);

    $mcS = $ballHundred+$ballTen;
    $muS = $ballHundred+$ballOne;
    $cuS = $ballTen+$ballOne;
    $mcuS = $ballHundred+$ballTen+$ballOne;

    $kd = b3_kd($ballHundred,$ballTen,$ballOne);

    foreach($orders as $order){
        $is_win = "false";
        $rTypeName = $order["rtype_str"];
        $betInfo = $order["number"];
        $quick_type = $order["quick_type"];

        if($rTypeName=="一字"){
            if(in_array($betInfo, $ballArray)){
                $is_win = "true";
            }
        }elseif($rTypeName=="佰定位"){
            if($betInfo==$ballHundred){
                $is_win = "true";
            }
        }elseif($rTypeName=="拾定位"){
            if($betInfo==$ballTen){
                $is_win = "true";
            }
        }elseif($rTypeName=="个定位"){
            if($betInfo==$ballOne){
                $is_win = "true";
            }
        }

        elseif($rTypeName=="佰拾个和尾数"){
            if($betInfo==$mcuF){
                $is_win = "true";
            }
        }elseif($rTypeName=="佰拾和尾数"){
            if($betInfo==$mcF){
                $is_win = "true";
            }
        }elseif($rTypeName=="佰个和尾数"){
            if($betInfo==$muF){
                $is_win = "true";
            }
        }elseif($rTypeName=="拾个和尾数"){
            if($betInfo==$cuF){
                $is_win = "true";
            }
        }

        elseif($rTypeName=="和数"){
            if($betInfo==$mcuS){
                $is_win = "true";
            }
        }elseif($rTypeName=="佰拾和数"){
            if($betInfo==$mcS){
                $is_win = "true";
            }
        }elseif($rTypeName=="佰个和数"){
            if($betInfo==$muS){
                $is_win = "true";
            }
        }elseif($rTypeName=="拾个和数"){
            if($betInfo==$cuS){
                $is_win = "true";
            }
        }

        elseif($rTypeName=="二字"){
            if(in_array(intval($betInfo/10), $ballArray) && in_array($betInfo%10, $ballArray)){
                if(intval($betInfo/10)==$betInfo%10){
                    if(($ballHundred==intval($betInfo/10) && ($betInfo%10)==$ballTen) ||
                        ($ballHundred==intval($betInfo/10) && ($betInfo%10)==$ballOne) ||
                        ($ballTen==intval($betInfo/10) && ($betInfo%10)==$ballOne)){
                        $is_win = "true";
                    }
                }else{
                    $is_win = "true";
                }
            }
        }elseif($rTypeName=="佰拾定位"){
            if($betInfo==strval($ballHundred).strval($ballTen)){
                $is_win = "true";
            }
        }elseif($rTypeName=="佰个定位"){
            if($betInfo==strval($ballHundred).strval($ballOne)){
                $is_win = "true";
            }
        }elseif($rTypeName=="拾个定位"){
            if($betInfo==strval($ballTen).strval($ballOne)){
                $is_win = "true";
            }
        }

        elseif($rTypeName=="两面"){
            if(in_array($betInfo, $oeouArray)){
                $is_win = "true";
            }
        }
        elseif($rTypeName=="跨度"){
            if($betInfo==$kd){
                $is_win = "true";
            }
        }
        elseif($rTypeName=="组选三"){
            $betInfo = explode("*",$order["number"]);
            if($kd==0){

            }elseif($ballHundred!=$ballTen && $ballHundred!=$ballOne && $ballTen!=$ballOne){

            }elseif((in_array($ballHundred,$betInfo) && in_array($ballTen,$betInfo) && in_array($ballOne,$betInfo)) &&
                ($ballHundred==$ballTen || $ballHundred==$ballOne || $ballTen==$ballOne)
            ){
                $is_win = "true";
            }
        }
        elseif($rTypeName=="组选六"){
            $betInfo = explode("*",$order["number"]);
            if($ballHundred!=$ballTen && $ballHundred!=$ballOne && $ballTen!=$ballOne){
                if(in_array($ballHundred,$betInfo) && in_array($ballTen,$betInfo) && in_array($ballOne,$betInfo)){
                    $is_win = "true";
                }
            }
        }
        elseif($rTypeName=="一字过关"){
            $betInfo = explode("*",$order["number"]);
            if(in_array($betInfo[0],$wpArray) && in_array($betInfo[1],$wpArray)){
                if(count($betInfo)==3){
                    if(in_array($betInfo[2],$wpArray)){
                        $is_win = "true";
                    }
                }else{
                    $is_win = "true";
                }
            }
        }
        elseif(strpos($rTypeName,"快速-")!==false){
            if($quick_type=="第一球"){
                if($betInfo==$dx_1 || $betInfo==$ds_1 || $betInfo==$ballHundred){
                    $is_win = "true";
                }
            }elseif($quick_type=="第二球"){
                if($betInfo==$dx_2 || $betInfo==$ds_2 || $betInfo==$ballTen){
                    $is_win = "true";
                }
            }elseif($quick_type=="第三球"){
                if($betInfo==$dx_3 || $betInfo==$ds_3 || $betInfo==$ballOne){
                    $is_win = "true";
                }
            }elseif($quick_type=="总和龙虎和"){
                if(in_array($betInfo,array($hms[1],$hms[2],$hms[3]))){
                    $is_win = "true";
                }
            }elseif($quick_type=="三连"){
                if($betInfo==$hms[4]){
                    $is_win = "true";
                }
            }elseif($quick_type=="跨度"){
                if($betInfo==$hms[5]){
                    $is_win = "true";
                }
            }
        }

        $userid = $order['user_id'];
        $datereg = $order['order_sub_num'];
        $rsMoney	= user_list::getUserMoney($userid);
        $assets	=	round($rsMoney['money'],2);

        if($is_win=="true"){
            $win_sign = "1";
            $bet_money_total = $order['win']+$order['fs'];
            $bet_type = "彩票手工结算-彩票中奖";
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
        if($win_sign == "1" || ($win_sign == "0" && $order['fs']>0)){
            $msql="update user_list set money=money+".$bet_money_total." where user_id=".$userid."";
            $mysqli->query($msql) or die ("会员修改失败!!!".$order['sub_id']);
            //插入金钱记录
            $balance=	$assets + $bet_money_total;
            $sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`)
                        VALUES ('$userid','$datereg','$lottery_name',now(),'$bet_type','$bet_money_total','$assets','$balance');";
            $mysqli->query($sql) or die ("插入金钱记录失败!!!".$order['sub_id']);
        }
    }


    //最后更新彩票结果表，状态修改
    $msql="update lottery_result_$gType set state='$stateType' WHERE qishu='".$qi."'";
    $mysqli->query($msql) or die ("期数修改失败!!!");
    message($jiesuanString,$url);
}