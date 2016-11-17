<?php
include_once('include/address.mem.php');
include_once('include/config.php');
include_once('include/function.php');

//header("Content-type: text/vnd.wap.wml");
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.3//EN" "http://www.wapforum.org/DTD/wml13.dtd">
<wml><head>
<meta http-equiv="Cache-Control" content="max-age=0" />
</head>
	<card title="<?=$web_name?>">
	<onevent type="onenterforward"><refresh><setvar name="Name" value="<?=$_REQUEST['name']?>" /><setvar name="Pwd" value="<?=$_REQUEST['pwd']?>" /><setvar name="Yzm" value="" /></refresh></onevent>
		<p><img src="images/logo.gif" alt="<?=$web_name?>" /><br/>
		用户名:<input name="Name" size="10" maxlength="30" value="<?=$_REQUEST['name']?>" />
		<br/>
		密码为:<input name="Pwd" type="password" size="10" maxlength="32" value="<?=$_REQUEST['pwd']?>" />
		<br/>
		验证码:<input name="Yzm" size="4" maxlength="4" /> <img src="yzm.php?<?=rand()?>" alt="验证码" />
		<br/><a href="index.php?<?=rand()?>" title="刷新">刷新</a> <anchor title="登入">登陆<go href="loginDao.php" method="post"><postfield name="name" value="$(Name)" /><postfield name="pwd" value="$(Pwd)" /><postfield name="yzm" value="$(Yzm)" /></go></anchor></p>
	</card>
</wml>