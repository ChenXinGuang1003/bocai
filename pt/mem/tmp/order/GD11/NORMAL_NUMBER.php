<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

$odds1 = odds_sf::getOddsByBall("广东十一选五","正码和特别号","ball_1");
$odds2 = odds_sf::getOddsByBall("广东十一选五","正码和特别号","ball_2");
$odds3 = odds_sf::getOddsByBall("广东十一选五","正码和特别号","ball_3");
$odds4 = odds_sf::getOddsByBall("广东十一选五","正码和特别号","ball_4");
$odds5 = odds_sf::getOddsByBall("广东十一选五","正码和特别号","ball_5");

echo '
<div class="tabs">
    <ul>
        <li tabs="1"><a>正码一</a></li>
        <li tabs="2"><a>正码二</a></li>
        <li tabs="3"><a>正码三</a></li>
        <li tabs="4"><a>正码四</a></li>
        <li tabs="5"><a>正码五</a></li>
    </ul>
</div>

<div id="locate-box">
    <table class="order-table" tabs-view="1">
        <caption>正码一</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">1</span>
                <span class="odds">'.$odds1["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">2</span>
                <span class="odds">'.$odds1["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">3</span>
                <span class="odds">'.$odds1["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">4</span>
                <span class="odds">'.$odds1["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:1]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">5</span>
                <span class="odds">'.$odds1["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">6</span>
                <span class="odds">'.$odds1["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">7</span>
                <span class="odds">'.$odds1["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">8</span>
                <span class="odds">'.$odds1["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:1]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">9</span>
                <span class="odds">'.$odds1["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>
                <span class="odds">'.$odds1["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:1]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>
                <span class="odds">'.$odds1["h11"].'</span>
                <input type="text" name="orders[11:LOCATE:1]" />
            </td>
            <td class="choose">
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <span class="odds">'.$odds1["h12"].'</span>
                <input type="text" name="orders[1:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">小</font>
                <span class="odds">'.$odds1["h13"].'</span>
                <input type="text" name="orders[1:UNDER]" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <span class="odds">'.$odds1["h14"].'</span>
                <input type="text" name="orders[1:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <span class="odds">'.$odds1["h15"].'</span>
                <input type="text" name="orders[1:EVEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">和单</font>
                <span class="odds">'.$odds1["h16"].'</span>
                <input type="text" name="orders[1:SUM:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <span class="odds">'.$odds1["h17"].'</span>
                <input type="text" name="orders[1:SUM:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <span class="odds">'.$odds1["h18"].'</span>
                <input type="text" name="orders[1:LAST:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <span class="odds">'.$odds1["h19"].'</span>
                <input type="text" name="orders[1:LAST:UNDER]" />
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="2">
        <caption>正码二</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">1</span>
                <span class="odds">'.$odds2["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">2</span>
                <span class="odds">'.$odds2["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">3</span>
                <span class="odds">'.$odds2["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">4</span>
                <span class="odds">'.$odds2["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:2]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">5</span>
                <span class="odds">'.$odds2["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">6</span>
                <span class="odds">'.$odds2["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">7</span>
                <span class="odds">'.$odds2["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">8</span>
                <span class="odds">'.$odds2["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:2]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">9</span>
                <span class="odds">'.$odds2["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>
                <span class="odds">'.$odds2["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:2]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>
                <span class="odds">'.$odds2["h11"].'</span>
                <input type="text" name="orders[11:LOCATE:2]" />
            </td>
            <td class="choose">
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <span class="odds">'.$odds2["h12"].'</span>
                <input type="text" name="orders[2:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">小</font>
                <span class="odds">'.$odds2["h13"].'</span>
                <input type="text" name="orders[2:UNDER]" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <span class="odds">'.$odds2["h14"].'</span>
                <input type="text" name="orders[2:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <span class="odds">'.$odds2["h15"].'</span>
                <input type="text" name="orders[2:EVEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">和单</font>
                <span class="odds">'.$odds2["h16"].'</span>
                <input type="text" name="orders[2:SUM:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <span class="odds">'.$odds2["h17"].'</span>
                <input type="text" name="orders[2:SUM:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <span class="odds">'.$odds2["h18"].'</span>
                <input type="text" name="orders[2:LAST:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <span class="odds">'.$odds2["h19"].'</span>
                <input type="text" name="orders[2:LAST:UNDER]" />
            </td>
        </tr>
    </table>

    <table class="order-table" tabs-view="3">
        <caption>正码三</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">1</span>
                <span class="odds">'.$odds3["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">2</span>
                <span class="odds">'.$odds3["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">3</span>
                <span class="odds">'.$odds3["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">4</span>
                <span class="odds">'.$odds3["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:3]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">5</span>
                <span class="odds">'.$odds3["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">6</span>
                <span class="odds">'.$odds3["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">7</span>
                <span class="odds">'.$odds3["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">8</span>
                <span class="odds">'.$odds3["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:3]" />
            </td>
        </tr>
        <tr>

            <td class="choose">
                <span class="num ball ball-green">9</span>
                <span class="odds">'.$odds3["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>
                <span class="odds">'.$odds3["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:3]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>
                <span class="odds">'.$odds3["h11"].'</span>
                <input type="text" name="orders[11:LOCATE:3]" />
            </td>
            <td class="choose">
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <span class="odds">'.$odds3["h12"].'</span>
                <input type="text" name="orders[3:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">小</font>
                <span class="odds">'.$odds3["h13"].'</span>
                <input type="text" name="orders[3:UNDER]" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <span class="odds">'.$odds3["h14"].'</span>
                <input type="text" name="orders[3:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <span class="odds">'.$odds3["h15"].'</span>
                <input type="text" name="orders[3:EVEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">和单</font>
                <span class="odds">'.$odds3["h16"].'</span>
                <input type="text" name="orders[3:SUM:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <span class="odds">'.$odds3["h17"].'</span>
                <input type="text" name="orders[3:SUM:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <span class="odds">'.$odds3["h18"].'</span>
                <input type="text" name="orders[3:LAST:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <span class="odds">'.$odds3["h19"].'</span>
                <input type="text" name="orders[3:LAST:UNDER]" />
            </td>
        </tr>
    </table>

    <table class="order-table" tabs-view="4">
        <caption>正码四</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">1</span>
                <span class="odds">'.$odds4["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">2</span>
                <span class="odds">'.$odds4["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">3</span>
                <span class="odds">'.$odds4["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">4</span>
                <span class="odds">'.$odds4["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:4]" />
            </td>
        </tr>
        <tr>

            <td class="choose">
                <span class="num ball ball-blue">5</span>
                <span class="odds">'.$odds4["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">6</span>
                <span class="odds">'.$odds4["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">7</span>
                <span class="odds">'.$odds4["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">8</span>
                <span class="odds">'.$odds4["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:4]" />
            </td>
        </tr>
        <tr>

            <td class="choose">
                <span class="num ball ball-green">9</span>
                <span class="odds">'.$odds4["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>
                <span class="odds">'.$odds4["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:4]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>
                <span class="odds">'.$odds4["h11"].'</span>
                <input type="text" name="orders[11:LOCATE:4]" />
            </td>
            <td class="choose">
            </td>
        </tr>
        <tr>

        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <span class="odds">'.$odds4["h12"].'</span>
                <input type="text" name="orders[4:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">小</font>
                <span class="odds">'.$odds4["h13"].'</span>
                <input type="text" name="orders[4:UNDER]" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <span class="odds">'.$odds4["h14"].'</span>
                <input type="text" name="orders[4:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <span class="odds">'.$odds4["h15"].'</span>
                <input type="text" name="orders[4:EVEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">和单</font>
                <span class="odds">'.$odds4["h16"].'</span>
                <input type="text" name="orders[4:SUM:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <span class="odds">'.$odds4["h17"].'</span>
                <input type="text" name="orders[4:SUM:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <span class="odds">'.$odds4["h18"].'</span>
                <input type="text" name="orders[4:LAST:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <span class="odds">'.$odds4["h19"].'</span>
                <input type="text" name="orders[4:LAST:UNDER]" />
            </td>
        </tr>
    </table>

    <table class="order-table" tabs-view="5">
        <caption>正码五</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">1</span>
                <span class="odds">'.$odds5["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">2</span>
                <span class="odds">'.$odds5["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">3</span>
                <span class="odds">'.$odds5["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">4</span>
                <span class="odds">'.$odds5["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:5]" />
            </td>
        </tr>
        <tr>

            <td class="choose">
                <span class="num ball ball-blue">5</span>
                <span class="odds">'.$odds5["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball ball-green">6</span>
                <span class="odds">'.$odds5["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">7</span>
                <span class="odds">'.$odds5["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">8</span>
                <span class="odds">'.$odds5["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:5]" />
            </td>
        </tr>
        <tr>

            <td class="choose">
                <span class="num ball ball-green">9</span>
                <span class="odds">'.$odds5["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>
                <span class="odds">'.$odds5["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:5]" />
            </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>
                <span class="odds">'.$odds5["h11"].'</span>
                <input type="text" name="orders[11:LOCATE:5]" />
            </td>
            <td class="choose">
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                <span class="odds">'.$odds5["h12"].'</span>
                <input type="text" name="orders[5:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">小</font>
                <span class="odds">'.$odds5["h13"].'</span>
                <input type="text" name="orders[5:UNDER]" />
            </td>
            <td class="choose">
                <font class="choose-name">单</font>
                <span class="odds">'.$odds5["h14"].'</span>
                <input type="text" name="orders[5:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">双</font>
                <span class="odds">'.$odds5["h15"].'</span>
                <input type="text" name="orders[5:EVEN]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">和单</font>
                <span class="odds">'.$odds5["h16"].'</span>
                <input type="text" name="orders[5:SUM:ODD]" />
            </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                <span class="odds">'.$odds5["h17"].'</span>
                <input type="text" name="orders[5:SUM:EVEN]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                <span class="odds">'.$odds5["h18"].'</span>
                <input type="text" name="orders[5:LAST:OVER]" />
            </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                <span class="odds">'.$odds5["h19"].'</span>
                <input type="text" name="orders[5:LAST:UNDER]" />
            </td>
        </tr>
    </table>
</div>
';

$mysqli->close();