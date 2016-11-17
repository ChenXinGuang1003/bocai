<html>
	<head>
		<title>注 册</title>
		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
		<style type='text/css'>
			*{padding:0px;margin:0px}
			form{width:600px;margin:60px auto;line-height:35px}
			input[type=submit]{border:none;padding:8px 35px 8px;background:green;color:white;margin:18px 104px 0px;font-size:17px;font-weight:bold}
			p{font-size:13px;color:#999;margin-left:100px}
			input[type=text],input[type=password]{width:300px;height:35px;border:1px solid #666}
		</style>
		<script>
			var ClientW = $(window).width();
			$('html').css('fontSize',ClientW/3+'px');
		</script>
		<script type='text/javascript' src='../js/jquery-1.10.1.min.js'></script>
		<script type='text/javascript'>
			$(function(){
				
			})
		</script>
	</head>
	<body>
	<form method="post" action="../check_reg.php">
		<label><span style='color:red'>*&nbsp;</span>帐&nbsp;&nbsp;&nbsp;&nbsp;号：</label>
		<input type="text" name="user_name">
		<p>帐号：须为4~12个英文或数字</p>
		<label><span style='color:red'>*&nbsp;</span>密&nbsp;&nbsp;&nbsp;&nbsp;码：</label>
		<input type="password" name="user_pass">
		<p>密码规则：须为6~12个英文或数字</p>
		<label><span style='color:red'>*&nbsp;</span>确认密码：</label>
		<input type="password" name="repass">
		<p>密码规则：须为6~12个英文或数字</p>
		<label><span style='color:red'>*&nbsp;</span>真实姓名：</label>
		<input type="text" name="pay_name">
		<p>请填写真实姓名</p>
		<label><span style='color:red'>*&nbsp;</span>手&nbsp;&nbsp;&nbsp;&nbsp;机：</label>
		<input type="text" name="tel">
		<p>请填写手机号</p>
		<input type="submit" value="注 册">
	</form>
	</body>
</html>