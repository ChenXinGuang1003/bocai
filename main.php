<?php
include "app/member/include/com_chk.php";
include "resource/lottery/result/Js_Class.php";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
		<script src="js/jquery-1.10.1.min.js" type="text/javascript"></script>
		<script>
			if( window != window.top ){
				window.top.location.href = window.location.href ;
			}
			var ClientW = $(window).width();
			$('html').css('fontSize',ClientW/3+'px');
		</script>

		<script src="/js/PC/lt_show.js?16341e8"></script>

		<script type="text/javascript">

		$(window).ready(function(){
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

				function  caBfn(){
					$(this).addClass('active');
					caipiaoBox.not($(this)).removeClass('active');

					$('.lotterListBox').eq($(this).index()).css('display','block');
					$('.lotterListBox').not( $('.lotterListBox').eq($(this).index()) ).css('display','none');

					caBfns( $(this) );
				}
				
				caipiaoBox.each(function(i){
					caBfns( $(this) );
				});

				function caBfns( This ){
						//切换选择的彩票
					var caipiaoT = $('.lotterListBox').eq( This.index() ).find('.lotteryBtn');	//按钮列表盒子 1
					var ListBox = $('.lotterListBox').eq( This.index() ).find('.numBox');	//对应按钮列表盒子 多个

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

			//倒计时
			(function(){
				$djs=$('#djs').attr('name');
				$h=Math.floor($djs/3600);
				$m=Math.floor(($djs-$h*3600)/60);
				$s=$djs-$h*3600-$m*60;

				function time(){
					$s--;
					$result=($h<10?'0'+$h:$h)+':'+($m<10?'0'+$m:$m)+':'+($s=$s<10?'0'+$s:$s);
					if($s==0){
						$s=60;
						if($m==0){
							$m=60;
							if($h==0){
								$h=48;
							}
							$h--;
						}
						$m--;
					}
					$('#djs').html($result);
				}
				setInterval(time,1000);
			})();

			(function(){
					var ack = "<?php echo $_GET['ack'];?>";
					if(ack=='uu'){
						$('.xg').trigger('touchend');
					}
				
			})();
		});
			

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
						<div class='xg'>香港乐透</div>
					</nav>
					<article id="main_tab">

						<section class="seList">	<!-- 1体育赛事 -->
							<iframe id="iFrameT" class="iFrames" src="/caigames/tiyugames.php" frameborder="0" scrolling="no" height="2.1rem" width="100%"></iframe>
							<footer class="footer">
								©2016 澳门永利赌场  版权所有
							</footer>
						</section><!-- end 1体育赛事 -->
						<section class="seList seLisT2">	<!-- 2彩票游戏 -->
							<iframe id="iFrame" class="iFrames" src="/caigames/caigames.php" frameborder="0" scrolling="no" height="2.1rem" width="100%"></iframe>
							<footer class="footer">
							©2016 澳门永利赌场  版权所有
							</footer>
						</section>	<!-- end 2彩票游戏 -->

						<?php
							$red=[1,2,7,8,12,13,18,19,23,24,29,30,34,35,40,45,46];
							$blue=[3,4,9,10,14,15,20,25,26,31,36,37,41,42,47,48];
							$green=[5,6,11,16,17,21,22,27,28,32,33,38,39,43,44,49];
							
							$sql="select max(id) as id from six_lottery_schedule";
							$query=$mysqli->query($sql) or die('error!');
							$id=$query->fetch_array();
							$id=$id['id'];

							$sql="select max(id) as id from lottery_result_lhc";
							$query=$mysqli->query($sql) or die('error!');
							$aid=$query->fetch_array();
							$aid=$aid['id'];

							$sql="select * from six_lottery_schedule where id=".$id;
							$query=$mysqli->query($sql) or die('error!');
							$arr1=$query->fetch_array();

							$sql="select * from six_lottery_schedule where id=".($id-1);
							$query=$mysqli->query($sql) or die('error!');
							$arr2=$query->fetch_array();

							$sql="select * from lottery_result_lhc where id=".$aid;
							$query=$mysqli->query($sql) or die('error!');
							$arr3=$query->fetch_array();
						?>
						<section class="seList seLisT3">	<!-- 3六合彩 -->
							<aside>
								<div class="lottery_time">
									香港乐透
									<span id='uu'>第<mark><?php echo $arr1['qishu'];?></mark>期</span>
									<span id='djs' name='<?php echo strtotime($arr1['fenpan_time'])-time();?>'>00:00:00</span>
								</div>
								<div class="lottery_num">
									<p>
										<span>第<?php echo $arr2['qishu'];?>期开奖号码：</span>
										<em style="<?=in_array($arr3['ball_1'],$red)?' ':(in_array($arr3['ball_1'],$green)?'background-position:center bottom;':'background-position:center -0.19rem;')?>"><?php echo $arr3['ball_1']<10?'0'.$arr3['ball_1']:$arr3['ball_1']; ?></em>
										<em style="<?=in_array($arr3['ball_2'],$red)?' ':(in_array($arr3['ball_2'],$green)?'background-position:center bottom;':'background-position:center -0.19rem;')?>"><?php echo $arr3['ball_2']<10?'0'.$arr3['ball_2']:$arr3['ball_2']; ?></em>
										<em style="<?=in_array($arr3['ball_3'],$red)?' ':(in_array($arr3['ball_3'],$green)?'background-position:center bottom;':'background-position:center -0.19rem;')?>"><?php echo $arr3['ball_3']<10?'0'.$arr3['ball_3']:$arr3['ball_3']; ?></em>
										<em style="<?=in_array($arr3['ball_4'],$red)?' ':(in_array($arr3['ball_4'],$green)?'background-position:center bottom;':'background-position:center -0.19rem;')?>"><?php echo $arr3['ball_4']<10?'0'.$arr3['ball_4']:$arr3['ball_4']; ?></em>
										<em style="<?=in_array($arr3['ball_5'],$red)?' ':(in_array($arr3['ball_5'],$green)?'background-position:center bottom;':'background-position:center -0.19rem;')?>"><?php echo $arr3['ball_5']<10?'0'.$arr3['ball_5']:$arr3['ball_5']; ?></em>
										<em style="<?=in_array($arr3['ball_6'],$red)?' ':(in_array($arr3['ball_6'],$green)?'background-position:center bottom;':'background-position:center -0.19rem;')?>"><?php echo $arr3['ball_6']<10?'0'.$arr3['ball_6']:$arr3['ball_6']; ?></em>
										<em>+</em>
										<em style="<?=in_array($arr3['ball_7'],$red)?' ':(in_array($arr3['ball_7'],$green)?'background-position:center bottom;':'background-position:center -0.19rem;')?>"><?php echo $arr3['ball_7']<10?'0'.$arr3['ball_7']:$arr3['ball_7']; ?></em>
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
										<a href="../member/final/LT_result.php?gtype=T3">开奖历史</a>
									</p>
								</div>
								<div  class="lottery_kind" id='height'>
									<!-- <a href="javascript:;" class="active">特码A</a> -->
									<a href="javascript:;">特码</a>
									<a href="javascript:;">正码</a>
									<a href="javascript:;">生肖连/连尾</a>
									<a href="javascript:;">特码生肖/色波</a>
									<a href="javascript:;">一肖平/特尾数</a>
									<a href="javascript:;">连码</a>
									<a href="javascript:;">自选不中</a>
									<a href="javascript:;">六肖中特</a>
								</div>
							</aside>

							<!-- <section class="lotterListBox">1A
								<div class="lotteryBtn">
									<a class="active" href="javascript:;">特码A(01-24)</a>
									<a href="javascript:;">特码A(25-49)</a>
									
									<a href="javascript:;">色波</a>
									<a href="javascript:;">大小单双</a>
									<a href="javascript:;">两面盘</a>
								</div>
								<form action="member/Grp/grpOrder.php?style=wap" method="post" id="fomes_SP" class='box'>
									<input type='hidden' name="gid" value="SP" />
									<div class="numBox">
										<nav>
											<span class='play'>号码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span class='play2'>号码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<?php
											$red=[1,2,7,8,12,13,18,19,23,24,29,30,34,35,40,45,46];
											$blue=[3,4,9,10,14,15,20,25,26,31,36,37,41,42,47,48];
											$green=[5,6,11,16,17,21,22,27,28,32,33,38,39,43,44,49];
							
											$sql="select * from six_lottery_odds where sub_type='SP' and ball_type='a_side'";
											$query=$mysqli->query($sql) or die('error!');
											$arr=$query->fetch_array();
							
											for($i=1;$i<=24;$i+=2){
											?>
												<p>
													<span class="<?php echo in_array($i,$red)?'bg_red':(in_array($i,$blue)?'bg_blue':'bg_green');?>" ><?php echo $i<10?'0'.$i:$i;?></span>
													<span><?php echo $arr['h'.$i]; ?></span>
													<input name="odds[SP<?php echo $i<10?'0'.$i:$i;?>]" type="hidden" value="<?php echo $arr['h'.$i]; ?>" />
													<input name="gold[SP<?php echo $i<10?'0'.$i:$i;?>]" type="text" />
							
													<span class="<?php echo in_array($i+1,$red)?'bg_red':(in_array($i+1,$blue)?'bg_blue':'bg_green');?>"><?php echo $i<9?'0'.($i+1):($i+1);?></span>
													<span><?php echo $arr['h'.($i+1)]; ?></span>
													<input name="gold[SP<?php echo $i<9?'0'.($i+1):($i+1);?>]" type="text" />
													<input name="odds[SP<?php echo $i<9?'0'.($i+1):($i+1);?>]" type="hidden" value="<?php echo $arr['h'.($i+1)]; ?>" />
												</p>
							
											<?php
											}
										?>
											
									</div>
							
									<div class="numBox">
										<nav>
											<span class='play'>号码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span class='play2'>号码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<?php
										for($i=25;$i<=48;$i+=2){
											?>
												<p>
													<span class="<?php echo in_array($i,$red)?'bg_red':(in_array($i,$blue)?'bg_blue':'bg_green');?>"><?=$i;?></span>
													<span><?php echo $arr['h'.$i]; ?></span>
													<input name="gold[SP<?=$i;?>]" type="text" />
													<input name="odds[SP<?=$i;?>]" type="hidden" value="<?php echo $arr['h'.$i]; ?>" />
													<span class="<?php echo in_array($i+1,$red)?'bg_red':(in_array($i+1,$blue)?'bg_blue':'bg_green');?>"><?=$i+1;?></span>
													<span><?php echo $arr['h'.($i+1)]; ?></span>
													<input name="gold[SP<?=$i+1;?>]" type="text" />
													<input name="odds[SP<?=$i+1;?>]" type="hidden" value="<?php echo $arr['h'.($i+1)]; ?>" />
												</p>
							
							
											<?php
											}
										?>										
										
										<p>
											<span class="bg_green">49</span>
											<span><?php echo $arr['h49']; ?></span>
											<input name="gold[SP49]" type="text" /><input name="odds[SP49]" type="hidden" value="<?php echo $arr['h49']; ?>" />
										</p>
									</div>
																		
									<div class="numBox">
										<nav>
											<span class='play'>玩法</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span class='play2'>玩法</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<?php
											$sql="select * from six_lottery_odds where sub_type='SP' and ball_type='other'";
											$query=$mysqli->query($sql) or die('error!');
											$arr=$query->fetch_array();
										?>
										<p>
											<span>特大</span>
											<span><?php echo $arr['h1']; ?></span>
											<input type='hidden' name="odds[SP_OVER]" value="<?php echo $arr['h1']; ?>" />
											<input name="gold[SP_OVER]" type="text" />
											<span>特小</span>
											<span><?php echo $arr['h2']; ?></span>
											<input type='hidden' name="odds[SP_UNDER]" value="<?php echo $arr['h2']; ?>" />
											<input name="gold[SP_UNDER]" type="text" />
										</p>
										<p>
											<span>特单</span>
											<span><?php echo $arr['h3']; ?></span>
											<input type='hidden' name="odds[SP_ODD]" value="<?php echo $arr['h3']; ?>" />
											<input name="gold[SP_ODD]" type="text" />
											<span>特双</span>
											<span><?php echo $arr['h4']; ?></span>
											<input type='hidden' name="odds[SP_EVEN]" value="<?php echo $arr['h4']; ?>" />
											<input name="gold[SP_EVEN]" type="text" />
										</p>
										<p>
											<span>和大</span>
											<span><?php echo $arr['h5']; ?></span>
											<input type='hidden' name="odds[SP_SOVER]" value="<?php echo $arr['h5']; ?>" />
											<input name="gold[SP_SOVER]" type="text" />
											<span>和小</span>
											<span><?php echo $arr['h6']; ?></span>
											<input type='hidden' name="odds[SP_SUNDER]" value="<?php echo $arr['h6']; ?>" />
											<input name="gold[SP_SUNDER]" type="text" />
										</p>
										<p>
											<span>和单</span>
											<span><?php echo $arr['h7']; ?></span>
											<input type='hidden' name="odds[SP_SODD]" value="<?php echo $arr['h7']; ?>" />
											<input name="gold[SP_SODD]" type="text" />
											<span>和双</span>
											<span><?php echo $arr['h8']; ?></span>
											<input type='hidden' name="odds[SP_SEVEN]" value="<?php echo $arr['h8']; ?>" />
											<input name="gold[SP_SEVEN]" type="text" />
										</p>
										<p>
											<span>尾大</span>
											<span><?php echo $arr['h9']; ?></span>
											<input type='hidden' name="odds[SF_OVER]" value="<?php echo $arr['h9']; ?>" />
											<input name="gold[SF_OVER]" type="text" />
											<span>尾小</span>
											<span><?php echo $arr['h10']; ?></span>
											<input type='hidden' name="odds[SF_UNDER]" value="<?php echo $arr['h10']; ?>" />
											<input name="gold[SF_UNDER]" type="text" />
										</p>
									</div>
							
									 <div class="numBox">
										<nav>
											<span class='play'>玩法</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span class='play2'>玩法</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
							
										<p>
											<span>大双</span>
											<span><?php echo $arr['h14']; ?></span>
											<input name="gold[HS_OO]" type="text" />
											<input type='hidden' name="odds[HS_OO]" value="<?php echo $arr['h14']; ?>" />
											<span>小双</span>
											<span><?php echo $arr['h15']; ?></span>
											<input name="gold[HS_OU]" type="text" />
											<input type='hidden' name="odds[HS_OU]" value="<?php echo $arr['h15']; ?>" />
										</p>
										<p>
											<span>大单</span>
											<span><?php echo $arr['h16']; ?></span>
											<input name="gold[HS_EO]" type="text" />
											<input type='hidden' name="odds[HS_EO]" value="<?php echo $arr['h16']; ?>" />
											<span>小单</span>
											<span><?php echo $arr['h17']; ?></span>
											<input name="gold[HS_EU]" type="text" />
											<input type='hidden' name="odds[HS_EU]" value="<?php echo $arr['h17']; ?>" />
										</p>
									</div>
																										
									<div class="sub">
										<input id="reset" type="reset" value="重填" />
										<input id="submit" type="submit" value="投注"  />onclick="spa_submit()"
									</div>
								</form>
							</section>1A -->

							<section class="lotterListBox"><!--1B-->
								<div class="lotteryBtn">
									<a class="active" href="javascript:;">特码(01-24)</a>
									<a href="javascript:;">特码(25-49)</a>
									
									<!-- <a href="javascript:;">色波</a> -->
									<a href="javascript:;">大小单双</a>
									<a href="javascript:;">两面盘</a>
								</div>
								<form action="member/Grp/grpOrder.php?style=wap" method="post" class='box'>
									<input type='hidden' name="gid" value="SPbside" />
									<div class="numBox">
										<nav>
											<span class='play'>号码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span class='play2'>号码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<?php
											

											$sql="select * from six_lottery_odds where sub_type='SP' ";
											$query=$mysqli->query($sql) or die('error!');
											$arr=$query->fetch_array();

											for($i=1;$i<=24;$i+=2){
											?>
												<p>
													<span class="<?php echo in_array($i,$red)?'bg_red':(in_array($i,$blue)?'bg_blue':'bg_green');?>" ><?php echo $i<10?'0'.$i:$i;?></span>
													<span><?php echo $arr['h'.$i]; ?></span>
													<input name="odds[SP<?php echo $i<10?'0'.$i:$i;?>]" type="hidden" value="<?php echo $arr['h'.$i]; ?>" />
													<input name="gold[SP<?php echo $i<10?'0'.$i:$i;?>]" type="text" />

													<span class="<?php echo in_array($i+1,$red)?'bg_red':(in_array($i+1,$blue)?'bg_blue':'bg_green');?>"><?php echo $i<9?'0'.($i+1):($i+1);?></span>
													<span><?php echo $arr['h'.($i+1)]; ?></span>
													<input name="gold[SP<?php echo $i<9?'0'.($i+1):($i+1);?>]" type="text" />
													<input name="odds[SP<?php echo $i<9?'0'.($i+1):($i+1);?>]" type="hidden" value="<?php echo $arr['h'.($i+1)]; ?>" />
												</p>

											<?php
											}
										?>
											
									</div>

									<div class="numBox">
										<nav>
											<span class='play'>号码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span class='play2'>号码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<?php
										for($i=25;$i<=48;$i+=2){
											?>
												<p>
													<span class="<?php echo in_array($i,$red)?'bg_red':(in_array($i,$blue)?'bg_blue':'bg_green');?>"><?=$i;?></span>
													<span><?php echo $arr['h'.$i]; ?></span>
													<input name="gold[SP<?=$i;?>]" type="text" />
													<input name="odds[SP<?=$i;?>]" type="hidden" value="<?php echo $arr['h'.$i]; ?>" />
													<span class="<?php echo in_array($i+1,$red)?'bg_red':(in_array($i+1,$blue)?'bg_blue':'bg_green');?>"><?=$i+1;?></span>
													<span><?php echo $arr['h'.($i+1)]; ?></span>
													<input name="gold[SP<?=$i+1;?>]" type="text" />
													<input name="odds[SP<?=$i+1;?>]" type="hidden" value="<?php echo $arr['h'.($i+1)]; ?>" />
												</p>


											<?php
											}
										?>										
										
										<p>
											<span class="bg_green">49</span>
											<span><?php echo $arr['h49']; ?></span>
											<input name="gold[SP49]" type="text" /><input name="odds[SP49]" type="hidden" value="<?php echo $arr['h49']; ?>" />
										</p>
									</div>
																		
									<div class="numBox">
										<nav>
											<span class='play'>玩法</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span class='play2'>玩法</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<?php
											$sql="select * from six_lottery_odds where sub_type='SP' and ball_type='other'";
											$query=$mysqli->query($sql) or die('error!');
											$arr=$query->fetch_array();
										?>
										<p>
											<span>特大</span>
											<span><?php echo $arr['h1']; ?></span>
											<input type='hidden' name="odds[SP_OVER]" value="<?php echo $arr['h1']; ?>" />
											<input name="gold[SP_OVER]" type="text" />
											<span>特小</span>
											<span><?php echo $arr['h2']; ?></span>
											<input type='hidden' name="odds[SP_UNDER]" value="<?php echo $arr['h2']; ?>" />
											<input name="gold[SP_UNDER]" type="text" />
										</p>
										<p>
											<span>特单</span>
											<span><?php echo $arr['h3']; ?></span>
											<input type='hidden' name="odds[SP_ODD]" value="<?php echo $arr['h3']; ?>" />
											<input name="gold[SP_ODD]" type="text" />
											<span>特双</span>
											<span><?php echo $arr['h4']; ?></span>
											<input type='hidden' name="odds[SP_EVEN]" value="<?php echo $arr['h4']; ?>" />
											<input name="gold[SP_EVEN]" type="text" />
										</p>
										<p>
											<span>和大</span>
											<span><?php echo $arr['h5']; ?></span>
											<input type='hidden' name="odds[SP_SOVER]" value="<?php echo $arr['h5']; ?>" />
											<input name="gold[SP_SOVER]" type="text" />
											<span>和小</span>
											<span><?php echo $arr['h6']; ?></span>
											<input type='hidden' name="odds[SP_SUNDER]" value="<?php echo $arr['h6']; ?>" />
											<input name="gold[SP_SUNDER]" type="text" />
										</p>
										<p>
											<span>和单</span>
											<span><?php echo $arr['h7']; ?></span>
											<input type='hidden' name="odds[SP_SODD]" value="<?php echo $arr['h7']; ?>" />
											<input name="gold[SP_SODD]" type="text" />
											<span>和双</span>
											<span><?php echo $arr['h8']; ?></span>
											<input type='hidden' name="odds[SP_SEVEN]" value="<?php echo $arr['h8']; ?>" />
											<input name="gold[SP_SEVEN]" type="text" />
										</p>
										<p>
											<span>尾大</span>
											<span><?php echo $arr['h9']; ?></span>
											<input type='hidden' name="odds[SF_OVER]" value="<?php echo $arr['h9']; ?>" />
											<input name="gold[SF_OVER]" type="text" />
											<span>尾小</span>
											<span><?php echo $arr['h10']; ?></span>
											<input type='hidden' name="odds[SF_UNDER]" value="<?php echo $arr['h10']; ?>" />
											<input name="gold[SF_UNDER]" type="text" />
										</p>
									</div>

									 <div class="numBox">
										<nav>
											<span class='play'>玩法</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span class='play2'>玩法</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>

										<p>
											<span>大双</span>
											<span><?php echo $arr['h14']; ?></span>
											<input name="gold[HS_OO]" type="text" />
											<input type='hidden' name="odds[HS_OO]" value="<?php echo $arr['h14']; ?>" />
											<span>小双</span>
											<span><?php echo $arr['h15']; ?></span>
											<input name="gold[HS_OU]" type="text" />
											<input type='hidden' name="odds[HS_OU]" value="<?php echo $arr['h15']; ?>" />
										</p>
										<p>
											<span>大单</span>
											<span><?php echo $arr['h16']; ?></span>
											<input name="gold[HS_EO]" type="text" />
											<input type='hidden' name="odds[HS_EO]" value="<?php echo $arr['h16']; ?>" />
											<span>小单</span>
											<span><?php echo $arr['h17']; ?></span>
											<input name="gold[HS_EU]" type="text" />
											<input type='hidden' name="odds[HS_EU]" value="<?php echo $arr['h17']; ?>" />
										</p>
									</div>
																										
									<div class="sub">
										<input id="reset" type="reset" value="重填" />
										<input id="submit" type="submit" value="投注"  /><!-- onclick="spa_submit()" -->
									</div>
								</form>
							</section><!--1B-->
									
							<section class="lotterListBox"> <!-- 2 -->
								<div class="lotteryBtn">
									<a class="active" href="javascript:;">正码(01-24)</a>
									<a href="javascript:;">正码(25-49)</a>
									<a href="javascript:;">总数</a>
								</div>
								<form action="member/Grp/grpOrder.php?style=wap" method="post" id="fomes_NA" class='box'>
									<input type='hidden' name="gid" value="NA" />

									<div class="numBox">
										<?php
											$sql="select * from six_lottery_odds where sub_type='NA'";
											$query=$mysqli->query($sql) or die('error!');
											$arr=$query->fetch_array();
										?>
										<nav>
											<span class='play'>正码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span class='play2'>正码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<?php
										for($i=1;$i<=24;$i+=2){
											?>
												<p>
													<span class="<?php echo in_array($i,$red)?'bg_red':(in_array($i,$blue)?'bg_blue':'bg_green');?>"><?php echo $i<10?'0'.$i:$i;?></span>
													<span><?php echo $arr['h'.$i]; ?></span>
													<input name="gold[NA<?php echo $i<10?'0'.$i:$i;?>]" type="text" />
													<input name="odds[NA<?php echo $i<10?'0'.$i:$i;?>]" type="hidden" value="<?php echo $arr['h'.$i]; ?>" />
													<span class="<?php echo in_array($i+1,$red)?'bg_red':(in_array($i+1,$blue)?'bg_blue':'bg_green');?>"><?php echo $i<9?'0'.($i+1):($i+1);?></span>
													<span><?php echo $arr['h'.($i+1)]; ?></span>
													<input name="gold[NA<?php echo $i<9?'0'.($i+1):$i;?>]" type="text" />
													<input name="odds[NA<?php echo $i<9?'0'.$i:$i;?>]" type="hidden" value="<?php echo $arr['h'.($i+1)]; ?>" />
												</p>


											<?php
											}
										?>	

									</div>

									<div class="numBox">
										<nav>
											<span class='play'>正码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span class='play2'>正码</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<?php
										for($i=25;$i<=48;$i+=2){
											?>
												<p>
													<span class="<?php echo in_array($i,$red)?'bg_red':(in_array($i,$blue)?'bg_blue':'bg_green');?>"><?=$i;?></span>
													<span><?php echo $arr['h'.$i]; ?></span>
													<input name="gold[NA<?=$i;?>]" type="text" />
													<input name="odds[NA<?=$i;?>]" type="hidden" value="<?php echo $arr['h'.$i]; ?>" />
													<span class="<?php echo in_array($i+1,$red)?'bg_red':(in_array($i+1,$blue)?'bg_blue':'bg_green');?>"><?=$i+1;?></span>
													<span><?php echo $arr['h'.($i+1)]; ?></span>
													<input name="gold[NA<?=$i+1;?>]" type="text" />
													<input name="odds[NA<?=$i+1;?>]" type="hidden" value="<?php echo $arr['h'.($i+1)]; ?>" />
												</p>


											<?php
											}
										?>	

										<p>
											<span class="bg_green">49</span>
											<span><?php echo $arr['49']; ?></span>
											<input name="gold[NA49]" type="text" />
											<input name="odds[NA49]" type="hidden" value="<?php echo $arr['h49']; ?>" />
										</p>
									</div>
									 <div class="numBox">
										<nav>
											<span class='play'>类型</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span class='play2'>类型</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<?php
											$sql="select * from six_lottery_odds where sub_type='NA' and ball_type='other'";
											$query=$mysqli->query($sql) or die('error!');
											$arr=$query->fetch_array();
										?>
										<p>
											<span>总单</span>
											<span><?php echo $arr['h1']; ?></span>
											<input name="gold[NA_ODD]" type="text" />
											<input type='hidden' name="odds[NA_ODD]" value="<?php echo $arr['h1']; ?>" />
											<span>总双</span>
											<span><?php echo $arr['h2']; ?></span>
											<input name="gold[NA_EVEN]" type="text" />
											<input type='hidden' name="odds[NA_EVEN]" value="<?php echo $arr['h2']; ?>" />
										</p>
										<p>
											<span>总大</span>
											<span><?php echo $arr['h3']; ?></span>
											<input name="gold[NA_OVER]" type="text" />
											<input type='hidden' name="odds[NA_OVER]" value="<?php echo $arr['h3']; ?>" />
											<span>总小</span>
											<span><?php echo $arr['h4']; ?></span>
											<input name="gold[NA_UNDER]" type="text" />
											<input type='hidden' name="odds[NA_UNDER]" value="<?php echo $arr['h4']; ?>" />
										</p>
									</div>

									<div class="sub">
										<input id="reset" type="reset" value="重填" />
										<input id="submit" type="submit" value="投注" onclick="" />
									</div>
									</form>									
									</section> <!-- !end 2 -->

								<section class="lotterListBox stys" style=''> <!-- 3 -->
									<!-- <div class="lotteryBtn">
										<a class="active" href="javascript:;">生肖连</a>
									</div> -->
								<form action="#" method="post" id="fomes_LX" class='box' style=''>
									
									<div class="numBox"style='min-height:6.6rem'>
	
										<iframe src='member/lt/index2.php?rtype=LX' width="100%" height="1450px" frameborder="no" border="0"  ></iframe>
		<div style="clear:both"></div>
									</div>

									</form>
									</section>

								<section class="lotterListBox"> <!-- 4 -->
								<div class="lotteryBtn">
									<a class="active" href="javascript:;">特码生肖</a>
									<a href="javascript:;">色波</a>
								</div>
								<form action="member/Grp/grpOrder.php?style=wap" method="post" id="fomes_SPA" class='box'>
									<input type='hidden' name="gid" value="SPA" />
									<div class="numBox">
										<nav>
											<span>十二生肖</span>
											<span class='number'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号码</span>
											<span>&nbsp;&nbsp;赔率</span>
											
											<span class="IU">金额</span>
										</nav>
										<?php
											$sql="select * from six_lottery_odds where sub_type='SPA' ";
											$query=$mysqli->query($sql) or die('error!');
											$arr=$query->fetch_array();

											$sql="select * from six_lottery_odds where sub_type='SP' and ball_type='other' ";
											$query=$mysqli->query($sql) or die('error!');
											$arr2=$query->fetch_array();

											for($i=0;$i<5;$i++){
										?>
											<input type='hidden' name="odds[SH<?=$i?>]" value="<?php echo $arr['h'.(13+$i)]; ?>" />
										<?php
											}
											for($i=0;$i<10;$i++){
										?>
											<input type='hidden' name="odds[SF<?=$i?>]" value="<?php echo $arr['h'.(18+$i)]; ?>" />
										<?php
											}
										?>
											
										<p>
											<span>鼠</span>
											<span class='number'>09, 21, 33, 45</span>
											<span style='color:red'><?=$arr['h1']?></span>
											<input name="gold[SP_A1]" type="text"/>
											<input type='hidden' name="odds[SP_A1]" value="<?php echo $arr['h1']; ?>" />
										</p>
										<p>
											<span>牛</span>
											<span class='number'>08, 20, 32, 44</span>
											<span style='color:red'><?=$arr['h2']?></span>
											<input name="gold[SP_A2]" type="text" />
											<input type='hidden' name="odds[SP_A2]" value="<?php echo $arr['h2']; ?>" />
										</p>
										<p>
											<span>虎</span>
											<span class='number'>07, 19, 31, 43</span>
											<span style='color:red'><?=$arr['h3']?></span>
											<input name="gold[SP_A3]" type="text" />
											<input type='hidden' name="odds[SP_A3]" value="<?php echo $arr['h3']; ?>" />
										</p>
										<p>
											<span>兔</span>
											<span class='number'>06, 18, 30, 42</span>
											<span style='color:red'><?=$arr['h4']?></span>
											<input name="gold[SP_A4]" type="text" />
											<input type='hidden' name="odds[SP_A4]" value="<?php echo $arr['h4']; ?>" />
										</p>
										<p>
											<span>龙</span>
											<span class='number'>05, 17, 29, 41</span>
											<span style='color:red'><?=$arr['h5']?></span>
											<input name="gold[SP_A5]" type="text" />
											<input type='hidden' name="odds[SP_A5]" value="<?php echo $arr['h5']; ?>" />
										</p>
										<p>
											<span>蛇</span>
											<span class='number'>04, 16, 28, 40</span>
											<span style='color:red'><?=$arr['h6']?></span>
											<input name="gold[SPA6]" type="text" />
											<input type='hidden' name="odds[SP_A6]" value="<?php echo $arr['h6']; ?>" />
										</p>
										<p>
											<span>马</span>
											<span class='number'>03, 15, 27, 39</span>
											<span style='color:red'><?=$arr['h7']?></span>
											<input name="gold[SP_A7]" type="text" />
											<input type='hidden' name="odds[SP_A7]" value="<?php echo $arr['h7']; ?>" />
										</p>
										<p>
											<span>羊</span>
											<span class='number'>02, 14, 26, 38</span>
											<span style='color:red'><?=$arr['h8']?></span>
											<input name="gold[SP_A8]" type="text" />
											<input type='hidden' name="odds[SP_A8]" value="<?php echo $arr['h8']; ?>" />
										</p>
										<p>
											<span>猴</span>
											<span class='number'>01, 13, 25, 37, 49</span>
											<span style='color:red'><?=$arr['h9']?></span>
											<input name="gold[SP_A9]" type="text" />
											<input type='hidden' name="odds[SP_A9]" value="<?php echo $arr['h9']; ?>" />
										</p>
										<p>
											<span>鸡</span>
											<span class='number'>12, 24, 36, 48</span>
											<span style='color:red'><?=$arr['h10']?></span>
											<input name="gold[SP_AA]" type="text" />
											<input type='hidden' name="odds[SP_AA]" value="<?php echo $arr['h10']; ?>" />
										</p>
										<p>
											<span>狗</span>
											<span class='number'>11, 23, 35, 47</span>
											<span style='color:red'><?=$arr['h11']?></span>
											<input name="gold[SPAB]" type="text" />
											<input type='hidden' name="odds[SP_AB]" value="<?php echo $arr['h11']; ?>" />
										</p>
										<p>
											<span>猪</span>
											<span class='number'>10, 22, 34, 46</span>
											<span style='color:red'><?=$arr['h12']?></span>
											<input name="gold[SP_AC]" type="text" />
											<input type='hidden' name="odds[SP_AC]" value="<?php echo $arr['h12']; ?>" />
										</p>
									</div>
									<div class="numBox">
										
											<nav>
												<span class='play'>玩法</span>
												<span>赔率</span>
												<span>金额</span>
											</nav>
											<p>
												<span class="bg_red">红</span>
												<span><?php echo $arr2['h11']; ?></span>
												<input name="gold[SP_R]" type="text" />
												<input type='hidden' name="odds[SP_R]" value="<?php echo $arr2['h11']; ?>" />
											
											
											</p>
											<p>
												<span class="bg_blue">蓝</span>
												<span><?php echo $arr2['h12']; ?></span>
												<input name="gold[SP_G]" type="text" />
												<input type='hidden' name="odds[SP_G]" value="<?php echo $arr2['h12']; ?>" />
											</p>
											<p>
												<span class="bg_green">绿</span>
												<span><?php echo $arr2['h13']; ?></span>
												<input name="gold[SP_B]" type="text" />
												<input type='hidden' name="odds[SP_B]" value="<?php echo $arr2['h13']; ?>" />
											</p>
									</div>
									</div>
									<div class="sub">
										<input id="reset" type="reset" value="重填" />
										<input id="submit" type="submit" value="投注" />
									</div>
								</form>
								</section> <!-- !end 4 -->

								<section class="lotterListBox"> <!-- 5 -->
								<div class="lotteryBtn">
									<a class="active" href="javascript:;">一肖</a>
									<a href="javascript:;">平特尾数</a>
								</div>
								<form action="member/Grp/grpOrder.php?style=wap" method="post" id="fomes_SPA" class='box'>
									<input type='hidden' name="gid" value="SPB" />
									
									<div class="numBox">
										<nav>
											<span>一肖</span>
											<span class='number'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号码</span>
											<span>&nbsp;&nbsp;赔率</span>
											
											<span class="IU">金额</span>
										</nav>
										<?php
											$sql="select * from six_lottery_odds where sub_type='SPB' ";
											$query=$mysqli->query($sql) or die('error!');
											$arr=$query->fetch_array();
										?>
										<p>
											<span>鼠</span>
											<span class='number'>09, 21, 33, 45</span>
											<span style='color:red'><?=$arr['h1']?></span>
											<input name="gold[SP_B1]" type="text"/>
											<input type='hidden' name="odds[SP_B1]" value="<?php echo $arr['h1']; ?>" />
										</p>
										<p>
											<span>牛</span>
											<span class='number'>08, 20, 32, 44</span>
											<span style='color:red'><?=$arr['h2']?></span>
											<input name="gold[SP_B2]" type="text" />
											<input type='hidden' name="odds[SP_B2]" value="<?php echo $arr['h2']; ?>" />
										</p>
										<p>
											<span>虎</span>
											<span class='number'>07, 19, 31, 43</span>
											<span style='color:red'><?=$arr['h3']?></span>
											<input name="gold[SP_B3]" type="text" />
											<input type='hidden' name="odds[SP_B3]" value="<?php echo $arr['h3']; ?>" />
										</p>
										<p>
											<span>兔</span>
											<span class='number'>06, 18, 30, 42</span>
											<span style='color:red'><?=$arr['h4']?></span>
											<input name="gold[SP_B4]" type="text" />
											<input type='hidden' name="odds[SP_B4]" value="<?php echo $arr['h4']; ?>" />
										</p>
										<p>
											<span>龙</span>
											<span class='number'>05, 17, 29, 41</span>
											<span style='color:red'><?=$arr['h5']?></span>
											<input name="gold[SP_B5]" type="text" />
											<input type='hidden' name="odds[SP_B5]" value="<?php echo $arr['h5']; ?>" />
										</p>
										<p>
											<span>蛇</span>
											<span class='number'>04, 16, 28, 40</span>
											<span style='color:red'><?=$arr['h6']?></span>
											<input name="gold[SPB6]" type="text" />
											<input type='hidden' name="odds[SP_B6]" value="<?php echo $arr['h6']; ?>" />
										</p>
										<p>
											<span>马</span>
											<span class='number'>03, 15, 27, 39</span>
											<span style='color:red'><?=$arr['h7']?></span>
											<input name="gold[SP_B7]" type="text" />
											<input type='hidden' name="odds[SP_B7]" value="<?php echo $arr['h7']; ?>" />
										</p>
										<p>
											<span>羊</span>
											<span class='number'>02, 14, 26, 38</span>
											<span style='color:red'><?=$arr['h8']?></span>
											<input name="gold[SP_B8]" type="text" />
											<input type='hidden' name="odds[SP_B8]" value="<?php echo $arr['h8']; ?>" />
										</p>
										<p>
											<span>猴</span>
											<span class='number'>01, 13, 25, 37, 49</span>
											<span style='color:red'><?=$arr['h9']?></span>
											<input name="gold[SP_B9]" type="text" />
											<input type='hidden' name="odds[SP_B9]" value="<?php echo $arr['h9']; ?>" />
										</p>
										<p>
											<span>鸡</span>
											<span class='number'>12, 24, 36, 48</span>
											<span style='color:red'><?=$arr['h10']?></span>
											<input name="gold[SP_BA]" type="text" />
											<input type='hidden' name="odds[SP_BA]" value="<?php echo $arr['h10']; ?>" />
										</p>
										<p>
											<span>狗</span>
											<span class='number'>11, 23, 35, 47</span>
											<span style='color:red'><?=$arr['h11']?></span>
											<input name="gold[SPBB]" type="text" />
											<input type='hidden' name="odds[SP_BB]" value="<?php echo $arr['h11']; ?>" />
										</p>
										<p>
											<span>猪</span>
											<span class='number'>10, 22, 34, 46</span>
											<span style='color:red'><?=$arr['h12']?></span>
											<input name="gold[SP_BC]" type="text" />
											<input type='hidden' name="odds[SP_BC]" value="<?php echo $arr['h12']; ?>" />
										</p>
									</div>

									<div class="numBox">
										<nav>
											<span class='play'>尾数</span>
											<span>赔率</span>
											<span class="IU">金额</span>
											<span class='play2'>尾数</span>
											<span>赔率</span>
											<span class="IU">金额</span>
										</nav>
										<?php
											$sql="select * from six_lottery_odds where sub_type='SPB' ";
											$query=$mysqli->query($sql) or die('error!');
											$arr=$query->fetch_array();
											for($i=0;$i<9;$i+=2){
										?>
										<p>
											<span>尾<?=$i?></span>
											<span><?=$arr['h'.(13+$i)]?></span>
											<input name="gold[NF<?=$i?>]" type="text" />
											<input type='hidden' name="odds[NF<?=$i?>]" value="<?php echo $arr['h'.(13+$i)]; ?>" />
											<span>尾<?=$i+1?></span>
											<span><?=$arr['h'.(14+$i)]?></span>
											<input name="gold[NF<?=$i+1?>]" type="text" />
											<input type='hidden' name="odds[NF<?=$i+1?>]" value="<?php echo $arr['h'.(14+$i)]; ?>" />
										</p>
										<?php
											}
										?>
										<input type='hidden' name="odds[TX2]" value="<?php echo $arr['h23']; ?>" />
										<input type='hidden' name="odds[TX5]" value="<?php echo $arr['h24']; ?>" />
										<input type='hidden' name="odds[TX6]" value="<?php echo $arr['h25']; ?>" />
										<input type='hidden' name="odds[TX7]" value="<?php echo $arr['h26']; ?>" />
										<input type='hidden' name="odds[TX_ODD]" value="<?php echo $arr['h27']; ?>" />
										<input type='hidden' name="odds[TX_EVEN]" value="<?php echo $arr['h28']; ?>" />
									</div>
									<div class="sub">
										<input id="reset" type="reset" value="重填" />
										<input id="submit" type="submit" value="投注" />
									</div>
								</form>
								</section> <!-- !end 5 -->

								<section class="lotterListBox"> <!-- 6 -->
								<form action="member/Grp/grpOrder.php?style=wap" method="post" class='box'>
									<div class="numBox" style='min-height:6.6rem'>
									<iframe src='member/lt/index2.php?rtype=CH'  width="100%" height="800px" frameborder="no" border="0"  ></iframe>
									<div style="clear:both"></div>
									</div>
								</form>
								</section> <!-- !end 6 -->
									
								<section class="lotterListBox"> <!-- 7 -->
								<form action="member/Grp/grpOrder.php?style=wap" method="post" class='box'>
									<div class="numBox" style='min-height:6.6rem'>
									<iframe src='member/lt/index2.php?rtype=NI'  scrolling='no' width="100%" height="877px" frameborder="no" border="0"  ></iframe>
									<div style="clear:both"></div>
									</div>
								</form>
								</section> <!-- !end7 -->

								<section class="lotterListBox"> <!-- 8 -->
								<form action="member/Grp/grpOrder.php?style=wap" method="post" class='box'>
									<div class="numBox" style='min-height:6.6rem'>
									<iframe src='member/lt/index2.php?rtype=NX' scrolling='no' width="100%" height="877px" frameborder="no" border="0"  ></iframe>
									<div style="clear:both"></div>
									</div>
								</form>
								</section> <!-- !end8 -->
									

									<footer class="footer">
										©2016 澳门永利赌场  版权所有
									</footer>
								</section><!-- end3六合彩 -->
<!-- 

								</article>
							</section>
						</section> -->

					</article>
				</section>
			</article>
			
		</article>
	</body>
</html>