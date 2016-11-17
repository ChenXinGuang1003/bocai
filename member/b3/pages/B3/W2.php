<?php

$odds = odds_lottery_normal::getOdds($lottery_name,"二字");

echo '
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta content="telephone=no" name="format-detection"/>
    <title>两字</title>
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
    <script src="/js/jquery.cookie.js"></script>
    <script src="/inte/js/bbwin.js"></script>
    <script src="/inte/js/AlertBox.js?31742ee"></script>
    <script src="/inte/js/ConfirmBox.js?31742ee"></script>
    <script src="/js/marquee.js?31742ee"></script>
    <script src="/js/C2R.js?31742ee"></script>
    <script src="/js/jquery.contextmenu.js?31742ee"></script>
    <script src="/js/View.js?31742ee"></script>
    <script src="/js/mobileStyle.js?31742ee"></script>
    <script src="/js/PC/b3.js?31742ee"></script>
    <script src="/js/PC/b3Order.js?31742e5"></script>
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
        <!--
        BBINWIN.isIPL = "1";
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
                info_ticked: $("#D2quick > p#jjomj")
            }
            self.GameB3.install(_opt, 1);
            $.ajax({
                url: "/member/select_D3.php",
                type: "GET",
                dataType: "script"
            });
            ccMarquee("marquee");

            $(".bb3d_video_link").click(function () {
                if (!bbwin || (bbwin && bbwin.closed)) {
                    bbwin = window.open("http://www.6085.com/cl/?module=MFunction&method=BB3DLive", "BBLIVE", "width=900, height=550, fullscreen=0, location=0, menubar=0, resizable=0, scrollbars=0, status=0")
                }
                bbwin.focus();
            });
        })
        //-->
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

            <a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=OEOU"   title="两面">两面</a>
            <a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=SN"  title="和数">和数</a>
            <a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=MCUF"  title="和尾数">和尾数</a>
            <a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=W1"  title="一字">一字</a>
            <a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=W2" class="NowPlay" title="二字">二字</a>
            <a style="display:none" href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=W3"  title="三字">三字</a>
            <a style="display:none" href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=FU4"  title="复式组合">复式组合</a>
            <a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=GST"  title="组选三">组选三</a>
            <a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=GSS"  title="组选六">组选六</a>
            <a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=WP"  title="一字过关">一字过关</a>
            <a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=KD"  title="跨度">跨度</a>
        </div>
    </div>
</div>
<!--rtype选择-->

<div id="tab" >
    <ul>
        <li class="onTagClick"><span class="W2"><b>组合</b></span></li>
        <li class="unTagClick"><span class="D2MC"><b>口口X</b></span></li>
        <li class="unTagClick"><span class="D2MU"><b>口X口</b></span></li>
        <li class="unTagClick"><span class="D2CU"><b>X口口</b></span></li>
        <li id="space"></li>
    </ul>
</div>
<div id="shownum" style="display:none;">
    <div id="shownum2">已勾选：0笔</div>
    <div id="shownumH"></div>
    <div id="shownumC"></div>
    <div id="shownumS"></div>
</div>
<div id="W1quick_Tbl" class="W1quick_style">
    <div id="qkGoldDivW1" class="quick_betnum_style">
        下注金额 :
        <input type="text" min="0" max="99999999" name="qkGoldW1" id="qkGoldW1" pattern="[0-9]*" placeholder="下注金额"/>
    </div>
    <div id="W1quick" class="quick_option_style">
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
<div id="GrpBtnB3" style="display:none">
    <div id="W3quick" class="InfoBar">
    </div>
    <div id="D3quick" class="InfoBar">
    </div>
    <div id="D2quick" class="InfoBar">
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

<form id="formB3" name="D3_022" action="/member/quickB3_act.php" method="post" onsubmit="return false">
<input type="hidden" name="gid" value="345434" />
<input type="hidden" name="MyRtype" value="W2" />
<input type="hidden" name="gtype" value="'.$gType.'" />

