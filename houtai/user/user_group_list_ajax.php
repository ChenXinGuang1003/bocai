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

$group_id = $_POST["group_id"];
$editInfo = $_POST["editInfo"];

global $mysqli;
$sql	=	"update user_group set group_name='$editInfo' where group_id='$group_id'";
$result = $mysqli->query($sql);
if(!$result){
    echo '保存失败';
    exit;
}
echo '保存成功';