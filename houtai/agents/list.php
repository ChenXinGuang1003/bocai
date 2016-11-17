<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once("../common/login_check.php");
include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/app/member/class/user_group.php");
include_once($C_Patch."/include/newpage.php");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";
check_quanxian("查看代理信息");

$sql = "select id,agents_name,loginip,logintime,regtime,online,status,tel,email,agents_type from agents_list where 1=1";
$group_id = "";
if(isset($_GET["likevalue"]) && $_GET["likevalue"]!=""){
    if($_GET['selecttype']=="agents_name") $sql .= " and agents_name like '%".$_GET['likevalue']."%'";
    else $sql.=" and ".$_GET['selecttype']." like '%".$_GET['likevalue']."%'";
}
if(isset($_GET["is_login"])) $sql.="  and online=".$_GET["is_login"];
if(isset($_GET["is_stop"])) $sql.="  and status='".$_GET["is_stop"]."'";
$order	=	"";
if(isset($_GET["order"])) $order = $_GET["order"];
else $order = " regtime";
$desc		=	" order by $order desc";
$query		=	$mysqli->query($sql.$desc);
$sum		=	$mysqli->affected_rows; //总页数
$thisPage	=	1;
if($_GET['page']){
    $thisPage	=	$_GET['page'];
}
$page		=	new newPage();
$thisPage	=	$page->check_Page($thisPage,$sum,20,40);

$uid		=	'';
$i			=	1; //记录 uid 数
$start		=	($thisPage-1)*20+1;
$end		=	$thisPage*20;
while($row = $query->fetch_array()){
    if($i >= $start && $i <= $end){
        $uid .=	$row['id'].',';
    }
    if($i > $end) break;
    $i++;
}
?>
<HTML>
<HEAD>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
    <TITLE>代理列表</TITLE>
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
        .STYLE4 {
            color: #FF0000;
            font-size: 12px;
        }
    </STYLE>
</HEAD>
<script>
    function ckall(){
        for (var i=0;i<document.form2.elements.length;i++){
            var e = document.form2.elements[i];
            if (e.name != 'checkall') e.checked = document.form2.checkall.checked;
        }
    }

    function check(){
        var len = document.form2.elements.length;
        var num = false;
        for(var i=0;i<len;i++){
            var e = document.form2.elements[i];
            if(e.checked && e.name=='uid[]'){
                num = true;
                break;
            }
        }
        if(num){
            var action = document.getElementById("s_action").value;
            if(action=="0"){
                alert("请您选择要执行的相关操作！");
                return false;
            }else{
                if(action=="2") document.form2.action="stopagent.php?go=0&page=<?=$thisPage?>";
                if(action=="1") document.form2.action="stopagent.php?go=1&page=<?=$thisPage?>";
                if(action=="3") document.form2.action="stopagent.php?go=3&page=<?=$thisPage?>";
                if(action=="5") document.form2.action="set_pwd.php";
                if(action=="4"){
                    if(confirm('确认取消该会员代理资格？取消后此代理的所有下级会员都不再属于该代理！')){
                        document.form2.action="stopagent.php?go=4&page=<?=$thisPage?>";
                    }else{
                        return false;
                    }
                }
                if(action=="6"){
                    if(confirm('确认删除该代理！')){
                        document.form2.action="delagent.php?go=6&page=<?=$thisPage?>";
                    }else{
                        return false;
                    }
                }
                if(action=="7"){
                    document.form2.action="set_usergroup.php";
                }
            }
        }else{
            alert("您未选中任何复选框");
            return false;
        }
    }
</script>
<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">代理管理：查看代理的信息</span></font></td>
    </tr>
    <tr>
        <td height="24" align="center" nowrap bgcolor="#FFFFFF">
            <table width="655">
                <form name="form1" method="GET" action="list.php" >
                    <tr>
                        <td>
                            &nbsp;&nbsp;综合类型：
                            <select name="selecttype" id="selecttype">
                                <option value="agents_name" <?php if(@$_GET["selecttype"]=='agents_name') {?> selected <?php }?> >用户名</option>
                                <option value="loginip" <?php if(@$_GET["selecttype"]=='loginip') {?> selected <?php }?>>登录ip</option>
                                <option value="tel" <?php if(@$_GET["selecttype"]=='tel') {?> selected <?php }?>>手机号码</option>
                            </select>
                            &nbsp;&nbsp;内容：
                            <input type="text" name="likevalue" value="<?=@$_GET['likevalue']?>"/>
                            &nbsp;
                            <input type="submit" value="查找"/>
                        </td>
                    </tr>   </form>
            </table>
        </td>
    </tr>
