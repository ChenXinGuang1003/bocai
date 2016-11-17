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
$(window.parent.parent.document).find("#mainFrame").height(1800);
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
        <p><strong><span style="font-size:14px">隐私政策</span></strong></p>

<hr>
<p>此政策将描述皇冠国际（或在此提及的"我们"）如何处理您提供给我们的信息和数据，以帮助我们维系您与皇冠国际的关系。</p>

<p>我们将根据此声明的规定来处理任何提供给我们的（通过皇冠国际网站（简称"网站"）、客户申请表或任何其他途径）或我们所持有的关于您的个人信息。提交您的信息并使用网站即表示您已同意我们根据本隐私政策使用您的信息。如果您不同意本隐私政策中的条款，请不要使用网站或将您的个人信息提供给我们。&nbsp;</p>

<p><strong><span style="font-size:14px">信息收集和如何使用</span></strong>&nbsp;</p>

<p>我们所收集、使用和处理的关于您的信息和数据包括：&nbsp;<br>
1. 您通过网站填写表格时提供给我们的信息，或您通过网站或电邮提交的任何其他信息；&nbsp;<br>
2. 通过网站、电邮、电话或其他方式记录的往来信息；&nbsp;<br>
3. 您在我们的调查或客户研究中的回复；&nbsp;<br>
4. 您通过网站、电话或其他方式在皇冠国际进行的交易详情；<br>
5. 您访问网站的详情，包括（但不限于）通信量数据、位置数据、网志和其他通讯数据。&nbsp;</p>

<p>我们使用您的个人及其他信息的主要目的是:&nbsp;<br>
1. 处理您的投注，包括卡支付和在线支付；&nbsp;<br>
2. 设定、运行和管理您的帐户；&nbsp;<br>
3. 遵守我们的法律及监管职责；&nbsp;<br>
4. 建立个人资料；&nbsp;<br>
5. 进行对客户的研究、调查及分析；&nbsp;<br>
6. 在您同意的情况下，为您提供我们的优惠活动、产品和服务信息；&nbsp;<br>
7. 为防止欺诈、不规律投注、洗黑钱和欺骗等行为而对交易进行监管。&nbsp;</p>

<p><strong><span style="font-size:14px">信息存储&nbsp;</span></strong></p>

<p>我们将会采取所有的合理措施来确保客户信息的保密和安全。我们只会把您的个人信息提供给其他相关或附属公司、商业合作伙伴、业务承包商以及代表我们处理此类信息的供应商。如果您在本公司开设帐户，为了防止欺诈、洗钱以及对您年龄和身份的核实，我们将通过第三方（包括信用资料查询机构）来获取您的信用情况。同时为了防止欺诈或洗钱行为，我们也会将您的账户信息透露给此类机构、安全组织以及任何其他第三方。</p>

<p><strong><span style="font-size:14px">电话&nbsp;</span></strong></p>

<p>出于员工培训和安全原因，我们所有的客户往来电话均有录音，同时也可为您之前所受到的服务提供进一步的协助。<br>
Cookies使用&nbsp;</p>

<p>客户使用本网站后，我们出于以上目的可能使用cookies技术从服务器中收集客户信息。如果您在皇冠国际注册或者继续使用网站，则您将被视为同意我们使用Cookies。&nbsp;</p>

<p>Cookies包含转至您电脑硬盘上的信息。这将帮助我们完善网站，并提供更优质且人性化的服务。我们使用的某些Cookies对于网站的运行至关重要。&nbsp;</p>

<p>如果您想删除任何已储存在您电脑上的Cookies，或想停止那些记录您浏览网站模式的Cookies，您可以删除您的现有Cookies和/或更改您浏览器上的隐私设置，以阻挡Cookies（此过程在各个浏览器间有所不同）。如果您想获知更多关于如何操作的信息，请访问www.allaboutcookies.org。请注意，如果删除我们的Cookies或阻挡我们之后的Cookies，将导致您无法使用网站的某些区域或特色功能。&nbsp;</p>

<p><strong><span style="font-size:14px">网络输送&nbsp;</span></strong></p>

<p>随著网络全球化，通过互联网收集和处理个人数据的过程中会涉及国际数据传送。某些个人数据的处理器可能在欧洲经济区以外。所以您在浏览网站或者通过电子媒介联系我们时，您被视为明确并同意我们（或我们的供应商或承包商）在欧洲经济区以外处理您的个人数据。我们将采取所有合理措施来确保安全处理您的信息和数据 ，并符合此隐私政策。&nbsp;</p>

<p><strong><span style="font-size:14px">信息披露&nbsp;</span></strong></p>

<p>我们有权将持有客户的个人数据、投注历史信息公布给监管机构、体育机构及其他相关机构，其中包括警察。此目的是方便对任何有关欺诈、洗黑钱或赛事公平与公正程度等事宜作出调查，并且履行英国博彩委员会或直布罗陀监管机构对我们提出的监管职责。&nbsp;</p>

<p>为遵循皇冠国际的法律和制度方面的要求以及皇冠国际本身内部的风险管理程序，我们将在您的账户关闭后对信息保留一段时间（通常不超过6年）。所有此类信息均将根据此隐私声明的规定来保存。&nbsp;</p>

<p><strong><span style="font-size:14px">信息的获取&nbsp;</span></strong></p>

<p>您有权获知我们所持有的关于您的信息，此权利将依据1998年数据保护法来执行。如想获取我们所持有的关于您的信息，您需要缴纳RMB10元手续费。&nbsp;</p>

<p><strong><span style="font-size:14px">我们隐私声明的更改&nbsp;</span></strong></p>

<p>如果今后我们对此隐私政策做任何更改，都将在相关页面上张贴，且此类更改将在修改版隐私政策张贴到网页上时生效。如果我们对此隐私政策做出大规模更改，则我们会尽力通过电邮、网站公告或其他通讯渠道通知您。&nbsp;</p>

<p>最后更新2016年1月23日。&nbsp;</p>

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
