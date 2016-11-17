<?
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
session_start();
include_once("../include/config.php");
include_once("../include/mysqli.php");
$username=$_SESSION['username'];
$uid=intval($_SESSION['uid']);
$sql="select uid,username,mobile,money from k_user where username='$username' and uid='$uid'";
$query	=	$mysqli->query($sql);
$cou	=	$query->num_rows;
if($cou<=0){
	echo "<script>alert(\"请登录后再进行存款和提款操作\");location.href='http://".$conf_www."/zhuce.php';</script>";
	exit();
}
$rows	=	$query->fetch_array();


$pd_FrpId=isset($_REQUEST["pd_FrpId"])?$_REQUEST["pd_FrpId"]:"";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<title>History</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/css_1.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
	.dv{ line-height:25px;}
	.body2{
		width: 620px;
		height: auto;
		padding: 10px 0 0 12px;
		margin-left:10px;
		margin-right:10px;
		float:left;
		font-size:12px;
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
if (document.form1.p3_Amt.value == "") {
			alert("请输入存款金额！")
			document.form1.p3_Amt.focus();
			return false;
}
if (document.form1.p3_Amt.value !="") {
		  if(document.form1.p3_Amt.value <1 )
		  {
			alert("充值不能小于1元！")
			document.form1.p3_Amt.focus();
			return false;
		  }
}
}
function url(s){
location.href="<?=substr($_SERVER['HTTP_REFERER'],0,strlen($_SERVER['HTTP_REFERER'])-12) ?>/"+s;
}
-->
</script>
</HEAD>
<body id="zhuce_body" style=" background:#ffffff;color:#000000">
<div class="body2" style="padding:20px 0 0 15px; width:820px; background:#ffffff">
<div style="margin-top:10px;margin:10px 0 10px 0;"><span class="STYLE1"><strong>在线充值</strong></span>&nbsp;&nbsp;&nbsp;<!--<a class="len" onclick="url('user/cha_huikuan.php?s_time=<?=date("Y-m-d",time()-1123200)?>&e_time=<?=date("Y-m-d",time())?>')" style="color:#00F;text-decoration: underline;">冲值记录查看</a>--></div>

