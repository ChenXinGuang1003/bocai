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

$odds1 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_1");
$odds2 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_2");
$odds3 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_3");
$odds4 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_4");
$odds5 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_5");
$odds6 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_6");
$odds7 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_7");
$odds8 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_8");//特别号
$odds9 = odds_sf::getOddsByBall("天津十分彩","主盘势","ball_9");//顶部总和

echo '
<table class="order-table">
    <caption>总和</caption>
    <tr>
        <td class="choose">
            <font class="choose-name">大</font>
            <input type="text" value="'.$odds9["h1"].'" id="ball_9-h1" />    </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <input type="text" value="'.$odds9["h3"].'" id="ball_9-h3" />    </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <input type="text" value="'.$odds9["h5"].'" id="ball_9-h5" />    </td>
        <td class="choose">
            <font class="choose-name">龙</font>
            <input type="text" value="'.$odds9["h7"].'" id="ball_9-h7" />    </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <input type="text" value="'.$odds9["h2"].'" id="ball_9-h2" />    </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <input type="text" value="'.$odds9["h4"].'" id="ball_9-h4" />    </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <input type="text" value="'.$odds9["h6"].'" id="ball_9-h6" />    </td>
        <td class="choose">
            <font class="choose-name">虎</font>
            <input type="text" value="'.$odds9["h8"].'" id="ball_9-h8" />    </td>
    </tr>
</table>

