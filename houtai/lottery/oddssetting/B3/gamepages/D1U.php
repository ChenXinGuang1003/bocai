<?php

$odds = odds_lottery_normal::getOdds($lottery_name,"个定位");

echo '
document.getElementById("Game").innerHTML = \'<form id="formB3" name="D3_018" action="/member/quickB3_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="D1U"/>\'+
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
            \'<td>号码</td>\'+
            \'<td>赔率</td>\'+
            
            \'<td>号码</td>\'+
            \'<td>赔率</td>\'+
            
            \'<td>号码</td>\'+
            \'<td>赔率</td>\'+
            
            \'<td>号码</td>\'+
            \'<td>赔率</td>\'+
            
            \'<td>号码</td>\'+
            \'<td>赔率</td>\'+
            
            \'</tr>\'+
        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="D1U0">\'+
                    \'XX0\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h0"].'"/>\'+
                \'</td>\'+
            
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="D1U1">\'+
                    \'XX1\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h1"].'"/>\'+
                \'</td>\'+
            
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="D1U2">\'+
                    \'XX2\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h2"].'"/>\'+
                \'</td>\'+
            
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="D1U3">\'+
                    \'XX3\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h3"].'"/>\'+
                \'</td>\'+
            
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="D1U4">\'+
                    \'XX4\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h4"].'"/>\'+
                \'</td>\'+
            
            \'\'+
            \'</tr>\'+
        \'<tr>\'+\'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="D1U5">\'+
                    \'XX5\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h5"].'"/>\'+
                \'</td>\'+
            
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="D1U6">\'+
                    \'XX6\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h6"].'"/>\'+
                \'</td>\'+
            
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="D1U7">\'+
                    \'XX7\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h7"].'"/>\'+
                \'</td>\'+
            
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="D1U8">\'+
                    \'XX8\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h8"].'"/>\'+
                \'</td>\'+
            
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="D1U9">\'+
                    \'XX9\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h9"].'"/>\'+
                \'</td>\'+
            

            \'</tr>\'+
        \'</table>\'+
    \'</div>\'+
\'<div id="SendB3">\'+
    \'<button id="btn-save-odds" onclick="saveB3Odds()" class="order">保存</button>\'+
    \'</div>\'+
\'</form>\';
document.getElementById("c_rtype").innerHTML = "个定位";
document.getElementById("sRtype").value = "D1U";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "个定位";
}

$("#YearNum").text("'.$qishu.'");
(self.GameB3.install) && self.GameB3.install();
';