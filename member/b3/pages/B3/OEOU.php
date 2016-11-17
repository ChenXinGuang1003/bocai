<?php

$odds = odds_lottery_normal::getOdds($lottery_name,"两面");

echo '
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta content="telephone=no" name="format-detection"/>
    <title>两面</title>
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

                    <a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=OEOU" class="NowPlay"  title="两面">两面</a>
                    <a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=SN"  title="和数">和数</a>
                    <a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=MCUF"  title="和尾数">和尾数</a>
                    <a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=W1"  title="一字">一字</a>
                    <a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=W2"  title="二字">二字</a>
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

        <div id="tab" style="display:none">
            <ul>
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
            <form id="formB3" name="D3_021" action="/member/quickB3_act.php" method="post" onsubmit="return false">      <input type="hidden" name="gid" value="344926" />      <input type="hidden" name="MyRtype" value="OEOU" />      <input type="hidden" name="gtype" value="'.$gType.'" />                 <input type="hidden" name="gold_gmax" class="CUPC" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="CUPC" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="CUPC" value="50000" />      <input type="hidden" name="SO" class="CUPC" value="5000" />             <input type="hidden" name="gold_gmax" class="CUOE" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="CUOE" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="CUOE" value="50000" />      <input type="hidden" name="SO" class="CUOE" value="5000" />             <input type="hidden" name="gold_gmax" class="MCPC" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="MCPC" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="MCPC" value="50000" />      <input type="hidden" name="SO" class="MCPC" value="5000" />             <input type="hidden" name="gold_gmax" class="UPC" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="UPC" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="UPC" value="50000" />      <input type="hidden" name="SO" class="UPC" value="5000" />             <input type="hidden" name="gold_gmax" class="COU" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="COU" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="COU" value="50000" />      <input type="hidden" name="SO" class="COU" value="5000" />             <input type="hidden" name="gold_gmax" class="MUOE" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="MUOE" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="MUOE" value="50000" />      <input type="hidden" name="SO" class="MUOE" value="5000" />             <input type="hidden" name="gold_gmax" class="MPC" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="MPC" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="MPC" value="50000" />      <input type="hidden" name="SO" class="MPC" value="5000" />             <input type="hidden" name="gold_gmax" class="CUOU" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="CUOU" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="CUOU" value="50000" />      <input type="hidden" name="SO" class="CUOU" value="5000" />             <input type="hidden" name="gold_gmax" class="MUOU" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="MUOU" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="MUOU" value="50000" />      <input type="hidden" name="SO" class="MUOU" value="5000" />             <input type="hidden" name="gold_gmax" class="MUPC" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="MUPC" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="MUPC" value="50000" />      <input type="hidden" name="SO" class="MUPC" value="5000" />             <input type="hidden" name="gold_gmax" class="MCUOU" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="MCUOU" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="MCUOU" value="50000" />      <input type="hidden" name="SO" class="MCUOU" value="5000" />             <input type="hidden" name="gold_gmax" class="MCOE" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="MCOE" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="MCOE" value="50000" />      <input type="hidden" name="SO" class="MCOE" value="5000" />             <input type="hidden" name="gold_gmax" class="UOE" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="UOE" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="UOE" value="50000" />      <input type="hidden" name="SO" class="UOE" value="5000" />             <input type="hidden" name="gold_gmax" class="MOU" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="MOU" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="MOU" value="50000" />      <input type="hidden" name="SO" class="MOU" value="5000" />             <input type="hidden" name="gold_gmax" class="CPC" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="CPC" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="CPC" value="50000" />      <input type="hidden" name="SO" class="CPC" value="5000" />             <input type="hidden" name="gold_gmax" class="MCUOE" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="MCUOE" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="MCUOE" value="50000" />      <input type="hidden" name="SO" class="MCUOE" value="5000" />             <input type="hidden" name="gold_gmax" class="UOU" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="UOU" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="UOU" value="50000" />      <input type="hidden" name="SO" class="UOU" value="5000" />             <input type="hidden" name="gold_gmax" class="MCUPC" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="MCUPC" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="MCUPC" value="50000" />      <input type="hidden" name="SO" class="MCUPC" value="5000" />             <input type="hidden" name="gold_gmax" class="COE" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="COE" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="COE" value="50000" />      <input type="hidden" name="SO" class="COE" value="5000" />             <input type="hidden" name="gold_gmax" class="MOE" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="MOE" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="MOE" value="50000" />      <input type="hidden" name="SO" class="MOE" value="5000" />             <input type="hidden" name="gold_gmax" class="MCOU" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="MCOU" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="MCOU" value="50000" />      <input type="hidden" name="SO" class="MCOU" value="5000" />              <input type="hidden" name="Maxcredit" value="'.$userMoney.'" />      <input type="hidden" id="D3type" name="D3type" value="A" />      <div class="InfoBar">        <div class="Range" style="display:none">          <span  class="On"><input type="radio" name="jjomj" value="0" checked="checked"/> 000~199</span>          <span ><input type="radio" name="jjomj" value="2"/>200~399</span>          <span ><input type="radio" name="jjomj" value="4"/>400~599</span>          <span ><input type="radio" name="jjomj" value="6"/>600~799</span>          <span ><input type="radio" name="jjomj" value="8"/>800~999</span>        </div>        <input type="hidden" name="Start" value="0" />      </div>           <div class="round-table" style="margin-top:20px">      <table class="GameTable">        <tr class="title_line">          <td>组合</td>          <td>单</td>          <td>双</td>          <td>大</td>          <td>小</td>          <td>质</td>          <td>合</td>        </tr>        <tr>                                <td class="num">佰</td>                  <td>           <input type="hidden" name="aConcede[]" value="M_ODD" />           <label for="M_ODD" class="odds">                        '.$odds["h0"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h0"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="M_ODD"  />          </td>                                        <td>           <input type="hidden" name="aConcede[]" value="M_EVEN" />           <label for="M_EVEN" class="odds">                        '.$odds["h1"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h1"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="M_EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="M_OVER" />           <label for="M_OVER" class="odds">                        '.$odds["h2"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h2"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="M_OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="M_UNDER" />           <label for="M_UNDER" class="odds">                        '.$odds["h3"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h3"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="M_UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="M_PRIME" />           <label for="M_PRIME" class="odds">                        '.$odds["h4"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h4"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="M_PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="M_COMPO" />           <label for="M_COMPO" class="odds">                        '.$odds["h5"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h5"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="M_COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">拾</td>                  <td>           <input type="hidden" name="aConcede[]" value="C_ODD" />           <label for="C_ODD" class="odds">                        '.$odds["h6"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h6"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="C_ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="C_EVEN" />           <label for="C_EVEN" class="odds">                        '.$odds["h7"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h7"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="C_EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="C_OVER" />           <label for="C_OVER" class="odds">                        '.$odds["h8"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h8"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="C_OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="C_UNDER" />           <label for="C_UNDER" class="odds">                        '.$odds["h9"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h9"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="C_UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="C_PRIME" />           <label for="C_PRIME" class="odds">                        '.$odds["h10"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h10"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="C_PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="C_COMPO" />           <label for="C_COMPO" class="odds">                        '.$odds["h11"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h11"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="C_COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">个</td>                  <td>           <input type="hidden" name="aConcede[]" value="U_ODD" />           <label for="U_ODD" class="odds">                        '.$odds["h12"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h12"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="U_ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="U_EVEN" />           <label for="U_EVEN" class="odds">                        '.$odds["h13"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h13"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="U_EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="U_OVER" />           <label for="U_OVER" class="odds">                        '.$odds["h14"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h14"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="U_OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="U_UNDER" />           <label for="U_UNDER" class="odds">                        '.$odds["h15"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h15"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="U_UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="U_PRIME" />           <label for="U_PRIME" class="odds">                        '.$odds["h16"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h16"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="U_PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="U_COMPO" />           <label for="U_COMPO" class="odds">                        '.$odds["h17"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h17"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="U_COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">佰拾</td>                  <td>           <input type="hidden" name="aConcede[]" value="MC_ODD" />           <label for="MC_ODD" class="odds">                        '.$odds["h18"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h18"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MC_ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="MC_EVEN" />           <label for="MC_EVEN" class="odds">                        '.$odds["h19"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h19"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MC_EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="MC_OVER" />           <label for="MC_OVER" class="odds">                        '.$odds["h20"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h20"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MC_OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="MC_UNDER" />           <label for="MC_UNDER" class="odds">                        '.$odds["h21"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h21"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MC_UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="MC_PRIME" />           <label for="MC_PRIME" class="odds">                        '.$odds["h22"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h22"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MC_PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="MC_COMPO" />           <label for="MC_COMPO" class="odds">                        '.$odds["h23"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h23"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MC_COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">佰个</td>                  <td>           <input type="hidden" name="aConcede[]" value="MU_ODD" />           <label for="MU_ODD" class="odds">                        '.$odds["h24"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h24"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MU_ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="MU_EVEN" />           <label for="MU_EVEN" class="odds">                        '.$odds["h25"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h25"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MU_EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="MU_OVER" />           <label for="MU_OVER" class="odds">                        '.$odds["h26"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h26"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MU_OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="MU_UNDER" />           <label for="MU_UNDER" class="odds">                        '.$odds["h27"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h27"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MU_UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="MU_PRIME" />           <label for="MU_PRIME" class="odds">                        '.$odds["h28"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h28"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MU_PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="MU_COMPO" />           <label for="MU_COMPO" class="odds">                        '.$odds["h29"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h29"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MU_COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">拾个</td>                  <td>           <input type="hidden" name="aConcede[]" value="CU_ODD" />           <label for="CU_ODD" class="odds">                        '.$odds["h30"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h30"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="CU_ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="CU_EVEN" />           <label for="CU_EVEN" class="odds">                        '.$odds["h31"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h31"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="CU_EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="CU_OVER" />           <label for="CU_OVER" class="odds">                        '.$odds["h32"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h32"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="CU_OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="CU_UNDER" />           <label for="CU_UNDER" class="odds">                        '.$odds["h33"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h33"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="CU_UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="CU_PRIME" />           <label for="CU_PRIME" class="odds">                        '.$odds["h34"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h34"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="CU_PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="CU_COMPO" />           <label for="CU_COMPO" class="odds">                        '.$odds["h35"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h35"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="CU_COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">佰拾个</td>                  <td>           <input type="hidden" name="aConcede[]" value="MCU_ODD" />           <label for="MCU_ODD" class="odds">                        '.$odds["h36"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h36"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MCU_ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="MCU_EVEN" />           <label for="MCU_EVEN" class="odds">                        '.$odds["h37"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h37"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MCU_EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="MCU_OVER" />           <label for="MCU_OVER" class="odds">                        '.$odds["h38"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h38"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MCU_OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="MCU_UNDER" />           <label for="MCU_UNDER" class="odds">                        '.$odds["h39"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h39"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MCU_UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="MCU_PRIME" />           <label for="MCU_PRIME" class="odds">                        '.$odds["h40"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h40"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MCU_PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="MCU_COMPO" />           <label for="MCU_COMPO" class="odds">                        '.$odds["h41"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds["h41"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="MCU_COMPO"  />          </td>                              </tr>      </table>      </div>          <div id="SendB3">        <span class="credit">下注金额:<b id="total_bet">0.00</b></span>        <input type="button" name="Cancel" value="取消" class="cancel_cen" />&nbsp;&nbsp;        <input type="button" name="SubmitA" value="确定" class="order" />      </div>      <div id="BetInfo">                  </div>    </form>
        </div>
        <input type="hidden" id="sRtype" name="sRtype" value="OEOU"/>
        <input type="hidden" id="sGtype" name="sGtype" value="'.$gType.'"/>
        <input type="hidden" name="iTime" id="iTime" value="1393482676"/>
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