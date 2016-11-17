<?php

echo '
<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta content="telephone=no" name="format-detection" />
  <title>sk</title>
  <link rel="stylesheet" href="/style/member/pitaya.css?66341e7" />
  <link rel="stylesheet" href="/style/AlertBox.css?66341e7" />
  <link rel="stylesheet" href="/style/ConfirmBox.css?66341e7" />
  <link href="/TPL/C_TYPE_IPL/style/contextmenu.css?66341e7" rel="stylesheet" />
  <link href="/TPL/C_TYPE_IPL/style/View.css?66341e7" rel="stylesheet" />
  <link href="/TPL/C_TYPE_IPL/style/jquery.GoldUI.css?66341e7" rel="stylesheet" />
  <link href="/TPL/C_TYPE_IPL/style/tpl.css?66341e7" rel="stylesheet" />
  <link href="/TPL/C_TYPE_IPL/style/zindex.css?66341e2" rel="stylesheet" />
  <!--[if lte IE 6]>
  <link href="/style/member/ie6.css?66341e7" rel="stylesheet" />
  <![endif]-->
  <!--[if IE 7]>
  <link href="/style/member/ie7.css?66341e7" rel="stylesheet" />
  <![endif]-->
  <!--[if IE 8]>
  <link href="/style/member/ie8.css?66341e7" rel="stylesheet" />
  <script src="/js/ie8.js?66341e7"></script>
  <![endif]-->
  <!--[if IE 9]>
  <link href="/style/member/ie9.css?66341e7" rel="stylesheet" />
  <![endif]-->
  <script src="/js/marquee.js?66341e7"></script>
  <script src="/js/jquery-1.7.1.js?66341e7"></script>
  <script src="/js/jquery.contextmenu.js?66341e7"></script>
  <script src="/js/View.js?66341e7"></script>
  <script src="/js/mobileStyle.js?66341e7"></script>
  <script src="/js/C2R.js?66341e7"></script>
  <script src="/js/PC/ltOrder.js?66341e7"></script>
  <script src="/js/PC/lt_show.js?16341e8"></script>
  <!--正碼過關-->
  <script src="/js/PC/lt_nap_show.js?66341e7"></script>
  <!--連碼-->
  <script src="/js/PC/lt_ch_show.js?66341e8"></script>
  <!--合肖-->
  <script src="/js/PC/lt_nx_show.js?66341e7"></script>
  <!--連肖連尾-->
  <script src="/js/PC/lt_lx_show.js?66341e7"></script>
  <!--自選不中-->
  <script src="/js/PC/lt_ni_show.js?66341e7"></script>
  <!--alertBox-->
  <script src="/inte/js/AlertBox.js?66341e7"></script>
  <script src="/inte/js/ConfirmBox.js?66341e7"></script>
  <script src="/inte/js/overMenu.js?66341e7"></script>
  <script src="/inte/js/superfish.js?66341e7"></script>
  <script src="/inte/js/group_menu.js?66341e7"></script>
  <script src="/inte/js/jquery.GoldUI.js?66341e7"></script>
  <script src="/inte/js/timeclock.js?66341e7"></script>
  <script src="/inte/js/Lang.js?key=charset&amp;66341e7"></script>
  <script src="/inte/js/Lang/package.js?66341e7"></script>
  <script src="/inte/js/Lunar.js?66341e7"></script>
  <script src="/inte/js/memberCenter.js?66341e7"></script>
  <script src="/inte/js/zindexSort.js?66341e7"></script>
  <script src="/pt/assets/js/lib/sound.js?2cab845"></script>
  <!--[if lte IE 8]>
  <script src="/js/html5.js?66341e7"></script>
  <script src="/inte/js/respond.src.js?66341e7"></script>
  <![endif]-->
  <!--[if IE 6]>
  <script src="/js/TouchView.js?66341e7"></script>
  <![endif]-->
    <script>
  <!--
