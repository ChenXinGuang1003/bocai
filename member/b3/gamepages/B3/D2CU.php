<?php

$odds1 = odds_lottery_normal::getOddsByPart($lottery_name,"拾个定位","part1");
$odds2 = odds_lottery_normal::getOddsByPart($lottery_name,"拾个定位","part2");

echo '
document.getElementById("Game").innerHTML = \'<form id="formB3" name="D3_018" action="/member/quickB3_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="D2CU"/>\'+
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
        \'<label for="D2CU00">\'+
            \'X00\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU00"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU00" class="odds">\'+
            \''.$odds1["h0"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h0"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU00"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU01">\'+
            \'X01\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU01"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU01" class="odds">\'+
            \''.$odds1["h1"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h1"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU01"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU02">\'+
            \'X02\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU02"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU02" class="odds">\'+
            \''.$odds1["h2"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h2"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU02"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU03">\'+
            \'X03\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU03"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU03" class="odds">\'+
            \''.$odds1["h3"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h3"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU03"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU04">\'+
            \'X04\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU04"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU04" class="odds">\'+
            \''.$odds1["h4"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h4"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU04"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU05">\'+
            \'X05\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU05"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU05" class="odds">\'+
            \''.$odds1["h5"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h5"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU05"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU06">\'+
            \'X06\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU06"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU06" class="odds">\'+
            \''.$odds1["h6"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h6"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU06"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU07">\'+
            \'X07\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU07"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU07" class="odds">\'+
            \''.$odds1["h7"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h7"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU07"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU08">\'+
            \'X08\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU08"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU08" class="odds">\'+
            \''.$odds1["h8"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h8"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU08"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU09">\'+
            \'X09\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU09"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU09" class="odds">\'+
            \''.$odds1["h9"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h9"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU09"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU10">\'+
            \'X10\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU10"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU10" class="odds">\'+
            \''.$odds1["h10"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h10"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU10"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU11">\'+
            \'X11\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU11"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU11" class="odds">\'+
            \''.$odds1["h11"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h11"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU11"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU12">\'+
            \'X12\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU12"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU12" class="odds">\'+
            \''.$odds1["h12"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h12"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU12"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU13">\'+
            \'X13\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU13"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU13" class="odds">\'+
            \''.$odds1["h13"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h13"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU13"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU14">\'+
            \'X14\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU14"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU14" class="odds">\'+
            \''.$odds1["h14"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h14"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU14"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU15">\'+
            \'X15\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU15"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU15" class="odds">\'+
            \''.$odds1["h15"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h15"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU15"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU16">\'+
            \'X16\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU16"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU16" class="odds">\'+
            \''.$odds1["h16"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h16"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU16"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU17">\'+
            \'X17\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU17"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU17" class="odds">\'+
            \''.$odds1["h17"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h17"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU17"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU18">\'+
            \'X18\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU18"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU18" class="odds">\'+
            \''.$odds1["h18"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h18"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU18"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU19">\'+
            \'X19\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU19"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU19" class="odds">\'+
            \''.$odds1["h19"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h19"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU19"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU20">\'+
            \'X20\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU20"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU20" class="odds">\'+
            \''.$odds1["h20"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h20"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU20"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU21">\'+
            \'X21\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU21"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU21" class="odds">\'+
            \''.$odds1["h21"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h21"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU21"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU22">\'+
            \'X22\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU22"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU22" class="odds">\'+
            \''.$odds1["h22"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h22"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU22"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU23">\'+
            \'X23\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU23"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU23" class="odds">\'+
            \''.$odds1["h23"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h23"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU23"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU24">\'+
            \'X24\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU24"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU24" class="odds">\'+
            \''.$odds1["h24"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h24"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU24"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU25">\'+
            \'X25\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU25"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU25" class="odds">\'+
            \''.$odds1["h25"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h25"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU25"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU26">\'+
            \'X26\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU26"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU26" class="odds">\'+
            \''.$odds1["h26"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h26"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU26"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU27">\'+
            \'X27\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU27"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU27" class="odds">\'+
            \''.$odds1["h27"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h27"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU27"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU28">\'+
            \'X28\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU28"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU28" class="odds">\'+
            \''.$odds1["h28"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h28"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU28"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU29">\'+
            \'X29\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU29"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU29" class="odds">\'+
            \''.$odds1["h29"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h29"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU29"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU30">\'+
            \'X30\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU30"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU30" class="odds">\'+
            \''.$odds1["h30"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h30"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU30"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU31">\'+
            \'X31\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU31"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU31" class="odds">\'+
            \''.$odds1["h31"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h31"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU31"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU32">\'+
            \'X32\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU32"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU32" class="odds">\'+
            \''.$odds1["h32"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h32"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU32"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU33">\'+
            \'X33\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU33"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU33" class="odds">\'+
            \''.$odds1["h33"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h33"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU33"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU34">\'+
            \'X34\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU34"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU34" class="odds">\'+
            \''.$odds1["h34"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h34"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU34"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU35">\'+
            \'X35\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU35"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU35" class="odds">\'+
            \''.$odds1["h35"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h35"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU35"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU36">\'+
            \'X36\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU36"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU36" class="odds">\'+
            \''.$odds1["h36"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h36"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU36"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU37">\'+
            \'X37\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU37"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU37" class="odds">\'+
            \''.$odds1["h37"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h37"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU37"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU38">\'+
            \'X38\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU38"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU38" class="odds">\'+
            \''.$odds1["h38"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h38"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU38"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU39">\'+
            \'X39\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU39"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU39" class="odds">\'+
            \''.$odds1["h39"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h39"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU39"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU40">\'+
            \'X40\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU40"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU40" class="odds">\'+
            \''.$odds1["h40"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h40"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU40"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU41">\'+
            \'X41\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU41"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU41" class="odds">\'+
            \''.$odds1["h41"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h41"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU41"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU42">\'+
            \'X42\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU42"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU42" class="odds">\'+
            \''.$odds1["h42"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h42"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU42"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU43">\'+
            \'X43\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU43"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU43" class="odds">\'+
            \''.$odds1["h43"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h43"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU43"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU44">\'+
            \'X44\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU44"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU44" class="odds">\'+
            \''.$odds1["h44"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h44"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU44"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU45">\'+
            \'X45\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU45"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU45" class="odds">\'+
            \''.$odds1["h45"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h45"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU45"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU46">\'+
            \'X46\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU46"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU46" class="odds">\'+
            \''.$odds1["h46"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h46"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU46"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU47">\'+
            \'X47\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU47"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU47" class="odds">\'+
            \''.$odds1["h47"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h47"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU47"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU48">\'+
            \'X48\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU48"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU48" class="odds">\'+
            \''.$odds1["h48"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h48"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU48"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU49">\'+
            \'X49\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU49"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU49" class="odds">\'+
            \''.$odds1["h49"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h49"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU49"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU50">\'+
            \'X50\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU50"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU50" class="odds">\'+
            \''.$odds2["h0"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h0"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU50"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU51">\'+
            \'X51\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU51"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU51" class="odds">\'+
            \''.$odds2["h1"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h1"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU51"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU52">\'+
            \'X52\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU52"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU52" class="odds">\'+
            \''.$odds2["h2"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h2"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU52"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU53">\'+
            \'X53\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU53"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU53" class="odds">\'+
            \''.$odds2["h3"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h3"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU53"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU54">\'+
            \'X54\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU54"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU54" class="odds">\'+
            \''.$odds2["h4"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h4"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU54"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU55">\'+
            \'X55\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU55"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU55" class="odds">\'+
            \''.$odds2["h5"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h5"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU55"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU56">\'+
            \'X56\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU56"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU56" class="odds">\'+
            \''.$odds2["h6"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h6"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU56"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU57">\'+
            \'X57\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU57"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU57" class="odds">\'+
            \''.$odds2["h7"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h7"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU57"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU58">\'+
            \'X58\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU58"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU58" class="odds">\'+
            \''.$odds2["h8"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h8"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU58"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU59">\'+
            \'X59\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU59"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU59" class="odds">\'+
            \''.$odds2["h9"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h9"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU59"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU60">\'+
            \'X60\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU60"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU60" class="odds">\'+
            \''.$odds2["h10"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h10"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU60"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU61">\'+
            \'X61\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU61"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU61" class="odds">\'+
            \''.$odds2["h11"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h11"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU61"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU62">\'+
            \'X62\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU62"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU62" class="odds">\'+
            \''.$odds2["h12"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h12"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU62"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU63">\'+
            \'X63\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU63"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU63" class="odds">\'+
            \''.$odds2["h13"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h13"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU63"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU64">\'+
            \'X64\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU64"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU64" class="odds">\'+
            \''.$odds2["h14"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h14"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU64"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU65">\'+
            \'X65\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU65"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU65" class="odds">\'+
            \''.$odds2["h15"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h15"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU65"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU66">\'+
            \'X66\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU66"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU66" class="odds">\'+
            \''.$odds2["h16"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h16"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU66"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU67">\'+
            \'X67\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU67"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU67" class="odds">\'+
            \''.$odds2["h17"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h17"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU67"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU68">\'+
            \'X68\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU68"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU68" class="odds">\'+
            \''.$odds2["h18"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h18"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU68"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU69">\'+
            \'X69\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU69"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU69" class="odds">\'+
            \''.$odds2["h19"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h19"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU69"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU70">\'+
            \'X70\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU70"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU70" class="odds">\'+
            \''.$odds2["h20"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h20"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU70"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU71">\'+
            \'X71\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU71"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU71" class="odds">\'+
            \''.$odds2["h21"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h21"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU71"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU72">\'+
            \'X72\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU72"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU72" class="odds">\'+
            \''.$odds2["h22"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h22"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU72"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU73">\'+
            \'X73\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU73"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU73" class="odds">\'+
            \''.$odds2["h23"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h23"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU73"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU74">\'+
            \'X74\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU74"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU74" class="odds">\'+
            \''.$odds2["h24"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h24"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU74"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU75">\'+
            \'X75\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU75"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU75" class="odds">\'+
            \''.$odds2["h25"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h25"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU75"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU76">\'+
            \'X76\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU76"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU76" class="odds">\'+
            \''.$odds2["h26"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h26"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU76"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU77">\'+
            \'X77\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU77"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU77" class="odds">\'+
            \''.$odds2["h27"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h27"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU77"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU78">\'+
            \'X78\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU78"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU78" class="odds">\'+
            \''.$odds2["h28"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h28"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU78"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU79">\'+
            \'X79\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU79"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU79" class="odds">\'+
            \''.$odds2["h29"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h29"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU79"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU80">\'+
            \'X80\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU80"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU80" class="odds">\'+
            \''.$odds2["h30"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h30"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU80"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU81">\'+
            \'X81\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU81"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU81" class="odds">\'+
            \''.$odds2["h31"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h31"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU81"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU82">\'+
            \'X82\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU82"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU82" class="odds">\'+
            \''.$odds2["h32"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h32"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU82"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU83">\'+
            \'X83\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU83"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU83" class="odds">\'+
            \''.$odds2["h33"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h33"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU83"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU84">\'+
            \'X84\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU84"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU84" class="odds">\'+
            \''.$odds2["h34"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h34"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU84"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU85">\'+
            \'X85\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU85"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU85" class="odds">\'+
            \''.$odds2["h35"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h35"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU85"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU86">\'+
            \'X86\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU86"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU86" class="odds">\'+
            \''.$odds2["h36"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h36"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU86"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU87">\'+
            \'X87\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU87"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU87" class="odds">\'+
            \''.$odds2["h37"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h37"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU87"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU88">\'+
            \'X88\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU88"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU88" class="odds">\'+
            \''.$odds2["h38"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h38"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU88"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU89">\'+
            \'X89\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU89"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU89" class="odds">\'+
            \''.$odds2["h39"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h39"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU89"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU90">\'+
            \'X90\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU90"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU90" class="odds">\'+
            \''.$odds2["h40"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h40"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU90"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU91">\'+
            \'X91\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU91"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU91" class="odds">\'+
            \''.$odds2["h41"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h41"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU91"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU92">\'+
            \'X92\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU92"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU92" class="odds">\'+
            \''.$odds2["h42"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h42"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU92"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU93">\'+
            \'X93\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU93"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU93" class="odds">\'+
            \''.$odds2["h43"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h43"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU93"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU94">\'+
            \'X94\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU94"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU94" class="odds">\'+
            \''.$odds2["h44"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h44"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU94"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU95">\'+
            \'X95\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU95"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU95" class="odds">\'+
            \''.$odds2["h45"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h45"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU95"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU96">\'+
            \'X96\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU96"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU96" class="odds">\'+
            \''.$odds2["h46"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h46"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU96"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU97">\'+
            \'X97\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU97"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU97" class="odds">\'+
            \''.$odds2["h47"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h47"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU97"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU98">\'+
            \'X98\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU98"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU98" class="odds">\'+
            \''.$odds2["h48"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h48"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU98"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2CU99">\'+
            \'X99\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2CU99"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2CU99" class="odds">\'+
            \''.$odds2["h49"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h49"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2CU99"/>\'+
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
document.getElementById("c_rtype").innerHTML = "拾个定位";
document.getElementById("sRtype").value = "D2CU";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "拾个定位";
}

$("#YearNum").text("'.$qishu.'");
(self.GameB3.install) && self.GameB3.install();
';