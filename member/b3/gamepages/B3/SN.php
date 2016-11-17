<?php

$odds = odds_lottery_normal::getOdds($lottery_name,"和数");

echo '
document.getElementById("Game").innerHTML = \'<form id="formB3" name="D3_018" action="/member/quickB3_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="SN"/>\'+
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
        \'<label for="SN0">\'+
            \'0\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN0"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN0" class="odds">\'+
            \''.$odds["h0"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h0"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN0"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN1">\'+
            \'1\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN1"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN1" class="odds">\'+
            \''.$odds["h1"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h1"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN1"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN2">\'+
            \'2\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN2"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN2" class="odds">\'+
            \''.$odds["h2"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h2"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN2"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN3">\'+
            \'3\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN3"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN3" class="odds">\'+
            \''.$odds["h3"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h3"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN3"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN4">\'+
            \'4\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN4"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN4" class="odds">\'+
            \''.$odds["h4"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h4"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN4"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN5">\'+
            \'5\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN5"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN5" class="odds">\'+
            \''.$odds["h5"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h5"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN5"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN6">\'+
            \'6\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN6"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN6" class="odds">\'+
            \''.$odds["h6"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h6"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN6"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN7">\'+
            \'7\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN7"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN7" class="odds">\'+
            \''.$odds["h7"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h7"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN7"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN8">\'+
            \'8\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN8"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN8" class="odds">\'+
            \''.$odds["h8"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h8"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN8"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN9">\'+
            \'9\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN9"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN9" class="odds">\'+
            \''.$odds["h9"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h9"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN9"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN10">\'+
            \'10\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN10"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN10" class="odds">\'+
            \''.$odds["h10"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h10"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN10"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN11">\'+
            \'11\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN11"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN11" class="odds">\'+
            \''.$odds["h11"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h11"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN11"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN12">\'+
            \'12\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN12"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN12" class="odds">\'+
            \''.$odds["h12"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h12"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN12"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN13">\'+
            \'13\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN13"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN13" class="odds">\'+
            \''.$odds["h13"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h13"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN13"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN14">\'+
            \'14\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN14"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN14" class="odds">\'+
            \''.$odds["h14"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h14"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN14"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN15">\'+
            \'15\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN15"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN15" class="odds">\'+
            \''.$odds["h15"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h15"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN15"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN16">\'+
            \'16\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN16"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN16" class="odds">\'+
            \''.$odds["h16"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h16"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN16"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN17">\'+
            \'17\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN17"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN17" class="odds">\'+
            \''.$odds["h17"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h17"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN17"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN18">\'+
            \'18\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN18"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN18" class="odds">\'+
            \''.$odds["h18"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h18"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN18"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN19">\'+
            \'19\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN19"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN19" class="odds">\'+
            \''.$odds["h19"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h19"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN19"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN20">\'+
            \'20\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN20"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN20" class="odds">\'+
            \''.$odds["h20"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h20"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN20"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN21">\'+
            \'21\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN21"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN21" class="odds">\'+
            \''.$odds["h21"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h21"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN21"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN22">\'+
            \'22\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN22"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN22" class="odds">\'+
            \''.$odds["h22"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h22"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN22"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN23">\'+
            \'23\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN23"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN23" class="odds">\'+
            \''.$odds["h23"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h23"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN23"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN24">\'+
            \'24\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN24"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN24" class="odds">\'+
            \''.$odds["h24"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h24"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN24"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN25">\'+
            \'25\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN25"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN25" class="odds">\'+
            \''.$odds["h25"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h25"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN25"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN26">\'+
            \'26\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN26"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN26" class="odds">\'+
            \''.$odds["h26"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h26"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN26"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="SN27">\'+
            \'27\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="SN27"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="SN27" class="odds">\'+
            \''.$odds["h27"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h27"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="SN27"/>\'+
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
document.getElementById("c_rtype").innerHTML = "和数";
document.getElementById("sRtype").value = "SN";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "和数";
}

$("#YearNum").text("'.$qishu.'");
(self.GameB3.install) && self.GameB3.install();
';