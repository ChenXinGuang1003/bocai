<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include "../app/member/include/address.mem.php";
include "../app/member/include/config.inc.php";
include "../app/member/utils/convert_name.php";
include "../app/member/utils/time_util.php";

include "../app/member/class/odds_lottery_normal.php";
include "../app/member/class/lottery_schedule.php";
include "../app/member/class/user_group.php";
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/cache/ltConfig.php");

//取各种参数
$gType = $_POST["gtype"];
$rType = $_POST["MyRtype"];
$concedeArray = $_POST["concede"];
$aConcede = '';
$aConcede2 = '';

if($concedeArray){
    $aConcede = implode(',',$concedeArray);
    $aConcede2 = implode('*',$concedeArray);
}
$aConcede = getZhTitleName($gType,$rType).' '.$aConcede;

//各种判断
if(in_array($rType, array("GST","595","596","597"))){
    if(sizeof($concedeArray)<5 || sizeof($concedeArray)>10 ){
        exit;
    }
}elseif(in_array($rType, array("GSS","598","599","600"))){
    if(sizeof($concedeArray)<4 || sizeof($concedeArray)>8){
        exit;
    }
}elseif($rType=="WP"){
    $concede0 = $_POST["concede0"];
    $concede1 = $_POST["concede1"];
    $concede2 = $_POST["concede2"];

    $sizeWP = sizeof($concede0)+sizeof($concede1)+sizeof($concede2);
    if($sizeWP < 2){
        exit;
    }

    if(!$concede0){
        $aConcede = getZhOneWordPassName($concede1).' x '.getZhOneWordPassName($concede2);
        $aConcede2 = $concede1.'*'.$concede2;
    }elseif(!$concede1){
        $aConcede = getZhOneWordPassName($concede0).' x '.getZhOneWordPassName($concede2);
        $aConcede2 = $concede0.'*'.$concede2;
    }elseif(!$concede2){
        $aConcede = getZhOneWordPassName($concede0).' x '.getZhOneWordPassName($concede1);
        $aConcede2 = $concede0.'*'.$concede1;
    }else{
        $aConcede = getZhOneWordPassName($concede0).' x '.getZhOneWordPassName($concede1).' x '.getZhOneWordPassName($concede2);
        $aConcede2 = $concede0.'*'.$concede1.'*'.$concede2;
    }
}

if(in_array($gType,array("TJ","CQ","JX"))){
    include_once "b5/b5_util.php";
}elseif(in_array($gType,array("D3","P3","T3"))){
    include_once "b3/b3_util.php";
}

$odds = odds_lottery_normal::getOdds($lottery_name,$rTypeName);

if($rType=="WP"){
    if($sizeWP==2){
        $oddValue = $odds["h18"];
    }elseif($sizeWP==3){
        $oddValue = $odds["h19"];
    }
}else{
    if(in_array($rType, array("GST","595","596","597"))){
        $oddValue = $odds["h".(sizeof($concedeArray)-5)];
    }
    if(in_array($rType, array("GSS","598","599","600"))){
        $oddValue = $odds["h".(sizeof($concedeArray)-4)];
    }
}

$leftForm =  '\'<div class="inner">\'+
    \'<div class="msg-title"></div>\'+
    \'<div class="msg-text">\'+
        \'<form name="layoutform" action="/member/orderB3_act.php" method="post">\'+
            \'<div class="PlayType">期数 : '.$qishu.'</div>\'+
            \'<div id="bet-scroll">\'+
                \'<div class="ListOrder">\'+
                    \'<label for="'.$aConcede2.'" class="num">\'+
                        \'<span style="color:white;background-color:#333">'.$aConcede.'</span>@\'+
                        \'<span style="color:red;font-weight:bold">'.$oddValue.'</span>\'+
                    \'</label>\'+
                    \'<span class="Inp">                下注金额\'+
                        \'<input type="text" pattern="[0-9]*" min="0" class="FGSW" id="'.$aConcede2.'" tabindex="1"\'+
                               \'name="gold[]" value=""/>\'+
                        \'<input type="hidden" name="aConcede[]" value="'.$aConcede2.'"/>\'+
                        \'<input type="hidden" name="aOdds[]" value="'.$oddValue.'"/><br/><br/>\'+
                    \'</span>\'+
                \'</div>\'+
            \'</div>\'+
            \'<div class="Info">\'+
                \'<label>总下注金额: </label>\'+
                \'<span id="total_gold" style="background-color:#FCE4E0;">0</span>\'+
            \'</div>\'+
            \'<div class="Info" style="display:none;">\'+
                \'<label>可赢金额: </label>\'+
                \'<span id="pc" style="background-color:#FCE4E0;">0.00</span>\'+
            \'</div>\'+
            \'<div class="Info"><label>单注最低限额: </label> <span>'.$lowestMoney.'</span></div>\'+
            \'<div class="Info"><label>单注最高限额: </label> <span>'.$maxMoney.'</span></div>\'+
            \'<div class="Info" style="visibility:hidden;"><label>单注限额: </label> <span>9999999</span></div>\'+
            \'<div class="Info" style="visibility:hidden;"><label>单号限额: </label> <span>9999999</span></div>\'+
            \'<div class="cc"><input type="hidden" name="gid" value="349236"/>\'+
                \'<input type="hidden" name="MyRtype" value="'.$rType.'"/>\'+
                \'<input type="button" class="cancel_cen" name="btnCancel" value="取消"/> &nbsp;&nbsp;\'+
                \'<input type="button" class="submit_cen" name="btnSubmit" value="确定"/>\'+
            \'</div>\'+
            \'<input type="hidden" name="gtype" value="'.$gType.'"/>\'+
        \'</form>\'+
    \'</div>\'+
\'</div>\'+
\'<div class="footer"></div>\'';

if(in_array($gType, array("CQ","TJ","JX"))){
    $betB = "betB5";
}elseif(in_array($gType, array("D3","P3","T3"))){
    $betB = "betB3";
}
echo '
var Left = document.getElementById("message_box");
Left.innerHTML = '.$leftForm.';
Left.style.display = "";
var b = self.betSpace.'.$betB.'.instance("'.$gType.'");
b.init("'.$lowestMoney.'", "'.$maxMoney.'", "9999999", "9999999", "'.$_SESSION["user_money"].'");
';
exit;