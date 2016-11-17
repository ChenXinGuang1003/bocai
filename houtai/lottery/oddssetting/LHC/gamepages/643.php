<?php

$odds = six_lottery_odds::getOdds("HB");

echo '
document.getElementById("Game").innerHTML = \'<form id="formLhc" name="D3_018" action="/member/quickB5_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="HB"/>\'+
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
            \'<td>半波</td>\'+
            \'<td>号码</td>\'+
            \'<td>赔率</td>\'+
            \'<td>半波</td>\'+
            \'<td>号码</td>\'+
            \'<td>赔率</td>\'+
            \'</tr>\'+
        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:80px">\'+
                \'<label for="HB-1">\'+
                    \'红单\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-1">\'+
                    \'01,07,13,19,23,29,35,45\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h1"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:80px">\'+
                \'<label for="HB-2">\'+
                    \'红双\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-2">\'+
                    \'02,08,12,18,24,30,34,40,46\'+
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
                \'<label for="HB-3">\'+
                    \'红大\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:160px">\'+
                \'<label for="HB-3">\'+
                    \'29,30,34,35,40,45,46\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds"  style="width:80px">\'+
                \'<input name="aOdds[]" value="'.$odds["h3"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-4">\'+
                    \'红小\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-4">\'+
                    \'01,02,07,08,12,13,18,19,23,24\'+
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
                \'<label for="HB-5">\'+
                    \'绿单\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-5">\'+
                    \'05,11,17,21,27,33,39,43\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h5"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-6">\'+
                    \'绿双\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-6">\'+
                    \'06,16,22,28,32,38,44\'+
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
                \'<label for="HB-7">\'+
                    \'绿大\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-7">\'+
                    \'27,28,32,33,38,39,43,44\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h7"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-8">\'+
                    \'绿小\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-8">\'+
                    \'05,06,11,16,17,21,22\'+
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
                \'<label for="HB-9">\'+
                    \'蓝单\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-9">\'+
                    \'03,09,15,25,31,37,41,47\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds" style="width:80px">\'+
                \'<input name="aOdds[]" value="'.$odds["h9"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-10">\'+
                    \'蓝双\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-10">\'+
                    \'04,10,14,20,26,36,42,48\'+
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
                \'<label for="HB-11">\'+
                    \'蓝大\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-11">\'+
                    \'25,26,31,36,37,41,42,47,48\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h11"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-12">\'+
                    \'蓝小\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:160px">\'+
                \'<label for="HB-12">\'+
                    \'03,04,09,10,14,15,20\'+
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
            \'<td>半半波</td>\'+
            \'<td>号码</td>\'+
            \'<td>赔率</td>\'+
            \'<td>半半波</td>\'+
            \'<td>号码</td>\'+
            \'<td>赔率</td>\'+
            \'</tr>\'+
        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-13">\'+
                    \'红大单\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-13">\'+
                    \'29,35,45\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h13"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-14">\'+
                    \'红大双\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-14">\'+
                    \'30,34,40,46\'+
                    \'</label>\'+
                \'</td>\'+

            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h14"].'"/>\'+
                \'</td>\'+
            \'\'+
        \'</tr>\'+

        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-15">\'+
                    \'红小单\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:160px">\'+
                \'<label for="HB-15">\'+
                    \'01,07,13,19,23\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds"  style="width:80px">\'+
                \'<input name="aOdds[]" value="'.$odds["h15"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-16">\'+
                    \'红小双\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-16">\'+
                    \'02,08,12,18,24\'+
                    \'</label>\'+
                \'</td>\'+

            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h16"].'"/>\'+
                \'</td>\'+
            \'\'+
        \'</tr>\'+

        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-17">\'+
                    \'绿大单\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-17">\'+
                    \'27,33,39,43\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h17"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-18">\'+
                    \'绿大双\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-18">\'+
                    \'28,32,38,44\'+
                    \'</label>\'+
                \'</td>\'+

            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h18"].'"/>\'+
                \'</td>\'+
            \'\'+
        \'</tr>\'+

        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-19">\'+
                    \'绿小单\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-19">\'+
                    \'05,11,17,21\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h19"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-20">\'+
                    \'绿小双\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-20">\'+
                    \'06,16,22\'+
                    \'</label>\'+
                \'</td>\'+

            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h20"].'"/>\'+
                \'</td>\'+
            \'\'+
        \'</tr>\'+

        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-21">\'+
                    \'蓝大单\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-21">\'+
                    \'25,31,37,41,47\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds" style="width:80px">\'+
                \'<input name="aOdds[]" value="'.$odds["h21"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-22">\'+
                    \'蓝大双\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-22">\'+
                    \'26,36,42,48\'+
                    \'</label>\'+
                \'</td>\'+

            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h22"].'"/>\'+
                \'</td>\'+
            \'\'+
        \'</tr>\'+

        \'<tr>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-23">\'+
                    \'蓝小单\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-23">\'+
                    \'03,09,15\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h23"].'"/>\'+
                \'</td>\'+
            \'\'+

            \'<td class="num" style="width:30px">\'+
                \'<label for="HB-24">\'+
                    \'蓝小双\'+
                    \'</label>\'+
                \'</td>\'+
            \'<td class="num" style="width:160px">\'+
                \'<label for="HB-24">\'+
                    \'04,10,14,20\'+
                    \'</label>\'+
                \'</td>\'+

            \'<td class="odds" style="width:80px">\'+
                \'<input name="aOdds[]" value="'.$odds["h24"].'"/>\'+
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
document.getElementById("sRtype").value = "HB";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "全五-多重彩派";
}

$("#YearNum").text("0");
(self.GameB5.install) && self.GameB5.install();
';