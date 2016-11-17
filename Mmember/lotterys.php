<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<script src="/js/jquery-1.10.1.min.js" type="text/javascript"></script>
		<meta name="viewport" content="width=device-width,user-scalable=no,target-densitydpi=medium-dpi" />
		<script>
			var ClientW = $(window).width();
			$('html').css('fontSize',ClientW/3+'px');
		</script>
		<style>
			html{ width:100%; height:100%;  }
			body{ margin:0; height:100%; width:100%; }
			#zhe{ width:100%; height:100%; position:absolute; z-index:1000; background:#000 url(/images/loading.gif) no-repeat center center;}
			#headerBox{ width:100%; height:0.35rem; line-height:0.35rem; background:#986600; box-sizing:border-box; overflow:hidden;  position:relative;  }
			#headerBox a{ padding:0.12rem; border-radius:0.12rem; background:rgba(0,0,0,0.3) url(/img/index_ico.png) center center no-repeat; background-size:70%; position:absolute; left:0.1rem; top:calc(0.18rem - 0.12rem); }
			#headerBox .logo{ display:block; position:absolute; left:calc(1.5rem - 0.54rem); top:calc(0.18rem - 0.16rem); height:0.3rem; }
		</style>
	</head>
	<body>
		<header id="headerBox">
				<a href="/wap.php"></a>
				<img class="logo" src="/img/logo.png" />
		</header>
		<div id="zhe"></div>
	</body>
	<script>
		(function(){
			var iFrame = $('<iframe id="iframes" src="/cl/index.php?module=MACenterView&method=skRecord" width="100%" height="100%" scrolling="no" frameborder="0"></iframe>');
			
			$('body').append( iFrame );
			setTimeout(function(){
				$( $("#iframes").contents() ).ready(function(){
					var windows = $("#iframes").contents();
					windows.find('#MNav').remove();
					windows.find('#MNavLv2').remove();
					windows.find('.MControlNav').remove();
					windows.find('table.MMain').css({'width':'100%','borderColor':'rgba(136, 97, 97, 0.27)'});
					windows.find('html').css({'background':'#1A1309','color':'#fff','overflow':'hidden'});
					windows.find('body').css({'margin':'0','paddingTop':'5%'});
					windows.find('body').attr('scoll','no');
					windows.find('table.MMain tr').eq(0).css('color','rgb(255, 200, 0)');
					windows.find('a').css({'color':'#fff','text-decoration':'none'});

					$('#zhe').remove();
					//windows.find('#MSelectType').css({'width':'25%','height':'4%','textIndent':'15%','backgroundColor':'#986600','fontSize':'15px','border':'none','marginBottom':'2%','color':'#fff','fontWeight':'bolder'});
				});
			},1000);
			
		})();
	</script>
</html>