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

$odds1 = odds_sf::getOddsByBall("广东十一选五","总和龙虎和","ball_1");

echo '

<div id="locate-box">
    <table class="order-table" tabs-view="1">
        <caption>总和 龙虎和</caption>
        <tr>
            <td class="choose">
                <font class="choose-name">总和大</font>
               <input type="text" value="'.$odds1["h1"].'" id="tiger-ball_1-h1" />
            </td>
            <td class="choose">
                <font class="choose-name">总和小</font>
                <input type="text" value="'.$odds1["h2"].'" id="tiger-ball_1-h2" />
            </td>
            <td class="choose">
                <font class="choose-name">总和单</font>
                <input type="text" value="'.$odds1["h3"].'" id="tiger-ball_1-h3" />
            </td>
            <td class="choose">
                <font class="choose-name">总和双</font>
                <input type="text" value="'.$odds1["h4"].'" id="tiger-ball_1-h4" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">龙</font>
                <input type="text" value="'.$odds1["h5"].'" id="tiger-ball_1-h5" />
            </td>
            <td class="choose">
                <font class="choose-name">虎</font>
                <input type="text" value="'.$odds1["h6"].'" id="tiger-ball_1-h6" />
            </td>
            <td class="choose">
                <font class="choose-name">和</font>
                <input type="text" value="'.$odds1["h7"].'" id="tiger-ball_1-h7" />
            </td>
            <td class="choose">
            </td>
        </tr>
    </table>

</div>
';