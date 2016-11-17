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

$odds5 = odds_sf::getOddsByBall("广西十分彩","正码和特别号","ball_5"); //特别号


echo '
<table class="order-table">
    <caption>特别号</caption>
    <tr>
        <td class="choose">
            <span class="num ball ball-red">01</span>
        <input type="text" value="'.$odds5["h1"].'" id="number-ball_5-h1" />  </td>
        <td class="choose">
            <span class="num ball ball-blue">08</span>
        <input type="text" value="'.$odds5["h8"].'" id="number-ball_5-h8" />  </td>
        <td class="choose">
            <span class="num ball ball-green">15</span>
        <input type="text" value="'.$odds5["h15"].'" id="number-ball_5-h15" />  </td>
        <td class="choose">
            <font class="choose-name red">红波</font>
        <input type="text" value="'.$odds5["h22"].'" id="number-ball_5-h22" />  </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball ball-blue">02</span>
        <input type="text" value="'.$odds5["h2"].'" id="number-ball_5-h2" />  </td>
        <td class="choose">
            <span class="num ball ball-green">09</span>
        <input type="text" value="'.$odds5["h9"].'" id="number-ball_5-h9" />  </td>
        <td class="choose">
            <span class="num ball ball-red">16</span>
        <input type="text" value="'.$odds5["h16"].'" id="number-ball_5-h16" />  </td>
        <td class="choose">
            <font class="choose-name blue">蓝波</font>
        <input type="text" value="'.$odds5["h23"].'" id="number-ball_5-h23" />  </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball ball-green">03</span>
        <input type="text" value="'.$odds5["h3"].'" id="number-ball_5-h3" />  </td>
        <td class="choose">
            <span class="num ball ball-red">10</span>
        <input type="text" value="'.$odds5["h10"].'" id="number-ball_5-h10" />  </td>
        <td class="choose">
            <span class="num ball ball-blue">17</span>
        <input type="text" value="'.$odds5["h17"].'" id="number-ball_5-h17" />  </td>
        <td class="choose">
            <font class="choose-name green">绿波</font>
        <input type="text" value="'.$odds5["h24"].'" id="number-ball_5-h24" />  </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball ball-red">04</span>
        <input type="text" value="'.$odds5["h4"].'" id="number-ball_5-h4" />  </td>
        <td class="choose">
            <span class="num ball ball-blue">11</span>
        <input type="text" value="'.$odds5["h11"].'" id="number-ball_5-h11" />  </td>
        <td class="choose">
            <span class="num ball ball-green">18</span>
        <input type="text" value="'.$odds5["h18"].'" id="number-ball_5-h18" />  </td>
        <td class="choose">
            <font class="choose-name">大单</font>
        <input type="text" value="'.$odds5["h25"].'" id="number-ball_5-h25" />  </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball ball-blue">05</span>
        <input type="text" value="'.$odds5["h5"].'" id="number-ball_5-h5" />  </td>
        <td class="choose">
            <span class="num ball ball-green">12</span>
        <input type="text" value="'.$odds5["h12"].'" id="number-ball_5-h12" />  </td>
        <td class="choose">
            <span class="num ball ball-red">19</span>
        <input type="text" value="'.$odds5["h19"].'" id="number-ball_5-h19" />  </td>
        <td class="choose">
            <font class="choose-name">大双</font>
        <input type="text" value="'.$odds5["h26"].'" id="number-ball_5-h26" />  </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball ball-green">06</span>
        <input type="text" value="'.$odds5["h6"].'" id="number-ball_5-h6" />  </td>
        <td class="choose">
            <span class="num ball ball-red">13</span>
        <input type="text" value="'.$odds5["h13"].'" id="number-ball_5-h13" />  </td>
        <td class="choose">
            <span class="num ball ball-blue">20</span>
        <input type="text" value="'.$odds5["h20"].'" id="number-ball_5-h20" />  </td>
        <td class="choose">
            <font class="choose-name">小单</font>
        <input type="text" value="'.$odds5["h27"].'" id="number-ball_5-h27" />  </td>
    </tr>
    <tr>
        <td class="choose">
            <span class="num ball ball-red">07</span>
        <input type="text" value="'.$odds5["h7"].'" id="number-ball_5-h7" />  </td>
        <td class="choose">
            <span class="num ball ball-blue">14</span>
        <input type="text" value="'.$odds5["h14"].'" id="number-ball_5-h14" />  </td>
        <td class="choose">
            <span class="num ball ball-green">21</span>
        <input type="text" value="'.$odds5["h21"].'" id="number-ball_5-h21" />  </td>
        <td class="choose">
            <font class="choose-name">小双</font>
        <input type="text" value="'.$odds5["h28"].'" id="number-ball_5-h28" />  </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">特大</font>
        <input type="text" value="'.$odds5["h29"].'" id="number-ball_5-h29" />  </td>
        <td class="choose">
            <font class="choose-name">特单</font>
        <input type="text" value="'.$odds5["h31"].'" id="number-ball_5-h31" />  </td>
        <td class="choose">
            <font class="choose-name">和单</font>
        <input type="text" value="'.$odds5["h33"].'" id="number-ball_5-h33" />  </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
        <input type="text" value="'.$odds5["h35"].'" id="number-ball_5-h35" />  </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">特小</font>
        <input type="text" value="'.$odds5["h30"].'" id="number-ball_5-h30" />  </td>
        <td class="choose">
            <font class="choose-name">特双</font>
        <input type="text" value="'.$odds5["h32"].'" id="number-ball_5-h32" />  </td>
        <td class="choose">
            <font class="choose-name">和双</font>
        <input type="text" value="'.$odds5["h34"].'" id="number-ball_5-h34" />  </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
        <input type="text" value="'.$odds5["h36"].'" id="number-ball_5-h36" />  </td>
    </tr>
</table>
';