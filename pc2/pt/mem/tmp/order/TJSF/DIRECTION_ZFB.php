<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

$odds1 = odds_sf::getOddsByBall("天津十分彩","方位中发白","ball_1");
$odds2 = odds_sf::getOddsByBall("天津十分彩","方位中发白","ball_2");
$odds3 = odds_sf::getOddsByBall("天津十分彩","方位中发白","ball_3");
$odds4 = odds_sf::getOddsByBall("天津十分彩","方位中发白","ball_4");
$odds5 = odds_sf::getOddsByBall("天津十分彩","方位中发白","ball_5");
$odds6 = odds_sf::getOddsByBall("天津十分彩","方位中发白","ball_6");
$odds7 = odds_sf::getOddsByBall("天津十分彩","方位中发白","ball_7");
$odds8 = odds_sf::getOddsByBall("天津十分彩","方位中发白","ball_8");//特别号

echo '
<div class="tabs">
    <ul>
        <li tabs="1"><a>第一球</a></li>
        <li tabs="2"><a>第二球</a></li>
        <li tabs="3"><a>第三球</a></li>
        <li tabs="4"><a>第四球</a></li>
        <li tabs="5"><a>第五球</a></li>
        <li tabs="6"><a>第六球</a></li>
        <li tabs="7"><a>第七球</a></li>
        <li tabs="S"><a>特别号</a></li>
    </ul>
