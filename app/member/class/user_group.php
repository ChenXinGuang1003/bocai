<?php

class user_group
{
    static function getAllGroup(){
        global $mysqli;
        $sql   =	"select g.* from user_group g order by id asc";
        $query	=	$mysqli->query($sql);
        while($row = $query->fetch_array()){
            $rs[] = $row;
        }
        return $rs;
    }

    static function getLimitAndFsMoney($user_id){

        global $mysqli;
        $sql   =	"select g.*,u.user_name,u.logintime from user_group g,user_list u
                     where u.user_id='$user_id' and g.group_id=u.group_id limit 0,1";
        $query = $mysqli->query($sql);
        $row   =	$query->fetch_array();
        return $row;
    }

    static function getPassWord($user_id){
        global $mysqli;
        $sql   =	"select u.user_pass from user_list u where u.user_id='$user_id' limit 0,1";
        $query = $mysqli->query($sql);
        $row   =	$query->fetch_array();
        return $row["user_pass"];
    }

    static function setPassWord($user_id,$new_pass_word){
        global $mysqli;
        $sql   =	"select * from user_list where user_id='$user_id'";
        $result = $mysqli->query($sql);
        $row    = $result->fetch_array();
        $oldPass = $row["user_pass"];

        $sql   =	"update user_list set user_pass='".md5($new_pass_word)."',user_pass_naked='$new_pass_word' where user_id='$user_id'";
        $result = $mysqli->query($sql);
        if(!$result){
            return '保存失败。';
        }
        user_log("修改前密码：".$oldPass."。修改后密码：".md5($new_pass_word));
        return "保存成功。";
    }
    static function setQkPassWord($user_id,$new_pass_word){
        global $mysqli;
        $sql   =	"select * from user_list where user_id='$user_id'";
        $result = $mysqli->query($sql);
        $row    = $result->fetch_array();
        $oldPass = $row["user_pass"];

        $sql   =	"update user_list set qk_pass='".md5($new_pass_word)."' where user_id='$user_id'";
        $result = $mysqli->query($sql);
        if(!$result){
            return '保存失败。';
        }
        user_log("修改前取款密码：".$oldPass."。修改后取款密码：".$new_pass_word);
        return "保存成功。";
    }

}