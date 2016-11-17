<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();
$display	=	'block';
if(intval($_COOKIE['f'])) $display	= 'none';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?=$web_site['web_name']?>
</title>
    <link href="/css/css_1.css" rel="stylesheet" type="text/css" />
    <link href="/cl/css/bcss.css" rel="stylesheet" type="text/css" />
    <script language="javascript" src="/js/jquery-1.7.1.js"></script>
    <script src="/cl/js/common.js"></script>
<style>
.fontcolor {
	float: left;
	background: url(../images/yes.jpg) no-repeat left;
	line-height: 25px;
	width: 360px;
	padding: 0 0 0 26px;
	height: 25px;
	color: #000;
}
.zhuce_03 {
	float: left;
	background: url(../images/no.jpg) no-repeat left;
	line-height: 25px;
	width: 360px;
	padding: 0 0 0 26px;
	height: 25px;
	color: #000;
}
</style>
</head>
<script language="javascript">
function HotNewsHistory(){
window.open('/app/member/help/noticle.php','newwindow','menubar=no,status=yes,scrollbars=yes,top=150,left=408,toolbar=no,width=575,height=550');
}
</script>
<script language="javascript">
if(self==top){
	top.location='/index.php';
}
function menu_click(id){
	parent.topFrame.document.getElementById("textGlitter"+id).click();
	}
function page_click(id){
	window.parent.document.getElementById(id).click();
	}
