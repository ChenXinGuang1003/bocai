<?php
include "../../../../app/member/class/user_group.php";

function getCommonIndex($title, $gType, $contentPage, $userName, $userMoney){
    $row = user_group::getLimitAndFsMoney($_SESSION["userid"]);
    $lowestMoney = $row[strtolower($gType)."_lower_bet"];
    $maxMoney = $row[strtolower($gType)."_max_bet"];

    return '
<!DOCTYPE HTML>
<html class="yellow zh-cn">
<head>
    <meta charset="UTF-8">
    <title>'.$title.'</title>
    <link type="text/css" rel="stylesheet" href="/pt/assets/css/portal/mem_order.css?1390801674"/>
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
<div id="ui-marquee">
    <marquee
            scrollamount="3" scrolldelay="12"
            onMouseOver="this.stop()"
            onMouseOut="this.start()">
                ~欢迎光临~
    </marquee>
</div>
<div id="box-range-inner">
<div id="header">
    <h1 id="logo">
        <a href="#">
    portal </a>
    </h1>
    <ul id="ui-btn-features">
        <li class="showfunction">功能:</li>
        <li class="today-wagers"><a title="下注状况" href="/pt/../member/today/today_wagers.php"> </a></li>
        <li class="history"><a title="帐户历史" href="/pt/../member/history/history_count.php"> </a></li>
        <li class="rule"><a title="规则说明" href="/pt/../member/roul_lt_tw.php"> </a></li>
        <li class="game-result"><a id="game-result" title="开奖结果" href="/pt/../member/final/LT_result.php">开奖结果</a></li>
        <li class="msg-log"><a title="系统公告" href="/pt/../member/msg_log.php"> </a></li>
        <li class="quick-gold"><a title="快选金额" href="/pt/../member/account/QuickGold.php"> </a></li>
    </ul>
    <div id="ui-btn-games">
        <ul class="sf-menu" action="action_btn_games" style="display: none">

            <li class="horizontal 六合彩">
                <a href="/member/lt/">六合彩 </a>
                <ul>
                </ul>
            </li>
            <li class="horizontal 一般彩票">
                <a>一般彩票</a>
                <ul>
                    <li class="D3">
                        <a href="/member/b3/b3.php?gtype=D3&amp;rtype=W1">3D彩</a>
                    </li>
                    <li class="P3">
                        <a href="/member/b3/b3.php?gtype=P3&amp;rtype=W1">排列三</a>
                    </li>
                </ul>
            </li>
            <li class="horizontal 时时彩">
                <a>时时彩</a>
                <ul>
                    <li class="T3">
                        <a href="/member/b3/b3.php?gtype=T3&amp;rtype=W1">上海时时乐</a>
                    </li>
                    <li class="CQ">
                        <a href="/member/b5/b5.php?gtype=CQ&amp;rtype=605">重庆时时彩</a>
                    </li>
                    <li class="TJ">
                        <a href="/member/b5/b5.php?gtype=TJ&amp;rtype=605">天津时时彩</a>
                    </li>
                    <li class="JX">
                        <a href="/member/b5/b5.php?gtype=JX&amp;rtype=605">江西时时彩</a>
                    </li>
                </ul>
            </li>
            <li class="horizontal 分分彩">
                <a>分分彩</a>
                <ul>
                    <li class="GXSF">
                        <a href="/pt/mem/order/GXSF">广西十分彩</a>
                    </li>
                    <li class="GDSF">
                        <a href="/pt/mem/order/GDSF">广东十分彩</a>
                    </li>
                    <li class="TJSF">
                        <a href="/pt/mem/order/TJSF">天津十分彩</a>
                    </li>
                    <li class="GD11">
                        <a href="/pt/mem/order/GD11">广东十一选五</a>
                    </li>
                    <li class="BJPK">
                        <a href="/pt/mem/order/BJPK">北京PK拾</a>
                    </li>
                </ul>
            </li>
            <li class="horizontal KENO">
                <a>KENO</a>
                <ul>
                    <li class="BJKN">
                        <a href="/pt/mem/order/BJKN">北京快乐8</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div id="main">
    <div class="main-inner">
        <div id="left">
            <div id="clock"></div>
            <a style="display:none" id="go-gamelobby" href="/pt/mem/gamelobby">
    彩票大厅 </a>

            <div id="user-info">
                <dl class="block">
                    <dt><span class="icon"></span>会员资料</dt>
                    <dd>登入帐号 <span id="username">'.$userName.'</span></dd>
                    <dd>额度 <span id="balance">'.$userMoney.'</span></dd>
                    <input type="hidden" name="gold_gmin" value="'.$lowestMoney.'" />
                    <input type="hidden" name="gold_gmax_my" value="'.$maxMoney.'" />
                    <dd class="footer"></dd>
                </dl>
            </div>

            <div id="message-box">
            </div>

        </div>
        '.$contentPage.'
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
    Pitaya
    .prop("game", "'.$gType.'")
</script>
<script data-main="/pt/assets/js/mem_order.js" type="text/javascript"
        src="/pt/assets/js/lib/require.js?1377664851"></script>
</body>
</html>
    ';
}
