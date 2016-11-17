<?php

$odds = six_lottery_odds::getOdds("NI");

echo '
document.getElementById("Game").innerHTML = \'<form id="formLhc" name="D3_018" action="/member/quickB5_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="NI"/>\'+
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
                \'<label for="NI-1">\'+
                    \'五不中\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h1"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NI-2">\'+
                    \'六不中\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h2"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NI-3">\'+
                    \'七不中\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h3"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NI-4">\'+
                    \'八不中\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h4"].'"/>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NI-5">\'+
                    \'九不中\'+
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
                \'<label for="NI-6">\'+
                    \'十不中\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h6"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NI-7">\'+
                    \'十一不中\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h7"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NI-8">\'+
                    \'十二不中\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h8"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'</tr>\'+

        \'</table>\'+
    \'</div>\'+
\'<div id="SendB5">\'+
    \'<button id="btn-save-odds" onclick="saveLhcOdds()" class="order">保存</button>\'+
    \'</div>\'+
\'</form>\';
document.getElementById("c_rtype").innerHTML = "全五-多重彩派";
document.getElementById("sRtype").value = "NI";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "全五-多重彩派";
}

$("#YearNum").text("0");
(self.GameB5.install) && self.GameB5.install();
';