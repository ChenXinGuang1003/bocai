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
include_once($C_Patch."/include/newpage.php");
include_once("../class/admin.php");

$page	=	$_GET["page"];
$go		=	$_GET["go"];

if($go == 13){ //启用所有
    $sql = "select user_id,user_name,money from user_list where (status='停用' or status='异常')";
    $query	=	$mysqli->query($sql);
    while($row = $query->fetch_array()){
        $datereg=	date("YmdHis")."_".$row["user_name"];
        $assets = $row["money"];
        $v = $row["user_id"];
        $balance = $assets;
        $sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`)
            VALUES ('$v','$datereg','启用会员插入0金钱',now(),'启用会员','0','$assets','$balance');";
        $mysqli->query($sql);
    }
    $sql = "UPDATE user_list set status='正常' where (status='停用' or status='异常')";
    $mysqli->query($sql);
    $msg_info = "管理员：".$_SESSION['login_name']." 启用所有会员。";
    admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],$msg_info,session_id(),"",$bj_time_now);
}

$msg	=	'操作成功！';
message($msg,'list.php?page='.$page);
?>