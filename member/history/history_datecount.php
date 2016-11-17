<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include_once "../../app/member/utils/login_check.php";

include "../../app/member/class/six_lottery_order.php";
include "../../app/member/class/lottery_order.php";

$date_select = $_GET["gamedate"];


$lhc_result = six_lottery_order::getOneDayOrder($_SESSION["userid"],$date_select);
$lhc_win = six_lottery_order::getOneDayTotalWin($_SESSION["userid"],$date_select);

$d3_result = lottery_order::getOneDayTotalCountByType($_SESSION["userid"],$date_select,"D3");
$p3_result = lottery_order::getOneDayTotalCountByType($_SESSION["userid"],$date_select,"P3");
$t3_result = lottery_order::getOneDayTotalCountByType($_SESSION["userid"],$date_select,"T3");
$cq_result = lottery_order::getOneDayTotalCountByType($_SESSION["userid"],$date_select,"CQ");
$tj_result = lottery_order::getOneDayTotalCountByType($_SESSION["userid"],$date_select,"TJ");
$jx_result = lottery_order::getOneDayTotalCountByType($_SESSION["userid"],$date_select,"JX");
$gxsf_result = lottery_order::getOneDayTotalCountByType($_SESSION["userid"],$date_select,"GXSF");
$gdsf_result = lottery_order::getOneDayTotalCountByType($_SESSION["userid"],$date_select,"GDSF");
$tjsf_result = lottery_order::getOneDayTotalCountByType($_SESSION["userid"],$date_select,"TJSF");
$gd11_result = lottery_order::getOneDayTotalCountByType($_SESSION["userid"],$date_select,"GD11");
$bjpk_result = lottery_order::getOneDayTotalCountByType($_SESSION["userid"],$date_select,"BJPK");
$bjkn_result = lottery_order::getOneDayTotalCountByType($_SESSION["userid"],$date_select,"BJKN");

$d3_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],$date_select,"D3");
$p3_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],$date_select,"P3");
$t3_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],$date_select,"T3");
$cq_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],$date_select,"CQ");
$tj_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],$date_select,"TJ");
$jx_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],$date_select,"JX");
$gxsf_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],$date_select,"GXSF");
$gdsf_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],$date_select,"GDSF");
$tjsf_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],$date_select,"TJSF");
$gd11_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],$date_select,"GD11");
$bjpk_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],$date_select,"BJPK");
$bjkn_win = lottery_order::getOneDayTotalWinByType($_SESSION["userid"],$date_select,"BJKN");

$total_bet_money = $lhc_result["bet_money"] + $d3_result["bet_money"] + $p3_result["bet_money"]
    + $t3_result["bet_money"] + $cq_result["bet_money"]+ $tj_result["bet_money"]
    + $jx_result["bet_money"]+ $gxsf_result["bet_money"] + $gdsf_result["bet_money"]
    + $tjsf_result["bet_money"] + $gd11_result["bet_money"]+ $bjpk_result["bet_money"]
    + $bjkn_result["bet_money"];
$total_win_money = $lhc_win + $d3_win + $p3_win
    + $t3_win + $cq_win+ $tj_win
    + $jx_win+ $gxsf_win + $gdsf_win
    + $tjsf_win + $gd11_win+ $bjpk_win
    + $bjkn_win;

