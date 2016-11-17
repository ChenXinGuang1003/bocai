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
include_once("result/Js_Class.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

check_quanxian("手工录入彩票结果");

$id	=	0;
$qishu_query = "";
if($_GET['id'] > 0){
    $id	=	$_GET['id'];
}
if($_GET['qishu_query']){
    $qishu_query = $_GET['qishu_query'];
}
$lottery_type = "六合彩";

if($_GET["action"]=="add" && $id==0){
    $create_time = date("Y-m-d H:i:s",time());
    $qishu		=	$_POST["qishu"];
    $kaipan_time	=	$_POST["kaipan_time"];
    $fenpan_time    =	$_POST["fenpan_time"];
    $kaijiang_time	=	$_POST["kaijiang_time"];
    $sql = "select id from six_lottery_schedule where qishu='$qishu'";
    $query = $mysqli->query($sql);
    $row    =	$query->fetch_array();
    if($row && $row["id"]){
        message("该期彩票结果已存在，请查询后编辑。","set_issue.php?1=1");
    }else{
        $sql		=	"insert into six_lottery_schedule(qishu,create_time,kaipan_time,fenpan_time,kaijiang_time) values (".$qishu.",'".$create_time."','".$kaipan_time."','".$fenpan_time."','".$kaijiang_time."')";
        $mysqli->query($sql);
    }
}elseif($_GET["action"]=="edit" && $id>0){
    $sql		=	"select * from six_lottery_schedule WHERE id='$id'";
    $query	=	$mysqli->query($sql);
    $row    =	$query->fetch_array();
    $prev_text = "修改时间：".(date("Y-m-d H:i:s",time()))."。\n修改前内容：\n  开奖期号".$row["qishu"].",\n  开盘时间".$row["kaipan_time"].",\n  封盘时间".$row["fenpan_time"].",\n  开奖时间".$row["kaijiang_time"]."。\n修改后内容：\n  开盘期号".$_POST["qishu"].",\n  开盘时间".$_POST["kaipan_time"].",\n  封盘时间".$_POST["fenpan_time"].",\n  开奖时间".$_POST["kaijiang_time"]."。".'\n\n'.$row["prev_text"];

    $qishu		=	$_POST["qishu"];
    $kaipan_time	=	$_POST["kaipan_time"];
    $fenpan_time    =	$_POST["fenpan_time"];
    $kaijiang_time	=	$_POST["kaijiang_time"];
    $create_time = date("Y-m-d H:i:s",time());
    $sql		=	"update six_lottery_schedule set prev_text='".$prev_text."',qishu='".$qishu."',kaipan_time='".$kaipan_time."',fenpan_time='".$fenpan_time."',kaijiang_time='".$kaijiang_time."',create_time='".$create_time."' where id=".$id."";
    $mysqli->query($sql);
}elseif($_GET["action"]=="delete" && $id>0){
	$sql		=	"delete from six_lottery_schedule WHERE id='$id'";
    $query	=	$mysqli->query($sql);
	if($query){echo '<script>alert("删除成功"); window.href.location="/bh-100/Lottery/result/LHC/result_lhc.php?type=%E5%85%AD%E5%90%88%E5%BD%A9";</script>';}
	else{echo '<script>alert("删除失败"); window.href.location="/bh-100/Lottery/result/LHC/result_lhc.php?type=%E5%85%AD%E5%90%88%E5%BD%A9";</script>';}
}
?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <link rel="stylesheet" href="../images/css/admin_style_1.css" type="text/css" media="all" />
    <script language="javascript" src="../js/jquery-1.7.2.min.js"></script>
    <script language="JavaScript" src="set_issue_lhc.js"></script>
</head>
<body>
<div id="pageMain">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td valign="top">
<form name="form1" onSubmit="return check_submit();" method="post" action="?id=<?=$id?>&action=<?=$id>0 ? 'edit' : 'add'?>&qishu_query=<?=$qishu_query?>">
<?php
if($id>0 && !isset($_GET['action'])){
    $sql = "SELECT id,qishu,create_time,kaipan_time,fenpan_time,kaijiang_time
            FROM six_lottery_schedule WHERE id=$id limit 0,1";
    $query	=	$mysqli->query($sql);
    $rs		=	$query->fetch_array();
}
?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
<tr>
    <td  align="left" bgcolor="#3C4D82" style="color:#FFF">彩票类别：</td>
    <td  align="left" bgcolor="#3C4D82" style="color:#FFF"  colspan="5"><strong><?=$lottery_type?></strong></td>
</tr>
<tr>
    <td width="60"  align="left" bgcolor="#F0FFFF">开奖期号：</td>
    <td  align="left" bgcolor="#FFFFFF"  colspan="5">
        <input name="qishu" type="text" id="qishu" value="<?=$rs['qishu']?>" size="20" maxlength="16"/></td>
</tr>
<tr>
    <td align="left" bgcolor="#F0FFFF">开盘时间：</td>
    <td align="left" bgcolor="#FFFFFF"><input name="kaipan_time" type="text" id="kaipan_time" value="<?=$rs['kaipan_time']?>" size="20" maxlength="19"/></td>
    <td align="left" bgcolor="#F0FFFF">封盘时间：</td>
    <td align="left" bgcolor="#FFFFFF"><input name="fenpan_time" type="text" id="fenpan_time" value="<?=$rs['fenpan_time']?>" size="20" maxlength="19"/></td>
    <td align="left" bgcolor="#F0FFFF">开奖时间：</td>
    <td align="left" bgcolor="#FFFFFF"><input name="kaijiang_time" type="text" id="kaijiang_time" value="<?=$rs['kaijiang_time']?>" size="20" maxlength="19"/></td>
</tr>
<tr>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="left" bgcolor="#FFFFFF" colspan="5"><input name="submit" type="submit" class="submit80" value="确认发布"/></td>
</tr>
</table>
</form>

<form name="form2" method="get" action="?1=1">
    <table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" >
        <tr style="background-color:#FFFFFF;">
            <td align="left">
                &nbsp;&nbsp;开奖期号：
                <input name="qishu_query" type="text" id="qishu_query" value="<?=$qishu_query?>" size="20" maxlength="11"/>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="submit" type="submit" class="submit80" value="搜索"/>
                &nbsp;&nbsp;&nbsp; <span style="font-size: 14px;color: red;">（排序按照编辑时间，不是按照期数或者开盘时间等！）</span>
            </td>
        </tr>
    </table>
</form>
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:2px;" bgcolor="#798EB9">
    <tr style="background-color:#3C4D82; color:#FFF">
        <td align="center"><strong>彩票类别</strong></td>
        <td align="center"><strong>彩票期号</strong></td>
        <td align="center"><strong>开盘时间</strong></td>
        <td align="center"><strong>封盘时间</strong></td>
        <td align="center"><strong>开奖时间</strong></td>
        <td align="center" height="25"><strong>操作</strong></td>
    </tr>
    <?php

    $sql = "SELECT id,qishu,create_time,kaipan_time,fenpan_time,kaijiang_time,prev_text
            FROM six_lottery_schedule ";
    if($qishu_query){
        $sql .= " WHERE qishu = '$qishu_query'";
    }
    $sql .= " ORDER BY create_time DESC LIMIT 0,100";
    $query	=	$mysqli->query($sql);
    while($rows = $query->fetch_array()){
        $color = "#FFFFFF";
        $over	 = "#EBEBEB";
        $out	 = "#ffffff";
        ?>
        <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
            <td height="25" align="center" valign="middle"><?=$lottery_type?></td>
            <td align="center" valign="middle"><?=$rows['qishu']?></td>
            <td align="center" valign="middle"><?=$rows['kaipan_time']?></td>
            <td align="center" valign="middle"><?=$rows['fenpan_time']?></td>
            <td align="center" valign="middle"><?=$rows['kaijiang_time']?></td>
            <td>
                <a href="?id=<?=$rows["id"]?>&qishu_query=<?=$qishu_query?>">编辑</a>
				<a onclick="return confirm('确定删除?');" href="?action=delete&id=<?=$rows["id"]?>&qishu_query=<?=$qishu_query?>">删除</a>
                <a onclick='queryResult_lhc("<?=$rows['id']?>")' title="查看修改记录"><font>查看记录</font></a>
                <input type="hidden" id="<?='prev_text'.$rows['id']?>" value="<?=$rows['prev_text']?>" />
            </td>
        </tr>
    <?php
    }
    ?>
</table></td>
</tr>
</table>
</div>
</body>
</html>