<input type="hidden" name="gold_gmax" class="W2" value="'.$maxMoney.'" />
<input type="hidden" name="gold_gmin" class="W2" value="'.$lowestMoney.'" />
<input type="hidden" name="SC" class="W2" value="50000" />
<input type="hidden" name="SO" class="W2" value="5000" />

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
        <label for="W200">
            00
        </label>
        <input type="hidden" name="aConcede[]" value="W200"/>
    </td>
    <td class="odds">
        <label for="W200" class="odds">
            '.$odds["h0"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h0"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W200"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W201">
            01
        </label>
        <input type="hidden" name="aConcede[]" value="W201"/>
    </td>
    <td class="odds">
        <label for="W201" class="odds">
            '.$odds["h1"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h1"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W201"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W202">
            02
        </label>
        <input type="hidden" name="aConcede[]" value="W202"/>
    </td>
    <td class="odds">
        <label for="W202" class="odds">
            '.$odds["h2"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h2"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W202"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W203">
            03
        </label>
        <input type="hidden" name="aConcede[]" value="W203"/>
    </td>
    <td class="odds">
        <label for="W203" class="odds">
            '.$odds["h3"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h3"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W203"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W204">
            04
        </label>
        <input type="hidden" name="aConcede[]" value="W204"/>
    </td>
    <td class="odds">
        <label for="W204" class="odds">
            '.$odds["h4"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h4"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W204"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="W205">
            05
        </label>
        <input type="hidden" name="aConcede[]" value="W205"/>
    </td>
    <td class="odds">
        <label for="W205" class="odds">
            '.$odds["h5"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h5"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W205"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W206">
            06
        </label>
        <input type="hidden" name="aConcede[]" value="W206"/>
    </td>
    <td class="odds">
        <label for="W206" class="odds">
            '.$odds["h6"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h6"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W206"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W207">
            07
        </label>
        <input type="hidden" name="aConcede[]" value="W207"/>
    </td>
    <td class="odds">
        <label for="W207" class="odds">
            '.$odds["h7"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h7"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W207"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W208">
            08
        </label>
        <input type="hidden" name="aConcede[]" value="W208"/>
    </td>
    <td class="odds">
        <label for="W208" class="odds">
            '.$odds["h8"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h8"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W208"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W209">
            09
        </label>
        <input type="hidden" name="aConcede[]" value="W209"/>
    </td>
    <td class="odds">
        <label for="W209" class="odds">
            '.$odds["h9"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h9"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W209"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="W211">
            11
        </label>
        <input type="hidden" name="aConcede[]" value="W211"/>
    </td>
    <td class="odds">
        <label for="W211" class="odds">
            '.$odds["h10"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h10"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W211"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W212">
            12
        </label>
        <input type="hidden" name="aConcede[]" value="W212"/>
    </td>
    <td class="odds">
        <label for="W212" class="odds">
            '.$odds["h11"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h11"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W212"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W213">
            13
        </label>
        <input type="hidden" name="aConcede[]" value="W213"/>
    </td>
    <td class="odds">
        <label for="W213" class="odds">
            '.$odds["h12"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h12"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W213"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W214">
            14
        </label>
        <input type="hidden" name="aConcede[]" value="W214"/>
    </td>
    <td class="odds">
        <label for="W214" class="odds">
            '.$odds["h13"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h13"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W214"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W215">
            15
        </label>
        <input type="hidden" name="aConcede[]" value="W215"/>
    </td>
    <td class="odds">
        <label for="W215" class="odds">
            '.$odds["h14"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h14"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W215"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="W216">
            16
        </label>
        <input type="hidden" name="aConcede[]" value="W216"/>
    </td>
    <td class="odds">
        <label for="W216" class="odds">
            '.$odds["h15"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h15"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W216"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W217">
            17
        </label>
        <input type="hidden" name="aConcede[]" value="W217"/>
    </td>
    <td class="odds">
        <label for="W217" class="odds">
            '.$odds["h16"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h16"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W217"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W218">
            18
        </label>
        <input type="hidden" name="aConcede[]" value="W218"/>
    </td>
    <td class="odds">
        <label for="W218" class="odds">
            '.$odds["h17"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h17"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W218"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W219">
            19
        </label>
        <input type="hidden" name="aConcede[]" value="W219"/>
    </td>
    <td class="odds">
        <label for="W219" class="odds">
            '.$odds["h18"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h18"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W219"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W222">
            22
        </label>
        <input type="hidden" name="aConcede[]" value="W222"/>
    </td>
    <td class="odds">
        <label for="W222" class="odds">
            '.$odds["h19"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h19"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W222"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="W223">
            23
        </label>
        <input type="hidden" name="aConcede[]" value="W223"/>
    </td>
    <td class="odds">
        <label for="W223" class="odds">
            '.$odds["h20"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h20"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W223"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W224">
            24
        </label>
        <input type="hidden" name="aConcede[]" value="W224"/>
    </td>
    <td class="odds">
        <label for="W224" class="odds">
            '.$odds["h21"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h21"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W224"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W225">
            25
        </label>
        <input type="hidden" name="aConcede[]" value="W225"/>
    </td>
    <td class="odds">
        <label for="W225" class="odds">
            '.$odds["h22"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h22"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W225"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W226">
            26
        </label>
        <input type="hidden" name="aConcede[]" value="W226"/>
    </td>
    <td class="odds">
        <label for="W226" class="odds">
            '.$odds["h23"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h23"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W226"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W227">
            27
        </label>
        <input type="hidden" name="aConcede[]" value="W227"/>
    </td>
    <td class="odds">
        <label for="W227" class="odds">
            '.$odds["h24"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h24"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W227"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="W228">
            28
        </label>
        <input type="hidden" name="aConcede[]" value="W228"/>
    </td>
    <td class="odds">
        <label for="W228" class="odds">
            '.$odds["h25"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h25"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W228"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W229">
            29
        </label>
        <input type="hidden" name="aConcede[]" value="W229"/>
    </td>
    <td class="odds">
        <label for="W229" class="odds">
            '.$odds["h26"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h26"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W229"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W233">
            33
        </label>
        <input type="hidden" name="aConcede[]" value="W233"/>
    </td>
    <td class="odds">
        <label for="W233" class="odds">
            '.$odds["h27"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h27"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W233"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W234">
            34
        </label>
        <input type="hidden" name="aConcede[]" value="W234"/>
    </td>
    <td class="odds">
        <label for="W234" class="odds">
            '.$odds["h28"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h28"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W234"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W235">
            35
        </label>
        <input type="hidden" name="aConcede[]" value="W235"/>
    </td>
    <td class="odds">
        <label for="W235" class="odds">
            '.$odds["h29"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h29"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W235"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="W236">
            36
        </label>
        <input type="hidden" name="aConcede[]" value="W236"/>
    </td>
    <td class="odds">
        <label for="W236" class="odds">
            '.$odds["h30"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h30"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W236"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W237">
            37
        </label>
        <input type="hidden" name="aConcede[]" value="W237"/>
    </td>
    <td class="odds">
        <label for="W237" class="odds">
            '.$odds["h31"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h31"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W237"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W238">
            38
        </label>
        <input type="hidden" name="aConcede[]" value="W238"/>
    </td>
    <td class="odds">
        <label for="W238" class="odds">
            '.$odds["h32"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h32"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W238"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W239">
            39
        </label>
        <input type="hidden" name="aConcede[]" value="W239"/>
    </td>
    <td class="odds">
        <label for="W239" class="odds">
            '.$odds["h33"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h33"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W239"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W244">
            44
        </label>
        <input type="hidden" name="aConcede[]" value="W244"/>
    </td>
    <td class="odds">
        <label for="W244" class="odds">
            '.$odds["h34"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h34"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W244"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="W245">
            45
        </label>
        <input type="hidden" name="aConcede[]" value="W245"/>
    </td>
    <td class="odds">
        <label for="W245" class="odds">
            '.$odds["h35"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h35"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W245"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W246">
            46
        </label>
        <input type="hidden" name="aConcede[]" value="W246"/>
    </td>
    <td class="odds">
        <label for="W246" class="odds">
            '.$odds["h36"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h36"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W246"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W247">
            47
        </label>
        <input type="hidden" name="aConcede[]" value="W247"/>
    </td>
    <td class="odds">
        <label for="W247" class="odds">
            '.$odds["h37"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h37"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W247"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W248">
            48
        </label>
        <input type="hidden" name="aConcede[]" value="W248"/>
    </td>
    <td class="odds">
        <label for="W248" class="odds">
            '.$odds["h38"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h38"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W248"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W249">
            49
        </label>
        <input type="hidden" name="aConcede[]" value="W249"/>
    </td>
    <td class="odds">
        <label for="W249" class="odds">
            '.$odds["h39"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h39"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W249"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="W255">
            55
        </label>
        <input type="hidden" name="aConcede[]" value="W255"/>
    </td>
    <td class="odds">
        <label for="W255" class="odds">
            '.$odds["h40"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h40"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W255"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W256">
            56
        </label>
        <input type="hidden" name="aConcede[]" value="W256"/>
    </td>
    <td class="odds">
        <label for="W256" class="odds">
            '.$odds["h41"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h41"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W256"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W257">
            57
        </label>
        <input type="hidden" name="aConcede[]" value="W257"/>
    </td>
    <td class="odds">
        <label for="W257" class="odds">
            '.$odds["h42"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h42"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W257"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W258">
            58
        </label>
        <input type="hidden" name="aConcede[]" value="W258"/>
    </td>
    <td class="odds">
        <label for="W258" class="odds">
            '.$odds["h43"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h43"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W258"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W259">
            59
        </label>
        <input type="hidden" name="aConcede[]" value="W259"/>
    </td>
    <td class="odds">
        <label for="W259" class="odds">
            '.$odds["h44"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h44"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W259"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="W266">
            66
        </label>
        <input type="hidden" name="aConcede[]" value="W266"/>
    </td>
    <td class="odds">
        <label for="W266" class="odds">
            '.$odds["h45"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h45"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W266"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W267">
            67
        </label>
        <input type="hidden" name="aConcede[]" value="W267"/>
    </td>
    <td class="odds">
        <label for="W267" class="odds">
            '.$odds["h46"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h46"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W267"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W268">
            68
        </label>
        <input type="hidden" name="aConcede[]" value="W268"/>
    </td>
    <td class="odds">
        <label for="W268" class="odds">
            '.$odds["h47"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h47"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W268"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W269">
            69
        </label>
        <input type="hidden" name="aConcede[]" value="W269"/>
    </td>
    <td class="odds">
        <label for="W269" class="odds">
            '.$odds["h48"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h48"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W269"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W277">
            77
        </label>
        <input type="hidden" name="aConcede[]" value="W277"/>
    </td>
    <td class="odds">
        <label for="W277" class="odds">
            '.$odds["h49"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h49"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W277"/>
    </td>

