<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

$odds1 = odds_sf::getOddsByBall("北京PK拾","定位","ball_1");
$odds2 = odds_sf::getOddsByBall("北京PK拾","定位","ball_2");
$odds3 = odds_sf::getOddsByBall("北京PK拾","定位","ball_3");
$odds4 = odds_sf::getOddsByBall("北京PK拾","定位","ball_4");
$odds5 = odds_sf::getOddsByBall("北京PK拾","定位","ball_5");
$odds6 = odds_sf::getOddsByBall("北京PK拾","定位","ball_6");
$odds7 = odds_sf::getOddsByBall("北京PK拾","定位","ball_7");
$odds8 = odds_sf::getOddsByBall("北京PK拾","定位","ball_8");
$odds9 = odds_sf::getOddsByBall("北京PK拾","定位","ball_9");
$odds10 = odds_sf::getOddsByBall("北京PK拾","定位","ball_10");

echo '
<h3>定位</h3>
<table class="order-table" style="margin-left: 0;">
    <tbody>
        <tr>
            <th rowspan="2">冠军</th>
            <td>
                <span class="ball ball-num-1">1</span>
                <span class="odds">'.$odds1["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:1]" />
            </td>
            <td>
                <span class="ball ball-num-2">2</span>
                <span class="odds">'.$odds1["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:1]" />
            </td>
            <td>
                <span class="ball ball-num-3">3</span>
                <span class="odds">'.$odds1["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:1]" />
            </td>
            <td>
                <span class="ball ball-num-4">4</span>
                <span class="odds">'.$odds1["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:1]" />
            </td>
            <td>
                <span class="ball ball-num-5">5</span>
                <span class="odds">'.$odds1["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:1]" />
            </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
                <span class="odds">'.$odds1["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:1]" />
            </td>
            <td>
                <span class="ball ball-num-7">7</span>
                <span class="odds">'.$odds1["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:1]" />
            </td>
            <td>
                <span class="ball ball-num-8">8</span>
                <span class="odds">'.$odds1["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:1]" />
            </td>
            <td>
                <span class="ball ball-num-9">9</span>
                <span class="odds">'.$odds1["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:1]" />
            </td>
            <td>
                <span class="ball ball-num-10">10</span>
                <span class="odds">'.$odds1["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:1]" />
            </td>
        </tr>
        <tr>
            <th rowspan="2">亚军</th>
            <td>
                <span class="ball ball-num-1">1</span>
                <span class="odds">'.$odds2["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:2]" />
            </td>
            <td>
                <span class="ball ball-num-2">2</span>
                <span class="odds">'.$odds2["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:2]" />
            </td>
            <td>
                <span class="ball ball-num-3">3</span>
                <span class="odds">'.$odds2["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:2]" />
            </td>
            <td>
                <span class="ball ball-num-4">4</span>
                <span class="odds">'.$odds2["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:2]" />
            </td>
            <td>
                <span class="ball ball-num-5">5</span>
                <span class="odds">'.$odds2["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:2]" />
            </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
                <span class="odds">'.$odds2["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:2]" />
            </td>
            <td>
                <span class="ball ball-num-7">7</span>
                <span class="odds">'.$odds2["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:2]" />
            </td>
            <td>
                <span class="ball ball-num-8">8</span>
                <span class="odds">'.$odds2["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:2]" />
            </td>
            <td>
                <span class="ball ball-num-9">9</span>
                <span class="odds">'.$odds2["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:2]" />
            </td>
            <td>
                <span class="ball ball-num-10">10</span>
                <span class="odds">'.$odds2["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:2]" />
            </td>
        </tr>
        <tr>
            <th rowspan="2">季军</th>
            <td>
                <span class="ball ball-num-1">1</span>
                <span class="odds">'.$odds3["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:3]" />
            </td>
            <td>
                <span class="ball ball-num-2">2</span>
                <span class="odds">'.$odds3["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:3]" />
            </td>
            <td>
                <span class="ball ball-num-3">3</span>
                <span class="odds">'.$odds3["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:3]" />
            </td>
            <td>
                <span class="ball ball-num-4">4</span>
                <span class="odds">'.$odds3["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:3]" />
            </td>
            <td>
                <span class="ball ball-num-5">5</span>
                <span class="odds">'.$odds3["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:3]" />
            </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
                <span class="odds">'.$odds3["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:3]" />
            </td>
            <td>
                <span class="ball ball-num-7">7</span>
                <span class="odds">'.$odds3["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:3]" />
            </td>
            <td>
                <span class="ball ball-num-8">8</span>
                <span class="odds">'.$odds3["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:3]" />
            </td>
            <td>
                <span class="ball ball-num-9">9</span>
                <span class="odds">'.$odds3["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:3]" />
            </td>
            <td>
                <span class="ball ball-num-10">10</span>
                <span class="odds">'.$odds3["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:3]" />
            </td>
        </tr>
        <tr>
            <th rowspan="2">第四名</th>
            <td>
                <span class="ball ball-num-1">1</span>
                <span class="odds">'.$odds4["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:4]" />
            </td>
            <td>
                <span class="ball ball-num-2">2</span>
                <span class="odds">'.$odds4["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:4]" />
            </td>
            <td>
                <span class="ball ball-num-3">3</span>
                <span class="odds">'.$odds4["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:4]" />
            </td>
            <td>
                <span class="ball ball-num-4">4</span>
                <span class="odds">'.$odds4["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:4]" />
            </td>
            <td>
                <span class="ball ball-num-5">5</span>
                <span class="odds">'.$odds4["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:4]" />
            </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
                <span class="odds">'.$odds4["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:4]" />
            </td>
            <td>
                <span class="ball ball-num-7">7</span>
                <span class="odds">'.$odds4["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:4]" />
            </td>
            <td>
                <span class="ball ball-num-8">8</span>
                <span class="odds">'.$odds4["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:4]" />
            </td>
            <td>
                <span class="ball ball-num-9">9</span>
                <span class="odds">'.$odds4["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:4]" />
            </td>
            <td>
                <span class="ball ball-num-10">10</span>
                <span class="odds">'.$odds4["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:4]" />
            </td>
        </tr>
        <tr>
            <th rowspan="2">第五名</th>
            <td>
                <span class="ball ball-num-1">1</span>
                <span class="odds">'.$odds5["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:5]" />
            </td>
            <td>
                <span class="ball ball-num-2">2</span>
                <span class="odds">'.$odds5["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:5]" />
            </td>
            <td>
                <span class="ball ball-num-3">3</span>
                <span class="odds">'.$odds5["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:5]" />
            </td>
            <td>
                <span class="ball ball-num-4">4</span>
                <span class="odds">'.$odds5["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:5]" />
            </td>
            <td>
                <span class="ball ball-num-5">5</span>
                <span class="odds">'.$odds5["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:5]" />
            </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
                <span class="odds">'.$odds5["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:5]" />
            </td>
            <td>
                <span class="ball ball-num-7">7</span>
                <span class="odds">'.$odds5["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:5]" />
            </td>
            <td>
                <span class="ball ball-num-8">8</span>
                <span class="odds">'.$odds5["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:5]" />
            </td>
            <td>
                <span class="ball ball-num-9">9</span>
                <span class="odds">'.$odds5["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:5]" />
            </td>
            <td>
                <span class="ball ball-num-10">10</span>
                <span class="odds">'.$odds5["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:5]" />
            </td>
        </tr>
        <tr>
            <th rowspan="2">第六名</th>
            <td>
                <span class="ball ball-num-1">1</span>
                <span class="odds">'.$odds6["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:6]" />
            </td>
            <td>
                <span class="ball ball-num-2">2</span>
                <span class="odds">'.$odds6["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:6]" />
            </td>
            <td>
                <span class="ball ball-num-3">3</span>
                <span class="odds">'.$odds6["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:6]" />
            </td>
            <td>
                <span class="ball ball-num-4">4</span>
                <span class="odds">'.$odds6["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:6]" />
            </td>
            <td>
                <span class="ball ball-num-5">5</span>
                <span class="odds">'.$odds6["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:6]" />
            </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
                <span class="odds">'.$odds6["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:6]" />
            </td>
            <td>
                <span class="ball ball-num-7">7</span>
                <span class="odds">'.$odds6["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:6]" />
            </td>
            <td>
                <span class="ball ball-num-8">8</span>
                <span class="odds">'.$odds6["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:6]" />
            </td>
            <td>
                <span class="ball ball-num-9">9</span>
                <span class="odds">'.$odds6["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:6]" />
            </td>
            <td>
                <span class="ball ball-num-10">10</span>
                <span class="odds">'.$odds6["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:6]" />
            </td>
        </tr>
        <tr>
            <th rowspan="2">第七名</th>
            <td>
                <span class="ball ball-num-1">1</span>
                <span class="odds">'.$odds7["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:7]" />
            </td>
            <td>
                <span class="ball ball-num-2">2</span>
                <span class="odds">'.$odds7["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:7]" />
            </td>
            <td>
                <span class="ball ball-num-3">3</span>
                <span class="odds">'.$odds7["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:7]" />
            </td>
            <td>
                <span class="ball ball-num-4">4</span>
                <span class="odds">'.$odds7["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:7]" />
            </td>
            <td>
                <span class="ball ball-num-5">5</span>
                <span class="odds">'.$odds7["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:7]" />
            </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
                <span class="odds">'.$odds7["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:7]" />
            </td>
            <td>
                <span class="ball ball-num-7">7</span>
                <span class="odds">'.$odds7["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:7]" />
            </td>
            <td>
                <span class="ball ball-num-8">8</span>
                <span class="odds">'.$odds7["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:7]" />
            </td>
            <td>
                <span class="ball ball-num-9">9</span>
                <span class="odds">'.$odds7["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:7]" />
            </td>
            <td>
                <span class="ball ball-num-10">10</span>
                <span class="odds">'.$odds7["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:7]" />
            </td>
        </tr>
        <tr>
            <th rowspan="2">第八名</th>
            <td>
                <span class="ball ball-num-1">1</span>
                <span class="odds">'.$odds8["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:8]" />
            </td>
            <td>
                <span class="ball ball-num-2">2</span>
                <span class="odds">'.$odds8["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:8]" />
            </td>
            <td>
                <span class="ball ball-num-3">3</span>
                <span class="odds">'.$odds8["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:8]" />
            </td>
            <td>
                <span class="ball ball-num-4">4</span>
                <span class="odds">'.$odds8["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:8]" />
            </td>
            <td>
                <span class="ball ball-num-5">5</span>
                <span class="odds">'.$odds8["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:8]" />
            </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
                <span class="odds">'.$odds8["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:8]" />
            </td>
            <td>
                <span class="ball ball-num-7">7</span>
                <span class="odds">'.$odds8["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:8]" />
            </td>
            <td>
                <span class="ball ball-num-8">8</span>
                <span class="odds">'.$odds8["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:8]" />
            </td>
            <td>
                <span class="ball ball-num-9">9</span>
                <span class="odds">'.$odds8["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:8]" />
            </td>
            <td>
                <span class="ball ball-num-10">10</span>
                <span class="odds">'.$odds8["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:8]" />
            </td>
        </tr>
        <tr>
            <th rowspan="2">第九名</th>
            <td>
                <span class="ball ball-num-1">1</span>
                <span class="odds">'.$odds9["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:9]" />
            </td>
            <td>
                <span class="ball ball-num-2">2</span>
                <span class="odds">'.$odds9["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:9]" />
            </td>
            <td>
                <span class="ball ball-num-3">3</span>
                <span class="odds">'.$odds9["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:9]" />
            </td>
            <td>
                <span class="ball ball-num-4">4</span>
                <span class="odds">'.$odds9["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:9]" />
            </td>
            <td>
                <span class="ball ball-num-5">5</span>
                <span class="odds">'.$odds9["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:9]" />
            </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
                <span class="odds">'.$odds9["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:9]" />
            </td>
            <td>
                <span class="ball ball-num-7">7</span>
                <span class="odds">'.$odds9["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:9]" />
            </td>
            <td>
                <span class="ball ball-num-8">8</span>
                <span class="odds">'.$odds9["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:9]" />
            </td>
            <td>
                <span class="ball ball-num-9">9</span>
                <span class="odds">'.$odds9["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:9]" />
            </td>
            <td>
                <span class="ball ball-num-10">10</span>
                <span class="odds">'.$odds9["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:9]" />
            </td>
        </tr>
        <tr>
            <th rowspan="2">第十名</th>
            <td>
                <span class="ball ball-num-1">1</span>
                <span class="odds">'.$odds10["h1"].'</span>
                <input type="text" name="orders[1:LOCATE:10]" />
            </td>
            <td>
                <span class="ball ball-num-2">2</span>
                <span class="odds">'.$odds10["h2"].'</span>
                <input type="text" name="orders[2:LOCATE:10]" />
            </td>
            <td>
                <span class="ball ball-num-3">3</span>
                <span class="odds">'.$odds10["h3"].'</span>
                <input type="text" name="orders[3:LOCATE:10]" />
            </td>
            <td>
                <span class="ball ball-num-4">4</span>
                <span class="odds">'.$odds10["h4"].'</span>
                <input type="text" name="orders[4:LOCATE:10]" />
            </td>
            <td>
                <span class="ball ball-num-5">5</span>
                <span class="odds">'.$odds10["h5"].'</span>
                <input type="text" name="orders[5:LOCATE:10]" />
            </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
                <span class="odds">'.$odds10["h6"].'</span>
                <input type="text" name="orders[6:LOCATE:10]" />
            </td>
            <td>
                <span class="ball ball-num-7">7</span>
                <span class="odds">'.$odds10["h7"].'</span>
                <input type="text" name="orders[7:LOCATE:10]" />
            </td>
            <td>
                <span class="ball ball-num-8">8</span>
                <span class="odds">'.$odds10["h8"].'</span>
                <input type="text" name="orders[8:LOCATE:10]" />
            </td>
            <td>
                <span class="ball ball-num-9">9</span>
                <span class="odds">'.$odds10["h9"].'</span>
                <input type="text" name="orders[9:LOCATE:10]" />
            </td>
            <td>
                <span class="ball ball-num-10">10</span>
                <span class="odds">'.$odds10["h10"].'</span>
                <input type="text" name="orders[10:LOCATE:10]" />
            </td>
        </tr>
    </tbody>
</table>
';

$mysqli->close();