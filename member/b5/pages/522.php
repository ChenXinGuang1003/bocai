<?php

$odds1 = odds_lottery_normal::getOddsByPart($lottery_name,"万仟定位","part1");
$odds2 = odds_lottery_normal::getOddsByPart($lottery_name,"万仟定位","part2");

echo '
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta content="telephone=no" name="format-detection"/>
    <title>二字定位</title>
    <link rel="stylesheet" href="/style/member/pitaya.css?31742ee"/>
    <link rel="stylesheet" href="/style/AlertBox.css?31742ee"/>
    <link rel="stylesheet" href="/style/ConfirmBox.css?31742ee"/>
    <link href="/pt/assets/css/jquery-ui-1.10.3.custom.min.css?63c179a" rel="stylesheet"/>
    <link href="/pt/assets/css/ui-tooltip.css?63c179a" rel="stylesheet"/>
    <link href="/TPL/C_TYPE_IPL/style/contextmenu.css?31742ee" rel="stylesheet"/>
    <link href="/TPL/C_TYPE_IPL/style/View.css?31742ee" rel="stylesheet"/>
    <link href="/TPL/C_TYPE_IPL/style/jquery.GoldUI.css?31742ee" rel="stylesheet"/>
    <link href="/TPL/C_TYPE_IPL/style/tpl.css?31742ee" rel="stylesheet"/>
    <link href="/TPL/C_TYPE_IPL/style/zindex.css?31742ee" rel="stylesheet"/>
    <!--[if lte IE 6]>
    <link href="/style/member/ie6.css?31742ee" rel="stylesheet"/>
    <![endif]-->
    <!--[if IE 7]>
    <link href="/style/member/ie7.css?31742ee" rel="stylesheet"/>
    <![endif]-->
    <!--[if IE 8]>
    <link href="/style/member/ie8.css?31742ee" rel="stylesheet"/>
    <script src="/js/ie8.js?31742ee"></script>
    <![endif]-->
    <!--[if IE 9]>
    <link href="/style/member/ie9.css?31742ee" rel="stylesheet"/>
    <![endif]-->
    <script src="/inte/js/Lang.js?key=charset&amp;31742ee"></script>
    <script src="/inte/js/Lang/package.js?31742ee"></script>
    <script src="/inte/js/overMenu.js?31742ee"></script>
    <script src="/inte/js/memberCenter.js?31742ee"></script>
    <script src="/inte/js/jquery.GoldUI.js?31742ee"></script>
    <script src="/inte/js/timeclock.js?31742ee"></script>
    <script src="/inte/js/zindexSort.js?31742ee"></script>
    <script src="/js/jquery-1.7.1.js?31742ee"></script>
    <script src="/pt/assets/js/lib/jquery-ui-1.10.3.custom.min.js?63c179a"></script>
    <script src="/pt/assets/js/lib/sound.js?63c179a"></script>
    <script src="/inte/js/AlertBox.js?31742ee"></script>
    <script src="/inte/js/ConfirmBox.js?31742ee"></script>
    <script src="/js/marquee.js?31742ee"></script>
    <script src="/js/C2R_B5.js?31742ee"></script>
    <script src="/js/jquery.contextmenu.js?31742ee"></script>
    <script src="/js/View.js?31742ee"></script>
    <script src="/js/mobileStyle.js?31742ee"></script>
    <script src="/js/PC/b5.js?31742ee"></script>
    <script src="/js/PC/b5Order.js?31742e5"></script>
    <script src="/js/D3.js?31742ee"></script>
    <script src="/inte/js/superfish.js?31742ee"></script>
    <script src="/inte/js/group_menu.js?31742ee"></script>
    <!--[if lte IE 8]>
    <script src="/js/html5.js?31742ee"></script>
    <script src="/inte/js/respond.src.js?31742ee"></script>
    <![endif]-->
    <!--[if IE 6]>
    <script src="/js/TouchView.js?31742ee"></script>
    <![endif]-->
    <script>
        var bbwin;
        var aPortfolio = {"M": "口XX", "C": "X口X", "U": "XX口", "MC": "口口X", "MU": "口X口", "CU": "X口口", "MCU": "口口口"};
        var aOEOUPC = {"ODD": "单", "EVEN": "双", "OVER": "大", "UNDER": "小", "PRIME": "质", "COMPO": "合"};
        $().ready(function () {
            self.zindexSort.setup();
            $("#ui-btn-games > ul").superfish();
            $("#ui-btn-games > ul > li > a:not(.sf-no-ul)").bind("click", function () {
                return false;
            });
            //self.group_menu.install($("#wager_groups"));
            $("#wager_groups a").tooltip();
            //ViewBox
            self.ViewBox.install($("ul#ui-btn-features > li > a:not(.logout), #game_result"));
            if (document.getElementById("content") && document.getElementById("rde-contextmenu")) {
                var _opt = [];
                $("#rde-contextmenu > a").each(function (i) {
                    var me = this;
                    var _action = function () {
                        self.ViewBox.single(me)
                    };
                    var _icon = (this.getAttribute("data-icon")) ? this.getAttribute("data-icon") : "/TPL/pitaya/images/wi0009-16.gif";
                    _opt.push({text: this.title, icon: _icon, alias: this.title, action: _action });
                });
                var _option = { width: 150, items: _opt };
                $("#content").contextmenu(_option);
            }
            self.timeclock.install(document.getElementById("HKTime"), document.getElementById("iTime"));
            var _opt = {
                showTag: document.getElementById("Game"),
                FCDL: $("#FCDL"),
                FCDH: $("#FCDH"),
                FCDS: $("#FCDS"),
                hall: false,
                inner_box: $("#content"),
                menu: $("#wager_groups a"),
                ticked: document.getElementById("jjomj"),
                cname: document.getElementById("c_rtype"),
                ynum: document.getElementById("YearNum"),
                info_ticked: $("#B5D2quick > p#jjomj")
            }
            self.GameB5.install(_opt, 1);
            $.ajax({
                url: "/member/select_CQ.php",
                type: "GET",
                dataType: "script"
            });
            ccMarquee("marquee");
        })
    </script>
