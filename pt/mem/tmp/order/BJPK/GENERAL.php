<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

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
<table class="order-table" style="margin-left: 0;">
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
                <span class="odds">'.$odds1["h1"].'</span>
                <input type="text" name="orders[1:OVER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds1["h2"].'</span>
                <input type="text" name="orders[1:UNDER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds1["h3"].'</span>
                <input type="text" name="orders[1:ODD]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds1["h4"].'</span>
                <input type="text" name="orders[1:EVEN]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds1["h5"].'</span>
                <input type="text" name="orders[1:10:DRAGON]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds1["h6"].'</span>
                <input type="text" name="orders[1:10:TIGER]" />
            </td>
        </tr>
        <tr>
            <td>亚军</td>
            <td class="choose">
                <span class="odds">'.$odds2["h1"].'</span>
                <input type="text" name="orders[2:OVER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds2["h2"].'</span>
                <input type="text" name="orders[2:UNDER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds2["h3"].'</span>
                <input type="text" name="orders[2:ODD]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds2["h4"].'</span>
                <input type="text" name="orders[2:EVEN]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds2["h5"].'</span>
                <input type="text" name="orders[2:9:DRAGON]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds2["h6"].'</span>
                <input type="text" name="orders[2:9:TIGER]" />
            </td>
        </tr>
        <tr>
            <td>季军</td>
            <td class="choose">
                <span class="odds">'.$odds3["h1"].'</span>
                <input type="text" name="orders[3:OVER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds3["h2"].'</span>
                <input type="text" name="orders[3:UNDER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds3["h3"].'</span>
                <input type="text" name="orders[3:ODD]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds3["h4"].'</span>
                <input type="text" name="orders[3:EVEN]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds3["h5"].'</span>
                <input type="text" name="orders[3:8:DRAGON]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds3["h6"].'</span>
                <input type="text" name="orders[3:8:TIGER]" />
            </td>
        </tr>
        <tr>
            <td>第四名</td>
            <td class="choose">
                <span class="odds">'.$odds4["h1"].'</span>
                <input type="text" name="orders[4:OVER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds4["h2"].'</span>
                <input type="text" name="orders[4:UNDER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds4["h3"].'</span>
                <input type="text" name="orders[4:ODD]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds4["h4"].'</span>
                <input type="text" name="orders[4:EVEN]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds4["h5"].'</span>
                <input type="text" name="orders[4:7:DRAGON]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds4["h6"].'</span>
                <input type="text" name="orders[4:7:TIGER]" />
            </td>
        </tr>
        <tr>
            <td>第五名</td>
            <td class="choose">
                <span class="odds">'.$odds5["h1"].'</span>
                <input type="text" name="orders[5:OVER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds5["h2"].'</span>
                <input type="text" name="orders[5:UNDER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds5["h3"].'</span>
                <input type="text" name="orders[5:ODD]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds5["h4"].'</span>
                <input type="text" name="orders[5:EVEN]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds5["h5"].'</span>
                <input type="text" name="orders[5:6:DRAGON]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds5["h6"].'</span>
                <input type="text" name="orders[5:6:TIGER]" />
            </td>
        </tr>
        <tr>
            <td>第六名</td>
            <td class="choose">
                <span class="odds">'.$odds6["h1"].'</span>
                <input type="text" name="orders[6:OVER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds6["h2"].'</span>
                <input type="text" name="orders[6:UNDER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds6["h3"].'</span>
                <input type="text" name="orders[6:ODD]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds6["h4"].'</span>
                <input type="text" name="orders[6:EVEN]" />
            </td>
            <td colspan="2" rowspan="5"></td>
        </tr>
        <tr>
            <td>第七名</td>
            <td class="choose">
                <span class="odds">'.$odds7["h1"].'</span>
                <input type="text" name="orders[7:OVER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds7["h2"].'</span>
                <input type="text" name="orders[7:UNDER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds7["h3"].'</span>
                <input type="text" name="orders[7:ODD]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds7["h4"].'</span>
                <input type="text" name="orders[7:EVEN]" />
            </td>
        </tr>
        <tr>
            <td>第八名</td>
            <td class="choose">
                <span class="odds">'.$odds8["h1"].'</span>
                <input type="text" name="orders[8:OVER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds8["h2"].'</span>
                <input type="text" name="orders[8:UNDER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds8["h3"].'</span>
                <input type="text" name="orders[8:ODD]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds8["h4"].'</span>
                <input type="text" name="orders[8:EVEN]" />
            </td>
        </tr>
        <tr>
            <td>第九名</td>
            <td class="choose">
                <span class="odds">'.$odds9["h1"].'</span>
                <input type="text" name="orders[9:OVER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds9["h2"].'</span>
                <input type="text" name="orders[9:UNDER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds9["h3"].'</span>
                <input type="text" name="orders[9:ODD]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds9["h4"].'</span>
                <input type="text" name="orders[9:EVEN]" />
            </td>
        </tr>
        <tr>
            <td>第十名</td>
            <td class="choose">
                <span class="odds">'.$odds10["h1"].'</span>
                <input type="text" name="orders[10:OVER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds10["h2"].'</span>
                <input type="text" name="orders[10:UNDER]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds10["h3"].'</span>
                <input type="text" name="orders[10:ODD]" />
            </td>
            <td class="choose">
                <span class="odds">'.$odds10["h4"].'</span>
                <input type="text" name="orders[10:EVEN]" />
            </td>
        </tr>
    </tbody>
</table>
';

$mysqli->close();