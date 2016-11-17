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
$numArray = $_POST["num"];

$odds_NI = six_lottery_odds::getOdds("NI");

if($rType=="NI5"){
    $ni_name = "五不中";
    $minChk = 5;
    $oddsValue = $odds_NI["h1"];
}elseif($rType=="NI6"){
    $ni_name = "六不中";
    $minChk = 6;
    $oddsValue = $odds_NI["h2"];
}elseif($rType=="NI7"){
    $ni_name = "七不中";
    $minChk = 7;
    $oddsValue = $odds_NI["h3"];
}elseif($rType=="NI8"){
    $ni_name = "八不中";
    $minChk = 8;
    $oddsValue = $odds_NI["h4"];
}elseif($rType=="NI9"){
    $ni_name = "九不中";
    $minChk = 9;
    $oddsValue = $odds_NI["h5"];
}elseif($rType=="NIA"){
    $ni_name = "十不中";
    $minChk = 10;
    $oddsValue = $odds_NI["h6"];
}elseif($rType=="NIB"){
    $ni_name = "十一不中";
    $minChk = 11;
    $oddsValue = $odds_NI["h7"];
}elseif($rType=="NIC"){
    $ni_name = "十二不中";
    $minChk = 12;
    $oddsValue = $odds_NI["h8"];
}

$tmp2Array = array();
for($i=0;$i<$minChk;$i++){
    $tmp2Array[] = $numArray[$i];
}
$totalArray = array();
$totalArray[] = implode(", ", $tmp2Array);

if(count($numArray) > $minChk){
    $totalSelectArray = compile_array(count($numArray), $minChk);

    //获取剩下组合
    for($j=0;$j<count($totalSelectArray);$j++){
        $subArray = array();
        for($k=0;$k<$minChk;$k++){
            $subArray[] = $numArray[$totalSelectArray[$j][$k]-1];
        }
        $totalArray[] = implode(", ",$subArray);
    }
}

foreach($totalArray as $key => $value){
    $postInfo .= '
    \'<input type=\"hidden\" name=\"totalArray[]\" value=\"'.$value.'\" />\n\'+
    ';
}
foreach($numArray as $key => $value){
    if($key==5 && count($numArray)>6){
        $betInfo .= $value.',<br />';
    }else{
        $betInfo .= $value.',';
    }
}
$betInfo = substr($betInfo,0,-1);

$page = '\'\'+
\'<div class=\"inner\">\n\'+
\'<div class=\"msg-title\">六合彩 自选不中 下注单</div>\n\'+
\'<div class=\"msg-text\">\n\'+
\'<form name=\"LAYOUTFORM\" action=\"/member/Grp/grpOrder.php\" method=\"post\" onsubmit=\"return false\">\n\'+
\'<div class=\"PlayType\">\n\'+
\'<span style=\"color:#990000\">期数 : '.$qishu.'</span> &nbsp;\n\'+
\'<span style=\"color:white;background-color:#333;padding:0px 3px 0px 3px;\">'.$ni_name.'</span> @\'+
\'<span style=\"color:#FF0000\" class=\"un-text-yew\"><b>'.$oddsValue.' </b></span> <br />\n\'+
\''.$betInfo.'<br />组合共 <font id=\"TotalBall\" color=\"red\">'.count($totalArray).'</font> 组\n          </div>\n\'+
\'下注金额:\n\'+
\'<input type=\"text\" pattern=\"[0-9]*\" min=\"0\" id=\"gold\" name=\"gold\"  class=\"OrderGold\"  /><br />\n\'+
\'<div style=\"display: none;\">\n\'+
\'可赢金额:\n          <b id=\"pc\">0.00</b><br />\n          </div>\n\'+
\'最低限额: '.$lowestMoney.'<br />\n          \'+
\'最高限额: '.$maxMoney.'<br />\n          <br />\n          \n\'+
\'<div style=\"padding-left: 20px\">\n\'+
\'<input type=\"button\" name=\"btnCancel\" value=\"取消\" class=\"cancel_cen\" />\n            &nbsp;&nbsp;\n\'+
\'<input type=\"button\" name=\"btnSubmit\" value=\"确定\" class=\"submit_cen\" />\n          </div>\n\'+
\'<input type=\"hidden\" name=\"gid\" value=\"NI\" onkeypress=\"return false;\"  />\n\'+
\'<input type=\"hidden\" name=\"total_count\" value=\"'.count($totalArray).'\" />\n\'+
\'<input type=\"hidden\" name=\"ni_name\" value=\"'.$ni_name.'\" />\n\'+

'.$postInfo.'

\'</form>\n      </div>\n    </div>\n    <div class=\"footer\"></div>\n\'';

if($_GET['cl']='wap'){

	echo '

var Left = document.getElementById("message_box");
Left.innerHTML = '.$page.';
Left.style.display = "";

var betO = betSpace.bet.instance();
betO.clientType="wap";

betO.millionLimit = true;
betO.init("'.$lowestMoney.'", "'.$maxMoney.'", "9999999", "9999999", "'.$userMoney.'", "");
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
betO.init("'.$lowestMoney.'", "'.$maxMoney.'", "9999999", "9999999", "'.$userMoney.'", "");
';
}