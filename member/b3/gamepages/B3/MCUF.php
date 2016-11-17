<?php

$odds = odds_lottery_normal::getOdds($lottery_name,"佰拾个和尾数");

echo '
document.getElementById("Game").innerHTML = \'<form id="formB3" name="D3_018" action="/member/quickB3_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="MCUF"/>\'+
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
                \'<label for="MCUF0">\'+
                    \'0\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="MCUF0"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="MCUF0" class="odds">\'+
                    \''.$odds["h0"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h0"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCUF0"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="MCUF1">\'+
                    \'1\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="MCUF1"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="MCUF1" class="odds">\'+
                    \''.$odds["h1"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h1"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCUF1"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="MCUF2">\'+
                    \'2\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="MCUF2"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="MCUF2" class="odds">\'+
                    \''.$odds["h2"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h2"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCUF2"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="MCUF3">\'+
                    \'3\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="MCUF3"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="MCUF3" class="odds">\'+
                    \''.$odds["h3"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h3"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCUF3"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="MCUF4">\'+
                    \'4\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="MCUF4"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="MCUF4" class="odds">\'+
                    \''.$odds["h4"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h4"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCUF4"/>\'+
                \'</td>\'+
            \'\'+
            \'</tr>\'+
        \'<tr>\'+\'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="MCUF5">\'+
                    \'5\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="MCUF5"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="MCUF5" class="odds">\'+
                    \''.$odds["h5"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h5"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCUF5"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="MCUF6">\'+
                    \'6\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="MCUF6"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="MCUF6" class="odds">\'+
                    \''.$odds["h6"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h6"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCUF6"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="MCUF7">\'+
                    \'7\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="MCUF7"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="MCUF7" class="odds">\'+
                    \''.$odds["h7"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h7"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCUF7"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="MCUF8">\'+
                    \'8\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="MCUF8"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="MCUF8" class="odds">\'+
                    \''.$odds["h8"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h8"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCUF8"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="MCUF9">\'+
                    \'9\'+
                    \'</label>\'+
                \'<input type="hidden" name="aConcede[]" value="MCUF9"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<label for="MCUF9" class="odds">\'+
                    \''.$odds["h9"].'\'+
                    \'</label>\'+
                \'<input type="hidden" name="aOdds[]" value="'.$odds["h9"].'"/>\'+
                \'</td>\'+
            \'<td class="odds" style="width:60px">\'+
                \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCUF9"/>\'+
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
document.getElementById("c_rtype").innerHTML = "佰拾个和尾数";
document.getElementById("sRtype").value = "MCUF";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "佰拾个和尾数";
}

$("#YearNum").text("'.$qishu.'");
(self.GameB3.install) && self.GameB3.install();
';