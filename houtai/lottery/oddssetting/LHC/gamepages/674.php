<?php

$odds = six_lottery_odds::getOdds("NAP4");

echo '
document.getElementById("Game").innerHTML = \'<form id="formLhc" name="D3_018" action="/member/quickB5_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="NAP4"/>\'+
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
                \'<label for="NAP4-1">\'+
                    \'单\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h1"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NAP4-2">\'+
                    \'双\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h2"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NAP4-3">\'+
                    \'大\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h3"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NAP4-4">\'+
                    \'小\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h4"].'"/>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NAP4-5">\'+
                    \'和单\'+
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
                \'<label for="NAP4-6">\'+
                    \'和双\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h6"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NAP4-7">\'+
                    \'和大\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h7"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NAP4-8">\'+
                    \'和小\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h8"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NAP4-9">\'+
                    \'尾大\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h9"].'"/>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="NAP4-10">\'+
                    \'尾小\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h10"].'"/>\'+
                \'</td>\'+
            \'</tr>\'+

            \'<tr>\'+
                \'<td class="num" style="width:30px">\'+
                    \'<label for="NAP4-11">\'+
                        \'红波\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h11"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="NAP4-12">\'+
                        \'绿波\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h12"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="NAP4-13">\'+
                        \'蓝波\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h13"].'"/>\'+
                \'</td>\'+


            \'</tr>\'+

        \'</table>\'+
    \'</div>\'+
\'<div id="SendB5">\'+
    \'<button id="btn-save-odds" onclick="saveLhcOdds()" class="order">保存</button>\'+
    \'</div>\'+
\'</form>\';
document.getElementById("c_rtype").innerHTML = "全五-多重彩派";
document.getElementById("sRtype").value = "NAP4";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "全五-多重彩派";
}

$("#YearNum").text("0");
(self.GameB5.install) && self.GameB5.install();
';