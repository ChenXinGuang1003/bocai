<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";


$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");

include_once($C_Patch."/app/member/include/config.inc.php");

include_once($C_Patch."/app/member/common/function.php");

include_once("../class/admin.php");

include_once("../common/login_check.php"); 
check_quanxian("管理员管理");

?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>管理员列表</TITLE>
<link href="../Images/css1/css.css" rel="stylesheet" type="text/css">
 
<style type="text/css">
.STYLE2 {font-size: 12px}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
td{font:13px/120% "宋体";padding:3px;}
a{

	color:#F37605;

	text-decoration: none;

}
.t-title{background:url(../images/06.gif);height:24px;}
.t-tilte td{font-weight:800;}
.STYLE4 {
	color: #FF0000;
	font-size: 12px;
}
</STYLE>
</HEAD>

<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">管理员管理：管理员列表</span></font></td>
  </tr>
</table>
<form name="form2" method="post" action="" onSubmit="return check();" style="margin:0 0 0 0;">
<table width="100%">
      <tr>
		<td width="104" align="center"><a href="admin.php?action=add">添加管理员</a></td>
      </tr>
  </table>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap bgcolor="#FFFFFF">
    
<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >       <tr style="background-color: #EFE" class="t-title"  align="center">
        <td width="15%" height="20" ><strong>管理员</strong></td>
        <td width="10%" ><strong>多地登陆</strong></td>

        <td width="50%" ><strong>权限</strong></td>
        <td width="15%" ><strong>操作</strong></td>
          </td>
      </tr>
      <?php
if($uid){
	$sql	=	"select * from sys_manage";
	$query	=	$mysqli->query($sql);
	while($rows = $query->fetch_array()){
	  	$over	= "#EBEBEB";
		$out	= "#ffffff";
		$color	= "#FFFFFF";
      	?>
	        <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>">
	          <td><a href="admin.php?action=edit&id=<?=$rows["id"]?>"><span style="color:#F37605;"><?=$rows["manage_name"]?></span></a></td>
	          <td><?php if($rows["login_one"]==1){echo '<span style="color:#F37605;">否</span>' ;}else{ echo "是";} ?></td>

	          <td><?=$rows["purview"]?></td>
	          <td><a href="admin.php?action=edit&id=<?=$rows["id"]?>"><span style="color:#F37605;">编辑</span></a>┆<a href="admin.php?action=del&id=<?=$rows["id"]?>"><span style="color:#F37605;">删除</span></a></td>
          </tr> 	
      	<?
      }
}
      ?>
    </table>
    </td>
  </tr>
</table>
</form>
</body>
</html>