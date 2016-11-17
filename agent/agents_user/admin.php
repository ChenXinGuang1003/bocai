<?php
class admin{
	static function login($login_name,$login_pwd){ //管理员登陆
		global $mysqli;
		global $bj_time_now;
		$sql	=	"select id,purview,bindcomputer,login_one from sys_manage where manage_name='$login_name' and manage_pass='".md5(md5($login_pwd))."' limit 1";
		$query	=	$mysqli->query($sql);
		$t		=	$query->fetch_array();

		if($t['id'] > 0){
			$run_str=create_str(16);
			$loginbrowser=get_client_browser();
			$client_ip=get_ip();
			$session_str=session_id() ;
			$ClientSity	=	iconv("GB2312","UTF-8",convertip(get_ip(),'../'));   //取出客户端IP所在城市
	//setcookie('computer_id',"");
	//setcookie('run_str',"");
	//return;
			$computer_id=$_COOKIE['computer_id'];
			if(empty($computer_id)){
				$computer_id="第一次登入的浏览器:[".$loginbrowser."] 时间:[".$bj_time_now."] IP:[".$client_ip."] 账号[".$login_name."] 标识:[".$run_str."]";
			setcookie('computer_id',$computer_id,time()+60*60*24*365);
			setcookie('run_str',$run_str,time()+60*60*24*365);
			}else{
				$run_str=$_COOKIE['run_str'];
			}

			$sql_cookie="select id,b_lock,run_str from sys_manage_lock where sys_cookie='".$computer_id."'";
			$query_cookie	=	$mysqli->query($sql_cookie);
			$rs_cookie		=	$query_cookie->fetch_array();
	
			if($rs_cookie['id']=='')
			{
				$mysqli->query("insert into sys_manage_lock (`sys_cookie`,`b_lock`,`run_str`) VALUES ('$computer_id',0,'$run_str')");
				if($t['bindcomputer']==1)
				{
					admin::insert_log($login_name,$client_ip,$bj_time_now,"登陆失败[浏览器被限制:".$loginbrowser.":".$run_str."]",$session_str,"",$bj_time_now,$run_str);
					return '0,2,浏览器标识:'.$run_str;
				}
				
			}
			
			if($t['login_one']=="1")
			{
				$sql_online="select id,logintime,loginbrowser,loginip from sys_manage_online where manage_name='".$login_name."' and onlinetime>DATE_SUB(now(),INTERVAL 60 SECOND)";
				$query_online	=	$mysqli->query($sql_online);
				$rs_online		=	$query_online->fetch_array();
				if($rs_online['id']>0)
				{
					admin::insert_log($login_name,$client_ip,$bj_time_now,"登陆失败[该账号只允许一个管理员登陆]",$session_str,"",$bj_time_now,$rs_cookie['run_str']);
					return '0,3,这个账号有其他管理员在登陆.登陆时间:['.$rs_online['logintime'].'] IP:['.$rs_online['loginip'].'] 浏览器:['.$rs_online['loginbrowser'].']\r\n或者登录超时.等待60秒后重新登录';
				}
			}


			$sql_online="select id from sys_manage_online where session_str='".$session_str."' and manage_name='".$login_name."' limit 1";
			$query_online	=	$mysqli->query($sql_online);
			$rs_online		=	$query_online->fetch_array();
			if($rs_online['id']=='')
			{
				$sql		=	"insert into `sys_manage_online` (`manage_name`,`session_str`,`logintime`,`onlinetime`,`loginip`,`loginbrowser`) VALUES ('$login_name','$session_str','$bj_time_now','$bj_time_now','$client_ip','$loginbrowser')";
				$mysqli->query($sql);
			}else{
				$sql		=	"update `sys_manage_online` set onlinetime='$bj_time_now',loginip='$client_ip',loginbrowser='$loginbrowser' where session_str='".$session_str."' and manage_name='".$login_name."'";
				$mysqli->query($sql);
			}


			$_SESSION["adminid"]	=	$t['id'];
			$_SESSION["ssid"]		=	$session_str;
			$_SESSION["purview"]	=	$t["purview"];
			$_SESSION["login_name"]	=	$login_name;
			$_SESSION["login_time"]	=	$bj_time_now;

			admin::insert_log($login_name,$client_ip,$bj_time_now,"登陆成功",$session_str,"",$bj_time_now,$run_str);

			return '1,'.$t['id'];
		}else{
			return '0,1';
		}
	}
	
	static function insert_log($manage_name,$login_ip,$login_time,$edlog,$session_str,$logout_time,$edtime,$runstr=""){ //超级管理员操作日志增加
	
		global $mysqli;
		if($runstr==""){
		$runstr=$_COOKIE['run_str'];
		}
		$mysqli->query("insert into manage_log(manage_name,login_ip,login_time,edlog,session_str,logout_time,edtime,run_str) values ('$manage_name','$login_ip','$login_time','$edlog','$session_str','$logout_time','$edtime','$runstr')");
	}
}

?>