<?php

echo '
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta content="telephone=no" name="format-detection" />
    <title>组选三</title>
    <link rel="stylesheet" href="/style/member/pitaya.css?3569e86" />
    <link rel="stylesheet" href="/style/AlertBox.css?3569e86" />
    <link rel="stylesheet" href="/style/ConfirmBox.css?3569e86" />
    <link href="/pt/assets/css/jquery-ui-1.10.3.custom.min.css?ee81d69" rel="stylesheet" />
    <link href="/pt/assets/css/ui-tooltip.css?ee81d69" rel="stylesheet" />
    <link href="/TPL/C_TYPE_IPL/style/contextmenu.css?3569e86" rel="stylesheet" />
    <link href="/TPL/C_TYPE_IPL/style/View.css?3569e86" rel="stylesheet" />
    <link href="/TPL/C_TYPE_IPL/style/jquery.GoldUI.css?3569e86" rel="stylesheet" />
    <link href="/TPL/C_TYPE_IPL/style/tpl.css?3569e86" rel="stylesheet" />
    <link href="/TPL/C_TYPE_IPL/style/zindex.css?3569e86" rel="stylesheet" />
    <!--[if lte IE 6]>
    <link href="/style/member/ie6.css?3569e86" rel="stylesheet" />
    <![endif]-->
    <!--[if IE 7]>
    <link href="/style/member/ie7.css?3569e86" rel="stylesheet" />
    <![endif]-->
    <!--[if IE 8]>
    <link href="/style/member/ie8.css?3569e86" rel="stylesheet" />
    <script src="/js/ie8.js?3569e86"></script>
    <![endif]-->
    <!--[if IE 9]>
    <link href="/style/member/ie9.css?3569e86" rel="stylesheet" />
    <![endif]-->
    <script src="/inte/js/Lang.js?key=charset&amp;3569e86"></script>
    <script src="/inte/js/Lang/package.js?3569e86"></script>
    <script src="/inte/js/overMenu.js?3569e86"></script>
    <script src="/inte/js/memberCenter.js?3569e86"></script>
    <script src="/inte/js/jquery.GoldUI.js?3569e86"></script>
    <script src="/inte/js/timeclock.js?3569e86"></script>
    <script src="/inte/js/zindexSort.js?3569e86"></script>
    <script src="/js/jquery-1.7.1.js?3569e86"></script>
    <script src="/pt/assets/js/lib/jquery-ui-1.10.3.custom.min.js?ee81d69"></script>
    <script src="/pt/assets/js/lib/sound.js?ee81d69"></script>
    <script src="/inte/js/AlertBox.js?3569e86"></script>
    <script src="/inte/js/ConfirmBox.js?3569e86"></script>
    <script src="/js/marquee.js?3569e86"></script>
    <script src="/js/C2R_B5.js?3569e86"></script>
    <script src="/js/jquery.contextmenu.js?3569e86"></script>
    <script src="/js/View.js?3569e86"></script>
    <script src="/js/mobileStyle.js?3569e86"></script>
    <script src="/js/underscore.js?3569e86"></script>
    <script src="/inte/js/char3_group.js?3569e86"></script>
    <script src="/js/PC/b5.js?31742ee"></script>
    <script src="/js/PC/b5Order.js?31742e5"></script>
    <script src="/js/D3.js?3569e86"></script>
    <script src="/inte/js/superfish.js?3569e86"></script>
    <script src="/inte/js/group_menu.js?3569e86"></script>
    <!--[if lte IE 8]>
    <script src="/js/html5.js?3569e86"></script>
    <script src="/inte/js/respond.src.js?3569e86"></script>
    <![endif]-->
    <!--[if IE 6]>
    <script src="/js/TouchView.js?3569e86"></script>
    <![endif]-->
    <script>
        <!--
        var aPortfolio = {"535":"\u4e07\u5355\u53cc","536":"\u4edf\u5355\u53cc","537":"\u4f70\u5355\u53cc","538":"\u62fe\u5355\u53cc","539":"\u4e2a\u5355\u53cc","540":"\u4e07\u5927\u5c0f","541":"\u4edf\u5927\u5c0f","542":"\u4f70\u5927\u5c0f","543":"\u62fe\u5927\u5c0f","544":"\u4e2a\u5927\u5c0f","545":"\u4e07\u8d28\u5408","546":"\u4edf\u8d28\u5408","547":"\u4f70\u8d28\u5408","548":"\u62fe\u8d28\u5408",
            "549":"\u4e2a\u8d28\u5408","550":"\u4e07\u4edf\u548c\u6570\u5355\u53cc","551":"\u4e07\u4f70\u548c\u6570\u5355\u53cc","552":"\u4e07\u62fe\u548c\u6570\u5355\u53cc","553":"\u4e07\u4e2a\u548c\u6570\u5355\u53cc","554":"\u4edf\u4f70\u548c\u6570\u5355\u53cc","555":"\u4edf\u62fe\u548c\u6570\u5355\u53cc","556":"\u4edf\u4e2a\u548c\u6570\u5355\u53cc","557":"\u4f70\u62fe\u548c\u6570\u5355\u53cc",
            "558":"\u4f70\u4e2a\u548c\u6570\u5355\u53cc","559":"\u62fe\u4e2a\u548c\u6570\u5355\u53cc","560":"\u4e07\u4edf\u548c\u6570\u5927\u5c0f","561":"\u4e07\u4f70\u548c\u6570\u5927\u5c0f","562":"\u4e07\u62fe\u548c\u6570\u5927\u5c0f","563":"\u4e07\u4e2a\u548c\u6570\u5927\u5c0f","564":"\u4edf\u4f70\u548c\u6570\u5927\u5c0f","565":"\u4edf\u62fe\u548c\u6570\u5927\u5c0f",
            "566":"\u4edf\u4e2a\u548c\u6570\u5927\u5c0f","567":"\u4f70\u62fe\u548c\u6570\u5927\u5c0f","568":"\u4f70\u4e2a\u548c\u6570\u5927\u5c0f","569":"\u62fe\u4e2a\u548c\u6570\u5927\u5c0f","570":"\u4e07\u4edf\u548c\u6570\u8d28\u5408","571":"\u4e07\u4f70\u548c\u6570\u8d28\u5408","572":"\u4e07\u62fe\u548c\u6570\u8d28\u5408","573":"\u4e07\u4e2a\u548c\u6570\u8d28\u5408",
            "574":"\u4edf\u4f70\u548c\u6570\u8d28\u5408","575":"\u4edf\u62fe\u548c\u6570\u8d28\u5408","576":"\u4edf\u4e2a\u548c\u6570\u8d28\u5408","577":"\u4f70\u62fe\u548c\u6570\u8d28\u5408","578":"\u4f70\u4e2a\u548c\u6570\u8d28\u5408","579":"\u62fe\u4e2a\u548c\u6570\u8d28\u5408","580":"(\u524d\u4e09)\u548c\u6570\u5355\u53cc","581":"(\u4e2d\u4e09)\u548c\u6570\u5355\u53cc",
            "582":"(\u540e\u4e09)\u548c\u6570\u5355\u53cc","583":"(\u524d\u4e09)\u548c\u6570\u5927\u5c0f","584":"(\u4e2d\u4e09)\u548c\u6570\u5927\u5c0f","585":"(\u540e\u4e09)\u548c\u6570\u5927\u5c0f","586":"(\u524d\u4e09)\u548c\u6570\u8d28\u5408","587":"(\u4e2d\u4e09)\u548c\u6570\u8d28\u5408","588":"(\u540e\u4e09)\u548c\u6570\u8d28\u5408"};
        var aOEOUPC = {"ODD":"单", "EVEN":"双","OVER":"大", "UNDER":"小", "PRIME":"质", "COMPO":"合"};
        $().ready(function(){
            self.zindexSort.setup();
            $("#ui-btn-games > ul").superfish();
            $("#ui-btn-games > ul > li > a:not(.sf-no-ul)").bind("click", function () {return false;});
            //self.group_menu.install($("#wager_groups"));
            $("#wager_groups a").tooltip();
            //ViewBox
            self.ViewBox.install($("ul#ui-btn-features > li > a:not(.logout), #game_result"));
            if (document.getElementById("content") && document.getElementById("rde-contextmenu")) {
                var _opt = [];
                $("#rde-contextmenu > a").each(function (i) {
                    var me = this;
                    var _action = function () {self.ViewBox.single(me)};
                    var _icon = (this.getAttribute("data-icon")) ? this.getAttribute("data-icon") : "/TPL/pitaya/images/wi0009-16.gif";
                    _opt.push({text: this.title, icon : _icon, alias: this.title, action : _action });
                });
                var _option = { width : 150, items : _opt };
                $("#content").contextmenu(_option);
            }
            self.GoldUI.installDrag("betMove", self.betSpace.betB5.onDragBet);
            self.timeclock.install(document.getElementById("HKTime"), document.getElementById("iTime"));
            var _opt = {
                showTag : document.getElementById("Game"),
                FCDL : $("#FCDL"),
                FCDH : $("#FCDH"),
                FCDS : $("#FCDS"),
                hall : false,
                inner_box : $("#content"),
                menu : $("#wager_groups a"),
                ticked : document.getElementById("shownum2"),
                tickedH : document.getElementById("shownumH"),
                tickedM : document.getElementById("shownumC"),
                tickedE : document.getElementById("shownumS"),
                cname : document.getElementById("c_rtype"),
                ynum : document.getElementById("YearNum"),
                show_ticked : document.getElementById("shownum"),
                show_ticked_one : document.getElementById("tickedBox"),
                show_ticked_exception : document.getElementById("tickedBoxBt"),
                info_ticked : $("#shownumH,#shownumC,#shownumS,#shownum2")
            }
            self.GameB5.install(_opt, 1);
            $.ajax({
                url : "/member/select_CQ.php",
                type : "GET",
                dataType : "script"
            });
            ccMarquee("marquee");

        });
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
                    <a class="layer1-a sf-no-ul" href="/member/lt/"><b></b>六合彩</a>
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
                    <a class="layer1-a" href="#FF"><b></b>分分彩</a>
                    <ul class="layer2" style="display:none">
                        <li >
                            <a href="/pt/mem/order/GXSF">广西十分彩</a>
                        </li>
                        <li >
                            <a href="/pt/mem/order/GDSF">广东十分彩</a>
                        </li>
                        <li >
                            <a href="/pt/mem/order/TJSF">天津十分彩</a>
                        </li>
                        <li>
                            <a href="/pt/mem/order/GD11">广东十一选五</a>
                        </li>
                        <li >
                            <a href="/pt/mem/order/BJPK">北京PK拾</a>
                        </li>
                    </ul>
                </li>
                <li class="layer1-li">
                    <a class="layer1-a" href="#KENO"><b></b>KENO</a>
                    <ul class="layer2" style="display:none">
                        <li >
                            <a href="/pt/mem/order/BJKN">北京快乐8</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <nav id="NORMAL">
                <a data-gtype="LT_Content" href="/member/lt/">1六合彩</a>
                <a data-gtype="D3_Content" href="/member/b3/b3.php?gtype=D3&amp;rtype=W1">3D彩</a>
                <a class="last" data-gtype="P3_Content" href="/member/b3/b3.php?gtype=P3&amp;rtype=W1">排列三</a>
            </nav>
            <nav id="TT">
                <a data-gtype="BT_Content" href="/member/b3/b3.php?gtype=BT&amp;rtype=W1">BB3D</a>
                <a data-gtype="T3_Content" href="/member/b3/b3.php?gtype=T3&amp;rtype=W1">上海时时乐</a>
                <a data-gtype="CQ_Content" href="/member/b5/b5.php?gtype=CQ&amp;rtype=605">重庆时时彩</a>
                <a data-gtype="TJ_Content" href="/member/b5/b5.php?gtype=TJ&amp;rtype=605">天津时时彩</a>
                <a class="last" data-gtype="JX_Content" href="/member/b5/b5.php?gtype=JX&amp;rtype=605">江西时时彩</a>
            </nav>
            <nav id="SF">
                <a href="/pt/mem/order/GXSF">广西十分彩</a>
            </nav>
            <nav id="KN">
                <a href="/pt/mem/order/BJKN">北京快乐8</a>
                <a href="/pt/mem/order/CAKN">加拿大卑斯</a>
                <a href="/pt/mem/order/AUKN">澳洲首都商业区</a>
                <a href="/pt/mem/order/BBKN">BB快乐彩</a>
            </nav>
            <nav id="S5"></nav>
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
    </ul>      </div>
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
<h2><b></b>'.$lottery_name.'</h2>
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
            <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=522"  title="二字定位">二字定位</a>
            <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=532" title="三字定位" style="display:none">三字定位</a>
            <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=595" class="NowPlay" title="组选三">组选三</a>
            <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=598"  title="组选六">组选六</a>
            <a href="/member/b5/b5.php?gtype='.$gType.'&amp;rtype=589"  title="跨度">跨度</a>
        </div>
    </div>
    <div id="tickedBox"></div>
    <div id="tickedBoxBt"></div>
