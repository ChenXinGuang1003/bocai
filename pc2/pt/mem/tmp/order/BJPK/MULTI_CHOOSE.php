<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

$odds1 = odds_sf::getOddsByBall("北京PK拾","选号","ball_1");

echo '
<h3>选号</h3>
<table group="FIRST:2" class="choose-group-block">
    <tbody>
    <tr>
        <th rowspan="3">
            <table class="choose-group-table">
                <tr>
                    <td class="choose-group-name">
                        前2                    </td>
                    <td class="odds-box">
                        <table>
                            <tr class="odds-item">
                                <td>
                                    中2                                    <span class="odds" choose="FIRST:2:MATCH:2">
                                        '.$odds1["h1"].'                                    </span>
                                </td>
                            </tr>
                            <tr class="odds-item">
                                <td>
                                    中1                                    <span class="odds" choose="FIRST:2:MATCH:1">
                                        '.$odds1["h2"].'                                    </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </th>
        <td class="row-name">冠军</td>
        <td><span locate="1" class="ball ball-num-1">1</span></td>
        <td><span locate="1" class="ball ball-num-2">2</span></td>
        <td><span locate="1" class="ball ball-num-3">3</span></td>
        <td><span locate="1" class="ball ball-num-4">4</span></td>
        <td><span locate="1" class="ball ball-num-5">5</span></td>
        <td><span locate="1" class="ball ball-num-6">6</span></td>
        <td><span locate="1" class="ball ball-num-7">7</span></td>
        <td><span locate="1" class="ball ball-num-8">8</span></td>
        <td><span locate="1" class="ball ball-num-9">9</span></td>
        <td><span locate="1" class="ball ball-num-10">10</span></td>
    </tr>
    <tr>
        <td class="row-name">亚军</td>
        <td><span locate="2" class="ball ball-num-1">1</span></td>
        <td><span locate="2" class="ball ball-num-2">2</span></td>
        <td><span locate="2" class="ball ball-num-3">3</span></td>
        <td><span locate="2" class="ball ball-num-4">4</span></td>
        <td><span locate="2" class="ball ball-num-5">5</span></td>
        <td><span locate="2" class="ball ball-num-6">6</span></td>
        <td><span locate="2" class="ball ball-num-7">7</span></td>
        <td><span locate="2" class="ball ball-num-8">8</span></td>
        <td><span locate="2" class="ball ball-num-9">9</span></td>
        <td><span locate="2" class="ball ball-num-10">10</span></td>
    </tr>
    <tr>
        <td colspan="11" class="gold-input">
            下注金额            <input type="text" class="bet-gold" />
        </td>
    </tr>
    </tbody>
</table>
<hr>
<table group="FIRST:3" class="choose-group-block">
    <tbody>
    <tr>
        <th rowspan="4">
            <table class="choose-group-table">
                <tr>
                    <td class="choose-group-name">
                        前3                    </td>
                    <td class="odds-box">
                        <table>
                            <tr class="odds-item">
                                <td>
                                    中3                                    <span class="odds" choose="FIRST:3:MATCH:3">
                                        '.$odds1["h3"].'                                    </span>
                                </td>
                            </tr>
                            <tr class="odds-item">
                                <td>
                                    中2                                    <span class="odds" choose="FIRST:3:MATCH:2">
                                        '.$odds1["h4"].'                                    </span>
                                </td>
                            </tr>
                            <tr class="odds-item">
                                <td>
                                    中1                                    <span class="odds" choose="FIRST:3:MATCH:1">
                                        0.00                                    </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </th>
        <td class="row-name">冠军</td>
        <td><span locate="1" class="ball ball-num-1">1</span></td>
        <td><span locate="1" class="ball ball-num-2">2</span></td>
        <td><span locate="1" class="ball ball-num-3">3</span></td>
        <td><span locate="1" class="ball ball-num-4">4</span></td>
        <td><span locate="1" class="ball ball-num-5">5</span></td>
        <td><span locate="1" class="ball ball-num-6">6</span></td>
        <td><span locate="1" class="ball ball-num-7">7</span></td>
        <td><span locate="1" class="ball ball-num-8">8</span></td>
        <td><span locate="1" class="ball ball-num-9">9</span></td>
        <td><span locate="1" class="ball ball-num-10">10</span></td>
    </tr>
    <tr>
        <td class="row-name">亚军</td>
        <td><span locate="2" class="ball ball-num-1">1</span></td>
        <td><span locate="2" class="ball ball-num-2">2</span></td>
        <td><span locate="2" class="ball ball-num-3">3</span></td>
        <td><span locate="2" class="ball ball-num-4">4</span></td>
        <td><span locate="2" class="ball ball-num-5">5</span></td>
        <td><span locate="2" class="ball ball-num-6">6</span></td>
        <td><span locate="2" class="ball ball-num-7">7</span></td>
        <td><span locate="2" class="ball ball-num-8">8</span></td>
        <td><span locate="2" class="ball ball-num-9">9</span></td>
        <td><span locate="2" class="ball ball-num-10">10</span></td>
    </tr>
    <tr>
        <td class="row-name">季军</td>
        <td><span locate="3" class="ball ball-num-1">1</span></td>
        <td><span locate="3" class="ball ball-num-2">2</span></td>
        <td><span locate="3" class="ball ball-num-3">3</span></td>
        <td><span locate="3" class="ball ball-num-4">4</span></td>
        <td><span locate="3" class="ball ball-num-5">5</span></td>
        <td><span locate="3" class="ball ball-num-6">6</span></td>
        <td><span locate="3" class="ball ball-num-7">7</span></td>
        <td><span locate="3" class="ball ball-num-8">8</span></td>
        <td><span locate="3" class="ball ball-num-9">9</span></td>
        <td><span locate="3" class="ball ball-num-10">10</span></td>
    </tr>
    <tr>
        <td colspan="11" class="gold-input">
            下注金额            <input type="text" class="bet-gold" />
        </td>
    </tr>
    </tbody>
