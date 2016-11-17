<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/class/odds_sf.php");

$odds1 = odds_sf::getOddsByBall("广西十分彩","正码和特别号","ball_1");
$odds2 = odds_sf::getOddsByBall("广西十分彩","正码和特别号","ball_2");
$odds3 = odds_sf::getOddsByBall("广西十分彩","正码和特别号","ball_3");
$odds4 = odds_sf::getOddsByBall("广西十分彩","正码和特别号","ball_4");

echo '
<div id="locate-box">
    <table class="order-table" tabs-view="1">
        <caption>正码一特</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">01</span>
            <input type="text" value="'.$odds1["h1"].'" id="number-ball_1-h1" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">08</span>
            <input type="text" value="'.$odds1["h8"].'" id="number-ball_1-h8" />  </td>
            <td class="choose">
                <span class="num ball ball-green">15</span>
            <input type="text" value="'.$odds1["h15"].'" id="number-ball_1-h15" />  </td>
            <td class="choose">
                <font class="choose-name red">红波</font>
            <input type="text" value="'.$odds1["h22"].'" id="number-ball_1-h22" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">02</span>
            <input type="text" value="'.$odds1["h2"].'" id="number-ball_1-h2" />  </td>
            <td class="choose">
                <span class="num ball ball-green">09</span>
            <input type="text" value="'.$odds1["h9"].'" id="number-ball_1-h9" />  </td>
            <td class="choose">
                <span class="num ball ball-red">16</span>
            <input type="text" value="'.$odds1["h16"].'" id="number-ball_1-h16" />  </td>
            <td class="choose">
                <font class="choose-name blue">蓝波</font>
            <input type="text" value="'.$odds1["h23"].'" id="number-ball_1-h23" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">03</span>
            <input type="text" value="'.$odds1["h3"].'" id="number-ball_1-h3" />  </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>
            <input type="text" value="'.$odds1["h10"].'" id="number-ball_1-h10" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">17</span>
            <input type="text" value="'.$odds1["h17"].'" id="number-ball_1-h17" />  </td>
            <td class="choose">
                <font class="choose-name green">绿波</font>
            <input type="text" value="'.$odds1["h24"].'" id="number-ball_1-h24" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">04</span>
            <input type="text" value="'.$odds1["h4"].'" id="number-ball_1-h4" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>
            <input type="text" value="'.$odds1["h11"].'" id="number-ball_1-h11" />  </td>
            <td class="choose">
                <span class="num ball ball-green">18</span>
            <input type="text" value="'.$odds1["h18"].'" id="number-ball_1-h18" />  </td>
            <td class="choose">
                <font class="choose-name">大单</font>
            <input type="text" value="'.$odds1["h25"].'" id="number-ball_1-h25" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">05</span>
            <input type="text" value="'.$odds1["h5"].'" id="number-ball_1-h5" />  </td>
            <td class="choose">
                <span class="num ball ball-green">12</span>
            <input type="text" value="'.$odds1["h12"].'" id="number-ball_1-h12" />  </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
            <input type="text" value="'.$odds1["h19"].'" id="number-ball_1-h19" />  </td>
            <td class="choose">
                <font class="choose-name">大双</font>
            <input type="text" value="'.$odds1["h26"].'" id="number-ball_1-h26" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">06</span>
            <input type="text" value="'.$odds1["h6"].'" id="number-ball_1-h6" />  </td>
            <td class="choose">
                <span class="num ball ball-red">13</span>
            <input type="text" value="'.$odds1["h13"].'" id="number-ball_1-h13" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">20</span>
            <input type="text" value="'.$odds1["h20"].'" id="number-ball_1-h20" />  </td>
            <td class="choose">
                <font class="choose-name">小单</font>
            <input type="text" value="'.$odds1["h27"].'" id="number-ball_1-h27" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">07</span>
            <input type="text" value="'.$odds1["h7"].'" id="number-ball_1-h7" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">14</span>
            <input type="text" value="'.$odds1["h14"].'" id="number-ball_1-h14" />  </td>
            <td class="choose">
                <span class="num ball ball-green">21</span>
            <input type="text" value="'.$odds1["h21"].'" id="number-ball_1-h21" />  </td>
            <td class="choose">
                <font class="choose-name">小双</font>
            <input type="text" value="'.$odds1["h28"].'" id="number-ball_1-h28" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
            <input type="text" value="'.$odds1["h29"].'" id="number-ball_1-h29" />  </td>
            <td class="choose">
                <font class="choose-name">单</font>
            <input type="text" value="'.$odds1["h31"].'" id="number-ball_1-h31" />  </td>
            <td class="choose">
                <font class="choose-name">和单</font>
            <input type="text" value="'.$odds1["h33"].'" id="number-ball_1-h33" />  </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
            <input type="text" value="'.$odds1["h35"].'" id="number-ball_1-h35" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
            <input type="text" value="'.$odds1["h30"].'" id="number-ball_1-h30" />  </td>
            <td class="choose">
                <font class="choose-name">双</font>
            <input type="text" value="'.$odds1["h32"].'" id="number-ball_1-h32" />  </td>
            <td class="choose">
                <font class="choose-name">和双</font>
            <input type="text" value="'.$odds1["h34"].'" id="number-ball_1-h34" />  </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
            <input type="text" value="'.$odds1["h36"].'" id="number-ball_1-h36" />  </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="2">
        <caption>正码二特</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">01</span>
            <input type="text" value="'.$odds2["h1"].'" id="number-ball_2-h1" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">08</span>
            <input type="text" value="'.$odds2["h8"].'" id="number-ball_2-h8" />  </td>
            <td class="choose">
                <span class="num ball ball-green">15</span>
            <input type="text" value="'.$odds2["h15"].'" id="number-ball_2-h15" />  </td>
            <td class="choose">
                <font class="choose-name red">红波</font>
            <input type="text" value="'.$odds2["h22"].'" id="number-ball_2-h22" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">02</span>
            <input type="text" value="'.$odds2["h2"].'" id="number-ball_2-h2" />  </td>
            <td class="choose">
                <span class="num ball ball-green">09</span>
            <input type="text" value="'.$odds2["h9"].'" id="number-ball_2-h9" />  </td>
            <td class="choose">
                <span class="num ball ball-red">16</span>
            <input type="text" value="'.$odds2["h16"].'" id="number-ball_2-h16" />  </td>
            <td class="choose">
                <font class="choose-name blue">蓝波</font>
            <input type="text" value="'.$odds2["h23"].'" id="number-ball_2-h23" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">03</span>
            <input type="text" value="'.$odds2["h3"].'" id="number-ball_2-h3" />  </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>
            <input type="text" value="'.$odds2["h10"].'" id="number-ball_2-h10" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">17</span>
            <input type="text" value="'.$odds2["h17"].'" id="number-ball_2-h17" />  </td>
            <td class="choose">
                <font class="choose-name green">绿波</font>
            <input type="text" value="'.$odds2["h24"].'" id="number-ball_2-h24" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">04</span>
            <input type="text" value="'.$odds2["h4"].'" id="number-ball_2-h4" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>
            <input type="text" value="'.$odds2["h11"].'" id="number-ball_2-h11" />  </td>
            <td class="choose">
                <span class="num ball ball-green">18</span>
            <input type="text" value="'.$odds2["h18"].'" id="number-ball_2-h18" />  </td>
            <td class="choose">
                <font class="choose-name">大单</font>
            <input type="text" value="'.$odds2["h25"].'" id="number-ball_2-h25" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">05</span>
            <input type="text" value="'.$odds2["h5"].'" id="number-ball_2-h5" />  </td>
            <td class="choose">
                <span class="num ball ball-green">12</span>
            <input type="text" value="'.$odds2["h12"].'" id="number-ball_2-h12" />  </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
            <input type="text" value="'.$odds2["h19"].'" id="number-ball_2-h19" />  </td>
            <td class="choose">
                <font class="choose-name">大双</font>
            <input type="text" value="'.$odds2["h26"].'" id="number-ball_2-h26" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">06</span>
            <input type="text" value="'.$odds2["h6"].'" id="number-ball_2-h6" />  </td>
            <td class="choose">
                <span class="num ball ball-red">13</span>
            <input type="text" value="'.$odds2["h13"].'" id="number-ball_2-h13" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">20</span>
            <input type="text" value="'.$odds2["h20"].'" id="number-ball_2-h20" />  </td>
            <td class="choose">
                <font class="choose-name">小单</font>
            <input type="text" value="'.$odds2["h27"].'" id="number-ball_2-h27" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">07</span>
            <input type="text" value="'.$odds2["h7"].'" id="number-ball_2-h7" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">14</span>
            <input type="text" value="'.$odds2["h14"].'" id="number-ball_2-h14" />  </td>
            <td class="choose">
                <span class="num ball ball-green">21</span>
            <input type="text" value="'.$odds2["h21"].'" id="number-ball_2-h21" />  </td>
            <td class="choose">
                <font class="choose-name">小双</font>
            <input type="text" value="'.$odds2["h28"].'" id="number-ball_2-h28" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
            <input type="text" value="'.$odds2["h29"].'" id="number-ball_2-h29" />  </td>
            <td class="choose">
                <font class="choose-name">单</font>
            <input type="text" value="'.$odds2["h31"].'" id="number-ball_2-h31" />  </td>
            <td class="choose">
                <font class="choose-name">和单</font>
            <input type="text" value="'.$odds2["h33"].'" id="number-ball_2-h33" />  </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
            <input type="text" value="'.$odds2["h35"].'" id="number-ball_2-h35" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
            <input type="text" value="'.$odds2["h30"].'" id="number-ball_2-h30" />  </td>
            <td class="choose">
                <font class="choose-name">双</font>
            <input type="text" value="'.$odds2["h32"].'" id="number-ball_2-h32" />  </td>
            <td class="choose">
                <font class="choose-name">和双</font>
            <input type="text" value="'.$odds2["h34"].'" id="number-ball_2-h34" />  </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
            <input type="text" value="'.$odds2["h36"].'" id="number-ball_2-h36" />  </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="3">
        <caption>正码三特</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">01</span>
            <input type="text" value="'.$odds3["h1"].'" id="number-ball_3-h1" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">08</span>
            <input type="text" value="'.$odds3["h8"].'" id="number-ball_3-h8" />  </td>
            <td class="choose">
                <span class="num ball ball-green">15</span>
            <input type="text" value="'.$odds3["h15"].'" id="number-ball_3-h15" />  </td>
            <td class="choose">
                <font class="choose-name red">红波</font>
            <input type="text" value="'.$odds3["h22"].'" id="number-ball_3-h22" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">02</span>
            <input type="text" value="'.$odds3["h2"].'" id="number-ball_3-h2" />  </td>
            <td class="choose">
                <span class="num ball ball-green">09</span>
            <input type="text" value="'.$odds3["h9"].'" id="number-ball_3-h9" />  </td>
            <td class="choose">
                <span class="num ball ball-red">16</span>
            <input type="text" value="'.$odds3["h16"].'" id="number-ball_3-h16" />  </td>
            <td class="choose">
                <font class="choose-name blue">蓝波</font>
            <input type="text" value="'.$odds3["h23"].'" id="number-ball_3-h23" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">03</span>
            <input type="text" value="'.$odds3["h3"].'" id="number-ball_3-h3" />  </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>
            <input type="text" value="'.$odds3["h10"].'" id="number-ball_3-h10" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">17</span>
            <input type="text" value="'.$odds3["h17"].'" id="number-ball_3-h17" />  </td>
            <td class="choose">
                <font class="choose-name green">绿波</font>
            <input type="text" value="'.$odds3["h24"].'" id="number-ball_3-h24" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">04</span>
            <input type="text" value="'.$odds3["h4"].'" id="number-ball_3-h4" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>
            <input type="text" value="'.$odds3["h11"].'" id="number-ball_3-h11" />  </td>
            <td class="choose">
                <span class="num ball ball-green">18</span>
            <input type="text" value="'.$odds3["h18"].'" id="number-ball_3-h18" />  </td>
            <td class="choose">
                <font class="choose-name">大单</font>
            <input type="text" value="'.$odds3["h25"].'" id="number-ball_3-h25" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">05</span>
            <input type="text" value="'.$odds3["h5"].'" id="number-ball_3-h5" />  </td>
            <td class="choose">
                <span class="num ball ball-green">12</span>
            <input type="text" value="'.$odds3["h12"].'" id="number-ball_3-h12" />  </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
            <input type="text" value="'.$odds3["h19"].'" id="number-ball_3-h19" />  </td>
            <td class="choose">
                <font class="choose-name">大双</font>
            <input type="text" value="'.$odds3["h26"].'" id="number-ball_3-h26" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">06</span>
            <input type="text" value="'.$odds3["h6"].'" id="number-ball_3-h6" />  </td>
            <td class="choose">
                <span class="num ball ball-red">13</span>
            <input type="text" value="'.$odds3["h13"].'" id="number-ball_3-h13" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">20</span>
            <input type="text" value="'.$odds3["h20"].'" id="number-ball_3-h20" />  </td>
            <td class="choose">
                <font class="choose-name">小单</font>
            <input type="text" value="'.$odds3["h27"].'" id="number-ball_3-h27" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">07</span>
            <input type="text" value="'.$odds3["h7"].'" id="number-ball_3-h7" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">14</span>
            <input type="text" value="'.$odds3["h14"].'" id="number-ball_3-h14" />  </td>
            <td class="choose">
                <span class="num ball ball-green">21</span>
            <input type="text" value="'.$odds3["h21"].'" id="number-ball_3-h21" />  </td>
            <td class="choose">
                <font class="choose-name">小双</font>
            <input type="text" value="'.$odds3["h28"].'" id="number-ball_3-h28" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
            <input type="text" value="'.$odds3["h29"].'" id="number-ball_3-h29" />  </td>
            <td class="choose">
                <font class="choose-name">单</font>
            <input type="text" value="'.$odds3["h31"].'" id="number-ball_3-h31" />  </td>
            <td class="choose">
                <font class="choose-name">和单</font>
            <input type="text" value="'.$odds3["h33"].'" id="number-ball_3-h33" />  </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
            <input type="text" value="'.$odds3["h35"].'" id="number-ball_3-h35" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
            <input type="text" value="'.$odds3["h30"].'" id="number-ball_3-h30" />  </td>
            <td class="choose">
                <font class="choose-name">双</font>
            <input type="text" value="'.$odds3["h32"].'" id="number-ball_3-h32" />  </td>
            <td class="choose">
                <font class="choose-name">和双</font>
            <input type="text" value="'.$odds3["h34"].'" id="number-ball_3-h34" />  </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
            <input type="text" value="'.$odds3["h36"].'" id="number-ball_3-h36" />  </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="4">
        <caption>正码四特</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">01</span>
            <input type="text" value="'.$odds4["h1"].'" id="number-ball_4-h1" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">08</span>
            <input type="text" value="'.$odds4["h8"].'" id="number-ball_4-h8" />  </td>
            <td class="choose">
                <span class="num ball ball-green">15</span>
            <input type="text" value="'.$odds4["h15"].'" id="number-ball_4-h15" />  </td>
            <td class="choose">
                <font class="choose-name red">红波</font>
            <input type="text" value="'.$odds4["h22"].'" id="number-ball_4-h22" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">02</span>
            <input type="text" value="'.$odds4["h2"].'" id="number-ball_4-h2" />  </td>
            <td class="choose">
                <span class="num ball ball-green">09</span>
            <input type="text" value="'.$odds4["h9"].'" id="number-ball_4-h9" />  </td>
            <td class="choose">
                <span class="num ball ball-red">16</span>
            <input type="text" value="'.$odds4["h16"].'" id="number-ball_4-h16" />  </td>
            <td class="choose">
                <font class="choose-name blue">蓝波</font>
            <input type="text" value="'.$odds4["h23"].'" id="number-ball_4-h23" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">03</span>
            <input type="text" value="'.$odds4["h3"].'" id="number-ball_4-h3" />  </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>
            <input type="text" value="'.$odds4["h10"].'" id="number-ball_4-h10" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">17</span>
            <input type="text" value="'.$odds4["h17"].'" id="number-ball_4-h17" />  </td>
            <td class="choose">
                <font class="choose-name green">绿波</font>
            <input type="text" value="'.$odds4["h24"].'" id="number-ball_4-h24" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">04</span>
            <input type="text" value="'.$odds4["h4"].'" id="number-ball_4-h4" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>
            <input type="text" value="'.$odds4["h11"].'" id="number-ball_4-h11" />  </td>
            <td class="choose">
                <span class="num ball ball-green">18</span>
            <input type="text" value="'.$odds4["h18"].'" id="number-ball_4-h18" />  </td>
            <td class="choose">
                <font class="choose-name">大单</font>
            <input type="text" value="'.$odds4["h25"].'" id="number-ball_4-h25" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">05</span>
            <input type="text" value="'.$odds4["h5"].'" id="number-ball_4-h5" />  </td>
            <td class="choose">
                <span class="num ball ball-green">12</span>
            <input type="text" value="'.$odds4["h12"].'" id="number-ball_4-h12" />  </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
            <input type="text" value="'.$odds4["h19"].'" id="number-ball_4-h19" />  </td>
            <td class="choose">
                <font class="choose-name">大双</font>
            <input type="text" value="'.$odds4["h26"].'" id="number-ball_4-h26" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">06</span>
            <input type="text" value="'.$odds4["h6"].'" id="number-ball_4-h6" />  </td>
            <td class="choose">
                <span class="num ball ball-red">13</span>
            <input type="text" value="'.$odds4["h13"].'" id="number-ball_4-h13" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">20</span>
            <input type="text" value="'.$odds4["h20"].'" id="number-ball_4-h20" />  </td>
            <td class="choose">
                <font class="choose-name">小单</font>
            <input type="text" value="'.$odds4["h27"].'" id="number-ball_4-h27" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">07</span>
            <input type="text" value="'.$odds4["h7"].'" id="number-ball_4-h7" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">14</span>
            <input type="text" value="'.$odds4["h14"].'" id="number-ball_4-h14" />  </td>
            <td class="choose">
                <span class="num ball ball-green">21</span>
            <input type="text" value="'.$odds4["h21"].'" id="number-ball_4-h21" />  </td>
            <td class="choose">
                <font class="choose-name">小双</font>
            <input type="text" value="'.$odds4["h28"].'" id="number-ball_4-h28" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
            <input type="text" value="'.$odds4["h29"].'" id="number-ball_4-h29" />  </td>
            <td class="choose">
                <font class="choose-name">单</font>
            <input type="text" value="'.$odds4["h31"].'" id="number-ball_4-h31" />  </td>
            <td class="choose">
                <font class="choose-name">和单</font>
            <input type="text" value="'.$odds4["h33"].'" id="number-ball_4-h33" />  </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
            <input type="text" value="'.$odds4["h35"].'" id="number-ball_4-h35" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
            <input type="text" value="'.$odds4["h30"].'" id="number-ball_4-h30" />  </td>
            <td class="choose">
                <font class="choose-name">双</font>
            <input type="text" value="'.$odds4["h32"].'" id="number-ball_4-h32" />  </td>
            <td class="choose">
                <font class="choose-name">和双</font>
            <input type="text" value="'.$odds4["h34"].'" id="number-ball_4-h34" />  </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
            <input type="text" value="'.$odds4["h36"].'" id="number-ball_4-h36" />  </td>
        </tr>
    </table>
    </div>
';