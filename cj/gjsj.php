<?php
include_once("db.php");
include_once("pub_library.php");
include_once("http.class.php");
include_once("mysqli.php");
include_once("function.php");
header("Content-type: text/html; charset=utf-8");

$langx	=	'zh-cn';
$scend	=	3;
$msg	=	$_GET['msg'] ? $_GET['msg']*1 : 0;
$t_page	=	$_GET['t_page'] ? $_GET['t_page']*1 : 1;
$pages	=	$_GET['pages'] ? $_GET['pages']*1 : 0;
$show_pages	=	$pages+1;
$show_msg	=	$msg;
if($pages<$t_page){
	$data=theif_data($webdb["datesite"],$webdb["cookie"],'FS','fs',$langx,$pages);
	$th=array('\'','(',')');
	$data = str_replace($th,'', $data);
	$data = str_replace(',','|', $data);
	$pb=explode('Array',$data);
	$c=count($pb);
	//echo $data;
	for ($i=0;$i<=$c;$i++){
			$v=explode('|',$pb[$i]);
			$b=count($v);
			$t=count($v);
			
			$b=floor(($b-5)/4);
	        $id=trim($v[0]);
		 if (is_numeric($id)){
					 for ($ii=0;$ii<=$b;$ii++){
							//echo 'ID'.$v[0].'时间'.$v[2].'比赛名字'.$v[3].'国家'.$v[5+($ii*4)+3].'系数'.$v[5+($ii*4)+4].'<br><br><br>';
							$x_title=$v[2];
							$match_name=$v[3];
							$match_coverdate=$v[1];
							$match_id=$v[0];
							$team_match_id=$v[5+($ii*4)+2];
							$team_name=$v[5+($ii*4)+3];
							$point=$v[5+($ii*4)+4];
							$date			=	date("m-d",strtotime($match_coverdate));
							$time			=	datetoap(date("H:i:s",strtotime($match_coverdate)));
							$xid			=	0;
							$sql			=	"select x_id from t_guanjun where match_id='".$match_id."'";
							$query			=	$mysqli->query($sql);
							if($row			=	$query->fetch_array()){ //有数据，更新
								$xid		=	$row["x_id"];
								$sql		=	"update t_guanjun set match_type=1,match_name='$match_name',x_title='$x_title',match_date='$date',match_time='$time',match_coverdate='$match_coverdate',game_type='FT',add_time=now() WHERE Match_ID='$match_id'";
								$mysqli->query($sql);
							}else{ //没数据，添加
								$sql		=	"insert into t_guanjun(match_name,x_title,match_date,match_time,match_coverdate,add_time,match_id,game_type) values('$match_name','$x_title','$date','$time','$match_coverdate',now(),'$match_id','FT')";
								$mysqli->query($sql);
								$xid		=	$mysqli->insert_id;
							}
							if ($team_name !=''){
							$sql			=	"select tid from t_guanjun_team where match_id='".$team_match_id."' and xid='$xid'";
							$mysqli->query($sql);
							if($mysqli->affected_rows){ //有数据，更新
								$sql		=	"update t_guanjun_team set team_name='".$team_name."',point='".$point."' WHERE Match_ID='".$team_match_id."' and xid='$xid'";
							}else{ //没数据，添加
								$sql		=	"insert into t_guanjun_team(team_name,point,match_id,xid) values ('".$team_name."','".$point."','".$team_match_id."','$xid')";
								
							}
							$mysqli->query($sql);
							}

						$msg++;
						}
			 }
		}
	$pb=explode('t_page=',$data);
	$pb=explode(';',$pb[1]);
	$t_page=$pb[0]*1;
	$show_msg	=	$msg;
	$pages++;
}else{
	$show_pages--;
	$scend	=	600;
	$t_page	=	0;
	$pages	=	0;
	$msg	=	0;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<style type="text/css">
<!--
body,td,th {
    font-size: 12px;
}
body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}
-->
</style></head>

<body>
<script> 
<!-- 
var limit="<?=$scend?>";
if (document.images){ 
	var parselimit=limit
} 

function beginrefresh(){ 
if (!document.images) 
	return 
if (parselimit==1) 
	window.location.href="?t_page=<?=$t_page?>&msg=<?=$msg?>&pages=<?=$pages?>";
else{ 
	parselimit-=1 
	curmin=Math.floor(parselimit) 
	if (curmin!=0) 
		curtime=curmin+"秒后获取数据！" 
	else 
		curtime=cursec+"秒后获取数据！" 
		timeinfo.innerText=curtime 
		setTimeout("beginrefresh()",1000) 
	} 
}

window.onload=beginrefresh

function killerrors() {
	return true;
}
window.onerror = killerrors;  
 
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="left">
    <input type=button name=button value="刷新" onClick="window.location.href='?';">
    <?=$show_pages?>页<?=$show_msg?>条冠军数据！
        <span id="timeinfo"></span>
       </td>
  </tr>
</table>
</body>
</html>