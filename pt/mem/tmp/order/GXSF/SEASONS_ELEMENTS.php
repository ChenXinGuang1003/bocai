<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

$odds1 = odds_sf::getOddsByBall("广西十分彩","四季五行","ball_1");
$odds2 = odds_sf::getOddsByBall("广西十分彩","四季五行","ball_2");
$odds3 = odds_sf::getOddsByBall("广西十分彩","四季五行","ball_3");
$odds4 = odds_sf::getOddsByBall("广西十分彩","四季五行","ball_4");
$odds5 = odds_sf::getOddsByBall("广西十分彩","四季五行","ball_5");//特别号

echo '
<div class="tabs">
    <ul>
        <li tabs="1"><a>正码一特</a></li>
        <li tabs="2"><a>正码二特</a></li>
        <li tabs="3"><a>正码三特</a></li>
        <li tabs="4"><a>正码四特</a></li>
        <li tabs="S"><a>特别号</a></li>
    </ul>
</div>

<div id="locate-box">
    <table class="order-table" tabs-view="1">
        <caption>正码一特</caption>
        <tr>
            <td class="choose">
                <span class="num-group">春</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <span class="odds">'.$odds1["h1"].'</span>
                <input type="text" name="orders[1:SPRING]" />
            </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds1["h5"].'</span>
                <input type="text" name="orders[1:METAL]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">夏</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
                <span class="odds">'.$odds1["h2"].'</span>
                <input type="text" name="orders[1:SUMMER]" />
            </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <span class="num">21</span>
                <span class="odds">'.$odds1["h6"].'</span>
                <input type="text" name="orders[1:WOOD]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">秋</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <span class="num">15</span>
                <span class="odds">'.$odds1["h3"].'</span>
                <input type="text" name="orders[1:FALL]" />
            </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds1["h7"].'</span>
                <input type="text" name="orders[1:WATER]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">冬</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
                <span class="odds">'.$odds1["h4"].'</span>
                <input type="text" name="orders[1:WINTER]" />
            </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds1["h8"].'</span>
                <input type="text" name="orders[1:FIRE]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <!-- empty -->
            </td>
            <td class="choose">
                <span class="num-group">土</span>
                <span class="num">04</span>
                <span class="num">09</span>
                <span class="num">14</span>
                <span class="num">19</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds1["h9"].'</span>
                <input type="text" name="orders[1:EARTH]" />
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="2">
        <caption>正码二特</caption>
        <tr>
            <td class="choose">
                <span class="num-group">春</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <span class="odds">'.$odds2["h1"].'</span>
                <input type="text" name="orders[2:SPRING]" />
            </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds2["h5"].'</span>
                <input type="text" name="orders[2:METAL]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">夏</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
                <span class="odds">'.$odds2["h2"].'</span>
                <input type="text" name="orders[2:SUMMER]" />
            </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <span class="num">21</span>
                <span class="odds">'.$odds2["h6"].'</span>
                <input type="text" name="orders[2:WOOD]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">秋</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <span class="num">15</span>
                <span class="odds">'.$odds2["h3"].'</span>
                <input type="text" name="orders[2:FALL]" />
            </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds2["h7"].'</span>
                <input type="text" name="orders[2:WATER]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">冬</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
                <span class="odds">'.$odds2["h4"].'</span>
                <input type="text" name="orders[2:WINTER]" />
            </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds2["h8"].'</span>
                <input type="text" name="orders[2:FIRE]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <!-- empty -->
            </td>
            <td class="choose">
                <span class="num-group">土</span>
                <span class="num">04</span>
                <span class="num">09</span>
                <span class="num">14</span>
                <span class="num">19</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds2["h9"].'</span>
                <input type="text" name="orders[2:EARTH]" />
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="3">
        <caption>正码三特</caption>
        <tr>
            <td class="choose">
                <span class="num-group">春</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <span class="odds">'.$odds3["h1"].'</span>
                <input type="text" name="orders[3:SPRING]" />
            </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds3["h5"].'</span>
                <input type="text" name="orders[3:METAL]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">夏</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
                <span class="odds">'.$odds3["h2"].'</span>
                <input type="text" name="orders[3:SUMMER]" />
            </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <span class="num">21</span>
                <span class="odds">'.$odds3["h6"].'</span>
                <input type="text" name="orders[3:WOOD]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">秋</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <span class="num">15</span>
                <span class="odds">'.$odds3["h3"].'</span>
                <input type="text" name="orders[3:FALL]" />
            </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds3["h7"].'</span>
                <input type="text" name="orders[3:WATER]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">冬</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
                <span class="odds">'.$odds3["h4"].'</span>
                <input type="text" name="orders[3:WINTER]" />
            </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds3["h8"].'</span>
                <input type="text" name="orders[3:FIRE]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <!-- empty -->
            </td>
            <td class="choose">
                <span class="num-group">土</span>
                <span class="num">04</span>
                <span class="num">09</span>
                <span class="num">14</span>
                <span class="num">19</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds3["h9"].'</span>
                <input type="text" name="orders[3:EARTH]" />
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="4">
        <caption>正码四特</caption>
        <tr>
            <td class="choose">
                <span class="num-group">春</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <span class="odds">'.$odds4["h1"].'</span>
                <input type="text" name="orders[4:SPRING]" />
            </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds4["h5"].'</span>
                <input type="text" name="orders[4:METAL]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">夏</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
                <span class="odds">'.$odds4["h2"].'</span>
                <input type="text" name="orders[4:SUMMER]" />
            </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <span class="num">21</span>
                <span class="odds">'.$odds4["h6"].'</span>
                <input type="text" name="orders[4:WOOD]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">秋</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <span class="num">15</span>
                <span class="odds">'.$odds4["h3"].'</span>
                <input type="text" name="orders[4:FALL]" />
            </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds4["h7"].'</span>
                <input type="text" name="orders[4:WATER]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">冬</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
                <span class="odds">'.$odds4["h4"].'</span>
                <input type="text" name="orders[4:WINTER]" />
            </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds4["h8"].'</span>
                <input type="text" name="orders[4:FIRE]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <!-- empty -->
            </td>
            <td class="choose">
                <span class="num-group">土</span>
                <span class="num">04</span>
                <span class="num">09</span>
                <span class="num">14</span>
                <span class="num">19</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds4["h9"].'</span>
                <input type="text" name="orders[4:EARTH]" />
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="S">
        <caption>特别号</caption>
        <tr>
            <td class="choose">
                <span class="num-group">春</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <span class="odds">'.$odds5["h1"].'</span>
                <input type="text" name="orders[S:SPRING]" />
            </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds5["h5"].'</span>
                <input type="text" name="orders[S:METAL]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">夏</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
                <span class="odds">'.$odds5["h2"].'</span>
                <input type="text" name="orders[S:SUMMER]" />
            </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <span class="num">21</span>
                <span class="odds">'.$odds5["h6"].'</span>
                <input type="text" name="orders[S:WOOD]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">秋</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <span class="num">15</span>
                <span class="odds">'.$odds5["h3"].'</span>
                <input type="text" name="orders[S:FALL]" />
            </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds5["h7"].'</span>
                <input type="text" name="orders[S:WATER]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">冬</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
                <span class="odds">'.$odds5["h4"].'</span>
                <input type="text" name="orders[S:WINTER]" />
            </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds5["h8"].'</span>
                <input type="text" name="orders[S:FIRE]" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <!-- empty -->
            </td>
            <td class="choose">
                <span class="num-group">土</span>
                <span class="num">04</span>
                <span class="num">09</span>
                <span class="num">14</span>
                <span class="num">19</span>
                <span class="num">&nbsp;</span>
                <span class="odds">'.$odds5["h9"].'</span>
                <input type="text" name="orders[S:EARTH]" />
            </td>
        </tr>
    </table>
</div>
';

$mysqli->close();