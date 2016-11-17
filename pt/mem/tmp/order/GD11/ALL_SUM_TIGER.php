<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

$odds1 = odds_sf::getOddsByBall("广东十一选五","总和龙虎和","ball_1");

echo '

<div id="locate-box">
    <table class="order-table" tabs-view="1">
        <caption>总和 龙虎和</caption>
        <tr>
            <td class="choose">
                <font class="choose-name">总和大</font>
                <span class="odds">'.$odds1["h1"].'</span>
                <input type="text" name="orders[TOTAL:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">总和小</font>
                <span class="odds">'.$odds1["h2"].'</span>
                <input type="text" name="orders[TOTAL:UNDER]" />
            </td>
            <td class="choose">
                <font class="choose-name">总和单</font>
                <span class="odds">'.$odds1["h3"].'</span>
                <input type="text" name="orders[TOTAL:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">总和双</font>
                <span class="odds">'.$odds1["h4"].'</span>
                <input type="text" name="orders[TOTAL:EVEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">龙</font>
                <span class="odds">'.$odds1["h5"].'</span>
                <input type="text" name="orders[TOTAL:DRAGON]" />
            </td>
            <td class="choose">
                <font class="choose-name">虎</font>
                <span class="odds">'.$odds1["h6"].'</span>
                <input type="text" name="orders[TOTAL:TIGER]" />
            </td>
            <td class="choose">
                <font class="choose-name">和</font>
                <span class="odds">'.$odds1["h7"].'</span>
                <input type="text" name="orders[TOTAL:TIE]" />
            </td>
            <td class="choose">
            </td>
        </tr>
    </table>

</div>
';

$mysqli->close();