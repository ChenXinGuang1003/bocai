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
$(window.parent.parent.document).find("#mainFrame").height(1700);
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
       <p><strong><span style="font-size:14px">博彩责任</span></strong></p>

<hr>
<p><strong><span style="font-size:14px">我们为客户在博彩自律方面提供多方面的帮助，其中包括：</span></strong></p>

<p>- 在线存款限额&nbsp;<br>
- 暂时关闭帐户&nbsp;<br>
- 关于控制投注的信息&nbsp;<br>
- 问题性博彩问卷调查&nbsp;</p>

<p><span style="font-size:14px"><strong>未满博彩年龄&nbsp;</strong></span></p>

<p>未满18岁的人士进行博彩属非法行为，皇冠国际会在此方面绝对严格执行。我们会对客户进行年龄验证，并可能要求其上交补充文件。对任何未满18岁人士使用此网站所获得的彩金，一旦发现，将被没收并上报有关部门处理。</p>

<p><span style="font-size:14px"><strong>雇员培训&nbsp;</strong></span></p>

<p>我们所有的客户服务人员在问题性博彩方面都经过严格的培训。</p>

<p><span style="font-size:14px"><strong>在线存款限额</strong></span></p>

<p>此功能可帮助您控制每24小时或每168小时（7日）的在线存款限额。您可以随时减少此限额，若要提高限额，则需要24小时的生效时间。我们的客户服务小组很乐意为您提供帮助，但我们不能更改您设定的限制。</p>

<p>登陆您的帐户之后，您可以访问"服务"区，在"会员" - "我的账户" - "我的信息" - "个人资料"中设定或修改您的存款限额。</p>

<p><span style="font-size:14px"><strong>查看账户历史&nbsp;</strong></span></p>

<p>您可随时查看账户的交易历史以及存取款记录。账户余额通常可以在"服务" - "会员" - "银行" - "余额"部分中查看，同时您也可以在登录账户时在页面右上角查看。</p>

<p><span style="font-size:14px"><strong>有节制博彩</strong></span></p>

<p>皇冠国际允许顾客自我禁止使用帐户，限期为6个月 、1 年、2 年或5 年。</p>

<p>帐户一旦关闭，客户无论任何原因都不能重开帐户，直至所设定的期限到期。</p>

<p>在关闭期间皇冠国际将尽其所能避免客户另外开设一个新帐户。</p>

<p>如果帐户状态只是单纯的"关闭"，该帐户可以在任何时间重开。</p>

<p>如果您希望使用这项功能或想知道更多相关信息，请联系我们。我们专业的客服人员将竭诚为您服务。</p>

<p><span style="font-size:14px"><strong>关于控制您投注的信息</strong></span></p>

<p>在人们用他们的方式博彩的同时，博彩成了某些人的问题。以下提示也许能帮助您控制博彩问题：</p>

<p>1. 博彩只是一种娱乐，不应被视为赚钱的方法&nbsp;<br>
2. 避免有把输的钱赢回来的想法&nbsp;<br>
3. 只投注您付得起的金额&nbsp;<br>
4. 时刻记着花在博彩上的时间和金钱&nbsp;<br>
5. 如果您暂时不想博彩了，可以选择使用自我控制期的关闭账户&nbsp;<br>
6. 如果您需要咨询问题博彩，请联系Gambling Therapy</p>

<p><span style="font-size:14px"><strong>问题性博彩问卷调查&nbsp;</strong></span></p>

<p>如果您担心博彩已严重影响到自己或他人的生活，以下问题可帮您找到答案：</p>

<p>1. 您进行博彩是否为了逃避乏味或不愉快的生活？&nbsp;<br>
2. 进行博彩并花光钱时，您是否感到迷茫或绝望，并且想尽快再开始博彩？&nbsp;<br>
3. 您博彩时是否会输掉最后一分钱才罢休（甚至是回家的路费或茶水钱）？&nbsp;<br>
4. 您是否曾经用谎言掩饰花在博彩上的金钱或时间？&nbsp;<br>
5. 您是否因博彩而对自己的家庭、朋友或爱好失去了兴趣？&nbsp;<br>
6. 输钱之后，您是否觉得一定要尽快把这些钱赢回来？&nbsp;<br>
7. 争执、挫折或失望是否会导致您想进行博彩？&nbsp;<br>
8. 您是否因为博彩而感到情绪低落甚至轻生？</p>

<p>在这些问题中，您问答的"是"越多，您就越可能有严重博彩问题。如想了解更多相关信息，请访问Gambling Therapy的网站联系他们：www.gamblingtherapy.org。</p>

<p>&nbsp;</p>

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
