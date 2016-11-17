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
$username=$_GET['username'];
$uid=intval($_GET['uid']);
$payid=intval($_GET["payid"]);
$sql="select user_id,user_name,tel,money from user_list where user_name='$username' and user_id='$uid'";
$query	=	$mysqli->query($sql);
$cou	=	$query->num_rows;
if($cou<=0){
	echo "<script>alert(\"请登录后再进行存款和提款操作\");location.href='/cl/reg.php';</script>";
	exit();
}
$rows	=	$query->fetch_array();

$sql_pay="select * from pay_set where id=".$payid;
$query_pay	=	$mysqli->query($sql_pay);
$cou_pay	=	$query_pay->num_rows;
if($cou_pay<=0){
	echo "<script>alert(\"非常抱歉，在线支付暂时无法使用！\");location.href='http://".$conf_www."/';</script>";
	exit();
}

$rows_pay	=	$query_pay->fetch_array();

//商户订单号
$BillNo = $username."_".date('YmdHis');

//商户交易日期
$BillDate = date('Ymd');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<title>History</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="/css/css_1.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
	.dv{ line-height:25px;}
	.body2{
		width: 737px;
		height: auto;
		padding: 10px 0 0 12px;
		margin-left:10px;
		margin-right:10px;
		float:left;
		font-size:12px;
        color:#000000;
	}
	.tds {
		line-height:25px;
	}
	.STYLE1 {font-weight: bold}
    .STYLE2 {color: #0000FF}
	.STYLE12{ color:#F00}
    </style>
<script language="JAVAScript">
//		var $ = function(Id){
//            return document.getElementById(Id);
//        }
    
       
        //数字验证 过滤非法字符
        function clearNoNum(obj){
	        //先把非数字的都替换掉，除了数字和.
	        obj.value = obj.value.replace(/[^\d.]/g,"");
	        //必须保证第一个为数字而不是.
	        obj.value = obj.value.replace(/^\./g,"");
	        //保证只有出现一个.而没有多个.
	        obj.value = obj.value.replace(/\.{2,}/g,".");
	        //保证.只出现一次，而不能出现两次以上
	        obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
	        if(obj.value != ''){

	        var re=/^\d+\.{0,1}\d{0,2}$/;
                  if(!re.test(obj.value))   
                  {   
			          obj.value = obj.value.substring(0,obj.value.length-1);
			          return false;
                  } 
	        }
        }
<!--
//去掉空格
function check_null(string) { 
var i=string.length;
var j = 0; 
var k = 0; 
var flag = true;
while (k<i){ 
if (string.charAt(k)!= " ") 
j = j+1; 
k = k+1; 
} 
if (j==0){ 
flag = false;
} 
return flag; 
}
function VerifyData() {
if (document.form1.Amount.value == "") {
			alert("请输入存款金额！")
			document.form1.Amount.focus();
			return false;
}
if (document.form1.Amount.value <<?=$rows_pay['money_Lowest']?>) {
			alert("最低冲值<?=$rows_pay['money_Lowest']?>元！")
			document.form1.Amount.focus();
			return false;
}
}
-->
</script>
</HEAD>
<body id="zhuce_body">


<div class="body2">
<div style="margin-top:10px;margin:10px 0 10px 0;"><span class="STYLE1"><strong>在线冲值</strong></span>&nbsp;&nbsp;&nbsp;</div>

<form id="form1" name="form1" action="/php/ips/redirect.php?payid=<?=$payid?>" method="post" onsubmit="return VerifyData();" target="_blank">
    <table width="720" style="border-collapse:collapse;border:1px solid #CCC;" border="0" cellpadding="1" cellspacing="1" >
                    <tr>
                        <td height="30" align="right"> 用户帐号:</td>
                        <td align="left"><span class="STYLE5">
                        &nbsp;&nbsp;&nbsp;<?=$username;?>
                        </span></td>
                    </tr>
                  <tr>
                    <td height="30" align="right"> 手机号码:</td>
                    <td align="left"><span class="STYLE5">&nbsp;&nbsp;&nbsp;<?=$rows['mobile']?></span></td>
                  </tr>
                  <tr>
                    <td height="30" align="right"> 目前额度:</td>
                    <td align="left"><span class="STYLE5">&nbsp;&nbsp;&nbsp;<?=$rows['money']?></span></td>
                  </tr>                    
                    <tr>
                        <td height="30" align="right"><span class="STYLE12">*</span> 充值金额:</td>
                        <td align="left">&nbsp;&nbsp;&nbsp;<input name="Amount" type="text" id="Amount" style="border:1px solid #CCCCCC;height:18px;line-height:20px; width:118px;" onkeyup="clearNoNum(this);" size="15"/>&nbsp;&nbsp;最少冲值<?=$rows_pay['money_Lowest']?>元</td>
                    </tr>
                    <tr><td height="35" align="right">&nbsp;</td>
					<td height="40" align="left" valign="middle">
                      &nbsp;&nbsp; <input name="SubTran" class="anniu_02" id="SubTran"  type="submit" value="马上冲值" />					</td>
					</tr>
                </table>
                <div style="display:none">
    <br>
    商 家 号：<input Type="text" Name="Mer_code" value="">	
	 <br><input Type="text" Name="test" value="0">
	<br>商家证书：<input Type="text" Name="Mer_key" value="">
	<br>定单号：<input Type="text" name="Billno" value="<?php echo $BillNo; ?>">
	<br>日期：<input Type="text" Name="Date" value="<?php echo $BillDate; ?>">
	<br>支付币种：<input Type="text" Name="Currency_Type" value="RMB">
	<br>支付方式：<input Type="text" Name="Gateway_Type" value="01">
	<br>语言：<input Type="text" Name="Lang" value="GB">
	<br>支付失败返回URL：<input Type="text" Name="FailUrl" value="">	
	<br>商户附加数据包：<input Type="text" Name="Attach" value="<?=$username?>"> 
	<br>订单支付加密方式：<input Type="text" Name="OrderEncodeType" value="5">
	<br>交易返回加密方式：<input Type="text" Name="RetEncodeType" value="17">
	<br>是否提供Server返回方式：<input Type="text" Name="Rettype" value="1">	
	<br>Server to Server返回页面：<input Type="text" Name="ServerUrl" value="">	
	<br>
</div>              
              </form>
<table width="96%" border="0" cellpadding="0" cellspacing="5">
                <tr >
                  <td align="left" style="padding-top:10px;"><strong class="STYLE1">在线冲值说明：</strong></td>
                </tr>
                <tr>

                  <td align="left">
                  <span class="font-hblack"><span >
                  <div style=" line-height:22px; font-size:12px;">
                  (1).请按表格填写准确的在线冲值信息,确认提交后会进入选择的银行进行在线付款!                  </div>
                  <div style=" line-height:22px;font-size:12px;">
                  (2).交易成功后请点击返回支付网站可以查看您的订单信息!                  </div>
                  <div style=" line-height:22px;font-size:12px;">
                  (3).如有任何疑问,您可以联系 在线客服为您提供365天×24小时不间断的友善和专业客户咨询服务!                 </div>
                  </span>                   </span>                  </td>
   
                </tr>
              </table>              
</div>       
<div style="clear:both;"></div>

</BODY>
</HTML>