</div>
<!--游戏组别-->
<div class="InfoBar">
    <select name="gtype" style="display:none;">

    </select>
</div>
<!--rtype选择-->
<div id="arrowLeft"></div>

<div id="tab" >
    <ul>
        <li class="onTagClick"><span class="595"><b>前三</b></span></li>
        <li class="unTagClick"><span class="596"><b>中三</b></span></li>
        <li class="unTagClick"><span class="597"><b>后三</b></span></li>
        <li id="space"></li>
    </ul>
</div>
<div id="arrowRight"></div>
<div id="GrpBtnB5" style="display:none">
    <div id="B5W3quick" class="InfoBar">
        <p>
            <a class="quickH first">0</a>
            <a class="quickH">1</a>
            <a class="quickH">2</a>
            <a class="quickH">3</a>
            <a class="quickH">4</a>
            <a class="quickH">5</a>
            <a class="quickH">6</a>
            <a class="quickH">7</a>
            <a class="quickH">8</a>
            <a class="quickH last">9</a>
        </p>
        <p class="cc">
            <input type="button" name="Cancel" value="取消" class="cancel_cen" />&nbsp;&nbsp;
            <input type="button" name="order" value="确定" class="order" />
        </p>
    </div>
    <div id="B5D3quick" class="InfoBar">
        <p class="grp-title"><i></i>快选<span>▼</span></p>
        <p>
            <b>头</b>
            <b><input type="text" name="sHead" id="sHead" /></b>
            <b><input type="radio" name="Rio_H[]" value="0" />单</b>
            <b><input type="radio" name="Rio_H[]" value="1" />双</b>
            <b><input type="radio" name="Rio_H[]" value="2" />大</b>
            <b class="last"><input type="radio" name="Rio_H[]" value="3" />小</b>
        </p>
        <p>
            <b>中</b>
            <b><input type="text" name="sMid" id="sMid" /></b>
            <b><input type="radio" name="Rio_M[]" value="0" />单</b>
            <b><input type="radio" name="Rio_M[]" value="1" />双</b>
            <b><input type="radio" name="Rio_M[]" value="2" />大</b>
            <b class="last"><input type="radio" name="Rio_M[]" value="3" />小</b>
        </p>
        <p>
            <b>尾</b>
            <b><input type="text" name="sEnd" id="sEnd" value="" /></b>
            <b><input type="radio" name="Rio_E[]" value="0" />单</b>
            <b><input type="radio" name="Rio_E[]" value="1" />双</b>
            <b><input type="radio" name="Rio_E[]" value="2" />大</b>
            <b class="last"><input type="radio" name="Rio_E[]" value="3" />小</b>
        </p>
        <p>
            <b>和尾数</b>
            <b><input type="text" name="get_num1" id="get_num1" /></b>
            <b><input type="radio" name="Rio[]" value="0" />单</b>
            <b><input type="radio" name="Rio[]" value="1" />双</b>
            <b><input type="radio" name="Rio[]" value="2" />大</b>
            <b class="last"><input type="radio" name="Rio[]" value="3" />小</b>
        </p>
        <p>
            <b class="h">和数值 <input type="text" name="get_num2" id="get_num2" value="" />&nbsp;&nbsp;&nbsp;(0~27,以逗号作分隔,不能空格)</b>
            <b class="h last">胆 <input type="text" name="get_num3" id="get_num3" value="" /></b>
        </p>
        <p>
            <b>和单<input type="checkbox" name="sCondition[]" value="0" /></b>
            <b>和双<input type="checkbox" name="sCondition[]" value="1" /></b>
            <b>和值大<input type="checkbox" name="sCondition[]" value="16" /></b>
            <b>和值小<input type="checkbox" name="sCondition[]" value="17" /></b>
            <b>跳号<input type="checkbox" name="sCondition[]" value="14" /></b>
            <b>豹子<input type="checkbox" name="sCondition[]" value="15" /></b>
            <b>组三<input type="checkbox" name="sCondition[]" value="12" /></b>
            <b class="last">组六<input type="checkbox" name="sCondition[]" value="13" /></b>
        </p>
        <p>
            <b>全单<input type="checkbox" name="sCondition[]" value="4" /></b>
            <b>全双<input type="checkbox" name="sCondition[]" value="5" /></b>
            <b>2单1双<input type="checkbox" name="sCondition[]" value="20" /></b>
            <b>2双1单<input type="checkbox" name="sCondition[]" value="21" /></b>
            <b>全大<input type="checkbox" name="sCondition[]" value="6" /></b>
            <b>全小<input type="checkbox" name="sCondition[]" value="7" /></b>
            <b>2大1小<input type="checkbox" name="sCondition[]" value="18" /></b>
            <b class="last">2小1大<input type="checkbox" name="sCondition[]" value="19" /></b>
        </p>
        <p>
            <b>含质数<input type="checkbox" name="sCondition[]" value="35" /></b>
            <b>不含质数<input type="checkbox" name="sCondition[]" value="36" /></b>
            <b>单点<input type="checkbox" name="sCondition[]" value="37" /></b>
            <b>双点<input type="checkbox" name="sCondition[]" value="38" /></b>
            <b>三连号<input type="checkbox" name="sCondition[]" value="8" /></b>
            <b>半连号<input type="checkbox" name="sCondition[]" value="9" /></b>
            <b>连号<input type="checkbox" name="sCondition[]" value="10" /></b>
            <b class="last">不连号<input type="checkbox" name="sCondition[]" value="11" /></b>
        </p>
        <p>
            <b>余数A<input type="checkbox" name="sCondition[]" value="22" /></b>
            <b>余数B<input type="checkbox" name="sCondition[]" value="23" /></b>
            <b class="last">余数C<input type="checkbox" name="sCondition[]" value="24" /></b>
        </p>
        <p>
            <b>二次和尾 :</b>
            <b><input type="checkbox" name="sCondition[]" value="25" />0</b>
            <b><input type="checkbox" name="sCondition[]" value="26" />2</b>
            <b><input type="checkbox" name="sCondition[]" value="27" />4</b>
            <b><input type="checkbox" name="sCondition[]" value="28" />6</b>
            <b class="last"><input type="checkbox" name="sCondition[]" value="29" />8</b>
        </p>
        <p>
            <b>二次差尾 :</b>
            <b><input type="checkbox" name="sCondition[]" value="30" />0</b>
            <b><input type="checkbox" name="sCondition[]" value="31" />2</b>
            <b><input type="checkbox" name="sCondition[]" value="32" />4</b>
            <b><input type="checkbox" name="sCondition[]" value="33" />6</b>
            <b class="last"><input type="checkbox" name="sCondition[]" value="34" />8</b>
        </p>
        <p class="cc">
            <input class="order" type="button" name="pickup" value="选取" />
            <input class="order" type="button" name="Clear" value="清除" />
            <input type="button" name="Cancel" value="取消" class="order" />
            <input type="button" name="order" value="确定" class="order" />
        </p>
    </div>
    <div id="B5D2quick" class="InfoBar">
        <p>
            <b class="first">头</b>
            <a class="quicka" >0</a>
            <a class="quicka" >1</a>
            <a class="quicka" >2</a>
            <a class="quicka" >3</a>
            <a class="quicka" >4</a>
            <a class="quicka" >5</a>
            <a class="quicka" >6</a>
            <a class="quicka" >7</a>
            <a class="quicka" >8</a>
            <a class="quicka last" >9</a>
        </p>
        <p>
            <b class="first">尾</b>
            <a class="quickb" >0</a>
            <a class="quickb" >1</a>
            <a class="quickb" >2</a>
            <a class="quickb" >3</a>
            <a class="quickb" >4</a>
            <a class="quickb" >5</a>
            <a class="quickb" >6</a>
            <a class="quickb" >7</a>
            <a class="quickb" >8</a>
            <a class="quickb last" >9</a>
        </p>
        <p class="cc">
            <input type="button" name="Cancel" value="取消" class="cancel_cen" />&nbsp;&nbsp;
            <input type="button" name="order" value="确定" class="order" />
        </p>
    </div>
    <div id="shownum" >
        <div id="shownum2">已勾选：0笔</div>
        <div id="shownumH"> </div>
        <div id="shownumC"> </div>
        <div id="shownumS"> </div>
    </div>
