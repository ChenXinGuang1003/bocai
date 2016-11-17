var betSpace = betSpace || {};
(function(space){
    //現在的gtype
    var nowGtype = 'CQ';
    //多重限額rtype
    var _multAry = ['535','616','617','618','514','515','516','601','602','603','589','590','591','620','621','622','623','624','625','626','627','628','629'];
    //option
    var _opt = {
        url : {
            back : "/member/select_$1.php"
        }, 
        reg : {
            back : /(CQ|JX|TJ)/,
            lineRtype : /^(514|515|516)$/
        },
        id : {
            total : 'total_gold' ,
            win : 'pc',
            final_ball : 'ff'
        },
        class_name : {
            on : 'ON'
        },
        selector : {
            grp_d1 : '#B5W1quick > p a.activeA',
            grp_d1_gold : '#qkGoldW1',
            grp_d2_head : '#B5D2quick > p a.activeA',
            grp_d2_end : '#B5D2quick > p a.activeB',
            grp_d2_gold : '#qkGold',
            grp_d2_tk : '#B5D2quick > p#jjomj',
            grp_gold : '#qkGold, #qkGoldW1',
            form : '#left form[name=layoutform]',
            gold_gmin : 'input[name=gold_gmin]',
            gold_gmax : 'input[name=gold_gmax]',
            SC : 'input[name=SC]',
            SO : 'input[name=SO]',
            lineRtype : "input[name='aLRtype[]']",
            rtype : 'input[name=MyRtype]',
            gold: "input[name='gold[]']",
            odds: "input[name='aOdds[]']",
            concede: "input[name='aConcede[]']",
            same : 'input[name=SameBtn]',
            del : 'input[name=DelBtn]',
            submit : 'input[name=btnSubmit]',
            cancel : 'input[name=btnCancel]',
            finish : 'input[name=FINISH]',
            print : 'input[name=PRINT]',
            form_active : '#formB5',
            gold_active : "input.G[name='gold[]']",
            odds_active : "input[name='aOdds[]']",
            num_active : "div.round-table > table.GameTable td.num > label",
            SC_active : "input[name=SC]",
            SO_active : "input[name=SO]",
            gold_gmin_active : "input[name=gold_gmin]",
            gold_gmax_active : "input[name=gold_gmax]",
            credit_active : "input[name=Maxcredit]",
            total_active : "#total_bet",
            cancel_active : '#SendB5 input.cancel_cen[name=Cancel]',
            submit_active : '#SendB5 input.order[name=SubmitA]',
            dt_show : '#limitShow'
        }
    };
    function back() {
        $.ajax({
            url : nowGtype.replace(_opt.reg.back, _opt.url.back),
            dataType : 'script'
        });
    }
    space.BetConfirm = function () {
        var _total = document.BetForm['gold[]'].value, _win = (_total * document.BetForm['aOdds[]'].value - _total).toFixed(2);
        new_confirm(Lang('word_bet_gold') + ":" + _total + "\n", function () {
            $.ajax({
                url : document.BetForm.action,
                type : 'POST',
                data : $(document.BetForm).serialize(),
                dataType : 'script'
            });
        });
    }
    self.BetConfirm = function () {
        space.BetConfirm();
    }
    space.betB5 = function (_gtype) {
        var me = this;
        nowGtype = _gtype;
        var _selector = _opt.selector
        $(_selector.grp_d1).bind('click', function () {
             (me.onW1Click) && me.onW1Click.call(this, me);
        });
        $(_selector.grp_d2_head).bind('click', function () {
            (me.onD2HeadClick) && me.onD2HeadClick.call(this, me);
        });
        $(_selector.grp_d2_end).bind('click', function () {
             (me.onD2EndClick) && me.onD2EndClick.call(this, me);
        });
        this.tickTag = $(_selector.grp_d2_tk);
        var _qk = $(_selector.grp_gold);
        _qk.attr('maxLength', 8).bind('keypress', me.onGoldKp);
        self.GoldUI.installInput(_qk);
    }
    space.betB5.onDragBet = function (_gold, _node) {
        var _form = document.BetForm, _concede = _node.getAttribute('data-concede');
        _form["aConcede[]"].value = _concede;
        var F = _concede.split("-"), BetOdds = 0;
        if (F[1] == "ODD" || F[1] == "EVEN" || F[1] == "OVER" || F[1] == "UNDER" || F[1] == "PRIME" || F[1] == "COMPO") {
            BetOdds = _node.innerHTML;
        } else {
            BetOdds = _node.parentNode.nextSibling.innerHTML;
        }
        _form["aOdds[]"].value = BetOdds;
        _form['gold[]'].value = _gold;
        _form['MyRtype'].value = document.getElementById('sRtype').value;
        _form['gid'].value = document.getElementById('formB5').gid.value;
        (self.betSpace) && self.betSpace.BetConfirm();
    };
    /**
     * 下注完成
     */
    space.betB5.onFinish = function () {
    }
    space.betB5.prototype = {
        //下注表單
        _form : null,
        //金額欄位
        _goldInp : {},
        //賠率欄位
        _oddsInp : {},
        //動態下注金額欄位
        _goldGrp : {},
        //群組賠率欄位
        _oddsGrp : {},
        //群組球號html tag
        _numGrp : {},
        //下注按鈕
        _btnSend : null,
        //取消下注按鈕
        _btnCancel : null,
        //總下注金額金額html tag
        _goldTag : null,
        //可贏金額html tag
        _winGoldTag : null,
        //群組rtype
        rtypeGrp : 605,
        //最低限額
        gMin : null,
        //最高限額
        gMax : null,
        //單注限額
        SO : null,
        //單項號限額
        SC : null,
        //最低限額陣列
        gMinA : {},
        //最高限額陣列
        gMaxA : {},
        //單注限額陣列
        SOA : {},
        //單項號限額陣列
        SCA : {},
        //信用額度
        credit : 0,
        //三字rtype
        lineRtype : {},
        //lock
        lock : false, 
        //已填寫
        tickTag : null,
        /**
         * 初始化下注函式
         */
        init : function () {
            var me = this, _selector = _opt.selector, _form = $(_selector.form);;
            this._form = null;
            (_form.length) && (this._form = _form.get(0));
            (this._form) && (this._form.onsubmit = function () {return false;});
            var _rtype = _form.find(_selector.rtype),
                _gold = _form.find(_selector.gold),
                _odds = _form.find(_selector.odds),
                _gold_gmin = _form.find(_selector.gold_gmin),
                _gold_gmax = _form.find(_selector.gold_gmax),
                _SC = _form.find(_selector.SC),
                _SO = _form.find(_selector.SO),
                _lineRtype = _form.find(_selector.lineRtype),
                _submit = _form.find(_selector.submit),
                _cancel = _form.find(_selector.cancel),
                _finish = _form.find(_selector.finish),
                _print = _form.find(_selector.print),
                _reg = _opt.reg.lineRtype;
            if (arguments.length > 0) {
                this.gMin = parseInt(arguments[0], 10);
                this.gMax = parseInt(arguments[1], 10);
                this.SC = parseInt(arguments[2], 10);
                this.SO = parseInt(arguments[3], 10);
                this.credit = parseInt(arguments[4], 10);
            } 
            (_rtype.length) && (this.rtypeGrp = _rtype.val());
            var multCheck = ($.inArray(me.rtypeGrp, _multAry) >= 0);
            this._goldInp = {};
            this._oddsInp = {};
            var _ku = function () {
                (me.onGoldKeyup) && me.onGoldKeyup.call(this, me);
            }
            _gold.each(function (i) {
                this.onkeypress = me.onGoldKp; 
                this.onkeyup = _ku;
                var stringConcede = this.id;
                me._goldInp[stringConcede] = this;
                me._oddsInp[stringConcede] = $(this.form['aOdds[]'])[i];
                if (multCheck) {
                    me.gMinA[stringConcede] = parseInt(_gold_gmin.get(i).value, 10);
                    me.gMaxA[stringConcede] = parseInt(_gold_gmax.get(i).value, 10);
                    me.SCA[stringConcede] = parseInt(_SC.get(i).value, 10);
                    me.SOA[stringConcede] = parseInt(_SO.get(i).value, 10);
                    if (_reg.test(me.rtypeGrp)) {
                        me.lineRtype[stringConcede] = _lineRtype.get(i).value;
                    }
                }
            });
            var _sam = function(){
                (me.onFillClick) && me.onFillClick.call(this, me);
            }
            var _del = function(){
                (me.onDelClick) && me.onDelClick.call(this, me);
            }
            $(_selector.same, this._form).die().live('click', _sam);
            $(_selector.del, this._form).die().live('click', _del);
            if (_submit.length) {
                this._btnSend = _submit.get(0);
                var _click;
                if (_reg.test(me.rtypeGrp)) {
                    _click = function () {
                        (me.onW3Chk) && me.onW3Chk.call(me._form, me);
                    } 
                } else {
                    _click = function () {
                        (me.onBetChk) && me.onBetChk.call(me._form, me);
                    } 
                }
                this._btnSend.onclick = _click;
                this._btnCancel = _cancel.get(0);
                this._btnCancel.onclick = this.onBackClk;

                //綁定按Enter event
                var _Bet = 0;
                this._form.onkeyup = function (e) {
                    e = e || window.event 
                    var _key = (window.event) ? e.keyCode : e.which;
                    if (_key == 13 && _Bet == 0) {
                        _Bet = 1;
                        setTimeout(function (){ _Bet = 0;}, 1000);
                        _click();
                    }
                };
            }
            (_finish.length) && (_finish.bind('click', this.onBackClk));
            (_print.length) && (_print.bind('click', function () {window.print();}));
            
            (document.getElementById(_opt.id.total)) && (this._goldTag = document.getElementById(_opt.id.total));
            (document.getElementById(_opt.id.win)) && (this._winGoldTag = document.getElementById(_opt.id.win));
            self.GoldUI.installInput(_gold);
        },
        /**
         * 初始化動態下注
         */
        initActive : function () {
            var me = this;
            if (document.getElementById(_opt.id.final_ball)) {
                var _selector = _opt.selector;
                //詳細設定
                var _click = function () {
                    self.ViewBox.single(this);
                    return false;
                };
                $(_selector.dt_show).die().live('click', _click);
                document.onkeyup = function () {};
            } else {
                var _selector = _opt.selector,
                    _form = $(_selector.form_active),
                    _gold = _form.find(_selector.gold_active),
                    _odds = _form.find(_selector.odds_active),
                    _num = _form.find(_selector.num_active),
                    _SC = _form.find(_selector.SC_active),
                    _SO = _form.find(_selector.SO_active),
                    _gold_gmin = _form.find(_selector.gold_gmin_active),
                    _gold_gmax = _form.find(_selector.gold_gmax_active),
                    _credit = _form.find(_selector.credit_active),
                    _submit = _form.find(_selector.submit_active),
                    _cancel = _form.find(_selector.cancel_active),
                    _total = $(_selector.total_active);
                this._form = null;
                (_form.length > 0) && (this._form = _form.get(0));
                if (this._form) {
                    //快選input
                    this._goldGrp = {};
                    this._oddsGrp = {};
                    //快選球號
                    this._numGrp = {};
                    var _isLightNum = _num.length;
                    var _ku = function () {
                        (me.onGoldKu) && (me.onGoldKu.call(this, me));
                    }, _focus = function () {
                        (me.onGoldFoucs) && (me.onGoldFoucs.call(this, me));
                    }, _blur = function () {
                        (me.onGoldBlur) && (me.onGoldBlur.call(this, me));
                    };
                    _gold.each(function(i) {
                        this.onkeypress = me.onGoldKp; 
                        this.onkeyup = _ku; 
                        this.onchange = _ku; 
                        var stringConcede =  this.id;
                        me._goldGrp[stringConcede] = this;
                        me._oddsGrp[stringConcede] = _odds.get(i);
                        if (_isLightNum) {
                            this.onfocus = _focus; 
                            this.onblur = _blur; 
                            me._numGrp[stringConcede] = _num.get(i).parentNode.style;
                        }
                        //maxlength
                        (this.type == 'text') && (this.maxLength = 8);
                    });
                    //限額
                    if (_SC.length > 1) {
                        var _k;
                        for (var i = 0, t = _SC.length; i < t; i++) {
                            _k = _SC[i].className
                            this.SCA[_k] = parseInt(_SC[i].value, 10);
                            this.SOA[_k] = parseInt(_SO[i].value, 10);
                            this.gMaxA[_k] = parseInt(_gold_gmax[i].value, 10);
                            this.gMinA[_k] = parseInt(_gold_gmin[i].value, 10);
                        } 
                    } else {
                        (_SC.length) && (this.SC = parseInt(_SC.val(), 10));
                        (_SO.length) && (this.SO = parseInt(_SO.val(), 10));
                        (_gold_gmax.length) && (this.gMax = parseInt(_gold_gmax.val(), 10));
                        (_gold_gmin.length) && (this.gMin = parseInt(_gold_gmin.val(), 10));
                    }
                    (_credit.length) && (this.credit = parseInt(_credit.val(), 10));
                    //總金額html node
                    (_total.length) && (this._goldTag = _total.get(0));
                    (this._goldTag) && (this._goldTag.innerHTML = '0.00');
                    //可贏金額html node
                    this._winGoldTag = null;
                    var _send = function () {
                        (me.onBetAClk) && me.onBetAClk.call(me._form, me);
                        return false;
                    }
                    if (_submit.length) {
                        this._btnSend = _submit.get(0);
                        this._btnSend.onclick = _send;
                    }
                    (_cancel.length) && (this._btnCancel = _cancel.get(0));
                    //綁定按Enter event
                    var _Ent = 0;
                    document.onkeyup = function (e) {
                        e = e || window.event 
                        var _key = (window.event) ? e.keyCode : e.which;
                        if (_key == 13 && _Ent == 0) {
                            _Ent = 1;
                            setTimeout(function (){ _Ent = 0;}, 1000);
                            (me.onBetAClk) && me.onBetAClk.call(me._form, me);
                        }
                    };
                    //詳細設定
                    var _click = function () {
                        self.ViewBox.single(this);
                        return false;
                    };
                    $(_selector.dt_show).die().live('click', _click);
                }
            }
        },
        /**
         * 綁定三字定位快選下注的event與html node
         */
        initFill : function () {
            var _this = this;
            this._form = document.GameForm;
            //下注金額
            this._goldGrp = $("input.txt[name='bet_gold[]']", this._form);
            //下注號碼
            this._betNumb = $("input.oddsI[name='bet_num[]']", this._form);
            var _blur = function () {
                (_this.onFillNumBlur) && _this.onFillNumBlur.call(this, _this);
            }
            this._betNumb.each(function(i) {
                this.onkeypress = _this.onGoldKp; 
                this.onfocus = new Function('ShowBorder(' + i + ');');
                this.x = i;
                this.onblur = _blur;
            });
            //輔助功能
            $("input[name='qk_gold']", this._form).bind("keypress", this.onGoldKp);
            $("input[name='qk_send']", this._form).click(function () {
                (_this.onFillD3Click) && _this.onFillD3Click.call(this, _this);
            });
            $("input[name='ALLODDS']", this._form).click(function () {
                (_this.onFillOddsUpdate) && _this.onFillOddsUpdate.call(this, _this);
            });
            $("input[name='line']", this._form).bind("keypress", this.onGoldKp);
            $("input[name='line_btn']", this._form).click(function () {
                (_this.onFillShowUpdate) && _this.onFillShowUpdate.call($("input[name='line']", _this._form).get(0), _this);
            });
            $("input[name='rand_btn']", this._form).click(function () {
                (_this.onRandomClick) && _this.onRandomClick.call(this, _this);
            });
            //下注賠率html tag
            this._oddsGrp = $('td.odds', this._form);
            this._goldGrp.each(function(i) {
                this.onkeypress = _this.onGoldKp; 
            });
            //限額
            if (arguments.length > 0) {
                this.SC = parseInt( arguments[0], 10 );
                this.SO = parseInt( arguments[1], 10 );
                this.gMax = parseInt( arguments[2], 10 );
                this.gMin = parseInt( arguments[3], 10 );
                this.credit = parseInt( arguments[4], 10 );
            }
            this._btnSend = $("input[name='Submit']", this._form);
            this._btnSend.click(function () {
                (_this.onFillFormSubmit) && _this.onFillFormSubmit.call(this.form, _this); 
            });
            this._btnCancel = $("input[name='btnReset']", this._form);
            this._btnCancel.click(function () {
                (_this.onFillFormReset) && _this.onFillFormReset.call(this.form, _this);
            });
            self.GoldUI.installInput($("input[name='bet_gold[]'], input[name='qk_gold']", this._form));
        },
        /**
         * 動態下注送出函式
         * @param me betSpace.betB5物件
         */
        onBetAClk : function (me) {
            var _total = 0, _win = 0, inp, _g, _o, 
                error01 = 0, 
                error02 = 0, 
                error03 = 0, 
                error04 = 0, 
                error05 = 0, 
                error06 = 0;
            var _gMin, _gMax, _SC, _SO, multCheck = ($.inArray(me.rtypeGrp, _multAry) >= 0);
            if (me.lock == true) {
                return false;
            }
            for (var k in me._goldGrp) {
                inp = me._goldGrp[k];
                if (inp.value != '') {
                    _g = parseInt(inp.value, 10);
                    _o = me._oddsGrp[k].value;
                    if (false) {
                        _gMin = me.gMinA[aC2R[k]];
                        _gMax = me.gMaxA[aC2R[k]];
                        _SC = me.SCA[aC2R[k]];
                        _SO = me.SOA[aC2R[k]];
                    } else {
                        _gMin = me.gMin;
                        _gMax = me.gMax;
                        _SC = me.SC;
                        _SO = me.SO;
                    }
                    _total += _g;
                    _win += _g * (_o - 1);
                    if( isNaN(_g) == true ){
                        inp.value = '';
                        (inp.onfocus) && inp.onfocus();
                        (inp.onkeyup) && inp.onkeyup();
                        //inp.focus();
                        error01++;
                    } else if( _g < _gMin ){
                        //inp.focus();
                        new_alert(Lang('amount_under') + ' : '  + _gMin);
                        return false;
                        error02++;
                    } else if( _g > _gMax ){
                        //inp.focus();
                        new_alert(Lang('amount_max') + ' : ' + _gMax);
                        return false;
                        error03++;
                    //} else if( _g > _SO ){
                    //    //inp.focus();
                    //    new_alert(Lang('amount_sg_bet') + ' : '  + _SO);
                    //    return false;
                    //    error04++;
                    } else if( _total > me.credit ){
                        //inp.focus();
                        new_alert(Lang('amount_ov_credit') + ' : '  + me.credit);
                        return false;
                        error05++;
                    }
                }
            }
            if (error01 > 0) {
                new_alert(Lang('MSG_ONLY_INPUT_NUMBER')); 
                return false;
            }
            if (error02 > 0) {
                new_alert(Lang('amount_under'));
                return false;
            }
            if (error03 > 0) {
                new_alert(Lang('amount_max') + ' : ' + _gMax);
                return false;
            }
//            if (error04 > 0) {
//                new_alert(Lang('amount_sg_bet'));
//                return false;
//            }
            if (error05 > 0) {
                new_alert(Lang('amount_ov_credit'));
                return false;
            }
            if (_total == 0) {
                new_alert(Lang('Msg_Empty'));
                return false;
            }
            _win = (Math.round(_win * 100)/100).toFixed(2);
            var _this = me, _form = this, _fn = function () {
                _this._btnSend.disabled = true;
                me.lock = true;
                $.ajax({
                    url : _form.action,
                    type : 'POST',
                    data : $(_this._form).serialize(),
                    timeout : 10000,
                    error : function () {
                        (_this._btnSend) && (_this._btnSend.disabled = false);
                        new_alert(Lang('NetworkAnomaly'));
                        me.lock = false;
                    },
                    dataType : 'script',
                    complete : function () {
                        (_this._btnSend) && (_this._btnSend.disabled = false);
                        me.lock = false;
                        _form.reset();
                    },
                    success: function(response){
                        //TODO: need refactor
                        new_alert(Lang('OperateSuccess'));
                        if(!(response.indexOf(".")>-1)){
                            response = response +".00";
                        }
                        document.getElementById("bet-credit").innerHTML = response;
                    }
                });
            };
            new_confirm(Lang('word_bet_gold')+ ":" + _total + "\n", _fn);
        },
        /**
         * 動態下注取消
         * @param me betSpace.betB5物件
         */
        onBetAReset : function (me) {
            me._btnSend.disabled = false;
            this.reset();
            me._winGoldTag.innerHTML = '0.00';
        },
        /**
         * 下注檢查
         * @param me betSpace.betB5物件
         */
        onBetChk : function (me) {
            var err = 0, inp, _gold, _odds, _total = 0, _win = 0, multCheck = (me.gMax == null);
            if (me.lock == true) {
                return false;
            }
            try {
                for (var k in me._goldInp) {
                    inp = me._goldInp[k];
                    if (inp.value != 'NN') {
                        if (inp.value == '') {
                            inp.focus();
                            err++;
                            throw Lang('pls_key_amount');
                        }
                        if (isNaN(parseInt(inp.value)) == true) {
                            inp.focus();
                            err++;
                            throw Lang('MSG_ONLY_INPUT_NUMBER');
                        }
                        _gold = parseInt(inp.value, 10);
                        _odds = parseFloat(me._oddsInp[k].value);
                        _total += _gold;
                        _win += Math.round(_gold * (_odds - 1) * 100) / 100;
                        if (false) {
                            _gMin = me.gMinA[k];
                            _gMax = me.gMaxA[k];
                            _SO = me.SOA[k];
                        } else {
                            _gMin = me.gMin;
                            _gMax = me.gMax;
                            _SO = me.SO;
                        }
                        if (_gold < _gMin) {
                            inp.focus();
                            err++;
                            throw (Lang('amount_under') + _gMin);
                        }
                        if (_gold > _gMax) {
                            inp.focus();
                            err++;
                            throw (Lang('amount_max')+ ":" + _gMax);
                        }
//                        if (_gold > _SO) {
//                            inp.focus();
//                            err++;
//                            throw (Lang('amount_sg_bet') + _SO);
//                        }
                        if (_total > me.credit) {
                            inp.focus();
                            err++;
                            throw (Lang('amount_ov_credit') + me.credit);
                        }
                    }
                }
            } catch (e) {
                new_alert(e);
            }
            if (err == 0) {
                _win = _win.toFixed(2);
                var _form = this, _this = me;
                new_confirm(Lang('word_bet_gold') + ":" + _total + "\n", function () {
                    me.lock = true;
                    $.ajax({
                        url : _form.action,
                        type : 'POST',
                        data : $(_form).serialize(),
                        timeout : 10000,
                        error : function () {
                           _this._btnSend.disabled = false;
                           _this._btnCancel.disabled = false;
                            new_alert(Lang('NetworkAnomaly'));
                            me.lock = false;
                        },
                        dataType : 'script',
                        beforeSend : function () {
                           _this._btnSend.disabled = true;
                           _this._btnCancel.disabled = true;
                        },
                        complete : function () {
                            me.lock = false;
                            _form.reset();
                        },
                        success: function(response){
                            //TODO: need refactor___________
                            new_alert(Lang('OperateSuccess'));
                            if(!(response.indexOf(".")>-1)){
                                response = response +".00";
                            }
                            document.getElementById("bet-credit").innerHTML = response;
                        }
                    });
                });
            }
        },
        /**
         * 三字下注檢查
         * @param me betSpace.betB5物件
         */
        onW3Chk : function (me) {
            var inp, _gold, _odds, _total = 0, _win = 0, _LineRtype, sErr = '', aErr = [];
            var W3_ERR = false, W32_ERR = false, W33_ERR = false;
            if (me.lock == true) {
                return false;
            }
            for (var k in me._goldInp) {
                inp = me._goldInp[k];
                if (inp.value != 'NN') {
                    _gMin = me.gMinA[k];
                    _gMax = me.gMaxA[k];
                    _SO = me.SOA[k];
                    _LineRtype = me.lineRtype[k];
                    if (inp.value == '') {
                        if(_LineRtype=='W3L' && !W3_ERR){W3_ERR=true;sErr += Lang('W3') + Lang('pls_key_amount') + "!!\n";}
                        if(_LineRtype=='W32' && !W32_ERR){W32_ERR=true;sErr += Lang('GS3') + Lang('pls_key_amount') + "!!\n";}
                        if(_LineRtype=='W33' && !W33_ERR){W33_ERR=true;sErr += Lang('GS6') + Lang('pls_key_amount') + "!!\n";}
                        aErr.push(k);
                    }
                    if (isNaN(parseInt(inp.value)) == true) {
                        if(_LineRtype=='W3L' && !W3_ERR){W3_ERR=true;sErr += Lang('W3') + Lang('MSG_ONLY_INPUT_NUMBER') + "!!\n";}
                        if(_LineRtype=='W32' && !W32_ERR){W32_ERR=true;sErr += Lang('GS3') + Lang('MSG_ONLY_INPUT_NUMBER') + "!!\n";}
                        if(_LineRtype=='W33' && !W33_ERR){W33_ERR=true;sErr += Lang('GS6') + Lang('MSG_ONLY_INPUT_NUMBER') + "!!\n";}
                        aErr.push(k);
                    }
                    _gold = parseInt(inp.value, 10);
                    _odds = parseFloat(me._oddsInp[k].value);
                    _total += _gold;
                    _win += Math.round(_gold * (_odds - 1) * 100) / 100;
                    if (_gold < _gMin) {
                        if(_LineRtype=='W3L' && !W3_ERR){W3_ERR=true;sErr += Lang('W3') + Lang('amount_under') + _gMin+ "!!\n";}
                        if(_LineRtype=='W32' && !W32_ERR){W32_ERR=true;sErr += Lang('GS3') + Lang('amount_under') + _gMin + "!!\n";}
                        if(_LineRtype=='W33' && !W33_ERR){W33_ERR=true;sErr += Lang('GS6') + Lang('amount_under') + _gMin + "!!\n";}
                        aErr.push(k);
                    }
                    if (_gold > _gMax) {
                        if(_LineRtype=='W3L' && !W3_ERR){W3_ERR=true;sErr += Lang('W3') + Lang('amount_max') + _gMax + "!!\n";}
                        if(_LineRtype=='W32' && !W32_ERR){W32_ERR=true;sErr += Lang('GS3') + Lang('amount_max') + _gMax + "!!\n";}
                        if(_LineRtype=='W33' && !W33_ERR){W33_ERR=true;sErr += Lang('GS6') + Lang('amount_max') + _gMax + "!!\n";}
                        aErr.push(k);
                    }
                    if (_gold > _SO) {
                        if(_LineRtype=='W3L' && !W3_ERR){W3_ERR=true;sErr += Lang('W3') + Lang('amount_sg_bet') + _SO + "!!\n";}
                        if(_LineRtype=='W32' && !W32_ERR){W32_ERR=true;sErr += Lang('GS3') + Lang('amount_sg_bet') + _SO + "!!\n";}
                        if(_LineRtype=='W33' && !W33_ERR){W33_ERR=true;sErr += Lang('GS6') + Lang('amount_sg_bet') + _SO + "!!\n";}
                        aErr.push(k);
                    }
                    if (_total > me.credit) {
                        if(_LineRtype=='W3L' && !W3_ERR){W3_ERR=true;sErr += Lang('W3') + Lang('amount_ov_credit') + me.credit + "!!\n";}
                        if(_LineRtype=='W32' && !W32_ERR){W32_ERR=true;sErr += Lang('GS3') + Lang('amount_ov_credit') + me.credit + "!!\n";}
                        if(_LineRtype=='W33' && !W33_ERR){W33_ERR=true;sErr += Lang('GS6') + Lang('amount_ov_credit') + me.credit + "!!\n";}
                        aErr.push(k);
                    }
                }
            }
            if( aErr.length > 0 ){
                me._goldInp[aErr[0]].focus();
                new_alert(sErr);
                return false;
            } else {
                var _form = this, _this = me;
                new_confirm(Lang('word_bet_gold') + ":" + _total + "\n", function () {
                    me.lock = true;
                    $.ajax({
                        url : _form.action,
                        type : 'POST',
                        data : $(_form).serialize(),
                        timeout : 10000,
                        error : function () {
                           _this._btnSend.disabled = false;
                           _this._btnCancel.disabled = false;
                            new_alert(Lang('NetworkAnomaly'));
                            me.lock = false;
                        },
                        dataType : 'script',
                        beforeSend : function () {
                           _this._btnSend.disabled = true;
                           _this._btnCancel.disabled = true;
                        },
                        complete : function () {
                            me.lock = false;
                        }
                    });
                });
            }
        },
        /**
         * 點擊取消事件
         */
        onBackClk : function () {
            back();
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
         * 計算下注金額
         * @param me space.betB5物件
         */
        onGoldKu : function (me) {
            var _total = 0, _gold;
            for (var k in me._goldGrp) {
                if (me._goldGrp[k].value != '') {
                    _gold = parseInt(me._goldGrp[k].value, 10);
                    _total += _gold;
                }
            }
            (me._goldTag) && (me._goldTag.innerHTML = _total.toFixed(2));
        },
        /**
         * 計算可贏金額
         * @param me space.betB5物件
         */
        onGoldKeyup : function (me) {
            var _total = 0, _gold, _win = 0;
            for (var k in me._goldInp) {
                if (me._goldInp[k].value != '') {
                    _gold = parseInt(me._goldInp[k].value, 10);
                    _odds = me._oddsInp[k].value;
                    _total += _gold;
                    _win += _gold * (_odds -1);
                }
            }
            (me._goldTag) && (me._goldTag.innerHTML = _total);
            (me._winGoldTag) && (me._winGoldTag.innerHTML = (Math.round(_win * 100) / 100).toFixed(2));
        },
        /**
         * 填滿所有金額
         * @param me space.betB5物件
         */
        onFillClick : function (me) {
            var _gold = $(this).prev("input[name='gold[]']").val();
            for (var k in me._goldInp) {
                me._goldInp[k].value = _gold;
            }
            me.onGoldKeyup(me);
        },
        /**
         * 刪除所有金額
         * @param me space.betB5物件
         */
        onDelClick : function (me) {
            $(this).parent().parent().remove();
            var _check = $("input[name='aConcede[]']", me._form).length;
            if (_check == 0) {
                back();
                return;
            }
            me.init();
            me.onGoldKeyup(me);
        }, 
        /**
         * 三字位快速模式foucs事件
         * @param me space.betB5物件
         */
        onFillNumBlur : function (me) {
            var str = this.value, k = this.x;
            if(str.length == 3){
                $(this).css("background-color","#d5e2e3").css("border","0px");
                var url = "oddsB5_action.php?rtype=" + me.rtypeGrp + "&num=" + str + "&gid=" + this.form.gid.value + "&gtype=" + nowGtype 
                $.ajax({
                    url: url,
                    dataType : 'json',
                    success : function (res) {
                        me._oddsGrp[k].innerHTML = res.odds;
                    }
                });
            }else{
                $(this).css("background-color","#ffffff").css("border","1px solid black");
                me._oddsGrp[k].innerHTML = '&nbsp;';
            }
        },
        /**
         * 三字定位快速模式填滿所有金額
         * @param me space.betB5物件
         */
        onFillD3Click : function (me) {
            me._goldGrp.val($("input[name='qk_gold']", me._form).val());
        },
        /**
         * 三字定位快速模式讀取所賠率
         * @param me space.betB5物件
         */
        onFillOddsUpdate : function (me) {
            var aryNumb = [];
            me._betNumb.each(function () {
                aryNumb.push('num[]=' + this.value);
            });
            $.ajax({
                url:'odds2B5_action.php',
                type: 'POST',
                dataType: 'json',
                timeout: 5000,
                data:"B5act=D3MCU&gtype=" + nowGtype + "&rtype=" + me.rtypeGrp+ "&gid=" + $("#gid").val() + '&' + aryNumb.join('&'),
                success: function (res) {
                    me._betNumb.each(function(i){
                        if ($(this).val().length == 3) {
                            me._oddsGrp.get(i).innerHTML = res["No" + i];
                        } else {
                            me._oddsGrp.get(i).innerHTML = '&nbsp;'; 
                        }
                    });
                }
            });
        },
        /**
         * 三字定位快速模式修改顯示球數
         * @param me space.betB5物件
         */
        onFillShowUpdate : function (me) {
            var iLine = this.value;
            if (iLine < 5) {
                new_alert(Lang('LineUnder5'));
            } else if (iLine > 200) {
                new_alert(Lang('LineOver200'));
            } else {
                $.ajax({
                    url:'quickD3B5_action.php',
                    type: 'POST',
                    dataType: 'json',
                    timeout: 5000,
                    data:"gtype=" + nowGtype + "&rtype=" + me.rtypeGrp + "&lineN=" + iLine + "&gid=" + $("#gid").val(),
                    beforeSend:function(){
                        $("#Game").html("<span style='font-weight:bold;color:red'>loading...</span>");
                    },
                    success: function (res) {
                        $("#Game").css("opacity","0");
                        document.getElementById("Game").innerHTML = res.Game;
                        $("#Game").animate({opacity:"1"},1000);      
                        me.initFill();
                        //FocusInp();  
                        self.GoldUI.installInput($("input[name='bet_gold[]']", this._form));
                    }
                });
            }
        },
        /**
         * 三字定位快速模式隨機開球
         * @param me space.betB5物件
         */
        onRandomClick : function (me) {
            $.ajax({
                url:'odds2B5_action.php',
                type: 'POST',
                dataType: 'json',
                timeout: 5000,
                data:"B5act=Random&rtype=" + me.rtypeGrp + "&gid=" + $("#gid").val() + "&sRow=" + me._betNumb.length + "&gtype=" + nowGtype,
                success: function (res) {
                    if (res[0] == 'N') {
                        me._betNumb.each(function (i) {
                            this.value = res[1][i];
                            this.style.border = '0px';
                            this.style.backgroundColor = '#d5e2e3'
                        });
                        (me.onFillOddsUpdate) && me.onFillOddsUpdate(me);
                    } else {
                        new_alert(Lang('MSG_Wix3_ClosedBy_SinglePlay'));
                        me._betNumb.each(function (i) {
                            this.value = '';
                            this.style.border = '';
                            this.style.backgroundColor = '#fff'
                        });
                        me._oddsGrp.html('&nbsp;');
                    }   
                }
            });
        },
        /**
         * 三字位快速模式送出檢查事件
         * @param me space.betB5物件
         */
        onFillFormSubmit : function (me) {
            var betLen = me._betNumb.length, intBet = 0, _total = 0;
            for (var i = 0; i < betLen; i++) {
                var _gold = me._goldGrp.get(i).value;
                var _numb = me._betNumb.get(i).value;
                if (_numb.length != 3 && _numb != '') {
                    me._betNumb.get(i).focus();
                    new_alert(Lang('BetNumError'));
                    return false;
                }
                if (_numb.length != 3 && _gold != '') {
                    me._betNumb.get(i).focus();
                    new_alert(Lang('BetNumError'));
                    return false;
                }
                if (_numb.length == 3 && _gold == '') {
                    me._goldGrp.get(i).focus();
                    new_alert(Lang('BetGoldError'));
                    return false;
                }
                if (_numb.length == 3 && _gold != '') {
                    intBet++;
                    _gold = parseInt(_gold, 10);
                    _total += _gold;
                    if (_gold < me.gMin) {
                        me._goldGrp.get(i).focus();
                        new_alert(Lang('amount_under') + me.gMin);
                        return false;
                    }
                    if (_gold > me.gMax) {
                        me._goldGrp.get(i).focus();
                        new_alert(Lang('amount_max'));
                        return false;
                    }
                    if (_gold > me.SO) {
                        me._goldGrp.get(i).focus();
                        new_alert(Lang('amount_sg_bet'));
                        return false;
                    }
                    if (_total > me.credit) {
                        me._goldGrp.get(i).focus();
                        new_alert(Lang('amount_ov_credit'));
                        return false;
                    }
                }
            } 
            if (intBet == 0) {
                new_alert(Lang('Msg1_QuickFill'));
                return false;
            }
            var _form = this, _this = me;
            new_confirm(Lang('word_bet_gold') + ":" + _total + "\n", function () {
                _this._btnCancel.attr('disabled', true);
                _this._btnSend.attr('disabled', true);
                _this.credit -= _total;
                $.ajax({
                    url : _form.action,
                    type : 'POST',
                    data : $(_form).serialize(),
                    dataType : 'script',
                    complete : function () {
                        (_this.onFillFormReset) && _this.onFillFormReset.call(_this._form, _this); 
                    }
                });
            });
        },
        /**
         * 三字位快速模式reset事件
         * @param me space.betB5物件
         */
        onFillFormReset : function (me) {
            this.reset();
            me._oddsGrp.text('');
            me._betNumb.css('background-color', '#ffffff').css('border', '1px solid #000');
            me._btnCancel.attr('disabled', false);
            me._btnSend.attr('disabled', false);
        },
        /**
         * 更新快速模式的限額
         * @param ary json 陣列
         */
        updateLimitSet : function (ary) {
            if (this._form) {
                var _form = $(this._form),
                    _SC = _form.find(_selector.SC_active),
                    _SO = _form.find(_selector.SO_active),
                    _gold_gmin = _form.find(_selector.gold_gmin_active),
                    _gold_gmax = _form.find(_selector.gold_gmax_active),
                    _credit = _form.find(_selector.credit_active);
                if (_SC.length > 1) {
                    var _k;
                    for (var i = 0, t = _SC.length; i < t; i++) {
                        _k = _SC[i].className;
                        if (this.SCA[_k] != ary['SC'][_k]) {
                            _SC[i].value = ary['SC'][_k];
                            _SC[i].defaultValue = ary['SC'][_k];
                            this.SCA[_k] = ary['SC'][_k];
                        } 
                        if (this.SOA[_k] != ary['SO'][_k]) {
                            _SO[i].value = ary['SO'][_k];
                            _SO[i].defaultValue = ary['SO'][_k];
                            this.SOA[_k] = ary['SO'][_k];
                        } 
                        if (this.gMaxA[_k] != ary['gold_gmax'][_k]) {
                            _gold_gmax[i].value = ary['gold_gmax'][_k];
                            _gold_gmax[i].defaultValue = ary['gold_gmax'][_k];
                            this.gMaxA[_k] = ary['gold_gmax'][_k];
                        } 
                        if (this.gMinA[_k] != ary['gold_gmin'][_k]) {
                            _gold_gmin[i].value = ary['gold_gmin'][_k];
                            _gold_gmin[i].defaultValue = ary['gold_gmin'][_k];
                            this.gMinA[_k] = ary['gold_gmin'][_k];
                        } 
                    } 
                } else {
                    if (this.SC != ary['SC']) {
                        _SC[0].value = ary['SC'];
                        _SC[0].defaultValue = ary['SC'];
                        this.SC = ary['SC'];
                    } 
                    if (this.SO != ary['SO']) {
                        _SO[0].value = ary['SO'];
                        _SO[0].defaultValue = ary['SO'];
                        this.SO = ary['SO'];
                    } 
                    if (this.gMax != ary['gold_gmax']) {
                        _gold_gmax[0].value = ary['gold_gmax'];
                        _gold_gmax[0].defaultValue = ary['gold_gmax'];
                        this.gMax = ary['gold_gmax'];
                    } 
                    if (this.gMin != ary['gold_gmin']) {
                        _gold_gmin[0].value = ary['gold_gmin'];
                        _gold_gmin[0].defaultValue = ary['gold_gmin'];
                        this.gMin = ary['gold_gmin'];
                    } 
                }
                _credit[0].value = ary['Maxcredit'];
                _credit[0].defaultValue = ary['Maxcredit'];
                this.credit = ary['Maxcredit'];
            }
        },
        /**
         * 一字快選：單, 雙, 大, 小, 質, 合
         * @param me space.betB3物件
         */
        onW1Click : function (me) {
            var _selector = _opt.selector, 
                _qkGold = $(_selector.grp_d1_gold), 
                _class = _opt.class_name.on, 
                _reg = /^[0-9]+$/;
            if (_qkGold.length == 0) {
                return false;
            }
            var _qk = _qkGold.val();
            if (_qk == '') {
                new_alert(Lang('pls_key_amount'));
                return false;
            }
            if (!_reg.test(_qk)) {
                new_alert(Lang('MSG_ONLY_INPUT_NUMBER'));
                return false;
            }
            $(_selector.grp_d1).removeClass(_class);
            var _num = $(this).attr('data-index'), n;
            $(this).addClass('ON');
            var odd = '13579', even = '02468',
                over = '56789', under = '01234',
                prime = '12357', compo = '04689';
            var _select = eval(_num);

            for (var _cde in me._goldGrp) {
                n = _cde.substr(4, 1);
                me._goldGrp[_cde].value = '';
                (_select.indexOf(n) >= 0) && (me._goldGrp[_cde].value = _qk);
            }
            me.onGoldKu(me);
        },
        /**
         * 二字頭快選
         * @param me space.betSpace.betB5物件
         */
        onD2HeadClick : function (me) {
            var he = 4;
            var _qkGold = $(_opt.selector.grp_d2_gold), 
                _class = _opt.class_name.on, 
                _reg = /^[0-9]+$/;
            if (_qkGold.length == 0) {
                return false;
            }
            var _qk = _qkGold.val();
            if (_qk == '') {
                new_alert(Lang('pls_key_amount'));
                return false;
            }
            if (!_reg.test(_qk)) {
                new_alert(Lang('MSG_ONLY_INPUT_NUMBER'));
                return false;
            }
            var _num = this.innerHTML, _g = self.GameB5.instance();
            if (this.x == 1) {
                this.x = 0;
                $(this).removeClass(_class);
                _g._head = ((_g._head.join('')).replace(_num, '')).split('');
            } else {
                this.x = 1;
                $(this).addClass(_class);
                if ( $.inArray(_num, _g._head) < 0) {
                    _g._head.push(_num);
                }
            }
            var _select = _g.getNumbAryII(), n;
            for (var _cde in me._goldGrp) {
                n = _cde.substr(he, 2);
                if ($.inArray(n, _select) >= 0) {
                    me._goldGrp[_cde].value = _qk;
                    me._numGrp[_cde].backgroundColor = 'yellow';
                } else {
                    me._goldGrp[_cde].value = '';
                    me._numGrp[_cde].backgroundColor = '';
                }
            }
            me.onGoldKu(me);
            me.countGold();
        },
        /**
         * 二字頭快選
         * @param me space.betSpace.betB5物件
         */
        onD2EndClick : function (me) {
            var he = 4;
            var _qkGold = $(_opt.selector.grp_d2_gold), 
                _class = _opt.class_name.on, 
                _reg = /^[0-9]+$/;
            if (_qkGold.length == 0) {
                return false;
            }
            var _qk = _qkGold.val();
            if (_qk == '') {
                new_alert(Lang('pls_key_amount'));
                return false;
            }
            if (!_reg.test(_qk)) {
                new_alert(Lang('MSG_ONLY_INPUT_NUMBER'));
                return false;
            }
            var _g = self.GameB5.instance(), _num = this.innerHTML;
            if (this.x == 1) {
                this.x = 0;
                $(this).removeClass(_class);
                _g._end = ((_g._end.join('')).replace(_num, '')).split('');
            } else {
                this.x = 1;
                $(this).addClass(_class);
                if ( $.inArray(_num, _g._end) < 0) {
                    _g._end.push(_num);
                }
            }
            var _select = _g.getNumbAryII(), n;
            for (var _cde in me._goldGrp) {
                n = _cde.substr(he, 2);
                if ($.inArray(n, _select) >= 0) {
                    me._goldGrp[_cde].value = _qk;
                    me._numGrp[_cde].backgroundColor = 'yellow';
                } else {
                    me._goldGrp[_cde].value = '';
                    me._numGrp[_cde].backgroundColor = '';
                }
            }
            me.onGoldKu(me);
            me.countGold();
        },
        /**
         * 下注金額focus
         * @param me space.betB3物件
         */
        onGoldFoucs : function (me) {
            me._numGrp[this.id].backgroundColor = 'yellow';
        },
        /**
         * 下注金額blur
         * @param me space.betB3物件
         */
        onGoldBlur : function (me) {
            var inp = this, _fn = function () {
                (inp.value.length == 0) && (me._numGrp[inp.id].backgroundColor = '');
                (inp.value.length > 0) && (me.countGold());
            };
            setTimeout(_fn, 200);
        },
        countGold : function () {
            var _n = 0;
            for (var k in this._goldGrp) {
                (this._goldGrp[k].value.length > 0) && (_n++);
            }
            this.tickTag.text(Lang('Ticked').replace("%s", _n));
        }
    };
    /**
     * instance
     */
    space.betB5.instance = function () {
        if (!this._instance) {
            this._instance = new this(arguments[0]);
        }
        return this._instance;
    };
})(betSpace);