window.onload = function(){
    //self.zindexSort.test();
    ccMarquee("marquee");
    self.zindexSort.setup();
    $("#ui-btn-games > ul").superfish();
    $("#ui-btn-games > ul > li > a:not(.sf-no-ul)").bind("click", function () {return false;});
    //self.group_menu.install($("#wager_groups"));
    var _overMenu = new pitayaMenu();
    _overMenu.init([$("#wager_groups > a"),$("#wager_groups > nav, #wager_groups > dl"),null]);
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
    var nx_array = {};
                  var ary = {"LX2_1":'.$odds_LX2["h1"].',"LX2_2":'.$odds_LX2["h2"].',"LX2_3":'.$odds_LX2["h3"].',"LX2_4":'.$odds_LX2["h4"].',"LX2_5":'.$odds_LX2["h5"].',"LX2_6":'.$odds_LX2["h6"].',"LX2_7":'.$odds_LX2["h7"].',"LX2_8":'.$odds_LX2["h8"].',"LX2_9":'.$odds_LX2["h9"].',"LX2_A":'.$odds_LX2["h10"].',"LX2_B":'.$odds_LX2["h11"].',"LX2_C":'.$odds_LX2["h12"].',
                    "LF20":'.$odds_LF2["h1"].',"LF21":'.$odds_LF2["h2"].',"LF22":'.$odds_LF2["h3"].',"LF23":'.$odds_LF2["h4"].',"LF24":'.$odds_LF2["h5"].',"LF25":'.$odds_LF2["h6"].',"LF26":'.$odds_LF2["h7"].',"LF27":'.$odds_LF2["h8"].',"LF28":'.$odds_LF2["h9"].',"LF29":'.$odds_LF2["h10"].',
                    "LX3_1":'.$odds_LX3["h1"].',"LX3_2":'.$odds_LX3["h2"].',"LX3_3":'.$odds_LX3["h3"].',"LX3_4":'.$odds_LX3["h4"].',"LX3_5":'.$odds_LX3["h5"].',"LX3_6":'.$odds_LX3["h6"].',"LX3_7":'.$odds_LX3["h7"].',"LX3_8":'.$odds_LX3["h8"].',"LX3_9":'.$odds_LX3["h9"].',"LX3_A":'.$odds_LX3["h10"].',"LX3_B":'.$odds_LX3["h11"].',"LX3_C":'.$odds_LX3["h12"].',
                    "LF30":'.$odds_LF3["h1"].',"LF31":'.$odds_LF3["h2"].',"LF32":'.$odds_LF3["h3"].',"LF33":'.$odds_LF3["h4"].',"LF34":'.$odds_LF3["h5"].',"LF35":'.$odds_LF3["h6"].',"LF36":'.$odds_LF3["h7"].',"LF37":'.$odds_LF3["h8"].',"LF38":'.$odds_LF3["h9"].',"LF39":'.$odds_LF3["h10"].',
                    "LX4_1":'.$odds_LX4["h1"].',"LX4_2":'.$odds_LX4["h2"].',"LX4_3":'.$odds_LX4["h3"].',"LX4_4":'.$odds_LX4["h4"].',"LX4_5":'.$odds_LX4["h5"].',"LX4_6":'.$odds_LX4["h6"].',"LX4_7":'.$odds_LX4["h7"].',"LX4_8":'.$odds_LX4["h8"].',"LX4_9":'.$odds_LX4["h9"].',"LX4_A":'.$odds_LX4["h10"].',"LX4_B":'.$odds_LX4["h11"].',"LX4_C":'.$odds_LX4["h12"].',
                    "LF40":'.$odds_LF4["h1"].',"LF41":'.$odds_LF4["h2"].',"LF42":'.$odds_LF4["h3"].',"LF43":'.$odds_LF4["h4"].',"LF44":'.$odds_LF4["h5"].',"LF45":'.$odds_LF4["h6"].',"LF46":'.$odds_LF4["h7"].',"LF47":'.$odds_LF4["h8"].',"LF48":'.$odds_LF4["h9"].',"LF49":'.$odds_LF4["h10"].',
                    "LX5_1":'.$odds_LX5["h1"].',"LX5_2":'.$odds_LX5["h2"].',"LX5_3":'.$odds_LX5["h3"].',"LX5_4":'.$odds_LX5["h4"].',"LX5_5":'.$odds_LX5["h5"].',"LX5_6":'.$odds_LX5["h6"].',"LX5_7":'.$odds_LX5["h7"].',"LX5_8":'.$odds_LX5["h8"].',"LX5_9":'.$odds_LX5["h9"].',"LX5_A":'.$odds_LX5["h10"].',"LX5_B":'.$odds_LX5["h11"].',"LX5_C":'.$odds_LX5["h12"].',
                    "LF50":'.$odds_LF5["h1"].',"LF51":'.$odds_LF5["h2"].',"LF52":'.$odds_LF5["h3"].',"LF53":'.$odds_LF5["h4"].',"LF54":'.$odds_LF5["h5"].',"LF55":'.$odds_LF5["h6"].',"LF56":'.$odds_LF5["h7"].',"LF57":'.$odds_LF5["h8"].',"LF58":'.$odds_LF5["h9"].',"LF59":'.$odds_LF5["h10"].'}
            var _menu = $("#wager_groups a,.second-nav  a"), _inner = document.getElementById("content_inner"), _title = $("#c_rtype"), _ad = $("#AD"), _ball = $("#Ball"), _grp = $("#GrpBtn"), _rule = $("#ShowRule2");
      //var _menu = null, _inner = document.getElementById("content_inner"), _title = $("#c_rtype"), _ad = $("#AD"), _ball = $("#Ball"), _grp = $("#GrpBtn"), _rule = $("#ShowRule2");
      var _type = "text";
      var json = {
        hall:0,
          menu:_menu,
          inner:_inner,
          title:_title,
          ad:_ad,
          ball:_ball,
          grp:_grp,
          rule:_rule ,
          tips : document.getElementById("Tips").style,
          '.$zodiac.'
          _number : _type
      };
      var _lt = self.ShowTable.instance(json);
      _lt.init("LX","0");
      _lt.bindDisplay_closeTime(document.getElementById("FCDH"));//綁定顯示關盤倒數欄位
            _lt.setBetMode(1);
            _lt.run();
                                    _lt.displayLFX(ary);
            var _rightBar = $("#RightBar2"), _ruleText = $("#RuleText2");
      _rightBar.bind("click", function () {
          if (this.parentNode.x != 1) {
              _ruleText.show();
              this.parentNode.style.width = "";
              this.parentNode.x = 1;
          } else {
              _ruleText.hide();
              this.parentNode.style.width = "30px";
              this.parentNode.x = 0;
          }
      });
      self.GoldUI.installDrag("betMove", self.betSpace.bet.onDragBet);
      self.timeclock.install(document.getElementById("HKTime"), document.getElementById("iTime"));
      $.ajax({
          url : "/member/select_lt.php",
          type : "GET",
          dataType : "script"
      });
  }
  //-->
  </script>
  <style>
	tr{ height:50px!important;}
	td{font-size:1.5em!important;}
  </style>
