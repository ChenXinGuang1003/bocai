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
<table class="order-table">
    <tbody>
        <tr>
            <th rowspan="2">冠军</th>
            <td>
                <span class="ball ball-num-1">1</span>
            <input type="text" value="'.$odds1["h1"].'" id="number-ball_1-h1" />  </td>
            <td>
                <span class="ball ball-num-2">2</span>
            <input type="text" value="'.$odds1["h2"].'" id="number-ball_1-h2" />  </td>
            <td>
                <span class="ball ball-num-3">3</span>
            <input type="text" value="'.$odds1["h3"].'" id="number-ball_1-h3" />  </td>
            <td>
                <span class="ball ball-num-4">4</span>
            <input type="text" value="'.$odds1["h4"].'" id="number-ball_1-h4" />  </td>
            <td>
                <span class="ball ball-num-5">5</span>
            <input type="text" value="'.$odds1["h5"].'" id="number-ball_1-h5" />  </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
            <input type="text" value="'.$odds1["h6"].'" id="number-ball_1-h6" />  </td>
            <td>
                <span class="ball ball-num-7">7</span>
            <input type="text" value="'.$odds1["h7"].'" id="number-ball_1-h7" />  </td>
            <td>
                <span class="ball ball-num-8">8</span>
            <input type="text" value="'.$odds1["h8"].'" id="number-ball_1-h8" />  </td>
            <td>
                <span class="ball ball-num-9">9</span>
            <input type="text" value="'.$odds1["h9"].'" id="number-ball_1-h9" />  </td>
            <td>
                <span class="ball ball-num-10">10</span>
            <input type="text" value="'.$odds1["h10"].'" id="number-ball_1-h10" />  </td>
        </tr>
        <tr>
            <th rowspan="2">亚军</th>
            <td>
                <span class="ball ball-num-1">1</span>
            <input type="text" value="'.$odds2["h1"].'" id="number-ball_2-h1" />  </td>
            <td>
                <span class="ball ball-num-2">2</span>
            <input type="text" value="'.$odds2["h2"].'" id="number-ball_2-h2" />  </td>
            <td>
                <span class="ball ball-num-3">3</span>
            <input type="text" value="'.$odds2["h3"].'" id="number-ball_2-h3" />  </td>
            <td>
                <span class="ball ball-num-4">4</span>
            <input type="text" value="'.$odds2["h4"].'" id="number-ball_2-h4" />  </td>
            <td>
                <span class="ball ball-num-5">5</span>
            <input type="text" value="'.$odds2["h5"].'" id="number-ball_2-h5" />  </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
            <input type="text" value="'.$odds2["h6"].'" id="number-ball_2-h6" />  </td>
            <td>
                <span class="ball ball-num-7">7</span>
            <input type="text" value="'.$odds2["h7"].'" id="number-ball_2-h7" />  </td>
            <td>
                <span class="ball ball-num-8">8</span>
            <input type="text" value="'.$odds2["h8"].'" id="number-ball_2-h8" />  </td>
            <td>
                <span class="ball ball-num-9">9</span>
            <input type="text" value="'.$odds2["h9"].'" id="number-ball_2-h9" />  </td>
            <td>
                <span class="ball ball-num-10">10</span>
            <input type="text" value="'.$odds2["h10"].'" id="number-ball_2-h10" />  </td>
        </tr>
        <tr>
            <th rowspan="2">季军</th>
            <td>
                <span class="ball ball-num-1">1</span>
            <input type="text" value="'.$odds3["h1"].'" id="number-ball_3-h1" />  </td>
            <td>
                <span class="ball ball-num-2">2</span>
            <input type="text" value="'.$odds3["h2"].'" id="number-ball_3-h2" />  </td>
            <td>
                <span class="ball ball-num-3">3</span>
            <input type="text" value="'.$odds3["h3"].'" id="number-ball_3-h3" />  </td>
            <td>
                <span class="ball ball-num-4">4</span>
            <input type="text" value="'.$odds3["h4"].'" id="number-ball_3-h4" />  </td>
            <td>
                <span class="ball ball-num-5">5</span>
            <input type="text" value="'.$odds3["h5"].'" id="number-ball_3-h5" />  </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
            <input type="text" value="'.$odds3["h6"].'" id="number-ball_3-h6" />  </td>
            <td>
                <span class="ball ball-num-7">7</span>
            <input type="text" value="'.$odds3["h7"].'" id="number-ball_3-h7" />  </td>
            <td>
                <span class="ball ball-num-8">8</span>
            <input type="text" value="'.$odds3["h8"].'" id="number-ball_3-h8" />  </td>
            <td>
                <span class="ball ball-num-9">9</span>
            <input type="text" value="'.$odds3["h9"].'" id="number-ball_3-h9" />  </td>
            <td>
                <span class="ball ball-num-10">10</span>
            <input type="text" value="'.$odds3["h10"].'" id="number-ball_3-h10" />  </td>
        </tr>
        <tr>
            <th rowspan="2">第四名</th>
            <td>
                <span class="ball ball-num-1">1</span>
            <input type="text" value="'.$odds4["h1"].'" id="number-ball_4-h1" />  </td>
            <td>
                <span class="ball ball-num-2">2</span>
            <input type="text" value="'.$odds4["h2"].'" id="number-ball_4-h2" />  </td>
            <td>
                <span class="ball ball-num-3">3</span>
            <input type="text" value="'.$odds4["h3"].'" id="number-ball_4-h3" />  </td>
            <td>
                <span class="ball ball-num-4">4</span>
            <input type="text" value="'.$odds4["h4"].'" id="number-ball_4-h4" />  </td>
            <td>
                <span class="ball ball-num-5">5</span>
            <input type="text" value="'.$odds4["h5"].'" id="number-ball_4-h5" />  </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
            <input type="text" value="'.$odds4["h6"].'" id="number-ball_4-h6" />  </td>
            <td>
                <span class="ball ball-num-7">7</span>
            <input type="text" value="'.$odds4["h7"].'" id="number-ball_4-h7" />  </td>
            <td>
                <span class="ball ball-num-8">8</span>
            <input type="text" value="'.$odds4["h8"].'" id="number-ball_4-h8" />  </td>
            <td>
                <span class="ball ball-num-9">9</span>
            <input type="text" value="'.$odds4["h9"].'" id="number-ball_4-h9" />  </td>
            <td>
                <span class="ball ball-num-10">10</span>
            <input type="text" value="'.$odds4["h10"].'" id="number-ball_4-h10" />  </td>
        </tr>
        <tr>
            <th rowspan="2">第五名</th>
            <td>
                <span class="ball ball-num-1">1</span>
            <input type="text" value="'.$odds5["h1"].'" id="number-ball_5-h1" />  </td>
            <td>
                <span class="ball ball-num-2">2</span>
            <input type="text" value="'.$odds5["h2"].'" id="number-ball_5-h2" />  </td>
            <td>
                <span class="ball ball-num-3">3</span>
            <input type="text" value="'.$odds5["h3"].'" id="number-ball_5-h3" />  </td>
            <td>
                <span class="ball ball-num-4">4</span>
            <input type="text" value="'.$odds5["h4"].'" id="number-ball_5-h4" />  </td>
            <td>
                <span class="ball ball-num-5">5</span>
            <input type="text" value="'.$odds5["h5"].'" id="number-ball_5-h5" />  </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
            <input type="text" value="'.$odds5["h6"].'" id="number-ball_5-h6" />  </td>
            <td>
                <span class="ball ball-num-7">7</span>
            <input type="text" value="'.$odds5["h7"].'" id="number-ball_5-h7" />  </td>
            <td>
                <span class="ball ball-num-8">8</span>
            <input type="text" value="'.$odds5["h8"].'" id="number-ball_5-h8" />  </td>
            <td>
                <span class="ball ball-num-9">9</span>
            <input type="text" value="'.$odds5["h9"].'" id="number-ball_5-h9" />  </td>
            <td>
                <span class="ball ball-num-10">10</span>
            <input type="text" value="'.$odds5["h10"].'" id="number-ball_5-h10" />  </td>
        </tr>
        <tr>
            <th rowspan="2">第六名</th>
            <td>
                <span class="ball ball-num-1">1</span>
            <input type="text" value="'.$odds6["h1"].'" id="number-ball_6-h1" />  </td>
            <td>
                <span class="ball ball-num-2">2</span>
            <input type="text" value="'.$odds6["h2"].'" id="number-ball_6-h2" />  </td>
            <td>
                <span class="ball ball-num-3">3</span>
            <input type="text" value="'.$odds6["h3"].'" id="number-ball_6-h3" />  </td>
            <td>
                <span class="ball ball-num-4">4</span>
            <input type="text" value="'.$odds6["h4"].'" id="number-ball_6-h4" />  </td>
            <td>
                <span class="ball ball-num-5">5</span>
            <input type="text" value="'.$odds6["h5"].'" id="number-ball_6-h5" />  </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
            <input type="text" value="'.$odds6["h6"].'" id="number-ball_6-h6" />  </td>
            <td>
                <span class="ball ball-num-7">7</span>
            <input type="text" value="'.$odds6["h7"].'" id="number-ball_6-h7" />  </td>
            <td>
                <span class="ball ball-num-8">8</span>
            <input type="text" value="'.$odds6["h8"].'" id="number-ball_6-h8" />  </td>
            <td>
                <span class="ball ball-num-9">9</span>
            <input type="text" value="'.$odds6["h9"].'" id="number-ball_6-h9" />  </td>
            <td>
                <span class="ball ball-num-10">10</span>
            <input type="text" value="'.$odds6["h10"].'" id="number-ball_6-h10" />  </td>
        </tr>
        <tr>
            <th rowspan="2">第七名</th>
            <td>
                <span class="ball ball-num-1">1</span>
            <input type="text" value="'.$odds7["h1"].'" id="number-ball_7-h1" />  </td>
            <td>
                <span class="ball ball-num-2">2</span>
            <input type="text" value="'.$odds7["h2"].'" id="number-ball_7-h2" />  </td>
            <td>
                <span class="ball ball-num-3">3</span>
            <input type="text" value="'.$odds7["h3"].'" id="number-ball_7-h3" />  </td>
            <td>
                <span class="ball ball-num-4">4</span>
            <input type="text" value="'.$odds7["h4"].'" id="number-ball_7-h4" />  </td>
            <td>
                <span class="ball ball-num-5">5</span>
            <input type="text" value="'.$odds7["h5"].'" id="number-ball_7-h5" />  </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
            <input type="text" value="'.$odds7["h6"].'" id="number-ball_7-h6" />  </td>
            <td>
                <span class="ball ball-num-7">7</span>
            <input type="text" value="'.$odds7["h7"].'" id="number-ball_7-h7" />  </td>
            <td>
                <span class="ball ball-num-8">8</span>
            <input type="text" value="'.$odds7["h8"].'" id="number-ball_7-h8" />  </td>
            <td>
                <span class="ball ball-num-9">9</span>
            <input type="text" value="'.$odds7["h9"].'" id="number-ball_7-h9" />  </td>
            <td>
                <span class="ball ball-num-10">10</span>
            <input type="text" value="'.$odds7["h10"].'" id="number-ball_7-h10" />  </td>
        </tr>
        <tr>
            <th rowspan="2">第八名</th>
            <td>
                <span class="ball ball-num-1">1</span>
            <input type="text" value="'.$odds8["h1"].'" id="number-ball_8-h1" />  </td>
            <td>
                <span class="ball ball-num-2">2</span>
            <input type="text" value="'.$odds8["h2"].'" id="number-ball_8-h2" />  </td>
            <td>
                <span class="ball ball-num-3">3</span>
            <input type="text" value="'.$odds8["h3"].'" id="number-ball_8-h3" />  </td>
            <td>
                <span class="ball ball-num-4">4</span>
            <input type="text" value="'.$odds8["h4"].'" id="number-ball_8-h4" />  </td>
            <td>
                <span class="ball ball-num-5">5</span>
            <input type="text" value="'.$odds8["h5"].'" id="number-ball_8-h5" />  </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
            <input type="text" value="'.$odds8["h6"].'" id="number-ball_8-h6" />  </td>
            <td>
                <span class="ball ball-num-7">7</span>
            <input type="text" value="'.$odds8["h7"].'" id="number-ball_8-h7" />  </td>
            <td>
                <span class="ball ball-num-8">8</span>
            <input type="text" value="'.$odds8["h8"].'" id="number-ball_8-h8" />  </td>
            <td>
                <span class="ball ball-num-9">9</span>
            <input type="text" value="'.$odds8["h9"].'" id="number-ball_8-h9" />  </td>
            <td>
                <span class="ball ball-num-10">10</span>
            <input type="text" value="'.$odds8["h10"].'" id="number-ball_8-h10" />  </td>
        </tr>
        <tr>
            <th rowspan="2">第九名</th>
            <td>
                <span class="ball ball-num-1">1</span>
            <input type="text" value="'.$odds9["h1"].'" id="number-ball_9-h1" />  </td>
            <td>
                <span class="ball ball-num-2">2</span>
            <input type="text" value="'.$odds9["h2"].'" id="number-ball_9-h2" />  </td>
            <td>
                <span class="ball ball-num-3">3</span>
            <input type="text" value="'.$odds9["h3"].'" id="number-ball_9-h3" />  </td>
            <td>
                <span class="ball ball-num-4">4</span>
            <input type="text" value="'.$odds9["h4"].'" id="number-ball_9-h4" />  </td>
            <td>
                <span class="ball ball-num-5">5</span>
            <input type="text" value="'.$odds9["h5"].'" id="number-ball_9-h5" />  </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
            <input type="text" value="'.$odds9["h6"].'" id="number-ball_9-h6" />  </td>
            <td>
                <span class="ball ball-num-7">7</span>
            <input type="text" value="'.$odds9["h7"].'" id="number-ball_9-h7" />  </td>
            <td>
                <span class="ball ball-num-8">8</span>
            <input type="text" value="'.$odds9["h8"].'" id="number-ball_9-h8" />  </td>
            <td>
                <span class="ball ball-num-9">9</span>
            <input type="text" value="'.$odds9["h9"].'" id="number-ball_9-h9" />  </td>
            <td>
                <span class="ball ball-num-10">10</span>
            <input type="text" value="'.$odds9["h10"].'" id="number-ball_9-h10" />  </td>
        </tr>
        <tr>
            <th rowspan="2">第十名</th>
            <td>
                <span class="ball ball-num-1">1</span>
            <input type="text" value="'.$odds10["h1"].'" id="number-ball_10-h1" />  </td>
            <td>
                <span class="ball ball-num-2">2</span>
            <input type="text" value="'.$odds10["h2"].'" id="number-ball_10-h2" />  </td>
            <td>
                <span class="ball ball-num-3">3</span>
            <input type="text" value="'.$odds10["h3"].'" id="number-ball_10-h3" />  </td>
            <td>
                <span class="ball ball-num-4">4</span>
            <input type="text" value="'.$odds10["h4"].'" id="number-ball_10-h4" />  </td>
            <td>
                <span class="ball ball-num-5">5</span>
            <input type="text" value="'.$odds10["h5"].'" id="number-ball_10-h5" />  </td>
        </tr>
        <tr>
            <td>
                <span class="ball ball-num-6">6</span>
            <input type="text" value="'.$odds10["h6"].'" id="number-ball_10-h6" />  </td>
            <td>
                <span class="ball ball-num-7">7</span>
            <input type="text" value="'.$odds10["h7"].'" id="number-ball_10-h7" />  </td>
            <td>
                <span class="ball ball-num-8">8</span>
            <input type="text" value="'.$odds10["h8"].'" id="number-ball_10-h8" />  </td>
            <td>
                <span class="ball ball-num-9">9</span>
            <input type="text" value="'.$odds10["h9"].'" id="number-ball_10-h9" />  </td>
            <td>
                <span class="ball ball-num-10">10</span>
            <input type="text" value="'.$odds10["h10"].'" id="number-ball_10-h10" />  </td>
        </tr>
    </tbody>
</table>
';