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

$odds1 = odds_sf::getOddsByBall("北京PK拾","选号","ball_1");

echo '
<h3>选号</h3>
<table group="FIRST:2" class="choose-group-block">
    <tbody>
    <tr>
            <table class="choose-group-table">
                <tr>
                    <td class="choose-group-name">
                        前2
                    </td>
                    <td class="odds-box">
                        <table>
                            <tr class="odds-item">
                                <td>
                                    中2 <input type="text" value="'.$odds1["h1"].'" id="multi-choose-ball_1-h1" />
                                </td>
                            </tr>
                            <tr class="odds-item">
                                <td>
                                    中1 <input type="text" value="'.$odds1["h2"].'" id="multi-choose-ball_1-h2" />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
    </tr>
    </tbody>
</table>
<hr>
<table group="FIRST:3" class="choose-group-block">
    <tbody>
    <tr>
            <table class="choose-group-table">
                <tr>
                    <td class="choose-group-name">
                        前3                    </td>
                    <td class="odds-box">
                        <table>
                            <tr class="odds-item">
                                <td>
                                    中3 <input type="text" value="'.$odds1["h3"].'" id="multi-choose-ball_1-h3" />
                                </td>
                            </tr>
                            <tr class="odds-item">
                                <td>
                                    中2 <input type="text" value="'.$odds1["h4"].'" id="multi-choose-ball_1-h4" />
                                </td>
                            </tr>
                            <tr class="odds-item" style="display:none">
                                <td>
                                    中1                                    <span class="odds" choose="FIRST:3:MATCH:1">
                                        0.00                                    </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
    </tr>
    </tbody>
</table>
<hr>
<table group="FIRST:4" class="choose-group-block">
    <tbody>
    <tr>
            <table class="choose-group-table">
                <tr>
                    <td class="choose-group-name">
                        前4                    </td>
                    <td class="odds-box">
                        <table>
                            <tr class="odds-item">
                                <td>
                                    中4 <input type="text" value="'.$odds1["h5"].'" id="multi-choose-ball_1-h5" />
                                </td>
                            </tr>
                            <tr class="odds-item">
                                <td>
                                    中3  <input type="text" value="'.$odds1["h6"].'" id="multi-choose-ball_1-h6" />
                                </td>
                            </tr>
                            <tr class="odds-item">
                                <td>
                                    中2  <input type="text" value="'.$odds1["h7"].'" id="multi-choose-ball_1-h7" />
                                </td>
                            </tr>
                            <tr class="odds-item" style="display:none">
                                <td>
                                    中1                                    <span class="odds" choose="FIRST:4:MATCH:1">
                                        0.00                                    </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
    </tr>
    </tbody>
</table>
';