</head>
<body style="background:none">
  <div id="ui-marquee">
    <div class="marquee"><span id="Msg">~欢迎光临~ </span></div>
  </div>
  <div id="box_body" class="bg2yellow">
    <div id="box_range" style="background:none">
      
      <div id="main" style="background:none">
        
        <div id="content" style="  width: 100%">
          <h2>
            <b></b>
            <span>六合彩</span>
                    </h2>
          <div id="content_inner">
            <div style="display: none;" id="c_rtype"></div>
            <div>
              
              
              <div id="randomball" class="round-table" style="display:none">
               <table>
  <tr class="title_tr">
    <td>正码一</td>
    <td>正码二</td>
    <td>正码三</td>
    <td>正码四</td>
    <td>正码五</td>
    <td>正码六</td>
    <td>特别号</td>
  </tr>
  <tr class="BallTr">
    <td id="bal0"></td>
    <td id="bal1"></td>
    <td id="bal2"></td>
    <td id="bal3"></td>
    <td id="bal4"></td>
    <td id="bal5"></td>
    <td id="bal6"></td>
  </tr>
  <tr class="BallTr">
    <td id="bal0a"></td>
    <td id="bal1a"></td>
    <td id="bal2a"></td>
    <td id="bal3a"></td>
    <td id="bal4a"></td>
    <td id="bal5a"></td>
    <td id="bal6a"></td>
  </tr>
