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
		var $ = function(Id){
            return document.getElementById(Id);
        }
    
       
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
if (document.form1.MOAmount.value == "") {
			alert("请输入存款金额！")
			document.form1.MOAmount.focus();
			return false;
}
if (document.form1.MOAmount.value < <?=$rows_pay['money_Lowest']?>) {
			alert("最低冲值<?=$rows_pay['money_Lowest']?>元！")
			document.form1.MOAmount.focus();
			return false;
}
}
-->
</script>
<script language="JavaScript">
<!--
function url(r){
    window.open(r,"mainFrame");  
}
-->
</script>

    <script type="text/javascript">
        function view_cunkuan(){
            f_com.MChgPager({method: 'chakan_cunkuan'});
        }
    </script>
</HEAD>
<body id="zhuce_body">
<div class="body2">
    <div style="margin-top:10px;margin:10px 0 10px 0;"><span class="STYLE1"><strong>在线冲值</strong></span>>&nbsp;&nbsp;&nbsp;<a class="len" onclick="view_cunkuan()" href="javascript:void(0);" style="color:#00F;text-decoration: underline;">冲值记录查看</a></div>

<form id="form1" name="form1" action="post.php?payid=<?=$payid?>" method="post" onsubmit="return VerifyData();" target="_blank">
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
                        <td align="left">&nbsp;&nbsp;&nbsp;<input name="MOAmount" type="text" id="MOAmount" style="border:1px solid #CCCCCC;height:18px;line-height:20px; width:118px;" onkeyup="clearNoNum(this);" size="15"/>&nbsp;&nbsp;最少冲值<?=$rows_pay['money_Lowest']?>元</td>
                    </tr>
					<tr>
                            <td height="30" align="right">选择银行:</td>
                            <td align="elft">
                            	<input type="radio" name="bank_name" value="3002" /><img src="img/bank_3.gif" alt="工商银行" width="130" height="52" align="middle" />&nbsp;
                            	<input type="radio" name="bank_name" value="3003" /><img src="img/bank_2.gif" alt="建设银行" width="130" height="52" align="middle" />&nbsp;
                            	<input type="radio" name="bank_name" value="3005" /><img src="img/bank_4.gif" alt="农业银行" width="130" height="52" align="middle" />&nbsp;
								<input type="radio" name="bank_name" value="3001" /><img src="img/bank_5.gif" alt="招商银行" width="130" height="52" align="middle" />&nbsp;<br />
                            	<input type="radio" name="bank_name" value="3004" /><img src="img/shpf.png" alt="浦发银行" width="130" height="52" align="middle" />&nbsp;
                            	<input type="radio" name="bank_name" value="3006" /><img src="img/bank_11.gif" alt="民生银行" width="130" height="52" align="middle" />&nbsp;
                            	<input type="radio" name="bank_name" value="3020" /><img src="img/bank_12_02.gif" alt="交通银行" width="130" height="52" align="middle" />&nbsp;
                            	<input type="radio" name="bank_name" value="3009" /><img src="img/bank_8.gif" alt="兴业银行" width="130" height="52" align="middle" />&nbsp;<br />
                            	<input type="radio" name="bank_name" value="3022" /><img src="img/bank_7.gif" alt="光大银行" width="130" height="52" align="middle" />&nbsp;
                            	<input type="radio" name="bank_name" value="3026" /><img src="img/bank_1.gif" alt="中国银行" width="130" height="52" align="middle" />&nbsp;
                            	<input type="radio" name="bank_name" value="3035" /><img src="img/pab.png" alt="平安银行" width="130" height="52" align="middle" />&nbsp;
                            	<input type="radio" name="bank_name" value="3032" /><img src="img/989.jpg" alt="北京银行" width="130" height="52" align="middle" />&nbsp;<br />
                            	<input type="radio" name="bank_name" value="3036" /><img src="img/bank_6.gif" alt="广发银行" width="130" height="52" align="middle" />&nbsp;
                            	<input type="radio" name="bank_name" value="3038" /><img src="img/bank_12_09.gif" alt="中国邮政" width="130" height="52" align="middle" />&nbsp;
                            	<input type="radio" name="bank_name" value="3039" /><img src="img/bank_12_01.gif" alt="中信银行" width="130" height="52" align="middle" />&nbsp;
                            	<input type="radio" name="bank_name" value="3037" /><img src="img/976.jpg" alt="上海农商" width="130" height="52" align="middle" />&nbsp;<br />
                            	<input type="radio" name="bank_name" value="3050" /><img src="img/bank_10.gif" alt="华夏银行" width="130" height="52" align="middle" />&nbsp;
                            	<input type="radio" name="bank_name" value="3059" /><img src="img/shyh.png" alt="上海银行" width="130" height="52" align="middle" />&nbsp;
                            	<input type="radio" name="bank_name" value="3060" /><img src="img/bjnc.png" alt="北京农商" width="130" height="52" align="middle" />&nbsp;
                            	</td>
                        </tr>
                    <tr><td height="35" align="right">&nbsp;</td>
					<td height="40" align="left" valign="middle">
                      &nbsp;&nbsp; <input name="SubTran" class="anniu_02" id="SubTran"  type="submit" value="马上冲值" />					</td>
					</tr>
                </table>
                <div style="display:none">
    <br>

	<br>消费者姓名：<input Type="text" Name="S_Name" value="<?=$username;?>">



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
</BODY>
</HTML>