$(window.parent.parent.document).find("#mainFrame").height(1385);
</script>
<script language="javascript" src="/js/xhr.js"></script>
<script language="javascript" src="/js/zhuce.js"></script>
<style>
#sub{width:1000px;}
.first-jp-wrap {float:left;height:43px;margin-left:250px;position:relative;width:488px;background:url("/pic/prize_bg.png") no-repeat scroll left top;}
.first-jp-wrap .ele-jackpot-wrap {cursor:pointer;font-size:22px;height:35px;left:121px;line-height:35px;position:absolute;text-align:center;top:7px;width:241px;color: #FDDA52;}
.ele-jackpot-wrap span{letter-spacing:2px; font-weight:bolder;}

#articles h3{background: url("/pic/page_body_top.png") no-repeat scroll center top; height:85px;margin:85px 0 0 0;}
.redborder{background: url("/pic/page_body_bg.jpg") repeat-y scroll left top; color:#FFF; }

</style>
<body>
<!--<div class="sidebar">
        <div class="sideba">
            <ul id="sideba_all">
                <li>
                    <img alt="" src="/images/shouquan.gif"></li>
                <li><a class="htm_sidbar_lottory" onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);">
                    <img alt="" src="/images/cp.jpg"></a></li>
                <li><a class="htm_sidbar_delar" onclick="click_url('/member/zhenren/mylive.php')" href="javascript:void(0);">
                    <img alt="" src="/images/zr.jpg"></a></li>
                <li><a class="htm_sidbar_SportsBook" onclick="click_url('/app/member/sport.php')" href="javascript:void(0);">
                    <img alt="" src="/images/ty.jpg"></a></li>
                <li><a onclick="click_url('/member/lt/')" href="javascript:void(0);">
                    <img alt="" src="/images/yh.jpg"></a></li>
            </ul>
        </div>
   </div>-->
<div id="sub">
	<!---->
	<img width="1000" height="217" src="/pic/title_welcome.png" class="pngfix">
    <div class="first-jp-wrap">
        <div class="ele-jackpot-wrap">
             <span class="js-ele-JP1">6,994,039.03</span>
        </div>               
    </div>
	<!---->
             
                <script language="javascript" src="/images/swfobject_source.js"></script>
                <!--<div class="turn" id="turn">
					 <script type=text/javascript>
                       var focus_width=744;
                       var focus_height=220;
                       var pics='/images/1.jpg|/images/2.jpg|/images/3.jpg|/images/4.jpg'; 
                       var links='|||'; 
                       var s1 = new SWFObject("/images/focusFlash_fp.swf", "mymovie1", focus_width, focus_height, "4", "#ffffff");
                       s1.addParam("wmode", "transparent");
                       s1.addParam("AllowscriptAccess", "sameDomain");
                       s1.addVariable("bigSrc", pics);               
                       s1.addVariable("href", links);
                       s1.addVariable("width", focus_width);
                       s1.addVariable("height", focus_height);
                       s1.write("turn");
                    </script>
                  </div>-->
  <div id="direction">
    <div id="articles">
    
      <h3></h3>
      
      <div class="redborder">
        <p><strong><span style="font-size:14px">Cookies政策</span></strong></p>

<hr>
<p>皇冠国际（此"网站"）使用Cookies功能，为客户提供更好及更个性化的服务。&nbsp;</p>

<p>此Cookies政策将解释什么是cookies、cookies在网站中是如何使用的以及怎样管理cookies的使用。&nbsp;</p>

<p><strong><span style="font-size:14px">什么是Cookie?</span></strong></p>

<p>Cookies是包含少量信息的小型文字档案，在您使用网络时会传递及储存至您的电脑、智能手机或其他终端设备中。Cookies会在之后的每次网站访问时回传信息，以使相关网站可以辨别用户信息。&nbsp;</p>

<p>如想获取关于cookies的更多信息，请访问www.allaboutcookies.org。相关cookies视频可在www.google.co.uk/goodtoknow/data-on-the-web/cookies查看。&nbsp;</p>

<p><strong><span style="font-size:14px">网站Cookies的使用</span></strong></p>

<p>关于网站中Cookies的使用，有以下若干原因。&nbsp;</p>

<p>其中包括但不仅限于：&nbsp;</p>

<p>(i)允许用户登录自己的皇冠国际帐户；&nbsp;</p>

<p>(ii)允许用户选择登录首选项；&nbsp;</p>

<p>(iii)监控和收集网站上有关交易的信息；&nbsp;</p>

<p>(iv)预防欺骗和保障隐私。&nbsp;</p>

<p>Cookies的使用通常可增进和加强用户体验。一些cookies的使用可有助于网站的运行。&nbsp;</p>

<p>皇冠国际的网站cookies使用可分为以下几类：&nbsp;</p>

<p>Session管理 - 此类cookies可用来确保网站的使用，能够管理session信息并确保用户的网站浏览。</p>

<p>功能性 - 此类cookies储存信息可确保我们记住用户的使用偏好，如：偏好语言、分类类型、媒体设定等。此外还能帮助增进用户体验，例如停止相同信息被显示两次的情况。&nbsp;</p>

<p>预防欺骗 - 此类cookies储存信息可帮助我们阻止网络欺骗。&nbsp;</p>

<p>跟踪 - 此类cookies可确保我们储存用户的网站访问信息，我们需要记录该信息以向合作会员支付佣金。&nbsp;</p>

<p>皇冠国际不使用第三方跟踪cookies。&nbsp;</p>

<p>关于网站提供的第三方网站链接，请注意这些网站设有自己的cookies及隐私政策。如果您决定进入任何链接的第三方网站，请在访问前阅读其cookies与隐私条款。&nbsp;</p>

<p><strong><span style="font-size:14px">管理Cookies</span></strong></p>

<p>如果您想删除任何已储存在您电脑上的Cookies，或想停止那些记录您浏览网站模式的Cookies，您可以删除现有Cookies和/或更改浏览器上的隐私设置（此过程在各个浏览器间有所不同）。如想获知更多关于如何操作的信息，请访问www.allaboutcookies.org。您在浏览器中的"帮助"部分也可查看到如何进行此操作的相关信息。&nbsp;</p>

<p>请注意，如果删除我们的Cookies或阻挡我们之后的Cookies，将导致您无法使用网站的某些区域或特色功能。例如：如果您的浏览器中设置禁用"session"cookies，可能会导致您无法登录自己的皇冠国际帐户。&nbsp;</p>

<p>关于皇冠国际保护个人隐私的详细信息可在我们的隐私政策中查看。</p>

      </div>
      <p>&nbsp; </p>
    </div>
  </div>
  <div style="clear:both"></div>
</div>
<div style="clear:both"></div>
</div>
</div>
</body>
</html>
