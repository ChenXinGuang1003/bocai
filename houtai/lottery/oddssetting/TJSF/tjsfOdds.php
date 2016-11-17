<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";



echo getPage();
exit;

function getPage(){
    return '
<!DOCTYPE HTML>
<html class="yellow zh-cn">
<head>
    <meta charset="UTF-8">
    <title>天津十分彩-赔率设置</title>
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
                    天津十分彩-赔率设置
                </h2>

                <div class="TJSF"
                     action="action_order"
                     url-tmp="../lottery/oddssetting/"
                     url-order="../lottery/oddssave/"
                        >

                    <div id="view-groups">
                        <a title="主盘势" group="GENERAL" href="#/TJSF/GENERAL">主盘势</a>
                        <a title="特别号" group="SP" href="#/TJSF/SP">特别号</a>
                        <a title="正码特" group="NORMAL_NUMBER" href="#/TJSF/NORMAL_NUMBER">正码特</a>
                        <a title="四季五行" group="SEASONS_ELEMENTS" href="#/TJSF/SEASONS_ELEMENTS">四季五行</a>
                        <a title="方位/中发白" group="DIRECTION_ZFB" href="#/TJSF/DIRECTION_ZFB">方位/中发白</a>
                        <a title="总和/龙虎" group="ALLSUM_DRAGON_TIGER" href="#/TJSF/ALLSUM_DRAGON_TIGER">总和/龙虎</a>
                        <a title="一中一" group="CHOOSE_1_MATCH_1" href="#/TJSF/CHOOSE_1_MATCH_1">一中一</a>
                    </div>
                    <div id="result-display">
                    </div>

                    <div id="orders">
                        <!-- javascript app 使用 -->
                    </div>

                    <div id="order-info">
                        <div class="inner">
                            <button id="btn-save-odds" onclick="saveOdds()" class="btn-submit">保存</button>
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
    Pitaya.prop("game", "TJSF");
</script>
<script data-main="/pt/assets/js/mem_order_odds_settings.js" type="text/javascript"
        src="/pt/assets/js/lib/require.js?1377664851"></script>

<script type="text/javascript" src="../lottery/oddssetting/TJSF/saveOdds.js?1390801674"></script>
</body>
</html>
    ';
}