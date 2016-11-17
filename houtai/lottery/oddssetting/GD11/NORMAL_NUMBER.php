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

$odds1 = odds_sf::getOddsByBall("广东十一选五","正码和特别号","ball_1");
$odds2 = odds_sf::getOddsByBall("广东十一选五","正码和特别号","ball_2");
$odds3 = odds_sf::getOddsByBall("广东十一选五","正码和特别号","ball_3");
$odds4 = odds_sf::getOddsByBall("广东十一选五","正码和特别号","ball_4");
$odds5 = odds_sf::getOddsByBall("广东十一选五","正码和特别号","ball_5");

echo '

<div id="locate-box">
    <table class="order-table" tabs-view="1">
        <caption>正码一</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">1</span>
                
                
            <input type="text" value="'.$odds1["h1"].'" id="number-ball_1-h1" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">2</span>
                
                
            <input type="text" value="'.$odds1["h2"].'" id="number-ball_1-h2" />  </td>
            <td class="choose">
                <span class="num ball ball-green">3</span>
                
                
            <input type="text" value="'.$odds1["h3"].'" id="number-ball_1-h3" />  </td>
            <td class="choose">
                <span class="num ball ball-red">4</span>
                
                
            <input type="text" value="'.$odds1["h4"].'" id="number-ball_1-h4" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">5</span>
                
                
            <input type="text" value="'.$odds1["h5"].'" id="number-ball_1-h5" />  </td>
            <td class="choose">
                <span class="num ball ball-green">6</span>
                
                
            <input type="text" value="'.$odds1["h6"].'" id="number-ball_1-h6" />  </td>
            <td class="choose">
                <span class="num ball ball-red">7</span>
                
                
            <input type="text" value="'.$odds1["h7"].'" id="number-ball_1-h7" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">8</span>
                
                
            <input type="text" value="'.$odds1["h8"].'" id="number-ball_1-h8" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">9</span>
                
                
            <input type="text" value="'.$odds1["h9"].'" id="number-ball_1-h9" />  </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>
                
                
            <input type="text" value="'.$odds1["h10"].'" id="number-ball_1-h10" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>
                
                
            <input type="text" value="'.$odds1["h11"].'" id="number-ball_1-h11" />  </td>
            <td class="choose"></td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>
                
                
            <input type="text" value="'.$odds1["h12"].'" id="number-ball_1-h12" />  </td>
            <td class="choose">
                <font class="choose-name">小</font>
                
                
            <input type="text" value="'.$odds1["h13"].'" id="number-ball_1-h13" />  </td>
            <td class="choose">
                <font class="choose-name">单</font>
                
                
            <input type="text" value="'.$odds1["h14"].'" id="number-ball_1-h14" />  </td>
            <td class="choose">
                <font class="choose-name">双</font>
                
                
            <input type="text" value="'.$odds1["h15"].'" id="number-ball_1-h15" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">和单</font>
                
                
            <input type="text" value="'.$odds1["h16"].'" id="number-ball_1-h16" />  </td>
            <td class="choose">
                <font class="choose-name">和双</font>
                
                
            <input type="text" value="'.$odds1["h17"].'" id="number-ball_1-h17" />  </td>
            <td class="choose">
                <font class="choose-name">尾大</font>
                
                
            <input type="text" value="'.$odds1["h18"].'" id="number-ball_1-h18" />  </td>
            <td class="choose">
                <font class="choose-name">尾小</font>
                
                
            <input type="text" value="'.$odds1["h19"].'" id="number-ball_1-h19" />  </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="2">
        <caption>正码二</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">1</span>
                
                
            <input type="text" value="'.$odds2["h1"].'" id="number-ball_2-h1" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">2</span>


            <input type="text" value="'.$odds2["h2"].'" id="number-ball_2-h2" />  </td>
            <td class="choose">
                <span class="num ball ball-green">3</span>


            <input type="text" value="'.$odds2["h3"].'" id="number-ball_2-h3" />  </td>
            <td class="choose">
                <span class="num ball ball-red">4</span>


            <input type="text" value="'.$odds2["h4"].'" id="number-ball_2-h4" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">5</span>


            <input type="text" value="'.$odds2["h5"].'" id="number-ball_2-h5" />  </td>
            <td class="choose">
                <span class="num ball ball-green">6</span>


            <input type="text" value="'.$odds2["h6"].'" id="number-ball_2-h6" />  </td>
            <td class="choose">
                <span class="num ball ball-red">7</span>


            <input type="text" value="'.$odds2["h7"].'" id="number-ball_2-h7" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">8</span>


            <input type="text" value="'.$odds2["h8"].'" id="number-ball_2-h8" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-green">9</span>


            <input type="text" value="'.$odds2["h9"].'" id="number-ball_2-h9" />  </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>


            <input type="text" value="'.$odds2["h10"].'" id="number-ball_2-h10" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>


            <input type="text" value="'.$odds2["h11"].'" id="number-ball_2-h11" />  </td>
            <td class="choose"></td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>


            <input type="text" value="'.$odds2["h12"].'" id="number-ball_2-h12" />  </td>
            <td class="choose">
                <font class="choose-name">小</font>


            <input type="text" value="'.$odds2["h13"].'" id="number-ball_2-h13" />  </td>
            <td class="choose">
                <font class="choose-name">单</font>


            <input type="text" value="'.$odds2["h14"].'" id="number-ball_2-h14" />  </td>
            <td class="choose">
                <font class="choose-name">双</font>


            <input type="text" value="'.$odds2["h15"].'" id="number-ball_2-h15" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">和单</font>


            <input type="text" value="'.$odds2["h16"].'" id="number-ball_2-h16" />  </td>
            <td class="choose">
                <font class="choose-name">和双</font>


            <input type="text" value="'.$odds2["h17"].'" id="number-ball_2-h17" />  </td>
            <td class="choose">
                <font class="choose-name">尾大</font>


            <input type="text" value="'.$odds2["h18"].'" id="number-ball_2-h18" />  </td>
            <td class="choose">
                <font class="choose-name">尾小</font>


            <input type="text" value="'.$odds2["h19"].'" id="number-ball_2-h19" />  </td>
        </tr>
    </table>

    <table class="order-table" tabs-view="3">
        <caption>正码三</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">1</span>


            <input type="text" value="'.$odds3["h1"].'" id="number-ball_3-h1" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">2</span>


            <input type="text" value="'.$odds3["h2"].'" id="number-ball_3-h2" />  </td>
            <td class="choose">
                <span class="num ball ball-green">3</span>


            <input type="text" value="'.$odds3["h3"].'" id="number-ball_3-h3" />  </td>
            <td class="choose">
                <span class="num ball ball-red">4</span>


            <input type="text" value="'.$odds3["h4"].'" id="number-ball_3-h4" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <span class="num ball ball-blue">5</span>


            <input type="text" value="'.$odds3["h5"].'" id="number-ball_3-h5" />  </td>
            <td class="choose">
                <span class="num ball ball-green">6</span>


            <input type="text" value="'.$odds3["h6"].'" id="number-ball_3-h6" />  </td>
            <td class="choose">
                <span class="num ball ball-red">7</span>


            <input type="text" value="'.$odds3["h7"].'" id="number-ball_3-h7" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">8</span>


            <input type="text" value="'.$odds3["h8"].'" id="number-ball_3-h8" />  </td>
        </tr>
        <tr>

            <td class="choose">
                <span class="num ball ball-green">9</span>


            <input type="text" value="'.$odds3["h9"].'" id="number-ball_3-h9" />  </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>


            <input type="text" value="'.$odds3["h10"].'" id="number-ball_3-h10" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>


            <input type="text" value="'.$odds3["h11"].'" id="number-ball_3-h11" />  </td>
            <td class="choose"></td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>


            <input type="text" value="'.$odds3["h12"].'" id="number-ball_3-h12" />  </td>
            <td class="choose">
                <font class="choose-name">小</font>


            <input type="text" value="'.$odds3["h13"].'" id="number-ball_3-h13" />  </td>
            <td class="choose">
                <font class="choose-name">单</font>


            <input type="text" value="'.$odds3["h14"].'" id="number-ball_3-h14" />  </td>
            <td class="choose">
                <font class="choose-name">双</font>


            <input type="text" value="'.$odds3["h15"].'" id="number-ball_3-h15" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">和单</font>


            <input type="text" value="'.$odds3["h16"].'" id="number-ball_3-h16" />  </td>
            <td class="choose">
                <font class="choose-name">和双</font>


            <input type="text" value="'.$odds3["h17"].'" id="number-ball_3-h17" />  </td>
            <td class="choose">
                <font class="choose-name">尾大</font>


            <input type="text" value="'.$odds3["h18"].'" id="number-ball_3-h18" />  </td>
            <td class="choose">
                <font class="choose-name">尾小</font>


            <input type="text" value="'.$odds3["h19"].'" id="number-ball_3-h19" />  </td>
        </tr>
    </table>

    <table class="order-table" tabs-view="4">
        <caption>正码四</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">1</span>


            <input type="text" value="'.$odds4["h1"].'" id="number-ball_4-h1" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">2</span>


            <input type="text" value="'.$odds4["h2"].'" id="number-ball_4-h2" />  </td>
            <td class="choose">
                <span class="num ball ball-green">3</span>


            <input type="text" value="'.$odds4["h3"].'" id="number-ball_4-h3" />  </td>
            <td class="choose">
                <span class="num ball ball-red">4</span>


            <input type="text" value="'.$odds4["h4"].'" id="number-ball_4-h4" />  </td>
        </tr>
        <tr>

            <td class="choose">
                <span class="num ball ball-blue">5</span>


            <input type="text" value="'.$odds4["h5"].'" id="number-ball_4-h5" />  </td>
            <td class="choose">
                <span class="num ball ball-green">6</span>


            <input type="text" value="'.$odds4["h6"].'" id="number-ball_4-h6" />  </td>
            <td class="choose">
                <span class="num ball ball-red">7</span>


            <input type="text" value="'.$odds4["h7"].'" id="number-ball_4-h7" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">8</span>


            <input type="text" value="'.$odds4["h8"].'" id="number-ball_4-h8" />  </td>
        </tr>
        <tr>

            <td class="choose">
                <span class="num ball ball-green">9</span>


            <input type="text" value="'.$odds4["h9"].'" id="number-ball_4-h9" />  </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>


            <input type="text" value="'.$odds4["h10"].'" id="number-ball_4-h10" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>


            <input type="text" value="'.$odds4["h11"].'" id="number-ball_4-h11" />  </td>
            <td class="choose"></td>
        </tr>
        <tr>

        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>


            <input type="text" value="'.$odds4["h12"].'" id="number-ball_4-h12" />  </td>
            <td class="choose">
                <font class="choose-name">小</font>


            <input type="text" value="'.$odds4["h13"].'" id="number-ball_4-h13" />  </td>
            <td class="choose">
                <font class="choose-name">单</font>


            <input type="text" value="'.$odds4["h14"].'" id="number-ball_4-h14" />  </td>
            <td class="choose">
                <font class="choose-name">双</font>


            <input type="text" value="'.$odds4["h15"].'" id="number-ball_4-h15" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">和单</font>


            <input type="text" value="'.$odds4["h16"].'" id="number-ball_4-h16" />  </td>
            <td class="choose">
                <font class="choose-name">和双</font>


            <input type="text" value="'.$odds4["h17"].'" id="number-ball_4-h17" />  </td>
            <td class="choose">
                <font class="choose-name">尾大</font>


            <input type="text" value="'.$odds4["h18"].'" id="number-ball_4-h18" />  </td>
            <td class="choose">
                <font class="choose-name">尾小</font>


            <input type="text" value="'.$odds4["h19"].'" id="number-ball_4-h19" />  </td>
        </tr>
    </table>

    <table class="order-table" tabs-view="5">
        <caption>正码五</caption>
        <tr>
            <td class="choose">
                <span class="num ball ball-red">1</span>


            <input type="text" value="'.$odds5["h1"].'" id="number-ball_5-h1" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">2</span>


            <input type="text" value="'.$odds5["h2"].'" id="number-ball_5-h2" />  </td>
            <td class="choose">
                <span class="num ball ball-green">3</span>


            <input type="text" value="'.$odds5["h3"].'" id="number-ball_5-h3" />  </td>
            <td class="choose">
                <span class="num ball ball-red">4</span>


            <input type="text" value="'.$odds5["h4"].'" id="number-ball_5-h4" />  </td>
        </tr>
        <tr>

            <td class="choose">
                <span class="num ball ball-blue">5</span>


            <input type="text" value="'.$odds5["h5"].'" id="number-ball_5-h5" />  </td>
            <td class="choose">
                <span class="num ball ball-green">6</span>


            <input type="text" value="'.$odds5["h6"].'" id="number-ball_5-h6" />  </td>
            <td class="choose">
                <span class="num ball ball-red">7</span>


            <input type="text" value="'.$odds5["h7"].'" id="number-ball_5-h7" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">8</span>


            <input type="text" value="'.$odds5["h8"].'" id="number-ball_5-h8" />  </td>
        </tr>
        <tr>

            <td class="choose">
                <span class="num ball ball-green">9</span>


            <input type="text" value="'.$odds5["h9"].'" id="number-ball_5-h9" />  </td>
            <td class="choose">
                <span class="num ball ball-red">10</span>


            <input type="text" value="'.$odds5["h10"].'" id="number-ball_5-h10" />  </td>
            <td class="choose">
                <span class="num ball ball-blue">11</span>


            <input type="text" value="'.$odds5["h11"].'" id="number-ball_5-h11" />  </td>
            <td class="choose"></td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">大</font>


            <input type="text" value="'.$odds5["h12"].'" id="number-ball_5-h12" />  </td>
            <td class="choose">
                <font class="choose-name">小</font>


            <input type="text" value="'.$odds5["h13"].'" id="number-ball_5-h13" />  </td>
            <td class="choose">
                <font class="choose-name">单</font>


            <input type="text" value="'.$odds5["h14"].'" id="number-ball_5-h14" />  </td>
            <td class="choose">
                <font class="choose-name">双</font>


            <input type="text" value="'.$odds5["h15"].'" id="number-ball_5-h15" />  </td>
        </tr>
        <tr>
            <td class="choose">
                <font class="choose-name">和单</font>


            <input type="text" value="'.$odds5["h16"].'" id="number-ball_5-h16" />  </td>
            <td class="choose">
                <font class="choose-name">和双</font>


            <input type="text" value="'.$odds5["h17"].'" id="number-ball_5-h17" />  </td>
            <td class="choose">
                <font class="choose-name">尾大</font>


            <input type="text" value="'.$odds5["h18"].'" id="number-ball_5-h18" />  </td>
            <td class="choose">
                <font class="choose-name">尾小</font>


            <input type="text" value="'.$odds5["h19"].'" id="number-ball_5-h19" />  </td>
        </tr>
    </table>
</div>
';