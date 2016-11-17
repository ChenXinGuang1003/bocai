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
include_once($C_Patch."/app/member/utils/convert_name.php");

?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <link rel="stylesheet" href="/resource/images/css/admin_style_1.css" type="text/css" media="all" />
</head>
<script type="text/javascript" charset="utf-8" src="/resource/js/jquery-1.7.2.min.js" ></script>
<body>
<div id="pageMain">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td valign="top">
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="font12" bgcolor="#798EB9">
</table>
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
    <tr style="background-color:#3C4D82; color:#FFF">
        <td style="width: 10%" align="center" height="25"><strong>ID</strong></td>
        <td style="width: 12%" align="center"><strong>发生时间</strong></td>
        <td style="width: 10%" align="center"><strong>支付类型</strong></td>
        <td style="width: 10%" align="center"><strong>错误信息</strong></td>
        <td style="width: 58%" align="center"><strong>签名信息</strong></td>
    </tr>
    <?php
    include("../include/pager.class.php");

    $sql	=	"SELECT id FROM pay_error_log WHERE 1=1 order by update_time DESC limit 0,100";

    $query	=	$mysqli->query($sql);
    $sum		=	$mysqli->affected_rows; //总页数
    $thisPage	=	1;
    $pagenum	=	100;
    if($_GET['page']){
        $thisPage	=	$_GET['page'];
    }
    $CurrentPage=isset($_GET['page'])?$_GET['page']:1;
    $myPage=new pager($sum,intval($CurrentPage),$pagenum);
    $pageStr= $myPage->GetPagerContent();

    $bid		=	'';
    $i		=	1; //记录 bid 数
    $start	=	($thisPage-1)*$pagenum+1;
    $end		=	$thisPage*$pagenum;
    while($row = $query->fetch_array()){
        if($i >= $start && $i <= $end){
            $bid .=	$row['id'].',';
        }
        if($i > $end) break;
        $i++;
    }
    if($bid){
        $bid	=	rtrim($bid,',');
        $sql	=	"SELECT * FROM pay_error_log WHERE 1=1 order by update_time DESC limit 0,100";
        $query_main	=	$mysqli->query($sql);
        $list_main = array();
        while ($rows = $query_main->fetch_array()) {
            $list_main[] = $rows;
        }
        foreach($list_main as $key => $value){
            $color = "#FFFFFF";
            $over	 = "#EBEBEB";
            $out	 = "#ffffff";

            ?>
            <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                <td height="40" align="center" valign="middle"><?=$value["id"]?></td>
                <td align="center" valign="middle"><?=$value["update_time"]?></td>
                <td align="center" valign="middle"><?=$value["pay_type"]?></td>
                <td align="center" valign="middle"><?=$value["error_type"]?></td>
                <td align="center" valign="middle"></td>
            </tr>
        <?php
        }
    }
    ?>
    <tr style="background-color:#FFFFFF;">
        <td colspan="5" align="center" valign="middle"><?php echo $pageStr;?></td>
    </tr>

</table></td>
</tr>
</table>
</div>
</body>
</html>