<?php

$odds = six_lottery_odds::getOdds("LF4");

echo '
document.getElementById("Game").innerHTML = \'<form id="formLhc" name="D3_018" action="/member/quickB5_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="LF4"/>\'+
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
            \'<td  style="width:30px">尾数</td>\'+
            \'</tr>\'+
            \'<tr>\'+
                \'<td class="num"  style="width:30px">\'+
                    \'<label for="LF4-18">\'+
                        \'尾0\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h1"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="LF4-19">\'+
                        \'尾1\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h2"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="LF4-20">\'+
                        \'尾2\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h3"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="LF4-21">\'+
                        \'尾3\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h4"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="LF4-22">\'+
                        \'尾4\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h5"].'"/>\'+
                \'</td>\'+
            \'</tr>\'+
            \'<tr>\'+
                \'<td class="num"  style="width:30px">\'+
                    \'<label for="LF4-23">\'+
                        \'尾5\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h6"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="LF4-24">\'+
                        \'尾6\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h7"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="LF4-25">\'+
                        \'尾7\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h8"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="LF4-26">\'+
                        \'尾8\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h9"].'"/>\'+
                \'</td>\'+

                \'<td class="num">\'+
                    \'<label for="LF4-27">\'+
                        \'尾9\'+
                    \'</label>\'+
                \'</td>\'+
                \'<td class="odds">\'+
                    \'<input name="aOdds[]" value="'.$odds["h10"].'"/>\'+
                \'</td>\'+
            \'</tr>\'+
        \'</table>\'+
    \'</div>\'+


\'<div id="SendB5">\'+
    \'<button id="btn-save-odds" onclick="saveLhcOdds()" class="order">保存</button>\'+
    \'</div>\'+
\'</form>\';
document.getElementById("c_rtype").innerHTML = "全五-多重彩派";
document.getElementById("sRtype").value = "LF4";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "全五-多重彩派";
}

$("#YearNum").text("0");
(self.GameB5.install) && self.GameB5.install();
';