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

$odds1 = odds_sf::getOddsByBall("广东十分彩","四季五行","ball_1");
$odds2 = odds_sf::getOddsByBall("广东十分彩","四季五行","ball_2");
$odds3 = odds_sf::getOddsByBall("广东十分彩","四季五行","ball_3");
$odds4 = odds_sf::getOddsByBall("广东十分彩","四季五行","ball_4");
$odds5 = odds_sf::getOddsByBall("广东十分彩","四季五行","ball_5");
$odds6 = odds_sf::getOddsByBall("广东十分彩","四季五行","ball_6");
$odds7 = odds_sf::getOddsByBall("广东十分彩","四季五行","ball_7");
$odds8 = odds_sf::getOddsByBall("广东十分彩","四季五行","ball_8");

echo '
<div id="locate-box">
    <table class="order-table" tabs-view="1">
        <caption>第一球</caption>
        <tr>
            <td class="choose">
                <span class="num-group">春</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <input type="text" value="'.$odds1["h1"].'" id="seasons-ball_1-h1" />
            </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <input type="text" value="'.$odds1["h5"].'" id="seasons-ball_1-h5" />
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
                <input type="text" value="'.$odds1["h2"].'" id="seasons-ball_1-h2" />
            </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <input type="text" value="'.$odds1["h6"].'" id="seasons-ball_1-h6" />
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
                <input type="text" value="'.$odds1["h3"].'" id="seasons-ball_1-h3" />
            </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <input type="text" value="'.$odds1["h7"].'" id="seasons-ball_1-h7" />
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
                <input type="text" value="'.$odds1["h4"].'" id="seasons-ball_1-h4" />
            </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <input type="text" value="'.$odds1["h8"].'" id="seasons-ball_1-h8" />
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
                <input type="text" value="'.$odds1["h9"].'" id="seasons-ball_1-h9" />
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="2">
        <caption>第二球</caption>
        <tr>
            <td class="choose">
                <span class="num-group">春</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <input type="text" value="'.$odds2["h1"].'" id="seasons-ball_2-h1" />
            </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <input type="text" value="'.$odds2["h5"].'" id="seasons-ball_2-h5" />
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
                <input type="text" value="'.$odds2["h2"].'" id="seasons-ball_2-h2" />
            </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <input type="text" value="'.$odds2["h6"].'" id="seasons-ball_2-h6" />
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
                <input type="text" value="'.$odds2["h3"].'" id="seasons-ball_2-h3" />
            </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <input type="text" value="'.$odds2["h7"].'" id="seasons-ball_2-h7" />
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
                <input type="text" value="'.$odds2["h4"].'" id="seasons-ball_2-h4" />
            </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <input type="text" value="'.$odds2["h8"].'" id="seasons-ball_2-h8" />
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
                <input type="text" value="'.$odds2["h9"].'" id="seasons-ball_2-h9" />
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="3">
        <caption>第三球</caption>
        <tr>
            <td class="choose">
                <span class="num-group">春</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <input type="text" value="'.$odds3["h1"].'" id="seasons-ball_3-h1" />
            </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <input type="text" value="'.$odds3["h5"].'" id="seasons-ball_3-h5" />
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
                <input type="text" value="'.$odds3["h2"].'" id="seasons-ball_3-h2" />
            </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <input type="text" value="'.$odds3["h6"].'" id="seasons-ball_3-h6" />
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
                <input type="text" value="'.$odds3["h3"].'" id="seasons-ball_3-h3" />
            </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <input type="text" value="'.$odds3["h7"].'" id="seasons-ball_3-h7" />
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
                <input type="text" value="'.$odds3["h4"].'" id="seasons-ball_3-h4" />
            </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <input type="text" value="'.$odds3["h8"].'" id="seasons-ball_3-h8" />
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
                <input type="text" value="'.$odds3["h9"].'" id="seasons-ball_3-h9" />
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="4">
        <caption>第四球</caption>
        <tr>
            <td class="choose">
                <span class="num-group">春</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <input type="text" value="'.$odds4["h1"].'" id="seasons-ball_4-h1" />
            </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <input type="text" value="'.$odds4["h5"].'" id="seasons-ball_4-h5" />
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
                <input type="text" value="'.$odds4["h2"].'" id="seasons-ball_4-h2" />
            </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <input type="text" value="'.$odds4["h6"].'" id="seasons-ball_4-h6" />
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
                <input type="text" value="'.$odds4["h3"].'" id="seasons-ball_4-h3" />
            </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <input type="text" value="'.$odds4["h7"].'" id="seasons-ball_4-h7" />
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
                <input type="text" value="'.$odds4["h4"].'" id="seasons-ball_4-h4" />
            </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <input type="text" value="'.$odds4["h8"].'" id="seasons-ball_4-h8" />
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
                <input type="text" value="'.$odds4["h9"].'" id="seasons-ball_4-h9" />
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="5">
        <caption>第五球</caption>
        <tr>
            <td class="choose">
                <span class="num-group">春</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <input type="text" value="'.$odds5["h1"].'" id="seasons-ball_5-h1" />
            </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <input type="text" value="'.$odds5["h5"].'" id="seasons-ball_5-h5" />
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
                <input type="text" value="'.$odds5["h2"].'" id="seasons-ball_5-h2" />
            </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <input type="text" value="'.$odds5["h6"].'" id="seasons-ball_5-h6" />
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
                <input type="text" value="'.$odds5["h3"].'" id="seasons-ball_5-h3" />
            </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <input type="text" value="'.$odds5["h7"].'" id="seasons-ball_5-h7" />
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
                <input type="text" value="'.$odds5["h4"].'" id="seasons-ball_5-h4" />
            </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <input type="text" value="'.$odds5["h8"].'" id="seasons-ball_5-h8" />
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
                <input type="text" value="'.$odds5["h9"].'" id="seasons-ball_5-h9" />
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="6">
        <caption>第六球</caption>
        <tr>
            <td class="choose">
                <span class="num-group">春</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <input type="text" value="'.$odds6["h1"].'" id="seasons-ball_6-h1" />
            </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <input type="text" value="'.$odds6["h5"].'" id="seasons-ball_6-h5" />
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
                <input type="text" value="'.$odds6["h2"].'" id="seasons-ball_6-h2" />
            </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <input type="text" value="'.$odds6["h6"].'" id="seasons-ball_6-h6" />
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
                <input type="text" value="'.$odds6["h3"].'" id="seasons-ball_6-h3" />
            </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <input type="text" value="'.$odds6["h7"].'" id="seasons-ball_6-h7" />
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
                <input type="text" value="'.$odds6["h4"].'" id="seasons-ball_6-h4" />
            </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <input type="text" value="'.$odds6["h8"].'" id="seasons-ball_6-h8" />
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
                <input type="text" value="'.$odds6["h9"].'" id="seasons-ball_6-h9" />
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="7">
        <caption>第七球</caption>
        <tr>
            <td class="choose">
                <span class="num-group">春</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <input type="text" value="'.$odds7["h1"].'" id="seasons-ball_7-h1" />
            </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <input type="text" value="'.$odds7["h5"].'" id="seasons-ball_7-h5" />
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
                <input type="text" value="'.$odds7["h2"].'" id="seasons-ball_7-h2" />
            </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <input type="text" value="'.$odds7["h6"].'" id="seasons-ball_7-h6" />
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
                <input type="text" value="'.$odds7["h3"].'" id="seasons-ball_7-h3" />
            </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <input type="text" value="'.$odds7["h7"].'" id="seasons-ball_7-h7" />
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
                <input type="text" value="'.$odds7["h4"].'" id="seasons-ball_7-h4" />
            </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <input type="text" value="'.$odds7["h8"].'" id="seasons-ball_7-h8" />
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
                <input type="text" value="'.$odds7["h9"].'" id="seasons-ball_7-h9" />
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="S">
        <caption>第八球</caption>
        <tr>
            <td class="choose">
                <span class="num-group">春</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <input type="text" value="'.$odds8["h1"].'" id="seasons-ball_8-h1" />
            </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <input type="text" value="'.$odds8["h5"].'" id="seasons-ball_8-h5" />
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
                <input type="text" value="'.$odds8["h2"].'" id="seasons-ball_8-h2" />
            </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <input type="text" value="'.$odds8["h6"].'" id="seasons-ball_8-h6" />
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
                <input type="text" value="'.$odds8["h3"].'" id="seasons-ball_8-h3" />
            </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <input type="text" value="'.$odds8["h7"].'" id="seasons-ball_8-h7" />
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
                <input type="text" value="'.$odds8["h4"].'" id="seasons-ball_8-h4" />
            </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <input type="text" value="'.$odds8["h8"].'" id="seasons-ball_8-h8" />
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
                <input type="text" value="'.$odds8["h9"].'" id="seasons-ball_8-h9" />
            </td>
        </tr>
    </table>
</div>
';