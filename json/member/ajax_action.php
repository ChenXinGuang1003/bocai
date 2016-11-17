<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include "../../app/member/include/address.mem.php";
include "../../app/member/include/com_chk.php";
include "../../app/member/common/function.php";
include "../../app/member/utils/time_util.php";
include "../../app/member/class/six_lottery_odds.php";
include "../../app/member/class/six_lottery_schedule.php";
include "../../app/member/class/user_group.php";
include "../../app/member/class/sys_announcement.php";
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/cache/ltConfig.php");
include_once($C_Patch."/resource/lottery/result/Js_Class.php");

$rType = $_GET["rtype"];
$rTypeN = $_GET["rtypeN"];
$showTableN = $_GET["showTableN"];

$announcement = sys_announcement::getOneAnnouncement();

include_once "../../member/lt/lt_util.php";

if($is_close_admin=="true"){
    echo '
    { "isCloseAdmin":"true","Msg":"'.$announcement.'", "reason":"'.$is_close_reason.'"}
    ';
    exit;
}elseif($is_close_no_game == "true"){
    echo '
    { "isCloseNoGame":"true","Msg":"'.$announcement.'", "reason":"目前没有开盘，请咨询客服人员。"}
    ';
    exit;
}elseif($is_close == "true"){
    $sql = "select ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7 from lottery_result_lhc where qishu='$qishu'";
    $query	=	$mysqli->query($sql);
    $row    =	$query->fetch_array();
    $ball_count = 0;
    $result = "";
    $animal = "";
    if($row){
        if($row["ball_1"]){
            $ball_count +=1;
            $result .= '"'.$row["ball_1"].'",';
            $animal .= '"'.lhc_sum_sx($row["ball_1"]).'",';
        }
        if($row["ball_2"]){
            $ball_count +=1;
            $result .= '"'.$row["ball_2"].'",';
            $animal .= '"'.lhc_sum_sx($row["ball_2"]).'",';
        }
        if($row["ball_3"]){
            $ball_count +=1;
            $result .= '"'.$row["ball_3"].'",';
            $animal .= '"'.lhc_sum_sx($row["ball_3"]).'",';
        }
        if($row["ball_4"]){
            $ball_count +=1;
            $result .= '"'.$row["ball_4"].'",';
            $animal .= '"'.lhc_sum_sx($row["ball_4"]).'",';
        }
        if($row["ball_5"]){
            $ball_count +=1;
            $result .= '"'.$row["ball_5"].'",';
            $animal .= '"'.lhc_sum_sx($row["ball_5"]).'",';
        }
        if($row["ball_6"]){
            $ball_count +=1;
            $result .= '"'.$row["ball_6"].'",';
            $animal .= '"'.lhc_sum_sx($row["ball_6"]).'",';
        }
        if($row["ball_7"]){
            $ball_count +=1;
            $result .= '"'.$row["ball_7"].'",';
            $animal .= '"'.lhc_sum_sx($row["ball_7"]).'",';
        }
    }
    if($ball_count>0){
        $result = substr($result,0,-1);
        $animal = substr($animal,0,-1);
    }
    echo '{"BetLineD":"N","gID":null,"Line_M":"4","result":['.$result.'],"resultAN":['.$animal.'],"lenb":'.$ball_count.',"stopTime":0,"stopTime2":null,"stopTime3":null,"CloseTime":{"1":'.$differTime.',"2":'.$differTime.',"3":'.($differTime-180).'},"gNum":"","gTime":"","Msg":"'.$announcement.'","num":0,"HKtime":"'.$bj_time_now.'","timezone":"\u7f8e\u6771","iTime":'.time().'}';
    exit;
}
$timeInfo = '"result":[],"resultAN":null,"lenb":0,"stopTime":4,"stopTime2":"4","stopTime3":"1","CloseTime":{"1":'.$differTime.',"2":'.$differTime.',"3":'.($differTime-180).'},"gNum":"'.$qishu.'","gTime":"'.$endTime.'","Msg":"'.$announcement.'","num":1,"HKtime":"'.$bj_time_now.'","timezone":"\u7f8e\u6771","iTime":'.time().'';

