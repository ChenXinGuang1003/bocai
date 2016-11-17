<!DOCTYPE HTML>
<html>
	<head>
		<title>体育赛事</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
		<script src="/js/jquery-1.10.1.min.js" type="text/javascript"></script>
		<script>
			var ClientW = $(window).width();
			$('html').css('fontSize',ClientW/3+'px');
		</script>
		<link href="/css/main.css" rel="stylesheet" type="text/css">
	</head>
	<body class="seList">
		<nav class="tab_tab">
			<div class="active">单式投注</div>
			<div>串关投注</div>
		</nav>
		<section class="smcontant">
			<ul class="Piclist active">
				<li>
					<div class="Piclist_top">
						<span>足球</span>
						<em>(0)</em>
					</div>
					<p class="Piclist_bottom">
						<a href="/bet/zqds.php" title="足球单式">
							<span>单式 1</span>
							<em>(0)</em>
						</a>
						<a href="/bet/zqgq.php" title="足球滚球">
							<span>滚球 1</span>
							<em>(0)</em>
						</a>
						<a href="javascript:;">
							<span>单双&delta;总入球</span>
							<em>(0)</em>
						</a>
						<a href="/bet/zqsbc.php" title="足球上半场">
							<span>半场&delta;全场 1</span>
							<em>(0)</em>
						</a>
						<a href="javascript:;">
							<span>波胆</span>
							<em>(0)</em>
						</a>
						<a href="javascript:;">
							<span>足球结果</span>
							<em>(0)</em>
						</a>
					</p>
				</li>
				<li>
					<div class="Piclist_top">
						<span>足球早餐</span>
						<em>(96)</em>
					</div>
					<p class="Piclist_bottom">
						<a href="javascript:;">
							<span>单式</span>
							<em>(0)</em>
						</a>
						<a href="javascript:;">
							<span>单双&delta;总入球</span>
							<em>(0)</em>
						</a>
						<a href="javascript:;">
							<span>半场&delta;全场</span>
							<em>(0)</em>
						</a>
						<a href="javascript:;">
							<span>波胆</span>
							<em>(0)</em>
						</a>
					</p>
				</li>
				<li>
					<div class="Piclist_top">
						<span>篮球</span>
						<em>(0)</em>
					</div>
					<p class="Piclist_bottom">
						<a href="/bet/lqds.php" title="篮球单式">
							<span>单式 1</span>
							<em>(0)</em>
						</a>
						<a href="/bet/lqgq.php" title="篮球滚球">
							<span>滚球 1</span>
							<em>(0)</em>
						</a>
						<a href="/bet/lqdj.php" title="篮球单节">
							<span>单节 1</span>
							<em>(0)</em>
						</a>
						<a href="javascript:;">
							<span>篮球结果</span>
							<em>(0)</em>
						</a>
					</p>
				</li>
				<li>
					<div class="Piclist_top">
						<span>篮球早餐</span>
						<em>(12)</em>
					</div>
					<p class="Piclist_bottom">
						<a href="javascript:;">
							<span>单式</span>
							<em>(0)</em>
						</a>
					</p>
				</li>
				<li>
					<div class="Piclist_top">
						<span>网球</span>
						<em>(0)</em>
					</div>
					<p class="Piclist_bottom">
						<a href="javascript:;">
							<span>单式</span>
							<em>(0)</em>
						</a>
						<a href="javascript:;">
							<span>网球结果</span>
							<em>(0)</em>
						</a>
					</p>
				</li>
				<li>
					<div class="Piclist_top">
						<span>排球</span>
						<em>(128)</em>
					</div>
					<p class="Piclist_bottom">
						<a href="javascript:;">
							<span>单式</span>
							<em>(0)</em>
						</a>
						<a href="javascript:;">
							<span>排球结果</span>
							<em>(0)</em>
						</a>
					</p>
				</li>
				<li>
					<div class="Piclist_top">
						<span>棒球</span>
						<em>(0)</em>
					</div>
					<p class="Piclist_bottom">
						<a href="javascript:;">
							<span>单式</span>
							<em>(0)</em>
						</a>
						<a href="javascript:;">
							<span>棒球结果</span>
							<em>(0)</em>
						</a>
					</p>
				</li>
			</ul>
			<ul class="Piclist">
				<li>
					<div class="Piclist_top">
						<span>今日赛事</span>
						<em>(0)</em>
					</div>
					<p class="Piclist_bottom">
						<a href="javascript:;">
							<span>足球单式</span>
							<em>(0)</em>
						</a>
						<a href="javascript:;">
							<span>篮球单式</span>
							<em>(0)</em>
						</a>
					</p>
				</li>
				<li>
					<div class="Piclist_top">
						<span>早餐赛事</span>
						<em>(96)</em>
					</div>
					<p class="Piclist_bottom">
						<a href="javascript:;">
							<span>足球单式</span>
							<em>(0)</em>
						</a>
						<a href="javascript:;">
							<span>篮球单式</span>
							<em>(0)</em>
						</a>
					</p>
				</li>
			</ul>
		</section>
		<script>

		//下拉刘表
			(function(){
				var aList = $('.Piclist');

				aList.each(function(i){
					var ListTop =  $(this).find('.Piclist_top');
					show(ListTop,i);
				});


				function show(obj,num){
					num%=2
					if(num != 1){
						obj.attr('onOff','true');
					}else{
						obj.attr('onOff','false');
					}
					obj.on('touchend',aListShow);
					function aListShow(){
						var oP = $(this).siblings('p');
						var oA = oP.find('a');

						if($(this).attr('onOff') == 'true'){
							$(this).attr('onOff','false');
							oP.height(oA.outerHeight()*oA.size());
						}else{
							$(this).attr('onOff','true');
							oP.height(0);
						}
						

						var timer = null;
						var iNow = 0;
						timer = setInterval(function(){
							Height();
							iNow++;
							if( iNow == 30 ){
								clearInterval( timer );
							}
						},100);
						
					}
				}
			})();

			//小选项卡
			(function(){
				var sMaBtnsBox = $('.seList');
				sMaBtnsBox.each(function(i){
					if( $(this).find('.tab_tab') ){
						var sMaBtns = $(this).find('.tab_tab div');
						var oPiclist = $(this).find('.smcontant .Piclist');
						sMaBtns.on('touchend',sMtab);
						function sMtab(){
							$(this).addClass('active');
							sMaBtns.not($(this)).removeClass('active');
							oPiclist.eq($(this).index()).addClass('active');
							oPiclist.not( oPiclist.eq($(this).index()) ).removeClass('active');
							Height();
						}
					}
				});

			})();

			Height();
			function Height(){	
				$(window.parent.document).find('#iFrameT').height( $('body').height() );
			}
		</script>
	</body>
</html>