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
include_once($C_Patch."/app/member/class/user.php");
include_once($C_Patch."/app/member/class/user_group.php");
include_once($C_Patch."/include/pager.class.php");
include_once($C_Patch."/app/member/cache/hacker_list.php");


$user_name = $_POST["user_name"];
$sub_page =  "";
$has_row = "false";
foreach ($hacker_list as $key =>$rows) {
    $bgColor = "#FFFFFF";
    $overColor = "#EBEBEB";

    if($user_name){
        if($user_name==$rows){
            $has_row = "true";
            $sub_page .=
                '<tr bgcolor="'.$bgColor.'" onMouseOver="this.style.backgroundColor=\''.$overColor.'\'" onMouseOut="this.style.backgroundColor=\''.$bgColor.'\'">
        <td align="center" height="25">'.(1).'</td>
        <td align="center" >'.$rows.'</td>
        <td align="center" >'."".'</td>
        </tr>';
        }
    }else{
        $has_row = "true";
        $sub_page .=
            '<tr bgcolor="'.$bgColor.'" onMouseOver="this.style.backgroundColor=\''.$overColor.'\'" onMouseOut="this.style.backgroundColor=\''.$bgColor.'\'">
        <td align="center" height="25">'.($key+1).'</td>
        <td align="center" >'.$rows.'</td>
        <td align="center" >'."".'</td>
        </tr>';
    }
}
if($has_row == "false"){
    $sub_page .=
        '<tr bgcolor="#FFFFFF" onMouseOver="this.style.backgroundColor=\'#EBEBEB\'" onMouseOut="this.style.backgroundColor=\'#ffffff\'">
            <td align="center" height="25" colspan="3">查询不到用户名。</td>
        </tr>';
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>非法用户列表</title>
</head>
<link href="../../../agent/images/css1/css.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../../../agent/images/css/admin_style_1.css" type="text/css" media="all" />
<script   language=javascript>

</script>
<body style="border: 0;padding: 10px 5px 0px 10px;background-color: white;">
<form id="form1" name="form1" method="post" action="?action=1" style="margin:0;">
    请输入用户名：
    <label>
        <input name="user_name" type="text" id="user_name" value="<?=$user_name?>" size="20" maxlength="20" />
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <label>
        <input type="submit" name="Submit" value="查询" />
    </label>
</form>

  <br/><span style="color: #000000;">注意：该列表用户全部为'黑名单'用户（改单、不诚信投注、软件投注、黑客等不法用户），如果发现自己网站有这样的用户，请谨慎操作提款操作。如果发现新的非法用户，请联系技术更新名单。</span>
  <br/>
  <br/>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
    <tr>
        <td width="20%" align="center" bgcolor="#CCCCCC" height="28"><strong>序号</strong></td>
        <td width="40%" align="center" bgcolor="#CCCCCC"><strong>用户名</strong></td>
        <td width="40%" align="center" bgcolor="#CCCCCC"><strong>备注</strong></td>
    </tr>
    <?= $sub_page ?>
</table>
</body>
</html>

<?php
$mysqli ->close();
?>