</table>
<hr>
<table group="FIRST:4" class="choose-group-block">
    <tbody>
    <tr>
        <th rowspan="5">
            <table class="choose-group-table">
                <tr>
                    <td class="choose-group-name">
                        前4                    </td>
                    <td class="odds-box">
                        <table>
                            <tr class="odds-item">
                                <td>
                                    中4                                    <span class="odds" choose="FIRST:4:MATCH:4">
                                        '.$odds1["h5"].'                                    </span>
                                </td>
                            </tr>
                            <tr class="odds-item">
                                <td>
                                    中3                                    <span class="odds" choose="FIRST:4:MATCH:3">
                                        '.$odds1["h6"].'                                    </span>
                                </td>
                            </tr>
                            <tr class="odds-item">
                                <td>
                                    中2                                    <span class="odds" choose="FIRST:4:MATCH:2">
                                        '.$odds1["h7"].'                                    </span>
                                </td>
                            </tr>
                            <tr class="odds-item">
                                <td>
                                    中1                                    <span class="odds" choose="FIRST:4:MATCH:1">
                                        0.00                                    </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </th>
        <td class="row-name">冠军</td>
        <td><span locate="1" class="ball ball-num-1">1</span></td>
        <td><span locate="1" class="ball ball-num-2">2</span></td>
        <td><span locate="1" class="ball ball-num-3">3</span></td>
        <td><span locate="1" class="ball ball-num-4">4</span></td>
        <td><span locate="1" class="ball ball-num-5">5</span></td>
        <td><span locate="1" class="ball ball-num-6">6</span></td>
        <td><span locate="1" class="ball ball-num-7">7</span></td>
        <td><span locate="1" class="ball ball-num-8">8</span></td>
        <td><span locate="1" class="ball ball-num-9">9</span></td>
        <td><span locate="1" class="ball ball-num-10">10</span></td>
    </tr>
    <tr>
        <td class="row-name">亚军</td>
        <td><span locate="2" class="ball ball-num-1">1</span></td>
        <td><span locate="2" class="ball ball-num-2">2</span></td>
        <td><span locate="2" class="ball ball-num-3">3</span></td>
        <td><span locate="2" class="ball ball-num-4">4</span></td>
        <td><span locate="2" class="ball ball-num-5">5</span></td>
        <td><span locate="2" class="ball ball-num-6">6</span></td>
        <td><span locate="2" class="ball ball-num-7">7</span></td>
        <td><span locate="2" class="ball ball-num-8">8</span></td>
        <td><span locate="2" class="ball ball-num-9">9</span></td>
        <td><span locate="2" class="ball ball-num-10">10</span></td>
    </tr>
    <tr>
        <td class="row-name">季军</td>
        <td><span locate="3" class="ball ball-num-1">1</span></td>
        <td><span locate="3" class="ball ball-num-2">2</span></td>
        <td><span locate="3" class="ball ball-num-3">3</span></td>
        <td><span locate="3" class="ball ball-num-4">4</span></td>
        <td><span locate="3" class="ball ball-num-5">5</span></td>
        <td><span locate="3" class="ball ball-num-6">6</span></td>
        <td><span locate="3" class="ball ball-num-7">7</span></td>
        <td><span locate="3" class="ball ball-num-8">8</span></td>
        <td><span locate="3" class="ball ball-num-9">9</span></td>
        <td><span locate="3" class="ball ball-num-10">10</span></td>
    </tr>
    <tr>
        <td class="row-name">第四名</td>
        <td><span locate="4" class="ball ball-num-1">1</span></td>
        <td><span locate="4" class="ball ball-num-2">2</span></td>
        <td><span locate="4" class="ball ball-num-3">3</span></td>
        <td><span locate="4" class="ball ball-num-4">4</span></td>
        <td><span locate="4" class="ball ball-num-5">5</span></td>
        <td><span locate="4" class="ball ball-num-6">6</span></td>
        <td><span locate="4" class="ball ball-num-7">7</span></td>
        <td><span locate="4" class="ball ball-num-8">8</span></td>
        <td><span locate="4" class="ball ball-num-9">9</span></td>
        <td><span locate="4" class="ball ball-num-10">10</span></td>
    </tr>
    <tr>
        <td colspan="11" class="gold-input">
            下注金额            <input type="text" class="bet-gold" />
        </td>
    </tr>
    </tbody>
</table>
';

$mysqli->close();