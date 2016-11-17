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
include_once($C_Patch."/include/pager.class.php");

check_quanxian("查看会员信息");

$user_id = $_REQUEST["userid"];
$user_name = $_REQUEST["username"];
$sql = "select count(id) as s from money_log where 1=1";
if($_REQUEST["user_name"]) {
    $user_name = $_REQUEST["user_name"];
    $sql_getUserId = "select user_id from user_list where user_name='$user_name' ";
    $query_getUserId	=	$mysqli->query($sql_getUserId);
    $row_getUserId    =	$query_getUserId->fetch_array();
    $user_id = $row_getUserId["user_id"];
    $sql .= " and user_id='$user_id'";
}elseif($user_id){
    $sql .= " and user_id='$user_id'";
}elseif($_REQUEST['page']){
    $user_id_global = $_SESSION["user_id_global"];
    $user_name = $_SESSION["user_name_global"];
    $sql .= " and user_id='$user_id_global'";
}else{
    $sql .= " and user_id=''";
}

if($user_id){
    $_SESSION["user_id_global"] = $user_id;
    $_SESSION["user_name_global"] = $user_name;
    $user_id_global = $user_id;
}
$query	=	$mysqli->query($sql);
$row    =	$query->fetch_array();
$sub_page = "";
if($row["s"] && $row["s"]>0){
    $thisPage	=	1;
    $pagenum	=	50;
    if($_REQUEST['page']){
        $thisPage	=	$_REQUEST['page'];
    }
    $CurrentPage=isset($_REQUEST['page'])?$_REQUEST['page']:1;
    $myPage=new pager($row["s"],intval($CurrentPage),$pagenum);
    $pageStr= $myPage->GetPagerContent();

    $i		=	1; //记录 bid 数
    $start	=	($thisPage-1)*$pagenum;
    $end		=	$thisPage*$pagenum;

    $sql = "select user_id,order_num,about,update_time,type,order_value,assets,balance from money_log where user_id='$user_id_global' order by update_time desc,id desc limit $start,$pagenum";
    $query	=	$mysqli->query($sql);
    if($query){
        while($row = $query->fetch_array()){
            $rs[] = $row;
        }

        foreach ($rs as $key =>$rows) {
            $bgColor = "#FFFFFF";
            $overColor = "#EBEBEB";
            $number1 = floatval($rows["assets"]) - floatval($rows["order_value"]);
            $number2 = floatval($rows["assets"]) + floatval($rows["order_value"]);
            $number3 = floatval($rows["balance"]);

            if($rs[$key+1] && ($rs[$key+1]["balance"]!=$rows["assets"]) || ((abs($number1-$number3)>0.0001) && abs($number2-$number3)>0.0001)){
                $bgColor = "#FFE1E1";
                $overColor="#FFE1E1";
            }
            $link_detail = "";
            if(in_array($rows["type"],array("彩票下注","体育下注"))
                || strpos($rows["type"],"彩票自动结算")!==false|| strpos($rows["type"],"彩票手工结算")!==false|| strpos($rows["type"],"彩票重新结算")!==false
                || strpos($rows["type"],"六合彩")!==false
                || strpos($rows["type"],"游戏自动结算")!==false|| strpos($rows["type"],"游戏手工结算")!==false|| strpos($rows["type"],"游戏重新结算")!==false
                || strpos($rows["type"],"串关自动结算")!==false|| strpos($rows["type"],"串关手工结算")!==false|| strpos($rows["type"],"串关重新结算")!==false
            )
            {
                $link_detail = '<a href="check_user_detail.php?userid='.$rows["user_id"].'&ordernum='.$rows["order_num"].'&type='.$rows["type"].'&about='.$rows["about"].'" target="_blank"><span style="color:#F37605;">查看明细</span></a>';
            }
            $sub_page .=
        '<tr bgcolor="'.$bgColor.'" onMouseOver="this.style.backgroundColor=\''.$overColor.'\'" onMouseOut="this.style.backgroundColor=\''.$bgColor.'\'">
            <td align="center" height="25">'.$rows["update_time"].'</td>
            <td align="center" >'.$rows["order_num"].'</td>
            <td align="center" >'.$rows["type"].'</td>
            <td align="center" >'.$rows["assets"].'</td>
            <td align="center" >'.$rows["order_value"].'</td>
            <td align="center" >'.$rows["balance"].'</td>
            <td align="center" >'.$rows["about"].'</td>
            <td align="center" >'.$link_detail.'</td>
        </tr>';
        }
    }
}else{
    $sub_page .=
        '<tr bgcolor="#FFFFFF" onMouseOver="this.style.backgroundColor=\'#EBEBEB\'" onMouseOut="this.style.backgroundColor=\'#ffffff\'">
            <td align="center" height="25" colspan="8">暂时没有交易记录。</td>
        </tr>';
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>核查会员财务信息</title>
</head>
<link href="../images/css1/css.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../images/css/admin_style_1.css" type="text/css" media="all" />
<script   language=javascript>

</script>
<body style="border: 0;padding: 10px 5px 0px 10px;background-color: white;">
<form id="form1" name="form1" method="post" action="?action=1" style="margin:0;">
请输入会员名称：
<label>
<input name="user_name" type="text" id="user_name" value="<?=$user_name?>" size="20" maxlength="20" />
</label>
&nbsp;&nbsp;&nbsp;&nbsp;
  <label>
  <input type="submit" name="Submit" value="核查" />
  </label>
</form>
  <br/><br/><span style="color: #000000;">注意：该用户所有金额记录，如果背景色为<span style="color: red;">红色</span>，说明该条记录的 '交易前余额' 与前一条记录的 '交易后金额' 不相等，说明出现差错，请及时排查。</span>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
    <tr>
        <td width="12%" align="center" bgcolor="#CCCCCC" height="28"><strong>日期</strong></td>
        <td width="12%" align="center" bgcolor="#CCCCCC"><strong>订单号</strong></td>
        <td width="11%" align="center" bgcolor="#CCCCCC"><strong>交易类型</strong></td>
        <td width="11%" align="center" bgcolor="#CCCCCC"><strong>交易前余额</strong></td>
        <td width="11%" align="center" bgcolor="#CCCCCC"><strong>交易金额</strong></td>
        <td width="11%" align="center" bgcolor="#CCCCCC"><strong>交易后余额</strong></td>
        <td width="19%" align="center" bgcolor="#CCCCCC"><strong>备注</strong></td>
        <td width="11%" align="center" bgcolor="#CCCCCC"><strong>操作</strong></td>
    </tr>
    <?= $sub_page ?>
    <tr style="background-color:#FFFFFF;">
        <td colspan="8" align="center" valign="middle" style="padding: 5px 0;"><?php echo $pageStr; ?></td>
    </tr>
</table>
</body>
</html>

<?php
$mysqli ->close();
?>