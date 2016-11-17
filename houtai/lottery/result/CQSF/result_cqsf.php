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

include_once("../../../class/admin.php");
include_once("../../../common/login_check.php");
include_once("../Js_Class.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

check_quanxian("手工录入彩票结果");

$id	=	0;
$query_time = date("Y-m-d",time());
$qishu_query = "";
if($_GET['id'] > 0){
    $id	=	$_GET['id'];
}
if($_GET['s_time']){
    $query_time = $_GET['s_time'];
}
if($_GET['qishu_query']){
    $qishu_query = $_GET['qishu_query'];
}
$lottery_type = "重庆十分彩";
if($_GET["action"]=="add" && $id==0){
    $create_time = date("Y-m-d H:i:s",time());
    $qishu		=	$_POST["qishu"];
    $datetime	=	$_POST["datetime"];
    $ball_1		=	$_POST["ball_1"];
    $ball_2		=	$_POST["ball_2"];
    $ball_3		=	$_POST["ball_3"];
    $ball_4		=	$_POST["ball_4"];
    $ball_5		=	$_POST["ball_5"];
    $ball_6		=	$_POST["ball_6"];
    $ball_7		=	$_POST["ball_7"];
    $ball_8		=	$_POST["ball_8"];
    $sql = "select id from lottery_result_cqsf where qishu='$qishu'";
    $query = $mysqli->query($sql);
    $row    =	$query->fetch_array();
    if($row && $row["id"]){
        message("该期彩票结果已存在，请查询后编辑。","result_cqsf.php?s_time=$query_time");
    }else{
        $sql		=	"insert into lottery_result_cqsf(qishu,create_time,datetime,ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8) values (".$qishu.",'".$create_time."','".$datetime."',".$ball_1.",".$ball_2.",".$ball_3.",".$ball_4.",".$ball_5.",".$ball_6.",".$ball_7.",".$ball_8.")";
        $mysqli->query($sql);
    }
}elseif($_GET["action"]=="edit" && $id>0){
    $sql		=	"select * from lottery_result_cqsf WHERE id='$id'";
    $query	=	$mysqli->query($sql);
    $row    =	$query->fetch_array();
    $prev_text = "修改时间：".(date("Y-m-d H:i:s",time()))."。\n修改前内容：".$row["ball_1"].",".$row["ball_2"].",".$row["ball_3"].",".$row["ball_4"].",".$row["ball_5"].",".$row["ball_6"].",".$row["ball_7"].",".$row["ball_8"]."。\n修改后内容：".$_POST["ball_1"].",".$_POST["ball_2"].",".$_POST["ball_3"].",".$_POST["ball_4"].",".$_POST["ball_5"].",".$_POST["ball_6"].",".$_POST["ball_7"].",".$_POST["ball_8"]."。".'\n\n'.$row["prev_text"];

    $qishu		=	$_POST["qishu"];
    $datetime	=	$_POST["datetime"];
    $ball_1		=	$_POST["ball_1"];
    $ball_2		=	$_POST["ball_2"];
    $ball_3		=	$_POST["ball_3"];
    $ball_4		=	$_POST["ball_4"];
    $ball_5		=	$_POST["ball_5"];
    $ball_6		=	$_POST["ball_6"];
    $ball_7		=	$_POST["ball_7"];
    $ball_8		=	$_POST["ball_8"];
    $sql		=	"update lottery_result_cqsf set prev_text='".$prev_text."', qishu=".$qishu.",datetime='".$datetime."',ball_1=".$ball_1.",ball_2=".$ball_2.",ball_3=".$ball_3.",ball_4=".$ball_4.",ball_5=".$ball_5.",ball_6=".$ball_6.",ball_7=".$ball_7.",ball_8=".$ball_8." where id=".$id."";
    $mysqli->query($sql);
}
?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <link rel="stylesheet" href="../../../images/css/admin_style_1.css" type="text/css" media="all" />
    <script language="javascript" src="../../../js/jquery-1.7.2.min.js"></script>
    <script language="javascript" src="query_cqsf.js"></script>
    <script language="JavaScript" src="/js/calendar.js"></script>
</head>
<body>
<div id="pageMain">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td valign="top">
<form name="form1" onSubmit="return check_submit();" method="post" action="?id=<?=$id?>&action=<?=$id>0 ? 'edit' : 'add'?>&s_time=<?=$query_time?>&qishu_query=<?=$qishu_query?>">
<?php
if($id>0 && !isset($_GET['action'])){
    $sql = "SELECT id,qishu,create_time,datetime,state,prev_text,
            ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8
            FROM lottery_result_cqsf WHERE id=$id limit 0,1";
    $query	=	$mysqli->query($sql);
    $rs		=	$query->fetch_array();
}
?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
<tr>
    <td  align="left" bgcolor="#3C4D82" style="color:#FFF">彩票类别：</td>
    <td  align="left" bgcolor="#3C4D82" style="color:#FFF"><strong>重庆十分彩</strong></td>
</tr>
<tr>
    <td width="60"  align="left" bgcolor="#F0FFFF">开奖期号：</td>
    <td  align="left" bgcolor="#FFFFFF"><input name="qishu" type="text" id="qishu" value="<?=$rs['qishu']?>" size="20" maxlength="16"/></td>
</tr>
<tr>
    <td align="left" bgcolor="#F0FFFF">开奖时间：</td>
    <td align="left" bgcolor="#FFFFFF"><input name="datetime" type="text" id="datetime" value="<?=$rs['datetime']?>" size="20" maxlength="19"/> 注意：时间格式务必填写正确，如2014-10-10 10:10:10</td>
</tr>
<tr>
    <td align="left" bgcolor="#F0FFFF">开奖号码：</td>
    <td align="left" bgcolor="#FFFFFF"><select name="ball_1" id="ball_1">
            <option value="1" <?=$rs['ball_1']==1 ? 'selected' : ''?>>1</option>
            <option value="2" <?=$rs['ball_1']==2 ? 'selected' : ''?>>2</option>
            <option value="3" <?=$rs['ball_1']==3 ? 'selected' : ''?>>3</option>
            <option value="4" <?=$rs['ball_1']==4 ? 'selected' : ''?>>4</option>
            <option value="5" <?=$rs['ball_1']==5 ? 'selected' : ''?>>5</option>
            <option value="6" <?=$rs['ball_1']==6 ? 'selected' : ''?>>6</option>
            <option value="7" <?=$rs['ball_1']==7 ? 'selected' : ''?>>7</option>
            <option value="8" <?=$rs['ball_1']==8 ? 'selected' : ''?>>8</option>
            <option value="9" <?=$rs['ball_1']==9 ? 'selected' : ''?>>9</option>
            <option value="10" <?=$rs['ball_1']==10 ? 'selected' : ''?>>10</option>
            <option value="11" <?=$rs['ball_1']==11 ? 'selected' : ''?>>11</option>
            <option value="12" <?=$rs['ball_1']==12 ? 'selected' : ''?>>12</option>
            <option value="13" <?=$rs['ball_1']==13 ? 'selected' : ''?>>13</option>
            <option value="14" <?=$rs['ball_1']==14 ? 'selected' : ''?>>14</option>
            <option value="15" <?=$rs['ball_1']==15 ? 'selected' : ''?>>15</option>
            <option value="16" <?=$rs['ball_1']==16 ? 'selected' : ''?>>16</option>
            <option value="17" <?=$rs['ball_1']==17 ? 'selected' : ''?>>17</option>
            <option value="18" <?=$rs['ball_1']==18 ? 'selected' : ''?>>18</option>
            <option value="19" <?=$rs['ball_1']==19 ? 'selected' : ''?>>19</option>
            <option value="20" <?=$rs['ball_1']==20 ? 'selected' : ''?>>20</option>
            <option value="" <?=$rs['ball_1']=='' ? 'selected' : ''?>>第一球</option>
        </select>
        <select name="ball_2" id="ball_2">
            <option value="1" <?=$rs['ball_2']==1 ? 'selected' : ''?>>1</option>
            <option value="2" <?=$rs['ball_2']==2 ? 'selected' : ''?>>2</option>
            <option value="3" <?=$rs['ball_2']==3 ? 'selected' : ''?>>3</option>
            <option value="4" <?=$rs['ball_2']==4 ? 'selected' : ''?>>4</option>
            <option value="5" <?=$rs['ball_2']==5 ? 'selected' : ''?>>5</option>
            <option value="6" <?=$rs['ball_2']==6 ? 'selected' : ''?>>6</option>
            <option value="7" <?=$rs['ball_2']==7 ? 'selected' : ''?>>7</option>
            <option value="8" <?=$rs['ball_2']==8 ? 'selected' : ''?>>8</option>
            <option value="9" <?=$rs['ball_2']==9 ? 'selected' : ''?>>9</option>
            <option value="10" <?=$rs['ball_2']==10 ? 'selected' : ''?>>10</option>
            <option value="11" <?=$rs['ball_2']==11 ? 'selected' : ''?>>11</option>
            <option value="12" <?=$rs['ball_2']==12 ? 'selected' : ''?>>12</option>
            <option value="13" <?=$rs['ball_2']==13 ? 'selected' : ''?>>13</option>
            <option value="14" <?=$rs['ball_2']==14 ? 'selected' : ''?>>14</option>
            <option value="15" <?=$rs['ball_2']==15 ? 'selected' : ''?>>15</option>
            <option value="16" <?=$rs['ball_2']==16 ? 'selected' : ''?>>16</option>
            <option value="17" <?=$rs['ball_2']==17 ? 'selected' : ''?>>17</option>
            <option value="18" <?=$rs['ball_2']==18 ? 'selected' : ''?>>18</option>
            <option value="19" <?=$rs['ball_2']==19 ? 'selected' : ''?>>19</option>
            <option value="20" <?=$rs['ball_2']==20 ? 'selected' : ''?>>20</option>
            <option value="" <?=$rs['ball_2']=='' ? 'selected' : ''?>>第二球</option>
        </select>
        <select name="ball_3" id="ball_3">
            <option value="1" <?=$rs['ball_3']==1 ? 'selected' : ''?>>1</option>
            <option value="2" <?=$rs['ball_3']==2 ? 'selected' : ''?>>2</option>
            <option value="3" <?=$rs['ball_3']==3 ? 'selected' : ''?>>3</option>
            <option value="4" <?=$rs['ball_3']==4 ? 'selected' : ''?>>4</option>
            <option value="5" <?=$rs['ball_3']==5 ? 'selected' : ''?>>5</option>
            <option value="6" <?=$rs['ball_3']==6 ? 'selected' : ''?>>6</option>
            <option value="7" <?=$rs['ball_3']==7 ? 'selected' : ''?>>7</option>
            <option value="8" <?=$rs['ball_3']==8 ? 'selected' : ''?>>8</option>
            <option value="9" <?=$rs['ball_3']==9 ? 'selected' : ''?>>9</option>
            <option value="10" <?=$rs['ball_3']==10 ? 'selected' : ''?>>10</option>
            <option value="11" <?=$rs['ball_3']==11 ? 'selected' : ''?>>11</option>
            <option value="12" <?=$rs['ball_3']==12 ? 'selected' : ''?>>12</option>
            <option value="13" <?=$rs['ball_3']==13 ? 'selected' : ''?>>13</option>
            <option value="14" <?=$rs['ball_3']==14 ? 'selected' : ''?>>14</option>
            <option value="15" <?=$rs['ball_3']==15 ? 'selected' : ''?>>15</option>
            <option value="16" <?=$rs['ball_3']==16 ? 'selected' : ''?>>16</option>
            <option value="17" <?=$rs['ball_3']==17 ? 'selected' : ''?>>17</option>
            <option value="18" <?=$rs['ball_3']==18 ? 'selected' : ''?>>18</option>
            <option value="19" <?=$rs['ball_3']==19 ? 'selected' : ''?>>19</option>
            <option value="20" <?=$rs['ball_3']==20 ? 'selected' : ''?>>20</option>
            <option value="" <?=$rs['ball_3']=='' ? 'selected' : ''?>>第三球</option>
        </select>
        <select name="ball_4" id="ball_4">
            <option value="1" <?=$rs['ball_4']==1 ? 'selected' : ''?>>1</option>
            <option value="2" <?=$rs['ball_4']==2 ? 'selected' : ''?>>2</option>
            <option value="3" <?=$rs['ball_4']==3 ? 'selected' : ''?>>3</option>
            <option value="4" <?=$rs['ball_4']==4 ? 'selected' : ''?>>4</option>
            <option value="5" <?=$rs['ball_4']==5 ? 'selected' : ''?>>5</option>
            <option value="6" <?=$rs['ball_4']==6 ? 'selected' : ''?>>6</option>
            <option value="7" <?=$rs['ball_4']==7 ? 'selected' : ''?>>7</option>
            <option value="8" <?=$rs['ball_4']==8 ? 'selected' : ''?>>8</option>
            <option value="9" <?=$rs['ball_4']==9 ? 'selected' : ''?>>9</option>
            <option value="10" <?=$rs['ball_4']==10 ? 'selected' : ''?>>10</option>
            <option value="11" <?=$rs['ball_4']==11 ? 'selected' : ''?>>11</option>
            <option value="12" <?=$rs['ball_4']==12 ? 'selected' : ''?>>12</option>
            <option value="13" <?=$rs['ball_4']==13 ? 'selected' : ''?>>13</option>
            <option value="14" <?=$rs['ball_4']==14 ? 'selected' : ''?>>14</option>
            <option value="15" <?=$rs['ball_4']==15 ? 'selected' : ''?>>15</option>
            <option value="16" <?=$rs['ball_4']==16 ? 'selected' : ''?>>16</option>
            <option value="17" <?=$rs['ball_4']==17 ? 'selected' : ''?>>17</option>
            <option value="18" <?=$rs['ball_4']==18 ? 'selected' : ''?>>18</option>
            <option value="19" <?=$rs['ball_4']==19 ? 'selected' : ''?>>19</option>
            <option value="20" <?=$rs['ball_4']==20 ? 'selected' : ''?>>20</option>
            <option value="" <?=$rs['ball_4']=='' ? 'selected' : ''?>>第四球</option>
        </select>
        <select name="ball_5" id="ball_5">
            <option value="1" <?=$rs['ball_5']==1 ? 'selected' : ''?>>1</option>
            <option value="2" <?=$rs['ball_5']==2 ? 'selected' : ''?>>2</option>
            <option value="3" <?=$rs['ball_5']==3 ? 'selected' : ''?>>3</option>
            <option value="4" <?=$rs['ball_5']==4 ? 'selected' : ''?>>4</option>
            <option value="5" <?=$rs['ball_5']==5 ? 'selected' : ''?>>5</option>
            <option value="6" <?=$rs['ball_5']==6 ? 'selected' : ''?>>6</option>
            <option value="7" <?=$rs['ball_5']==7 ? 'selected' : ''?>>7</option>
            <option value="8" <?=$rs['ball_5']==8 ? 'selected' : ''?>>8</option>
            <option value="9" <?=$rs['ball_5']==9 ? 'selected' : ''?>>9</option>
            <option value="10" <?=$rs['ball_5']==10 ? 'selected' : ''?>>10</option>
            <option value="11" <?=$rs['ball_5']==11 ? 'selected' : ''?>>11</option>
            <option value="12" <?=$rs['ball_5']==12 ? 'selected' : ''?>>12</option>
            <option value="13" <?=$rs['ball_5']==13 ? 'selected' : ''?>>13</option>
            <option value="14" <?=$rs['ball_5']==14 ? 'selected' : ''?>>14</option>
            <option value="15" <?=$rs['ball_5']==15 ? 'selected' : ''?>>15</option>
            <option value="16" <?=$rs['ball_5']==16 ? 'selected' : ''?>>16</option>
            <option value="17" <?=$rs['ball_5']==17 ? 'selected' : ''?>>17</option>
            <option value="18" <?=$rs['ball_5']==18 ? 'selected' : ''?>>18</option>
            <option value="19" <?=$rs['ball_5']==19 ? 'selected' : ''?>>19</option>
            <option value="20" <?=$rs['ball_5']==20 ? 'selected' : ''?>>20</option>
            <option value="" <?=$rs['ball_5']=='' ? 'selected' : ''?>>第五球</option>
        </select>
        <select name="ball_6" id="ball_6">
            <option value="1" <?=$rs['ball_6']==1 ? 'selected' : ''?>>1</option>
            <option value="2" <?=$rs['ball_6']==2 ? 'selected' : ''?>>2</option>
            <option value="3" <?=$rs['ball_6']==3 ? 'selected' : ''?>>3</option>
            <option value="4" <?=$rs['ball_6']==4 ? 'selected' : ''?>>4</option>
            <option value="5" <?=$rs['ball_6']==5 ? 'selected' : ''?>>5</option>
            <option value="6" <?=$rs['ball_6']==6 ? 'selected' : ''?>>6</option>
            <option value="7" <?=$rs['ball_6']==7 ? 'selected' : ''?>>7</option>
            <option value="8" <?=$rs['ball_6']==8 ? 'selected' : ''?>>8</option>
            <option value="9" <?=$rs['ball_6']==9 ? 'selected' : ''?>>9</option>
            <option value="10" <?=$rs['ball_6']==10 ? 'selected' : ''?>>10</option>
            <option value="11" <?=$rs['ball_6']==11 ? 'selected' : ''?>>11</option>
            <option value="12" <?=$rs['ball_6']==12 ? 'selected' : ''?>>12</option>
            <option value="13" <?=$rs['ball_6']==13 ? 'selected' : ''?>>13</option>
            <option value="14" <?=$rs['ball_6']==14 ? 'selected' : ''?>>14</option>
            <option value="15" <?=$rs['ball_6']==15 ? 'selected' : ''?>>15</option>
            <option value="16" <?=$rs['ball_6']==16 ? 'selected' : ''?>>16</option>
            <option value="17" <?=$rs['ball_6']==17 ? 'selected' : ''?>>17</option>
            <option value="18" <?=$rs['ball_6']==18 ? 'selected' : ''?>>18</option>
            <option value="19" <?=$rs['ball_6']==19 ? 'selected' : ''?>>19</option>
            <option value="20" <?=$rs['ball_6']==20 ? 'selected' : ''?>>20</option>
            <option value="" <?=$rs['ball_6']=='' ? 'selected' : ''?>>第六球</option>
        </select>
        <select name="ball_7" id="ball_7">
            <option value="1" <?=$rs['ball_7']==1 ? 'selected' : ''?>>1</option>
            <option value="2" <?=$rs['ball_7']==2 ? 'selected' : ''?>>2</option>
            <option value="3" <?=$rs['ball_7']==3 ? 'selected' : ''?>>3</option>
            <option value="4" <?=$rs['ball_7']==4 ? 'selected' : ''?>>4</option>
            <option value="5" <?=$rs['ball_7']==5 ? 'selected' : ''?>>5</option>
            <option value="6" <?=$rs['ball_7']==6 ? 'selected' : ''?>>6</option>
            <option value="7" <?=$rs['ball_7']==7 ? 'selected' : ''?>>7</option>
            <option value="8" <?=$rs['ball_7']==8 ? 'selected' : ''?>>8</option>
            <option value="9" <?=$rs['ball_7']==9 ? 'selected' : ''?>>9</option>
            <option value="10" <?=$rs['ball_7']==10 ? 'selected' : ''?>>10</option>
            <option value="11" <?=$rs['ball_7']==11 ? 'selected' : ''?>>11</option>
            <option value="12" <?=$rs['ball_7']==12 ? 'selected' : ''?>>12</option>
            <option value="13" <?=$rs['ball_7']==13 ? 'selected' : ''?>>13</option>
            <option value="14" <?=$rs['ball_7']==14 ? 'selected' : ''?>>14</option>
            <option value="15" <?=$rs['ball_7']==15 ? 'selected' : ''?>>15</option>
            <option value="16" <?=$rs['ball_7']==16 ? 'selected' : ''?>>16</option>
            <option value="17" <?=$rs['ball_7']==17 ? 'selected' : ''?>>17</option>
            <option value="18" <?=$rs['ball_7']==18 ? 'selected' : ''?>>18</option>
            <option value="19" <?=$rs['ball_7']==19 ? 'selected' : ''?>>19</option>
            <option value="20" <?=$rs['ball_7']==20 ? 'selected' : ''?>>20</option>
            <option value="" <?=$rs['ball_7']=='' ? 'selected' : ''?>>第七球</option>
        </select>
        <select name="ball_8" id="ball_8">
            <option value="1" <?=$rs['ball_8']==1 ? 'selected' : ''?>>1</option>
            <option value="2" <?=$rs['ball_8']==2 ? 'selected' : ''?>>2</option>
            <option value="3" <?=$rs['ball_8']==3 ? 'selected' : ''?>>3</option>
            <option value="4" <?=$rs['ball_8']==4 ? 'selected' : ''?>>4</option>
            <option value="5" <?=$rs['ball_8']==5 ? 'selected' : ''?>>5</option>
            <option value="6" <?=$rs['ball_8']==6 ? 'selected' : ''?>>6</option>
            <option value="7" <?=$rs['ball_8']==7 ? 'selected' : ''?>>7</option>
            <option value="8" <?=$rs['ball_8']==8 ? 'selected' : ''?>>8</option>
            <option value="9" <?=$rs['ball_8']==9 ? 'selected' : ''?>>9</option>
            <option value="10" <?=$rs['ball_8']==10 ? 'selected' : ''?>>10</option>
            <option value="11" <?=$rs['ball_8']==11 ? 'selected' : ''?>>11</option>
            <option value="12" <?=$rs['ball_8']==12 ? 'selected' : ''?>>12</option>
            <option value="13" <?=$rs['ball_8']==13 ? 'selected' : ''?>>13</option>
            <option value="14" <?=$rs['ball_8']==14 ? 'selected' : ''?>>14</option>
            <option value="15" <?=$rs['ball_8']==15 ? 'selected' : ''?>>15</option>
            <option value="16" <?=$rs['ball_8']==16 ? 'selected' : ''?>>16</option>
            <option value="17" <?=$rs['ball_8']==17 ? 'selected' : ''?>>17</option>
            <option value="18" <?=$rs['ball_8']==18 ? 'selected' : ''?>>18</option>
            <option value="19" <?=$rs['ball_8']==19 ? 'selected' : ''?>>19</option>
            <option value="20" <?=$rs['ball_8']==20 ? 'selected' : ''?>>20</option>
            <option value="" <?=$rs['ball_8']=='' ? 'selected' : ''?>>第八球</option>
        </select></td>
</tr>
<tr>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="left" bgcolor="#FFFFFF"><input name="submit" type="submit" class="submit80" value="确认发布"/></td>
</tr>
</table>
</form>

<form name="form2" onSubmit="return queryLottery();" method="get" action="?1=1">
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" >
    <tr style="background-color:#FFFFFF;">
        <td align="left">
            &nbsp;&nbsp;开奖期号：
            <input name="qishu_query" type="text" id="qishu_query" value="<?=$qishu_query?>" size="20" maxlength="11"/>
            &nbsp;&nbsp;日期：
            <input name="s_time" type="text" id="s_time" value="<?=$query_time?>" onClick="new Calendar(2010,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input name="submit" type="submit" class="submit80" value="搜索"/>
        </td>
    </tr>
</table>
</form>
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:2px;" bgcolor="#798EB9">
    <tr style="background-color:#3C4D82; color:#FFF">
        <td align="center"><strong>彩票类别</strong></td>
        <td align="center"><strong>彩票期号</strong></td>
        <td align="center"><strong>开奖时间</strong></td>
        <td align="center"><strong>第一球</strong></td>
        <td align="center"><strong>第二球</strong></td>
        <td align="center"><strong>第三球</strong></td>
        <td align="center"><strong>第四球</strong></td>
        <td height="25" align="center"><strong>第五球</strong></td>
        <td align="center"><strong>第六球</strong></td>
        <td align="center"><strong>第七球</strong></td>
        <td align="center"><strong>第八球</strong></td>
        <td align="center">结算</td>
        <td align="center"><strong>重算</strong></td>
        <td align="center"><strong>操作</strong></td>
    </tr>
    <?php
    $sql = "SELECT id,qishu,create_time,datetime,state,prev_text,
        ball_1,ball_2,ball_3,ball_4,ball_5,ball_6,ball_7,ball_8
        FROM lottery_result_cqsf WHERE DATE_FORMAT(datetime,'%Y-%m-%d') = '$query_time'";
    if($qishu_query){
        $sql .= " AND qishu = '$qishu_query'";
    }
    $sql .= "ORDER BY qishu DESC";
    $query	=	$mysqli->query($sql);
    while($rows = $query->fetch_array()){
        $color = "#FFFFFF";
        $over	 = "#EBEBEB";
        $out	 = "#ffffff";
        $hm 		= array();
        $hm[]		= BuLing($rows['ball_1']);
        $hm[]		= BuLing($rows['ball_2']);
        $hm[]		= BuLing($rows['ball_3']);
        $hm[]		= BuLing($rows['ball_4']);
        $hm[]		= BuLing($rows['ball_5']);
        $hm[]		= BuLing($rows['ball_6']);
        $hm[]		= BuLing($rows['ball_7']);
        $hm[]		= BuLing($rows['ball_8']);
        if($rows['state']=="0"){
            $ok = '<a href="js_cqsf.php?qi='.$rows['qishu'].'&jsType=0&s_time='.$query_time.'" title="点击结算"><font color="#0000FF">未结算</font></a>';
        }else{
            $ok = '<a href="js_cqsf.php?qi='.$rows['qishu'].'&jsType=1&s_time='.$query_time.'" title="重新结算"><font color="#FF0000">已结算</font></a>';
        }
        if($rows['state']=="2"){
            $again = '<font color="#FF0000" style="font-size:18px">√</font>';
        }else{
            $again = '<font color="#0000FF" style="font-size:20px">×</font>';
        }
        ?>
        <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
            <td height="25" align="center" valign="middle">重庆十分彩</td>
            <td align="center" valign="middle"><?=$rows['qishu']?></td>
            <td align="center" valign="middle"><?=$rows['datetime']?></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_1/<?=BuLing($rows['ball_1'])?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_1/<?=BuLing($rows['ball_2'])?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_1/<?=BuLing($rows['ball_3'])?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_1/<?=BuLing($rows['ball_4'])?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_1/<?=BuLing($rows['ball_5'])?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_1/<?=BuLing($rows['ball_6'])?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_1/<?=BuLing($rows['ball_7'])?>.png"></td>
            <td align="center" valign="middle"><img src="/images/Lottery/Images/Ball_1/<?=BuLing($rows['ball_8'])?>.png"></td>
            <td><?=$ok?></td>
            <td><?=$again?></td>
            <td>
                <a href="?id=<?=$rows["id"]?>&s_time=<?=$query_time?>&qishu_query=<?=$qishu_query?>">编辑</a>
                <a onclick='queryResult("<?=$rows['id']?>")' title="查看修改记录"><font>查看记录</font></a>
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