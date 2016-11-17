var betSpace = betSpace || {};
(function(space){
    //timer事件
    var timeBack = null;
    //是否開放取代金額
    var _replaceGold = true;
    var _select = {
        r : ['01', '02', '07', '08', '12', '13', '18', '19', '23', '24', '29', '30', '34', '35', '40', '45', '46'],
        b : ['03', '04', '09', '10', '14', '15', '20', '25', '26', '31', '36', '37', '41', '42', '47', '48'],
        g : ['05', '06', '11', '16', '17', '21', '22', '27', '28', '32', '33', '38', '39', '43', '44', '49'],
        h0 : ['01', '02', '03', '04', '05', '06', '07', '08', '09'],
        h1 : ['10', '11', '12', '13', '14', '15', '16', '17', '18', '19'],
        h2 : ['20', '21', '22', '23', '24', '25', '26', '27', '28', '29'],
        h3 : ['30', '31', '32', '33', '34', '35', '36', '37', '38', '39'],
        h4 : ['40', '41', '42', '43', '44', '45', '46', '47', '48', '49'],
        f0 : ['10', '20', '30', '40'],
        f1 : ['01', '11', '21', '31', '41'],
        f2 : ['02', '12', '22', '32', '42'],
        f3 : ['03', '13', '23', '33', '43'],
        f4 : ['04', '14', '24', '34', '44'],
        f5 : ['05', '15', '25', '35', '45'],
        f6 : ['06', '16', '26', '36', '46'],
        f7 : ['07', '17', '27', '37', '47'],
        f8 : ['08', '18', '28', '38', '48'],
        f9 : ['09', '19', '29', '39', '49']
    };
    var defineGrp = false;
    var _focus = null;
    var _hasClearEvent = false;
    //option config
    var _opt = {
        url : { 
            back : '/member/select_lt.php', 
            bet : '/member/lt_order.php',
            nap : '/member/lt_nap/lt_nap_order.php'
        },
        reg : {
            gold : /^gold\[([^\]]*)\]$/,
            odds : /^odds\[([^\]]*)\]$/,
            light_bg : /(.*)/,
            light_bg_r : "#$1_bg",
            nap_inp : /^radio[1-6]{1,}$/,
            ball49 : /^(SP|NA|N1|N2|N3|N4|N5|N6)[0-4]{1}[0-9]{1}$/,
            ballReg : /^(SP|NA|N1|N2|N3|N4|N5|N6)([0-4]{1}[0-9]{1})$/,
            quick_rtype : /^[SP|NA|N1|N2|N3|N4|N5|N6]$/
        },
        class_name : {
            light : 'highlight_me',
            on : 'ON',
            ball : 'hasGold'
        },
        selector : {
            finish : '#left input[name=FINISH]',
            print : '#left input[name=PRINT]',
            form : '#left form[name=LAYOUTFORM]',
            gold : 'input[name=gold]',
            cancel : 'input[name=btnCancel]',
            submit : 'input[name=btnSubmit]',
            wingold : '#pc',
            odds : 'input[name=ioradio_r_h],input[name=ioradio]',
            teamcount : 'input[name=teamcount]',
            nap_del : 'form[name=MyForm] input[type=button]',
            active_gold : 'input.GoldQQ',
            active_odds : 'input[type=hidden]',
            active_send : 'form[name=newForm] input[name=btnBet], #QuickSubmit',
            total : '#total_bet',
            grpGold : '#BetGold',
            grpBtn : '#QuickMenu a',
            dtShow : 'a#limitShow',
            grp_form : '#left form[name=LAYOUTFORM]',
            grp_concede : "input[name='aConcede[]']",
            grp_odds : "input[name='aOdds[]']",
            grp_gold : "input[name='gold[]']",
            grp_cancel : 'input[name=btnCancel]',
            grp_submit : 'input[name=btnSubmit]',
            grp_nav : '#Game > fieldset > nav b',
            light_td : '#Game td.highlight_me',
            fill : '#left div.Grp > div > a',
            nap_odds : 'input[type=hidden]',
            credit : '#bet-credit',
            ball49 : 'div#GrpBtn > div#QuickMenu > fieldset.ball49 > p > a',
            rpGold : '#replaceGold'
        }
    };
    function _back() {
        $.ajax({
            url : _opt.url.back,
            dataType : 'script'
        });
    }
    function clearGrp () {
        $(_opt.selector.light_td).removeClass(_opt.class_name.light);
        $(_opt.selector.grp_nav).removeClass(_opt.class_name.on);
    }
    function hasParentId( obj, id) {
        while( obj.parentNode ) {
            if (obj.parentNode.id == id) {
                return true;
                break;
            }
            obj = obj.parentNode;
        }
    }
    function getQuickAry (k) {
        if (typeof(_select[k]) == 'undefined') {
            var r = [], n;
            var _x = ['a1', 'a2', 'a3', 'a4', 'a5', 'a6', 'a7', 'a8', 'a9', 'aa', 'ab', 'ac'];
            var _reg = /^[0-4]{1}[0-9]{1}$/;
            if (_reg.test(k)) {
                _select[k] = [k];
                r = _select[k];
            } else if ($.inArray(k, _x) >= 0) {
                var _g = self.ShowTable.instance();
                var _close = _g.close_timestamp;
                var lunar = (new Lunar(_close)).getDateC();
                var _tmp = ['01,13,25,37,49', '12,24,36,48', '11,23,35,47', '10,22,34,46',
                            '09,21,33,45', '08,20,32,44', '07,19,31,43', '06,18,30,42',
                            '05,17,29,41', '04,16,28,40', '03,15,27,39', '02,14,26,38'];
                var _an = [], j = lunar.AnIndex, idx = j;
                for (var i = 0; i < 12; i++) {
                    if (j > 11) {
                        idx = j - 12;
                    } else {
                        idx = j;
                    }
                    //_an.push(_tmp[idx]);
                    _an[_x[idx]] = _tmp[i];
                    j++;
                }
                for (i = 0; i < 12; i++) {
                    _select[_x[i]] = _an[_x[i]].split(',');
                }
                r = _select[k];
            } else {
                for (var i = 1; i < 49; i++) {
                    n = (('0' + i).match(/[0-9]{2}$/i)).toString();
                    switch (k) {
                        case 'odd' :
                           (i % 2 == 1) && r.push(n);
                            break;
                        case 'even' :
                           (i % 2 == 0) && r.push(n);
                            break;
                        case 'over' :
                           (i > 24) && r.push(n);
                            break;
                        case 'under' :
                           (i < 25) && r.push(n);
                            break;
                        case 'sodd' :
                            ((parseInt(n.substr(0,1), 10) + parseInt(n.substr(1,1), 10)) % 2 == 1) && r.push(n);
                            break;
                        case 'seven' :
                            ((parseInt(n.substr(0,1), 10) + parseInt(n.substr(1,1), 10)) % 2 == 0) && r.push(n);
                            break;
                        case 'sover' :
                            ((parseInt(n.substr(0,1), 10) + parseInt(n.substr(1,1), 10)) > 6) && r.push(n);
                            break;
                        case 'sunder' :
                            ((parseInt(n.substr(0,1), 10) + parseInt(n.substr(1,1), 10)) < 7) && r.push(n);
                            break;
                        case 'rodd' :
                            (($.inArray(n, _select['r']) >= 0) && (i % 2 == 1)) && r.push(n);
                            break;
                        case 'reven' :
                            (($.inArray(n, _select['r']) >= 0) && (i % 2 == 0)) && r.push(n);
                            break;
                        case 'rover' :
                            (($.inArray(n, _select['r']) >= 0) && (i > 24)) && r.push(n);
                            break;
                        case 'runder' :
                            (($.inArray(n, _select['r']) >= 0) && (i < 25)) && r.push(n);
                            break;
                        case 'bodd' :
                            (($.inArray(n, _select['b']) >= 0) && (i % 2 == 1)) && r.push(n);
                            break;
                        case 'beven' :
                            (($.inArray(n, _select['b']) >= 0) && (i % 2 == 0)) && r.push(n);
                            break;
                        case 'bover' :
                            (($.inArray(n, _select['b']) >= 0) && (i > 24)) && r.push(n);
                            break;
                        case 'bunder' :
                            (($.inArray(n, _select['b']) >= 0) && (i < 25)) && r.push(n);
                            break;
                        case 'godd' :
                            (($.inArray(n, _select['g']) >= 0) && (i % 2 == 1)) && r.push(n);
                            break;
                        case 'geven' :
                            (($.inArray(n, _select['g']) >= 0) && (i % 2 == 0)) && r.push(n);
                            break;
                        case 'gover' :
                            (($.inArray(n, _select['g']) >= 0) && (i > 24)) && r.push(n);
                            break;
                        case 'gunder' :
                            (($.inArray(n, _select['g']) >= 0) && (i < 25)) && r.push(n);
                            break;
                    }
                }
                _select[k] = r;
            }
            return r;
        } else {
            return _select[k];
        }
    }
    function selectBall() {
        var _numb, r = [];
        for (var i = 1; i < 49; i++) {
            _numb = (('0' + i).match(/[0-9]{2}$/i)).toString();
            (document.getElementById('Ball' + _numb).x == 1) && r.push(_numb);
        }
        return r;
    }
    var BetConfirm = function () {
        if (arguments.length > 0) {
            var _betCde = arguments[0], _form = document.BetForm, _odds = (_form.ioradio.value / 1000), _gold = _form.gold.value;
            var _win = Math.round( _gold * _odds - _gold);
            new_confirm(Lang('word_bet_gold') + ":" + _gold + "\n", function() {
                $.ajax({
                    url : _form.action,
                    type : 'POST',
                    data : $(_form).serialize(),
                    dataType : 'script'
                });
            });
        }
    }
    space.bet = function (_json) {
        if (_json != null) {
            if (typeof _json == 'string') {
            } else {
                this.setAllOption(_json);
            }
        }  
        var _selector = $(_opt.selector.credit);
        (_selector.length) && (this.creditTag = _selector.get(0));
    }
    space.bet.onDragBet = function (_gold, _node) {
        var _form = document.BetForm, _concede = _node.getAttribute('data-concede');
        _form.concede.value = _concede;
        _form.ioradio.value = Math.round(document.getElementById(_concede).innerHTML * 1000);
        _form.gold.value = _gold;
        _form.gid.value = document.getElementById('gid').value;
        _form.Line.value = '';
        var _g = self.ShowTable.instance();
        if (aC2R[_concede] == 'SP') {
            _form.Line.value = _g.lineInp.val();
        }
        BetConfirm(_concede);
    }
    //靜態函式
    space.bet.onBetNumClk = function () {
        var _bet = this.id;
        clearGrp();
        var _g = self.ShowTable.instance();
        var bet_url = _opt.url.bet +  '?gid=' + _g.gidInp.value + '&rtype=' + _bet;
        if (aC2R[_bet] == 'SP') {
            bet_url += '&Line=' + _g.lineInp.val();
        }
        $.ajax({
            url : bet_url,
            dataType : 'script'
        });
    }
    /**
     * 下注完成
     */
    space.bet.onFinish = function () {
        (timeBack) && clearTimeout(timeBack);
        timeBack = setTimeout(_back, 45000);
        clearGrp();
        $(_opt.selector.finish).click(function() {
            _back();
        });
        $(_opt.selector.print).click(function() {
            window.print();
        });
    }
    /**
     * 清除timer
     */
    space.bet.clearBack = function () {
        (timeBack) && clearTimeout(timeBack);
    }
    /**
     * 回傳動態下注物件
     * return obj betSpace.bet
     */
    space.bet.instance = function () {
        if (!this._instance) {
            this._instance = new this;
        }
        if (arguments.length > 0) {
            this._instance.rtypeGrp = arguments[0];
        }
        return this._instance;
    }

    space.bet.prototype = {
        backTime : null,
        //下注表單
        _form : null,
        //金額欄位
        _goldInp : null,
        //群組下注金額欄位
        _goldGrp : {},
        //群組賠率欄位
        _oddsGrp : {},
        //下注按鈕
        _btnSend : null,
        //取消下注按鈕
        _btnCancel : null,
        //賠率欄位
        _oddsInp : null,
        //總計金額html tag
        _totalTag : null,
        //可贏金額html tag
        _winGoldTag : null,
        //群組rtype
        rtypeGrp : 'SP',
        //最低限額
        gMin : 0,
        //最高限額
        gMax : 0,
        //單注限額
        SO : 0,
        //單項號限額
        SC : 0,
        //信用額度
        credit : 0,
        //今日下注總額
        todayGold : 0,
        //正碼過關數
        teamcount : 0,
        //連肖賠率
        aOdds : [],
        //100萬派彩限制
        millionLimit : false,
        //快速下注table
        fastTable : null,
        //lock
        lock:false, 
        //credit html tag
        creditTag : null,
        //jquery ball 49 selector
        jqBall49 : null,
        //jquery replace Gold selector
        jqRpGold : null,
        /**
         * 初始化下注函式
         */
        init : function () {
            var me = this;
            if (arguments.length > 0) {
                this.gMin = parseInt(arguments[0], 10);
                this.gMax = parseInt(arguments[1], 10);
                this.SC = parseInt(arguments[2], 10);
                this.SO = parseInt(arguments[3], 10);
                this.credit = parseInt(arguments[4], 10);
                this.todayGold = parseInt(arguments[5], 10);
            }
            var _form = $(_opt.selector.form), 
                _gold = _form.find(_opt.selector.gold),
                _cancel = _form.find(_opt.selector.cancel),
                _submit = _form.find(_opt.selector.submit),
                _odds = _form.find(_opt.selector.odds),
                _win = $(_opt.selector.wingold);
            this._form = _form.get(0);
            this._goldInp = _gold.get(0);
            this._btnCancel = _cancel.get(0);
            this._btnSend = _submit.get(0);
            this._goldInp.onkeypress = this.onGoldKp;
            this._goldInp.onkeyup = function () {
                (me.onGoldKu) && me.onGoldKu.call(this, me);
            }
            if (this._goldInp.value != '') {
                (me.onGoldKu) && me.onGoldKu.call(this, me);
            }
            this._goldInp.onblur = function () {
                (me.onGoldBlr) && me.onGoldBlr.call(this);
            }
            this._btnSend.onclick = function () {
                me.onBetChk();
            }
            this._btnCancel.onclick = function () {
                me.onBackClk();
            }
            //綁定按Enter event
            var _Bet = 0;
            this._form.onkeypress = function (e) {
                e = e || window.event
                var _key = (window.event) ? e.keyCode : e.which;
                if (_key == 13 && _Bet == 0) {
                    _Bet = 1;
                    setTimeout(function (){ _Bet = 0;}, 1000);
                    (me.onBetChk) && me.onBetChk();
                }
            };
            if (_win.length) {
                this._winGoldTag = _win.get(0);
                this._oddsInp = _odds.get(0);
            }
            (timeBack) && clearTimeout(timeBack);
            timeBack = setTimeout(_back, 45000);
            self.GoldUI.installInput(_gold);
            this._goldInp.focus();
        },
        /**
         * 初始化正碼過關下注函式
         */
        initNap : function () {
            var me = this;
            var _form = $(_opt.selector.form), 
                _gold = _form.find(_opt.selector.gold),
                _cancel = _form.find(_opt.selector.cancel),
                _submit = _form.find(_opt.selector.submit),
                _teamcount = _form.find(_opt.selector.teamcount),
                _win = $(_opt.selector.wingold);
            this._form = _form.get(0);
            this._goldInp = _gold.get(0);
            this._btnCancel = _cancel.get(0);
            this._btnSend = _submit.get(0);
            this._goldInp.onkeypress = this.onGoldKp;
            this._goldInp.onkeyup = function () {
                me.onNapKu && me.onNapKu.call(this, me);
            }
            if (this._goldInp.value != '') {
                me.onNapKu && me.onNapKu.call(this, me);
            }
            this._goldInp.onblur = function () {
                (me.onGoldBlr) && me.onGoldBlr.call(this);
            }
            if (typeof(window.orientation) != 'undefined') {
                this._goldInp.addEventListener('blur', function () { window.scrollTo(0,1); }, false);
            }
            this._btnSend.onclick = function () {
                me.onNapChk();
            }
            this._btnCancel.onclick = function () {
                me.onBackClk();
            }
            var _Bet = 0;
            this._form.onkeypress = function (e) {
                e = e || window.event
                var _key = (window.event) ? e.keyCode : e.which;
                if (_key == 13 && _Bet == 0) {
                    _Bet = 1;
                    setTimeout(function (){ _Bet = 0;}, 1000);
                    (me.onNapChk) && me.onNapChk();
                }
            };
            if (_win.length) {
                this._winGoldTag = _win.get(0);
            }
            this.teamcount = _teamcount.val();
            if (this.teamcount <= 1) {
                this._btnSend.disabled = true;
                this._btnCancel.disabled = true;
            }
            if (arguments.length > 0) {
                this.gMin = arguments[0];
                this.gMax = arguments[1];
                this.SC = arguments[2];
                this.SO = arguments[3];
                this.credit = arguments[4];
                this.todayGold = arguments[5];
            }
            $(_opt.selector.nap_del).bind('click', function () {
                (me.onBtnDelClk) && me.onBtnDelClk.call(this);
            });
            (timeBack) && clearTimeout(timeBack);
            timeBack = setTimeout(_back, 45000);
            self.GoldUI.installInput(_gold);
            this._goldInp.focus();
        },
        /**
         * 初始化下注函式
         */
        initLx : function () {
            var me = this;
            var _form = $(_opt.selector.form), 
                _gold = _form.find(_opt.selector.gold),
                _cancel = _form.find(_opt.selector.cancel),
                _submit = _form.find(_opt.selector.submit),
                _odds = _form.find(_opt.selector.odds),
                _win = $(_opt.selector.wingold);
            this._form = _form.get(0);
            this._goldInp = _gold.get(0);
            this._btnCancel = _cancel.get(0);
            this._btnSend = _submit.get(0);
            this._goldInp.onkeypress = this.onGoldKp;
            this._goldInp.onkeyup = function () {
                (me.onLxKu) && me.onLxKu.call(this, me);
            }
            if (this._goldInp.value != '') {
                (me.onLxKu) && me.onLxKu.call(this, me);
            }
            this._goldInp.onblur = function () {
                (me.onGoldBlr) && me.onGoldBlr.call(this);
            }
            if (typeof(window.orientation) != 'undefined') {
                this._goldInp.addEventListener('blur', function () { window.scrollTo(0,1); }, false);
            }
            this._btnSend.onclick = function () {
                me.onBetChk();
            }
            this._btnCancel.onclick = function () {
                me.onBackClk();
            }
            var _Bet = 0;
            this._form.onkeypress = function (e) {
                e = e || window.event
                var _key = (window.event) ? e.keyCode : e.which;
                if (_key == 13 && _Bet == 0) {
                    _Bet = 1;
                    setTimeout(function (){ _Bet = 0;}, 1000);
                    (me.onBetChk) && me.onBetChk();
                }
            };
            if (_win.length) {
                this._winGoldTag = _win.get(0);
                this._oddsInp = _odds.get(0);
            }
            if (arguments.length > 0) {
                this.gMin = arguments[0];
                this.gMax = arguments[1];
                this.SC = arguments[2];
                this.SO = arguments[3];
                this.credit = arguments[4];
                this.todayGold = arguments[5];
                this.aOdds = arguments[6];
            }
            (timeBack) && clearTimeout(timeBack);
            timeBack = setTimeout(_back, 45000);
            self.GoldUI.installInput(_gold);
            this._goldInp.focus();
        },
        /**
         * 初始化動態下注
         */
        initActive : function (fm) {
            var me = this, _selector = _opt.selector;
            this._form = fm;
            var _foc = function () {this.select();};
            this._goldGrp = {};
            this._oddsGrp = {};
            var _keyup = function () {
                (me.onBetAKu) && (me.onBetAKu.call(this, me));
            };
            this.jqBall49 = $(_selector.ball49);
            this.jqBall49.removeClass(_opt.class_name.ball);
            this.jqRpGold = $(_selector.rpGold);
            //(!_replaceGold) && (this.jqRpGold.parent('label').hide());
            this.jqRpGold.parent('label').hide();
            this.jqRpGold.die().live('click', function () {
                (me.onRpGoldClk) && (me.onRpGoldClk.call(this, me));
            });
            //綁定金額與賠率input
            var _reg = _opt.reg, 
                _regG = _reg.gold, 
                _regO = _reg.odds; 
            $(_selector.active_gold, this._form).each(function() {
                this.onfocus = _foc;
                this.onkeypress = me.onGoldKp;
                this.onkeyup = _keyup;
                this.onchange = _keyup;
                var _r = _regG.exec(this.name);
                if (_r) {
                    var stringConcede =  _r[1];
                    me._goldGrp[stringConcede] = this;
                }
                //maxlength
                (this.type == 'text') && (this.maxLength = 8);
            });
            $(_selector.active_odds, this._form).each(function() {
                var _r = _regO.exec(this.name);
                if (_r) {
                    var stringConcede =  _r[1];
                    me._oddsGrp[stringConcede] = this;
                }
            });
            var _total = $(_selector.total);
            if (_total.length) {
                this._totalTag = _total.get(0);
                this._totalTag.innerHTML = '0.00';
            }
            var _grpGold = $(_selector.grpGold);
            if (_grpGold.length) {
                var _betGold = _grpGold.get(0);
                _betGold.onfocus = _foc;
                _betGold.onkeypress = this.onGoldKp;
                _betGold.onkeyup = function () {
                    (me.onRpGoldKu) && (me.onRpGoldKu.call(this, me));
                };
            }
            //綁定下注送出事件
            $(_selector.active_send).die().live('click', function () {
                (me.onBetAClk) && me.onBetAClk.call(this, me);
            });
            this._form.onreset = function () {
                (me._totalTag) && ($(me._totalTag).html('0.00'));
                (me.jqBall49) && (me.jqBall49.removeClass(_opt.class_name.ball));
            };
            //綁定按Enter event
            var _Ent = 0;
            document.onkeyup = function (e) {
                e = e || window.event
                var _key = (window.event) ? e.keyCode : e.which;
                //使用ajax script的玩法rtype
                var _scriptRtype = ['CH', 'NI', 'NAP', 'NX', 'LX'], _g = self.ShowTable.instance(), _rtype = _g.pageRtype;
                if (_key == 13 && _Ent == 0 && ($.inArray(_rtype, _scriptRtype) < 0)) {
                    _Ent = 1;
                    setTimeout(function (){ _Ent = 0;}, 1000);
                    (me.onBetAClk) && me.onBetAClk.call(me._form.btnBet, me);
                }
            };
            //綁定快選事件
            var _quickClick = function () {
                (me.onQuickAtagClk) && me.onQuickAtagClk.call(this, me);
            };
            var _set = ['odd', 'even', 'over', 'under', 'sodd', 'seven', 'sover', 'sunder', 'r', 'b', 'g', 'rodd', 'reven', 'rover', 'runder', 'bodd', 'beven', 'bover', 'bunder', 'godd', 'geven', 'gover', 'gunder', 'h0', 'h1', 'h2', 'h3', 'h4', 'f0', 'f1', 'f2', 'f3', 'f4', 'f5', 'f6', 'f7', 'f8', 'f9', 'a1', 'a2', 'a3', 'a4', 'a5', 'a6', 'a7', 'a8', 'a9', 'aa', 'ab', 'ac'];
            $(_selector.grpBtn).each(function (i) {
                if (typeof this.x == 'undefined') {
                    if (i < 49) {
                        this.x = this.innerHTML;
                    } else {
                        this.x = _set[i - 49];
                    }
                }
                this.onclick = _quickClick;
            });
            //詳細設定
            $(_selector.dtShow).unbind('click').bind('click', function () {
                self.ViewBox.single(this);
                return false;
            });
        },
        /**
         * 快速模式初始化
         */
        initFast : function () {
            var _this = this;
            if (arguments.length > 0) {
                this.rtypeGrp = arguments[0];
                this.fastTable = arguments[1];
                this.paintTable();
                this.gMin = arguments[2];
                this.gMax = arguments[3];
                this.SO = arguments[4];
                this.credit = arguments[5];
            }
            this._form = document.quickForm;
            this._goldInp = $('#gold');
            document.getElementById('gold').onkeypress = this.onGoldKp;
            this._btnCancel = $('input#btnCancel');
            this._btnSend = $('input#btnSubmit');
            $('#ok').click(function () {
                (_this.onOkClk) && _this.onOkClk.call(this, _this);
            });
            //綁定快選key
            var _key = ['odd', 'even', 'over', 'under', 'sodd', 'seven', 'sover', 'sunder', 'r', 'b', 'g', 'rodd', 'reven', 'rover', 'runder', 'godd', 'geven', 'gover', 'gunder', 'bodd', 'beven', 'bover', 'bunder', 'a1', 'a2', 'a3', 'a4', 'a5', 'a6', 'a7', 'a8', 'a9', 'aa', 'ab', 'ac', 'h0', 'h1', 'h2', 'h3', 'h4', 'f0', 'f1', 'f2', 'f3', 'f4', 'f5', 'f6', 'f7', 'f8', 'f9', 'all', 'not'];
            $('div#QuickBtn > div.cc > a').each(function (i) {
                this.x = _key[i];
                this.onclick = function () {
                    (_this.onFastAtagClk) && _this.onFastAtagClk.call(this, _this);
                }
            });
            this._btnCancel.click(function () {_back();});
            $("#left input[name='clear']").click(function () {
                var w = document.getElementById('wagers_list'), i;
                while (w.length > 0) {
                    w.remove(0);
                }
                document.getElementById("ok").disabled = false;
            });
            this._btnSend.click(function () {
                (_this.onFastSend) && _this.onFastSend.call(_this._form, _this);
            });
            self.GoldUI.installInput($(this._goldInp));
        },
        /**
         * 包組下注初始化
         */
        initGrp : function () {
            var me = this, _selector = _opt.selector;
            var _form = $(_selector.grp_form); 
            this._form = _form.get(0);
            if (arguments.length > 0) {
                this.rtypeGrp = arguments[0];
                this.gMin = arguments[1];
                this.gMax = arguments[2];
                this.SO = arguments[3];
                this.credit = arguments[4];
            }
            var _foc = function () {this.select();};
            var aConcede =  $(_selector.grp_concede, this._form);
            this._oddsGrp = $(_selector.grp_odds, this._form);
            this._goldGrp = $(_selector.grp_gold, this._form);
            this._goldGrp.each(function() {
                this.onfocus = _foc;
                this.onkeypress = me.onGoldKp;
            });
            $(_selector.light_td).removeClass(_opt.class_name.light);
            aConcede.each(function () {
                $((this.value).replace(_opt.reg.light_bg, _opt.reg.light_bg_r)).addClass(_opt.class_name.light);
            });
            var _click =  function () {
                (me.fillAsMe) && me.fillAsMe.call(me._goldGrp[this.x], me);
            }
            var fillTag = $(_selector.fill);
            fillTag.each(function(i){
                this.x = i;
                this.onclick = _click;
            });
            this._btnCancel = $(_selector.grp_cancel);
            this._btnCancel.click(function () {
                clearGrp();
                _back();
            });
            this._btnSend = $(_selector.grp_submit);
            this._btnSend.click(function () {
                (me.onGrpSend) && me.onGrpSend.call(me._form, me);
            });
            var _Bet = 0;
            this._form.onkeypress = function (e) {
                e = e || window.event
                var _key = (window.event) ? e.keyCode : e.which;
                if (_key == 13 && _Bet == 0) {
                    _Bet = 1;
                    setTimeout(function (){ _Bet = 0;}, 1000);
                    (me.onGrpSend) && me.onGrpSend.call(me._form, me);
                }
            };
            (timeBack) && clearTimeout(timeBack);
            timeBack = setTimeout(function () {
                clearGrp();
                _back();
            }, 45000);
            self.GoldUI.installInput(this._goldGrp);
        },
        /**
         * 填滿所有金額
         * @param me betSpace.bet物件
         */
        fillAsMe : function (me) {
            var G = this.value;
            me._goldGrp.each(function () {
                this.value = G;
            });
        },
        /**
         * 畫快速下注的表格
         */
        paintTable : function () {
            if (this.fastTable && this.fastTable.tagName.toUpperCase() == 'TABLE') {
                var me = this;
                var _tbody = document.createElement('tbody'), _tr = document.createElement('tr'), _td = document.createElement('td'), _span = document.createElement('span');
                var tbodys = this.fastTable.getElementsByTagName('tbody');
                while (tbodys.length) {
                    this.fastTable.removeChild(tbodys[0]);
                }
                var tbody = _tbody.cloneNode(1), tr, td, span, _numb;
                $(_td).attr('class', 'ball_td');
                for (var i = 1; i <= 10; i++) {
                    tr = _tr.cloneNode(1);
                    for (var j = 0; j <=4; j++) {
                        _numb = (('0' + (10 * j + i)).match(/[0-9]{2}$/i)).toString();
                        td = _td.cloneNode(1);
                        if (_numb == '50') {
                            td.innerHTML = '&nbsp;';
                        } else {
                            span = _span.cloneNode(1);
                            span.innerHTML = _numb;
                            span.setAttribute('id', 'Ball' + _numb);
                            //色彩
                            if ($.inArray(_numb,_select.r) >= 0) {
                                span.style.color = 'red';
                            } else if ($.inArray(_numb,_select.g) >= 0) {
                                span.style.color = 'green';
                            } else {
                                span.style.color = 'blue';
                            }
                            span.onclick = function () {
                                (me.onSpanClk) && me.onSpanClk.call(this);
                            }
                            td.appendChild(span);
                        }
                        tr.appendChild(td);
                    }
                    tbody.appendChild(tr);
                }
                this.fastTable.appendChild(tbody);
            }
        },
        /**
         * 點擊快選號碼事件
         */
        onSpanClk : function () {
            if (this.x != 1) {
                this.style.backgroundColor = '#ffff00';
                this.x = 1;
            } else {
                this.style.backgroundColor = '';
                this.x = 0;
            }
        },
        /**
         * 快速下注點擊ok
         * @param me betSpace.bet物件
         */
        onOkClk : function (me) {
            var G = me._goldInp.val();
            if (G == '') {
                me._goldInp.focus();
                new_alert(Lang('pls_key_amount'));
                return false
            }
            if (isNaN(parseInt(G)) == true) {
                me._goldInp.focus();
                new_alert(Lang('MSG_ONLY_INPUT_NUMBER'));
                return false
            }
            G = parseInt(G, 10);
            if (G < me.gMin) {
                me._goldInp.focus();
                new_alert(Lang('amount_under'));
                return false
            }
            if (G > me.gMax) {
                me._goldInp.focus();
                new_alert(Lang('amount_max') + ' : ' + me.gMax);
                return false
            }
            if (G > me.SO) {
                me._goldInp.focus();
                new_alert(Lang('amount_sg_bet'));
                return false
            }
            if (G > me.credit) {
                me._goldInp.focus();
                new_alert(Lang('amount_ov_credit'));
                return false
            }
            var _sel = selectBall();
            if (_sel.length == 0) {
                new_alert(Lang('Msg2_Quick'));
                return false;
            }
            var _odds, wadd, wtitle, wtext, wvalue;
            switch(me.rtypeGrp){
                case 'SP':
                    wtitle = Lang('game_type3');
                    break;
                case 'NA':
                    wtitle = Lang('game_type7');
                    break;
                case 'N1':
                    wtitle = Lang('game_type8_1');
                    break;
                case 'N2':
                    wtitle = Lang('game_type8_2');
                    break;
                case 'N3':
                    wtitle = Lang('game_type8_3');
                    break;
                case 'N4':
                    wtitle = Lang('game_type8_4');
                    break;
                case 'N5':
                    wtitle = Lang('game_type8_5');
                    break;
                case 'N6':
                    wtitle = Lang('game_type8_6');
                    break;
                default:
                    wtitle = 'Error';
                    break;
            }
            if (wtitle != 'Error') {
                for (var i = 0, max = _sel.length; i < max; i++) {
                    if (document.getElementById(me.rtypeGrp + _sel[i])) {
                        _odds = document.getElementById(me.rtypeGrp + _sel[i]).innerHTML;
                    } else {
                        _back();
                    }
                    wtext = wtitle + _sel[i] + ',' + _odds + ',$' + G;
                    wvalue =  _sel[i] + ':' + _odds + '\+' + G;
                    wadd = new Option(wtext, wvalue);
                    document.getElementById('wagers_list').options.add(wadd);
                    me.onSpanClk.call(document.getElementById('Ball' + _sel[i]));
                }
                me._goldInp.val('');
                this.disabled = true;
            }
        },
        /**
         * 動態下注送出函式
         * @param me betSpace.bet物件
         */
        onBetAClk : function (me) {
            if($(window.parent.frames["topFrame"].document).find("#user_money").length>0 && $(window.parent.frames["topFrame"].document).find("#user_money").html()=="" || $(window.parent.frames["topFrame"].document).find("#username").length!=0){
                alert("您还未登录，请先登录再投注。");
                return;
            }
            var _win = 0, _gold, _odds, _total = 0, _reg = /^[0-9]+$$/;
            var _gMin;
            var _gMax;
            if (me.lock == true) {
                return false;
            }
            for ( var k in me._goldGrp) {
                _gold = me._goldGrp[k].value;
                _odds = me._oddsGrp[k].value;
                if (_gold != '') {
                    if (!_reg.test(_gold)) {
                        new_alert(Lang('MSG_IntegerOnly'));
                        return false;
                    }
                    _win += _gold * (_odds - 1);
                    _total += parseInt(_gold, 10);
                    _gMin = me.gMin;
                    _gMax = me.gMax;
                    if(!(_gMin>1)){
                        _gMin = document.getElementById("gold_gmin").value;
                    }
                    if(!(_gMax>1)){
                        _gMax = document.getElementById("gold_gmax").value;
                    }
                    if(parseInt(_gMin) > _gold){
                        new_alert(Lang('amount_under') + ' : '  + _gMin);
                        return false;
                    }
                    if(parseInt(_gMax) < _gold){
                        new_alert(Lang('amount_max') + ' : '  + _gMax);
                        return false;
                    }
                }
            }
            if (me.creditTag) {
                if (_total > parseInt(me.creditTag.innerHTML, 10)) {
                    new_alert(Lang('amount_ov_credit'));
                    return false;
                }
            }
            if (_win == 0) {
                new_alert(Lang('MSG_PLZ_CHK_UnChked'));
                return false;
            }
            _win = _win.toFixed(2);
            var _btn = this, _this = me, _fn = function () {
                _btn.disabled = true;
                me.lock = true;
                $.ajax({
                    url : _this._form.action,
                    type : 'POST',
                    data : $(_this._form).serialize(),
                    timeout : 10000,
                    error : function () {
                        _btn.disabled = false;
                        new_alert(Lang('NetworkAnomaly')+'_00_'+_this._form.action);
                        me.lock = false;
                    },
                    dataType : 'script',
                    complete : function () {
                        _btn.disabled = false;
                        me.lock = false;
                    },
                    success: function(response){
                        if(document.newForm){
                            document.newForm.reset();
                        }
                        new_alert(Lang('OperateSuccess'));
                        document.getElementById("bet-credit").innerHTML = response;
                    }
                });
            };

            new_confirm(Lang('word_bet_gold')+ ":" + _total + "\n", _fn );
        },
        /**
         * 下注檢查
         */
        onBetChk : function () {
            var G = this._goldInp.value;
            if (this.lock == true) {
                return false;
            }
            if (G == '') {
                this._goldInp.focus();
                new_alert(Lang('pls_key_amount'));
                return false;
            }
            if (isNaN(parseInt(G)) == true) {
                this._goldInp.focus();
                new_alert(Lang('MSG_ONLY_INPUT_NUMBER'));
                return false;
            }
            G = parseInt(G,10);
            if (G < this.gMin) {
                this._goldInp.focus();
                new_alert(Lang('amount_under') + ' : ' + this.gMin);
                return false;
            }
            if (G > this.gMax) {
                this._goldInp.focus();
                new_alert(Lang('amount_max') + ' : ' + this.gMax);
                return false;
            }
//            if (G > this.SO) {
//                this._goldInp.focus();
//                new_alert(Lang('amount_sg_bet') + ' : ' + this.SO);
//                return false;
//            }
//            if (G > this.SC) {
//                this._goldInp.focus();
//                new_alert(Lang("lt_amount_ov_sum_game") + " : " + this.todayGold + "\n" + Lang("lt_amount_sum_game") + "!!");
//                return false;
//            }
            if (this._winGoldTag.innerHTML > 1000000 && this.millionLimit) {
                new_alert(Lang('max_payout'));
                return false;
            }
            if (G > this.credit) {
                this._goldInp.focus();
                new_alert(Lang('amount_ov_credit'));
                return false;
            }
            var _ok = this._btnSend, _no = this._btnCancel, _form = this._form, me = this, _fn = function () {
                _ok.disabled = true;
                _no.disabled = true;
                me.lock = true;
                $.ajax({
                    url : _form.action,
                    type : 'POST',
                    data : $(_form).serialize(),
                    timeout : 10000,
                    error : function () {
                        _ok.disabled = false;
                        _no.disabled = false;
                        new_alert(Lang('NetworkAnomaly')+'_01_');
                        me.lock = false;
                    },
                    dataType : 'script',
                    complete : function () {
                        me.lock = false;
                    },
                    success: function(response){
                        if(document.newForm){
                            document.newForm.reset();
                        }
                        new_alert(Lang('OperateSuccess'));
                        document.getElementById("bet-credit").innerHTML = response;
                    }
                });
            };
            var selectNumber = ($("input[name=total_count]") && $("input[name=total_count]").val()) || 1;
            new_confirm(Lang('word_bet_gold') + ":" + G*selectNumber +"\n", _fn);
        },
        /**
         * 正碼過關下注檢查
         */
        onNapChk : function () {
            var G = this._goldInp.value;
            if (this.lock == true) {
                return false;
            }
            if (this.teamcount <= 1) {
                new_alert(Lang('ov_oneteam'));
                return false;
            }
            if (this.teamcount >= 9) {
                new_alert(Lang('overflow_oneteam'));
                return false;
            }
            if (this._winGoldTag.innerHTML > 1000000) {
                new_alert(Lang('max_payout'));
                return false;
            }
            if (G == '') {
                this._goldInp.focus();
                new_alert(Lang('pls_key_amount'));
                return false;
            }
            if (isNaN(parseInt(G)) == true) {
                this._goldInp.focus();
                new_alert(Lang('MSG_ONLY_INPUT_NUMBER'));
                return false;
            }
            G = parseInt(G,10);
            if (G < this.gMin) {
                this._goldInp.focus();
                new_alert(Lang('amount_under') + ' : ' + this.gMin);
                return false;
            }
            if (G > this.gMax) {
                this._goldInp.focus();
                new_alert(Lang('amount_max') + ' : ' + this.gMax);
                return false;
            }
//            if (G > this.SO) {
//                this._goldInp.focus();
//                new_alert(Lang('amount_sg_bet') + ' : ' + this.SO);
//                return false;
//            }
//            if (G > this.SC) {
//                this._goldInp.focus();
//                new_alert(Lang("lt_amount_ov_sum_game") + " : " + this.todayGold + "\n" + Lang("lt_amount_sum_game") + "!!");
//                return false;
//            }
            if (G > this.credit) {
                this._goldInp.focus();
                new_alert(Lang('amount_ov_credit'));
                return false;
            }
            var _ok = this._btnSend, _no = this._btnCancel, _form = this._form, me = this, _fn = function () {
                _ok.disabled = true;
                _no.disabled = true;
                me.lock = true;
                $.ajax({
                    url : _form.action,
                    type : 'POST',
                    data : $(_form).serialize(),
                    timeout : 10000,
                    error : function () {
                        _ok.disabled = false;
                        _no.disabled = false;
                        new_alert(Lang('NetworkAnomaly')+'_02_');
                        me.lock = false;
                    },
                    dataType : 'script',
                    complete : function () {
                        me.lock = false;
                    },
                    success: function(response){
                        if(document.newForm){
                            document.newForm.reset();
                        }
                        new_alert(Lang('OperateSuccess'));
                        document.getElementById("bet-credit").innerHTML = response;
                    }
                });
            };
            new_confirm(Lang('word_bet_gold') + ":" + G +"\n", _fn);
        },
        /**
         * 點擊取消事件
         */
        onBackClk : function () {
            _back();
        },
        /**
         * 檢查是否輸入數字
         * @param event
         */
        onGoldKp : function (e){
            e = e || window.event;
            var KeyIn = (window.event) ? e.keyCode : e.which;
            if( KeyIn == 13) return true;
            if( ( KeyIn < 48 || KeyIn > 57 ) && ( KeyIn > 95 || KeyIn < 106 ) && KeyIn != 0 ){
                new_alert(Lang('MSG_ONLY_INPUT_NUMBER'));
                return false;
            }
            if ((this.type == 'number') && (this.value.length >= 8)) {
                return false;
            }
        },
        /**
         * 計算可贏金額
         * @param me space.bet物件
         */
        onGoldKu : function (me) {
            if (this.value == '') {
                this.focus();
            } else {
                if(me._oddsInp){
                    (me._winGoldTag) && (me._winGoldTag.innerHTML = (this.value * me._oddsInp.value / 1000 - this.value).toFixed(2));
                }
            }
        },
        /**
         * 計算正碼過關可贏金額
         * @param me space.bet物件
         */
        onNapKu : function (me) {
            var aChk = [], _count = me.teamcount, _reg = _opt.reg.nap_inp;
            $(_opt.selector.nap_odds).each(function () {
                if (_reg.test(this.name)) {
                    aChk.push(this.value);
                }
            });
            if (this.value != '') {
                var _gold = parseFloat(this.value), _odds = 1;
                for (i = 0; i < _count; i++) {
                    _odds *= parseFloat(aChk[i]/1000);
                }
                (me._winGoldTag) && (me._winGoldTag.innerHTML = (_gold * _odds - _gold).toFixed(2));
            }
        },
        /**
         * 計算連肖連尾可贏金額
         * @param me space.bet物件
         */
        onLxKu : function (me) {
            if (this.value == '') {
                this.focus();
            } else {
                var _G = this.value, _T = 0;
                for (var i = 0, t = me.aOdds.length; i < t; i++) {
                    _T += Math.round(_G * (me.aOdds[i] - 1) * 100) / 100;
                }
                (me._winGoldTag) && (me._winGoldTag.innerHTML = _T.toFixed(2));
            }
        },
        /**
         * 檢查下注金額否是為2進位數字
         */
        onGoldBlr : function () {
            var StrValue = this.value;
            if(StrValue.charAt(0) == "0"){
                this.value = parseInt(StrValue,10);
            }
        },
        /**
         * 刪除正碼過關串數
         * @params idx 索引
         */
        onBtnDelClk : function () {
             var _form = this.form;
             $.ajax({
                 url:_opt.url.nap,
                 type : 'POST',
                 data : $(_form).serialize() + '&del' + this.name + '=' + this.value,
                 dataType : 'script'
             });
        },
        /**
         * 動態下注點擊 「快選」 的事件
         * @param me betSpace.bet物件
         */
        onQuickAtagClk : function (me) {
            var rtype = me.rtypeGrp;
            if (_opt.reg.quick_rtype.test(rtype)) {
                return false;
            }
            //選取的號碼陣列
            var _sel = getQuickAry(this.x), _betNumber, _betGold = $(_opt.selector.grpGold).val(),_reg = /^[0-4]{1}[0-9]{1}$/;
            if (_betGold == '' || parseInt(_betGold, 10) == 0) {
                new_alert(Lang('pls_key_amount'));
                return false;
            }
            for (var i = 0, t = _sel.length; i < t; i++) {
                _betNumber = rtype + _sel[i];
                me._goldGrp[_betNumber].value = _betGold;
            }
            //ball49檢查
            if (_reg.test(this.x)) {
                var _concede = rtype + _sel[0];
                me.onBall49Chk(this, _concede);
            }
            me.onBetAKu(me);
        },
        /**
         * 快速下注點擊 「快選」 的事件
         * @param me betSpace.bet物件
         */
        onFastAtagClk : function (me) {
            var rtype = me.rtypeGrp;
            if ($.inArray(rtype, ['SP', 'NA', 'N1', 'N2', 'N3', 'N4', 'N5', 'N6']) < 0) {
                return false;
            }
            //選取的號碼陣列
            if (this.x == 'all') {
                var n, s;
                for ( var i = 1; i <= 49; i++) {
                    n = (('0' + i).match(/[0-9]{2}$/i)).toString();
                    s = document.getElementById('Ball' + n);
                    (me.onSpanClk) &&  me.onSpanClk.call(s);
                }
            } else if (this.x == 'not') {
                var n, s;
                for ( var i = 1; i <= 49; i++) {
                    n = (('0' + i).match(/[0-9]{2}$/i)).toString();
                    s = document.getElementById('Ball' + n);
                    (s.x == 1) && me.onSpanClk.call(s);
                }
            } else {
                var _sel = getQuickAry(this.x);
                for ( var i = 0, t = _sel.length; i < t; i++) {
                    me.onSpanClk.call(document.getElementById('Ball' + _sel[i]));
                }
            }
        },
        /**
         * 快速下注檢查
         * @param me betSpace.bet物件
         */
        onFastSend : function (me) {
            me._btnCancel.attr('disabled', true);
            me._btnSend.attr('disabled', true);
            var wagers = '', wlist = '', total = 0, w = document.getElementById('wagers_list');
            if (w.length == 0)  {
                new_alert(Lang('Msg2_Quick'));
                me._btnCancel.attr('disabled', false);
                me._btnSend.attr('disabled', false);
                return false;
            }
            for (var i = 0, max = w.length; i < max; i++) {
                wagers += w.options[i].value + "-";
                wlist = w.options[i].value.split("+");
                total += parseInt(wlist[1], 10);
            }
            if (total > me.credit) {
                new_alert(Lang('amount_ov_credit'));
                me._btnCancel.attr('disabled', false);
                me._btnSend.attr('disabled', false);
                return false
            }
            this.wagerstext.value = me.rtypeGrp + '@' + wagers;
            var _this = me, _form = this, _ok = function () {
                $.ajax({
                    url:_form.action,
                    type : 'POST',
                    data : $(_form).serialize(),
                    dataType : 'script'
                });
            }, _no = function () {
                _this._btnCancel.attr('disabled', false);
                _this._btnSend.attr('disabled', false);
            };
            new_confirm(Lang('word_bet_gold') + ":" + total + "\n", _ok, _no);
        },
        /**
         * 包組下注檢查
         * @param me betSpace.bet物件
         */
        onGrpSend : function (me) {
            if (me.lock == true) {
                return false;
            }
            me._btnCancel.attr('disabled', true);
            me._btnSend.attr('disabled', true);
            var _err = 0;
            var _G = 0;
            me._goldGrp.each(function () {
                var G = this.value;
                if (G == '') {
                    me._btnCancel.attr('disabled', false);
                    me._btnSend.attr('disabled', false);
                    this.focus();
                    new_alert(Lang('pls_key_amount'));
                    _err++;
                    return false
                }
                if (isNaN(parseInt(G)) == true) {
                    me._btnCancel.attr('disabled', false);
                    me._btnSend.attr('disabled', false);
                    this.focus();
                    new_alert(Lang('MSG_ONLY_INPUT_NUMBER'));
                    _err++;
                    return false
                }
                G = parseInt(G, 10);
                if (G < me.gMin) {
                    me._btnCancel.attr('disabled', false);
                    me._btnSend.attr('disabled', false);
                    this.focus();
                    new_alert(Lang('amount_under') + ' : ' + me.gMin);
                    _err++;
                    return false
                }
                if (G > me.gMax) {
                    me._btnCancel.attr('disabled', false);
                    me._btnSend.attr('disabled', false);
                    this.focus();
                    new_alert(Lang('amount_max') + ' : ' + me.gMax);
                    _err++;
                    return false
                }
//                if (G > me.SO) {
//                    me._btnCancel.attr('disabled', false);
//                    me._btnSend.attr('disabled', false);
//                    this.focus();
//                    new_alert(Lang('amount_sg_bet') + ' : ' + me.SO);
//                    _err++;
//                    return false
//                }
                if (G > me.credit) {
                    me._btnCancel.attr('disabled', false);
                    me._btnSend.attr('disabled', false);
                    this.focus();
                    new_alert(Lang('amount_ov_credit') + ' : ' + me.credit);
                    _err++;
                    return false
                }
                _G += parseInt(G, 10);
            });
            var _this = me, _form = this, _ok = function () {
                me.lock = true;
                $.ajax({
                    url:_form.action,
                    type : 'POST',
                    data : $(_form).serialize(),
                    timeout : 10000,
                    error : function () {
                        me._btnCancel.attr('disabled', false);
                        me._btnSend.attr('disabled', false);
                        new_alert(Lang('NetworkAnomaly')+'_03_');
                        me.lock = false;
                    },
                    dataType : 'script',
                    complete : function () {
                        me.lock = false;
                    },
                    success: function(response){
                        if(document.newForm){
                            document.newForm.reset();
                        }
                        new_alert(Lang('OperateSuccess'));
                        document.getElementById("bet-credit").innerHTML = response;
                    }
                });
            }, _no = function () {
                _this._btnCancel.attr('disabled', false);
                _this._btnSend.attr('disabled', false);
            };
            if (_err == 0) {
                new_confirm(Lang('word_bet_gold') + ":" + _G + "\n", _ok, _no);
            }
        },
        /**
         * 計算下注金額
         * @param me betSpace.bet物件
         */
        onBetAKu : function (me) {
            var _total = 0, _gold, _inp, _reg = _opt.reg, _filterClass, _red = _opt.class_name.ball;
            for (var k in me._goldGrp) {
                _inp = me._goldGrp[k]
                if (_inp.value != '') {
                    _gold = parseInt(_inp.value, 10);
                    _total += _gold;
                }
                if (_reg.ball49.test(k) && _replaceGold) {
                    _filterClass = k.replace(_reg.ballReg, ".b$2");
                    if (_inp.value != '') {
                        me.jqBall49.filter(_filterClass).addClass(_red);
                    } else {
                        me.jqBall49.filter(_filterClass).removeClass(_red);
                    }
                }
            }
            (me._totalTag) && (me._totalTag.innerHTML = _total.toFixed(2));
        },
        /**
         * 快選49個球號檢查
         */
        onBall49Chk : function (aTag, key) {
            var _class = _opt.class_name.ball;
            if ($(aTag).hasClass(_class)) {
                $(aTag).removeClass(_class);
                this._goldGrp[key].value = '';
            }
        },
        /**
         * 取代金額
         * @param me betSpace.bet物件
         */
        onRpGoldClk : function (me) {
            if (this.checked) {
                var _selector = _opt.selector, _betGold = _betGold = $(_selector.grpGold).val();   
                if (_betGold != '') {
                    me.jqBall49.filter('.' + _opt.class_name.ball).each(function () {
                        me._goldGrp[me.rtypeGrp + this.innerHTML].value = _betGold;
                    });
                    me.onBetAKu(me);
                }
            } 
        },
        /**
         * 取代金額keyup
         * @param me betSpace.bet物件
         */
        onRpGoldKu : function (me) {
            if (me.jqRpGold.attr('checked')) {
                var _selector = _opt.selector, _betGold = this.value;   
                if (_betGold != '') {
                    me.jqBall49.filter('.' + _opt.class_name.ball).each(function () {
                        me._goldGrp[me.rtypeGrp + this.innerHTML].value = _betGold;
                    });
                    me.onBetAKu(me);
                }
            } 
        },
        /**
         * 設定option
         * @param type option類型
         * @param key option key
         * @param val option value 
         */
        setOption : function (type, key , val) {
            if (type == null || key == null || val == null) {
                return false;
            }
            if ($.inArray(type, ['url', 'reg', 'class_name', 'selector']) < 0) {
                return false;
            }
            if (typeof _opt[type][key] != 'undefined') {
                _opt[type][key] = val;
            }
        },
        /**
         * 設定option 陣列
         * @param type option類型
         * @param ary option array 
         */
        setTypeOption : function (type, ary) {
            if (type == null || ary == null || typeof ary == 'string') {
                return false;
            }
            if ($.inArray(type, ['url', 'reg', 'class_name', 'selector']) < 0) {
                return false;
            }
            for (var k in _opt[type]) {
                if (typeof ary[k] != 'undefined') {
                    this.setOption(type, k, ary[k]);
                }
            }
        },
        /**
         * 設定option 陣列
         * @param ary option array 
         */
        setAllOption : function (ary) {
            for (var k in _opt) {
                if (typeof ary[k] != 'undefined') {
                    this.setTypeOption(k, ary[k]);
                }
            }
        }
    }
})(betSpace);



