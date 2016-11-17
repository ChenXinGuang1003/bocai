<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/utils/login_check.php");
include_once($C_Patch."/app/member/class/user_group.php");
include_once($C_Patch."/app/member/class/user.php");

$pay_name_from_get = $_GET["pay_name"];
if(!$pay_name_from_get && $get_pay_name){
    $pay_name_from_get = $get_pay_name;
}

//设置银行卡信息
if($_GET["action"]=="save"){

	$yzm	=	strtolower($_POST["vlcodes"]);
	if($yzm!=$_SESSION["randcode"]){
		message("验证码错误,请重新输入");
	}
	$_SESSION["randcode"]	=	rand(10000,99999); //更换一下验证码
	
	$rs		=	user::get_paycard($_SESSION["userid"]);
	if($rs['qk_pass'] != md5($_POST["qk_pwd"])){
		message("取款密码错误,请重新输入");
	}
	$address=	htmlEncode($_POST["add1"]).htmlEncode($_POST["add2"]).htmlEncode($_POST["add3"]);
	if(user::update_paycard($_SESSION["userid"],htmlEncode($_POST["pay_card"]),htmlEncode($_POST["pay_num"]),$address,$rs['pay_name'],$_SESSION["username"])){
        include_once  ($C_Patch."/cl/index.php");
	}else{
		message('设置出错，请重新设置你的银行卡信息','/app/member/user/set_card.php');
	}
}
?>
<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
<link href="../css/tikuan.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="/js/jquery-1.7.1.js"></script>
<script language="javascript">

function check_submit()
{
 if($("#qk_pwd").val()=="")
 {
 alert("请输入您注册时设置的取款密码");
 $("#qk_pwd").focus();
 return false;
 }
 if($("#pay_num").val()=="")
 {
 alert("请填写好你的银行卡号");
 $("#pay_num").focus();
 return false;
 }
 if($("#add2").val()=="")
 {
 alert("请填写好你银行开户行所在的地区");
 $("#add2").focus();
 return false;
 }
 if($("#add3").val()=="")
 {
 alert("请填写好你的开户行名称");
 $("#add3").focus();
 return false;
 }
    $.ajax({
        type: "POST",
        url: "/app/member/user/save_card.php?action=save",
        data:$('#form1').serialize()
    }).done(function( msg ) {
            if(msg=="save_card_success"){
               // f_com.MChgPager(msg);
			   alert('您的银行卡信息提交成功');
			   location.href = '/app/member/money/tikuanM.php';
            }else{
                alert(msg);
            }
        }).fail(function(error){
            alert(error.responseText);
        });
}

function next_checkNum_img(){
	document.getElementById("checkNum_img").src = "../yzm.php?"+Math.random();
	return false;
}

</script>
<script language="javascript" type="text/javascript">
	var clientW = document.documentElement.clientWidth;
	document.getElementsByTagName('html')[0].style.fontSize = clientW/3 + 'px';
