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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<script type="text/javascript" src="../../js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="../../js/jquery.ua.min.js"></script>
<script type="text/javascript" src="../../js/top.js"></script>
<script type="text/javascript" src="/cl/js/common.js"></script>
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


.inner_main {
    margin: 0 auto;
    padding: 0 0 20px;
    width: 1000px;
}
.lottery_list {
    padding: 24px 0;
}
.lottery_list ul{padding:0;margin:0;}
.lottery_list li {
    background: url("/images/lottery_list_bg.png") no-repeat scroll 0 0;
    display: inline;
    float: left;
    height: 133px;
    margin: 0 6px 20px;
    overflow: hidden;
    width: 317px;
}
.lottery_list li .text_store {
    display: inline;
    float: left;
    width: 166px;
}
.lottery_list li .text_store .s1 {
    display: block;
    font-size: 14px;
    height: 26px;
    line-height: 26px;
    overflow: hidden;
    padding: 20px 0 0 35px;
    text-align: center;
    width: 105px;
}
.lottery_list li .text_store .s2 {
    display: block;
    padding: 14px 0 0 27px;
}
.a_link1 {
    background: url("/images/a_link1.png") no-repeat scroll 0 0;
    display: inline-block;
    height: 34px;
    width: 112px;
}
.lottery_list li .img_store {
    display: inline;
    float: right;
    margin: 14px 0 0;
    width: 151px;
}
.lottery_list li .img_store img {
    display: block;
    height: 100px;
    margin: 1px 0 0 2px;
    width: 130px;
	border:0;
}


</style>
</head>
<script language="JavaScript">

if(self==top){
	//top.location='/index.php';
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

$(window.parent.document).find("#mainFrame").height(680);

function browserCompatible(){
    if($.ua().isIe7){
        $(".lottery_main").css('margin', '0px');
        $(".lottery_main").css('width', '800px');
    }
}
</script>
<body style="background-color:transparent;">

<!--内容开始-->
<div class="block" style="padding:0px 0px;">

<div class="bannerimg" style="margin: 0 auto;width:1000px">
    <img width="1000" height="100" border="0" src="/images/title_welcome.jpg">
</div>
<div class="inner_main"> 
  <!--彩票列表-->
  <div class="lottery_list">
    <ul class="clearfix">
      <li>
        <div class="text_store">
          <span class="s1">香港六合彩</span>
          <span class="s2"><a class="a_link1" onclick="click_url('/member/lt/')" href="javascript:void(0);"></a></span>
        </div>
        <div class="img_store"> <a onclick="click_url('/member/lt/')" href="javascript:void(0);"><img width="134" height="102" src="/images/lhc.png"></a> </div>
      </li>
      <li>
        <div class="text_store">
          <span class="s1">重庆时时彩</span>
          <span class="s2"><a class="a_link1" href="Cqssc.php" target="mainFrame"></a></span>
        </div>
        <div class="img_store"> <a href="Cqssc.php" target="mainFrame"><img width="134" height="102" src="/images/ssc.png"></a> </div>
      </li>
      <li>
        <div class="text_store">
          <span class="s1">北京PK拾</span>
          <span class="s2"><a class="a_link1" href="pk10.php" target="mainFrame"></a></span>
        </div>
        <div class="img_store"> <a href="pk10.php" target="mainFrame"><img width="134" height="102" src="/images/pk10.png"></a> </div>
      </li>
      <li>
        <div class="text_store">
          <span class="s1">广东快乐十分</span>
          <span class="s2"><a class="a_link1" href="gdsf.php" target="mainFrame"></a></span>
        </div>
        <div class="img_store"> <a href="gdsf.php" target="mainFrame"><img width="134" height="102" src="/images/KL10.png"></a> </div>
      </li>
      <li>
        <div class="text_store">
          <span class="s1">重庆快乐十分</span>
          <span class="s2"><a class="a_link1" href="cqsf.php" target="mainFrame"></a></span>
        </div>
        <div class="img_store"> <a href="cqsf.php" target="mainFrame"><img width="134" height="102" src="/images/KL10.png"></a> </div>
      </li>
	  <li>
        <div class="text_store">
          <span class="s1">福彩3D</span>
          <span class="s2"><a class="a_link1" href="3d.php"></a></span>
        </div>
        <div class="img_store"> <a href="3d.php"><img width="134" height="102" src="/images/3D.png"></a> </div>
      </li>
	  <li>
        <div class="text_store">
          <span class="s1">排列三</span>
          <span class="s2"><a class="a_link1" href="pl3.php" target="mainFrame"></a></span>
        </div>
        <div class="img_store"> <a href="pl3.php" target="mainFrame"><img width="134" height="102" src="/images/pl3.png"></a> </div>
      </li>
	  <li>
        <div class="text_store">
          <span class="s1">上海时时乐</span>
          <span class="s2"><a class="a_link1" href="shssl.php" target="mainFrame"></a></span>
        </div>
        <div class="img_store"> <a href="shssl.php" target="mainFrame"><img width="134" height="102" src="/images/shssl.png"></a> </div>
      </li>
	  <li>
        <div class="text_store">
          <span class="s1">北京快乐8</span>
          <span class="s2"><a class="a_link1" href="kl8.php" target="mainFrame"></a></span>
        </div>
        <div class="img_store"> <a href="kl8.php" target="mainFrame"><img width="134" height="102" src="/images/kl8.png"></a> </div>
      </li>
	  <li>
        <div class="text_store">
          <span class="s1">天津时时彩</span>
          <span class="s2"><a class="a_link1" href="tjssc.php" target="mainFrame"></a></span>
        </div>
        <div class="img_store"> <a href="tjssc.php" target="mainFrame"><img width="134" height="102" src="/images/tjssc.png"></a> </div>
      </li>
	  <li>
        <div class="text_store">
          <span class="s1">广东11选5</span>
          <span class="s2"><a class="a_link1" href="gd11.php" target="mainFrame"></a></span>
        </div>
        <div class="img_store"> <a href="gd11.php" target="mainFrame"><img width="134" height="102" src="/images/11x5.png"></a> </div>
      </li>
    </ul>
  </div>
  <!--彩票列表 end--> 
</div>

<div class="lottery_clear"></div>

</div>

</body>
</html>