</head>
<body>
<div id="ui-marquee">
    <div class="marquee"><span id="Msg"></span></div>
</div>
<div id="box_body" class="bg2yellow">
<div id="box_range">
<div id="header">
    <h1>sk</h1>

    <div class="game-nav">
        <div id="ui-btn-games">
            <ul class="layer1 sf-menu bg2yellow">
                <li class="layer1-li">
                    <a class="layer1-a sf-no-ul" href="/member/lt/">
                        <b></b>
                        六合彩
                    </a>
                </li>
                <li class="layer1-li">
                    <a class="layer1-a" href="#NORMAL">
                        <b></b>
                        一般彩票
                    </a>
                    <ul class="layer2" style="display:none">
                        <li>
                            <a href="/member/b3/b3.php?gtype=D3&rtype=W1">3D彩</a>
                        </li>
                        <li>
                            <a href="/member/b3/b3.php?gtype=P3&rtype=W1">排列三</a>
                        </li>
                    </ul>
                </li>
                <li class="layer1-li">
                    <a class="layer1-a" href="#TT">
                        <b></b>
                        时时彩
                    </a>
                    <ul class="layer2" style="display:none">
                        <li >
                            <a href="/member/b3/b3.php?gtype=T3&rtype=W1">上海时时乐</a>
                        </li>
                        <li >
                            <a href="/member/b5/b5.php?gtype=CQ&rtype=605">重庆时时彩</a>
                        </li>
                        <li >
                            <a href="/member/b5/b5.php?gtype=TJ&rtype=605">天津时时彩</a>
                        </li>
                        <li >
                            <a href="/member/b5/b5.php?gtype=JX&rtype=605">江西时时彩</a>
                        </li>
                    </ul>
                </li>
                <li class="layer1-li">
                    <a class="layer1-a" href="#FF">
                        <b></b>
                        分分彩
                    </a>
                    <ul class="layer2" style="display:none">
                        <li>
                            <a href="/pt/mem/order/GXSF">广西十分彩</a>
                        </li>
                        <li>
                            <a href="/pt/mem/order/GDSF">广东十分彩</a>
                        </li>
                        <li>
                            <a href="/pt/mem/order/TJSF">天津十分彩</a>
                        </li>
                        <li>
                            <a href="/pt/mem/order/GD11">广东十一选五</a>
                        </li>
                        <li>
                            <a href="/pt/mem/order/BJPK">北京PK拾</a>
                        </li>
                    </ul>
                </li>
                <li class="layer1-li">
                    <a class="layer1-a" href="#KENO">
                        <b></b>
                        KENO
                    </a>
                    <ul class="layer2" style="display:none">
                        <li>
                            <a href="/pt/mem/order/BJKN">北京快乐8</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <ul id="ui-btn-features">
        <li style="color:yellow;font-weight:bold;padding-top:4px;font-size:12px;">功能:</li>
        <li>
            <a style="padding-top: 4px;" data-callback="self.memberCenter.history" title="下注状况"
               data-url="/member/today/today_wagers.php?gtype='.$gType.'">
                <span style="color: white;">下注状况</span>
            </a>
        </li>
        <li>
            <a style="padding-top: 4px;" data-callback="self.memberCenter.historyCount" title="帐户历史"
               data-url="/member/history/history_count.php?gtype='.$gType.'">
                <span style="color: white;">下注历史</span>
            </a>
        </li>
        <li>
            <a style="padding-top: 4px;" data-callback="self.memberCenter.rule" title="规则说明"
               data-url="/member/roul_lt_tw.php?gtype='.$gType.'">
                <span style="color: white;">规则</span>
            </a>
        </li>
        <li>
            <a style="padding-top: 4px;" data-callback="self.memberCenter.gameResult" title="开奖结果"
               data-url="/member/final/LT_result.php?gtype='.$gType.'">
                <span style="color: white;">开奖</span>
            </a>
        </li>
        <li>
            <a style="padding-top: 4px;" title="系统公告" data-url="/member/msg_log.php?gtype='.$gType.'">
                <span style="color: white;">公告</span>
            </a>
        </li>
        <li>
            <a style="padding-top: 4px;" data-callback="self.memberCenter.quickGold" title="快选金额"
               data-url="/member/account/QuickGold.php?gtype='.$gType.'">
                <span style="color: white;font-weight: normal;">快选金额</span>
            </a>
        </li>
    </ul>
