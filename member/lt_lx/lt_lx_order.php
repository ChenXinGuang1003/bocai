<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include_once "../../app/member/utils/login_check.php";
include_once "../../app/member/utils/error_handle.php";
include_once "../../app/member/utils/convert_name.php";
include_once "../../app/member/utils/time_util.php";

include_once "../../app/member/class/six_lottery_odds.php";
include_once "../../app/member/class/six_lottery_order.php";
include_once "../../app/member/class/six_lottery_schedule.php";
include_once "../../app/member/class/user_group.php";
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/cache/ltConfig.php");

include_once "../../member/lt/lt_util.php";


$rType = $_POST["rtype"];
$lxArray = $_POST["lx"];
$lfArray = $_POST["lf"];


if(in_array($rType,array("LX2","LX3","LX4","LX5"))){
    $is_lx = "true";
}elseif(in_array($rType,array("LF2","LF3","LF4","LF5"))){
    $is_lf = "true";
}

if($is_lx == "true"){
    $lx_name = "连肖";
    $gid = "LX";
    if($rType=="LX2"){
        $odds_LX = six_lottery_odds::getOdds("LX2");
        $lx_sub_name = "二肖连";
        $minChk = 2;
    }elseif($rType=="LX3"){
        $odds_LX = six_lottery_odds::getOdds("LX3");
        $lx_sub_name = "三肖连";
        $minChk = 3;
    }elseif($rType=="LX4"){
        $odds_LX = six_lottery_odds::getOdds("LX4");
        $lx_sub_name = "四肖连";
        $minChk = 4;
    }elseif($rType=="LX5"){
        $odds_LX = six_lottery_odds::getOdds("LX5");
        $lx_sub_name = "五肖连";
        $minChk = 5;
    }

    $selectArray = $lxArray;

}elseif($is_lf == "true"){
    $lx_name = "连尾";
    $gid = "LF";
    if($rType=="LF2"){
        $odds_LF = six_lottery_odds::getOdds("LF2");
        $lx_sub_name = "二尾碰";
        $minChk = 2;
    }elseif($rType=="LF3"){
        $odds_LF = six_lottery_odds::getOdds("LF3");
        $lx_sub_name = "三尾碰";
        $minChk = 3;
    }elseif($rType=="LF4"){
        $odds_LF = six_lottery_odds::getOdds("LF4");
        $lx_sub_name = "四尾碰";
        $minChk = 4;
    }elseif($rType=="LF5"){
        $odds_LF = six_lottery_odds::getOdds("LF5");
        $lx_sub_name = "五尾碰";
        $minChk = 5;
    }

    $selectArray = $lfArray;
}

$oddsValueArray = array();
$tmpArray = array();
$oddsIndexArray = array();
$tmpArrayCount = 1;
for ($j = 0; $j < count($selectArray); $j++) {
    $tmpArray[$tmpArrayCount] = $selectArray[$j]."";
    $tmpArrayCount += 1;
}
$animalArray = array();
$animalArray["A1"] = "鼠";
$animalArray["A2"] = "牛";
$animalArray["A3"] = "虎";
$animalArray["A4"] = "兔";
$animalArray["A5"] = "龙";
$animalArray["A6"] = "蛇";
$animalArray["A7"] = "马";
$animalArray["A8"] = "羊";
$animalArray["A9"] = "猴";
$animalArray["AA"] = "鸡";
$animalArray["AB"] = "狗";
$animalArray["AC"] = "猪";

$tmp2Array = array();
for($i=1;$i<=$minChk;$i++){
    if($is_lx == "true"){
        $lx_current_odds = $odds_LX["h".getLxOddsCount($tmpArray[$i])];
        if($i==1){
            $oddsValue = $lx_current_odds;
            $oddsIndex = getLxOddsCount($tmpArray[$i]);
        }else{
            if($lx_current_odds< $oddsValue){
                $oddsValue = $lx_current_odds;
                $oddsIndex = getLxOddsCount($tmpArray[$i]);
            }
        }
        $tmp2Array[] = $animalArray[$tmpArray[$i]];
    }else{
        $lf_current_odds = $odds_LF["h".($tmpArray[$i]+1)];
        if($i==1){
            $oddsValue = $lf_current_odds;
            $oddsIndex = $tmpArray[$i]+1;
        }else{
            if($lf_current_odds> $oddsValue){
                $oddsValue = $lf_current_odds;
                $oddsIndex = $tmpArray[$i]+1;
            }
        }
        $tmp2Array[] = $tmpArray[$i];
    }
}

$totalArray = array();
$totalArray[] = implode(",", $tmp2Array);
$oddsValueArray[] = $oddsValue;
$oddsIndexArray[] = $oddsIndex;

