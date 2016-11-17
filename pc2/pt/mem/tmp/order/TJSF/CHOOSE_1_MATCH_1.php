<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

$odds1 = odds_sf::getOddsByBall("天津十分彩","一中一","ball_1");

echo '
<table class="order-table">
    <caption>一中一</caption>
    <tr>
        <td class="choose">
            <span class="num ball">01</span>
            <span class="odds">'.$odds1["h1"].'</span>
            <input type="text" name="orders[1:MATCH:1]" />
        </td>
        <td class="choose">
            <span class="num ball">06</span>
            <span class="odds">'.$odds1["h6"].'</span>
            <input type="text" name="orders[6:MATCH:1]" />
        </td>
        <td class="choose">
            <span class="num ball">11</span>
            <span class="odds">'.$odds1["h11"].'</span>
            <input type="text" name="orders[11:MATCH:1]" />
        </td>
        <td class="choose">
            <span class="num ball">16</span>
            <span class="odds">'.$odds1["h16"].'</span>
            <input type="text" name="orders[16:MATCH:1]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball">02</span>
            <span class="odds">'.$odds1["h2"].'</span>
            <input type="text" name="orders[2:MATCH:1]" />
        </td>
        <td class="choose">
            <span class="num ball">07</span>
            <span class="odds">'.$odds1["h7"].'</span>
            <input type="text" name="orders[7:MATCH:1]" />
        </td>
        <td class="choose">
            <span class="num ball">12</span>
            <span class="odds">'.$odds1["h12"].'</span>
            <input type="text" name="orders[12:MATCH:1]" />
        </td>
        <td class="choose">
            <span class="num ball">17</span>
            <span class="odds">'.$odds1["h17"].'</span>
            <input type="text" name="orders[17:MATCH:1]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball">03</span>
            <span class="odds">'.$odds1["h3"].'</span>
            <input type="text" name="orders[3:MATCH:1]" />
        </td>
        <td class="choose">
            <span class="num ball">08</span>
            <span class="odds">'.$odds1["h8"].'</span>
            <input type="text" name="orders[8:MATCH:1]" />
        </td>
        <td class="choose">
            <span class="num ball">13</span>
            <span class="odds">'.$odds1["h13"].'</span>
            <input type="text" name="orders[13:MATCH:1]" />
        </td>
        <td class="choose">
            <span class="num ball">18</span>
            <span class="odds">'.$odds1["h18"].'</span>
            <input type="text" name="orders[18:MATCH:1]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball">04</span>
            <span class="odds">'.$odds1["h4"].'</span>
            <input type="text" name="orders[4:MATCH:1]" />
        </td>
        <td class="choose">
            <span class="num ball">09</span>
            <span class="odds">'.$odds1["h9"].'</span>
            <input type="text" name="orders[9:MATCH:1]" />
        </td>
        <td class="choose">
            <span class="num ball">14</span>
            <span class="odds">'.$odds1["h14"].'</span>
            <input type="text" name="orders[14:MATCH:1]" />
        </td>
        <td class="choose">
            <span class="num ball ball-red">19</span>
            <span class="odds">'.$odds1["h19"].'</span>
            <input type="text" name="orders[19:MATCH:1]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball">05</span>
            <span class="odds">'.$odds1["h5"].'</span>
            <input type="text" name="orders[5:MATCH:1]" />
        </td>
        <td class="choose">
            <span class="num ball">10</span>
            <span class="odds">'.$odds1["h10"].'</span>
            <input type="text" name="orders[10:MATCH:1]" />
        </td>
        <td class="choose">
            <span class="num ball">15</span>
            <span class="odds">'.$odds1["h15"].'</span>
            <input type="text" name="orders[15:MATCH:1]" />
        </td>
        <td class="choose">
            <span class="num ball ball-red">20</span>
            <span class="odds">'.$odds1["h20"].'</span>
            <input type="text" name="orders[20:MATCH:1]" />
        </td>
    </tr>
</table>
';

$mysqli->close();