</div>
<div id="main">
<div id="left">
    <div id="clock"><b></b><span id="HKTime"></span></div>
    <div id="user_info">
        <dl class="block">
            <dt><span class="icon"></span>会员资料</dt>
            <dd>帐号 <span id="login-username"></span></dd>
            <dd>额度 <span id="bet-credit"></span></dd>
            <dd class="footer"></dd>
        </dl>
    </div>
    <div id="message_box" style="display:none">
        <div class="inner"></div>
        <div class="footer"></div>
    </div>
</div>
<div id="content">
<h2>
    <b></b>
    <span>'.$lottery_name.'</span>
</h2>

<div id="content_inner">
    <div style="display: none;" id="c_rtype" class="GameName"></div>
    <div>
        '.$time_info_page.'
        <div id="wager_groups" class="'.$gType.'">

            <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=535"  title="两面">两面</a>
            <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=601"  title="和数">和数</a>
            <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=592"  title="和尾数">和尾数</a>
            <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=605"  title="一字">一字</a>
            <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=616"  title="二字">二字</a>
            <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=514" title="三字" style="display:none">三字</a>
            <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=517"  title="一字定位">一字定位</a>
            <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=522" class="NowPlay" title="二字定位">二字定位</a>
            <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=532" title="三字定位" style="display:none">三字定位</a>
            <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=595"  title="组选三">组选三</a>
            <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=598"  title="组选六">组选六</a>
            <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=589"  title="跨度">跨度</a>
        </div>
    </div>
</div>
<!--rtype选择-->
<div id="arrowLeft"></div>
<div id="tab" >
    <ul>
        <li class="onTagClick"><span class="522"><b>万仟</b></span></li>
        <li class="unTagClick"><span class="523"><b>万佰</b></span></li>
        <li class="unTagClick"><span class="524"><b>万拾</b></span></li>
        <li class="unTagClick"><span class="525"><b>万个</b></span></li>
        <li class="unTagClick"><span class="526"><b>仟佰</b></span></li>
        <li class="unTagClick"><span class="527"><b>仟拾</b></span></li>
        <li class="unTagClick"><span class="528"><b>仟个</b></span></li>
        <li class="unTagClick"><span class="529"><b>佰拾</b></span></li>
        <li class="unTagClick"><span class="530"><b>佰个</b></span></li>
        <li class="unTagClick"><span class="531"><b>拾个</b></span></li>
        <li id="space"></li>
    </ul>
</div>
<div id="arrowRight"></div>
<div id="shownum" style="display:none;">
    <div id="shownum2">已勾选：0笔</div>
    <div id="shownumH"></div>
    <div id="shownumC"></div>
    <div id="shownumS"></div>
</div>
<div id="B5W1quick_Tbl" style="display:block">
    <div id="qkGoldDivW1" class="quick_betnum_style">
        下注金额 :
        <input type="text" min="0" max="99999999" name="qkGoldW1" id="qkGoldW1" pattern="[0-9]*" placeholder="下注金额"/>
    </div>
    <div id="B5W1quick" class="quick_option_style">
        <p style="float:none">
            <a class="activeA" data-index="odd">单</a>
            <a class="activeA" data-index="even">双</a>
            <a class="activeA" data-index="over">大</a>
            <a class="activeA" data-index="under">小</a>
            <a class="activeA" data-index="prime">质</a>
            <a class="activeA last" data-index="compo">合</a>
        </p>
    </div>
</div>
<div id="GrpBtnB5" style="display:none">
    <div id="B5W3quick" class="InfoBar">
    </div>
    <div id="B5D3quick" class="InfoBar">
    </div>
    <div id="B5D2quick" class="InfoBar">
        <div id="qkGoldDiv" class="quick_betnum_style">
            下注金额 :
            <input type="text" min="0" max="99999999" name="qkGold" id="qkGold" pattern="[0-9]*" placeholder="下注金额"/>
        </div>
        <p>
            <b class="first">头</b>
            <a class="activeA">0</a>
            <a class="activeA">1</a>
            <a class="activeA">2</a>
            <a class="activeA">3</a>
            <a class="activeA">4</a>
            <a class="activeA">5</a>
            <a class="activeA">6</a>
            <a class="activeA">7</a>
            <a class="activeA">8</a>
            <a class="activeA last">9</a>
        </p>

        <p id="jjomj"></p>

        <p>
            <b class="first">尾</b>
            <a class="activeB">0</a>
            <a class="activeB">1</a>
            <a class="activeB">2</a>
            <a class="activeB">3</a>
            <a class="activeB">4</a>
            <a class="activeB">5</a>
            <a class="activeB">6</a>
            <a class="activeB">7</a>
            <a class="activeB">8</a>
            <a class="activeB last">9</a>
        </p>
    </div>
</div>
<div id="Game">

