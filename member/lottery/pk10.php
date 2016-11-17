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
if($Lottery_set['pk10']['close']==1)
{
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title></title>
<link href="css/close.css" rel="stylesheet" type="text/css" />
<script src="/js/jquery-1.7.1.js"></script>
</head>
<body>
	<div class="xiuxi">
    	<div class="xx_time">
             <?=$Lottery_set['pk10']['des']?>
       	</div>
    </div>
    <div class="button">
        	<ul>
            	<li class="kg"><a  href="/member/final/LT_result.php?gtype=BJPK" title="开奖结果" target="_blank" ></a></li>
                <li class="gz"><a  href="sm/bjsc.php" title="游戏规则" target="_blank"></a></li>
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
<script type="text/javascript" src="js/bj_pk10.js?v=1005"></script>
<link type="text/css" rel="stylesheet" href="css/jbox.css"/>
<link type="text/css" rel="stylesheet" href="css/pk10.css"/>
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

$(window.parent.document).find("#mainFrame").height(1000);

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
        <a href="rule/Rule_BjPk10.html" title="游戏规则" target="_blank" class="laba" style="color:#FC0;font-size: 14px;">游戏规则</a>
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
        <div class="tops">北京PK10<span>第 <font id='numbers' class="red number">00000000-000</font> 期</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="/member/final/LT_result.php?gtype=BJPK" title="历史开奖" class="laba" style="color:#FC0" target="_blank">(历史开奖)</a></div>
        <div class="kick "><img src='images/Open_3/x1.png'></div>
        <div class="kick er"><img src='images/Open_3/x2.png'></div>
        <div class="kick san"><img src='images/Open_3/x3.png'></div>
        <div class="kick si"><img src='images/Open_3/x4.png'></div>
        <div class="kick wu"><img src='images/Open_3/x5.png'></div>
        <div class="kick liu"><img src='images/Open_3/x6.png'></div>
        <div class="kick qi"><img src='images/Open_3/x7.png'></div>
        <div class="kick ba"><img src='images/Open_3/x8.png'></div>
        <div class="kick jiu"><img src='images/Open_3/x9.png'></div>
        <div class="kick shi"><img src='images/Open_3/x10.png'></div>
        <div class="fot" id="autoinfo">开奖数据获取中...</div>
      </div>
    </div>
    <div class="touzhu"  style="margin-left: 10px;">
<form name="orders" action="order/order_pk10.php?1=1" method="post" target="OrderFrame">
<table class="bian" border="0" cellpadding="0" cellspacing="1">
        <tr class="bian_tr_bg">
              <td colspan="12">冠、亚军和（冠军车号+亚军车号）</td>
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
                    <td width="60" class="bian_td_qiu">3</td>
                <td class="bian_td_odds" id="ball_11_h1"></td>
                    <td width="70" class="bian_td_inp" id="ball_11_t1"></td>
                    <td width="60" class="bian_td_qiu">4</td>
            <td class="bian_td_odds" id="ball_11_h2"></td>
                    <td width="70" class="bian_td_inp" id="ball_11_t2"></td>
                    <td width="60" class="bian_td_qiu">5</td>
            <td class="bian_td_odds" id="ball_11_h3"></td>
                    <td width="70" class="bian_td_inp" id="ball_11_t3"></td>
                    <td width="60" class="bian_td_qiu">6</td>
            <td class="bian_td_odds" id="ball_11_h4"></td>
                    <td width="70" class="bian_td_inp" id="ball_11_t4"></td>
              </tr>
              <tr class="bian_tr_txt">
                    <td width="60" class="bian_td_qiu">7</td>
                <td class="bian_td_odds" id="ball_11_h5"></td>
                    <td width="70" class="bian_td_inp" id="ball_11_t5"></td>
                    <td width="60" class="bian_td_qiu">8</td>
            <td class="bian_td_odds" id="ball_11_h6"></td>
                    <td width="70" class="bian_td_inp" id="ball_11_t6"></td>
                    <td width="60" class="bian_td_qiu">9</td>
                <td class="bian_td_odds" id="ball_11_h7"></td>
                    <td width="70" class="bian_td_inp" id="ball_11_t7"></td>
                    <td width="60" class="bian_td_qiu">10</td>
                    <td class="bian_td_odds" id="ball_11_h8"></td>
                    <td width="70" class="bian_td_inp" id="ball_11_t8"></td>
              </tr>
              <tr class="bian_tr_txt">
                <td class="bian_td_qiu">11</td>
                <td class="bian_td_odds" id="ball_11_h9"></td>
                <td class="bian_td_inp" id="ball_11_t9"></td>
                <td class="bian_td_qiu">12</td>
                <td class="bian_td_odds" id="ball_11_h10"></td>
                <td class="bian_td_inp" id="ball_11_t10"></td>
                <td class="bian_td_qiu">13</td>
                <td class="bian_td_odds" id="ball_11_h11"></td>
                <td class="bian_td_inp" id="ball_11_t11"></td>
                <td class="bian_td_qiu">14</td>
                <td class="bian_td_odds" id="ball_11_h12"></td>
                <td class="bian_td_inp" id="ball_11_t12"></td>
              </tr>
              <tr class="bian_tr_txt">
                <td class="bian_td_qiu">15</td>
                <td class="bian_td_odds" id="ball_11_h13"></td>
                <td class="bian_td_inp" id="ball_11_t13"></td>
                <td class="bian_td_qiu">16</td>
                <td class="bian_td_odds" id="ball_11_h14"></td>
                <td class="bian_td_inp" id="ball_11_t14"></td>
                <td class="bian_td_qiu">17</td>
                <td class="bian_td_odds" id="ball_11_h15"></td>
                <td class="bian_td_inp" id="ball_11_t15"></td>
                <td class="bian_td_qiu">18</td>
                <td class="bian_td_odds" id="ball_11_h16"></td>
                <td class="bian_td_inp" id="ball_11_t16"></td>
              </tr>
              <tr class="bian_tr_txt">
                <td class="bian_td_qiu">19</td>
                <td class="bian_td_odds" id="ball_11_h17"></td>
                <td class="bian_td_inp" id="ball_11_t17"></td>
                <td colspan="9" class="bian_td_qiu">&nbsp;</td>
              </tr>
              <tr class="bian_tr_txt">
                <td class="bian_td_qiu">冠亚大</td>
                <td class="bian_td_odds" id="ball_11_h18"></td>
                <td class="bian_td_inp" id="ball_11_t18"></td>
                <td class="bian_td_qiu">冠亚小</td>
                <td class="bian_td_odds" id="ball_11_h19"></td>
                <td class="bian_td_inp" id="ball_11_t19"></td>
                <td class="bian_td_qiu">冠亚单</td>
                <td class="bian_td_odds" id="ball_11_h20"></td>
                <td class="bian_td_inp" id="ball_11_t20"></td>
                <td class="bian_td_qiu">冠亚双</td>
                <td class="bian_td_odds" id="ball_11_h21"></td>
                <td class="bian_td_inp" id="ball_11_t21"></td>
              </tr>
           </table>
    	<ul id="menu_hm" style="margin-top:20px;">
        	<li class="current" onclick="hm_odds(1)">冠军</li>
            <li class="current_n" onclick="hm_odds(2)">亚军</li>
            <li class="current_n" onclick="hm_odds(3)">第三名</li>
            <li class="current_n" onclick="hm_odds(4)">第四名</li>
            <li class="current_n" onclick="hm_odds(5)">第五名</li>
            <li class="current_n" onclick="hm_odds(6)">第六名</li>
            <li class="current_n" onclick="hm_odds(7)">第七名</li>
            <li class="current_n" onclick="hm_odds(8)">第八名</li>
            <li class="current_n" onclick="hm_odds(9)">第九名</li>
            <li class="current_n" onclick="hm_odds(10)">第十名</li>
		</ul>
<table class="bian" border="0" cellpadding="0" cellspacing="1">
            <tr class="bian_tr_title">
                <td>选项</td>
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
                <td height="25" class="bian_td_qiu"><img src="images/ball_3/1.png" /></td>
                <td class="bian_td_odds" id="ball_1_h1"></td>
            <td class="bian_td_inp" id="ball_1_t1"></td>
                <td class="bian_td_qiu"><img src="images/ball_3/2.png" /></td>
                <td class="bian_td_odds" id="ball_1_h2"></td>
            <td class="bian_td_inp" id="ball_1_t2"></td>
                <td class="bian_td_qiu"><img src="images/ball_3/3.png" /></td>
                <td class="bian_td_odds" id="ball_1_h3"></td>
            <td class="bian_td_inp" id="ball_1_t3"></td>
                <td class="bian_td_qiu"><img src="images/ball_3/4.png" /></td>
                <td class="bian_td_odds" id="ball_1_h4"></td>
                <td class="bian_td_inp" id="ball_1_t4"></td>
              </tr>
            <tr class="bian_tr_txt">

                <td height="25" class="bian_td_qiu"><img src="images/ball_3/5.png" /></td>
                <td class="bian_td_odds" id="ball_1_h5"></td>
            <td class="bian_td_inp" id="ball_1_t5"></td>
                <td class="bian_td_qiu"><img src="images/ball_3/6.png" /></td>
                <td class="bian_td_odds" id="ball_1_h6"></td>
            <td class="bian_td_inp" id="ball_1_t6"></td>
                <td class="bian_td_qiu"><img src="images/ball_3/7.png" /></td>
                <td class="bian_td_odds" id="ball_1_h7"></td>
            <td class="bian_td_inp" id="ball_1_t7"></td>
                <td class="bian_td_qiu"><img src="images/ball_3/8.png" /></td>
                <td class="bian_td_odds" id="ball_1_h8"></td>
                <td class="bian_td_inp" id="ball_1_t8"></td>
              </tr>
            <tr class="bian_tr_txt">
              <td class="bian_td_qiu"><img src="images/ball_3/9.png" /></td>
              <td class="bian_td_odds" id="ball_1_h9"></td>
              <td class="bian_td_inp" id="ball_1_t9"></td>
              <td class="bian_td_qiu"><img src="images/ball_3/10.png" /></td>
              <td class="bian_td_odds" id="ball_1_h10"></td>
              <td class="bian_td_inp" id="ball_1_t10"></td>
              <td colspan="6" class="bian_td_qiu">&nbsp;</td>
              </tr>
            <tr class="bian_tr_txt">
              <td class="bian_td_qiu">大</td>
              <td class="bian_td_odds" id="ball_1_h11"></td>
              <td class="bian_td_inp" id="ball_1_t11"></td>
              <td class="bian_td_qiu">小</td>
              <td class="bian_td_odds" id="ball_1_h12"></td>
              <td class="bian_td_inp" id="ball_1_t12"></td>
              <td class="bian_td_qiu">单</td>
              <td class="bian_td_odds" id="ball_1_h13"></td>
              <td class="bian_td_inp" id="ball_1_t13"></td>
              <td class="bian_td_qiu">双</td>
              <td class="bian_td_odds" id="ball_1_h14"></td>
              <td class="bian_td_inp" id="ball_1_t14"></td>
            </tr>
      </table>
    	<table class="bian" border="0" cellpadding="0" cellspacing="1" style="margin-top:20px;">
            <tr class="bian_tr_bg">
              <td colspan="3">1V10 龙虎</td>
              <td colspan="3">2V9 龙虎</td>
              <td colspan="3">3V8 龙虎</td>
              <td colspan="3">4V7 龙虎</td>
              <td colspan="3">5V6 龙虎</td>
            </tr>
            <tr class="bian_tr_title">
              <td width="40">玩法</td>
              <td width="40">赔率</td>
              <td>金额</td>
              <td width="40">玩法</td>
              <td width="40">赔率</td>
              <td>金额</td>
              <td width="40">玩法</td>
              <td width="40">赔率</td>
              <td>金额</td>
              <td width="40">玩法</td>
              <td width="40">赔率</td>
              <td>金额</td>
              <td width="40">玩法</td>
              <td width="40">赔率</td>
              <td>金额</td>
            </tr>
            <tr class="bian_tr_txt">
              <td class="bian_td_qiu">龙</td>
              <td class="bian_td_odds" id="ball_1_h15"></td>
              <td class="bian_td_inp" id="ball_1_t15"></td>
              <td class="bian_td_qiu">龙</td>
              <td class="bian_td_odds" id="ball_2_h15"></td>
              <td class="bian_td_inp" id="ball_2_t15"></td>
              <td class="bian_td_qiu">龙</td>
              <td class="bian_td_odds" id="ball_3_h15"></td>
              <td class="bian_td_inp" id="ball_3_t15"></td>
              <td class="bian_td_qiu">龙</td>
              <td class="bian_td_odds" id="ball_4_h15"></td>
              <td class="bian_td_inp" id="ball_4_t15"></td>
              <td class="bian_td_qiu">龙</td>
              <td class="bian_td_odds" id="ball_5_h15"></td>
              <td class="bian_td_inp" id="ball_5_t15"></td>
            </tr>
              <tr class="bian_tr_txt">
                <td class="bian_td_qiu">虎</td>
              	<td class="bian_td_odds" id="ball_1_h16"></td>
              	<td class="bian_td_inp" id="ball_1_t16"></td>
              	<td class="bian_td_qiu">虎</td>
              	<td class="bian_td_odds" id="ball_2_h16"></td>
              	<td class="bian_td_inp" id="ball_2_t16"></td>
              	<td class="bian_td_qiu">虎</td>
              	<td class="bian_td_odds" id="ball_3_h16"></td>
              	<td class="bian_td_inp" id="ball_3_t16"></td>
              	<td class="bian_td_qiu">虎</td>
              	<td class="bian_td_odds" id="ball_4_h16"></td>
              	<td class="bian_td_inp" id="ball_4_t16"></td>
              	<td class="bian_td_qiu">虎</td>
              	<td class="bian_td_odds" id="ball_5_h16"></td>
              	<td class="bian_td_inp" id="ball_5_t16"></td>
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
<script>
function cs_table(tag,el,id,element,num){
	var tagsContent = document.getElementById(tag);
	var tagsLi = tagsContent.getElementsByTagName(el);

	var tagContent = document.getElementById(id);
	var tagLi = tagContent.getElementsByTagName(element);
	var len= tagsLi.length;
	var back_img,n_img;
	for(var i=0; i<len; i++){				
		if(i == '0'){
			back_img = 'fiest_bg01.png';
			n_img = 'fiest_bg02.png';
		}else if(i+1 == len){
			back_img = 'wu_bg02.png';
			n_img = 'wu_bg01.png';
		}else{
			back_img = 'top_bg02.png';
			n_img = 'top_bg.png';
		}
		if(i == num){
			tagsLi[i].style.background = 'url(images/'+back_img+') repeat-x';
			tagsLi[i].style.fontWeight = 'bold';
			tagLi[i].style.display="block"; 
		}else{
			tagsLi[i].style.background = 'url(images/'+n_img+') repeat-x';
			tagsLi[i].style.fontWeight = 'normal';
			tagLi[i].style.display="none"; 
		}
	}
	if(tag=='tag4'){
		window.scrollTo(0,document.body.scrollHeight);
	}
}
</script>
<script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
<div style='width:1px;height:1px;overflow:hidden;'>
  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" 
           codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" 
           width="1" height="1" id="swfcontent" align="middle">
      <param name="allowScriptAccess" value="sameDomain" />
      <param name="movie" value="play.swf" />
      <param name="quality" value="high" />
      <param name="bgcolor" value="#ffffff" />
      <embed src="play.swf" quality="high" bgcolor="#ffffff" width="550" 
             height="400" name="swfcontent" align="middle" allowScriptAccess="sameDomain" 
             type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer" />
    </object>
  </div>
</html>