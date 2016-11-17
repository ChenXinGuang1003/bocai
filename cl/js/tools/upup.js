//進維護畫面倒數
var _upupinit = true,$upup,$upupWin,_upupHeight;

function figLeaf(H){
	if(!top.upupMsg){
		return false;
	}
	if(_upupinit){
		$('body').append(H.html());
		$upup = $('#upupMessage'), $upupC = $('#upupMessage > #upupContent');
		$upupWin = $(window), _upupMoveSpeed = 100 ,_upupDiffY = 20 , _upupDiffX = 20;
		_upupHeight = $upup.height() , _upupWidth = $upup.width();
		
		    // 控制 #upupMessage 的移動
		$upupWin.bind('scroll resize', function(){
		    $upup.animate({
		        top: $upupWin.scrollTop() + $upupWin.height() - _upupHeight - _upupDiffY,
		        left: $upupWin.scrollLeft() + $upupWin.width() - _upupWidth - _upupDiffX
		    }, _upupMoveSpeed);
		});
		//關閉訊息
		$('#upupMessage .close_ad').click(function(){
		    $upup.hide();
		});
		_upupinit = false;
	}
	
	//距離維護開始倒數秒數
	if(top.upupMsg._UNDER['UNDER_MAINTAIN_SEQUENCE'] == true && top.upupMsg._UNDER['COUNTDOWN1'] > 0){
		var str = top.upupMsg.millisecondsStrToDate(top.upupMsg._UNDER['COUNTDOWN1']);
        if(str){
        	$upup.show();
        	$upupC.html(str);
        }
	}else{
		$upup.hide();
	}
	
	//廣播訊息
	if(top.upupMsg._UNDER['MARQUEE'] != "" && top.upupMsg._UNDER['MARQUEE'] != undefined){
		$upup.show();
    	$upupC.html(top.upupMsg._UNDER['MARQUEE']);
    	top.upupMsg._UNDER['MARQUEE'] = "";
	}else if(top.upupMsg._UNDER['MARQUEE'] == ""){//如果送空字串就隱藏訊息
		$upup.hide();
	}
}

function BBStyleActive(html, Str, IsShow) {
	$('body').append(html);
    var self = this, _win = $(window), _content = $("#BBStyleActive"), _icon = $("#BBStyleIcon"), _inner = $("#BBStyleContent"), _conHeight = _content.height(), showPlace = 0;
    
    this.IsShow = IsShow;
    this.slideUp = function () {
		showPlace = -180;
    	_icon.html(Str.str2);
    	_inner.show();
    	//彈出視窗效果
        _content.stop(true, true).animate({top: _win.height() - _conHeight + showPlace}, 600);
	}
	this.slideDown = function () {
		showPlace = 0;
    	//彈出視窗效果
        _content.stop(true, true).animate({top: _win.height() - _conHeight + showPlace}, 600, function () {
        	_icon.html(Str.str1);
        	_inner.hide();
        });
	}
	
	// 設定初始位置
    _content.css({top: _win.scrollTop() + _win.height() - _conHeight + 20});

    //浮動效果
	_win.bind('scroll resize', function(){
	    _content.stop(true, true).css({'top' : _win.height() - _conHeight + showPlace});
	});
	
	//關閉視窗
	_icon.click(function() {
		event.cancelBubble=true;
		if (self.IsShow) {
			self.IsShow = false;
			self.slideDown();
		} else {
			self.IsShow = true;
			self.slideUp();
		}
	});
	
    if (this.IsShow) {
    	this.slideUp();
    } else {
    	this.slideDown();
    }
}


function NationalDayA(html, IsShow) {
    var checkIE6 = document.createElement("b"), isIE6;
    checkIE6.innerHTML = "<!--[if IE 6]><br><![endif]-->";
    isIE6 = (checkIE6.getElementsByTagName("br").length === 1);
    if (IsShow) {

        $('body').append(html);
        var _win = $(window),
            _box = $('#NationalDayA'),
            _boxH = _box.height(),
            timeoutID;

        // ie6 hack
        if (isIE6) {
            $('html').css('textOverflow', 'ellipsis');
            _box.css('position', 'absolute');
            var reset = function() {
                _box.css('top', _win.height()/2 + document.documentElement.scrollTop);
            };
            _win.on('scroll resize', reset);
			}

        function NationalDayAutoHide() {
            timeoutID = window.setTimeout(function(){
                    _win.off('scroll resize', reset);
                    _box.fadeOut(500, function() { $(this).hide();});
                }, 7000);
	}

        _box.on('click', '#NationalDayA-closeBTN', function(event) {
            _win.off('scroll resize', reset);
            window.clearTimeout(timeoutID);
            _box.fadeOut(500, function() { $(this).hide();});
});
        NationalDayAutoHide();

    }
}

function NationalDayB(html, IsShow) {    
    $('body').append(html);
    var checkIE6 = document.createElement("b"), isIE6;
    checkIE6.innerHTML = "<!--[if IE 6]><br><![endif]-->";
    isIE6 = (checkIE6.getElementsByTagName("br").length === 1);

    var self = this,
        _win = $(window),
        _box = $("#NationalDayB"),
        _title = $("#NationalDayB-title"),
        _content = $("#NationalDayB-content"),
        _boxH = _box.height(),
        showPlace = 0,
        boxSpd = 300,
        timer_is_on = 0,
        timeoutID,
        reset = function(){};

    this.IsShow = IsShow;

    // ie6 hack
    if (isIE6) {
        $('html').css('textOverflow', 'ellipsis');
        _box.css('position', 'absolute');
        boxSpd = 0;
        reset = function() {
            _boxH = _box.height();
            _box.stop(true,true).css('top', (_win.height() - _boxH + document.documentElement.scrollTop));
        };
        _win.on('scroll resize', reset);
    }

    this.slideUpX = function () {
        _content.show(boxSpd, function(){
            _title.css({'backgroundPosition': '213px -59px'});
            reset();
        });
    };
    this.slideDownX = function () {
        _content.hide(boxSpd, function(){
            _title.css({'backgroundPosition': '213px 7px'});
            reset();
        });
    };
    //視窗自動縮下
    function AutoDown() {
        if (!timer_is_on){
            timer_is_on=1;
            timeoutID = window.setTimeout( function(){self.slideDownX();}, 7000 );
        }
    }
    //停止計時
    function stopCount(){
        clearTimeout(timeoutID);
        timer_is_on=0;
    }

    //點擊縮放視窗
    _title.live('click', function(event) {
        event.cancelBubble = true;
        if (self.IsShow) {
            self.IsShow = false;
            self.slideDownX();
            stopCount();
        } else {
            stopCount();
            self.IsShow = true;
            self.slideUpX();
            AutoDown();
        }
    });

    // 初始化,預設開啟
    if (this.IsShow) {
        this.slideUpX();
        AutoDown();
    } else {
        this.slideDownX();
        stopCount();
    }
}

$(function() {
    if (top.upupMsg && 'object' == typeof(top.upupMsg.NationalDay) && 'function' == typeof(top.upupMsg.NationalDay.callFunc)) {
        top.upupMsg.NationalDay.callFunc();
    } else {
        setTimeout(function () {
            if (top.upupMsg && 'object' == typeof(top.upupMsg.NationalDay) && 'function' == typeof(top.upupMsg.NationalDay.callFunc)) {
                top.upupMsg.NationalDay.callFunc();
            }
        }, 1000);
    }
});