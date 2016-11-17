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

$game1 = $_POST["game1"];
$game2 = $_POST["game2"];
$game3 = $_POST["game3"];
$game4 = $_POST["game4"];
$game5 = $_POST["game5"];
$game6 = $_POST["game6"];

$selectCount = ($game1 ? 1:0)+($game2 ? 1:0)+($game3 ? 1:0)+($game4 ? 1:0)+($game5 ? 1:0)+($game6 ? 1:0);

$odds_NAP1 = six_lottery_odds::getOdds("NAP1");
$odds_NAP2 = six_lottery_odds::getOdds("NAP2");
$odds_NAP3 = six_lottery_odds::getOdds("NAP3");
$odds_NAP4 = six_lottery_odds::getOdds("NAP4");
$odds_NAP5 = six_lottery_odds::getOdds("NAP5");
$odds_NAP6 = six_lottery_odds::getOdds("NAP6");

$game1Info = getNapInfo($game1);
$game2Info = getNapInfo($game2);
$game3Info = getNapInfo($game3);
$game4Info = getNapInfo($game4);
$game5Info = getNapInfo($game5);
$game6Info = getNapInfo($game6);

$subPage1 = '
    \'<div>\n\'+
        \'<span style=\"color:white;background-color:#333;padding:0px 3px 0px 3px;\">正码一 '.$game1Info[0].'</span> @\'+
        \'<span style=\"color:#FF0000\"><b>'.$odds_NAP1["h".$game1Info[1]].' </b></span> \n\'+
        \'<input type=\"hidden\" name=\"game1\" value=\"'.$game1.'\" />\n\'+
        \'<input type=\"hidden\" name=\"ioratio1\" value=\"Array\" />\n\'+
        \'<input type=\"button\" class=\"cancel_cen\" name=\"1\" value=\"删除\" />\n\'+
    \'</div>\n             \n\'+
    ';
$subPage2 = '
    \'<div>\n\'+
        \'<span style=\"color:white;background-color:#333;padding:0px 3px 0px 3px;\">正码二 '.$game2Info[0].'</span> @\'+
        \'<span style=\"color:#FF0000\"><b>'.$odds_NAP2["h".$game2Info[1]].' </b></span> \n\'+
        \'<input type=\"hidden\" name=\"game2\" value=\"'.$game2.'\" />\n\'+
        \'<input type=\"hidden\" name=\"ioratio2\" value=\"Array\" />\n\'+
        \'<input type=\"button\" class=\"cancel_cen\" name=\"2\" value=\"删除\" />\n\'+
    \'</div>\n             \n\'+
    ';
$subPage3 = '
    \'<div>\n\'+
        \'<span style=\"color:white;background-color:#333;padding:0px 3px 0px 3px;\">正码三 '.$game3Info[0].'</span> @\'+
        \'<span style=\"color:#FF0000\"><b>'.$odds_NAP3["h".$game3Info[1]].' </b></span> \n\'+
        \'<input type=\"hidden\" name=\"game3\" value=\"'.$game3.'\" />\n\'+
        \'<input type=\"hidden\" name=\"ioratio3\" value=\"Array\" />\n\'+
        \'<input type=\"button\" class=\"cancel_cen\" name=\"3\" value=\"删除\" />\n\'+
    \'</div>\n             \n\'+
    ';
$subPage4 = '
    \'<div>\n\'+
        \'<span style=\"color:white;background-color:#333;padding:0px 3px 0px 3px;\">正码四 '.$game4Info[0].'</span> @\'+
        \'<span style=\"color:#FF0000\"><b>'.$odds_NAP4["h".$game4Info[1]].' </b></span> \n\'+
        \'<input type=\"hidden\" name=\"game4\" value=\"'.$game4.'\" />\n\'+
        \'<input type=\"hidden\" name=\"ioratio4\" value=\"Array\" />\n\'+
        \'<input type=\"button\" class=\"cancel_cen\" name=\"4\" value=\"删除\" />\n\'+
    \'</div>\n             \n\'+
    ';
