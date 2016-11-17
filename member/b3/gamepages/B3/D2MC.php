<?php

$odds1 = odds_lottery_normal::getOddsByPart($lottery_name,"佰拾定位","part1");
$odds2 = odds_lottery_normal::getOddsByPart($lottery_name,"佰拾定位","part2");

echo '
document.getElementById("Game").innerHTML = \'<form id="formB3" name="D3_018" action="/member/quickB3_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="D2MC"/>\'+
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
        \'<label for="D2MC00">\'+
            \'00X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC00"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC00" class="odds">\'+
            \''.$odds1["h0"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h0"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC00"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC01">\'+
            \'01X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC01"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC01" class="odds">\'+
            \''.$odds1["h1"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h1"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC01"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC02">\'+
            \'02X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC02"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC02" class="odds">\'+
            \''.$odds1["h2"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h2"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC02"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC03">\'+
            \'03X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC03"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC03" class="odds">\'+
            \''.$odds1["h3"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h3"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC03"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC04">\'+
            \'04X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC04"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC04" class="odds">\'+
            \''.$odds1["h4"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h4"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC04"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC05">\'+
            \'05X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC05"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC05" class="odds">\'+
            \''.$odds1["h5"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h5"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC05"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC06">\'+
            \'06X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC06"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC06" class="odds">\'+
            \''.$odds1["h6"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h6"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC06"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC07">\'+
            \'07X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC07"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC07" class="odds">\'+
            \''.$odds1["h7"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h7"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC07"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC08">\'+
            \'08X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC08"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC08" class="odds">\'+
            \''.$odds1["h8"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h8"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC08"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC09">\'+
            \'09X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC09"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC09" class="odds">\'+
            \''.$odds1["h9"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h9"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC09"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC10">\'+
            \'10X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC10"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC10" class="odds">\'+
            \''.$odds1["h10"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h10"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC10"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC11">\'+
            \'11X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC11"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC11" class="odds">\'+
            \''.$odds1["h11"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h11"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC11"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC12">\'+
            \'12X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC12"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC12" class="odds">\'+
            \''.$odds1["h12"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h12"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC12"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC13">\'+
            \'13X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC13"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC13" class="odds">\'+
            \''.$odds1["h13"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h13"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC13"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC14">\'+
            \'14X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC14"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC14" class="odds">\'+
            \''.$odds1["h14"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h14"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC14"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC15">\'+
            \'15X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC15"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC15" class="odds">\'+
            \''.$odds1["h15"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h15"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC15"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC16">\'+
            \'16X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC16"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC16" class="odds">\'+
            \''.$odds1["h16"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h16"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC16"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC17">\'+
            \'17X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC17"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC17" class="odds">\'+
            \''.$odds1["h17"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h17"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC17"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC18">\'+
            \'18X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC18"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC18" class="odds">\'+
            \''.$odds1["h18"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h18"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC18"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC19">\'+
            \'19X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC19"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC19" class="odds">\'+
            \''.$odds1["h19"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h19"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC19"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC20">\'+
            \'20X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC20"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC20" class="odds">\'+
            \''.$odds1["h20"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h20"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC20"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC21">\'+
            \'21X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC21"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC21" class="odds">\'+
            \''.$odds1["h21"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h21"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC21"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC22">\'+
            \'22X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC22"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC22" class="odds">\'+
            \''.$odds1["h22"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h22"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC22"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC23">\'+
            \'23X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC23"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC23" class="odds">\'+
            \''.$odds1["h23"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h23"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC23"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC24">\'+
            \'24X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC24"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC24" class="odds">\'+
            \''.$odds1["h24"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h24"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC24"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC25">\'+
            \'25X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC25"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC25" class="odds">\'+
            \''.$odds1["h25"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h25"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC25"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC26">\'+
            \'26X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC26"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC26" class="odds">\'+
            \''.$odds1["h26"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h26"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC26"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC27">\'+
            \'27X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC27"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC27" class="odds">\'+
            \''.$odds1["h27"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h27"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC27"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC28">\'+
            \'28X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC28"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC28" class="odds">\'+
            \''.$odds1["h28"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h28"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC28"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC29">\'+
            \'29X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC29"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC29" class="odds">\'+
            \''.$odds1["h29"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h29"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC29"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC30">\'+
            \'30X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC30"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC30" class="odds">\'+
            \''.$odds1["h30"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h30"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC30"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC31">\'+
            \'31X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC31"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC31" class="odds">\'+
            \''.$odds1["h31"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h31"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC31"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC32">\'+
            \'32X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC32"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC32" class="odds">\'+
            \''.$odds1["h32"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h32"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC32"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC33">\'+
            \'33X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC33"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC33" class="odds">\'+
            \''.$odds1["h33"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h33"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC33"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC34">\'+
            \'34X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC34"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC34" class="odds">\'+
            \''.$odds1["h34"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h34"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC34"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC35">\'+
            \'35X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC35"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC35" class="odds">\'+
            \''.$odds1["h35"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h35"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC35"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC36">\'+
            \'36X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC36"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC36" class="odds">\'+
            \''.$odds1["h36"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h36"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC36"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC37">\'+
            \'37X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC37"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC37" class="odds">\'+
            \''.$odds1["h37"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h37"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC37"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC38">\'+
            \'38X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC38"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC38" class="odds">\'+
            \''.$odds1["h38"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h38"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC38"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC39">\'+
            \'39X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC39"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC39" class="odds">\'+
            \''.$odds1["h39"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h39"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC39"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC40">\'+
            \'40X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC40"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC40" class="odds">\'+
            \''.$odds1["h40"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h40"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC40"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC41">\'+
            \'41X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC41"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC41" class="odds">\'+
            \''.$odds1["h41"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h41"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC41"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC42">\'+
            \'42X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC42"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC42" class="odds">\'+
            \''.$odds1["h42"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h42"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC42"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC43">\'+
            \'43X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC43"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC43" class="odds">\'+
            \''.$odds1["h43"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h43"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC43"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC44">\'+
            \'44X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC44"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC44" class="odds">\'+
            \''.$odds1["h44"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h44"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC44"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC45">\'+
            \'45X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC45"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC45" class="odds">\'+
            \''.$odds1["h45"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h45"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC45"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC46">\'+
            \'46X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC46"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC46" class="odds">\'+
            \''.$odds1["h46"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h46"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC46"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC47">\'+
            \'47X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC47"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC47" class="odds">\'+
            \''.$odds1["h47"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h47"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC47"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC48">\'+
            \'48X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC48"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC48" class="odds">\'+
            \''.$odds1["h48"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h48"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC48"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC49">\'+
            \'49X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC49"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC49" class="odds">\'+
            \''.$odds1["h49"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds1["h49"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC49"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC50">\'+
            \'50X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC50"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC50" class="odds">\'+
            \''.$odds2["h0"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h0"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC50"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC51">\'+
            \'51X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC51"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC51" class="odds">\'+
            \''.$odds2["h1"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h1"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC51"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC52">\'+
            \'52X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC52"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC52" class="odds">\'+
            \''.$odds2["h2"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h2"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC52"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC53">\'+
            \'53X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC53"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC53" class="odds">\'+
            \''.$odds2["h3"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h3"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC53"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC54">\'+
            \'54X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC54"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC54" class="odds">\'+
            \''.$odds2["h4"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h4"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC54"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC55">\'+
            \'55X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC55"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC55" class="odds">\'+
            \''.$odds2["h5"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h5"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC55"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC56">\'+
            \'56X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC56"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC56" class="odds">\'+
            \''.$odds2["h6"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h6"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC56"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC57">\'+
            \'57X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC57"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC57" class="odds">\'+
            \''.$odds2["h7"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h7"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC57"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC58">\'+
            \'58X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC58"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC58" class="odds">\'+
            \''.$odds2["h8"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h8"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC58"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC59">\'+
            \'59X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC59"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC59" class="odds">\'+
            \''.$odds2["h9"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h9"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC59"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC60">\'+
            \'60X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC60"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC60" class="odds">\'+
            \''.$odds2["h10"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h10"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC60"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC61">\'+
            \'61X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC61"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC61" class="odds">\'+
            \''.$odds2["h11"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h11"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC61"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC62">\'+
            \'62X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC62"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC62" class="odds">\'+
            \''.$odds2["h12"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h12"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC62"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC63">\'+
            \'63X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC63"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC63" class="odds">\'+
            \''.$odds2["h13"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h13"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC63"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC64">\'+
            \'64X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC64"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC64" class="odds">\'+
            \''.$odds2["h14"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h14"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC64"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC65">\'+
            \'65X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC65"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC65" class="odds">\'+
            \''.$odds2["h15"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h15"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC65"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC66">\'+
            \'66X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC66"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC66" class="odds">\'+
            \''.$odds2["h16"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h16"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC66"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC67">\'+
            \'67X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC67"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC67" class="odds">\'+
            \''.$odds2["h17"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h17"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC67"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC68">\'+
            \'68X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC68"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC68" class="odds">\'+
            \''.$odds2["h18"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h18"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC68"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC69">\'+
            \'69X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC69"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC69" class="odds">\'+
            \''.$odds2["h19"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h19"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC69"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC70">\'+
            \'70X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC70"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC70" class="odds">\'+
            \''.$odds2["h20"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h20"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC70"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC71">\'+
            \'71X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC71"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC71" class="odds">\'+
            \''.$odds2["h21"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h21"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC71"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC72">\'+
            \'72X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC72"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC72" class="odds">\'+
            \''.$odds2["h22"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h22"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC72"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC73">\'+
            \'73X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC73"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC73" class="odds">\'+
            \''.$odds2["h23"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h23"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC73"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC74">\'+
            \'74X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC74"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC74" class="odds">\'+
            \''.$odds2["h24"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h24"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC74"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC75">\'+
            \'75X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC75"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC75" class="odds">\'+
            \''.$odds2["h25"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h25"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC75"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC76">\'+
            \'76X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC76"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC76" class="odds">\'+
            \''.$odds2["h26"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h26"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC76"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC77">\'+
            \'77X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC77"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC77" class="odds">\'+
            \''.$odds2["h27"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h27"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC77"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC78">\'+
            \'78X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC78"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC78" class="odds">\'+
            \''.$odds2["h28"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h28"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC78"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC79">\'+
            \'79X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC79"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC79" class="odds">\'+
            \''.$odds2["h29"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h29"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC79"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC80">\'+
            \'80X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC80"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC80" class="odds">\'+
            \''.$odds2["h30"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h30"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC80"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC81">\'+
            \'81X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC81"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC81" class="odds">\'+
            \''.$odds2["h31"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h31"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC81"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC82">\'+
            \'82X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC82"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC82" class="odds">\'+
            \''.$odds2["h32"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h32"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC82"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC83">\'+
            \'83X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC83"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC83" class="odds">\'+
            \''.$odds2["h33"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h33"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC83"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC84">\'+
            \'84X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC84"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC84" class="odds">\'+
            \''.$odds2["h34"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h34"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC84"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC85">\'+
            \'85X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC85"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC85" class="odds">\'+
            \''.$odds2["h35"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h35"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC85"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC86">\'+
            \'86X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC86"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC86" class="odds">\'+
            \''.$odds2["h36"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h36"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC86"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC87">\'+
            \'87X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC87"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC87" class="odds">\'+
            \''.$odds2["h37"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h37"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC87"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC88">\'+
            \'88X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC88"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC88" class="odds">\'+
            \''.$odds2["h38"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h38"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC88"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC89">\'+
            \'89X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC89"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC89" class="odds">\'+
            \''.$odds2["h39"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h39"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC89"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC90">\'+
            \'90X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC90"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC90" class="odds">\'+
            \''.$odds2["h40"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h40"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC90"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC91">\'+
            \'91X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC91"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC91" class="odds">\'+
            \''.$odds2["h41"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h41"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC91"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC92">\'+
            \'92X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC92"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC92" class="odds">\'+
            \''.$odds2["h42"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h42"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC92"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC93">\'+
            \'93X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC93"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC93" class="odds">\'+
            \''.$odds2["h43"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h43"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC93"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC94">\'+
            \'94X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC94"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC94" class="odds">\'+
            \''.$odds2["h44"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h44"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC94"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC95">\'+
            \'95X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC95"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC95" class="odds">\'+
            \''.$odds2["h45"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h45"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC95"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC96">\'+
            \'96X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC96"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC96" class="odds">\'+
            \''.$odds2["h46"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h46"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC96"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC97">\'+
            \'97X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC97"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC97" class="odds">\'+
            \''.$odds2["h47"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h47"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC97"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC98">\'+
            \'98X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC98"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC98" class="odds">\'+
            \''.$odds2["h48"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h48"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC98"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MC99">\'+
            \'99X\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="D2MC99"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="D2MC99" class="odds">\'+
            \''.$odds2["h49"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds2["h49"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="D2MC99"/>\'+
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
document.getElementById("c_rtype").innerHTML = "佰拾定位";
document.getElementById("sRtype").value = "D2MC";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "佰拾定位";
}

$("#YearNum").text("'.$qishu.'");
(self.GameB3.install) && self.GameB3.install();
';