</div>          <div id="Game">

    <form id="formB5" name="CQ_022" action="../D3_order.php" method="post" target="_top" onsubmit="return false;">
        <input type="hidden" name="gid" value="345434" />
        <input type="hidden" name="MyRtype" value="595" />
        <input type="hidden" name="gtype" value="'.$gType.'" />
        <!--期数时间-->
        <div class="spaceH">

            <input class="order" type="button" name="GTSALL" value="全包" />
            组选三至少要选择5个号码!!
        </div>
        <div class="round-table">
            <table class="GameTable">
                <tr class="title_line">
                    <td>前三</td>
                    <td>勾选</td>
                    <td>前三</td>
                    <td>勾选</td>
                    <td>前三</td>
                    <td>勾选</td>
                    <td>前三</td>
                    <td>勾选</td>
                    <td>前三</td>
                    <td>勾选</td>
                </tr>
                <tr>
                    <td class="num">0</td>
                    <td class="odds">
                        <input type="checkbox" name="concede[]" value="0"/>
                    </td>
                    <td class="num">1</td>
                    <td class="odds">
                        <input type="checkbox" name="concede[]" value="1"/>
                    </td>
                    <td class="num">2</td>
                    <td class="odds">
                        <input type="checkbox" name="concede[]" value="2"/>
                    </td>
                    <td class="num">3</td>
                    <td class="odds">
                        <input type="checkbox" name="concede[]" value="3"/>
                    </td>
                    <td class="num">4</td>
                    <td class="odds">
                        <input type="checkbox" name="concede[]" value="4"/>
                    </td>
                </tr>
                <tr>
                    <td class="num">5</td>
                    <td class="odds">
                        <input type="checkbox" name="concede[]" value="5"/>
                    </td>
                    <td class="num">6</td>
                    <td class="odds">
                        <input type="checkbox" name="concede[]" value="6"/>
                    </td>
                    <td class="num">7</td>
                    <td class="odds">
                        <input type="checkbox" name="concede[]" value="7"/>
                    </td>
                    <td class="num">8</td>
                    <td class="odds">
                        <input type="checkbox" name="concede[]" value="8"/>
                    </td>
                    <td class="num">9</td>
                    <td class="odds">
                        <input type="checkbox" name="concede[]" value="9"/>
                    </td>
                </tr>
            </table>
        </div>
        <div id="SendB5">
            <input type="button" name="Cancel" value="取消" class="cancel_cen" />&nbsp;&nbsp;
            <input type="button" name="order" value="确定" class="order" disabled="disabled" />
            <input type="hidden" name="shownum_tmp" value="" id="shownum_tmp" />
        </div>
    </form>

