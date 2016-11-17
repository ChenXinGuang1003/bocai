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

check_quanxian("加款扣款");
if($_GET["id"]){
    $id = $_GET["id"];
}

?>
<HTML>
<HEAD>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
    <TITLE>手工结算</TITLE>
    <link href="../images/css1/css.css" rel="stylesheet" type="text/css">
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
    </STYLE>
</HEAD>

<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">手工结算：对下属会员财务进行手工结算</span></font></td>
    </tr>
    <tr>
        <form method="get" action="<?=$_SERVER['PHP_SELF']?>">
            <td height="24" align="center" nowrap bgcolor="#FFFFFF">会员名：<input name="agentsname" type="text" size="20" maxlength="20" value="<?=$_GET['agentsname']?>"/>&nbsp;&nbsp;<input name="find" type="submit" id="find" value="查找"/></td>
        </form>
    </tr>
</table>
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <td height="24" nowrap bgcolor="#FFFFFF">
            <table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >       <tr style="background-color: #EFE" class="t-title"  align="center">
                    <td width="20%" height="20" align="center"><strong>会员名</strong></td>
                    <td width="20%"><strong>账户余额</strong></td>
                    <td colspan="2"><strong>操作</strong></td>
                </tr>
                <?php
                if(isset($_GET["agentsname"])){
                     $sql	=	"SELECT user_id,user_name,u.money FROM agents_list a,user_list u  WHERE a.id=$id AND a.id=u.top_id AND u.top_id!=0 AND  user_name='".$_GET['agentsname']."' limit 0,1";
					$query	=	$mysqli->query($sql);
					if($rows = $query->fetch_array()){
						?>
						<tr align="center">
							<td height="20" ><a href="../hygl/user_show.php?id=<?=$rows["user_id"]?>" target="_blank"><?=$rows["user_name"]?></a></td>
							<td><font color="#FF0000"><?=$rows["money"]?></font></td>
							<td width="31%" align="center"><a href="set_money.php?uid=<?=$rows["user_id"]?>&amp;type=add">加钱</a></td>
							<td width="29%" align="center"><a href="set_money.php?uid=<?=$rows["user_id"]?>&amp;type=min">扣钱</a></td>
						</tr>
                    <?php
                    }
                }
                ?>
            </table>
        </td>
    </tr>
</table>
</body>
</html>