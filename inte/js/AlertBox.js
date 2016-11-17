(function(namespace){
    function Lang(v) {
        return namespace.Lang ? namespace.Lang(v) : v;
    }
	var _drag = false;
	var _reg_show = /(\s|^)zoom_show(\s|$)/;
	var _reg_hide = /(\s|^)zoom_hide(\s|$)/;
	function is_animation_support(){
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
	function get_offset_pos (_node) {
		var _x = 0, _y = 0;
		_x += _node.offsetLeft;
		_y += _node.offsetTop;
		return {x:_x,y:_y};
	}
	function get_mouse_pos (e) {
		_return = {
		   x: e.clientX,
		   y: e.clientY
		};
		return _return;
	}
    function insert_wbr() {
        return arguments[1]+'<wbr>';
    }
	namespace.AlertBox = function()
	{
		var me = this, _div = document.createElement('div');
		this.html = document.getElementsByTagName('html')[0];
		this.mask = _div.cloneNode(1);
		this.mask.className = 'alert_mask';
		this.mask.style.cssText = 'position:absolute; top:0; left:0; width:100%; z-index:10102;';
		this.box_outer = _div.cloneNode(1);
        this.box_outer.className = 'alert_box_outer';
		this.box_outer.style.cssText = 'position:absolute;z-index:10103;top:0;left:0;width:100%;text-align:center;';
		this.box = _div.cloneNode(1);
		this.box.className = 'alert_box';
		this.box.style.cssText = '\
			display:inline-block!important;\
			min-width:40%!important;\
			*width:65%;';
		this.title = _div.cloneNode(1);
		this.title.className = 'title';
		this.title.innerHTML = Lang('prompt');
		//this.title.style.cursor = 'move';
		this.icon_close = _div.cloneNode(1);
		this.icon_close.className = 'close';
		this.title.appendChild(this.icon_close);
		this.inner = _div.cloneNode(1);
		this.inner.className = 'alert_inner';
		this.inner.style.cssText = 'overflow-x:inherit;overflow-y:auto;';
		this.btn_close = document.createElement('input');
		this.btn_close.type = 'button';
		this.btn_close.value = Lang('close');
		
		this.box.appendChild(this.title);
		this.box.appendChild(this.inner);
		this.box.appendChild(this.btn_close);
		this.box_outer.appendChild(this.box);
                if (is_animation_support()) {
                    this.btn_close.onclick = function(){me.box.className = me.box.className + ' zoom_hide';}
                    this.icon_close.onclick = function(){me.box.className = me.box.className + ' zoom_hide';}
                    var _animationEnd = (navigator.vendor && "webkitAnimationEnd") || ( window.opera && "oAnimationEnd") || "animationend"; 
                    this.box.addEventListener(_animationEnd, function () {
                        if (_reg_hide.test(this.className)) {
                            me.hide();
                        }
                        this.className = this.className.replace(_reg_show, ' ');
                        this.className = this.className.replace(_reg_hide, ' ');
                    }, false);
                } else {
                    this.btn_close.onclick = function(){me.hide();}
                    this.icon_close.onclick = function(){me.hide();}
                }
		document.body.appendChild(this.mask);
		document.body.appendChild(this.box_outer);
	}
	namespace.AlertBox.prototype = {
		timer : null,
		isShow : false,
		program : [],
		pos: {x:0, y:0},
        render: function ()
        {
            //標準瀏覽器使用 window.innerHeight, IE 使用document.documentElement.offsetHeight
            var height = (self.innerHeight)?self.innerHeight : self.document.documentElement.offsetHeight;
            this.box_outer.style.height = this.mask.style.height = height + 'px';
            if ((0.6*height) < this.inner.offsetHeight)
            {
                this.inner.style.height = (0.6*height)+'px';
            }
            var scrollTop = (self.document.documentElement && self.document.documentElement.scrollTop>self.document.body.scrollTop)?self.document.documentElement.scrollTop:self.document.body.scrollTop;
            this.mask.style.top = scrollTop+'px';
            this.box_outer.style.top = scrollTop+'px';
//            this.box.style.marginTop = Math.ceil((height - this.box.offsetHeight) / 2) + 'px';
        },
		hide : function()
		{
			this.mask.style.display = 'none';
			this.box_outer.style.display = 'none';
			this.html.style.overflow = '';
			this.timer = clearInterval(this.timer);
			this.inner.innerHTML = '';
			this.inner.style.height = '';
			this.inner.style.width = 'auto';
			this.isShow = false;
			if (this.program.length)
			{
				this.show(this.program.shift());
			}
			_box = this.box.style;
			_box.top = '';
			_box.left = '';
			_box.position = '';
			_box.margin = '';
		},
		show : function(str)
		{
            str = str.toString();
			var me = this;
			if (this.isShow)
			{
				this.program.push(str);
				return;
			}
			str = str.replace(/\n/g, '<br />');
			this.html.style.overflow = 'hidden';
			this.mask.style.display = 'block';
			this.box_outer.style.display = 'block';
			this.inner.innerHTML = str;//.replace(/(.{40})/g, insert_wbr);//40個字元加一個軟斷行
			this.inner.style.width = (((me.box.offsetWidth>me.inner.scrollWidth)?me.box.offsetWidth:me.inner.scrollWidth)+10)*0.9 + 'px';//因為IE7...
			if (!this.timer)
			{
				this.timer = setInterval(function(){
					me.render();
				},20);
			}

			this.isShow = true;
			//this.title.onmousedown = function (e) {
			//	e = e || window.event;
			//	me.on_mouse_down(e);
			//}
			this.box_outer.onmousemove = function (e) {
				e = e || window.event;
				me.on_mouse_move(e);
			}
			this.box_outer.onmouseup = function (e) {
				me.on_mouse_up();
			}
                        if (!_reg_show.test(this.box.className)) {
                            this.box.className += " zoom_show"
			}
		},
		on_mouse_down : function (e) {
			if (e.button == 1 || e.button == 0) {
				var _boxPos = get_offset_pos(this.box), _mousePose = get_mouse_pos(e);
				var _top = _boxPos.y, _left = _boxPos.x, _box = this.box.style;
				this.pos = {x : Math.round(_mousePose.x - _boxPos.x), y : Math.round(_mousePose.y - _boxPos.y)};
				_box.top = _top + 'px';
				_box.left = _left + 'px';
				_box.position = 'absolute';
				_box.margin = '0';
				_drag = true;
			}
		},
		on_mouse_move : function (e) {
			if (_drag) {
				var _mousePose = get_mouse_pos(e);
				this.box.style.top = (_mousePose.y - this.pos.y) + 'px';
				this.box.style.left = (_mousePose.x - this.pos.x) + 'px';
			}
		},
		on_mouse_up : function () {
			if (_drag) {
				_drag = false;
			}
		}
	};
	namespace.AlertBox.instance = function()
	{
		if (!this._instance && document.body)
		{
			this._instance = new this;
		}
		return this._instance;
	}

	this.new_alert = function(str)
	{
		var o = AlertBox.instance();
		if (!o)
		{
			this.alert(str);
			return 
		}
		o.show(str);
        o.btn_close.focus();
	}
})(self);
