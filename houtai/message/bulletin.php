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
include_once("../../include/newpage.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

check_quanxian("消息管理");


$nid	=	0;
if($_GET['nid'] > 0){
    $nid	=	$_GET['nid'];
}
if($_GET["action"]=="add" && $nid==0){
    $msg		=	$_POST["msg"];
    $end_time	=	$_POST["end_time"];
    $is_show	=	$_POST["is_show"];
    $sort		=	$_POST["sort"];
    $sql		=	"insert into sys_announcement2(content,end_time,is_show,`sort`) values ('$msg','$end_time',$is_show,$sort)";
    $mysqli->query($sql);
}elseif($_GET["action"]=="edit" && $nid>0){
    $msg		=	$_POST["msg"];
    $end_time	=	$_POST["end_time"];
    $is_show	=	$_POST["is_show"];
    $sort		=	$_POST["sort"];
    $sql		=	"update sys_announcement2 set content='$msg',end_time='$end_time',is_show=$is_show,`sort`=$sort where id=$nid";
    $mysqli->query($sql);
}
?>
<html>
<head>
    <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
    <TITLE>公告管理</TITLE>
    <link href="../images/css1/css.css" rel="stylesheet" type="text/css">
    <script language="javascript" src="/js/jquery-1.7.1.js"></script>
    <script language="javascript">
        function check_submit(){
            if($("#msg").val()==""){
                alert("请填写公告内容");
                $("#msg").focus();
                return false;
            }
            if($("#end_time").val()==""){
                alert("请填写有效时间");
                $("#end_time").focus();
                return false;
            }
            if($("#sort").val()==""){
                alert("请填写排序值");
                $("#sort").focus();
                return false;
            }
            return true;
        }
    </script>
    <style type="text/css">
        .STYLE2 {font-size: 12px}
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
        }
        td{font:13px/120% "宋体";padding:3px;}
        a{color:#FFA93E;text-decoration: none;}
        /*.t-title{background:url(/super/images/06.gif);height:24px;}*/
        .t-title{height:24px;}
        .t-tilte td{font-weight:800;}
        .STYLE3 {color: #339900}
        .STYLE4 {color: #FF0000}
    </STYLE>
</HEAD>

<body>
<table width="100%" align="center"  id=editProduct   idth="100%" >
    <tr>
        <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">公告管理：管理网站公告信息</span></font></td>
    </tr>
    <tr>
        <td height="24" align="center" nowrap bgcolor="#FFFFFF">
            <form name="form1" onSubmit="return check_submit();" method="post" action="bulletin.php?nid=<?=$nid?>&action=<?=$nid>0 ? 'edit' : 'add'?>">
                <?php
                if($nid>0 && !isset($_GET['action'])){
                    $sql	=	"select * from sys_announcement2 where id=$nid limit 1";
                    $query	=	$mysqli->query($sql);
                    $rs		=	$query->fetch_array();
                }
                ?>
                <table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >
                    <tr>
                        <td  align="left">公告内容：</td>
                        <td colspan="5"  align="left"><textarea  id="msg" name="msg" rows="4" cols="100"><?=@$rs['content']?></textarea></td>
                    </tr>
                    <tr>
                        <td width="10%" align="left">有效时间：</td>
                        <td width="20%" align="left"><input name="end_time" id="end_time" type="text" value="<?=isset($rs['end_time']) ? $rs['end_time'] : date("Y-m-d H:i:s",strtotime("+1 week"))?>" size="20" maxlength="19"/></td>
                        <td width="10%" align="left">是否显示：</td>
                        <td width="20%" align="left">
                            <input name="is_show" type="radio" value="1" <?=$rs['is_show']==1 ? 'checked' : ''?><?=!isset($rs['is_show']) ? 'checked' : ''?>>
                            <span class="STYLE3">显示</span>&nbsp;&nbsp;
                            <input type="radio" name="is_show" value="0" <?=(isset($rs['is_show']) && $rs['is_show']==0) ? 'checked' : ''?>>
                            <span class="STYLE4">不显示</span></td>
                        <td width="10%" align="left">排序值：</td>
                        <td width="30%" align="left"><input name="sort" type="text" id="sort" value="<?=isset($rs['sort']) ? $rs['sort'] : '1'?>" size="4" maxlength="3" style="text-align:center;">
                            &nbsp;越大越靠前</td>
                    </tr>
                    <tr>
                        <td align="center">&nbsp;</td>
                        <td colspan="5" align="left"><input name="submit" type="submit" value="发布"/></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC"><tr><td ><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
                <tr>
                    <td height="24" nowrap bgcolor="#FFFFFF"><table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >
                            <tr style="background-color: #EFE">
                                <td width="86" align="center"><strong>发布时间</strong></td>
                                <td width="86" height="20" align="center"><strong>有效时间</strong></td>
                                <td width="839" align="center"><strong>内容</strong></td>
                                <td width="46" align="center"><strong>状态</strong></td>
                                <td width="46" align="center"><strong>编辑</strong></td>
                            </tr>
                            <?php
                            $sql		=	"select id from sys_announcement2 order by `sort` desc,id desc";
                            $query		=	$mysqli->query($sql);
                            $sum		=	$mysqli->affected_rows; //总页数
                            $thisPage	=	1;
                            if($_GET['page']){
                                $thisPage	=	$_GET['page'];
                            }
                            $page		=	new newPage();
                            $thisPage	=	$page->check_Page($thisPage,$sum,20,40);

                            $nid		=	'';
                            $i			=	1; //记录 uid 数
                            $start		=	($thisPage-1)*20+1;
                            $end		=	$thisPage*20;
                            while($row = $query->fetch_array()){
                                if($i >= $start && $i <= $end){
                                    $nid .=	$row['id'].',';
                                }
                                if($i > $end) break;
                                $i++;
                            }
                            if($nid){
                                $nid	=	rtrim($nid,',');
                                $sql	=	"select * from sys_announcement2 where id in($nid) order by `sort` desc,id desc";
                                $query	=	$mysqli->query($sql);
                                $time	=	time();
                                while($rows = $query->fetch_array()){
                                    $endtime	=	strtotime($rows['end_time']);
                                    ?>
                                    <tr onMouseOver="this.style.backgroundColor='#EBEBEB'" onMouseOut="this.style.backgroundColor='#FFFFFF'" style="background-color:#FFFFFF;">
                                        <td align="center" valign="middle"><?=date("m-d H:i",strtotime($rows["create_date"]))?></td>
                                        <td height="20" align="center" valign="middle"><?=date("m-d H:i",strtotime($rows["end_time"]))?></td>
                                        <td><?=$rows["content"]?></td>
                                        <td align="center"><?=$rows['is_show']==0 ? '<span class="STYLE4">不显示</span>' : $time>$endtime ? '<span class="STYLE4">不显示</span>' : '<span class="STYLE3">显示</span>'?></td>
                                        <td align="center"><a href="bulletin.php?nid=<?=$rows["id"]?>">编辑</a></td>
                                    </tr>
                                <?php
                                }
                            }
                            ?>
                        </table></td>
                </tr>
                <tr>
                    <td ><?=$page->get_htmlPage($_SERVER["REQUEST_URI"]);?></td>
                </tr>
            </table></td></tr>
</table>
</body>
</html>
