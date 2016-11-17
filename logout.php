<?php
session_start();
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
@include_once($C_Patch."/include/config.inc.php");

$oid = $_SESSION["uid"];
$sql = "update user_list set online=0,Oid='' where Oid='$oid'";//„h³ý³¬•rÓÃ‘ô
$mysqli->query($sql);

$_SESSION["uid"]="";
$_SESSION["userid"]="";
$_SESSION["group_id"]="";
$_SESSION["username"]="";

if($_GET['url']==0){

}else{

}

session_destroy();

header("location:/wap.php");
?>