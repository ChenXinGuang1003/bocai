<?php
include_once($C_Patch."/app/member/class/report_sport.php");

$user_group = "(".$_SESSION["userid"].")";

$sport_today_result = report_sport::getAllBetMoneyAndCount(date("Y-m-d"),date("Y-m-d"),$user_group);
$sport_day1_result = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-1 day')),date('Y-m-d',strtotime('-1 day')),$user_group);
$sport_day2_result = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-2 day')),date('Y-m-d',strtotime('-2 day')),$user_group);
$sport_day3_result = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-3 day')),date('Y-m-d',strtotime('-3 day')),$user_group);
$sport_day4_result = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-4 day')),date('Y-m-d',strtotime('-4 day')),$user_group);
$sport_day5_result = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-5 day')),date('Y-m-d',strtotime('-5 day')),$user_group);
$sport_day6_result = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-6 day')),date('Y-m-d',strtotime('-6 day')),$user_group);

$sport_today_result_status0 = report_sport::getAllBetMoneyAndCount(date("Y-m-d"),date("Y-m-d"),$user_group,"0");
$sport_day1_result_status0 = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-1 day')),date('Y-m-d',strtotime('-1 day')),$user_group,"0");
$sport_day2_result_status0 = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-2 day')),date('Y-m-d',strtotime('-2 day')),$user_group,"0");
$sport_day3_result_status0 = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-3 day')),date('Y-m-d',strtotime('-3 day')),$user_group,"0");
$sport_day4_result_status0 = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-4 day')),date('Y-m-d',strtotime('-4 day')),$user_group,"0");
$sport_day5_result_status0 = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-5 day')),date('Y-m-d',strtotime('-5 day')),$user_group,"0");
$sport_day6_result_status0 = report_sport::getAllBetMoneyAndCount(date('Y-m-d',strtotime('-6 day')),date('Y-m-d',strtotime('-6 day')),$user_group,"0");

$sport_today_win = report_sport::getAllTotalWin(date("Y-m-d"),date("Y-m-d"),$user_group);
$sport_day1_win = report_sport::getAllTotalWin(date('Y-m-d',strtotime('-1 day')),date('Y-m-d',strtotime('-1 day')),$user_group);
$sport_day2_win = report_sport::getAllTotalWin(date('Y-m-d',strtotime('-2 day')),date('Y-m-d',strtotime('-2 day')),$user_group);
$sport_day3_win = report_sport::getAllTotalWin(date('Y-m-d',strtotime('-3 day')),date('Y-m-d',strtotime('-3 day')),$user_group);
$sport_day4_win = report_sport::getAllTotalWin(date('Y-m-d',strtotime('-4 day')),date('Y-m-d',strtotime('-4 day')),$user_group);
$sport_day5_win = report_sport::getAllTotalWin(date('Y-m-d',strtotime('-5 day')),date('Y-m-d',strtotime('-5 day')),$user_group);
$sport_day6_win = report_sport::getAllTotalWin(date('Y-m-d',strtotime('-6 day')),date('Y-m-d',strtotime('-6 day')),$user_group);

$sport_cg_today_result = report_sport::getBetMoneyAndCountCg(date("Y-m-d"),date("Y-m-d"),$user_group);
$sport_cg_day1_result = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-1 day')),date('Y-m-d',strtotime('-1 day')),$user_group);
$sport_cg_day2_result = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-2 day')),date('Y-m-d',strtotime('-2 day')),$user_group);
$sport_cg_day3_result = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-3 day')),date('Y-m-d',strtotime('-3 day')),$user_group);
$sport_cg_day4_result = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-4 day')),date('Y-m-d',strtotime('-4 day')),$user_group);
$sport_cg_day5_result = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-5 day')),date('Y-m-d',strtotime('-5 day')),$user_group);
$sport_cg_day6_result = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-6 day')),date('Y-m-d',strtotime('-6 day')),$user_group);

