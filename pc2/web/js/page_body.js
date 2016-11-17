$(window).ready(function(){
	//焦点轮播图
	(function(){
		//焦点轮播图生成
		var dataInt = {data:[{'src':'img/bb_baccarat_soon.png'},{'src':'img/bbpk3.png'},{'src':'img/ladder.png'}]}; 
		
		var oUlstr = '';
		var oCursor = '';


		for(var i=0;i<dataInt['data'].length;i++){
			oUlstr += '<li><a href="javascript:;"><img src="'+dataInt.data[i]['src']+'" /></a></li>';
			oCursor += '<a href="javascript:;"></a>';
		}

		var oUlBox = $('.banner_list .list_Box');
		var oCursorBox = $('.banner_list .cursor_Box'); 
		oUlBox.html(oUlstr);
		oCursorBox.html(oCursor);

		oUlBox.find('li:first').css('opacity','1');
		oCursorBox.find('a:first').addClass('active');




		//焦点轮播图效果

		var timer = null;
		var iNow = 0;
		var oLi = oUlBox.find('li');
		var oA = oCursorBox.find('a');

		show();

		function show(){
			clearInterval(timer);
			timer = setInterval(function(){
			iNow++;
				if(iNow == oLi.size()){
					iNow = 0;
				}
				
				aClick(iNow);
			},3000);
		}
		

		oA.click(function(){
			clearInterval(timer);
			iNow = $(this).index();
			aClick(iNow);
		});

		oA.mouseout(function(){
			show();
		});

		function aClick(iNow){
			oLi.each(function(i){
				if(i != iNow){
					oLi.eq(i).attr('zIndex',1).fadeOut(600);
					oA.eq(i).removeClass('active');
				}else{
					oLi.eq(i).attr('zIndex',100).fadeIn(600);
					oA.eq(i).addClass('active');
				}
			});
		}
	})();

	//hover
	(function(){
		var oLi = $('.lottery-top .top_box li');
		oLi.hover(function(){
			if($(this).find('a').size()){
				$(this).find('a').css('backgroundPosition','0 bottom');
			}
		},function(){
			if($(this).find('a').size()){
				$(this).find('a').css('backgroundPosition','0 top');
			}
		});
	})();

	//连续开奖/未开
	(function(){
		//开奖
		var dataInt = {data:[{'caipiao':'六合彩','leixin':'正码三 和单','qi':'10'},{'caipiao':'重庆时时彩','leixin':'(后三)和数 双','qi':'9'},{'caipiao':'新疆时时彩','leixin':'(后三)和尾数 质','qi':'8'},{'caipiao':'天津时时彩','leixin':'佰拾和数 单','qi':'7'},{'caipiao':'北京PK拾','leixin':'季军 小','qi':'7'}]}; 
		//未开
		var dataOut = {data:[{'caipiao':'江苏快3','leixin':'围骰 1','qi':'803'},{'caipiao':'吉林快3','leixin':'围骰 3','qi':'439'},{'caipiao':'重庆时时彩','leixin':'(后三)跨度 0','qi':'370'},{'caipiao':'安徽快3','leixin':'围骰 6','qi':'335'},{'caipiao':'六合彩','leixin':'正码特五 11','qi':'317'}]}; 
		
		var kaiBoxs = $('.lottery-bottom .bottom_box');

		var aBtns = $('.lottery-bottom .bottom_btn a') ;

		liShow(dataInt,kaiBoxs.eq(0)); //初始化

		aBtns.eq(0).click(function(){
			 Display($(this),dataInt,kaiBoxs.eq(0));
		});
		aBtns.eq(1).click(function(){
			 Display($(this),dataOut,kaiBoxs.eq(1));
		});

		$('#List1,#List2').on('mouseover','li',function(){
			if($(this).index() == 0){
				$(this).find('p').addClass('active');
			}else{
				$(this).find('p').css('background','#fff');
			}
			
		});
		$('#List1,#List2').on('mouseout','li',function(){
			if($(this).index() == 0){
				$(this).find('p').removeClass('active');
			}else{
				$(this).find('p').css('background','');
			}
		});


		function Display(This,json,obj){
			aBtns.each(function(i){
				if(i != This.index()){
					aBtns.eq(i).removeClass('active');
					kaiBoxs.eq(i).removeClass('active');
				}else{
					aBtns.eq(i).addClass('active');
					kaiBoxs.eq(i).addClass('active');
				}
			});

			if(!obj.children().size()){
				liShow(json,obj);
			}
		}

		function liShow(json,obj){
			var str = '';
			for(var i=0;i<json['data'].length;i++){
				str += '<li><div class="lo_left"><span>'+json['data'][i]['caipiao']+'</span><em>'+json['data'][i]['leixin']+'</em></div><p class="lo_right"><span>'+json['data'][i]['qi']+'</span><a href="javascript:;">期</a></p></li>';
			}
			obj.html(str);
			obj.find('li:first').addClass('borderTnone active');
		}

	})();
});