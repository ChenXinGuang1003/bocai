<?php
session_start();
if (isset($_POST['user_id'])){
	$user_id = trim($_POST['user_id']);
	$key = trim($_POST['key']);
	$_SESSION['bank_interface_u_k'] = $user_id.'|'.$key;
	
	$xml = simplexml_load_file('userid_key.xml');
	$exist_id = false;
	foreach($xml->user as $u){
		if ($u->userid == $user_id) { 
			$u->key = $key;
			$exist_id = true;			
			break;
		}
	}
	if (!$exist_id){
		$user = $xml->addChild('user');
		$user->addChild('userid',$user_id);
		$user->addChild('key',$key);
	}
	$newXML = $xml->asXML();
	$fp = fopen('userid_key.xml', "w");
	fwrite($fp, $newXML);
	fclose($fp);
}
include 'proterties.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>快捷宝支付产品通用支付接口演示</title>
</head>
	<body>
		<table width="50%"border="0" align="center" cellpadding="0" cellspacing="0" style="border:solid 1px #107929">
		  <tr>
		    <td>
		    <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1">
			  <tr>
	                <td width="30%" align="left" bgcolor="#CEE7BD">快捷宝支付产品通用支付接口演示：</td>
			  </tr>
			  <tr>
		            <td height="30" align="left" bgcolor="#FFFFEF">&nbsp;&nbsp;<a href="pay.php">产品通用支付接口</a></td>
		      </tr>
			  <tr>
		            <td height="30" align="left" bgcolor="#FFFFEF">&nbsp;&nbsp;<a href="queryOrd.php">查询订单</a></td>
		      </tr>
			  <tr>
		            <td height="30" align="left" bgcolor="#FFFFEF">&nbsp;&nbsp;<a href="refundOrd.php">退款操作</a></td>
		      </tr>
           </table>
         </td>
        </tr>
      </table>
	  <form method="post">
		  <fieldset style="width:960px;margin:0 auto">
			  <legend>设置商户id和密钥</legend>
				  商户id：<input type="text" name="user_id" value="<?php echo $p1_MerId;?>" size="10"/>&nbsp;&nbsp;
				  密钥：<input type="text" name="key" value="<?php echo $key;?>" size="65"/>&nbsp;&nbsp;
				 <input type="submit" value="提交"/>
		  </fieldset>
	  </form>
	</body>
</html>