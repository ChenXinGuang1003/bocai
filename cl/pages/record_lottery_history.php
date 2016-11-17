<?php
$lhc_today_result = six_lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"));
$lhc_day1_result = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-1 day')));
$lhc_day2_result = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-2 day')));
$lhc_day3_result = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-3 day')));
$lhc_day4_result = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-4 day')));
$lhc_day5_result = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-5 day')));
$lhc_day6_result = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-6 day')));

$lhc_today_result_status0 = six_lottery_order::getOneDayOrder($_SESSION["userid"],date("Y-m-d"),"0");
$lhc_day1_result_status0 = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-1 day')),"0");
$lhc_day2_result_status0 = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-2 day')),"0");
$lhc_day3_result_status0 = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-3 day')),"0");
$lhc_day4_result_status0 = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-4 day')),"0");
$lhc_day5_result_status0 = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-5 day')),"0");
$lhc_day6_result_status0 = six_lottery_order::getOneDayOrder($_SESSION["userid"],date('Y-m-d',strtotime('-6 day')),"0");

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

$today_result_status0 = lottery_order::getOneDayTotalCount($_SESSION["userid"],date("Y-m-d"),"0");
$day1_result_status0 = lottery_order::getOneDayTotalCount($_SESSION["userid"],date('Y-m-d',strtotime('-1 day')),"0");
$day2_result_status0 = lottery_order::getOneDayTotalCount($_SESSION["userid"],date('Y-m-d',strtotime('-2 day')),"0");
$day3_result_status0 = lottery_order::getOneDayTotalCount($_SESSION["userid"],date('Y-m-d',strtotime('-3 day')),"0");
$day4_result_status0 = lottery_order::getOneDayTotalCount($_SESSION["userid"],date('Y-m-d',strtotime('-4 day')),"0");
$day5_result_status0 = lottery_order::getOneDayTotalCount($_SESSION["userid"],date('Y-m-d',strtotime('-5 day')),"0");
$day6_result_status0 = lottery_order::getOneDayTotalCount($_SESSION["userid"],date('Y-m-d',strtotime('-6 day')),"0");

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

$bet_money_total_status0 = $lhc_today_result_status0["bet_money"]+$today_result_status0["bet_money"]+$lhc_day1_result_status0["bet_money"]+$day1_result_status0["bet_money"]
    +$lhc_day2_result_status0["bet_money"]+$day2_result_status0["bet_money"]+$lhc_day3_result_status0["bet_money"]+$day3_result_status0["bet_money"]
    +$lhc_day4_result_status0["bet_money"]+$day4_result_status0["bet_money"]+$lhc_day5_result_status0["bet_money"]+$day5_result_status0["bet_money"]
    +$lhc_day6_result_status0["bet_money"]+$day6_result_status0["bet_money"];

$bet_win_total = $lhc_today_win+$today_win+$lhc_day1_win+$day1_win
    +$lhc_day2_win+$day2_win+$lhc_day3_win+$day3_win
    +$lhc_day4_win+$day4_win+$lhc_day5_win+$day5_win
    +$lhc_day6_win+$day6_win;
