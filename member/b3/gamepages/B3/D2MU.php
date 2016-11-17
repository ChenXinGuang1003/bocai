<?php

$odds1 = odds_lottery_normal::getOddsByPart($lottery_name,"佰个定位","part1");
$odds2 = odds_lottery_normal::getOddsByPart($lottery_name,"佰个定位","part2");

echo '
document.getElementById("Game").innerHTML = \'<form id="formB3" name="D3_018" action="/member/quickB3_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="D2MU"/>\'+
\'<input type="hidden" name="gtype" value="'.$gType.'"/>\'+
\'<input type="hidden" name="gold_gmax" value="'.$maxMoney.'"/>\'+
\'<input type="hidden" name="gold_gmin" value="'.$lowestMoney.'"/>\'+
\'<input type="hidden" name="SC" value="50000"/>\'+
\'<input type="hidden" name="SO" value="5000"/>\'+
\'<input type="hidden" name="Maxcredit" value="'.$userMoney.'"/>\'+
\'<input type="hidden" id="D3type" name="D3type" value="A"/>\'+
\'<div class="InfoBar">\'+
    \'<div class="Range" style="display:none">\'+
        \'<span class="On"><input type="radio" name="jjomj" value="0" checked="checked"/> 000~199</span>\'+
        \'<span><input type="radio" name="jjomj" value="2"/>200~399</span>\'+
        \'<span><input type="radio" name="jjomj" value="4"/>400~599</span>\'+
        \'<span><input type="radio" name="jjomj" value="6"/>600~799</span>\'+
        \'<span><input type="radio" name="jjomj" value="8"/>800~999</span>\'+
        \'</div>\'+
    \'<input type="hidden" name="Start" value="0"/>\'+
    \'</div>\'+
\'<div class="round-table">\'+
\'<table class="GameTable">\'+
\'<tr class="title_line">\'+
    \'<td>号码</td>\'+
    \'<td>赔率</td>\'+
    \'<td>金额</td>\'+
    \'<td>号码</td>\'+
    \'<td>赔率</td>\'+
    \'<td>金额</td>\'+
    \'<td>号码</td>\'+
    \'<td>赔率</td>\'+
    \'<td>金额</td>\'+
    \'<td>号码</td>\'+
    \'<td>赔率</td>\'+
    \'<td>金额</td>\'+
    \'<td>号码</td>\'+
    \'<td>赔率</td>\'+
    \'<td>金额</td>\'+
    \'</tr>\'+