</table>              </div>
                                          <div id="GrpBtn" style="display:none">
  <input type="hidden" name="NowBet" id="NowBet" value="LX" />
  <div id="QuickMenu">
    <p class="grp-title"><i></i>群组选项<b>▼</b></p>
    <div>
下注金额 :
      <input type="text" min="0" id="BetGold" name="BetGold" class="GoldQQ" />
      <label><input type="checkbox" name="replaceGold" id="replaceGold" />取代金額</label>
    </div>
    <fieldset class="ball49">
      <legend>彩球号码</legend>
      <p>
        <a class="b01">01</a> <a class="b02">02</a> <a class="b03">03</a> <a class="b04">04</a> <a class="b05">05</a>
        <a class="b06">06</a> <a class="b07">07</a> <a class="b08">08</a> <a class="b09">09</a> <a class="b10">10</a>
        <a class="b11">11</a> <a class="b12">12</a> <a class="b13">13</a> <a class="b14">14</a> <a class="b15">15</a> 
        <a class="b16">16</a> <a class="b17">17</a> <a class="b18">18</a> <a class="b19">19</a> <a class="b20">20</a>
      </p>
      <p>
        <a class="b21">21</a> <a class="b22">22</a> <a class="b23">23</a> <a class="b24">24</a> <a class="b25">25</a>
        <a class="b26">26</a> <a class="b27">27</a> <a class="b28">28</a> <a class="b29">29</a> <a class="b30">30</a>
        <a class="b31">31</a> <a class="b32">32</a> <a class="b33">33</a> <a class="b34">34</a> <a class="b35">35</a>
        <a class="b36">36</a> <a class="b37">37</a> <a class="b38">38</a> <a class="b39">39</a> <a class="b40">40</a>
      </p>
      <p>
        <a class="b41">41</a> <a class="b42">42</a> <a class="b43">43</a> <a class="b44">44</a> <a class="b45">45</a>
        <a class="b46">46</a> <a class="b47">47</a> <a class="b48">48</a> <a class="b49">49</a>
      </p>
    </fieldset>
    <fieldset>
      <legend>单双大小</legend>
      <p>
        <a>单</a>
        <a>双</a>
        <a>大</a>
        <a>小</a>
        <a>和单</a>
        <a>和双</a>
        <a>和大</a>
        <a>和小</a>
      </p>
    </fieldset>
    <fieldset>
      <legend>色波</legend>
      <p>
        <a class="RED">红波</a>
        <a class="BLUE">蓝波</a>
        <a class="GREEN">绿波</a>
      </p>
    </fieldset>
    <fieldset class="HB">
      <legend>半波</legend>
      <p>
        <a class="RED">红单</a>
        <a class="RED">红双</a>
        <a class="RED">红大</a>
        <a class="RED">红小</a>
        <a class="BLUE">蓝单</a>
        <a class="BLUE">蓝双</a>
        <a class="BLUE">蓝大</a>
        <a class="BLUE">蓝小</a>
        <a class="GREEN">绿单</a>
        <a class="GREEN">绿双</a>
        <a class="GREEN">绿大</a>
        <a class="GREEN">绿小</a>
      </p>
    </fieldset>
    <fieldset>
      <legend>头</legend>
      <p>
        <a>0</a>
        <a>1</a>
        <a>2</a>
        <a>3</a>
        <a>4</a>
      </p>
    </fieldset>
    <fieldset>
      <legend>尾</legend>
      <p>
        <a>0</a>
        <a>1</a>
        <a>2</a>
        <a>3</a>
        <a>4</a>
        <a>5</a>
        <a>6</a>
        <a>7</a>
        <a>8</a>
        <a>9</a>
      </p>
    </fieldset>
    <fieldset class="SPA">
      <legend>生肖</legend>
      <p>
        <a>鼠</a>
        <a>牛</a>
        <a>虎</a>
        <a>兔</a>
        <a>龙</a>
        <a>蛇</a>
        <a>马</a>
        <a>羊</a>
        <a>猴</a>
        <a>鸡</a>
        <a>狗</a>
        <a>猪</a>
      </p>
    </fieldset>
    <p style="clear:both">
      <input class="cancel" type="button" onclick="document.newForm.reset();" value="取消" />&nbsp;
      <input id="QuickSubmit" type="button" value="确定" />
    </p>
  </div>
