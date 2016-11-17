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

?>
<HTML>
<HEAD>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
    <TITLE>用户组列表</TITLE>
    <link href="../images/css1/css.css" rel="stylesheet" type="text/css">

    <script src="/js/jquery-1.7.1.js"></script>
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
    <script type="text/javascript">
        function editName(id,name){
            var sResult=prompt("请在下面输入更改的内容", name);
            if(sResult!=null){
                $.ajax({
                    type: "POST",
                    url: "user_group_list_ajax.php",
                    data: {group_id:id, editInfo:sResult}
                }).done(function( msg ) {
                        alert(msg);
                        document.location.reload();
                    }).fail(function(error){
                        alert("修改失败");
                    });
            }
        }
    </script>
</HEAD>
<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <td height="24" nowrap background="../images/06.gif"><font >&nbsp;<span class="STYLE2">用户管理：查看会员组的信息</span></font></td>
    </tr>
</table>
<form name="form2" method="post" action="" style="margin:0 0 0 0;">
    <table style="margin-top: 20px;" width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
            <td height="24" nowrap bgcolor="#FFFFFF">

                <table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#96B697" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >       <tr style="background-color: #EFE" class="t-title"  align="center">
                        <td width="14%" height="20" ><strong>会员组名称</strong></td>
                        <td width="15%" ><strong>是否默认</strong></td>
                        <td width="14%" ><strong>查看明细</strong></td>
                        <td width="13%" ><strong>修改会员组名称</strong></td>
                    </tr>
                    <?php
                        $user_group_list = user_group::getAllGroup();
                        foreach($user_group_list as $key => $rows){
                            $over	= "#EBEBEB";
                            $out	= "#ffffff";
                            $color	= "#FFFFFF";
                            ?>
                            <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>">
                                <td><?=$rows["group_name"]?></td>
                                <td><?=$rows["default_group"]?></td>
                                <td><a href="../lottery/config/lottery_six_config.php"><span style="color:#F37605;">查看明细</span></a></td>
                                <td><input type="button" id="<?=$rows["group_id"]?>" value="修改名称" onclick="editName(this.id,'<?=$rows['group_name']?>')"></td>
                            </tr>
                        <?
                        }
                    ?>
                </table>
            </td>
        </tr>
    </table>
</form>
</body>
</html>