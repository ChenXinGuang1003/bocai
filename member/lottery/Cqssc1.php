<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="../../js/jquery-1.7.1.js"></script>
        <script language="JavaScript">


        $(window.parent.document).find("#mainFrame").height(2000);


        </script>
</head>
<body>
<style>
*{margin:0;padding:0;}
#img{width:100%;height:309px;background:url('sjtz.jpg')center;margin-top:-18px;}
#img1{width:100%;height:331px;
background:url('about_top.png')no-repeat center;margin-top:-109px;z-index: 9999;position:relative;}
#img2{width: 100%;height: 90px;background: url('about_bg01.png')no-repeat center;margin-top:-180px}
#bgs{background: url(about_bg02.png)center repeat-y ;min-height:1055px;margin: auto;}
.bgs1{    width: 1130px;
    background: url(about_bg021.png)center repeat-y;
    min-height: 38px;
    margin: -37px auto;
}

</style>


<div id="img"></div>
<div id="img1"><marquee onclick="HotNewsHistory();" style="cursor:pointer;position:absolute;left:360px;top:137px;color:white;font-size:13px" scrollamount="2" width='620px' height='30px'><?=$msg;?></marquee></div>
<div id="img2"></div>

<div id="bgs">
   <div style="height:1531px;width:1039px;background:url('mobile1.jpg')no-repeat;margin:-13px auto"></div>
   </div>
   <div class="bgs1"></div>
</body>
</html>