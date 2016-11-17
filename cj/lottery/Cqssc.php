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
if($Lottery_set['cq']['close']==1)
{
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>重庆即时彩暂停销售</title>
<link href="css/close.css" rel="stylesheet" type="text/css" />
<script src="/js/jquery-1.7.1.js"></script>
</head>
<body>
	<div id="sub">
	<div class="xiuxi">
    	<div class="xx_time">
             <?=$Lottery_set['cq']['des']?>
       	</div>
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
<script type="text/javascript" src="js/cq_ssc.js?v=1005"></script>
<link type="text/css" rel="stylesheet" href="css/jbox.css"/>
<link type="text/css" rel="stylesheet" href="css/ssc.css"/>
<link type="text/css" rel="stylesheet" href="css/ssc_xg.css"/>
<style type="text/css">
body,td,th {
	font-size: 12px;
}
body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}
	.drpbg{width:60px;position:absolute; background:#021e37;text-align:center;top:25px;left:674px; height:42px; border:1px solid white; border-top:none;}
	.drpbg ul{margin:0px; padding:0px; height:42px; width:60px;}
	.drpbg li{margin:0px;text-align:center;width:60px; height:21px; line-height:20px;}
	.drpbg .ca{font-size:12px; color:White;text-decoration:none;}
	.drpbg .ca:hover{color:#ccc;}
.zh{width: 400px;left: 308px;}
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

$(window.parent.document).find("#mainFrame").height(1020);

function browserCompatible(){
    if($.ua().isIe7){
        $(".lottery_main").css('margin', '0px');
        $(".lottery_main").css('width', '800px');
    }
}
</script>
<body style="background-color:transparent">

<!--内容开始-->
<div class="block" style="padding:0px 0px;">

<div class="bannerimg" style="margin: 0 auto;width:1000px">
    <img width="1000" height="100" border="0" src="/images/title_welcome.jpg">
</div>

<div id="new_left" style="display: block;">
    <div  class="new_left_cn" style="float: left; " id="Left_scroll">
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

<div class="lottery_main">
<div{background:#FFFFFF} </div>
<div class="ssc_right">
  <div id="auto_list"></div>
</div>
<div class="ssc_left">

<div class="jsq">
    <span class="time">第 <font id="open_qihao">00000000-000</font> 期
        剩余<font id="whataction">投注</font>时间</span>
    <span class="ssc">重庆时时彩
        第 <font id="numbers">00000000-000</font> 期</span>
        <span class="kjgz"><a  href="sm/ssc.php" title="游戏规则" target="_blank">游戏规则</a></span>
    <span class="zh" id="autoinfo"><font>
    </span>
    <span class="sj" id="cqc_time">00:00</span>
    <div class="open_number"><img src="images/lhj.gif"/><img src="images/lhj.gif"/><img src="images/lhj.gif"/><img src="images/lhj.gif"/><img src="images/lhj.gif"/></div>
    <span class="kjjj" ><a  href="/member/final/LT_result.php?gtype=CQ" title="开奖结果" target="_blank" >开奖结果</a></span>
</div>




    <div class="touzhu" style="margin-left: 10px;">
<form name="orders" action="order/order_cq_ssc.php?1=1" method="post" target="OrderFrame">
    	<ul id="menu_hm">
        	<li class="current" onclick="hm_odds(1)">第一球<span>(万位)</span></li>
            <li class="current_n" onclick="hm_odds(2)">第二球<span>(千位)</span></li>
            <li class="current_n" onclick="hm_odds(3)">第三球<span>(百位)</span></li>
            <li class="current_n" onclick="hm_odds(4)">第四球<span>(十位)</span></li>
            <li class="current_n" onclick="hm_odds(5)">第五球<span>(个位)</span></li>
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
                <td class="bian_td_qiu"><img src="images/ball_2/0.png" /></td>
                <td class="bian_td_odds" id="ball_1_h1" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t1"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/1.png" /></td>
                <td class="bian_td_odds" id="ball_1_h2" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t2"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/2.png" /></td>
                <td class="bian_td_odds" id="ball_1_h3" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t3"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/3.png" /></td>
                <td class="bian_td_odds" id="ball_1_h4" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t4"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/4.png" /></td>
                <td class="bian_td_odds" id="ball_1_h5" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t5"></td>
            </tr>
            <tr class="bian_tr_txt">
                <td class="bian_td_qiu"><img src="images/ball_2/5.png" /></td>
                <td class="bian_td_odds" id="ball_1_h6" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t6"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/6.png" /></td>
                <td class="bian_td_odds" id="ball_1_h7" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t7"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/7.png" /></td>
                <td class="bian_td_odds" id="ball_1_h8" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t8"></td>
                <td class="bian_td_qiu"><img src="images/ball_2/8.png" /></td>
                <td class="bian_td_odds" id="ball_1_h9" width="40"></td>
                <td class="bian_td_inp" id="ball_1_t9"></td>
              <td class="bian_td_qiu"><img src="images/ball_2/9.png" /></td>
              <td class="bian_td_odds" id="ball_1_h10" width="40"></td>
              <td class="bian_td_inp" id="ball_1_t10"></td>
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
              <td colspan="3">&nbsp;</td>
            </tr>
      </table>
    	<table class="bian" border="0" cellpadding="0" cellspacing="1" style="margin-top:20px;">
        <tr class="bian_tr_bg">
              <td colspan="12">总和 龙虎和</td>
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
                    <td width="50" class="bian_td_qiu">总和大</td>
                    <td class="bian_td_odds" id="ball_6_h1"></td>
                    <td width="70" class="bian_td_inp" id="ball_6_t1"></td>
                    <td width="50" class="bian_td_qiu">总和小</td>
                    <td class="bian_td_odds" id="ball_6_h2"></td>
                    <td width="70" class="bian_td_inp" id="ball_6_t2"></td>
                    <td width="50" class="bian_td_qiu">总和单</td>
                    <td class="bian_td_odds" id="ball_6_h3"></td>
                    <td width="70" class="bian_td_inp" id="ball_6_t3"></td>
                    <td width="50" class="bian_td_qiu">总和双</td>
                    <td class="bian_td_odds" id="ball_6_h4"></td>
                    <td width="70" class="bian_td_inp" id="ball_6_t4"></td>
              </tr>
              <tr class="bian_tr_txt">
                    <td width="50" class="bian_td_qiu">龙</td>
                    <td class="bian_td_odds" id="ball_6_h5"></td>
                    <td width="70" class="bian_td_inp" id="ball_6_t5"></td>
                    <td width="50" class="bian_td_qiu">虎</td>
                    <td class="bian_td_odds" id="ball_6_h6"></td>
                    <td width="70" class="bian_td_inp" id="ball_6_t6"></td>
                    <td width="50" class="bian_td_qiu">和</td>
                    <td class="bian_td_odds" id="ball_6_h7"></td>
                    <td width="70" class="bian_td_inp" id="ball_6_t7"></td>
                    <td colspan="3">&nbsp;</td>
              </tr>
           </table>
   	  <ul id="menu_s" style="margin-top:20px;">
        	<li class="current" onclick="s_odds(7)">前三球</li>
            <li class="current_n" onclick="s_odds(8)">中三球</li>
            <li class="current_n" onclick="s_odds(9)">后三球</li>
		</ul>
    	<table class="bian" border="0" cellpadding="0" cellspacing="1">
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
              <td>选项</td>
              <td>赔率</td>
              <td width="70">金额</td>
            </tr>
            <tr class="bian_tr_txt">
                <td class="bian_td_qiu">豹子</td>
                <td class="bian_td_odds" id="ball_7_h1" width="40"></td>
                <td class="bian_td_inp" id="ball_7_t1"></td>
                <td class="bian_td_qiu">顺子</td>
                <td class="bian_td_odds" id="ball_7_h2" width="40"></td>
                <td class="bian_td_inp" id="ball_7_t2"></td>
                <td class="bian_td_qiu">对子</td>
                <td class="bian_td_odds" id="ball_7_h3" width="40"></td>
                <td class="bian_td_inp" id="ball_7_t3"></td>
                <td class="bian_td_qiu">半顺</td>
                <td class="bian_td_odds" id="ball_7_h4" width="40"></td>
                <td class="bian_td_inp" id="ball_7_t4"></td>
                <td class="bian_td_qiu">杂六</td>
                <td class="bian_td_odds" id="ball_7_h5" width="40"></td>
                <td class="bian_td_inp" id="ball_7_t5"></td>
            </tr>
      </table>

        <ul id="menu_s" style="margin-top:20px;">
            <li class="current">牛牛</li>
        </ul>
        <table class="bian" border="0" cellpadding="0" cellspacing="1">
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
                <td>选项</td>
                <td>赔率</td>
                <td width="70">金额</td>
            </tr>
            <tr class="bian_tr_txt">
                <td class="bian_td_qiu">无牛</td>
                <td class="bian_td_odds" id="ball_10_h1" width="40"></td>
                <td class="bian_td_inp" id="ball_10_t1"></td>
                <td class="bian_td_qiu">牛1</td>
                <td class="bian_td_odds" id="ball_10_h2" width="40"></td>
                <td class="bian_td_inp" id="ball_10_t2"></td>
                <td class="bian_td_qiu">牛2</td>
                <td class="bian_td_odds" id="ball_10_h3" width="40"></td>
                <td class="bian_td_inp" id="ball_10_t3"></td>
                <td class="bian_td_qiu">牛3</td>
                <td class="bian_td_odds" id="ball_10_h4" width="40"></td>
                <td class="bian_td_inp" id="ball_10_t4"></td>
                <td class="bian_td_qiu">牛4</td>
                <td class="bian_td_odds" id="ball_10_h5" width="40"></td>
                <td class="bian_td_inp" id="ball_10_t5"></td>
            </tr>
            <tr class="bian_tr_txt">
                <td class="bian_td_qiu">牛5</td>
                <td class="bian_td_odds" id="ball_10_h6" width="40"></td>
                <td class="bian_td_inp" id="ball_10_t6"></td>
                <td class="bian_td_qiu">牛6</td>
                <td class="bian_td_odds" id="ball_10_h7" width="40"></td>
                <td class="bian_td_inp" id="ball_10_t7"></td>
                <td class="bian_td_qiu">牛7</td>
                <td class="bian_td_odds" id="ball_10_h8" width="40"></td>
                <td class="bian_td_inp" id="ball_10_t8"></td>
                <td class="bian_td_qiu">牛8</td>
                <td class="bian_td_odds" id="ball_10_h9" width="40"></td>
                <td class="bian_td_inp" id="ball_10_t9"></td>
                <td class="bian_td_qiu">牛9</td>
                <td class="bian_td_odds" id="ball_10_h10" width="40"></td>
                <td class="bian_td_inp" id="ball_10_t10"></td>
            </tr>
            <tr class="bian_tr_txt">
                <td class="bian_td_qiu">牛牛</td>
                <td class="bian_td_odds" id="ball_10_h11" width="40"></td>
                <td class="bian_td_inp" id="ball_10_t11"></td>
                <td class="bian_td_qiu">牛大</td>
                <td class="bian_td_odds" id="ball_10_h12" width="40"></td>
                <td class="bian_td_inp" id="ball_10_t12"></td>
                <td class="bian_td_qiu">牛小</td>
                <td class="bian_td_odds" id="ball_10_h13" width="40"></td>
                <td class="bian_td_inp" id="ball_10_t13"></td>
                <td class="bian_td_qiu">牛单</td>
                <td class="bian_td_odds" id="ball_10_h14" width="40"></td>
                <td class="bian_td_inp" id="ball_10_t14"></td>
                <td class="bian_td_qiu">牛双</td>
                <td class="bian_td_odds" id="ball_10_h15" width="40"></td>
                <td class="bian_td_inp" id="ball_10_t15"></td>
            </tr>
        </table>
      <div class="button_body"><a onclick="reset()" class="button again" title="重填"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="button submit" onclick="order();" title="下注"></a></div>

	   
      </form>
	  </div>
	 <div  id='ajax_result_into'></div>
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
<!--<script language="javascript" src="js/load_results_cqssc.js"></script>-->
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