</table>
<form name="form2" method="post" action="" onSubmit="return check();" style="margin:0 0 0 0;">
    <table width="100%">
        <tr>
            <td width="104" align="center"><a href="?is_login=1">在线代理</a></td>
            <td width="104" align="center"><a href="?is_stop=异常">异常代理</a></td>
            <td width="104" align="center"><a href="?is_stop=停用">停用代理</a></td>
            <td width="104" align="center"><a href="?1=1">全部代理</a></td>
            <td width="254" align="right"><a href="agent_detail.php?1=1">新增代理</a></td>
            <td width="165" align="right">
                <span class="STYLE4">相关操作：</span>
                <select name="s_action" id="s_action">
                    <option value="0" selected="selected">选择确认</option>
                    <option value="2">启用代理</option>
                    <option value="1">停用代理</option>
                    <option value="5">修改密码</option>
                    <option value="6">删除代理</option>
                    <!--                    <option value="4" style="color:#FF0000;">取消代理</option>-->
                </select>
                <input type="submit" name="Submit2" value="执行"/></td>
        </tr>
    </table>
    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
            <td height="24" nowrap bgcolor="#FFFFFF">

                <table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >       <tr style="background-color: #EFE" class="t-title"  align="center">
                        <td width="5%" ><strong>代理ID</strong></td>
                        <td width="9%" height="20" ><strong>代理名</strong></td>
                        <td width="14%" ><strong>登陆时间/注册时间</strong></td>
						<td width="9%" ><strong>账户余额</strong></td>
                        <td width="9%" ><strong>登陆 ip</strong></td>
                        <td width="9%" ><strong>手机号码/邮箱</strong></td>
                        <td width="9%" ><strong>代理模式</strong></td>
                        <td width="9%" ><strong>查看下属会员</strong></td>
                        <td width="9%" ><strong>查看结算明细</strong></td>
                        <td width="9%" ><strong>结算代理</strong></td>
                        <td width="6%" ><strong><a href="?order=online ">状态</a></strong></td>
                        <td width="4%" ><input name="checkall" type="checkbox" id="checkall" onClick="return ckall();"/></td>
                    </tr>
                    <?php
                    if($uid){
                        $uid	=	rtrim($uid,',');
                        $sql = "select id,agents_name,loginip,money,logintime,regtime,online,status,tel,email,agents_type from agents_list where id in($uid)".$desc;
                        $query	=	$mysqli->query($sql);
                        while($rows = $query->fetch_array()){
                            $over	= "#EBEBEB";
                            $out	= "#ffffff";
                            $color	= "#FFFFFF";
                            if($rows["status"]=="停用"){ //停用和删除会员都是灰色
                                $color = $over = $out = "#EBEBEB";
                            }
                            ?>
                            <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>">
                                <td><?=$rows["id"]?></td>
                                <td><a href="agent_detail.php?id=<?=$rows["id"]?>"><span style="color:#F37605;"><?=$rows["agents_name"]?></span></a></td>
                                <td><?=$rows["logintime"]?><br/><?=$rows["regtime"]?></td>
                                <td><?=$rows["money"]?></td>
								<td><?=str_replace("http://","",$rows["loginip"])?></td>
                                <td><a href="list.php?likevalue=<?=$rows["tel"]?>&selecttype=tel"><span style="color:#F37605;"><?=$rows["tel"]?></span></a><br /><?=$rows["email"]?></td>
                                <td><?=$rows["agents_type"]?></td>
                                <td><a href="agent_child_list.php?id=<?=$rows["id"]?>"><span style="color:#F37605;">查看下属会员</span></a></td>
                                <td><a href="account_list.php?id=<?=$rows["id"]?>"><span style="color:#F37605;">查看结算明细</span></a></td>
                                <td><a href="agent_jiesuan.php?id=<?=$rows["id"]?>"><span style="color:#F37605;">结算代理</span></a></td>
                                <td><?=$rows["online"]>0 ? "<span style=\"color:#FF00FF;\">在线</span>" : "<span style=\"color:#999999;\">离线</span>" ?><br/><?=$rows["status"]=="停用" ? "<span style=\"color: #FF0000;\">停用</span>" : ($rows["status"]=="异常" ? "<span style=\"color: #FF0000;\">异常</span>" : "<span style=\"color:#006600;\">正常</span>")?></td>
                                <td><input name="uid[]" type="checkbox" id="uid[]" value="<?=$rows["id"]?>" /></td>
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
</form>
</body>
</html>