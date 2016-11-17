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

if($_GET["id"]){
    check_quanxian("修改代理");
}else{
    check_quanxian("添加代理");
}
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>代理详细信息展示</TITLE>
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
        if(!document.getElementById("agents_name").value){
            alert("请输入用户名");
            return false;
        }
        if(!document.getElementById("agents_pass").value){
            alert("请输入密码");
            return false;
        }
        return true;
    }
</script>

<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">代理管理：编辑代理信息</span></font></td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap bgcolor="#FFFFFF"><br>
<?php
if($_GET["id"]){
    $sql	=	"select * from agents_list where id=".intval($_GET["id"])." limit 0,1";
    $query	=	$mysqli->query($sql);
    $rows	=	$query->fetch_array();
}else{
    $rows["total_1_1"] = 0;
    $rows["total_1_2"] = 9999;
    $rows["total_2_1"] = 10000;
    $rows["total_2_2"] = 99999;
    $rows["total_3_1"] = 100000;
    $rows["total_3_2"] = 999999;
    $rows["total_4_1"] = 1000000;
    $rows["total_4_2"] = 9999999;
    $rows["total_5_1"] = 10000000;
    $rows["total_5_2"] = 99999999;
    $rows["total_1_scale"] = 5.000;
    $rows["total_2_scale"] = 10.000;
    $rows["total_3_scale"] = 20.000;
    $rows["total_4_scale"] = 30.000;
    $rows["total_5_scale"] = 40.000;
}

?>
<form action="agent_update.php" method="post" name="form1" id="form1" onsubmit="return check_info()">
<table width="90%" align="center" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;"  >
  <tr>
    <td bgcolor="#F0FFFF">用户名</td>
    <td><input name="agents_name" id="agents_name" value="<?=$rows["agents_name"]?>"></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">密码</td>
    <td><input name="agents_pass" <?php if($_GET["id"]){ ?> readonly <?php } ?> id="agents_pass" value="<?=$rows["agents_pass"]?>"></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">生日</td>
    <td><input name="birthday" value="<?=$rows["birthday"]?>" ></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">手机</td>
    <td><input type="text" name="tel" value="<?=$rows["tel"]?>" ></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">email</td>
    <td><input type="text" name="email" value="<?=$rows["email"]?>" ></td>
  </tr>
    <tr>
        <td bgcolor="#F0FFFF">QQ</td>
        <td><input type="text" name="qq" value="<?=$rows["qq"]?>" ></td>
    </tr>
  <tr>
    <td bgcolor="#F0FFFF">其他联系信息</td>
    <td><input type="text" name="othercon" value="<?=$rows["othercon"]?>" ></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">注册时间</td>
    <td><?=$rows["regtime"]?></td>
  </tr>
   <tr>
    <td bgcolor="#F0FFFF">最后登录时间</td>
    <td><?=$rows["logintime"]?></td>
  </tr>
   <tr>
    <td bgcolor="#F0FFFF">最后登录IP</td>
    <td><?=$rows["loginip"]?></td>
  </tr>
   <tr>
    <td bgcolor="#F0FFFF">总登录次数</td>
    <td><?=$rows["lognum"]?></td>
  </tr>
  <tr>
    <td bgcolor="#F0FFFF">理代类型</td>
    <td><label>
            <select name="agents_type" id="agents_type">
                <option value="流水分成" <?=$rows['agents_type']=="流水分成" ? 'selected' : ''?>>流水分成</option>
                <option value="赢利分成" <?=$rows['agents_type']=="赢利分成" ? 'selected' : ''?>>赢利分成</option>
            </select>
        </label></td>
  </tr>
  <tr>
        <td bgcolor="#F0FFFF">代理等级1</td>
        <td>
            <input type="text" name="total_1_1" value="<?=$rows["total_1_1"]?>" size="10">~<input type="text" name="total_1_2" value="<?=$rows["total_1_2"]?>" size="10">
            代理等级1结算比例(百分比):<input type="text" name="total_1_scale" value="<?=$rows["total_1_scale"]?>" size="10">
        </td>
  </tr>
  <tr>
        <td bgcolor="#F0FFFF">代理等级2</td>
        <td>
            <input type="text" name="total_2_1" value="<?=$rows["total_2_1"]?>" size="10">~<input type="text" name="total_2_2" value="<?=$rows["total_2_2"]?>" size="10">
            代理等级2结算比例(百分比):<input type="text" name="total_2_scale" value="<?=$rows["total_2_scale"]?>" size="10">
        </td>
  </tr>
  <tr>
        <td bgcolor="#F0FFFF">代理等级3</td>
        <td>
            <input type="text" name="total_3_1" value="<?=$rows["total_3_1"]?>" size="10">~<input type="text" name="total_3_2" value="<?=$rows["total_3_2"]?>" size="10">
            代理等级3结算比例(百分比):<input type="text" name="total_3_scale" value="<?=$rows["total_3_scale"]?>" size="10">
        </td>
  </tr>
  <tr>
        <td bgcolor="#F0FFFF">代理等级4</td>
        <td>
            <input type="text" name="total_4_1" value="<?=$rows["total_4_1"]?>" size="10">~<input type="text" name="total_4_2" value="<?=$rows["total_4_2"]?>" size="10">
            代理等级4结算比例(百分比):<input type="text" name="total_4_scale" value="<?=$rows["total_4_scale"]?>" size="10">
        </td>
  </tr>
  <tr>
        <td bgcolor="#F0FFFF">代理等级5</td>
        <td>
            <input type="text" name="total_5_1" value="<?=$rows["total_5_1"]?>" size="10">~<input type="text" name="total_5_2" value="<?=$rows["total_5_2"]?>" size="10">
            代理等级5结算比例(百分比):<input type="text" name="total_5_scale" value="<?=$rows["total_5_scale"]?>" size="10">
        </td>
  </tr>
    <tr>
        <td bgcolor="#F0FFFF">代理链接</td>
        <td><input readonly type="text" size="90" value="如果你的网址是www.888.com，代理链接为：www.888.com/?intr=ID  ID需要换成生成后的代理ID。" ></td>
    </tr>
  <tr>
    <td bgcolor="#F0FFFF">备注：</td>
    <td><textarea name="remark" cols="80" rows="5" id="remark"><?=$rows["remark"]?></textarea></td>
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