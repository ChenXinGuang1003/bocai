<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");

$orderid=$_REQUEST["orderid"];
$opstate=$_REQUEST["opstate"];
if($opstate=="0")
{
	$T="成功";
}else
{
	$T="失败";
}
?>

 
 
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>支付</title>
<meta name="description" content="">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<style type="text/css"> 
body{
	font-size:12px;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.Sy1 {color: #2179DD}
.Sy2 {
	color: #FFFFFF;
	font-size: 16px;
	font-weight: bold;
}
</style>
</head>
<body>
<p><br />
</p>
<table width="50%" border="0" align="center" cellpadding="0" cellspacing="0" style="border:solid 1px #107929">
		  <tr>
		    <td height="35">
			<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1">
		
		  <tr>
		  	<td height="30" colspan="2" bgcolor="#6BBE18"><span style="color: #FFFFFF">在线支付结果</span></td>
		  </tr>
		  <tr>
		  	<td colspan="2" bgcolor="#CEE7BD"></td>
		  </tr>
		  <tr>
		  	<td align="left" width="30%"class="Sy1">&nbsp;&nbsp;商户订单号</td>
		  	<td align="left">&nbsp;&nbsp;<?php echo $orderid;?></td>
          </tr>
		  <tr>
		  	<td align="left">&nbsp;&nbsp;支付结果</td>
            <td align="left">&nbsp;&nbsp;<?php echo $T;?></td>
		  </tr>
		  </table>
			
	  </td>
        </tr>
</table>
</body>
</html>