if($rType=="SP"){
    $odds_SP = six_lottery_odds::getOddsByBallType("SP","a_side");
    $odds_SP_other = six_lottery_odds::getOddsByBallType("SP","other");

    echo '
    {
        "BetLineD":"N","sTime":'.$fengpanTime.',"other_close":"0","gID":"SP","Line_M":"4",
        "SP01":'.$odds_SP["h1"].',"SP02":'.$odds_SP["h2"].',"SP03":'.$odds_SP["h3"].',"SP04":'.$odds_SP["h4"].',"SP05":'.$odds_SP["h5"].',"SP06":'.$odds_SP["h6"].',"SP07":'.$odds_SP["h7"].',"SP08":'.$odds_SP["h8"].',"SP09":'.$odds_SP["h9"].',"SP10":'.$odds_SP["h10"].',"SP11":'.$odds_SP["h11"].',"SP12":'.$odds_SP["h12"].',"SP13":'.$odds_SP["h13"].',"SP14":'.$odds_SP["h14"].',"SP15":'.$odds_SP["h15"].',"SP16":'.$odds_SP["h16"].',"SP17":'.$odds_SP["h17"].',"SP18":'.$odds_SP["h18"].',"SP19":'.$odds_SP["h19"].',"SP20":'.$odds_SP["h20"].',"SP21":'.$odds_SP["h21"].',"SP22":'.$odds_SP["h22"].',"SP23":'.$odds_SP["h23"].',"SP24":'.$odds_SP["h24"].',"SP25":'.$odds_SP["h25"].',"SP26":'.$odds_SP["h26"].',"SP27":'.$odds_SP["h27"].',"SP28":'.$odds_SP["h28"].',"SP29":'.$odds_SP["h29"].',"SP30":'.$odds_SP["h30"].',"SP31":'.$odds_SP["h31"].',"SP32":'.$odds_SP["h32"].',"SP33":'.$odds_SP["h33"].',"SP34":'.$odds_SP["h34"].',"SP35":'.$odds_SP["h35"].',"SP36":'.$odds_SP["h36"].',"SP37":'.$odds_SP["h37"].',"SP38":'.$odds_SP["h38"].',"SP39":'.$odds_SP["h39"].',"SP40":'.$odds_SP["h40"].',"SP41":'.$odds_SP["h41"].',"SP42":'.$odds_SP["h42"].',"SP43":'.$odds_SP["h43"].',"SP44":'.$odds_SP["h44"].',"SP45":'.$odds_SP["h45"].',"SP46":'.$odds_SP["h46"].',"SP47":'.$odds_SP["h47"].',"SP48":'.$odds_SP["h48"].',"SP49":'.$odds_SP["h49"].',
        "wtype":"SP",
        "SP_ODD":'.$odds_SP_other["h1"].',"SP_EVEN":'.$odds_SP_other["h2"].',"SP_OVER":'.$odds_SP_other["h3"].',"SP_UNDER":'.$odds_SP_other["h4"].',"SP_SODD":'.$odds_SP_other["h5"].',"SP_SEVEN":'.$odds_SP_other["h6"].',"SP_SOVER":'.$odds_SP_other["h7"].',"SP_SUNDER":'.$odds_SP_other["h8"].',"HS_OO":'.$odds_SP_other["h14"].',"HS_OU":'.$odds_SP_other["h15"].',"HS_EO":'.$odds_SP_other["h16"].',"HS_EU":'.$odds_SP_other["h17"].',"SF_OVER":'.$odds_SP_other["h9"].',"SF_UNDER":'.$odds_SP_other["h10"].',"SP_R":'.$odds_SP_other["h11"].',"SP_G":'.$odds_SP_other["h12"].',"SP_B":'.$odds_SP_other["h13"].',
        '.$timeInfo.'
    }
    ';
}elseif($rType=="SPbside"){
    $odds_SP = six_lottery_odds::getOdds("SP");
    $odds_SP_other = six_lottery_odds::getOddsByBallType("SP","other");

    echo '
    {
        "BetLineD":"N","sTime":'.$fengpanTime.',"other_close":"0","gID":"SPbside","Line_M":"4",
        "SP01":'.$odds_SP["h1"].',"SP02":'.$odds_SP["h2"].',"SP03":'.$odds_SP["h3"].',"SP04":'.$odds_SP["h4"].',"SP05":'.$odds_SP["h5"].',"SP06":'.$odds_SP["h6"].',"SP07":'.$odds_SP["h7"].',"SP08":'.$odds_SP["h8"].',"SP09":'.$odds_SP["h9"].',"SP10":'.$odds_SP["h10"].',"SP11":'.$odds_SP["h11"].',"SP12":'.$odds_SP["h12"].',"SP13":'.$odds_SP["h13"].',"SP14":'.$odds_SP["h14"].',"SP15":'.$odds_SP["h15"].',"SP16":'.$odds_SP["h16"].',"SP17":'.$odds_SP["h17"].',"SP18":'.$odds_SP["h18"].',"SP19":'.$odds_SP["h19"].',"SP20":'.$odds_SP["h20"].',"SP21":'.$odds_SP["h21"].',"SP22":'.$odds_SP["h22"].',"SP23":'.$odds_SP["h23"].',"SP24":'.$odds_SP["h24"].',"SP25":'.$odds_SP["h25"].',"SP26":'.$odds_SP["h26"].',"SP27":'.$odds_SP["h27"].',"SP28":'.$odds_SP["h28"].',"SP29":'.$odds_SP["h29"].',"SP30":'.$odds_SP["h30"].',"SP31":'.$odds_SP["h31"].',"SP32":'.$odds_SP["h32"].',"SP33":'.$odds_SP["h33"].',"SP34":'.$odds_SP["h34"].',"SP35":'.$odds_SP["h35"].',"SP36":'.$odds_SP["h36"].',"SP37":'.$odds_SP["h37"].',"SP38":'.$odds_SP["h38"].',"SP39":'.$odds_SP["h39"].',"SP40":'.$odds_SP["h40"].',"SP41":'.$odds_SP["h41"].',"SP42":'.$odds_SP["h42"].',"SP43":'.$odds_SP["h43"].',"SP44":'.$odds_SP["h44"].',"SP45":'.$odds_SP["h45"].',"SP46":'.$odds_SP["h46"].',"SP47":'.$odds_SP["h47"].',"SP48":'.$odds_SP["h48"].',"SP49":'.$odds_SP["h49"].',
        "wtype":"SPbside",
        "SP_ODD":'.$odds_SP_other["h1"].',"SP_EVEN":'.$odds_SP_other["h2"].',"SP_OVER":'.$odds_SP_other["h3"].',"SP_UNDER":'.$odds_SP_other["h4"].',"SP_SODD":'.$odds_SP_other["h5"].',"SP_SEVEN":'.$odds_SP_other["h6"].',"SP_SOVER":'.$odds_SP_other["h7"].',"SP_SUNDER":'.$odds_SP_other["h8"].',"HS_OO":'.$odds_SP_other["h14"].',"HS_OU":'.$odds_SP_other["h15"].',"HS_EO":'.$odds_SP_other["h16"].',"HS_EU":'.$odds_SP_other["h17"].',"SF_OVER":'.$odds_SP_other["h9"].',"SF_UNDER":'.$odds_SP_other["h10"].',"SP_R":'.$odds_SP_other["h11"].',"SP_G":'.$odds_SP_other["h12"].',"SP_B":'.$odds_SP_other["h13"].',
        '.$timeInfo.'
    }
    ';
}elseif($rType=="OEOU"){
    $odds1_other = six_lottery_odds::getOddsByBallType("N1","other");
    $odds2_other = six_lottery_odds::getOddsByBallType("N2","other");
    $odds3_other = six_lottery_odds::getOddsByBallType("N3","other");
    $odds4_other = six_lottery_odds::getOddsByBallType("N4","other");
    $odds5_other = six_lottery_odds::getOddsByBallType("N5","other");
    $odds6_other = six_lottery_odds::getOddsByBallType("N6","other");

    $odds_NA_other = six_lottery_odds::getOddsByBallType("NA","other");
    $odds_SP_other = six_lottery_odds::getOddsByBallType("SP","other");

    echo '
    {
        "BetLineD":"N","sTime":'.$fengpanTime.',"other_close":0,"gID":"OEOU",
        "SP_ODD":'.$odds_SP_other["h1"].',    "SP_EVEN":'.$odds_SP_other["h2"].',"SP_OVER":'.$odds_SP_other["h3"].',"SP_UNDER":'.$odds_SP_other["h4"].',"SP_SODD":'.$odds_SP_other["h5"].',"SP_SEVEN":'.$odds_SP_other["h6"].',"SP_SOVER":'.$odds_SP_other["h7"].',"SP_SUNDER":'.$odds_SP_other["h8"].',
        "HS_OO":0.02,"HS_OU":0.02,
        "NO1_ODD":'.$odds1_other["h1"].',   "NO2_ODD":'.$odds2_other["h1"].',"NO3_ODD":'.$odds3_other["h1"].',"NO4_ODD":'.$odds4_other["h1"].',         "NO5_ODD":'.$odds5_other["h1"].',"NO6_ODD":'.$odds6_other["h1"].',
        "NO1_EVEN":'.$odds1_other["h2"].',  "NO2_EVEN":'.$odds2_other["h2"].',"NO3_EVEN":'.$odds3_other["h2"].',"NO4_EVEN":'.$odds4_other["h2"].',      "NO5_EVEN":'.$odds5_other["h2"].',"NO6_EVEN":'.$odds6_other["h2"].',
        "NO1_OVER":'.$odds1_other["h3"].',  "NO2_OVER":'.$odds2_other["h3"].',"NO3_OVER":'.$odds3_other["h3"].',"NO4_OVER":'.$odds4_other["h3"].',      "NO5_OVER":'.$odds5_other["h3"].',"NO6_OVER":'.$odds6_other["h3"].',
        "NO1_UNDER":'.$odds1_other["h4"].', "NO2_UNDER":'.$odds2_other["h4"].',"NO3_UNDER":'.$odds3_other["h4"].',"NO4_UNDER":'.$odds4_other["h4"].',  "NO5_UNDER":'.$odds5_other["h4"].',"NO6_UNDER":'.$odds6_other["h4"].',
        "NO1_SODD":'.$odds1_other["h5"].',  "NO2_SODD":'.$odds2_other["h5"].',"NO3_SODD":'.$odds3_other["h5"].',"NO4_SODD":'.$odds4_other["h5"].',      "NO5_SODD":'.$odds5_other["h5"].',"NO6_SODD":'.$odds6_other["h5"].',
        "NO1_SEVEN":'.$odds1_other["h6"].', "NO2_SEVEN":'.$odds2_other["h6"].',"NO3_SEVEN":'.$odds3_other["h6"].',"NO4_SEVEN":'.$odds4_other["h6"].',  "NO5_SEVEN":'.$odds5_other["h6"].',"NO6_SEVEN":'.$odds6_other["h6"].',
        "NO1_SOVER":'.$odds1_other["h7"].', "NO2_SOVER":'.$odds2_other["h7"].',"NO3_SOVER":'.$odds3_other["h7"].',"NO4_SOVER":'.$odds4_other["h7"].',   "NO5_SOVER":'.$odds5_other["h7"].',"NO6_SOVER":'.$odds6_other["h7"].',
        "NO1_SUNDER":'.$odds1_other["h8"].',"NO2_SUNDER":'.$odds2_other["h8"].',"NO3_SUNDER":'.$odds3_other["h8"].',"NO4_SUNDER":'.$odds4_other["h8"].',"NO5_SUNDER":'.$odds5_other["h8"].',"NO6_SUNDER":'.$odds6_other["h8"].',
        "wtype":"NA",
        "NA_ODD":'.$odds_NA_other["h1"].',"somebady0":0,"NA_EVEN":'.$odds_NA_other["h2"].',"somebady1":0,"NA_OVER":'.$odds_NA_other["h3"].',"somebady2":0,"NA_UNDER":'.$odds_NA_other["h4"].',"somebady3":0,
        '.$timeInfo.'
    }
    ';
}elseif($rType=="NA"){ //正码
    $odds_NA = six_lottery_odds::getOdds("NA");
    $odds_NA_other = six_lottery_odds::getOddsByBallType("NA","other");

    echo '
    {
        "BetLineD":"N","sTime":'.$fengpanTime.',"other_close":0,"gID":"NA",
        "NA01":'.$odds_NA["h1"].',"NA02":'.$odds_NA["h2"].',"NA03":'.$odds_NA["h3"].',"NA04":'.$odds_NA["h4"].',"NA05":'.$odds_NA["h5"].',"NA06":'.$odds_NA["h6"].',"NA07":'.$odds_NA["h7"].',"NA08":'.$odds_NA["h8"].',"NA09":'.$odds_NA["h9"].',"NA10":'.$odds_NA["h10"].',"NA11":'.$odds_NA["h11"].',"NA12":'.$odds_NA["h12"].',"NA13":'.$odds_NA["h13"].',"NA14":'.$odds_NA["h14"].',"NA15":'.$odds_NA["h15"].',"NA16":'.$odds_NA["h16"].',"NA17":'.$odds_NA["h17"].',"NA18":'.$odds_NA["h18"].',"NA19":'.$odds_NA["h19"].',"NA20":'.$odds_NA["h20"].',"NA21":'.$odds_NA["h21"].',"NA22":'.$odds_NA["h22"].',"NA23":'.$odds_NA["h23"].',"NA24":'.$odds_NA["h24"].',"NA25":'.$odds_NA["h25"].',"NA26":'.$odds_NA["h26"].',"NA27":'.$odds_NA["h27"].',"NA28":'.$odds_NA["h28"].',"NA29":'.$odds_NA["h29"].',"NA30":'.$odds_NA["h30"].',"NA31":'.$odds_NA["h31"].',"NA32":'.$odds_NA["h32"].',"NA33":'.$odds_NA["h33"].',"NA34":'.$odds_NA["h34"].',"NA35":'.$odds_NA["h35"].',"NA36":'.$odds_NA["h36"].',"NA37":'.$odds_NA["h37"].',"NA38":'.$odds_NA["h38"].',"NA39":'.$odds_NA["h39"].',"NA40":'.$odds_NA["h40"].',"NA41":'.$odds_NA["h41"].',"NA42":'.$odds_NA["h42"].',"NA43":'.$odds_NA["h43"].',"NA44":'.$odds_NA["h44"].',"NA45":'.$odds_NA["h45"].',"NA46":'.$odds_NA["h46"].',"NA47":'.$odds_NA["h47"].',"NA48":'.$odds_NA["h48"].',"NA49":'.$odds_NA["h49"].',
        "wtype":"NA",
        "NA_ODD":'.$odds_NA_other["h1"].',"NA_EVEN":'.$odds_NA_other["h2"].',"NA_OVER":'.$odds_NA_other["h3"].',"NA_UNDER":'.$odds_NA_other["h4"].',
        '.$timeInfo.'
        }
    ';
}elseif($rType=="NAS"){ //正码特
    $oddsN = six_lottery_odds::getOdds($rTypeN);

    echo '
    {
        "BetLineD":"N","sTime":'.$fengpanTime.',"gID":"'.$rTypeN.'",
        "'.$rTypeN.'01":'.$oddsN["h1"].',"'.$rTypeN.'02":'.$oddsN["h2"].',"'.$rTypeN.'03":'.$oddsN["h3"].',"'.$rTypeN.'04":'.$oddsN["h4"].',"'.$rTypeN.'05":'.$oddsN["h5"].',"'.$rTypeN.'06":'.$oddsN["h6"].',"'.$rTypeN.'07":'.$oddsN["h7"].',"'.$rTypeN.'08":'.$oddsN["h8"].',"'.$rTypeN.'09":'.$oddsN["h9"].',"'.$rTypeN.'10":'.$oddsN["h10"].',"'.$rTypeN.'11":'.$oddsN["h11"].',"'.$rTypeN.'12":'.$oddsN["h12"].',"'.$rTypeN.'13":'.$oddsN["h13"].',"'.$rTypeN.'14":'.$oddsN["h14"].',"'.$rTypeN.'15":'.$oddsN["h15"].',"'.$rTypeN.'16":'.$oddsN["h16"].',"'.$rTypeN.'17":'.$oddsN["h17"].',"'.$rTypeN.'18":'.$oddsN["h18"].',"'.$rTypeN.'19":'.$oddsN["h19"].',"'.$rTypeN.'20":'.$oddsN["h20"].',"'.$rTypeN.'21":'.$oddsN["h21"].',"'.$rTypeN.'22":'.$oddsN["h22"].',"'.$rTypeN.'23":'.$oddsN["h23"].',"'.$rTypeN.'24":'.$oddsN["h24"].',"'.$rTypeN.'25":'.$oddsN["h25"].',"'.$rTypeN.'26":'.$oddsN["h26"].',"'.$rTypeN.'27":'.$oddsN["h27"].',"'.$rTypeN.'28":'.$oddsN["h28"].',"'.$rTypeN.'29":'.$oddsN["h29"].',"'.$rTypeN.'30":'.$oddsN["h30"].',"'.$rTypeN.'31":'.$oddsN["h31"].',"'.$rTypeN.'32":'.$oddsN["h32"].',"'.$rTypeN.'33":'.$oddsN["h33"].',"'.$rTypeN.'34":'.$oddsN["h34"].',"'.$rTypeN.'35":'.$oddsN["h35"].',"'.$rTypeN.'36":'.$oddsN["h36"].',"'.$rTypeN.'37":'.$oddsN["h37"].',"'.$rTypeN.'38":'.$oddsN["h38"].',"'.$rTypeN.'39":'.$oddsN["h39"].',"'.$rTypeN.'40":'.$oddsN["h40"].',"'.$rTypeN.'41":'.$oddsN["h41"].',"'.$rTypeN.'42":'.$oddsN["h42"].',"'.$rTypeN.'43":'.$oddsN["h43"].',"'.$rTypeN.'44":'.$oddsN["h44"].',"'.$rTypeN.'45":'.$oddsN["h45"].',"'.$rTypeN.'46":'.$oddsN["h46"].',"'.$rTypeN.'47":'.$oddsN["h47"].',"'.$rTypeN.'48":'.$oddsN["h48"].',"'.$rTypeN.'49":'.$oddsN["h49"].',
        '.$timeInfo.'
    }
    ';
}elseif($rType=="NO"){//正码1~6
    $odds1_other = six_lottery_odds::getOddsByBallType("N1","other");
    $odds2_other = six_lottery_odds::getOddsByBallType("N2","other");
    $odds3_other = six_lottery_odds::getOddsByBallType("N3","other");
    $odds4_other = six_lottery_odds::getOddsByBallType("N4","other");
    $odds5_other = six_lottery_odds::getOddsByBallType("N5","other");
    $odds6_other = six_lottery_odds::getOddsByBallType("N6","other");

    echo '
    {
        "BetLineD":"N","sTime":'.$fengpanTime.',"other_close":"0","gID":"NO",
        "NO1_ODD":'.$odds1_other["h1"].',"NO2_ODD":'.$odds2_other["h1"].',"NO3_ODD":'.$odds3_other["h1"].',      "NO4_ODD":'.$odds4_other["h1"].',"NO5_ODD":'.$odds5_other["h1"].',"NO6_ODD":'.$odds6_other["h1"].',
        "NO1_EVEN":'.$odds1_other["h2"].',"NO2_EVEN":'.$odds2_other["h2"].',"NO3_EVEN":'.$odds3_other["h2"].',     "NO4_EVEN":'.$odds4_other["h2"].',"NO5_EVEN":'.$odds5_other["h2"].',"NO6_EVEN":'.$odds6_other["h2"].',
        "NO1_OVER":'.$odds1_other["h3"].',"NO2_OVER":'.$odds2_other["h3"].',"NO3_OVER":'.$odds3_other["h3"].',     "NO4_OVER":'.$odds4_other["h3"].',"NO5_OVER":'.$odds5_other["h3"].',"NO6_OVER":'.$odds6_other["h3"].',
        "NO1_UNDER":'.$odds1_other["h4"].',"NO2_UNDER":'.$odds2_other["h4"].',"NO3_UNDER":'.$odds3_other["h4"].',  "NO4_UNDER":'.$odds4_other["h4"].',"NO5_UNDER":'.$odds5_other["h4"].',"NO6_UNDER":'.$odds6_other["h4"].',
        "NO1_SODD":'.$odds1_other["h5"].',"NO2_SODD":'.$odds2_other["h5"].',"NO3_SODD":'.$odds3_other["h5"].',      "NO4_SODD":'.$odds4_other["h5"].',"NO5_SODD":'.$odds5_other["h5"].',"NO6_SODD":'.$odds6_other["h5"].',
        "NO1_SEVEN":'.$odds1_other["h6"].',"NO2_SEVEN":'.$odds2_other["h6"].',"NO3_SEVEN":'.$odds3_other["h6"].',  "NO4_SEVEN":'.$odds4_other["h6"].',"NO5_SEVEN":'.$odds5_other["h6"].',"NO6_SEVEN":'.$odds6_other["h6"].',
        "NO1_SOVER":'.$odds1_other["h7"].',"NO2_SOVER":'.$odds2_other["h7"].',"NO3_SOVER":'.$odds3_other["h7"].',  "NO4_SOVER":'.$odds4_other["h7"].',"NO5_SOVER":'.$odds5_other["h7"].',"NO6_SOVER":'.$odds6_other["h7"].',
        "NO1_SUNDER":'.$odds1_other["h8"].',"NO2_SUNDER":'.$odds2_other["h8"].',"NO3_SUNDER":'.$odds3_other["h8"].',"NO4_SUNDER":'.$odds4_other["h8"].',"NO5_SUNDER":'.$odds5_other["h8"].',"NO6_SUNDER":'.$odds6_other["h8"].',
        "NO1_FOVER":'.$odds1_other["h9"].',"NO2_FOVER":'.$odds2_other["h9"].',"NO3_FOVER":'.$odds3_other["h9"].',   "NO4_FOVER":'.$odds4_other["h9"].',"NO5_FOVER":'.$odds5_other["h9"].',"NO6_FOVER":'.$odds6_other["h9"].',
        "NO1_FUNDER":'.$odds1_other["h10"].',"NO2_FUNDER":'.$odds2_other["h10"].',"NO3_FUNDER":'.$odds3_other["h10"].',"NO4_FUNDER":'.$odds4_other["h10"].',"NO5_FUNDER":'.$odds5_other["h10"].',"NO6_FUNDER":'.$odds6_other["h10"].',
        "NO1_R":'.$odds1_other["h11"].',"NO2_R":'.$odds2_other["h11"].',"NO3_R":'.$odds3_other["h11"].',                    "NO4_R":'.$odds4_other["h11"].',"NO5_R":'.$odds5_other["h11"].',"NO6_R":'.$odds6_other["h11"].',
        "NO1_G":'.$odds1_other["h12"].',"NO2_G":'.$odds2_other["h12"].',"NO3_G":'.$odds3_other["h12"].',                    "NO4_G":'.$odds4_other["h12"].',"NO5_G":'.$odds5_other["h12"].',"NO6_G":'.$odds6_other["h12"].',
        "NO1_B":'.$odds1_other["h13"].',"NO2_B":'.$odds2_other["h13"].',"NO3_B":'.$odds3_other["h13"].',                    "NO4_B":'.$odds4_other["h13"].',"NO5_B":'.$odds5_other["h13"].',"NO6_B":'.$odds6_other["h13"].',
        '.$timeInfo.'
        }
    ';
}elseif($rType=="NAP"){//正码过关
    echo '
    {"BetLineD":"N","gID":"NAP",
    '.$timeInfo.'
    }
    ';
}

