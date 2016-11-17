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
$(window.parent.parent.document).find("#mainFrame").height(1360);
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
      <h3>汇款账号</h3>
      <div class="redborder">
        <p><strong><span style="font-size:14px">存款</span></strong></p>

<hr>
<p><strong><span style="font-size:14px">选择您的付款方式：</span></strong></p>

<p><strong>在线存款</strong></p>

<p>会员登入后点选"在线存款"。<br>
选择入款额度，如有问题，请及时联系24H在线客服。<br>
选择"支付银行"。<br>
确认送出后，请您核对您的支付订单无误，并建议您记录您的支付订单号，并耐心等待载入网络银行页面，传输中已将您账户数据加密，请耐心等待。<br>
进入网络银行页面，请确实填写您银行账号信息，支付成功后额度将在5分钟内系统自动加入到您在bet365的会员帐号上。</p>

<p><strong>公司入款</strong></p>

<p>工商银行 &nbsp;&nbsp;姓名：*** &nbsp; &nbsp;账号：*** &nbsp; 开户行地址：***</p>

<p>农业银行 &nbsp; 姓名：*** &nbsp; &nbsp;账号：*** &nbsp; 开户行地址：***</p>

<p>建设银行 &nbsp; 姓名：*** &nbsp; &nbsp;账号：*** &nbsp; 开户行地址：***</p>

<p><strong>存款须知</strong></p>

<p>*bet365单笔最低存款为RMB100元， 线上支付单笔最高存款上限为RMB50,000元，若存款超过RMB50,000元，请分几次存款；公司入款单笔最高存款上限为RMB1,000,000元。<br>
*未开通网银的会员，请亲到您的开户银行柜檯办理。<br>
*如有问题，请联繫24小时线上客服。</p>

<hr>
<p><span style="font-size:14px"><strong>提款</strong></span></p>

<p>您可以通过以下方式提款：</p>

<p>1、会员登入后点选"在线取款"。</p>

<p>2、确认提款账户姓名与您银行帐号持有人相符。</p>

<p>3、按要求填写正确的银行账户资料，确认提款银行帐号输入正确。</p>

<p>4、输入取款额度。</p>

<p>5、输入正确的提款密码，否则不能提款。</p>

<p>6、支持提款银行：<br>
工商银行，建设银行，农业银行，招商银行，交通银行，民生银行，兴业银行，中国银行，光大银行，中信银行，中国邮政，浦发银行， 华夏银行，平安银行，北京银行，上海银行，渤海银行，宁波银行，南京银行，浙商银行，深圳发展，广发银行，北京农商，东亚银行。</p>

<p><strong><span style="font-size:14px">注意事项：</span></strong></p>

<p>*bet365最低取款为RMB100元，单日最高取款上限为RMB1000万元。&nbsp;</p>

<p>*bet365提供24小时内仅限提款3次（大陆会员）。</p>

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
