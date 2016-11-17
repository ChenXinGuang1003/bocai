<?php
class sys_announcement
{

    static function getNewestAnnouncement(){
        global $mysqli;
        $sql	=	"SELECT content,create_date,type FROM sys_announcement2
                    where is_show='1' and end_time>'".date('Y-m-d H:i:s')."'
                    order by `sort` desc,id desc limit 0,1";
        $query	=	$mysqli->query($sql)or die ("error!");
        $row    =	$query->fetch_array();
        return $row['content'];
    }

    static function getAnnouncementList(){
        global $mysqli;
        $sql	=	"SELECT content,create_date,type FROM sys_announcement2
                    where is_show='1' and end_time>'".date('Y-m-d H:i:s')."'
                    order by `sort` desc,id desc";
        $query	=	$mysqli->query($sql)or die ("error!");
        while($row = $query->fetch_array()){
            $rs[] = $row;
        }
        return $rs;
    }
    static function getOneAnnouncement(){
        global $mysqli;
        $sql	=	"SELECT content,create_date,type FROM sys_announcement2
                    where is_show='1' and end_time>'".date('Y-m-d H:i:s')."'
                    order by `sort` desc,id desc limit 0,5";
        $query	=	$mysqli->query($sql)or die ("error!");
        $msg = "";
        while($row = $query->fetch_array()){
            $msg	.=	$row["content"]."  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        if($msg==""){
            $msg = "~欢迎光临~";
        }
        $msg = str_replace("\\","\\\\",$msg);
        $msg = str_replace(PHP_EOL," ",$msg);
        $msg = str_replace("\t"," ",$msg);
        return $msg;
    }

    static function getUserMassageList($user_id){
        global $mysqli;
        $sql	=	"SELECT k.msg_title,k.msg_time,k.islook,k.user_id,k.msg_id,k.msg_info
                    FROM user_msg k where k.user_id='$user_id' order by msg_time desc";
        $query	=	$mysqli->query($sql)or die ("error!");
        while($row = $query->fetch_array()){
            $rs[] = $row;
        }
        return $rs;
    }

    static function getUserMassageById($msg_id){
        global $mysqli;
        $sql	=	"SELECT k.msg_title,k.msg_time,k.islook,k.user_id,k.msg_id,k.msg_info
                    FROM user_msg k where k.msg_id='$msg_id' limit 0,1";
        $query	=	$mysqli->query($sql)or die ("error!");
        $row    =	$query->fetch_array();
        return $row;
    }
}