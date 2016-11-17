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

include_once("../class/admin.php");
include_once("../common/login_check.php");

check_quanxian("修改网站信息");

if($_GET["action"] == "save"){
    if($_POST["id"]){
        $sql = "DROP TRIGGER BeforeUpdateSysHuikuanList;";
        $mysqli->query($sql);
        $sql = "update sys_huikuan_list set bank_name='".$_POST["bank_name"]."' , bank_number='".$_POST["bank_number"]."' ,
            bank_xm='".$_POST["bank_xm"]."' , bank_city='".$_POST["bank_city"]."'
                        where id=".$_POST["id"]."";
        $mysqli->query($sql);
        $sql = "   CREATE TRIGGER `BeforeUpdateSysHuikuanList` BEFORE update ON `sys_huikuan_list`
			  FOR EACH ROW BEGIN
				insert into sys_huikuan_list values (old.id);
			  END;
	    ";
        $mysqli->query($sql);
        admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],"管理员：".$_SESSION["login_name"]."，修改了汇款信息",$_SESSION["ssid"],"",$bj_time_now);
        message('修改汇款信息成功!',"setHuikuan.php");
    }else{
        $sql = "DROP TRIGGER BeforeInsertSysHuikuanList;";
        $mysqli->query($sql);
        $sql = "insert into sys_huikuan_list(bank_name,bank_number,bank_xm,bank_city)
            values('".$_POST["bank_name"]."','".$_POST["bank_number"]."','".$_POST["bank_xm"]."','".$_POST["bank_city"]."')";
        $mysqli->query($sql);
        $sql = "   CREATE TRIGGER `BeforeInsertSysHuikuanList` BEFORE insert ON `sys_huikuan_list`
			  FOR EACH ROW BEGIN
				insert into sys_huikuan_list(id) values (null);
			  END;
	    ";
        $mysqli->query($sql);
        admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],"管理员：".$_SESSION["login_name"]."，新增了汇款信息",$_SESSION["ssid"],"",$bj_time_now);
        message('新增汇款信息成功!',"setHuikuan.php");
    }
}
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>汇款详细信息展示</TITLE>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
.STYLE1 {font-size: 10px}
.STYLE2 {font-size: 12px}
body {	margin: 0px;}

td{font:13px/120% "宋体";padding:3px;}
a{color:#FFA93E;}
/*.t-title{background:url(/super/images/06.gif);height:24px;}*/
.t-title{height:24px;}
.t-tilte td{font-weight:800;}
</STYLE>
</HEAD>

<script language="javascript" src="../js/user_show.js"></script>
<script>
    function check_info(){
        if(!document.getElementById("bank_name").value){
            alert("请输入银行名称");
            return false;
        }
        if(!document.getElementById("bank_number").value){
            alert("请输入银行账号");
            return false;
        }
        if(!document.getElementById("bank_xm").value){
            alert("请输入开户名");
            return false;
        }
        if(!document.getElementById("bank_city").value){
            alert("请输入开户城市");
            return false;
        }
        return true;
    }
</script>

<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">系统管理：编辑汇款信息</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF"><br>
<?php
if($_GET["id"]){
    $sql	=	"select * from sys_huikuan_list where id=".intval($_GET["id"])." limit 0,1";
    $query	=	$mysqli->query($sql);
    $rows	=	$query->fetch_array();
}else{
    $rows["bank_name"] = "";
    $rows["bank_number"] = "";
    $rows["bank_xm"] = "";
    $rows["bank_city"] = "";
}

?>
<form action="?action=save" method="post" name="form1" id="form1" onsubmit="return check_info()">
<table width="90%" align="center" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;"  >
  <tr>
    <td bgcolor="#F0FFFF">银行名称：</td>
    <td><input name="bank_name" id="bank_name" value="<?=$rows["bank_name"]?>"></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">银行账号</td>
    <td><input name="bank_number" id="bank_number" value="<?=$rows["bank_number"]?>"></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">开户名</td>
    <td><input name="bank_xm" id="bank_xm" value="<?=$rows["bank_xm"]?>"></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">开户城市</td>
    <td><input name="bank_city" id="bank_city" value="<?=$rows["bank_city"]?>"></td>
  </tr>

  <tr>
  	<td colspan="2" align="center">
        <input name="id" type="hidden" value="<?=$_GET["id"]?>">
        <input type="submit" value="确认提交"> 　
  	    <input type="button" value="取 消" onClick="javascript:history.go(-1)">
    </td>
  </tr>
</table>
</form></td>
  </tr>
</table>
</body>
</html>