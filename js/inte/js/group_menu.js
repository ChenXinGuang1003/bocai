(function (namespace) {
    var _menu = null;
    function getP (o) {
        var _top = 0, _left = 0;
        while (o.offsetParent) {
           _top += o.offsetTop;
           _left += o.offsetLeft;
           o = o.offsetParent;
        }
        _top += o.offsetTop;
        _left += o.offsetLeft;
        return {y:_top,x:_left};
    }
    namespace.group_menu = function () {
    }
    namespace.group_menu.install = function () {
        _menu = namespace.group_menu.instance();
        _menu.init(arguments[0]);
    }
    namespace.group_menu.prototype = {
        menu : null,
        wrap : null,     
        menuWidth : 0,
        childWidth : 0,
        init : function (_selector) {
            var me = this;
            if (_selector instanceof jQuery) {
                this.menu = _selector;
            }
            var _w = 0;
            this.menu.find('a').each(function () {
                _w += this.offsetWidth;
                _w += 4; //inline-block 4px space 
            });
            this.childWidth = _w;
            this.menuWidth = this.menu.get(0).offsetWidth;
            this.menu.html('<div>' + this.menu.html() + '</div>');
            if ($.browser.msie && parseInt($.browser.version, 10) < 9) {
                this.menu.append('<b class="before">&lt;&lt;</b><b class="after">&gt;&gt;</b>')
            }
            this.wrap = this.menu[0].firstChild;
            this.menu.removeClass('scrollL scrollR');
            this.menu.mousedown(function (e) {
                (me.onClk) && (me.onClk(e, me));
            });
            this.menu.bind('resize', function () {
                (me.onResize) && (me.onResize());
            });
            $(self).bind('resize', function () {
                (me.onResize) && (me.onResize());
            });
            if (this.childWidth > this.menuWidth - 15) {
                this.menu.addClass('scrollR');
            }
        }, 
        onClk : function (e, me) {
            e = e || window.event;
            var p = getP(me.menu[0]), w = this.menuWidth, c = this.childWidth; 
            if (e.clientX > (p.x + w - 60) && e.clientX < (p.x + w) && me.menu.hasClass('scrollR')) {
                //me.wrap.style.left = '-' + (me.childWidth - me.menuWidth + 100) + 'px';
                $(me.wrap).animate({left:'-' + (me.childWidth - me.menuWidth + 100) + 'px'});
                me.menu.removeClass('scrollR');
                me.menu.addClass('scrollL');
            }
            if (e.clientX > p.x && e.clientX < (p.x + 60) && me.menu.hasClass('scrollL')) {
                //me.wrap.style.left = '15px';
                $(me.wrap).animate({left: '15px'});
                me.menu.removeClass('scrollL');
                me.menu.addClass('scrollR');
            }
        },
        onResize : function () {
            this.menuWidth = this.menu.get(0).offsetWidth;
            this.menu.removeClass('scrollL scrollR');
            if (this.childWidth > this.menuWidth - 15) {
                if (this.wrap.style.left == '15px' || this.wrap.style.left == '' ) {
                    this.menu.addClass('scrollR');
                } else {
                    this.menu.addClass('scrollL');
                }
            }
            
        }
    }
    namespace.group_menu.instance = function () {
        if (!this._instance) {
            this._instance = new this;
        }
        return this._instance;
    }
})(self);

