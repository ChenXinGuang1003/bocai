<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/user_group.php");

include_once("../../class/admin.php");
include_once("../../common/login_check.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

check_quanxian("修改网站信息");


$all_group = user_group::getAllGroup();

$group_string = "";
foreach($all_group as $key => $group){
    $group_id = $group["group_id"];
    $group_name = $group["group_name"];
    $group_string .= "<a title='$group_name' group='$group_id' href='#/config/$group_id'>$group_name</a>";
}

echo '
<!DOCTYPE HTML>
<html class="yellow zh-cn">
<head>
    <meta charset="UTF-8">
    <title>彩票金额设置</title>
    <link type="text/css" rel="stylesheet" href="/pt/assets/css/portal/mem_order_odds_setting.css?1390801674"/>
    <link type="text/css" rel="stylesheet" href="/pt/assets/css/jquery-ui-1.10.3.custom.min.css?1376993932"/>
    <link type="text/css" rel="stylesheet" href="/TPL/pitaya/style/View.css?c130b07"/>
    <link type="text/css" rel="stylesheet" href="/TPL/pitaya/style/jquery.GoldUI.css?c130b07"/>
    <link rel="stylesheet" type="text/css" href="/style/AlertBox.css?c130b07"/>
    <link rel="stylesheet" type="text/css" href="/style/ConfirmBox.css?c130b07"/>
    <link type="text/css" rel="stylesheet" href="/TPL/pitaya/style/tpl.css?c130b07"/>
    <script type="text/javascript" src="/inte/js/Lang.js?key=charset&v=759a239"></script>
    <script type="text/javascript" src="/inte/js/Lang/package.js?v=759a239"></script>
</head>

<!--[if IE 6]>
<body id="portal" class="IE6"><![endif]-->
<!--[if IE 7]>
<body id="portal" class="IE7"><![endif]-->
<!--[if IE 8]>
<body id="portal" class="IE8"><![endif]-->
<!--[if IE 9]>
<body id="portal" class="IE9"><![endif]-->
<!--[if !IE]> -->
<body id="portal" class="NOT_IE"><!-- <![endif]-->

<div id="box-body">
<div id="box-range">
<div id="box-range-inner">
<div id="main">
    <div class="main-inner">
        <div id="left" style="display:none"> <div id="message-box"> </div>
        </div>

        <div id="content">
            <div id="content-inner">
                <h2>
                    彩票金额设置
                </h2>

                <div class="BJKN"
                     action="action_order"
                     url-tmp="../../lottery/"
                     url-order="../../lottery/oddssave/"
                        >

                    <div id="view-groups">
                        '.$group_string.'
                    </div>
                    <div id="result-display">
                    </div>

                    <div id="orders">
                        <!-- javascript app 使用 -->
                        <div style="border:2px solid red;margin-top: 5px;margin-left: 10px;font-size: 14px;width: 710px;padding: 3px;">
                            投注最小金额:用户投注金额不能小于最小金额，如果小于则不能投注。如果不想限制用户最小金额，请设置为1。
                        </div>
                        <div style="border:2px solid red;margin-top: 5px;margin-left: 10px;font-size: 14px;width: 770px;padding: 3px;">
                            投注最大金额:用户投注金额不能大于最大金额，如果大于则不能投注。如果不想限制用户最大金额，请设置为99999999。
                        </div>
                        <div style="border:2px solid red;margin-top: 5px;margin-left: 10px;font-size: 14px;width: 920px;padding: 3px;">
                            用户投注金额大于反水最小金额，将获得反水。例如：用户投注六合彩600，最小反水金额为500，反水比例0.01，用户会得到反水6=600*0.01。
                        </div>
                        <div style="border:2px solid red;margin-top: 5px;margin-left: 10px;font-size: 14px;width: 920px;padding: 3px;">
                            特别提醒：体育反水比例和彩票反水比例不一样，体育反水比例，如果设置为1，反水1%； 彩票反水比例设置0.01，反水1%。
                        </div>
                    </div>

                    <div id="order-info">
                        <div class="inner">
                            <button id="btn-save-odds" onclick="saveConfig()" class="btn-submit">保存</button>
                        </div>
                    </div>


                    <div id="nogame" style="display: none;">

                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="/pt/assets/js/business/pitaya.js?1390801674"></script>
<script>
    var requirejs = {
    urlArgs: "v=759a239_c130b07"
    };
    Pitaya.prop("game", "config");
</script>
<script data-main="/pt/assets/js/mem_order_odds_settings.js" type="text/javascript"
        src="/pt/assets/js/lib/require.js?1377664851"></script>
<script type="text/javascript" src="../../lottery/config/saveConfig.js?1390801677"></script>
</body>
</html>
    ';

$mysqli->close();
exit;