if(count($selectArray) > $minChk){
    $totalSelectArray = compile_array(count($selectArray), $minChk);

    //获取剩下组合
    for($j=0;$j<count($totalSelectArray);$j++){
        $subArray = array();
        for($k=0;$k<$minChk;$k++){
            if($is_lx == "true"){
                $lx_current_odds = $odds_LX["h".getLxOddsCount($tmpArray[$totalSelectArray[$j][$k]])];
                if(is_null($oddsValue2)){
                    $oddsValue2 = $lx_current_odds;
                    $oddsIndex2 = getLxOddsCount($tmpArray[$totalSelectArray[$j][$k]]);
                }else{
                    if($lx_current_odds< $oddsValue2){
                        $oddsValue2 = $lx_current_odds;
                        $oddsIndex2 = getLxOddsCount($tmpArray[$totalSelectArray[$j][$k]]);
                    }
                }
                $subArray[] = $animalArray[$tmpArray[$totalSelectArray[$j][$k]]];
            }else{
                $lf_current_odds = $odds_LF["h".($tmpArray[$totalSelectArray[$j][$k]]+1)];
                if(is_null($oddsValue2)){
                    $oddsValue2 = $lf_current_odds;
                    $oddsIndex2 = $tmpArray[$totalSelectArray[$j][$k]]+1;
                }else{
                    if($lf_current_odds> $oddsValue2){
                        $oddsValue2 = $lf_current_odds;
                        $oddsIndex2 = $tmpArray[$totalSelectArray[$j][$k]]+1;
                    }
                }
                $subArray[] = $tmpArray[$totalSelectArray[$j][$k]];
            }
        }
        $totalArray[] = implode(",",$subArray);
        $oddsValueArray[] = $oddsValue2;
        $oddsIndexArray[] = $oddsIndex2;
        $oddsValue2 = null;  //清空$oddsValue2
        $oddsIndex2 = null;
    }
}
foreach($totalArray as $key => $value){
    $subPage .= '
    \'<div style=\"text-align:left;width:90%;\">\n\'+
    \'    <span style=\"color:white;background-color:#333;padding:0px 3px 0px 3px;\">'.$lx_sub_name.'</span> @\'+
    \'    <span style=\"color:#FF0000\" class=\"un-text-yew\"><b>'.$oddsValueArray[$key].' </b></span> \n\'+
    \'    <span><b>'.$value.'</b></span>\n\'+
    \'</div>\n\'+
    ';

    $postInfo .= '
    \'<input type=\"hidden\" name=\"totalArray[]\" value=\"'.$value.'\" />\n\'+
    \'<input type=\"hidden\" name=\"oddsIndexArray[]\" value=\"'.$oddsIndexArray[$key].'\" />\n\'+
    ';

    $oddsPust .= 'o.push('.$oddsValueArray[$key].');';
}

$page = '\'\'+
\'<div class=\"inner\">\n\'+
\'<div class=\"msg-title\">六合彩 '.$lx_name.' 下注单</div>\n\'+
\'<div class=\"msg-text\">\n\'+
\'<form name=\"LAYOUTFORM\" action=\"/member/Grp/grpOrder.php\" method=\"post\" onsubmit=\"return false\">\n\'+
\'<div class=\"PlayType\">\n            期数 : '.$qishu.' <br />\n \n          </div>\n\'+

'.$subPage.'

\'<label for=\"gold\">下注金额:</label>\n\'+
\'<input type=\"text\" pattern=\"[0-9]*\" min=\"0\" id=\"gold\" name=\"gold\" class=\"OrderGold\" onkeypress=\"return CheckKey(event)\" onkeyup=\"return CountWinGold()\"  /><br />\n\'+
\'<div style=\"display: none;\">\n          可赢金额:\n\'+
\'<span style=\"color:#FF0000\" class=\"un-text-yew\" id=\"pc\">0.00</span><br />\n          </div>\n\'+
\'最低限额: '.$lowestMoney.'<br />\n         \'+
\'最高限额: '.$maxMoney.'<br />\n          <br />\n          \n\'+
\'<div style=\"padding-left: 20px\">\n\'+
\'<input type=\"button\" name=\"btnCancel\" value=\"取消\" class=\"cancel_cen\" />\n            &nbsp;&nbsp;\n\'+
\'<input type=\"button\" name=\"btnSubmit\" value=\"确定\" class=\"submit_cen\" />\n          </div>\n\'+
\'<input type=\"hidden\" name=\"rs_r\" value=\"\" />\n\'+
\'<input type=\"hidden\" name=\"gid\" value=\"'.$gid.'\" />\n\'+
\'<input type=\"hidden\" name=\"total_count\" value=\"'.count($totalArray).'\" />\n\'+
\'<input type=\"hidden\" name=\"lx_name\" value=\"'.$lx_sub_name.'\" />\n\'+

'.$postInfo.'

\'</form>\n      </div>\n    </div>\n    <div class=\"footer\"></div>\n\'';

if($_GET['cl']='wap'){

	echo '
document.getElementById("bet-credit").innerHTML = "'.$userMoney.'";
var Left = document.getElementById("message_box");
Left.innerHTML = '.$page.';
Left.style.display = "";

var betO = betSpace.bet.instance();
betO.clientType="wap";

//派彩有1000000限制
betO.millionLimit = true;
var o = [];
'.$oddsPust.'

betO.initLx("'.$lowestMoney.'", "'.$maxMoney.'", "9999999", "9999999", "'.$userMoney.'", "", o);
';

}else{
echo '
document.getElementById("bet-credit").innerHTML = "'.$userMoney.'";
var Left = document.getElementById("message_box");
Left.innerHTML = '.$page.';
Left.style.display = "";
var betO = betSpace.bet.instance();
//派彩有1000000限制
betO.millionLimit = true;
var o = [];
'.$oddsPust.'
betO.initLx("'.$lowestMoney.'", "'.$maxMoney.'", "9999999", "9999999", "'.$userMoney.'", "", o);
';
}


function getLxOddsCount($lx_name){
    $count = "";
    if($lx_name=="A1"){
        $count = "1";
    }elseif($lx_name=="A2"){
        $count = "2";
    }elseif($lx_name=="A3"){
        $count = "3";
    }elseif($lx_name=="A4"){
        $count = "4";
    }elseif($lx_name=="A5"){
        $count = "5";
    }elseif($lx_name=="A6"){
        $count = "6";
    }elseif($lx_name=="A7"){
        $count = "7";
    }elseif($lx_name=="A8"){
        $count = "8";
    }elseif($lx_name=="A9"){
        $count = "9";
    }elseif($lx_name=="AA"){
        $count = "10";
    }elseif($lx_name=="AB"){
        $count = "11";
    }elseif($lx_name=="AC"){
        $count = "12";
    }
    return $count;
}