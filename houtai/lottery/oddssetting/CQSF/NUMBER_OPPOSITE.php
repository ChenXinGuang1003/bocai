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

$odds1 = odds_sf::getOddsByBall("重庆十分彩","正码和特别号","ball_1");
$odds2 = odds_sf::getOddsByBall("重庆十分彩","正码和特别号","ball_2");
$odds3 = odds_sf::getOddsByBall("重庆十分彩","正码和特别号","ball_3");
$odds4 = odds_sf::getOddsByBall("重庆十分彩","正码和特别号","ball_4");
$odds5 = odds_sf::getOddsByBall("重庆十分彩","正码和特别号","ball_5");
$odds6 = odds_sf::getOddsByBall("重庆十分彩","正码和特别号","ball_6");
$odds7 = odds_sf::getOddsByBall("重庆十分彩","正码和特别号","ball_7");
$odds8 = odds_sf::getOddsByBall("重庆十分彩","正码和特别号","ball_8");

echo '
<div id="locate-box">
    <table class="order-table" tabs-view="1">
        <caption>第一球</caption>
        <tr>
            <td class="choose">
                <span class="num ball">01</span>
                <input type="text" value="'.$odds1["h1"].'" id="number-ball_1-h1" />
            </td>
            <td class="choose">
                <span class="num ball">06</span>
                <input type="text" value="'.$odds1["h6"].'" id="number-ball_1-h6" />
            </td>
            <td class="choose">
                <span class="num ball">11</span>
                <input type="text" value="'.$odds1["h11"].'" id="number-ball_1-h11" />
            </td>
            <td class="choose">
                <span class="num ball">16</span>
                <input type="text" value="'.$odds1["h16"].'" id="number-ball_1-h16" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">02</span>
                <input type="text" value="'.$odds1["h2"].'" id="number-ball_1-h2" />
            </td>
            <td class="choose">
                <span class="num ball">07</span>
                <input type="text" value="'.$odds1["h7"].'" id="number-ball_1-h7" />
            </td>
            <td class="choose">
                <span class="num ball">12</span>
                <input type="text" value="'.$odds1["h12"].'" id="number-ball_1-h12" />
            </td>
            <td class="choose">
                <span class="num ball">17</span>
                <input type="text" value="'.$odds1["h17"].'" id="number-ball_1-h17" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">03</span>
                <input type="text" value="'.$odds1["h3"].'" id="number-ball_1-h3" />
            </td>
            <td class="choose">
                <span class="num ball">08</span>
                <input type="text" value="'.$odds1["h8"].'" id="number-ball_1-h8" />
            </td>
            <td class="choose">
                <span class="num ball">13</span>
                <input type="text" value="'.$odds1["h13"].'" id="number-ball_1-h13" />
            </td>
            <td class="choose">
                <span class="num ball">18</span>
                <input type="text" value="'.$odds1["h18"].'" id="number-ball_1-h18" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">04</span>
                <input type="text" value="'.$odds1["h4"].'" id="number-ball_1-h4" />
            </td>
            <td class="choose">
                <span class="num ball">09</span>
                <input type="text" value="'.$odds1["h9"].'" id="number-ball_1-h9" />
            </td>
            <td class="choose">
                <span class="num ball">14</span>
                <input type="text" value="'.$odds1["h14"].'" id="number-ball_1-h14" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <input type="text" value="'.$odds1["h19"].'" id="number-ball_1-h19" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">05</span>
                <input type="text" value="'.$odds1["h5"].'" id="number-ball_1-h5" />
            </td>
            <td class="choose">
                <span class="num ball">10</span>
                <input type="text" value="'.$odds1["h10"].'" id="number-ball_1-h10" />
            </td>
            <td class="choose">
                <span class="num ball">15</span>
                <input type="text" value="'.$odds1["h15"].'" id="number-ball_1-h15" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">20</span>
                <input type="text" value="'.$odds1["h20"].'" id="number-ball_1-h20" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <input type="text" value="'.$odds1["h21"].'" id="number-ball_1-h21" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <input type="text" value="'.$odds1["h23"].'" id="number-ball_1-h23" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <input type="text" value="'.$odds1["h25"].'" id="number-ball_1-h25" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <input type="text" value="'.$odds1["h27"].'" id="number-ball_1-h27" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <input type="text" value="'.$odds1["h22"].'" id="number-ball_1-h22" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <input type="text" value="'.$odds1["h24"].'" id="number-ball_1-h24" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <input type="text" value="'.$odds1["h26"].'" id="number-ball_1-h26" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <input type="text" value="'.$odds1["h28"].'" id="number-ball_1-h28" />
            </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="2">
        <caption>第二球</caption>
        <tr>
            <td class="choose">
                <span class="num ball">01</span>
                <input type="text" value="'.$odds2["h1"].'" id="number-ball_2-h1" />
            </td>
            <td class="choose">
                <span class="num ball">06</span>
                <input type="text" value="'.$odds2["h6"].'" id="number-ball_2-h6" />
            </td>
            <td class="choose">
                <span class="num ball">11</span>
                <input type="text" value="'.$odds2["h11"].'" id="number-ball_2-h11" />
            </td>
            <td class="choose">
                <span class="num ball">16</span>
                <input type="text" value="'.$odds2["h16"].'" id="number-ball_2-h16" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">02</span>
                <input type="text" value="'.$odds2["h2"].'" id="number-ball_2-h2" />
            </td>
            <td class="choose">
                <span class="num ball">07</span>
                <input type="text" value="'.$odds2["h7"].'" id="number-ball_2-h7" />
            </td>
            <td class="choose">
                <span class="num ball">12</span>
                <input type="text" value="'.$odds2["h12"].'" id="number-ball_2-h12" />
            </td>
            <td class="choose">
                <span class="num ball">17</span>
                <input type="text" value="'.$odds2["h17"].'" id="number-ball_2-h17" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">03</span>
                <input type="text" value="'.$odds2["h3"].'" id="number-ball_2-h3" />
            </td>
            <td class="choose">
                <span class="num ball">08</span>
                <input type="text" value="'.$odds2["h8"].'" id="number-ball_2-h8" />
            </td>
            <td class="choose">
                <span class="num ball">13</span>
                <input type="text" value="'.$odds2["h13"].'" id="number-ball_2-h13" />
            </td>
            <td class="choose">
                <span class="num ball">18</span>
                <input type="text" value="'.$odds2["h18"].'" id="number-ball_2-h18" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">04</span>
                <input type="text" value="'.$odds2["h4"].'" id="number-ball_2-h4" />
            </td>
            <td class="choose">
                <span class="num ball">09</span>
                <input type="text" value="'.$odds2["h9"].'" id="number-ball_2-h9" />
            </td>
            <td class="choose">
                <span class="num ball">14</span>
                <input type="text" value="'.$odds2["h14"].'" id="number-ball_2-h14" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <input type="text" value="'.$odds2["h19"].'" id="number-ball_2-h19" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">05</span>
                <input type="text" value="'.$odds2["h5"].'" id="number-ball_2-h5" />
            </td>
            <td class="choose">
                <span class="num ball">10</span>
                <input type="text" value="'.$odds2["h10"].'" id="number-ball_2-h10" />
            </td>
            <td class="choose">
                <span class="num ball">15</span>
                <input type="text" value="'.$odds2["h15"].'" id="number-ball_2-h15" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">20</span>
                <input type="text" value="'.$odds2["h20"].'" id="number-ball_2-h20" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <input type="text" value="'.$odds2["h21"].'" id="number-ball_2-h21" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <input type="text" value="'.$odds2["h23"].'" id="number-ball_2-h23" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <input type="text" value="'.$odds2["h25"].'" id="number-ball_2-h25" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <input type="text" value="'.$odds2["h27"].'" id="number-ball_2-h27" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <input type="text" value="'.$odds2["h22"].'" id="number-ball_2-h22" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <input type="text" value="'.$odds2["h24"].'" id="number-ball_2-h24" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <input type="text" value="'.$odds2["h26"].'" id="number-ball_2-h26" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <input type="text" value="'.$odds2["h28"].'" id="number-ball_2-h28" />
            </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="3">
        <caption>第三球</caption>
        <tr>
            <td class="choose">
                <span class="num ball">01</span>
                <input type="text" value="'.$odds3["h1"].'" id="number-ball_3-h1" />
            </td>
            <td class="choose">
                <span class="num ball">06</span>
                <input type="text" value="'.$odds3["h6"].'" id="number-ball_3-h6" />
            </td>
            <td class="choose">
                <span class="num ball">11</span>
                <input type="text" value="'.$odds3["h11"].'" id="number-ball_3-h11" />
            </td>
            <td class="choose">
                <span class="num ball">16</span>
                <input type="text" value="'.$odds3["h16"].'" id="number-ball_3-h16" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">02</span>
                <input type="text" value="'.$odds3["h2"].'" id="number-ball_3-h2" />
            </td>
            <td class="choose">
                <span class="num ball">07</span>
                <input type="text" value="'.$odds3["h7"].'" id="number-ball_3-h7" />
            </td>
            <td class="choose">
                <span class="num ball">12</span>
                <input type="text" value="'.$odds3["h12"].'" id="number-ball_3-h12" />
            </td>
            <td class="choose">
                <span class="num ball">17</span>
                <input type="text" value="'.$odds3["h17"].'" id="number-ball_3-h17" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">03</span>
                <input type="text" value="'.$odds3["h3"].'" id="number-ball_3-h3" />
            </td>
            <td class="choose">
                <span class="num ball">08</span>
                <input type="text" value="'.$odds3["h8"].'" id="number-ball_3-h8" />
            </td>
            <td class="choose">
                <span class="num ball">13</span>
                <input type="text" value="'.$odds3["h13"].'" id="number-ball_3-h13" />
            </td>
            <td class="choose">
                <span class="num ball">18</span>
                <input type="text" value="'.$odds3["h18"].'" id="number-ball_3-h18" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">04</span>
                <input type="text" value="'.$odds3["h4"].'" id="number-ball_3-h4" />
            </td>
            <td class="choose">
                <span class="num ball">09</span>
                <input type="text" value="'.$odds3["h9"].'" id="number-ball_3-h9" />
            </td>
            <td class="choose">
                <span class="num ball">14</span>
                <input type="text" value="'.$odds3["h14"].'" id="number-ball_3-h14" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <input type="text" value="'.$odds3["h19"].'" id="number-ball_3-h19" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">05</span>
                <input type="text" value="'.$odds3["h5"].'" id="number-ball_3-h5" />
            </td>
            <td class="choose">
                <span class="num ball">10</span>
                <input type="text" value="'.$odds3["h10"].'" id="number-ball_3-h10" />
            </td>
            <td class="choose">
                <span class="num ball">15</span>
                <input type="text" value="'.$odds3["h15"].'" id="number-ball_3-h15" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">20</span>
                <input type="text" value="'.$odds3["h20"].'" id="number-ball_3-h20" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <input type="text" value="'.$odds3["h21"].'" id="number-ball_3-h21" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <input type="text" value="'.$odds3["h23"].'" id="number-ball_3-h23" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <input type="text" value="'.$odds3["h25"].'" id="number-ball_3-h25" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <input type="text" value="'.$odds3["h27"].'" id="number-ball_3-h27" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <input type="text" value="'.$odds3["h22"].'" id="number-ball_3-h22" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <input type="text" value="'.$odds3["h24"].'" id="number-ball_3-h24" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <input type="text" value="'.$odds3["h26"].'" id="number-ball_3-h26" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <input type="text" value="'.$odds3["h28"].'" id="number-ball_3-h28" />
            </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="4">
        <caption>第四球</caption>
        <tr>
            <td class="choose">
                <span class="num ball">01</span>
                <input type="text" value="'.$odds4["h1"].'" id="number-ball_4-h1" />
            </td>
            <td class="choose">
                <span class="num ball">06</span>
                <input type="text" value="'.$odds4["h6"].'" id="number-ball_4-h6" />
            </td>
            <td class="choose">
                <span class="num ball">11</span>
                <input type="text" value="'.$odds4["h11"].'" id="number-ball_4-h11" />
            </td>
            <td class="choose">
                <span class="num ball">16</span>
                <input type="text" value="'.$odds4["h16"].'" id="number-ball_4-h16" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">02</span>
                <input type="text" value="'.$odds4["h2"].'" id="number-ball_4-h2" />
            </td>
            <td class="choose">
                <span class="num ball">07</span>
                <input type="text" value="'.$odds4["h7"].'" id="number-ball_4-h7" />
            </td>
            <td class="choose">
                <span class="num ball">12</span>
                <input type="text" value="'.$odds4["h12"].'" id="number-ball_4-h12" />
            </td>
            <td class="choose">
                <span class="num ball">17</span>
                <input type="text" value="'.$odds4["h17"].'" id="number-ball_4-h17" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">03</span>
                <input type="text" value="'.$odds4["h3"].'" id="number-ball_4-h3" />
            </td>
            <td class="choose">
                <span class="num ball">08</span>
                <input type="text" value="'.$odds4["h8"].'" id="number-ball_4-h8" />
            </td>
            <td class="choose">
                <span class="num ball">13</span>
                <input type="text" value="'.$odds4["h13"].'" id="number-ball_4-h13" />
            </td>
            <td class="choose">
                <span class="num ball">18</span>
                <input type="text" value="'.$odds4["h18"].'" id="number-ball_4-h18" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">04</span>
                <input type="text" value="'.$odds4["h4"].'" id="number-ball_4-h4" />
            </td>
            <td class="choose">
                <span class="num ball">09</span>
                <input type="text" value="'.$odds4["h9"].'" id="number-ball_4-h9" />
            </td>
            <td class="choose">
                <span class="num ball">14</span>
                <input type="text" value="'.$odds4["h14"].'" id="number-ball_4-h14" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <input type="text" value="'.$odds4["h19"].'" id="number-ball_4-h19" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">05</span>
                <input type="text" value="'.$odds4["h5"].'" id="number-ball_4-h5" />
            </td>
            <td class="choose">
                <span class="num ball">10</span>
                <input type="text" value="'.$odds4["h10"].'" id="number-ball_4-h10" />
            </td>
            <td class="choose">
                <span class="num ball">15</span>
                <input type="text" value="'.$odds4["h15"].'" id="number-ball_4-h15" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">20</span>
                <input type="text" value="'.$odds4["h20"].'" id="number-ball_4-h20" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <input type="text" value="'.$odds4["h21"].'" id="number-ball_4-h21" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <input type="text" value="'.$odds4["h23"].'" id="number-ball_4-h23" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <input type="text" value="'.$odds4["h25"].'" id="number-ball_4-h25" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <input type="text" value="'.$odds4["h27"].'" id="number-ball_4-h27" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <input type="text" value="'.$odds4["h22"].'" id="number-ball_4-h22" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <input type="text" value="'.$odds4["h24"].'" id="number-ball_4-h24" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <input type="text" value="'.$odds4["h26"].'" id="number-ball_4-h26" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <input type="text" value="'.$odds4["h28"].'" id="number-ball_4-h28" />
            </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="5">
        <caption>第五球</caption>
        <tr>
            <td class="choose">
                <span class="num ball">01</span>
                <input type="text" value="'.$odds5["h1"].'" id="number-ball_5-h1" />
            </td>
            <td class="choose">
                <span class="num ball">06</span>
                <input type="text" value="'.$odds5["h6"].'" id="number-ball_5-h6" />
            </td>
            <td class="choose">
                <span class="num ball">11</span>
                <input type="text" value="'.$odds5["h11"].'" id="number-ball_5-h11" />
            </td>
            <td class="choose">
                <span class="num ball">16</span>
                <input type="text" value="'.$odds5["h16"].'" id="number-ball_5-h16" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">02</span>
                <input type="text" value="'.$odds5["h2"].'" id="number-ball_5-h2" />
            </td>
            <td class="choose">
                <span class="num ball">07</span>
                <input type="text" value="'.$odds5["h7"].'" id="number-ball_5-h7" />
            </td>
            <td class="choose">
                <span class="num ball">12</span>
                <input type="text" value="'.$odds5["h12"].'" id="number-ball_5-h12" />
            </td>
            <td class="choose">
                <span class="num ball">17</span>
                <input type="text" value="'.$odds5["h17"].'" id="number-ball_5-h17" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">03</span>
                <input type="text" value="'.$odds5["h3"].'" id="number-ball_5-h3" />
            </td>
            <td class="choose">
                <span class="num ball">08</span>
                <input type="text" value="'.$odds5["h8"].'" id="number-ball_5-h8" />
            </td>
            <td class="choose">
                <span class="num ball">13</span>
                <input type="text" value="'.$odds5["h13"].'" id="number-ball_5-h13" />
            </td>
            <td class="choose">
                <span class="num ball">18</span>
                <input type="text" value="'.$odds5["h18"].'" id="number-ball_5-h18" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">04</span>
                <input type="text" value="'.$odds5["h4"].'" id="number-ball_5-h4" />
            </td>
            <td class="choose">
                <span class="num ball">09</span>
                <input type="text" value="'.$odds5["h9"].'" id="number-ball_5-h9" />
            </td>
            <td class="choose">
                <span class="num ball">14</span>
                <input type="text" value="'.$odds5["h14"].'" id="number-ball_5-h14" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <input type="text" value="'.$odds5["h19"].'" id="number-ball_5-h19" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">05</span>
                <input type="text" value="'.$odds5["h5"].'" id="number-ball_5-h5" />
            </td>
            <td class="choose">
                <span class="num ball">10</span>
                <input type="text" value="'.$odds5["h10"].'" id="number-ball_5-h10" />
            </td>
            <td class="choose">
                <span class="num ball">15</span>
                <input type="text" value="'.$odds5["h15"].'" id="number-ball_5-h15" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">20</span>
                <input type="text" value="'.$odds5["h20"].'" id="number-ball_5-h20" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <input type="text" value="'.$odds5["h21"].'" id="number-ball_5-h21" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <input type="text" value="'.$odds5["h23"].'" id="number-ball_5-h23" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <input type="text" value="'.$odds5["h25"].'" id="number-ball_5-h25" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <input type="text" value="'.$odds5["h27"].'" id="number-ball_5-h27" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <input type="text" value="'.$odds5["h22"].'" id="number-ball_5-h22" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <input type="text" value="'.$odds5["h24"].'" id="number-ball_5-h24" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <input type="text" value="'.$odds5["h26"].'" id="number-ball_5-h26" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <input type="text" value="'.$odds5["h28"].'" id="number-ball_5-h28" />
            </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="6">
        <caption>第六球</caption>
        <tr>
            <td class="choose">
                <span class="num ball">01</span>
                <input type="text" value="'.$odds6["h1"].'" id="number-ball_6-h1" />
            </td>
            <td class="choose">
                <span class="num ball">06</span>
                <input type="text" value="'.$odds6["h6"].'" id="number-ball_6-h6" />
            </td>
            <td class="choose">
                <span class="num ball">11</span>
                <input type="text" value="'.$odds6["h11"].'" id="number-ball_6-h11" />
            </td>
            <td class="choose">
                <span class="num ball">16</span>
                <input type="text" value="'.$odds6["h16"].'" id="number-ball_6-h16" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">02</span>
                <input type="text" value="'.$odds6["h2"].'" id="number-ball_6-h2" />
            </td>
            <td class="choose">
                <span class="num ball">07</span>
                <input type="text" value="'.$odds6["h7"].'" id="number-ball_6-h7" />
            </td>
            <td class="choose">
                <span class="num ball">12</span>
                <input type="text" value="'.$odds6["h12"].'" id="number-ball_6-h12" />
            </td>
            <td class="choose">
                <span class="num ball">17</span>
                <input type="text" value="'.$odds6["h17"].'" id="number-ball_6-h17" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">03</span>
                <input type="text" value="'.$odds6["h3"].'" id="number-ball_6-h3" />
            </td>
            <td class="choose">
                <span class="num ball">08</span>
                <input type="text" value="'.$odds6["h8"].'" id="number-ball_6-h8" />
            </td>
            <td class="choose">
                <span class="num ball">13</span>
                <input type="text" value="'.$odds6["h13"].'" id="number-ball_6-h13" />
            </td>
            <td class="choose">
                <span class="num ball">18</span>
                <input type="text" value="'.$odds6["h18"].'" id="number-ball_6-h18" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">04</span>
                <input type="text" value="'.$odds6["h4"].'" id="number-ball_6-h4" />
            </td>
            <td class="choose">
                <span class="num ball">09</span>
                <input type="text" value="'.$odds6["h9"].'" id="number-ball_6-h9" />
            </td>
            <td class="choose">
                <span class="num ball">14</span>
                <input type="text" value="'.$odds6["h14"].'" id="number-ball_6-h14" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <input type="text" value="'.$odds6["h19"].'" id="number-ball_6-h19" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">05</span>
                <input type="text" value="'.$odds6["h5"].'" id="number-ball_6-h5" />
            </td>
            <td class="choose">
                <span class="num ball">10</span>
                <input type="text" value="'.$odds6["h10"].'" id="number-ball_6-h10" />
            </td>
            <td class="choose">
                <span class="num ball">15</span>
                <input type="text" value="'.$odds6["h15"].'" id="number-ball_6-h15" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">20</span>
                <input type="text" value="'.$odds6["h20"].'" id="number-ball_6-h20" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <input type="text" value="'.$odds6["h21"].'" id="number-ball_6-h21" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <input type="text" value="'.$odds6["h23"].'" id="number-ball_6-h23" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <input type="text" value="'.$odds6["h25"].'" id="number-ball_6-h25" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <input type="text" value="'.$odds6["h27"].'" id="number-ball_6-h27" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <input type="text" value="'.$odds6["h22"].'" id="number-ball_6-h22" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <input type="text" value="'.$odds6["h24"].'" id="number-ball_6-h24" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <input type="text" value="'.$odds6["h26"].'" id="number-ball_6-h26" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <input type="text" value="'.$odds6["h28"].'" id="number-ball_6-h28" />
            </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="7">
        <caption>第七球</caption>
        <tr>
            <td class="choose">
                <span class="num ball">01</span>
                <input type="text" value="'.$odds7["h1"].'" id="number-ball_7-h1" />
            </td>
            <td class="choose">
                <span class="num ball">06</span>
                <input type="text" value="'.$odds7["h6"].'" id="number-ball_7-h6" />
            </td>
            <td class="choose">
                <span class="num ball">11</span>
                <input type="text" value="'.$odds7["h11"].'" id="number-ball_7-h11" />
            </td>
            <td class="choose">
                <span class="num ball">16</span>
                <input type="text" value="'.$odds7["h16"].'" id="number-ball_7-h16" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">02</span>
                <input type="text" value="'.$odds7["h2"].'" id="number-ball_7-h2" />
            </td>
            <td class="choose">
                <span class="num ball">07</span>
                <input type="text" value="'.$odds7["h7"].'" id="number-ball_7-h7" />
            </td>
            <td class="choose">
                <span class="num ball">12</span>
                <input type="text" value="'.$odds7["h12"].'" id="number-ball_7-h12" />
            </td>
            <td class="choose">
                <span class="num ball">17</span>
                <input type="text" value="'.$odds7["h17"].'" id="number-ball_7-h17" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">03</span>
                <input type="text" value="'.$odds7["h3"].'" id="number-ball_7-h3" />
            </td>
            <td class="choose">
                <span class="num ball">08</span>
                <input type="text" value="'.$odds7["h8"].'" id="number-ball_7-h8" />
            </td>
            <td class="choose">
                <span class="num ball">13</span>
                <input type="text" value="'.$odds7["h13"].'" id="number-ball_7-h13" />
            </td>
            <td class="choose">
                <span class="num ball">18</span>
                <input type="text" value="'.$odds7["h18"].'" id="number-ball_7-h18" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">04</span>
                <input type="text" value="'.$odds7["h4"].'" id="number-ball_7-h4" />
            </td>
            <td class="choose">
                <span class="num ball">09</span>
                <input type="text" value="'.$odds7["h9"].'" id="number-ball_7-h9" />
            </td>
            <td class="choose">
                <span class="num ball">14</span>
                <input type="text" value="'.$odds7["h14"].'" id="number-ball_7-h14" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <input type="text" value="'.$odds7["h19"].'" id="number-ball_7-h19" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">05</span>
                <input type="text" value="'.$odds7["h5"].'" id="number-ball_7-h5" />
            </td>
            <td class="choose">
                <span class="num ball">10</span>
                <input type="text" value="'.$odds7["h10"].'" id="number-ball_7-h10" />
            </td>
            <td class="choose">
                <span class="num ball">15</span>
                <input type="text" value="'.$odds7["h15"].'" id="number-ball_7-h15" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">20</span>
                <input type="text" value="'.$odds7["h20"].'" id="number-ball_7-h20" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <input type="text" value="'.$odds7["h21"].'" id="number-ball_7-h21" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <input type="text" value="'.$odds7["h23"].'" id="number-ball_7-h23" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <input type="text" value="'.$odds7["h25"].'" id="number-ball_7-h25" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <input type="text" value="'.$odds7["h27"].'" id="number-ball_7-h27" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <input type="text" value="'.$odds7["h22"].'" id="number-ball_7-h22" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <input type="text" value="'.$odds7["h24"].'" id="number-ball_7-h24" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <input type="text" value="'.$odds7["h26"].'" id="number-ball_7-h26" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <input type="text" value="'.$odds7["h28"].'" id="number-ball_7-h28" />
            </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="S">
        <caption>第八球</caption>
        <tr>
            <td class="choose">
                <span class="num ball">01</span>
                <input type="text" value="'.$odds8["h1"].'" id="number-ball_8-h1" />
            </td>
            <td class="choose">
                <span class="num ball">06</span>
                <input type="text" value="'.$odds8["h6"].'" id="number-ball_8-h6" />
            </td>
            <td class="choose">
                <span class="num ball">11</span>
                <input type="text" value="'.$odds8["h11"].'" id="number-ball_8-h11" />
            </td>
            <td class="choose">
                <span class="num ball">16</span>
                <input type="text" value="'.$odds8["h16"].'" id="number-ball_8-h16" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">02</span>
                <input type="text" value="'.$odds8["h2"].'" id="number-ball_8-h2" />
            </td>
            <td class="choose">
                <span class="num ball">07</span>
                <input type="text" value="'.$odds8["h7"].'" id="number-ball_8-h7" />
            </td>
            <td class="choose">
                <span class="num ball">12</span>
                <input type="text" value="'.$odds8["h12"].'" id="number-ball_8-h12" />
            </td>
            <td class="choose">
                <span class="num ball">17</span>
                <input type="text" value="'.$odds8["h17"].'" id="number-ball_8-h17" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">03</span>
                <input type="text" value="'.$odds8["h3"].'" id="number-ball_8-h3" />
            </td>
            <td class="choose">
                <span class="num ball">08</span>
                <input type="text" value="'.$odds8["h8"].'" id="number-ball_8-h8" />
            </td>
            <td class="choose">
                <span class="num ball">13</span>
                <input type="text" value="'.$odds8["h13"].'" id="number-ball_8-h13" />
            </td>
            <td class="choose">
                <span class="num ball">18</span>
                <input type="text" value="'.$odds8["h18"].'" id="number-ball_8-h18" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">04</span>
                <input type="text" value="'.$odds8["h4"].'" id="number-ball_8-h4" />
            </td>
            <td class="choose">
                <span class="num ball">09</span>
                <input type="text" value="'.$odds8["h9"].'" id="number-ball_8-h9" />
            </td>
            <td class="choose">
                <span class="num ball">14</span>
                <input type="text" value="'.$odds8["h14"].'" id="number-ball_8-h14" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <input type="text" value="'.$odds8["h19"].'" id="number-ball_8-h19" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">05</span>
                <input type="text" value="'.$odds8["h5"].'" id="number-ball_8-h5" />
            </td>
            <td class="choose">
                <span class="num ball">10</span>
                <input type="text" value="'.$odds8["h10"].'" id="number-ball_8-h10" />
            </td>
            <td class="choose">
                <span class="num ball">15</span>
                <input type="text" value="'.$odds8["h15"].'" id="number-ball_8-h15" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">20</span>
                <input type="text" value="'.$odds8["h20"].'" id="number-ball_8-h20" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <input type="text" value="'.$odds8["h21"].'" id="number-ball_8-h21" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <input type="text" value="'.$odds8["h23"].'" id="number-ball_8-h23" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <input type="text" value="'.$odds8["h25"].'" id="number-ball_8-h25" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <input type="text" value="'.$odds8["h27"].'" id="number-ball_8-h27" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <input type="text" value="'.$odds8["h22"].'" id="number-ball_8-h22" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <input type="text" value="'.$odds8["h24"].'" id="number-ball_8-h24" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <input type="text" value="'.$odds8["h26"].'" id="number-ball_8-h26" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <input type="text" value="'.$odds8["h28"].'" id="number-ball_8-h28" />
            </td>
        </tr>
    </table>
    </div>
';