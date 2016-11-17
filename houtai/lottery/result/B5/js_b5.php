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
include_once($C_Patch."/app/member/class/lottery_result_cq.php");
include_once($C_Patch."/app/member/class/lottery_result_jx.php");
include_once($C_Patch."/app/member/class/lottery_result_tj.php");
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
    if($gType=="cq"){
        $rs = lottery_result_cq::getLotteryResult($qi);
        $lottery_name = "重庆时时彩";
    }elseif($gType=="jx"){
        $rs = lottery_result_jx::getLotteryResult($qi);
        $lottery_name = "江西时时彩";
    }elseif($gType=="tj"){
        $rs = lottery_result_tj::getLotteryResult($qi);
        $lottery_name = "天津时时彩";
    }
    $hm 		= array();
    $hm[]		= $rs['ball_1'];
    $hm[]		= $rs['ball_2'];
    $hm[]		= $rs['ball_3'];
    $hm[]		= $rs['ball_4'];
    $hm[]		= $rs['ball_5'];

    $jiesuanString = "结算成功。";
    $url = "result_b5.php?type=$type&s_time=$query_time";
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

    //结算方法、结算数据
    $ballArray        = array($rs['ball_1'],$rs['ball_2'],$rs['ball_3'],$rs['ball_4'],$rs['ball_5']);
    $beforeThreeArray = array($rs['ball_1'],$rs['ball_2'],$rs['ball_3']);
    $middleThreeArray = array($rs['ball_2'],$rs['ball_3'],$rs['ball_4']);
    $afterThreeArray  = array($rs['ball_3'],$rs['ball_4'],$rs['ball_5']);
    $ballWan = $rs['ball_1'];
    $ballQian = $rs['ball_2'];
    $ballHundred = $rs['ball_3'];
    $ballTen = $rs['ball_4'];
    $ballOne = $rs['ball_5'];

    $hms[]		= Ssc_Auto($ballArray,1);
    $hms[]		= Ssc_Auto($ballArray,2);
    $hms[]		= Ssc_Auto($ballArray,3);
    $hms[]		= Ssc_Auto($ballArray,4);
    $hms[]		= Ssc_Auto($ballArray,5);
    $hms[]		= Ssc_Auto($ballArray,6);
    $hms[]		= Ssc_Auto($ballArray,7);

    $niuniu = b5_niuniu($ballWan,$ballQian,$ballHundred,$ballTen,$ballOne);
    $niuds  = b5_niuds($niuniu);
    $niudx  = b5_niudx($niuniu);

    $ds_wan = Ssc_Ds($ballWan);
    $dx_wan = Ssc_Dx($ballWan);
    $ds_qian = Ssc_Ds($ballQian);
    $dx_qian = Ssc_Dx($ballQian);
    $ds_hundred = Ssc_Ds($ballHundred);
    $dx_hundred = Ssc_Dx($ballHundred);
    $ds_ten = Ssc_Ds($ballTen);
    $dx_ten = Ssc_Dx($ballTen);
    $ds_one = Ssc_Ds($ballOne);
    $dx_one = Ssc_Dx($ballOne);

    $beforeF = b5_array_f($beforeThreeArray);
    $middleF = b5_array_f($middleThreeArray);
    $afterF  = b5_array_f($afterThreeArray);
    $wqF     = b5_f($ballWan+$ballQian);
    $wbF     = b5_f($ballWan+$ballHundred);
    $wsF     = b5_f($ballWan+$ballTen);
    $wgF     = b5_f($ballWan+$ballOne);
    $qbF     = b5_f($ballQian+$ballHundred);
    $qsF     = b5_f($ballQian+$ballTen);
    $qgF     = b5_f($ballQian+$ballOne);
    $bsF     = b5_f($ballHundred+$ballTen);
    $bgF     = b5_f($ballHundred+$ballOne);
    $sgF     = b5_f($ballTen+$ballOne);

    $beforeS = $ballWan+$ballQian+$ballHundred;
    $middleS = $ballQian+$ballHundred+$ballTen;
    $afterS  = $ballHundred+$ballTen+$ballOne;
    $wqS     = $ballWan+$ballQian;
    $wbS     = $ballWan+$ballHundred;
    $wsS     = $ballWan+$ballTen;
    $wgS     = $ballWan+$ballOne;
    $qbS     = $ballQian+$ballHundred;
    $qsS     = $ballQian+$ballTen;
    $qgS     = $ballQian+$ballOne;
    $bsS     = $ballHundred+$ballTen;
    $bgS     = $ballHundred+$ballOne;
    $sgS     = $ballTen+$ballOne;

    $beforeKd = b5_kd($ballWan,$ballQian,$ballHundred);
    $middleKd = b5_kd($ballQian,$ballHundred,$ballTen);
    $afterKd  = b5_kd($ballHundred,$ballTen,$ballOne);

    $wanDs = b5_ds($ballWan,"535");
    $qianDs = b5_ds($ballQian,"536");
    $hundredDs = b5_ds($ballHundred,"537");
    $tenDs = b5_ds($ballTen,"538");
    $oneDs = b5_ds($ballOne,"539");
    $wqDs = b5_ds($wqS,"550");
    $wbDs = b5_ds($wbS,"551");
    $wsDs = b5_ds($wsS,"552");
    $wgDs = b5_ds($wgS,"553");
    $qbDs = b5_ds($qbS,"554");
    $qsDs = b5_ds($qsS,"555");
    $qgDs = b5_ds($qgS,"556");
    $bsDs = b5_ds($bsS,"557");
    $bgDs = b5_ds($bgS,"558");
    $sgDs = b5_ds($sgS,"559");
    $beforeDs = b5_ds($beforeS,"580");
    $middleDs = b5_ds($middleS,"581");
    $afterDs = b5_ds($afterS,"582");

    $wanDx = b5_dx($ballWan,"540");
    $qianDx = b5_dx($ballQian,"541");
    $hundredDx = b5_dx($ballHundred,"542");
    $tenDx = b5_dx($ballTen,"543");
    $oneDx = b5_dx($ballOne,"544");
    $wqDx = b5_dx($wqS,"560");
    $wbDx = b5_dx($wbS,"561");
    $wsDx = b5_dx($wsS,"562");
    $wgDx = b5_dx($wgS,"563");
    $qbDx = b5_dx($qbS,"564");
    $qsDx = b5_dx($qsS,"565");
    $qgDx = b5_dx($qgS,"566");
    $bsDx = b5_dx($bsS,"567");
    $bgDx = b5_dx($bgS,"568");
    $sgDx = b5_dx($sgS,"569");
    $beforeDx = b5_zh_dx($beforeS,"583");
    $middleDx = b5_zh_dx($middleS,"584");
    $afterDx = b5_zh_dx($afterS,"585");

    $wanZhihe = b5_zhihe($ballWan,"545");
    $qianZhihe = b5_zhihe($ballQian,"546");
    $hundredZhihe = b5_zhihe($ballHundred,"547");
    $tenZhihe = b5_zhihe($ballTen,"548");
    $oneZhihe = b5_zhihe($ballOne,"549");
    $wqZhihe = b5_zhihe($wqS,"570");
    $wbZhihe = b5_zhihe($wbS,"571");
    $wsZhihe = b5_zhihe($wsS,"572");
    $wgZhihe = b5_zhihe($wgS,"573");
    $qbZhihe = b5_zhihe($qbS,"574");
    $qsZhihe = b5_zhihe($qsS,"575");
    $qgZhihe = b5_zhihe($qgS,"576");
    $bsZhihe = b5_zhihe($bsS,"577");
    $bgZhihe = b5_zhihe($bgS,"578");
    $sgZhihe = b5_zhihe($sgS,"579");
    $beforeZhihe = b5_zhihe($beforeS,"586");
    $middleZhihe = b5_zhihe($middleS,"587");
    $afterZhihe = b5_zhihe($afterS,"588");

    $oeouArray = array($wanDs,$qianDs,$hundredDs,$tenDs,$oneDs,$wqDs,$wbDs,$wsDs,$wgDs,$qbDs,$qsDs,$qgDs,$bsDs,$bgDs,$sgDs,$beforeDs,$middleDs,$afterDs,
                       $wanDx,$qianDx,$hundredDx,$tenDx,$oneDx,$wqDx,$wbDx,$wsDx,$wgDx,$qbDx,$qsDx,$qgDx,$bsDx,$bgDx,$sgDx,$beforeDx,$middleDx,$afterDx,
                       $wanZhihe,$qianZhihe,$hundredZhihe,$tenZhihe,$oneZhihe,$wqZhihe,$wbZhihe,$wsZhihe,$wgZhihe,$qbZhihe,$qsZhihe,$qgZhihe,$bsZhihe,$bgZhihe,$sgZhihe,$beforeZhihe,$middleZhihe,$afterZhihe);


    foreach($orders as $order){
        $is_win = "false";
        $is_multi_win = 0;

        $rTypeName = $order["rtype_str"];
        $betInfo = $order["number"];
        $quick_type = $order["quick_type"];

        if($rTypeName=="全五-多重彩派"){
            if($betInfo==$ballOne){
                $is_win = "true";
                $is_multi_win += 1;
            }
            if($betInfo==$ballTen){
                $is_win = "true";
                $is_multi_win += 1;
            }
            if($betInfo==$ballHundred){
                $is_win = "true";
                $is_multi_win += 1;
            }
            if($betInfo==$ballQian){
                $is_win = "true";
                $is_multi_win += 1;
            }
            if($betInfo==$ballWan){
                $is_win = "true";
                $is_multi_win += 1;
            }
        }elseif($rTypeName=="(前三)一字组合"){
            if(in_array($betInfo, $beforeThreeArray)){
                $is_win = "true";
            }
        }elseif($rTypeName=="(中三)一字组合"){
            if(in_array($betInfo, $middleThreeArray)){
                $is_win = "true";
            }
        }elseif($rTypeName=="(后三)一字组合"){
            if(in_array($betInfo, $afterThreeArray)){
                $is_win = "true";
            }
        }

        elseif($rTypeName=="(前三)和尾数"){
            if($betInfo==$beforeF){
                $is_win = "true";
            }
        }elseif($rTypeName=="(中三)和尾数"){
            if($betInfo==$middleF){
                $is_win = "true";
            }
        }elseif($rTypeName=="(后三)和尾数"){
            if($betInfo==$afterF){
                $is_win = "true";
            }
        }
        elseif($rTypeName=="万仟和尾数"){
            if($betInfo==$wqF){
                $is_win = "true";
            }
        }elseif($rTypeName=="万佰和尾数"){
            if($betInfo==$wbF){
                $is_win = "true";
            }
        }elseif($rTypeName=="万拾和尾数"){
            if($betInfo==$wsF){
                $is_win = "true";
            }
        }elseif($rTypeName=="万个和尾数"){
            if($betInfo==$wgF){
                $is_win = "true";
            }
        }elseif($rTypeName=="仟佰和尾数"){
            if($betInfo==$qbF){
                $is_win = "true";
            }
        }elseif($rTypeName=="仟拾和尾数"){
            if($betInfo==$qsF){
                $is_win = "true";
            }
        }elseif($rTypeName=="仟个和尾数"){
            if($betInfo==$qgF){
                $is_win = "true";
            }
        }elseif($rTypeName=="佰拾和尾数"){
            if($betInfo==$bsF){
                $is_win = "true";
            }
        }elseif($rTypeName=="佰个和尾数"){
            if($betInfo==$bgF){
                $is_win = "true";
            }
        }elseif($rTypeName=="拾个和尾数"){
            if($betInfo==$sgF){
                $is_win = "true";
            }
        }

        elseif($rTypeName=="(前三)和数"){
            if($betInfo==$beforeS){
                $is_win = "true";
            }
        }elseif($rTypeName=="(中三)和数"){
            if($betInfo==$middleS){
                $is_win = "true";
            }
        }elseif($rTypeName=="(后三)和数"){
            if($betInfo==$afterS){
                $is_win = "true";
            }
        }
        elseif($rTypeName=="万仟和数"){
            if($betInfo==$wqS){
                $is_win = "true";
            }
        }elseif($rTypeName=="万佰和数"){
            if($betInfo==$wbS){
                $is_win = "true";
            }
        }elseif($rTypeName=="万拾和数"){
            if($betInfo==$wsS){
                $is_win = "true";
            }
        }elseif($rTypeName=="万个和数"){
            if($betInfo==$wgS){
                $is_win = "true";
            }
        }elseif($rTypeName=="仟佰和数"){
            if($betInfo==$qbS){
                $is_win = "true";
            }
        }elseif($rTypeName=="仟拾和数"){
            if($betInfo==$qsS){
                $is_win = "true";
            }
        }elseif($rTypeName=="仟个和数"){
            if($betInfo==$qgS){
                $is_win = "true";
            }
        }elseif($rTypeName=="佰拾和数"){
            if($betInfo==$bsS){
                $is_win = "true";
            }
        }elseif($rTypeName=="佰个和数"){
            if($betInfo==$bgS){
                $is_win = "true";
            }
        }elseif($rTypeName=="拾个和数"){
            if($betInfo==$sgS){
                $is_win = "true";
            }
        }

        elseif($rTypeName == "万定位"){
            if($betInfo==$ballWan){
                $is_win = "true";
            }
        }elseif($rTypeName == "仟定位"){
            if($betInfo==$ballQian){
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

        elseif($rTypeName=="(前三)二字组合"){
            if(in_array(intval($betInfo/10), $beforeThreeArray) && in_array($betInfo%10, $beforeThreeArray)){
                if(intval($betInfo/10)==$betInfo%10){
                    if(($ballWan==intval($betInfo/10) && ($betInfo%10)==$ballQian) ||
                        ($ballWan==intval($betInfo/10) && ($betInfo%10)==$ballHundred) ||
                        ($ballQian==intval($betInfo/10) && ($betInfo%10)==$ballHundred)){
                        $is_win = "true";
                    }
                }else{
                    $is_win = "true";
                }
            }
        }elseif($rTypeName=="(中三)二字组合"){
            if(in_array(intval($betInfo/10), $middleThreeArray) && in_array($betInfo%10, $middleThreeArray)){
                if(intval($betInfo/10)==$betInfo%10){
                    if(($ballQian==intval($betInfo/10) && ($betInfo%10)==$ballHundred) ||
                        ($ballQian==intval($betInfo/10) && ($betInfo%10)==$ballTen) ||
                        ($ballHundred==intval($betInfo/10) && ($betInfo%10)==$ballTen)){
                        $is_win = "true";
                    }
                }else{
                    $is_win = "true";
                }
            }
        }elseif($rTypeName=="(后三)二字组合"){
            if(in_array(intval($betInfo/10), $afterThreeArray) && in_array($betInfo%10, $afterThreeArray)){
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
        }
        elseif($rTypeName=="万仟定位"){
            if($betInfo==strval($ballWan).strval($ballQian)){
                $is_win = "true";
            }
        }elseif($rTypeName=="万佰定位"){
            if($betInfo==strval($ballWan).strval($ballHundred)){
                $is_win = "true";
            }
        }elseif($rTypeName=="万拾定位"){
            if($betInfo==strval($ballWan).strval($ballTen)){
                $is_win = "true";
            }
        }elseif($rTypeName=="万个定位"){
            if($betInfo==strval($ballWan).strval($ballOne)){
                $is_win = "true";
            }
        }elseif($rTypeName=="仟佰定位"){
            if($betInfo==strval($ballQian).strval($ballHundred)){
                $is_win = "true";
            }
        }elseif($rTypeName=="仟拾定位"){
            if($betInfo==strval($ballQian).strval($ballTen)){
                $is_win = "true";
            }
        }elseif($rTypeName=="仟个定位"){
            if($betInfo==strval($ballQian).strval($ballOne)){
                $is_win = "true";
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

        elseif($rTypeName=="(前三)跨度"){
            if($betInfo==$beforeKd){
                $is_win = "true";
            }
        }elseif($rTypeName=="(中三)跨度"){
            if($betInfo==$middleKd){
                $is_win = "true";
            }
        }elseif($rTypeName=="(后三)跨度"){
            if($betInfo==$afterKd){
                $is_win = "true";
            }
        }

        elseif($rTypeName=="(前三)组选三"){
            $betInfo = explode("*",$order["number"]);
            if($beforeKd==0){

            }elseif($ballWan!=$ballQian && $ballWan!=$ballHundred && $ballQian!=$ballHundred){

            }elseif((in_array($ballWan,$betInfo) && in_array($ballQian,$betInfo) && in_array($ballHundred,$betInfo)) &&
                ($ballWan==$ballQian || $ballWan==$ballHundred || $ballQian==$ballHundred)
            ){
                $is_win = "true";
            }
        }elseif($rTypeName=="(中三)组选三"){
            $betInfo = explode("*",$order["number"]);
            if($middleKd==0){

            }elseif($ballQian!=$ballHundred && $ballQian!=$ballTen && $ballHundred!=$ballTen){

            }elseif((in_array($ballQian,$betInfo) && in_array($ballHundred,$betInfo) && in_array($ballTen,$betInfo)) &&
                ($ballQian==$ballHundred || $ballQian==$ballTen || $ballHundred==$ballTen)
            ){
                $is_win = "true";
            }
        }elseif($rTypeName=="(后三)组选三"){
            $betInfo = explode("*",$order["number"]);
            if($afterKd==0){

            }elseif($ballHundred!=$ballTen && $ballHundred!=$ballOne && $ballTen!=$ballOne){

            }elseif((in_array($ballHundred,$betInfo) && in_array($ballTen,$betInfo) && in_array($ballOne,$betInfo)) &&
                ($ballHundred==$ballTen || $ballHundred==$ballOne || $ballTen==$ballOne)
            ){
                $is_win = "true";
            }
        }

        elseif($rTypeName=="(前三)组选六"){
            $betInfo = explode("*",$order["number"]);
            if($ballWan!=$ballQian && $ballWan!=$ballHundred && $ballQian!=$ballHundred){
                if(in_array($ballWan,$betInfo) && in_array($ballQian,$betInfo) && in_array($ballHundred,$betInfo)){
                    $is_win = "true";
                }
            }
        }elseif($rTypeName=="(中三)组选六"){
            $betInfo = explode("*",$order["number"]);
            if($ballQian!=$ballHundred && $ballQian!=$ballTen && $ballHundred!=$ballTen){
                if(in_array($ballQian,$betInfo) && in_array($ballHundred,$betInfo) && in_array($ballTen,$betInfo)){
                    $is_win = "true";
                }
            }
        }elseif($rTypeName=="(后三)组选六"){
            $betInfo = explode("*",$order["number"]);
            if($ballHundred!=$ballTen && $ballHundred!=$ballOne && $ballTen!=$ballOne){
                if(in_array($ballHundred,$betInfo) && in_array($ballTen,$betInfo) && in_array($ballOne,$betInfo)){
                    $is_win = "true";
                }
            }
        }

        elseif($rTypeName=="两面"){
            if(in_array($betInfo, $oeouArray)){
                $is_win = "true";
            }
        }

        elseif(strpos($rTypeName,"快速-")!==false){
            if($quick_type=="第一球"){
                if($betInfo==$dx_wan || $betInfo==$ds_wan || $betInfo==$ballWan){
                    $is_win = "true";
                }
            }elseif($quick_type=="第二球"){
                if($betInfo==$dx_qian || $betInfo==$ds_qian || $betInfo==$ballQian){
                    $is_win = "true";
                }
            }elseif($quick_type=="第三球"){
                if($betInfo==$dx_hundred || $betInfo==$ds_hundred || $betInfo==$ballHundred){
                    $is_win = "true";
                }
            }elseif($quick_type=="第四球"){
                if($betInfo==$dx_ten || $betInfo==$ds_ten || $betInfo==$ballTen){
                    $is_win = "true";
                }
            }elseif($quick_type=="第五球"){
                if($betInfo==$dx_one || $betInfo==$ds_one || $betInfo==$ballOne){
                    $is_win = "true";
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
            }elseif($quick_type=="牛牛"){
                if($betInfo==$niuniu || $betInfo==$niuds || $betInfo==$niudx){
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
            if($is_multi_win>0){
                $bet_win_total = $order['bet_money']*($order['bet_rate']-1)*$is_multi_win + $order['bet_money'];
                $bet_money_total = $bet_win_total + $order['fs'];
            }
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
        $msql="update order_lottery_sub set status='$stateType',is_win='$win_sign'".($is_multi_win>0?",win='$bet_win_total'":"")." where id='".$order['sub_id']."'";
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