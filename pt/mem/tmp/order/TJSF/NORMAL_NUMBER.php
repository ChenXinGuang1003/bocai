<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

$odds1 = odds_sf::getOddsByBall("天津十分彩","正码和特别号","ball_1");
$odds2 = odds_sf::getOddsByBall("天津十分彩","正码和特别号","ball_2");
$odds3 = odds_sf::getOddsByBall("天津十分彩","正码和特别号","ball_3");
$odds4 = odds_sf::getOddsByBall("天津十分彩","正码和特别号","ball_4");
$odds5 = odds_sf::getOddsByBall("天津十分彩","正码和特别号","ball_5");
$odds6 = odds_sf::getOddsByBall("天津十分彩","正码和特别号","ball_6");
$odds7 = odds_sf::getOddsByBall("天津十分彩","正码和特别号","ball_7");

echo '
<div class="tabs">
    <ul>
        <li tabs="1"><a>第一球</a></li>
        <li tabs="2"><a>第二球</a></li>
        <li tabs="3"><a>第三球</a></li>
        <li tabs="4"><a>第四球</a></li>
        <li tabs="5"><a>第五球</a></li>
        <li tabs="6"><a>第六球</a></li>
        <li tabs="7"><a>第七球</a></li>
    </ul>
</div>

<div id="locate-box">
    <table class="order-table" tabs-view="1">
        <caption>第一球</caption>
        <tr>
            <td class="choose">
                <span class="num ball">01</span>
                <span class="odds">'.$odds1["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball">06</span>
                <span class="odds">'.$odds1["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball">11</span>
                <span class="odds">'.$odds1["h11"].'</span>
                <input type="text" name="orders[11:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball">16</span>
                <span class="odds">'.$odds1["h16"].'</span>
                <input type="text" name="orders[16:LOCATE:1]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">02</span>
                <span class="odds">'.$odds1["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball">07</span>
                <span class="odds">'.$odds1["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball">12</span>
                <span class="odds">'.$odds1["h12"].'</span>
                <input type="text" name="orders[12:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball">17</span>
                <span class="odds">'.$odds1["h17"].'</span>
                <input type="text" name="orders[17:LOCATE:1]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">03</span>
                <span class="odds">'.$odds1["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball">08</span>
                <span class="odds">'.$odds1["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball">13</span>
                <span class="odds">'.$odds1["h13"].'</span>
                <input type="text" name="orders[13:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball">18</span>
                <span class="odds">'.$odds1["h18"].'</span>
                <input type="text" name="orders[18:LOCATE:1]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">04</span>
                <span class="odds">'.$odds1["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball">09</span>
                <span class="odds">'.$odds1["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball">14</span>
                <span class="odds">'.$odds1["h14"].'</span>
                <input type="text" name="orders[14:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <span class="odds">'.$odds1["h19"].'</span>
                <input type="text" name="orders[19:LOCATE:1]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">05</span>
                <span class="odds">'.$odds1["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball">10</span>
                <span class="odds">'.$odds1["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball">15</span>
                <span class="odds">'.$odds1["h15"].'</span>
                <input type="text" name="orders[15:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">20</span>
                <span class="odds">'.$odds1["h20"].'</span>
                <input type="text" name="orders[20:LOCATE:1]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <span class="odds">'.$odds1["h21"].'</span>
                <input type="text" name="orders[1:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <span class="odds">'.$odds1["h23"].'</span>
                <input type="text" name="orders[1:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <span class="odds">'.$odds1["h25"].'</span>
                <input type="text" name="orders[1:SUM:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <span class="odds">'.$odds1["h27"].'</span>
                <input type="text" name="orders[1:LAST:OVER]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <span class="odds">'.$odds1["h22"].'</span>
                <input type="text" name="orders[1:UNDER]" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <span class="odds">'.$odds1["h24"].'</span>
                <input type="text" name="orders[1:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <span class="odds">'.$odds1["h26"].'</span>
                <input type="text" name="orders[1:SUM:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <span class="odds">'.$odds1["h28"].'</span>
                <input type="text" name="orders[1:LAST:UNDER]" />
            </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="2">
        <caption>第二球</caption>
        <tr>
            <td class="choose">
                <span class="num ball">01</span>
                <span class="odds">'.$odds2["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball">06</span>
                <span class="odds">'.$odds2["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball">11</span>
                <span class="odds">'.$odds2["h11"].'</span>
                <input type="text" name="orders[11:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball">16</span>
                <span class="odds">'.$odds2["h16"].'</span>
                <input type="text" name="orders[16:LOCATE:2]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">02</span>
                <span class="odds">'.$odds2["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball">07</span>
                <span class="odds">'.$odds2["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball">12</span>
                <span class="odds">'.$odds2["h12"].'</span>
                <input type="text" name="orders[12:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball">17</span>
                <span class="odds">'.$odds2["h17"].'</span>
                <input type="text" name="orders[17:LOCATE:2]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">03</span>
                <span class="odds">'.$odds2["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball">08</span>
                <span class="odds">'.$odds2["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball">13</span>
                <span class="odds">'.$odds2["h13"].'</span>
                <input type="text" name="orders[13:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball">18</span>
                <span class="odds">'.$odds2["h18"].'</span>
                <input type="text" name="orders[18:LOCATE:2]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">04</span>
                <span class="odds">'.$odds2["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball">09</span>
                <span class="odds">'.$odds2["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball">14</span>
                <span class="odds">'.$odds2["h14"].'</span>
                <input type="text" name="orders[14:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <span class="odds">'.$odds2["h19"].'</span>
                <input type="text" name="orders[19:LOCATE:2]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">05</span>
                <span class="odds">'.$odds2["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball">10</span>
                <span class="odds">'.$odds2["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball">15</span>
                <span class="odds">'.$odds2["h15"].'</span>
                <input type="text" name="orders[15:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">20</span>
                <span class="odds">'.$odds2["h20"].'</span>
                <input type="text" name="orders[20:LOCATE:2]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <span class="odds">'.$odds2["h21"].'</span>
                <input type="text" name="orders[2:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <span class="odds">'.$odds2["h23"].'</span>
                <input type="text" name="orders[2:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <span class="odds">'.$odds2["h25"].'</span>
                <input type="text" name="orders[2:SUM:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <span class="odds">'.$odds2["h27"].'</span>
                <input type="text" name="orders[2:LAST:OVER]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <span class="odds">'.$odds2["h22"].'</span>
                <input type="text" name="orders[2:UNDER]" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <span class="odds">'.$odds2["h24"].'</span>
                <input type="text" name="orders[2:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <span class="odds">'.$odds2["h26"].'</span>
                <input type="text" name="orders[2:SUM:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <span class="odds">'.$odds2["h28"].'</span>
                <input type="text" name="orders[2:LAST:UNDER]" />
            </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="3">
        <caption>第三球</caption>
        <tr>
            <td class="choose">
                <span class="num ball">01</span>
                <span class="odds">'.$odds3["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball">06</span>
                <span class="odds">'.$odds3["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball">11</span>
                <span class="odds">'.$odds3["h11"].'</span>
                <input type="text" name="orders[11:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball">16</span>
                <span class="odds">'.$odds3["h16"].'</span>
                <input type="text" name="orders[16:LOCATE:3]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">02</span>
                <span class="odds">'.$odds3["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball">07</span>
                <span class="odds">'.$odds3["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball">12</span>
                <span class="odds">'.$odds3["h12"].'</span>
                <input type="text" name="orders[12:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball">17</span>
                <span class="odds">'.$odds3["h17"].'</span>
                <input type="text" name="orders[17:LOCATE:3]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">03</span>
                <span class="odds">'.$odds3["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball">08</span>
                <span class="odds">'.$odds3["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball">13</span>
                <span class="odds">'.$odds3["h13"].'</span>
                <input type="text" name="orders[13:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball">18</span>
                <span class="odds">'.$odds3["h18"].'</span>
                <input type="text" name="orders[18:LOCATE:3]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">04</span>
                <span class="odds">'.$odds3["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball">09</span>
                <span class="odds">'.$odds3["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball">14</span>
                <span class="odds">'.$odds3["h14"].'</span>
                <input type="text" name="orders[14:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <span class="odds">'.$odds3["h19"].'</span>
                <input type="text" name="orders[19:LOCATE:3]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">05</span>
                <span class="odds">'.$odds3["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball">10</span>
                <span class="odds">'.$odds3["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball">15</span>
                <span class="odds">'.$odds3["h15"].'</span>
                <input type="text" name="orders[15:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">20</span>
                <span class="odds">'.$odds3["h20"].'</span>
                <input type="text" name="orders[20:LOCATE:3]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <span class="odds">'.$odds3["h21"].'</span>
                <input type="text" name="orders[3:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <span class="odds">'.$odds3["h23"].'</span>
                <input type="text" name="orders[3:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <span class="odds">'.$odds3["h25"].'</span>
                <input type="text" name="orders[3:SUM:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <span class="odds">'.$odds3["h27"].'</span>
                <input type="text" name="orders[3:LAST:OVER]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <span class="odds">'.$odds3["h22"].'</span>
                <input type="text" name="orders[3:UNDER]" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <span class="odds">'.$odds3["h24"].'</span>
                <input type="text" name="orders[3:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <span class="odds">'.$odds3["h26"].'</span>
                <input type="text" name="orders[3:SUM:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <span class="odds">'.$odds3["h28"].'</span>
                <input type="text" name="orders[3:LAST:UNDER]" />
            </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="4">
        <caption>第四球</caption>
        <tr>
            <td class="choose">
                <span class="num ball">01</span>
                <span class="odds">'.$odds4["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball">06</span>
                <span class="odds">'.$odds4["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball">11</span>
                <span class="odds">'.$odds4["h11"].'</span>
                <input type="text" name="orders[11:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball">16</span>
                <span class="odds">'.$odds4["h16"].'</span>
                <input type="text" name="orders[16:LOCATE:4]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">02</span>
                <span class="odds">'.$odds4["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball">07</span>
                <span class="odds">'.$odds4["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball">12</span>
                <span class="odds">'.$odds4["h12"].'</span>
                <input type="text" name="orders[12:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball">17</span>
                <span class="odds">'.$odds4["h17"].'</span>
                <input type="text" name="orders[17:LOCATE:4]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">03</span>
                <span class="odds">'.$odds4["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball">08</span>
                <span class="odds">'.$odds4["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball">13</span>
                <span class="odds">'.$odds4["h13"].'</span>
                <input type="text" name="orders[13:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball">18</span>
                <span class="odds">'.$odds4["h18"].'</span>
                <input type="text" name="orders[18:LOCATE:4]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">04</span>
                <span class="odds">'.$odds4["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball">09</span>
                <span class="odds">'.$odds4["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball">14</span>
                <span class="odds">'.$odds4["h14"].'</span>
                <input type="text" name="orders[14:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <span class="odds">'.$odds4["h19"].'</span>
                <input type="text" name="orders[19:LOCATE:4]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">05</span>
                <span class="odds">'.$odds4["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball">10</span>
                <span class="odds">'.$odds4["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball">15</span>
                <span class="odds">'.$odds4["h15"].'</span>
                <input type="text" name="orders[15:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">20</span>
                <span class="odds">'.$odds4["h20"].'</span>
                <input type="text" name="orders[20:LOCATE:4]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <span class="odds">'.$odds4["h21"].'</span>
                <input type="text" name="orders[4:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <span class="odds">'.$odds4["h23"].'</span>
                <input type="text" name="orders[4:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <span class="odds">'.$odds4["h25"].'</span>
                <input type="text" name="orders[4:SUM:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <span class="odds">'.$odds4["h27"].'</span>
                <input type="text" name="orders[4:LAST:OVER]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <span class="odds">'.$odds4["h22"].'</span>
                <input type="text" name="orders[4:UNDER]" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <span class="odds">'.$odds4["h24"].'</span>
                <input type="text" name="orders[4:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <span class="odds">'.$odds4["h26"].'</span>
                <input type="text" name="orders[4:SUM:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <span class="odds">'.$odds4["h28"].'</span>
                <input type="text" name="orders[4:LAST:UNDER]" />
            </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="5">
        <caption>第五球</caption>
        <tr>
            <td class="choose">
                <span class="num ball">01</span>
                <span class="odds">'.$odds5["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball">06</span>
                <span class="odds">'.$odds5["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball">11</span>
                <span class="odds">'.$odds5["h11"].'</span>
                <input type="text" name="orders[11:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball">16</span>
                <span class="odds">'.$odds5["h16"].'</span>
                <input type="text" name="orders[16:LOCATE:5]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">02</span>
                <span class="odds">'.$odds5["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball">07</span>
                <span class="odds">'.$odds5["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball">12</span>
                <span class="odds">'.$odds5["h12"].'</span>
                <input type="text" name="orders[12:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball">17</span>
                <span class="odds">'.$odds5["h17"].'</span>
                <input type="text" name="orders[17:LOCATE:5]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">03</span>
                <span class="odds">'.$odds5["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball">08</span>
                <span class="odds">'.$odds5["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball">13</span>
                <span class="odds">'.$odds5["h13"].'</span>
                <input type="text" name="orders[13:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball">18</span>
                <span class="odds">'.$odds5["h18"].'</span>
                <input type="text" name="orders[18:LOCATE:5]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">04</span>
                <span class="odds">'.$odds5["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball">09</span>
                <span class="odds">'.$odds5["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball">14</span>
                <span class="odds">'.$odds5["h14"].'</span>
                <input type="text" name="orders[14:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <span class="odds">'.$odds5["h19"].'</span>
                <input type="text" name="orders[19:LOCATE:5]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">05</span>
                <span class="odds">'.$odds5["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball">10</span>
                <span class="odds">'.$odds5["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball">15</span>
                <span class="odds">'.$odds5["h15"].'</span>
                <input type="text" name="orders[15:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">20</span>
                <span class="odds">'.$odds5["h20"].'</span>
                <input type="text" name="orders[20:LOCATE:5]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <span class="odds">'.$odds5["h21"].'</span>
                <input type="text" name="orders[5:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <span class="odds">'.$odds5["h23"].'</span>
                <input type="text" name="orders[5:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <span class="odds">'.$odds5["h25"].'</span>
                <input type="text" name="orders[5:SUM:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <span class="odds">'.$odds5["h27"].'</span>
                <input type="text" name="orders[5:LAST:OVER]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <span class="odds">'.$odds5["h22"].'</span>
                <input type="text" name="orders[5:UNDER]" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <span class="odds">'.$odds5["h24"].'</span>
                <input type="text" name="orders[5:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <span class="odds">'.$odds5["h26"].'</span>
                <input type="text" name="orders[5:SUM:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <span class="odds">'.$odds5["h28"].'</span>
                <input type="text" name="orders[5:LAST:UNDER]" />
            </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="6">
        <caption>第六球</caption>
        <tr>
            <td class="choose">
                <span class="num ball">01</span>
                <span class="odds">'.$odds6["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:6]" />
            </td>
            <td class="choose">
                <span class="num ball">06</span>
                <span class="odds">'.$odds6["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:6]" />
            </td>
            <td class="choose">
                <span class="num ball">11</span>
                <span class="odds">'.$odds6["h11"].'</span>
                <input type="text" name="orders[11:LOCATE:6]" />
            </td>
            <td class="choose">
                <span class="num ball">16</span>
                <span class="odds">'.$odds6["h16"].'</span>
                <input type="text" name="orders[16:LOCATE:6]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">02</span>
                <span class="odds">'.$odds6["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:6]" />
            </td>
            <td class="choose">
                <span class="num ball">07</span>
                <span class="odds">'.$odds6["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:6]" />
            </td>
            <td class="choose">
                <span class="num ball">12</span>
                <span class="odds">'.$odds6["h12"].'</span>
                <input type="text" name="orders[12:LOCATE:6]" />
            </td>
            <td class="choose">
                <span class="num ball">17</span>
                <span class="odds">'.$odds6["h17"].'</span>
                <input type="text" name="orders[17:LOCATE:6]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">03</span>
                <span class="odds">'.$odds6["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:6]" />
            </td>
            <td class="choose">
                <span class="num ball">08</span>
                <span class="odds">'.$odds6["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:6]" />
            </td>
            <td class="choose">
                <span class="num ball">13</span>
                <span class="odds">'.$odds6["h13"].'</span>
                <input type="text" name="orders[13:LOCATE:6]" />
            </td>
            <td class="choose">
                <span class="num ball">18</span>
                <span class="odds">'.$odds6["h18"].'</span>
                <input type="text" name="orders[18:LOCATE:6]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">04</span>
                <span class="odds">'.$odds6["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:6]" />
            </td>
            <td class="choose">
                <span class="num ball">09</span>
                <span class="odds">'.$odds6["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:6]" />
            </td>
            <td class="choose">
                <span class="num ball">14</span>
                <span class="odds">'.$odds6["h14"].'</span>
                <input type="text" name="orders[14:LOCATE:6]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <span class="odds">'.$odds6["h19"].'</span>
                <input type="text" name="orders[19:LOCATE:6]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">05</span>
                <span class="odds">'.$odds6["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:6]" />
            </td>
            <td class="choose">
                <span class="num ball">10</span>
                <span class="odds">'.$odds6["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:6]" />
            </td>
            <td class="choose">
                <span class="num ball">15</span>
                <span class="odds">'.$odds6["h15"].'</span>
                <input type="text" name="orders[15:LOCATE:6]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">20</span>
                <span class="odds">'.$odds6["h20"].'</span>
                <input type="text" name="orders[20:LOCATE:6]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <span class="odds">'.$odds6["h21"].'</span>
                <input type="text" name="orders[6:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <span class="odds">'.$odds6["h23"].'</span>
                <input type="text" name="orders[6:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <span class="odds">'.$odds6["h25"].'</span>
                <input type="text" name="orders[6:SUM:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <span class="odds">'.$odds6["h27"].'</span>
                <input type="text" name="orders[6:LAST:OVER]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <span class="odds">'.$odds6["h22"].'</span>
                <input type="text" name="orders[6:UNDER]" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <span class="odds">'.$odds6["h24"].'</span>
                <input type="text" name="orders[6:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <span class="odds">'.$odds6["h26"].'</span>
                <input type="text" name="orders[6:SUM:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <span class="odds">'.$odds6["h28"].'</span>
                <input type="text" name="orders[6:LAST:UNDER]" />
            </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="7">
        <caption>第七球</caption>
        <tr>
            <td class="choose">
                <span class="num ball">01</span>
                <span class="odds">'.$odds7["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:7]" />
            </td>
            <td class="choose">
                <span class="num ball">06</span>
                <span class="odds">'.$odds7["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:7]" />
            </td>
            <td class="choose">
                <span class="num ball">11</span>
                <span class="odds">'.$odds7["h11"].'</span>
                <input type="text" name="orders[11:LOCATE:7]" />
            </td>
            <td class="choose">
                <span class="num ball">16</span>
                <span class="odds">'.$odds7["h16"].'</span>
                <input type="text" name="orders[16:LOCATE:7]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">02</span>
                <span class="odds">'.$odds7["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:7]" />
            </td>
            <td class="choose">
                <span class="num ball">07</span>
                <span class="odds">'.$odds7["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:7]" />
            </td>
            <td class="choose">
                <span class="num ball">12</span>
                <span class="odds">'.$odds7["h12"].'</span>
                <input type="text" name="orders[12:LOCATE:7]" />
            </td>
            <td class="choose">
                <span class="num ball">17</span>
                <span class="odds">'.$odds7["h17"].'</span>
                <input type="text" name="orders[17:LOCATE:7]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">03</span>
                <span class="odds">'.$odds7["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:7]" />
            </td>
            <td class="choose">
                <span class="num ball">08</span>
                <span class="odds">'.$odds7["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:7]" />
            </td>
            <td class="choose">
                <span class="num ball">13</span>
                <span class="odds">'.$odds7["h13"].'</span>
                <input type="text" name="orders[13:LOCATE:7]" />
            </td>
            <td class="choose">
                <span class="num ball">18</span>
                <span class="odds">'.$odds7["h18"].'</span>
                <input type="text" name="orders[18:LOCATE:7]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">04</span>
                <span class="odds">'.$odds7["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:7]" />
            </td>
            <td class="choose">
                <span class="num ball">09</span>
                <span class="odds">'.$odds7["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:7]" />
            </td>
            <td class="choose">
                <span class="num ball">14</span>
                <span class="odds">'.$odds7["h14"].'</span>
                <input type="text" name="orders[14:LOCATE:7]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <span class="odds">'.$odds7["h19"].'</span>
                <input type="text" name="orders[19:LOCATE:7]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball">05</span>
                <span class="odds">'.$odds7["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:7]" />
            </td>
            <td class="choose">
                <span class="num ball">10</span>
                <span class="odds">'.$odds7["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:7]" />
            </td>
            <td class="choose">
                <span class="num ball">15</span>
                <span class="odds">'.$odds7["h15"].'</span>
                <input type="text" name="orders[15:LOCATE:7]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">20</span>
                <span class="odds">'.$odds7["h20"].'</span>
                <input type="text" name="orders[20:LOCATE:7]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <span class="odds">'.$odds7["h21"].'</span>
                <input type="text" name="orders[7:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <span class="odds">'.$odds7["h23"].'</span>
                <input type="text" name="orders[7:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <span class="odds">'.$odds7["h25"].'</span>
                <input type="text" name="orders[7:SUM:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <span class="odds">'.$odds7["h27"].'</span>
                <input type="text" name="orders[7:LAST:OVER]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <span class="odds">'.$odds7["h22"].'</span>
                <input type="text" name="orders[7:UNDER]" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <span class="odds">'.$odds7["h24"].'</span>
                <input type="text" name="orders[7:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <span class="odds">'.$odds7["h26"].'</span>
                <input type="text" name="orders[7:SUM:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <span class="odds">'.$odds7["h28"].'</span>
                <input type="text" name="orders[7:LAST:UNDER]" />
            </td>
        </tr>
    </table>
    </div>
';

$mysqli->close();