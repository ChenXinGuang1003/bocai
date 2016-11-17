/*
 * function ccMarquee(classname){ var a=_getElementsByClass(classname); for (i = 0; i < a.length; i++) { a[i].innerHTML="<marquee scrolldelay='120' onmouseover='this.stop()'
 * onmouseout='this.start()'>"+ a[i].innerHTML+"</marquee>"; } }
 */
(function () {
    function _getElementsByClass(_class, _tag){
        var _arr = [];
        (_tag == null) && (_tag = "*");
        var _nodes = document.getElementsByTagName(_tag), _len = _nodes.length, _reg = new RegExp("(\\s|^)" + _class + "(\\s|$)");
        for (i = 0; i < _len; i++) {
            if (_reg.test(_nodes[i].className)) {
                _arr.push(_nodes[i]);
            }
        }
        return _arr;
    }
    //timer
    self.MyClock = null;
    // 位置
    var aPos =  [];
    // 移動間隔
    var aGap =  [];
    // div Width
    var aWidth =  [];
    // 移動div的 Width
    var aWidth2 =  [];
    // 移動的div
    var aDiv =  [];
    // ie 7
    var _isIE7 = ((navigator.userAgent.indexOf("MSIE 7.") != -1) && (navigator.userAgent.indexOf("Opera") == -1));
    // ie 8
    var _isIE8 = ((navigator.userAgent.indexOf("MSIE 8.") != -1) && (navigator.userAgent.indexOf("Opera") == -1));
    // ie 9
    var _isIE9 = ((navigator.userAgent.indexOf("MSIE 9.") != -1) && (navigator.userAgent.indexOf("Opera") == -1));
    function MoveWord(){
        for (var i = 0, t = aDiv.length; i < t; i++) {
            aPos[i] -= aGap[i];
            aDiv[i].style.left = aPos[i] + 'px';
            if( aPos[i] == aWidth2[i] * -1 ){
                aPos[i] = aWidth[i];
            }
        }
        // setTimeout("MoveWord();",15);
    }
    /**
     * 是否支援css3 animation Event
     */
    function _isAnimationSupport() {
        var animation = false,
            animationstring = 'animation',
            keyframeprefix = '',
            domPrefixes = 'Webkit Moz O ms Khtml'.split(' '),
            pfx  = '',
            elm = document.createElement('div');

        if( elm.style.animationName ) { animation = true; }

        if( animation === false ) {
            for( var i = 0; i < domPrefixes.length; i++ ) {
                if( elm.style[ domPrefixes[i] + 'AnimationName' ] !== undefined ) {
                    pfx = domPrefixes[ i ];
                    animationstring = pfx + 'Animation';
                    keyframeprefix = '-' + pfx.toLowerCase() + '-';
                    animation = true;
                    break;
                }
            }
        }
        return animation;
    }
    ccMarquee = function (classname) {
        var a = _getElementsByClass(classname);
        if (_isIE7 || _isIE8 || _isIE9) {
            for (var i = 0, t = a.length; i < t; i++) {
                a[i].innerHTML="<marquee scrolldelay='120' onmouseover='this.stop()' onmouseout='this.start()'>"+ a[i].innerHTML+"</marquee>";
            }
        } else {
            var MarStop = function() {
                aGap[this.x] = 0;
            }
            var MarStart = function() {
                aGap[this.x] = 1;
            }
            var _a, _w, _h, _reg, _reg2,
                style = document.documentElement.appendChild(document.createElement("style")),
                _css3 = _isAnimationSupport();
            var _class = "\." + classname + " > \.Move$1{ \n \
                animation:marq$1 $2 linear infinite; \n \
                -webkit-animation:marq$1 $2 linear infinite; \n \
            }";
            var _stop = "\." + classname + " > \.Move$1:hover{ \n \
                animation-play-state: paused; \n \
                -webkit-animation-play-state: paused; \n \
            }";
            var _kf, W, time;
            for (var i = 0, t = a.length; i < t; i++) {
                time = '24s';
                _a = a[i];
                _w = _a.offsetWidth;
                _h = _a.offsetHeight;
                _a.style.cssText = 'overflow:hidden;position:relative;';
                _a.x = i;
                if (!_css3) {
                    _a.onmouseover = MarStop;
                    _a.onmouseout = MarStart;
                }
                _a.innerHTML = '<div style="position:absolute;left:' + _w + 'px;height:' + _h + 'px;white-space:nowrap;line-height:' + _h + 'px;" class="Move' + i + '">' + _a.innerHTML + '</div>';
                aGap[i] = 1;
                aWidth[i] = _w;
                aPos[i] = _w;
                aDiv[i] = _a.firstChild;
                aWidth2[i] = aDiv[i].offsetWidth;
                if (_css3) {
                    _kf = " marq" + i + " {\n";
                    W = Math.round(_w + aWidth2[i]);
                    if (CSSRule.WEBKIT_KEYFRAMES_RULE) { // WebKit
                        _kf += "0%   { -webkit-transform : translateX(0) translateZ(0);}\n";
                        _kf += "100% { -webkit-transform : translateX(-" + W + "px) translateZ(0);}\n";
                        _kf += "}";
                        style.sheet.insertRule("@-webkit-keyframes" + _kf, 0);
                    } else if (CSSRule.KEYFRAMES_RULE) { // W3C
                        _kf += "0%   { transform : translateX(0) translateZ(0);}\n";
                        _kf += "100% { transform : translateX(-" + W + "px) translateZ(0);}\n";
                        _kf += "}";
                        style.sheet.insertRule("@keyframes" + _kf, 0);
                    }
                    (W > 1024) && (time = '36s');
                    (W > 2048) && (time = '48s');
                    _reg = new RegExp("^(" + i + ")$"),
                        _reg2 = new RegExp("(" + i + ") (" + time + ")$");
                    style.sheet.insertRule(((i).toString()).replace(_reg, _stop), 0);
                    style.sheet.insertRule(((i).toString() + ' ' + time).replace(_reg2, _class), 0);
                }
            }
            (!_css3) && (self.MyClock = setInterval(MoveWord, 15));
        }
    }
    self.MoveWord = MoveWord;
})();
