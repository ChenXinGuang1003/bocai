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

$odds1 = odds_sf::getOddsByBall("广西十分彩","顺子杂六","ball_1");
$odds2 = odds_sf::getOddsByBall("广西十分彩","顺子杂六","ball_2");
$odds3 = odds_sf::getOddsByBall("广西十分彩","顺子杂六","ball_3");

echo '
<table class="order-table">
    <caption>前三</caption>
    <tr>
        <td class="choose"  style="display: none;">
            <span class="num ball ball-red">豹子</span>
        <input type="text" value="'.$odds1["h1"].'" id="shun-ball_1-h1" />  </td>
        <td class="choose">
            <span class="num ball ball-blue">顺子</span>
        <input type="text" value="'.$odds1["h2"].'" id="shun-ball_1-h2" />  </td>
        <td class="choose"  style="display: none;">
            <span class="num ball ball-green">对子</span>
        <input type="text" value="'.$odds1["h3"].'" id="shun-ball_1-h3" />  </td>
        <td class="choose">
            <span class="num ball ball-green">半顺</span>
        <input type="text" value="'.$odds1["h4"].'" id="shun-ball_1-h4" />  </td>
        <td class="choose">
            <span class="num ball ball-green">杂六</span>
        <input type="text" value="'.$odds1["h5"].'" id="shun-ball_1-h5" />  </td>
    </tr>
</table>
<table class="order-table">
    <caption>中三</caption>
    <tr>
        <td class="choose" style="display: none;">
            <span class="num ball ball-red">豹子</span>
        <input type="text" value="'.$odds2["h1"].'" id="shun-ball_2-h1" />  </td>
        <td class="choose">
            <span class="num ball ball-blue">顺子</span>
        <input type="text" value="'.$odds2["h2"].'" id="shun-ball_2-h2" />  </td>
        <td class="choose" style="display: none;">
            <span class="num ball ball-green">对子</span>
        <input type="text" value="'.$odds2["h3"].'" id="shun-ball_2-h3" />  </td>
        <td class="choose">
            <span class="num ball ball-green">半顺</span>
        <input type="text" value="'.$odds2["h4"].'" id="shun-ball_2-h4" />  </td>
        <td class="choose">
            <span class="num ball ball-green">杂六</span>
        <input type="text" value="'.$odds2["h5"].'" id="shun-ball_2-h5" />  </td>
    </tr>
</table>
<table class="order-table">
    <caption>后三</caption>
    <tr>
        <td class="choose" style="display: none;">
            <span class="num ball ball-red">豹子</span>
        <input type="text" value="'.$odds3["h1"].'" id="shun-ball_3-h1" />  </td>
        <td class="choose">
            <span class="num ball ball-blue">顺子</span>
        <input type="text" value="'.$odds3["h2"].'" id="shun-ball_3-h2" />  </td>
        <td class="choose" style="display: none;">
            <span class="num ball ball-green">对子</span>
        <input type="text" value="'.$odds3["h3"].'" id="shun-ball_3-h3" />  </td>
        <td class="choose">
            <span class="num ball ball-green">半顺</span>
        <input type="text" value="'.$odds3["h4"].'" id="shun-ball_3-h4" />  </td>
        <td class="choose">
            <span class="num ball ball-green">杂六</span>
        <input type="text" value="'.$odds3["h5"].'" id="shun-ball_3-h5" />  </td>
    </tr>
</table>

';