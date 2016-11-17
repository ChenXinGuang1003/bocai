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
check_quanxian("查看会员信息");

$all_group = user_group::getAllGroup();
$group_string = $group_string .= "<option value='all_group' selected>所有会员组</option>";
foreach($all_group as $key => $group){
    $group_id = $group["group_id"];
    $group_name = $group["group_name"];
    $group_string .= "<a title='$group_name' group='$group_id' href='#/config/$group_id'>$group_name</a>";
    if($_GET["user_group"]==$group_id){
        $group_string .= "<option value='$group_id' selected>$group_name</option>";
    }else{
        $group_string .= "<option value='$group_id' >$group_name</option>";
    }

}

if(isset($_GET["hpay"])){
    $sql	=	"select u.user_id,u.online as ul_type from user_list u left join money m on u.user_id=m.user_id  where m.order_value>0 ";
}else{
    $sql	=	"select u.user_id,u.online as ul_type from user_list u left join user_group g on u.group_id=g.group_id  where 1=1 ";
}
$group_id = "";
if($_GET['selecttype']=="group_name" && $_GET['likevalue']){
    $sql_2	=	"select group_id from user_group g where g.group_name='".$_GET['likevalue']."' limit 0,1";
    $query_2	=	$mysqli->query($sql_2);
    $row_2    =	 $query_2->fetch_array();
    $group_id    =	$row_2["group_id"];
}
if(isset($_GET["likevalue"])  && $_GET['likevalue']!=''){
    if($_GET['selecttype']=="user_name") $sql .= " and u.user_name like '%".$_GET['likevalue']."%'";
    elseif ($_GET['selecttype']=="group_name") $sql.=" and u.group_id='$group_id'";
    elseif ($_GET['selecttype']=="u_id") $sql.=" and u.user_id='".$_GET['likevalue']."'";
    else $sql.=" and u.".$_GET['selecttype']." like '%".$_GET['likevalue']."%'";
}
if(isset($_GET["is_login"])) $sql.="  and (u.online='1' or u.online='是')";
if(isset($_GET["loginurl"])) $sql.="  and u.loginurl='".$_GET["loginurl"]."'";
if(isset($_GET["regurl"])) $sql.="  and u.regurl='".$_GET["regurl"]."'";
if(isset($_GET["is_stop"])) $sql.="  and u.status='".$_GET["is_stop"]."'";
//if(isset($_GET["is_daili"])) $sql.="  and u.is_daili='".intval($_GET["is_daili"])."'";
if(isset($_GET["top_uid"])) $sql.="  and u.top_id=".$_GET["top_uid"];
if(isset($_GET["money"])) $sql.=" and u.money<0";
if(isset($_GET['month'])) $sql.=" and u.regtime like('".$_GET['month']."%')";
if(isset($_GET['user_group']) && $_GET['user_group']!="all_group") {
    $group_id = $_GET['user_group'];
    $sql.=" and u.group_id='$group_id'";
}
$order	=	"";
if(isset($_GET["order"])) $order = $_GET["order"];
else $order = "u.regtime";
$desc		=	" order by $order desc";
$query		=	$mysqli->query($sql." group by u.user_id ".$desc);
$sum		=	$mysqli->affected_rows; //总页数
$thisPage	=	1;
if($_GET['page']){
    $thisPage	=	$_GET['page'];
}
$page		=	new newPage();
$thisPage	=	$page->check_Page($thisPage,$sum,100,20);

