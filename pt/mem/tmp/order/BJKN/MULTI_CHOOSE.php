<?php
session_start();
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../../../../../app/member/include/address.mem.php";
include "../../../../../app/member/include/com_chk.php";
include "../../../../../app/member/class/odds_sf.php";

$odds1 = odds_sf::getOddsByBall("北京快乐8","选号","ball_1");

echo '
<div id="button-block">
    <div class="btn-choose-group CHOOSE-5" group="CHOOSE:5">
        <table class="choose-group-table">
            <tr>
                <td class="choose-group-name">
选5                </td>
                <td class="odds-box">
                    <table>
                        <tr class="odds-item">
                            <td>
中5
                                <span class="odds" choose="CHOOSE:5:MATCH:5">
                                '.$odds1["h1"].'
</span>
</td>
</tr>
<tr class="odds-item">
    <td>
        中4                                <span class="odds" choose="CHOOSE:5:MATCH:4">
                                    '.$odds1["h2"].'                                </span>
    </td>
</tr>
<tr class="odds-item">
    <td>
        中3                                <span class="odds" choose="CHOOSE:5:MATCH:3">
                                    '.$odds1["h3"].'                                </span>
    </td>
</tr>
<tr class="odds-item">
    <td>
        中2                                <span class="odds" choose="CHOOSE:5:MATCH:2">
                                    0.00                                </span>
    </td>
</tr>
<tr class="odds-item">
    <td>
        中1                                <span class="odds" choose="CHOOSE:5:MATCH:1">
                                    0.00                                </span>
    </td>
</tr>
</table>
</td>
</tr>
</table>
</div>

<div class="btn-choose-group CHOOSE-4" group="CHOOSE:4">
    <table class="choose-group-table">
        <tr>
            <td class="choose-group-name">
                选4                </td>
            <td class="odds-box">
                <table>
                    <tr class="odds-item">
                        <td>
                            中4                                <span class="odds" choose="CHOOSE:4:MATCH:4">
                                    '.$odds1["h4"].'                                </span>
                        </td>
                    </tr>
                    <tr class="odds-item">
                        <td>
                            中3                                <span class="odds" choose="CHOOSE:4:MATCH:3">
                                    '.$odds1["h5"].'                                </span>
                        </td>
                    </tr>
                    <tr class="odds-item">
                        <td>
                            中2                                <span class="odds" choose="CHOOSE:4:MATCH:2">
                                    '.$odds1["h6"].'                                </span>
                        </td>
                    </tr>
                    <tr class="odds-item">
                        <td>
                            中1                                <span class="odds" choose="CHOOSE:4:MATCH:1">
                                    0.00                                </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>

<div class="btn-choose-group CHOOSE-3" group="CHOOSE:3">
    <table class="choose-group-table">
        <tr>
            <td class="choose-group-name">
                选3                </td>
            <td class="odds-box">
                <table>
                    <tr class="odds-item">
                        <td>
                            中3                                <span class="odds" choose="CHOOSE:3:MATCH:3">
                                    '.$odds1["h7"].'                                </span>
                        </td>
                    </tr>
                    <tr class="odds-item">
                        <td>
                            中2                                <span class="odds" choose="CHOOSE:3:MATCH:2">
                                    '.$odds1["h8"].'                                </span>
                        </td>
                    </tr>
                    <tr class="odds-item">
                        <td>
                            中1                                <span class="odds" choose="CHOOSE:3:MATCH:1">
                                    0.00                                </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>

<div class="btn-choose-group CHOOSE-2" group="CHOOSE:2">
    <table class="choose-group-table">
        <tr>
            <td class="choose-group-name">
                选2                </td>
            <td class="odds-box">
                <table>
                    <tr class="odds-item">
                        <td>
                            中2                                <span class="odds" choose="CHOOSE:2:MATCH:2">
                                    '.$odds1["h9"].'                                </span>
                        </td>
                    </tr>
                    <tr class="odds-item">
                        <td>
                            中1                                    <span class="odds" choose="CHOOSE:2:MATCH:1">
                                    0.00                                </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>

<div class="btn-choose-group CHOOSE-1" group="CHOOSE:1">
    <table class="choose-group-table">
        <tr>
            <td class="choose-group-name">
                选1                </td>
            <td class="odds-box">
                    <span class="odds-item">
                        中1                        <span class="odds" choose="CHOOSE:1:MATCH:1">
                            '.$odds1["h10"].'                        </span>
                    </span>
            </td>
        </tr>
    </table>
</div>
</div>

<div class="ball-bg">
    <div id="balls-block">
        <span class="ball">1</span><span class="ball">2</span><span class="ball">3</span><span class="ball">4</span><span class="ball">5</span><span class="ball">6</span><span class="ball">7</span><span class="ball">8</span><span class="ball">9</span><span class="ball">10</span><span class="ball">11</span><span class="ball">12</span><span class="ball">13</span><span class="ball">14</span><span class="ball">15</span><span class="ball">16</span><span class="ball">17</span><span class="ball">18</span><span class="ball">19</span><span class="ball">20</span><span class="ball">21</span><span class="ball">22</span><span class="ball">23</span><span class="ball">24</span><span class="ball">25</span><span class="ball">26</span><span class="ball">27</span><span class="ball">28</span><span class="ball">29</span><span class="ball">30</span><span class="ball">31</span><span class="ball">32</span><span class="ball">33</span><span class="ball">34</span><span class="ball">35</span><span class="ball">36</span><span class="ball">37</span><span class="ball">38</span><span class="ball">39</span><span class="ball">40</span><hr><span class="ball">41</span><span class="ball">42</span><span class="ball">43</span><span class="ball">44</span><span class="ball">45</span><span class="ball">46</span><span class="ball">47</span><span class="ball">48</span><span class="ball">49</span><span class="ball">50</span><span class="ball">51</span><span class="ball">52</span><span class="ball">53</span><span class="ball">54</span><span class="ball">55</span><span class="ball">56</span><span class="ball">57</span><span class="ball">58</span><span class="ball">59</span><span class="ball">60</span><span class="ball">61</span><span class="ball">62</span><span class="ball">63</span><span class="ball">64</span><span class="ball">65</span><span class="ball">66</span><span class="ball">67</span><span class="ball">68</span><span class="ball">69</span><span class="ball">70</span><span class="ball">71</span><span class="ball">72</span><span class="ball">73</span><span class="ball">74</span><span class="ball">75</span><span class="ball">76</span><span class="ball">77</span><span class="ball">78</span><span class="ball">79</span><span class="ball">80</span>
    </div>
    <label>
        每注金額
        <input type="text" class="bet-gold" />
        有效投注數
        <span class="display-bets-count">0</span>
    </label>
</div><div class="clear"></div>
<div class="display-bets"></div>
<div class="chk-show-bets">
    顯示包牌組合</div>
<div class="clear"></div> ';

$mysqli->close();