<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

$odds1 = odds_sf::getOddsByBall("北京快乐8","其他","ball_1");

echo '
<table class="order-table">
    <tr>
        <th>和值</th>
        <td class="choose">
            <span class="choose-name">单</span>
            <span class="odds">'.$odds1["h1"].'</span>
            <input type="text" name="orders[ALL:SUM:ODD]" />
        </td>
        <td class="choose">
            <span class="choose-name">双</span>
            <span class="odds">'.$odds1["h2"].'</span>
            <input type="text" name="orders[ALL:SUM:EVEN]" />
        </td>
        <td class="choose">
            <span class="choose-name">大</span>
            <span class="odds">'.$odds1["h3"].'</span>
            <input type="text" name="orders[ALL:SUM:OVER]" />
        </td>
        <td class="choose">
            <span class="choose-name">小</span>
            <span class="odds">'.$odds1["h4"].'</span>
            <input type="text" name="orders[ALL:SUM:UNDER]" />
        </td>
        <td class="choose">
            <span class="choose-name">810</span>
            <span class="odds">'.$odds1["h5"].'</span>
            <input type="text" name="orders[ALL:SUM:810]" />
        </td>
    </tr>
    <tr>
        <th>上中下盘</th>
        <td class="choose">
            <span class="choose-name">上</span>
            <span class="odds">'.$odds1["h6"].'</span>
            <input type="text" name="orders[TOP]" />
        </td>
        <td class="choose">
            <span class="choose-name">中</span>
            <span class="odds">'.$odds1["h7"].'</span>
            <input type="text" name="orders[MIDDLE]" />
        </td>
        <td class="choose">
            <span class="choose-name">下</span>
            <span class="odds">'.$odds1["h8"].'</span>
            <input type="text" name="orders[BOTTOM]" />
        </td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <th>奇偶和盘</th>
        <td class="choose">
            <span class="choose-name">奇</span>
            <span class="odds">'.$odds1["h9"].'</span>
            <input type="text" name="orders[ODD]" />
        </td>
        <td class="choose">
            <span class="choose-name">和</span>
            <span class="odds">'.$odds1["h10"].'</span>
            <input type="text" name="orders[TIE]" />
        </td>
        <td class="choose">
            <span class="choose-name">偶</span>
            <span class="odds">'.$odds1["h11"].'</span>
            <input type="text" name="orders[EVEN]" />
        </td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <th>五行</th>
        <td class="choose">
            <span class="choose-name">金</span>
            <span class="odds">'.$odds1["h12"].'</span>
            <input type="text" name="orders[ALL:SUM:METAL]" />
        </td>
        <td class="choose">
            <span class="choose-name">木</span>
            <span class="odds">'.$odds1["h13"].'</span>
            <input type="text" name="orders[ALL:SUM:WOOD]" />
        </td>
        <td class="choose">
            <span class="choose-name">水</span>
            <span class="odds">'.$odds1["h14"].'</span>
            <input type="text" name="orders[ALL:SUM:WATER]" />
        </td>
        <td class="choose">
            <span class="choose-name">火</span>
            <span class="odds">'.$odds1["h15"].'</span>
            <input type="text" name="orders[ALL:SUM:FIRE]" />
        </td>
        <td class="choose">
            <span class="choose-name">土</span>
            <span class="odds">'.$odds1["h16"].'</span>
            <input type="text" name="orders[ALL:SUM:EARTH]" />
        </td>
    </tr>
    <tr>
        <th>过关</th>
        <td class="choose">
            <span class="choose-name">小单</span>
            <span class="odds">'.$odds1["h17"].'</span>
            <input type="text" name="orders[ALL:SUM:UNDER:ODD]" />
        </td>
        <td class="choose">
            <span class="choose-name">小双</span>
            <span class="odds">'.$odds1["h18"].'</span>
            <input type="text" name="orders[ALL:SUM:UNDER:EVEN]" />
        </td>
        <td class="choose">
            <span class="choose-name">大单</span>
            <span class="odds">'.$odds1["h19"].'</span>
            <input type="text" name="orders[ALL:SUM:OVER:ODD]" />
        </td>
        <td class="choose">
            <span class="choose-name">大双</span>
            <span class="odds">'.$odds1["h20"].'</span>
            <input type="text" name="orders[ALL:SUM:OVER:EVEN]" />
        </td>
        <td></td>
    </tr>
</table> ';

$mysqli->close();