elseif($rType=="SPA"){//生肖、色波、头尾数
    $odds_SP_other = six_lottery_odds::getOddsByBallType("SP","other");
    $odds_SPA = six_lottery_odds::getOdds("SPA");

    echo '
    {"BetLineD":"N","sTime":'.$fengpanTime.',"other_close":"0","gID":"SPA","show_table_n":"'.$showTableN.'",
    "SP_A1":'.$odds_SPA["h1"].',"SP_A2":'.$odds_SPA["h2"].',"SP_A3":'.$odds_SPA["h3"].',"SP_A4":'.$odds_SPA["h4"].',"SP_A5":'.$odds_SPA["h5"].',"SP_A6":'.$odds_SPA["h6"].',"SP_A7":'.$odds_SPA["h7"].',"SP_A8":'.$odds_SPA["h8"].',"SP_A9":'.$odds_SPA["h9"].',"SP_AA":'.$odds_SPA["h10"].',"SP_AB":'.$odds_SPA["h11"].',"SP_AC":'.$odds_SPA["h12"].',    "SH0":'.$odds_SPA["h13"].',"SH1":'.$odds_SPA["h14"].',"SH2":'.$odds_SPA["h15"].',"SH3":'.$odds_SPA["h16"].',"SH4":'.$odds_SPA["h17"].',    "SF0":'.$odds_SPA["h18"].',"SF1":'.$odds_SPA["h19"].',"SF2":'.$odds_SPA["h20"].',"SF3":'.$odds_SPA["h21"].',"SF4":'.$odds_SPA["h22"].',"SF5":'.$odds_SPA["h23"].',"SF6":'.$odds_SPA["h24"].',"SF7":'.$odds_SPA["h25"].',"SF8":'.$odds_SPA["h26"].',"SF9":'.$odds_SPA["h27"].',
    "SP_R":'.$odds_SP_other["h11"].',"SP_G":'.$odds_SP_other["h12"].',"SP_B":'.$odds_SP_other["h13"].',
    '.$timeInfo.'
    }
    ';
}elseif($rType=="C7"){//正肖、七色波
    $odds_C7 = six_lottery_odds::getOdds("C7");

    echo '
    {"BetLineD":"N","sTime":'.$fengpanTime.',"gID":"C7","show_table_n":"'.$showTableN.'",
    "NA_A1":'.$odds_C7["h1"].',"NA_A2":'.$odds_C7["h2"].',"NA_A3":'.$odds_C7["h3"].',"NA_A4":'.$odds_C7["h4"].',"NA_A5":'.$odds_C7["h5"].',"NA_A6":'.$odds_C7["h6"].',"NA_A7":'.$odds_C7["h7"].',"NA_A8":'.$odds_C7["h8"].',"NA_A9":'.$odds_C7["h9"].',"NA_AA":'.$odds_C7["h10"].',"NA_AB":'.$odds_C7["h11"].',"NA_AC":'.$odds_C7["h12"].',"C7_R":'.$odds_C7["h13"].',"C7_B":'.$odds_C7["h14"].',"C7_G":'.$odds_C7["h15"].',"C7_N":'.$odds_C7["h16"].',
    '.$timeInfo.'
    }
    ';
}elseif($rType=="SPB"){//一肖、总肖、正特尾数
    $odds_SPB = six_lottery_odds::getOdds("SPB");

    echo '
    {"BetLineD":"N","sTime":'.$fengpanTime.',"other_close":"0","gID":"SPB","show_table_n":"'.$showTableN.'",
    "SP_B1":'.$odds_SPB["h1"].',"SP_B2":'.$odds_SPB["h2"].',"SP_B3":'.$odds_SPB["h3"].',"SP_B4":'.$odds_SPB["h4"].',"SP_B5":'.$odds_SPB["h5"].',"SP_B6":'.$odds_SPB["h6"].',"SP_B7":'.$odds_SPB["h7"].',"SP_B8":'.$odds_SPB["h8"].',"SP_B9":'.$odds_SPB["h9"].',"SP_BA":'.$odds_SPB["h10"].',"SP_BB":'.$odds_SPB["h11"].',"SP_BC":'.$odds_SPB["h12"].',"NF0":'.$odds_SPB["h13"].',"NF1":'.$odds_SPB["h14"].',"NF2":'.$odds_SPB["h15"].',"NF3":'.$odds_SPB["h16"].',"NF4":'.$odds_SPB["h17"].',"NF5":'.$odds_SPB["h18"].',"NF6":'.$odds_SPB["h19"].',"NF7":'.$odds_SPB["h20"].',"NF8":'.$odds_SPB["h21"].',"NF9":'.$odds_SPB["h22"].',"TX2":'.$odds_SPB["h23"].',"TX5":'.$odds_SPB["h24"].',"TX6":'.$odds_SPB["h25"].',"TX7":'.$odds_SPB["h26"].',"TX_ODD":'.$odds_SPB["h27"].',"TX_EVEN":'.$odds_SPB["h28"].',
    '.$timeInfo.'
    }
    ';
}elseif($rType=="NX"){//合肖
    echo '
    {"BetLineD":"N","gID":"NX",
    '.$timeInfo.'
    }
    ';
}