</div>                            <!--游戏区块-->
              <div id="Game">
                            <form name="lt_form" method="post" action="/member/lt_lx/lt_lx_order.php?cl=wap" onsubmit="return false;" class="Aside" style="  width: 100%!important;">
<input type="hidden" name="gid" id="gid" value="372892" />
<div id="showTable">
<!--連肖类别-->
<div class="round-table">
<table id="table1" style="background-color:white" class="MobileTable">
  <tr class="title_tr">
    <td><label class="padding_label"><input name="rtype" type="radio" value="LX2" />二肖连</label></td>
    <td><label class="padding_label"><input name="rtype" type="radio" value="LX3" />三肖连</label></td>
    <td><label class="padding_label"><input name="rtype" type="radio" value="LX4" />四肖连</label></td>
    <td><label class="padding_label"><input name="rtype" type="radio" value="LX5" />五肖连</label></td>
  </tr>
  <tr class="title_tr">
    <td><label class="padding_label"><input name="rtype" type="radio" value="LF2" />二尾碰</label></td>
    <td><label class="padding_label"><input name="rtype" type="radio" value="LF3" />三尾碰</label></td>
    <td><label class="padding_label"><input name="rtype" type="radio" value="LF4" />四尾碰</label></td>
    <td><label class="padding_label"><input name="rtype" type="radio" value="LF5" />五尾碰</label></td>
  </tr>
</table>
</div>
<!--連肖table-->
<div class="round-table">
<table id="table2" style="text-align:center;background-color:white;">
  <tr class="title_tr">
    <td style="width:20%;">连肖</td>
    <td style="width:44%;">号码</td>
    <td colspan="2" style="width:36%;">勾选</td>
   
  </tr>
  <tr style="text-align:center;">
    <td class="title_td2">鼠</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[11].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A1" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;width:9%;" id="A1"></td>
</tr>
<tr style="text-align:center;">
    <td class="title_td2">牛</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[10].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A2" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;width:9%;" id="A2"></td>
  </tr>
  <tr>
    <td class="title_td2">虎</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[9].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A3" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="A3"></td>
	</tr>
<tr style="text-align:center;">
    <td class="title_td2">兔</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[8].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A4" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="A4"></td>
  </tr>
  <tr>
    <td class="title_td2">龙</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[7].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A5" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="A5"></td>
	</tr>
<tr style="text-align:center;">
    <td class="title_td2">蛇</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[6].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A6" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="A6"></td>
  </tr>
  <tr>
    <td class="title_td2">马</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[5].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A7" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="A7"></td>
	</tr>
<tr style="text-align:center;">
    <td class="title_td2">羊</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[4].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A8" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="A8"></td>
  </tr>
  <tr>
    <td class="title_td2">猴</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[3].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="A9" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="A9"></td>
	</tr>
<tr style="text-align:center;">
    <td class="title_td2">鸡</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[2].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="AA" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="AA"></td>
  </tr>
  <tr>
    <td class="title_td2">狗</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[1].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="AB" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="AB"></td>
	</tr>
<tr style="text-align:center;">
    <td class="title_td2">猪</td>
    <td style="background-color:#e5eaee;text-align:left">'.$zodiacArray[0].'</td>
    <td width="40px"><label class="padding_label"><input type="checkbox" name="lx[]" value="AC" /></label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="AC"></td>
  </tr>