echo '
<div id="historyData">
    <div class="round-table">
        <table class="ListTr">
            <tbody>
            <tr class="title_tr">
                <td style="width:20%">游戏名称</td>
                <td style="width:20%">下注金额</td>
                <td style="width:20%">结果</td>
                <!--td>余额</td-->
            </tr>
            <tr style="text-align:right;">
                <td><a class="slide-sub" title="六合彩"
                       href="/member/history/history_date_view_lhc.php?gtype=LT&amp;gamedate='.$date_select.'">六合彩</a>
                </td>
                <td>'.$lhc_result["bet_money"].'</td>
                <td>'.$lhc_win.'</td>
            </tr>
            <tr style="text-align:right;">
                <td><a class="slide-sub" title="3D彩"
                       href="/member/history/history_date_view.php?gtype=D3&amp;gamedate='.$date_select.'">3D彩</a>
                </td>
                <td>'.$d3_result["bet_money"].'</td>
                <td>'.$d3_win.'</td>
            </tr>
            <tr style="text-align:right;">
                <td><a class="slide-sub" title="排列三"
                       href="/member/history/history_date_view.php?gtype=P3&amp;gamedate='.$date_select.'">排列三</a>
                </td>
                <td>'.$p3_result["bet_money"].'</td>
                <td>'.$p3_win.'</td>
            </tr>
            <tr style="text-align:right;display:none;">
                <td><a class="slide-sub" title="上海时时乐"
                       href="/member/history/history_date_view.php?gtype=T3&amp;gamedate='.$date_select.'">上海时时乐</a>
                </td>
                <td>'.$t3_result["bet_money"].'</td>
                <td>'.$t3_win.'</td>
            </tr>
            <tr style="text-align:right;">
                <td><a class="slide-sub" title="重庆时时彩"
                       href="/member/history/history_date_view.php?gtype=CQ&amp;gamedate='.$date_select.'">重庆时时彩</a>
                </td>
                <td>'.$cq_result["bet_money"].'</td>
                <td>'.$cq_win.'</td>
            </tr>
            <tr style="text-align:right;display:none;">
                <td><a class="slide-sub" title="江西时时彩"
                       href="/member/history/history_date_view.php?gtype=JX&amp;gamedate='.$date_select.'">江西时时彩</a>
                </td>
                <td>'.$jx_result["bet_money"].'</td>
                <td>'.$jx_win.'</td>
            </tr>
            <tr style="text-align:right;display:none;">
                <td><a class="slide-sub" title="天津时时彩"
                       href="/member/history/history_date_view.php?gtype=TJ&amp;gamedate='.$date_select.'">天津时时彩</a>
                </td>
                <td>'.$tj_result["bet_money"].'</td>
                <td>'.$tj_win.'</td>
            </tr>
            <tr style="text-align:right;display:none;">
                <td><a class="slide-sub" title="广西十分彩"
                       href="/member/history/history_date_view.php?gtype=GXSF&amp;gamedate='.$date_select.'">广西十分彩</a>
                </td>
                <td>'.$gxsf_result["bet_money"].'</td>
                <td>'.$gxsf_win.'</td>
            </tr>
            <tr style="text-align:right;display:none;">
                <td><a class="slide-sub" title="广东十分彩"
                       href="/member/history/history_date_view.php?gtype=GDSF&amp;gamedate='.$date_select.'">广东十分彩</a>
                </td>
                <td>'.$gdsf_result["bet_money"].'</td>
                <td>'.$gdsf_win.'</td>
            </tr>
            <tr style="text-align:right;display:none;">
                <td><a class="slide-sub" title="天津十分彩"
                       href="/member/history/history_date_view.php?gtype=TJSF&amp;gamedate='.$date_select.'">天津十分彩</a>
                </td>
                <td>'.$tjsf_result["bet_money"].'</td>
                <td>'.$tjsf_win.'</td>
            </tr>
            <tr style="text-align:right;">
                <td><a class="slide-sub" title="北京快乐8"
                       href="/member/history/history_date_view.php?gtype=BJKN&amp;gamedate='.$date_select.'">北京快乐8</a>
                </td>
                <td>'.$bjkn_result["bet_money"].'</td>
                <td>'.$bjkn_win.'</td>
            </tr>
            <tr style="text-align:right;display:none;">
                <td><a class="slide-sub" title="广东十一选五"
                       href="/member/history/history_date_view.php?gtype=GD11&amp;gamedate='.$date_select.'">广东十一选五</a>
                </td>
                <td>'.$gd11_result["bet_money"].'</td>
                <td>'.$gd11_win.'</td>
            </tr>
            <tr style="text-align:right;">
                <td><a class="slide-sub" title="北京PK拾"
                       href="/member/history/history_date_view.php?gtype=BJPK&amp;gamedate='.$date_select.'">北京PK拾</a>
                </td>
                <td>'.$bjpk_result["bet_money"].'</td>
                <td>'.$bjpk_win.'</td>
            </tr>
            <tr style="text-align:right;">
                <td class="title_td2" style="text-align:center;">总计</td>
                <td>'.$total_bet_money.'</td>
                <td>'.$total_win_money.'</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
';