</div>
<input type="hidden" id="sRtype" name="sRtype" value="595" />
<input type="hidden" id="sGtype" name="sGtype" value="'.$gType.'" />
<input type="hidden" name="iTime" id="iTime" value="1393816714" />
</div>
</div>
</div>
</div>
<div id="D3Result">
<fieldset>
<legend>前 5 期 开奖结果</legend>
<div id="tabMin" style="display:none">
    <ul style="margin-left:0;">
        <li class="onTagClick"><span class="1">一字</span></li>
        <li class="unTagClick"><span class="2">和数</span></li>
    </ul>
</div>
<div id="Result1" >
    <table>
        <thead>
        <tr>
            <td>期数</td>
            <td>佰</td>
            <td>拾</td>
            <td>个</td>
        </tr>
        </thead>
        <tbody>
        <!-- 0 -->
        <tr row="1" class="row_of_cancel" style="display:none;">
            <td class="num_col" rowspan="4">021</td>
            <td rowspan="4" colspan="3" class="game_is_cancel">本期取消</td>
        </tr>
        <tr row="1" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="1" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="1" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>

        <tr row="1" class="row_of_result" style="display:;">
            <td rowspan="4">021</td>
            <td>8</td>
            <td>7</td>
            <td>5</td>
        </tr>
        <tr row="1" class="row_of_result" style="display:;">
            <td>双</td>
            <td>单</td>
            <td>单</td>
        </tr>
        <tr row="1" class="row_of_result" style="display:;">
            <td>大</td>
            <td>大</td>
            <td>大</td>
        </tr>
        <tr row="1" class="row_of_result" style="display:;">
            <td>合</td>
            <td>质</td>
            <td>质</td>
        </tr>
        <!-- 1 -->
        <tr row="2" class="row_of_cancel" style="display:none;">
            <td class="num_col" rowspan="4">020</td>
            <td rowspan="4" colspan="3" class="game_is_cancel">本期取消</td>
        </tr>
        <tr row="2" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="2" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="2" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>

        <tr row="2" class="row_of_result" style="display:;">
            <td rowspan="4">020</td>
            <td>0</td>
            <td>8</td>
            <td>7</td>
        </tr>
        <tr row="2" class="row_of_result" style="display:;">
            <td>双</td>
            <td>双</td>
            <td>单</td>
        </tr>
        <tr row="2" class="row_of_result" style="display:;">
            <td>小</td>
            <td>大</td>
            <td>大</td>
        </tr>
        <tr row="2" class="row_of_result" style="display:;">
            <td>合</td>
            <td>合</td>
            <td>质</td>
        </tr>
        <!-- 2 -->
        <tr row="3" class="row_of_cancel" style="display:none;">
            <td class="num_col" rowspan="4">019</td>
            <td rowspan="4" colspan="3" class="game_is_cancel">本期取消</td>
        </tr>
        <tr row="3" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="3" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="3" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>

        <tr row="3" class="row_of_result" style="display:;">
            <td rowspan="4">019</td>
            <td>6</td>
            <td>1</td>
            <td>0</td>
        </tr>
        <tr row="3" class="row_of_result" style="display:;">
            <td>双</td>
            <td>单</td>
            <td>双</td>
        </tr>
        <tr row="3" class="row_of_result" style="display:;">
            <td>大</td>
            <td>小</td>
            <td>小</td>
        </tr>
        <tr row="3" class="row_of_result" style="display:;">
            <td>合</td>
            <td>质</td>
            <td>合</td>
        </tr>
        <!-- 3 -->
        <tr row="4" class="row_of_cancel" style="display:none;">
            <td class="num_col" rowspan="4">018</td>
            <td rowspan="4" colspan="3" class="game_is_cancel">本期取消</td>
        </tr>
        <tr row="4" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="4" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="4" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>

        <tr row="4" class="row_of_result" style="display:;">
            <td rowspan="4">018</td>
            <td>4</td>
            <td>7</td>
            <td>4</td>
        </tr>
        <tr row="4" class="row_of_result" style="display:;">
            <td>双</td>
            <td>单</td>
            <td>双</td>
        </tr>
        <tr row="4" class="row_of_result" style="display:;">
            <td>小</td>
            <td>大</td>
            <td>小</td>
        </tr>
        <tr row="4" class="row_of_result" style="display:;">
            <td>合</td>
            <td>质</td>
            <td>合</td>
        </tr>
        <!-- 4 -->
        <tr row="5" class="row_of_cancel" style="display:none;">
            <td class="num_col" rowspan="4">017</td>
            <td rowspan="4" colspan="3" class="game_is_cancel">本期取消</td>
        </tr>
        <tr row="5" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="5" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="5" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>

        <tr row="5" class="row_of_result" style="display:;">
            <td rowspan="4">017</td>
            <td>0</td>
            <td>5</td>
            <td>7</td>
        </tr>
        <tr row="5" class="row_of_result" style="display:;">
            <td>双</td>
            <td>单</td>
            <td>单</td>
        </tr>
        <tr row="5" class="row_of_result" style="display:;">
            <td>小</td>
            <td>大</td>
            <td>大</td>
        </tr>
        <tr row="5" class="row_of_result" style="display:;">
            <td>合</td>
            <td>质</td>
            <td>质</td>
        </tr>
        </tbody>
    </table>
