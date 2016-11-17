(function (namespace) {
    var _isIE = ((navigator.userAgent.indexOf("MSIE") != -1) && (navigator.userAgent.indexOf("Opera") == -1));
    var _isIE6 = ((navigator.userAgent.indexOf("MSIE 6.") != -1) && (navigator.userAgent.indexOf("Opera") == -1));
    var _isIE7 = ((navigator.userAgent.indexOf("MSIE 7.") != -1) && (navigator.userAgent.indexOf("Opera") == -1));
    var _isIE8 = ((navigator.userAgent.indexOf("MSIE 8.") != -1) && (navigator.userAgent.indexOf("Opera") == -1));
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
    function lightTable (_tr) {
        _tr.hover(function () {
            if (this.x != 1) {
                this.style.backgroundColor = '#cccccc';
            }
        }, function () {
            if (this.x != 1) {
                this.style.backgroundColor = '';
            }
        });
        _tr.bind('click', function () {
            if (this.x != 1) {
                this.style.backgroundColor = '#aadddd';
                this.x = 1;
            } else {
                this.style.backgroundColor = '#cccccc';
                this.x = 0;
            }
        });
    }

    function _loadScrpt( _url, _css, _callback) {
        var _scriptNode = document.getElementsByTagName('script'), _chk = -1;
        var _arr = _url.split('/');
        var _js = _arr.pop();
        for (var i = 0, _max = _scriptNode.length; i < _max; i++) {
            (_scriptNode[i].src.indexOf(_js) >= 0) && (_chk = i);
        }
        if (_chk == -1) {
            var _head = document.getElementsByTagName('head')[0];
            var _script = document.createElement('script');
            if (_script.readyState) {
                _script.onreadystatechange = function () {
                    if (_script.readyState == 'loaded' || _script.readyState == 'complete') {
                        _script.onreadystatechange = null;
                        _callback();
                    }
                }
            } else {
                _script.onload = function () {
                    _callback();
                }
            }
            _script.src = _url;
            _head.appendChild(_script);
            if (_css != null) {
                var _link = document.createElement('link');
                _link.rel = 'stylesheet';
                _link.href = _css;
                _head.appendChild(_link);
            }
        } else {
            _callback();
        }
    }

    function _FloatSubtraction(arg1, arg2) {
        var r1, r2, m, n;
        try { r1 = arg1.toString().split(".")[1].length } catch (e) { r1 = 0 }
        try { r2 = arg2.toString().split(".")[1].length } catch (e) { r2 = 0 }
        m = Math.pow(10, Math.max(r1, r2));
        n = (r1 >= r2) ? r1 : r2;
        return ((arg1 * m - arg2 * m) / m).toFixed(n);
    }

    namespace.memberCenter = {
        memberData : function () {
            var _view = self.ViewBox.instance(), _basedir = _view.getBaseDir();
            var _form = $('form[name=memberDataForm]', _view.inner_box[0]);
            _form.find('input[name=submit]').bind('click', function () {
                if (this.form.chgpasswd.value != this.form.repassword.value) {
                    new_alert(Lang('pwd2_err'));
                    return false;
                }
            });
            $('a', _view.inner_box[0]).each(function () {
                if (this.target != '_blank' && (this.href).indexOf('http') >= 0) {
                    this.setAttribute('data-callback', 'self.memberCenter.cashLog');
                }
            });
            $('form', _view.inner_box[0]).submit(function () {
                $.ajax({
                    url:this.action,
                    type: 'POST',
                    dataType: 'text',
                    data: $(this).serialize(),
                    success : function (txt) {
                        _view.inner_box.empty().html(txt);
                        if (_view.inner_box.find('#PasswdIsOkMsg').length > 0) {
                            new_alert(_view.inner_box.find('#PasswdIsOkMsg').text());
                        }
                        _view.callBack();
                    }
                });
                return false;
            });
            $('select.ChgWar').bind('change', function () {
                var _iwar = parseFloat(this.value), _rtype = this.getAttribute('data-rtype');
                $('#WAR_' + _rtype).html(_FloatSubtraction(this.form["WAR[" + _rtype + "]"].value , _iwar));
                if (_rtype.substr(0,2) == 'D2') {
                    $('#ODDS_' + _rtype).html(parseFloat(document.FORM_FWAR["ODDS_DF[" + _rtype + "]"].value , _iwar) + _iwar);
                }
                if (_rtype == 'D3GMC') {
                    $('#ODDS_' + _rtype).html(parseFloat(document.FORM_FWAR["ODDS_DF[" + _rtype + "]"].value , _iwar) + +_iwar*10);
                }
                if (_rtype == 'D4') {
                    $('#ODDS_' + _rtype).html(parseFloat(document.FORM_FWAR["ODDS_DF[" + _rtype + "]"].value , _iwar) + +_iwar*100);
                }

            });
            lightTable($('#Zone table tr'));
            if (_isIE8) {
                $('div.round-table', _view.inner_box[0]).append('<div class="round-top-left" /><div class="round-top-right" /><div class="round-bottom-left" /><div class="round-bottom-right" />');
            }
            if (_isIE6 || _isIE7) {
                $('div.round-table', _view.inner_box[0]).css('position', 'static');
            }

            _loadScrpt('/inte/js/jquery.slideMenu.js', '/TPL/pitaya/style/jquery.slideMenu.css', function () {
                self.slideMenu.install($('#memberData'), {dir:'right',idname:'slideMenu'});
            });
        },
        quickGold : function () {
            var _view = self.ViewBox.instance();
            _view.box.style.width = '240px';
            _view.box.style.height = '360px';
            //擋非數字的keypress
            $('#GoldForm input').keypress(function (e) {
                e = e || window.event;
                var KeyIn = (window.event) ? e.keyCode : e.which;
                if( KeyIn == 13) return true;
                if( ( KeyIn < 48 || KeyIn > 57 ) && ( KeyIn > 95 || KeyIn < 106 ) && KeyIn != 0 ){
                    return false;
                }
            });
            $('#GoldForm input[name=SaveGold]').bind('click', function (e) {
                var _disabeleGold = (this.form.EnableGold[0].checked) ? '0' : '1';
                $.ajax({
                    url:this.form.action,
                    type: 'GET',
                    dataType: 'text',
                    data: $(this.form).serialize(),
                    success : function (txt) {
                        if (txt == 'SaveIsOk') {
                            //self.location.reload();
                            var _ui = self.GoldUI.instance();
                            try {
                               var quickGold = eval(self.GoldUI.cookie('GoldCatch'));
                            } catch (e) {
                               quickGold = '[10, 20, 50 100]';
                            }
                            _ui.setOptions({disabeleGold: _disabeleGold});
                            _ui.resetGold(quickGold);
                            _view.onClose();
                        } else {
                            new_alert(txt);
                        }
                    }
                });
            });
        },
        todayWager : function () {
            var _view = self.ViewBox.instance(), _basedir = _view.getBaseDir();
            $('a', _view.inner_box[0]).click(function () {
                if (this.target != '_blank' && (this.href).indexOf('http') >= 0) {
                    var page = ((this.href).split('/')).pop();
                    if (!_isIE) {
                        _view.inner_box.load(_basedir + '/' + page, _view.callBack);
                    } else {
                        $.ajax({
                            url:_basedir + '/' + page,
                            type: 'GET',
                            dataType: 'text',
                            success : function (txt) {
                                _view.inner_box.empty().html(txt);
                                _view.callBack();
                            }
                        });
                    }
                }
                return false;
            });
            $('form', _view.inner_box[0]).submit(function () {
                var GoUrl = this.action + '?' + $(this).serialize();
                _view.inner_box.load(GoUrl, _view.callBack);
                return false;
            });
            $('select', _view.inner_box[0]).change(function () {
                var GoUrl = this.form.action + '?' + $(this.form).serialize();
                _view.inner_box.load(GoUrl, _view.callBack);
            });
            if (_isIE8) {
                $('div.round-table', _view.inner_box[0]).append('<div class="round-top-left" /><div class="round-top-right" /><div class="round-bottom-left" /><div class="round-bottom-right" />');
            }
            if (_isIE6 || _isIE7) {
                $('div.round-table', _view.inner_box[0]).css('position', 'static');
            }
            lightTable($('table#TodayTab tr'));
        },
        historyCount : function () {
            var _view = self.ViewBox.instance(), _basedir = _view.getBaseDir();
            $('a', _view.inner_box[0]).each(function () {
                if (this.target != '_blank' && (this.href).indexOf('http') >= 0) {
                    var page = ((this.href).split('/')).pop();
                    this.href = _basedir + '/' + page;
                    this.setAttribute('data-callback', 'self.memberCenter.historyDate');
                }
            });
            if (_isIE8) {
                $('div.round-table', _view.inner_box[0]).append('<div class="round-top-left" /><div class="round-top-right" /><div class="round-bottom-left" /><div class="round-bottom-right" />');
            }
            if (_isIE6 || _isIE7) {
                $('div.round-table', _view.inner_box[0]).css('position', 'static');
            }
            lightTable($('table#HistoryTab tr'));
            _loadScrpt('/inte/js/jquery.slideMenu.js', '/TPL/pitaya/style/jquery.slideMenu.css', function () {
                self.slideMenu.install($('#historyCount'), {dir:'right',idname:'slideMenu'});
            });
        },
        historyDate : function (_id) {
            var _slide = self.slideMenu.instance(), _ajax = _slide.ajax[_id];
            var _click = function () {
                var _callback = this.getAttribute('data-callback');
                if (_callback) {
                    _slide.ajaxCallbak = eval(_callback);
                }
                (_slide.onSubAtagClick) && _slide.onSubAtagClick(this);
                return false;
            };
            $('a.slide-sub', _ajax).each(function () {
                if (this.target != '_blank' && (this.href).indexOf('http') >= 0) {
                    this.setAttribute('data-slideId', _id);
                    this.setAttribute('data-callback', 'self.memberCenter.historyDateWager');
                    this.onclick = _click;
                }
            });
            if (_isIE8) {
                $('div.round-table', _ajax).append('<div class="round-top-left" /><div class="round-top-right" /><div class="round-bottom-left" /><div class="round-bottom-right" />');
            }
            if (_isIE6 || _isIE7) {
                $('div.round-table', _ajax).css('position', 'static');
            }
            lightTable($('#historyData div.round-table table tbody tr'));
        },
        history : function () {
            var _view = self.ViewBox.instance(), _basedir = _view.getBaseDir();
            $('a', _view.inner_box[0]).each(function () {
                if (this.target != '_blank' && (this.href).indexOf('http') >= 0) {
                    var page = ((this.href).split('/')).pop();
                    if(_basedir!="/member/today"){
                        this.href = _basedir + '/' + page;
                    }
                    this.setAttribute('data-callback', 'self.memberCenter.historyWager');
                }
            });
            $('form', _view.inner_box[0]).submit(function () {
                var GoUrl = this.action + '?' + $(this).serialize();
                _view.inner_box.load(GoUrl, _view.callBack);
                return false;
            });
            $('select', _view.inner_box[0]).change(function () {
                var GoUrl = this.form.action + '?' + $(this.form).serialize();
                _view.inner_box.load(GoUrl, _view.callBack);
            });
            if (_isIE8) {
                $('div.round-table', _view.inner_box[0]).append('<div class="round-top-left" /><div class="round-top-right" /><div class="round-bottom-left" /><div class="round-bottom-right" />');
            }
            if (_isIE6 || _isIE7) {
                $('div.round-table', _view.inner_box[0]).css('position', 'static');
            }
            lightTable($('table#HistoryTab tr'));
            _loadScrpt('/inte/js/jquery.slideMenu.js', '/TPL/pitaya/style/jquery.slideMenu.css', function () {
                self.slideMenu.install($('#historyData'), {dir:'right',idname:'slideMenu'});
            });
        },
        historyWager : function (_id) {
            var _slide = self.slideMenu.instance(), _ajax = _slide.ajax[_id];
            var _callback = function () {
                self.memberCenter.historyWager(_id);
            }
            $('form', _ajax[0]).submit(function () {
                var GoUrl = this.action + '?' + $(this).serialize();
                _ajax.load(GoUrl, _callback);
                return false;
            });
            $('select', _ajax[0]).change(function () {
                var GoUrl = this.form.action + '?' + $(this.form).serialize();
                _ajax.load(GoUrl, _callback);
            });
            if (_isIE8) {
                $('div.round-table', _ajax[0]).append('<div class="round-top-left" /><div class="round-top-right" /><div class="round-bottom-left" /><div class="round-bottom-right" />');
            }
            if (_isIE6 || _isIE7) {
                $('div.round-table', _ajax[0]).css('position', 'static');
            }
            lightTable($('div.round-table table tr', _ajax[0]));
        },
        historyDateWager : function (_id) {
            var _slide = self.slideMenu.instance(), _ajax = _slide.subajax[_id];
            var _callback = function () {
                self.memberCenter.historyDateWager(_id);
            }
            $('form', _ajax[0]).submit(function () {
                var GoUrl = this.action + '?' + $(this).serialize();
                _ajax.load(GoUrl, _callback);
                return false;
            });
            $('select', _ajax[0]).change(function () {
                var GoUrl = this.form.action + '?' + $(this.form).serialize();
                _ajax.load(GoUrl, _callback);
            });
            if (_isIE8) {
                $('div.round-table', _ajax[0]).append('<div class="round-top-left" /><div class="round-top-right" /><div class="round-bottom-left" /><div class="round-bottom-right" />');
            }
            if (_isIE6 || _isIE7) {
                $('div.round-table', _ajax[0]).css('position', 'static');
            }
            lightTable($('div.round-table table tr', _ajax[0]));
        },
        gameResult : function () {
            var _view = self.ViewBox.instance();
            _view.box.style.width = '950px';
            var _date_start = $('#date_start'),
                _date_end = $('#date_end'),
                _byDate = $('#search_by_date'),
                _byDrawno = $('#search_by_drawno'),
                _drawno = $('#drawno_for_search');
            var _dateChange = function () {
                var _start = $('#date_start'), _end = $('#date_end');
                if (_start.val() != '' && _end.val() != '') {
                    var DateStart = new Date(_start.val()).getTime(), DateEnd = new Date(_end.val()).getTime();
                    if (DateStart > DateEnd) {
                        _start.val(_start.val());
                        _end.val(_start.val());
                    }
                }
            }
            if (_date_start.length > 0 && _date_start[0].type == 'text') {
                _loadScrpt("/inte/js/ui.datepicker.js", "/TPL/pitaya/style/ui.datepicker.css", function () {
                    _date_start.datepicker({
                        dateFormat: 'yy-mm-dd',
                        rangeSelect: false,
                        firstDay: 1,
                        showOn: 'both',
                        buttonImageOnly: true,
                        buttonImage: '/images/control/calendar.gif',
                        closeText: Lang('closeText'),
                        prevText: Lang('prevText'),
                        nextText: Lang('nextText'),
                        currentText: Lang('currentText'),
                        monthNames: Lang('monthNames'),
                        monthNamesShort: Lang('monthNamesShort'),
                        dayNames: Lang('dayNames'),
                        dayNamesShort: Lang('dayNamesShort'),
                        dayNamesMin: Lang('dayNamesMin'),
                        weekHeader: Lang('weekHeader'),
                        clearText: Lang('clearText')
                    });
                    _date_end.datepicker({
                        dateFormat: 'yy-mm-dd',
                        rangeSelect: false,
                        firstDay: 1,
                        showOn: 'both',
                        buttonImageOnly: true,
                        buttonImage: '/images/control/calendar.gif',
                        closeText: Lang('closeText'),
                        prevText: Lang('prevText'),
                        nextText: Lang('nextText'),
                        currentText: Lang('currentText'),
                        monthNames: Lang('monthNames'),
                        monthNamesShort: Lang('monthNamesShort'),
                        dayNames: Lang('dayNames'),
                        dayNamesShort: Lang('dayNamesShort'),
                        dayNamesMin: Lang('dayNamesMin'),
                        weekHeader: Lang('weekHeader'),
                        clearText: Lang('clearText')
                    })
                });

                _date_start.change(_dateChange);
                _date_end.change(_dateChange);
                var _click = function () {_byDate.attr('checked', true);};
                _date_start.click(_click);
                _date_end.click(_click);
                _drawno.click(function () {_byDrawno.attr('checked', true);});
            }

            var _view = self.ViewBox.instance();
            $('form', _view.inner_box[0]).submit(function () {
                var GoUrl = this.action + '?' + $(this).serialize();
                _view.inner_box.load(GoUrl, _view.callBack);
                return false;
            });
            $('select', _view.inner_box[0]).change(function () {
                var GoUrl = this.form.action + '?' + $(this.form).serialize();
                _view.inner_box.load(GoUrl, _view.callBack);
            });
            if (_isIE8) {
                $('div.round-table', _view.inner_box[0]).append('<div class="round-top-left" /><div class="round-top-right" /><div class="round-bottom-left" /><div class="round-bottom-right" />');
            }
            if (_isIE6 || _isIE7) {
                $('div.round-table', _view.inner_box[0]).css('position', 'static');
            }
        },
        rule : function () {
            _loadScrpt('/inte/js/jquery.slideMenu.js', '/TPL/pitaya/style/jquery.slideMenu.css', function () {
                self.slideMenu.install($('#RuleDiv'), {dir:'bottom',idname:'slideMenu'});
            });
        },
        cashLog : function (_id) {
            var _slide = self.slideMenu.instance(), _ajax = _slide.ajax[_id];
            var _callback = function () {
                self.memberCenter.cashLog(_id);
            }
            $('form', _ajax[0]).submit(function () {
                var GoUrl = this.action + '?' + $(this).serialize();
                _ajax.load(GoUrl, _callback);
                return false;
            });
            $('select.change-submit', _ajax[0]).change(function () {
                var GoUrl = this.form.action + '?' + $(this.form).serialize();
                _ajax.load(GoUrl, _callback);
            });
            if (_isIE8) {
                $('div.round-table', _ajax[0]).append('<div class="round-top-left" /><div class="round-top-right" /><div class="round-bottom-left" /><div class="round-bottom-right" />');
            }
            if (_isIE6 || _isIE7) {
                $('div.round-table', _ajax[0]).css('position', 'static');
            }
            var _date_start = $('input[name=date_start]'), _date_end = $('input[name=date_end]');
            if (_date_start.length > 0 && _date_start[0].type == 'text') {
                _loadScrpt("/inte/js/ui.datepicker.js", "/TPL/pitaya/style/ui.datepicker.css", function () {
                    _date_start.datepicker({
                         dateFormat: 'yy-mm-dd',
                         rangeSelect: false,
                         firstDay: 1,
                         showOn: 'both',
                         buttonImageOnly: true,
                         buttonImage: '/images/control/calendar.gif',
                         closeText: Lang('closeText'),
                         prevText: Lang('prevText'),
                         nextText: Lang('nextText'),
                         currentText: Lang('currentText'),
                         monthNames: Lang('monthNames'),
                         monthNamesShort: Lang('monthNamesShort'),
                         dayNames: Lang('dayNames'),
                         dayNamesShort: Lang('dayNamesShort'),
                         dayNamesMin: Lang('dayNamesMin'),
                         weekHeader: Lang('weekHeader'),
                         clearText: Lang('clearText')
                    });
                     _date_end.datepicker({
                         dateFormat: 'yy-mm-dd',
                         rangeSelect: false,
                         firstDay: 1,
                         showOn: 'both',
                         buttonImageOnly: true,
                         buttonImage: '/images/control/calendar.gif',
                         closeText: Lang('closeText'),
                         prevText: Lang('prevText'),
                         nextText: Lang('nextText'),
                         currentText: Lang('currentText'),
                         monthNames: Lang('monthNames'),
                         monthNamesShort: Lang('monthNamesShort'),
                         dayNames: Lang('dayNames'),
                         dayNamesShort: Lang('dayNamesShort'),
                         dayNamesMin: Lang('dayNamesMin'),
                         weekHeader: Lang('weekHeader'),
                         clearText: Lang('clearText')
                    })
                });
            }
        },
        limit : function () {
            var _view = self.ViewBox.instance(), _basedir = _view.getBaseDir();
            $('form', _view.inner_box[0]).submit(function () {
                $.ajax({
                    url:this.action,
                    type: 'POST',
                    dataType: 'text',
                    data: $(this).serialize(),
                    success : function (txt) {
                        _view.inner_box.empty().html(txt);
                        if (_view.inner_box.find('#PasswdIsOkMsg').length > 0) {
                            new_alert(_view.inner_box.find('#PasswdIsOkMsg').text());
                        }
                        _view.callBack();
                    }
                });
                return false;
            });
            $('select.ChgWar').bind('change', function () {
                var _iwar = parseFloat(this.value), _rtype = this.getAttribute('data-rtype');
                $('#WAR_' + _rtype).html(_FloatSubtraction(this.form["WAR[" + _rtype + "]"].value , _iwar));
                if (_rtype.substr(0,2) == 'D2') {
                    $('#ODDS_' + _rtype).html(parseFloat(document.FORM_FWAR["ODDS_DF[" + _rtype + "]"].value , _iwar) + _iwar);
                }
                if (_rtype == 'D3GMC') {
                    $('#ODDS_' + _rtype).html(parseFloat(document.FORM_FWAR["ODDS_DF[" + _rtype + "]"].value , _iwar) + +_iwar*10);
                }
                if (_rtype == 'D4') {
                    $('#ODDS_' + _rtype).html(parseFloat(document.FORM_FWAR["ODDS_DF[" + _rtype + "]"].value , _iwar) + +_iwar*100);
                }

            });
            lightTable($('#Zone table tr'));
            if (_isIE8) {
                $('div.round-table', _view.inner_box[0]).append('<div class="round-top-left" /><div class="round-top-right" /><div class="round-bottom-left" /><div class="round-bottom-right" />');
            }
            if (_isIE6 || _isIE7) {
                $('div.round-table', _view.inner_box[0]).css('position', 'static');
            }
        },
        BB : function () {
            var _view = self.ViewBox.instance();
            _view.onClose();
            window.open('/BB_browser.php','download','top=0,left=0,width=1000,height=600,location=yes,menubar=no,resizable=yes,scrollbars=yes,status=no,toolbar=no');
        }
    };
})(self);
//六合彩開獎結果的左右 檢視
(function (space) {
    var NN = 7;
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
    space.ShowF2 = function (act) {
        if( act == 1 ){
           if( NN < 7 ){
               NN++;
           }else{
               NN = 1;
           }
           if( NN == 7 ){
               ShowF('SP');
           }else{
               ShowF('N' + NN);
           }
        }else{
           if( NN > 1 ){
               NN--;
           }else{
               NN = 7;
           }
           if( NN == 7 ){
               ShowF('SP');
           }else{
               ShowF('N' + NN);
           }
        }
    }
    function ShowF (f) {
        var idx = ( ( f == 'SP' )? 6 : (parseInt( f.substr( 1, 1 ) ) - 1) );
        var aN1 = _getElementsByClass('N1','span');
        var aN2 = _getElementsByClass('N2','span');
        var aN3 = _getElementsByClass('N3','span');
        var aN4 = _getElementsByClass('N4','span');
        var aN5 = _getElementsByClass('N5','span');
        var aN6 = _getElementsByClass('N6','span');
        var aSP = _getElementsByClass('SP','span');

        var aTmp = ['N1', 'N2', 'N3', 'N4', 'N5', 'N6', 'SP'];
        for( var i=0; i< 7; i++ ){
            var aObj = eval('a' + aTmp[i]);
            for( var j=0; j< aObj.length; j++ ){
                aObj[j].style.display = 'none';
            }
        }
        for( var i=0; i< 7; i++ ){
            var aObj = eval('a' + f );
            for( var j=0; j< aObj.length; j++ ){
                aObj[j].style.display = 'block';
            }
        }
    }
})(self);
//3顆球開獎結果的左右 檢視
(function (space) {
    var NumNN = 0 ;
    function ShowV(act){
        if(act == 1){
            NumNN ++;
        }else{
            NumNN --;
        }
        ShowFF(ShowChk(NumNN));
    }
    function ShowChk(res){
        var Tag = "";
        switch(res){
            case 0:
            case 4:
                NumNN = 0 ;
                Tag =  "M";
                break;
            case 1:
                NumNN = 1 ;
                Tag = "C";
                break;
            case 2:
                NumNN = 2 ;
                Tag = "U";
                break;
            case 3:
            case -1:
                NumNN = 3 ;
                Tag = "SN";
                break;
            default :
                Tag = "M";
                break;
        }
        return Tag;
    }
    function ShowFF(act){
        $(".MCUSN").hide();
        $("#"+act+"T").show();
        $("."+act+"V").show();
    }
    space.GoB3 = function (i) {
        ShowV(i);
    }
})(self);
//5顆球開獎結果的左右 檢視
(function (space) {
    var NumNN = 1 ;
    function ShowV(act){
        if(act == 1){
            NumNN ++;
        }else{
            NumNN --;
        }
        if( NumNN > 8 ) {
            NumNN = 1;
        }
        if( NumNN < 1 ) {
            NumNN = 8;
        }
        ShowFF(ShowChk(NumNN));
    }
    function ShowChk(res){
        var Tag = "";
        switch(res){
            case 1:
                Tag = 1;
                break;
            case 2:
                Tag = 2;
                break;
            case 3:
                Tag = 3;
                break;
            case 4:
                Tag = 4;
                break;
            case 5:
                Tag = 5;
                break;
            case 6:
                Tag = 123;
                break;
            case 7:
                Tag = 234;
                break;
            case 8:
                Tag = 345;
                break;
            default :
                Tag = 1;
                break;
        }
        return Tag;
    }
    function ShowFF(act){
        $(".SHOW").hide();
        $(".S"+act).show();
    }
    space.GoB5 = function (i) {
        ShowV(i);
    }
})(self);
//GXSF顆球開獎結果的左右 檢視
(function (space) {
    var NumNN = 1 ;
    function ShowV(act){
        if(act == 1){
            NumNN ++;
        }else{
            NumNN --;
        }
        if( NumNN > 5 ) {
            NumNN = 1;
        }
        if( NumNN < 1 ) {
            NumNN = 5;
        }
        ShowFF(ShowChk(NumNN));
    }
    function ShowChk(res){
        var Tag = "";
        switch(res){
            case 1:
                Tag = 1;
                break;
            case 2:
                Tag = 2;
                break;
            case 3:
                Tag = 3;
                break;
            case 4:
                Tag = 4;
                break;
            case 5:
                Tag = 5;
                break;
            default :
                Tag = 1;
                break;
        }
        return Tag;
    }
    function ShowFF(act){
        $(".SHOW").hide();
        $(".S"+act).show();
    }
    space.GoGXSF = function (i) {
        ShowV(i);
    }
})(self);
//GDSF顆球開獎結果的左右 檢視
(function (space) {
    var NumNN = 1 ;
    function ShowV(act){
        if(act == 1){
            NumNN ++;
        }else{
            NumNN --;
        }
        if( NumNN > 8 ) {
            NumNN = 1;
        }
        if( NumNN < 1 ) {
            NumNN = 8;
        }
        ShowFF(ShowChk(NumNN));
    }
    function ShowChk(res){
        var Tag = "";
        switch(res){
            case 1:
                Tag = 1;
                break;
            case 2:
                Tag = 2;
                break;
            case 3:
                Tag = 3;
                break;
            case 4:
                Tag = 4;
                break;
            case 5:
                Tag = 5;
                break;
            case 6:
                Tag = 6;
                break;
            case 7:
                Tag = 7;
                break;
            case 8:
                Tag = 8;
                break;
            default :
                Tag = 1;
                break;
        }
        return Tag;
    }
    function ShowFF(act){
        $(".SHOW").hide();
        $(".S"+act).show();
    }
    space.GoGDSF = function (i) {
        ShowV(i);
    }
})(self);

