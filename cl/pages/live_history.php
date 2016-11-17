<?php
include_once($C_Patch."/app/member/class/live_info.php");
$user_group = "(".$_SESSION["userid"].")";
$sport_today_result = live_info::getAGAllBetMoney(date("Y-m-d"),$user_group);
$sport_day1_result = live_info::getAGAllBetMoney(date('Y-m-d',strtotime('-1 day')),$user_group);
$sport_day2_result = live_info::getAGAllBetMoney(date('Y-m-d',strtotime('-2 day')),$user_group);
$sport_day3_result = live_info::getAGAllBetMoney(date('Y-m-d',strtotime('-3 day')),$user_group);
$sport_day4_result = live_info::getAGAllBetMoney(date('Y-m-d',strtotime('-4 day')),$user_group);
$sport_day5_result = live_info::getAGAllBetMoney(date('Y-m-d',strtotime('-5 day')),$user_group);
$sport_day6_result = live_info::getAGAllBetMoney(date('Y-m-d',strtotime('-6 day')),$user_group);
$betAmount_total = $sport_today_result["betAmount"]+$sport_day1_result["betAmount"]+$sport_day2_result["betAmount"]+$sport_day3_result["betAmount"]+$sport_day4_result["betAmount"]+$sport_day5_result["betAmount"]+$sport_day6_result["betAmount"];
$sport_today_result_net = live_info::getAGAllNetMoney(date("Y-m-d"),$user_group);
$sport_day1_result_net = live_info::getAGAllNetMoney(date('Y-m-d',strtotime('-1 day')),$user_group);
$sport_day2_result_net = live_info::getAGAllNetMoney(date('Y-m-d',strtotime('-2 day')),$user_group);
$sport_day3_result_net = live_info::getAGAllNetMoney(date('Y-m-d',strtotime('-3 day')),$user_group);
$sport_day4_result_net = live_info::getAGAllNetMoney(date('Y-m-d',strtotime('-4 day')),$user_group);
$sport_day5_result_net = live_info::getAGAllNetMoney(date('Y-m-d',strtotime('-5 day')),$user_group);
$sport_day6_result_net = live_info::getAGAllNetMoney(date('Y-m-d',strtotime('-6 day')),$user_group);
$netAmount_total = $sport_today_result_net["netAmount"]+$sport_day1_result_net["netAmount"]+$sport_day2_result_net["netAmount"]+$sport_day3_result_net["netAmount"]+$sport_day4_result_net["netAmount"]+$sport_day5_result_net["netAmount"]+$sport_day6_result_net["netAmount"];
?>
<div id="MACenterContent">
    <div id="MNav">
        <span class="mbtn" >投注记录</span>
        <div class="navSeparate"></div>
    </div>
    <div id="MNavLv2">
			
        <span class="MGameType MCurrentType" onclick="chgType('liveHistory');">真人记录</span>｜
        <span class="MGameType" onclick="chgType('skRecord');">彩票投注记录</span>｜
		<span class="MGameType" onclick="chgType('ballRecord');">体育投注记录</span>｜
        <span class="MGameType" onclick="chgType('cqRecord');">存取款记录</span>｜
    </div>
    <div id="MMainData" style="margin-top: 8px;">
		<select name="foo" id="MSelectType" class="MFormStyle">
			<option label="AG" value="AG" selected="selected">AG</option>
			<option label="BBIN" value="BBIN">BBIN</option>
		</select>
		
        <table class="MMain" border="1" style="margin-top:10px">
            <thead>
            <tr>
                <th width=25%>日期</th>
                <th width=25%>游戏类型</th>
                <th width=25%>下注总金额</th>
				<th width=25%>结果</th>
            </tr>
            </thead>
            <tbody id="general-msg">
				<tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: 'GET', method: 'AGliveHistory'},{date:' <?=date('Y-m-d')?>',bbbet:'<?=$sport_today_result["betAmount"]?>',bbnet:'<?=$sport_today_result_net["netAmount"]?>'});"><?=date('Y-m-d')?></a>
                    </td>
                    <td style="text-align: center;">AG</td>
                    <td style="text-align: center;"><?=$sport_today_result['betAmount']?></td>
					<td style="text-align: center;"><?=$sport_today_result_net["netAmount"]?></td>
                </tr>
                <tr align="right" class=" MColor2">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: 'GET', met hod: 'AGliveHistory'},{date:'<?=date('Y-m-d',strtotime('-1 day'))?>',bbbet:'<?=$sport_day1_result["betAmount"]?>',bbnet:'<?=$sport_day1_result_net["netAmount"]?>'});"><?=date('Y-m-d',strtotime('-1 day'))?></a>
                    </td>
                    <td style="text-align: center;">AG</td>
                    <td style="text-align: center;"><?=$sport_day1_result['betAmount']?></td>
					<td style="text-align: center;"><?=$sport_day1_result_net["netAmount"]?></td>
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: 'GET', method: 'AGliveHistory'},{date:'<?=date('Y-m-d',strtotime('-2 day'))?>',bbbet:'<?=$sport_day2_result["betAmount"]?>',bbnet:'<?=$sport_day2_result_net["netAmount"]?>'});"><?=date('Y-m-d',strtotime('-2 day'))?></a>
                    </td>
                    <td style="text-align: center;">AG</td>
                    <td style="text-align: center;"><?=$sport_day2_result['betAmount']?></td>
					<td style="text-align: center;"><?=$sport_day2_result_net["netAmount"]?></td>
                </tr>
                <tr align="right" class=" MColor2">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: 'GET', method: 'AGliveHistory'},{date:'<?=date('Y-m-d',strtotime('-3 day'))?>',bbbet:'<?=$sport_day3_result["betAmount"]?>',bbnet:'<?=$sport_day3_result_net["netAmount"]?>'});"><?=date('Y-m-d',strtotime('-3 day'))?></a>
                    </td>
                    <td style="text-align: center;">AG</td>
                    <td style="text-align: center;"><?=$sport_day3_result['betAmount']?></td>
					<td style="text-align: center;"><?=$sport_day3_result_net["netAmount"]?></td>
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: 'GET', method: 'AGliveHistory'},{date:'<?=date('Y-m-d',strtotime('-4 day'))?>',bbbet:'<?=$sport_day4_result["betAmount"]?>',bbnet:'<?=$sport_day4_result_net["netAmount"]?>'});"><?=date('Y-m-d',strtotime('-4 day'))?></a>
                    </td>
                    <td style="text-align: center;">AG</td>
                    <td style="text-align: center;"><?=$sport_day4_result['betAmount']?></td>
					<td style="text-align: center;"><?=$sport_day4_result_net["netAmount"]?></td>
                </tr>
                <tr align="right" class=" MColor2">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: 'GET', method: 'AGliveHistory'},{date:'<?=date('Y-m-d',strtotime('-5 day'))?>',bbbet:'<?=$sport_day5_result["betAmount"]?>',bbnet:'<?=$sport_day5_result_net["netAmount"]?>'});"><?=date('Y-m-d',strtotime('-5 day'))?></a>
                    </td>
                    <td style="text-align: center;">AG</td>
                    <td style="text-align: center;"><?=$sport_day5_result['betAmount']?></td>
					<td style="text-align: center;"><?=$sport_day5_result_net["netAmount"]?></td>
                </tr>
                <tr align="right" class="MColor1">

                    <td style="text-align: center;">
                        <a class="pagelink" href="javascript: f_com.MChgPager({type: 'GET', method: 'AGliveHistory'},{date:'<?=date('Y-m-d',strtotime('-6 day'))?>',bbbet:'<?=$sport_day6_result["betAmount"]?>',bbnet:'<?=$sport_day6_result_net["netAmount"]?>'});"><?=date('Y-m-d',strtotime('-6 day'))?></a>
                    </td>
                    <td style="text-align: center;">AG</td>
                    <td style="text-align: center;"><?=$sport_day6_result['betAmount']?></td>
					<td style="text-align: center;"><?=$sport_day6_result_net["netAmount"]?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">总计</td>
                    <td style="text-align: center;" align="right">AG</td>
                    <td style="text-align: center;" align="right"><?=$betAmount_total?></td>
					<td style="text-align: center;"><?=$netAmount_total?></td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
	var GAMESELECT='aliveHistory';
	$("#MSelectType").change(function() {
		switch(GAMESELECT) {
			case 'aliveHistory':
				f_com.MChgPager({method: 'bliveHistory'});
				break;
			case 'bliveHistory':
				f_com.MChgPager({method:'liveHistory'});
				break;
		}
	});
    function chgType(type) {
        switch(type) {
            case 'ballRecord':
                f_com.MChgPager({method: 'ballRecord'});
                break;
            case 'lotteryRecord':
                f_com.MChgPager({method: 'lotteryRecord'});
                break;
            case 'liveHistory':
                f_com.MChgPager({method: 'liveHistory'});
                break;
            case 'gameHistory':
                f_com.MChgPager({method: 'gameHistory'});
                break;
            case 'skRecord':
                f_com.MChgPager({method: 'skRecord'});
                break;
            case 'a3dhHistory':
                f_com.MChgPager({method: 'a3dhHistory'});
                break;
            case 'TPBFightHistory':
                f_com.MChgPager({method: 'TPBFightHistory'});
                break;
            case 'TPBSPORTHistory':
                f_com.MChgPager({method: 'TPBSPORTHistory'});
                break;
            case 'cqRecord':
                f_com.MChgPager({method: 'cqRecord'});
                break;

        }
    }
</script>