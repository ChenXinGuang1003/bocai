<?php
	
session_start();
include_once('include/address.mem.php');
include_once('include/config.php');
include_once('include/function.php');

$name	=	$_POST['name'];
$pwd	=	$_POST['pwd'];
$yzm	=	$_POST['yzm'];
if(isset($name) && isset($pwd) && isset($yzm)){

	if($yzm != $_SESSION["randcode"]){
		message('验证码错误，请返回','name='.urlencode($name).'&amp;pwd='.$pwd);
	}else{

		$sql	=	"select Oid,user_id,user_name,top_id,group_id,status from `user_list` where user_name='$name' and user_pass='".md5($pwd)."' limit 1";

		$query	=	$mysqli->query($sql)or die ("error!");
		$t		=	$query->fetch_array();

		if($t){
			if($t["status"] == "停止"){
				message('此用户名已经被[停止],不能再登录!');
				exit;
			}
			
			if($t["status"] == "异常"){
				message('此用户名[异常],不能再登录!');
				exit;
			}
			
			$str = time('s');
			$uid=strtolower(substr(md5($str),0,10).substr(md5($username),0,10).'hh'.rand(0,9));
			$loginip=get_ip();
			
			$userid=$t["user_id"];
			$group_id=$t["group_id"];
			include_once("ip.php");
			include_once("city.php");

			$ClientSity = iconv("GB2312","UTF-8",convertip($loginip));   //取出IP所在地
		 
			 $sql="update `user_list` set Oid='$uid',logintime=now(), online='是',loginip='$loginip',loginurl='".BROWSER_IP."' ,loginaddress='$ClientSity',lognum=lognum+1 where user_id='$userid' and status='正常'";

			$mysqli->query($sql) or die ("error!");
			
			$_SESSION["uid"]			=	$uid;
			$_SESSION["userid"]			=	$userid;
			$_SESSION["group_id"]		=	$group_id;
			$_SESSION["username"]		=	$name;	
			include_once("common/log.php");

			user_log("会员 登入(手机)");

            $loginUrl= BROWSER_IP;
            $loginip=get_ip();
            $sql	=	"insert into `history_login` (`uid`,`username`,`ip`,`ip_address`,`login_time`,`www`) VALUES ('$userid','$name','".$loginip."','".$loginip."',now(),'$loginUrl')";
            $mysqli->query($sql);
			header("location:wap.php");
		}else{
			message('用户名或密码错误，请返回','name='.urlencode($name));
		}
	}
}else{

	msg('参数错误，请返回');
}
?>