echo '
<div id="MACenterContent">
    <div id="MNav">
        <span class="mbtn" >投注记录</span>
        <div class="navSeparate"></div>
    </div>
    <div id="MNavLv2">
       
        <span class="MGameType" onclick="chgType(\'liveHistory\');">真人记录</span>｜
        <span class="MGameType MCurrentType" onclick="chgType(\'skRecord\');">彩票投注记录</span>｜
       <span class="MGameType" onclick="chgType(\'ballRecord\');">体育投注记录</span>｜
		<span class="MGameType" onclick="chgType(\'cqRecord\');">存取款记录</span>｜
    </div>
    <div id="MMainData">
        <div class="MControlNav">
            <select name="foo" id="MSelectType" class="MFormStyle">
                <option label="今日交易" value="today">今日交易</option>
                <option label="历史交易" value="history" selected="selected">历史交易</option>
            </select>

        </div>
        <div class="MPanel" style="display: block;">
            <table class="MMain" border="1">
                <tr>
                    <th width="20%">日期</th>
                    <th style="width: 30%">下注金额</th>
                    <th style="width: 30%">未结算金额</th>
                    <th style="width: 20%">结果</th>
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'POST\', method: \'SKLotteryHistory\'}, {date: \''.date('Y-m-d').'\'});">'.date('Y-m-d').'</a>
                    </td>
                    <td style="text-align: center;">'.($lhc_today_result["bet_money"]+$today_result["bet_money"]).'</td>
                    <td style="text-align: center;">'.($lhc_today_result_status0["bet_money"]+$today_result_status0["bet_money"]).'</td>
                    <td style="text-align: center;">'.($lhc_today_win+$today_win).'</td>
                </tr>
                <tr align="right" class=" MColor2">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'POST\', method: \'SKLotteryHistory\'}, {date: \''.date('Y-m-d',strtotime('-1 day')).'\'});">'.date('Y-m-d',strtotime('-1 day')).'</a>
                    </td>
                    <td style="text-align: center;">'.($lhc_day1_result["bet_money"]+$day1_result["bet_money"]).'</td>
                    <td style="text-align: center;">'.($lhc_day1_result_status0["bet_money"]+$day1_result_status0["bet_money"]).'</td>
                    <td style="text-align: center;">'.($lhc_day1_win+$day1_win).'</td>
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'POST\', method: \'SKLotteryHistory\'}, {date: \''.date('Y-m-d',strtotime('-2 day')).'\'});">'.date('Y-m-d',strtotime('-2 day')).'</a>
                    </td>
                    <td style="text-align: center;">'.($lhc_day2_result["bet_money"]+$day2_result["bet_money"]).'</td>
                    <td style="text-align: center;">'.($lhc_day2_result_status0["bet_money"]+$day2_result_status0["bet_money"]).'</td>
                    <td style="text-align: center;">'.($lhc_day2_win+$day2_win).'</td>
                </tr>
                <tr align="right" class=" MColor2">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'POST\', method: \'SKLotteryHistory\'}, {date: \''.date('Y-m-d',strtotime('-3 day')).'\'});">'.date('Y-m-d',strtotime('-3 day')).'</a>
                    </td>
                    <td style="text-align: center;">'.($lhc_day3_result["bet_money"]+$day3_result["bet_money"]).'</td>
                    <td style="text-align: center;">'.($lhc_day3_result_status0["bet_money"]+$day3_result_status0["bet_money"]).'</td>
                    <td style="text-align: center;">'.($lhc_day3_win+$day3_win).'</td>
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'POST\', method: \'SKLotteryHistory\'}, {date: \''.date('Y-m-d',strtotime('-4 day')).'\'});">'.date('Y-m-d',strtotime('-4 day')).'</a>
                    </td>
                    <td style="text-align: center;">'.($lhc_day4_result["bet_money"]+$day4_result["bet_money"]).'</td>
                    <td style="text-align: center;">'.($lhc_day4_result_status0["bet_money"]+$day4_result_status0["bet_money"]).'</td>
                    <td style="text-align: center;">'.($lhc_day4_win+$day4_win).'</td>
                </tr>
                <tr align="right" class=" MColor2">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'POST\', method: \'SKLotteryHistory\'}, {date: \''.date('Y-m-d',strtotime('-5 day')).'\'});">'.date('Y-m-d',strtotime('-5 day')).'</a>
                    </td>
                    <td style="text-align: center;">'.($lhc_day5_result["bet_money"]+$day5_result["bet_money"]).'</td>
                    <td style="text-align: center;">'.($lhc_day5_result_status0["bet_money"]+$day5_result_status0["bet_money"]).'</td>
                    <td style="text-align: center;">'.($lhc_day5_win+$day5_win).'</td>
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: \'POST\', method: \'SKLotteryHistory\'}, {date: \''.date('Y-m-d',strtotime('-6 day')).'\'});">'.date('Y-m-d',strtotime('-6 day')).'</a>
                    </td>
                    <td style="text-align: center;">'.($lhc_day6_result["bet_money"]+$day6_result["bet_money"]).'</td>
                    <td style="text-align: center;">'.($lhc_day6_result_status0["bet_money"]+$day6_result_status0["bet_money"]).'</td>
                    <td style="text-align: center;">'.($lhc_day6_win+$day6_win).'</td>
                </tr>
                <tr>
                    <td style="text-align: center;">总计</td>
                    <td style="text-align: center;" align="right">'.$bet_money_total.'</td>
                    <td style="text-align: center;" align="right">'.$bet_money_total_status0.'</td>
                    <td style="text-align: center;" align="right">'.$bet_win_total.'</td>
                </tr>

            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
var GAMESELECT = "SKHistory"
//選擇遊戲
$("#MSelectType").change(function() {
    switch(GAMESELECT) {
        case \'SKRecord\':
        case \'SKLotteryRecord\':
            f_com.MChgPager({method: \'SKHistory\'});
    break;
case \'SKHistory\':
    case \'SKLotteryHistory\':
        f_com.MChgPager({method: \'SKRecord\'});
        break;
    }
});

function chgType(type) {
    switch(type) {
        case \'ballRecord\':
            f_com.MChgPager({method: \'ballRecord\'});
    break;
case \'lotteryRecord\':
        f_com.MChgPager({method: \'lotteryRecord\'});
        break;
    case \'liveHistory\':
        f_com.MChgPager({method: \'liveHistory\'});
        break;
    case \'gameHistory\':
        f_com.MChgPager({method: \'gameHistory\'});
        break;
    case \'skRecord\':
        f_com.MChgPager({method: \'skRecord\'});
        break;
    case \'a3dhHistory\':
        f_com.MChgPager({method: \'a3dhHistory\'});
        break;
    case \'TPBFightHistory\':
        f_com.MChgPager({method: \'TPBFightHistory\'});
        break;
    case \'TPBSPORTHistory\':
        f_com.MChgPager({method: \'TPBSPORTHistory\'});
        break;
    case \'cqRecord\':
        f_com.MChgPager({method: \'cqRecord\'});
        break;
    }
}

</script>
';