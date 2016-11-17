<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/cache/website.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?=$web_site['web_name']?>---线路通畅检查中心</title>
<style>
<!--
body{background:url(bgs.jpg) top no-repeat;}
form{color:#000; font-family:Verdana,;}
form input{color:#000; border:0px; background:none; text-align:center;}
form hr{width:500px;color:#222;height:0px;}
.buttonopen{border:0px; background:url(/images/buttonbg.jpg) no-repeat; margin-left:20px;color:#fff;padding-top:2px;padding-bottom:2px;}
.buttonsubmit{background:url(/images/buttonbg.jpg) no-repeat;color:#fff;height:32px;font-size:13px;}
.hand{cursor:pointer;}
center a{color: #ffff00;}
center a:hover{color: #f00;}
-->
</style>
</head>
<body bottommargin="0" topmargin="0" leftmargin="0">
	<div align="center" style="padding-top:115px;">
	<center>
	<script language="javascript">
	tim=1
	setInterval("tim++",100)
	b=1
	var autourl=new Array()
	autourl[1]='http://<?=$web_site['check_url1']?>';
	autourl[2]='http://<?=$web_site['check_url2']?>';
	autourl[3]='http://<?=$web_site['check_url3']?>';
	autourl[4]='http://<?=$web_site['check_url4']?>';
	autourl[5]='http://<?=$web_site['check_url5']?>';
	autourl[6]='http://<?=$web_site['check_url6']?>';
	autourl[7]='http://<?=$web_site['check_url7']?>';
	autourl[8]='http://<?=$web_site['check_url8']?>';
	</script>
	<script src="timtest.js"></script>
	</center>
	</div>
</body>
</html>