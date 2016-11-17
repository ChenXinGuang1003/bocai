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

$odds1 = odds_sf::getOddsByBall("广东十分彩","一中一","ball_1");

echo '
<table class="order-table">
    <caption>一中一</caption>
    <tr>
        <td class="choose">
            <span class="num ball">01</span>
            <input type="text" value="'.$odds1["h1"].'" id="choose-ball_1-h1" />  </td>
        <td class="choose">
            <span class="num ball">06</span>
            <input type="text" value="'.$odds1["h6"].'" id="choose-ball_1-h6" />  </td>
        <td class="choose">
            <span class="num ball">11</span>
            <input type="text" value="'.$odds1["h11"].'" id="choose-ball_1-h11" />  </td>
        <td class="choose">
            <span class="num ball">16</span>
            <input type="text" value="'.$odds1["h16"].'" id="choose-ball_1-h16" />  </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball">02</span>
            <input type="text" value="'.$odds1["h2"].'" id="choose-ball_1-h2" />  </td>
        <td class="choose">
            <span class="num ball">07</span>
            <input type="text" value="'.$odds1["h7"].'" id="choose-ball_1-h7" />  </td>
        <td class="choose">
            <span class="num ball">12</span>
            <input type="text" value="'.$odds1["h12"].'" id="choose-ball_1-h12" />  </td>
        <td class="choose">
            <span class="num ball">17</span>
            <input type="text" value="'.$odds1["h17"].'" id="choose-ball_1-h17" />  </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball">03</span>
            <input type="text" value="'.$odds1["h3"].'" id="choose-ball_1-h3" />  </td>
        <td class="choose">
            <span class="num ball">08</span>
            <input type="text" value="'.$odds1["h8"].'" id="choose-ball_1-h8" />  </td>
        <td class="choose">
            <span class="num ball">13</span>
            <input type="text" value="'.$odds1["h13"].'" id="choose-ball_1-h13" />  </td>
        <td class="choose">
            <span class="num ball">18</span>
            <input type="text" value="'.$odds1["h18"].'" id="choose-ball_1-h18" />  </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball">04</span>
            <input type="text" value="'.$odds1["h4"].'" id="choose-ball_1-h4" />  </td>
        <td class="choose">
            <span class="num ball">09</span>
            <input type="text" value="'.$odds1["h9"].'" id="choose-ball_1-h9" />  </td>
        <td class="choose">
            <span class="num ball">14</span>
            <input type="text" value="'.$odds1["h14"].'" id="choose-ball_1-h14" />  </td>
        <td class="choose">
            <span class="num ball ball-red">19</span>
            <input type="text" value="'.$odds1["h19"].'" id="choose-ball_1-h19" />  </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball">05</span>
            <input type="text" value="'.$odds1["h5"].'" id="choose-ball_1-h5" />  </td>
        <td class="choose">
            <span class="num ball">10</span>
            <input type="text" value="'.$odds1["h10"].'" id="choose-ball_1-h10" />  </td>
        <td class="choose">
            <span class="num ball">15</span>
            <input type="text" value="'.$odds1["h15"].'" id="choose-ball_1-h15" />  </td>
        <td class="choose">
            <span class="num ball ball-red">20</span>
            <input type="text" value="'.$odds1["h20"].'" id="choose-ball_1-h20" />  </td>
    </tr>
</table>
';