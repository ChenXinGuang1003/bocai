<?php

$odds = six_lottery_odds::getOdds("NX");

echo '
document.getElementById("Game").innerHTML = \'<form id="formLhc" name="D3_018" action="/member/quickB5_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="NX"/>\'+
\'<input type="hidden" name="gtype" value="CQ"/>\'+
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
            \'<td>生肖</td>\'+
            \'<td>赔率</td>\'+
            \'<td>生肖</td>\'+
            \'<td>赔率</td>\'+
            \'<td>生肖</td>\'+
            \'<td>赔率</td>\'+
            \'<td>生肖</td>\'+
            \'<td>赔率</td>\'+
            \'<td>生肖</td>\'+
            \'<td>赔率</td>\'+
            \'</tr>\'+
        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NX-1">\'+
                    \'中一\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h1"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NX-2">\'+
                    \'中二\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h2"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NX-3">\'+
                    \'中三\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h3"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NX-4">\'+
                    \'中四\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h4"].'"/>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NX-5">\'+
                    \'中五\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h5"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'</tr>\'+
        \'<tr>\'+\'\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NX-6">\'+
                    \'中六\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h6"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NX-7">\'+
                    \'中七\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h7"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NX-8">\'+
                    \'中八\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h8"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NX-9">\'+
                    \'中九\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h9"].'"/>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NX-10">\'+
                    \'中十\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h10"].'"/>\'+
                \'</td>\'+
            \'</tr>\'+

            \'<tr>\'+
                \'<td class="num" style="width:30px">\'+
                    \'<label for="NX-11">\'+
                        \'中十一\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h11"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:330px;font-size: 14px;color: red;" colspan=8>\'+
                    \'<label for="NX-12">\'+
                        \'生肖不中赔率与生肖中赔率相反，比如：中五赔率和不中七赔率相等\'+
                    \'</label>\'+
                \'</td>\'+

            \'</tr>\'+

        \'</table>\'+
    \'</div>\'+
\'<div id="SendB5">\'+
    \'<button id="btn-save-odds" onclick="saveLhcOdds()" class="order">保存</button>\'+
    \'</div>\'+
\'</form>\';
document.getElementById("c_rtype").innerHTML = "全五-多重彩派";
document.getElementById("sRtype").value = "NX";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "全五-多重彩派";
}

$("#YearNum").text("0");
(self.GameB5.install) && self.GameB5.install();
';