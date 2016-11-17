<?php

$odds = six_lottery_odds::getOdds("N5");

echo '
document.getElementById("Game").innerHTML = \'<form id="formLhc" name="D3_018" action="/member/quickB5_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="N5"/>\'+
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
                \'<label for="N5-1">\'+
                    \'1\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h1"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="N5-2">\'+
                    \'2\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h2"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="N5-3">\'+
                    \'3\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h3"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="N5-4">\'+
                    \'4\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h4"].'"/>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="N5-5">\'+
                    \'5\'+
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
                \'<label for="N5-6">\'+
                    \'6\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h6"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="N5-7">\'+
                    \'7\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h7"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="N5-8">\'+
                    \'8\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h8"].'"/>\'+
                \'</td>\'+
            \'\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="N5-9">\'+
                    \'9\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h9"].'"/>\'+
                \'</td>\'+
            \'<td class="num" style="width:30px">\'+
                \'<label for="N5-10">\'+
                    \'10\'+
                    \'</label>\'+

                \'</td>\'+
            \'<td class="odds">\'+
                \'<input name="aOdds[]" value="'.$odds["h10"].'"/>\'+
                \'</td>\'+
            \'</tr>\'+

            \'<tr>\'+
                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-11">\'+
                        \'11\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h11"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-12">\'+
                        \'12\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h12"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-13">\'+
                        \'13\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h13"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-14">\'+
                        \'14\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h14"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-15">\'+
                        \'15\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h15"].'"/>\'+
                \'</td>\'+

            \'</tr>\'+
            \'<tr>\'+
                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-16">\'+
                        \'16\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h16"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-17">\'+
                        \'17\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h17"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-18">\'+
                        \'18\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h18"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-19">\'+
                        \'19\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h19"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-20">\'+
                        \'20\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h20"].'"/>\'+
                \'</td>\'+

            \'</tr>\'+

            \'<tr>\'+
                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-21">\'+
                        \'21\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h21"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-22">\'+
                        \'22\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h22"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-23">\'+
                        \'23\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h23"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-24">\'+
                        \'24\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h24"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-25">\'+
                        \'25\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h25"].'"/>\'+
                \'</td>\'+

            \'</tr>\'+
            \'<tr>\'+
                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-26">\'+
                        \'26\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h26"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-27">\'+
                        \'27\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h27"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-28">\'+
                        \'28\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h28"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-29">\'+
                        \'29\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h29"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-30">\'+
                        \'30\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h30"].'"/>\'+
                \'</td>\'+

            \'</tr>\'+
            \'<tr>\'+
                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-31">\'+
                        \'31\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h31"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-32">\'+
                        \'32\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h32"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-33">\'+
                        \'33\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h33"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-34">\'+
                        \'34\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h34"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-35">\'+
                        \'35\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h35"].'"/>\'+
                \'</td>\'+

            \'</tr>\'+
            \'<tr>\'+
                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-36">\'+
                        \'36\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h36"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-37">\'+
                        \'37\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h37"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-38">\'+
                        \'38\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h38"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-39">\'+
                        \'39\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h39"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-40">\'+
                        \'40\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h40"].'"/>\'+
                \'</td>\'+

            \'</tr>\'+
            \'<tr>\'+
                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-41">\'+
                        \'41\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h41"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-42">\'+
                        \'42\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h42"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-43">\'+
                        \'43\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h43"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-44">\'+
                        \'44\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h44"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-45">\'+
                        \'45\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h45"].'"/>\'+
                \'</td>\'+

            \'</tr>\'+
            \'<tr>\'+
                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-46">\'+
                        \'46\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h46"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-47">\'+
                        \'47\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h47"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-48">\'+
                        \'48\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h48"].'"/>\'+
                \'</td>\'+

                \'<td class="num" style="width:30px">\'+
                    \'<label for="N5-49">\'+
                        \'49\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h49"].'"/>\'+
                \'</td>\'+
            \'</tr>\'+



        \'</table>\'+
    \'</div>\'+
\'<div id="SendB5">\'+
    \'<button id="btn-save-odds" onclick="saveLhcOdds()" class="order">保存</button>\'+
    \'</div>\'+
\'</form>\';
document.getElementById("c_rtype").innerHTML = "全五-多重彩派";
document.getElementById("sRtype").value = "N5";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "全五-多重彩派";
}

$("#YearNum").text("0");
(self.GameB5.install) && self.GameB5.install();
';