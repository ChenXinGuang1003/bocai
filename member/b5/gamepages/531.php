<?php

$odds1 = odds_lottery_normal::getOddsByPart($lottery_name,"拾个定位","part1");
$odds2 = odds_lottery_normal::getOddsByPart($lottery_name,"拾个定位","part2");

echo '
document.getElementById("Game").innerHTML = \'<form id="formB5" name="D3_018" action="/member/quickB5_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="531"/>\'+
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
        \'<label for="531-00">\'+
            \'00\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-00"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-00" class="odds">\'+
            \''.$odds1["h0"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h0"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-00"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-01">\'+
            \'01\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-01"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-01" class="odds">\'+
            \''.$odds1["h1"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h1"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-01"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-02">\'+
            \'02\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-02"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-02" class="odds">\'+
            \''.$odds1["h2"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h2"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-02"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-03">\'+
            \'03\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-03"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-03" class="odds">\'+
            \''.$odds1["h3"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h3"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-03"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-04">\'+
            \'04\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-04"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-04" class="odds">\'+
            \''.$odds1["h4"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h4"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-04"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-05">\'+
            \'05\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-05"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-05" class="odds">\'+
            \''.$odds1["h5"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h5"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-05"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-06">\'+
            \'06\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-06"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-06" class="odds">\'+
            \''.$odds1["h6"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h6"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-06"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-07">\'+
            \'07\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-07"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-07" class="odds">\'+
            \''.$odds1["h7"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h7"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-07"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-08">\'+
            \'08\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-08"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-08" class="odds">\'+
            \''.$odds1["h8"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h8"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-08"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-09">\'+
            \'09\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-09"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-09" class="odds">\'+
            \''.$odds1["h9"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h9"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-09"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-10">\'+
            \'10\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-10"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-10" class="odds">\'+
            \''.$odds1["h10"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h10"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-10"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-11">\'+
            \'11\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-11"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-11" class="odds">\'+
            \''.$odds1["h11"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h11"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-11"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-12">\'+
            \'12\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-12"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-12" class="odds">\'+
            \''.$odds1["h12"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h12"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-12"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-13">\'+
            \'13\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-13"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-13" class="odds">\'+
            \''.$odds1["h13"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h13"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-13"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-14">\'+
            \'14\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-14"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-14" class="odds">\'+
            \''.$odds1["h14"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h14"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-14"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-15">\'+
            \'15\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-15"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-15" class="odds">\'+
            \''.$odds1["h15"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h15"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-15"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-16">\'+
            \'16\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-16"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-16" class="odds">\'+
            \''.$odds1["h16"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h16"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-16"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-17">\'+
            \'17\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-17"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-17" class="odds">\'+
            \''.$odds1["h17"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h17"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-17"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-18">\'+
            \'18\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-18"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-18" class="odds">\'+
            \''.$odds1["h18"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h18"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-18"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-19">\'+
            \'19\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-19"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-19" class="odds">\'+
            \''.$odds1["h18"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h18"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-19"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-20">\'+
            \'20\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-20"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-20" class="odds">\'+
            \''.$odds1["h20"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h20"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-20"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-21">\'+
            \'21\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-21"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-21" class="odds">\'+
            \''.$odds1["h21"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h21"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-21"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-22">\'+
            \'22\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-22"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-22" class="odds">\'+
            \''.$odds1["h22"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h22"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-22"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-23">\'+
            \'23\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-23"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-23" class="odds">\'+
            \''.$odds1["h23"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h23"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-23"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-24">\'+
            \'24\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-24"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-24" class="odds">\'+
            \''.$odds1["h24"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h24"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-24"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-25">\'+
            \'25\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-25"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-25" class="odds">\'+
            \''.$odds1["h25"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h25"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-25"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-26">\'+
            \'26\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-26"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-26" class="odds">\'+
            \''.$odds1["h26"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h26"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-26"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-27">\'+
            \'27\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-27"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-27" class="odds">\'+
            \''.$odds1["h27"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h27"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-27"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-28">\'+
            \'28\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-28"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-28" class="odds">\'+
            \''.$odds1["h28"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h28"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-28"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-29">\'+
            \'29\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-29"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-29" class="odds">\'+
            \''.$odds1["h29"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h29"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-29"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-30">\'+
            \'30\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-30"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-30" class="odds">\'+
            \''.$odds1["h30"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h30"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-30"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-31">\'+
            \'31\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-31"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-31" class="odds">\'+
            \''.$odds1["h31"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h31"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-31"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-32">\'+
            \'32\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-32"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-32" class="odds">\'+
            \''.$odds1["h32"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h32"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-32"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-33">\'+
            \'33\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-33"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-33" class="odds">\'+
            \''.$odds1["h33"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h33"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-33"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-34">\'+
            \'34\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-34"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-34" class="odds">\'+
            \''.$odds1["h34"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h34"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-34"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-35">\'+
            \'35\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-35"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-35" class="odds">\'+
            \''.$odds1["h35"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h35"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-35"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-36">\'+
            \'36\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-36"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-36" class="odds">\'+
            \''.$odds1["h36"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h36"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-36"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-37">\'+
            \'37\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-37"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-37" class="odds">\'+
            \''.$odds1["h37"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h37"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-37"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-38">\'+
            \'38\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-38"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-38" class="odds">\'+
            \''.$odds1["h38"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h38"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-38"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-39">\'+
            \'39\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-39"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-39" class="odds">\'+
            \''.$odds1["h39"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h39"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-39"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-40">\'+
            \'40\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-40"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-40" class="odds">\'+
            \''.$odds1["h40"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h40"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-40"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-41">\'+
            \'41\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-41"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-41" class="odds">\'+
            \''.$odds1["h41"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h41"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-41"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-42">\'+
            \'42\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-42"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-42" class="odds">\'+
            \''.$odds1["h42"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h42"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-42"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-43">\'+
            \'43\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-43"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-43" class="odds">\'+
            \''.$odds1["h43"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h43"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-43"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-44">\'+
            \'44\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-44"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-44" class="odds">\'+
            \''.$odds1["h44"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h44"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-44"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-45">\'+
            \'45\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-45"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-45" class="odds">\'+
            \''.$odds1["h45"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h45"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-45"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-46">\'+
            \'46\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-46"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-46" class="odds">\'+
            \''.$odds1["h46"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h46"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-46"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-47">\'+
            \'47\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-47"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-47" class="odds">\'+
            \''.$odds1["h47"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h47"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-47"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-48">\'+
            \'48\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-48"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-48" class="odds">\'+
            \''.$odds1["h48"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h48"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-48"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-49">\'+
            \'49\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-49"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-49" class="odds">\'+
            \''.$odds1["h49"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h49"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-49"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-50">\'+
            \'50\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-50"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-50" class="odds">\'+
            \''.$odds2["h0"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h0"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-50"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-51">\'+
            \'51\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-51"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-51" class="odds">\'+
            \''.$odds2["h1"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h1"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-51"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-52">\'+
            \'52\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-52"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-52" class="odds">\'+
            \''.$odds2["h2"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h2"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-52"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-53">\'+
            \'53\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-53"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-53" class="odds">\'+
            \''.$odds2["h3"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h3"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-53"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-54">\'+
            \'54\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-54"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-54" class="odds">\'+
            \''.$odds2["h4"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h4"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-54"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-55">\'+
            \'55\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-55"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-55" class="odds">\'+
            \''.$odds2["h5"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h5"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-55"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-56">\'+
            \'56\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-56"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-56" class="odds">\'+
            \''.$odds2["h6"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h6"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-56"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-57">\'+
            \'57\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-57"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-57" class="odds">\'+
            \''.$odds2["h7"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h7"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-57"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-58">\'+
            \'58\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-58"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-58" class="odds">\'+
            \''.$odds2["h8"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h8"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-58"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-59">\'+
            \'59\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-59"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-59" class="odds">\'+
            \''.$odds2["h9"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h9"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-59"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-60">\'+
            \'60\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-60"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-60" class="odds">\'+
            \''.$odds2["h10"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h10"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-60"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-61">\'+
            \'61\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-61"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-61" class="odds">\'+
            \''.$odds2["h11"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h11"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-61"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-62">\'+
            \'62\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-62"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-62" class="odds">\'+
            \''.$odds2["h12"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h12"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-62"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-63">\'+
            \'63\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-63"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-63" class="odds">\'+
            \''.$odds2["h13"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h13"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-63"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-64">\'+
            \'64\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-64"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-64" class="odds">\'+
            \''.$odds2["h14"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h14"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-64"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-65">\'+
            \'65\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-65"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-65" class="odds">\'+
            \''.$odds2["h15"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h15"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-65"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-66">\'+
            \'66\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-66"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-66" class="odds">\'+
            \''.$odds2["h16"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h16"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-66"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-67">\'+
            \'67\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-67"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-67" class="odds">\'+
            \''.$odds2["h17"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h17"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-67"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-68">\'+
            \'68\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-68"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-68" class="odds">\'+
            \''.$odds2["h18"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h18"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-68"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-69">\'+
            \'69\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-69"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-69" class="odds">\'+
            \''.$odds2["h19"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h19"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-69"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-70">\'+
            \'70\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-70"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-70" class="odds">\'+
            \''.$odds2["h20"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h20"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-70"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-71">\'+
            \'71\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-71"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-71" class="odds">\'+
            \''.$odds2["h21"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h21"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-71"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-72">\'+
            \'72\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-72"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-72" class="odds">\'+
            \''.$odds2["h22"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h22"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-72"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-73">\'+
            \'73\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-73"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-73" class="odds">\'+
            \''.$odds2["h23"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h23"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-73"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-74">\'+
            \'74\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-74"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-74" class="odds">\'+
            \''.$odds2["h24"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h24"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-74"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-75">\'+
            \'75\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-75"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-75" class="odds">\'+
            \''.$odds2["h25"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h25"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-75"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-76">\'+
            \'76\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-76"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-76" class="odds">\'+
            \''.$odds2["h26"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h26"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-76"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-77">\'+
            \'77\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-77"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-77" class="odds">\'+
            \''.$odds2["h27"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h27"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-77"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-78">\'+
            \'78\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-78"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-78" class="odds">\'+
            \''.$odds2["h28"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h28"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-78"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-79">\'+
            \'79\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-79"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-79" class="odds">\'+
            \''.$odds2["h29"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h29"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-79"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-80">\'+
            \'80\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-80"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-80" class="odds">\'+
            \''.$odds2["h30"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h30"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-80"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-81">\'+
            \'81\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-81"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-81" class="odds">\'+
            \''.$odds2["h31"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h31"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-81"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-82">\'+
            \'82\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-82"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-82" class="odds">\'+
            \''.$odds2["h32"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h32"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-82"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-83">\'+
            \'83\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-83"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-83" class="odds">\'+
            \''.$odds2["h33"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h33"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-83"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-84">\'+
            \'84\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-84"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-84" class="odds">\'+
            \''.$odds2["h34"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h34"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-84"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-85">\'+
            \'85\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-85"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-85" class="odds">\'+
            \''.$odds2["h35"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h35"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-85"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-86">\'+
            \'86\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-86"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-86" class="odds">\'+
            \''.$odds2["h36"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h36"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-86"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-87">\'+
            \'87\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-87"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-87" class="odds">\'+
            \''.$odds2["h37"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h37"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-87"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-88">\'+
            \'88\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-88"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-88" class="odds">\'+
            \''.$odds2["h38"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h38"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-88"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-89">\'+
            \'89\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-89"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-89" class="odds">\'+
            \''.$odds2["h39"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h39"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-89"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-90">\'+
            \'90\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-90"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-90" class="odds">\'+
            \''.$odds2["h40"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h40"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-90"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-91">\'+
            \'91\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-91"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-91" class="odds">\'+
            \''.$odds2["h41"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h41"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-91"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-92">\'+
            \'92\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-92"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-92" class="odds">\'+
            \''.$odds2["h42"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h42"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-92"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-93">\'+
            \'93\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-93"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-93" class="odds">\'+
            \''.$odds2["h43"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h43"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-93"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-94">\'+
            \'94\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-94"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-94" class="odds">\'+
            \''.$odds2["h44"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h44"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-94"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-95">\'+
            \'95\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-95"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-95" class="odds">\'+
            \''.$odds2["h45"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h45"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-95"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-96">\'+
            \'96\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-96"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-96" class="odds">\'+
            \''.$odds2["h46"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h46"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-96"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-97">\'+
            \'97\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-97"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-97" class="odds">\'+
            \''.$odds2["h47"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h47"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-97"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-98">\'+
            \'98\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-98"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-98" class="odds">\'+
            \''.$odds2["h48"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h48"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-98"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="531-99">\'+
            \'99\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="531-99"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="531-99" class="odds">\'+
            \''.$odds2["h49"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h49"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="531-99"/>\'+
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
document.getElementById("c_rtype").innerHTML = "拾个定位";
document.getElementById("sRtype").value = "531";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "拾个定位";
}

$("#YearNum").text("'.$qishu.'");
(self.GameB5.install) && self.GameB5.install();
';