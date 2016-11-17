<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

$odds1 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_1");
$odds2 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_2");
$odds3 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_3");
$odds4 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_4");
$odds5 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_5");
$odds6 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_6");
$odds7 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_7");
$odds8 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_8");
$odds9 = odds_sf::getOddsByBall("广东十分彩","主盘势","ball_9");//顶部总和

echo '
<table class="order-table">
    <caption>总和</caption>
    <tr>
        <td class="choose">
            <font class="choose-name">大</font>
            <span class="odds">'.$odds9["h1"].'</span>
            <input type="text" name="orders[ALL:SUM:OVER]" />
        </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <span class="odds">'.$odds9["h3"].'</span>
            <input type="text" name="orders[ALL:SUM:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <span class="odds">'.$odds9["h5"].'</span>
            <input type="text" name="orders[ALL:SUM:LAST:OVER]" />
        </td>
        <td class="choose">
            <font class="choose-name">龙</font>
            <span class="odds">'.$odds9["h7"].'</span>
            <input type="text" name="orders[1:S:DRAGON]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <span class="odds">'.$odds9["h2"].'</span>
            <input type="text" name="orders[ALL:SUM:UNDER]" />
        </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <span class="odds">'.$odds9["h4"].'</span>
            <input type="text" name="orders[ALL:SUM:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <span class="odds">'.$odds9["h6"].'</span>
            <input type="text" name="orders[ALL:SUM:LAST:UNDER]" />
        </td>
        <td class="choose">
            <font class="choose-name">虎</font>
            <span class="odds">'.$odds9["h8"].'</span>
            <input type="text" name="orders[1:S:TIGER]" />
        </td>
    </tr>
</table>