</div>

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
                <span class="odds">'.$odds1["h1"].'</span>
                <input type="text" name="orders[1:EAST]" />
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
                <span class="odds">'.$odds1["h5"].'</span>
                <input type="text" name="orders[1:ZHONG]" />
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
                <span class="odds">'.$odds1["h2"].'</span>
                <input type="text" name="orders[1:SOUTH]" />
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
                <span class="odds">'.$odds1["h6"].'</span>
                <input type="text" name="orders[1:FA]" />
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
                <span class="odds">'.$odds1["h3"].'</span>
                <input type="text" name="orders[1:WEST]" />
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
                <span class="odds">'.$odds1["h7"].'</span>
                <input type="text" name="orders[1:BAI]" />
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
                <span class="odds">'.$odds1["h4"].'</span>
                <input type="text" name="orders[1:NORTH]" />
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
                <span class="odds">'.$odds2["h1"].'</span>
                <input type="text" name="orders[2:EAST]" />
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
                <span class="odds">'.$odds2["h5"].'</span>
                <input type="text" name="orders[2:ZHONG]" />
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
                <span class="odds">'.$odds2["h2"].'</span>
                <input type="text" name="orders[2:SOUTH]" />
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
                <span class="odds">'.$odds2["h6"].'</span>
                <input type="text" name="orders[2:FA]" />
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
                <span class="odds">'.$odds2["h3"].'</span>
                <input type="text" name="orders[2:WEST]" />
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
                <span class="odds">'.$odds2["h7"].'</span>
                <input type="text" name="orders[2:BAI]" />
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
                <span class="odds">'.$odds2["h4"].'</span>
                <input type="text" name="orders[2:NORTH]" />
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
                <span class="odds">'.$odds3["h1"].'</span>
                <input type="text" name="orders[3:EAST]" />
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
                <span class="odds">'.$odds3["h5"].'</span>
                <input type="text" name="orders[3:ZHONG]" />
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
                <span class="odds">'.$odds3["h2"].'</span>
                <input type="text" name="orders[3:SOUTH]" />
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
                <span class="odds">'.$odds3["h6"].'</span>
                <input type="text" name="orders[3:FA]" />
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
                <span class="odds">'.$odds3["h3"].'</span>
                <input type="text" name="orders[3:WEST]" />
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
                <span class="odds">'.$odds3["h7"].'</span>
                <input type="text" name="orders[3:BAI]" />
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
                <span class="odds">'.$odds3["h4"].'</span>
                <input type="text" name="orders[3:NORTH]" />
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
                <span class="odds">'.$odds4["h1"].'</span>
                <input type="text" name="orders[4:EAST]" />
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
                <span class="odds">'.$odds4["h5"].'</span>
                <input type="text" name="orders[4:ZHONG]" />
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
                <span class="odds">'.$odds4["h2"].'</span>
                <input type="text" name="orders[4:SOUTH]" />
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
                <span class="odds">'.$odds4["h6"].'</span>
                <input type="text" name="orders[4:FA]" />
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
                <span class="odds">'.$odds4["h3"].'</span>
                <input type="text" name="orders[4:WEST]" />
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
                <span class="odds">'.$odds4["h7"].'</span>
                <input type="text" name="orders[4:BAI]" />
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
                <span class="odds">'.$odds4["h4"].'</span>
                <input type="text" name="orders[4:NORTH]" />
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
                <span class="odds">'.$odds5["h1"].'</span>
                <input type="text" name="orders[5:EAST]" />
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
                <span class="odds">'.$odds5["h5"].'</span>
                <input type="text" name="orders[5:ZHONG]" />
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
                <span class="odds">'.$odds5["h2"].'</span>
                <input type="text" name="orders[5:SOUTH]" />
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
                <span class="odds">'.$odds5["h6"].'</span>
                <input type="text" name="orders[5:FA]" />
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
                <span class="odds">'.$odds5["h3"].'</span>
                <input type="text" name="orders[5:WEST]" />
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
                <span class="odds">'.$odds5["h7"].'</span>
                <input type="text" name="orders[5:BAI]" />
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
                <span class="odds">'.$odds5["h4"].'</span>
                <input type="text" name="orders[5:NORTH]" />
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
                <span class="odds">'.$odds6["h1"].'</span>
                <input type="text" name="orders[6:EAST]" />
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
                <span class="odds">'.$odds6["h5"].'</span>
                <input type="text" name="orders[6:ZHONG]" />
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
                <span class="odds">'.$odds6["h2"].'</span>
                <input type="text" name="orders[6:SOUTH]" />
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
                <span class="odds">'.$odds6["h6"].'</span>
                <input type="text" name="orders[6:FA]" />
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
                <span class="odds">'.$odds6["h3"].'</span>
                <input type="text" name="orders[6:WEST]" />
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
                <span class="odds">'.$odds6["h7"].'</span>
                <input type="text" name="orders[6:BAI]" />
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
                <span class="odds">'.$odds6["h4"].'</span>
                <input type="text" name="orders[6:NORTH]" />
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
                <span class="odds">'.$odds7["h1"].'</span>
                <input type="text" name="orders[7:EAST]" />
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
                <span class="odds">'.$odds7["h5"].'</span>
                <input type="text" name="orders[7:ZHONG]" />
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
                <span class="odds">'.$odds7["h2"].'</span>
                <input type="text" name="orders[7:SOUTH]" />
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
                <span class="odds">'.$odds7["h6"].'</span>
                <input type="text" name="orders[7:FA]" />
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
                <span class="odds">'.$odds7["h3"].'</span>
                <input type="text" name="orders[7:WEST]" />
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
                <span class="odds">'.$odds7["h7"].'</span>
                <input type="text" name="orders[7:BAI]" />
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
                <span class="odds">'.$odds7["h4"].'</span>
                <input type="text" name="orders[7:NORTH]" />
            </td>
            <td class="choose">
                <!-- empty -->
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="S">
        <caption>特别号</caption>
        <tr>
            <td class="choose">
                <span class="num-group">东</span>
                <span class="num">01</span>
                <span class="num">05</span>
                <span class="num">09</span>
                <span class="num">13</span>
                <span class="num">17</span>
                <span class="odds">'.$odds8["h1"].'</span>
                <input type="text" name="orders[S:EAST]" />
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
                <span class="odds">'.$odds8["h5"].'</span>
                <input type="text" name="orders[S:ZHONG]" />
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
                <span class="odds">'.$odds8["h2"].'</span>
                <input type="text" name="orders[S:SOUTH]" />
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
                <span class="odds">'.$odds8["h6"].'</span>
                <input type="text" name="orders[S:FA]" />
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
                <span class="odds">'.$odds8["h3"].'</span>
                <input type="text" name="orders[S:WEST]" />
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
                <span class="odds">'.$odds8["h7"].'</span>
                <input type="text" name="orders[S:BAI]" />
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
                <span class="odds">'.$odds8["h4"].'</span>
                <input type="text" name="orders[S:NORTH]" />
            </td>
            <td class="choose">
                <!-- empty -->
            </td>
        </tr>
    </table>
</div>
';

$mysqli->close();