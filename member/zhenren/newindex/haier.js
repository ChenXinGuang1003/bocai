// 鎖右鍵
function cancelMouse(){return false;}
document.oncontextmenu = cancelMouse;

//下載版JS
function downloadvwin() {
    var _win = window.open('/cl/?module=MRule&method=InstallationInstruction&type=download', 'downloadnew' ,'width=1024,height=640,status=no,scrollbars=yes');
    _win.focus();
}
//彩金規則
function jackpotRule(){
    var _win = window.open('?module=MAdvertis&method=JackPotRule', 'popup','width=658,height=280,scrollbars=no,resizable=no, toolbar=no,directories=no,location=no,menubar=no, status=no,left=0,top=0'); return false;
    _win.focus();
}

// 設為首頁
f_com.setHomepage = function(url) {
    if(document.all){
        document.body.style.behavior = 'url(#default#homepage)';
        document.body.setHomePage(url);
    }else{
        alert("您的瀏覽器目前不支援此功能！");
    }
}

// 加入最愛
f_com.bookmarksite = function(url,title) {
    if(window.sidebar||window.opera) {
        // for firfox
        window.sidebar.addPanel(title, url,"");
    }else if(document.all){
        // for IE
        window.external.AddFavorite( url, title);
    }else{
        alert("您的瀏覽器目前不支援此功能！");
    }
}

$(function() {
    // 文字閃爍
     new toggleColor('#js_promotions', ['#FFF','#F00'] , 500 );    
    $("li.LS-ball, li.LS-live, li.LS-game, li.LS-lottery").subTabs({
        "animate"  : "fade", 
        "showTime" : 0, 
        "inDelay"  : 200, 
        "outDelay" : 200,
        "notOver"  : 0
    });
    // 圖片 淡出效果
    $('.hoverFade > a').hover(function() {
            $(this).stop().animate({'opacity': 0}, 500);
        }, function() {
            $(this).stop().animate({'opacity': 1}, 500);
        }
    );
    $('.hoverInst > a').hover(function() {
            $(this).stop().animate({'opacity': 0}, 0);
        }, function() {
            $(this).stop().animate({'opacity': 1}, 0);
        }
    );   
});