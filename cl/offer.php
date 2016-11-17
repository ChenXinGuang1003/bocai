<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <link href="css/bcss.css" rel="stylesheet" type="text/css" />
    <script language="javascript" src="/js/jquery-1.7.1.js"></script>
    <script language="javascript" src="images/swfobject_source.js"></script>
    <script src="/cl/js/common.js"></script>
    <script language="javascript">
		function i(ur,w,h){
		document.write('<object id="prize" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="'+w+'" height="'+h+'"> ');
		document.write('<param name="movie" value="' + ur + '">');
		document.write('<param name="quality" value="high"> ');
		document.write('<param name="wmode" value="transparent"> ');
		document.write('<param name="menu" value="false"> ');
		document.write('<embed src="' + ur + '" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="'+w+'" height="'+h+'" wmode="transparent"></embed> ');
		document.write('</object> ');
		} 
    </script>
    <script language="JavaScript">

        if(self==top){
            top.location='/';
        }
        function menu_click(id){
            parent.topFrame.document.getElementById("textGlitter"+id).click();
        }
        function page_click(id){
            window.parent.document.getElementById(id).click();
        }
        function mover(o){
            o.style.backgroundPosition='0 bottom';
        }

        function mout(o){
            o.style.backgroundPosition='0 top';
        }
		function setHeight()
        {
			$(window.parent.document).find("#mainFrame").height($("#re_0").height().toString());
        }
        /*用window.onload调用setHeight()*/
        window.onload=setHeight;//不要括号
        

    </script>
<style type="text/css">
#MemberExclusive_area {
    margin: 0px auto;
	width: 100%;
    overflow:hidden;
    padding: 0px;
}
.main_box{
    width:1000px;
    margin:0 auto;
    overflow:hidden;
}
.offer_1{
    width:940px;
    margin:0 auto;
    overflow:hidden;
}
.offer_1 h1 {
    background-image: url("/images/contenth1bj.jpg");
    border: 1px none;
    color: #FFFFFF;
    font-size: 14px;
    height: 35px;
    line-height: 35px;
    padding-left: 10px;
	width:744px;
	float:right;
}
.eventtext {
	display: none;
	width:100%;
	margin:0 auto;
	text-align:center;
}

.eventtext h2 {
    border-bottom: 1px solid #930211;
    color: #930211;
    font-size: 16px;
    padding-bottom: 5px;
}
.eventtext p {
    font-size: 12px;
    line-height: 22px;
    padding-top: 5px;
    text-align: justify;
}
.eventtext table {
    background: none repeat scroll 0 0 #5E5E5E;
    border-collapse: collapse;
    border-left: 1px solid #888888;
    border-spacing: 0;
    border-top: 1px solid #888888;
    text-align: center;
    width: 490px;
}
.eventtext th {
    background: none repeat scroll 0 0 #3F2323;
}
.eventtext th,.eventtext td {
    border-bottom: 1px solid #888888;
    border-right: 1px solid #888888;
    padding: 5px 15px;
	color:#fff;
}
.memExclusive_1 {
  background-image: url("/images/offer/b1.jpg");
    background-position: center top;
    cursor: pointer;
    padding-bottom: 20px;
    width: 100%;
	text-align: center;
    background-repeat: no-repeat;
	margin:0 auto;
    overflow:hidden;
	}
.memExclusive_1 a {
    background-image: url("/images/offer/a1.jpg");
    background-position: center top;
    cursor: pointer;
    float: left; height:76px;
    padding-bottom: 10px;
    width:100%;
text-align: center;
    background-repeat: no-repeat;
}

.memExclusive_2 {
    background-image: url("/images/offer/b2.jpg");
    background-position: center top;
    cursor: pointer;
    padding-bottom: 20px;
    width:100%;
text-align: center;
    background-repeat: no-repeat;
	margin:0 auto;
    overflow:hidden;
}
.memExclusive_2 a {
    background-image: url("/images/offer/a2.jpg");
    background-position: center top;
    cursor: pointer;
    float: left; height:76px;
    padding-bottom: 10px;
    width:100%;
text-align: center;
    background-repeat: no-repeat;
}

.memExclusive_3 {
    background-image: url("/images/offer/b3.jpg");
    background-position: center top;
    cursor: pointer;
    padding-bottom: 20px;
    width: 100%;
text-align: center;
    background-repeat: no-repeat;
	margin:0 auto;
     overflow:hidden;
}
.memExclusive_3 a {
    background-image: url("/images/offer/a3.jpg");
    background-position: center top;
    cursor: pointer;
    float: left; height:76px;
    padding-bottom: 10px;
   width:100%;
text-align: center;
    background-repeat: no-repeat;
}

