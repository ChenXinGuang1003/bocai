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
    var _config = {
        dir : 'right',
        idname : 'slideMenu'
    };
    namespace.slideMenu = function () {
        var me = this, _div = document.createElement('div'), _b = document.createElement('b');
        this.clone_box = _div.cloneNode(1);
        this.clone_box.className = 'slideMenu-box';
        var _aside = _div.cloneNode(1);;
        _aside.className = 'slideMenu-aside in-center in-middle';
        this.clone_box.appendChild(_aside);
        var _article = _div.cloneNode(1);
        _article.className = 'slideMenu-article';
        (_config.dir == 'right') && ($(_article).addClass('in-right in-middle'));
        (_config.dir == 'bottom') && ($(_article).addClass('in-center in-bottom'));
        this.clone_box.appendChild(_article);
        var _title = _div.cloneNode(1);
        _title.className = 'slideMenu-title';
        _article.appendChild(_title);
        var _back = document.createElement('a');
        _back.className = 'slideMenu-back';
        _back.innerHTML = Lang('Back');
        if (_isIE6 || _isIE7 || _isIE8) {
            var b = _b.cloneNode(1);
            b.className = 'before';
            _back.appendChild(b);
            b = _b.cloneNode(1);
            b.className = 'after';
            _back.appendChild(b);
        }
        _article.appendChild(_back);
        _ajax = _div.cloneNode(1);
        _ajax.className = 'slideMenu-ajax';
        _article.appendChild(_ajax);
        //第二層
        var _subArticle = _article.cloneNode(1);
        this.clone_box.appendChild(_subArticle);
    };
    namespace.slideMenu.prototype = {
        box : {},
        aside : {},
        article : {},
        title : {},
        back : {},
        ajax : {},
        subarticle : {},
        subtitle : {},
        subback : {},
        subajax : {},
        setOptions : function (_json) {
            for (var k in _json) {
                if (_config[k] != null) {
                    _config[k] = _json[k];
                }
            }
            if (_config.dir == 'right') { 
                $('div.slideMenu-article', this.clone_box).removeClass('in-center in-bottom in-right in-middle').addClass('in-right in-middle');
            }
            if (_config.dir == 'bottom') { 
                $('div.slideMenu-article', this.clone_box).removeClass('in-right in-middle in-center in-bottom').addClass('in-center in-bottom');
            }
        },
        cloneBox : function (_id) {
            var me = this;
            this.box[_id] = this.clone_box.cloneNode(1);
            this.box[_id].setAttribute('data-slideId', _id);
            this.aside[_id] = $('div.slideMenu-aside', this.box[_id]);
            this.aside[_id].attr('data-slideId', _id);
            this.article[_id] = $('div.slideMenu-article:eq(0)', this.box[_id]);
            this.article[_id].attr('data-slideId', _id);
            this.article[_id].hide();
            this.title[_id] = $('div.slideMenu-article:eq(0) div.slideMenu-title', this.box[_id]);
            this.title[_id].attr('data-slideId', _id);
            this.back[_id] = $('div.slideMenu-article:eq(0) a.slideMenu-back', this.box[_id]);
            this.back[_id].attr('data-slideId', _id);
            this.back[_id].bind('click', function () {
                (me.onBackClick) && (me.onBackClick(this));
                return false;
            });
            this.ajax[_id] = $('div.slideMenu-article:eq(0) div.slideMenu-ajax', this.box[_id]);
            this.ajax[_id].attr('data-slideId', _id);

            this.subarticle[_id] = $('div.slideMenu-article:eq(1)', this.box[_id]);
            this.subarticle[_id].attr('data-slideId', _id);
            this.subarticle[_id].hide();
            this.subtitle[_id] = $('div.slideMenu-article:eq(1) div.slideMenu-title', this.box[_id]);
            this.subtitle[_id].attr('data-slideId', _id);
            this.subback[_id] = $('div.slideMenu-article:eq(1) a.slideMenu-back', this.box[_id]);
            this.subback[_id].attr('data-slideId', _id);
            this.subback[_id].bind('click', function () {
                (me.onSubBackClick) && (me.onSubBackClick(this));
                return false;
            });
            this.subajax[_id] = $('div.slideMenu-article:eq(1) div.slideMenu-ajax', this.box[_id]);
            this.subajax[_id].attr('data-slideId', _id);
        },
        bindAtag : function (_id) {
            var me = this;
            var _click = function () {
                (me.onAsideGo) && me.onAsideGo(this);
                return false;
            };
            var _click2 = function () {
                var _callback = this.getAttribute('data-callback');
                if (_callback) {
                    me.ajaxCallbak = eval(_callback);
                }
                (me.onAtagClick) && me.onAtagClick(this);
                return false;
            };
            this.aside[_id].find('a').each(function () {
                this.setAttribute('data-slideId', _id);
                var _anchor = this.href.match(/#(.+)$/); 
                if (_anchor != null) {
                    var _zone = me.aside[_id].find('#' + _anchor[1]);
                    if (_zone.length > 0) {
                        me.article[_id].append(_zone);
                        _zone.hide();
                        _zone.addClass('slideMenu-zone');
                        this.onclick = _click;
                    }
                } else {
                    if (this.target != '_blank') {
                        this.onclick = _click2;
                    }
                }
            });
        },
        onAsideGo : function (_node) {
            var _id = _node.getAttribute('data-slideId'), me = this;
            if (_id != null) {
                var _anchor = _node.href.match(/#(.+)$/), _showId = _anchor[1], _height = (me.box[_id].offsetHeight - 65) + 'px'; 
                this.ajax[_id].hide();
                this.article[_id].find('.slideMenu-zone').css('height', _height).hide();
                //this.article[_id].find('.slideMenu-zone').hide().filter('#' + _showId).show();
                if (_config.dir == 'right') {
                    this.title[_id].text(_node.title);
                    this.aside[_id].animate({left:'-100%'}, function () { 
                        me.aside[_id].removeClass('in-center').addClass('in-left'); 
                        me.aside[_id].hide(); 
                        me.aside[_id].css('left', ''); 
                    });
                    this.article[_id].show();
                    this.article[_id].animate({left:'0'}, function () { 
                        me.article[_id].removeClass('in-right').addClass('in-center'); 
                        me.article[_id].css('left', ''); 
                        me.article[_id].find('#' + _showId).show();
                    });
                }
                if (_config.dir == 'bottom') {
                    this.article[_id].show();
                    this.title[_id].text(_node.title);
                    this.article[_id].animate({top:'0'}, function () { 
                        me.article[_id].removeClass('in-bottom').addClass('in-middle'); 
                        me.article[_id].css('top', ''); 
                        me.article[_id].find('#' + _showId).show();
                        me.aside[_id].hide(); 
                    });
                }
            }
        },
        onAtagClick : function (_node) {
            var _id = _node.getAttribute('data-slideId'), me = this, _height = (me.box[_id].offsetHeight - 45) + 'px';
            if (_id != null) {
                $.ajaxSetup({
                    beforeSend:function (request) {
                        //設定檔頭，表示由View.js發出的HTTP REQESUT
                        request.setRequestHeader("Authority", "jquery.slideMenu.js");
                    }
                });
                if (!_isIE) {
                    this.ajax[_id].load(_node.href, function () {
                        me.article[_id].find('.slideMenu-zone').hide();
                        me.ajax[_id].css('height', _height).show();
                        if (_config.dir == 'right') {
                            me.title[_id].text(_node.title);
                            me.aside[_id].animate({left:'-100%'}, function () { 
                                me.aside[_id].removeClass('in-center').addClass('in-left'); 
                                me.aside[_id].hide(); 
                                me.aside[_id].css('left', ''); 
                            });
                            me.article[_id].show();
                            me.article[_id].animate({left:'0'}, function () { 
                                me.article[_id].removeClass('in-right').addClass('in-center'); 
                                me.article[_id].css('left', ''); 
                            });
                        }
                        if (_config.dir == 'bottom') {
                            me.article[_id].show();
                            me.title[_id].text(_node.innerHTML);
                            me.article[_id].animate({top:'0'}, function () { 
                                me.article[_id].removeClass('in-bottom').addClass('in-middle'); 
                                me.article[_id].css('top', ''); 
                                me.aside[_id].hide(); 
                            });
                        }
                        me.ajaxCallbak(_id);
                        $.ajaxSetup({
                            beforeSend:function (request) {}
                        });
                    });
                } else {
                    $.get(_node.href.toString(), function (txt) {
                        me.ajax[_id].html(txt);
                        me.article[_id].find('.slideMenu-zone').hide();
                        me.ajax[_id].css('height', _height).show();
                        if (_config.dir == 'right') {
                            me.title[_id].text(_node.title);
                            me.aside[_id].animate({left:'-100%'}, function () { 
                                me.aside[_id].removeClass('in-center').addClass('in-left'); 
                                me.aside[_id].hide(); 
                                me.aside[_id].css('left', ''); 
                            });
                            me.article[_id].show();
                            me.article[_id].animate({left:'0'}, function () { 
                                me.article[_id].removeClass('in-right').addClass('in-center'); 
                                me.article[_id].css('left', ''); 
                            });
                        }
                        if (_config.dir == 'bottom') {
                            me.article[_id].show();
                            me.title[_id].text(_node.innerHTML);
                            me.article[_id].animate({top:'0'}, function () { 
                                me.article[_id].removeClass('in-bottom').addClass('in-middle'); 
                                me.article[_id].css('top', ''); 
                                me.aside[_id].hide(); 
                            });
                        }
                        me.ajaxCallbak(_id);
                        $.ajaxSetup({
                            beforeSend:function (request) {}
                        });
                    });
                }
            }
        },
        onBackClick : function (_node) {
            var _id = _node.getAttribute('data-slideId'), me = this;
            if (_id != null) {
                this.article[_id].find('.slideMenu-zone').hide();
                if (_config.dir == 'right') {
                    this.aside[_id].show();
                    this.aside[_id].animate({left:'0'}, function () { 
                        me.aside[_id].removeClass('in-left').addClass('in-center'); 
                        me.aside[_id].css('left', ''); 
                    });
                    this.article[_id].animate({left:'100%'}, function () { 
                        me.article[_id].removeClass('in-center').addClass('in-right'); 
                        me.article[_id].css('left', ''); 
                        me.article[_id].hide(); 
                    });
                }
                if (_config.dir == 'bottom') {
                    this.aside[_id].show();
                    this.article[_id].animate({top:'100%'}, function () { 
                        me.article[_id].removeClass('in-middle').addClass('in-bottom'); 
                        me.article[_id].css('top', ''); 
                        me.article[_id].hide(); 
                    });
                }
            }
        },
        onSubAtagClick : function (_node) {
            var _id = _node.getAttribute('data-slideId'), me = this, _height = (me.box[_id].offsetHeight - 45) + 'px';
            if (_id != null) {
                $.ajaxSetup({
                    beforeSend:function (request) {
                        //設定檔頭，表示由View.js發出的HTTP REQESUT
                        request.setRequestHeader("Authority", "jquery.slideMenu.js");
                    }
                });
                if (!_isIE) {
                    this.subajax[_id].load(_node.href, function () {
                        me.subarticle[_id].find('.slideMenu-zone').hide();
                        me.subajax[_id].css('height', _height).show();
                        if (_config.dir == 'right') {
                            me.subtitle[_id].text(_node.title);
                            me.article[_id].animate({left:'-100%'}, function () { 
                                me.article[_id].removeClass('in-center').addClass('in-left'); 
                                me.article[_id].hide(); 
                                me.article[_id].css('left', ''); 
                            });
                            me.subarticle[_id].show();
                            me.subarticle[_id].animate({left:'0'}, function () { 
                                me.subarticle[_id].removeClass('in-right').addClass('in-center'); 
                                me.subarticle[_id].css('left', ''); 
                            });
                        }
                        if (_config.dir == 'bottom') {
                            me.subarticle[_id].show();
                            me.subtitle[_id].text(_node.innerHTML);
                            me.subarticle[_id].animate({top:'0'}, function () { 
                                me.subarticle[_id].removeClass('in-bottom').addClass('in-middle'); 
                                me.subarticle[_id].css('top', ''); 
                                me.article[_id].hide(); 
                            });
                        }
                        me.ajaxCallbak(_id);
                        $.ajaxSetup({
                            beforeSend:function (request) {}
                        });
                    });
                } else {
                    $.get(_node.href.toString(), function (txt) {
                        me.subajax[_id].html(txt);
                        me.subarticle[_id].find('.slideMenu-zone').hide();
                        me.subajax[_id].css('height', _height).show();
                        if (_config.dir == 'right') {
                            me.subtitle[_id].text(_node.title);
                            me.article[_id].animate({left:'-100%'}, function () { 
                                me.article[_id].removeClass('in-center').addClass('in-left'); 
                                me.article[_id].hide(); 
                                me.article[_id].css('left', ''); 
                            });
                            me.subarticle[_id].show();
                            me.subarticle[_id].animate({left:'0'}, function () { 
                                me.subarticle[_id].removeClass('in-right').addClass('in-center'); 
                                me.subarticle[_id].css('left', ''); 
                            });
                        }
                        if (_config.dir == 'bottom') {
                            me.subarticle[_id].show();
                            me.subtitle[_id].text(_node.innerHTML);
                            me.subarticle[_id].animate({top:'0'}, function () { 
                                me.subarticle[_id].removeClass('in-bottom').addClass('in-middle'); 
                                me.subarticle[_id].css('top', ''); 
                                me.article[_id].hide(); 
                            });
                        }
                        me.ajaxCallbak(_id);
                        $.ajaxSetup({
                            beforeSend:function (request) {}
                        });
                    });
                }
            }
        },
        onSubBackClick : function (_node) {
            var _id = _node.getAttribute('data-slideId'), me = this;
            if (_id != null) {
                this.subarticle[_id].find('.slideMenu-zone').hide();
                if (_config.dir == 'right') {
                    this.article[_id].show();
                    this.article[_id].animate({left:'0'}, function () { 
                        me.article[_id].removeClass('in-left').addClass('in-center'); 
                        me.article[_id].css('left', ''); 
                    });
                    this.subarticle[_id].animate({left:'100%'}, function () { 
                        me.subarticle[_id].removeClass('in-center').addClass('in-right'); 
                        me.subarticle[_id].css('left', ''); 
                        me.subarticle[_id].hide(); 
                    });
                }
                if (_config.dir == 'bottom') {
                    this.article[_id].show();
                    this.subarticle[_id].animate({top:'100%'}, function () { 
                        me.subarticle[_id].removeClass('in-middle').addClass('in-bottom'); 
                        me.subarticle[_id].css('top', ''); 
                        me.subarticle[_id].hide(); 
                    });
                }
            }
        },
        ajaxCallbak : function (_id) {
        }
    };
    namespace.slideMenu.instance = function () {
        if (!this._instance) {
            this._instance = new this();
        }
        return this._instance;
    };
    namespace.slideMenu.install = function (_selector, _opt) {
        if (_selector instanceof jQuery) {
            var _slide = namespace.slideMenu.instance();
            (_opt != null) && (_slide.setOptions(_opt));
            _selector.each(function (i) {
                this.style.display = 'none';
                var _id = _config['idname'] + '-' + i;
                _slide.cloneBox(_id);
                this.parentNode.insertBefore(_slide.box[_id], this);
                _slide.aside[_id].append($(this));
                _slide.bindAtag(_id);
                this.style.display = '';
            });
        }
    }
})(self);
