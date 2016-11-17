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

$odds1 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_1");
$odds2 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_2");
$odds3 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_3");
$odds4 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_4");
$odds5 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_5");
$odds6 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_6");
$odds7 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_7");
$odds8 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_8");
$odds9 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_9");
$odds10 = odds_sf::getOddsByBall("北京PK拾","主盘势","ball_10");

echo '
<h3>主盘势</h3>
<table class="order-table">
    <thead>
        <tr>
            <th>组合</th>
            <th>大</th>
            <th>小</th>
            <th>单</th>
            <th>双</th>
            <th>龙</th>
            <th>虎</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>冠军</td>
            <td class="choose">
            <input type="text" value="'.$odds1["h1"].'" id="ball_1-h1" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds1["h2"].'" id="ball_1-h2" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds1["h3"].'" id="ball_1-h3" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds1["h4"].'" id="ball_1-h4" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds1["h5"].'" id="ball_1-h5" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds1["h6"].'" id="ball_1-h6" />    </td>
        </tr>
        <tr>
            <td>亚军</td>
            <td class="choose">
            <input type="text" value="'.$odds2["h1"].'" id="ball_2-h1" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds2["h2"].'" id="ball_2-h2" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds2["h3"].'" id="ball_2-h3" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds2["h4"].'" id="ball_2-h4" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds2["h5"].'" id="ball_2-h5" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds2["h6"].'" id="ball_2-h6" />    </td>
        </tr>
        <tr>
            <td>季军</td>
            <td class="choose">
            <input type="text" value="'.$odds3["h1"].'" id="ball_3-h1" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds3["h2"].'" id="ball_3-h2" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds3["h3"].'" id="ball_3-h3" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds3["h4"].'" id="ball_3-h4" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds3["h5"].'" id="ball_3-h5" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds3["h6"].'" id="ball_3-h6" />    </td>
        </tr>
        <tr>
            <td>第四名</td>
            <td class="choose">
            <input type="text" value="'.$odds4["h1"].'" id="ball_4-h1" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds4["h2"].'" id="ball_4-h2" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds4["h3"].'" id="ball_4-h3" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds4["h4"].'" id="ball_4-h4" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds4["h5"].'" id="ball_4-h5" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds4["h6"].'" id="ball_4-h6" />    </td>
        </tr>
        <tr>
            <td>第五名</td>
            <td class="choose">
            <input type="text" value="'.$odds5["h1"].'" id="ball_5-h1" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds5["h2"].'" id="ball_5-h2" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds5["h3"].'" id="ball_5-h3" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds5["h4"].'" id="ball_5-h4" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds5["h5"].'" id="ball_5-h5" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds5["h6"].'" id="ball_5-h6" />    </td>
        </tr>
        <tr>
            <td>第六名</td>
            <td class="choose">
            <input type="text" value="'.$odds6["h1"].'" id="ball_6-h1" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds6["h2"].'" id="ball_6-h2" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds6["h3"].'" id="ball_6-h3" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds6["h4"].'" id="ball_6-h4" />    </td>
            <td colspan="2" rowspan="5"></td>
        </tr>
        <tr>
            <td>第七名</td>
            <td class="choose">
            <input type="text" value="'.$odds7["h1"].'" id="ball_7-h1" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds7["h2"].'" id="ball_7-h2" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds7["h3"].'" id="ball_7-h3" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds7["h4"].'" id="ball_7-h4" />    </td>
        </tr>
        <tr>
            <td>第八名</td>
            <td class="choose">
            <input type="text" value="'.$odds8["h1"].'" id="ball_8-h1" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds8["h2"].'" id="ball_8-h2" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds8["h3"].'" id="ball_8-h3" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds8["h4"].'" id="ball_8-h4" />    </td>
        </tr>
        <tr>
            <td>第九名</td>
            <td class="choose">
            <input type="text" value="'.$odds9["h1"].'" id="ball_9-h1" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds9["h2"].'" id="ball_9-h2" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds9["h3"].'" id="ball_9-h3" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds9["h4"].'" id="ball_9-h4" />    </td>
        </tr>
        <tr>
            <td>第十名</td>
            <td class="choose">
            <input type="text" value="'.$odds10["h1"].'" id="ball_10-h1" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds10["h2"].'" id="ball_10-h2" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds10["h3"].'" id="ball_10-h3" />    </td>
            <td class="choose">
            <input type="text" value="'.$odds10["h4"].'" id="ball_10-h4" />    </td>
        </tr>
    </tbody>
</table>
';