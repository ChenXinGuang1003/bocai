<?php

$odds = six_lottery_odds::getOdds("SPB");

echo '
document.getElementById("Game").innerHTML = \'<form id="formLhc" name="D3_018" action="/member/quickB5_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="SPB"/>\'+
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
            \'<td>十二生肖</td>\'+
            \'<td>号码</td>\'+
            \'<td>赔率</td>\'+
            \'<td>十二生肖</td>\'+
            \'<td>号码</td>\'+
            \'<td>赔率</td>\'+
            \'</tr>\'+
        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="SPB-1">\'+
                    \'鼠\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="SPB-1">\'+
                    \'08, 20, 32, 44\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h1"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="SPB-2">\'+
                    \'牛\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="SPB-2">\'+
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
                \'<label for="SPB-3">\'+
                    \'虎\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:160px">\'+
                \'<label for="SPB-3">\'+
                    \'06, 18, 30, 42\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds"  style="width:80px">\'+
                \'<input name="aOdds[]" value="'.$odds["h3"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="SPB-4">\'+
                    \'兔\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="SPB-4">\'+
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
                \'<label for="SPB-5">\'+
                    \'龙\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="SPB-5">\'+
                    \'04, 16, 28, 40\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h5"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="SPB-6">\'+
                    \'蛇\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="SPB-6">\'+
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
                \'<label for="SPB-7">\'+
                    \'马\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="SPB-7">\'+
                    \'02, 14, 26, 38\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h7"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="SPB-8">\'+
                    \'羊\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="SPB-8">\'+
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
                \'<label for="SPB-9">\'+
                    \'猴\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="SPB-9">\'+
                    \'12, 24, 36, 48\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds" style="width:80px">\'+
                \'<input name="aOdds[]" value="'.$odds["h9"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="SPB-10">\'+
                    \'鸡\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="SPB-10">\'+
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
                \'<label for="SPB-11">\'+
                    \'狗\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="SPB-11">\'+
                    \'10, 22, 34, 46\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h11"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="SPB-12">\'+
                    \'猪\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:160px">\'+
                \'<label for="SPB-12">\'+
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
        \'<tr class="title_line">\'+
            \'<td  style="width:30px">正特尾数</td>\'+
            \'</tr>\'+
            \'<tr>\'+
                \'<td class="num"  style="width:30px">\'+
                    \'<label for="SPB-13">\'+
                        \'尾0\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h13"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="SPB-14">\'+
                        \'尾1\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h14"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="SPB-15">\'+
                        \'尾2\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h15"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="SPB-16">\'+
                        \'尾3\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h16"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="SPB-17">\'+
                        \'尾4\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h17"].'"/>\'+
                \'</td>\'+
            \'</tr>\'+
            \'<tr>\'+
                \'<td class="num"  style="width:30px">\'+
                    \'<label for="SPB-18">\'+
                        \'尾5\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h18"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="SPB-19">\'+
                        \'尾6\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h19"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="SPB-20">\'+
                        \'尾7\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h20"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="SPB-21">\'+
                        \'尾8\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h21"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="SPB-22">\'+
                        \'尾9\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h22"].'"/>\'+
                \'</td>\'+
            \'</tr>\'+
        \'</table>\'+
    \'</div>\'+

    \'<div class="round-table">\'+
    \'<table class="GameTable">\'+
        \'<tr class="title_line">\'+
            \'<td  style="width:30px">总肖</td>\'+
            \'</tr>\'+
            \'<tr>\'+
                \'<td class="num"  style="width:30px">\'+
                    \'<label for="SPB-23">\'+
                        \'234肖\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h23"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="SPB-24">\'+
                        \'5肖\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h24"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="SPB-25">\'+
                        \'6肖\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h25"].'"/>\'+
                \'</td>\'+

            \'</tr>\'+
            \'<tr>\'+
                \'<td class="num">\'+
                    \'<label for="SPB-26">\'+
                        \'7肖\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h26"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="SPB-27">\'+
                        \'总肖单\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h27"].'"/>\'+
                \'</td>\'+

                \'<td class="num"  style="width:30px">\'+
                    \'<label for="SPB-28">\'+
                        \'总肖双\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h28"].'"/>\'+
                \'</td>\'+

            \'</tr>\'+
        \'</table>\'+
    \'</div>\'+


\'<div id="SendB5">\'+
    \'<button id="btn-save-odds" onclick="saveLhcOdds()" class="order">保存</button>\'+
    \'</div>\'+
\'</form>\';
document.getElementById("c_rtype").innerHTML = "全五-多重彩派";
document.getElementById("sRtype").value = "SPB";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "全五-多重彩派";
}

$("#YearNum").text("0");
(self.GameB5.install) && self.GameB5.install();
';