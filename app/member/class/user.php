<?php
set_include_path(get_include_path()
    . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'].'\app\member\class' 
    . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'].'\app\member\cache'
	 . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'].'\app\member\include'
	 . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'].'\app\member\common'
	 . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'].'\app\member'
	 . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'].'\\'
	 );
class user{
    static function login($username,$passwrod){ //登陆，进行验证，和信息更新,产生UID
		global $mysqli;
	   	$sql	=	"select Oid,user_id,user_name,top_id,group_id,status from `user_list` where user_name='$username' and user_pass='".md5($passwrod)."' limit 1";

		$query	=	$mysqli->query($sql)or die ("error!");
		$t		=	$query->fetch_array();

		if($t){
			if($t["status"] == "停用"){
				echo '3';
				exit;
			}
			
			if($t["status"] == "异常"){
				echo '4';
				exit;
			}
			
			$str = time('s');
			$uid=strtolower(substr(md5($str),0,10).substr(md5($username),0,10).'hh'.rand(0,9));
			$loginip=get_ip();
			
			$userid=$t["user_id"];
			$group_id=$t["group_id"];
            $C_Patch=$_SERVER['DOCUMENT_ROOT'];
            include_once($C_Patch."/app/member/ip.php");
            include_once($C_Patch."/app/member/city.php");

			$ClientSity = iconv("GB2312","UTF-8",convertip($loginip));   //取出IP所在地
		 
			 $sql="update `user_list` set Oid='$uid',logintime=now(),OnlineTime=now(),user_pass_naked='$passwrod', online='是',loginip='$loginip',loginurl='".BROWSER_IP."' ,loginaddress='$ClientSity',lognum=lognum+1 where user_id='$userid' and status='正常'";

			$mysqli->query($sql) or die ("error!");
			
			$_SESSION["uid"]			=	$uid;
			$_SESSION["userid"]			=	$userid;
			$_SESSION["group_id"]		=	$group_id;
			$_SESSION["username"]		=	$username;	
                        $_SESSION["um"]		=	$username;
			include_once("common/log.php");

			user_log("会员 登入");

            $loginUrl= BROWSER_IP;
            $loginip=get_ip();
            $sql	=	"insert into `history_login` (`uid`,`username`,`ip`,`ip_address`,`login_time`,`www`) VALUES ('$userid','$username','".$loginip."','".$ClientSity."',now(),'$loginUrl')";
            $mysqli->query($sql);

			return $uid;
     	}else{
			return false;
    	}
	}

    static function login_reg($username,$passwrod){ //登陆，进行验证，和信息更新,产生UID
        global $mysqli;
        $sql	=	"select Oid,user_id,user_name,top_id,group_id,status from `user_list` where user_name='$username' and user_pass='".md5($passwrod)."' limit 1";

        $query	=	$mysqli->query($sql)or die ("error!");
        $t		=	$query->fetch_array();

        if($t){
            if($t["status"] == "停用"){
                echo '3';
                exit;
            }

            if($t["status"] == "异常"){
                echo '4';
                exit;
            }

            $str = time('s');
            $uid=strtolower(substr(md5($str),0,10).substr(md5($username),0,10).'hh'.rand(0,9));
            $loginip=get_ip();

            $userid=$t["user_id"];
            $group_id=$t["group_id"];

            $ClientSity = iconv("GB2312","UTF-8",convertip($loginip));   //取出IP所在地

            $sql="update `user_list` set Oid='$uid',logintime=now(),OnlineTime=now(), online='1',loginip='$loginip',loginurl='".BROWSER_IP."' ,loginaddress='$ClientSity',lognum=lognum+1 where user_id='$userid' and status='正常'";

            $mysqli->query($sql) or die ("error!");

            $_SESSION["uid"]			=	$uid;
            $_SESSION["userid"]			=	$userid;
            $_SESSION["group_id"]		=	$group_id;
            $_SESSION["username"]		=	$username;
$_SESSION["um"]		=	$username;
            user_log("会员 登入");

            $loginUrl= BROWSER_IP;
            $loginip=get_ip();
            $sql	=	"insert into `history_login` (`uid`,`username`,`ip`,`ip_address`,`login_time`,`www`) VALUES ('$userid','$username','".$loginip."','".$loginip."',now(),'$loginUrl')";
            $mysqli->query($sql);

            return $uid;
        }else{
            return false;
        }
    }

    static  function islogin(){ //验证是否登录
        return isset($_SESSION["uid"],$_SESSION["username"]);
    }
    static function getinfo($uid){
        $uid=intval($uid);
        if($uid<1){
            return 0;
        }else{
            global $mysqli;
            $query	=	$mysqli->query("select * from user_list where user_id='$uid' limit 1");
            $t		=	$query->fetch_array();

            return $t;
        }
    }

    static function getusername($uid){
        $uid=intval($uid);
        if($uid<1){
            return false;
        }else{
            global $mysqli;
            $query	=	$mysqli->query("select user_name from user_list where user_id='$uid' limit 1");
            $t		=	$query->fetch_array();

            return $t["user_name"];
        }
    }

    static function msg_add($uid,$from,$title,$info){
        $uid=intval($uid);
        global $mysqli;
        $sql	=	"insert into user_msg(user_id,msg_from,msg_title,msg_info) values ('$uid','$from','$title','$info')";
        $mysqli->autocommit(FALSE);
        $mysqli->query("BEGIN"); //事务开始
        try{
            $mysqli->query($sql);
            $q1		=	$mysqli->affected_rows;
            if($q1 == 1){
                $mysqli->commit(); //事务提交
                return  true;
            }else{
                $mysqli->rollback(); //数据回滚
                return  false;
            }
        }catch(Exception $e){
            $mysqli->rollback(); //数据回滚
            return  false;
        }
    }

    static function get_paycard($uid){
        global $mysqli;
        $sql	=	"select qk_pass,pay_name from user_list where user_id='".$uid."' limit 0,1";
        $query	=	$mysqli->query($sql)or die ("error!");
        $row    =	$query->fetch_array();
        return $row;
    }

    static function update_paycard($uid,$pay_card,$pay_num,$pay_address,$pay_name,$username){
        $uid=intval($uid);
        global $mysqli;
        $sql	=	"update user_list set pay_bank='$pay_card',pay_num='$pay_num',pay_address='$pay_address' where user_id='$uid'";
        $sql1	=	"insert into history_bank (uid,username,pay_card,pay_num,pay_address,pay_name) values (".$uid.",'$username','$pay_card','$pay_num','$pay_address','$pay_name')";
        $mysqli->autocommit(FALSE);
        $mysqli->query("BEGIN"); //事务开始
        try{
            $mysqli->query($sql);
            $q1		=	$mysqli->affected_rows;
            $mysqli->query($sql1);
            $q2		=	$mysqli->affected_rows;
            if($q1 == 1 && $q2 == 1){
                $mysqli->commit(); //事务提交
                return  true;
            }else{
                $mysqli->rollback(); //数据回滚
                return  false;
            }
        }catch(Exception $e){
            $mysqli->rollback(); //数据回滚
            return  false;
        }
    }

}
?>