</div>
<div id="Result2" style="display:none">
    <table>
        <thead>
        <tr>
            <td>期数</td>
            <td>佰拾</td>
            <td>佰个</td>
            <td>拾个</td>
            <td>和数</td>
        </tr>
        </thead>
        <tbody>
        <!-- 0 -->
        <tr row="1" class="row_of_cancel" style="display:none;">
            <td class="num_col" rowspan="4">021</td>
            <td rowspan="4" colspan="4" class="game_is_cancel">本期取消</td>
        </tr>
        <tr row="1" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="1" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="1" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="1" class="row_of_result" style="display:;">
            <td  rowspan="4">021</td>
            <td>15</td>
            <td>13</td>
            <td>12</td>
            <td>20</td>
        </tr>
        <tr row="1" class="row_of_result" style="display:;">
            <td>单</td>
            <td>单</td>
            <td>双</td>
            <td>双</td>
        </tr>
        <tr row="1" class="row_of_result" style="display:;">
            <td>大</td>
            <td>小</td>
            <td>小</td>
            <td>大</td>
        </tr>
        <tr row="1" class="row_of_result" style="display:;">
            <td>质</td>
            <td>质</td>
            <td>质</td>
            <td>合</td>
        </tr>
        <!-- 1 -->
        <tr row="2" class="row_of_cancel" style="display:none;">
            <td class="num_col" rowspan="4">020</td>
            <td rowspan="4" colspan="4" class="game_is_cancel">本期取消</td>
        </tr>
        <tr row="2" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="2" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="2" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="2" class="row_of_result" style="display:;">
            <td  rowspan="4">020</td>
            <td>8</td>
            <td>7</td>
            <td>15</td>
            <td>15</td>
        </tr>
        <tr row="2" class="row_of_result" style="display:;">
            <td>双</td>
            <td>单</td>
            <td>单</td>
            <td>单</td>
        </tr>
        <tr row="2" class="row_of_result" style="display:;">
            <td>大</td>
            <td>大</td>
            <td>大</td>
            <td>大</td>
        </tr>
        <tr row="2" class="row_of_result" style="display:;">
            <td>合</td>
            <td>质</td>
            <td>质</td>
            <td>质</td>
        </tr>
        <!-- 2 -->
        <tr row="3" class="row_of_cancel" style="display:none;">
            <td class="num_col" rowspan="4">019</td>
            <td rowspan="4" colspan="4" class="game_is_cancel">本期取消</td>
        </tr>
        <tr row="3" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="3" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="3" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="3" class="row_of_result" style="display:;">
            <td  rowspan="4">019</td>
            <td>7</td>
            <td>6</td>
            <td>1</td>
            <td>7</td>
        </tr>
        <tr row="3" class="row_of_result" style="display:;">
            <td>单</td>
            <td>双</td>
            <td>单</td>
            <td>单</td>
        </tr>
        <tr row="3" class="row_of_result" style="display:;">
            <td>大</td>
            <td>大</td>
            <td>小</td>
            <td>小</td>
        </tr>
        <tr row="3" class="row_of_result" style="display:;">
            <td>质</td>
            <td>合</td>
            <td>质</td>
            <td>质</td>
        </tr>
        <!-- 3 -->
        <tr row="4" class="row_of_cancel" style="display:none;">
            <td class="num_col" rowspan="4">018</td>
            <td rowspan="4" colspan="4" class="game_is_cancel">本期取消</td>
        </tr>
        <tr row="4" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="4" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="4" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="4" class="row_of_result" style="display:;">
            <td  rowspan="4">018</td>
            <td>11</td>
            <td>8</td>
            <td>11</td>
            <td>15</td>
        </tr>
        <tr row="4" class="row_of_result" style="display:;">
            <td>单</td>
            <td>双</td>
            <td>单</td>
            <td>单</td>
        </tr>
        <tr row="4" class="row_of_result" style="display:;">
            <td>小</td>
            <td>大</td>
            <td>小</td>
            <td>大</td>
        </tr>
        <tr row="4" class="row_of_result" style="display:;">
            <td>质</td>
            <td>合</td>
            <td>质</td>
            <td>质</td>
        </tr>
        <!-- 4 -->
        <tr row="5" class="row_of_cancel" style="display:none;">
            <td class="num_col" rowspan="4">017</td>
            <td rowspan="4" colspan="4" class="game_is_cancel">本期取消</td>
        </tr>
        <tr row="5" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="5" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="5" class="row_of_cancel row_of_cancelX" style="display:none;"></tr>
        <tr row="5" class="row_of_result" style="display:;">
            <td  rowspan="4">017</td>
            <td>5</td>
            <td>7</td>
            <td>12</td>
            <td>12</td>
        </tr>
        <tr row="5" class="row_of_result" style="display:;">
            <td>单</td>
            <td>单</td>
            <td>双</td>
            <td>双</td>
        </tr>
        <tr row="5" class="row_of_result" style="display:;">
            <td>大</td>
            <td>大</td>
            <td>小</td>
            <td>小</td>
        </tr>
        <tr row="5" class="row_of_result" style="display:;">
            <td>质</td>
            <td>质</td>
            <td>质</td>
            <td>质</td>
        </tr>
        </tbody>
    </table>
