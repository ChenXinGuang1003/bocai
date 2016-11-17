<?php

$odds = six_lottery_odds::getOddsByBallType("SP","a_side");
$odds_fs = six_lottery_odds::getOddsByBallType("SP","fs");

echo '
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta content="telephone=no" name="format-detection"/>
    <title>六合彩</title>
    <link rel="stylesheet" href="/style/member/pitaya_odds_settings.css?31742ee"/>
    <link rel="stylesheet" href="/style/AlertBox.css?31742ee"/>
    <link rel="stylesheet" href="/style/ConfirmBox.css?31742ee"/>
    <link href="/pt/assets/css/jquery-ui-1.10.3.custom.min.css?63c179a" rel="stylesheet"/>
    <link href="/pt/assets/css/ui-tooltip.css?63c179a" rel="stylesheet"/>
    <link href="/TPL/C_TYPE_IPL/style/contextmenu.css?31742ee" rel="stylesheet"/>
    <link href="/TPL/C_TYPE_IPL/style/View.css?31742ee" rel="stylesheet"/>
    <link href="/TPL/C_TYPE_IPL/style/jquery.GoldUI.css?31742ee" rel="stylesheet"/>
    <link href="/TPL/C_TYPE_IPL/style/tpl_odds_settings.css?31742ee" rel="stylesheet"/>
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

    <script src="../lottery/oddssetting/LHC/saveOdds.js"></script>

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
    <script src="/js/PC/lhc_odds_settings.js?31742ee"></script>
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
            $("#content_inner").css("display","");
            $("#tab").css("display","");
        })
    </script>
</head>
<body>
<div id="box_body" class="bg2yellow">
<div id="box_range">
<div id="main">
<div id="left" style="display:none">
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
    <span style="color: white">六合彩-赔率设置</span>
</h2>

<div id="content_inner" style="display:none">
    <div style="display: none;" id="c_rtype" class="GameName"></div>
    <div>
        <div id="wager_groups" class="CQ">
            <a href="/member/b5/b5.php?gtype=CQ&amp;rtype=666"  title="两面">两面</a>
            <a href="/member/b5/b5.php?gtype=CQ&amp;rtype=671"  title="正码过关">正码过关</a>
            <a href="/member/b5/b5.php?gtype=CQ&amp;rtype=605" class="NowPlay" title="正码特">正码特</a>
            <a href="/member/b5/b5.php?gtype=CQ&amp;rtype=621"  title="连码">连码</a>
            <a href="/member/b5/b5.php?gtype=CQ&amp;rtype=681"  title="连肖">连肖</a>
            <a href="/member/b5/b5.php?gtype=CQ&amp;rtype=685"  title="连尾">连尾</a>
            <a href="/member/b5/b5.php?gtype=CQ&amp;rtype=631" title="生肖">生肖</a>
            <a href="/member/b5/b5.php?gtype=CQ&amp;rtype=641"  title="色波">色波</a>
            <a href="/member/b5/b5.php?gtype=CQ&amp;rtype=651"  title="头尾数">头尾数</a>
        </div>
    </div>
</div>
<!--rtype选择-->
<div id="arrowLeft"></div>
<div id="tab" style="display:none">
    <ul>
        <li class="onTagClick"><span class="605"><b>特别号A面</b></span></li>
        <li class="unTagClick"><span class="606"><b>正码一</b></span></li>
        <li class="unTagClick"><span class="607"><b>正码二</b></span></li>
        <li class="unTagClick"><span class="608"><b>正码三</b></span></li>
        <li class="unTagClick"><span class="609"><b>正码四</b></span></li>
        <li class="unTagClick"><span class="610"><b>正码五</b></span></li>
        <li class="unTagClick"><span class="611"><b>正码六</b></span></li>
        <li class="unTagClick"><span class="612"><b>正码(所有)</b></span></li>
        <li class="unTagClick"><span class="670"><b>特别号B面</b></span></li>
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
    <div id="qkGoldDivW1" class="quick_betnum_style" style="display:none">
        下注金额 :
        <input type="text" min="0" max="99999999" name="qkGoldW1" id="qkGoldW1" pattern="[0-9]*" placeholder="下注金额"/>
    </div>
    <div id="B5W1quick" class="quick_option_style" style="display:none">
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
    <div id="B5D2quick" class="InfoBar" style="display:none">
        <div id="qkGoldDiv" class="quick_betnum_style" style="display:none">
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

