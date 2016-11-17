(function (namespace) {
    var _on = false;
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
    namespace.pitayaMenu = function () {
    };
    namespace.pitayaMenu.install = function () {
        if (_menu == null) {
            _menu = new namespace.pitayaMenu();
        }
        if( arguments.length == 0) {
            return false;
        } else {
            _menu.init(arguments[0]);
        }
    }
    namespace.pitayaMenu.prototype = {
       classNav : null,
       gameNav : null,
       menuNav : null,
       init : function (opt) {
           var me = this;
           if (opt[0] instanceof jQuery) {
               this.classNav = opt[0];
           } else {
               this.classNav = $('#ui-btn-games > ul > li > a');
           }
           if (opt[1] instanceof jQuery) {
               this.gameNav = opt[1];
           } else {
               this.gameNav = $('#ui-btn-games > nav');
           }
           if (opt[2] instanceof jQuery) {
               this.menuNav = opt[2];
           } else {
               this.menuNav = $('#Pad > div > nav');
           }
           var isIE = ($.browser.msie && parseInt($.browser.version) < 8), _b = document.createElement('b'), _i = document.createElement('i');
           this.gameNav.each(function () {
               var _nav = this.cloneNode(1);
               _nav.id = this.id + '-second';
               _nav.className = 'second-nav';
               (isIE) && (_nav.innerHTML = '<div class="linear-forie">' + _nav.innerHTML + '</div>');
               (isIE) && (_nav.appendChild(_b.cloneNode(1)));
               (isIE) && (_nav.appendChild(_i.cloneNode(1)));
               document.body.appendChild(_nav);
           });
           this.gameNav = $('.second-nav');
           this.classNav.hover(function (){
                (me.onOver) && me.onOver.call(this, me);  
           }, function () {
                (me.onOut) && me.onOut.call(this, me);  
           });
           this.gameNav.find('a').bind('click', function() {
               me.gameNav.hide();
               me.menuNav.hide();
           });
           this.menuNav.find('a').bind('click', function() {
               me.gameNav.hide();
               me.menuNav.hide();
           });
           this.gameNav.hover(function () {
                _on = true;
           }, function () {
                (me.onOut) && me.onOut.call(this, me);  
           });
           var _over = function () {
                (me.onGOver) && me.onGOver.call(this, me);  
           }
           $('a', this.gameNav).each(function () {
                this.onmouseover = _over;    
           });
           this.menuNav.each(function () {
               var _nav = this.cloneNode(1);
               _nav.id = this.parentNode.getAttribute('id') + '_menu';
               _nav.className = 'rde-menu';
               _nav.style.display = 'none';
               (isIE) && (_nav.innerHTML = '<div class="linear-forie">' + _nav.innerHTML + '</div>');
               (isIE) && (_nav.appendChild(_b.cloneNode(1)));
               (isIE) && (_nav.appendChild(_i.cloneNode(1)));
               document.body.appendChild(_nav);
           });
           this.menuNav = $('nav.rde-menu');
           this.menuNav.hover(function () {
                _on = true;
           }, function () {
                (me.onOut) && me.onOut.call(this, me);  
           });
       }, 
       onOver : function (me) {
           var _id = this.href.match(/#([A-Z0-9]+)$/), p = getP(this);
           me.gameNav.hide();
           me.menuNav.hide();
           var _nav = null;
           (_id != null) && (_nav = document.getElementById(_id[1] + '-second'));
           if (_nav) {
               _nav.style.display = 'block';
               _nav.style.top = (p.y + this.offsetHeight + 10) + 'px'
               _nav.style.left = (p.x  - 50 ) + 'px'
           }
           _on = true;
       }, 
       onOut : function (me) {
           _on = false;
           setTimeout(function () {
               (me.onChk) && me.onChk(me);
           }, 100);
       },
       onChk : function (me) {
           if (!_on) {
               me.gameNav.hide();
               me.menuNav.hide();
           }
       }, 
       onGOver : function (me) {
           var _gtype = this.getAttribute('data-gtype');
           if (_gtype) {
               var _menu = document.getElementById(_gtype + '_menu').style, p = getP(this);
               me.menuNav.hide();
               _menu.display = 'block';
               _menu.top = (p.y - 64) + 'px';
               _menu.left = (p.x + 150) + 'px';
               _on = true;
           }
       }
    };
})(self);