<table class="order-table">
    <caption>单码/双面</caption>

    <!-- num 1 -->
    <tr>
        <th rowspan="2">第一球</th>

        <td class="choose">
            <font class="choose-name">大</font>
            <span class="odds">'.$odds1["h1"].'</span>
            <input type="text" name="orders[1:OVER]" />
        </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <span class="odds">'.$odds1["h3"].'</span>
            <input type="text" name="orders[1:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <span class="odds">'.$odds1["h5"].'</span>
            <input type="text" name="orders[1:SUM:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <span class="odds">'.$odds1["h7"].'</span>
            <input type="text" name="orders[1:LAST:OVER]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <span class="odds">'.$odds1["h2"].'</span>
            <input type="text" name="orders[1:UNDER]" />
        </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <span class="odds">'.$odds1["h4"].'</span>
            <input type="text" name="orders[1:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <span class="odds">'.$odds1["h6"].'</span>
            <input type="text" name="orders[1:SUM:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <span class="odds">'.$odds1["h8"].'</span>
            <input type="text" name="orders[1:LAST:UNDER]" />
        </td>
    </tr>

    <!-- num 2 -->
    <tr>
        <th rowspan="2">第二球</th>

        <td class="choose">
            <font class="choose-name">大</font>
            <span class="odds">'.$odds2["h1"].'</span>
            <input type="text" name="orders[2:OVER]" />
        </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <span class="odds">'.$odds2["h3"].'</span>
            <input type="text" name="orders[2:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <span class="odds">'.$odds2["h5"].'</span>
            <input type="text" name="orders[2:SUM:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <span class="odds">'.$odds2["h7"].'</span>
            <input type="text" name="orders[2:LAST:OVER]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <span class="odds">'.$odds2["h2"].'</span>
            <input type="text" name="orders[2:UNDER]" />
        </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <span class="odds">'.$odds2["h4"].'</span>
            <input type="text" name="orders[2:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <span class="odds">'.$odds2["h6"].'</span>
            <input type="text" name="orders[2:SUM:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <span class="odds">'.$odds2["h8"].'</span>
            <input type="text" name="orders[2:LAST:UNDER]" />
        </td>
    </tr>

    <!-- num 3 -->
    <tr>
        <th rowspan="2">第三球</th>

        <td class="choose">
            <font class="choose-name">大</font>
            <span class="odds">'.$odds3["h1"].'</span>
            <input type="text" name="orders[3:OVER]" />
        </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <span class="odds">'.$odds3["h3"].'</span>
            <input type="text" name="orders[3:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <span class="odds">'.$odds3["h5"].'</span>
            <input type="text" name="orders[3:SUM:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <span class="odds">'.$odds3["h7"].'</span>
            <input type="text" name="orders[3:LAST:OVER]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <span class="odds">'.$odds3["h2"].'</span>
            <input type="text" name="orders[3:UNDER]" />
        </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <span class="odds">'.$odds3["h4"].'</span>
            <input type="text" name="orders[3:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <span class="odds">'.$odds3["h6"].'</span>
            <input type="text" name="orders[3:SUM:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <span class="odds">'.$odds3["h8"].'</span>
            <input type="text" name="orders[3:LAST:UNDER]" />
        </td>
    </tr>

    <!-- num 4 -->
    <tr>
        <th rowspan="2">第四球</th>

        <td class="choose">
            <font class="choose-name">大</font>
            <span class="odds">'.$odds4["h1"].'</span>
            <input type="text" name="orders[4:OVER]" />
        </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <span class="odds">'.$odds4["h3"].'</span>
            <input type="text" name="orders[4:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <span class="odds">'.$odds4["h5"].'</span>
            <input type="text" name="orders[4:SUM:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <span class="odds">'.$odds4["h7"].'</span>
            <input type="text" name="orders[4:LAST:OVER]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <span class="odds">'.$odds4["h2"].'</span>
            <input type="text" name="orders[4:UNDER]" />
        </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <span class="odds">'.$odds4["h4"].'</span>
            <input type="text" name="orders[4:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <span class="odds">'.$odds4["h6"].'</span>
            <input type="text" name="orders[4:SUM:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <span class="odds">'.$odds4["h8"].'</span>
            <input type="text" name="orders[4:LAST:UNDER]" />
        </td>
    </tr>

    <!-- num 5 -->
    <tr>
        <th rowspan="2">第五球</th>

        <td class="choose">
            <font class="choose-name">大</font>
            <span class="odds">'.$odds5["h1"].'</span>
            <input type="text" name="orders[5:OVER]" />
        </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <span class="odds">'.$odds5["h3"].'</span>
            <input type="text" name="orders[5:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <span class="odds">'.$odds5["h5"].'</span>
            <input type="text" name="orders[5:SUM:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <span class="odds">'.$odds5["h7"].'</span>
            <input type="text" name="orders[5:LAST:OVER]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <span class="odds">'.$odds5["h2"].'</span>
            <input type="text" name="orders[5:UNDER]" />
        </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <span class="odds">'.$odds5["h4"].'</span>
            <input type="text" name="orders[5:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <span class="odds">'.$odds5["h6"].'</span>
            <input type="text" name="orders[5:SUM:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <span class="odds">'.$odds5["h8"].'</span>
            <input type="text" name="orders[5:LAST:UNDER]" />
        </td>
    </tr>

    <!-- num 6 -->
    <tr>
        <th rowspan="2">第六球</th>

        <td class="choose">
            <font class="choose-name">大</font>
            <span class="odds">'.$odds6["h1"].'</span>
            <input type="text" name="orders[6:OVER]" />
        </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <span class="odds">'.$odds6["h3"].'</span>
            <input type="text" name="orders[6:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <span class="odds">'.$odds6["h5"].'</span>
            <input type="text" name="orders[6:SUM:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <span class="odds">'.$odds6["h7"].'</span>
            <input type="text" name="orders[6:LAST:OVER]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <span class="odds">'.$odds6["h2"].'</span>
            <input type="text" name="orders[6:UNDER]" />
        </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <span class="odds">'.$odds6["h4"].'</span>
            <input type="text" name="orders[6:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <span class="odds">'.$odds6["h6"].'</span>
            <input type="text" name="orders[6:SUM:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <span class="odds">'.$odds6["h8"].'</span>
            <input type="text" name="orders[6:LAST:UNDER]" />
        </td>
    </tr>

    <!-- num 7 -->
    <tr>
        <th rowspan="2">第七球</th>

        <td class="choose">
            <font class="choose-name">大</font>
            <span class="odds">'.$odds7["h1"].'</span>
            <input type="text" name="orders[7:OVER]" />
        </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <span class="odds">'.$odds7["h3"].'</span>
            <input type="text" name="orders[7:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <span class="odds">'.$odds7["h5"].'</span>
            <input type="text" name="orders[7:SUM:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <span class="odds">'.$odds7["h7"].'</span>
            <input type="text" name="orders[7:LAST:OVER]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <span class="odds">'.$odds7["h2"].'</span>
            <input type="text" name="orders[7:UNDER]" />
        </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <span class="odds">'.$odds7["h4"].'</span>
            <input type="text" name="orders[7:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <span class="odds">'.$odds7["h6"].'</span>
            <input type="text" name="orders[7:SUM:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <span class="odds">'.$odds7["h8"].'</span>
            <input type="text" name="orders[7:LAST:UNDER]" />
        </td>
    </tr>

    <!-- num 8 -->
    <tr>
        <th rowspan="2">第八球</th>

        <td class="choose">
            <font class="choose-name">大</font>
            <span class="odds">'.$odds8["h1"].'</span>
            <input type="text" name="orders[S:OVER]" />
        </td>
        <td class="choose">
            <font class="choose-name">单</font>
            <span class="odds">'.$odds8["h3"].'</span>
            <input type="text" name="orders[S:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">和单</font>
            <span class="odds">'.$odds8["h5"].'</span>
            <input type="text" name="orders[S:SUM:ODD]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾大</font>
            <span class="odds">'.$odds8["h7"].'</span>
            <input type="text" name="orders[S:LAST:OVER]" />
        </td>
    </tr>
    <tr>
        <td class="choose">
            <font class="choose-name">小</font>
            <span class="odds">'.$odds8["h2"].'</span>
            <input type="text" name="orders[S:UNDER]" />
        </td>
        <td class="choose">
            <font class="choose-name">双</font>
            <span class="odds">'.$odds8["h4"].'</span>
            <input type="text" name="orders[S:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">和双</font>
            <span class="odds">'.$odds8["h6"].'</span>
            <input type="text" name="orders[S:SUM:EVEN]" />
        </td>
        <td class="choose">
            <font class="choose-name">尾小</font>
            <span class="odds">'.$odds8["h8"].'</span>
            <input type="text" name="orders[S:LAST:UNDER]" />
        </td>
    </tr>
</table>
';

$mysqli->close();