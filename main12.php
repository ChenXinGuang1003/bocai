
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
									<span>第<mark><?php echo $arr1['qishu'];?></mark>期</span>
									<span id='djs' name='<?php echo strtotime($arr1['fenpan_time'])-time();?>'>00:00:00</span>
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
										<a href="../member/final/LT_result.php?gtype=T3">开奖历史</a>
									</p>
								</div>
								<div  class="lottery_kind">
									<a href="javascript:;" class="active">特码</a>
									<a href="javascript:;">正码</a>
									<a href="javascript:;">连肖</a>
								</div>
							</aside>
							<section class="lotterListBox">
	
								<form action="member/Grp/grpOrder.php" method="post" id="fomes_SP" class='box'>

								<div class="numBox"><iframe src='member/lt/index2.php?rtype=SPbside' width="100%" height="1000rem" frameborder="no" border="0"  ></iframe></div>

								</form>
								</section>
								<script>

									</script>
							<section class="lotterListBox"> <!-- 2 -->
								
								<form action="member/Grp/grpOrder.php" method="post" id="fomes_NA" class='box'>
									<div class="numBox"><iframe src='member/lt/index2.php?rtype=NA' width="100%" height="1000rem" frameborder="no" border="0"  ></iframe></div>

									</form>
									
									</section> <!-- !end 2 -->

								<section class="lotterListBox stys"> <!-- 3 -->
								<!-- <div class="lotteryBtn">
									<span><input type="radio" name="types" value="2" /> 二肖连中</span><span><input type="radio" name="types" value="3" /> 三肖连中</span><span><input type="radio" name="types" value="4" /> 四肖连中</span><span><input type="radio" name="types" value="5" /> 五肖连中</span>
								</div> -->
								<form action="#" method="post" id="fomes_LX" class='box'>
									
									<div class="numBox">
	
										<iframe src='member/lt/index2.php?rtype=LX' width="100%" height="1000rem" frameborder="no" border="0"  ></iframe>

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

		</script>
	</body>
</html>