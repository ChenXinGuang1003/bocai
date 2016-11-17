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

$odds8 = odds_sf::getOddsByBall("天津十分彩","正码和特别号","ball_8");//特别号

echo '
<table class="order-table">
    <caption>特别号</caption>
    <tr>
        <td class="choose">
            <span class="num ball">01</span>
            <input type="text" value="'.$odds8["h1"].'" id="number-ball_8-h1" />
        </td>
        <td class="choose">
            <span class="num ball">06</span>
            <input type="text" value="'.$odds8["h6"].'" id="number-ball_8-h6" />
        </td>
        <td class="choose">
            <span class="num ball">11</span>
            <input type="text" value="'.$odds8["h11"].'" id="number-ball_8-h11" />
        </td>
        <td class="choose">
            <span class="num ball">16</span>
            <input type="text" value="'.$odds8["h16"].'" id="number-ball_8-h16" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball">02</span>
            <input type="text" value="'.$odds8["h2"].'" id="number-ball_8-h2" />
        </td>
        <td class="choose">
            <span class="num ball">07</span>
            <input type="text" value="'.$odds8["h7"].'" id="number-ball_8-h7" />
        </td>
        <td class="choose">
            <span class="num ball">12</span>
            <input type="text" value="'.$odds8["h12"].'" id="number-ball_8-h12" />
        </td>
        <td class="choose">
            <span class="num ball">17</span>
            <input type="text" value="'.$odds8["h17"].'" id="number-ball_8-h17" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball">03</span>
            <input type="text" value="'.$odds8["h3"].'" id="number-ball_8-h3" />
        </td>
        <td class="choose">
            <span class="num ball">08</span>
            <input type="text" value="'.$odds8["h8"].'" id="number-ball_8-h8" />
        </td>
        <td class="choose">
            <span class="num ball">13</span>
            <input type="text" value="'.$odds8["h13"].'" id="number-ball_8-h13" />
        </td>
        <td class="choose">
            <span class="num ball">18</span>
            <input type="text" value="'.$odds8["h18"].'" id="number-ball_8-h18" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball">04</span>
            <input type="text" value="'.$odds8["h4"].'" id="number-ball_8-h4" />
        </td>
        <td class="choose">
            <span class="num ball">09</span>
            <input type="text" value="'.$odds8["h9"].'" id="number-ball_8-h9" />
        </td>
        <td class="choose">
            <span class="num ball">14</span>
            <input type="text" value="'.$odds8["h14"].'" id="number-ball_8-h14" />
        </td>
        <td class="choose">
            <span class="num ball ball-red">19</span>
            <input type="text" value="'.$odds8["h19"].'" id="number-ball_8-h19" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball">05</span>
            <input type="text" value="'.$odds8["h5"].'" id="number-ball_8-h5" />
        </td>
        <td class="choose">
            <span class="num ball">10</span>
            <input type="text" value="'.$odds8["h10"].'" id="number-ball_8-h10" />
        </td>
        <td class="choose">
            <span class="num ball">15</span>
            <input type="text" value="'.$odds8["h15"].'" id="number-ball_8-h15" />
        </td>
        <td class="choose">
            <span class="num ball ball-red">20</span>
            <input type="text" value="'.$odds8["h20"].'" id="number-ball_8-h20" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">大</font>
            <input type="text" value="'.$odds8["h21"].'" id="number-ball_8-h21" />
        </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <input type="text" value="'.$odds8["h23"].'" id="number-ball_8-h23" />
        </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <input type="text" value="'.$odds8["h25"].'" id="number-ball_8-h25" />
        </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <input type="text" value="'.$odds8["h27"].'" id="number-ball_8-h27" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <input type="text" value="'.$odds8["h22"].'" id="number-ball_8-h22" />
        </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <input type="text" value="'.$odds8["h24"].'" id="number-ball_8-h24" />
        </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <input type="text" value="'.$odds8["h26"].'" id="number-ball_8-h26" />
        </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <input type="text" value="'.$odds8["h28"].'" id="number-ball_8-h28" />
        </td>
    </tr>
</table>
';