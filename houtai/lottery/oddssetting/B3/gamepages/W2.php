<?php

$odds = odds_lottery_normal::getOdds($lottery_name,"二字");

echo '
document.getElementById("Game").innerHTML = \'<form id="formB3" name="D3_018" action="/member/quickB3_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="W2"/>\'+
\'<input type="hidden" name="gtype" value="'.$gType.'"/>\'+
\'<input type="hidden" name="gold_gmax" value="5000"/>\'+
\'<input type="hidden" name="gold_gmin" value="'.$lowestMoney.'"/>\'+
\'<input type="hidden" name="SC" value="50000"/>\'+
\'<input type="hidden" name="SO" value="5000"/>\'+
\'<input type="hidden" name="Maxcredit" value="'.$userMoney.'"/>\'+
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
        \'<label for="W200">\'+
            \'00\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h0"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W201">\'+
            \'01\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h1"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W202">\'+
            \'02\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h2"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W203">\'+
            \'03\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h3"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W204">\'+
            \'04\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h4"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W205">\'+
            \'05\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h5"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W206">\'+
            \'06\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h6"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W207">\'+
            \'07\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h7"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W208">\'+
            \'08\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h8"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W209">\'+
            \'09\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h9"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W211">\'+
            \'11\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h10"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W212">\'+
            \'12\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h11"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W213">\'+
            \'13\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h12"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W214">\'+
            \'14\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h13"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W215">\'+
            \'15\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h14"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W216">\'+
            \'16\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h15"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W217">\'+
            \'17\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h16"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W218">\'+
            \'18\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h17"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W219">\'+
            \'19\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h18"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W222">\'+
            \'22\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h19"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W223">\'+
            \'23\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h20"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W224">\'+
            \'24\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h21"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W225">\'+
            \'25\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h22"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W226">\'+
            \'26\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h23"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W227">\'+
            \'27\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h24"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W228">\'+
            \'28\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h25"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W229">\'+
            \'29\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h26"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W233">\'+
            \'33\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h27"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W234">\'+
            \'34\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h28"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W235">\'+
            \'35\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h29"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W236">\'+
            \'36\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h30"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W237">\'+
            \'37\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h31"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W238">\'+
            \'38\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h32"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W239">\'+
            \'39\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h33"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W244">\'+
            \'44\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h34"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W245">\'+
            \'45\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h35"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W246">\'+
            \'46\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h36"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W247">\'+
            \'47\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h37"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W248">\'+
            \'48\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h38"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W249">\'+
            \'49\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h39"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W255">\'+
            \'55\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h40"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W256">\'+
            \'56\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h41"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W257">\'+
            \'57\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h42"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W258">\'+
            \'58\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h43"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W259">\'+
            \'59\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h44"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W266">\'+
            \'66\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h45"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W267">\'+
            \'67\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h46"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W268">\'+
            \'68\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h47"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W269">\'+
            \'69\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h48"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W277">\'+
            \'77\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h49"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W278">\'+
            \'78\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h50"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W279">\'+
            \'79\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h51"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W288">\'+
            \'88\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h52"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W289">\'+
            \'89\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h53"].'"/>\'+
        \'</td>\'+
    
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="W299">\'+
            \'99\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h54"].'"/>\'+
        \'</td>\'+
    

    \'</tr>\'+
\'</table>\'+
\'</div>\'+
\'<div id="SendB3">\'+
    \'<button id="btn-save-odds" onclick="saveB3Odds()" class="order">保存</button>\'+
    \'</div>\'+
\'</form>\';
document.getElementById("c_rtype").innerHTML = "二字";
document.getElementById("sRtype").value = "W2";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "二字";
}

$("#YearNum").text("'.$qishu.'");
(self.GameB3.install) && self.GameB3.install();
';