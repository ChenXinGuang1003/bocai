<?php
session_start();
include_once("../include/config.php");
include_once("../include/mysqli.php");

$sql	=	"select add_time,msg from k_notice where is_show=1 order by `sort` desc,nid desc limit 0,40";
$query	=	$mysqli->query($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统公告列表</title>
<link href="../default.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body{
	background-color: FFFFFF;
	overflow-x:hidden;
}
-->
</style></head>

<body class="not_2">
<table width="500" border="0">
<?php
$i=0;
while($row = $query->fetch_array()){
?>
  <tr class="not_2_<?=(++$i)%2 ? '1' : '2'?>">
    <td width="45" align="center" valign="middle"><?=date("m-d",strtotime($row["add_time"]))?></td>
    <td><div style="width:430px;"><?=$row["msg"]?></div></td>
  </tr>
<?php
}
?>
</table>
</body>
</html>