<form id="formLhc" name="D3_022" action="/member/quickB5_act.php" method="post" onsubmit="return false">
<input type="hidden" name="gid" value="352278" />
<input type="hidden" name="MyRtype" value="SP" />
<input type="hidden" name="gtype" value="CQ" />

<input type="hidden" name="gold_gmax" value="5000" />
<input type="hidden" name="gold_gmin" value="1" />
<input type="hidden" name="SC" value="50000" />
<input type="hidden" name="SO" value="5000" />
<input type="hidden" name="Maxcredit" value="1" />
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
    <div style="margin: 2px 10px;">
        反水最小金额：
        <input name="fsMoney" style="margin-right: 10px;" value="'.$odds_fs["h1"].'"/>
        反水比例：
        <input name="fsRate" style="margin-right: 10px;" value="'.$odds_fs["h2"].'"/>最小比例为0.01，如果是更小的数值，会被系统自动调整。
        <div style="border:2px solid red;margin: 4px 0;">例如：用户投注六合彩600，最小反水金额为500，反水比例0.01，用户会得到反水6=600*0.01。</div>
    </div>
    <table class="GameTable">
        <tr class="title_line">
            <td>号码</td>
            <td>赔率</td>
            <td>号码</td>
            <td>赔率</td>
            <td>号码</td>
            <td>赔率</td>
            <td>号码</td>
            <td>赔率</td>
            <td>号码</td>
            <td>赔率</td>
        </tr>
        <tr>
            <td class="num" style="width:30px">
                <label for="SP-1">
                    1
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h1"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-2">
                    2
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h2"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-3">
                    3
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h3"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-4">
                    4
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h4"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-5">
                    5
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h5"].'"/>
            </td>

        </tr>
        <tr>
            <td class="num" style="width:30px">
                <label for="SP-6">
                    6
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h6"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-7">
                    7
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h7"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-8">
                    8
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h8"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-9">
                    9
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h9"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-10">
                    10
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h10"].'"/>
            </td>

        </tr>


        <tr>
            <td class="num" style="width:30px">
                <label for="SP-11">
                    11
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h11"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-12">
                    12
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h12"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-13">
                    13
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h13"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-14">
                    14
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h14"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-15">
                    15
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h15"].'"/>
            </td>

        </tr>
        <tr>
            <td class="num" style="width:30px">
                <label for="SP-16">
                    16
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h16"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-17">
                    17
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h17"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-18">
                    18
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h18"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-19">
                    19
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h19"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-20">
                    20
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h20"].'"/>
            </td>

        </tr>
        <tr>
            <td class="num" style="width:30px">
                <label for="SP-21">
                    21
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h21"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-22">
                    22
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h22"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-23">
                    23
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h23"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-24">
                    24
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h24"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-25">
                    25
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h25"].'"/>
            </td>

        </tr>
        <tr>
            <td class="num" style="width:30px">
                <label for="SP-26">
                    26
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h26"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-27">
                    27
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h27"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-28">
                    28
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h28"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-29">
                    29
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h29"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-30">
                    30
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h30"].'"/>
            </td>

        </tr>
        <tr>
            <td class="num" style="width:30px">
                <label for="SP-31">
                    31
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h31"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-32">
                    32
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h32"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-33">
                    33
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h33"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-34">
                    34
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h34"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-35">
                    35
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h35"].'"/>
            </td>

        </tr>
        <tr>
            <td class="num" style="width:30px">
                <label for="SP-36">
                    36
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h36"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-37">
                    37
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h37"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-38">
                    38
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h38"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-39">
                    39
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h39"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-40">
                    40
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h40"].'"/>
            </td>

        </tr>
        <tr>
            <td class="num" style="width:30px">
                <label for="SP-41">
                    41
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h41"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-42">
                    42
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h42"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-43">
                    43
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h43"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-44">
                    44
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h44"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-45">
                    45
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h45"].'"/>
            </td>

        </tr>
        <tr>
            <td class="num" style="width:30px">
                <label for="SP-46">
                    46
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h46"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-47">
                    47
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h47"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-48">
                    48
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h48"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="SP-49">
                    49
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h49"].'"/>
            </td>
        </tr>
    </table>
</div>
<div id="SendB5">
    <button id="btn-save-odds" onclick="saveLhcSPAside()" class="order">保存</button>
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
<input type="hidden" id="sRtype" name="sRtype" value="SP"/>
<input type="hidden" id="sGtype" name="sGtype" value="CQ"/>
<input type="hidden" name="iTime" id="iTime" value="1393815912"/>
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