$subPage5 = '
    \'<div>\n\'+
        \'<span style=\"color:white;background-color:#333;padding:0px 3px 0px 3px;\">正码五 '.$game5Info[0].'</span> @\'+
        \'<span style=\"color:#FF0000\"><b>'.$odds_NAP5["h".$game5Info[1]].' </b></span> \n\'+
        \'<input type=\"hidden\" name=\"game5\" value=\"'.$game5.'\" />\n\'+
        \'<input type=\"hidden\" name=\"ioratio5\" value=\"Array\" />\n\'+
        \'<input type=\"button\" class=\"cancel_cen\" name=\"5\" value=\"删除\" />\n\'+
    \'</div>\n             \n\'+
    ';
$subPage6 = '
    \'<div>\n\'+
        \'<span style=\"color:white;background-color:#333;padding:0px 3px 0px 3px;\">正码六 '.$game6Info[0].'</span> @\'+
        \'<span style=\"color:#FF0000\"><b>'.$odds_NAP6["h".$game6Info[1]].' </b></span> \n\'+
        \'<input type=\"hidden\" name=\"game6\" value=\"'.$game6.'\" />\n\'+
        \'<input type=\"hidden\" name=\"ioratio6\" value=\"Array\" />\n\'+
        \'<input type=\"button\" class=\"cancel_cen\" name=\"6\" value=\"删除\" />\n\'+
    \'</div>\n             \n\'+
    ';

$pageInfo1 = '
    \'<input type=\"hidden\" name=\"game1\" value=\"正码一 '.$game1Info[0].'\" />\n\'+
    \'<input type=\"hidden\" name=\"radio1\" value=\"'.$odds_NAP1["h".$game1Info[1]].'\">\n\'+
    \'<input type=\"hidden\" name=\"oddindex1\" value=\"'.$game1Info[1].'\">\n\'+
    ';
$pageInfo2 = '
    \'<input type=\"hidden\" name=\"game2\" value=\"正码二 '.$game2Info[0].'\" />\n\'+
    \'<input type=\"hidden\" name=\"radio2\" value=\"'.$odds_NAP2["h".$game2Info[1]].'\">\n\'+
    \'<input type=\"hidden\" name=\"oddindex2\" value=\"'.$game2Info[1].'\">\n\'+
    ';
$pageInfo3 = '
    \'<input type=\"hidden\" name=\"game3\" value=\"正码三 '.$game3Info[0].'\" />\n\'+
    \'<input type=\"hidden\" name=\"radio3\" value=\"'.$odds_NAP3["h".$game3Info[1]].'\">\n\'+
    \'<input type=\"hidden\" name=\"oddindex3\" value=\"'.$game3Info[1].'\">\n\'+
    ';
$pageInfo4 = '
    \'<input type=\"hidden\" name=\"game4\" value=\"正码四 '.$game4Info[0].'\" />\n\'+
    \'<input type=\"hidden\" name=\"radio4\" value=\"'.$odds_NAP4["h".$game4Info[1]].'\">\n\'+
    \'<input type=\"hidden\" name=\"oddindex4\" value=\"'.$game4Info[1].'\">\n\'+
    ';
$pageInfo5 = '
    \'<input type=\"hidden\" name=\"game5\" value=\"正码五 '.$game5Info[0].'\" />\n\'+
    \'<input type=\"hidden\" name=\"radio5\" value=\"'.$odds_NAP5["h".$game5Info[1]].'\">\n\'+
    \'<input type=\"hidden\" name=\"oddindex5\" value=\"'.$game5Info[1].'\">\n\'+
    ';
$pageInfo6 = '
    \'<input type=\"hidden\" name=\"game6\" value=\"正码六 '.$game6Info[0].'\" />\n\'+
    \'<input type=\"hidden\" name=\"radio6\" value=\"'.$odds_NAP6["h".$game6Info[1]].'\">\n\'+
    \'<input type=\"hidden\" name=\"oddindex6\" value=\"'.$game6Info[1].'\">\n\'+
    ';


