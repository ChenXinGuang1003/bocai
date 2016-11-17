<?php
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>皇冠国际-体育投注，娱乐场，扑克牌，游戏</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
		<script src="../js/jquery-1.10.1.min.js" type="text/javascript"></script>
		<script>
			var ClientW = $(window).width();
			$('html').css('fontSize',ClientW/3+'px');
		</script>
		<link href="css/register.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<article class="mainBox">
			<header id="headerBox">
				<a href="../index.php"></a>
				<img class="logo" src="../img/logo.png" />
			</header>
			<section id="user">
					<form target="_self" action="../../../hg66g/wwwroot/app/member/Regster/save.php" method="post" name="myFORM" id="myFORM">
						<div class="formSection">
							<h2>账号注册</h2>
							<p>
								<label>介绍人：</label>
								<input type="text" name="agent_name" maxlength="20"/>
							</p>
							<p>
								<label><mark>*</mark>账号：</label>
								<input type="text" name="username" placeholder="请输入4~12字母加英文字元" required />
							</p>
							<p>
								<label><mark>*</mark>密码：</label>
								<input type="password" name="password" placeholder="请输入6~12位字母或英文字元" required />
							</p>
							<p>
								<label><mark>*</mark>确认密码：</label>
								<input type="password" name="passwd" placeholder="请与您填写的密码保持一致" required />
							</p>
						</div>
						<div class="formSection">
							<h2>会员资料</h2>
							<p>
								<label><mark>*</mark>真实姓名：</label>
								<input type="text" name="real_name" placeholder="必须与您的银行帐户名称相同，否则不能出款!" required />
							</p>
							<p>
								<label><mark>*</mark>手机：</label>
								<input type="tel" name="tel" placeholder="请输入您的手机号" required />
							</p>
							<p>
								<label><mark>*</mark>取款密码：</label>
								<div class="passWord">
									<input type="text" name="pwd1"  required list="valList" />
									<datalist id="valList">
							        	<option value="0">0</option>
							            <option value="1">1</option>
							            <option value="2">2</option>
							        	<option value="3">3</option>
							            <option value="4">4</option>
							            <option value="5">5</option>
							        	<option value="6">6</option>
							            <option value="7">7</option>
							            <option value="8">8</option>
							            <option value="9">9</option>
						        	</datalist>

						        	<input type="text" name="pwd2"  required list="valList1" />
									<datalist id="valList1">
							        	<option value="0">0</option>
							            <option value="1">1</option>
							            <option value="2">2</option>
							        	<option value="3">3</option>
							            <option value="4">4</option>
							            <option value="5">5</option>
							        	<option value="6">6</option>
							            <option value="7">7</option>
							            <option value="8">8</option>
							            <option value="9">9</option>
						        	</datalist>

						        	<input type="text" name="pwd3"  required list="valList2" />
									<datalist id="valList2">
							        	<option value="0">0</option>
							            <option value="1">1</option>
							            <option value="2">2</option>
							        	<option value="3">3</option>
							            <option value="4">4</option>
							            <option value="5">5</option>
							        	<option value="6">6</option>
							            <option value="7">7</option>
							            <option value="8">8</option>
							            <option value="9">9</option>
						        	</datalist>

						        	<input type="text" name="pwd4"  required list="valList3" />
									<datalist id="valList3">
							        	<option value="0">0</option>
							            <option value="1">1</option>
							            <option value="2">2</option>
							        	<option value="3">3</option>
							            <option value="4">4</option>
							            <option value="5">5</option>
							        	<option value="6">6</option>
							            <option value="7">7</option>
							            <option value="8">8</option>
							            <option value="9">9</option>
						        	</datalist>
								</div>
							</p>
							<p>
								<label>QQ：</label>
								<input type="tel" name="qq_num" pattern="\d{5,12}" placeholder="请输入5~12位QQ号码" />
							</p>
						</div>
						<p class="agreement">
							<input name="agree" type="checkbox" required / >
							<label>
								我已阅读并接受
							</label>
						</p>
						<p class="linka"><a href="javascript:;">"开户协议"</a></p>
						<div class="btnform">
							<input name="CANCEL2" type="reset" value="重设" />
							<input name="OK2" type="submit" value="注册" />
						</div>
					</form>
			</section>
		</article>
	</body>
	<script type="text/javascript">
		/*(function(){
			var aImg = $('div.yzm img')
			$('div.yzm input').focus(function(){
				aImg.attr('src','../yzm.php?<?=rand()?>');
			});
		})();*/
	</script>
</html>