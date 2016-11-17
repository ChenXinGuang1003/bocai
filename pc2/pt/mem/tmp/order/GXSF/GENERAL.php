<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

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
            <span class="odds">'.$odds5['h1'].'</span>
            <input type="text" name="orders[S:OVER]" />
        </td>

        <th>单</th>
        <td class="choose">
            <span class="odds">'.$odds5['h3'].'</span>
            <input type="text" name="orders[S:ODD]" />
        </td>

        <th>和单</th>
        <td class="choose">
            <span class="odds">'.$odds5['h5'].'</span>
            <input type="text" name="orders[S:SUM:ODD]" />
        </td>

        <th>尾大</th>
        <td class="choose">
            <span class="odds">'.$odds5['h7'].'</span>
            <input type="text" name="orders[S:LAST:OVER]" />
        </td>
    </tr>
    <tr>
        <th>小</th>
        <td class="choose">
            <span class="odds">'.$odds5['h2'].'</span>
            <input type="text" name="orders[S:UNDER]" />
        </td>

        <th>双</th>
        <td class="choose">
            <span class="odds">'.$odds5['h4'].'</span>
            <input type="text" name="orders[S:EVEN]" />
        </td>

        <th>和双</th>
        <td class="choose">
            <span class="odds">'.$odds5['h6'].'</span>
            <input type="text" name="orders[S:SUM:EVEN]" />
        </td>

        <th>尾小</th>
        <td class="choose">
            <span class="odds">'.$odds5['h8'].'</span>
            <input type="text" name="orders[S:LAST:UNDER]" />
        </td>
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
            <span class="odds">'.$odds1['h1'].'</span>
            <input type="text" name="orders[1:OVER]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds2['h1'].'</span>
            <input type="text" name="orders[2:OVER]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds3['h1'].'</span>
            <input type="text" name="orders[3:OVER]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds4['h1'].'</span>
            <input type="text" name="orders[4:OVER]" />
        </td>
    </tr>
    <tr>
        <th>小</th>
        <td class="choose">
            <span class="odds">'.$odds1['h2'].'</span>
            <input type="text" name="orders[1:UNDER]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds2['h2'].'</span>
            <input type="text" name="orders[2:UNDER]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds3['h2'].'</span>
            <input type="text" name="orders[3:UNDER]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds4['h2'].'</span>
            <input type="text" name="orders[4:UNDER]" />
        </td>
    </tr>
    <tr>
        <th>单</th>
        <td class="choose">
            <span class="odds">'.$odds1['h3'].'</span>
            <input type="text" name="orders[1:ODD]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds2['h3'].'</span>
            <input type="text" name="orders[2:ODD]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds3['h3'].'</span>
            <input type="text" name="orders[3:ODD]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds4['h3'].'</span>
            <input type="text" name="orders[4:ODD]" />
        </td>
    </tr>
    <tr>
        <th>双</th>
        <td class="choose">
            <span class="odds">'.$odds1['h4'].'</span>
            <input type="text" name="orders[1:EVEN]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds2['h4'].'</span>
            <input type="text" name="orders[2:EVEN]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds3['h4'].'</span>
            <input type="text" name="orders[3:EVEN]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds4['h4'].'</span>
            <input type="text" name="orders[4:EVEN]" />
        </td>
    </tr>
    <tr>
        <th>和单</th>
        <td class="choose">
            <span class="odds">'.$odds1['h5'].'</span>
            <input type="text" name="orders[1:SUM:ODD]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds2['h5'].'</span>
            <input type="text" name="orders[2:SUM:ODD]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds3['h5'].'</span>
            <input type="text" name="orders[3:SUM:ODD]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds4['h5'].'</span>
            <input type="text" name="orders[4:SUM:ODD]" />
        </td>
    </tr>
    <tr>
        <th>和双</th>
        <td class="choose">
            <span class="odds">'.$odds1['h6'].'</span>
            <input type="text" name="orders[1:SUM:EVEN]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds2['h6'].'</span>
            <input type="text" name="orders[2:SUM:EVEN]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds3['h6'].'</span>
            <input type="text" name="orders[3:SUM:EVEN]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds4['h6'].'</span>
            <input type="text" name="orders[4:SUM:EVEN]" />
        </td>
    </tr>
    <tr>
        <th>尾大</th>
        <td class="choose">
            <span class="odds">'.$odds1['h7'].'</span>
            <input type="text" name="orders[1:LAST:OVER]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds2['h7'].'</span>
            <input type="text" name="orders[2:LAST:OVER]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds3['h7'].'</span>
            <input type="text" name="orders[3:LAST:OVER]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds4['h7'].'</span>
            <input type="text" name="orders[4:LAST:OVER]" />
        </td>
    </tr>
    <tr>
        <th>尾小</th>
        <td class="choose">
            <span class="odds">'.$odds1['h8'].'</span>
            <input type="text" name="orders[1:LAST:UNDER]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds2['h8'].'</span>
            <input type="text" name="orders[2:LAST:UNDER]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds3['h8'].'</span>
            <input type="text" name="orders[3:LAST:UNDER]" />
        </td>
        <td class="choose">
            <span class="odds">'.$odds4['h8'].'</span>
            <input type="text" name="orders[4:LAST:UNDER]" />
        </td>
    </tr>
</table>
';

$mysqli->close();