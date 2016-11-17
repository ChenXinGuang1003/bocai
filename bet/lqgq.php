<?php
session_start();
include_once('../include/config.php');
include_once('../include/function.php');
check_login(); //验证用户是否已登陆
include_once("../cache/lqgq.php");

$match_names = array();
if(isset($lqgq) && !empty($lqgq) && (time()-$lasttime <= 10)){
	$zqcount = count($lqgq);
	for($i=0; $i<$zqcount; $i++){
		$match_names[$lqgq[$i]['Match_Name']]++;    ////只保留联赛名
	}
}

header("Content-type: text/vnd.wap.wml");
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.3//EN" "http://www.wapforum.org/DTD/wml13.dtd">
<wml><head>
<meta http-equiv="Cache-Control" content="max-age=0" />
</head>
	<card title="篮球滚球">
		<p>
			<?php
			if(count($match_names) < 1){
			?>
			暂无赛事
			<br/>
			<?php
			}else{
				foreach($match_names as $k=>$v){
			?>
			<a href="bet_lqgq.php?matchname=<?=urlencode($k)?>" title="<?=$k?>"><?=$k?></a>(<?=$v?>)
			<br/>
			<?php
				}
			}
			?>
			<br/>
			<a href="lqgq.php?<?=rand()?>" title="刷新">刷新</a> <a href="../main.php" title="返回菜单">返回菜单</a>
		</p>
	</card>
</wml>