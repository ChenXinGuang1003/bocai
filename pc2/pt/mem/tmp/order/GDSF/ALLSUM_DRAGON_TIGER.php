<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

$odds1 = odds_sf::getOddsByBall("广东十分彩","总和龙虎","ball_1");

echo '
<table class="order-table">
    <tr>
        <th>总和大小</th>
        <td class="choose">
            <font class="choose-name">大</font>
            <span class="odds">'.$odds1["h1"].'</span>
            <input type="text" name="orders[ALL:SUM:OVER]" />
        </td>
        <td class="choose">
            <font class="choose-name">小</font>
            <span class="odds">'.$odds1["h2"].'</span>
            <input type="text" name="orders[ALL:SUM:UNDER]" />
        </td>
    </tr>
    <tr>
        <th>总和单双</th>
        <td class="choose">
            <font class="choose-name">单</font>
            <span class="odds">'.$odds1["h3"].'</span>
            <input type="text" name="orders[ALL:SUM:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <span class="odds">'.$odds1["h4"].'</span>
            <input type="text" name="orders[ALL:SUM:EVEN]" />
        </td>
    </tr>
    <tr>
        <th>总和尾数大小</th>
        <td class="choose">
            <font class="choose-name">大</font>
            <span class="odds">'.$odds1["h5"].'</span>
            <input type="text" name="orders[ALL:SUM:LAST:OVER]" />
        </td>
        <td class="choose">
            <font class="choose-name">小</font>
            <span class="odds">'.$odds1["h6"].'</span>
            <input type="text" name="orders[ALL:SUM:LAST:UNDER]" />
        </td>
    </tr>
    <tr>
        <th>龙虎</th>
        <td class="choose">
            <font class="choose-name">龙</font>
            <span class="odds">'.$odds1["h7"].'</span>
            <input type="text" name="orders[1:S:DRAGON]" />
        </td>
        <td class="choose">
            <font class="choose-name">虎</font>
            <span class="odds">'.$odds1["h8"].'</span>
            <input type="text" name="orders[1:S:TIGER]" />
        </td>
    </tr>
</table>

';

$mysqli->close();