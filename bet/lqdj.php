<?php
session_start();
include_once('../include/config.php');
include_once('../include/function.php');
check_login(); //验证用户是否已登陆

$sql	=	"select match_name,count(*) as s from lq_match WHERE Match_Type=3 AND Match_CoverDate>='".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."' group by match_name order by match_id asc";
$query	=	$mysqli->query($sql);
$row	=	$query->fetch_array();

header("Content-type: text/vnd.wap.wml");
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.3//EN" "http://www.wapforum.org/DTD/wml13.dtd">
<wml><head>
<meta http-equiv="Cache-Control" content="max-age=0" />
</head>
	<card title="篮球单节">
		<p>
			<?php
			if(!$row){
			?>
			暂无赛事
			<br/>
			<?php
			}else{
				do{
			?>
			<a href="bet_lqdj.php?matchname=<?=urlencode($row['match_name'])?>" title="<?=$row['match_name']?>"><?=$row['match_name']?></a>(<?=$row['s']?>)
			<br/>
			<?php
				}while($row	=	$query->fetch_array());
			}
			?>
			<br/>
			<a href="lqdj.php?<?=rand()?>" title="刷新">刷新</a> <a href="../main.php" title="返回菜单">返回菜单</a>
		</p>
	</card>
</wml>