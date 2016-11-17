function cancelMouse(){return false;}
  document.oncontextmenu = cancelMouse; 
  
function mover(o){
    o.style.backgroundPosition='0 bottom';
}

function mout(o){
    o.style.backgroundPosition='0 top';
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
function subWin(swf){
  window.open(swf,"gameOpen","width=1024,height=768");
}
function subWinRule(swf){
  window.open(swf,"gameOpenRule","width=1024,height=768,scrollbars=yes");
}

//透明按鈕效果(漸變)~
function over_o(o){
	$(o).stop().animate({'opacity': 0}, 650);
}
function out_o(o){
	$(o).stop().animate({'opacity': 1}, 650);
}
