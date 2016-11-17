<?php

$odds1 = odds_lottery_normal::getOddsByPart($lottery_name,"万佰定位","part1");
$odds2 = odds_lottery_normal::getOddsByPart($lottery_name,"万佰定位","part2");

echo '
document.getElementById("Game").innerHTML = \'<form id="formB5" name="D3_018" action="/member/quickB5_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="523"/>\'+
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
        \'<label for="523-00">\'+
            \'00\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-00"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-00" class="odds">\'+
            \''.$odds1["h0"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h0"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-00"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-01">\'+
            \'01\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-01"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-01" class="odds">\'+
            \''.$odds1["h1"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h1"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-01"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-02">\'+
            \'02\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-02"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-02" class="odds">\'+
            \''.$odds1["h2"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h2"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-02"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-03">\'+
            \'03\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-03"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-03" class="odds">\'+
            \''.$odds1["h3"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h3"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-03"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-04">\'+
            \'04\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-04"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-04" class="odds">\'+
            \''.$odds1["h4"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h4"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-04"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-05">\'+
            \'05\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-05"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-05" class="odds">\'+
            \''.$odds1["h5"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h5"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-05"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-06">\'+
            \'06\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-06"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-06" class="odds">\'+
            \''.$odds1["h6"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h6"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-06"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-07">\'+
            \'07\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-07"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-07" class="odds">\'+
            \''.$odds1["h7"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h7"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-07"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-08">\'+
            \'08\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-08"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-08" class="odds">\'+
            \''.$odds1["h8"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h8"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-08"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-09">\'+
            \'09\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-09"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-09" class="odds">\'+
            \''.$odds1["h9"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h9"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-09"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-10">\'+
            \'10\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-10"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-10" class="odds">\'+
            \''.$odds1["h10"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h10"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-10"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-11">\'+
            \'11\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-11"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-11" class="odds">\'+
            \''.$odds1["h11"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h11"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-11"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-12">\'+
            \'12\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-12"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-12" class="odds">\'+
            \''.$odds1["h12"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h12"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-12"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-13">\'+
            \'13\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-13"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-13" class="odds">\'+
            \''.$odds1["h13"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h13"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-13"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-14">\'+
            \'14\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-14"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-14" class="odds">\'+
            \''.$odds1["h14"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h14"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-14"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-15">\'+
            \'15\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-15"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-15" class="odds">\'+
            \''.$odds1["h15"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h15"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-15"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-16">\'+
            \'16\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-16"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-16" class="odds">\'+
            \''.$odds1["h16"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h16"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-16"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-17">\'+
            \'17\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-17"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-17" class="odds">\'+
            \''.$odds1["h17"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h17"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-17"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-18">\'+
            \'18\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-18"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-18" class="odds">\'+
            \''.$odds1["h18"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h18"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-18"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-19">\'+
            \'19\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-19"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-19" class="odds">\'+
            \''.$odds1["h18"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h18"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-19"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-20">\'+
            \'20\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-20"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-20" class="odds">\'+
            \''.$odds1["h20"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h20"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-20"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-21">\'+
            \'21\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-21"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-21" class="odds">\'+
            \''.$odds1["h21"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h21"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-21"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-22">\'+
            \'22\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-22"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-22" class="odds">\'+
            \''.$odds1["h22"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h22"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-22"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-23">\'+
            \'23\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-23"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-23" class="odds">\'+
            \''.$odds1["h23"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h23"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-23"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-24">\'+
            \'24\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-24"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-24" class="odds">\'+
            \''.$odds1["h24"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h24"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-24"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-25">\'+
            \'25\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-25"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-25" class="odds">\'+
            \''.$odds1["h25"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h25"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-25"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-26">\'+
            \'26\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-26"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-26" class="odds">\'+
            \''.$odds1["h26"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h26"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-26"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-27">\'+
            \'27\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-27"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-27" class="odds">\'+
            \''.$odds1["h27"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h27"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-27"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-28">\'+
            \'28\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-28"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-28" class="odds">\'+
            \''.$odds1["h28"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h28"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-28"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-29">\'+
            \'29\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-29"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-29" class="odds">\'+
            \''.$odds1["h29"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h29"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-29"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-30">\'+
            \'30\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-30"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-30" class="odds">\'+
            \''.$odds1["h30"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h30"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-30"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-31">\'+
            \'31\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-31"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-31" class="odds">\'+
            \''.$odds1["h31"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h31"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-31"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-32">\'+
            \'32\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-32"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-32" class="odds">\'+
            \''.$odds1["h32"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h32"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-32"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-33">\'+
            \'33\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-33"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-33" class="odds">\'+
            \''.$odds1["h33"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h33"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-33"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-34">\'+
            \'34\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-34"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-34" class="odds">\'+
            \''.$odds1["h34"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h34"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-34"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-35">\'+
            \'35\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-35"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-35" class="odds">\'+
            \''.$odds1["h35"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h35"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-35"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-36">\'+
            \'36\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-36"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-36" class="odds">\'+
            \''.$odds1["h36"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h36"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-36"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-37">\'+
            \'37\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-37"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-37" class="odds">\'+
            \''.$odds1["h37"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h37"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-37"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-38">\'+
            \'38\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-38"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-38" class="odds">\'+
            \''.$odds1["h38"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h38"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-38"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-39">\'+
            \'39\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-39"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-39" class="odds">\'+
            \''.$odds1["h39"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h39"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-39"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-40">\'+
            \'40\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-40"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-40" class="odds">\'+
            \''.$odds1["h40"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h40"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-40"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-41">\'+
            \'41\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-41"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-41" class="odds">\'+
            \''.$odds1["h41"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h41"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-41"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-42">\'+
            \'42\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-42"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-42" class="odds">\'+
            \''.$odds1["h42"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h42"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-42"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-43">\'+
            \'43\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-43"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-43" class="odds">\'+
            \''.$odds1["h43"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h43"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-43"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-44">\'+
            \'44\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-44"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-44" class="odds">\'+
            \''.$odds1["h44"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h44"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-44"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-45">\'+
            \'45\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-45"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-45" class="odds">\'+
            \''.$odds1["h45"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h45"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-45"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-46">\'+
            \'46\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-46"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-46" class="odds">\'+
            \''.$odds1["h46"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h46"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-46"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-47">\'+
            \'47\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-47"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-47" class="odds">\'+
            \''.$odds1["h47"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h47"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-47"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-48">\'+
            \'48\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-48"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-48" class="odds">\'+
            \''.$odds1["h48"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h48"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-48"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-49">\'+
            \'49\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-49"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-49" class="odds">\'+
            \''.$odds1["h49"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h49"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-49"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-50">\'+
            \'50\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-50"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-50" class="odds">\'+
            \''.$odds2["h0"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h0"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-50"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-51">\'+
            \'51\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-51"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-51" class="odds">\'+
            \''.$odds2["h1"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h1"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-51"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-52">\'+
            \'52\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-52"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-52" class="odds">\'+
            \''.$odds2["h2"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h2"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-52"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-53">\'+
            \'53\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-53"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-53" class="odds">\'+
            \''.$odds2["h3"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h3"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-53"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-54">\'+
            \'54\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-54"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-54" class="odds">\'+
            \''.$odds2["h4"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h4"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-54"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-55">\'+
            \'55\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-55"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-55" class="odds">\'+
            \''.$odds2["h5"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h5"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-55"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-56">\'+
            \'56\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-56"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-56" class="odds">\'+
            \''.$odds2["h6"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h6"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-56"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-57">\'+
            \'57\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-57"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-57" class="odds">\'+
            \''.$odds2["h7"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h7"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-57"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-58">\'+
            \'58\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-58"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-58" class="odds">\'+
            \''.$odds2["h8"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h8"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-58"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-59">\'+
            \'59\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-59"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-59" class="odds">\'+
            \''.$odds2["h9"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h9"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-59"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-60">\'+
            \'60\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-60"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-60" class="odds">\'+
            \''.$odds2["h10"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h10"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-60"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-61">\'+
            \'61\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-61"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-61" class="odds">\'+
            \''.$odds2["h11"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h11"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-61"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-62">\'+
            \'62\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-62"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-62" class="odds">\'+
            \''.$odds2["h12"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h12"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-62"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-63">\'+
            \'63\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-63"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-63" class="odds">\'+
            \''.$odds2["h13"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h13"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-63"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-64">\'+
            \'64\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-64"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-64" class="odds">\'+
            \''.$odds2["h14"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h14"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-64"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-65">\'+
            \'65\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-65"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-65" class="odds">\'+
            \''.$odds2["h15"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h15"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-65"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-66">\'+
            \'66\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-66"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-66" class="odds">\'+
            \''.$odds2["h16"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h16"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-66"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-67">\'+
            \'67\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-67"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-67" class="odds">\'+
            \''.$odds2["h17"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h17"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-67"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-68">\'+
            \'68\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-68"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-68" class="odds">\'+
            \''.$odds2["h18"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h18"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-68"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-69">\'+
            \'69\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-69"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-69" class="odds">\'+
            \''.$odds2["h19"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h19"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-69"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-70">\'+
            \'70\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-70"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-70" class="odds">\'+
            \''.$odds2["h20"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h20"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-70"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-71">\'+
            \'71\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-71"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-71" class="odds">\'+
            \''.$odds2["h21"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h21"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-71"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-72">\'+
            \'72\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-72"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-72" class="odds">\'+
            \''.$odds2["h22"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h22"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-72"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-73">\'+
            \'73\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-73"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-73" class="odds">\'+
            \''.$odds2["h23"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h23"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-73"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-74">\'+
            \'74\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-74"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-74" class="odds">\'+
            \''.$odds2["h24"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h24"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-74"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-75">\'+
            \'75\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-75"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-75" class="odds">\'+
            \''.$odds2["h25"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h25"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-75"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-76">\'+
            \'76\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-76"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-76" class="odds">\'+
            \''.$odds2["h26"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h26"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-76"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-77">\'+
            \'77\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-77"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-77" class="odds">\'+
            \''.$odds2["h27"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h27"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-77"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-78">\'+
            \'78\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-78"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-78" class="odds">\'+
            \''.$odds2["h28"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h28"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-78"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-79">\'+
            \'79\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-79"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-79" class="odds">\'+
            \''.$odds2["h29"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h29"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-79"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-80">\'+
            \'80\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-80"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-80" class="odds">\'+
            \''.$odds2["h30"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h30"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-80"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-81">\'+
            \'81\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-81"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-81" class="odds">\'+
            \''.$odds2["h31"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h31"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-81"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-82">\'+
            \'82\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-82"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-82" class="odds">\'+
            \''.$odds2["h32"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h32"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-82"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-83">\'+
            \'83\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-83"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-83" class="odds">\'+
            \''.$odds2["h33"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h33"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-83"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-84">\'+
            \'84\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-84"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-84" class="odds">\'+
            \''.$odds2["h34"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h34"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-84"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-85">\'+
            \'85\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-85"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-85" class="odds">\'+
            \''.$odds2["h35"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h35"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-85"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-86">\'+
            \'86\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-86"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-86" class="odds">\'+
            \''.$odds2["h36"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h36"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-86"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-87">\'+
            \'87\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-87"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-87" class="odds">\'+
            \''.$odds2["h37"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h37"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-87"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-88">\'+
            \'88\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-88"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-88" class="odds">\'+
            \''.$odds2["h38"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h38"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-88"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-89">\'+
            \'89\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-89"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-89" class="odds">\'+
            \''.$odds2["h39"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h39"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-89"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-90">\'+
            \'90\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-90"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-90" class="odds">\'+
            \''.$odds2["h40"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h40"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-90"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-91">\'+
            \'91\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-91"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-91" class="odds">\'+
            \''.$odds2["h41"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h41"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-91"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-92">\'+
            \'92\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-92"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-92" class="odds">\'+
            \''.$odds2["h42"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h42"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-92"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-93">\'+
            \'93\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-93"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-93" class="odds">\'+
            \''.$odds2["h43"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h43"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-93"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-94">\'+
            \'94\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-94"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-94" class="odds">\'+
            \''.$odds2["h44"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h44"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-94"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-95">\'+
            \'95\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-95"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-95" class="odds">\'+
            \''.$odds2["h45"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h45"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-95"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-96">\'+
            \'96\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-96"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-96" class="odds">\'+
            \''.$odds2["h46"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h46"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-96"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-97">\'+
            \'97\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-97"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-97" class="odds">\'+
            \''.$odds2["h47"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h47"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-97"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-98">\'+
            \'98\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-98"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-98" class="odds">\'+
            \''.$odds2["h48"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h48"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-98"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="523-99">\'+
            \'99\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="523-99"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="523-99" class="odds">\'+
            \''.$odds2["h49"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h49"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="523-99"/>\'+
        \'</td>\'+

    \'</tr>\'+
\'</table>\'+
\'</div>\'+
\'<div id="SendB5">\'+
    \'<span class="credit">下注金额:<b id="total_bet">0.00</b></span>\'+
    \'<input type="button" name="Cancel" value="取消" class="cancel_cen"/>&nbsp;&nbsp;\'+
    \'<input type="button" name="SubmitA" value="确定" class="order"/>\'+
    \'</div>\'+
\'</form>\';
document.getElementById("c_rtype").innerHTML = "万佰定位";
document.getElementById("sRtype").value = "523";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "万佰定位";
}

$("#YearNum").text("'.$qishu.'");
(self.GameB5.install) && self.GameB5.install();
';