$sport_cg_today_result_status0 = report_sport::getBetMoneyAndCountCg(date("Y-m-d"),date("Y-m-d"),$user_group,"0");
$sport_cg_day1_result_status0 = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-1 day')),date('Y-m-d',strtotime('-1 day')),$user_group,"0");
$sport_cg_day2_result_status0 = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-2 day')),date('Y-m-d',strtotime('-2 day')),$user_group,"0");
$sport_cg_day3_result_status0 = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-3 day')),date('Y-m-d',strtotime('-3 day')),$user_group,"0");
$sport_cg_day4_result_status0 = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-4 day')),date('Y-m-d',strtotime('-4 day')),$user_group,"0");
$sport_cg_day5_result_status0 = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-5 day')),date('Y-m-d',strtotime('-5 day')),$user_group,"0");
$sport_cg_day6_result_status0 = report_sport::getBetMoneyAndCountCg(date('Y-m-d',strtotime('-6 day')),date('Y-m-d',strtotime('-6 day')),$user_group,"0");

$sport_cg_today_win = report_sport::getTotalWinCg(date("Y-m-d"),date("Y-m-d"),$user_group);
$sport_cg_day1_win = report_sport::getTotalWinCg(date('Y-m-d',strtotime('-1 day')),date('Y-m-d',strtotime('-1 day')),$user_group);
$sport_cg_day2_win = report_sport::getTotalWinCg(date('Y-m-d',strtotime('-2 day')),date('Y-m-d',strtotime('-2 day')),$user_group);
$sport_cg_day3_win = report_sport::getTotalWinCg(date('Y-m-d',strtotime('-3 day')),date('Y-m-d',strtotime('-3 day')),$user_group);
$sport_cg_day4_win = report_sport::getTotalWinCg(date('Y-m-d',strtotime('-4 day')),date('Y-m-d',strtotime('-4 day')),$user_group);
$sport_cg_day5_win = report_sport::getTotalWinCg(date('Y-m-d',strtotime('-5 day')),date('Y-m-d',strtotime('-5 day')),$user_group);
$sport_cg_day6_win = report_sport::getTotalWinCg(date('Y-m-d',strtotime('-6 day')),date('Y-m-d',strtotime('-6 day')),$user_group);

$bet_money_total = $sport_today_result["bet_money"]+$sport_cg_today_result["bet_money"]+$sport_day1_result["bet_money"]+$sport_cg_day1_result["bet_money"]
    +$sport_day2_result["bet_money"]+$sport_cg_day2_result["bet_money"]+$sport_day3_result["bet_money"]+$sport_cg_day3_result["bet_money"]
    +$sport_day4_result["bet_money"]+$sport_cg_day4_result["bet_money"]+$sport_day5_result["bet_money"]+$sport_cg_day5_result["bet_money"]
    +$sport_day6_result["bet_money"]+$sport_cg_day6_result["bet_money"];

$bet_money_total_status0 = $sport_today_result_status0["bet_money"]+$sport_cg_today_result_status0["bet_money"]+$sport_day1_result_status0["bet_money"]+$sport_cg_day1_result_status0["bet_money"]
    +$sport_day2_result_status0["bet_money"]+$sport_cg_day2_result_status0["bet_money"]+$sport_day3_result_status0["bet_money"]+$sport_cg_day3_result_status0["bet_money"]
    +$sport_day4_result_status0["bet_money"]+$sport_cg_day4_result_status0["bet_money"]+$sport_day5_result_status0["bet_money"]+$sport_cg_day5_result_status0["bet_money"]
    +$sport_day6_result_status0["bet_money"]+$sport_cg_day6_result_status0["bet_money"];

$bet_win_total = $sport_today_win+$sport_day1_win+$sport_day2_win+$sport_day3_win+$sport_day4_win+$sport_day5_win+$sport_day6_win
                +$sport_cg_today_win+$sport_cg_day1_win+$sport_cg_day2_win+$sport_cg_day3_win+$sport_cg_day4_win+$sport_cg_day5_win+$sport_cg_day6_win;
