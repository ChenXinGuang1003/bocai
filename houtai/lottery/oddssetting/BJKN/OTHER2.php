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

$odds1 = odds_sf::getOddsByBall("北京快乐8","选号","ball_1");

echo '
<table class="order-table">
    <tr>
        <th>选5</th>
        <td class="choose">
            <span class="choose-name">中5</span>
        <input type="text" value="'.$odds1["h1"].'" id="multi-choose-ball_1-h1" />    </td>
        <td class="choose">
            <span class="choose-name">中4</span>
        <input type="text" value="'.$odds1["h2"].'" id="multi-choose-ball_1-h2" />    </td>
        <td class="choose">
            <span class="choose-name">中3</span>
        <input type="text" value="'.$odds1["h3"].'" id="multi-choose-ball_1-h3" />    </td>
    </tr>
    <tr>
        <th>选4</th>
        <td class="choose">
            <span class="choose-name">中4</span>
        <input type="text" value="'.$odds1["h4"].'" id="multi-choose-ball_1-h4" />    </td>
        <td class="choose">
            <span class="choose-name">中3</span>
        <input type="text" value="'.$odds1["h5"].'" id="multi-choose-ball_1-h5" />    </td>
        <td class="choose">
            <span class="choose-name">中2</span>
        <input type="text" value="'.$odds1["h6"].'" id="multi-choose-ball_1-h6" />    </td>
    </tr>
    <tr>
        <th>选3</th>
        <td class="choose">
            <span class="choose-name">中3</span>
        <input type="text" value="'.$odds1["h7"].'" id="multi-choose-ball_1-h7" />    </td>
        <td class="choose">
            <span class="choose-name">中2</span>
        <input type="text" value="'.$odds1["h8"].'" id="multi-choose-ball_1-h8" />    </td>
        <td></td>
    </tr>
    <tr>
        <th>选2</th>
        <td class="choose">
            <span class="choose-name">中2</span>
        <input type="text" value="'.$odds1["h9"].'" id="multi-choose-ball_1-h9" />    </td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <th>选1</th>
        <td class="choose">
            <span class="choose-name">中1</span>
        <input type="text" value="'.$odds1["h10"].'" id="multi-choose-ball_1-h10" />    </td>
        <td></td>
        <td></td>
    </tr>
</table> ';