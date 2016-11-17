<?php

$odds1 = odds_lottery_normal::getOddsByPart($lottery_name,"佰个定位","part1");
$odds2 = odds_lottery_normal::getOddsByPart($lottery_name,"佰个定位","part2");

echo '
document.getElementById("Game").innerHTML = \'<form id="formB3" name="D3_018" action="/member/quickB3_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="D2MU"/>\'+
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
        \'<label for="D2MU00">\'+
            \'0X0\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h0"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU01">\'+
            \'0X1\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h1"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU02">\'+
            \'0X2\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h2"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU03">\'+
            \'0X3\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h3"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU04">\'+
            \'0X4\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h4"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU05">\'+
            \'0X5\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h5"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU06">\'+
            \'0X6\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h6"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU07">\'+
            \'0X7\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h7"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU08">\'+
            \'0X8\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h8"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU09">\'+
            \'0X9\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h9"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU10">\'+
            \'1X0\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
            
        \'<input name="aOdds[]" value="'.$odds1["h10"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU11">\'+
            \'1X1\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h11"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU12">\'+
            \'1X2\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h12"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU13">\'+
            \'1X3\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h13"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU14">\'+
            \'1X4\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h14"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU15">\'+
            \'1X5\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h15"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU16">\'+
            \'1X6\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h16"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU17">\'+
            \'1X7\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h17"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU18">\'+
            \'1X8\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h18"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU19">\'+
            \'1X9\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h19"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU20">\'+
            \'2X0\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h20"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU21">\'+
            \'2X1\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h21"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU22">\'+
            \'2X2\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h22"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU23">\'+
            \'2X3\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h23"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU24">\'+
            \'2X4\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h24"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU25">\'+
            \'2X5\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h25"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU26">\'+
            \'2X6\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h26"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU27">\'+
            \'2X7\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h27"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU28">\'+
            \'2X8\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h28"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU29">\'+
            \'2X9\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h29"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU30">\'+
            \'3X0\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h30"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU31">\'+
            \'3X1\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h31"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU32">\'+
            \'3X2\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h32"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU33">\'+
            \'3X3\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h33"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU34">\'+
            \'3X4\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h34"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU35">\'+
            \'3X5\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h35"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU36">\'+
            \'3X6\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h36"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU37">\'+
            \'3X7\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h37"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU38">\'+
            \'3X8\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h38"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU39">\'+
            \'3X9\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h39"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU40">\'+
            \'4X0\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h40"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU41">\'+
            \'4X1\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h41"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU42">\'+
            \'4X2\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h42"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU43">\'+
            \'4X3\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h43"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU44">\'+
            \'4X4\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h44"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU45">\'+
            \'4X5\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h45"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU46">\'+
            \'4X6\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h46"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU47">\'+
            \'4X7\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h47"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU48">\'+
            \'4X8\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h48"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU49">\'+
            \'4X9\'+
            \'</label>\'+

        \'</td>\'+
    \'<td class="odds">\'+
        
            
        \'<input name="aOdds[]" value="'.$odds1["h49"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU50">\'+
            \'5X0\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h0"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU51">\'+
            \'5X1\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h1"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU52">\'+
            \'5X2\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h2"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU53">\'+
            \'5X3\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h3"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU54">\'+
            \'5X4\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h4"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU55">\'+
            \'5X5\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h5"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU56">\'+
            \'5X6\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h6"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU57">\'+
            \'5X7\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h7"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU58">\'+
            \'5X8\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h8"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU59">\'+
            \'5X9\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h9"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU60">\'+
            \'6X0\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h10"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU61">\'+
            \'6X1\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h11"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU62">\'+
            \'6X2\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h12"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU63">\'+
            \'6X3\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h13"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU64">\'+
            \'6X4\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h14"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU65">\'+
            \'6X5\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h15"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU66">\'+
            \'6X6\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h16"].'"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU67">\'+
            \'6X7\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h17"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU68">\'+
            \'6X8\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h18"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU69">\'+
            \'6X9\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h19"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU70">\'+
            \'7X0\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h20"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU71">\'+
            \'7X1\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h21"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU72">\'+
            \'7X2\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h22"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU73">\'+
            \'7X3\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h23"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU74">\'+
            \'7X4\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h24"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU75">\'+
            \'7X5\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h25"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU76">\'+
            \'7X6\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h26"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU77">\'+
            \'7X7\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h27"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU78">\'+
            \'7X8\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h28"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU79">\'+
            \'7X9\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h29"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU80">\'+
            \'8X0\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h30"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU81">\'+
            \'8X1\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h31"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU82">\'+
            \'8X2\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h32"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU83">\'+
            \'8X3\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h33"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU84">\'+
            \'8X4\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h34"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU85">\'+
            \'8X5\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h35"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU86">\'+
            \'8X6\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h36"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU87">\'+
            \'8X7\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h37"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU88">\'+
            \'8X8\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h38"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU89">\'+
            \'8X9\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h39"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU90">\'+
            \'9X0\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h40"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU91">\'+
            \'9X1\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h41"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU92">\'+
            \'9X2\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h42"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU93">\'+
            \'9X3\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h43"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU94">\'+
            \'9X4\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h44"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU95">\'+
            \'9X5\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h45"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU96">\'+
            \'9X6\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h46"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU97">\'+
            \'9X7\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h47"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU98">\'+
            \'9X8\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h48"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="D2MU99">\'+
            \'9X9\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds2["h49"].'"/>\'+
        \'</td>\'+


    \'</tr>\'+
\'</table>\'+
\'</div>\'+
\'<div id="SendB3">\'+
    \'<button id="btn-save-odds" onclick="saveB3OddsByPart()" class="order">保存</button>\'+
    \'</div>\'+
\'</form>\';
document.getElementById("c_rtype").innerHTML = "佰个定位";
document.getElementById("sRtype").value = "D2MU";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "佰个定位";
}

$("#YearNum").text("'.$qishu.'");
(self.GameB3.install) && self.GameB3.install();
';