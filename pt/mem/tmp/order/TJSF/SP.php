<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

$odds8 = odds_sf::getOddsByBall("天津十分彩","正码和特别号","ball_8");//特别号

echo '
<table class="order-table">
    <caption>特别号</caption>
    <tr>
        <td class="choose">
            <span class="num ball">01</span>
            <span class="odds">'.$odds8["h1"].'</span>
            <input type="text" name="orders[1:LOCATE:S]" />
        </td>
        <td class="choose">
            <span class="num ball">06</span>
            <span class="odds">'.$odds8["h6"].'</span>
            <input type="text" name="orders[6:LOCATE:S]" />
        </td>
        <td class="choose">
            <span class="num ball">11</span>
            <span class="odds">'.$odds8["h11"].'</span>
            <input type="text" name="orders[11:LOCATE:S]" />
        </td>
        <td class="choose">
            <span class="num ball">16</span>
            <span class="odds">'.$odds8["h16"].'</span>
            <input type="text" name="orders[16:LOCATE:S]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball">02</span>
            <span class="odds">'.$odds8["h2"].'</span>
            <input type="text" name="orders[2:LOCATE:S]" />
        </td>
        <td class="choose">
            <span class="num ball">07</span>
            <span class="odds">'.$odds8["h7"].'</span>
            <input type="text" name="orders[7:LOCATE:S]" />
        </td>
        <td class="choose">
            <span class="num ball">12</span>
            <span class="odds">'.$odds8["h12"].'</span>
            <input type="text" name="orders[12:LOCATE:S]" />
        </td>
        <td class="choose">
            <span class="num ball">17</span>
            <span class="odds">'.$odds8["h17"].'</span>
            <input type="text" name="orders[17:LOCATE:S]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball">03</span>
            <span class="odds">'.$odds8["h3"].'</span>
            <input type="text" name="orders[3:LOCATE:S]" />
        </td>
        <td class="choose">
            <span class="num ball">08</span>
            <span class="odds">'.$odds8["h8"].'</span>
            <input type="text" name="orders[8:LOCATE:S]" />
        </td>
        <td class="choose">
            <span class="num ball">13</span>
            <span class="odds">'.$odds8["h13"].'</span>
            <input type="text" name="orders[13:LOCATE:S]" />
        </td>
        <td class="choose">
            <span class="num ball">18</span>
            <span class="odds">'.$odds8["h18"].'</span>
            <input type="text" name="orders[18:LOCATE:S]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball">04</span>
            <span class="odds">'.$odds8["h4"].'</span>
            <input type="text" name="orders[4:LOCATE:S]" />
        </td>
        <td class="choose">
            <span class="num ball">09</span>
            <span class="odds">'.$odds8["h9"].'</span>
            <input type="text" name="orders[9:LOCATE:S]" />
        </td>
        <td class="choose">
            <span class="num ball">14</span>
            <span class="odds">'.$odds8["h14"].'</span>
            <input type="text" name="orders[14:LOCATE:S]" />
        </td>
        <td class="choose">
            <span class="num ball ball-red">19</span>
            <span class="odds">'.$odds8["h19"].'</span>
            <input type="text" name="orders[19:LOCATE:S]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball">05</span>
            <span class="odds">'.$odds8["h5"].'</span>
            <input type="text" name="orders[5:LOCATE:S]" />
        </td>
        <td class="choose">
            <span class="num ball">10</span>
            <span class="odds">'.$odds8["h10"].'</span>
            <input type="text" name="orders[10:LOCATE:S]" />
        </td>
        <td class="choose">
            <span class="num ball">15</span>
            <span class="odds">'.$odds8["h15"].'</span>
            <input type="text" name="orders[15:LOCATE:S]" />
        </td>
        <td class="choose">
            <span class="num ball ball-red">20</span>
            <span class="odds">'.$odds8["h20"].'</span>
            <input type="text" name="orders[20:LOCATE:S]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">特大</font>
            <span class="odds">'.$odds8["h21"].'</span>
            <input type="text" name="orders[S:OVER]" />
        </td>
        <td class="choose">
            <font class="choose-name">特单</font>
            <span class="odds">'.$odds8["h23"].'</span>
            <input type="text" name="orders[S:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <span class="odds">'.$odds8["h25"].'</span>
            <input type="text" name="orders[S:SUM:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <span class="odds">'.$odds8["h27"].'</span>
            <input type="text" name="orders[S:LAST:OVER]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">特小</font>
            <span class="odds">'.$odds8["h22"].'</span>
            <input type="text" name="orders[S:UNDER]" />
        </td>
        <td class="choose">
            <font class="choose-name">特双</font>
            <span class="odds">'.$odds8["h24"].'</span>
            <input type="text" name="orders[S:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <span class="odds">'.$odds8["h26"].'</span>
            <input type="text" name="orders[S:SUM:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <span class="odds">'.$odds8["h28"].'</span>
            <input type="text" name="orders[S:LAST:UNDER]" />
        </td>
    </tr>
</table>
';

$mysqli->close();