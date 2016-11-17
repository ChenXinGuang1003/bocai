<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

$odds1 = odds_sf::getOddsByBall("广西十分彩","正码和特别号","ball_1");
$odds2 = odds_sf::getOddsByBall("广西十分彩","正码和特别号","ball_2");
$odds3 = odds_sf::getOddsByBall("广西十分彩","正码和特别号","ball_3");
$odds4 = odds_sf::getOddsByBall("广西十分彩","正码和特别号","ball_4");

echo '
<div class="tabs">
    <ul>
        <li tabs="1"><a>正码一特</a></li>
        <li tabs="2"><a>正码二特</a></li>
        <li tabs="3"><a>正码三特</a></li>
        <li tabs="4"><a>正码四特</a></li>
    </ul>
</div>

<div id="locate-box">
    <table class="order-table" tabs-view="1">
        <caption>正码一特</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">01</span>
                <span class="odds">'.$odds1["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">08</span>
                <span class="odds">'.$odds1["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">15</span>
                <span class="odds">'.$odds1["h15"].'</span>
                <input type="text" name="orders[15:LOCATE:1]" />
            </td>
            <td class="choose">
                <font class="choose-name red">红波</font>
                <span class="odds">'.$odds1["h22"].'</span>
                <input type="text" name="orders[1:RED]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">02</span>
                <span class="odds">'.$odds1["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">09</span>
                <span class="odds">'.$odds1["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">16</span>
                <span class="odds">'.$odds1["h16"].'</span>
                <input type="text" name="orders[16:LOCATE:1]" />
            </td>
            <td class="choose">
                <font class="choose-name blue">蓝波</font>
                <span class="odds">'.$odds1["h23"].'</span>
                <input type="text" name="orders[1:BLUE]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">03</span>
                <span class="odds">'.$odds1["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>
                <span class="odds">'.$odds1["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">17</span>
                <span class="odds">'.$odds1["h17"].'</span>
                <input type="text" name="orders[17:LOCATE:1]" />
            </td>
            <td class="choose">
                <font class="choose-name green">绿波</font>
                <span class="odds">'.$odds1["h24"].'</span>
                <input type="text" name="orders[1:GREEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">04</span>
                <span class="odds">'.$odds1["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>
                <span class="odds">'.$odds1["h11"].'</span>
                <input type="text" name="orders[11:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">18</span>
                <span class="odds">'.$odds1["h18"].'</span>
                <input type="text" name="orders[18:LOCATE:1]" />
            </td>
            <td class="choose">
                <font class="choose-name">大单</font>
                <span class="odds">'.$odds1["h25"].'</span>
                <input type="text" name="orders[1:OVER:S:ODD]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">05</span>
                <span class="odds">'.$odds1["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">12</span>
                <span class="odds">'.$odds1["h12"].'</span>
                <input type="text" name="orders[12:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <span class="odds">'.$odds1["h19"].'</span>
                <input type="text" name="orders[19:LOCATE:1]" />
            </td>
            <td class="choose">
                <font class="choose-name">大双</font>
                <span class="odds">'.$odds1["h26"].'</span>
                <input type="text" name="orders[1:OVER:S:EVEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">06</span>
                <span class="odds">'.$odds1["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">13</span>
                <span class="odds">'.$odds1["h13"].'</span>
                <input type="text" name="orders[13:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">20</span>
                <span class="odds">'.$odds1["h20"].'</span>
                <input type="text" name="orders[20:LOCATE:1]" />
            </td>
            <td class="choose">
                <font class="choose-name">小单</font>
                <span class="odds">'.$odds1["h27"].'</span>
                <input type="text" name="orders[1:UNDER:S:ODD]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">07</span>
                <span class="odds">'.$odds1["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">14</span>
                <span class="odds">'.$odds1["h14"].'</span>
                <input type="text" name="orders[14:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">21</span>
                <span class="odds">'.$odds1["h21"].'</span>
                <input type="text" name="orders[21:LOCATE:1]" />
            </td>
            <td class="choose">
                <font class="choose-name">小双</font>
                <span class="odds">'.$odds1["h28"].'</span>
                <input type="text" name="orders[1:UNDER:S:EVEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <span class="odds">'.$odds1["h29"].'</span>
                <input type="text" name="orders[1:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <span class="odds">'.$odds1["h31"].'</span>
                <input type="text" name="orders[1:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <span class="odds">'.$odds1["h33"].'</span>
                <input type="text" name="orders[1:SUM:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <span class="odds">'.$odds1["h35"].'</span>
                <input type="text" name="orders[1:LAST:OVER]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <span class="odds">'.$odds1["h30"].'</span>
                <input type="text" name="orders[1:UNDER]" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <span class="odds">'.$odds1["h32"].'</span>
                <input type="text" name="orders[1:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <span class="odds">'.$odds1["h34"].'</span>
                <input type="text" name="orders[1:SUM:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <span class="odds">'.$odds1["h36"].'</span>
                <input type="text" name="orders[1:LAST:UNDER]" />
            </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="2">
        <caption>正码二特</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">01</span>
                <span class="odds">'.$odds2["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">08</span>
                <span class="odds">'.$odds2["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">15</span>
                <span class="odds">'.$odds2["h15"].'</span>
                <input type="text" name="orders[15:LOCATE:2]" />
            </td>
            <td class="choose">
                <font class="choose-name red">红波</font>
                <span class="odds">'.$odds2["h22"].'</span>
                <input type="text" name="orders[2:RED]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">02</span>
                <span class="odds">'.$odds2["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">09</span>
                <span class="odds">'.$odds2["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">16</span>
                <span class="odds">'.$odds2["h16"].'</span>
                <input type="text" name="orders[16:LOCATE:2]" />
            </td>
            <td class="choose">
                <font class="choose-name blue">蓝波</font>
                <span class="odds">'.$odds2["h23"].'</span>
                <input type="text" name="orders[2:BLUE]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">03</span>
                <span class="odds">'.$odds2["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>
                <span class="odds">'.$odds2["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">17</span>
                <span class="odds">'.$odds2["h17"].'</span>
                <input type="text" name="orders[17:LOCATE:2]" />
            </td>
            <td class="choose">
                <font class="choose-name green">绿波</font>
                <span class="odds">'.$odds2["h24"].'</span>
                <input type="text" name="orders[2:GREEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">04</span>
                <span class="odds">'.$odds2["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>
                <span class="odds">'.$odds2["h11"].'</span>
                <input type="text" name="orders[11:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">18</span>
                <span class="odds">'.$odds2["h18"].'</span>
                <input type="text" name="orders[18:LOCATE:2]" />
            </td>
            <td class="choose">
                <font class="choose-name">大单</font>
                <span class="odds">'.$odds2["h25"].'</span>
                <input type="text" name="orders[2:OVER:S:ODD]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">05</span>
                <span class="odds">'.$odds2["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">12</span>
                <span class="odds">'.$odds2["h12"].'</span>
                <input type="text" name="orders[12:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <span class="odds">'.$odds2["h19"].'</span>
                <input type="text" name="orders[19:LOCATE:2]" />
            </td>
            <td class="choose">
                <font class="choose-name">大双</font>
                <span class="odds">'.$odds2["h26"].'</span>
                <input type="text" name="orders[2:OVER:S:EVEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">06</span>
                <span class="odds">'.$odds2["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">13</span>
                <span class="odds">'.$odds2["h13"].'</span>
                <input type="text" name="orders[13:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">20</span>
                <span class="odds">'.$odds2["h20"].'</span>
                <input type="text" name="orders[20:LOCATE:2]" />
            </td>
            <td class="choose">
                <font class="choose-name">小单</font>
                <span class="odds">'.$odds2["h27"].'</span>
                <input type="text" name="orders[2:UNDER:S:ODD]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">07</span>
                <span class="odds">'.$odds2["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">14</span>
                <span class="odds">'.$odds2["h14"].'</span>
                <input type="text" name="orders[14:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">21</span>
                <span class="odds">'.$odds2["h21"].'</span>
                <input type="text" name="orders[21:LOCATE:2]" />
            </td>
            <td class="choose">
                <font class="choose-name">小双</font>
                <span class="odds">'.$odds2["h28"].'</span>
                <input type="text" name="orders[2:UNDER:S:EVEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <span class="odds">'.$odds2["h29"].'</span>
                <input type="text" name="orders[2:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <span class="odds">'.$odds2["h31"].'</span>
                <input type="text" name="orders[2:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <span class="odds">'.$odds2["h33"].'</span>
                <input type="text" name="orders[2:SUM:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <span class="odds">'.$odds2["h35"].'</span>
                <input type="text" name="orders[2:LAST:OVER]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <span class="odds">'.$odds2["h30"].'</span>
                <input type="text" name="orders[2:UNDER]" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <span class="odds">'.$odds2["h32"].'</span>
                <input type="text" name="orders[2:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <span class="odds">'.$odds2["h34"].'</span>
                <input type="text" name="orders[2:SUM:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <span class="odds">'.$odds2["h36"].'</span>
                <input type="text" name="orders[2:LAST:UNDER]" />
            </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="3">
        <caption>正码三特</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">01</span>
                <span class="odds">'.$odds3["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">08</span>
                <span class="odds">'.$odds3["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">15</span>
                <span class="odds">'.$odds3["h15"].'</span>
                <input type="text" name="orders[15:LOCATE:3]" />
            </td>
            <td class="choose">
                <font class="choose-name red">红波</font>
                <span class="odds">'.$odds3["h22"].'</span>
                <input type="text" name="orders[3:RED]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">02</span>
                <span class="odds">'.$odds3["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">09</span>
                <span class="odds">'.$odds3["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">16</span>
                <span class="odds">'.$odds3["h16"].'</span>
                <input type="text" name="orders[16:LOCATE:3]" />
            </td>
            <td class="choose">
                <font class="choose-name blue">蓝波</font>
                <span class="odds">'.$odds3["h23"].'</span>
                <input type="text" name="orders[3:BLUE]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">03</span>
                <span class="odds">'.$odds3["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>
                <span class="odds">'.$odds3["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">17</span>
                <span class="odds">'.$odds3["h17"].'</span>
                <input type="text" name="orders[17:LOCATE:3]" />
            </td>
            <td class="choose">
                <font class="choose-name green">绿波</font>
                <span class="odds">'.$odds3["h24"].'</span>
                <input type="text" name="orders[3:GREEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">04</span>
                <span class="odds">'.$odds3["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>
                <span class="odds">'.$odds3["h11"].'</span>
                <input type="text" name="orders[11:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">18</span>
                <span class="odds">'.$odds3["h18"].'</span>
                <input type="text" name="orders[18:LOCATE:3]" />
            </td>
            <td class="choose">
                <font class="choose-name">大单</font>
                <span class="odds">'.$odds3["h25"].'</span>
                <input type="text" name="orders[3:OVER:S:ODD]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">05</span>
                <span class="odds">'.$odds3["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">12</span>
                <span class="odds">'.$odds3["h12"].'</span>
                <input type="text" name="orders[12:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <span class="odds">'.$odds3["h19"].'</span>
                <input type="text" name="orders[19:LOCATE:3]" />
            </td>
            <td class="choose">
                <font class="choose-name">大双</font>
                <span class="odds">'.$odds3["h26"].'</span>
                <input type="text" name="orders[3:OVER:S:EVEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">06</span>
                <span class="odds">'.$odds3["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">13</span>
                <span class="odds">'.$odds3["h13"].'</span>
                <input type="text" name="orders[13:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">20</span>
                <span class="odds">'.$odds3["h20"].'</span>
                <input type="text" name="orders[20:LOCATE:3]" />
            </td>
            <td class="choose">
                <font class="choose-name">小单</font>
                <span class="odds">'.$odds3["h27"].'</span>
                <input type="text" name="orders[3:UNDER:S:ODD]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">07</span>
                <span class="odds">'.$odds3["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">14</span>
                <span class="odds">'.$odds3["h14"].'</span>
                <input type="text" name="orders[14:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">21</span>
                <span class="odds">'.$odds3["h21"].'</span>
                <input type="text" name="orders[21:LOCATE:3]" />
            </td>
            <td class="choose">
                <font class="choose-name">小双</font>
                <span class="odds">'.$odds3["h28"].'</span>
                <input type="text" name="orders[3:UNDER:S:EVEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <span class="odds">'.$odds3["h29"].'</span>
                <input type="text" name="orders[3:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <span class="odds">'.$odds3["h31"].'</span>
                <input type="text" name="orders[3:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <span class="odds">'.$odds3["h33"].'</span>
                <input type="text" name="orders[3:SUM:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <span class="odds">'.$odds3["h35"].'</span>
                <input type="text" name="orders[3:LAST:OVER]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <span class="odds">'.$odds3["h30"].'</span>
                <input type="text" name="orders[3:UNDER]" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <span class="odds">'.$odds3["h32"].'</span>
                <input type="text" name="orders[3:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <span class="odds">'.$odds3["h34"].'</span>
                <input type="text" name="orders[3:SUM:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <span class="odds">'.$odds3["h36"].'</span>
                <input type="text" name="orders[3:LAST:UNDER]" />
            </td>
        </tr>
    </table>
        <table class="order-table" tabs-view="4">
        <caption>正码四特</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">01</span>
                <span class="odds">'.$odds4["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">08</span>
                <span class="odds">'.$odds4["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">15</span>
                <span class="odds">'.$odds4["h15"].'</span>
                <input type="text" name="orders[15:LOCATE:4]" />
            </td>
            <td class="choose">
                <font class="choose-name red">红波</font>
                <span class="odds">'.$odds4["h22"].'</span>
                <input type="text" name="orders[4:RED]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">02</span>
                <span class="odds">'.$odds4["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">09</span>
                <span class="odds">'.$odds4["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">16</span>
                <span class="odds">'.$odds4["h16"].'</span>
                <input type="text" name="orders[16:LOCATE:4]" />
            </td>
            <td class="choose">
                <font class="choose-name blue">蓝波</font>
                <span class="odds">'.$odds4["h23"].'</span>
                <input type="text" name="orders[4:BLUE]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">03</span>
                <span class="odds">'.$odds4["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>
                <span class="odds">'.$odds4["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">17</span>
                <span class="odds">'.$odds4["h17"].'</span>
                <input type="text" name="orders[17:LOCATE:4]" />
            </td>
            <td class="choose">
                <font class="choose-name green">绿波</font>
                <span class="odds">'.$odds4["h24"].'</span>
                <input type="text" name="orders[4:GREEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">04</span>
                <span class="odds">'.$odds4["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>
                <span class="odds">'.$odds4["h11"].'</span>
                <input type="text" name="orders[11:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">18</span>
                <span class="odds">'.$odds4["h18"].'</span>
                <input type="text" name="orders[18:LOCATE:4]" />
            </td>
            <td class="choose">
                <font class="choose-name">大单</font>
                <span class="odds">'.$odds4["h25"].'</span>
                <input type="text" name="orders[4:OVER:S:ODD]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">05</span>
                <span class="odds">'.$odds4["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">12</span>
                <span class="odds">'.$odds4["h12"].'</span>
                <input type="text" name="orders[12:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">19</span>
                <span class="odds">'.$odds4["h19"].'</span>
                <input type="text" name="orders[19:LOCATE:4]" />
            </td>
            <td class="choose">
                <font class="choose-name">大双</font>
                <span class="odds">'.$odds4["h26"].'</span>
                <input type="text" name="orders[4:OVER:S:EVEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">06</span>
                <span class="odds">'.$odds4["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">13</span>
                <span class="odds">'.$odds4["h13"].'</span>
                <input type="text" name="orders[13:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">20</span>
                <span class="odds">'.$odds4["h20"].'</span>
                <input type="text" name="orders[20:LOCATE:4]" />
            </td>
            <td class="choose">
                <font class="choose-name">小单</font>
                <span class="odds">'.$odds4["h27"].'</span>
                <input type="text" name="orders[4:UNDER:S:ODD]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">07</span>
                <span class="odds">'.$odds4["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">14</span>
                <span class="odds">'.$odds4["h14"].'</span>
                <input type="text" name="orders[14:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">21</span>
                <span class="odds">'.$odds4["h21"].'</span>
                <input type="text" name="orders[21:LOCATE:4]" />
            </td>
            <td class="choose">
                <font class="choose-name">小双</font>
                <span class="odds">'.$odds4["h28"].'</span>
                <input type="text" name="orders[4:UNDER:S:EVEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <span class="odds">'.$odds4["h29"].'</span>
                <input type="text" name="orders[4:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <span class="odds">'.$odds4["h31"].'</span>
                <input type="text" name="orders[4:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">和单</font>
                <span class="odds">'.$odds4["h33"].'</span>
                <input type="text" name="orders[4:SUM:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <span class="odds">'.$odds4["h35"].'</span>
                <input type="text" name="orders[4:LAST:OVER]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">小</font>
                <span class="odds">'.$odds4["h30"].'</span>
                <input type="text" name="orders[4:UNDER]" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <span class="odds">'.$odds4["h32"].'</span>
                <input type="text" name="orders[4:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <span class="odds">'.$odds4["h34"].'</span>
                <input type="text" name="orders[4:SUM:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <span class="odds">'.$odds4["h36"].'</span>
                <input type="text" name="orders[4:LAST:UNDER]" />
            </td>
        </tr>
    </table>
    </div>
';

$mysqli->close();