\'<tr>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU00">\'+
            \'0X0\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU00"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU00" class="odds">\'+
            \''.$odds1["h0"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h0"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU00"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU01">\'+
            \'0X1\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU01"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU01" class="odds">\'+
            \''.$odds1["h1"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h1"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU01"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU02">\'+
            \'0X2\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU02"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU02" class="odds">\'+
            \''.$odds1["h2"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h2"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU02"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU03">\'+
            \'0X3\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU03"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU03" class="odds">\'+
            \''.$odds1["h3"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h3"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU03"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU04">\'+
            \'0X4\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU04"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU04" class="odds">\'+
            \''.$odds1["h4"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h4"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU04"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU05">\'+
            \'0X5\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU05"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU05" class="odds">\'+
            \''.$odds1["h5"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h5"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU05"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU06">\'+
            \'0X6\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU06"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU06" class="odds">\'+
            \''.$odds1["h6"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h6"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU06"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU07">\'+
            \'0X7\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU07"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU07" class="odds">\'+
            \''.$odds1["h7"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h7"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU07"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU08">\'+
            \'0X8\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU08"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU08" class="odds">\'+
            \''.$odds1["h8"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h8"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU08"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU09">\'+
            \'0X9\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU09"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU09" class="odds">\'+
            \''.$odds1["h9"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h9"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU09"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU10">\'+
            \'1X0\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU10"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU10" class="odds">\'+
            \''.$odds1["h10"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h10"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU10"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU11">\'+
            \'1X1\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU11"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU11" class="odds">\'+
            \''.$odds1["h11"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h11"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU11"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU12">\'+
            \'1X2\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU12"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU12" class="odds">\'+
            \''.$odds1["h12"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h12"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU12"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU13">\'+
            \'1X3\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU13"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU13" class="odds">\'+
            \''.$odds1["h13"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h13"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU13"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU14">\'+
            \'1X4\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU14"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU14" class="odds">\'+
            \''.$odds1["h14"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h14"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU14"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU15">\'+
            \'1X5\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU15"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU15" class="odds">\'+
            \''.$odds1["h15"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h15"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU15"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU16">\'+
            \'1X6\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU16"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU16" class="odds">\'+
            \''.$odds1["h16"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h16"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU16"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU17">\'+
            \'1X7\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU17"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU17" class="odds">\'+
            \''.$odds1["h17"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h17"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU17"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU18">\'+
            \'1X8\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU18"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU18" class="odds">\'+
            \''.$odds1["h18"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h18"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU18"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU19">\'+
            \'1X9\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU19"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU19" class="odds">\'+
            \''.$odds1["h19"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h19"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU19"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU20">\'+
            \'2X0\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU20"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU20" class="odds">\'+
            \''.$odds1["h20"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h20"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU20"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU21">\'+
            \'2X1\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU21"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU21" class="odds">\'+
            \''.$odds1["h21"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h21"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU21"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU22">\'+
            \'2X2\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU22"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU22" class="odds">\'+
            \''.$odds1["h22"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h22"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU22"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU23">\'+
            \'2X3\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU23"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU23" class="odds">\'+
            \''.$odds1["h23"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h23"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU23"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU24">\'+
            \'2X4\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU24"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU24" class="odds">\'+
            \''.$odds1["h24"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h24"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU24"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU25">\'+
            \'2X5\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU25"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU25" class="odds">\'+
            \''.$odds1["h25"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h25"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU25"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU26">\'+
            \'2X6\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU26"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU26" class="odds">\'+
            \''.$odds1["h26"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h26"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU26"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU27">\'+
            \'2X7\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU27"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU27" class="odds">\'+
            \''.$odds1["h27"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h27"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU27"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU28">\'+
            \'2X8\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU28"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU28" class="odds">\'+
            \''.$odds1["h28"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h28"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU28"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU29">\'+
            \'2X9\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU29"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU29" class="odds">\'+
            \''.$odds1["h29"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h29"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU29"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU30">\'+
            \'3X0\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU30"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU30" class="odds">\'+
            \''.$odds1["h30"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h30"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU30"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU31">\'+
            \'3X1\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU31"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU31" class="odds">\'+
            \''.$odds1["h31"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h31"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU31"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU32">\'+
            \'3X2\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU32"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU32" class="odds">\'+
            \''.$odds1["h32"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h32"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU32"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU33">\'+
            \'3X3\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU33"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU33" class="odds">\'+
            \''.$odds1["h33"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h33"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU33"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU34">\'+
            \'3X4\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU34"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU34" class="odds">\'+
            \''.$odds1["h34"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h34"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU34"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU35">\'+
            \'3X5\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU35"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU35" class="odds">\'+
            \''.$odds1["h35"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h35"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU35"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU36">\'+
            \'3X6\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU36"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU36" class="odds">\'+
            \''.$odds1["h36"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h36"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU36"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU37">\'+
            \'3X7\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU37"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU37" class="odds">\'+
            \''.$odds1["h37"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h37"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU37"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU38">\'+
            \'3X8\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU38"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU38" class="odds">\'+
            \''.$odds1["h38"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h38"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU38"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU39">\'+
            \'3X9\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU39"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU39" class="odds">\'+
            \''.$odds1["h39"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h39"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU39"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU40">\'+
            \'4X0\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU40"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU40" class="odds">\'+
            \''.$odds1["h40"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h40"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU40"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU41">\'+
            \'4X1\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU41"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU41" class="odds">\'+
            \''.$odds1["h41"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h41"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU41"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU42">\'+
            \'4X2\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU42"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU42" class="odds">\'+
            \''.$odds1["h42"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h42"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU42"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU43">\'+
            \'4X3\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU43"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU43" class="odds">\'+
            \''.$odds1["h43"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h43"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU43"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU44">\'+
            \'4X4\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU44"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU44" class="odds">\'+
            \''.$odds1["h44"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h44"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU44"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU45">\'+
            \'4X5\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU45"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU45" class="odds">\'+
            \''.$odds1["h45"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h45"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU45"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU46">\'+
            \'4X6\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU46"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU46" class="odds">\'+
            \''.$odds1["h46"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h46"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU46"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU47">\'+
            \'4X7\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU47"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU47" class="odds">\'+
            \''.$odds1["h47"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h47"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU47"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU48">\'+
            \'4X8\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU48"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU48" class="odds">\'+
            \''.$odds1["h48"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h48"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU48"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU49">\'+
            \'4X9\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU49"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU49" class="odds">\'+
            \''.$odds1["h49"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h49"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU49"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU50">\'+
            \'5X0\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU50"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU50" class="odds">\'+
            \''.$odds2["h0"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h0"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU50"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU51">\'+
            \'5X1\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU51"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU51" class="odds">\'+
            \''.$odds2["h1"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h1"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU51"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU52">\'+
            \'5X2\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU52"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU52" class="odds">\'+
            \''.$odds2["h2"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h2"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU52"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU53">\'+
            \'5X3\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU53"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU53" class="odds">\'+
            \''.$odds2["h3"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h3"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU53"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU54">\'+
            \'5X4\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU54"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU54" class="odds">\'+
            \''.$odds2["h4"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h4"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU54"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU55">\'+
            \'5X5\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU55"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU55" class="odds">\'+
            \''.$odds2["h5"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h5"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU55"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU56">\'+
            \'5X6\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU56"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU56" class="odds">\'+
            \''.$odds2["h6"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h6"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU56"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU57">\'+
            \'5X7\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU57"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU57" class="odds">\'+
            \''.$odds2["h7"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h7"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU57"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU58">\'+
            \'5X8\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU58"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU58" class="odds">\'+
            \''.$odds2["h8"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h8"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU58"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU59">\'+
            \'5X9\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU59"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU59" class="odds">\'+
            \''.$odds2["h9"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h9"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU59"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU60">\'+
            \'6X0\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU60"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU60" class="odds">\'+
            \''.$odds2["h10"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h10"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU60"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU61">\'+
            \'6X1\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU61"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU61" class="odds">\'+
            \''.$odds2["h11"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h11"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU61"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU62">\'+
            \'6X2\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU62"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU62" class="odds">\'+
            \''.$odds2["h12"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h12"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU62"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU63">\'+
            \'6X3\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU63"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU63" class="odds">\'+
            \''.$odds2["h13"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h13"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU63"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU64">\'+
            \'6X4\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU64"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU64" class="odds">\'+
            \''.$odds2["h14"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h14"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU64"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU65">\'+
            \'6X5\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU65"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU65" class="odds">\'+
            \''.$odds2["h15"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h15"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU65"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU66">\'+
            \'6X6\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU66"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU66" class="odds">\'+
            \''.$odds2["h16"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h16"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU66"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU67">\'+
            \'6X7\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU67"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU67" class="odds">\'+
            \''.$odds2["h17"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h17"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU67"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU68">\'+
            \'6X8\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU68"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU68" class="odds">\'+
            \''.$odds2["h18"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h18"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU68"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU69">\'+
            \'6X9\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU69"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU69" class="odds">\'+
            \''.$odds2["h19"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h19"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU69"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU70">\'+
            \'7X0\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU70"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU70" class="odds">\'+
            \''.$odds2["h20"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h20"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU70"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU71">\'+
            \'7X1\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU71"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU71" class="odds">\'+
            \''.$odds2["h21"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h21"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU71"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU72">\'+
            \'7X2\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU72"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU72" class="odds">\'+
            \''.$odds2["h22"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h22"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU72"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU73">\'+
            \'7X3\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU73"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU73" class="odds">\'+
            \''.$odds2["h23"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h23"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU73"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU74">\'+
            \'7X4\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU74"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU74" class="odds">\'+
            \''.$odds2["h24"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h24"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU74"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU75">\'+
            \'7X5\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU75"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU75" class="odds">\'+
            \''.$odds2["h25"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h25"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU75"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU76">\'+
            \'7X6\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU76"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU76" class="odds">\'+
            \''.$odds2["h26"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h26"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU76"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU77">\'+
            \'7X7\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU77"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU77" class="odds">\'+
            \''.$odds2["h27"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h27"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU77"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU78">\'+
            \'7X8\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU78"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU78" class="odds">\'+
            \''.$odds2["h28"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h28"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU78"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU79">\'+
            \'7X9\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU79"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU79" class="odds">\'+
            \''.$odds2["h29"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h29"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU79"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU80">\'+
            \'8X0\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU80"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU80" class="odds">\'+
            \''.$odds2["h30"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h30"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU80"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU81">\'+
            \'8X1\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU81"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU81" class="odds">\'+
            \''.$odds2["h31"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h31"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU81"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU82">\'+
            \'8X2\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU82"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU82" class="odds">\'+
            \''.$odds2["h32"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h32"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU82"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU83">\'+
            \'8X3\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU83"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU83" class="odds">\'+
            \''.$odds2["h33"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h33"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU83"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU84">\'+
            \'8X4\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU84"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU84" class="odds">\'+
            \''.$odds2["h34"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h34"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU84"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU85">\'+
            \'8X5\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU85"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU85" class="odds">\'+
            \''.$odds2["h35"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h35"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU85"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU86">\'+
            \'8X6\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU86"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU86" class="odds">\'+
            \''.$odds2["h36"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h36"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU86"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU87">\'+
            \'8X7\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU87"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU87" class="odds">\'+
            \''.$odds2["h37"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h37"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU87"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU88">\'+
            \'8X8\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU88"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU88" class="odds">\'+
            \''.$odds2["h38"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h38"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU88"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU89">\'+
            \'8X9\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU89"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU89" class="odds">\'+
            \''.$odds2["h39"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h39"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU89"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU90">\'+
            \'9X0\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU90"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU90" class="odds">\'+
            \''.$odds2["h40"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h40"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU90"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU91">\'+
            \'9X1\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU91"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU91" class="odds">\'+
            \''.$odds2["h41"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h41"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU91"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU92">\'+
            \'9X2\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU92"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU92" class="odds">\'+
            \''.$odds2["h42"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h42"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU92"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU93">\'+
            \'9X3\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU93"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU93" class="odds">\'+
            \''.$odds2["h43"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h43"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU93"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU94">\'+
            \'9X4\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU94"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU94" class="odds">\'+
            \''.$odds2["h44"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h44"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU94"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU95">\'+
            \'9X5\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU95"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU95" class="odds">\'+
            \''.$odds2["h45"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h45"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU95"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU96">\'+
            \'9X6\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU96"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU96" class="odds">\'+
            \''.$odds2["h46"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h46"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU96"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU97">\'+
            \'9X7\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU97"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU97" class="odds">\'+
            \''.$odds2["h47"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h47"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU97"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU98">\'+
            \'9X8\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU98"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU98" class="odds">\'+
            \''.$odds2["h48"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h48"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU98"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU99">\'+
            \'9X9\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MU99"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MU99" class="odds">\'+
            \''.$odds2["h49"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h49"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MU99"/>\'+
        \'</td>\'+

    \'</tr>\'+
\'</table>\'+
\'</div>\'+
\'<div id="SendB3">\'+
    \'<span class="credit">下注金额:<b id="total_bet">0.00</b></span>\'+
    \'<input type="button" name="Cancel" value="取消" class="cancel_cen"/>&nbsp;&nbsp;\'+
    \'<input type="button" name="SubmitA" value="确定" class="order"/>\'+
    \'</div>\'+
\'</form>\';
document.getElementById("c_rtype").innerHTML = "佰个定位";
document.getElementById("sRtype").value = "D2MU";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "佰个定位";
}

$("#YearNum").text("'.$qishu.'");
(self.GameB3.install) && self.GameB3.install();
';