$uid		=	'';
$i			=	1; //记录 uid 数
$start		=	($thisPage-1)*100+1;
$end		=	$thisPage*100;
while($row = $query->fetch_array()){
    if($i >= $start && $i <= $end){
        $uid .=	$row['user_id'].',';
    }
    if($i > $end) break;
    $i++;
}
?>
<HTML>
<HEAD>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
    <TITLE>用户列表</TITLE>
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
        var action = document.getElementById("s_action").value;
        if(num){
            if(action=="0"){
                alert("请您选择要执行的相关操作！");
                return false;
            }else{
                if(action=="2") document.form2.action="stopuser.php?go=0&page=<?=$thisPage?>";
                if(action=="1") document.form2.action="stopuser.php?go=1&page=<?=$thisPage?>";
                if(action=="3") document.form2.action="stopuser.php?go=3&page=<?=$thisPage?>";
                if(action=="5") document.form2.action="set_pwd.php";
                if(action=="4"){
                    if(confirm('确认取消该会员代理资格？取消后此代理的所有下级会员都不再属于该代理！')){
                        document.form2.action="stopuser.php?go=4&page=<?=$thisPage?>";
                    }else{
                        return false;
                    }
                }
                if(action=="6"){
                    if(confirm('确认删除该会员！')){
                        document.form2.action="deluser.php?go=6&page=<?=$thisPage?>";
                    }else{
                        return false;
                    }
                }
                if(action=="7"){
                    document.form2.action="set_usergroup.php";
                }
                if(action=="8"){
                   document.form2.action="set_agent.php?go=8&page=<?=$thisPage?>";
                }
                if(action=="9") document.form2.action="stopuser.php?go=9&page=<?=$thisPage?>";
                if(action=="10") document.form2.action="stopuser.php?go=10&page=<?=$thisPage?>";
                if(action=="11") document.form2.action="set_max_money.php?go=11&page=<?=$thisPage?>";
                if(action=="12"){
                    if(confirm('确认清空所选会员。清空会员会把该会员所有未结算的、异常的订单都清空。')){
                        document.form2.action="stopuser.php?go=12&page=<?=$thisPage?>";
                    }else{
                        return false;
                    }
                }
            }
        }else if(action=="13"){
            if(confirm('确认启用所有会员？')){
                document.form2.action="start_all_user.php?go=13&page=<?=$thisPage?>";
            }else{
                return false;
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
        <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">用户管理：查看用户的信息</span></font></td>
    </tr>
    <tr>
        <td height="24" align="center" nowrap bgcolor="#FFFFFF">
            <table width="655">
                <form name="form1" method="GET" action="list.php" >
                    <tr>
                        <td>
                            &nbsp;&nbsp;会员组：
                            <select name="user_group" id="user_group">
                                <?=$group_string?>
                            </select>
                            &nbsp;&nbsp;综合类型：
                            <select name="selecttype" id="selecttype">
                                <option value="user_name" <?php if(@$_GET["selecttype"]=='username') {?> selected <?php }?> >用户名</option>
                                <option value="pay_name" <?php if(@$_GET["selecttype"]=='pay_name') {?> selected <?php }?> >真实姓名</option>
                                <option value="regip" <?php if(@$_GET["selecttype"]=='regip') {?> selected <?php }?>>注册IP</option>
                                <option value="loginip" <?php if(@$_GET["selecttype"]=='loginip') {?> selected <?php }?>>登录ip</option>
                                <option value="regaddress" <?php if(@$_GET["selecttype"]=='regaddress') {?> selected <?php }?>>省份</option>
                                <option value="tel" <?php if(@$_GET["selecttype"]=='tel') {?> selected <?php }?>>手机号码</option>
                                <option value="u_id" <?php if(@$_GET["selecttype"]=='u_id') {?> selected <?php }?>>用户ID</option>
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
            <td width="104" align="center"><a href="?is_login=1">在线会员</a></td>
            <td width="104" align="center"><a href="?is_stop=异常">异常会员</a></td>
            <td width="104" align="center"><a href="?is_stop=停用">停用会员</a></td>
            <td width="104" align="center"><a href="?1=1">全部会员</a></td>
<!--            <td width="104" align="center"><a href="?is_daili=1">代理</a></td>-->
            <td width="104" align="center"><a href="mobile.php">危险手机号</a></td>
            <td width="104" align="center"><a href="?hpay=1">有充值过的</a></td>
            <td width="365" align="right"><span class="STYLE4">相关操作：</span>
                <select name="s_action" id="s_action">
                    <option value="0" selected="selected">选择确认</option>
                    <option value="2">启用会员</option>
                    <option value="13">启用所有会员</option>
                    <option value="1">停用会员</option>
                    <option value="5">修改密码</option>
                    <option value="3">踢线</option>
                    <option value="7">设置会员组</option>
                    <option value="8">设置所属代理</option>
                    <option value="12">清空会员投注额</option>
                    <option value="11">设置当期下注最大金额</option>
                    <option value="9">允许转账到真人</option>
                    <option value="10">不允许转账到真人</option>
                    <option value="6">删除会员</option>
<!--                    <option value="4" style="color:#FF0000;">取消代理</option>-->
                </select>
                <input type="submit" name="Submit2" value="执行"/></td>
        </tr>
    </table>
    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
            <td height="24" nowrap bgcolor="#FFFFFF">

                <table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >       <tr style="background-color: #EFE" class="t-title"  align="center">
                        <td width="11%" height="20" ><strong>用户名/密码</strong></td>
                        <td width="10%" ><strong>姓名/注册时间</strong></td>
                        <td width="8%" ><strong>财务/<a href="list.php?order=money">余额</a></strong></td>
                        <td width="12%" ><strong>注册/登陆 ip</strong></td>
                        <td width="12%" ><strong>注册/登陆 网址</strong></td>
                        <td width="10%" ><strong>手机号码/邮箱</strong></td>
                        <td width="10%" ><strong>所属代理ID</strong></td>
                        <td width="8%" ><strong>转账到真人</strong></td>
                        <td width="10%" ><strong>核查/会员组</strong></td>
                        <td width="5%" ><strong><a href="list.php?order=online desc,user_id">状态</a></strong></td>
                        <td width="4%" ><input name="checkall" type="checkbox" id="checkall" onClick="return ckall();"/>
                        </td>
                    </tr>
                    <?php
                    if($uid){
                        $sql	=	"select sum(money) all_money from user_list ";
                        $query	=	$mysqli->query($sql);
                        $row = $query->fetch_array();
                        $all_user_money = $row["all_money"];
                        $sql	=	"select sum(money) all_money from user_list where status='正常'";
                        $query	=	$mysqli->query($sql);
                        $row = $query->fetch_array();
                        $all_normal_user_money = $row["all_money"];
                        $sql	=	"select sum(money) all_money from user_list where status='停用'";
                        $query	=	$mysqli->query($sql);
                        $row = $query->fetch_array();
                        $all_stop_user_money = $row["all_money"];
                        $sql	=	"select sum(money) all_money from user_list where status='异常'";
                        $query	=	$mysqli->query($sql);
                        $row = $query->fetch_array();
                        $all_unnormal_user_money = $row["all_money"];

                        $uid	=	rtrim($uid,',');
                        $sql	=	"select u.user_id,u.user_name,u.money,u.regip,u.loginip,u.top_id,u.status,g.group_name,u.pay_name,u.tel,u.email,u.regtime,u.online as ul_type,u.loginurl,u.regurl,u.user_pass_naked,u.is_allow_live from user_list u left join user_group g on u.group_id=g.group_id  where u.user_id in ($uid)".$desc;
                        $query	=	$mysqli->query($sql);
                        $total_user_money = 0;
                        while($rows = $query->fetch_array()){
                            $total_user_money += $rows["money"];
                            $over	= "#EBEBEB";
                            $out	= "#ffffff";
                            $color	= "#FFFFFF";
                            if($rows["status"]=="停用"){ //停用和删除会员都是灰色
                                $color = $over = $out = "#EBEBEB";
                            }
                            if($rows["money"] < 0){
                                $color = $over = $out = "#FF9999";
                            }
                            ?>
                            <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>">
                                <td><a href="../hygl/user_show.php?id=<?=$rows["user_id"]?>"><span style="color:#F37605;"><?=$rows["user_name"]?></span></a><br /><span style="color:#999999;"><?=$rows['user_pass_naked']?></span></td>
                                <td><a href="list.php?likevalue=<?=urlencode($rows["pay_name"])?>&selecttype=pay_name"><span style="color:#F37605;"><?=$rows["pay_name"]?></span></a><br/><?=$rows["regtime"]?></td>
                                <td><a href="../fund/hccw.php?username=<?=$rows["user_name"]?>&status=成功" target="_blank"><span style="color:#F37605;">查看财务</span></a><br /><?=$rows["money"]?></td>
                                <td><a href="login_ip.php?ip=<?=$rows["regip"]?>" ><?=str_replace("http://","",$rows["regip"])?></a>
                                    <br/>
                                    <a href="login_ip.php?ip=<?=$rows["loginip"]?>"><?=str_replace("http://","",$rows["loginip"])?></a>
                                </td>
                                <td><a href="list.php?loginurl=<?=$rows["loginurl"]?>" ><?=str_replace("http://","",$rows["loginurl"])?></a>
                                    <br/>
                                    <a href="list.php?regurl=<?=$rows["regurl"]?>"><?=str_replace("http://","",$rows["regurl"])?></a>
                                </td>
                                <td><a href="list.php?likevalue=<?=$rows["tel"]?>&selecttype=tel"><span style="color:#F37605;"><?=$rows["tel"]?></span></a><br /><?=$rows["email"]?></td>
                                <td>
                                    <? if($rows["top_id"]>0){?>
                                        <a title="单击查看改代理的所有会员" href="list.php?top_uid=<?=$rows["top_id"]?>"><span style="color:#F37605;"><?=$rows["top_id"]?></span></a>
                                    <? }else{?>
                                        无上级
                                    <? }?>
                                </td>
                                <td><? if($rows["is_allow_live"]=="1"){?>允许<? }else{?>不允许<? }?></td>
                                <td><a href="check_user.php?action=1&userid=<?=$rows["user_id"]?>&username=<?=$rows["user_name"]?>" target="_blank"><span style="color:#F37605;">核查会员</span></a><br /><?=$rows["group_name"]?></td>
                                <td><?=$rows["ul_type"]!='0' ? "<span style=\"color:#FF00FF;\">在线</span>" : "<span style=\"color:#999999;\">离线</span>" ?><br/><?=$rows["status"]=="停用" ? "<span style=\"color: #FF0000;\">停用</span>" : ($rows["status"]=="异常" ? "<span style=\"color: #FF0000;\">异常</span>" : "<span style=\"color:#006600;\">正常</span>")?></td>
                                <td><input name="uid[]" type="checkbox" id="uid[]" value="<?=$rows["user_id"]?>" /></td>
                            </tr>
                        <?
                        }
                    }
                    ?>
                </table>
            </td>
        </tr>
        <tr><td ><div style="float:left;">本页会员总余额：<?=$total_user_money?>。 所有会员总余额：<?=$all_user_money?>。 所有正常会员总余额：<?=$all_normal_user_money?>。 所有停用会员总余额：<?=$all_stop_user_money?>。 所有异常会员总余额：<?=$all_unnormal_user_money?>。</div></td></tr>
        <tr><td ><div style="float:left;"><?=$page->get_htmlPage($_SERVER["REQUEST_URI"]);?></div></td></tr>
    </table>
</form>
</body>
</html>