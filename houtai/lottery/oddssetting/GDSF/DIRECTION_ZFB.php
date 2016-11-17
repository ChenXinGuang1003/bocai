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

$odds1 = odds_sf::getOddsByBall("广东十分彩","方位中发白","ball_1");
$odds2 = odds_sf::getOddsByBall("广东十分彩","方位中发白","ball_2");
$odds3 = odds_sf::getOddsByBall("广东十分彩","方位中发白","ball_3");
$odds4 = odds_sf::getOddsByBall("广东十分彩","方位中发白","ball_4");
$odds5 = odds_sf::getOddsByBall("广东十分彩","方位中发白","ball_5");
$odds6 = odds_sf::getOddsByBall("广东十分彩","方位中发白","ball_6");
$odds7 = odds_sf::getOddsByBall("广东十分彩","方位中发白","ball_7");
$odds8 = odds_sf::getOddsByBall("广东十分彩","方位中发白","ball_8");

echo '
<div id="locate-box">
    <table class="order-table" tabs-view="1">
        <caption>第一球</caption>
        <tr>
            <td class="choose">
                <span class="num-group">东</span>
                <span class="num">01</span>
                <span class="num">05</span>
                <span class="num">09</span>
                <span class="num">13</span>
                <span class="num">17</span>
                <input type="text" value="'.$odds1["h1"].'" id="zfb-ball_1-h1" />
            </td>
            <td class="choose">
                <span class="num-group">中</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <input type="text" value="'.$odds1["h5"].'" id="zfb-ball_1-h5" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">南</span>
                <span class="num">02</span>
                <span class="num">06</span>
                <span class="num">10</span>
                <span class="num">14</span>
                <span class="num">18</span>
                <input type="text" value="'.$odds1["h2"].'" id="zfb-ball_1-h2" />
            </td>
            <td class="choose">
                <span class="num-group">发</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <input type="text" value="'.$odds1["h6"].'" id="zfb-ball_1-h6" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">西</span>
                <span class="num">03</span>
                <span class="num">07</span>
                <span class="num">11</span>
                <span class="num">15</span>
                <span class="num">19</span>
                <input type="text" value="'.$odds1["h3"].'" id="zfb-ball_1-h3" />
            </td>
            <td class="choose">
                <span class="num-group">白</span>
                <span class="num">15</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
                <input type="text" value="'.$odds1["h7"].'" id="zfb-ball_1-h7" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">北</span>
                <span class="num">04</span>
                <span class="num">08</span>
                <span class="num">12</span>
                <span class="num">16</span>
                <span class="num">20</span>
                <input type="text" value="'.$odds1["h4"].'" id="zfb-ball_1-h4" />
            </td>
            <td class="choose">
                <!-- empty -->
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="2">
        <caption>第二球</caption>
        <tr>
            <td class="choose">
                <span class="num-group">东</span>
                <span class="num">01</span>
                <span class="num">05</span>
                <span class="num">09</span>
                <span class="num">13</span>
                <span class="num">17</span>
                <input type="text" value="'.$odds2["h1"].'" id="zfb-ball_2-h1" />
            </td>
            <td class="choose">
                <span class="num-group">中</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <input type="text" value="'.$odds2["h5"].'" id="zfb-ball_2-h5" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">南</span>
                <span class="num">02</span>
                <span class="num">06</span>
                <span class="num">10</span>
                <span class="num">14</span>
                <span class="num">18</span>
                <input type="text" value="'.$odds2["h2"].'" id="zfb-ball_2-h2" />
            </td>
            <td class="choose">
                <span class="num-group">发</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <input type="text" value="'.$odds2["h6"].'" id="zfb-ball_2-h6" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">西</span>
                <span class="num">03</span>
                <span class="num">07</span>
                <span class="num">11</span>
                <span class="num">15</span>
                <span class="num">19</span>
                <input type="text" value="'.$odds2["h3"].'" id="zfb-ball_2-h3" />
            </td>
            <td class="choose">
                <span class="num-group">白</span>
                <span class="num">15</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
                <input type="text" value="'.$odds2["h7"].'" id="zfb-ball_2-h7" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">北</span>
                <span class="num">04</span>
                <span class="num">08</span>
                <span class="num">12</span>
                <span class="num">16</span>
                <span class="num">20</span>
                <input type="text" value="'.$odds2["h4"].'" id="zfb-ball_2-h4" />
            </td>
            <td class="choose">
                <!-- empty -->
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="3">
        <caption>第三球</caption>
        <tr>
            <td class="choose">
                <span class="num-group">东</span>
                <span class="num">01</span>
                <span class="num">05</span>
                <span class="num">09</span>
                <span class="num">13</span>
                <span class="num">17</span>
                <input type="text" value="'.$odds3["h1"].'" id="zfb-ball_3-h1" />
            </td>
            <td class="choose">
                <span class="num-group">中</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <input type="text" value="'.$odds3["h5"].'" id="zfb-ball_3-h5" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">南</span>
                <span class="num">02</span>
                <span class="num">06</span>
                <span class="num">10</span>
                <span class="num">14</span>
                <span class="num">18</span>
                <input type="text" value="'.$odds3["h2"].'" id="zfb-ball_3-h2" />
            </td>
            <td class="choose">
                <span class="num-group">发</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <input type="text" value="'.$odds3["h6"].'" id="zfb-ball_3-h6" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">西</span>
                <span class="num">03</span>
                <span class="num">07</span>
                <span class="num">11</span>
                <span class="num">15</span>
                <span class="num">19</span>
                <input type="text" value="'.$odds3["h3"].'" id="zfb-ball_3-h3" />
            </td>
            <td class="choose">
                <span class="num-group">白</span>
                <span class="num">15</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
                <input type="text" value="'.$odds3["h7"].'" id="zfb-ball_3-h7" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">北</span>
                <span class="num">04</span>
                <span class="num">08</span>
                <span class="num">12</span>
                <span class="num">16</span>
                <span class="num">20</span>
                <input type="text" value="'.$odds3["h4"].'" id="zfb-ball_3-h4" />
            </td>
            <td class="choose">
                <!-- empty -->
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="4">
        <caption>第四球</caption>
        <tr>
            <td class="choose">
                <span class="num-group">东</span>
                <span class="num">01</span>
                <span class="num">05</span>
                <span class="num">09</span>
                <span class="num">13</span>
                <span class="num">17</span>
                <input type="text" value="'.$odds4["h1"].'" id="zfb-ball_4-h1" />
            </td>
            <td class="choose">
                <span class="num-group">中</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <input type="text" value="'.$odds4["h5"].'" id="zfb-ball_4-h5" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">南</span>
                <span class="num">02</span>
                <span class="num">06</span>
                <span class="num">10</span>
                <span class="num">14</span>
                <span class="num">18</span>
                <input type="text" value="'.$odds4["h2"].'" id="zfb-ball_4-h2" />
            </td>
            <td class="choose">
                <span class="num-group">发</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <input type="text" value="'.$odds4["h6"].'" id="zfb-ball_4-h6" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">西</span>
                <span class="num">03</span>
                <span class="num">07</span>
                <span class="num">11</span>
                <span class="num">15</span>
                <span class="num">19</span>
                <input type="text" value="'.$odds4["h3"].'" id="zfb-ball_4-h3" />
            </td>
            <td class="choose">
                <span class="num-group">白</span>
                <span class="num">15</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
                <input type="text" value="'.$odds4["h7"].'" id="zfb-ball_4-h7" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">北</span>
                <span class="num">04</span>
                <span class="num">08</span>
                <span class="num">12</span>
                <span class="num">16</span>
                <span class="num">20</span>
                <input type="text" value="'.$odds4["h4"].'" id="zfb-ball_4-h4" />
            </td>
            <td class="choose">
                <!-- empty -->
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="5">
        <caption>第五球</caption>
        <tr>
            <td class="choose">
                <span class="num-group">东</span>
                <span class="num">01</span>
                <span class="num">05</span>
                <span class="num">09</span>
                <span class="num">13</span>
                <span class="num">17</span>
                <input type="text" value="'.$odds5["h1"].'" id="zfb-ball_5-h1" />
            </td>
            <td class="choose">
                <span class="num-group">中</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <input type="text" value="'.$odds5["h5"].'" id="zfb-ball_5-h5" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">南</span>
                <span class="num">02</span>
                <span class="num">06</span>
                <span class="num">10</span>
                <span class="num">14</span>
                <span class="num">18</span>
                <input type="text" value="'.$odds5["h2"].'" id="zfb-ball_5-h2" />
            </td>
            <td class="choose">
                <span class="num-group">发</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <input type="text" value="'.$odds5["h6"].'" id="zfb-ball_5-h6" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">西</span>
                <span class="num">03</span>
                <span class="num">07</span>
                <span class="num">11</span>
                <span class="num">15</span>
                <span class="num">19</span>
                <input type="text" value="'.$odds5["h3"].'" id="zfb-ball_5-h3" />
            </td>
            <td class="choose">
                <span class="num-group">白</span>
                <span class="num">15</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
                <input type="text" value="'.$odds5["h7"].'" id="zfb-ball_5-h7" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">北</span>
                <span class="num">04</span>
                <span class="num">08</span>
                <span class="num">12</span>
                <span class="num">16</span>
                <span class="num">20</span>
                <input type="text" value="'.$odds5["h4"].'" id="zfb-ball_5-h4" />
            </td>
            <td class="choose">
                <!-- empty -->
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="6">
        <caption>第六球</caption>
        <tr>
            <td class="choose">
                <span class="num-group">东</span>
                <span class="num">01</span>
                <span class="num">05</span>
                <span class="num">09</span>
                <span class="num">13</span>
                <span class="num">17</span>
                <input type="text" value="'.$odds6["h1"].'" id="zfb-ball_6-h1" />
            </td>
            <td class="choose">
                <span class="num-group">中</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <input type="text" value="'.$odds6["h5"].'" id="zfb-ball_6-h5" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">南</span>
                <span class="num">02</span>
                <span class="num">06</span>
                <span class="num">10</span>
                <span class="num">14</span>
                <span class="num">18</span>
                <input type="text" value="'.$odds6["h2"].'" id="zfb-ball_6-h2" />
            </td>
            <td class="choose">
                <span class="num-group">发</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <input type="text" value="'.$odds6["h6"].'" id="zfb-ball_6-h6" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">西</span>
                <span class="num">03</span>
                <span class="num">07</span>
                <span class="num">11</span>
                <span class="num">15</span>
                <span class="num">19</span>
                <input type="text" value="'.$odds6["h3"].'" id="zfb-ball_6-h3" />
            </td>
            <td class="choose">
                <span class="num-group">白</span>
                <span class="num">15</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
                <input type="text" value="'.$odds6["h7"].'" id="zfb-ball_6-h7" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">北</span>
                <span class="num">04</span>
                <span class="num">08</span>
                <span class="num">12</span>
                <span class="num">16</span>
                <span class="num">20</span>
                <input type="text" value="'.$odds6["h4"].'" id="zfb-ball_6-h4" />
            </td>
            <td class="choose">
                <!-- empty -->
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="7">
        <caption>第七球</caption>
        <tr>
            <td class="choose">
                <span class="num-group">东</span>
                <span class="num">01</span>
                <span class="num">05</span>
                <span class="num">09</span>
                <span class="num">13</span>
                <span class="num">17</span>
                <input type="text" value="'.$odds7["h1"].'" id="zfb-ball_7-h1" />
            </td>
            <td class="choose">
                <span class="num-group">中</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <input type="text" value="'.$odds7["h5"].'" id="zfb-ball_7-h5" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">南</span>
                <span class="num">02</span>
                <span class="num">06</span>
                <span class="num">10</span>
                <span class="num">14</span>
                <span class="num">18</span>
                <input type="text" value="'.$odds7["h2"].'" id="zfb-ball_7-h2" />
            </td>
            <td class="choose">
                <span class="num-group">发</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <input type="text" value="'.$odds7["h6"].'" id="zfb-ball_7-h6" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">西</span>
                <span class="num">03</span>
                <span class="num">07</span>
                <span class="num">11</span>
                <span class="num">15</span>
                <span class="num">19</span>
                <input type="text" value="'.$odds7["h3"].'" id="zfb-ball_7-h3" />
            </td>
            <td class="choose">
                <span class="num-group">白</span>
                <span class="num">15</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
                <input type="text" value="'.$odds7["h7"].'" id="zfb-ball_7-h7" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">北</span>
                <span class="num">04</span>
                <span class="num">08</span>
                <span class="num">12</span>
                <span class="num">16</span>
                <span class="num">20</span>
                <input type="text" value="'.$odds7["h4"].'" id="zfb-ball_7-h4" />
            </td>
            <td class="choose">
                <!-- empty -->
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="S">
        <caption>第八球</caption>
        <tr>
            <td class="choose">
                <span class="num-group">东</span>
                <span class="num">01</span>
                <span class="num">05</span>
                <span class="num">09</span>
                <span class="num">13</span>
                <span class="num">17</span>
                <input type="text" value="'.$odds8["h1"].'" id="zfb-ball_8-h1" />
            </td>
            <td class="choose">
                <span class="num-group">中</span>
                <span class="num">01</span>
                <span class="num">02</span>
                <span class="num">03</span>
                <span class="num">04</span>
                <span class="num">05</span>
                <span class="num">06</span>
                <span class="num">07</span>
                <input type="text" value="'.$odds8["h5"].'" id="zfb-ball_8-h5" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">南</span>
                <span class="num">02</span>
                <span class="num">06</span>
                <span class="num">10</span>
                <span class="num">14</span>
                <span class="num">18</span>
                <input type="text" value="'.$odds8["h2"].'" id="zfb-ball_8-h2" />
            </td>
            <td class="choose">
                <span class="num-group">发</span>
                <span class="num">08</span>
                <span class="num">09</span>
                <span class="num">10</span>
                <span class="num">11</span>
                <span class="num">12</span>
                <span class="num">13</span>
                <span class="num">14</span>
                <input type="text" value="'.$odds8["h6"].'" id="zfb-ball_8-h6" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">西</span>
                <span class="num">03</span>
                <span class="num">07</span>
                <span class="num">11</span>
                <span class="num">15</span>
                <span class="num">19</span>
                <input type="text" value="'.$odds8["h3"].'" id="zfb-ball_8-h3" />
            </td>
            <td class="choose">
                <span class="num-group">白</span>
                <span class="num">15</span>
                <span class="num">16</span>
                <span class="num">17</span>
                <span class="num">18</span>
                <span class="num">19</span>
                <span class="num">20</span>
                <span class="num">&nbsp;</span>
                <input type="text" value="'.$odds8["h7"].'" id="zfb-ball_8-h7" />
            </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num-group">北</span>
                <span class="num">04</span>
                <span class="num">08</span>
                <span class="num">12</span>
                <span class="num">16</span>
                <span class="num">20</span>
                <input type="text" value="'.$odds8["h4"].'" id="zfb-ball_8-h4" />
            </td>
            <td class="choose">
                <!-- empty -->
            </td>
        </tr>
    </table>
</div>
';