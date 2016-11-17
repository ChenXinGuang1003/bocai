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

include_once("../class/newPage.php");

include_once("../class/admin.php");

include_once("../common/login_check.php"); 

include_once($C_Patch."/app/member/ip.php");
check_quanxian("管理员管理");

?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>管理员日志</TITLE>
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
    <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">管理员管理：管理员操作日志</span></font></td>
  </tr>
</table>

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="font12" bgcolor="#798EB9">
    <form name="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>">
        <tr>
            <td align="center" bgcolor="#FFFFFF">
                &nbsp;&nbsp;
                管理员：<input name="id" type="text" id="id" value="<?=$_GET['id']?>" size="15">
                &nbsp;&nbsp;
                操作内容：<input name="edlog" type="text" id="edlog" value="<?=$_GET['edlog']?>" size="15">
                &nbsp;&nbsp;
                <input type="submit" name="Submit" value="搜索"></td>
        </tr>
    </form>
</table>

<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap bgcolor="#FFFFFF">
    
<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >       <tr style="background-color: #EFE" class="t-title"  align="center">
        <td width="10%" height="20" ><strong>管理员</strong></td>
		<td width="10%" ><strong>随机值</strong></td>
		<td width="10%" ><strong>标识</strong></td>
        <td width="30%" ><strong>操作内容</strong></td>
		<td width="15%" ><strong>时间</strong></td>
        <td width="10%" ><strong>IP</strong></td>
		<td width="25%" ><strong>地址</strong></td>

          </td>
      </tr>
      <?php
if($uid){

	$thisPage	=	1;
	$mid=$_GET['id'];
	if($_GET['page']){
		$thisPage	=	$_GET['page'];
	}
	$page		=	new newPage();
	$shownum	=	40;
	if($mid!=""){
		$sql_count="select count(*) as s from manage_log where manage_name='".$mid."'";
	}else{
		$sql_count="select count(*) as s from manage_log where 1=1";
	}
    if($_GET['edlog']){
        $sql_count .= " and edlog like '%".$_GET['edlog']."%' ";
    }
	$query	=	$mysqli->query($sql_count);
	$rows = $query->fetch_array();
	$sum		=	$rows["s"]; //总页数

	$thisPage	=	$page->check_Page($thisPage,$sum,$shownum,40);
	$start		=	($thisPage-1)*$shownum;

	if($mid!="")
	{
	$sql	=	"select * from manage_log where manage_name='".$mid."' and id <= (Select id From manage_log where manage_name='".$mid."' ".($_GET['edlog']!=""?" and edlog like '%".$_GET['edlog']."%' ":"")."  Order By id desc limit $start,1)  ".($_GET['edlog']!=""?" and edlog like '%".$_GET['edlog']."%' ":"")." order by id desc limit $shownum";
	}else{
	$sql	=	"select * from manage_log where id <= (Select id From manage_log where 1=1 ".($_GET['edlog']!=""?" and edlog like '%".$_GET['edlog']."%' ":"")." Order By id desc limit $start,1)  ".($_GET['edlog']!=""?" and edlog like '%".$_GET['edlog']."%' ":"")."  order by id desc limit $shownum";
	}
	$query	=	$mysqli->query($sql);
	

	while($rows = $query->fetch_array()){
	  	$over	= "#EBEBEB";
		$out	= "#ffffff";
		$color	= "#FFFFFF";
      	?>
	        <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>">
	          <td><a href="log.php?id=<?=$rows["manage_name"]?>"><span style="color:#F37605;"><?=$rows["manage_name"]?></span></a></td>
              <td><?=$rows["session_str"]?></td>
	          <td><?=$rows["run_str"]?></td>
			  <td><?=$rows["edlog"]?></td>
			  <td><?=$rows["edtime"]?></td>
			  <td><?=$rows["login_ip"]?></td>
			  <td><?=iconv("GB2312","UTF-8",convertip($rows["login_ip"],'../'))?></td>
          </tr> 	
      	<?
      }
}
      ?>
    </table>
    </td>
  </tr>
  <tr><td ><div style="float:left;"><?=$page->get_htmlPage($_SERVER["REQUEST_URI"]);?></div></td></tr>
</table>
</body>
</html>