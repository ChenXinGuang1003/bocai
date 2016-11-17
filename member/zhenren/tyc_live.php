<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
@include_once($C_Patch."/app/member/include/address.mem.php");
@include_once($C_Patch."/app/member/include/com_chk.php");
@include_once($C_Patch."/app/member/common/function.php");
@include_once($C_Patch."/app/member/class/user.php");

$uid = $_SESSION['userid'];
$sql = "select live_username,live_password from live_user where live_type='TYC' and user_id='$uid'";
$query	=	$mysqli->query($sql);
$row    =	$query->fetch_array();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>太阳城</title>
    <link href="/css/css_1.css" rel="stylesheet" type="text/css" />
    <script language="javascript" src="/js/jquery-1.7.1.js"></script>
    <script language="javascript" src="/js/xhr.js"></script>
    <script language="javascript" src="/js/zhuce.js"></script>
    <script language="javascript" src="/js/top.js"></script>
    <script language="javascript" src="/cl/js/common.js"></script>

</head>
<script language="javascript">
    if(self==top){
        top.location='/index.php';
    }

    var autourlTyc = new Array();
    var b = 1;
    var tyc_user_name = '<?=$row["live_username"]?>';
    var tyc_user_pass = '<?=$row["live_password"]?>';
    function init()
    {
        var myuid = '<?=$uid?>';
        if(!myuid || 0>=myuid){
            alert('请先登录！');
            return;
        }
        autourlTyc[1]='http://www.11msc.com/game.aspx';
        autourlTyc[2]='http://www.22msc.com/game.aspx';
        autourlTyc[3]='http://www.33msc.com/game.aspx';
        autourlTyc[4]='http://www.66msc.com/game.aspx';
        autourlTyc[5]='http://www.77msc.com/game.aspx';
        autourlTyc[6]='http://www.88msc.com/game.aspx';
        autourlTyc[7]='http://www.99msc.com/game.aspx';
    }
    init();
    $(window.parent.parent.document).find("#mainFrame").height(600);
</script>
<script src="js/tyc_timtest.js"></script>
<body id="tyc">

</body>
</html>