<?php
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>会员登入中心</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
		<script src="../js/jquery-1.10.1.min.js" type="text/javascript"></script>
		<script>
			var ClientW = $(window).width();
			$('html').css('fontSize',ClientW/3+'px');
		</script>
		<link href="css/login.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<article class="mainBox">
			<header id="headerBox">
				<a href="../wap.php"></a>
				<img class="logo" src="../img/logo.png" />
			</header>
			<section id="banner"></section>
			<section id="Register">
				<form name="user" id="user" action="../loginDao.php" method="post">
					<div>
						<input name="name" class="username" type="text" required placeholder="用户名" />
					</div>
					<div>
						<input name="pwd" class="password" type="password" required placeholder="登录密码" />
					</div>
					<div class="yzm">
						<input name="yzm" type="tel" required pattern="\d{4}" placeholder="点击获取验证码" />
						<img src="../yzm.php?<?=rand()?>" />
					</div>
					<div>
						<input id="submit" type="submit" value="登录" />
					</div>
					<div>
						<a href="../wap.php?<?=rand()?>">忘记密码</a>
						<a href="../register/register.php">注册登录</a>
					</div>
				</form>
			</section>
		</article>
			<footer id="footer">
				<a href="/register/register.php">免费开户</a>
				<!--<a href="/newag2/ed5.php">额度转换</a> -->
				<a href="http://www.yl00853.com/index1.php">电脑版</a> 
				<a href="/login/login.php">登录</a>
			</footer>
	</body>
	<script type="text/javascript">
		(function(){
			var aImg = $('div.yzm img')
			$('div.yzm input').focus(function(){
				aImg.attr('src','../yzm.php?<?=rand()?>');
			});
		})();
	</script>
</html>