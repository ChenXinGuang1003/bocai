<?php

$odds = odds_lottery_normal::getOdds($lottery_name,"万仟和尾数");

echo '
document.getElementById("Game").innerHTML = \'<form id="formB5" name="D3_018" action="/member/quickB5_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="606"/>\'+
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
                \'<label for="606-0">\'+
                    \'0\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="606-0"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="606-0" class="odds">\'+
                    \''.$odds["h0"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h0"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="606-0"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="606-1">\'+
                    \'1\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="606-1"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="606-1" class="odds">\'+
                    \''.$odds["h1"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h1"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="606-1"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="606-2">\'+
                    \'2\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="606-2"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="606-2" class="odds">\'+
                    \''.$odds["h2"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h2"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="606-2"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="606-3">\'+
                    \'3\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="606-3"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="606-3" class="odds">\'+
                    \''.$odds["h3"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h3"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="606-3"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="606-4">\'+
                    \'4\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="606-4"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="606-4" class="odds">\'+
                    \''.$odds["h4"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h4"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="606-4"/>\'+
                \'</td>\'+
            \'\'+
            \'</tr>\'+
        \'<tr>\'+\'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="606-5">\'+
                    \'5\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="606-5"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="606-5" class="odds">\'+
                    \''.$odds["h5"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h5"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="606-5"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="606-6">\'+
                    \'6\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="606-6"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="606-6" class="odds">\'+
                    \''.$odds["h6"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h6"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="606-6"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="606-7">\'+
                    \'7\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="606-7"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="606-7" class="odds">\'+
                    \''.$odds["h7"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h7"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="606-7"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="606-8">\'+
                    \'8\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="606-8"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="606-8" class="odds">\'+
                    \''.$odds["h8"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h8"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="606-8"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="606-9">\'+
                    \'9\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="606-9"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="606-9" class="odds">\'+
                    \''.$odds["h9"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h9"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="606-9"/>\'+
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
document.getElementById("c_rtype").innerHTML = "万仟和尾数";
document.getElementById("sRtype").value = "606";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "万仟和尾数";
}

$("#YearNum").text("'.$qishu.'");
(self.GameB5.install) && self.GameB5.install();
';