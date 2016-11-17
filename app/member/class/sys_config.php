<?php
class sys_config
{

    static function getImagePath(){
        global $mysqli;
        $sql	=	"select web_image from sys_config where web_image is not null order by id asc limit 0,1";
        $query	=	$mysqli->query($sql)or die ("error!");
        $row    =	$query->fetch_array();
        if($row){
            return $row['web_image'];
        }else{
            return "www.baidu.com";
        }
    }

    static function getMinChangeMoney(){
        global $mysqli;
        $sql	=	"select min_change_money from sys_config order by id asc limit 0,1";
        $query	=	$mysqli->query($sql)or die ("error!");
        $row    =	$query->fetch_array();
        if($row){
            return $row['min_change_money'];
        }else{
            return "1";
        }
    }

    static function getGunQiu(){
        global $mysqli;
        $sql	=	"select gunqiu_time_min,gunqiu_time_max from sys_config order by id asc limit 0,1";
        $query	=	$mysqli->query($sql)or die ("error!");
        $row    =	$query->fetch_array();
        if($row){
            return $row;
        }else{
            return null;
        }
    }

    static function saveImagePath($imagePath,$gunqiu_time_min,$gunqiu_time_max){
        global $mysqli;
        $sql	=	"update sys_config set web_image='$imagePath',gunqiu_time_min='$gunqiu_time_min',gunqiu_time_max='$gunqiu_time_max'
                    where web_image is not null";
        $result = $mysqli->query($sql);
        if(!$result){
            return '保存失败';
        }else{
            return '保存成功';
        }
    }
}