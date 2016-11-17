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

$odds1 = odds_sf::getOddsByBall("广东十一选五","一中一","ball_1");

echo '
<table class="order-table">
    <caption>一中一</caption>
    <tr>
        <td class="choose">
            <span class="num ball ball-red">01</span>
            <input type="text" value="'.$odds1["h1"].'" id="choose-ball_1-h1" />
        </td>
        <td class="choose">
            <span class="num ball ball-blue">02</span>
            <input type="text" value="'.$odds1["h2"].'" id="choose-ball_1-h2" />
        </td>
        <td class="choose">
            <span class="num ball ball-green">03</span>
            <input type="text" value="'.$odds1["h3"].'" id="choose-ball_1-h3" />
        </td>
        <td class="choose">
            <span class="num ball ball-red">04</span>
            <input type="text" value="'.$odds1["h4"].'" id="choose-ball_1-h4" />
        </td>
    </tr>
    <tr>

        <td class="choose">
            <span class="num ball ball-blue">05</span>
            <input type="text" value="'.$odds1["h5"].'" id="choose-ball_1-h5" />
        </td>
        <td class="choose">
            <span class="num ball ball-green">06</span>
            <input type="text" value="'.$odds1["h6"].'" id="choose-ball_1-h6" />
        </td>
        <td class="choose">
            <span class="num ball ball-red">07</span>
            <input type="text" value="'.$odds1["h7"].'" id="choose-ball_1-h7" />
        </td>
        <td class="choose">
            <span class="num ball ball-blue">08</span>
            <input type="text" value="'.$odds1["h8"].'" id="choose-ball_1-h8" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball ball-green">09</span>
            <input type="text" value="'.$odds1["h9"].'" id="choose-ball_1-h9" />
        </td>

        <td class="choose">
            <span class="num ball ball-red">10</span>
            <input type="text" value="'.$odds1["h10"].'" id="choose-ball_1-h10" />
        </td>
        <td class="choose">
            <span class="num ball ball-blue">11</span>
            <input type="text" value="'.$odds1["h11"].'" id="choose-ball_1-h11" />
        </td>
        <td class="choose">
        </td>
    </tr>
</table>
';