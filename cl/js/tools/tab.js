/*
**inDelay: 顯示前延遲
**outDelay: 隱藏前延遲
**showTime: 動畫時間
**sub: 子選單區塊
**clearTab: 隱藏所有子選單區塊
**inTab: 顯示
**outTab: 隱藏
**clickTab: 點擊顯示
** animate: 動畫效果
 */
$.fn.subTabs = function(options) {
    var conf = {
        "inDelay": 400,
        "outDelay": 400,
        "showTime": 300,
        "notOver": 1, //防止超出版面
        "animate": "fade",
        "alignLeft": false, //子選單靠左
		"posTop":-10	//按鈕在上方
    };

    $.extend(conf, options);

    return this.each(function() {
        var _o = $(this);
        var tClass = _o.attr("class").split(' ')[0];
        var sub = $("div[class=" + tClass + ']');
        var targetWid = _o.width();
        var posX = _o.position().left;
		
        if(conf.alignLeft) {
        	var moveVal = posX - _o.parent().position().left;
        } else {
        var moveVal = (posX - (sub.width() - targetWid) / 2) - _o.parent().position().left - 8;
        }
		
        

        var tout, tin;

        //非英文語系 移除title
        if( $('html.en').length == 0 ){
        $(this).find('a').removeAttr('title');
        sub.find('a').removeAttr('title');
        }
        if (moveVal < 0 && conf.notOver == 1) {
            moveVal = 0;
        }

        if (conf.left != undefined) {
            moveVal = parseInt(conf.left) - parseInt(sub.width() / 2);
        }

        //2012.09.28 新增垂直參數設定
        if (conf.posTop) {
            //sub.css("top", conf.posTop);
			sub.css("top", -(sub.height()*2)+conf.posTop);//按鈕高度*2 +預設高度 取反
        }

        sub.css("left", moveVal);
        sub.hide();

        $("." + tClass).hover(function() {
            clearTimeout(tout);
            tin = setTimeout(function() {
                inTab();
            }, conf.inDelay);
        }, function() {
            clearTimeout(tin);
            tout = setTimeout(function() {
                outTab();
            }, conf.outDelay);
        });

        _o.bind("click", function() {
            if (sub.is(":visible")) {
                return false;
            } else {
                clickTab();
            }
        });

        function clearTab() {
            sub.parent().find("div").hide();
        }

        function inTab() {
        	if(conf.animate == "slide") {
        		sub.stop(true, true).slideDown(conf.showTime);
        	} else {
                sub.stop(true, true).fadeIn(conf.showTime);
        	}
            //position();
        }

        function outTab() {
        	if(conf.animate == "slide") {
        		sub.stop(true, true).slideUp(conf.showTime);
        	} else {
                sub.stop(true, true).fadeOut(conf.showTime);
        	}
        }

        function clickTab() {
            clearTab();
            if(conf.animate == "slide") {
            	sub.stop(true, true).slideDown(conf.showTime);
            } else {
                sub.stop(true, true).fadeIn(conf.showTime);
            }
        }

        function position() {
            var m = parseInt(conf.left) - parseInt(sub.width() / 2);
            sub.css("left", m + "px");
        }
    });
};