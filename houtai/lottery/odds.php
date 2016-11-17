<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

if($_GET["type"]=="广东十分彩"){
    include_once "oddssetting/GDSF/gdsfOdds.php";
}elseif($_GET["type"]=="天津十分彩"){
    include_once "oddssetting/TJSF/tjsfOdds.php";
}elseif($_GET["type"]=="广西十分彩"){
    include_once "oddssetting/GXSF/gxsfOdds.php";
}elseif($_GET["type"]=="北京PK拾"){
    include_once "oddssetting/BJPK/bjpkOdds.php";
}elseif($_GET["type"]=="北京快乐8"){
    include_once "oddssetting/BJKN/bjknOdds.php";
}elseif($_GET["type"]=="广东11选5"){
    include_once "oddssetting/GD11/gd11Odds.php";
}elseif($_GET["type"]=="重庆十分彩"){
    include_once "oddssetting/CQSF/cqsfOdds.php";
}elseif(in_array($_GET["type"], array("3D彩","排列三","上海时时乐"))){
    if($_GET["type"]=="3D彩"){
        $gType = "D3";
    }elseif($_GET["type"]=="排列三"){
        $gType = "P3";
    }elseif($_GET["type"]=="上海时时乐"){
        $gType = "T3";
    }
    include_once "oddssetting/B3/b3.php";
}elseif(in_array($_GET["type"], array("重庆时时彩","天津时时彩","江西时时彩"))){
    if($_GET["type"]=="重庆时时彩"){
        $gType = "CQ";
    }elseif($_GET["type"]=="天津时时彩"){
        $gType = "TJ";
    }elseif($_GET["type"]=="江西时时彩"){
        $gType = "JX";
    }
    include_once "oddssetting/B5/b5.php";
}

elseif($_GET["type"]=="六合彩"){
    include_once "oddssetting/LHC/lhc.php";
}