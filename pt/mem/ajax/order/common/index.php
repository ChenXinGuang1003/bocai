<?php

include "../../../../../app/member/utils/login_check.php";

include "../../../../../app/member/utils/convert_name.php";
include "../../../../../app/member/utils/error_handle.php";
include "../../../../../app/member/class/user_list.php";
include "../../../../../app/member/class/lottery_sf.php";
include "../../../../../app/member/class/lottery_schedule.php";
include "../../../../../app/member/class/odds_sf.php";
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/cache/ltConfig.php");
include_once($C_Patch."/app/member/class/common_class.php");
include "../../../../../app/member/utils/time_util.php";

$gType = $_POST["game"];
$game_num = $_POST["game_num"];
$rType = $_POST["game_name"];
$orders = $_POST["orders"];
$selectArray = $_POST["selectArray"];
$result = 'true';

//验证money_log是否存在错误
$sql = "select assets,balance,order_value from money_log where user_id='".$_SESSION["userid"]."' order by id desc limit 0,2";
$query	=	$mysqli->query($sql);
$rs = array();
while($row = $query->fetch_array()){
    $rs[] = $row;
}
/*if(count($rs)>1){
    if($rs[0]["assets"]!=$rs[1]["balance"]){
        error2("账号金额异常，请联系管理人员。");
    }
}*/

$bet_win_total = 0;
if($gType == "BJKN" && $rType=="MULTI_CHOOSE"){
    if($orders["CHOOSE:1"]){
        $chooseOne = $orders["CHOOSE:1"];
        $numArray = $chooseOne["num"];
        $bet_money = $chooseOne["gold"];
        $bet_money_total = $chooseOne["gold_total"];
        if($bet_money<0 || $bet_money_total<0){
            $passValidate = false;
        }
        $odds = $chooseOne["odds"];
        $numberDesc = "选一";
        $passValidate = validateCount(sizeof($numArray), 1, 80) && validateGold($bet_money);

    }elseif($orders["CHOOSE:2"]){
        $chooseOne = $orders["CHOOSE:2"];
        $numArray = $chooseOne["num"];
        $bet_money = $chooseOne["gold"];
        $bet_money_total = $chooseOne["gold_total"];
        if($bet_money<0 || $bet_money_total<0){
            $passValidate = false;
        }
        $odds = $chooseOne["odds"];
        $numberDesc = "选二";
        $passValidate = validateCount(sizeof($numArray), 2, 20) && validateGold($bet_money);

    }elseif($orders["CHOOSE:3"]){
        $chooseOne = $orders["CHOOSE:3"];
        $numArray = $chooseOne["num"];
        $bet_money = $chooseOne["gold"];
        $bet_money_total = $chooseOne["gold_total"];
        if($bet_money<0 || $bet_money_total<0){
            $passValidate = false;
        }
        $odds = $chooseOne["odds"];
        $numberDesc = "选三";
        $passValidate = validateCount(sizeof($numArray), 3, 11) && validateGold($bet_money);


    }elseif($orders["CHOOSE:4"]){
        $chooseOne = $orders["CHOOSE:4"];
        $numArray = $chooseOne["num"];
        $bet_money = $chooseOne["gold"];
        $bet_money_total = $chooseOne["gold_total"];
        if($bet_money<0 || $bet_money_total<0){
            $passValidate = false;
        }
        $odds = $chooseOne["odds"];
        $numberDesc = "选四";
        $passValidate = validateCount(sizeof($numArray), 4, 9) && validateGold($bet_money);

    }elseif($orders["CHOOSE:5"]){
        $chooseOne = $orders["CHOOSE:5"];
        $numArray = $chooseOne["num"];
        $bet_money = $chooseOne["gold"];
        $bet_money_total = $chooseOne["gold_total"];
        if($bet_money<0 || $bet_money_total<0){
            $passValidate = false;
        }
        $odds = $chooseOne["odds"];
        $numberDesc = "选五";
        $passValidate = validateCount(sizeof($numArray), 5, 9) && validateGold($bet_money);

    }
}elseif($gType == "BJPK" && $rType=="MULTI_CHOOSE"){
    $passValidate = true;
    $selectArray = array();
    if($orders["FIRST:2"]){
        $chooseOne = $orders["FIRST:2"];
        $numArray = $chooseOne["num"];
        $bet_money = $chooseOne["gold"];
        $bet_money_total = $chooseOne["gold_total"];
        if($bet_money<0 || $bet_money_total<0){
            $passValidate = false;
        }
        $selectArray[] = $numArray;
        if(count($numArray)!=2){
            error2("数据不对,请联系客服!");
        }
    }elseif($orders["FIRST:3"]){
        $chooseOne = $orders["FIRST:3"];
        $numArray = $chooseOne["num"];
        $bet_money = $chooseOne["gold"];
        $bet_money_total = $chooseOne["gold_total"];
        if($bet_money<0 || $bet_money_total<0){
            $passValidate = false;
        }
        $selectArray[] = $numArray;
        if(count($numArray)!=3){
            error2("数据不对,请联系客服!");
        }
    }elseif($orders["FIRST:4"]){
        $chooseOne = $orders["FIRST:4"];
        $numArray = $chooseOne["num"];
        $bet_money = $chooseOne["gold"];
        $bet_money_total = $chooseOne["gold_total"];
        if($bet_money<0 || $bet_money_total<0){
            $passValidate = false;
        }
        $selectArray[] = $numArray;
        if(count($numArray)!=4){
            error2("数据不对,请联系客服!");
        }
    }
}else{
    $passValidate = true;
    $bet_money_total = 0;
    $bet_win_total = 0.00;
    foreach($orders as $object){
        if($object['gold']<0){
            $passValidate = false;
        }else{
            $bet_money_total = $bet_money_total + $object['gold'];
            $bet_win_total = $bet_win_total +  $object['gold']* $object['odds'];
        }
    }
}

