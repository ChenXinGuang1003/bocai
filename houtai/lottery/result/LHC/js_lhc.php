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
include_once($C_Patch."/app/member/class/lottery_result_lhc.php");
include_once($C_Patch."/app/member/class/six_lottery_order.php");
include_once($C_Patch."/app/member/class/six_lottery_odds.php");
include_once($C_Patch."/app/member/class/user_list.php");
include_once("../Js_Class.php");


if(strpos($quanxian,'手工录入彩票结果')){
    $qi 		= $_GET['qi'];
    $jsType 		= $_GET['jsType'];

    //获取开奖号码
    $rs = lottery_result_lhc::getLotteryResult($qi);
    $lottery_name = "六合彩";

    $hm 		= array();
    $hm[]		= $rs['ball_1'];
    $hm[]		= $rs['ball_2'];
    $hm[]		= $rs['ball_3'];
    $hm[]		= $rs['ball_4'];
    $hm[]		= $rs['ball_5'];
    $hm[]		= $rs['ball_6'];
    $hm[]		= $rs['ball_7'];

    $jiesuanString = "结算成功。";
    $url = "result_lhc.php?1=1";
    $stateType = "1";

    if($jsType==1){//状态为已结算，对所有的订单进行结算，需要从客户那边收回钱然后再进行结算
        //获取已结算的订单
        $orders = six_lottery_order::getOrdersJs($qi);
        if($orders){//订单不为空，进行退钱操作
            foreach($orders as $order){
                $userid = $order['user_id'];
                $datereg = $order['order_sub_num'];
                $rsMoney	= user_list::getUserMoney($userid);
                $assets	=	round($rsMoney['money'],2);

                //修改主单信息
                $msql="update six_lottery_order set status='0' where id='".$order['id']."'";
                $mysqli->query($msql) or die ("注单修改失败!!!".$order['id']);
                //修改子单
                $msql="update six_lottery_order_sub set status='0',is_win=NULL where id='".$order['sub_id']."'";
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
                            VALUES ('$userid','$datereg','$lottery_name',now(),'六合彩重新结算-扣钱','$bet_money_total','$assets','$balance');";
                    $mysqli->query($sql) or die ("插入金钱记录失败!!!".$order['sub_id']);
                }
            }
        }

        $jiesuanString = "重算成功。";
        $stateType = "2";
        $_SESSION["LHC".$_GET['qi']] = "";
    }

    if($_SESSION["LHC".$_GET['qi']]==$_GET['qi']){
        echo "点击了两次六合彩结算";
        exit;
    }else{
        $_SESSION["LHC".$_GET['qi']] = $_GET['qi'];
    }



    //获取未结算的订单
    $orders = six_lottery_order::getOrdersByStatus($qi,"0");
    if($orders==null){
        $msql="update lottery_result_lhc set state='$stateType' WHERE qishu='".$qi."'";
        $mysqli->query($msql) or die ("期数修改失败!!!");
        message($jiesuanString,$url);
        exit;
    }

    //结算方法、结算数据
    $numberArray      = array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49");
    $ballArray        = array($rs['ball_1'],$rs['ball_2'],$rs['ball_3'],$rs['ball_4'],$rs['ball_5'],$rs['ball_6'],$rs['ball_7']);
    $normalBallArray        = array($rs['ball_1'],$rs['ball_2'],$rs['ball_3'],$rs['ball_4'],$rs['ball_5'],$rs['ball_6']);
    $ball1 = $rs['ball_1'];
    $ball2 = $rs['ball_2'];
    $ball3 = $rs['ball_3'];
    $ball4 = $rs['ball_4'];
    $ball5 = $rs['ball_5'];
    $ball6 = $rs['ball_6'];
    $ball7 = $rs['ball_7'];

    $zhds		= lhc_sum_dx($ballArray);
    $zhdx		= lhc_sum_ds($ballArray);

    $ball1_sx  = lhc_sum_sx($ball1);
    $ball2_sx  = lhc_sum_sx($ball2);
    $ball3_sx  = lhc_sum_sx($ball3);
    $ball4_sx  = lhc_sum_sx($ball4);
    $ball5_sx  = lhc_sum_sx($ball5);
    $ball6_sx  = lhc_sum_sx($ball6);
    $ball7_sx  = lhc_sum_sx($ball7);

    $sx_ds = lhc_sx_number($ball1_sx,$ball2_sx,$ball3_sx,$ball4_sx,$ball5_sx,$ball6_sx,$ball7_sx,"1");
    $sx_number = lhc_sx_number($ball1_sx,$ball2_sx,$ball3_sx,$ball4_sx,$ball5_sx,$ball6_sx,$ball7_sx,"2");

    $ball1_rgb = lhc_rgb($ball1);
    $ball2_rgb = lhc_rgb($ball2);
    $ball3_rgb = lhc_rgb($ball3);
    $ball4_rgb = lhc_rgb($ball4);
    $ball5_rgb = lhc_rgb($ball5);
    $ball6_rgb = lhc_rgb($ball6);
    $ball7_rgb = lhc_rgb($ball7);
    $c7 = lhc_c7($ball1_rgb,$ball2_rgb,$ball3_rgb,$ball4_rgb,$ball5_rgb,$ball6_rgb,$ball7_rgb);

    $ball7_bbb = lhc_bbb($ball7);
    $ball7_bb_ds = lhc_bb_ds($ball7_bbb);
    $ball7_bb_dx = lhc_bb_dx($ball7_bbb);

    $ball1_head = lhc_head($ball1);
    $ball2_head = lhc_head($ball2);
    $ball3_head = lhc_head($ball3);
    $ball4_head = lhc_head($ball4);
    $ball5_head = lhc_head($ball5);
    $ball6_head = lhc_head($ball6);
    $ball7_head = lhc_head($ball7);

    $ball1_tail = lhc_tail($ball1);
    $ball2_tail = lhc_tail($ball2);
    $ball3_tail = lhc_tail($ball3);
    $ball4_tail = lhc_tail($ball4);
    $ball5_tail = lhc_tail($ball5);
    $ball6_tail = lhc_tail($ball6);
    $ball7_tail = lhc_tail($ball7);

    $ball1_Ds = lhc_Ds($ball1);
    $ball2_Ds = lhc_Ds($ball2);
    $ball3_Ds = lhc_Ds($ball3);
    $ball4_Ds = lhc_Ds($ball4);
    $ball5_Ds = lhc_Ds($ball5);
    $ball6_Ds = lhc_Ds($ball6);
    $ball7_Ds = lhc_Ds($ball7);

    $ball1_Dx = lhc_Dx($ball1);
    $ball2_Dx = lhc_Dx($ball2);
    $ball3_Dx = lhc_Dx($ball3);
    $ball4_Dx = lhc_Dx($ball4);
    $ball5_Dx = lhc_Dx($ball5);
    $ball6_Dx = lhc_Dx($ball6);
    $ball7_Dx = lhc_Dx($ball7);

    $ball1_HsDs = lhc_HsDs($ball1);
    $ball2_HsDs = lhc_HsDs($ball2);
    $ball3_HsDs = lhc_HsDs($ball3);
    $ball4_HsDs = lhc_HsDs($ball4);
    $ball5_HsDs = lhc_HsDs($ball5);
    $ball6_HsDs = lhc_HsDs($ball6);
    $ball7_HsDs = lhc_HsDs($ball7);

    $ball1_HsDx = lhc_HsDx($ball1);
    $ball2_HsDx = lhc_HsDx($ball2);
    $ball3_HsDx = lhc_HsDx($ball3);
    $ball4_HsDx = lhc_HsDx($ball4);
    $ball5_HsDx = lhc_HsDx($ball5);
    $ball6_HsDx = lhc_HsDx($ball6);
    $ball7_HsDx = lhc_HsDx($ball7);

    $ball1_WsDx = lhc_WsDx($ball1);
    $ball2_WsDx = lhc_WsDx($ball2);
    $ball3_WsDx = lhc_WsDx($ball3);
    $ball4_WsDx = lhc_WsDx($ball4);
    $ball5_WsDx = lhc_WsDx($ball5);
    $ball6_WsDx = lhc_WsDx($ball6);
    $ball7_WsDx = lhc_WsDx($ball7);


    foreach($orders as $order){
        $is_win = "false";
        $rTypeName = $order["rtype_str"];
        $rType = $order["rtype"];
        $betInfo = $order["number"];
        $selectBall = "0";

        $is_win_san_te = "false";
        $is_win_er_te = "false";
        if($rType!="NAP"){
            $zhengma = mb_substr($betInfo,0,3,'utf-8');
        }else{
            $zhengma = "";
        }


        if($rTypeName=="特别号" || strpos($betInfo,"特别号 ")!==false){
            $selectBall = "7";
        }elseif(strpos($rTypeName,"正码特 ")!==false){
            $selectBall = mb_substr($rTypeName,4,1,'utf-8');
        }elseif($zhengma=="正码一"){
            $selectBall = "1";
        }elseif($zhengma=="正码二"){
            $selectBall = "2";
        }elseif($zhengma=="正码三"){
            $selectBall = "3";
        }elseif($zhengma=="正码四"){
            $selectBall = "4";
        }elseif($zhengma=="正码五"){
            $selectBall = "5";
        }elseif($zhengma=="正码六"){
            $selectBall = "6";
        }

        if($rTypeName=="正码" && in_array($betInfo,$numberArray)){
            if(in_array($betInfo,$normalBallArray)){
                $is_win = "true";
            }
        }elseif($rTypeName=="正码" || $rTypeName=="两面"){
            if(in_array($betInfo, array($zhds, $zhdx))){
                $is_win = "true";
            }
        }

        if(in_array($selectBall,array("1","2","3","4","5","6","7")) && in_array($betInfo,$numberArray)){
            if($betInfo == $rs['ball_'.$selectBall]){
                $is_win = "true";
            }
        }elseif((in_array($selectBall,array("1","2","3","4","5","6","7")) || $rTypeName=="两面") && $rs['ball_'.$selectBall]!="49" ){
            $ds		= lhc_Ds($rs['ball_'.$selectBall]);
            $dx		= lhc_Dx($rs['ball_'.$selectBall]);
            $wsdx	= lhc_WsDx($rs['ball_'.$selectBall]);
            $hsds	= lhc_HsDs($rs['ball_'.$selectBall]);
            $hsdx	= lhc_HsDx($rs['ball_'.$selectBall]);
            $rgb    = lhc_rgb($rs['ball_'.$selectBall]);
            $betContent = mb_substr($betInfo,4,2,'utf-8');
            if(in_array($betContent, array($ds, $dx, $wsdx, $hsds, $hsdx, $rgb))){
                $is_win = "true";
            }
            if($selectBall=="7" && $betContent==($dx.$ds)){
                $is_win = "true";
            }
        }elseif((in_array($selectBall,array("1","2","3","4","5","6","7")) || $rTypeName=="两面") && $rs['ball_'.$selectBall]=="49"){
            $rgb    = lhc_rgb($rs['ball_'.$selectBall]);
            $betContent = mb_substr($betInfo,4,2,'utf-8');
            if($betContent == $rgb){
                $is_win = "true";
            }elseif(!in_array($betContent,array("红波","绿波","蓝波"))){
                $is_win = "tie";
            }
        }elseif($rTypeName=="生肖"){
            if(in_array($betInfo, array($ball7_sx, $ball7_rgb, $ball7_head, $ball7_tail))){
                $is_win = "true";
            }
        }elseif($rTypeName=="正肖"){
            $win_number = 0;
            if($betInfo == $ball1_sx){
                $is_win = "true";
                $win_number += 1;
            }
            if($betInfo == $ball2_sx){
                $is_win = "true";
                $win_number += 1;
            }
            if($betInfo == $ball3_sx){
                $is_win = "true";
                $win_number += 1;
            }
            if($betInfo == $ball4_sx){
                $is_win = "true";
                $win_number += 1;
            }
            if($betInfo == $ball5_sx){
                $is_win = "true";
                $win_number += 1;
            }
            if($betInfo == $ball6_sx){
                $is_win = "true";
                $win_number += 1;
            }

            if($betInfo == $c7){
                $is_win = "true";
            }elseif(in_array($betInfo,array("正肖 红波","正肖 蓝波","正肖 绿波")) && $c7=="正肖 和局"){
                $is_win = "tie";
            }
        }elseif($rTypeName=="一肖"){
            if(in_array($betInfo, array($ball1_sx, $ball2_sx, $ball3_sx, $ball4_sx, $ball5_sx, $ball6_sx, $ball7_sx))){
                $is_win = "true";
            }
            if(in_array($betInfo, array($ball1_tail, $ball2_tail, $ball3_tail, $ball4_tail, $ball5_tail, $ball6_tail, $ball7_tail))){
                $is_win = "true";
            }
            if($betInfo=="总肖单" || $betInfo=="总肖双"){
                if($betInfo == $sx_ds){
                    $is_win = "true";
                }
            }elseif(in_array($betInfo, array("234肖", "5肖", "6肖", "7肖"))){
                if($betInfo == $sx_number){
                    $is_win = "true";
                }
            }
        }elseif($rTypeName=="半波"){
            if($betInfo == $ball7_bb_ds|| $betInfo == $ball7_bb_dx || $betInfo== $ball7_bbb){
                $is_win = "true";
            }elseif($ball7=="49"){
                $is_win = "tie";
            }
        }elseif($rType=="NAP"){//正码过关
            $betInfoArray = explode(",",$betInfo);
            $is_win_nap = array();

            foreach($betInfoArray as $key => $value){
                $betInfoPre = mb_substr($value,0,3,'utf-8');
                if($betInfoPre == "正码一"){
                    if(in_array($value,array("正码一 ".$ball1_Ds,"正码一 ".$ball1_Dx,"正码一 ".$ball1_HsDs,"正码一 ".$ball1_HsDx,"正码一 ".$ball1_WsDx)) && $ball1=="49"){
                        $is_win_nap[] = "tie";
                    }elseif(in_array($value,array("正码一 ".$ball1_Ds,"正码一 ".$ball1_Dx,"正码一 ".$ball1_HsDs,"正码一 ".$ball1_HsDx,"正码一 ".$ball1_WsDx,"正码一 ".$ball1_rgb))){
                        $is_win_nap[] = "true";
                    }else{
                        $is_win_nap[] = "false";
                    }
                }elseif($betInfoPre == "正码二"){
                    if(in_array($value,array("正码二 ".$ball2_Ds,"正码二 ".$ball2_Dx,"正码二 ".$ball2_HsDs,"正码二 ".$ball2_HsDx,"正码二 ".$ball2_WsDx)) && $ball2=="49"){
                        $is_win_nap[] = "tie";
                    }elseif(in_array($value,array("正码二 ".$ball2_Ds,"正码二 ".$ball2_Dx,"正码二 ".$ball2_HsDs,"正码二 ".$ball2_HsDx,"正码二 ".$ball2_WsDx,"正码二 ".$ball2_rgb))){
                        $is_win_nap[] = "true";
                    }else{
                        $is_win_nap[] = "false";
                    }
                }elseif($betInfoPre == "正码三"){
                    if(in_array($value,array("正码三 ".$ball3_Ds,"正码三 ".$ball3_Dx,"正码三 ".$ball3_HsDs,"正码三 ".$ball3_HsDx,"正码三 ".$ball3_WsDx)) && $ball3=="49"){
                        $is_win_nap[] = "tie";
                    }elseif(in_array($value,array("正码三 ".$ball3_Ds,"正码三 ".$ball3_Dx,"正码三 ".$ball3_HsDs,"正码三 ".$ball3_HsDx,"正码三 ".$ball3_WsDx,"正码三 ".$ball3_rgb))){
                        $is_win_nap[] = "true";
                    }else{
                        $is_win_nap[] = "false";
                    }
                }elseif($betInfoPre == "正码四"){
                    if(in_array($value,array("正码四 ".$ball4_Ds,"正码四 ".$ball4_Dx,"正码四 ".$ball4_HsDs,"正码四 ".$ball4_HsDx,"正码四 ".$ball4_WsDx)) && $ball4=="49"){
                        $is_win_nap[] = "tie";
                    }elseif(in_array($value,array("正码四 ".$ball4_Ds,"正码四 ".$ball4_Dx,"正码四 ".$ball4_HsDs,"正码四 ".$ball4_HsDx,"正码四 ".$ball4_WsDx,"正码四 ".$ball4_rgb))){
                        $is_win_nap[] = "true";
                    }else{
                        $is_win_nap[] = "false";
                    }
                }elseif($betInfoPre == "正码五"){
                    if(in_array($value,array("正码五 ".$ball5_Ds,"正码五 ".$ball5_Dx,"正码五 ".$ball5_HsDs,"正码五 ".$ball5_HsDx,"正码五 ".$ball5_WsDx)) && $ball5=="49"){
                        $is_win_nap[] = "tie";
                    }elseif(in_array($value,array("正码五 ".$ball5_Ds,"正码五 ".$ball5_Dx,"正码五 ".$ball5_HsDs,"正码五 ".$ball5_HsDx,"正码五 ".$ball5_WsDx,"正码五 ".$ball5_rgb))){
                        $is_win_nap[] = "true";
                    }else{
                        $is_win_nap[] = "false";
                    }
                }elseif($betInfoPre == "正码六"){
                    if(in_array($value,array("正码六 ".$ball6_Ds,"正码六 ".$ball6_Dx,"正码六 ".$ball6_HsDs,"正码六 ".$ball6_HsDx,"正码六 ".$ball6_WsDx)) && $ball6=="49"){
                        $is_win_nap[] = "tie";
                    }elseif(in_array($value,array("正码六 ".$ball6_Ds,"正码六 ".$ball6_Dx,"正码六 ".$ball6_HsDs,"正码六 ".$ball6_HsDx,"正码六 ".$ball6_WsDx,"正码六 ".$ball6_rgb))){
                        $is_win_nap[] = "true";
                    }else{
                        $is_win_nap[] = "false";
                    }
                }
            }

            $is_win="true";
            foreach($is_win_nap as $key2 => $value2){
                if($value2=="false"){
                    $is_win="false";
                }
            }
        }elseif($rType == "NX"){//合肖
            if($ball7 == "49"){
                $is_win="tie";
            }elseif(in_array($ball7_sx,explode(",",$betInfo))){
                $is_win="true";
            }
        }elseif($rType == "NI"){//自选不中
            $bet_info_array_ni = explode(", ",$betInfo);
            $is_win="true";
            foreach($ballArray as $key => $value){
                if(in_array($value, $bet_info_array_ni)){
                    $is_win = "false";
                }
            }
        }elseif($rType == "LX"){//连肖
            $bet_info_array_lx = explode(",",$betInfo);
            $is_win="true";
            foreach($bet_info_array_lx as $key => $value){
                if(!in_array($value, array($ball1_sx,$ball2_sx,$ball3_sx,$ball4_sx,$ball5_sx,$ball6_sx,$ball7_sx))){
                    $is_win = "false";
                }
            }
        }elseif($rType == "LF"){//连尾
            $bet_info_array_lf = explode(",",$betInfo);
            $is_win="true";
            foreach($bet_info_array_lf as $key => $value){
                if(!in_array("尾".$value, array($ball1_tail,$ball2_tail,$ball3_tail,$ball4_tail,$ball5_tail,$ball6_tail,$ball7_tail))){
                    $is_win = "false";
                }
            }
        }elseif($rType == "CH"){//连码
            $bet_info_array_ch = explode(", ",$betInfo);
            $is_win="true";

            if($rTypeName=="四全中" || $rTypeName=="三全中" || $rTypeName=="二全中"){
                foreach($bet_info_array_ch as $key => $value){
                    if(!in_array($value, $normalBallArray)){
                        $is_win = "false";
                    }
                }
            }elseif($rTypeName=="三中二"){
                $is_win = "false";
                $is_win_san_san = "true";
                $is_win_san_te = "false";
                foreach($bet_info_array_ch as $key => $value){
                    if(!in_array($value, $normalBallArray)){
                        $is_win_san_san = "false";
                    }
                }
                if($is_win_san_san == "false"){
                    if(in_array($bet_info_array_ch[0], $normalBallArray) && in_array($bet_info_array_ch[1], $normalBallArray)&& !in_array($bet_info_array_ch[2], $normalBallArray) ||
                        in_array($bet_info_array_ch[0], $normalBallArray) && in_array($bet_info_array_ch[2], $normalBallArray)&& !in_array($bet_info_array_ch[1], $normalBallArray) ||
                        in_array($bet_info_array_ch[1], $normalBallArray) && in_array($bet_info_array_ch[2], $normalBallArray)&& !in_array($bet_info_array_ch[0], $normalBallArray)
                    ){
                        $is_win_san_te = "true";
                        $is_win = "true";
                    }
                }else{
                    $is_win = "true";
                }
            }elseif($rTypeName=="二中特"){
                $is_win = "false";
                $is_win_er_er = "true";
                $is_win_er_te = "false";
                foreach($bet_info_array_ch as $key => $value){
                    if(!in_array($value, $normalBallArray)){
                        $is_win_er_er = "false";
                    }
                }
                if($is_win_er_er == "false"){
                    if(in_array($bet_info_array_ch[0], $normalBallArray)&&$bet_info_array_ch[1]==$ball7 ||
                        in_array($bet_info_array_ch[1], $normalBallArray)&&$bet_info_array_ch[0]==$ball7 ){
                        $is_win_er_te = "true";
                        $is_win = "true";
                    }
                }else{
                    $is_win = "true";
                }
            }elseif($rTypeName=="特串"){
                $is_win = "false";
                if(in_array($bet_info_array_ch[0], $normalBallArray)&&$bet_info_array_ch[1]==$ball7 ||
                    in_array($bet_info_array_ch[1], $normalBallArray)&&$bet_info_array_ch[0]==$ball7 ){
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
            $bet_type = "六合彩中奖";

            if($rTypeName=="正肖" && $win_number>0){
                $win_money = ($order['bet_money']*($order['bet_rate']-1))*$win_number+$order['bet_money'];
                $bet_money_total = $win_money+$order['fs'];
            }elseif($rType=="NAP"){//正码过关
                $betRateArray = explode(",",$order['bet_rate']);
                $total_bet_rate_nap = 1;

                foreach($is_win_nap as $key => $value){
                    if($value=="tie"){
                        $bet_rate_nap = 1;
                    }else{
                        $bet_rate_nap = $betRateArray[$key];
                    }
                    $total_bet_rate_nap = $total_bet_rate_nap*$bet_rate_nap*1;
                }
                $win_money = $order['bet_money']*$total_bet_rate_nap;
                $bet_money_total = $win_money+$order['fs'];
            }elseif($rTypeName=="三中二" || $rTypeName=="二中特"){//连码
                $odds_CH = six_lottery_odds::getOdds("CH");
                if($is_win_san_te=="true"){
                    $bet_rate_ch = $odds_CH["h3"];
                }elseif($rTypeName=="三中二"){
                    $bet_rate_ch = $odds_CH["h4"];
                }elseif($is_win_er_te=="true"){
                    $bet_rate_ch = $odds_CH["h6"];
                }elseif($rTypeName=="二中特"){
                    $bet_rate_ch = $odds_CH["h7"];
                }
                $win_money = $order['bet_money']*$bet_rate_ch;
                $bet_money_total = $win_money+$order['fs'];
            }
        }elseif($is_win=="tie"){
            $win_sign = "2";
            $bet_money_total = $order['bet_money'];
            $bet_type = "六合彩和局";
        }else{
            $win_sign = "0";
            $bet_money_total = $order['fs'];
            $bet_type = "六合彩反水";
        }

        //修改主单
        $msql="update six_lottery_order set status='$stateType' where id='".$order['id']."'";
        $mysqli->query($msql) or die ("注单修改失败!!!".$order['id']);
        //修改子单
        if(($rTypeName=="正肖" && $win_number>0) || ($rType=="NAP" && $is_win=="true")
            || (($rTypeName=="三中二" || $rTypeName=="二中特") && $is_win=="true")){
            $msql="update six_lottery_order_sub set status='$stateType',is_win='$win_sign',win='$win_money' where id='".$order['sub_id']."'";
        }else{
            $msql="update six_lottery_order_sub set status='$stateType',is_win='$win_sign' where id='".$order['sub_id']."'";
        }
        $mysqli->query($msql) or die ("注单子单修改失败!!!".$order['sub_id']);
        if($win_sign == "1" || ($win_sign == "0" && $order['fs']>0)|| $win_sign == "2"){
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
    $msql="update lottery_result_lhc set state='$stateType' WHERE qishu='".$qi."'";
    $mysqli->query($msql) or die ("期数修改失败!!!");
    message($jiesuanString,$url);
}