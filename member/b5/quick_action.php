<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include "../../app/member/include/address.mem.php";
include "../../app/member/include/config.inc.php";
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

if($is_close=="true"){
    $endPage = getGameEndPage($qishu);
    echo 'document.getElementById("Game").innerHTML = '.$endPage.';
    document.getElementById("c_rtype").innerHTML = "'.$rTypeName.'";
    document.getElementById("sRtype").value = "'.$rType.'";
    if (document.getElementById("memberTop")) {
        var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
        h1.innerHTML = "'.$rTypeName.'";
    }

    $("#YearNum").text("'.$qishu.'");
    (self.GameB5.install) && self.GameB5.install();';
}else{
    include_once "gamepages/$rType.php";
}

function getGameEndPage($qishu){
    $page = '\'\'+
\'<div class="round-table">\'+
    \'<table class="GameTable aniDissolve" id="ff">\'+
      \'<tr class="title_line">\'+
        \'<td> 期数 </td>\'+
        \'<td> 号码 1 </td>\'+
        \'<td> 号码 2 </td>\'+
        \'<td> 号码 3 </td>\'+
        \'<td> 号码 4 </td>\'+
        \'<td> 号码 5 </td>\'+
          \'</tr>\'+
        \'<tr>\'+
        \'<td id="num" style="font-weight:bold;">'.$qishu.'</td>\'+
        \'<td id="final_01" ></td>\'+
        \'<td id="final_02" ></td>\'+
        \'<td id="final_03" ></td>\'+
        \'<td id="final_04" ></td>\'+
        \'<td id="final_05" ></td>\'+
      \'</tr>\'+
    \'</table>\'+
\'</div>\'';
    return $page;
}
$mysqli->close();
exit;