<table class="order-table">
    <caption>单码/双面</caption>

    <!-- num 1 -->
    <tr>
        <th rowspan="2">第一球</th>

        <td class="choose">
            <font class="choose-name">大</font>
            <input type="text" value="'.$odds1["h1"].'" id="ball_1-h1" />    </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <input type="text" value="'.$odds1["h3"].'" id="ball_1-h3" />    </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <input type="text" value="'.$odds1["h5"].'" id="ball_1-h5" />    </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <input type="text" value="'.$odds1["h7"].'" id="ball_1-h7" />    </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <input type="text" value="'.$odds1["h2"].'" id="ball_1-h2" />    </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <input type="text" value="'.$odds1["h4"].'" id="ball_1-h4" />    </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <input type="text" value="'.$odds1["h6"].'" id="ball_1-h6" />    </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <input type="text" value="'.$odds1["h8"].'" id="ball_1-h8" />    </td>
    </tr>

    <!-- num 2 -->
    <tr>
        <th rowspan="2">第二球</th>

        <td class="choose">
            <font class="choose-name">大</font>
            <input type="text" value="'.$odds2["h1"].'" id="ball_2-h1" />    </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <input type="text" value="'.$odds2["h3"].'" id="ball_2-h3" />    </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <input type="text" value="'.$odds2["h5"].'" id="ball_2-h5" />    </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <input type="text" value="'.$odds2["h7"].'" id="ball_2-h7" />    </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <input type="text" value="'.$odds2["h2"].'" id="ball_2-h2" />    </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <input type="text" value="'.$odds2["h4"].'" id="ball_2-h4" />    </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <input type="text" value="'.$odds2["h6"].'" id="ball_2-h6" />    </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <input type="text" value="'.$odds2["h8"].'" id="ball_2-h8" />    </td>
    </tr>

    <!-- num 3 -->
    <tr>
        <th rowspan="2">第三球</th>

        <td class="choose">
            <font class="choose-name">大</font>
            <input type="text" value="'.$odds3["h1"].'" id="ball_3-h1" />    </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <input type="text" value="'.$odds3["h3"].'" id="ball_3-h3" />    </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <input type="text" value="'.$odds3["h5"].'" id="ball_3-h5" />    </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <input type="text" value="'.$odds3["h7"].'" id="ball_3-h7" />    </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <input type="text" value="'.$odds3["h2"].'" id="ball_3-h2" />    </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <input type="text" value="'.$odds3["h4"].'" id="ball_3-h4" />    </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <input type="text" value="'.$odds3["h6"].'" id="ball_3-h6" />    </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <input type="text" value="'.$odds3["h8"].'" id="ball_3-h8" />    </td>
    </tr>

    <!-- num 4 -->
    <tr>
        <th rowspan="2">第四球</th>

        <td class="choose">
            <font class="choose-name">大</font>
            <input type="text" value="'.$odds4["h1"].'" id="ball_4-h1" />    </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <input type="text" value="'.$odds4["h3"].'" id="ball_4-h3" />    </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <input type="text" value="'.$odds4["h5"].'" id="ball_4-h5" />    </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <input type="text" value="'.$odds4["h7"].'" id="ball_4-h7" />    </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <input type="text" value="'.$odds4["h2"].'" id="ball_4-h2" />    </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <input type="text" value="'.$odds4["h4"].'" id="ball_4-h4" />    </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <input type="text" value="'.$odds4["h6"].'" id="ball_4-h6" />    </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <input type="text" value="'.$odds4["h8"].'" id="ball_4-h8" />    </td>
    </tr>

    <!-- num 5 -->
    <tr>
        <th rowspan="2">第五球</th>

        <td class="choose">
            <font class="choose-name">大</font>
            <input type="text" value="'.$odds5["h1"].'" id="ball_5-h1" />    </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <input type="text" value="'.$odds5["h3"].'" id="ball_5-h3" />    </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <input type="text" value="'.$odds5["h5"].'" id="ball_5-h5" />    </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <input type="text" value="'.$odds5["h7"].'" id="ball_5-h7" />    </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <input type="text" value="'.$odds5["h2"].'" id="ball_5-h2" />    </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <input type="text" value="'.$odds5["h4"].'" id="ball_5-h4" />    </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <input type="text" value="'.$odds5["h6"].'" id="ball_5-h6" />    </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <input type="text" value="'.$odds5["h8"].'" id="ball_5-h8" />    </td>
    </tr>

    <!-- num 6 -->
    <tr>
        <th rowspan="2">第六球</th>

        <td class="choose">
            <font class="choose-name">大</font>
            <input type="text" value="'.$odds6["h1"].'" id="ball_6-h1" />    </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <input type="text" value="'.$odds6["h3"].'" id="ball_6-h3" />    </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <input type="text" value="'.$odds6["h5"].'" id="ball_6-h5" />    </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <input type="text" value="'.$odds6["h7"].'" id="ball_6-h7" />    </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <input type="text" value="'.$odds6["h2"].'" id="ball_6-h2" />    </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <input type="text" value="'.$odds6["h4"].'" id="ball_6-h4" />    </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <input type="text" value="'.$odds6["h6"].'" id="ball_6-h6" />    </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <input type="text" value="'.$odds6["h8"].'" id="ball_6-h8" />    </td>
    </tr>

    <!-- num 7 -->
    <tr>
        <th rowspan="2">第七球</th>

        <td class="choose">
            <font class="choose-name">大</font>
            <input type="text" value="'.$odds7["h1"].'" id="ball_7-h1" />    </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <input type="text" value="'.$odds7["h3"].'" id="ball_7-h3" />    </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <input type="text" value="'.$odds7["h5"].'" id="ball_7-h5" />    </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <input type="text" value="'.$odds7["h7"].'" id="ball_7-h7" />    </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <input type="text" value="'.$odds7["h2"].'" id="ball_7-h2" />    </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <input type="text" value="'.$odds7["h4"].'" id="ball_7-h4" />    </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <input type="text" value="'.$odds7["h6"].'" id="ball_7-h6" />    </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <input type="text" value="'.$odds7["h8"].'" id="ball_7-h8" />    </td>
    </tr>

    <!-- num S -->
    <tr>
        <th rowspan="2">特别号</th>

        <td class="choose">
            <font class="choose-name">大</font>
            <input type="text" value="'.$odds8["h1"].'" id="ball_8-h1" />    </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <input type="text" value="'.$odds8["h3"].'" id="ball_8-h3" />    </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <input type="text" value="'.$odds8["h5"].'" id="ball_8-h5" />    </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <input type="text" value="'.$odds8["h7"].'" id="ball_8-h7" />    </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <input type="text" value="'.$odds8["h2"].'" id="ball_8-h2" />    </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <input type="text" value="'.$odds8["h4"].'" id="ball_8-h4" />    </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <input type="text" value="'.$odds8["h6"].'" id="ball_8-h6" />    </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <input type="text" value="'.$odds8["h8"].'" id="ball_8-h8" />    </td>
    </tr>
</table>
';