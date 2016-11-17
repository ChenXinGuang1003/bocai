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

$odds1 = odds_sf::getOddsByBall("北京PK拾","冠亚军和-快速","ball_1");

echo '
<h3>冠亚军和</h3>
<table class="order-table">
    <tr>
        <td>03</td>
        <td>
            <input type="text" value="'.$odds1["h1"].'" id="quick_sum-in-ball_1-h1" />
        </td>
        <td>04</td>
        <td>
            <input type="text" value="'.$odds1["h2"].'" id="quick_sum-in-ball_1-h2" />
        </td>
        <td>05</td>
        <td>
            <input type="text" value="'.$odds1["h3"].'" id="quick_sum-in-ball_1-h3" />
        </td>
        <td>06</td>
        <td>
            <input type="text" value="'.$odds1["h4"].'" id="quick_sum-in-ball_1-h4" />
        </td>
    </tr>
    <tr>
        <td>07</td>
        <td>
            <input type="text" value="'.$odds1["h5"].'" id="quick_sum-in-ball_1-h5" />
        </td>
        <td>08</td>
        <td>
            <input type="text" value="'.$odds1["h6"].'" id="quick_sum-in-ball_1-h6" />
        </td>
        <td>09</td>
        <td>
            <input type="text" value="'.$odds1["h7"].'" id="quick_sum-in-ball_1-h7" />
        </td>
        <td>10</td>
        <td>
            <input type="text" value="'.$odds1["h8"].'" id="quick_sum-in-ball_1-h8" />
        </td>
    </tr>
    <tr>
        <td>11</td>
        <td>
            <input type="text" value="'.$odds1["h9"].'" id="quick_sum-in-ball_1-h9" />
        </td>
        <td>12</td>
        <td>
            <input type="text" value="'.$odds1["h10"].'" id="quick_sum-in-ball_1-h10" />
        </td>
        <td>13</td>
        <td>
            <input type="text" value="'.$odds1["h11"].'" id="quick_sum-in-ball_1-h11" />
        </td>
        <td>14</td>
        <td>
            <input type="text" value="'.$odds1["h12"].'" id="quick_sum-in-ball_1-h12" />
        </td>
    </tr>
    <tr>
        <td>15</td>
        <td>
            <input type="text" value="'.$odds1["h13"].'" id="quick_sum-in-ball_1-h13" />
        </td>
        <td>16</td>
        <td>
            <input type="text" value="'.$odds1["h14"].'" id="quick_sum-in-ball_1-h14" />
        </td>
        <td>17</td>
        <td>
            <input type="text" value="'.$odds1["h15"].'" id="quick_sum-in-ball_1-h15" />
        </td>
        <td>18</td>
        <td>
            <input type="text" value="'.$odds1["h16"].'" id="quick_sum-in-ball_1-h16" />
        </td>
    </tr>
    <tr>
        <td>19</td>
        <td>
            <input type="text" value="'.$odds1["h17"].'" id="quick_sum-in-ball_1-h17" />
        </td>
    </tr>
    <tr>
        <td>和大</td>
        <td>
            <input type="text" value="'.$odds1["h18"].'" id="quick_sum-in-ball_1-h18" />
        </td>
        <td>和小</td>
        <td>
            <input type="text" value="'.$odds1["h19"].'" id="quick_sum-in-ball_1-h19" />
        </td>
        <td>和单</td>
        <td>
            <input type="text" value="'.$odds1["h20"].'" id="quick_sum-in-ball_1-h20" />
        </td>
        <td>和双</td>
        <td>
            <input type="text" value="'.$odds1["h21"].'" id="quick_sum-in-ball_1-h21" />
        </td>
    </tr>
</table>
';