elseif($rType=="HB"){//半波、半半波
    $odds_HB = six_lottery_odds::getOdds("HB");

    echo '
    {"BetLineD":"N","sTime":'.$fengpanTime.',"other_close":0,"gID":"HB","show_table_n":"'.$showTableN.'",
    "HB_RODD":'.$odds_HB["h1"].',"HB_REVEN":'.$odds_HB["h2"].',"HB_ROVER":'.$odds_HB["h3"].',"HB_RUNDER":'.$odds_HB["h4"].',"HB_GODD":'.$odds_HB["h5"].',"HB_GEVEN":'.$odds_HB["h6"].',"HB_GOVER":'.$odds_HB["h7"].',"HB_GUNDER":'.$odds_HB["h8"].',"HB_BODD":'.$odds_HB["h9"].',"HB_BEVEN":'.$odds_HB["h10"].',"HB_BOVER":'.$odds_HB["h11"].',"HB_BUNDER":'.$odds_HB["h12"].',"HH_ROO":'.$odds_HB["h13"].',"HH_ROE":'.$odds_HB["h14"].',"HH_RUO":'.$odds_HB["h15"].',"HH_RUE":'.$odds_HB["h16"].',"HH_GOO":'.$odds_HB["h17"].',"HH_GOE":'.$odds_HB["h18"].',"HH_GUO":'.$odds_HB["h19"].',"HH_GUE":'.$odds_HB["h20"].',"HH_BOO":'.$odds_HB["h21"].',"HH_BOE":'.$odds_HB["h22"].',"HH_BUO":'.$odds_HB["h23"].',"HH_BUE":'.$odds_HB["h24"].',
    '.$timeInfo.'
    }
    ';
}

elseif($rType=="CH"){//连码
    echo '
    {"BetLineD":"N","gID":"CH",
    '.$timeInfo.'
    }
    ';
}

elseif($rType=="LX"){//连肖
    echo '
    {"BetLineD":"N","gID":"LX",
    '.$timeInfo.'
    }
    ';
}

elseif($rType=="NI"){//自选不中
    echo '
    {"BetLineD":"N","gID":"NI",
    '.$timeInfo.'
    }
    ';
}

$mysqli->close();