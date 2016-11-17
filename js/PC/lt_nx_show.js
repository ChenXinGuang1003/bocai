(function (GameSpace) {
    /**
     * 格式化數字
     *
     * @param a
     * @param fm
     */
    function chkjs(a, fm){
        var resultStr, nTen;
        if (a < 0) return "";
        a = "" + a + "";
        strLen = a.length;
        dotPos = a.indexOf(".", 0);
        if (dotPos == -1 && fm > 0) {
            resultStr = a + ".";
            for (i = 0; i < fm; i++) {
                resultStr = resultStr + "0";
            }
            return resultStr;
        } else {
            if ((strLen - dotPos - 1) >= fm || strLen > 10) {
                nTen = 1;
                if (strLen > 10 && typeof(fm) == 'undefined') {
                    fm = 1;
                }

                for (j = 0; j < fm; j++) {
                    nTen = nTen * 10;
                }
                resultStr = Math.round(parseFloat(a) * nTen) / nTen;
                resultStr = "" + resultStr + "";
                resLen = resultStr.length;
                for (i = 0; i < (fm - resLen + dotPos + 1); i++) {
                    resultStr = resultStr + "0";
                }
                return resultStr;
            } else {
                resultStr = a;
                for (i = 0; i < (fm - strLen + dotPos + 1); i++) {
                    resultStr = resultStr + "0";
                }
                return resultStr;
            }
        }
        return a;
    }
    GameSpace.NxShow = function () {
    }
    GameSpace.NxShow.prototype = {
        //最多勾選
        maxChk : 11,
        //最少勾選
        minChk : 1,
        //現在勾選數
        nowChk : 0,
        //修正後的賠率
        fixOdds : 0,
        //賠率加總
        sumOdds : 0,
        //賠率陣列
        nxAry : {'NX_A1': 0, 'NX_A2': 0, 'NX_A3': 0, 'NX_A4': 0, 'NX_A5': 0, 'NX_A6': 0, 'NX_A7': 0, 'NX_A8': 0, 'NX_A9': 0, 'NX_AA': 0, 'NX_AB': 0, 'NX_AC' : 0},
        //表單
        _form : null,
        //賠率 html tag
        _oddsTag : null,
        //正肖快選a tag
        _aGrpTag : [],
        //正肖中或不中開關
        _switchRadio : {},
        //合肖勾選input
        _inpNx : {},
        //送出
        _btnSend : null,
        //取消
        _btnCancel : null,
        /**
         * 初始化，綁定正肖的html物件
         */
        init : function () {
            var _this = this, me = this;
            if (typeof document.lt_form != 'undefined') {
                this._form = document.lt_form;
                this.nowChk = 0;
                this.fixOdds = 0;
                this.sumOdds = 0;
                //綁定合肖群組快選
                var as = document.getElementById('NxGroup').getElementsByTagName('b');
                for (var i = 0, t = as.length; i < t; i++) {
                    as[i].x = i;
                    as[i].onclick = function () {
                        (_this.onGrpAClk instanceof Function ) && _this.onGrpAClk.call(this,_this);
                    }
                    this._aGrpTag.push(as[i]);
                }
                //綁定合肖賠率html tag
                this.bindHtmlTag(document.getElementById('show_fix_ratio'), '_oddsTag');
                //綁定賠率
                if (arguments.length > 0) {
                    var a = arguments[0];
                    if (typeof a == 'object') {
                        for (var k in a) {
                            this.nxAry[k] = a[k];
                            this.sumOdds += a[k];
                        }
                    }
                }
                var handler = function () {
                    (_this.onRadioClk instanceof Function) && _this.onRadioClk.call(this,_this);
                }
                //綁定合肖中與不中開關
                this._switchRadio['IN'] = document.getElementById('NX_IN');
                this._switchRadio['OUT'] = document.getElementById('NX_OUT');
                this._switchRadio['IN'].onclick = handler;
                this._switchRadio['OUT'].onclick = handler;
                //綁定合肖勾選checkbox
                var inps = document.getElementsByName('lt_nx[]');
                handler = function () {
                    (_this.onCbClk instanceof Function) && _this.onCbClk.call(this,_this);
                }
                for (i = 0, t = inps.length; i < t; i++) {
                    if (inps[i].tagName.toUpperCase() == 'INPUT' && inps[i].type.toUpperCase() == 'CHECKBOX') {
                        this._inpNx[inps[i].value] = inps[i];
                        this._inpNx[inps[i].value].onclick = handler;;
                    }
                }
                //綁定表單的送出與取消button
                this.bindHtmlTag(this._form.btnSubmit, '_btnSend');
                this.bindHtmlTag(this._form.btnReset, '_btnCancel');
                //綁定表單送出事件
                this._btnSend.onclick = function () {
                    _this.onFormSubmit && _this.onFormSubmit.call(this.form, _this);
                }
                //綁定表單取消勾選事件
                this._btnCancel.onclick = function () {
                    _this.onReset && _this.onReset.call(this.form, _this);
                }
                //表單的onkeyup enter event下注
                var _Ent = 0;
                this._form.onkeyup = function (e) {
                    e = e || window.event
                    var _key = (window.event) ? e.keyCode : e.which;
                    if (_key == 13 && _Ent == 0) {
                        _Ent = 1;
                        setTimeout(function (){ _Ent = 0;}, 1000);
                        (me.onFormSubmit) && me.onFormSubmit.call(this, me);
                    }
                }
            }
        },
        /**
         * 綁定合肖html node
         * @param el html tag
         * @param k key名稱
         */
        bindHtmlTag : function (el, k) {
            var _chk = ['_oddsTag','_btnSend','_btnCancel'];
            if (el && el.tagName) {
                if ($.inArray(k, _chk) != -1) {
                    this[k] = el;
                }
            }
        },
        /**
         * 勾選合肖中或不中事件
         * @param me NxShow 物件
         */
        onRadioClk : function (me) {
            var a = [];
            for (var k in me._inpNx) {
                if (me._inpNx[k].checked) {
                    me._inpNx[k].checked = false;
                    me.onCbClk.call(me._inpNx[k], me);
                    a.push(k);
                }
            }
            me.fixOdds = 0;
            // 顯示醒目提示
            for (k in me._aGrpTag) {
                $(me._aGrpTag[k]).removeClass('ON');
                me._aGrpTag[k].style.color = '';
            }
            //for (var i = 0, t = a.length; i < t; i++) {
            //    me._inpNx[a[i]].checked = true;
            //    me.onCbClk.call(me._inpNx[a[i]], me);
            //    if (!me._inpNx[a[i]].checked) {
            //        me._inpNx[a[i]].parentNode.style.backgroundColor = '';
            //    }
            //}
        },
        onGrpAClk : function (me) {
            var act = this.x;
            if (me._switchRadio['IN'].checked || me._switchRadio['OUT'].checked) {
                // 先取消所有勾選
                for (var k in me._inpNx) {
                    if (me._inpNx[k].checked) {
                        me._inpNx[k].checked = false;
                        me.onCbClk.call(me._inpNx[k], me);
                        me._inpNx[k].parentNode.style.backgroundColor = '';
                    }
                }
                var _g = self.ShowTable.instance();
                var _close = _g.close_timestamp;
                var lunar = (new Lunar(_close)).getDateC();
                var _select = [];
                switch (act) {
                    case 0:
                        _select = ['NX_A1','NX_A3','NX_A4','NX_A5','NX_A6','NX_A9'];
                        break;
                    case 1:
                        _select = ['NX_A2','NX_A7','NX_A8','NX_AA','NX_AB','NX_AC'];
                        break;
                    case 2:
                        if (lunar.Year % 2 == 0) {
                            _select = ['NX_A1','NX_A3','NX_A5','NX_A7','NX_A9','NX_AB'];
                        } else {
                            _select = ['NX_A2','NX_A4','NX_A6','NX_A8','NX_AA','NX_AC'];
                        }
                        break;
                    case 3:
                        if (lunar.Year % 2 == 0) {
                            _select = ['NX_A2','NX_A4','NX_A6','NX_A8','NX_AA','NX_AC'];
                        } else {
                            _select = ['NX_A1','NX_A3','NX_A5','NX_A7','NX_A9','NX_AB'];
                        }
                        break;
                    case 4:
                        _select = ['NX_A1','NX_A2','NX_A3','NX_A4','NX_A5','NX_A6'];
                        break;
                    case 5:
                        _select = ['NX_A7','NX_A8','NX_A9','NX_AA','NX_AB','NX_AC'];
                        break;
                    case 6:
                        _select = ['NX_A2','NX_A4','NX_A5','NX_A7','NX_A9','NX_AC'];
                        break;
                    case 7:
                        _select = ['NX_A1','NX_A3','NX_A6','NX_A8','NX_AA','NX_AB'];
                        break;
                }
                for (var i = 0; i < 6; i++) {
                    me._inpNx[_select[i]].checked = true;
                    me.onCbClk.call(me._inpNx[_select[i]], me);
                    me._inpNx[_select[i]].parentNode.style.backgroundColor = 'yellow';
                }
                // 顯示醒目提示
                for (k in me._aGrpTag) {
                    $(me._aGrpTag[k]).removeClass('ON');
                    me._aGrpTag[k].style.color = '';
                }
                this.className = 'ON';
            } else {
                new_alert (Lang('Msg4_Quick'));
            }
        },
        /**
         * 勾選合肖事件
         * @param me NxShow 物件
         */
        onCbClk : function (me) {
            if (me._switchRadio['IN'].checked || me._switchRadio['OUT'].checked) {
                var v = this.value;
                if (this.checked) {
//                    me.fixOdds += me.nxAry[v];
                    me.nowChk++;
                } else {
//                    me.fixOdds -= me.nxAry[v];
                    me.nowChk--;
                }
                if (me._switchRadio['IN'].checked) {
                    if (me.nowChk >= me.maxChk + 1) {
//                         me.fixOdds -= me.nxAry[v];
                         me.nowChk--;
                         me.fixOdds = me.nxAry["SELECT_" + me.nowChk.toString()];
                         this.checked = false;
                         this.parentNode.style.backgroundColor = '';
                         new_alert (Lang('game_type12_sx_in') + (Lang('Msg2_AN')).replace('%s',me.maxChk));
                    }else{
                        me.fixOdds = me.nxAry["SELECT_" + me.nowChk.toString()];
                    }
                    var odds = me.fixOdds;
//                    var odds = me.fixOdds / (me.nowChk * me.nowChk * 1000 ) ;
                    me._oddsTag.innerHTML = ( isNaN(odds) || me.nowChk == 0 ) ? '' : chkjs( odds , 2);

                } else {

                    if (me.nowChk >= me.maxChk) {
//                         me.fixOdds -= me.nxAry[v];
                         me.nowChk--;
                         me.fixOdds = me.nxAry["SELECT_" + (12-me.nowChk).toString()];
                         this.checked = false;
                         this.parentNode.style.backgroundColor = '';
                         new_alert (Lang('game_type12_sx_out') + (Lang('Msg2_AN')).replace('%s', '10'));
                    }else{
                        me.fixOdds = me.nxAry["SELECT_" + (12-me.nowChk).toString()];
                    }
                    var odds = me.fixOdds;
//                    var odds = (me.sumOdds - me.fixOdds) / ( (12-me.nowChk) * (12-me.nowChk) * 1000) ;
                    me._oddsTag.innerHTML = ( isNaN(odds) || me.nowChk == 0 ) ? '' : chkjs( odds , 2);

                }
            } else {
                new_alert (Lang('Msg4_Quick'));
                this.checked = false;
            }
            if (this.checked) {
                this.parentNode.style.backgroundColor = 'yellow';
            } else {
                this.parentNode.style.backgroundColor = '';
            }
        },
        /**
         * 表單執行送出的事件
         * @param me NxShow物件
         */
        onFormSubmit : function (me) {
            var _count = 0;
            for (var k in me._switchRadio) {
                if (me._switchRadio[k].checked == true) {
                    _count++;
                }
            }
            if (_count == 0) {
                new_alert(Lang('Msg4_Quick'));
                return;
            }
            for (k in me._inpNx) {
                if (me._inpNx[k].checked) {
                    _count++;
                }
            }
            if (me._switchRadio['IN'].checked == true) {
                if (_count >= (me.maxChk + 2)) {
                    new_alert (Lang('game_type12_sx_in') + (Lang('Msg2_AN')).replace('%s',me.maxChk));
                    return false;
                } else if (_count < (me.minChk + 2)) {
                    new_alert (Lang('game_type12_sx_in') + (Lang('Msg1_AN')).replace('%s',me.minChk));
                    return false;
                } else {
                    $.ajax({
                        url:this.action,
                        dataType : 'script',
                        data : $(this).serialize(),
                        type : 'POST',
                        error : function () {(me.onError instanceof Function) && me.onError();}
                    });
                }
            } else if (me._switchRadio["OUT"].checked == true) {
                if (_count >= 12) {
                    new_alert (Lang('game_type12_sx_out') + (Lang('Msg2_AN')).replace('%s', '10'));
                    return false;
                } else if (_count < (me.minChk + 1)) {
                    new_alert (Lang('game_type12_sx_out') + (Lang('Msg1_AN')).replace('%s','1'));
                    return false;
                } else {
                    $.ajax({
                        url:this.action,
                        dataType : 'script',
                        data : $(this).serialize(),
                        type : 'POST',
                        error : function () {(me.onError instanceof Function) && me.onError();}
                    });
                }
            }
        },
        /**
         * 表單執行取消的事件
         * @param me NxShow物件
         */
        onReset : function (me) {
            this.reset();
            me.clearBgColor();
            me._oddsTag.innerHTML = '';
            me.nowChk = 0;
            me.fixOdds = 0;
            // 顯示醒目提示
            for (k in me._aGrpTag) {
                $(me._aGrpTag[k]).removeClass('ON');
                me._aGrpTag[k].style.color = '';
            }
        },
        /**
         * 清除底色
         */
        clearBgColor : function () {
            for (var k in this._inpNx) {
                 this._inpNx[k].parentNode.style.backgroundColor = '';
            }
        },
        onError : function () { }
    }
    GameSpace.NxShow.instance = function () {
        if (!this._instance && document.body) {
            this._instance = new this;
        }
        return this._instance;
    };
})(self);