echo '
<style type="text/css">
    #choiceForm2 {
        background: url("/cl/tpl/template/images/bgform05_03.gif") repeat-y scroll center bottom transparent;
        left: 250px;
        position: absolute;
        top: 148px;
        width: 293px;
        display: none;
        border-bottom: 1px solid #CCC;
    }
    #choiceForm2 .title {
        background: url("/cl/tpl/template/images/bgform05_01.gif") no-repeat scroll left top transparent;
        float: left;
        height: 41px;
        line-height: 55px;
        padding-left: 40px;
        width: 253px;
    }
    #choiceForm2 .titleBtn01 {
        height: 16px;
        position: absolute;
        right: 8px;
        top: 20px;
        width: 28px;
    }
    #choiceForm2 .btn {
        float: right;
        width: 150px;
    }
    #choiceForm2 .text {
        float: left;
        margin: 10px 13px;
        width: 90%;
    }
	a.btn11 {
	    background: url("/cl/tpl/template/images/btn11.jpg") no-repeat scroll center top transparent;
	    color: #666666;
	    cursor: pointer;
	    display: block;
	    float: left;
	    height: 16px;
	    line-height: 22px;
	    text-align: center;
	    width: 16px;
	}
</style>
<div id="MACenterContent">
    <div id="MNav">
        <span class="mbtn" >投注记录</span>
        <div class="navSeparate"></div>
    </div>
    <div id="MNavLv2">
        <span class="MGameType" onclick="chgType(\'ballRecord\');">体育投注记录</span>｜
        <span class="MGameType" onclick="chgType(\'liveHistory\');">AG视讯</span>｜
		<span class="MGameType MCurrentType" onclick="chgType(\'liveHistory2\');">BBIN视讯</span>｜
        <span class="MGameType" onclick="chgType(\'skRecord\');">彩票投注记录</span>｜
        <span class="MGameType" onclick="chgType(\'cqRecord\');">存取款记录</span>｜
    </div>
    <div id="MMainData">
        <div class="MControlNav">
            <select disabled="disabled" name="foo" id="MSelectType" class="MFormStyle">
                <option label="历史交易" dis="false" value="history" selected="selected">历史交易</option>
            </select>

        </div>
		<script>
			function agrecord(_date){
				var agrecord_html = "<iframe style='."'".'width:100%; height:280px;'."'".' src='."'".'/newbbin2/getRecord.php?d="+_date+"'."'".' ></iframe>";
				$("#MMainData").html(agrecord_html);
			}
		</script>
        <div class="MPanel" style="display: block;">
            <table class="MMain" border="1">
                <tr>
                    <th width="20%">日期</th>
                    <th width="30%">下注金额</th>
                    <th width="30%">未结算金额</th>
                    <th width="20%">结果</th>
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript:agrecord('."'".date('Y-m-d')."'".')" >'.date('Y-m-d').'</a>
                    </td>
                    
                </tr>
                <tr align="right" class=" MColor2">

                    <td style="text-align: center;">
						<a class="pagelink" href="javascript:agrecord('."'".date('Y-m-d',strtotime('-1 day'))."'".')" >'.date('Y-m-d',strtotime('-1 day')).'</a>
                    </td>
                    
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript:agrecord('."'".date('Y-m-d',strtotime('-2 day'))."'".')" >'.date('Y-m-d',strtotime('-2 day')).'</a>
                    </td>
                    
                </tr>
                <tr align="right" class=" MColor2">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript:agrecord('."'".date('Y-m-d',strtotime('-3 day'))."'".')" >'.date('Y-m-d',strtotime('-3 day')).'</a>
                    </td>
                    
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript:agrecord('."'".date('Y-m-d',strtotime('-4 day'))."'".')" >'.date('Y-m-d',strtotime('-4 day')).'</a>
                    </td>
                   
                </tr>
                <tr align="right" class=" MColor2">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript:agrecord('."'".date('Y-m-d',strtotime('-5 day'))."'".')" >'.date('Y-m-d',strtotime('-5 day')).'</a>
                    </td>
                    
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript:agrecord('."'".date('Y-m-d',strtotime('-6 day'))."'".')" >'.date('Y-m-d',strtotime('-6 day')).'</a>
                    </td>
                    
                </tr>
                

            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
var GAMESELECT = "ballRecord"
//選擇遊戲
$("#MSelectType").change(function() {
    switch(GAMESELECT) {
    case \'ballRecord\':
        f_com.MChgPager({method: \'ballHistory\'});
        break;
    case \'ballHistory\':
        f_com.MChgPager({method: \'ballRecord\'});
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
	case \'liveHistory2\':
        f_com.MChgPager({method: \'liveHistory2\'});
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