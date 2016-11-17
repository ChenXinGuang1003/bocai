(function (namespace) {
    //ie
    var _isIE = ((navigator.userAgent.indexOf("MSIE") != -1) && (navigator.userAgent.indexOf("Opera") == -1));
    //ie6
    var _isIE6 = ((navigator.userAgent.indexOf("MSIE 6.") != -1) && _isIE);
    //ie7
    var _isIE7 = ((navigator.userAgent.indexOf("MSIE 7.") != -1) && _isIE);
    //ie8
    var _isIE8 = ((navigator.userAgent.indexOf("MSIE 8.") != -1) && _isIE);
    //ie9
    var _isIE9 = ((navigator.userAgent.indexOf("MSIE 9.") != -1) && _isIE);
    //android
    var _isAndroid = (navigator.userAgent.indexOf("Android") != -1);
    //clone的div node
    var _div = document.createElement('div');
    //clone的label node
    var _label = document.createElement('label');
    //clone的select node
    var _select = document.createElement('select');
    //clone的btn node
    var _btn = document.createElement('input');
    _btn.setAttribute('type', 'button');
    //clone的p node
    var _p = document.createElement('p');
    //clone的a node
    var _a = document.createElement('a');
    //預設的快選金額
    var gold_1 = getCookie("gold_1");
    var gold_2 = getCookie("gold_2");
    var gold_3 = getCookie("gold_3");
    var gold_4 = getCookie("gold_4");
    var disableGoldSelect = getCookie("disableGoldSelect") || "0";
    var _gold = [gold_1||10, gold_2||20, gold_3||50, gold_4||100];
    //被focus的物件
    var _focus = null;
    //blur事件的開關
    var _hasFocus = false;
    //拖拉籌碼跑馬燈timer
    var _timer = null;
    //拖拉狀態
    var _onDrag = false;
    //設定
    var _config = {
        disabeleGold : '0',
        menuArrow : true,
        menuDir : 'top',
        boxPosition : 'right',
        loadCookie: true,
        mobile : false
    }

    function setCookie(c_name,value,expiredays)
    {
        var exdate=new Date()
        exdate.setDate(exdate.getDate()+expiredays)
        window.parent.document.cookie=c_name+ "=" +escape(value)+
            ((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
    }

    function getCookie(c_name)
    {
        if (window.parent.document.cookie.length>0)
        {
            c_start=window.parent.document.cookie.indexOf(c_name + "=")
            if (c_start!=-1)
            {
                c_start=c_start + c_name.length+1
                c_end=window.parent.document.cookie.indexOf(";",c_start)
                if (c_end==-1) c_end=window.parent.document.cookie.length
                return unescape(window.parent.document.cookie.substring(c_start,c_end))
            }
        }
        return ""
    }

    /**
     * 取得html節點的css style
     * @param _node html節點
     * @param _css css名稱
     * @return string
     */
    function _getCurrentStyle ( _node, _css) {
        if (_node.currentStyle) {
            return _node.currentStyle[_css];   
        } else if (window.getComputedStyle) {
            _css = _css.replace(/([A-Z])/g, "-$1");
            _css = _css.toLowerCase();
            return window.getComputedStyle(_node, '').getPropertyValue(_css);
        }
    }
    /**
     * 取得html節點的offset位置
     * @param _node html節點
     * @return json
     */
    function _getOffsetPos (_node) {
        var _x = 0, _y = 0;
        while (_node.offsetParent) {
            _x += _node.offsetLeft;
            _y += _node.offsetTop;
            if (_getCurrentStyle(_node, 'overflowY') == 'auto' || _getCurrentStyle(_node, 'overflowY') == 'scroll') {
                _y -= _node.scrollTop;
            }
            _node = _node.offsetParent;
        }
        _x += _node.offsetLeft;
        _y += _node.offsetTop;
        return { x : _x, y : _y};
    }
    /**
     * 取得滑鼠在document的位置
     * @param e event
     * @return json
     */
    function _getMousePos (e) {
        var _x, _y;
        if (e.pageX) {
            _x = e.pageX;
            _y = e.pageY;
        } else {
            _x = Math.round(document.documentElement.scrollLeft + documentElement.body.scrollLeft + e.clientX);
            _y = Math.round(document.documentElement.scrollTop + documentElement.body.scrollTop + e.clientY);
        }
        return { x : _x, y : _y};
    }
    /**
     * 檢查是否為touch移動設備
     */   
    function _isTouchDevice(){
        /* Added Android 3.0 honeycomb detection because touchscroll.js breaks
           the built in div scrolling of android 3.0 mobile safari browser */
        if((navigator.userAgent.match(/android 3/i)) || (navigator.userAgent.match(/honeycomb/i))) {
            return false;
        }
        try{
            document.createEvent("TouchEvent");
            return true;
        }catch(e){
            return false;
        }
    }
    /**
     * 取得Cookie值
     * @param _cookieName cookie名稱
     * @return string
     */   
    function _getCookie(_cookieName){
        if (document.cookie) {
            if (document.cookie.length > 0) {
                var key = document.cookie.indexOf(_cookieName + "=");
                if (key != -1) {
                    key = key + _cookieName.length + 1;
                    c_end = document.cookie.indexOf(";", key);
                    if (c_end == -1) {
                        c_end = document.cookie.length;
                    }
                    return unescape(document.cookie.substring(key, c_end));
                }
            }
        }
        return "";
    }
    /**
     * 檢查html node的上層node是否是某id的子節點
     * @param obj html node
     * @param id 檢查的id
     * @return boolean
     */
    function hasParentId( obj, id) {
        while( obj.parentNode ) {
            if (obj.parentNode.id == id) {
                return true;
                break;
            }
            obj = obj.parentNode;
        }
    }
    
    namespace.GoldUI = function () {
        var me = this;
        if (_config.loadCookie) {
            try {
                var quickGold = _gold;
//                var _disabeleGold = _getCookie('EnableGold');
            } catch (e) {
                quickGold = [10, 20, 50, 100];
                _disabeleGold = '0';
            }
            (typeof quickGold == 'string') && (quickGold = [10, 20, 50, 100]);
            self.GoldUI.setConfig({disabeleGold: disableGoldSelect || false});
            self.GoldUI.setGold(quickGold);
        }
        //拖拉的遮罩
        this.mask = _div.cloneNode(1);
        this.mask.setAttribute('id', 'gold-ui-mask');
        this.mask.unselectable = "on";
        this.mask.onselectstart = function(){
            return false;
        };
        //籌碼區塊
        this.chipBox = _div.cloneNode(1);
        this.chipBox.setAttribute('id', 'bargaining-chip-box');
        this.chipBox.unselectable = "on";
        this.chipBox.onselectstart = function(){
            return false;
        };
        this.mask.appendChild(this.chipBox);
        //籌碼高度
        var _total = _gold ? _gold.length : (_gold = [10, 20, 50, 100]).length, _height = 100;
        (_total == 5) && (_height = 80);
        (_total == 6) && (_height = 65);
        (_total == 7) && (_height = 55);
        (_total == 8) && (_height = 50);
        (_total >= 9) && (_height = 45);
        this.bargain = [];
        for (var i = 0; i < _total; i++) {
            this.bargain[i] = _div.cloneNode(1);
            this.bargain[i].setAttribute('id', 'gold-ui-bargainchip-' + (i+1));
            this.bargain[i].style.height = _height + 'px';
            this.bargain[i].style.lineHeight = _height + 'px';
            this.bargain[i].innerHTML = __("_bet") + _gold[i] + __("_dollar") + "&nbsp;&nbsp;&nbsp;";
            this.chipBox.appendChild(this.bargain[i]);
        }
        document.body.appendChild(this.mask);
        this.dragBox = _div.cloneNode(1);
        this.dragBox.setAttribute('id', 'gold-ui-drag');
        this.boxSpan = document.createElement('span');
        this.dragBox.appendChild(this.boxSpan);
        this.dragBox.unselectable = "on";
        this.dragBox.onselectstart = function(){
            return false;
        };
        document.body.appendChild(this.dragBox);
        //快選金額menu
        this.menu = _div.cloneNode(1);
        this.menu.setAttribute('id', 'gold-ui-menu');
        if (_isIE6) {
            var _iframe = document.createElement("iframe");
            _iframe.style.cssText = '\
                          position:absolute;\
                          top:0;\
                          left:0;\
                          width:120px;\
                          height:300px;\
                          filter:Alpha(opacity=0);\
                          z-index:-1;';
            this.menu.appendChild(_iframe);
        }
        var div = _div.cloneNode(1);
        var _click = me.onMenuClick;
        var _over = me.onMenuOver;
        var _out = me.onMenuOut;
        var a;
        for (i = 0; i < _total; i++) {
            a = _a.cloneNode(1);
            a.innerHTML = __("_bet") + _gold[i] + __("_dollar");
            a.x = _gold[i];
            a.onclick = _click;
            a.onmouseover = _over;
            a.onmouseout = _out;
            //this.menu.appendChild(a);
            div.appendChild(a);
        }
        if (!_isAndroid) {
            //停用快選金額選單
            a = _a.cloneNode(1);
            a.innerHTML = "<img src='/images/warn.gif' alt='%" + __('expired') + "%' style='border:0;vertical-align:middle;' />&nbsp;<b style='background-color:red;color:#fff'>" + __('expired') + "</b>";
            a.style.fontWeight = 'bold';
            a.onclick = function () { me.onStopClick(); };
            a.onmouseover = _over;
            a.onmouseout = _out;
            //this.menu.appendChild(a);
            div.appendChild(a);
        }
        if (_isIE6 || _isIE7 || _isIE8 || _isIE9) {
            div.className = 'linear-forie';
        }
        this.menu.appendChild(div);
        if (_config.disabeleGold == '1') {
            this.menu.style.overflow = 'hidden';
            this.menu.style.width = '0';
            this.menu.style.height = '0';
            this.menu.style.opacity = 0;
            this.menu.style.filter = "Alpha(opacity=0)";
        }
        if (_isIE6 || _isIE7 || _isIE8) {
            var _before = _div.cloneNode(1);
            _before.className = 'before';
            this.menu.appendChild(_before);
        }
        document.body.appendChild(this.menu);
        this.label = _label.cloneNode(1);
        this.label.setAttribute('id', 'gold-ui-label');
        var select = _select.cloneNode(1);
        select.setAttribute('id', 'gold-ui-select');
        select.ontouchstart = function () {
            _hasFocus = true;
        };
        $(select).bind('blur', function () {
            _hasFocus = false;
            me.closeMenu();
        });
        $(select).append('<option value="">' + Lang('quickGold')  + '</option>' );
        for (i = 0; i < _total; i++) {
            $(select).append('<option value="' + _gold[i] + '">' + _gold[i] + '</option>' );
        }
        select.onchange = me.onSelectChang;
        (_isAndroid) && (select.style.display = 'none');
        this.label.appendChild(select);
        if (_isAndroid) {
            var p = _p.cloneNode(1), close = _btn.cloneNode(1);
            close.value = Lang('close');
            close.onclick = function () {
                var _ui = self.GoldUI.instance();
                $(_ui.menu).addClass('goldBack');
            }
            p.appendChild(close);
            this.menu.insertBefore(p, div);
            
            var btn = _btn.cloneNode(1);
            btn.value = Lang('quickGold');
            $(this.menu).bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function () {
                var menu = $(this);
                if (menu.hasClass('goldGo')) {
                    menu.removeClass('goldGo');
                }
                if (menu.hasClass('goldBack')) {
                    menu.removeClass('goldBack');
                    var _ui = self.GoldUI.instance();
                    _ui.menu.style.display = 'none';
                    if (_config.mobile) {
                        _hasFocus = false;
                        _ui.label.x = 0;
                        _ui.label.style.display = 'none';
                    }
                }
            });
            btn.ontouchstart = function () {
                _hasFocus = true;
                this.focus();
                me.menu.style.display = 'block';
                $(me.menu).addClass('goldGo');
            }
            this.label.appendChild(btn);
        }
        if (_config.disabeleGold == '1') {
            this.label.style.overflow = 'hidden';
            this.label.style.width = '0';
            this.label.style.height = '0';
            this.label.style.opacity = 0;
            this.label.style.filter = "Alpha(opacity=0)";
        }
        document.body.appendChild(this.label);

    };
    namespace.GoldUI.prototype = {
        //拖拉的節點
        carNode : null,
        //選擇的Concede
        carConcede : '',
        //選擇的金額
        carGold : 0,
        //滑鼠與拖拉節點的相對位置
        pos : {x:0, y:0},
        //籌碼的位置
        bargainPos : {top:0,right:0,bottom:0,left:0},
        //背景位置
        bgPos : [],
        //移動間隔
        bgGap : [],
        /**
         * 籌碼背景的跑馬燈效果
         */
        bgMove : function () {
            for (var i = 0, _total = this.bargain.length; i < _total; i++) {
                (this.bgPos[i] > this.bargain[i].offsetHeight) && (this.bgPos[i] = 0);
                this.bargain[i].style.backgroundPosition = '0px ' + this.bgPos[i] + 'px';
                this.bgPos[i] += this.bgGap[i];
            }
        },
        /**
         * 點選快選金額的callback
         * @param gold 金額
         * @param inp input
         */
        menuCallback : function (gold, inp) {
        },
        /**
         * 點擊快選金額事件
         */
        onMenuClick : function () {
            var _ui = self.GoldUI.instance();
            (!_config.mobile) && (_ui.menu.style.display = 'none');
            if (_config.mobile) {
                _hasFocus = false;
                $(_ui.menu).addClass('goldBack');
            }
            if (_focus) {
                (!_focus.disabled) && (_focus.value = this.x);
                (_focus.onchange) && _focus.onchange();
                (_focus.onkeyup) && _focus.onkeyup();
                _ui.menuCallback(this.x, _focus);
                _focus = null;
            }
        },
        /**
         * 選取快選金額事件
         */
        onSelectChang : function () {
            var _ui = self.GoldUI.instance();
            _ui.label.style.display = 'none';
            if (_focus) {
                (!_focus.disabled) && (_focus.value = this.value);
                (_focus.onchange) && _focus.onchange();
                (_focus.onkeyup) && _focus.onkeyup();
                _ui.menuCallback(this.value, _focus);
                _focus = null;
            }
        },
        /**
         * 快選金額onmouseover事件
         */
        onMenuOver : function () {
            _hasFocus = true;
            this.style.backgroundColor = '#bbdded';
        },
        /**
         * 快選金額onmouseout事件
         */
        onMenuOut : function () {
            _hasFocus = false;
            this.style.backgroundColor = '';
        },
        /**
         * 停用快選金額事件
         */
        onStopClick : function () {
            var me = this, _arr = [];
            for (var i = 0, _total = _gold.length; i < _total; i++) {
                _arr.push('aGold[]=' + _gold[i]);
            }
            setCookie("disableGoldSelect","1",365);
            me.closeMenu();
            new_alert("快选金额已停用。");
//            $.get('/member/account/Gold_act.php?EnableGold=1&BeWarn=1&' + _arr.join('&'), function (txt) {
//                new_alert(txt);
//                var _divS = me.menu.style;
//                _divS.overflow = 'hidden';
//                _divS.width = '0';
//                _divS.height = '0';
//                _divS.opacity = 0;
//                _divS.filter = "Alpha(opacity=0)";
//            });
        },
        /**
         * 金額欄位Focu事件
         * @param _input 金額欄位的input node
         */
        onGoldFocus : function (_input) {
            if(getCookie("disableGoldSelect")=="1"){
                return;
            }
            _input.style.border = '1px solid red';
            _input.setAttribute('autocomplete', 'off');
            if (_input.value != '') {
                setTimeout(function () {_input.select();},50);
            }
            if (_config.mobile) {
                $(this.label).find('select').each(function () {
                    this.options[0].selected = true;
                });
                this.label.style.display = 'block';
                _focus = _input;
                var _pos = _getOffsetPos(_input);
                var _top = Math.round(_pos.y - (this.label.offsetHeight));
                var _left = _pos.x;
                this.label.style.top = _top + 'px';
                this.label.style.left = _left + 'px';
                this.label.x = 1;
            } else {
                this.menu.style.display = 'block';
                _focus = _input;
                var _pos = _getOffsetPos(_input);
                //menu 位置
                if (_config.menuDir == 'top') {
                    var _top = Math.round(_pos.y - (this.menu.offsetHeight + 15));
                    this.menu.className = 'top-tri';
                    var _left = _pos.x - 20;
                    if (_top - (document.documentElement.scrollTop + document.body.scrollTop) < 0) {
                        _top = Math.round(_pos.y + _input.offsetHeight + 15);
                        this.menu.className = 'bottom-tri';
                    } 
                } else {
                    var _top = (_pos.y - 65), _left;
                    //iscroll
                    if (hasParentId(this, 'Main')){
                        if (window.scrollMain) {
                            _top += window.scrollMain.y
                        }
                    }
                    if (hasParentId(this, 'LeftMain')){
                        if (window.scrollLeft) {
                            _top += window.scrollLeft.y
                        }
                    }
                    var bodyWidth = document.body.offsetWidth;
                    if ((bodyWidth - _pos.x) > (bodyWidth / 2)) {
                        this.menu.className = 'left-tri';
                        _left = (_pos.x + _input.offsetWidth + 15);
                    } else {
                        this.menu.className = 'right-tri';
                        _left = (_pos.x - this.menu.offsetWidth - 15);
                    }
                }
                this.menu.style.top = _top + 'px';
                this.menu.style.left = _left + 'px';
                this.menu.x = 1;
            }
        },
        /**
         * keydown事件
         */
        onGoldKeyDown : function () {
            this.closeMenu();
        },
        /**
         * blur 事件
         * @param _input 金額欄位的input node
         */
        onGoldBlur : function (_input) {
            _input.style.border = '1px solid black';
            if ((this.label.x == 1 || this.menu.x == 1) && _hasFocus) {
            } else {
                this.closeMenu();
            } 
        },
        /**
         * 關閉快選menu
         */
        closeMenu : function () {
            this.menu.x = 0;
            this.menu.style.display = 'none';
            if (_config.mobile) {
                this.label.x = 0;
                this.label.style.display = 'none';
            }
        },
        /**
         * 拖拉開始的事件
         * @param _node html node
         * @param e event
         * @param _concede Concede
         */
        onDragStart : function (_node, e, _concede) {
            var me = this;
            if (_node.x != 1) {
                _node.x = 1;
                this.carConcede = _concede;
                this.mask.style.top = (document.documentElement.scrollTop + document.body.scrollTop) + 'px';
                this.mask.style.display = 'block';
                var _pos;
                for (var i = 0, _total = this.bargain.length; i < _total; i++) {
                    _pos = _getOffsetPos(this.bargain[i]);
                    this.bargainPos[i] = {
                        top : _pos.y, 
                        right : (_pos.x + this.bargain[i].offsetWidth),
                        bottom : (_pos.y + this.bargain[i].offsetHeight),
                        left : (_pos.x)
                    }
                    this.bgGap[i] = 0;
                    this.bgPos[i] = 0;
                }
                var _move = function () {me.bgMove();};
                var _parent = _node.parentNode;
                _timer = setInterval(_move, 20);
                this.dragBox.style.width = _parent.offsetWidth + 'px';
                this.dragBox.style.display = 'block';
                this.dragBox.className = _parent.className;
                _parent.className = '';
                var _content = _node.getAttribute('data-dragContent') || _node.innerHTML;
                this.boxSpan.innerHTML = _content;
                var _nodePos = _getOffsetPos(_parent);
                var _mousePos = _getMousePos(e);
                this.pos = {
                    x : Math.round(_mousePos.x - _nodePos.x),
                    y : Math.round(_mousePos.y - _nodePos.y)
                };
                this.carNode = _node;
                _node.style.display = 'none';
                this.dragBox.style.left = _nodePos.x + 'px';
                this.dragBox.style.top = _nodePos.y + 'px';
                _onDrag = true;
            }
        }, 
        /**
         * 拖拉移動的事件
         * @param e event
         */
        onDrag : function (e) {
            if (_onDrag) {
                (e.preventDefault) && (e.preventDefault());
                var _mousePos = _getMousePos(e);
                var _x = (_mousePos.x - this.pos.x), _y = (_mousePos.y - this.pos.y);
                this.dragBox.style.left = _x + 'px';
                this.dragBox.style.top = _y + 'px';
                for (var i = 0, _total = this.bargain.length; i < _total; i++) {
                    if (_x > this.bargainPos[i].left && _x < this.bargainPos[i].right && _y > this.bargainPos[i].top && _y < this.bargainPos[i].bottom) {
                        this.bgGap[i] = 5;
                        this.bargain[i].style.fontSize = '20px';
                        this.carGold = _gold[i];
                    } else {
                        this.bgPos[i] = 0;
                        this.bgGap[i] = 0;
                        this.bargain[i].style.fontSize = '18px';
                    }
                }
            }
        }, 
        /**
         * 拖拉結束的事件
         * @param e event
         */
        onDragEnd : function (e) {
            var me = this;
            if (_onDrag) {
                _timer = clearInterval(_timer);
                var _nodePos = _getOffsetPos(this.dragBox);
                for (var i = 0, _total = this.bargain.length; i < _total; i++) {
                    this.bargain[i].style.backgroundPosition = '';
                    this.bargain[i].style.fontSize = '';
                    if (_nodePos.x > this.bargainPos[i].left && _nodePos.x < this.bargainPos[i].right && _nodePos.y > this.bargainPos[i].top && _nodePos.y < this.bargainPos[i].bottom) {
                        me.callBack(_gold[i], me.carNode);
                    }
                }
                this.mask.style.display = 'none';
                this.carNode.parentNode.className = this.dragBox.className;
                this.carNode.style.display = '';
                this.carNode.x = 0;
                this.dragBox.style.display = 'none';
                _onDrag = false;
            }
        }, 
        /**
         * callback
         * @param _gold 選擇的籌碼金額 
         * @param _node 拖拉的下注節點
         */
        callBack : function (_gold, _node) {
        },
        /**
         * 設定option
         * @param _json json 陣列
         */
        setOptions : function (_json) {
            for (var k in _json) {
                if (_config[k] != null) {
                    _config[k] = _json[k];
                }
            }
            if (_config.disabeleGold == '1') {
                this.menu.style.overflow = 'hidden';
                this.menu.style.width = '0';
                this.menu.style.height = '0';
                this.menu.style.opacity = 0;
                this.menu.style.filter = "Alpha(opacity=0)";
                if (this.label) {
                    this.label.style.overflow = 'hidden';
                    this.label.style.width = '0';
                    this.label.style.height = '0';
                    this.label.style.opacity = 0;
                }
            } else {
                this.menu.style.overflow = '';
                this.menu.style.width = '';
                this.menu.style.height = '';
                this.menu.style.opacity = '';
                this.menu.style.filter = "";
                if (this.label) {
                    this.label.style.overflow = '';
                    this.label.style.width = '';
                    this.label.style.height = '';
                    this.label.style.opacity = '';
                }
            }
        },
        /**
         * 重設quickGold
         * @param _json json 陣列
         */
        resetGold : function (_newGold) {
            if (typeof _newGold == 'string') {
            } else {
                _gold = _newGold;
            }
            gold_1 = getCookie("gold_1");
            gold_2 = getCookie("gold_2");
            gold_3 = getCookie("gold_3");
            gold_4 = getCookie("gold_4");
            _gold = [gold_1||10, gold_2||20, gold_3||50, gold_4||100];
            var me = this,_total = _gold.length, _height = 100;
            (_total == 5) && (_height = 80);
            (_total == 6) && (_height = 65);
            (_total == 7) && (_height = 55);
            (_total == 8) && (_height = 50);
            (_total >= 9) && (_height = 45);
            this.bargain == [];
            this.chipBox.innerHTML = '';
            for (var i = 0; i < _total; i++) {
                this.bargain[i] = _div.cloneNode(1);
                this.bargain[i].setAttribute('id', 'gold-ui-bargainchip-' + (i+1));
                this.bargain[i].style.height = _height + 'px';
                this.bargain[i].style.lineHeight = _height + 'px';
                this.bargain[i].innerHTML = __("_bet") + _gold[i] + __("_dollar") + "&nbsp;&nbsp;&nbsp;";
                this.chipBox.appendChild(this.bargain[i]);
            }
            this.menu.innerHTML = '';
            var div = _div.cloneNode(1);
            var _click = me.onMenuClick;
            var _over = me.onMenuOver;
            var _out = me.onMenuOut;
            var a;
            for (i = 0; i < _total; i++) {
                a = _a.cloneNode(1);
                a.innerHTML = __("_bet") + _gold[i] + __("_dollar");
                a.x = _gold[i];
                a.onclick = _click;
                a.onmouseover = _over;
                a.onmouseout = _out;
                //this.menu.appendChild(a);
                div.appendChild(a);
            }
            if (!_isAndroid) {
                //停用快選金額選單
                a = _a.cloneNode(1);
                a.innerHTML = "<img src='/images/warn.gif' alt='%" + __('expired') + "%' style='border:0;vertical-align:middle;' />&nbsp;<b style='background-color:red;color:#fff'>" + __('expired') + "</b>";
                a.style.fontWeight = 'bold';
                a.onclick = function () { me.onStopClick(); };
                a.onmouseover = _over;
                a.onmouseout = _out;
                //this.menu.appendChild(a);
                div.appendChild(a);
            }
            if (_isIE6 || _isIE7 || _isIE8 || _isIE9) {
                div.className = 'linear-forie';
            }
            this.menu.appendChild(div);
            if (_isIE6 || _isIE7) {
                var _before = _div.cloneNode(1);
                _before.className = 'before';
                this.menu.appendChild(_before);
            }
            this.label.innerHTML = '';
            var select = _select.cloneNode(1);
            select.setAttribute('id', 'gold-ui-select');
            select.ontouchstart = function () {
                _hasFocus = true;
            };
            $(select).bind('blur', function () {
                _hasFocus = false;
                me.closeMenu();
            });
            $(select).append('<option value="">' + Lang('quickGold') + '</option>' );
            for (i = 0; i < _total; i++) {
                $(select).append('<option value="' + _gold[i] + '">' + _gold[i] + '</option>' );
            }
            select.onchange = me.onSelectChang;
            (_isAndroid) && (select.style.display = 'none');
            this.label.appendChild(select);
            if (_isAndroid) {
                var p = _p.cloneNode(1), close = _btn.cloneNode(1);
                close.value = Lang('close');
                close.onclick = function () {
                    var _ui = self.GoldUI.instance();
                    $(_ui.menu).addClass('goldBack');
                }
                p.appendChild(close);
                this.menu.insertBefore(p, div);
                
                var btn = _btn.cloneNode(1);
                btn.value = Lang('quickGold');
                btn.ontouchstart = function () {
                    _hasFocus = true;
                    this.focus();
                    me.menu.style.display = 'block';
                    $(me.menu).addClass('goldGo');
                }
                this.label.appendChild(btn);
            }
            
        }
    };
    namespace.GoldUI.instance = function () {
        if (!this._instance && document.body) {
            this._instance = new this();
        }
        return this._instance;
    };
    namespace.GoldUI.installDrag = function (_dragClass, _callBack) {
        var _goldUI = namespace.GoldUI.instance();
        _goldUI.callBack = _callBack;
        if (_isTouchDevice()) {
            document.addEventListener('touchstart', function (event) {
                var _div = event.target;
                if ($(_div).hasClass(_dragClass)) {
                    (event.preventDefault) && (event.preventDefault());
                    (_goldUI.onDragStart) && _goldUI.onDragStart(_div, event.touches[0], _div.getAttribute('data-concede'));
                }
            }, false); 
            document.addEventListener('touchmove', function (event) {
                (_goldUI.onDrag) && _goldUI.onDrag(event.touches[0]);
            }, false);
            document.addEventListener('touchend', function (event) {
                (_goldUI.onDragEnd) && _goldUI.onDragEnd(event);
            }, false);
        } 
        $(document).bind('mousedown', function (e) {
            e = e || window.event;
            var _div;
            if (e.srcElement) {
                _div = e.srcElement;
            } else {
                _div = e.target;
            }
            if ($(_div).hasClass(_dragClass) && (e.button == 0 || e.button == 1)) {
                (_goldUI.onDragStart) && _goldUI.onDragStart(_div, e, _div.getAttribute('data-concede'));
            }
        });
        $(document).bind('mousemove', function (e) {
            e = e || window.event;
            (_goldUI.onDrag) && _goldUI.onDrag(e);
        });
        $(document).bind('mouseup', function (e) {
            e = e || window.event;
            if (e.button == 0 || e.button == 1) {
                (_goldUI.onDragEnd) && _goldUI.onDragEnd(e);
            }
        });
    };
    namespace.GoldUI.installInput = function (_selector, _callback) {
        if (_selector instanceof jQuery) {
            var _goldUI = namespace.GoldUI.instance();
            if (_callback != null) {
                _goldUI.menuCallback = _callback;
            }
            _selector.each(function () {
                if (this.tagName.toUpperCase() == 'INPUT' && (this.type.toUpperCase() == 'NUMBER' || this.type.toUpperCase() == 'TEXT')) {
                    var _input = $(this);
                    this.style.border = '1px solid #000';
                    _input.bind('focus', function () {
                        (_goldUI.onGoldFocus) && _goldUI.onGoldFocus(_input[0]);
                    });
                    _input.bind('keydown', function () {
                        (_goldUI.onGoldKeyDown) && _goldUI.onGoldKeyDown();
                    });
                    _input.bind('blur', function () {
                        (_goldUI.onGoldBlur) && _goldUI.onGoldBlur(_input[0]);
                    });
                }
            });
        }
    };
    namespace.GoldUI.closeGoldMenu = function () {
        var _goldUI = namespace.GoldUI.instance();
        _hasFocus = false;
        _goldUI.closeMenu();
    };
    namespace.GoldUI.setConfig = function (_json) {
        if (typeof _json == 'string') {
        } else {
            for (var k in _json) {
                if (typeof _config[k] != 'undefined') {
                    _config[k] = _json[k];
                }
            }
        }
    };
    namespace.GoldUI.setGold = function (_quickGold) {
        if (typeof _quickGold == 'string') {
        } else {
            _gold = _quickGold;
        }
    };
    namespace.GoldUI.cookie = function (_cookieName) {
        return _getCookie(_cookieName);
    };
})(self);
