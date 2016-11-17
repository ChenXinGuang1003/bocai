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

$odds1 = odds_sf::getOddsByBall("北京PK拾","冠亚军和","ball_1");

echo '
<h3>冠亚军和</h3>
<table class="order-table">
    <tr>
        <td colspan="2">03、04、18、19</td>
        <td colspan="2">
            <input type="text" value="'.$odds1["h1"].'" id="sum-in-ball_1-h1" />
        </td>
        <td colspan="2">09、10、12、13</td>
        <td colspan="2">
            <input type="text" value="'.$odds1["h2"].'" id="sum-in-ball_1-h2" />
        </td>
    </tr>
    <tr>
        <td colspan="2">05、06、16、17</td>
        <td colspan="2">
            <input type="text" value="'.$odds1["h3"].'" id="sum-in-ball_1-h3" />
        </td>
        <td colspan="2">11</td>
        <td colspan="2">
            <input type="text" value="'.$odds1["h4"].'" id="sum-in-ball_1-h4" />
        </td>
    </tr>
    <tr>
        <td colspan="2">07、08、14、15</td>
        <td colspan="2">
            <input type="text" value="'.$odds1["h5"].'" id="sum-in-ball_1-h5" />
        </td>
        <td colspan="2"></td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td>和大</td>
        <td>
            <input type="text" value="'.$odds1["h6"].'" id="sum-in-ball_1-h6" />
        </td>
        <td>和小</td>
        <td>
            <input type="text" value="'.$odds1["h7"].'" id="sum-in-ball_1-h7" />
        </td>
        <td>和单</td>
        <td>
            <input type="text" value="'.$odds1["h8"].'" id="sum-in-ball_1-h8" />
        </td>
        <td>和双</td>
        <td>
            <input type="text" value="'.$odds1["h9"].'" id="sum-in-ball_1-h9" />
        </td>
    </tr>
</table>
';