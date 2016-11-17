<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

$odds1 = odds_sf::getOddsByBall("广东十一选五","顺子杂六","ball_1");
$odds2 = odds_sf::getOddsByBall("广东十一选五","顺子杂六","ball_2");
$odds3 = odds_sf::getOddsByBall("广东十一选五","顺子杂六","ball_3");

echo '
<div class="tabs">
    <ul>
        <li tabs="1"><a>前三球</a></li>
        <li tabs="2"><a>中三球</a></li>
        <li tabs="3"><a>后三球</a></li>
    </ul>
</div>

<div id="locate-box">
    <table class="order-table" tabs-view="1">
        <caption>前三球</caption>
        <tr>
            <td class="choose">
                <font class="choose-name">顺子</font>
                <span class="odds">'.$odds1["h1"].'</span>
                <input type="text" name="orders[BEFORE:SHUNZI]" />
            </td>
            <td class="choose">
                <font class="choose-name">半顺</font>
                <span class="odds">'.$odds1["h2"].'</span>
                <input type="text" name="orders[BEFORE:BANSHUN]" />
            </td>
            <td class="choose">
                <font class="choose-name">杂六</font>
                <span class="odds">'.$odds1["h3"].'</span>
                <input type="text" name="orders[BEFORE:ZALIU]" />
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="2">
        <caption>中三球</caption>
        <tr>
            <td class="choose">
                <font class="choose-name">顺子</font>
                <span class="odds">'.$odds2["h1"].'</span>
                <input type="text" name="orders[MIDDLE:SHUNZI]" />
            </td>
            <td class="choose">
                <font class="choose-name">半顺</font>
                <span class="odds">'.$odds2["h2"].'</span>
                <input type="text" name="orders[MIDDLE:BANSHUN]" />
            </td>
            <td class="choose">
                <font class="choose-name">杂六</font>
                <span class="odds">'.$odds2["h3"].'</span>
                <input type="text" name="orders[MIDDLE:ZALIU]" />
            </td>
        </tr>
    </table>

    <table class="order-table" tabs-view="3">
        <caption>后三球</caption>
        <tr>
            <td class="choose">
                <font class="choose-name">顺子</font>
                <span class="odds">'.$odds3["h1"].'</span>
                <input type="text" name="orders[AFTER:SHUNZI]" />
            </td>
            <td class="choose">
                <font class="choose-name">半顺</font>
                <span class="odds">'.$odds3["h2"].'</span>
                <input type="text" name="orders[AFTER:BANSHUN]" />
            </td>
            <td class="choose">
                <font class="choose-name">杂六</font>
                <span class="odds">'.$odds3["h3"].'</span>
                <input type="text" name="orders[AFTER:ZALIU]" />
            </td>
        </tr>
    </table>

</div>
';

$mysqli->close();