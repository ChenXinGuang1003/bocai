<?php

$odds = six_lottery_odds::getOdds("C7");

echo '
document.getElementById("Game").innerHTML = \'<form id="formLhc" name="D3_018" action="/member/quickB5_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="C7"/>\'+
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
            \'<td>正肖</td>\'+
            \'<td>号码</td>\'+
            \'<td>赔率</td>\'+
            \'<td>正肖</td>\'+
            \'<td>号码</td>\'+
            \'<td>赔率</td>\'+
            \'</tr>\'+
        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-1">\'+
                    \'鼠\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-1">\'+
                    \'08, 20, 32, 44\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h1"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-2">\'+
                    \'牛\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-2">\'+
                    \'07, 19, 31, 43\'+
                    \'</label>\'+
                \'</td>\'+

            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h2"].'"/>\'+
                \'</td>\'+
            \'\'+
        \'</tr>\'+

        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-3">\'+
                    \'虎\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:160px">\'+
                \'<label for="C7-3">\'+
                    \'06, 18, 30, 42\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds"  style="width:80px">\'+
                \'<input name="aOdds[]" value="'.$odds["h3"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-4">\'+
                    \'兔\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-4">\'+
                    \'05, 17, 29, 41\'+
                    \'</label>\'+
                \'</td>\'+

            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h4"].'"/>\'+
                \'</td>\'+
            \'\'+
        \'</tr>\'+

        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-5">\'+
                    \'龙\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-5">\'+
                    \'04, 16, 28, 40\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h5"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-6">\'+
                    \'蛇\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-6">\'+
                    \'03, 15, 27, 39\'+
                    \'</label>\'+
                \'</td>\'+

            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h6"].'"/>\'+
                \'</td>\'+
            \'\'+
        \'</tr>\'+

        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-7">\'+
                    \'马\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-7">\'+
                    \'02, 14, 26, 38\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h7"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-8">\'+
                    \'羊\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-8">\'+
                    \'01, 13, 25, 37, 49\'+
                    \'</label>\'+
                \'</td>\'+

            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h8"].'"/>\'+
                \'</td>\'+
            \'\'+
        \'</tr>\'+

        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-9">\'+
                    \'猴\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-9">\'+
                    \'12, 24, 36, 48\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds" style="width:80px">\'+
                \'<input name="aOdds[]" value="'.$odds["h9"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-10">\'+
                    \'鸡\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-10">\'+
                    \'11, 23, 35, 47\'+
                    \'</label>\'+
                \'</td>\'+

            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h10"].'"/>\'+
                \'</td>\'+
            \'\'+
        \'</tr>\'+

        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-11">\'+
                    \'狗\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-11">\'+
                    \'10, 22, 34, 46\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h11"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="C7-12">\'+
                    \'猪\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:160px">\'+
                \'<label for="C7-12">\'+
                    \'09, 21, 33, 45\'+
                    \'</label>\'+
                \'</td>\'+

            \'<td class="odds" style="width:80px">\'+
                \'<input name="aOdds[]" value="'.$odds["h12"].'"/>\'+
                \'</td>\'+
            \'\'+
        \'</tr>\'+

        \'</table>\'+
    \'</div>\'+

    \'<div class="round-table">\'+
    \'<table class="GameTable">\'+
            \'<tr>\'+
                \'<td class="num"  style="width:30px">\'+
                    \'<label for="C7-13">\'+
                        \'红波\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h13"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="C7-14">\'+
                        \'蓝波\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h14"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="C7-15">\'+
                        \'绿波\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h15"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="C7-16">\'+
                        \'和局\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h16"].'"/>\'+
                \'</td>\'+

            \'</tr>\'+
        \'</table>\'+
    \'</div>\'+


\'<div id="SendB5">\'+
    \'<button id="btn-save-odds" onclick="saveLhcOdds()" class="order">保存</button>\'+
    \'</div>\'+
\'</form>\';
document.getElementById("c_rtype").innerHTML = "全五-多重彩派";
document.getElementById("sRtype").value = "C7";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "全五-多重彩派";
}

$("#YearNum").text("0");
(self.GameB5.install) && self.GameB5.install();
';