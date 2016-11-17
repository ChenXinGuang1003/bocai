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
$lhc_day1_result = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-1 day')));
$lhc_day2_result = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-2 day')));
$lhc_day3_result = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-3 day')));
$lhc_day4_result = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-4 day')));
$lhc_day5_result = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-5 day')));
$lhc_day6_result = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-6 day')));

$lhc_today_win = six_lottery_order::getOneDayTotalWin($_SESSION["userid"],date("Y-m-d"));
$lhc_day1_win = six_lottery_order::getOneDayTotalWin($_SESSION["userid"],date('Y-m-d',strtotime('-1 day')));
$lhc_day2_win = six_lottery_order::getOneDayTotalWin($_SESSION["userid"],date('Y-m-d',strtotime('-2 day')));
$lhc_day3_win = six_lottery_order::getOneDayTotalWin($_SESSION["userid"],date('Y-m-d',strtotime('-3 day')));
$lhc_day4_win = six_lottery_order::getOneDayTotalWin($_SESSION["userid"],date('Y-m-d',strtotime('-4 day')));
$lhc_day5_win = six_lottery_order::getOneDayTotalWin($_SESSION["userid"],date('Y-m-d',strtotime('-5 day')));
$lhc_day6_win = six_lottery_order::getOneDayTotalWin($_SESSION["userid"],date('Y-m-d',strtotime('-6 day')));

$today_result = lottery_order::getOneDayTotalCount($_SESSION["userid"],date("Y-m-d"));
$day1_result = lottery_order::getOneDayTotalCount($_SESSION["userid"],date('Y-m-d',strtotime('-1 day')));
$day2_result = lottery_order::getOneDayTotalCount($_SESSION["userid"],date('Y-m-d',strtotime('-2 day')));
$day3_result = lottery_order::getOneDayTotalCount($_SESSION["userid"],date('Y-m-d',strtotime('-3 day')));
$day4_result = lottery_order::getOneDayTotalCount($_SESSION["userid"],date('Y-m-d',strtotime('-4 day')));
$day5_result = lottery_order::getOneDayTotalCount($_SESSION["userid"],date('Y-m-d',strtotime('-5 day')));
$day6_result = lottery_order::getOneDayTotalCount($_SESSION["userid"],date('Y-m-d',strtotime('-6 day')));

$today_win = lottery_order::getOneDayTotalWin($_SESSION["userid"],date("Y-m-d"));
$day1_win = lottery_order::getOneDayTotalWin($_SESSION["userid"],date('Y-m-d',strtotime('-1 day')));
$day2_win = lottery_order::getOneDayTotalWin($_SESSION["userid"],date('Y-m-d',strtotime('-2 day')));
$day3_win = lottery_order::getOneDayTotalWin($_SESSION["userid"],date('Y-m-d',strtotime('-3 day')));
$day4_win = lottery_order::getOneDayTotalWin($_SESSION["userid"],date('Y-m-d',strtotime('-4 day')));
$day5_win = lottery_order::getOneDayTotalWin($_SESSION["userid"],date('Y-m-d',strtotime('-5 day')));
$day6_win = lottery_order::getOneDayTotalWin($_SESSION["userid"],date('Y-m-d',strtotime('-6 day')));

$bet_money_total = $lhc_today_result["bet_money"]+$today_result["bet_money"]+$lhc_day1_result["bet_money"]+$day1_result["bet_money"]
                   +$lhc_day2_result["bet_money"]+$day2_result["bet_money"]+$lhc_day3_result["bet_money"]+$day3_result["bet_money"]
                   +$lhc_day4_result["bet_money"]+$day4_result["bet_money"]+$lhc_day5_result["bet_money"]+$day5_result["bet_money"]
                   +$lhc_day6_result["bet_money"]+$day6_result["bet_money"];

$bet_win_total = $lhc_today_win+$today_win+$lhc_day1_win+$day1_win
                   +$lhc_day2_win+$day2_win+$lhc_day3_win+$day3_win
                   +$lhc_day4_win+$day4_win+$lhc_day5_win+$day5_win
                   +$lhc_day6_win+$day6_win;