//验证赔率
if($gType == "GXSF"){
    $odds1 = odds_sf::getOddsByBall("广西十分彩","主盘势","ball_1");
    $odds2 = odds_sf::getOddsByBall("广西十分彩","主盘势","ball_2");
    $odds3 = odds_sf::getOddsByBall("广西十分彩","主盘势","ball_3");
    $odds4 = odds_sf::getOddsByBall("广西十分彩","主盘势","ball_4");
    $odds5 = odds_sf::getOddsByBall("广西十分彩","主盘势","ball_5"); //特别号

    $odds11 = odds_sf::getOddsByBall("广西十分彩","四季五行","ball_1");
    $odds12 = odds_sf::getOddsByBall("广西十分彩","四季五行","ball_2");
    $odds13 = odds_sf::getOddsByBall("广西十分彩","四季五行","ball_3");
    $odds14 = odds_sf::getOddsByBall("广西十分彩","四季五行","ball_4");
    $odds15 = odds_sf::getOddsByBall("广西十分彩","四季五行","ball_5");//特别号

    $odds21 = odds_sf::getOddsByBall("广西十分彩","正码和特别号","ball_1");
    $odds22 = odds_sf::getOddsByBall("广西十分彩","正码和特别号","ball_2");
    $odds23 = odds_sf::getOddsByBall("广西十分彩","正码和特别号","ball_3");
    $odds24 = odds_sf::getOddsByBall("广西十分彩","正码和特别号","ball_4");
    $odds25 = odds_sf::getOddsByBall("广西十分彩","正码和特别号","ball_5"); //特别号

    $odds31 = odds_sf::getOddsByBall("广西十分彩","一中一","ball_1");

    foreach($orders as $object){
        $number = $object["number"];
        $betInfo = explode(":",$object["number"]);
        $bet_rate = $object['odds'];

        if($betInfo[1]=="LOCATE"){//每球定位
            $selectBall = $betInfo[2];
            if($selectBall == "1"){
                $odds_gxsf = $odds21;
            }elseif($selectBall == "2"){
                $odds_gxsf = $odds22;
            }elseif($selectBall == "3"){
                $odds_gxsf = $odds23;
            }elseif($selectBall == "4"){
                $odds_gxsf = $odds24;
            }elseif($selectBall == "S"){
                $odds_gxsf = $odds25;
            }
            if($odds_gxsf["h".$betInfo[0]] != $bet_rate){
                $isOddsValidate = "false";
            }
        }elseif($betInfo[1]=="MATCH"){
            if($odds31["h".$betInfo[0]] != $bet_rate){
                $isOddsValidate = "false";
            }
        }elseif($rType=="NORMAL_NUMBER" || $rType=="SP"){
            if($betInfo[0]=="1"){
                $odds_gxsf = $odds21;
            }elseif($betInfo[0] == "2"){
                $odds_gxsf = $odds22;
            }elseif($betInfo[0] == "3"){
                $odds_gxsf = $odds23;
            }elseif($betInfo[0] == "4"){
                $odds_gxsf = $odds24;
            }elseif($betInfo[0] == "S"){
                $odds_gxsf = $odds25;
            }
            if(($betInfo[1]=="RED") && ($odds_gxsf["h22"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="BLUE") && ($odds_gxsf["h23"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="GREEN") && ($odds_gxsf["h24"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2].":".$betInfo[3])=="OVER:S:ODD") && ($odds_gxsf["h25"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2].":".$betInfo[3])=="OVER:S:EVEN") && ($odds_gxsf["h26"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2].":".$betInfo[3])=="UNDER:S:ODD") && ($odds_gxsf["h27"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2].":".$betInfo[3])=="UNDER:S:EVEN") && ($odds_gxsf["h28"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="SUM:ODD") && ($odds_gxsf["h33"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="SUM:EVEN") && ($odds_gxsf["h34"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="LAST:OVER") && ($odds_gxsf["h35"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="LAST:UNDER") && ($odds_gxsf["h36"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="OVER" && !$betInfo[2]) && ($odds_gxsf["h29"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="UNDER" && !$betInfo[2]) && ($odds_gxsf["h30"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="ODD" && !$betInfo[2]) && ($odds_gxsf["h31"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="EVEN" && !$betInfo[2]) && ($odds_gxsf["h32"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }elseif($rType=="GENERAL"){
            if($betInfo[0]=="1"){
                $odds_gxsf = $odds1;
            }elseif($betInfo[0] == "2"){
                $odds_gxsf = $odds2;
            }elseif($betInfo[0] == "3"){
                $odds_gxsf = $odds3;
            }elseif($betInfo[0] == "4"){
                $odds_gxsf = $odds4;
            }elseif($betInfo[0] == "S"){
                $odds_gxsf = $odds5;
            }
            if((($betInfo[1].":".$betInfo[2])=="SUM:ODD") && ($odds_gxsf["h5"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="SUM:EVEN") && ($odds_gxsf["h6"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="LAST:OVER") && ($odds_gxsf["h7"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="LAST:UNDER") && ($odds_gxsf["h8"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="OVER") && ($odds_gxsf["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="UNDER") && ($odds_gxsf["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="ODD") && ($odds_gxsf["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="EVEN") && ($odds_gxsf["h4"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }elseif($rType=="SEASONS_ELEMENTS"){
            if($betInfo[0]=="1"){
                $odds_gxsf = $odds11;
            }elseif($betInfo[0] == "2"){
                $odds_gxsf = $odds12;
            }elseif($betInfo[0] == "3"){
                $odds_gxsf = $odds13;
            }elseif($betInfo[0] == "4"){
                $odds_gxsf = $odds14;
            }elseif($betInfo[0] == "S"){
                $odds_gxsf = $odds15;
            }
            if(($betInfo[1]=="SPRING") && ($odds_gxsf["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="SUMMER") && ($odds_gxsf["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="FALL") && ($odds_gxsf["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="WINTER") && ($odds_gxsf["h4"] != $bet_rate)){
                $isOddsValidate = "false";
            }
            elseif(($betInfo[1]=="METAL") && ($odds_gxsf["h5"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="WOOD") && ($odds_gxsf["h6"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="WATER") && ($odds_gxsf["h7"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="FIRE") && ($odds_gxsf["h8"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="EARTH") && ($odds_gxsf["h9"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }
    }
}
if($gType == "GDSF"){
    $odds1 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_1");
    $odds2 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_2");
    $odds3 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_3");
    $odds4 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_4");
    $odds5 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_5");
    $odds6 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_6");
    $odds7 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_7");
    $odds8 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_8");
    $odds9 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_9");//顶部总和

    $odds11 = odds_sf::getOddsByBall("广东十分彩","四季五行","ball_1");
    $odds12 = odds_sf::getOddsByBall("广东十分彩","四季五行","ball_2");
    $odds13 = odds_sf::getOddsByBall("广东十分彩","四季五行","ball_3");
    $odds14 = odds_sf::getOddsByBall("广东十分彩","四季五行","ball_4");
    $odds15 = odds_sf::getOddsByBall("广东十分彩","四季五行","ball_5");
    $odds16 = odds_sf::getOddsByBall("广东十分彩","四季五行","ball_6");
    $odds17 = odds_sf::getOddsByBall("广东十分彩","四季五行","ball_7");
    $odds18 = odds_sf::getOddsByBall("广东十分彩","四季五行","ball_8");

    $odds21 = odds_sf::getOddsByBall("广东十分彩","单面双码","ball_1");
    $odds22 = odds_sf::getOddsByBall("广东十分彩","单面双码","ball_2");
    $odds23 = odds_sf::getOddsByBall("广东十分彩","单面双码","ball_3");
    $odds24 = odds_sf::getOddsByBall("广东十分彩","单面双码","ball_4");
    $odds25 = odds_sf::getOddsByBall("广东十分彩","单面双码","ball_5");
    $odds26 = odds_sf::getOddsByBall("广东十分彩","单面双码","ball_6");
    $odds27 = odds_sf::getOddsByBall("广东十分彩","单面双码","ball_7");
    $odds28 = odds_sf::getOddsByBall("广东十分彩","单面双码","ball_8");

    $odds31 = odds_sf::getOddsByBall("广东十分彩","方位中发白","ball_1");
    $odds32 = odds_sf::getOddsByBall("广东十分彩","方位中发白","ball_2");
    $odds33 = odds_sf::getOddsByBall("广东十分彩","方位中发白","ball_3");
    $odds34 = odds_sf::getOddsByBall("广东十分彩","方位中发白","ball_4");
    $odds35 = odds_sf::getOddsByBall("广东十分彩","方位中发白","ball_5");
    $odds36 = odds_sf::getOddsByBall("广东十分彩","方位中发白","ball_6");
    $odds37 = odds_sf::getOddsByBall("广东十分彩","方位中发白","ball_7");
    $odds38 = odds_sf::getOddsByBall("广东十分彩","方位中发白","ball_8");

    $odds61 = odds_sf::getOddsByBall("广东十分彩","总和龙虎","ball_1");
    $odds62 = odds_sf::getOddsByBall("广东十分彩","一中一","ball_1");


    foreach($orders as $object){
        $number = $object["number"];
        $betInfo = explode(":",$object["number"]);
        $bet_rate = $object['odds'];

        if($betInfo[1]=="LOCATE"){//每球定位
            $selectBall = $betInfo[2];
            if($selectBall == "1"){
                $odds_gdsf = $odds21;
            }elseif($selectBall == "2"){
                $odds_gdsf = $odds22;
            }elseif($selectBall == "3"){
                $odds_gdsf = $odds23;
            }elseif($selectBall == "4"){
                $odds_gdsf = $odds24;
            }elseif($selectBall == "5"){
                $odds_gdsf = $odds25;
            }elseif($selectBall == "6"){
                $odds_gdsf = $odds26;
            }elseif($selectBall == "7"){
                $odds_gdsf = $odds27;
            }elseif($selectBall == "S"){
                $odds_gdsf = $odds28;
            }
            if($odds_gdsf["h".$betInfo[0]] != $bet_rate){
                $isOddsValidate = "false";
            }
        }elseif($betInfo[1]=="MATCH"){
            if($odds62["h".$betInfo[0]] != $bet_rate){
                $isOddsValidate = "false";
            }
        }elseif($rType=="NUMBER_OPPOSITE"){
            if($betInfo[0]=="1"){
                $odds_gdsf = $odds21;
            }elseif($betInfo[0] == "2"){
                $odds_gdsf = $odds22;
            }elseif($betInfo[0] == "3"){
                $odds_gdsf = $odds23;
            }elseif($betInfo[0] == "4"){
                $odds_gdsf = $odds24;
            }elseif($betInfo[0] == "5"){
                $odds_gdsf = $odds25;
            }elseif($betInfo[0] == "6"){
                $odds_gdsf = $odds26;
            }elseif($betInfo[0] == "7"){
                $odds_gdsf = $odds27;
            }elseif($betInfo[0] == "S"){
                $odds_gdsf = $odds28;
            }
            if((($betInfo[1].":".$betInfo[2])=="SUM:ODD") && ($odds_gdsf["h25"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="SUM:EVEN") && ($odds_gdsf["h26"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="LAST:OVER") && ($odds_gdsf["h27"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="LAST:UNDER") && ($odds_gdsf["h28"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="OVER" && !$betInfo[2]) && ($odds_gdsf["h21"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="UNDER" && !$betInfo[2]) && ($odds_gdsf["h22"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="ODD" && !$betInfo[2]) && ($odds_gdsf["h23"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="EVEN" && !$betInfo[2]) && ($odds_gdsf["h24"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }elseif($rType=="GENERAL"){
            if($betInfo[0]=="1" && $betInfo[1]!="S"){
                $odds_gdsf = $odds1;
            }elseif($betInfo[0] == "2"){
                $odds_gdsf = $odds2;
            }elseif($betInfo[0] == "3"){
                $odds_gdsf = $odds3;
            }elseif($betInfo[0] == "4"){
                $odds_gdsf = $odds4;
            }elseif($betInfo[0] == "5"){
                $odds_gdsf = $odds5;
            }elseif($betInfo[0] == "6"){
                $odds_gdsf = $odds6;
            }elseif($betInfo[0] == "7"){
                $odds_gdsf = $odds7;
            }elseif($betInfo[0] == "S"){
                $odds_gdsf = $odds8;
            }elseif($betInfo[0] == "ALL" || $betInfo[1]=="S"){
                $odds_gdsf = $odds9;
            }
            if(($number=="ALL:SUM:OVER") && ($odds_gdsf["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="ALL:SUM:UNDER") && ($odds_gdsf["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="ALL:SUM:ODD") && ($odds_gdsf["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="ALL:SUM:EVEN") && ($odds_gdsf["h4"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="ALL:SUM:LAST:OVER") && ($odds_gdsf["h5"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="ALL:SUM:LAST:UNDER") && ($odds_gdsf["h6"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="1:S:DRAGON") && ($odds_gdsf["h7"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="1:S:TIGER") && ($odds_gdsf["h8"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="SUM:ODD") && ($odds_gdsf["h5"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="SUM:EVEN") && ($odds_gdsf["h6"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="LAST:OVER") && ($odds_gdsf["h7"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="LAST:UNDER") && ($odds_gdsf["h8"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="OVER") && ($odds_gdsf["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="UNDER") && ($odds_gdsf["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="ODD") && ($odds_gdsf["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="EVEN") && ($odds_gdsf["h4"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }elseif($rType=="SEASONS_ELEMENTS"){
            if($betInfo[0]=="1"){
                $odds_gdsf = $odds11;
            }elseif($betInfo[0] == "2"){
                $odds_gdsf = $odds12;
            }elseif($betInfo[0] == "3"){
                $odds_gdsf = $odds13;
            }elseif($betInfo[0] == "4"){
                $odds_gdsf = $odds14;
            }elseif($betInfo[0] == "5"){
                $odds_gdsf = $odds15;
            }elseif($betInfo[0] == "6"){
                $odds_gdsf = $odds16;
            }elseif($betInfo[0] == "7"){
                $odds_gdsf = $odds17;
            }elseif($betInfo[0] == "S"){
                $odds_gdsf = $odds18;
            }
            if(($betInfo[1]=="SPRING") && ($odds_gdsf["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="SUMMER") && ($odds_gdsf["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="FALL") && ($odds_gdsf["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="WINTER") && ($odds_gdsf["h4"] != $bet_rate)){
                $isOddsValidate = "false";
            }
            elseif(($betInfo[1]=="METAL") && ($odds_gdsf["h5"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="WOOD") && ($odds_gdsf["h6"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="WATER") && ($odds_gdsf["h7"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="FIRE") && ($odds_gdsf["h8"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="EARTH") && ($odds_gdsf["h9"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }elseif($rType=="DIRECTION_ZFB"){
            if($betInfo[0]=="1"){
                $odds_gdsf = $odds31;
            }elseif($betInfo[0] == "2"){
                $odds_gdsf = $odds32;
            }elseif($betInfo[0] == "3"){
                $odds_gdsf = $odds33;
            }elseif($betInfo[0] == "4"){
                $odds_gdsf = $odds34;
            }elseif($betInfo[0] == "5"){
                $odds_gdsf = $odds35;
            }elseif($betInfo[0] == "6"){
                $odds_gdsf = $odds36;
            }elseif($betInfo[0] == "7"){
                $odds_gdsf = $odds37;
            }elseif($betInfo[0] == "S"){
                $odds_gdsf = $odds38;
            }
            if(($betInfo[1]=="EAST") && ($odds_gdsf["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="SOUTH") && ($odds_gdsf["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="WEST") && ($odds_gdsf["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="NORTH") && ($odds_gdsf["h4"] != $bet_rate)){
                $isOddsValidate = "false";
            }
            elseif(($betInfo[1]=="ZHONG") && ($odds_gdsf["h5"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="FA") && ($odds_gdsf["h6"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="BAI") && ($odds_gdsf["h7"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }elseif($rType=="ALLSUM_DRAGON_TIGER"){
            $odds_gdsf = $odds61;
            if($number=="ALL:SUM:OVER" && ($odds_gdsf["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:UNDER" && ($odds_gdsf["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:ODD" && ($odds_gdsf["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:EVEN" && ($odds_gdsf["h4"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:LAST:OVER" && ($odds_gdsf["h5"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:LAST:UNDER" && ($odds_gdsf["h6"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="1:S:DRAGON" && ($odds_gdsf["h7"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="1:S:TIGER" && ($odds_gdsf["h8"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }
    }
}
if($gType == "TJSF"){
    $odds1 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_1");
    $odds2 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_2");
    $odds3 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_3");
    $odds4 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_4");
    $odds5 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_5");
    $odds6 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_6");
    $odds7 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_7");
    $odds8 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_8");//特别号
    $odds9 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_9");//顶部总和

    $odds11 = odds_sf::getOddsByBall("天津十分彩","四季五行","ball_1");
    $odds12 = odds_sf::getOddsByBall("天津十分彩","四季五行","ball_2");
    $odds13 = odds_sf::getOddsByBall("天津十分彩","四季五行","ball_3");
    $odds14 = odds_sf::getOddsByBall("天津十分彩","四季五行","ball_4");
    $odds15 = odds_sf::getOddsByBall("天津十分彩","四季五行","ball_5");
    $odds16 = odds_sf::getOddsByBall("天津十分彩","四季五行","ball_6");
    $odds17 = odds_sf::getOddsByBall("天津十分彩","四季五行","ball_7");
    $odds18 = odds_sf::getOddsByBall("天津十分彩","四季五行","ball_8");//特别号

    $odds21 = odds_sf::getOddsByBall("天津十分彩","正码和特别号","ball_1");
    $odds22 = odds_sf::getOddsByBall("天津十分彩","正码和特别号","ball_2");
    $odds23 = odds_sf::getOddsByBall("天津十分彩","正码和特别号","ball_3");
    $odds24 = odds_sf::getOddsByBall("天津十分彩","正码和特别号","ball_4");
    $odds25 = odds_sf::getOddsByBall("天津十分彩","正码和特别号","ball_5");
    $odds26 = odds_sf::getOddsByBall("天津十分彩","正码和特别号","ball_6");
    $odds27 = odds_sf::getOddsByBall("天津十分彩","正码和特别号","ball_7");
    $odds28 = odds_sf::getOddsByBall("天津十分彩","正码和特别号","ball_8");//特别号

    $odds31 = odds_sf::getOddsByBall("天津十分彩","方位中发白","ball_1");
    $odds32 = odds_sf::getOddsByBall("天津十分彩","方位中发白","ball_2");
    $odds33 = odds_sf::getOddsByBall("天津十分彩","方位中发白","ball_3");
    $odds34 = odds_sf::getOddsByBall("天津十分彩","方位中发白","ball_4");
    $odds35 = odds_sf::getOddsByBall("天津十分彩","方位中发白","ball_5");
    $odds36 = odds_sf::getOddsByBall("天津十分彩","方位中发白","ball_6");
    $odds37 = odds_sf::getOddsByBall("天津十分彩","方位中发白","ball_7");
    $odds38 = odds_sf::getOddsByBall("天津十分彩","方位中发白","ball_8");//特别号

    $odds61 = odds_sf::getOddsByBall("天津十分彩","总和龙虎","ball_1");
    $odds62 = odds_sf::getOddsByBall("天津十分彩","一中一","ball_1");


    foreach($orders as $object){
        $number = $object["number"];
        $betInfo = explode(":",$object["number"]);
        $bet_rate = $object['odds'];

        if($betInfo[1]=="LOCATE"){//每球定位
            $selectBall = $betInfo[2];
            if($selectBall == "1"){
                $odds_gdsf = $odds21;
            }elseif($selectBall == "2"){
                $odds_gdsf = $odds22;
            }elseif($selectBall == "3"){
                $odds_gdsf = $odds23;
            }elseif($selectBall == "4"){
                $odds_gdsf = $odds24;
            }elseif($selectBall == "5"){
                $odds_gdsf = $odds25;
            }elseif($selectBall == "6"){
                $odds_gdsf = $odds26;
            }elseif($selectBall == "7"){
                $odds_gdsf = $odds27;
            }elseif($selectBall == "S"){
                $odds_gdsf = $odds28;
            }
            if($odds_gdsf["h".$betInfo[0]] != $bet_rate){
                $isOddsValidate = "false";
            }
        }elseif($betInfo[1]=="MATCH"){
            if($odds62["h".$betInfo[0]] != $bet_rate){
                $isOddsValidate = "false";
            }
        }elseif($rType=="NORMAL_NUMBER"){
            if($betInfo[0]=="1"){
                $odds_gdsf = $odds21;
            }elseif($betInfo[0] == "2"){
                $odds_gdsf = $odds22;
            }elseif($betInfo[0] == "3"){
                $odds_gdsf = $odds23;
            }elseif($betInfo[0] == "4"){
                $odds_gdsf = $odds24;
            }elseif($betInfo[0] == "5"){
                $odds_gdsf = $odds25;
            }elseif($betInfo[0] == "6"){
                $odds_gdsf = $odds26;
            }elseif($betInfo[0] == "7"){
                $odds_gdsf = $odds27;
            }elseif($betInfo[0] == "S"){
                $odds_gdsf = $odds28;
            }
            if((($betInfo[1].":".$betInfo[2])=="SUM:ODD") && ($odds_gdsf["h25"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="SUM:EVEN") && ($odds_gdsf["h26"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="LAST:OVER") && ($odds_gdsf["h27"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="LAST:UNDER") && ($odds_gdsf["h28"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="OVER" && !$betInfo[2]) && ($odds_gdsf["h21"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="UNDER" && !$betInfo[2]) && ($odds_gdsf["h22"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="ODD" && !$betInfo[2]) && ($odds_gdsf["h23"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="EVEN" && !$betInfo[2]) && ($odds_gdsf["h24"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }elseif($rType=="GENERAL"){
            if($betInfo[0]=="1" && $betInfo[1]!="S"){
                $odds_gdsf = $odds1;
            }elseif($betInfo[0] == "2"){
                $odds_gdsf = $odds2;
            }elseif($betInfo[0] == "3"){
                $odds_gdsf = $odds3;
            }elseif($betInfo[0] == "4"){
                $odds_gdsf = $odds4;
            }elseif($betInfo[0] == "5"){
                $odds_gdsf = $odds5;
            }elseif($betInfo[0] == "6"){
                $odds_gdsf = $odds6;
            }elseif($betInfo[0] == "7"){
                $odds_gdsf = $odds7;
            }elseif($betInfo[0] == "S"){
                $odds_gdsf = $odds8;
            }elseif($betInfo[0] == "ALL" || $betInfo[1]=="S"){
                $odds_gdsf = $odds9;
            }
            if(($number=="ALL:SUM:OVER") && ($odds_gdsf["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="ALL:SUM:UNDER") && ($odds_gdsf["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="ALL:SUM:ODD") && ($odds_gdsf["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="ALL:SUM:EVEN") && ($odds_gdsf["h4"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="ALL:SUM:LAST:OVER") && ($odds_gdsf["h5"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="ALL:SUM:LAST:UNDER") && ($odds_gdsf["h6"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="1:S:DRAGON") && ($odds_gdsf["h7"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="1:S:TIGER") && ($odds_gdsf["h8"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="SUM:ODD") && ($odds_gdsf["h5"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="SUM:EVEN") && ($odds_gdsf["h6"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="LAST:OVER") && ($odds_gdsf["h7"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="LAST:UNDER") && ($odds_gdsf["h8"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="OVER") && ($odds_gdsf["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="UNDER") && ($odds_gdsf["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="ODD") && ($odds_gdsf["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="EVEN") && ($odds_gdsf["h4"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }elseif($rType=="SEASONS_ELEMENTS"){
            if($betInfo[0]=="1"){
                $odds_gdsf = $odds11;
            }elseif($betInfo[0] == "2"){
                $odds_gdsf = $odds12;
            }elseif($betInfo[0] == "3"){
                $odds_gdsf = $odds13;
            }elseif($betInfo[0] == "4"){
                $odds_gdsf = $odds14;
            }elseif($betInfo[0] == "5"){
                $odds_gdsf = $odds15;
            }elseif($betInfo[0] == "6"){
                $odds_gdsf = $odds16;
            }elseif($betInfo[0] == "7"){
                $odds_gdsf = $odds17;
            }elseif($betInfo[0] == "S"){
                $odds_gdsf = $odds18;
            }
            if(($betInfo[1]=="SPRING") && ($odds_gdsf["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="SUMMER") && ($odds_gdsf["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="FALL") && ($odds_gdsf["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="WINTER") && ($odds_gdsf["h4"] != $bet_rate)){
                $isOddsValidate = "false";
            }
            elseif(($betInfo[1]=="METAL") && ($odds_gdsf["h5"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="WOOD") && ($odds_gdsf["h6"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="WATER") && ($odds_gdsf["h7"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="FIRE") && ($odds_gdsf["h8"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="EARTH") && ($odds_gdsf["h9"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }elseif($rType=="DIRECTION_ZFB"){
            if($betInfo[0]=="1"){
                $odds_gdsf = $odds31;
            }elseif($betInfo[0] == "2"){
                $odds_gdsf = $odds32;
            }elseif($betInfo[0] == "3"){
                $odds_gdsf = $odds33;
            }elseif($betInfo[0] == "4"){
                $odds_gdsf = $odds34;
            }elseif($betInfo[0] == "5"){
                $odds_gdsf = $odds35;
            }elseif($betInfo[0] == "6"){
                $odds_gdsf = $odds36;
            }elseif($betInfo[0] == "7"){
                $odds_gdsf = $odds37;
            }elseif($betInfo[0] == "S"){
                $odds_gdsf = $odds38;
            }
            if(($betInfo[1]=="EAST") && ($odds_gdsf["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="SOUTH") && ($odds_gdsf["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="WEST") && ($odds_gdsf["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="NORTH") && ($odds_gdsf["h4"] != $bet_rate)){
                $isOddsValidate = "false";
            }
            elseif(($betInfo[1]=="ZHONG") && ($odds_gdsf["h5"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="FA") && ($odds_gdsf["h6"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="BAI") && ($odds_gdsf["h7"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }elseif($rType=="ALLSUM_DRAGON_TIGER"){
            $odds_gdsf = $odds61;
            if($number=="ALL:SUM:OVER" && ($odds_gdsf["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:UNDER" && ($odds_gdsf["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:ODD" && ($odds_gdsf["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:EVEN" && ($odds_gdsf["h4"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:LAST:OVER" && ($odds_gdsf["h5"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:LAST:UNDER" && ($odds_gdsf["h6"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="1:S:DRAGON" && ($odds_gdsf["h7"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="1:S:TIGER" && ($odds_gdsf["h8"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }
    }
}
if($gType == "GD11"){
    $odds1 = odds_sf::getOddsByBall("广东十一选五","正码和特别号","ball_1");
    $odds2 = odds_sf::getOddsByBall("广东十一选五","正码和特别号","ball_2");
    $odds3 = odds_sf::getOddsByBall("广东十一选五","正码和特别号","ball_3");
    $odds4 = odds_sf::getOddsByBall("广东十一选五","正码和特别号","ball_4");
    $odds5 = odds_sf::getOddsByBall("广东十一选五","正码和特别号","ball_5");

    $odds11 = odds_sf::getOddsByBall("广东十一选五","一中一","ball_1");
    $odds12 = odds_sf::getOddsByBall("广东十一选五","总和龙虎和","ball_1");
    $odds13 = odds_sf::getOddsByBall("广东十一选五","顺子杂六","ball_1");
    $odds14 = odds_sf::getOddsByBall("广东十一选五","顺子杂六","ball_2");
    $odds15 = odds_sf::getOddsByBall("广东十一选五","顺子杂六","ball_3");

    foreach($orders as $object){
        $number = $object["number"];
        $betInfo = explode(":",$object["number"]);
        $bet_rate = $object['odds'];

        if($betInfo[1]=="LOCATE"){//每球定位
            $selectBall = $betInfo[2];
            if($selectBall == "1"){
                $odds_gd11 = $odds1;
            }elseif($selectBall == "2"){
                $odds_gd11 = $odds2;
            }elseif($selectBall == "3"){
                $odds_gd11 = $odds3;
            }elseif($selectBall == "4"){
                $odds_gd11 = $odds4;
            }elseif($selectBall == "5"){
                $odds_gd11 = $odds5;
            }
            if($odds_gd11["h".$betInfo[0]] != $bet_rate){
                $isOddsValidate = "false";
            }
        }elseif($betInfo[1]=="MATCH"){
            if($odds11["h".$betInfo[0]] != $bet_rate){
                $isOddsValidate = "false";
            }
        }elseif($betInfo[0]=="TOTAL"){
            if(($betInfo[1]=="OVER") && ($odds12["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="UNDER") && ($odds12["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="ODD") && ($odds12["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="EVEN") && ($odds12["h4"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="DRAGON") && ($odds12["h5"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="TIGER") && ($odds12["h6"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="TIE") && ($odds12["h7"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }elseif($betInfo[0]=="BEFORE" || $betInfo[0]=="MIDDLE" || $betInfo[0]=="AFTER"){
            if(($number=="BEFORE:SHUNZI") && ($odds13["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="BEFORE:BANSHUN") && ($odds13["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="BEFORE:ZALIU") && ($odds13["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }
            elseif(($number=="MIDDLE:SHUNZI") && ($odds14["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="MIDDLE:BANSHUN") && ($odds14["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="MIDDLE:ZALIU") && ($odds14["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }
            elseif(($number=="AFTER:SHUNZI") && ($odds15["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="AFTER:BANSHUN") && ($odds15["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($number=="AFTER:ZALIU") && ($odds15["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }else{
            if($betInfo[0]=="1"){
                $odds_gd11 = $odds1;
            }elseif($betInfo[0] == "2"){
                $odds_gd11 = $odds2;
            }elseif($betInfo[0] == "3"){
                $odds_gd11 = $odds3;
            }elseif($betInfo[0] == "4"){
                $odds_gd11 = $odds4;
            }elseif($betInfo[0] == "5"){
                $odds_gd11 = $odds5;
            }
            if(($betInfo[1]=="OVER") && ($odds_gd11["h12"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="UNDER") && ($odds_gd11["h13"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="ODD") && ($odds_gd11["h14"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="EVEN") && ($odds_gd11["h15"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="SUM:ODD") && ($odds_gd11["h16"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="SUM:EVEN") && ($odds_gd11["h17"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="LAST:OVER") && ($odds_gd11["h18"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif((($betInfo[1].":".$betInfo[2])=="LAST:UNDER") && ($odds_gd11["h19"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }
    }
}
if($gType == "BJPK"){
    $odds1 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_1");
    $odds2 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_2");
    $odds3 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_3");
    $odds4 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_4");
    $odds5 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_5");
    $odds6 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_6");
    $odds7 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_7");
    $odds8 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_8");
    $odds9 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_9");
    $odds10 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_10");

    $odds21 = odds_sf::getOddsByBall("北京PK拾","定位","ball_1");
    $odds22 = odds_sf::getOddsByBall("北京PK拾","定位","ball_2");
    $odds23 = odds_sf::getOddsByBall("北京PK拾","定位","ball_3");
    $odds24 = odds_sf::getOddsByBall("北京PK拾","定位","ball_4");
    $odds25 = odds_sf::getOddsByBall("北京PK拾","定位","ball_5");
    $odds26 = odds_sf::getOddsByBall("北京PK拾","定位","ball_6");
    $odds27 = odds_sf::getOddsByBall("北京PK拾","定位","ball_7");
    $odds28 = odds_sf::getOddsByBall("北京PK拾","定位","ball_8");
    $odds29 = odds_sf::getOddsByBall("北京PK拾","定位","ball_9");
    $odds30 = odds_sf::getOddsByBall("北京PK拾","定位","ball_10");

    $odds61 = odds_sf::getOddsByBall("北京PK拾","冠亚军和","ball_1");
    $odds62 = odds_sf::getOddsByBall("北京PK拾","选号","ball_1");


    foreach($orders as $object){
        $number = $object["number"];
        $betInfo = explode(":",$object["number"]);
        $bet_rate = $object['odds'];

        if($betInfo[1]=="LOCATE"){//每球定位
            $selectBall = $betInfo[2];
            if($selectBall == "1"){
                $odds_bjpk = $odds21;
            }elseif($selectBall == "2"){
                $odds_bjpk = $odds22;
            }elseif($selectBall == "3"){
                $odds_bjpk = $odds23;
            }elseif($selectBall == "4"){
                $odds_bjpk = $odds24;
            }elseif($selectBall == "5"){
                $odds_bjpk = $odds25;
            }elseif($selectBall == "6"){
                $odds_bjpk = $odds26;
            }elseif($selectBall == "7"){
                $odds_bjpk = $odds27;
            }elseif($selectBall == "8"){
                $odds_bjpk = $odds28;
            }elseif($selectBall == "9"){
                $odds_bjpk = $odds29;
            }elseif($selectBall == "10"){
                $odds_bjpk = $odds30;
            }
            if($odds_bjpk["h".$betInfo[0]] != $bet_rate){
                $isOddsValidate = "false";
            }
        }elseif($rType=="GENERAL"){
            if($betInfo[0]=="1"){
                $odds_bjpk = $odds1;
            }elseif($betInfo[0] == "2"){
                $odds_bjpk = $odds2;
            }elseif($betInfo[0] == "3"){
                $odds_bjpk = $odds3;
            }elseif($betInfo[0] == "4"){
                $odds_bjpk = $odds4;
            }elseif($betInfo[0] == "5"){
                $odds_bjpk = $odds5;
            }elseif($betInfo[0] == "6"){
                $odds_bjpk = $odds6;
            }elseif($betInfo[0] == "7"){
                $odds_bjpk = $odds7;
            }elseif($betInfo[0] == "8"){
                $odds_bjpk = $odds8;
            }elseif($betInfo[0] == "9"){
                $odds_bjpk = $odds9;
            }elseif($betInfo[0] == "10"){
                $odds_bjpk = $odds10;
            }
            if(($betInfo[1]=="OVER") && ($odds_bjpk["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="UNDER") && ($odds_bjpk["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="ODD") && ($odds_bjpk["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[1]=="EVEN") && ($odds_bjpk["h4"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[2]=="DRAGON") && ($odds_bjpk["h5"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif(($betInfo[2]=="TIGER") && ($odds_bjpk["h6"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }elseif($rType=="SUM_FIRST_2"){
            $odds_bjpk = $odds61;
            if($number=="SUM:FIRST:2:IN:3:4:18:19" && ($odds_bjpk["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="SUM:FIRST:2:IN:9:10:12:13" && ($odds_bjpk["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="SUM:FIRST:2:IN:5:6:16:17" && ($odds_bjpk["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="SUM:FIRST:2:IN:11" && ($odds_bjpk["h4"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="SUM:FIRST:2:IN:7:8:14:15" && ($odds_bjpk["h5"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="SUM:FIRST:2:OVER" && ($odds_bjpk["h6"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="SUM:FIRST:2:UNDER" && ($odds_bjpk["h7"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="SUM:FIRST:2:ODD" && ($odds_bjpk["h8"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="SUM:FIRST:2:EVEN" && ($odds_bjpk["h9"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }
    }
}
if($gType == "BJKN" && $rType=="OTHER"){
    $odds1 = odds_sf::getOddsByBall("北京快乐8","其他","ball_1");

    foreach($orders as $object){
        $number = $object["number"];
        $betInfo = explode(":",$object["number"]);
        $bet_rate = $object['odds'];

        if($rType=="OTHER"){
            $odds_bjkn = $odds1;
            if($number=="ALL:SUM:ODD" && ($odds_bjkn["h1"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:EVEN" && ($odds_bjkn["h2"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:OVER" && ($odds_bjkn["h3"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:UNDER" && ($odds_bjkn["h4"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:810" && ($odds_bjkn["h5"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="TOP" && ($odds_bjkn["h6"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="MIDDLE" && ($odds_bjkn["h7"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="BOTTOM" && ($odds_bjkn["h8"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ODD" && ($odds_bjkn["h9"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="TIE" && ($odds_bjkn["h10"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="EVEN" && ($odds_bjkn["h11"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:METAL" && ($odds_bjkn["h12"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:WOOD" && ($odds_bjkn["h13"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:WATER" && ($odds_bjkn["h14"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:FIRE" && ($odds_bjkn["h15"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:EARTH" && ($odds_bjkn["h16"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:UNDER:ODD" && ($odds_bjkn["h17"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:UNDER:EVEN" && ($odds_bjkn["h18"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:OVER:ODD" && ($odds_bjkn["h19"] != $bet_rate)){
                $isOddsValidate = "false";
            }elseif($number=="ALL:SUM:OVER:EVEN" && ($odds_bjkn["h20"] != $bet_rate)){
                $isOddsValidate = "false";
            }
        }
    }
}

if($isOddsValidate == "false"){
    error2("赔率异常，请重新下注!");
}

$gTypeName = getZhPageTitle($gType);
$rTypeName = getZhSfRTypeName($gType,$rType);

if($passValidate){
    //会员余额
    $balance	=	0;//投注后
    $assets		=	0;//投注前
    $rs	= user_list::getUserMoney($userid);
    if($rs['money']){
        $assets	=	round($rs['money'],2);
        $balance=	$assets - $bet_money_total;
    }else{
        error2("账户异常,请联系客服!");
    }
    if($balance<0){ //投注后，用户余额不能小于0
        error1("账户余额不足!");
    }

    $titleName = $gTypeName;
    $firstLottery = lottery_schedule::getFirstLottery($titleName);
    $lastLottery = lottery_schedule::getLastLottery($titleName);
    if($firstLottery["kaipan_time"] >= date("H:i:s",time()) || date("H:i:s",time()) >= $lastLottery["kaijiang_time"]){
        $rs2 = $firstLottery;
        if(date("H:i:s",time()) >= $lastLottery["kaijiang_time"]){
            $isOutTimeLottery = "true";
        }
        if($firstLottery["kaipan_time"] >= date("H:i:s",time())){
            $isEarlyMorning = "true";
        }
        $isOutTime = "true";
    }elseif($firstLottery["kaipan_time"] < date("H:i:s",time()) && date("H:i:s",time()) < $firstLottery["kaijiang_time"]){
        $rs2 = $firstLottery;
        $isFirstLottery = "true";
    }else{
        $rs2 = lottery_schedule::getNewestLottery($titleName);
        $isNormalLottery = "true";
    }
    if($rs2){
        $isOutTimeLottery=="true" ? ($time = time() + 86400) : ($time = time());
        if($gType == "GXSF"){//这里获取广西十分彩期数
            $times=date("H:i:s",time());
            $lasttime=$Lottery_set['gxsf']['ktime']." ".$times;
            $thistime=date("Y-m-d H:i:s",time());
            $re_date=retimeDiffs($lasttime,$thistime);
            $lost_days=$re_date[ ' day ' ];//实际相差的天数要减去头尾两天

            if($isOutTimeLottery=="true"){
                $qishu = (substr($Lottery_set['gxsf']['knum'],0,7)+$lost_days+1).'01';//当期数是每天的第一期时，天数加一天，并且定位到第一期:01
            }else{
                $qishu = (substr($Lottery_set['gxsf']['knum'],0,7)+$lost_days).$rs2['qishu'];
            }
        }elseif($gType == "BJKN" || $gType == "BJPK"){
            if($gType == "BJKN"){
                $type = 'kl8';
            }elseif($gType == "BJPK"){
                $type = 'pk10';
            }
            $times=date("H:i:s",time());
            $lasttime=$Lottery_set[$type]['ktime']." ".$times;
            $thistime=date("Y-m-d H:i:s",time());
            $re_date=retimeDiffs($lasttime,$thistime);
            $lost_days=$re_date[ ' day ' ];//实际相差的天数要减去头尾两天
            if($isLateNight == "true"){
                $lost_days += 1;
            }
            $qishu=$lost_days*179+$Lottery_set[$type]['knum']+$rs2['qishu']-1;
        }else{
            $qishu		= date("Ymd",$time).$rs2['qishu'];
        }
        $kaipanTime	    = strtotime(date("Y-m-d",$time).' '.$rs2['kaipan_time']);
        $fengpanTime	= strtotime(date("Y-m-d",$time).' '.$rs2['fenpan_time']);
        $kaijiangTime	= strtotime(date("Y-m-d",$time).' '.$rs2['kaijiang_time']);
    }else{
        $qishu		= -1;
        $kaipanTime	    = -1;
        $fengpanTime	= -1;
        $kaijiangTime	= -1;
    }
    if(date("Y-m-d H:i:s",$fengpanTime) <= $bj_time_now && $bj_time_now <= date("Y-m-d H:i:s",$kaijiangTime)){
        error2("该投注已封盘,请稍后投注。");
    }
    if($qishu == -1){
        error2("期数出错,请联系客服!");
    }

    $bet_time = $bj_time_now;

    $max_money = common_class::getMaxMoney($userid);
    $max_money_already = common_class::getMaxMoneyAlready($userid,$gType,$qishu);

    if($max_money > 0 && ($max_money_already+$bet_money_total)>$max_money){
        echo '<script type="text/javascript">alert("超过当期下注最大金额，请联系管理人员。");</script>';
        exit;
    }

    if(lottery_sf::add_order($userid,$bet_money,$bet_money_total,$balance,$bet_win_total,$assets,
        $gTypeName,$gType,$rTypeName,$rType,$selectArray,
        $odds,$numArray,$orders,
        $qishu,$bet_time)){
//        $mysqli->close();
//        msgok($bet_info,"交易成功",$balance);
    }else{
        error2("交易失败");
    }
}else{
    $result = 'false';
}

echo '
{
    "result": '.$result.',
    "remain_balance":"'.$balance.'"
}';
$mysqli->close();
exit;


function validateCount($count, $min, $max){
    if($count<$min || $count>$max){
        return false;
    }else{
        return true;
    }
}

function validateGold($gold){
    $goldInt = intval($gold);
    if($goldInt>0){
        return true;
    }else{
        return false;
    }
}