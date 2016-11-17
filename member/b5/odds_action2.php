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
include "../../app/member/class/odds_lottery_normal.php";
include "../../app/member/class/lottery_schedule.php";
include "../../app/member/class/user_group.php";
include "../../app/member/class/sys_announcement.php";
include "../../app/member/class/lottery_result_cq.php";
include "../../app/member/class/lottery_result_tj.php";
include "../../app/member/class/lottery_result_jx.php";
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/cache/ltConfig.php");

$gType = $_GET["gtype"];
$rType = $_GET["rtype"];
$gTypeLower = strtolower($gType);

$announcement = sys_announcement::getOneAnnouncement();

include_once "b5_util.php";
if ($gType == "CQ" || $gType == "TJ" || $gType == "JX") {

    $echoString = '
            $("#iTime").val("'.time().'");
            $("#Msg").text("'.str_replace("&nbsp;","",$announcement ).'");
            $("#c_rtype").text("'.getZhTitleName($gType, $rType).'");';

    if($is_close=="true"){
        if($gType == "CQ"){
            $result	=	lottery_result_cq::getLotteryResult($qishu);
        }elseif($gType == "TJ"){
            $result	=	lottery_result_tj::getLotteryResult($qishu);
        }elseif($gType == "JX"){
            $result	=	lottery_result_jx::getLotteryResult($qishu);
        }

        if(!is_null($result) && !is_null($result["ball_1"]) && !is_null($result["ball_2"]) && !is_null($result["ball_3"]) && !is_null($result["ball_4"]) && !is_null($result["ball_5"])){
            echo $echoString.'
            $("#YearNum").text("");
            iResultCount = 4;
            $("#num").text("'.$qishu.'");
            $("#final_01").text("'.$result["ball_1"].'");
            $("#final_02").text("'.$result["ball_2"].'");
            $("#final_03").text("'.$result["ball_3"].'");
            $("#final_04").text("'.$result["ball_4"].'");
            $("#final_05").text("'.$result["ball_5"].'");
            $(".odds").css("background-color","");
            $("#game_info").hide();
            ';
        }else{
            echo $echoString.'
            $("#YearNum").text("");
            iResultCount = 1;
            $("#num").text("'.$qishu.'");
            $("#final_01").text("");
            $("#final_02").text("");
            $("#final_03").text("");
            $("#final_04").text("");
            $("#final_05").text("");
            document.getElementById("Game").innerHTML = "<!--即时摇珠--><div class=\"round-table\"><table class=\"GameTable aniDissolve\" id=\"ff\">  <tr class=\"title_line\">    <td> 期数 </td>        <td> 号码 1 </td>    <td> 号码 2 </td>    <td> 号码 3 </td> <td> 号码 4 </td> <td> 号码 5 </td>      </tr>    <tr>    <td id=\"num\" style=\"font-weight:bold;\">'.$qishu.'</td>    <td id=\"final_01\" ></td>    <td id=\"final_02\" ></td>    <td id=\"final_03\" ></td> <td id=\"final_04\" ></td> <td id=\"final_05\" ></td>  </tr>  </table></div>";
            var num_col = $("#num");
            if ( ! "".match(/^\d+$/)) {
                startBallRandom(num_col);
            }
            $(".odds").css("background-color","");
            $("#game_info").hide();
            ';
        }
    }else{
        //****************** 开奖过后需要重新刷新界面到正常界面 _________________________
        echo $echoString.'
        $("#YearNum").text("' . $qishu . '");
        iResultCount = 1;
        $("#num").text("");
        $("#final_01").text();
        $("#final_02").text();
        $("#final_03").text();
        $("#final_04").text();
        $("#final_05").text();
        $(".odds").css("background-color","");
        $("#game_info").show();
        //离开奖时间 秒数
        $("#FCDS").text("'.$differTime.'");
        //期数
        $("#game_info span.GameNum").text("' . $qishu . '");
        //开奖日期
        $("#game_info span.EndTime").text("' . $endTime . '");
        var _form = (document.getElementById("formB5")) ? document.getElementById("formB5") : document.forms[0];
        $("span.GameNum", _form).text("' . $qishu . '");
        $("span.EndTime", _form).text("' . $endTime . '");
        if ($("#sRtype").val() == "'.$rType.'") {
            var Tables = _form.getElementsByTagName("table");
            var TableG = (Tables.length > 0) ? Tables[0] : null;
            if(TableG){
                var td, labels, inputs, _aOdds = _form["aOdds[]"], _aGold = _form["gold[]"], _aConcede = _form["aConcede[]"];
            }else if('.$isNeedReload.'){
                setTimeout("self.location.reload();",10000);
            }
        }';
    }
}
$mysqli->close();
exit;