<form id="formB5" name="D3_022" action="/member/quickB5_act.php" method="post" onsubmit="return false">
<input type="hidden" name="gid" value="352278" />
<input type="hidden" name="MyRtype" value="522" />
<input type="hidden" name="gtype" value="'.$gType.'" />

<input type="hidden" name="gold_gmax" value="'.$maxMoney.'" />
<input type="hidden" name="gold_gmin" value="'.$lowestMoney.'" />
<input type="hidden" name="SC" value="50000" />
<input type="hidden" name="SO" value="5000" />
<input type="hidden" name="Maxcredit" value="'.$userMoney.'" />
<input type="hidden" id="D3type" name="D3type" value="A" />
<div class="InfoBar">
    <div class="Range" style="display:none">
        <span  class="On"><input type="radio" name="jjomj" value="0" checked="checked"/> 000~199</span>
        <span ><input type="radio" name="jjomj" value="2"/>200~399</span>
        <span ><input type="radio" name="jjomj" value="4"/>400~599</span>
        <span ><input type="radio" name="jjomj" value="6"/>600~799</span>
        <span ><input type="radio" name="jjomj" value="8"/>800~999</span>
    </div>
    <input type="hidden" name="Start" value="0" />
</div>
<div class="round-table">
<table class="GameTable">
<tr class="title_line">
    <td>号码</td>
    <td>赔率</td>
    <td>金额</td>
    <td>号码</td>
    <td>赔率</td>
    <td>金额</td>
    <td>号码</td>
    <td>赔率</td>
    <td>金额</td>
    <td>号码</td>
    <td>赔率</td>
    <td>金额</td>
    <td>号码</td>
    <td>赔率</td>
    <td>金额</td>
