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

$odds1 = odds_sf::getOddsByBall("广西十分彩","四季五行","ball_1");
$odds2 = odds_sf::getOddsByBall("广西十分彩","四季五行","ball_2");
$odds3 = odds_sf::getOddsByBall("广西十分彩","四季五行","ball_3");
$odds4 = odds_sf::getOddsByBall("广西十分彩","四季五行","ball_4");
$odds5 = odds_sf::getOddsByBall("广西十分彩","四季五行","ball_5");//特别号

echo '
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
            <input type="text" value="'.$odds1["h1"].'" id="seasons-ball_1-h1" />  </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
            <input type="text" value="'.$odds1["h5"].'" id="seasons-ball_1-h5" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">夏</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
            <input type="text" value="'.$odds1["h2"].'" id="seasons-ball_1-h2" />  </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <span class="num">21</span>
            <input type="text" value="'.$odds1["h6"].'" id="seasons-ball_1-h6" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">秋</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <span class="num">15</span>
            <input type="text" value="'.$odds1["h3"].'" id="seasons-ball_1-h3" />  </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <span class="num">&nbsp;</span>
            <input type="text" value="'.$odds1["h7"].'" id="seasons-ball_1-h7" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">冬</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
            <input type="text" value="'.$odds1["h4"].'" id="seasons-ball_1-h4" />  </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <span class="num">&nbsp;</span>
            <input type="text" value="'.$odds1["h8"].'" id="seasons-ball_1-h8" />  </td>
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
            <input type="text" value="'.$odds1["h9"].'" id="seasons-ball_1-h9" />  </td>
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
            <input type="text" value="'.$odds2["h1"].'" id="seasons-ball_2-h1" />  </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
            <input type="text" value="'.$odds2["h5"].'" id="seasons-ball_2-h5" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">夏</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
            <input type="text" value="'.$odds2["h2"].'" id="seasons-ball_2-h2" />  </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <span class="num">21</span>
            <input type="text" value="'.$odds2["h6"].'" id="seasons-ball_2-h6" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">秋</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <span class="num">15</span>
            <input type="text" value="'.$odds2["h3"].'" id="seasons-ball_2-h3" />  </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <span class="num">&nbsp;</span>
            <input type="text" value="'.$odds2["h7"].'" id="seasons-ball_2-h7" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">冬</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
            <input type="text" value="'.$odds2["h4"].'" id="seasons-ball_2-h4" />  </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <span class="num">&nbsp;</span>
            <input type="text" value="'.$odds2["h8"].'" id="seasons-ball_2-h8" />  </td>
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
            <input type="text" value="'.$odds2["h9"].'" id="seasons-ball_2-h9" />  </td>
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
            <input type="text" value="'.$odds3["h1"].'" id="seasons-ball_3-h1" />  </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
            <input type="text" value="'.$odds3["h5"].'" id="seasons-ball_3-h5" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">夏</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
            <input type="text" value="'.$odds3["h2"].'" id="seasons-ball_3-h2" />  </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <span class="num">21</span>
            <input type="text" value="'.$odds3["h6"].'" id="seasons-ball_3-h6" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">秋</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <span class="num">15</span>
            <input type="text" value="'.$odds3["h3"].'" id="seasons-ball_3-h3" />  </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <span class="num">&nbsp;</span>
            <input type="text" value="'.$odds3["h7"].'" id="seasons-ball_3-h7" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">冬</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
            <input type="text" value="'.$odds3["h4"].'" id="seasons-ball_3-h4" />  </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <span class="num">&nbsp;</span>
            <input type="text" value="'.$odds3["h8"].'" id="seasons-ball_3-h8" />  </td>
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
            <input type="text" value="'.$odds3["h9"].'" id="seasons-ball_3-h9" />  </td>
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
            <input type="text" value="'.$odds4["h1"].'" id="seasons-ball_4-h1" />  </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
            <input type="text" value="'.$odds4["h5"].'" id="seasons-ball_4-h5" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">夏</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
            <input type="text" value="'.$odds4["h2"].'" id="seasons-ball_4-h2" />  </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <span class="num">21</span>
            <input type="text" value="'.$odds4["h6"].'" id="seasons-ball_4-h6" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">秋</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <span class="num">15</span>
            <input type="text" value="'.$odds4["h3"].'" id="seasons-ball_4-h3" />  </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <span class="num">&nbsp;</span>
            <input type="text" value="'.$odds4["h7"].'" id="seasons-ball_4-h7" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">冬</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
            <input type="text" value="'.$odds4["h4"].'" id="seasons-ball_4-h4" />  </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <span class="num">&nbsp;</span>
            <input type="text" value="'.$odds4["h8"].'" id="seasons-ball_4-h8" />  </td>
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
            <input type="text" value="'.$odds4["h9"].'" id="seasons-ball_4-h9" />  </td>
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
            <input type="text" value="'.$odds5["h1"].'" id="seasons-ball_5-h1" />  </td>
            <td class="choose">
                <span class="num-group">金</span>
                <span class="num">05</span>
                <span class="num">10</span>
                <span class="num">15</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
            <input type="text" value="'.$odds5["h5"].'" id="seasons-ball_5-h5" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">夏</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
            <input type="text" value="'.$odds5["h2"].'" id="seasons-ball_5-h2" />  </td>
            <td class="choose">
                <span class="num-group">木</span>
                <span class="num">01</span>
                <span class="num">06</span>
                <span class="num">11</span>
                <span class="num">16</span>
                <span class="num">21</span>
            <input type="text" value="'.$odds5["h6"].'" id="seasons-ball_5-h6" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">秋</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <span class="num">15</span>
            <input type="text" value="'.$odds5["h3"].'" id="seasons-ball_5-h3" />  </td>
            <td class="choose">
                <span class="num-group">水</span>
                <span class="num">02</span>
                <span class="num">07</span>
                <span class="num">12</span>
                <span class="num">17</span>
                <span class="num">&nbsp;</span>
            <input type="text" value="'.$odds5["h7"].'" id="seasons-ball_5-h7" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">冬</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
            <input type="text" value="'.$odds5["h4"].'" id="seasons-ball_5-h4" />  </td>
            <td class="choose">
                <span class="num-group">火</span>
                <span class="num">03</span>
                <span class="num">08</span>
                <span class="num">13</span>
                <span class="num">18</span>
                <span class="num">&nbsp;</span>
            <input type="text" value="'.$odds5["h8"].'" id="seasons-ball_5-h8" />  </td>
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
            <input type="text" value="'.$odds5["h9"].'" id="seasons-ball_5-h9" />  </td>
        </tr>
    </table>
</div>
';