(function (space) {
    var base_dir = '';
    var _menu = [];
    var isIE = ((navigator.userAgent.indexOf("MSIE") != -1) && (navigator.userAgent.indexOf("Opera") == -1));
    var isIE6 = ((navigator.userAgent.indexOf("MSIE 6.") != -1) && (navigator.userAgent.indexOf("Opera") == -1));
    var _onDrag = false;
    var _timer = null;
    //設定
    var _config = {
        animation : false,
        drag : true,
        width : 0,
        height : 0
    };
    function isAnimationSupport(){
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
    function getOffset (_node) {
        var _x = 0, _y = 0;
        _x += _node.offsetLeft;
        _y += _node.offsetTop;
        return {x:_x,y:_y};
    }
    function getMousePos (e) {
        _return = {
           x: e.clientX,
           y: e.clientY
        };
        return _return;
    }

    space.ViewBox = function () {
        var me = this, _div = document.createElement('div');
        this.html = document.getElementsByTagName('html')[0];
        this.mask = _div.cloneNode(1);
        this.mask.className = 'view-mask';
        this.box = _div.cloneNode(1);
        this.box.setAttribute('id', 'CenterView');
        //this.box.unselectable = "on";
        //this.box.onselectstart = function(){
        //    return false;
        //};
        this.mask.appendChild(this.box);
        this.title = document.createElement('h1');
        this.icon_close = document.createElement('span');
        this.icon_close.setAttribute('id', 'ViewClose');
        this.icon_close.onclick = function () {me.onClose();}
        this.box.appendChild(this.title);
        this.box.appendChild(this.icon_close);
        this.inner_box = $('<div id="Content3D" />');
        $(this.box).append(this.inner_box);
        if (isIE6) {
            var _iframe = document.createElement("iframe");
            _iframe.setAttribute('id', 'viewIframe');
            _iframe.style.cssText = '\
                          position:absolute;\
                          top:0;\
                          left:0;\
                          width:100%;\
                          height:100%;\
                          filter:Alpha(opacity=0);\
                          zIndex:-1;';
            this.mask.appendChild(_iframe);
        }
        $(this.box).bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function () {
            me.onEnd();
        });
        (!isAnimationSupport()) && (this.animation = false);
        (!_config.animation) && (this.animation = false);
        (!_config.drag) && (this.enableDrag = false);
        (_config.width) && (this.box.style.width = _config.width);
        (_config.height) && (this.box.style.height = _config.height);
        if (this.enableDrag) {
             this.title.onmousedown = function (e) {
                 e = e || window.event;
                 me.onMouseDown(e);
             }
             this.title.style.cursor = 'move';
             this.mask.onmousemove = function (e) {
                 e = e || window.event;
                 me.onMouseMove(e);
             }
             this.mask.onmouseup = function () {
                 me.onMouseUp();
             }
        } else {
             var _fun = function () {};
             this.title.onmousedown = _fun;
             this.title.style.cursor = '';
             this.mask.onmousemove = _fun;
             this.mask.onmouseup = _fun;
        }
        document.body.appendChild(this.mask);
    }
    space.ViewBox.prototype = {
        animation : true,
        enableDrag : true,
        pos: {x:0, y:0},
        onShow: function (_href, _title) {
            var me = this;
            this.title.innerHTML = _title;
            var ary = _href.split('/');
            ary.pop();
            base_dir = ary.join('/');
            $.ajax({
                type:"GET",
                beforeSend: function (request) {
                    //設定檔頭，表示由View.js發出的HTTP REQESUT
                    request.setRequestHeader("Authority", "View.js");
                    me.box.style.display = 'none';
                    me.box.style.width = '';
                    me.box.style.height = '';
                    me.mask.style.display = 'block';
                },
                url: _href,
                error : function () {
                    me.mask.style.display = 'none';
                },
                success: function(txt) {
                    me.inner_box.empty().html(txt);
                    me.box.style.display = 'block';
                    if (isIE) {
                        document.getElementById('Content3D').style.height = (me.box.offsetHeight - 32) + 'px';
                    }
                    (me.animation) && (me.box.className = 'ShowD');
                    me.callBack();
                }
            });
            //this.inner_box.load(_href, function () {
            //    me.box.style.display = 'block';
            //    me.mask.style.display = 'block';
            //    if (isIE) {
            //        document.getElementById('Content3D').style.height = (me.box.offsetHeight - 32) + 'px';
            //    }
            //    (me.animation) && (me.box.className = 'ShowD');
            //    me.callBack();
            //});
            if (!_timer) {
                _timer = setInterval(function () {me.mask.style.top = (document.documentElement.scrollTop + document.body.scrollTop) + 'px';}, 20);
            }
            this.html.style.overflow = 'hidden';
        },
        onClose: function () {
            this.box.className = 'HiddenD';
            this.inner_box.html('');
            this.html.style.overflow = '';
            if (!this.animation) {
                this.onEnd();
            }
            _timer = clearInterval(_timer);
        },
        onEnd : function () {
            if (this.box.className == 'HiddenD') {
                this.mask.style.display = 'none';
                this.box.style.display = 'none';
            }
            if (this.enableDrag) {
                this.box.style.position = '';
                this.box.style.top = '';
                this.box.style.left = '';
                this.box.style.margin = '';
            }
            this.box.className = '';
            //this.box.style.width = '';
            //this.box.style.height = '';
        },
        callBack : function () {
        },
        getBaseDir : function () {
            return base_dir;
        },
        onMouseDown : function (e) {
            e = e || window.event;
            if (e.button == 1 || e.button == 0) {
                this.mask.unselectable = "on";
                this.mask.onselectstart = function(){
                    return false;
                };
                var _boxPos = getOffset(this.box), _mousePos = getMousePos(e);
                var _top = _boxPos.y, _left = _boxPos.x, _box = this.box.style;
                _box.top = _top + 'px';
                _box.left = _left + 'px';
                _box.position = 'absolute';
                _box.margin = '0';
                this.pos = {x : Math.round(_mousePos.x - _boxPos.x), y : Math.round(_mousePos.y - _boxPos.y)};
                _onDrag = true;
            }
        },
        onMouseMove : function (e) {
            if (_onDrag) {
                var _mousePos = getMousePos(e);
                this.box.style.top = (_mousePos.y - this.pos.y) + 'px';
                this.box.style.left = (_mousePos.x - this.pos.x) + 'px';
            }
        },
        onMouseUp : function () {
            if (_onDrag) {
                _onDrag = false;
                this.mask.unselectable = "off";
                this.mask.onselectstart = function(){};
            }
        },
        setOptions : function (_json) {
            for ( var k in _config) {
                if (typeof _json[k] != 'undefined') {
                    _config[k] = _json[k];
                }
            }
            var me = this;
            this.animation = _config.animation;
            (!_config.drag) && (this.enableDrag = false);
            (_config.width) && (this.box.style.width = _config.width);
            (_config.height) && (this.box.style.height = _config.height);
            if (this.enableDrag) {
                this.title.onmousedown = function (e) {
                    e = e || window.event;
                    me.onMouseDown(e);
                }
                this.title.style.cursor = 'move';
                this.mask.onmousemove = function (e) {
                    e = e || window.event;
                    me.onMouseMove(e);
                }
                this.mask.onmouseup = function () {
                    me.onMouseUp();
                }
            } else {
                var _fun = function () {};
                this.title.onmousedown = _fun;
                this.title.style.cursor = '';
                this.mask.onmousemove = _fun;
                this.mask.onmouseup = _fun;
            }
        }
    }
    space.ViewBox.instance = function () {
        if (!this._instance && document.body) {
            this._instance = new this;    
        }
        return this._instance;
    }
    space.ViewBox.single = function (_node) {
        var o = space.ViewBox.instance(), 
            _href = (_node.getAttribute('data-url')) ? _node.getAttribute('data-url') : _node.href, 
            _title = _node.title, 
            _callback = _node.getAttribute('data-callback');
        if (_callback != null) {
            o.callBack = eval(_callback);
        }
        o.onShow(_href, _title);
    }
    space.ViewBox.install = function (_selector) {
        if (_selector instanceof jQuery) {
            var o = space.ViewBox.instance();
            _selector.click(function () {
                if (this.target != '_blank') {
                    var _callback = this.getAttribute('data-callback');
                    if (_callback) {
                        o.callBack = eval(_callback);
                    } else {
                        o.callBack = function () {};
                    }
                    var _href = (this.getAttribute('data-url')) ? this.getAttribute('data-url') : this.href;
                    (o.onShow) && (o.onShow(_href, this.title));
                    return false;
                }
            });
        }
    }
})(self); 
