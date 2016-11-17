<?php
include("config.php");
include("Apiyc.class.php");
$typel='彩票下注';
$stime="";
$etime="";
if(isset($_POST['stime'])){
$stime=$_POST['stime'];
$etime=$_POST['etime'];    
$typel=$_POST['yctype'];    
}
if($typel=='全部'){
    $typel="";
    
}
$page=0;
if(isset($_POST['flag'])){
    if($_POST['flag']==2){
    $page=$_POST['pag'];
    }else if($_POST['flag']==1){
        $page=$_POST['pag']-2;
        
    }else if($_POST['flag']==4){
        $page=$_POST['ww']-1;
    }
}

$url=$accounts.$aas."&stime=".$stime."&etime=".$etime."&username=".$_POST['user']."&typename=".$typel."&ThrOrderID=&PageCount=10&PageIndex=".$page;
//echo $url;die();
$cliapi=new Apiyc();
$arr=$cliapi->https_request($url);
$arr=  json_decode($arr,TRUE);
$arr['pages']=$page+1;
$arr=  json_encode($arr);
echo $arr;

?>