<form id="form1" name="form1" action="req.php" method="post" onsubmit="return VerifyData();" target="_blank">
    <table width="96%" style="border-collapse:collapse;border:1px solid #000000;" border="0" cellpadding="1" cellspacing="1" >
                    <tr>
                        <td height="30" align="right"> 用户帐号:</td>
                        <td align="left"><span class="STYLE5">
                        &nbsp;&nbsp;&nbsp;<?=$username?>
                        </span></td>
                    </tr>
                  <tr>
                    <td height="30" align="right" width="100"> 手机号码:</td>
                    <td align="left"><span class="STYLE5">&nbsp;&nbsp;&nbsp;<?=$rows['mobile']?></span></td>
                  </tr>
                  <tr>
                    <td height="30" align="right"> 目前额度:</td>
                    <td align="left"><span class="STYLE5">&nbsp;&nbsp;&nbsp;<?=$rows['money']?></span></td>
                  </tr>                    
                    <tr>
                        <td height="30" align="right"><span class="STYLE12">*</span> 充值金额:</td>
                        <td align="left">&nbsp;&nbsp;&nbsp;<input name="p3_Amt" type="text" id="p3_Amt" style="border:1px solid #CCCCCC;height:18px;line-height:20px; width:118px;" onkeyup="clearNoNum(this);" size="15"/><span style="color:#FF0000">&nbsp;&nbsp;&nbsp;*&nbsp;充值金额不能底于1元</span></td>
                    </tr>
                    <tr>
                    <td align="right" height="60"><span class="STYLE12">*</span> 选择银行:</td>
                    <td align="left"><div style="padding-left:20px;">
					 

					 
					 <table width="100%" border="0" cellpadding="0" cellspacing="0" style="left:0; line-height:40px;">
			<tr class="b_rig">
                         <td><input name="pd_FrpId" type="radio" checked="checked" value="alipay">&nbsp;<img src="images/bank/ALIPAY.gif" /></td>
                         <td><input name="pd_FrpId" type="radio" checked="checked" value="weixin">&nbsp;<img src="images/bank/WEIXIN.gif" /></td>
			<td></td>
                       <tr class="b_rig">
                         <td><input name="pd_FrpId" type="radio" value="ABC-NET" checked>&nbsp;<img src="images/bank/nongye.gif" /></td>
                         <td><input name="pd_FrpId" type="radio" value="ICBC-NET">&nbsp;<img src="images/bank/gongshang.gif" /></td>
                         <td><input name="pd_FrpId" type="radio" value="CCB-NET">&nbsp;<img src="images/bank/jianshe.gif" /></td>
                         </tr>
                         <tr>
                         <td><input name="pd_FrpId" type="radio" value="BOCO-NET"/>&nbsp;<img src="images/bank/jiaotong.gif" /></td>
                         <td><input name="pd_FrpId" type="radio" value="BOC-NET">&nbsp;<img src="images/bank/zhongguo.gif" /></td>
                         <td><input name="pd_FrpId" type="radio" value="CMBCHINA-NET">&nbsp;<img src="images/bank/zhaohang.gif" /></td>
                         </tr>
                       <tr class="b_rig"> 
                         <td><input name="pd_FrpId" type="radio" value="CMBC-NET">&nbsp;<img src="images/bank/minsheng.gif" /></td>
                         <td><input name="pd_FrpId" type="radio" value="CEB-NET">&nbsp;<img src="images/bank/guangda.gif" /></td>
                         <td><input name="pd_FrpId" type="radio" value="CIB-NET" >&nbsp;<img src="images/bank/xingye.gif" /></td>
                       </tr>
                       <tr class="b_rig">
                         <td><input name="pd_FrpId" type="radio" value="ECITIC-NET">&nbsp;<img src="images/bank/zhongxin.gif" /></td>
                         <td><input name="pd_FrpId" type="radio" value="PINGANBANK"/>&nbsp;<img src="images/bank/pingan.gif" /></td>
			 <td><input name="pd_FrpId" type="radio" value="SPDB-NET">&nbsp;<img src="images/bank/shangpufa.gif" /></td>
                       </tr>
                       <tr class="b_rig"> 
                         
                         <td><input name="pd_FrpId" type="radio" value="NBCB-NET">&nbsp;<img src="images/bank/ningbo.gif" /></td>
                         <td><input name="pd_FrpId" type="radio" value="GDB-NET">&nbsp;<img src="images/bank/gdb.gif" /></td>
                         <td><input name="pd_FrpId" type="radio" value="POST-NET">&nbsp;<img src="images/bank/youzheng.gif" /></td>
                       </tr>
                     </table>
					 
                     </div>
                    </td>
                    </tr>                  
					<tr>
					  <td height="40" colspan="2" align="right"><div align="center"><span style="color:#FF0000">注意：付款后请等待系统自动跳转到提示交易成功的页面。</span></div></td>
	  </tr>
					<tr><td height="35" align="right">&nbsp;</td>
					<td height="40" align="left" valign="middle">
                      &nbsp;&nbsp; <input name="SubTran" class="anniu_01" id="SubTran"  type="submit" value="马上冲值" />					</td>
					</tr>
                </table>
				<input type="hidden" name="pa_MP" id="pa_MP" value="<?=$rows['username']?>" />
		  		<input size="50" type="hidden" name="pr_NeedResponse" id="pr_NeedResponse" value="1" />                 
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
                  (3).如有任何疑问,您可以联系 在线客服,皇冠现金网为您提供365天×24小时不间断的友善和专业客户咨询服务!                 </div>
				  <div style=" line-height:22px;font-size:12px;">
                  (4).注意：充值成功后，请不要急着关闭支付成功的跳转页面，否则有可能不会到帐。                 </div>
				  <div style=" line-height:22px;font-size:12px;">
                  (5).如需网银汇款/ATM转账或支付宝存款，请联系在线客服索取存款账号！                 </div>
                  </span>                   </span>                  </td>
   
                </tr>
              </table>              
</div>              
</BODY>
</HTML>
