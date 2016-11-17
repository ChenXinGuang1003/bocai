
<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
		<script src="js/jquery-1.10.1.min.js" type="text/javascript"></script>
		<script src="/js/PC/lt_show.js?16341e8"></script>
		<script>
			if( window != window.top ){
				window.top.location.href = window.location.href ;
			}
			var ClientW = $(window).width();
			$('html').css('fontSize',ClientW/3+'px');
		</script>
		<link href="css/main.css" rel="stylesheet" type="text/css">
		
	</head>
	<body>
		<article class="mainBox">
			<header id="headerBox">
				<a href="wap.php"></a>
				<img class="logo" src="img/logo.png" />
				<?php
					session_start();
					$uid=isset($_SESSION['uid'])? $_SESSION['uid']:'';
					if(!$uid){
				?>

					<a href="login/login.php">登录</a>

				<?php  
					}
				?>
				
			</header>
			<article id="contant">
				<section class="contant_list">
					<nav class="nav">
						<div class="active">体育赛事</div>
						<div>彩票游戏</div>
						<div>香港乐透</div>
					</nav>
					<article id="main_tab">

						<section class="seList">	<!-- 1体育赛事 -->
							<iframe id="iFrameT" class="iFrames" src="/caigames/tiyugames.php" frameborder="0" scrolling="no" height="2.1rem" width="100%"></iframe>
							<footer class="footer">
								©2015 AMYL 版权所有
							</footer>
						</section><!-- end 1体育赛事 -->
						<section class="seList seLisT2">	<!-- 2彩票游戏 -->
							<iframe id="iFrame" class="iFrames" src="/caigames/caigames.php" frameborder="0" scrolling="no" height="2.1rem" width="100%"></iframe>
							<footer class="footer">
							©2015 AMYL 版权所有
							</footer>
						</section>	<!-- end 2彩票游戏 -->
						<?php
							include "app/member/include/com_chk.php";
							include "resource/lottery/result/Js_Class.php";

							$sql="select * from six_lottery_schedule where id=25";
							$query=$mysqli->query($sql) or die('error!');
							$arr1=$query->fetch_array();

							$sql="select * from six_lottery_schedule where id=23";
							$query=$mysqli->query($sql) or die('error!');
							$arr2=$query->fetch_array();

							$sql="select * from lottery_result_lhc where id=43";
							$query=$mysqli->query($sql) or die('error!');
							$arr3=$query->fetch_array();
						?>
						<section class="seList seLisT3">	<!-- 3六合彩 -->
							<aside>
								<div class="lottery_time">
									香港乐透
									<span>第<mark><?php echo $arr1['qishu'];?></mark>期</span>
									<span id='djs'>00:00:00</span>
								</div>
								<div class="lottery_num">
									<p>
										<span>第<?php echo $arr2['qishu'];?>期开奖号码：</span>
										<em><?php echo $arr3['ball_1']<10?'0'.$arr3['ball_1']:$arr3['ball_1']; ?></em>
										<em><?php echo $arr3['ball_2']<10?'0'.$arr3['ball_2']:$arr3['ball_2']; ?></em>
										<em><?php echo $arr3['ball_3']<10?'0'.$arr3['ball_3']:$arr3['ball_3']; ?></em>
										<em><?php echo $arr3['ball_4']<10?'0'.$arr3['ball_4']:$arr3['ball_4']; ?></em>
										<em><?php echo $arr3['ball_5']<10?'0'.$arr3['ball_5']:$arr3['ball_5']; ?></em>
										<em><?php echo $arr3['ball_6']<10?'0'.$arr3['ball_6']:$arr3['ball_6']; ?></em>
										<em>+</em>
										<em><?php echo $arr3['ball_7']<10?'0'.$arr3['ball_7']:$arr3['ball_7']; ?></em>
									</p>
									<p>
										<span>生肖：</span>
										<em><?php echo lhc_sum_sx($arr3['ball_1'],$arr3['datetime']);?></em>
										<em><?php echo lhc_sum_sx($arr3['ball_2'],$arr3['datetime']);?></em>
										<em><?php echo lhc_sum_sx($arr3['ball_3'],$arr3['datetime']);?></em>
										<em><?php echo lhc_sum_sx($arr3['ball_4'],$arr3['datetime']);?></em>
										<em><?php echo lhc_sum_sx($arr3['ball_5'],$arr3['datetime']);?></em>
										<em><?php echo lhc_sum_sx($arr3['ball_6'],$arr3['datetime']);?></em>
										<em>+</em>
										<em><?php echo lhc_sum_sx($arr3['ball_7'],$arr3['datetime']);?></em>
										<a href="javascript:;">开奖历史</a>
									</p>
								</div>
								<div  class="lottery_kind">
									<a href="javascript:;" class="active">特码</a>
									<a href="javascript:;">正码/一肖/尾数</a>
									<a href="javascript:;">生肖连</a>
								</div>
							</aside>
							<section class="lotterListBox">
								<div class="lotteryBtn">
									<a class="active" href="javascript:;">特码(01-24)</a>
									<a href="javascript:;">特码(25-49)</a>
									<a href="javascript:;">两面盘</a>
									<a href="javascript:;">波 色</a>
									<a href="javascript:;">特 肖</a>
								</div>
								<form action="#" method="post" id="fomes">
									
									<div class="numBox">
										<nav>
											<span>号码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span>号码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<?php
											$sql="select * from six_lottery_odds where sub_type='SP' and ball_type='a_side'";
											$query=$mysqli->query($sql) or die('error!');
											$arr=$query->fetch_array();
										?>
										<p>
											<span class="bg_red">01</span>
											<span><?php echo $arr['h1']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">02</span>
											<span><?php echo $arr['h2']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_blue">03</span>
											<span><?php echo $arr['h3']; ?></span>
											<input name="" type="text" />
											<span class="bg_blue">04</span>
											<span><?php echo $arr['h4']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_green">05</span>
											<span><?php echo $arr['h5']; ?></span>
											<input name="" type="text" />
											<span class="bg_green">06</span>
											<span><?php echo $arr['h6']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">07</span>
											<span><?php echo $arr['h7']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">08</span>
											<span><?php echo $arr['h8']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_blue">09</span>
											<span><?php echo $arr['h9']; ?></span>
											<input name="" type="text" />
											<span class="bg_blue">10</span>
											<span><?php echo $arr['h10']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_green">11</span>
											<span><?php echo $arr['h11']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">12</span>
											<span><?php echo $arr['h12']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">13</span>
											<span><?php echo $arr['h13']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">14</span>
											<span><?php echo $arr['h14']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">15</span>
											<span><?php echo $arr['h15']; ?></span>
											<input name="" type="text" />
											<span class="bg_blue">16</span>
											<span><?php echo $arr['h16']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_blue">17</span>
											<span><?php echo $arr['h17']; ?></span>
											<input name="" type="text" />
											<span class="bg_green">18</span>
											<span><?php echo $arr['h18']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_blue">19</span>
											<span><?php echo $arr['h19']; ?></span>
											<input name="" type="text" />
											<span class="bg_green">20</span>
											<span><?php echo $arr['h20']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_green">21</span>
											<span><?php echo $arr['h21']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">22</span>
											<span><?php echo $arr['h22']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">23</span>
											<span><?php echo $arr['h23']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">24</span>
											<span><?php echo $arr['h24']; ?></span>
											<input name="" type="text" />
										</p>
									</div>

									<div class="numBox">
										<nav>
											<span>号码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span>号码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<p>
											<span class="bg_blue">25</span>
											<span><?php echo $arr['h25']; ?></span>
											<input name="" type="text" />
											<span class="bg_green">26</span>
											<span><?php echo $arr['h26']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_blue">27</span>
											<span><?php echo $arr['h27']; ?></span>
											<input name="" type="text" />
											<span class="bg_green">28</span>
											<span><?php echo $arr['h28']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_green">29</span>
											<span><?php echo $arr['h29']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">30</span>
											<span><?php echo $arr['h30']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_green">31</span>
											<span><?php echo $arr['h31']; ?></span>
											<input name="" type="text" />
											<span class="bg_blue">32</span>
											<span><?php echo $arr['h32']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">33</span>
											<span><?php echo $arr['h33']; ?></span>
											<input name="" type="text" />
											<span class="bg_blue">34</span>
											<span><?php echo $arr['h34']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">35</span>
											<span><?php echo $arr['h35']; ?></span>
											<input name="" type="text" />
											<span class="bg_green">36</span>
											<span><?php echo $arr['h36']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_blue">37</span>
											<span><?php echo $arr['h37']; ?></span>
											<input name="" type="text" />
											<span class="bg_green">38</span>
											<span><?php echo $arr['h38']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_green">39</span>
											<span><?php echo $arr['h39']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">40</span>
											<span><?php echo $arr['h40']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_green">41</span>
											<span><?php echo $arr['h41']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">42</span>
											<span><?php echo $arr['h42']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">43</span>
											<span><?php echo $arr['h43']; ?></span>
											<input name="" type="text" />
											<span class="bg_blue">44</span>
											<span><?php echo $arr['h44']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">45</span>
											<span><?php echo $arr['h45']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">46</span>
											<span><?php echo $arr['h46']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">47</span>
											<span><?php echo $arr['h47']; ?></span>
											<input name="" type="text" />
											<span class="bg_green">48</span>
											<span><?php echo $arr['h48']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_green">49</span>
											<span><?php echo $arr['h49']; ?></span>
											<input name="" type="text" />
										</p>
									</div>
									
									<div class="numBox">
										<nav>
											<span>玩法</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span>玩法</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<?php
											$sql="select * from six_lottery_odds where sub_type='NAP1'";
											$query=$mysqli->query($sql) or die('error!');
											$arr=$query->fetch_array();
										?>
										<p>
											<span>特大</span>
											<span><?php echo $arr['h1']; ?></span>
											<input name="" type="text" />
											<span>特小</span>
											<span><?php echo $arr['h2']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>特单</span>
											<span><?php echo $arr['h3']; ?></span>
											<input name="" type="text" />
											<span>特双</span>
											<span><?php echo $arr['h4']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>和大</span>
											<span><?php echo $arr['h5']; ?></span>
											<input name="" type="text" />
											<span>和小</span>
											<span><?php echo $arr['h6']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>和单</span>
											<span><?php echo $arr['h7']; ?></span>
											<input name="" type="text" />
											<span>和双</span>
											<span><?php echo $arr['h8']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>尾大</span>
											<span><?php echo $arr['h9']; ?></span>
											<input name="" type="text" />
											<span>尾小</span>
											<span><?php echo $arr['h10']; ?></span>
											<input name="" type="text" />
										</p>
									</div>

									<div class="numBox styles">
										<nav>
											<span>玩法</span>
											<span>赔率</span>
											<span>金额</span>
										</nav>
										<p>
											<span class="bg_red"></span>
											<span><?php echo $arr['h11']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_blue"></span>
											<span><?php echo $arr['h12']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_green"></span>
											<span><?php echo $arr['h13']; ?></span>
											<input name="" type="text" />
										</p>
									</div>

									<div class="numBox">
										<nav>
											<span>特肖</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span>特肖</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<?php
											$sql="select * from six_lottery_odds where sub_type='LX3'";
											$query=$mysqli->query($sql) or die('error!');
											$arr=$query->fetch_array();
										?>
										<p>
											<span>鼠</span>
											<span><?php echo $arr['h1']; ?></span>
											<input name="" type="text" />
											<span>马</span>
											<span><?php echo $arr['h7']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>牛</span>
											<span><?php echo $arr['h2']; ?></span>
											<input name="" type="text" />
											<span>羊</span>
											<span><?php echo $arr['h8']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>虎</span>
											<span><?php echo $arr['h3']; ?></span>
											<input name="" type="text" />
											<span>猴</span>
											<span><?php echo $arr['h9']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>兔</span>
											<span><?php echo $arr['h4']; ?></span>
											<input name="" type="text" />
											<span>鸡</span>
											<span><?php echo $arr['h10']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>龙</span>
											<span><?php echo $arr['h5']; ?></span>
											<input name="" type="text" />
											<span>狗</span>
											<span><?php echo $arr['h11']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>蛇</span>
											<span><?php echo $arr['h6']; ?></span>
											<input name="" type="text" />
											<span>猪</span>
											<span><?php echo $arr['h12']; ?></span>
											<input name="" type="text" />
										</p>
									</div>
									<div class="sub">
										<input id="reset" type="reset" value="重填" />
										<input id="submit" type="submit" value="投注" />
									</div>
									</form>
									</section>

							<section class="lotterListBox"> <!-- 2 -->
								<div class="lotteryBtn">
									<a class="active" href="javascript:;">正码(01-24)</a>
									<a href="javascript:;">正码(25-49)</a>
									<a href="javascript:;">一 肖</a>
									<a href="javascript:;">平特尾数</a>
								</div>
								<form action="#" method="post" id="fomes">
									
									<div class="numBox">
										<?php
											$sql="select * from six_lottery_odds where sub_type='NA'";
											$query=$mysqli->query($sql) or die('error!');
											$arr=$query->fetch_array();
										?>
										<nav>
											<span>正码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span>正码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<p>
											<span class="bg_red">01</span>
											<span><?php echo $arr['h1']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">02</span>
											<span><?php echo $arr['h2']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">03</span>
											<span><?php echo $arr['h3']; ?></span>
											<input name="" type="text" />
											<span class="bg_blue">04</span>
											<span><?php echo $arr['h4']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_blue">05</span>
											<span><?php echo $arr['h5']; ?></span>
											<input name="" type="text" />
											<span class="bg_blue">06</span>
											<span><?php echo $arr['h6']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_blue">07</span>
											<span><?php echo $arr['h7']; ?></span>
											<input name="" type="text" />
											<span class="bg_green">08</span>
											<span><?php echo $arr['h8']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_green">09</span>
											<span><?php echo $arr['h9']; ?></span>
											<input name="" type="text" />
											<span class="bg_green">10</span>
											<span><?php echo $arr['h10']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_green">11</span>
											<span><?php echo $arr['h11']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">12</span>
											<span><?php echo $arr['h12']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">13</span>
											<span><?php echo $arr['h13']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">14</span>
											<span><?php echo $arr['h14']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">15</span>
											<span><?php echo $arr['h15']; ?></span>
											<input name="" type="text" />
											<span class="bg_blue">16</span>
											<span><?php echo $arr['h16']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_blue">17</span>
											<span><?php echo $arr['h17']; ?></span>
											<input name="" type="text" />
											<span class="bg_green">18</span>
											<span><?php echo $arr['h18']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_blue">19</span>
											<span><?php echo $arr['h19']; ?></span>
											<input name="" type="text" />
											<span class="bg_green">20</span>
											<span><?php echo $arr['h20']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_green">21</span>
											<span><?php echo $arr['h21']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">22</span>
											<span><?php echo $arr['h22']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">23</span>
											<span><?php echo $arr['h23']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">24</span>
											<span><?php echo $arr['h24']; ?></span>
											<input name="" type="text" />
										</p>
									</div>

									<div class="numBox">
										<nav>
											<span>号码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span>号码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<p>
											<span class="bg_blue">25</span>
											<span><?php echo $arr['h25']; ?></span>
											<input name="" type="text" />
											<span class="bg_green">26</span>
											<span><?php echo $arr['h26']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_blue">27</span>
											<span><?php echo $arr['h27']; ?></span>
											<input name="" type="text" />
											<span class="bg_green">28</span>
											<span><?php echo $arr['h28']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_green">29</span>
											<span><?php echo $arr['h29']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">30</span>
											<span><?php echo $arr['h30']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_green">31</span>
											<span><?php echo $arr['h31']; ?></span>
											<input name="" type="text" />
											<span class="bg_blue">32</span>
											<span><?php echo $arr['h32']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">33</span>
											<span><?php echo $arr['h33']; ?></span>
											<input name="" type="text" />
											<span class="bg_blue">34</span>
											<span><?php echo $arr['h34']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">35</span>
											<span><?php echo $arr['h35']; ?></span>
											<input name="" type="text" />
											<span class="bg_green">36</span>
											<span><?php echo $arr['h36']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_blue">37</span>
											<span><?php echo $arr['h37']; ?></span>
											<input name="" type="text" />
											<span class="bg_green">38</span>
											<span><?php echo $arr['h38']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_green">39</span>
											<span><?php echo $arr['h39']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">40</span>
											<span><?php echo $arr['h40']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_green">41</span>
											<span><?php echo $arr['h41']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">42</span>
											<span><?php echo $arr['h42']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">43</span>
											<span><?php echo $arr['h43']; ?></span>
											<input name="" type="text" />
											<span class="bg_blue">44</span>
											<span><?php echo $arr['h44']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">45</span>
											<span><?php echo $arr['h45']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">46</span>
											<span><?php echo $arr['h46']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">47</span>
											<span><?php echo $arr['h47']; ?></span>
											<input name="" type="text" />
											<span class="bg_red">48</span>
											<span><?php echo $arr['h48']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span class="bg_red">49</span>
											<span><?php echo $arr['49']; ?></span>
											<input name="" type="text" />
										</p>
									</div>
									<div class="numBox">
										<nav>
											<span>一肖</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span>一肖</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<?php
											$sql="select * from six_lottery_odds where sub_type='SPB'";
											$query=$mysqli->query($sql) or die('error!');
											$arr=$query->fetch_array();
										?>
										<p>
											<span>鼠</span>
											<span><?php echo $arr['h1']; ?></span>
											<input name="" type="text" />
											<span>马</span>
											<span><?php echo $arr['h7']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>牛</span>
											<span><?php echo $arr['h2']; ?></span>
											<input name="" type="text" />
											<span>羊</span>
											<span><?php echo $arr['h8']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>虎</span>
											<span><?php echo $arr['h3']; ?></span>
											<input name="" type="text" />
											<span>猴</span>
											<span><?php echo $arr['h9']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>兔</span>
											<span><?php echo $arr['h4']; ?></span>
											<input name="" type="text" />
											<span>鸡</span>
											<span><?php echo $arr['h10']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>龙</span>
											<span><?php echo $arr['h5']; ?></span>
											<input name="" type="text" />
											<span>狗</span>
											<span><?php echo $arr['h11']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>蛇</span>
											<span><?php echo $arr['h6']; ?></span>
											<input name="" type="text" />
											<span>猪</span>
											<span><?php echo $arr['h12']; ?></span>
											<input name="" type="text" />
										</p>
									</div>
									
									<div class="numBox">
										<nav>
											<span>尾数</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span>尾数</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<p>
											<span>0尾</span>
											<span><?php echo $arr['h13']; ?></span>
											<input name="" type="text" />
											<span>1尾</span>
											<span><?php echo $arr['h14']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>2尾</span>
											<span><?php echo $arr['h15']; ?></span>
											<input name="" type="text" />
											<span>3尾</span>
											<span><?php echo $arr['h16']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>4尾</span>
											<span><?php echo $arr['h17']; ?></span>
											<input name="" type="text" />
											<span>5尾</span>
											<span><?php echo $arr['h18']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>6尾</span>
											<span><?php echo $arr['h19']; ?></span>
											<input name="" type="text" />
											<span>7尾</span>
											<span><?php echo $arr['h20']; ?></span>
											<input name="" type="text" />
										</p>
										<p>
											<span>8尾</span>
											<span><?php echo $arr['h21']; ?></span>
											<input name="" type="text" />
											<span>9尾</span>
											<span><?php echo $arr['h22']; ?></span>
											<input name="" type="text" />
										</p>
									</div>

									<div class="sub">
										<input id="reset" type="reset" value="重填" />
										<input id="submit" type="submit" value="投注" />
									</div>
									</form>
									</section> <!-- !end 2 -->

								<section class="lotterListBox stys"> <!-- 3 -->
								<div class="lotteryBtn">
									<span><input type="radio" name="types" value="2" /> 二肖连中</span><span><input type="radio" name="types" value="3" /> 三肖连中</span><span><input type="radio" name="types" value="4" /> 四肖连中</span><span><input type="radio" name="types" value="5" /> 五肖连中</span>
								</div>
								<form action="#" method="post" id="fomes">
									
									<div class="numBox">
										<nav>
											<span>生肖</span>
											<span>选择</span>
											<span class="IU">赔率</span>
											<span>生肖</span>
											<span>选择</span>
											<span class="IU">赔率</span>
										</nav>
										<?php
											$sql="select * from six_lottery_odds where sub_type='LX2'";
											$query=$mysqli->query($sql) or die('error!');
											$arr=$query->fetch_array();
										?>
										<p>
											<span>鼠</span>
											<input name="" type="checkbox" />
											<span class='p_0'><?php echo $arr['h1']; ?></span>
											<span>牛</span>
											<input name="" type="checkbox" />
											<span class='p_1'><?php echo $arr['h2']; ?></span>
										</p>
										<p>
											<span>虎</span>
											<input name="" type="checkbox" />
											<span class='p_2'><?php echo $arr['h3']; ?></span>
											<span>兔</span>
											<input name="" type="checkbox" />
											<span class='p_3'><?php echo $arr['h4']; ?></span>
										</p>
										<p>
											<span>龙</span>
											<input name="" type="checkbox" />
											<span class='p_4'><?php echo $arr['h5']; ?></span>
											<span>蛇</span>
											<input name="" type="checkbox" />
											<span class='p_5'><?php echo $arr['h6']; ?></span>
										</p>
										<p>
											<span>马</span>
											<input name="" type="checkbox" />
											<span class='p_6'><?php echo $arr['h7']; ?></span>
											<span>羊</span>
											<input name="" type="checkbox" />
											<span class='p_7'><?php echo $arr['h8']; ?></span>
										</p>
										<p>
											<span>猴</span>
											<input name="" type="checkbox" />
											<span class='p_8'><?php echo $arr['h9']; ?></span>
											<span>鸡</span>
											<input name="" type="checkbox" />
											<span class='p_9'><?php echo $arr['h10']; ?></span>
										</p>
										<p>
											<span>狗</span>
											<input name="" type="checkbox" />
											<span class='p_10'><?php echo $arr['h11']; ?></span>
											<span>猪</span>
											<input name="" type="checkbox" />
											<span class='p_11'><?php echo $arr['h12']; ?></span>
										</p>
									</div>
									<div class="sub">
										<input id="reset" type="reset" value="重填" />
										<input id="submit" type="submit" value="投注" />
									</div>
									</form>
									</section>
									<footer class="footer">
										©2015 AMYL 版权所有
									</footer>
								</section><!-- end3六合彩 -->


								</article>
							</section>
						</section>

					</article>
				</section>
			</article>
			
		</article>
		<script type="text/javascript">
			//大选项卡平移
			(function(){
				//初始化
				var bMaBtns = $('.nav div') ;
				var str = window.location.href ;
				if( str.indexOf('?3') != -1 ){
					bMaBtns.eq(2).addClass('active');
					bMaBtns.not (bMaBtns.eq(2) ).removeClass('active');
					$('#main_tab').css('transform','translateX(-'+2*$('#main_tab').width()/3+'px)');

				} else if( str.indexOf('?2') != -1 ){
					bMaBtns.eq(1).addClass('active');
					bMaBtns.not (bMaBtns.eq(1) ).removeClass('active');
					$('#main_tab').css('transform','translateX(-'+$('#main_tab').width()/3+'px)');
				}
					
				bMaBtns.on('touchend',bMtab);
				function bMtab(){
					$(this).addClass('active');
					bMaBtns.not($(this)).removeClass('active');

					$('#main_tab').css('transform','translateX(-'+$(this).index()*$('#main_tab').width()/3+'px)');
				}
			})();

			//彩票盒切换
			(function(){
				var caipiaoBox = $('.lottery_kind a');
				caipiaoBox.on('touchend',caBfn);
				function caBfn(){
					$(this).addClass('active');
					caipiaoBox.not($(this)).removeClass('active');

					$('.lotterListBox').eq($(this).index()).css('display','block');
					$('.lotterListBox').not( $('.lotterListBox').eq($(this).index()) ).css('display','none');


					//切换选择的彩票
					var caipiaoT = $('.lotterListBox').eq( $(this).index() ).find('.lotteryBtn');	//按钮列表盒子 1
					var ListBox = $('.lotterListBox').eq( $(this).index() ).find('.numBox');	//对应按钮列表盒子 多个

						if(caipiaoT.find('a')){
							var caiPiaonm = caipiaoT.find('a'); 

							caiPiaonm.on('touchend',caifn);
							function caifn(){
								$(this).addClass('active');
								caiPiaonm.not($(this)).removeClass('active');
								ListBox.eq($(this).index()).css('display','block');
								ListBox.not( ListBox.eq($(this).index()) ).css('display','none');
							}
						}
				}
			})();

			//切换
			(function(){
				$('.lotteryBtn span').on('touchend',qiehuan);
				function qiehuan(){
					$.get('check_ajax.php',{'val':$(this).children().val()},function(ee){
						$arr=eval(ee);
						for($i=4;$i<16;$i++){
							$('.p_'+($i-4)).html($arr[$i]);
						}
					})
				}
			})();

		</script>
	</body>
</html>