</div>
</fieldset>
</div>  <div id="ShowRule2" style="display:none;width:30px;">
    <div id="RuleText2" style="display: none;">
        <ol>
            <li><b>对碰:</b>依照二全中·二中特·特串 此3种玩法规则,依任两组`生肖`或`尾数`来组合下注的号码</li>
            <li><b>肖串尾数:</b>选择一主肖，可拖0~9尾的球，以三全中的肖串尾数为例：选择鼠(03,15,27,39)当主肖并拖9尾数，因尾数中39已在主肖内将不列入组合，因此共可组出24组(一个主肖+二个尾数)。</li>
            <li><b>交叉碰:</b><br />二星玩法：可选2柱~49柱，每柱1~48号码，使每柱串连，已选择号码不能重覆<br />三星玩法：可选3柱~48柱，每柱1~47号码，使每柱串连，已选择号码不能重覆<br />四星玩法：可选4柱~49柱，每柱1~46号码，使每柱串连，已选择号码不能重覆</li>
            <li><b>胆拖:</b>(N胆M拖)<br />选N个号码为胆，M个号码为拖。则有N*M个组合数。<br />(二星) 最多选3胆码，可拖49-(所选的胆码)个号码<br />(三星) 最多选2胆码，可拖49--(所选的胆码)个号码<br />(四星) 最多选3胆码，可拖49--(所选的胆码)个号码</li>
            <li><b>胆拖色波:</b>(N胆拖色波)<br />选N个号码为胆，可选红蓝绿波的球号为拖。则有N*色波球号个组合数。<br />(二星) 最多选3胆码，可拖(所选色波号码-所选胆码)个号码<br />(三星) 最多选2胆码，可拖(所选色波号码-所选胆码)个号码<br />(四星) 最多选3胆码，可拖(所选色波号码-所选胆码)个号码</li>
            <li><b>胆拖生肖:</b>(N胆拖生肖)<br />选N个号码为胆，可选生肖的球号为拖。则有N*生肖球号个组合数。<br />(二星) 最多选3胆码，可拖(所选生肖号码-所选胆码)个号码<br />(三星) 最多选2胆码，可拖(所选生肖号码-所选胆码)个号码<br />(四星) 最多选3胆码，可拖(所选生肖号码-所选胆码)个号码</li>
        </ol>
    </div>
    <div id="RightBar2">
        <div class="aa">+</div>
        <div class="bb">操作方法</div>
    </div>
</div>
<div id="ShowRule">
    <div id="RuleText" style="display: none;">
    </div>
    <div id="RightBar">
        <div class="aa">+</div>
        <div class="bb"></div>
    </div>
</div>  <div id="Tips" style="display:none;"><b class="before"></b>当用鼠标压住要下注的球号时，版面右方会出现下注的金额区块，可直接将要下注的号码拉到下注的金额上面下注<b class="after"></b></div>
<div id="Tips2" style="display:none;"><b class="before"></b>当用鼠标压住要下注的球号赔率时，版面右方会出现下注的金额区块，可直接将要下注的号码拉到下注的金额上面下注<b class="after"></b></div>
<div id="ding"></div>
<form action="/member/orderB3_act.php" method="post" name="BetForm"><input type="hidden" name="MyRtype" /><input type="hidden" name="aConcede[]" /><input type="hidden" name="aOdds[]" /><input type="hidden" name="gid" /> <input type="hidden" name="gold[]" /><input type="hidden" name="gtype" value="'.$gType.'" /></form>
<div id="BlackBG"></div>
</body>
</html>
';