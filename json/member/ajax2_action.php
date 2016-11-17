<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include "../../app/member/include/address.mem.php";
include "../../app/member/include/com_chk.php";
include "../../app/member/common/function.php";

include "../../app/member/class/six_lottery_odds.php";
include_once($C_Patch."/member/lt/lt_year_change.php");

$rType = $_GET["rtype"];
$rTypeN = $_GET["rtypeN"];

if($rType=="NAP" && $rTypeN=="N1"){//正码过关，加载界面
    $odds_NAP1 = six_lottery_odds::getOdds("NAP1");
    $odds_NAP2 = six_lottery_odds::getOdds("NAP2");
    $odds_NAP3 = six_lottery_odds::getOdds("NAP3");
    $odds_NAP4 = six_lottery_odds::getOdds("NAP4");
    $odds_NAP5 = six_lottery_odds::getOdds("NAP5");
    $odds_NAP6 = six_lottery_odds::getOdds("NAP6");

    include_once "pages/$rType.php";
}elseif($rType=="NX" && $rTypeN=="N1"){//合肖
    include_once "pages/$rType.php";
}elseif($rType=="NX"&& is_null($rTypeN)){//合肖
    $odds_NX = six_lottery_odds::getOdds("NX");

    echo '{"SELECT_1":'.$odds_NX["h1"].',"SELECT_2":'.$odds_NX["h2"].',"SELECT_3":'.$odds_NX["h3"].',"SELECT_4":'.$odds_NX["h4"].',"SELECT_5":'.$odds_NX["h5"].',"SELECT_6":'.$odds_NX["h6"].',"SELECT_7":'.$odds_NX["h7"].',"SELECT_8":'.$odds_NX["h8"].',"SELECT_9":'.$odds_NX["h9"].',"SELECT_10":'.$odds_NX["h10"].',"SELECT_11":'.$odds_NX["h11"].'}';
}elseif($rType=="CH" && $rTypeN=="N1"){//连码
    $odds_CH = six_lottery_odds::getOdds("CH");

    include_once "pages/$rType.php";
}elseif($rType=="LX" && $rTypeN=="N1"){//连肖
    include_once "pages/$rType.php";
}elseif($rType=="LX" && is_null($rTypeN)){//连肖
    $odds_LX2 = six_lottery_odds::getOdds("LX2");
    $odds_LX3 = six_lottery_odds::getOdds("LX3");
    $odds_LX4 = six_lottery_odds::getOdds("LX4");
    $odds_LX5 = six_lottery_odds::getOdds("LX5");

    $odds_LF2 = six_lottery_odds::getOdds("LF2");
    $odds_LF3 = six_lottery_odds::getOdds("LF3");
    $odds_LF4 = six_lottery_odds::getOdds("LF4");
    $odds_LF5 = six_lottery_odds::getOdds("LF5");

    echo '{"LX2_1":'.$odds_LX2["h1"].',"LX2_2":'.$odds_LX2["h2"].',"LX2_3":'.$odds_LX2["h3"].',"LX2_4":'.$odds_LX2["h4"].',"LX2_5":'.$odds_LX2["h5"].',"LX2_6":'.$odds_LX2["h6"].',"LX2_7":'.$odds_LX2["h7"].',"LX2_8":'.$odds_LX2["h8"].',"LX2_9":'.$odds_LX2["h9"].',"LX2_A":'.$odds_LX2["h10"].',"LX2_B":'.$odds_LX2["h11"].',"LX2_C":'.$odds_LX2["h12"].',
    "LF20":'.$odds_LF2["h1"].',"LF21":'.$odds_LF2["h2"].',"LF22":'.$odds_LF2["h3"].',"LF23":'.$odds_LF2["h4"].',"LF24":'.$odds_LF2["h5"].',"LF25":'.$odds_LF2["h6"].',"LF26":'.$odds_LF2["h7"].',"LF27":'.$odds_LF2["h8"].',"LF28":'.$odds_LF2["h9"].',"LF29":'.$odds_LF2["h10"].',
    "LX3_1":'.$odds_LX3["h1"].',"LX3_2":'.$odds_LX3["h2"].',"LX3_3":'.$odds_LX3["h3"].',"LX3_4":'.$odds_LX3["h4"].',"LX3_5":'.$odds_LX3["h5"].',"LX3_6":'.$odds_LX3["h6"].',"LX3_7":'.$odds_LX3["h7"].',"LX3_8":'.$odds_LX3["h8"].',"LX3_9":'.$odds_LX3["h9"].',"LX3_A":'.$odds_LX3["h10"].',"LX3_B":'.$odds_LX3["h11"].',"LX3_C":'.$odds_LX3["h12"].',
    "LF30":'.$odds_LF3["h1"].',"LF31":'.$odds_LF3["h2"].',"LF32":'.$odds_LF3["h3"].',"LF33":'.$odds_LF3["h4"].',"LF34":'.$odds_LF3["h5"].',"LF35":'.$odds_LF3["h6"].',"LF36":'.$odds_LF3["h7"].',"LF37":'.$odds_LF3["h8"].',"LF38":'.$odds_LF3["h9"].',"LF39":'.$odds_LF3["h10"].',
    "LX4_1":'.$odds_LX4["h1"].',"LX4_2":'.$odds_LX4["h2"].',"LX4_3":'.$odds_LX4["h3"].',"LX4_4":'.$odds_LX4["h4"].',"LX4_5":'.$odds_LX4["h5"].',"LX4_6":'.$odds_LX4["h6"].',"LX4_7":'.$odds_LX4["h7"].',"LX4_8":'.$odds_LX4["h8"].',"LX4_9":'.$odds_LX4["h9"].',"LX4_A":'.$odds_LX4["h10"].',"LX4_B":'.$odds_LX4["h11"].',"LX4_C":'.$odds_LX4["h12"].',
    "LF40":'.$odds_LF4["h1"].',"LF41":'.$odds_LF4["h2"].',"LF42":'.$odds_LF4["h3"].',"LF43":'.$odds_LF4["h4"].',"LF44":'.$odds_LF4["h5"].',"LF45":'.$odds_LF4["h6"].',"LF46":'.$odds_LF4["h7"].',"LF47":'.$odds_LF4["h8"].',"LF48":'.$odds_LF4["h9"].',"LF49":'.$odds_LF4["h10"].',
    "LX5_1":'.$odds_LX5["h1"].',"LX5_2":'.$odds_LX5["h2"].',"LX5_3":'.$odds_LX5["h3"].',"LX5_4":'.$odds_LX5["h4"].',"LX5_5":'.$odds_LX5["h5"].',"LX5_6":'.$odds_LX5["h6"].',"LX5_7":'.$odds_LX5["h7"].',"LX5_8":'.$odds_LX5["h8"].',"LX5_9":'.$odds_LX5["h9"].',"LX5_A":'.$odds_LX5["h10"].',"LX5_B":'.$odds_LX5["h11"].',"LX5_C":'.$odds_LX5["h12"].',
    "LF50":'.$odds_LF5["h1"].',"LF51":'.$odds_LF5["h2"].',"LF52":'.$odds_LF5["h3"].',"LF53":'.$odds_LF5["h4"].',"LF54":'.$odds_LF5["h5"].',"LF55":'.$odds_LF5["h6"].',"LF56":'.$odds_LF5["h7"].',"LF57":'.$odds_LF5["h8"].',"LF58":'.$odds_LF5["h9"].',"LF59":'.$odds_LF5["h10"].'}';
}elseif($rType=="NI" && $rTypeN=="N1"){//自选不中
    $odds_NI = six_lottery_odds::getOdds("NI");

    include_once "pages/$rType.php";
}

elseif(in_array($rType,array("NA","NAS","NO","OEOU","SP","SPA","C7","SPB","HB")) && $rTypeN=="N1"){//正码其他界面
    include_once "pages/NA.php";
}

$mysqli->close();