</tr>
<tr>
    <td class="num" style="width:30px">
        <label for="W278">
            78
        </label>
        <input type="hidden" name="aConcede[]" value="W278"/>
    </td>
    <td class="odds">
        <label for="W278" class="odds">
            '.$odds["h50"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h50"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W278"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W279">
            79
        </label>
        <input type="hidden" name="aConcede[]" value="W279"/>
    </td>
    <td class="odds">
        <label for="W279" class="odds">
            '.$odds["h51"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h51"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W279"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W288">
            88
        </label>
        <input type="hidden" name="aConcede[]" value="W288"/>
    </td>
    <td class="odds">
        <label for="W288" class="odds">
            '.$odds["h52"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h52"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W288"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W289">
            89
        </label>
        <input type="hidden" name="aConcede[]" value="W289"/>
    </td>
    <td class="odds">
        <label for="W289" class="odds">
            '.$odds["h53"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h53"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W289"/>
    </td>

    <td class="num" style="width:30px">
        <label for="W299">
            99
        </label>
        <input type="hidden" name="aConcede[]" value="W299"/>
    </td>
    <td class="odds">
        <label for="W299" class="odds">
            '.$odds["h54"].'
        </label>
        <input type="hidden" name="aOdds[]" value="'.$odds["h54"].'"/>
    </td>
    <td class="odds" style="width:60px">
        <input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="W299"/>
    </td>

</tr>
</table>
</div>
<div id="SendB3">
    <span class="credit">下注金额:<b id="total_bet">0.00</b></span>
    <input type="button" name="Cancel" value="取消" class="cancel_cen" />&nbsp;&nbsp;
    <input type="button" name="SubmitA" value="确定" class="order" />
</div>
<div id="BetInfo">
</div>
</form>
</div>
<input type="hidden" id="sRtype" name="sRtype" value="W2"/>
<input type="hidden" id="sGtype" name="sGtype" value="'.$gType.'"/>
<input type="hidden" name="iTime" id="iTime" value="1393482417"/>
</div>
</div>
</div>
</div>
<div id="ding"></div>
<div id="Tips" style="display:none;">当用鼠标压住要下注的球号赔率时，版面右方会出现下注的金额区块，可直接将要下注的号码拉到下注的金额上面下注</div>
<div id="Tips2" style="display:none;">当用鼠标压住要下注的球号时，版面右方会出现下注的金额区块，可直接将要下注的号码拉到下注的金额上面下注</div>
<div id="BlackBG"></div>
</body>
</html>';