</tr>
<tr>

    <td class="num" style="width:30px">
        <label for="522-00">
            00
        </label>
        <input type="hidden" name="aConcede[]" value="522-00"/>
    </td>
    <td class="odds">
        <label for="522-00" class="odds">
            '.$odds1["h0"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h0"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-00"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-01">
            01
        </label>
        <input type="hidden" name="aConcede[]" value="522-01"/>
    </td>
    <td class="odds">
        <label for="522-01" class="odds">
            '.$odds1["h1"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h1"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-01"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-02">
            02
        </label>
        <input type="hidden" name="aConcede[]" value="522-02"/>
    </td>
    <td class="odds">
        <label for="522-02" class="odds">
            '.$odds1["h2"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h2"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-02"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-03">
            03
        </label>
        <input type="hidden" name="aConcede[]" value="522-03"/>
    </td>
    <td class="odds">
        <label for="522-03" class="odds">
            '.$odds1["h3"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h3"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-03"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-04">
            04
        </label>
        <input type="hidden" name="aConcede[]" value="522-04"/>
    </td>
    <td class="odds">
        <label for="522-04" class="odds">
            '.$odds1["h4"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h4"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-04"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-05">
            05
        </label>
        <input type="hidden" name="aConcede[]" value="522-05"/>
    </td>
    <td class="odds">
        <label for="522-05" class="odds">
            '.$odds1["h5"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h5"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-05"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-06">
            06
        </label>
        <input type="hidden" name="aConcede[]" value="522-06"/>
    </td>
    <td class="odds">
        <label for="522-06" class="odds">
            '.$odds1["h6"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h6"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-06"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-07">
            07
        </label>
        <input type="hidden" name="aConcede[]" value="522-07"/>
    </td>
    <td class="odds">
        <label for="522-07" class="odds">
            '.$odds1["h7"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h7"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-07"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-08">
            08
        </label>
        <input type="hidden" name="aConcede[]" value="522-08"/>
    </td>
    <td class="odds">
        <label for="522-08" class="odds">
            '.$odds1["h8"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h8"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-08"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-09">
            09
        </label>
        <input type="hidden" name="aConcede[]" value="522-09"/>
    </td>
    <td class="odds">
        <label for="522-09" class="odds">
            '.$odds1["h9"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h9"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-09"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-10">
            10
        </label>
        <input type="hidden" name="aConcede[]" value="522-10"/>
    </td>
    <td class="odds">
        <label for="522-10" class="odds">
            '.$odds1["h10"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h10"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-10"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-11">
            11
        </label>
        <input type="hidden" name="aConcede[]" value="522-11"/>
    </td>
    <td class="odds">
        <label for="522-11" class="odds">
            '.$odds1["h11"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h11"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-11"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-12">
            12
        </label>
        <input type="hidden" name="aConcede[]" value="522-12"/>
    </td>
    <td class="odds">
        <label for="522-12" class="odds">
            '.$odds1["h12"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h12"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-12"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-13">
            13
        </label>
        <input type="hidden" name="aConcede[]" value="522-13"/>
    </td>
    <td class="odds">
        <label for="522-13" class="odds">
            '.$odds1["h13"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h13"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-13"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-14">
            14
        </label>
        <input type="hidden" name="aConcede[]" value="522-14"/>
    </td>
    <td class="odds">
        <label for="522-14" class="odds">
            '.$odds1["h14"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h14"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-14"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-15">
            15
        </label>
        <input type="hidden" name="aConcede[]" value="522-15"/>
    </td>
    <td class="odds">
        <label for="522-15" class="odds">
            '.$odds1["h15"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h15"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-15"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-16">
            16
        </label>
        <input type="hidden" name="aConcede[]" value="522-16"/>
    </td>
    <td class="odds">
        <label for="522-16" class="odds">
            '.$odds1["h16"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h16"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-16"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-17">
            17
        </label>
        <input type="hidden" name="aConcede[]" value="522-17"/>
    </td>
    <td class="odds">
        <label for="522-17" class="odds">
            '.$odds1["h17"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h17"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-17"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-18">
            18
        </label>
        <input type="hidden" name="aConcede[]" value="522-18"/>
    </td>
    <td class="odds">
        <label for="522-18" class="odds">
            '.$odds1["h18"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h18"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-18"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-19">
            19
        </label>
        <input type="hidden" name="aConcede[]" value="522-19"/>
    </td>
    <td class="odds">
        <label for="522-19" class="odds">
            '.$odds1["h19"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h19"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-19"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-20">
            20
        </label>
        <input type="hidden" name="aConcede[]" value="522-20"/>
    </td>
    <td class="odds">
        <label for="522-20" class="odds">
            '.$odds1["h20"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h20"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-20"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-21">
            21
        </label>
        <input type="hidden" name="aConcede[]" value="522-21"/>
    </td>
    <td class="odds">
        <label for="522-21" class="odds">
            '.$odds1["h21"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h21"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-21"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-22">
            22
        </label>
        <input type="hidden" name="aConcede[]" value="522-22"/>
    </td>
    <td class="odds">
        <label for="522-22" class="odds">
            '.$odds1["h22"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h22"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-22"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-23">
            23
        </label>
        <input type="hidden" name="aConcede[]" value="522-23"/>
    </td>
    <td class="odds">
        <label for="522-23" class="odds">
            '.$odds1["h23"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h23"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-23"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-24">
            24
        </label>
        <input type="hidden" name="aConcede[]" value="522-24"/>
    </td>
    <td class="odds">
        <label for="522-24" class="odds">
            '.$odds1["h24"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h24"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-24"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-25">
            25
        </label>
        <input type="hidden" name="aConcede[]" value="522-25"/>
    </td>
    <td class="odds">
        <label for="522-25" class="odds">
            '.$odds1["h25"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h25"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-25"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-26">
            26
        </label>
        <input type="hidden" name="aConcede[]" value="522-26"/>
    </td>
    <td class="odds">
        <label for="522-26" class="odds">
            '.$odds1["h26"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h26"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-26"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-27">
            27
        </label>
        <input type="hidden" name="aConcede[]" value="522-27"/>
    </td>
    <td class="odds">
        <label for="522-27" class="odds">
            '.$odds1["h27"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h27"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-27"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-28">
            28
        </label>
        <input type="hidden" name="aConcede[]" value="522-28"/>
    </td>
    <td class="odds">
        <label for="522-28" class="odds">
            '.$odds1["h28"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h28"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-28"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-29">
            29
        </label>
        <input type="hidden" name="aConcede[]" value="522-29"/>
    </td>
    <td class="odds">
        <label for="522-29" class="odds">
            '.$odds1["h29"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h29"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-29"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-30">
            30
        </label>
        <input type="hidden" name="aConcede[]" value="522-30"/>
    </td>
    <td class="odds">
        <label for="522-30" class="odds">
            '.$odds1["h30"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h30"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-30"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-31">
            31
        </label>
        <input type="hidden" name="aConcede[]" value="522-31"/>
    </td>
    <td class="odds">
        <label for="522-31" class="odds">
            '.$odds1["h31"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h31"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-31"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-32">
            32
        </label>
        <input type="hidden" name="aConcede[]" value="522-32"/>
    </td>
    <td class="odds">
        <label for="522-32" class="odds">
            '.$odds1["h32"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h32"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-32"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-33">
            33
        </label>
        <input type="hidden" name="aConcede[]" value="522-33"/>
    </td>
    <td class="odds">
        <label for="522-33" class="odds">
            '.$odds1["h33"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h33"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-33"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-34">
            34
        </label>
        <input type="hidden" name="aConcede[]" value="522-34"/>
    </td>
    <td class="odds">
        <label for="522-34" class="odds">
            '.$odds1["h34"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h34"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-34"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-35">
            35
        </label>
        <input type="hidden" name="aConcede[]" value="522-35"/>
    </td>
    <td class="odds">
        <label for="522-35" class="odds">
            '.$odds1["h35"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h35"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-35"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-36">
            36
        </label>
        <input type="hidden" name="aConcede[]" value="522-36"/>
    </td>
    <td class="odds">
        <label for="522-36" class="odds">
            '.$odds1["h36"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h36"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-36"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-37">
            37
        </label>
        <input type="hidden" name="aConcede[]" value="522-37"/>
    </td>
    <td class="odds">
        <label for="522-37" class="odds">
            '.$odds1["h37"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h37"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-37"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-38">
            38
        </label>
        <input type="hidden" name="aConcede[]" value="522-38"/>
    </td>
    <td class="odds">
        <label for="522-38" class="odds">
            '.$odds1["h38"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h38"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-38"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-39">
            39
        </label>
        <input type="hidden" name="aConcede[]" value="522-39"/>
    </td>
    <td class="odds">
        <label for="522-39" class="odds">
            '.$odds1["h39"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h39"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-39"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-40">
            40
        </label>
        <input type="hidden" name="aConcede[]" value="522-40"/>
    </td>
    <td class="odds">
        <label for="522-40" class="odds">
            '.$odds1["h40"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h40"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-40"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-41">
            41
        </label>
        <input type="hidden" name="aConcede[]" value="522-41"/>
    </td>
    <td class="odds">
        <label for="522-41" class="odds">
            '.$odds1["h41"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h41"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-41"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-42">
            42
        </label>
        <input type="hidden" name="aConcede[]" value="522-42"/>
    </td>
    <td class="odds">
        <label for="522-42" class="odds">
            '.$odds1["h42"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h42"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-42"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-43">
            43
        </label>
        <input type="hidden" name="aConcede[]" value="522-43"/>
    </td>
    <td class="odds">
        <label for="522-43" class="odds">
            '.$odds1["h43"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h43"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-43"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-44">
            44
        </label>
        <input type="hidden" name="aConcede[]" value="522-44"/>
    </td>
    <td class="odds">
        <label for="522-44" class="odds">
            '.$odds1["h44"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h44"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-44"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-45">
            45
        </label>
        <input type="hidden" name="aConcede[]" value="522-45"/>
    </td>
    <td class="odds">
        <label for="522-45" class="odds">
            '.$odds1["h45"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h45"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-45"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-46">
            46
        </label>
        <input type="hidden" name="aConcede[]" value="522-46"/>
    </td>
    <td class="odds">
        <label for="522-46" class="odds">
            '.$odds1["h46"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h46"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-46"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-47">
            47
        </label>
        <input type="hidden" name="aConcede[]" value="522-47"/>
    </td>
    <td class="odds">
        <label for="522-47" class="odds">
            '.$odds1["h47"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h47"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-47"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-48">
            48
        </label>
        <input type="hidden" name="aConcede[]" value="522-48"/>
    </td>
    <td class="odds">
        <label for="522-48" class="odds">
            '.$odds1["h48"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h48"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-48"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-49">
            49
        </label>
        <input type="hidden" name="aConcede[]" value="522-49"/>
    </td>
    <td class="odds">
        <label for="522-49" class="odds">
            '.$odds1["h49"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds1["h49"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-49"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-50">
            50
        </label>
        <input type="hidden" name="aConcede[]" value="522-50"/>
    </td>
    <td class="odds">
        <label for="522-50" class="odds">
            '.$odds2["h0"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h0"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-50"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-51">
            51
        </label>
        <input type="hidden" name="aConcede[]" value="522-51"/>
    </td>
    <td class="odds">
        <label for="522-51" class="odds">
            '.$odds2["h1"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h1"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-51"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-52">
            52
        </label>
        <input type="hidden" name="aConcede[]" value="522-52"/>
    </td>
    <td class="odds">
        <label for="522-52" class="odds">
            '.$odds2["h2"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h2"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-52"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-53">
            53
        </label>
        <input type="hidden" name="aConcede[]" value="522-53"/>
    </td>
    <td class="odds">
        <label for="522-53" class="odds">
            '.$odds2["h3"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h3"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-53"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-54">
            54
        </label>
        <input type="hidden" name="aConcede[]" value="522-54"/>
    </td>
    <td class="odds">
        <label for="522-54" class="odds">
            '.$odds2["h4"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h4"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-54"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-55">
            55
        </label>
        <input type="hidden" name="aConcede[]" value="522-55"/>
    </td>
    <td class="odds">
        <label for="522-55" class="odds">
            '.$odds2["h5"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h5"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-55"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-56">
            56
        </label>
        <input type="hidden" name="aConcede[]" value="522-56"/>
    </td>
    <td class="odds">
        <label for="522-56" class="odds">
            '.$odds2["h6"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h6"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-56"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-57">
            57
        </label>
        <input type="hidden" name="aConcede[]" value="522-57"/>
    </td>
    <td class="odds">
        <label for="522-57" class="odds">
            '.$odds2["h7"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h7"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-57"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-58">
            58
        </label>
        <input type="hidden" name="aConcede[]" value="522-58"/>
    </td>
    <td class="odds">
        <label for="522-58" class="odds">
            '.$odds2["h8"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h8"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-58"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-59">
            59
        </label>
        <input type="hidden" name="aConcede[]" value="522-59"/>
    </td>
    <td class="odds">
        <label for="522-59" class="odds">
            '.$odds2["h9"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h9"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-59"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-60">
            60
        </label>
        <input type="hidden" name="aConcede[]" value="522-60"/>
    </td>
    <td class="odds">
        <label for="522-60" class="odds">
            '.$odds2["h10"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h10"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-60"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-61">
            61
        </label>
        <input type="hidden" name="aConcede[]" value="522-61"/>
    </td>
    <td class="odds">
        <label for="522-61" class="odds">
            '.$odds2["h11"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h11"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-61"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-62">
            62
        </label>
        <input type="hidden" name="aConcede[]" value="522-62"/>
    </td>
    <td class="odds">
        <label for="522-62" class="odds">
            '.$odds2["h12"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h12"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-62"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-63">
            63
        </label>
        <input type="hidden" name="aConcede[]" value="522-63"/>
    </td>
    <td class="odds">
        <label for="522-63" class="odds">
            '.$odds2["h13"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h13"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-63"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-64">
            64
        </label>
        <input type="hidden" name="aConcede[]" value="522-64"/>
    </td>
    <td class="odds">
        <label for="522-64" class="odds">
            '.$odds2["h14"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h14"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-64"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-65">
            65
        </label>
        <input type="hidden" name="aConcede[]" value="522-65"/>
    </td>
    <td class="odds">
        <label for="522-65" class="odds">
            '.$odds2["h15"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h15"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-65"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-66">
            66
        </label>
        <input type="hidden" name="aConcede[]" value="522-66"/>
    </td>
    <td class="odds">
        <label for="522-66" class="odds">
            '.$odds2["h16"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h16"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-66"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-67">
            67
        </label>
        <input type="hidden" name="aConcede[]" value="522-67"/>
    </td>
    <td class="odds">
        <label for="522-67" class="odds">
            '.$odds2["h17"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h17"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-67"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-68">
            68
        </label>
        <input type="hidden" name="aConcede[]" value="522-68"/>
    </td>
    <td class="odds">
        <label for="522-68" class="odds">
            '.$odds2["h18"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h18"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-68"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-69">
            69
        </label>
        <input type="hidden" name="aConcede[]" value="522-69"/>
    </td>
    <td class="odds">
        <label for="522-69" class="odds">
            '.$odds2["h19"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h19"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-69"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-70">
            70
        </label>
        <input type="hidden" name="aConcede[]" value="522-70"/>
    </td>
    <td class="odds">
        <label for="522-70" class="odds">
            '.$odds2["h20"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h20"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-70"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-71">
            71
        </label>
        <input type="hidden" name="aConcede[]" value="522-71"/>
    </td>
    <td class="odds">
        <label for="522-71" class="odds">
            '.$odds2["h21"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h21"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-71"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-72">
            72
        </label>
        <input type="hidden" name="aConcede[]" value="522-72"/>
    </td>
    <td class="odds">
        <label for="522-72" class="odds">
            '.$odds2["h22"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h22"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-72"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-73">
            73
        </label>
        <input type="hidden" name="aConcede[]" value="522-73"/>
    </td>
    <td class="odds">
        <label for="522-73" class="odds">
            '.$odds2["h23"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h23"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-73"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-74">
            74
        </label>
        <input type="hidden" name="aConcede[]" value="522-74"/>
    </td>
    <td class="odds">
        <label for="522-74" class="odds">
            '.$odds2["h24"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h24"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-74"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-75">
            75
        </label>
        <input type="hidden" name="aConcede[]" value="522-75"/>
    </td>
    <td class="odds">
        <label for="522-75" class="odds">
            '.$odds2["h25"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h25"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-75"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-76">
            76
        </label>
        <input type="hidden" name="aConcede[]" value="522-76"/>
    </td>
    <td class="odds">
        <label for="522-76" class="odds">
            '.$odds2["h26"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h26"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-76"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-77">
            77
        </label>
        <input type="hidden" name="aConcede[]" value="522-77"/>
    </td>
    <td class="odds">
        <label for="522-77" class="odds">
            '.$odds2["h27"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h27"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-77"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-78">
            78
        </label>
        <input type="hidden" name="aConcede[]" value="522-78"/>
    </td>
    <td class="odds">
        <label for="522-78" class="odds">
            '.$odds2["h28"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h28"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-78"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-79">
            79
        </label>
        <input type="hidden" name="aConcede[]" value="522-79"/>
    </td>
    <td class="odds">
        <label for="522-79" class="odds">
            '.$odds2["h29"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h29"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-79"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-80">
            80
        </label>
        <input type="hidden" name="aConcede[]" value="522-80"/>
    </td>
    <td class="odds">
        <label for="522-80" class="odds">
            '.$odds2["h30"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h30"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-80"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-81">
            81
        </label>
        <input type="hidden" name="aConcede[]" value="522-81"/>
    </td>
    <td class="odds">
        <label for="522-81" class="odds">
            '.$odds2["h31"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h31"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-81"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-82">
            82
        </label>
        <input type="hidden" name="aConcede[]" value="522-82"/>
    </td>
    <td class="odds">
        <label for="522-82" class="odds">
            '.$odds2["h32"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h32"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-82"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-83">
            83
        </label>
        <input type="hidden" name="aConcede[]" value="522-83"/>
    </td>
    <td class="odds">
        <label for="522-83" class="odds">
            '.$odds2["h33"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h33"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-83"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-84">
            84
        </label>
        <input type="hidden" name="aConcede[]" value="522-84"/>
    </td>
    <td class="odds">
        <label for="522-84" class="odds">
            '.$odds2["h34"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h34"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-84"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-85">
            85
        </label>
        <input type="hidden" name="aConcede[]" value="522-85"/>
    </td>
    <td class="odds">
        <label for="522-85" class="odds">
            '.$odds2["h35"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h35"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-85"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-86">
            86
        </label>
        <input type="hidden" name="aConcede[]" value="522-86"/>
    </td>
    <td class="odds">
        <label for="522-86" class="odds">
            '.$odds2["h36"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h36"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-86"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-87">
            87
        </label>
        <input type="hidden" name="aConcede[]" value="522-87"/>
    </td>
    <td class="odds">
        <label for="522-87" class="odds">
            '.$odds2["h37"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h37"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-87"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-88">
            88
        </label>
        <input type="hidden" name="aConcede[]" value="522-88"/>
    </td>
    <td class="odds">
        <label for="522-88" class="odds">
            '.$odds2["h38"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h38"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-88"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-89">
            89
        </label>
        <input type="hidden" name="aConcede[]" value="522-89"/>
    </td>
    <td class="odds">
        <label for="522-89" class="odds">
            '.$odds2["h39"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h39"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-89"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-90">
            90
        </label>
        <input type="hidden" name="aConcede[]" value="522-90"/>
    </td>
    <td class="odds">
        <label for="522-90" class="odds">
            '.$odds2["h40"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h40"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-90"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-91">
            91
        </label>
        <input type="hidden" name="aConcede[]" value="522-91"/>
    </td>
    <td class="odds">
        <label for="522-91" class="odds">
            '.$odds2["h41"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h41"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-91"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-92">
            92
        </label>
        <input type="hidden" name="aConcede[]" value="522-92"/>
    </td>
    <td class="odds">
        <label for="522-92" class="odds">
            '.$odds2["h42"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h42"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-92"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-93">
            93
        </label>
        <input type="hidden" name="aConcede[]" value="522-93"/>
    </td>
    <td class="odds">
        <label for="522-93" class="odds">
            '.$odds2["h43"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h43"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-93"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-94">
            94
        </label>
        <input type="hidden" name="aConcede[]" value="522-94"/>
    </td>
    <td class="odds">
        <label for="522-94" class="odds">
            '.$odds2["h44"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h44"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-94"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="522-95">
            95
        </label>
        <input type="hidden" name="aConcede[]" value="522-95"/>
    </td>
    <td class="odds">
        <label for="522-95" class="odds">
            '.$odds2["h45"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h45"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-95"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-96">
            96
        </label>
        <input type="hidden" name="aConcede[]" value="522-96"/>
    </td>
    <td class="odds">
        <label for="522-96" class="odds">
            '.$odds2["h46"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h46"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-96"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-97">
            97
        </label>
        <input type="hidden" name="aConcede[]" value="522-97"/>
    </td>
    <td class="odds">
        <label for="522-97" class="odds">
            '.$odds2["h47"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h47"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-97"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-98">
            98
        </label>
        <input type="hidden" name="aConcede[]" value="522-98"/>
    </td>
    <td class="odds">
        <label for="522-98" class="odds">
            '.$odds2["h48"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h48"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-98"/>
    </td>

    <td class="num" style="width:30px">
        <label for="522-99">
            99
        </label>
        <input type="hidden" name="aConcede[]" value="522-99"/>
    </td>
    <td class="odds">
        <label for="522-99" class="odds">
            '.$odds2["h49"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds2["h49"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="522-99"/>
    </td>

