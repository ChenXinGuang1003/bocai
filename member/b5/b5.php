<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include "../../app/member/include/address.mem.php";
include "../../app/member/include/com_chk.php";
include "../../app/member/common/function.php";
include "../../app/member/utils/convert_name.php";
include "../../app/member/utils/time_util.php";
include "../../app/member/class/lottery_schedule.php";
include "../../app/member/class/odds_lottery_normal.php";
include "../../app/member/class/user_group.php";
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/cache/ltConfig.php");


$gType = $_GET["gtype"];
$rType = $_GET["rtype"];

include_once "b5_util.php";

$time_info_page = '
<div id="game_info">
    <span class="GameTime">第<span id="YearNum">'.$qishu.'</span>期</span>&nbsp;&nbsp;
    <b>开奖日期:</b><span class="EndTime">'.$endTime.'</span>
    <span id="ui-countdown">
        <div id="FCDL">
            <span>
              <span id="FCDH">'.$FCDH.'</span>
              <span id="FCDS" style="display:none">'.$differTime.'</span>
            </span>
        </div>
    </span>
</div>
';

include_once "pages/$rType.php";
$mysqli->close();
exit;