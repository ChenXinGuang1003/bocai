<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
@include_once($C_Patch."/app/member/include/config.inc.php");

$oid = $_SESSION["uid"];
$sql = "select logintime from user_list where Oid='$oid'";
$query	=	$mysqli->query($sql);
$row	=	$query->fetch_array();
if($row && $row["logintime"]){
    $time_online = $row["logintime"];
    $time_limit=date('Y-m-d H:i:s',time()-5);
    $time_diff = strtotime($time_limit)-strtotime($time_online);
    if($time_diff>0){
        $sql = "update user_list set online=0,Oid='' where Oid='$oid'";//刪除超時用戶
        $result = $mysqli->query($sql);
        $cou= $result->num_rows;
        if($cou>0){
            $_SESSION["uid"]="";
            $_SESSION["userid"]="";
            $_SESSION["group_id"]="";
            $_SESSION["username"]="";
			$_SESSION["um"]="";
			$_SESSION["ycTokenID"]="";
			
        }
    }
}else{
    $_SESSION["uid"]="";
    $_SESSION["userid"]="";
    $_SESSION["group_id"]="";
    $_SESSION["username"]="";
	$_SESSION["um"]="";
	$_SESSION["ycTokenID"]="";
}


echo "<script>top.document.location.href='http://".$_SERVER['SERVER_NAME']."'\n;</script>";
?>