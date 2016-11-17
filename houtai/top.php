<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/cache/vertime.php");
@include_once($C_Patch."/live/agid.php");

include_once("common/login_check.php");

$sql = "select conf_www from sys_config limit 0,1";
$query	=	$mysqli->query($sql);
$row = $query->fetch_array();

$time_limit = strtotime($vertime)-time();
if($time_limit<259200 && $time_limit>=172800){
    $time_day = "三天内到期";
}elseif($time_limit<172800 && $time_limit>=86400){
    $time_day = "两天内到期";
}elseif($time_limit<86400 && $time_limit>=0){
    $time_day = "一天内到期";
}else{
    $time_day = "已经到期";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>top</title>
<link href="Images/css1/top_css.css" rel="stylesheet" type="text/css">
</head>
<script type="text/javascript" language="javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" language="javascript" src="/pt/assets/js/lib/sound.js"></script>
<body bgcolor="#03A8F6">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="194" height="60" align="center" background="Images/top_logo.jpg"></td>
    <td align="center" style="background:url(Images/top_bg.jpg) no-repeat"><table cellspacing="0" cellpadding="0" border="0" width="100%" height="33">
      <tbody>
        <tr>
          <td width="1%" align="left"><img onClick="switchBar(this)" height="15" alt="关闭左边管理菜单" src="images/on-of.gif" width="15" border="0" /></td>
          <td width="45%" align="left"><div class="show" id="tisi"><marquee scrolldelay="5" scrollamount="2" id="m_xx" onMouseOver="this.stop()" onMouseOut="this.start()"></marquee></div><div id="hk_mp3"></div></td>
          <td width="54%" align="right">
              <?
              $sql	=	"select ag_hall,bbin_hall from sys_config limit 0,1";
              $query	=	$mysqli->query($sql);
              $rows_ag	=	$query->fetch_array();
              ?>
              <a href="fund/tixian.php?status=未结算"  target="main">提款(<font color="red" id="tknum">--</font>)</a>&nbsp;
              <a href="fund/huikuan.php?status=未结算"  target="main">汇款(<font color="red" id="hknum">--</font>)</a>&nbsp;
              <a href="fund/chongzhi.php?status=未结算"  target="main">存款(<font color="red" id="cknum">--</font>)</a>&nbsp;
              <a href="user/list.php?is_stop=异常" target="main">异常会员(<font color="red" id="ernum">--</font>)</a>&nbsp;
              <a href="sports/cg_list.php?status=0" target="main">未结算串关(<font color="red" id="cgnum">--</font>)</a>&nbsp;
          </td>
        </tr>
      </tbody>
    </table>
	<script>
	$(function(){
		$.get('/newag2/get_credit.php',function(data){$('#ag_money').text(data);});

		$.get('/newbbin2/get_credit.php',function(data){$('#bb_money').text(data);});

		$.get('/newmg2/get_credit.php',function(data){$('#mg_money').text(data);});

		$.get('/newallbet2/get_credit.php',function(data){$('#ab_money').text(data);});

		$.get('/newpt2/get_credit.php',function(data){$('#pt_money').text(data);});
		
	});
	</script>
    <table height="26" border="0" align="left" cellpadding="0" cellspacing="0" class="subbg" NAME=t1>
      <tbody>
        <tr align="middle">
          <td width="71" height="26" align="center" valign="middle" background="Images/top_tt_bg.gif"><a
            href="right.php" 
          target="main" class="STYLE2">管理首页</a></td>
          <td align="center" class="topbar"><span class="STYLE2"> </span></td>
		  <?php
if(strpos($quanxian,'修改网站信息')){
?>

          <td width="71" align="center" valign="middle" background="Images/top_tt_bg.gif"><a 
            href="webconfig/index.php" 
            target="main" class="STYLE2">系统设置</a></td>
          <td align="center" class="topbar"><span class="STYLE2"> </span></td>
		  <?}?>

		  <?php
if(strpos($quanxian,'管理员管理')){
?>

          <td width="71" align="center" valign="middle" background="Images/top_tt_bg.gif" ><a   href="manage/list.php" target="main">管理员管理</a></td>
          <td align="center" class="topbar"><span class="STYLE2"> </span></td>
		  <?}?>
		  <?php
if(strpos($quanxian,'查看会员信息')){
?>
          <td width="71" align="center" valign="middle" background="Images/top_tt_bg.gif" ><a  href="user/user_log.php" target="main" class="STYLE3">日志管理</a></td>
          <td align="center" class="topbar"><span class="STYLE2"> </span></td>

			<td width="71" align="center" valign="middle" background="Images/top_tt_bg.gif" ><a  href="user/list.php?1=1"  target="main" class="STYLE2">会员管理</a></td>
          <td align="center" class="topbar"><span class="STYLE2"> </span></td>
		  <?}?>
		  <?php
if(strpos($quanxian,'查看报表')){
?>
          <td width="71" align="center" valign="middle" background="Images/top_tt_bg.gif"><a  href="report/all_game_index.php"  target="main" class="STYLE2">报表明细</a></td>
          <td align="center" class="topbar"><span class="STYLE2"> </span></td>
		  <?}?>
		  <?php
if(strpos($quanxian,'加款扣款')){
?>
          <td width="71" align="center" valign="middle" background="Images/top_tt_bg.gif"><a  href="fund/tixian.php"  target="main" class="STYLE2">提款管理</a></td>
          <td align="center" class="topbar"><span class="STYLE2"> </span></td>
		  <td width="71" align="center" valign="middle" background="Images/top_tt_bg.gif"><a  href="fund/domoney.php"  target="main" class="STYLE2">加款扣款</a></td>
          <td align="center" class="topbar"><span class="STYLE2"> </span></td>
		  <?}?>
          <td width="71" align="center" valign="middle" background="Images/top_tt_bg.gif"><a href="manage/set_pwd.php"   target="main" class="STYLE2">修改密码</a></td>
          <td align="center" class="topbar"><span class="STYLE2"> </span></td>
          <td width="71" align="center" valign="middle" background="Images/top_tt_bg.gif"><a  href="out.php" target="_top" class="STYLE2">退出登录</a></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr height="6">
    <td bgcolor="#1F3A65" background="Images/top_bg.jpg"></td>
  </tr>
</table>
<script language="javascript">
<!--
var displayBar=true;
function switchBar(obj){
	if (displayBar)
	{
		parent.frame.cols="0,*";
		displayBar=false;
		obj.title="打开左边管理菜单";
	}
	else{
		parent.frame.cols="195,*";
		displayBar=true;
		obj.title="关闭左边管理菜单";
	}
}
//-->
</script></body>
</html>
<?php if ($uid) { ?>
    <script language="javascript">
        function top_systop() {
            $.getJSON("systop.php?callback=?", function (json) {

                    if(json.sum){
                        var html = "您有：";
                        $("#tknum").html(json.tknum);
                        if(json.tknum>0)
                        {
                            html += "<span class=\"num\">"+json.tknum+"</span> 条<strong><A href=\"fund/tixian.php?status=未结算\"  target=\"main\">提款</a></strong> ";
                            $("#hk_mp3").html("<embed src='<?="http://".$row["conf_www"]."/resource/ring/tk.mp3"?>' width='0' height='0'></embed>");
                        }
                        $("#hknum").html(json.hknum);
                        if(json.hknum>0)
                        {
                            html += "<span class=\"num\">"+json.hknum+"</span> 条<strong><A href=\"fund/huikuan.php?status=未结算\"  target=\"main\">汇款</a></strong> ";
                            $("#hk_mp3").html("<embed src='<?="http://".$row["conf_www"]."/resource/ring/hk.mp3"?>' width='0' height='0'></embed>");
                        }
                        $("#cknum").html(json.cknum);
                        if(json.cknum>0)
                        {
                            html += "<span class=\"num\">"+json.cknum+"</span> 条<strong><A href=\"fund/chongzhi.php?status=未结算\"  target=\"main\">存款</a></strong> ";
                            $("#hk_mp3").html("<embed src='<?="http://".$row["conf_www"]."/resource/ring/hk.mp3"?>' width='0' height='0'></embed>");
                        }
                        var html2 = "";
                        if(json.ver_time_num>0)
                        {
                            html2 += "<span style='color: red;'>&nbsp;&nbsp;您的程序<?=$time_day?>，请及时续费。如果不续费，将暂时停止服务。到期时间：<?=$vertime?></span></strong> ";
                        }
                        if(json.ag_hall_num>0)
                        {
                            html2 += "<A href=\"webconfig/index.php?1=1\"  target=\"main\">AG 普通厅余额小于设定值。</a></strong> ";
                            $("#hk_mp3").html("<embed src='<?="http://".$row["conf_www"]."/resource/ring/hk.mp3"?>' width='0' height='0'></embed>");
                        }
                        if(json.auto_zhenren_num>0)
                        {
                            html2 += "<A href=\"casino/zz_log.php?gtype=<?=urldecode('All')?>&status=<?=urldecode('4')?>\"  target=\"main\">您有<span class=\"num\">"+json.auto_zhenren_num+"</span> 条真人转账未审核。</a></strong> ";
                            $("#hk_mp3").html("<embed src='<?="http://".$row["conf_www"]."/resource/ring/hk.mp3"?>' width='0' height='0'></embed>");
                        }
                        if(json.add_number_new>0)
                        {
                            html2 += "<A href=\"user/list.php?1=1\"  target=\"main\">&nbsp;&nbsp;恭喜！恭喜！您有"+json.add_number_new+"个新的用户注册了。(一分钟内)</a></strong> ";
                            $("#hk_mp3").html("<embed src='<?="http://".$row["conf_www"]."/resource/ring/hk.mp3"?>' width='0' height='0'></embed>");
                        }
                        $("#ernum").html(json.ernum);
                        $("#cgnum").html(json.cgnum);

                        html += "信息未处理！";
                        if(html=="您有：信息未处理！"){
                            html = "";
                        }
                        $("#m_xx").html(html+html2);
                        $("#tisi").css("display","block");
                    }
                    if(json.tknum==0 && json.hknum==0 && json.cknum==0 && json.ag_hall_num==0 && json.add_number_new==0 &&json.ver_time_num==0 &&json.auto_zhenren_num==0){
                        $("#m_xx").html("");
                        $("#tisi").css("display","none");
                    }

                }
            );
            setTimeout("top_systop()", 30000);
        }
        top_systop();
    </script>
<? } ?>