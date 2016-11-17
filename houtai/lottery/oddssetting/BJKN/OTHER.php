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

$odds1 = odds_sf::getOddsByBall("北京快乐8","其他","ball_1");

echo '
<table class="order-table">
    <tr>
        <th>和值</th>
        <td class="choose">
            <span class="choose-name">单</span>
        <input type="text" value="'.$odds1["h1"].'" id="ball_1-h1" />    </td>
        <td class="choose">
            <span class="choose-name">双</span>
        <input type="text" value="'.$odds1["h2"].'" id="ball_1-h2" />    </td>
        <td class="choose">
            <span class="choose-name">大</span>
        <input type="text" value="'.$odds1["h3"].'" id="ball_1-h3" />    </td>
        <td class="choose">
            <span class="choose-name">小</span>
        <input type="text" value="'.$odds1["h4"].'" id="ball_1-h4" />    </td>
        <td class="choose">
            <span class="choose-name">810</span>
        <input type="text" value="'.$odds1["h5"].'" id="ball_1-h5" />    </td>
    </tr>
    <tr>
        <th>上中下盘</th>
        <td class="choose">
            <span class="choose-name">上</span>
        <input type="text" value="'.$odds1["h6"].'" id="ball_1-h6" />    </td>
        <td class="choose">
            <span class="choose-name">中</span>
        <input type="text" value="'.$odds1["h7"].'" id="ball_1-h7" />    </td>
        <td class="choose">
            <span class="choose-name">下</span>
        <input type="text" value="'.$odds1["h8"].'" id="ball_1-h8" />    </td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <th>奇偶和盘</th>
        <td class="choose">
            <span class="choose-name">奇</span>
        <input type="text" value="'.$odds1["h9"].'" id="ball_1-h9" />    </td>
        <td class="choose">
            <span class="choose-name">和</span>
        <input type="text" value="'.$odds1["h10"].'" id="ball_1-h10" />    </td>
        <td class="choose">
            <span class="choose-name">偶</span>
        <input type="text" value="'.$odds1["h11"].'" id="ball_1-h11" />    </td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <th>五行</th>
        <td class="choose">
            <span class="choose-name">金</span>
        <input type="text" value="'.$odds1["h12"].'" id="ball_1-h12" />    </td>
        <td class="choose">
            <span class="choose-name">木</span>
        <input type="text" value="'.$odds1["h13"].'" id="ball_1-h13" />    </td>
        <td class="choose">
            <span class="choose-name">水</span>
        <input type="text" value="'.$odds1["h14"].'" id="ball_1-h14" />    </td>
        <td class="choose">
            <span class="choose-name">火</span>
        <input type="text" value="'.$odds1["h15"].'" id="ball_1-h15" />    </td>
        <td class="choose">
            <span class="choose-name">土</span>
        <input type="text" value="'.$odds1["h16"].'" id="ball_1-h16" />    </td>
    </tr>
    <tr>
        <th>过关</th>
        <td class="choose">
            <span class="choose-name">小单</span>
        <input type="text" value="'.$odds1["h17"].'" id="ball_1-h17" />    </td>
        <td class="choose">
            <span class="choose-name">小双</span>
        <input type="text" value="'.$odds1["h18"].'" id="ball_1-h18" />    </td>
        <td class="choose">
            <span class="choose-name">大单</span>
        <input type="text" value="'.$odds1["h19"].'" id="ball_1-h19" />    </td>
        <td class="choose">
            <span class="choose-name">大双</span>
        <input type="text" value="'.$odds1["h20"].'" id="ball_1-h20" />    </td>
        <td></td>
    </tr>
</table> ';