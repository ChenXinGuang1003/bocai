<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
include_once($C_Patch."/app/member/cache/website.php");
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
	background: url(images/yes.jpg) no-repeat left;
	line-height: 25px;
	width: 360px;
	padding: 0 0 0 26px;
	height: 25px;
	color: #000;
}
.zhuce_03 {
	float: left;
	background: url(images/no.jpg) no-repeat left;
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
$(window.parent.parent.document).find("#mainFrame").height(760);
</script>
<script language="javascript" src="/js/xhr.js"></script>
<script language="javascript" src="/js/zhuce.js"></script>
<body>
<div class="sidebar">
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
   </div>
<div id="sub">
                <script language="javascript" src="/images/swfobject_source.js"></script>
                <div class="turn" id="turn">
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
                  </div>

  <div id="direction">
    <div id="articles">
      <h3>關於我們</h3>
      <div class="redborder">
        <p><?=$web_site['web_name']?>是最具规模且成长最快的在线游戏网站之一，提供刺激好玩的体育博彩、乐透彩等在线娱乐，为全球博彩爱好者提供最优惠的赔率和最优质的服务，并正发展成为最受欢迎的网上在线娱乐公司，真诚地为您提供最好最新的游戏产品，多种类的语言支持，最具吸引力的独家优惠，及卓越的客户服务
          ，让您尽情享受游戏的乐趣！<br></p>
        <p>在加入我们的游戏之前，请您确定您已年满18周岁；</p>
        <p>每一个用户只能拥有相对应的唯一的账户。如果我们发现任何用户有欺诈行为或非常规的投注方式，我们将立即关闭及取消他的账户，并且有权利冻结账户盈利以及投注本金。<br></p>
        <p>任何未年满18岁的用户，在我公司开户都将被冻结并注销账户。博彩只是一种娱乐消遣的方式，强烈提醒您不要过度沉迷于游戏以至于对其经济，事业，家庭和社会产生负面影响。我们强烈建议所有客户正确面对博彩行为以及拥有一个正确的游戏心态。为保障客户利益，我们提供账户自我冻结、最大注金限制功能，客户旦申请账户可以被冻结或者限制投注金额。s</p>
        <p>如果您还有任何的疑问随时欢迎访问我们的在线客服，我们将有专人耐心回答您的问题。谢谢！</p>
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
