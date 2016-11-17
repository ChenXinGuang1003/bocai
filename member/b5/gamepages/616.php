<?php

$odds = odds_lottery_normal::getOdds($lottery_name,"(前三)二字组合");

echo '
document.getElementById("Game").innerHTML = \'<form id="formB5" name="D3_018" action="/member/quickB5_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="616"/>\'+
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
        \'<label for="616-00">\'+
            \'00\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-00"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-00" class="odds">\'+
            \''.$odds["h0"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h0"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-00"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-01">\'+
            \'01\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-01"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-01" class="odds">\'+
            \''.$odds["h1"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h1"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-01"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-02">\'+
            \'02\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-02"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-02" class="odds">\'+
            \''.$odds["h2"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h2"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-02"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-03">\'+
            \'03\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-03"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-03" class="odds">\'+
            \''.$odds["h3"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h3"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-03"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-04">\'+
            \'04\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-04"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-04" class="odds">\'+
            \''.$odds["h4"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h4"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-04"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-05">\'+
            \'05\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-05"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-05" class="odds">\'+
            \''.$odds["h5"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h5"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-05"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-06">\'+
            \'06\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-06"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-06" class="odds">\'+
            \''.$odds["h6"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h6"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-06"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-07">\'+
            \'07\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-07"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-07" class="odds">\'+
            \''.$odds["h7"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h7"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-07"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-08">\'+
            \'08\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-08"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-08" class="odds">\'+
            \''.$odds["h8"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h8"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-08"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-09">\'+
            \'09\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-09"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-09" class="odds">\'+
            \''.$odds["h9"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h9"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-09"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-11">\'+
            \'11\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-11"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-11" class="odds">\'+
            \''.$odds["h10"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h10"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-11"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-12">\'+
            \'12\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-12"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-12" class="odds">\'+
            \''.$odds["h11"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h11"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-12"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-13">\'+
            \'13\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-13"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-13" class="odds">\'+
            \''.$odds["h12"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h12"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-13"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-14">\'+
            \'14\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-14"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-14" class="odds">\'+
            \''.$odds["h13"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h13"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-14"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-15">\'+
            \'15\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-15"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-15" class="odds">\'+
            \''.$odds["h14"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h14"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-15"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-16">\'+
            \'16\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-16"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-16" class="odds">\'+
            \''.$odds["h15"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h15"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-16"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-17">\'+
            \'17\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-17"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-17" class="odds">\'+
            \''.$odds["h16"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h16"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-17"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-18">\'+
            \'18\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-18"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-18" class="odds">\'+
            \''.$odds["h17"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h17"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-18"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-19">\'+
            \'19\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-19"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-19" class="odds">\'+
            \''.$odds["h18"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h18"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-19"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-22">\'+
            \'22\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-22"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-22" class="odds">\'+
            \''.$odds["h19"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h19"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-22"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-23">\'+
            \'23\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-23"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-23" class="odds">\'+
            \''.$odds["h20"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h20"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-23"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-24">\'+
            \'24\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-24"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-24" class="odds">\'+
            \''.$odds["h21"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h21"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-24"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-25">\'+
            \'25\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-25"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-25" class="odds">\'+
            \''.$odds["h22"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h22"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-25"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-26">\'+
            \'26\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-26"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-26" class="odds">\'+
            \''.$odds["h23"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h23"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-26"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-27">\'+
            \'27\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-27"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-27" class="odds">\'+
            \''.$odds["h24"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h24"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-27"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-28">\'+
            \'28\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-28"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-28" class="odds">\'+
            \''.$odds["h25"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h25"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-28"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-29">\'+
            \'29\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-29"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-29" class="odds">\'+
            \''.$odds["h26"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h26"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-29"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-33">\'+
            \'33\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-33"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-33" class="odds">\'+
            \''.$odds["h27"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h27"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-33"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-34">\'+
            \'34\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-34"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-34" class="odds">\'+
            \''.$odds["h28"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h28"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-34"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-35">\'+
            \'35\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-35"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-35" class="odds">\'+
            \''.$odds["h29"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h29"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-35"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-36">\'+
            \'36\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-36"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-36" class="odds">\'+
            \''.$odds["h30"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h30"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-36"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-37">\'+
            \'37\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-37"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-37" class="odds">\'+
            \''.$odds["h31"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h31"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-37"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-38">\'+
            \'38\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-38"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-38" class="odds">\'+
            \''.$odds["h32"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h32"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-38"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-39">\'+
            \'39\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-39"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-39" class="odds">\'+
            \''.$odds["h33"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h33"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-39"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-44">\'+
            \'44\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-44"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-44" class="odds">\'+
            \''.$odds["h34"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h34"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-44"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-45">\'+
            \'45\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-45"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-45" class="odds">\'+
            \''.$odds["h35"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h35"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-45"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-46">\'+
            \'46\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-46"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-46" class="odds">\'+
            \''.$odds["h36"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h36"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-46"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-47">\'+
            \'47\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-47"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-47" class="odds">\'+
            \''.$odds["h37"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h37"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-47"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-48">\'+
            \'48\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-48"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-48" class="odds">\'+
            \''.$odds["h38"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h38"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-48"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-49">\'+
            \'49\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-49"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-49" class="odds">\'+
            \''.$odds["h39"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h39"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-49"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-55">\'+
            \'55\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-55"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-55" class="odds">\'+
            \''.$odds["h40"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h40"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-55"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-56">\'+
            \'56\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-56"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-56" class="odds">\'+
            \''.$odds["h41"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h41"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-56"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-57">\'+
            \'57\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-57"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-57" class="odds">\'+
            \''.$odds["h42"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h42"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-57"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-58">\'+
            \'58\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-58"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-58" class="odds">\'+
            \''.$odds["h43"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h43"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-58"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-59">\'+
            \'59\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-59"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-59" class="odds">\'+
            \''.$odds["h44"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h44"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-59"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-66">\'+
            \'66\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-66"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-66" class="odds">\'+
            \''.$odds["h45"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h45"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-66"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-67">\'+
            \'67\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-67"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-67" class="odds">\'+
            \''.$odds["h46"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h46"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-67"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-68">\'+
            \'68\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-68"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-68" class="odds">\'+
            \''.$odds["h47"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h47"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-68"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-69">\'+
            \'69\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-69"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-69" class="odds">\'+
            \''.$odds["h48"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h48"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-69"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-77">\'+
            \'77\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-77"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-77" class="odds">\'+
            \''.$odds["h49"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h49"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-77"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-78">\'+
            \'78\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-78"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-78" class="odds">\'+
            \''.$odds["h50"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h50"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-78"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-79">\'+
            \'79\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-79"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-79" class="odds">\'+
            \''.$odds["h51"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h51"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-79"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-88">\'+
            \'88\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-88"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-88" class="odds">\'+
            \''.$odds["h52"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h52"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-88"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-89">\'+
            \'89\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-89"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-89" class="odds">\'+
            \''.$odds["h53"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h53"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-89"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="616-99">\'+
            \'99\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="616-99"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="616-99" class="odds">\'+
            \''.$odds["h54"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h54"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="616-99"/>\'+
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
document.getElementById("c_rtype").innerHTML = "(前三)二字组合";
document.getElementById("sRtype").value = "616";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "(前三)二字组合";
}

$("#YearNum").text("'.$qishu.'");
(self.GameB5.install) && self.GameB5.install();
';