.memExclusive_4 {
    background-image: url("/images/offer/b4.jpg");
    background-position: center top;
    cursor: pointer;
    padding-bottom: 20px;
    width:100%;
text-align: center;
    background-repeat: no-repeat;
	margin:0 auto;
     overflow:hidden;
}
.memExclusive_4 a {
    background-image: url("/images/offer/a4.jpg");
    background-position: center top;
    cursor: pointer;
    float: left; height:76px;
    padding-bottom: 10px;
    width:100%;
text-align: center;
    background-repeat: no-repeat;
}
.memExclusive_5 {
    background-image: url("/images/offer/b5.jpg");
   background-position: center top;
    cursor: pointer;
    padding-bottom: 20px;
    width:100%;
text-align: center;
    background-repeat: no-repeat;
    margin:0 auto;
     overflow:hidden;
}
.memExclusive_5 a {
    background-image: url("/images/offer/a5.jpg");
    background-position: center top;
    cursor: pointer;
    float: left; height:76px;
    padding-bottom: 10px;
   width:100%;
text-align: center;
    background-repeat: no-repeat;
}
.memExclusive_6 {
    background-image: url("/images/offer/b6.jpg");
   background-position: center top;
    cursor: pointer;
    padding-bottom: 20px;
    width:100%;
text-align: center;
    background-repeat: no-repeat;
    margin:0 auto;
     overflow:hidden;
}
.memExclusive_6 a {
    background-image: url("/images/offer/a6.jpg");
    background-position: center top;
    cursor: pointer;
    float: left; height:76px;
    padding-bottom: 10px;
    width:100%;
text-align: center;
    background-repeat: no-repeat;
}
.about_bg{ width:100%; background:url(/imgs/about_bg.png) repeat-x; }
#re_0 .main_bg{ width:100%; height:287px; background:url(/imgs/about_yh.png) repeat-x center -20px; }
.about_main_w{ width:1080px; margin:0 auto; position:relative; padding-top:65px; }
.about_main_w .about_top{ width:1080px; height:240px; background:url(/imgs/about_top.png) no-repeat center top; position:absolute; top:-100px; }
.about_main_w .about_main{ width:1080px; background:url(/imgs/about_bg02.png) repeat-y center top; }
</style>
</head>
<body id="re_0">
    <div class="main_bg"></div>

    <div class="about_bg">
            <div class="about_main_w">
                <div class="about_top">
                    <div style="clear: both;width:620px; height:30px; position:absolute; left:265px;top:130px; overflow:hidden;"><div style="padding: 10px auto; height: 25px; float: left; width: 100px; text-align: center; color: yellow; line-height: 25px;vertical-align: middle;"><marquee onclick="HotNewsHistory();" style="cursor:pointer;color:white" scrollamount="2" width='620px' height='30px' ><?=$msg;?></marquee></div><div style="float: left; width: 900px; height: 25px; line-height: 25px;vertical-align: middle;color:#fff;"></div></div>
                </div>
                <div class="about_main">
                    <div style="width:100%;height:89px;background:url(/imgs/about_bg01.png) no-repeat center top">
                        
                    </div>
                    <div style="height:8px;"></div>
                    <div style="width:1000px;margin:0 auto;">
                        <div style="padding: 0 10px 0 3px;width: 1000px;">

                            <div class="main_box">
                            <!-- <div class="sidebar">
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
                               </div> -->
                                            
                                            
                            <div class="offer_1"><!-- 
                            <h1>优惠活动</h1> -->
                            <div id="MemberExclusive_area">
                            <div id="MemberExclusive">
                                <div class="memExclusive_1"><a href="#"></a></div>
                                <div class="eventtext">
                                    <img src="/images/offer/1.jpg" border="0">
                                </div>
                            </div><div id="MemberExclusive">
                                <div class="memExclusive_2"><a href="#"></a></div>
                                <div class="eventtext">
                                    <img src="/images/offer/2.jpg" border="0">
                                </div>
                            </div>
                            <div id="MemberExclusive">
                                <div class="memExclusive_3"><a href="#"></a></div>
                                <div class="eventtext">
                                    <img src="/images/offer/3.jpg" border="0">
                                </div>
                            </div>
                            <div id="MemberExclusive">
                                <div class="memExclusive_4"><a href="#"></a></div>
                                <div class="eventtext">
                                    <img src="/images/offer/4.jpg" border="0">
                                </div>
                            </div>
                                    <div class="clear"></div>     

                            </div>
                                    <div class="clear"></div>     
                                 
                            <script language="javascript">
                            //一般文案用

                            //優惠活動使用
                                $.each($('#MemberExclusive_area > div'),function(i , o){
                                    $(this).find('a').click(function(e){
                                        e.preventDefault();
                                        hideExclusive(i);
                                        $(this).parent().next().slideToggle(200);
                                        setTimeout(setHeight,651);
                                    });
                                });
                                function hideExclusive(i){
                                    $.each($('#MemberExclusive_area .eventtext'),function(k){
                                          if(i != k && $(this).is(':visible')){
                                             $(this).slideUp(200);
                                             setTimeout(setHeight,651);
                                            }
                                    });
                                }
                                //按鈕特效
                                $(function(){
                                    $('div[class^=memExclusive] > a').css("opacity","0").hover(
                                        function(){
                                           $(this).stop().animate({'opacity': 1}, 650);
                                        }, function(){
                                           $(this).stop().animate({'opacity': 0}, 650);
                                        }
                                    );
                                }); 
                            </script>

                            </div>
                        </div>

                        </div>
                    </div>
                    <div style="clear:both;height:0;"></div>
                    <div style="width:1080px;height:38px;margin:0 auto;background:url(/imgs/about_bg03.png) no-repeat center top;"></div>
                </div>
            </div>
        </div>

    

<script language="javascript" src="/js/mouse.js"></script>

</body>
</html>
