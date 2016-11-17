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


global $mysqli;
$sql   =	"select g.* from user_group g
                     where g.group_id=866 limit 0,1";
$query = $mysqli->query($sql);
$row   =	$query->fetch_array();

echo '
<style>
.main-inner{margin-bottom:300px !important;}
</style>
<table class="order-table">
    <tr>
        <th>重庆时时彩</th>
        <td class="choose">
            <span class="choose-name">投注最小金额</span>
        <input type="text" value="'.$row["cq_lower_bet"].'" id="four_ball_1-h1" />    </td>
        <td class="choose">
            <span class="choose-name">投注最大金额</span>
        <input type="text" value="'.$row["cq_max_bet"].'" id="four_ball_1-h40"  style="width: 70px;"/>    </td>
        <td class="choose">
            <span class="choose-name">反水最小金额</span>
        <input type="text" value="'.$row["cq_bet"].'" id="four_ball_1-h2" />    </td>
        <td class="choose">
            <span class="choose-name">反水比例</span>
        <input type="text" value="'.$row["cq_bet_reb"].'" id="four_ball_1-h3" />    </td>
    </tr>
    <tr style="display:none;">
        <th>江西时时彩</th>
        <td class="choose">
            <span class="choose-name">投注最小金额</span>
        <input type="text" value="'.$row["jx_lower_bet"].'" id="four_ball_1-h4" />    </td>
        <td class="choose">
            <span class="choose-name">投注最大金额</span>
        <input type="text" value="'.$row["jx_max_bet"].'" id="four_ball_1-h41"  style="width: 70px;"/>    </td>
        <td class="choose">
            <span class="choose-name">反水最小金额</span>
        <input type="text" value="'.$row["jx_bet"].'" id="four_ball_1-h5" />    </td>
        <td class="choose">
            <span class="choose-name">反水比例</span>
        <input type="text" value="'.$row["jx_bet_reb"].'" id="four_ball_1-h6" />    </td>
    </tr>
    <tr style="display:none;">
        <th>天津时时彩</th>
        <td class="choose">
            <span class="choose-name">投注最小金额</span>
        <input type="text" value="'.$row["tj_lower_bet"].'" id="four_ball_1-h7" />    </td>
        <td class="choose">
            <span class="choose-name">投注最大金额</span>
        <input type="text" value="'.$row["tj_max_bet"].'" id="four_ball_1-h42"  style="width: 70px;"/>    </td>
        <td class="choose">
            <span class="choose-name">反水最小金额</span>
        <input type="text" value="'.$row["tj_bet"].'" id="four_ball_1-h8" />    </td>
        <td class="choose">
            <span class="choose-name">反水比例</span>
        <input type="text" value="'.$row["tj_bet_reb"].'" id="four_ball_1-h9" />    </td>
    </tr>
    <tr style="display:none;">
        <th>广东十分彩</th>
        <td class="choose">
            <span class="choose-name">投注最小金额</span>
        <input type="text" value="'.$row["gdsf_lower_bet"].'" id="four_ball_1-h10" />    </td>
        <td class="choose">
            <span class="choose-name">投注最大金额</span>
        <input type="text" value="'.$row["gdsf_max_bet"].'" id="four_ball_1-h43"  style="width: 70px;"/>    </td>
        <td class="choose">
            <span class="choose-name">反水最小金额</span>
        <input type="text" value="'.$row["gdsf_bet"].'" id="four_ball_1-h11" />    </td>
        <td class="choose">
            <span class="choose-name">反水比例</span>
        <input type="text" value="'.$row["gdsf_bet_reb"].'" id="four_ball_1-h12" />    </td>
    </tr>
    <tr style="display:none;">
        <th>广西十分彩</th>
        <td class="choose">
            <span class="choose-name">投注最小金额</span>
        <input type="text" value="'.$row["gxsf_lower_bet"].'" id="four_ball_1-h13" />    </td>
        <td class="choose">
            <span class="choose-name">投注最大金额</span>
        <input type="text" value="'.$row["gxsf_max_bet"].'" id="four_ball_1-h44"  style="width: 70px;"/>    </td>
        <td class="choose">
            <span class="choose-name">反水最小金额</span>
        <input type="text" value="'.$row["gxsf_bet"].'" id="four_ball_1-h14" />    </td>
        <td class="choose">
            <span class="choose-name">反水比例</span>
        <input type="text" value="'.$row["gxsf_bet_reb"].'" id="four_ball_1-h15" />    </td>
    </tr>
    <tr style="display:none;">
        <th>天津十分彩</th>
        <td class="choose">
            <span class="choose-name">投注最小金额</span>
        <input type="text" value="'.$row["tjsf_lower_bet"].'" id="four_ball_1-h16" />    </td>
        <td class="choose">
            <span class="choose-name">投注最大金额</span>
        <input type="text" value="'.$row["tjsf_max_bet"].'" id="four_ball_1-h45"  style="width: 70px;"/>    </td>
        <td class="choose">
            <span class="choose-name">反水最小金额</span>
        <input type="text" value="'.$row["tjsf_bet"].'" id="four_ball_1-h17" />    </td>
        <td class="choose">
            <span class="choose-name">反水比例</span>
        <input type="text" value="'.$row["tjsf_bet_reb"].'" id="four_ball_1-h18" />    </td>
    </tr>
    <tr style="display:none;">
        <th>重庆十分彩</th>
        <td class="choose">
            <span class="choose-name">投注最小金额</span>
        <input type="text" value="'.$row["cqsf_lower_bet"].'" id="four_ball_1-h53" />    </td>
        <td class="choose">
            <span class="choose-name">投注最大金额</span>
        <input type="text" value="'.$row["cqsf_max_bet"].'" id="four_ball_1-h54"  style="width: 70px;"/>    </td>
        <td class="choose">
            <span class="choose-name">反水最小金额</span>
        <input type="text" value="'.$row["cqsf_bet"].'" id="four_ball_1-h55" />    </td>
        <td class="choose">
            <span class="choose-name">反水比例</span>
        <input type="text" value="'.$row["cqsf_bet_reb"].'" id="four_ball_1-h56" />    </td>
    </tr>
    <tr>
        <th>北京PK拾</th>
        <td class="choose">
            <span class="choose-name">投注最小金额</span>
        <input type="text" value="'.$row["bjpk_lower_bet"].'" id="four_ball_1-h19" />    </td>
        <td class="choose">
            <span class="choose-name">投注最大金额</span>
        <input type="text" value="'.$row["bjpk_max_bet"].'" id="four_ball_1-h46"  style="width: 70px;"/>    </td>
        <td class="choose">
            <span class="choose-name">反水最小金额</span>
        <input type="text" value="'.$row["bjpk_bet"].'" id="four_ball_1-h20" />    </td>
        <td class="choose">
            <span class="choose-name">反水比例</span>
        <input type="text" value="'.$row["bjpk_bet_reb"].'" id="four_ball_1-h21" />    </td>
    </tr>
    <tr>
        <th>北京快乐8</th>
        <td class="choose">
            <span class="choose-name">投注最小金额</span>
        <input type="text" value="'.$row["bjkn_lower_bet"].'" id="four_ball_1-h22" />    </td>
        <td class="choose">
            <span class="choose-name">投注最大金额</span>
        <input type="text" value="'.$row["bjkn_max_bet"].'" id="four_ball_1-h47"  style="width: 70px;"/>    </td>
        <td class="choose">
            <span class="choose-name">反水最小金额</span>
        <input type="text" value="'.$row["bjkn_bet"].'" id="four_ball_1-h23" />    </td>
        <td class="choose">
            <span class="choose-name">反水比例</span>
        <input type="text" value="'.$row["bjkn_bet_reb"].'" id="four_ball_1-h24" />    </td>
    </tr>
    <tr style="display:none;">
        <th>广东11选5</th>
        <td class="choose">
            <span class="choose-name">投注最小金额</span>
        <input type="text" value="'.$row["gd11_lower_bet"].'" id="four_ball_1-h25" />    </td>
        <td class="choose">
            <span class="choose-name">投注最大金额</span>
        <input type="text" value="'.$row["gd11_max_bet"].'" id="four_ball_1-h48"  style="width: 70px;"/>    </td>
        <td class="choose">
            <span class="choose-name">反水最小金额</span>
        <input type="text" value="'.$row["gd11_bet"].'" id="four_ball_1-h26" />    </td>
        <td class="choose">
            <span class="choose-name">反水比例</span>
        <input type="text" value="'.$row["gd11_bet_reb"].'" id="four_ball_1-h27" />    </td>
    </tr>
    <tr style="display:none;">
        <th>上海时时乐</th>
        <td class="choose">
            <span class="choose-name">投注最小金额</span>
        <input type="text" value="'.$row["t3_lower_bet"].'" id="four_ball_1-h28" />    </td>
        <td class="choose">
            <span class="choose-name">投注最大金额</span>
        <input type="text" value="'.$row["t3_max_bet"].'" id="four_ball_1-h49"  style="width: 70px;"/>    </td>
        <td class="choose">
            <span class="choose-name">反水最小金额</span>
        <input type="text" value="'.$row["t3_bet"].'" id="four_ball_1-h29" />    </td>
        <td class="choose">
            <span class="choose-name">反水比例</span>
        <input type="text" value="'.$row["t3_bet_reb"].'" id="four_ball_1-h30" />    </td>
    </tr>
    <tr >
        <th>3D彩</th>
        <td class="choose">
            <span class="choose-name">投注最小金额</span>
        <input type="text" value="'.$row["d3_lower_bet"].'" id="four_ball_1-h31" />    </td>
        <td class="choose">
            <span class="choose-name">投注最大金额</span>
        <input type="text" value="'.$row["d3_max_bet"].'" id="four_ball_1-h50"  style="width: 70px;"/>    </td>
        <td class="choose">
            <span class="choose-name">反水最小金额</span>
        <input type="text" value="'.$row["d3_bet"].'" id="four_ball_1-h32" />    </td>
        <td class="choose">
            <span class="choose-name">反水比例</span>
        <input type="text" value="'.$row["d3_bet_reb"].'" id="four_ball_1-h33" />    </td>
    </tr>
    <tr>
        <th>排列三</th>
        <td class="choose">
            <span class="choose-name">投注最小金额</span>
        <input type="text" value="'.$row["p3_lower_bet"].'" id="four_ball_1-h34" />    </td>
        <td class="choose">
            <span class="choose-name">投注最大金额</span>
        <input type="text" value="'.$row["p3_max_bet"].'" id="four_ball_1-h51"  style="width: 70px;"/>    </td>
        <td class="choose">
            <span class="choose-name">反水最小金额</span>
        <input type="text" value="'.$row["p3_bet"].'" id="four_ball_1-h35" />    </td>
        <td class="choose">
            <span class="choose-name">反水比例</span>
        <input type="text" value="'.$row["p3_bet_reb"].'" id="four_ball_1-h36" />    </td>
    </tr>
    <tr style="display:none;">
        <th>六合彩</th>
        <td class="choose">
            <span class="choose-name">投注最小金额</span>
        <input type="text" value="'.$row["lhc_lower_bet"].'" id="four_ball_1-h37" />    </td>
        <td class="choose">
            <span class="choose-name">投注最大金额</span>
        <input type="text" value="'.$row["lhc_max_bet"].'" id="four_ball_1-h52"  style="width: 70px;"/>    </td>
        <td class="choose">
            <span class="choose-name">反水最小金额</span>
        <input type="text" value="'.$row["lhc_bet"].'" id="four_ball_1-h38" />    </td>
        <td class="choose">
            <span class="choose-name">反水比例</span>
        <input type="text" value="'.$row["lhc_bet_reb"].'" id="four_ball_1-h39" />    </td>
    </tr>
    <tr style="display:none;">
        <th>体育下注</th>
        <td class="choose">
            <span class="choose-name">投注最小金额</span>
        <input type="text" value="'.$row["sports_lower_bet"].'" id="four_ball_1-h57" />    </td>
        <td class="choose">
            <span class="choose-name">--</span>
          </td>
        <td class="choose">
            <span class="choose-name">反水最小金额</span>
        <input type="text" value="'.$row["sports_bet"].'" id="four_ball_1-h58" />    </td>
        <td class="choose">
            <span class="choose-name">反水比例</span>
        <input type="text" value="'.$row["sports_bet_reb"].'" id="four_ball_1-h59" />    </td>
    </tr>
</table> ';
$mysqli->close();