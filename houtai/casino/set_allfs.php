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
include_once($C_Patch."/app/member/utils/convert_name.php");


$fsResult = $_POST['fsResult'];
$live_type = $_POST['live_type'];
if(is_numeric($fsResult) && $fsResult<100){
    $sql = "update live_user set fs_rate=$fsResult where live_type='$live_type'";
    $query	 =	$mysqli->query($sql);
    echo $fsResult;
}else{
    echo "输入的反水比例不符合规定";
}