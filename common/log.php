<?php

function user_log($edlog)
{ //会员操作日志	
		include_once("checkLogin.php");
		global $mysqli;
		$loginip=get_ip();
		$uid=$_SESSION["uid"];
		$userid=$_SESSION["userid"];
		$username=$_SESSION["username"];	
		$loginUrl= BROWSER_IP;
		$sql="insert into `user_log` (user_id,`Oid`,`user_name`,`login_ip`,`edlog`,`edtime`,`login_url`) VALUES ($userid,'$uid','$username','$loginip','$edlog',now(),'$loginUrl')";

		$mysqli->query($sql) or die ("user_log_error!");

}
	
?>