</table>
</div>
<div class="round-table">
<table id="table3" style="text-align:center;background-color:white;">
  <tr class="title_tr">
    <td style="width:20%;">尾数</td>
    <td style="width:44%;">号码</td>
    <td nowrap="nowrap" colspan="2" style="width:36%;">勾选</td>
   
  </tr>
  <tr style="text-align:center;">
    <td class="title_td2">0</td>
    <td style="background-color:#e5eaee;text-align:left">10, 20 ,30 ,40</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="0" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;width:9%;" id="Fn0"></td>
	 </tr>
  <tr>
    <td class="title_td2">1</td>
    <td style="background-color:#e5eaee;text-align:left">01, 11, 21, 31, 41</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="1" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;width:9%;" id="Fn1"></td>
  </tr>
  <tr>
    <td class="title_td2">2</td>
    <td style="background-color:#e5eaee;text-align:left">02, 12, 22, 32, 42</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="2" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="Fn2"></td>
	 </tr>
  <tr>
    <td class="title_td2">3</td>
    <td style="background-color:#e5eaee;text-align:left">03, 13, 23, 33, 43</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="3" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="Fn3"></td>
  </tr>
  <tr>
    <td class="title_td2">4</td>
    <td style="background-color:#e5eaee;text-align:left">04, 14, 24, 34, 44</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="4" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="Fn4"></td>
	 </tr>
  <tr>
    <td class="title_td2">5</td>
    <td style="background-color:#e5eaee;text-align:left">05, 15, 25, 35, 45</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="5" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="Fn5"></td>
  </tr>
  <tr style="text-align:center;">
    <td class="title_td2">6</td>
    <td style="background-color:#e5eaee;text-align:left">06, 16, 26, 36, 46</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="6" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="Fn6"></td>
	 </tr>
  <tr>
    <td class="title_td2">7</td>
    <td style="background-color:#e5eaee;text-align:left">07, 17, 27, 37, 47</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="7" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="Fn7"></td>
  </tr>
  <tr style="text-align:center;">
    <td class="title_td2">8</td>
    <td style="background-color:#e5eaee;text-align:left">08, 18, 28, 38, 48</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="8" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="Fn8"></td>
	 </tr>
  <tr>
    <td class="title_td2">9</td>
    <td style="background-color:#e5eaee;text-align:left">09, 19, 29, 39, 49</td>
    <td><label class="padding_label">&nbsp;<input type="checkbox" name="lf[]" value="9" />&nbsp;</label></td>
    <td style="color:#cc0000;font-weight:bold;font-size:12px;" id="Fn9"></td>
  </tr>
</table>
</div>
<div class="round-table">
<table id="table4" style="text-align:center;">
  <tr>
    <td class="Send">
      <input class="no" name="btnReset" type="button" value="取消" />
      <input class="yes" name="btnSubmit" type="button" value="送出" />
	  
    </td>
  </tr>
</table>
</div>
</div>
</form>
                            </div>
              <div id="ding"></ding>
            </div>
          </div>
          <input type="hidden" name="iTime" id="iTime" value="" />
        </div>
      </div>
    </div>
  </div>
  <div id="ShowRule2" style="display:none;width:30px;">
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
    <div class="bb">规则说明</div>
  </div>
</div>  <div id="Tips" style="display:none;"><b class="before"></b>当用鼠标压住要下注的球号时，版面右方会出现下注的金额区块，可直接将要下注的号码拉到下注的金额上面下注<b class="after"></b></div>
  <form action="../lt_order_tmp.php" method="post" name="BetForm" ><input type="hidden" name="Line" /><input type="hidden" name="gold" /> <input type="hidden" name="gid" /> <input type="hidden" name="concede" /> <input type="hidden" name="ioradio" /> </form>
  <div id="AD" style="display:none" >
    <div id="ShowBall">
      <h2>組合窗口</h2>
      <div id="Ball">
        <p><span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></p>
      </div>
    </div>
  </div>

<span id="bet-credit" style="display:none;"></span>
  <div id="message_box" style="display:none; position:absolute; top:50%;left:20%; background-color:#EBEBEB;margin-top:-150px;width:60%;">
  </div>
<style>
#message_box{background-image:none!important;}
#message_box .inner{background-image:none!important;}
#message_box .footer{background-image:none!important;}
form[name="LAYOUTFORM"]{font-size:1.5em;}
form[name="LAYOUTFORM"] span{margin:1em;}
#box_range{min-width:100%!important;}
</style>

    </body>
</html>
';