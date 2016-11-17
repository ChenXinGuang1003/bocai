<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include_once "../../app/member/utils/login_check.php";

include "../../app/member/class/six_lottery_order.php";
include "../../app/member/class/lottery_order.php";


$lhc_today_result = six_lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"));

$d3_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"D3");
$p3_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"P3");
$t3_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"T3");
$cq_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"CQ");
$tj_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"TJ");
$jx_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"JX");
$gxsf_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"GXSF");
$gdsf_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"GDSF");
$tjsf_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"TJSF");
$gd11_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"GD11");
$bjpk_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"BJPK");
$bjkn_today_result = lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"BJKN");

$total_today_count = $lhc_today_result["bet_count"] + $d3_today_result["bet_count"] + $p3_today_result["bet_count"]
                    + $t3_today_result["bet_count"] + $cq_today_result["bet_count"]+ $tj_today_result["bet_count"]
                    + $jx_today_result["bet_count"]+ $gxsf_today_result["bet_count"] + $gdsf_today_result["bet_count"]
                    + $tjsf_today_result["bet_count"] + $gd11_today_result["bet_count"]+ $bjpk_today_result["bet_count"]
                    + $bjkn_today_result["bet_count"];
$total_today_money = $lhc_today_result["bet_money"] + $d3_today_result["bet_money"] + $p3_today_result["bet_money"]
                    + $t3_today_result["bet_money"] + $cq_today_result["bet_money"]+ $tj_today_result["bet_money"]
                    + $jx_today_result["bet_money"]+ $gxsf_today_result["bet_money"] + $gdsf_today_result["bet_money"]
                    + $tjsf_today_result["bet_money"] + $gd11_today_result["bet_money"]+ $bjpk_today_result["bet_money"]
                    + $bjkn_today_result["bet_money"];

