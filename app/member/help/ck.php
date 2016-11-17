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
$(window.parent.parent.document).find("#mainFrame").height(1000);
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
        <p> ◎您现在可以透过以下方式存款给：<br>
          一、公司入款<br>
          • 公司入款是通过公司指定的银行卡号进行存款支付，公司入款可以用网银转帐，ATM存款，或者柜檯汇款的方式支付，具体步骤如下：<br>
          1. 请您登陆会员帐户，点击“线上存款”，选择“公司入款”，进入查看最新的公司入款收款银行账户信息或向24小时在线客服人员索取。<br>
          2. 目前公司提供中国建设银行、中国工商银行、中国农业银行三间银行可选择。跨行转账请您使用跨行快汇，存款到帐时间约为三到五分钟。<br>
          3. 转账成功请您在“公司入款”上提交您存入的金额，我们将于确认到帐后立刻为您游戏帐户充值。<br>
          4. 会员通过公司入款满100元系统将自动增加2%存款优惠，当日无上限。<br>
          • 注：请您存款时在金额后面加个尾数（例如：欲入10000元，请转10000.15元），方便快速到账，谢谢！</p>
        <p> 二、 线上支付<br>
          1. 会员登入后点选”线上付款”。<br>
          2. 选择入款额度，并请确实填写”联络电话” ，如有任何问题，方便客服第一时间与您联繫。<br>
          3. 选择”支付银行”。<br>
          4. 确认送出后，将请您确认您的支付订单无误，并建议您记录您的支付订单号后，确认送出，并耐心等待载入网络银行页面，传输中已将您账户数据加密，请耐心等待。<br>
          5. 进入网络银行页面，请确实填写您银行账号信息，支付成功，额度将在2分钟内系统处理完成，立即加入您的会员账户。<br>
          &nbsp;<br>
          ◎存款需知：<br>
          •单笔最低存款为￥100元人民币， 线上支付单笔最高存款上限为￥50,000人民币，若存款超过￥50,000，请分几次存款；公司入款单笔最高存款上限为￥1,000,000人民币。<br>
          • 未开通网银的会员，请亲洽您的银行柜檯办理。<br>
          • 如有任何问题，请您联繫24小时线上客服。</p>
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
