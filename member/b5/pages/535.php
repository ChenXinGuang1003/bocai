<?php

$odds1 = odds_lottery_normal::getOddsByPart($lottery_name,"两面","part1");
$odds2 = odds_lottery_normal::getOddsByPart($lottery_name,"两面","part2");

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

                    <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=535" class="NowPlay" title="两面">两面</a>
                    <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=601"  title="和数">和数</a>
                    <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=592"  title="和尾数">和尾数</a>
                    <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=605"  title="一字">一字</a>
                    <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=616"  title="二字">二字</a>
                    <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=514" title="三字" style="display:none">三字</a>
                    <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=517"  title="一字定位">一字定位</a>
                    <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=522"  title="二字定位">二字定位</a>
                    <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=532" title="三字定位" style="display:none">三字定位</a>
                    <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=595"  title="组选三">组选三</a>
                    <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=598"  title="组选六">组选六</a>
                    <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=589"  title="跨度">跨度</a>
                </div>
            </div>
        </div>
        <!--rtype选择-->
        <div id="arrowLeft"></div>
        <div id="tab" style="display:none">
            <ul>
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
            <form id="formB5" name="TJ_20140208-052" action="/member/quickB5_act.php" method="post" onsubmit="return false">      <input type="hidden" name="gid" value="352756" />      <input type="hidden" name="MyRtype" value="535" />      <input type="hidden" name="gtype" value="'.$gType.'" />                     <input type="hidden" name="gold_gmax" class="501100" value="'.$maxMoney.'" />      <input type="hidden" name="gold_gmin" class="501100" value="'.$lowestMoney.'" />      <input type="hidden" name="SC" class="501100" value="50000" />      <input type="hidden" name="SO" class="501100" value="5000" />                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <input type="hidden" name="Maxcredit" value="'.$userMoney.'" />      <input type="hidden" id="D3type" name="D3type" value="A" />      <div class="InfoBar">        <div class="Range" style="display:none">          <span  class="On"><input type="radio" name="jjomj" value="0" checked="checked"/> 000~199</span>          <span ><input type="radio" name="jjomj" value="2"/>200~399</span>          <span ><input type="radio" name="jjomj" value="4"/>400~599</span>          <span ><input type="radio" name="jjomj" value="6"/>600~799</span>          <span ><input type="radio" name="jjomj" value="8"/>800~999</span>        </div>        <input type="hidden" name="Start" value="0" />      </div>       <div class="round-table">      <table class="GameTable">        <tr class="title_line">          <td>组合</td>          <td>单</td>          <td>双</td>          <td>大</td>          <td>小</td>          <td>质</td>          <td>合</td>        </tr>        <tr>                                <td class="num">万</td>                  <td>           <input type="hidden" name="aConcede[]" value="535-ODD" />           <label for="535-ODD" class="odds">                        '.$odds1["h0"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h0"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="535-ODD"  />          </td>                                        <td>           <input type="hidden" name="aConcede[]" value="535-EVEN" />           <label for="535-EVEN" class="odds">                        '.$odds1["h1"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h1"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="535-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="540-OVER" />           <label for="540-OVER" class="odds">                        '.$odds1["h2"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h2"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="540-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="540-UNDER" />           <label for="540-UNDER" class="odds">                        '.$odds1["h3"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h3"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="540-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="545-PRIME" />           <label for="545-PRIME" class="odds">                        '.$odds1["h4"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h4"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="545-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="545-COMPO" />           <label for="545-COMPO" class="odds">                        '.$odds1["h5"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h5"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="545-COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">仟</td>                  <td>           <input type="hidden" name="aConcede[]" value="536-ODD" />           <label for="536-ODD" class="odds">                        '.$odds1["h6"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h6"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="536-ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="536-EVEN" />           <label for="536-EVEN" class="odds">                        '.$odds1["h7"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h7"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="536-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="541-OVER" />           <label for="541-OVER" class="odds">                        '.$odds1["h8"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h8"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="541-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="541-UNDER" />           <label for="541-UNDER" class="odds">                        '.$odds1["h9"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h9"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="541-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="546-PRIME" />           <label for="546-PRIME" class="odds">                        '.$odds1["h10"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h10"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="546-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="546-COMPO" />           <label for="546-COMPO" class="odds">                        '.$odds1["h11"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h11"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="546-COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">佰</td>                  <td>           <input type="hidden" name="aConcede[]" value="537-ODD" />           <label for="537-ODD" class="odds">                        '.$odds1["h12"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h12"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="537-ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="537-EVEN" />           <label for="537-EVEN" class="odds">                        '.$odds1["h13"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h13"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="537-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="542-OVER" />           <label for="542-OVER" class="odds">                        '.$odds1["h14"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h14"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="542-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="542-UNDER" />           <label for="542-UNDER" class="odds">                        '.$odds1["h15"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h15"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="542-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="547-PRIME" />           <label for="547-PRIME" class="odds">                        '.$odds1["h16"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h16"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="547-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="547-COMPO" />           <label for="547-COMPO" class="odds">                        '.$odds1["h17"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h17"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="547-COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">拾</td>                  <td>           <input type="hidden" name="aConcede[]" value="538-ODD" />           <label for="538-ODD" class="odds">                        '.$odds1["h18"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h18"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="538-ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="538-EVEN" />           <label for="538-EVEN" class="odds">                        '.$odds1["h19"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h19"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="538-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="543-OVER" />           <label for="543-OVER" class="odds">                        '.$odds1["h20"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h20"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="543-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="543-UNDER" />           <label for="543-UNDER" class="odds">                        '.$odds1["h21"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h21"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="543-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="548-PRIME" />           <label for="548-PRIME" class="odds">                        '.$odds1["h22"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h22"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="548-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="548-COMPO" />           <label for="548-COMPO" class="odds">                        '.$odds1["h23"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h23"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="548-COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">个</td>                  <td>           <input type="hidden" name="aConcede[]" value="539-ODD" />           <label for="539-ODD" class="odds">                        '.$odds1["h24"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h24"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="539-ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="539-EVEN" />           <label for="539-EVEN" class="odds">                        '.$odds1["h25"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h25"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="539-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="544-OVER" />           <label for="544-OVER" class="odds">                        '.$odds1["h26"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h26"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="544-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="544-UNDER" />           <label for="544-UNDER" class="odds">                        '.$odds1["h27"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h27"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="544-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="549-PRIME" />           <label for="549-PRIME" class="odds">                        '.$odds1["h28"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h28"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="549-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="549-COMPO" />           <label for="549-COMPO" class="odds">                        '.$odds1["h29"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h29"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="549-COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">万仟</td>                  <td>           <input type="hidden" name="aConcede[]" value="550-ODD" />           <label for="550-ODD" class="odds">                        '.$odds1["h30"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h30"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="550-ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="550-EVEN" />           <label for="550-EVEN" class="odds">                        '.$odds1["h31"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h31"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="550-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="560-OVER" />           <label for="560-OVER" class="odds">                        '.$odds1["h32"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h32"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="560-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="560-UNDER" />           <label for="560-UNDER" class="odds">                        '.$odds1["h33"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h33"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="560-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="570-PRIME" />           <label for="570-PRIME" class="odds">                        '.$odds1["h34"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h34"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="570-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="570-COMPO" />           <label for="570-COMPO" class="odds">                        '.$odds1["h35"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h35"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="570-COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">万佰</td>                  <td>           <input type="hidden" name="aConcede[]" value="551-ODD" />           <label for="551-ODD" class="odds">                        '.$odds1["h36"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h36"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="551-ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="551-EVEN" />           <label for="551-EVEN" class="odds">                        '.$odds1["h37"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h37"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="551-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="561-OVER" />           <label for="561-OVER" class="odds">                        '.$odds1["h38"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h38"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="561-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="561-UNDER" />           <label for="561-UNDER" class="odds">                        '.$odds1["h39"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h39"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="561-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="571-PRIME" />           <label for="571-PRIME" class="odds">                        '.$odds1["h40"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h40"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="571-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="571-COMPO" />           <label for="571-COMPO" class="odds">                        '.$odds1["h41"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h41"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="571-COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">万拾</td>                  <td>           <input type="hidden" name="aConcede[]" value="552-ODD" />           <label for="552-ODD" class="odds">                        '.$odds1["h42"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h42"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="552-ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="552-EVEN" />           <label for="552-EVEN" class="odds">                        '.$odds1["h43"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h43"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="552-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="562-OVER" />           <label for="562-OVER" class="odds">                        '.$odds1["h44"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h44"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="562-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="562-UNDER" />           <label for="562-UNDER" class="odds">                        '.$odds1["h45"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h45"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="562-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="572-PRIME" />           <label for="572-PRIME" class="odds">                        '.$odds1["h46"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h46"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="572-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="572-COMPO" />           <label for="572-COMPO" class="odds">                        '.$odds1["h47"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h47"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="572-COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">万个</td>                  <td>           <input type="hidden" name="aConcede[]" value="553-ODD" />           <label for="553-ODD" class="odds">                        '.$odds1["h48"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h48"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="553-ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="553-EVEN" />           <label for="553-EVEN" class="odds">                        '.$odds1["h49"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h49"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="553-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="563-OVER" />           <label for="563-OVER" class="odds">                        '.$odds1["h50"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h50"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="563-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="563-UNDER" />           <label for="563-UNDER" class="odds">                        '.$odds1["h51"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h51"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="563-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="573-PRIME" />           <label for="573-PRIME" class="odds">                        '.$odds1["h52"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h52"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="573-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="573-COMPO" />           <label for="573-COMPO" class="odds">                        '.$odds1["h53"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds1["h53"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="573-COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">仟佰</td>                  <td>           <input type="hidden" name="aConcede[]" value="554-ODD" />           <label for="554-ODD" class="odds">                        '.$odds2["h0"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h0"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="554-ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="554-EVEN" />           <label for="554-EVEN" class="odds">                        '.$odds2["h1"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h1"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="554-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="564-OVER" />           <label for="564-OVER" class="odds">                        '.$odds2["h2"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h2"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="564-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="564-UNDER" />           <label for="564-UNDER" class="odds">                        '.$odds2["h3"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h3"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="564-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="574-PRIME" />           <label for="574-PRIME" class="odds">                        '.$odds2["h4"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h4"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="574-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="574-COMPO" />           <label for="574-COMPO" class="odds">                        '.$odds2["h5"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h5"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="574-COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">仟拾</td>                  <td>           <input type="hidden" name="aConcede[]" value="555-ODD" />           <label for="555-ODD" class="odds">                        '.$odds2["h6"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h6"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="555-ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="555-EVEN" />           <label for="555-EVEN" class="odds">                        '.$odds2["h7"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h7"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="555-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="565-OVER" />           <label for="565-OVER" class="odds">                        '.$odds2["h8"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h8"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="565-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="565-UNDER" />           <label for="565-UNDER" class="odds">                        '.$odds2["h9"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h9"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="565-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="575-PRIME" />           <label for="575-PRIME" class="odds">                        '.$odds2["h10"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h10"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="575-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="575-COMPO" />           <label for="575-COMPO" class="odds">                        '.$odds2["h11"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h11"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="575-COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">仟个</td>                  <td>           <input type="hidden" name="aConcede[]" value="556-ODD" />           <label for="556-ODD" class="odds">                        '.$odds2["h12"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h12"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="556-ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="556-EVEN" />           <label for="556-EVEN" class="odds">                        '.$odds2["h13"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h13"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="556-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="566-OVER" />           <label for="566-OVER" class="odds">                        '.$odds2["h14"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h14"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="566-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="566-UNDER" />           <label for="566-UNDER" class="odds">                        '.$odds2["h15"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h15"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="566-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="576-PRIME" />           <label for="576-PRIME" class="odds">                        '.$odds2["h16"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h16"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="576-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="576-COMPO" />           <label for="576-COMPO" class="odds">                        '.$odds2["h17"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h17"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="576-COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">佰拾</td>                  <td>           <input type="hidden" name="aConcede[]" value="557-ODD" />           <label for="557-ODD" class="odds">                        '.$odds2["h18"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h18"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="557-ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="557-EVEN" />           <label for="557-EVEN" class="odds">                        '.$odds2["h19"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h19"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="557-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="567-OVER" />           <label for="567-OVER" class="odds">                        '.$odds2["h20"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h20"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="567-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="567-UNDER" />           <label for="567-UNDER" class="odds">                        '.$odds2["h21"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h21"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="567-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="577-PRIME" />           <label for="577-PRIME" class="odds">                        '.$odds2["h22"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h22"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="577-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="577-COMPO" />           <label for="577-COMPO" class="odds">                        '.$odds2["h23"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h23"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="577-COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">佰个</td>                  <td>           <input type="hidden" name="aConcede[]" value="558-ODD" />           <label for="558-ODD" class="odds">                        '.$odds2["h24"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h24"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="558-ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="558-EVEN" />           <label for="558-EVEN" class="odds">                        '.$odds2["h25"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h25"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="558-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="568-OVER" />           <label for="568-OVER" class="odds">                        '.$odds2["h26"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h26"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="568-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="568-UNDER" />           <label for="568-UNDER" class="odds">                        '.$odds2["h27"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h27"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="568-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="578-PRIME" />           <label for="578-PRIME" class="odds">                        '.$odds2["h28"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h28"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="578-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="578-COMPO" />           <label for="578-COMPO" class="odds">                        '.$odds2["h29"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h29"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="578-COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">拾个</td>                  <td>           <input type="hidden" name="aConcede[]" value="559-ODD" />           <label for="559-ODD" class="odds">                        '.$odds2["h30"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h30"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="559-ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="559-EVEN" />           <label for="559-EVEN" class="odds">                        '.$odds2["h31"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h31"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="559-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="569-OVER" />           <label for="569-OVER" class="odds">                        '.$odds2["h32"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h32"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="569-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="569-UNDER" />           <label for="569-UNDER" class="odds">                        '.$odds2["h33"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h33"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="569-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="579-PRIME" />           <label for="579-PRIME" class="odds">                        '.$odds2["h34"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h34"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="579-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="579-COMPO" />           <label for="579-COMPO" class="odds">                        '.$odds2["h35"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h35"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="579-COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">前三</td>                  <td>           <input type="hidden" name="aConcede[]" value="580-ODD" />           <label for="580-ODD" class="odds">                        '.$odds2["h36"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h36"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="580-ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="580-EVEN" />           <label for="580-EVEN" class="odds">                        '.$odds2["h37"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h37"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="580-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="583-OVER" />           <label for="583-OVER" class="odds">                        '.$odds2["h38"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h38"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="583-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="583-UNDER" />           <label for="583-UNDER" class="odds">                        '.$odds2["h39"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h39"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="583-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="586-PRIME" />           <label for="586-PRIME" class="odds">                        '.$odds2["h40"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h40"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="586-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="586-COMPO" />           <label for="586-COMPO" class="odds">                        '.$odds2["h41"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h41"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="586-COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">中三</td>                  <td>           <input type="hidden" name="aConcede[]" value="581-ODD" />           <label for="581-ODD" class="odds">                        '.$odds2["h42"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h42"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="581-ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="581-EVEN" />           <label for="581-EVEN" class="odds">                        '.$odds2["h43"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h43"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="581-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="584-OVER" />           <label for="584-OVER" class="odds">                        '.$odds2["h44"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h44"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="584-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="584-UNDER" />           <label for="584-UNDER" class="odds">                        '.$odds2["h45"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h45"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="584-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="587-PRIME" />           <label for="587-PRIME" class="odds">                        '.$odds2["h46"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h46"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="587-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="587-COMPO" />           <label for="587-COMPO" class="odds">                        '.$odds2["h47"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h47"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="587-COMPO"  />          </td>                </tr>        <tr>                                        <td class="num">后三</td>                  <td>           <input type="hidden" name="aConcede[]" value="582-ODD" />           <label for="582-ODD" class="odds">                        '.$odds2["h48"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h48"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="582-ODD"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="582-EVEN" />           <label for="582-EVEN" class="odds">                        '.$odds2["h49"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h49"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="582-EVEN"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="585-OVER" />           <label for="585-OVER" class="odds">                        '.$odds2["h50"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h50"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="585-OVER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="585-UNDER" />           <label for="585-UNDER" class="odds">                        '.$odds2["h51"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h51"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="585-UNDER"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="588-PRIME" />           <label for="588-PRIME" class="odds">                        '.$odds2["h52"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h52"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="588-PRIME"  />          </td>                                <td>           <input type="hidden" name="aConcede[]" value="588-COMPO" />           <label for="588-COMPO" class="odds">                        '.$odds2["h53"].'                      </label>           <input type="hidden" name="aOdds[]" value="'.$odds2["h53"].'" />           <input type="text" min="0" max="99999999" class="G" name="gold[]" id="588-COMPO"  />          </td>                              </tr>      </table>      </div>          <div id="SendB5">        <span class="credit">下注金额:<b id="total_bet">0.00</b></span>        <input type="button" name="Cancel" value="取消" class="cancel_cen" />&nbsp;&nbsp;        <input type="button" name="SubmitA" value="确定" class="order" />      </div>      <div id="BetInfo">                  </div>    </form>
        </div>
        <input type="hidden" id="sRtype" name="sRtype" value="535"/>
        <input type="hidden" id="sGtype" name="sGtype" value="'.$gType.'"/>
        <input type="hidden" name="iTime" id="iTime" value="1393818190"/>
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