echo '
<div id="historyCount">
    <div class="round-table">
        <table id="HistoryTab" class="ListTr">
            <tbody>
            <tr class="title_tr">
                <td style="width:20%;text-align:center;">日期</td>
                <td style="width:20%;text-align:center;">下注金额</td>
                <td style="width:20%;text-align:center;">结果</td>
                <td style="display: none;width:20%;text-align:center;">有效投注金额</td>

                <!--td>余额</td-->
            </tr>
            <tr style="text-align:right;">
                <td style="text-align:center"><a title="'.date('Y-m-d').'" href="history_datecount.php?gamedate='.date('Y-m-d').'">'.date('Y-m-d').'</a>
                </td>
                <td> '.($lhc_today_result["bet_money"]+$today_result["bet_money"]).'</td>
                <td> '.($lhc_today_win+$today_win).'</td>
            </tr>
            <tr style="text-align:right;">
                <td style="text-align:center"><a title="'.date('Y-m-d',strtotime('-1 day')).'" href="history_datecount.php?gamedate='.date('Y-m-d',strtotime('-1 day')).'">'.date('Y-m-d',strtotime('-1 day')).'</a>
                </td>
                <td> '.($lhc_day1_result["bet_money"]+$day1_result["bet_money"]).'</td>
                <td> '.($lhc_day1_win+$day1_win).'</td>
            </tr>
            <tr style="text-align:right;">
                <td style="text-align:center"><a title="'.date('Y-m-d',strtotime('-2 day')).'" href="history_datecount.php?gamedate='.date('Y-m-d',strtotime('-2 day')).'">'.date('Y-m-d',strtotime('-2 day')).'</a>
                </td>
                <td> '.($lhc_day2_result["bet_money"]+$day2_result["bet_money"]).'</td>
                <td> '.($lhc_day2_win+$day2_win).'</td>
            </tr>
            <tr style="text-align:right;">
                <td style="text-align:center"><a title="'.date('Y-m-d',strtotime('-3 day')).'" href="history_datecount.php?gamedate='.date('Y-m-d',strtotime('-3 day')).'">'.date('Y-m-d',strtotime('-3 day')).'</a>
                </td>
                <td> '.($lhc_day3_result["bet_money"]+$day3_result["bet_money"]).'</td>
                <td> '.($lhc_day3_win+$day3_win).'</td>
            </tr>
            <tr style="text-align:right;">
                <td style="text-align:center"><a title="'.date('Y-m-d',strtotime('-4 day')).'" href="history_datecount.php?gamedate='.date('Y-m-d',strtotime('-4 day')).'">'.date('Y-m-d',strtotime('-4 day')).'</a>
                </td>
                <td> '.($lhc_day4_result["bet_money"]+$day4_result["bet_money"]).'</td>
                <td> '.($lhc_day4_win+$day4_win).'</td>
            </tr>
            <tr style="text-align:right;">
                <td style="text-align:center"><a title="'.date('Y-m-d',strtotime('-5 day')).'" href="history_datecount.php?gamedate='.date('Y-m-d',strtotime('-5 day')).'">'.date('Y-m-d',strtotime('-5 day')).'</a>
                </td>
                <td> '.($lhc_day5_result["bet_money"]+$day5_result["bet_money"]).'</td>
                <td> '.($lhc_day5_win+$day5_win).'</td>
            </tr>
            <tr style="text-align:right;">
                <td style="text-align:center"><a title="'.date('Y-m-d',strtotime('-6 day')).'" href="history_datecount.php?gamedate='.date('Y-m-d',strtotime('-6 day')).'">'.date('Y-m-d',strtotime('-6 day')).'</a>
                </td>
                <td> '.($lhc_day6_result["bet_money"]+$day6_result["bet_money"]).'</td>
                <td> '.($lhc_day6_win+$day6_win).'</td>
            </tr>
            <tr style="text-align:right;">
                <td style="text-align:center">总计</td>
                <td>'.$bet_money_total.'</td>
                <td>'.$bet_win_total.'</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

';