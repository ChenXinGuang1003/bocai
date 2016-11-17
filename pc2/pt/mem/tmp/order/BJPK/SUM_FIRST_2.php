<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

$odds1 = odds_sf::getOddsByBall("北京PK拾","冠亚军和","ball_1");

echo '
<h3>冠亚军和</h3>
<table class="order-table" style="margin-left: 0;">
    <tr>
        <td colspan="2">03、04、18、19</td>
        <td colspan="2">
            <span class="odds">'.$odds1["h1"].'</span>
            <input type="text" name="orders[SUM:FIRST:2:IN:3:4:18:19]" />
        </td>
        <td colspan="2">09、10、12、13</td>
        <td colspan="2">
            <span class="odds">'.$odds1["h2"].'</span>
            <input type="text" name="orders[SUM:FIRST:2:IN:9:10:12:13]" />
        </td>
    </tr>
    <tr>
        <td colspan="2">05、06、16、17</td>
        <td colspan="2">
            <span class="odds">'.$odds1["h3"].'</span>
            <input type="text" name="orders[SUM:FIRST:2:IN:5:6:16:17]" />
        </td>
        <td colspan="2">11</td>
        <td colspan="2">
            <span class="odds">'.$odds1["h4"].'</span>
            <input type="text" name="orders[SUM:FIRST:2:IN:11]" />
        </td>
    </tr>
    <tr>
        <td colspan="2">07、08、14、15</td>
        <td colspan="2">
            <span class="odds">'.$odds1["h5"].'</span>
            <input type="text" name="orders[SUM:FIRST:2:IN:7:8:14:15]" />
        </td>
        <td colspan="2"></td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td>和大</td>
        <td>
            <span class="odds">'.$odds1["h6"].'</span>
            <input type="text" name="orders[SUM:FIRST:2:OVER]" />
        </td>
        <td>和小</td>
        <td>
            <span class="odds">'.$odds1["h7"].'</span>
            <input type="text" name="orders[SUM:FIRST:2:UNDER]" />
        </td>
        <td>和单</td>
        <td>
            <span class="odds">'.$odds1["h8"].'</span>
            <input type="text" name="orders[SUM:FIRST:2:ODD]" />
        </td>
        <td>和双</td>
        <td>
            <span class="odds">'.$odds1["h9"].'</span>
            <input type="text" name="orders[SUM:FIRST:2:EVEN]" />
        </td>
    </tr>
</table>
';

$mysqli->close();