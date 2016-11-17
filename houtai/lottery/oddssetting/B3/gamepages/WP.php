<?php

$odds = odds_lottery_normal::getOdds($lottery_name,"一字过关");

echo '
document.getElementById("Game").innerHTML = \'<form id="formB3" name="D3_018" action="/member/quickB3_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="WP"/>\'+
\'<input type="hidden" name="gtype" value="'.$gType.'"/>\'+
\'<input type="hidden" name="gold_gmax" value="5000"/>\'+
\'<input type="hidden" name="gold_gmin" value="1"/>\'+
\'<input type="hidden" name="SC" value="50000"/>\'+
\'<input type="hidden" name="SO" value="5000"/>\'+
\'<input type="hidden" name="Maxcredit" value="1"/>\'+
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
            \'<td>组合</td>\'+
            \'<td>单</td>\'+
            \'<td>双</td>\'+
            \'<td>大</td>\'+
            \'<td>小</td>\'+
            \'<td>质</td>\'+
            \'<td>和</td>\'+
            \'</tr>\'+
        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="WP0">\'+
                    \'口XX\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h0"].'"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h1"].'"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h2"].'"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h3"].'"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h4"].'"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h5"].'"/>\'+
                \'</td>\'+
        \'</tr>\'+
        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="WP1">\'+
                    \'X口X\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h6"].'"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h7"].'"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h8"].'"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h9"].'"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h10"].'"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h11"].'"/>\'+
                \'</td>\'+
        \'</tr>\'+
        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="WP2">\'+
                    \'XX口\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h12"].'"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h13"].'"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h14"].'"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h15"].'"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h16"].'"/>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h17"].'"/>\'+
                \'</td>\'+
        \'</tr>\'+
    \'</table>\'+
    \'<table class="GameTable">\'+
        \'<tr class="title_line">\'+
            \'<td>已勾选</td>\'+
            \'<td>赔率</td>\'+
            \'<td>已勾选</td>\'+
            \'<td>赔率</td>\'+
            \'</tr>\'+
        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="WP0">\'+
                    \'2个组合\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h18"].'"/>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="WP1">\'+
                    \'3个组合\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h19"].'"/>\'+
                \'</td>\'+
            \'</tr>\'+
        \'</table>\'+
\'</div>\'+
\'<div id="SendB3">\'+
    \'<button id="btn-save-odds" onclick="saveB3Odds()" class="order">保存</button>\'+
    \'</div>\'+
\'</form>\';
document.getElementById("c_rtype").innerHTML = "一字过关";
document.getElementById("sRtype").value = "WP";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "一字过关";
}

$("#YearNum").text("'.$qishu.'");
(self.GameB3.install) && self.GameB3.install();
';