$page = '\'\'+
    \'<div class=\"inner\">\n\'+
    \'<div class=\"msg-title\">六合彩 正码过关 下注单</div>\n\'+
    \'<div class=\"msg-text\">\n\'+
    \'<form name=\"MyForm\" action=\"/member/lt_nap/lt_nap_order.php\" method=\"get\" onsubmit=\"return false;\">\n\'+
    \'<input type=\"hidden\" name=\"gid\" value=\"NAP\" />\n\'+
    \'<div class=\"PlayType\">\n            期数 : '.$qishu.'\'+
    \'<br />  \n          </div>               \n\'+
    \'<div style=\"text-align:center;width:90%;\">  \n  \n\'+

    '.($game1 ? $subPage1:'\'\'+').'
    '.($game2 ? $subPage2:'\'\'+').'
    '.($game3 ? $subPage3:'\'\'+').'
    '.($game4 ? $subPage4:'\'\'+').'
    '.($game5 ? $subPage5:'\'\'+').'
    '.($game6 ? $subPage6:'\'\'+').'

    \'<br />\n            \n\'+
    \'</div>\n          模式 :\n\'+
    \'<select name=\"wkind\">\n<option value=\"S\" selected=\"selected\">单注</option>\n </select>\n\'+
    \'<select name=\"wstar\"><option value=\"'.$selectCount.'\">'.$selectCount.'串1</option></select>\n\'+
    \'<select name=\"wteam\" style=\"display:none\">\n   </select>\n\'+
    \'<input type=\"hidden\" name=\"teamcount\" value=\"'.$selectCount.'\" />\n\'+
    \'</form>\n\'+
    \'\'+
    \'<form name=\"LAYOUTFORM\" action=\"/member/Grp/grpOrder.php\" method=\"post\" onsubmit=\"return false\">\n\'+
    \'<label for=\"gold\">下注金额:</label>\n\'+
    \'<input type=\"text\" pattern=\"[0-9]*\" min=\"0\" id=\"gold\" name=\"gold\" class=\"OrderGold\"  /><br />\n\'+
    \'<div style=\"display: none;\">\n可赢金额:\n<span style=\"colo:#FF0000\" id=\"pc\">0.00</span>\'+
    \'<br />\n          </div>\n          最低限额: '.$lowestMoney.'<br />\n         \'+
    \'                    最高限额: '.$maxMoney.'<br />\n          <br />\n          \n\'+
    \'<div style=\"padding-left: 20px\">\n\'+
    \'<input type=\"button\" class=\"cancel_cen\" name=\"btnCancel\" value=\"取消\" />\n            &nbsp;&nbsp;\n\'+
    \'<input type=\"button\" class=\"submit_cen\" name=\"btnSubmit\" value=\"确定\" />\n\'+
    \'<input type=\"hidden\" name=\"teamcount\" value=\"'.$selectCount.'\" />\n\'+
    \'<input type=\"hidden\" name=\"ratio_now\" value=\"1.00000000\" id=\"ratio_now\" />\n\'+
    \'<input type=\"hidden\" name=\"line_type\" value=\"\" />\n\'+
    \'<input TYPE=\"hidden\" name=\"gid\" value=\"NAP\" />\n\'+
    \'<input TYPE=\"hidden\" name=\"type\" value=\"4\" />\n\'+
    \'<input TYPE=\"hidden\" name=\"gnum\" value=\"'.$qishu.'\" />\n\'+

    '.($game1 ? $pageInfo1:'\'\'+').'
    '.($game2 ? $pageInfo2:'\'\'+').'
    '.($game3 ? $pageInfo3:'\'\'+').'
    '.($game4 ? $pageInfo4:'\'\'+').'
    '.($game5 ? $pageInfo5:'\'\'+').'
    '.($game6 ? $pageInfo6:'\'\'+').'

    \'</div>\n\'+
    \'</form>\n\'+
    \'</div>\n\'+
    \'</div>\n\'+
    \'<div class=\"footer\"></div>\n\'';

echo '
document.getElementById("bet-credit").innerHTML = "'.$userMoney.'";
var Left = document.getElementById("message_box");
Left.innerHTML = '.$page.';
Left.style.display = "";
var betO = betSpace.bet.instance();
betO.initNap("'.$lowestMoney.'", "'.$maxMoney.'", "9999999", "9999999", "'.$userMoney.'", "");
';