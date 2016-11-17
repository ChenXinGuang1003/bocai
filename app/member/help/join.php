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
	background: url(/images/yes.jpg) no-repeat left;
	line-height: 25px;
	width: 360px;
	padding: 0 0 0 26px;
	height: 25px;
	color: #000;
}
.zhuce_03 {
	float: left;
	background: url(/images/no.jpg) no-repeat left;
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
      <h3>合作加盟</h3>
      <div class="redborder">
        <p> 您有朋友对在线体育博彩感兴趣吗？如果您拥有这么一个强大的网络资源，加入“bet365合作伙伴计划”是您的最佳选择。“bet365合作伙伴计划”申请程序简便，而且不收取任何费用。在第一个月您便能获得收入，且您的回报没有任何限额。</p>
        <h1 style="color:yellow;">如何运作</h1>
        <p>加盟bet365后，您会得到您独有的代理推广代码，会员通过您的推广代码进行会员注册就会成为您的下级会员，您可以通过会员的交易状况提取相关佣金。</p>
        <h1 style="color:yellow;">为何会员选择bet365</h1>
        <p>·bet365 提供195高水位，让会员享受最有价值的投注</p>
        <p>·bet365 提供全世界的75个联赛，4000多个賽事。</p>
        <p>·bet365 提供1500场现场走地赛事给会员尽情享受。</p>
        <p>·bet365 提供优质的客户服务，24小时在线为会员答疑解惑。</p>
        <p>·bet365 提供香港乐透48.2倍超高赔率。</p>
        <h1 style="color:yellow;">合作伙伴可赚得什么</h1>
        <p>bet365为您创造一个获利的计划：</p>
        <p>高达30％--50％的回报。</p>
        <p>如果您参加“bet365合作伙伴计划”，在体育博彩中，每月您将得到30%--50%的高额回报，根据赢额的不同，您得到的回报也有所不同，具体如下：</p>
        <p>净盈利　　　　　体育项目　　　　乐透（有效投注）</p>
        <p>1-199999　　　　<span class="other_red">30%</span><span class="other_red">　　　　 </span>　　　　 <span class="other_red">0.1%</span></p>
        <p>200000-999999　<span class="other_red">40%</span><span class="other_red">　　　　 </span>　　　　 <span class="other_red">0.1%</span></p>
        <p>大于999999　　　<span class="other_red">50%</span><span class="other_red">　　　　 </span>　　　　<span class="other_red">0.1%</span></p>
        <p>如果您还有任何的疑问请联系在线客服，本公司代理部将会回答您的问题。谢谢！</p>
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
