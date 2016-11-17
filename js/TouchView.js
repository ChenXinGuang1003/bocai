(function(){
    //滑動html物件
    var _SwitchView = null;
    //滑動狀態開關
    var _onDrag = false;
    //向左滑動箭頭
    var _goLeft = null;
    //向右滑動箭頭
    var _goRight = null;
    //記錄滑動位置的json物件
    var _oPos = {x:0,y:0}
    //移動位移量
    var _z = 0;
    //移動的單位(預設100px)
    var _m = 100;
    //暫存位移量
    var _intTmp = 0;
    //方向
    var _dir = 'r'; 
    //移動狀態
    var _onMove = 0;
    //滑動html的總位移量
    var _iOffset = 0;
    //滑動的總數
    var _iTotalGo = 0;
    //滑動區塊的單位長度
    var _iUnit = 0;
    //目標位置
    var _iGoPos = 0;
    //是否為ie6
    var _iAmIE6 = (document.all&&( (navigator.userAgent.toLowerCase()).indexOf("msie 6") > -1 ) )?true:false;
    //是否為ie7
    var _iAmIE7 = (document.all&&( (navigator.userAgent.toLowerCase()).indexOf("msie 7") > -1 ) )?true:false;
    //是否為ie8
    var _iAmIE8 = (document.all&&( (navigator.userAgent.toLowerCase()).indexOf("msie 8") > -1 ) )?true:false;
    //是否為ie9
    var _iAmIE9 = (document.all&&( (navigator.userAgent.toLowerCase()).indexOf("msie 9") > -1 ) )?true:false;
    //物件
    var _this = null;
    var _timer = null;
    /**
     * 取得滑動div的touch與邊界的位移量
     * @param obj
     * @param e
     * @returns json
     */
    function _GetOffset2(obj,e) {
        var mPos2 = _GetTouchPos(e.touches[0]);
        var oPos2 = _GetOffsetPos(obj);
        return{x:(mPos2.x-oPos2.x),y:(mPos2.y-oPos2.y)}
    }
    /**
     * 取得滑動div的滑鼠位置與邊界的位移量
     * @param obj
     * @param e
     * @returns json
     */
    function _GetOffset3(obj,e){
        e = e || window.event;
        var mPos2 = _GetMousePos(e);
        var oPos2 = _GetOffsetPos(obj);
        return{x:(mPos2.x-oPos2.x),y:(mPos2.y-oPos2.y)}
    }
    /**
     * 取得手指破到的網頁位置
     * @param e
     * @returns json
     */
    function _GetTouchPos(e){
        var Mx = e.pageX;
        var My = e.pageY;
        return {x:Mx,y:My}
    }
    /**
     * 取得滑鼠遊標位置
     * @param e
     * @return json
     */
    function _GetMousePos(e){
        e = e || window.event;
        var doc = document.documentElement;
        var doc2 = document.body;
        var Mx = Math.round(doc.scrollLeft + doc2.scrollLeft + e.clientX);
        var My = Math.round(doc.scrollTop + doc2.scrollTop + e.clientY);
        return {x:Mx,y:My}
    }
    /**
     * 取得浮動div的左方位置
     * @param obj
     * @returns json
     */
    function _GetOffsetPos(obj){
        var iTop = 0;
        var iLeft = 0;
        iLeft += obj.offsetLeft;
        iTop += obj.offsetTop;
        return{x:iLeft,y:iTop};  
    }
    /**
     * 停止滑動
     */
    function _stopMove() {
        _SwitchView.style.left = _iGoPos + 'px';
        _SwitchView.className = '';
        _onMove = 0;
    }
    /**
     * 設定單位寛度
     */
    function _setDefaultUnit () {
        var divs = _SwitchView.getElementsByTagName('div');
	document.getElementById('touchPadZone').style.display = 'block';
        _iTotalGo = divs.length;
        _iUnit = divs[0].offsetWidth;
        for (var i = 0; i < _iTotalGo; i++){
            _iOffset += divs[i].offsetWidth;
        }
        _iOffset *= -1;
	document.getElementById('touchPadZone').style.display = '';
    }
    SlideView = function () {
    }
    SlideView.prototype = {
        /**
         * 建構函式
         * @param pName 位置id
         * @param slide 滑動的html tag
         * @param goLeft 向左滑動的html tag
         * @param goRight 向右滑動的html tag
         */
        init: function(pName,slide, goLeft, goRight) {
            _this = this;
            _SwitchView = slide;
            _goLeft = goLeft;
            _goRight = goRight;
            var doc = document;
            if (window.addEventListener) {
                _goLeft.addEventListener('click', function () {
                    (_this.padLeftGo) && _this.padLeftGo.call(this, _this);
                }, false);
                _goRight.addEventListener('click', function () {
                    (_this.padRightGo) && _this.padRightGo.call(this, _this);
                }, false);
                doc.addEventListener('touchend', this.SwitchEnd, false);
                doc.addEventListener('touchmove', this.SwitchMove, false);
                doc.addEventListener('mouseup', this.SwitchEnd, false);
                doc.addEventListener('mousemove', this.SwitchMoveMouse, false);
                _SwitchView.addEventListener("touchstart", this.SwitchTouch, false);
                _SwitchView.addEventListener("mousedown", this.SwitchMouse, false);
            } else if (window.attachEvent) {
                _goRight.attachEvent("onclick", function () {
                    (_this.padRightGo) && _this.padRightGo.call(event.srcElement, _this);
                });
                _goLeft.attachEvent("onclick", function () {
                    (_this.padLeftGo) && _this.padLeftGo.call(event.srcElement, _this);
                });
                _SwitchView.attachEvent("onmousedown", this.SwitchMouse);
                doc.attachEvent('onmouseup', this.SwitchEnd);
                doc.attachEvent('onmousemove', this.SwitchMoveMouse);
            }
            _setDefaultUnit();
            if (typeof(window.orientation) != 'undefined') {
                window.addEventListener("orientationchange",_setDefaultUnit,false);
            }
            if (_iTotalGo > 1 && _goRight) {
                _goRight.style.display = 'block';
            }
            var iGoLeft = document.getElementById(pName + '_Content').offsetLeft;
            _SwitchView.style.left = (iGoLeft*-1) + 'px';
            if (iGoLeft > 0 && _goLeft){
                _goLeft.style.display = 'block';
            }
            if( Math.round(iGoLeft/_iUnit) == (_iTotalGo - 1) && _goRight ){
                _goRight.style.display = '';
            }
        },
        /**
         * 滑動特效
         * @param e
         */
        SwitchTouch: function (e) {
            if (_onMove == 0) {
                _oPos = _GetOffset2(_SwitchView, e);
                _onDrag = true;
            }
        }, 
        /**
         * 滑鼠的滑動
         * @param e
         */
        SwitchMouse: function (e) {
            e = e || window.event;
            if(_onMove == 0){
                _oPos= _GetOffset3(_SwitchView, e);
                _onDrag = true;
            }
        },
        /**
         * 手指離開
         */
        SwitchEnd: function () {
            if (_onDrag) {
                var oPos2 = _GetOffsetPos(_SwitchView);
                _z = oPos2.x;
                if (oPos2.x > 0) {
                    _onMove = 1;
                    _iGoPos = 0;
                    _timer = setInterval(_this.GoPosR, 50);
                } else if (oPos2.x < (_iOffset + _iUnit)) {
                    _onMove = 1;
                    _iGoPos = (_iOffset + _iUnit);
                    _timer = setInterval(_this.GoPosL, 50);
                } else {
                    _onMove = 1;
                    var iNow = Math.abs( oPos2.x );
                    var iGo = Math.floor( iNow/_iUnit );
                    _goLeft.style.display = 'block';
                    _goRight.style.display = 'block';
                    if (_dir == 'l') {
                        _iGoPos = _iUnit*(iGo + 1 )*-1;
                        if (_iGoPos > _iOffset) {
                            _timer = setInterval(_this.GoPosR, 50);
                            if (iGo >= (_iTotalGo - 2)) {
                                _goRight.style.display = 'none';
                            } else {
                                _goRight.style.display = 'block';
                            }
                        } else {
                           _goRight.style.display = 'none';
                           _onMove = 0;
                        }
                    } else {
                        _iGoPos = _iUnit * iGo * -1;
                        _timer = setInterval(_this.GoPosL, 50);
                        if (iGo == 0) {
                            _goLeft.style.display = 'none';
                        }else{
                            _goLeft.style.display = 'block';
                        }
                    } 
                }
            }
            _onDrag = false;
        },
        /**
         * 手指的移動事件
         * @param e
         */
        SwitchMove: function (e) {
            if (_onDrag) {
                e.preventDefault();
                var tPos = _GetTouchPos(e.touches[0]);
                var iNowPos = (tPos.x - _oPos.x);
                if( iNowPos > _intTmp ){
                    _dir = 'r';
                    _intTmp = iNowPos;
                }else{
                    _dir = 'l';
                    _intTmp = iNowPos;
                }
                _SwitchView.style.left = iNowPos + "px";
            }
        },
        /**
         * 滑鼠的移動事件
         * ＠param e
         */
        SwitchMoveMouse: function (e) {
            if (_onDrag) {
                if(e.pageX){ 
                    e.preventDefault();
                }
                var tPos = _GetMousePos(e);
                var iNowPos = Math.round(tPos.x - _oPos.x);
                if( iNowPos > _intTmp ){
                    _dir = 'r';
                    _intTmp = iNowPos;
                }else{
                    _dir = 'l';
                    _intTmp = iNowPos;
                }
                _SwitchView.style.left = iNowPos + "px";
            }
        }, 
        /**
         * 向右滑動
         * ＠parm iPos
         */
        GoPosL: function () {
            _z += _m;
            if (_z < _iGoPos) {
                _SwitchView.style.left =  _z +'px';
            } else {
                clearInterval(_timer);
                _SwitchView.style.left =  _iGoPos + 'px';
                _onMove = 0;
            }
        },
        /**
         * 向左滑動
         * @param iPos
         */
        GoPosR: function () {
            _z -= _m;
            if (_z > _iGoPos) {
                _SwitchView.style.left =  _z +'px';
            } else {
                clearInterval(_timer);
                _SwitchView.style.left =  _iGoPos + 'px';
                _onMove = 0;
            }
        },
        /**
         * 向右滑動
         */
        padRightGo : function (me) {
            if (_onMove == 0) {
                _onMove = 1;
                var oPos2 = _GetOffsetPos(_SwitchView);
                if (oPos2.x < (_iOffset + _iUnit)) {
                } else {
                    var iNow = Math.abs(oPos2.x);
                    var iGo = Math.round(iNow/_iUnit);
                    _goLeft.style.display = 'block';
                    _goRight.style.display = 'block';
                    _iGoPos = _iUnit*(iGo + 1 )*-1;
                    _z = oPos2.x;
                    if (_iAmIE6 || _iAmIE7 || _iAmIE8 || _iAmIE9) {
                        _timer = setInterval(me.GoPosR, 50);
                    } else {
                        _SwitchView.className = 'padGo';
                        setTimeout(_stopMove, 500);
                    }
                    if (iGo == (_iTotalGo - 2)) {
                        _goRight.style.display = 'none';
                    }else{
                        _goRight.style.display = 'block';
                    }
                }
            }
        },
        /**
         * 向左滑動
         */
        padLeftGo: function (me) {
            if(_onMove == 0){
                _onMove = 1;
                var oPos2 = _GetOffsetPos( _SwitchView );
                if( oPos2.x > 0 ){
                }else{
                    var iNow = Math.abs( oPos2.x );
                    var iGo = Math.round( iNow/_iUnit );
                    _goLeft.style.display = 'block';
                    _goRight.style.display = 'block';
                    _z = oPos2.x;
                    _iGoPos = _iUnit*(iGo-1 )*-1;
                    if (_iAmIE6 || _iAmIE7 || _iAmIE8 || _iAmIE9) {
                        _timer = setInterval(me.GoPosL, 50);
                    } else {
                        _SwitchView.className = 'padBack';
                        setTimeout(_stopMove, 500);
                    }
                    if (iGo == 1) {
                        _goLeft.style.display = 'none';
                    }else{
                        _goLeft.style.display = 'block';
                    }
                }
            }
        }
    }
})(); 