</script>
<style>
	html{ height:100%; background:#1A1309; }
	body{ font-size:0.14rem; color:#fff; margin:0;}
	#headerBox{ width:100%; height:0.35rem; line-height:0.35rem; background:#986600; box-sizing:border-box; overflow:hidden;  position:relative;  }
	#headerBox a{ padding:0.12rem; border-radius:0.12rem; background:rgba(0,0,0,0.3) url(../../../../../img/index_ico.png) center center no-repeat; background-size:70%; position:absolute; left:0.1rem; top:calc(0.18rem - 0.12rem); }
	#headerBox .logo{ display:block; position:absolute; left:calc(1.5rem - 0.46rem); top:calc(0.18rem - 0.16rem); height:0.3rem; }
	.shuoming2 p{ text-indent:0.12rem;}
	._right{ text-align:right; }
	#top_2{ text-align:center; margin-bottom:0.1rem;  }
	input,select{ height:0.2rem;}
	#submit{    width: 1rem;
    height: 0.3rem;
    border: none;
    font-size: 0.14rem;
    font-weight: bolder;
    border-radius: 0.04rem;
    text-align: center;
    line-height: 0.3rem;
	background:url('das.png');
    color: #fff;
	}
</style>
<header id="headerBox">
	<a href="../../../../wap.php"></a>
	<img class="logo" src="../../../../img/logo.png" />
</header>
<div id="MACenterContent">
    <div id="MMainData" style="margin-top: 8px;">

<div style="height:14px; width:100%;">&nbsp;</div>
<div id="waikuan" style="width:100%;">
 <div id="top_2"><b>会员账号： <strong style="color:#ff0000;"><?=$_SESSION["username"]?></strong></b></div>
 <div class="shuoming2">
<form id="form1" name="form1">
    <table width="100%" border="0" cellpadding="5">
      <tr style="display:none;">
        <td height="24" colspan="2" style="text-indent: 0.3rem;
    font-size: 0.1rem;"><b>亚洲用户请输入以下资料</b></td>
        </tr>
      <tr>
        <td width="30%" height="24" class="_right">取款密码：</td>
        <td width="70%"><input name="qk_pwd" type="password" class="tuiguang" id="qk_pwd" style="width:200px;" maxlength="30" /></td>
      </tr>
      <tr>
        <td width="30%" height="24" class="_right">开户姓名：</td>
        <td width="70%"><input name="pay_name" type="text" disabled="disabled" class="tuiguang" id="pay_name" style="width:200px; color:#333333;" value="<?=$pay_name_from_get?>" /></td>
      </tr>
      <tr>
        <td height="24" class="_right">借记卡种类：</td>
        <td><select id="pay_card" name="pay_card">
                <option value="中国工商银行" selected="selected">中国工商银行</option>
	              <option value="中国招商银行">中国招商银行</option>
	              <option value="中国农业银行">中国农业银行</option>
	              <option value="中国建设银行">中国建设银行</option>
	              <option value="中国民生银行">中国民生银行</option>
	              <option value="中国交通银行">中国交通银行</option>
	              <option value="深圳发展银行">深圳发展银行</option>
				  <option value="中国邮政银行">中国邮政银行</option>
				  <option value="中国银行">中国银行</option>
				  <option value="兴业银行">兴业银行</option>
				  <option value="中信银行">中信银行</option>
				  <option value="广大银行">广大银行</option>
				  <option value="交通银行">交通银行</option>	              
				  <option value="光大银行">光大银行</option>	              
				  <option value="平安银行">平安银行</option>	              
				  <option value="广发银行">广发银行</option>	              
				  <option value="华夏银行">华夏银行</option>	              
				  <option value="温州银行">温州银行</option>	              
				  <option value="上海浦东发展银行">上海浦东发展银行</option>	              
				  <option value="其它银行">其它银行</option>	              







			
			</select></td>
      </tr>
      <tr>
        <td height="24" class="_right">借记卡号：</td>
        <td><input name="pay_num" type="text" class="tuiguang" id="pay_num"  style="width:200px;" onfocus="this.style.backgroundColor='#fcfcfc'" /></td>
      </tr>
      <tr>
        <td height="24" class="_right">开户地区：</td>
        <td><select id="add1" name="add1">
	      <option value="北京" selected="selected">北京</option>
	      <option value="上海">上海</option>
	      <option value="天津">天津</option>
	      <option value="广东">广东</option>
	      <option value="重庆">重庆</option>
	      <option value="河北">河北</option>
	      <option value="河南">河南</option>
	      <option value="江苏">江苏</option>
	      <option value="浙江">浙江</option>
	      <option value="山东">山东</option>
	      <option value="山西">山西</option>
	      <option value="广西">广西</option>
	      <option value="福建">福建</option>
	      <option value="内蒙古">内蒙古</option>
	      <option value="黑龙江">黑龙江</option>
	      <option value="辽宁">辽宁</option>
	      <option value="吉林">吉林</option>
	      <option value="新疆">新疆</option>
	      <option value="甘肃">甘肃</option>
	      <option value="宁夏">宁夏</option>
	      <option value="陕西">陕西</option>
	      <option value="湖北">湖北</option>
	      <option value="湖南">湖南</option>
	      <option value="江西">江西</option>
	      <option value="四川">四川</option>
	      <option value="贵州">贵州</option>
	      <option value="云南">云南</option>
	      <option value="西藏">西藏</option>
	      <option value="青海">青海</option>
	      <option value="海南">海南</option>
	      <option value="安徽">安徽</option>
	      <option value="香港">香港</option>
	      <option value="澳门">澳门</option>
	      <option value="其他">其他</option>
        </select></td>
      </tr>
      <tr>
        <td height="24" class="_right">开户市：</td>
        <td><input name="add2" type="text" class="tuiguang" id="add2" style="width:200px;" onfocus="this.style.backgroundColor='#fcfcfc'"  /></td>
      </tr>
      <tr>
        <td height="24" class="_right">开户网点：</td>
        <td><input name="add3" type="text" class="tuiguang" id="add3" style="width:200px;" onfocus="this.style.backgroundColor='#fcfcfc'" /></td>
      </tr>
      <tr>
        <td height="24" class="_right">验证码：</td>
        <td><input name="vlcodes" type="text" class="tuiguang" id="vlcodes" size="5" maxlength="4" onfocus="next_checkNum_img()" style="float:left;" />
        &nbsp;&nbsp;&nbsp;&nbsp;<img src="../yzm.php" alt="点击更换" name="checkNum_img" id="checkNum_img" style="height:100%;    cursor: pointer; float:left;" onclick="next_checkNum_img()" /></td>
      </tr>
      <tr>
        <td height="24">&nbsp;</td>
        <td height="24"><input style="height:auto;" type="checkbox" name="readrule" checked="checked" style="width:15px;" id="readrule" />
	  我已查看提款须知</td>
      </tr>
      <tr>
        <td height="24">&nbsp;</td>
        <td height="24"><input style="height:auto;" type="checkbox" checked="checked" name="readrule2" style="width:15px;" id="readrule2" />
	  绑定此取款信息</td>
      </tr>
      <tr>
        <td height="24">&nbsp;</td>
        <td height="24"><input  type="button" id="submit" onclick="check_submit()" value="提交" class="anniu_001"/></td>
      </tr>
    </table>
	</form>
	</div>
 
<?php
if($_COOKIE['is_daili']){
?>
  <p>7 、代理额度申请时间为每月2～5号，且只能申请一次。首次申请代理额度需在取得代理资格后至少35天。</p>
<?php
}
?>
</div>
    </div>
</div>
<script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
