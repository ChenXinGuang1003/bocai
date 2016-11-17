<!DOCTYPE HTML>
<html>
	<head>
		<title>彩票游戏</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
		<script src="/js/jquery-1.10.1.min.js" type="text/javascript"></script>
		<script>
			var ClientW = $(window).width();
			$('html').css('fontSize',ClientW/3+'px');
		</script>

		<script type="text/javascript" src="../member/lottery/js/cq_ssc.js?v=1005"></script>

		<link href="/css/main.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<section class="seList seLisT3">	<!-- 3六合彩 -->
		<aside>
			<div class="lottery_time">
			<?php 
				include "../app/member/include/com_chk.php";
				
				$sql='select max(id) as mid from lottery_result_cq';
				$query=$mysqli->query($sql) or die('error!');
				$arr=$query->fetch_array();
				$mid=$arr['mid'];

				$sql='select * from lottery_result_cq where id='.$mid;
				$query=$mysqli->query($sql) or die('error!');
				$arr1=$query->fetch_array();

				$sql='select * from lottery_result_cq where id='.($mid+1);
				$query=$mysqli->query($sql) or die('error!');
				$arr2=$query->fetch_array();
			?>
				<em id="typename">重庆时时彩</em>
				<span>第<mark><?=$arr1['qishu']+1?></mark>期</span>
				<span id='djs'>00:00</span>
			</div>
			<div class="lottery_num">
				<p>
					<span>第<?=$arr1['qishu']?>期开奖号码:</span>
					<em><?=$arr1['ball_1']?></em>
					<em><?=$arr1['ball_2']?></em>
					<em><?=$arr1['ball_3']?></em>
					<em><?=$arr1['ball_4']?></em>
					<em><?=$arr1['ball_5']?></em>
				</p>
				<p>
					<a href="../member/final/LT_result.php?gtype=CQM">开奖历史</a>
				</p>
			</div>
			<div  class="lottery_kind">
				<a href="javascript:;" class="active" id='gk'>珠仔/总和龙虎/组合/斗牛</a>
				<a href="/main.php?2" id='back' style='margin-left:0.8rem;'>back</a>
			</div>
		</aside> 
	<section class="lotterListBox">
		<div class="lotteryBtn">
			<a class="active" href="javascript:;">珠仔</a>
			<a href="javascript:;">总和龙虎</a>
			<a href="javascript:;">组合</a>
			<a href="javascript:;">斗牛</a>
		</div>
		<form action="../member/lottery/order/order_cq_ssc.php?style=wap" method="post" id="fomes"  class='box'>

			<div class="numBox" style='font-weight:normal'>
				<nav>
					<span class='play'>号码</span>
					<span>赔率</span>
					<span class="IU">金额</span>
					<span class='play2'>号码</span>
					<span>赔率</span>
					<span class="IU">金额</span>
				</nav>

				<nav><span class='bat'><b>第一球（万位）<b></span></nav>
				<?php
					$sql="select * from odds_lottery_normal where sub_type='万定位' and lottery_type='重庆时时彩' ";
					$query=$mysqli->query($sql) or die('error!');
					$arr=$query->fetch_array();

					for($i=0;$i<10;$i+=2){
				?>
				<p>
					<span class="bg_blue"><?=$i?></span>
					<span><?=$arr['h'.$i]?></span>
					<input name="<?='ball_1_'.$i?>" type="text" />
					<span class="bg_green"><?=$i+1?></span>
					<span><?=$arr['h'.($i+1)]?></span>
					<input name="<?='ball_1_'.($i+1)?>" type="text" />
				</p>
				<?php
					}
				?>
				<p>
					<span class="bg_blue">大</span>
					<span>1.98</span>
					<input name="ball_1_11" type="text" />
					<span class="bg_green">小</span>
					<span>1.98</span>
					<input name="ball_1_12" type="text" />
				</p>
				<p>
					<span class="bg_blue">单</span>
					<span>1.98</span>
					<input name="ball_1_13" type="text" />
					<span class="bg_green">双</span>
					<span>1.98</span>
					<input name="ball_1_14" type="text" />
				</p>
				
				<nav><span class='bat'><b>第二球（千位）<b></span></nav>
				<?php
					$sql="select * from odds_lottery_normal where sub_type='仟定位' and lottery_type='重庆时时彩' ";
					$query=$mysqli->query($sql) or die('error!');
					$arr=$query->fetch_array();

					for($i=0;$i<10;$i+=2){
				?>
				<p>
					<span class="bg_blue"><?=$i?></span>
					<span><?=$arr['h'.$i]?></span>
					<input name="<?='ball_2_'.$i?>" type="text" />
					<span class="bg_green"><?=$i+1?></span>
					<span><?=$arr['h'.($i+1)]?></span>
					<input name="<?='ball_2_'.($i+1)?>" type="text" />
				</p>
				<?php
					}
				?>
				<p>
					<span class="bg_blue">大</span>
					<span>1.98</span>
					<input name="ball_2_11" type="text" />
					<span class="bg_green">小</span>
					<span>1.98</span>
					<input name="ball_2_12" type="text" />
				</p>
				<p>
					<span class="bg_blue">单</span>
					<span>1.98</span>
					<input name="ball_2_13" type="text" />
					<span class="bg_green">双</span>
					<span>1.98</span>
					<input name="ball_2_14" type="text" />
				</p>

				<nav><span class='bat'><b>第三球（百位）<b></span></nav>
				<?php
					$sql="select * from odds_lottery_normal where sub_type='佰定位' and lottery_type='重庆时时彩' ";
					$query=$mysqli->query($sql) or die('error!');
					$arr=$query->fetch_array();
					for($i=0;$i<10;$i+=2){
				?>
				<p>
					<span class="bg_blue"><?=$i?></span>
					<span><?=$arr['h'.$i]?></span>
					<input name="<?='ball_3_'.$i?>" type="text" />
					<span class="bg_green"><?=$i+1?></span>
					<span><?=$arr['h'.($i+1)]?></span>
					<input name="<?='ball_3_'.($i+1)?>" type="text" />
				</p>
				<?php
					}
				?>
				<p>
					<span class="bg_blue">大</span>
					<span>1.98</span>
					<input name="ball_3_11" type="text" />
					<span class="bg_green">小</span>
					<span>1.98</span>
					<input name="ball_3_12" type="text" />
				</p>
				<p>
					<span class="bg_blue">单</span>
					<span>1.98</span>
					<input name="ball_3_13" type="text" />
					<span class="bg_green">双</span>
					<span>1.98</span>
					<input name="ball_3_14" type="text" />
				</p>	

				<nav><span class='bat'><b>第四球（十位）<b></span></nav>
				<?php
					$sql="select * from odds_lottery_normal where sub_type='拾定位' and lottery_type='重庆时时彩' ";
					$query=$mysqli->query($sql) or die('error!');
					$arr=$query->fetch_array();
					for($i=0;$i<10;$i+=2){
				?>
				<p>
					<span class="bg_blue"><?=$i?></span>
					<span><?=$arr['h'.$i]?></span>
					<input name="<?='ball_4_'.$i?>" type="text" />
					<span class="bg_green"><?=$i+1?></span>
					<span><?=$arr['h'.($i+1)]?></span>
					<input name="<?='ball_4_'.($i+1)?>" type="text" />
				</p>
				<?php
					}
				?>
				<p>
					<span class="bg_blue">大</span>
					<span>1.98</span>
					<input name="ball_4_11" type="text" />
					<span class="bg_green">小</span>
					<span>1.98</span>
					<input name="ball_4_12" type="text" />
				</p>
				<p>
					<span class="bg_blue">单</span>
					<span>1.98</span>
					<input name="ball_4_13" type="text" />
					<span class="bg_green">双</span>
					<span>1.98</span>
					<input name="ball_4_14" type="text" />
				</p>

				<nav><span class='bat'><b>第五球（个位）<b></span></nav>
				<?php
					$sql="select * from odds_lottery_normal where sub_type='个定位' and lottery_type='重庆时时彩' ";
					$query=$mysqli->query($sql) or die('error!');
					$arr=$query->fetch_array();
					for($i=0;$i<10;$i+=2){
				?>
				<p>
					<span class="bg_blue"><?=$i?></span>
					<span><?=$arr['h'.$i]?></span>
					<input name="<?='ball_5_'.$i?>" type="text" />
					<span class="bg_green"><?=$i+1?></span>
					<span><?=$arr['h'.($i+1)]?></span>
					<input name="<?='ball_5_'.($i+1)?>" type="text" />
				</p>
				<?php
					}
				?>
				<p>
					<span class="bg_blue">大</span>
					<span>1.98</span>
					<input name="ball_5_11" type="text" />
					<span class="bg_green">小</span>
					<span>1.98</span>
					<input name="ball_5_12" type="text" />
				</p>
				<p>
					<span class="bg_blue">单</span>
					<span>1.98</span>
					<input name="ball_5_13" type="text" />
					<span class="bg_green">双</span>
					<span>1.98</span>
					<input name="ball_5_14" type="text" />
				</p>					
			</div>


			<div class="numBox" style='font-weight:normal;display:none'>
				<nav>
					<span class='play'>选项</span>
					<span>赔率</span>
					<span class="IU">金额</span>
					<span class='play2'>选项</span>
					<span>赔率</span>
					<span class="IU">金额</span>
				</nav>
				<?php
					$sql="select * from odds_lottery_normal where sub_type='总和龙虎和' and lottery_type='重庆时时彩' ";
					$query=$mysqli->query($sql) or die('error!');
					$arr=$query->fetch_array();
				?>
				<p>
					<span>总和大</span>
					<span><?=$arr['h0']?></span>
					<input name="ball_6_1" type="text" />
					<span>总和小</span>
					<span><?=$arr['h1']?></span>
					<input name="ball_6_2" type="text" />
				</p>
				<p>
					<span>总和单</span>
					<span><?=$arr['h2']?></span>
					<input name="ball_6_3" type="text" />
					<span>总和双</span>
					<span><?=$arr['h3']?></span>
					<input name="ball_6_4" type="text" />
				</p>
				<p>
					<span>龙</span>
					<span><?=$arr['h4']?></span>
					<input name="ball_6_5" type="text" />
					<span>虎</span>
					<span><?=$arr['h5']?></span>
					<input name="ball_6_6" type="text" />
				</p>
				<p>
					<span>和</span>
					<span><?=$arr['h6']?></span>
					<input name="ball_6_7" type="text" />
				</p>
			</div>

			<div class="numBox" style='font-weight:normal;display:none'>
					<nav>
						<span class='play'>玩法</span>
						<span>赔率</span>
						<span class="IU">金额</span>
						<span class='play2'>玩法</span>
						<span>赔率</span>
						<span class="IU">金额</span>
					</nav>
					<?php
						$sql="select * from odds_lottery_normal where sub_type='豹子顺子(前三)' and lottery_type='重庆时时彩' ";
						$query=$mysqli->query($sql) or die('error!');
						$arr=$query->fetch_array();
					?>
					<nav><span class='ball'><b>前 三 球 :</b></span></nav>
					<p style='font-weight:normal'>
						<span>豹子</span>
						<span><?=$arr['h0']?></span>
						<input name="ball_7_1" type="text" />
						<span>顺子</span>
						<span><?=$arr['h1']?></span>
						<input name="ball_7_2" type="text" />
					</p>
					<p>
						<span>对子</span>
						<span><?=$arr['h2']?></span>
						<input name="ball_7_3" type="text" />
						<span>半顺</span>
						<span><?=$arr['h3']?></span>
						<input name="ball_7_4" type="text" />
					</p>
					<p>
						<span>杂六</span>
						<span><?=$arr['h4']?></span>
						<input name="ball_7_5" type="text" />
					</p>
					
					<?php
						$sql="select * from odds_lottery_normal where sub_type='豹子顺子(中三)' and lottery_type='重庆时时彩' ";
						$query=$mysqli->query($sql) or die('error!');
						$arr=$query->fetch_array();
					?>
					<nav><span class='ball'><b>中 三 球 :<b></span></nav>
					<p style='font-weight:normal'>
						<span>豹子</span>
						<span><?=$arr['h0']?></span>
						<input name="ball_8_1" type="text" />
						<span>顺子</span>
						<span><?=$arr['h1']?></span>
						<input name="ball_8_2" type="text" />
					</p>
					<p style='font-weight:normal'>
						<span>对子</span>
						<span><?=$arr['h2']?></span>
						<input name="ball_8_3" type="text" />
						<span>半顺</span>
						<span><?=$arr['h3']?></span>
						<input name="ball_8_4" type="text" />
					</p>
					<p style='font-weight:normal'>
						<span>杂六</span>
						<span><?=$arr['h4']?></span>
						<input name="ball_8_5" type="text" />
					</p>

					<?php
						$sql="select * from odds_lottery_normal where sub_type='豹子顺子(后三)' and lottery_type='重庆时时彩' ";
						$query=$mysqli->query($sql) or die('error!');
						$arr=$query->fetch_array();
					?>
					<nav><span class='ball'><b>后 三 球 :<b></span></nav>
					<p style='font-weight:normal'>
						<span>豹子</span>
						<span><?=$arr['h0']?></span>
						<input name="ball_9_1" type="text" />
						<span>顺子</span>
						<span><?=$arr['h1']?></span>
						<input name="ball_9_2" type="text" />
					</p>
					<p style='font-weight:normal'>
						<span>对子</span>
						<span><?=$arr['h2']?></span>
						<input name="ball_9_3" type="text" />
						<span>半顺</span>
						<span><?=$arr['h3']?></span>
						<input name="ball_9_4" type="text" />
					</p>
					<p style='font-weight:normal'>
						<span>杂六</span>
						<span><?=$arr['h4']?></span>
						<input name="ball_9_5" type="text" />
					</p>
				</div>

				<div class="numBox" style='font-weight:normal;display:none'>
					<nav>
						<span class='play'>玩法</span>
						<span>赔率</span>
						<span class="IU">金额</span>
						<span class='play2'>玩法</span>
						<span>赔率</span>
						<span class="IU">金额</span>
					</nav>
					<?php
						$sql="select * from odds_lottery_normal where sub_type='牛牛' ";
						$query=$mysqli->query($sql) or die('error!');
						$arr=$query->fetch_array();
					?>
					<p>
						<span>没牛</span>
						<span><?=$arr['h0']?></span>
						<input name="ball_10_1" type="text" />
						<span>牛1</span>
						<span><?=$arr['h1']?></span>
						<input name="ball_10_2" type="text" />
					</p>
					<p>
						<span>牛2</span>
						<span><?=$arr['h2']?></span>
						<input name="ball_10_3" type="text" />
						<span>牛3</span>
						<span><?=$arr['h3']?></span>
						<input name="ball_10_4" type="text" />
					</p>
					<p>
						<span>牛4</span>
						<span><?=$arr['h4']?></span>
						<input name="ball_10_5" type="text" />
						<span>牛5</span>
						<span><?=$arr['h5']?></span>
						<input name="ball_10_6" type="text" />
					</p>
					<p>
						<span>牛6</span>
						<span><?=$arr['h6']?></span>
						<input name="ball_10_7" type="text" />
						<span>牛7</span>
						<span><?=$arr['h7']?></span>
						<input name="ball_10_8" type="text" />
					</p>
					<p>
						<span>牛8</span>
						<span><?=$arr['h8']?></span>
						<input name="ball_10_9" type="text" />
						<span>牛9</span>
						<span><?=$arr['h9']?></span>
						<input name="ball_10_10" type="text" />
					</p>
					<p>
						<span>牛牛</span>
						<span><?=$arr['h10']?></span>
						<input name="ball_10_11" type="text" />					
					</p>
					<p>
						<span>牛大</span>
						<span><?=$arr['h11']?></span>
						<input name="ball_10_12" type="text" />
						<span>牛小</span>
						<span><?=$arr['h12']?></span>
						<input name="ball_10_13" type="text" />						
					</p>
					<p>
						<span>牛单</span>
						<span><?=$arr['h13']?></span>
						<input name="ball_10_14" type="text" />
						<span>牛双</span>
						<span><?=$arr['h14']?></span>
						<input name="ball_10_15" type="text" />
					</p>
				</div>

				<div class="sub">
					<input id="reset" type="reset" value="重填" />
					<input id="submit" type="submit" value="投注" />
				</div>
				</form>
				</section>				


		</section>
		<script>
			//动态操作
			(function(){
				var typeName = [
					{'type':'重庆时时彩'},
					{'type':'北京PK拾'},
					{'type':'福彩3D'},
					{'type':'排列三'},
					{'type':'北京快乐B'}
				];
				var data = window.location.href ;
				var num = 0;
				for(var attr in typeName){
					if( data.indexOf( '?'+attr ) != -1 ){
						$('#typename').html( typeName[attr]['type'] );
						break;
					}
				}
			})();
			
		</script>
		<script>
			//彩票盒切换
			(function(){
				var caipiaoBox = $('.lottery_kind a');

				caipiaoBox.each(function(i){
					caipiaoBox.on('touchend',caBfn);
				});
				var onOff = true;
				caBfn();
				function caBfn(){
					var This = $(this);
					if(onOff){
						This = caipiaoBox.eq(0);
						onOff = false;
					}
					This.addClass('active');
					caipiaoBox.not(This).removeClass('active');

					$('.lotterListBox').eq(This.index()).css('display','block');
					$('.lotterListBox').not( $('.lotterListBox').eq(This.index()) ).css('display','none');


					//切换选择的彩票
					var caipiaoT = $('.lotterListBox').eq( This.index() ).find('.lotteryBtn');	//按钮列表盒子 1
					var ListBox = $('.lotterListBox').eq( This.index() ).find('.numBox');	//对应按钮列表盒子 多个
						Height();
						if(caipiaoT.find('a')){
							var caiPiaonm = caipiaoT.find('a'); 

							caiPiaonm.on('touchend',caifn);
							function caifn(){
								$(this).addClass('active');
								caiPiaonm.not($(this)).removeClass('active');
								ListBox.eq($(this).index()).css('display','block');
								ListBox.not( ListBox.eq($(this).index()) ).css('display','none');
								Height();
							}
						}
				}
			})();

			//iframe Height
			Height();
			function Height(){	
				$(window.parent.document).find('#iFrame').height( $('body').height() );
			}

			//倒计时
			(function(){
					function updateOpenTime(){
						$.post("../member/lottery/class/odds_cq.php", function(data){
							//if(data.isopen>0 && ((data.opentime>66 && data.opentime<450) || (data.opentime<50 && data.opentime>20))){
								//clearInterval(fp);
								//endtime(data.opentime);
							//	$("#djs").html(data.number);
						//	}
							$m=Math.floor(data.opentime/60);
							$s=data.opentime-$m*60;
							$("#djs").html(($m<10?'0'+$m:$m)+':'+($s<10?'0'+$s:$s));
						}, "json");
					}

					setInterval(updateOpenTime,1000);

			})();

		</script>
	</body>
</html>