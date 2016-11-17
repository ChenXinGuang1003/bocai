<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/utils/time_util.php");
include_once($C_Patch."/app/member/class/lottery_schedule.php");
include_once($C_Patch."/app/member/class/odds_lottery_normal.php");
include_once($C_Patch."/app/member/class/user_group.php");

include_once($C_Patch."/app/member/cache/ltConfig.php");

$uid = $_SESSION['userid'];
if($Lottery_set['gdsf']['close']==1)
{
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>广东十分暂停销售</title>
<link href="css/close.css" rel="stylesheet" type="text/css" />
<script src="/js/jquery-1.7.1.js"></script>
</head>
<body>
	<div class="xiuxi">
    	<div class="xx_time">
             <?=$Lottery_set['gdsf']['des']?>
       	</div>
    </div>
    <div class="button">
        	<ul>
            	<li class="kg"><a  href="/member/final/LT_result.php?gtype=GDSF" title="开奖结果" target="_blank" ></a></li>
                <li class="gz"><a  href="sm/klsf.php" title="游戏规则" target="_blank"></a></li>
            </ul>
    </div>
    <div style=" clear:both"></div>
</body>
<script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
</html>

<?
exit;
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script type="text/javascript" src="../../js/jquery-1.7.1.js"></script>
    <script type="text/javascript" src="../../js/jquery.ua.min.js"></script>
<script type="text/javascript" src="../../js/top.js"></script>
<script type="text/javascript" src="box/jquery.jBox-2.3.min.js"></script>
<script type="text/javascript" src="box/jquery.jBox-zh-CN.js"></script>
<script type="text/javascript" src="js/gdsf.js?v=1005"></script>
<link type="text/css" rel="stylesheet" href="css/jbox.css"/>
<link type="text/css" rel="stylesheet" href="css/sf.css"/>
<link type="text/css" rel="stylesheet" href="css/ssc_xg.css"/>
<style type="text/css">
	.drpbg{width:60px;position:absolute; background:#021e37;text-align:center;top:25px;left:674px; height:42px; border:1px solid white; border-top:none;}
	.drpbg ul{margin:0px; padding:0px; height:42px; width:60px;}
	.drpbg li{margin:0px;text-align:center;width:60px; height:21px; line-height:20px;}
	.drpbg .ca{font-size:12px; color:White;text-decoration:none;}
	.drpbg .ca:hover{color:#ccc;}
</style>
</head>
<script language="JavaScript">

if(self==top){
	top.location='/index.php';
}

function myfun()
{
    if(document.body.clientWidth>1000){
        var left_blank = (document.body.clientWidth-1000)/2;
        $("#new_left").css('margin-left', left_blank.toString()+'px');
    }else{
        $("#new_left").css('margin-left', '0px');
    }
    browserCompatible();
}
/*用window.onload调用myfun()*/
window.onload=myfun;//不要括号

jQuery(window).resize(myfun);

$(window.parent.document).find("#mainFrame").height(850);

function browserCompatible(){
    if($.ua().isIe7){
        $(".lottery_main").css('margin', '0px');
        $(".lottery_main").css('width', '800px');
    }
}
</script>
<body style="background-color:transparent margin-top: 0px;font-size: 12px;">

<!--内容开始-->
<div class="block" style="padding:0px 0px 10px 0px;">

<div class="bannerimg" style="margin: 0 auto;width:1000px">
    <img width="1000" height="100" border="0" src="/images/title_welcome.jpg">
</div>

<div id="new_left" style="display: block;">
 <div class="new_left_cn" style=" float: left; " id="Left_scroll">
        <div id="ds_01_bet">
            <div id="left_1"><img src="images/b002.jpg" width="180" height="40"  style="cursor:pointer"/></div>

            <!--Ŀ-->
            <div id="en0"><a href="Cqssc.php" target="mainFrame">重庆时时彩</a></div>
            <div id="en0"><a href="gxsf.php" target="mainFrame">广西十分彩</a></div>
            <div id="en0"><a href="cqsf.php" target="mainFrame">重庆快乐十分</a></div>
            <div id="en0"><a href="gdsf.php" target="mainFrame">广东快乐十分</a></div>
            <div id="en0"><a href="tjsf.php" target="mainFrame">天津快乐十分</a></div>
            <div id="en0"><a href="pk10.php" target="mainFrame">北京PK拾</a></div>
            <div id="en0"><a href="3d.php" target="mainFrame">福彩3D</a></div>
            <div id="en0"><a href="pl3.php" target="mainFrame">排列3</a></div>
            <div id="en0"><a href="shssl.php" target="mainFrame">上海时时乐</a></div>
            <div id="en0"><a href="kl8.php" target="mainFrame">北京快乐8</a></div>
            <div id="en0"><a href="tjssc.php" target="mainFrame">天津时时彩</a></div>
            <div id="en0"><a href="gd11.php" target="mainFrame">广东11选5</a></div>
        </div>
    </div>
</div>

<div class="lottery_main" style="width:1000px">
<div class="ssc_right">
  <div id="auto_list"></div>
</div>
<div class="ssc_left">
    <div class="flash" style="margin: 10px 0 0 10px;width: 785px;">
      <div class="f_left">
        <a href="rule/Rule_Gdsf.html" title="游戏规则" target="_blank" class="laba" style="color:#FC0;font-size: 14px;">游戏规则</a>
        <div class="time minute">
          <span><img src='images/Time/0.png'></span><span><img src='images/Time/0.png'></span>
        </div>
        <div class="colon">
          <img src='images/Time/10.png'>
        </div>
        <div class="time second">
          <span><img src='images/Time/0.png'></span><span><img src='images/Time/0.png'></span>
        </div>
        <div class="qh">第 <span id="open_qihao">00000000-000</span> 期 </div>
      </div>
      <div class="f_right">
          <div class="tops">广东快乐十分<span>第 <font id='numbers' class="red number">00000000-000</font> 期</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="/member/final/LT_result.php?gtype=GDSF" title="历史开奖" class="laba" style="color:#FC0" target="_blank">(历史开奖)</a></div>
          <div class="kick "><img src='images/open_1/x.png'></div>
          <div class="kick er"><img src='images/open_1/x.png'></div>
          <div class="kick san"><img src='images/open_1/x.png'></div>
          <div class="kick si"><img src='images/open_1/x.png'></div>
          <div class="kick wu"><img src='images/open_1/x.png'></div>
          <div class="kick liu"><img src='images/open_1/x.png'></div>
          <div class="kick qi"><img src='images/open_1/x.png'></div>
          <div class="kick ba"><img src='images/open_1/x.png'></div>
        <div class="fot" id="autoinfo">开奖数据获取中...</div>
      </div>
    </div>
    <div class="touzhu"  style="margin-left: 10px;">
<form name="orders" action="order/order_gdsf.php?1=1" method="post" target="OrderFrame">
<ul id="menu_hm">
    <li class="current" onclick="hm_odds(1)">第一球</li>
    <li class="current_n" onclick="hm_odds(2)">第二球</li>
    <li class="current_n" onclick="hm_odds(3)">第三球</li>
    <li class="current_n" onclick="hm_odds(4)">第四球</li>
    <li class="current_n" onclick="hm_odds(5)">第五球</li>
    <li class="current_n" onclick="hm_odds(6)">第六球</li>
    <li class="current_n" onclick="hm_odds(7)">第七球</li>
    <li class="current_n" onclick="hm_odds(8)">第八球</li>
</ul>
<table class="bian" border="0" cellpadding="0" cellspacing="1">
    <tr class="bian_tr_title">
        <td>号码</td>
        <td>赔率</td>
        <td width="70">金额</td>
        <td>号码</td>
        <td>赔率</td>
        <td width="70">金额</td>
        <td>号码</td>
        <td>赔率</td>
        <td width="70">金额</td>
        <td>号码</td>
        <td>赔率</td>
        <td width="70">金额</td>
        <td>号码</td>
        <td>赔率</td>
        <td width="70">金额</td>
    </tr>
    <tr class="bian_tr_txt">
        <td class="bian_td_qiu"><img src="images/ball_1/01.png" /></td>
        <td class="bian_td_odds" id="ball_1_h1" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t1"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/02.png" /></td>
        <td class="bian_td_odds" id="ball_1_h2" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t2"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/03.png" /></td>
        <td class="bian_td_odds" id="ball_1_h3" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t3"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/04.png" /></td>
        <td class="bian_td_odds" id="ball_1_h4" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t4"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/05.png" /></td>
        <td class="bian_td_odds" id="ball_1_h5" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t5"></td>
    </tr>
    <tr class="bian_tr_txt">
        <td class="bian_td_qiu"><img src="images/ball_1/06.png" /></td>
        <td class="bian_td_odds" id="ball_1_h6" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t6"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/07.png" /></td>
        <td class="bian_td_odds" id="ball_1_h7" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t7"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/08.png" /></td>
        <td class="bian_td_odds" id="ball_1_h8" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t8"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/09.png" /></td>
        <td class="bian_td_odds" id="ball_1_h9" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t9"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/10.png" /></td>
        <td class="bian_td_odds" id="ball_1_h10" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t10"></td>
    </tr>
    <tr class="bian_tr_txt">
        <td class="bian_td_qiu"><img src="images/ball_1/11.png" /></td>
        <td class="bian_td_odds" id="ball_1_h11"></td>
        <td class="bian_td_inp" id="ball_1_t11"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/12.png" /></td>
        <td class="bian_td_odds" id="ball_1_h12"></td>
        <td class="bian_td_inp" id="ball_1_t12"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/13.png" /></td>
        <td class="bian_td_odds" id="ball_1_h13"></td>
        <td class="bian_td_inp" id="ball_1_t13"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/14.png" /></td>
        <td class="bian_td_odds" id="ball_1_h14"></td>
        <td class="bian_td_inp" id="ball_1_t14"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/15.png" /></td>
        <td class="bian_td_odds" id="ball_1_h15">&nbsp;</td>
        <td class="bian_td_inp" id="ball_1_t15">&nbsp;</td>
    </tr>
    <tr class="bian_tr_txt">
        <td class="bian_td_qiu"><img src="images/ball_1/16.png" /></td>
        <td class="bian_td_odds" id="ball_1_h16"></td>
        <td class="bian_td_inp" id="ball_1_t16"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/17.png" /></td>
        <td class="bian_td_odds" id="ball_1_h17"></td>
        <td class="bian_td_inp" id="ball_1_t17"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/18.png" /></td>
        <td class="bian_td_odds" id="ball_1_h18"></td>
        <td class="bian_td_inp" id="ball_1_t18"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/19.png" /></td>
        <td class="bian_td_odds" id="ball_1_h19"></td>
        <td class="bian_td_inp" id="ball_1_t19"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/20.png" /></td>
        <td class="bian_td_odds" id="ball_1_h20">&nbsp;</td>
        <td class="bian_td_inp" id="ball_1_t20">&nbsp;</td>
    </tr>
    <tr class="bian_tr_txt">
        <td class="bian_td_qiu">大</td>
        <td class="bian_td_odds" id="ball_1_h21"></td>
        <td class="bian_td_inp" id="ball_1_t21"></td>
        <td class="bian_td_qiu">小</td>
        <td class="bian_td_odds" id="ball_1_h22"></td>
        <td class="bian_td_inp" id="ball_1_t22"></td>
        <td class="bian_td_qiu">单</td>
        <td class="bian_td_odds" id="ball_1_h23"></td>
        <td class="bian_td_inp" id="ball_1_t23"></td>
        <td class="bian_td_qiu">双</td>
        <td class="bian_td_odds" id="ball_1_h24"></td>
        <td class="bian_td_inp" id="ball_1_t24"></td>
        <td colspan="3" class="bian_td_qiu">&nbsp;</td>
    </tr>
    <tr class="bian_tr_txt">
        <td class="bian_td_qiu">尾大</td>
        <td class="bian_td_odds" id="ball_1_h25"></td>
        <td class="bian_td_inp" id="ball_1_t25"></td>
        <td class="bian_td_qiu">尾小</td>
        <td class="bian_td_odds" id="ball_1_h26"></td>
        <td class="bian_td_inp" id="ball_1_t26"></td>
        <td class="bian_td_qiu">合单</td>
        <td class="bian_td_odds" id="ball_1_h27"></td>
        <td class="bian_td_inp" id="ball_1_t27"></td>
        <td class="bian_td_qiu">合双</td>
        <td class="bian_td_odds" id="ball_1_h28"></td>
        <td class="bian_td_inp" id="ball_1_t28"></td>
        <td colspan="3" class="bian_td_qiu">&nbsp;</td>
    </tr>
    <tr class="bian_tr_txt">
        <td class="bian_td_qiu">东</td>
        <td class="bian_td_odds" id="ball_1_h29"></td>
        <td class="bian_td_inp" id="ball_1_t29"></td>
        <td class="bian_td_qiu">南</td>
        <td class="bian_td_odds" id="ball_1_h30"></td>
        <td class="bian_td_inp" id="ball_1_t30"></td>
        <td class="bian_td_qiu">西</td>
        <td class="bian_td_odds" id="ball_1_h31"></td>
        <td class="bian_td_inp" id="ball_1_t31"></td>
        <td class="bian_td_qiu">北</td>
        <td class="bian_td_odds" id="ball_1_h32"></td>
        <td class="bian_td_inp" id="ball_1_t32"></td>
        <td colspan="3" class="bian_td_qiu">&nbsp;</td>
    </tr>
    <tr class="bian_tr_txt">
        <td class="bian_td_qiu">中</td>
        <td class="bian_td_odds" id="ball_1_h33"></td>
        <td class="bian_td_inp" id="ball_1_t33"></td>
        <td class="bian_td_qiu">发</td>
        <td class="bian_td_odds" id="ball_1_h34"></td>
        <td class="bian_td_inp" id="ball_1_t34"></td>
        <td class="bian_td_qiu">白</td>
        <td class="bian_td_odds" id="ball_1_h35"></td>
        <td class="bian_td_inp" id="ball_1_t35"></td>
        <td colspan="6" class="bian_td_qiu">&nbsp;</td>
    </tr>
</table>
<table class="bian" border="0" cellpadding="0" cellspacing="1" style="margin-top:20px;">
    <tr class="bian_tr_bg">
        <td colspan="12">总和 龙虎</td>
    </tr>
    <tr class="bian_tr_title">
        <td>选项</td>
        <td>赔率</td>
        <td width="70">金额</td>
        <td>选项</td>
        <td>赔率</td>
        <td width="70">金额</td>
        <td>选项</td>
        <td>赔率</td>
        <td width="70">金额</td>
        <td>选项</td>
        <td>赔率</td>
        <td width="70">金额</td>
    </tr>
    <tr class="bian_tr_txt">
        <td width="60" class="bian_td_qiu">总和大</td>
        <td class="bian_td_odds" id="ball_9_h1"></td>
        <td width="70" class="bian_td_inp" id="ball_9_t1"></td>
        <td width="60" class="bian_td_qiu">总和小</td>
        <td class="bian_td_odds" id="ball_9_h2"></td>
        <td width="70" class="bian_td_inp" id="ball_9_t2"></td>
        <td width="60" class="bian_td_qiu">总和单</td>
        <td class="bian_td_odds" id="ball_9_h3"></td>
        <td width="70" class="bian_td_inp" id="ball_9_t3"></td>
        <td width="60" class="bian_td_qiu">总和双</td>
        <td class="bian_td_odds" id="ball_9_h4"></td>
        <td width="70" class="bian_td_inp" id="ball_9_t4"></td>
    </tr>
    <tr class="bian_tr_txt">
        <td width="60" class="bian_td_qiu">总和尾大</td>
        <td class="bian_td_odds" id="ball_9_h5"></td>
        <td width="70" class="bian_td_inp" id="ball_9_t5"></td>
        <td width="60" class="bian_td_qiu">总和尾小</td>
        <td class="bian_td_odds" id="ball_9_h6"></td>
        <td width="70" class="bian_td_inp" id="ball_9_t6"></td>
        <td width="60" class="bian_td_qiu">龙</td>
        <td class="bian_td_odds" id="ball_9_h7"></td>
        <td width="70" class="bian_td_inp" id="ball_9_t7"></td>
        <td width="60" class="bian_td_qiu">虎</td>
        <td class="bian_td_odds" id="ball_9_h8"></td>
        <td width="70" class="bian_td_inp" id="ball_9_t8"></td>
    </tr>
</table>
      <div class="button_body"><a onclick="reset()" class="button again" title="重填"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="button submit" onclick="order();" title="下注"></a></div>
      </form>
    </div>
    <div class="lottery_clear"></div>
</div>
</div>
<div class="lottery_clear"></div>
</div>
<div id="endtime"></div>
<script type="text/javascript">loadinfo()</script>
<IFRAME id="OrderFrame" name="OrderFrame" border=0 marginWidth=0 frameSpacing=0 src="" frameBorder=0 noResize width=0 scrolling=AUTO height=0 vspale="0" style="display:none"></IFRAME>
<div style="display:none" id="look"></div>
</body>
</html>