</tr>
</table>
</div>
<div id="SendB5">
    <span class="credit">下注金额:<b id="total_bet">0.00</b></span>
    <input type="button" name="Cancel" value="取消" class="cancel_cen" />&nbsp;&nbsp;
    <input type="button" name="SubmitA" value="确定" class="order" />
</div>
<div id="BetInfo">

    <table class="GameTable">
        <tr class="title_line">
            <td>最高限额: </td>
            <td>5000</td>
        </tr>
        <tr class="title_line">
            <td>最低限额: </td>
            <td>1</td>
        </tr>
        <tr class="title_line">
            <td>单注限额: </td>
            <td>5000</td>
        </tr>
        <tr class="title_line">
            <td>单号限额:</td>
            <td>50000</td>
        </tr>
    </table>
</div>
</form>
</div>
<input type="hidden" id="sRtype" name="sRtype" value="522"/>
<input type="hidden" id="sGtype" name="sGtype" value="'.$gType.'"/>
<input type="hidden" name="iTime" id="iTime" value="1393817841"/>
</div>
</div>
</div>
</div>
<div id="ding"></div>
<div id="Tips" style="display:none;">当用鼠标压住要下注的球号赔率时，版面右方会出现下注的金额区块，可直接将要下注的号码拉到下注的金额上面下注</div>
<div id="Tips2" style="display:none;">当用鼠标压住要下注的球号时，版面右方会出现下注的金额区块，可直接将要下注的号码拉到下注的金额上面下注</div>
<div id="BlackBG"></div>
</body>
</html>
';