<?php

$odds = odds_lottery_normal::getOdds($lottery_name,"(中三)组选三");

echo '


document.getElementById("Game").innerHTML = \'<form id="formB5" name="D3_018" action="/member/quickB3_act.php" method="post" onsubmit="return false">\'+
    \'<input type="hidden" name="gid" value="343390"/>\'+
    \'<input type="hidden" name="MyRtype" value="596"/>\'+
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
                \'<td>已勾选</td>\'+
                \'<td>赔率</td>\'+
                \'<td>已勾选</td>\'+
                \'<td>赔率</td>\'+
                \'<td>已勾选</td>\'+
                \'<td>赔率</td>\'+
                \'<td>已勾选</td>\'+
                \'<td>赔率</td>\'+
                \'<td>已勾选</td>\'+
                \'<td>赔率</td>\'+
                \'<td>已勾选</td>\'+
                \'<td>赔率</td>\'+
                \'</tr>\'+
            \'<tr>\'+
                \'\'+
                \'<td class="num" style="width:30px">\'+
                    \'<label for="596-0">\'+
                        \'5个号码\'+
                        \'</label>\'+
                    \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h0"].'"/>\'+
                    \'</td>\'+
                \'<td class="num" style="width:30px">\'+
                    \'<label for="596-1">\'+
                        \'6个号码\'+
                        \'</label>\'+
                    \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h1"].'"/>\'+
                    \'</td>\'+
                \'<td class="num" style="width:30px">\'+
                    \'<label for="596-2">\'+
                        \'7个号码\'+
                        \'</label>\'+
                    \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h2"].'"/>\'+
                    \'</td>\'+
                \'<td class="num" style="width:30px">\'+
                    \'<label for="596-3">\'+
                        \'8个号码\'+
                        \'</label>\'+
                    \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h3"].'"/>\'+
                    \'</td>\'+
                \'<td class="num" style="width:30px">\'+
                    \'<label for="596-4">\'+
                        \'9个号码\'+
                        \'</label>\'+
                    \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h4"].'"/>\'+
                    \'</td>\'+
                \'<td class="num" style="width:30px">\'+
                    \'<label for="596-5">\'+
                        \'10个号码\'+
                        \'</label>\'+
                    \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h5"].'"/>\'+
                    \'</td>\'+
                \'</tr>\'+
            \'</table>\'+
        \'</div>\'+
    \'<div id="SendB5">\'+
        \'<button id="btn-save-odds" onclick="saveB5Odds()" class="order">保存</button>\'+
        \'</div>\'+
    \'</form>\';
document.getElementById("c_rtype").innerHTML = "(中三)组选三";
document.getElementById("sRtype").value = "596";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "(中三)组选三";
}

$("#YearNum").text("1");
(self.GameB5.install) && self.GameB5.install();
';