echo '
<div id="historyData">
    <div class="round-table">
        <table id="HistoryTab" class="ListTr">
            <tbody>
            <tr class="title_tr">
                <td colspan="3" style="width:100%;text-align:center;">&nbsp;今天下注状况</td>
            </tr>
            <tr class="title_tr">
                <td style="width:33%;text-align:center;">游戏名称</td>
                <td style="width:33%;text-align:center;">笔数</td>
                <td style="width:33%;text-align:center;">下注金额</td>
            </tr>
            <tr >
                <td style="text-align:center;">
                    <a title="六合彩"
                       href="/member/history/history_date_view_lhc.php?gtype=LT&amp;gamedate='.date("Y-m-d").'">六合彩</a>
                </td>
                <td>
                    '.$lhc_today_result["bet_count"].'
                </td>
                <td>
                    '.$lhc_today_result["bet_money"].'
                </td>
            </tr>
            <tr>
                <td style="text-align:center;">
                    <a class="slide-sub" title="3D彩"
                       href="/member/history/history_date_view.php?gtype=D3&amp;gamedate='.date("Y-m-d").'">3D彩</a>
                </td>
                <td>
                    '.$d3_today_result["bet_count"].'
                </td>
                <td>
                    '.$d3_today_result["bet_money"].'
                </td>
            </tr>
            <tr>
                <td style="text-align:center;">
                    <a class="slide-sub" title="排列三"
                       href="/member/history/history_date_view.php?gtype=P3&amp;gamedate='.date("Y-m-d").'">排列三</a>
                </td>
                <td>
                    '.$p3_today_result["bet_count"].'
                </td>
                <td>
                    '.$p3_today_result["bet_money"].'
                </td>
            </tr>
            <tr style="display:none;">
                <td style="text-align:center;">
                    <a class="slide-sub" title="上海时时乐"
                       href="/member/history/history_date_view.php?gtype=T3&amp;gamedate='.date("Y-m-d").'">上海时时乐</a>
                </td>
                <td>
                    '.$t3_today_result["bet_count"].'
                </td>
                <td>
                    '.$t3_today_result["bet_money"].'
                </td>
            </tr>
            <tr>
                <td style="text-align:center;">
                    <a class="slide-sub" title="重庆时时彩"
                       href="/member/history/history_date_view.php?gtype=CQ&amp;gamedate='.date("Y-m-d").'">重庆时时彩</a>
                </td>
                <td>
                    '.$cq_today_result["bet_count"].'
                </td>
                <td>
                    '.$cq_today_result["bet_money"].'
                </td>
            </tr>
            <tr style="display:none;">
                <td style="text-align:center;">
                    <a class="slide-sub" title="江西时时彩"
                       href="/member/history/history_date_view.php?gtype=JX&amp;gamedate='.date("Y-m-d").'">江西时时彩</a>
                </td>
                <td>
                    '.$jx_today_result["bet_count"].'
                </td>
                <td>
                    '.$jx_today_result["bet_money"].'
                </td>
            </tr>
            <tr style="display:none;">
                <td style="text-align:center;">
                    <a class="slide-sub" title="天津时时彩"
                       href="/member/history/history_date_view.php?gtype=TJ&amp;gamedate='.date("Y-m-d").'">天津时时彩</a>
                </td>
                <td>
                    '.$tj_today_result["bet_count"].'
                </td>
                <td>
                    '.$tj_today_result["bet_money"].'
                </td>
            </tr>
            <tr style="display:none;">
                <td style="text-align:center;">
                    <a class="slide-sub" title="广西十分彩"
                       href="/member/history/history_date_view.php?gtype=GXSF&amp;gamedate='.date("Y-m-d").'">广西十分彩</a>
                </td>
                <td>
                    '.$gxsf_today_result["bet_count"].'
                </td>
                <td>
                    '.$gxsf_today_result["bet_money"].'
                </td>
            </tr>
            <tr style="display:none;">
                <td style="text-align:center;">
                    <a class="slide-sub" title="广东十分彩"
                       href="/member/history/history_date_view.php?gtype=GDSF&amp;gamedate='.date("Y-m-d").'">广东十分彩</a>
                </td>
                <td>
                    '.$gdsf_today_result["bet_count"].'
                </td>
                <td>
                    '.$gdsf_today_result["bet_money"].'
                </td>
            </tr>
            <tr style="display:none;">
                <td style="text-align:center;">
                    <a class="slide-sub" title="天津十分彩"
                       href="/member/history/history_date_view.php?gtype=TJSF&amp;gamedate='.date("Y-m-d").'">天津十分彩</a>
                </td>
                <td>
                    '.$tjsf_today_result["bet_count"].'
                </td>
                <td>
                    '.$tjsf_today_result["bet_money"].'
                </td>
            </tr>
            <tr >
                <td style="text-align:center;">
                    <a class="slide-sub" title="北京快乐8"
                       href="/member/history/history_date_view.php?gtype=BJKN&amp;gamedate='.date("Y-m-d").'">北京快乐8</a>
                </td>
                <td>
                    '.$bjkn_today_result["bet_count"].'
                </td>
                <td>
                    '.$bjkn_today_result["bet_money"].'
                </td>
            </tr>
            <tr style="display:none;">
                <td style="text-align:center;">
                    <a class="slide-sub" title="广东十一选五"
                       href="/member/history/history_date_view.php?gtype=GD11&amp;gamedate='.date("Y-m-d").'">广东十一选五</a>
                </td>
                <td>
                    '.$gd11_today_result["bet_count"].'
                </td>
                <td>
                    '.$gd11_today_result["bet_money"].'
                </td>
            </tr>
            <tr>
                <td style="text-align:center;">
                    <a class="slide-sub" title="北京PK拾"
                       href="/member/history/history_date_view.php?gtype=BJPK&amp;gamedate='.date("Y-m-d").'">北京PK拾</a>
                </td>
                <td>
                    '.$bjpk_today_result["bet_count"].'
                </td>
                <td>
                    '.$bjpk_today_result["bet_money"].'
                </td>
            </tr>
            <tr style="text-align:right;">
                <td style="text-align:center;">总计</td>
                <td>'.$total_today_count.'</td>
                <td>'.$total_today_money.'.00'.'</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
';