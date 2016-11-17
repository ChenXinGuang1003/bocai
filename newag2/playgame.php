<?php
header("Content-type: text/html; charset=utf-8"); 
session_start();
/*$username = $_SESSION["username"];
$uid     = $_SESSION["uid"];*/

$uid	=	$_SESSION["userid"];
$loginid=	$_SESSION["uid"];

 if(!$uid){
	echo "<script>alert('请先登录再进入AG');location.href = '/index.php';</script>";
	exit();
 }


include_once '../newag2/config.php';
include_once("../app/member/class/user.php");
require_once '../newag2/api.class.php';
error_reporting(E_ALL);
ini_set( 'display_errors', 'On' );

$userinfo		=	user::getinfo($uid);
$username = $userinfo['user_name'];
$sql = "select * from user_list where user_name = '$username'";
$result = $mysqli->query($sql);
$row = $result->fetch_array();
$bbinapi = new BBIN_TZH($comId, $comKey,$gamePlatform);
$agusername = $row["ag_username"];
//echo $agusername;exit;
if($agusername==""){     // 账号不存在时，创建新账号
    $agusername = $top_pre.randomnames(6);
    if(!$bbinapi->GameUserRegister($agusername, $agpassword)){ // 创建失败
       echo "<script>alert('请联系管理员开通AGIN账号');</script>";
       exit;
    }  else {
    $sql = "update user_list set ag_username = '$agusername',ag_password = '$agpassword' where user_name = '$username'";
    $mysqli->query($sql);
    }         
}  

 echo ($bbinapi->GameUserLogin($agusername));exit;

 if(!($url = $bbinapi->GameUserLogin($agusername)))  // login
 {
      echo "<script>alert('进入游戏失败，请秒后再试');</script>";
      exit;
 }
// header("Location:$url");
//echo $url;exit;
 ?>
 <html>
    <head>
        <meta charset="UTF-8">
        <title>AGIN</title>
        <style>
            body,iframe {margin: 0px;height: 100%;width: 100%;background-color: #000;}            
        </style>
    </head>
    <body>
        <?php
        if($url)
        {
        ?>
        <iframe  frameborder="0" src="<?php echo $url; ?>"></iframe>
        <?php
        }  else {
        echo "进入游戏失败，请秒后再试";    
        }
        ?>
    </body>
</html>