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

$odds1 = odds_sf::getOddsByBall("广西十分彩","主盘势","ball_1");
$odds2 = odds_sf::getOddsByBall("广西十分彩","主盘势","ball_2");
$odds3 = odds_sf::getOddsByBall("广西十分彩","主盘势","ball_3");
$odds4 = odds_sf::getOddsByBall("广西十分彩","主盘势","ball_4");
$odds5 = odds_sf::getOddsByBall("广西十分彩","主盘势","ball_5"); //特别号

echo '
<table class="order-table">
    <caption>特别号</caption>
    <tr>
        <th>大</th>
        <td class="choose">
        <input type="text" value="'.$odds5["h1"].'" id="ball_5-h1" />  </td>

        <th>单</th>
        <td class="choose">
        <input type="text" value="'.$odds5["h3"].'" id="ball_5-h3" />  </td>

        <th>和单</th>
        <td class="choose">
        <input type="text" value="'.$odds5["h5"].'" id="ball_5-h5" />  </td>

        <th>尾大</th>
        <td class="choose">
        <input type="text" value="'.$odds5["h7"].'" id="ball_5-h7" />  </td>
    </tr>
    <tr>
        <th>小</th>
        <td class="choose">
        <input type="text" value="'.$odds5["h2"].'" id="ball_5-h2" />  </td>

        <th>双</th>
        <td class="choose">
        <input type="text" value="'.$odds5["h4"].'" id="ball_5-h4" />  </td>

        <th>和双</th>
        <td class="choose">
        <input type="text" value="'.$odds5["h6"].'" id="ball_5-h6" />  </td>

        <th>尾小</th>
        <td class="choose">
        <input type="text" value="'.$odds5["h8"].'" id="ball_5-h8" />  </td>
    </tr>
</table>

<table class="order-table">
    <caption>正码1~4</caption>
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>正码一</th>
            <th>正码二</th>
            <th>正码三</th>
            <th>正码四</th>
        </tr>
    </thead>
    <tr>
        <th>大</th>
        <td class="choose">
        <input type="text" value="'.$odds1["h1"].'" id="ball_1-h1" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds2["h1"].'" id="ball_2-h1" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds3["h1"].'" id="ball_3-h1" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds4["h1"].'" id="ball_4-h1" />  </td>
    </tr>
    <tr>
        <th>小</th>
        <td class="choose">
        <input type="text" value="'.$odds1["h2"].'" id="ball_1-h2" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds2["h2"].'" id="ball_2-h2" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds3["h2"].'" id="ball_3-h2" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds4["h2"].'" id="ball_4-h2" />  </td>
    </tr>
    <tr>
        <th>单</th>
        <td class="choose">
        <input type="text" value="'.$odds1["h3"].'" id="ball_1-h3" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds2["h3"].'" id="ball_2-h3" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds3["h3"].'" id="ball_3-h3" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds4["h3"].'" id="ball_4-h3" />  </td>
    </tr>
    <tr>
        <th>双</th>
        <td class="choose">
        <input type="text" value="'.$odds1["h4"].'" id="ball_1-h4" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds2["h4"].'" id="ball_2-h4" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds3["h4"].'" id="ball_3-h4" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds4["h4"].'" id="ball_4-h4" />  </td>
    </tr>
    <tr>
        <th>和单</th>
        <td class="choose">
        <input type="text" value="'.$odds1["h5"].'" id="ball_1-h5" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds2["h5"].'" id="ball_2-h5" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds3["h5"].'" id="ball_3-h5" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds4["h5"].'" id="ball_4-h5" />  </td>
    </tr>
    <tr>
        <th>和双</th>
        <td class="choose">
        <input type="text" value="'.$odds1["h6"].'" id="ball_1-h6" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds2["h6"].'" id="ball_2-h6" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds3["h6"].'" id="ball_3-h6" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds4["h6"].'" id="ball_4-h6" />  </td>
    </tr>
    <tr>
        <th>尾大</th>
        <td class="choose">
        <input type="text" value="'.$odds1["h7"].'" id="ball_1-h7" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds2["h7"].'" id="ball_2-h7" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds3["h7"].'" id="ball_3-h7" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds4["h7"].'" id="ball_4-h7" />  </td>
    </tr>
    <tr>
        <th>尾小</th>
        <td class="choose">
        <input type="text" value="'.$odds1["h8"].'" id="ball_1-h8" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds2["h8"].'" id="ball_2-h8" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds3["h8"].'" id="ball_3-h8" />  </td>
        <td class="choose">
        <input type="text" value="'.$odds4["h8"].'" id="ball_4-h8" />  </td>
    </tr>
</table>
';