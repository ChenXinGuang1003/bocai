<?php
session_start();
include_once('../include/config.php');
include_once('../include/function.php');
check_login(); //验证用户是否已登陆


$sql	=	"select match_name,count(*) as s from bet_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."' group by match_name order by match_id asc";

$query	=	$mysqli->query($sql);
$row	=	$query->fetch_array();

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
<script src="/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script>
	var ClientW = $(window).width();
	$('html').css('fontSize',ClientW/3+'px');
</script>
<style>
/* reset */
*{ margin:0; padding:0; }
em { font-style:normal; }
li { list-style:none; }
a { text-decoration:none; }
img { border:none; vertical-align:top; }
textarea { resize:none; overflow:auto; }
em{ font-style:normal; }
body{ width:2.85rem; margin:0 auto; font-size:0.14rem; font-family: "Arial","Microsoft YaHei","ºÚÌå","ËÎÌå",sans-serif; color:#333333; }
/* !£nd reset*/

.nav_list{ width:100%; overflow:hidden; color:#333; }
.nav_list a{ float:right; width:0.6rem; height:0.25rem; border:1px solid #CCCCCC; box-sizing:border-box; text-align:center; line-height:0.25rem; background:#fff; font-size:0.1rem; color:#333333;}
.nav_list a.active{ color:#fff; background:#986600; border-color:#986600; }

.types{ width:100%; margin-top:0.08rem; overflow:hidden; background:#fff; padding-bottom:0.25rem; border-radius:0.05rem; }
.types>aside{ width:100%; height:0.28rem; line-height:0.28rem; border-top:1px solid rgba(204, 204, 204, 0.96); border-bottom:1px solid rgba(204, 204, 204, 0.96); box-sizing:border-box; font-size:0.12rem; text-indent:0.1rem; background:#F5F5F5; }
.types .numBtn{ display:block; width:0.25rem; height:0.25rem; color:#fff; background:#337AB7; text-align:center; line-height:0.25rem; border-radius:0.02rem; margin:0.04rem 0 0 0.04rem; }
.types .talk{ line-height:0.14rem; font-size:0.1rem; margin:0.04rem; }
.types .talk mark{ background:none; }
.types .talk mark.green{ color:green; }
.types .talk mark.blue{ color:blue; }
.types .talk mark.yellow{ color:#F0AD4E; }
.types .talk mark.red{ color:red; }

.main_box{ width:98%; overflow:hidden; margin:0 auto; }
.main_box aside{ padding:0.05rem; font-size:0.13rem; overflow:hidden; background:rgba(223, 208, 175, 0.81); border:1px solid #DDDDDD; box-sizing:border-box;  box-shadow:2px #ccc; }
.main_box>aside p{ font-weight:bolder; font-size:0.1rem; color:#000; line-height:0.16rem; }
.main_box>aside p:nth-of-type(1){ float:left; width:65%; }
.main_box>aside p:nth-of-type(2){ float:right; width:35%; }

.main_box>ul{ width:98%; overflow:hidden; margin:0 auto; font-size:0.1rem; }
.main_box>ul>li{ padding:0.08rem 0.05rem; overflow:hidden; border-bottom:1px solid rgba(0,0,0,0.2); box-sizing:border-box; }
.main_box>ul>li .whos{ overflow:hidden;  }
.main_box>ul>li .whosplay{ overflow:hidden; height:0;  }

div.whos>a{ float:left; width:65%; text-indent:0.15rem; background:url(/img/sai.png) no-repeat 0 center; color:#337ab7; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
div.whos>p{ float:right; width:35%; color:red;  overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }

div.whos>p>mark{ background:none; }
div.whos>p>mark:nth-of-type(1){ background:#FFFF99; color:#5cb85c; }
div.whos>p>mark:nth-of-type(2){ background:#FFFF99; color:#31b0d5; }
</style>
</head>
	<body title="足球单式">
			<section class="nav_list">
				<a href="zqds.php?<?=rand()?>" title="刷新">刷新<em></em></a>
				<a class="active" href="../main.php" title="返回菜单">&lt;&lt;返回</a>
			</section>
			<section class="types">
				<aside>
					足球（早餐）>>
				</aside>
				<a class="numBtn" href="javascript:;">1</a>
				<p class="talk">
					说明：点击+号图标展开；投注时请选择对应按钮，主队(<mark class="green">绿色</mark>)客队(<mark class="blue">蓝色</mark>)和(<mark class="yellow">黄色</mark>),赔率水位变化时背景变<mark class="red">红色</mark>
				</p>
				<article class="main_box">
					<aside>
						<p>赛程<br />点击展开</p>
						<p>时间<br />主队/客队</p>
					</aside>
					<ul>
						<li>
							<div class="whos">
								<a href="javascript:;">歐洲足球錦標賽2016(在法國)</a>
								<p>
									16-10<br />
									15:00<br />
									<mark>法國</mark>-
									<mark>羅馬尼亞</mark>-
									<span></span>
								</p>

							</div>
							<div class="whosplay">

							</div>
						</li>
						<li>
							<div class="whos">
								<a href="javascript:;">歐洲足球錦標賽2016(在法國)</a>
								<p>
									16-10<br />
									15:00<br />
									<mark>法國</mark>-
									<mark>羅馬尼亞</mark>-
									<span></span>
								</p>

							</div>
							<div class="whosplay">

							</div>
						</li>
						<li>
							<div class="whos">
								<a href="javascript:;">歐洲足球錦標賽2016(在法國)</a>
								<p>
									16-10<br />
									15:00<br />
									<mark>法國</mark>-
									<mark>羅馬尼亞</mark>-
									<span></span>
								</p>

							</div>
							<div class="whosplay">

							</div>
						</li>
						<li>
							<div class="whos">
								<a href="javascript:;">歐洲足球錦標賽2016(在法國)</a>
								<p>
									16-10<br />
									15:00<br />
									<mark>法國</mark>-
									<mark>羅馬尼亞</mark>-
									<span></span>
								</p>

							</div>
							<div class="whosplay">

							</div>
						</li>
						<li>
							<div class="whos">
								<a href="javascript:;">歐洲足球錦標賽2016(在法國)</a>
								<p>
									16-10<br />
									15:00<br />
									<mark>法國</mark>-
									<mark>羅馬尼亞</mark>-
									<span></span>
								</p>

							</div>
							<div class="whosplay">

							</div>
						</li>
					</ul>
				</article>
			</section>
	</body>
	<script>
		Height();
			function Height(){	
				$(window.parent.document).find('#iFrameT').height( $('body').height() );
			}
	</script>
</html>