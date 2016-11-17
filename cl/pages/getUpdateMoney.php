<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/utils/login_check.php");

$username	=	$_POST['username'];
$password	=	$_POST['password'];

$post_data  =  array(
    'username' => $username,
    'password'  =>$password
);


$number = request_by_curl("http://do.b-win.cc/qos_money.php",$post_data);

if(intval($number)>-1){
    echo $number;
    $sql = "update live_user set live_money_a=$number where live_username='".$username."' and live_password='$password' ";
    $query	=	$mysqli->query($sql);
}else{
    echo "数据不正确，请咨询技术管理员。";
}
/**
 * Curl版本
 * 使用方法：
 * $post_string = "app=request&version=beta";
 * request_by_curl('http://facebook.cn/restServer.php',$post_string);
 */
function request_by_curl($remote_server, $post_string){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $remote_server);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Jimmy's CURL Example beta");
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
