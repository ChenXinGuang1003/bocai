<?php

$odds = odds_lottery_normal::getOdds($lottery_name,"一字");

echo '
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta content="telephone=no" name="format-detection"/>
    <title>'.$rTypeName.'</title>
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
    <script src="/js/PC/b3_odds_settings.js?31742ee"></script>
    <script src="/js/PC/b3Order.js?31742e5"></script>
    <script src="/js/D3.js?31742ee"></script>
    <script src="/inte/js/superfish.js?31742ee"></script>
    <script src="/inte/js/group_menu.js?31742ee"></script>

    <script src="../lottery/oddssetting/B3/saveOdds.js"></script>

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
            $("#wager_groups").css("display","");
            $("#tab").css("display","");
        })
        //-->
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
    <span style="color: white">'.$lottery_name.'-赔率设置'.'</span>
</h2>

<div id="content_inner">
    <div style="display: none;" id="c_rtype" class="GameName"></div>
    <div>
        <div id="wager_groups" style="display:none" class="'.$gType.'">

<a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=OEOU"   title="两面">两面</a>
<a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=SN"  title="和数">和数</a>
<a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=MCUF"  title="和尾数">和尾数</a>
<a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=W1" class="NowPlay" title="一字">一字</a>
<a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=W2"  title="二字">二字</a>
<a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=GST"  title="组选三">组选三</a>
<a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=GSS"  title="组选六">组选六</a>
<a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=WP"  title="一字过关">一字过关</a>
<a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=KD"  title="跨度">跨度</a>
<a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=LH"  title="总和龙虎和">总和龙虎和</a>
<a href="/member/b3/b3.php?gtype='.$gType.'&amp;rtype=LIAN"  title="3连">3连</a>
        </div>
    </div>
</div>
<!--rtype选择-->

        <div id="tab" style="display:none">
            <ul>
                <li class="onTagClick"><span class="W1"><b>组合</b></span></li>
                <li class="unTagClick"><span class="D1M"><b>口XX</b></span></li>
                <li class="unTagClick"><span class="D1C"><b>X口X</b></span></li>
                <li class="unTagClick"><span class="D1U"><b>XX口</b></span></li>
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
    <div id="qkGoldDivW1" class="quick_betnum_style" style="display:none">
        下注金额 :
        <input type="text" min="0" max="99999999" name="qkGoldW1" id="qkGoldW1" pattern="[0-9]*" placeholder="下注金额"/>
    </div>
    <div id="W1quick" class="quick_option_style" style="display:none">
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
    <div id="D2quick" class="InfoBar" style="display:none">
        <div id="qkGoldDiv" class="quick_betnum_style"  style="display:none">
            下注金额 :
            <input type="text" min="0" max="99999999" name="qkGold" id="qkGold" pattern="[0-9]*" placeholder="下注金额"/>
        </div>
        <p  style="display:none">
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

        <p id="jjomj"  style="display:none"></p>

        <p  style="display:none">
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

    <form id="formB3" name="D3_022" action="" method="post" onsubmit="return false">
    <input type="hidden" name="gid" value="345434" />
    <input type="hidden" name="MyRtype" value="W1" />
    <input type="hidden" name="gtype" value="'.$gType.'" />
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
                <label for="W10">
                    0
                </label>
            </td>
            <td class="odds" style="width:60px">
                <input name="aOdds[]" value="'.$odds["h0"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="W11">
                    1
                </label>
            </td>
            <td class="odds" style="width:60px">
                <input name="aOdds[]" value="'.$odds["h1"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="W12">
                    2
                </label>
            </td>
            <td class="odds" style="width:60px">
                <input name="aOdds[]" value="'.$odds["h2"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="W13">
                    3
                </label>
            </td>
            <td class="odds" style="width:60px">
                <input name="aOdds[]" value="'.$odds["h3"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="W14">
                    4
                </label>
            </td>
            <td class="odds" style="width:60px">
                <input name="aOdds[]" value="'.$odds["h4"].'"/>
            </td>

            </tr>
            <tr>
            <td class="num" style="width:30px">
                <label for="W15">
                    5
                </label>
            </td>
            <td class="odds" style="width:60px">
                <input name="aOdds[]" value="'.$odds["h5"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="W16">
                    6
                </label>
            </td>
            <td class="odds" style="width:60px">
                <input name="aOdds[]" value="'.$odds["h6"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="W17">
                    7
                </label>
            </td>
            <td class="odds" style="width:60px">
                <input name="aOdds[]" value="'.$odds["h7"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="W18">
                    8
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h8"].'"/>
            </td>

            <td class="num" style="width:30px">
                <label for="W19">
                    9
                </label>
            </td>
            <td class="odds">
                <input name="aOdds[]" value="'.$odds["h9"].'"/>
            </td>

    </tr>
    </table>
    </div>
        <div id="SendB3">
          <button id="btn-save-odds" onclick="saveB3Odds()" class="order">保存</button>
    </div>
  </form>
</div>
<input type="hidden" id="sRtype" name="sRtype" value="W1"/>
<input type="hidden" id="sGtype" name="sGtype" value="'.$gType.'"/>
<input type="hidden" name="iTime" id="iTime" value="1393473794"/>
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