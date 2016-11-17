(function (GameSpace) {
    //顏色
    var _nColor = "#ffffff", _oColor = "#ffff33", _cColor = "#ffff00";
    //球號色彩
    var numColor = { "01" : "sColorR", "02" : "sColorR", "03" : "sColorB", "04" : "sColorB", "05" : "sColorG", "06" : "sColorG", "07" : "sColorR", "08" : "sColorR", "09" : "sColorB", "10" : "sColorB", "11" : "sColorG", "12" : "sColorR", "13" : "sColorR", "14" : "sColorB", "15" : "sColorB", "16" : "sColorG", "17" : "sColorG", "18" : "sColorR", "19" : "sColorR", "20" : "sColorB", "21" : "sColorG", "22" : "sColorG", "23" : "sColorR", "24" : "sColorR", "25" : "sColorB", "26" : "sColorB", "27" : "sColorG", "28" : "sColorG", "29" : "sColorR", "30" : "sColorR", "31" : "sColorB", "32" : "sColorG", "33" : "sColorG", "34" : "sColorR", "35" : "sColorR", "36" : "sColorB", "37" : "sColorB", "38" : "sColorG", "39" : "sColorG", "40" : "sColorR", "41" : "sColorB", "42" : "sColorB", "43" : "sColorG", "44" : "sColorG", "45" : "sColorR", "46" : "sColorR", "47" : "sColorB", "48" : "sColorB", "49" : "sColorG" };
    //html tag
    var _tbody = document.createElement('tbody'), _div = document.createElement('div'), _inp = document.createElement('input'), _p = document.createElement('p'), _table = document.createElement('table'), _tr = document.createElement('tr'),  _td = document.createElement('td'), _span = document.createElement('span'), _$label = $('<label></label>');
    /**
     * 將數字補成2位數
     * @param n 數字
     * @return s 字串數字
     */
    function numFormat (n) {
        var s = (n < 10) ? ("0" + n) : n;
        return s;
    }
    GameSpace.ChShow = function (){
    }
    GameSpace.ChShow.prototype = {
        //最多勾選
        maxChk : 10,
        //最少勾選
        minChk : 3,
        //膽碼最多勾選
        maxDanChk : 3,
        //現在勾選數
        nowChk : 1,
        //現在勾選生肖數
        nowSpa : 1,
        //現在勾選尾數數
        nowFin : 1,
        //正副號
        _rsStatus : 'R',
        //玩法from
        _form: null,
        //正副號table
        rsTableTag : null,
        //tabl1 html tag
        tab1 : null,
        //tabl2 html tag
        tab2 : null,
        //tabl3 html tag
        tab3 : null,
        //tabl4 html tag
        tab4 : null,
        //tabl5 html tag
        tab5 : null,
        //tabl6 html tag
        tab6 : null,
        //切換連碼玩法開關
        _switch : [],
        //現在玩法
        _nowRtype : null,
        //肖尾 html tag
        xfDivTag : null,
        //膽拖 html div tag
        dtDivTag : null,
        //膽拖色波 html div tag
        dtcDivTag : null,
        //膽拖生肖 html div tag
        dtspaDivTag : null,
        //交差碰
        crossOverTag : null,
        //交差碰號碼div
        _numBtnDiv : null,
        //對碰玩法切換開關
        _switchSub : {spa:null,fin:null,xf:null,cf:null,dt:null,dtc:null,dtspa:null},
        //膽拖色波選紅
        _btnR : null,
        //膽拖色波選綠
        _btnG : null,
        //膽拖色波選藍
        _btnB : null,
        //正副號checkbox
        _switchRS : null,
        //正號label
        _RnumLabel : null,
        //正號tag
        _RnumTag : null,
        //正號欄位
        _inpR : null,
        //副號label
        _SnumLabel : null,
        //副號tag
        _SnumTag : null,
        //連碼勾選input集合
        _inpNum : [],
        //生肖對碰勾選input集合
        _inpSpa : [],
        //尾數對碰勾選input集合
        _inpFin : [],
        //擔拖的擔碼input集合
        _inpDtD : [],
        //擔拖的拖碼input
        _inpDtT : [],
        //擔拖色波的擔碼input
        _inpDtcD : [],
        //擔拖色波的拖碼input
        _inpDtcC : [],
        //擔拖生肖的擔碼input
        _inpDtspaD : [],
        //擔拖生肖的拖碼input
        _inpDtspaS : [],
        //表單送出button
        _btnSend : {ch:null,spa:null,fin:null,xf:null,cf:null,dt:null,dtc:null,dtspa:null},
        //表單取消button
        _btnCancel : {ch:null,spa:null,fin:null,xf:null,cf:null,dt:null,dtc:null,dtspa:null},
        //球號組合的ajax網址
        _urlBall : '/member/lt_ch/Ball.php',
        //球號組合視窗
        _ballTag : null,
        //交差碰警告html tag
        _warn : null,
        //交差碰html tag
        _hit : null,
        //生肖球號
        an2no : [],
        //圓框線
        roundDiv : null,
        /**
         * 初始化，綁定連碼的html物件
         */
        init : function () {
            var me = this;
            $(window.parent.document).find("#mainFrame").height(660);
            //綁定html tag
            var _id = {
                tab1 : 'table1',
                tab2 : 'table2',
                tab3 : 'table3',
                tab4 : 'table4',
                tab5 : 'table5',
                tab6 : 'table6',
                rsTableTag : 'RSTable',
                xfDivTag : 'XF',
                dtDivTag : 'Dantuo',
                dtcDivTag : 'DantuoC',
                dtspaDivTag : 'DantuoSpa',
                crossOverTag : 'CrossOverHit'
            };
            for (k in _id) {
                this.bindHtmlTag(document.getElementById(_id[k]), k);
            }
            //綁定form
            if (typeof document.lt_form != 'undefined') {
                var _form = document.lt_form;
                this._form = _form;
                //綁定切換玩法開關
                var _this = this;
                $("input[type=radio][name=rtype]",_form).each(function () {
                    _this.bindSwitch(this);
                });
                //綁定切換對碰玩法開關
                var _s = {
                    spa:'OfTouch',
                    fin:'OfTouch2',
                    xf:'OfTouch3',
                    cf:'OfTouch4',
                    dt:'OfTouch5',
                    dtc:'OfTouch6',
                    dtspa:'OfTouch7'
                };
                this.bindSwitchSub(_s);
                //綁定正副號checkbox
                this._switchRS = _form.RS;
                this._switchRS.onclick = function () {
                    _this.toggleRS();
                }
                this._switchRS.parentNode.onclick = function () {
                    _this.selectRS('R');
                }
                this._inpR = _form.rs_r;
                this.bindHtmlTag(document.getElementById('RNumT'), '_RnumLabel');
                this.bindHtmlTag(document.getElementById('SNumT'), '_SnumLabel');
                this.bindHtmlTag(document.getElementById('RNumB'), '_RnumTag');
                this.bindHtmlTag(document.getElementById('SNumB'), '_SnumTag');
                this._RnumLabel.onclick = function () {
                    _this.selectRS('R');
                }
                this._SnumLabel.onclick = function () {
                    _this.selectRS('S');
                }
                //綁定球號組合視窗
                this.bindHtmlTag(document.getElementById('Ball'), '_ballTag');
                //交差碰
                this.bindHtmlTag(document.getElementById('Warn'), '_warn');
                this.bindHtmlTag(document.getElementById('HitZone'), '_hit');
                //綁定表單的送出與取消button
                this.bindSendBtn(_form.btnSubmit, 'ch');
                this.bindCancelBtn(_form.btnReset, 'ch');
                this.bindSendBtn(_form.btnSpaSend, 'spa');
                this.bindCancelBtn(_form.btnSpaReset, 'spa');
                this.bindSendBtn(_form.btnFinSend, 'fin');
                this.bindCancelBtn(_form.btnFinReset, 'fin');
                this.bindSendBtn(_form.btnXfSend, 'xf');
                this.bindCancelBtn(_form.btnXfReset, 'xf');
                this.bindSendBtn(_form.OverSend, 'cf');
                this.bindCancelBtn(_form.OverCancel, 'cf');
                this.bindSendBtn(_form.DantuoSend, 'dt');
                this.bindCancelBtn(_form.DantuoCancel, 'dt');
                this.bindSendBtn(_form.DantuoCSend, 'dtc');
                this.bindCancelBtn(_form.DantuoCCancel, 'dtc');
                this.bindSendBtn(_form.DantuoSpaSend, 'dtspa');
                this.bindCancelBtn(_form.DantuoSpaCancel, 'dtspa');
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
                //綁定交差碰的號碼按扭區塊
                this.bindHtmlTag(document.getElementById('NumBtn'), '_numBtnDiv');
                //綁定交差碰快選a tag連結
                var _quick = ['r', 'b', 'g','a1','a2','a3','a4','a5','a6','a7','a8','a9','aa','ab','ac','0','1','2','3','4','5','6','7','8','9'];
                var aTag = document.getElementById('QuickCross').getElementsByTagName('a');
                var _qclick = function () {
                    (_this.onQuickAtagClk instanceof Function) && _this.onQuickAtagClk.call(this, _this);
                }
                for (var i = 0; i < 25; i++) {
                    aTag[i].x = _quick[i];
                    aTag[i].onclick = _qclick;
                }
                //綁定連碼勾選input
                this._inpNum = [];
                this._inpSpa = [];
                this._inpFin = [];
                var n = document.getElementsByName('num[]');
                var _click = function () {
                    _this.onCbClk instanceof Function && (_this.onCbClk.call(this,_this));
                }
                for (i=0, t = n.length; i < t; i++) {
                    if ('INPUT' == n[i].tagName.toUpperCase() && 'CHECKBOX' == n[i].type.toUpperCase()) {
                        n[i].onclick = _click;
                        this._inpNum.push(n[i]);
                    }
                }
                //綁定生肖對碰勾選input
                n = document.getElementsByName('spa[]');
                var _clickSpa = function () {
                    _this.onSpaClk instanceof Function && (_this.onSpaClk.call(this,_this));
                }
                for (i=0, t = n.length; i < t; i++) {
                    if ('INPUT' == n[i].tagName.toUpperCase() && 'CHECKBOX' == n[i].type.toUpperCase()) {
                        n[i].onclick = _clickSpa;
                        this._inpSpa.push(n[i]);
                    }
                }
                //綁定尾數對碰勾選input
                n = document.getElementsByName('nf[]');
                var _clickNf = function () {
                    _this.onFinClk instanceof Function && (_this.onFinClk.call(this,_this));
                }
                for (i=0, t = n.length; i < t; i++) {
                    if ('INPUT' == n[i].tagName.toUpperCase() && 'CHECKBOX' == n[i].type.toUpperCase()) {
                        n[i].onclick = _clickNf;
                        this._inpFin.push(n[i]);
                    }
                }
            }  
            this.roundDiv = $('div.round-table');
            this.filterRound();
        },
        /**
         * 綁定連碼玩法區塊
         * @param el html tag
         * @param k key名稱
         */
        bindHtmlTag : function (el, k) {
            var _chk = ['tab1','tab2','tab3','tab4','tab5','tab6','rsTableTag','xfDivTag','dtDivTag','dtcDivTag','dtspaDivTag','crossOverTag','_RnumLabel','_SnumLabel','_RnumTag','_SnumTag','_ballTag','_warn','_hit','_numBtnDiv'];
            if (el && el.tagName) {
                if ($.inArray(k, _chk) != -1) {
                    this[k] = el;
                }
            }
        },
        /**
         * 綁定連碼切換玩法開關
         * @param el html tag
         */
        bindSwitch : function (el) {
            if (el && el.tagName && 'RADIO' == el.type.toUpperCase()) {
                var _this = this;
                el.onclick = function() {
                    _this.onSwitchClk && (_this.onSwitchClk.call(this,_this));   
                }
                this._switch.push(el);
            }
        },
        /**
         * 綁定連碼切換玩法開關
         * @param ary json 陣列
         */
        bindSwitchSub : function (ary) {
            var _click = function() {
                _this.onSubClk && _this.onSubClk.call(this, _this);
            }
            for (var k in ary) {
                var _node = document.getElementById(ary[k]), _this = this;
                _node.x = k;
                _node.onclick = _click;
                this._switchSub[k] = _node;
            }
        },
        /**
         * 綁定表單送出button
         * @param el html element
         * @param k 索引名稱
         */
        bindSendBtn : function (el, k) {
            var _chk = ['ch','spa','fin','xf','cf','dt','dtc','dtspa'];
            if (el && el.tagName && 'INPUT' == el.tagName) {
                if ($.inArray(k, _chk) != -1) {
                    var me = this;
                    el.onclick = function () {
                        me.onFormSubmit && (me.onFormSubmit.call(this.form, me));
                    }
                    this._btnSend[k] = el;
                }
            }
        },
        /**
         * 綁定表單取消button
         * @param el html element
         * @param k 索引名稱
         */
        bindCancelBtn : function (el, k) {
            var _chk = ['ch','spa','fin','xf','cf','dt','dtc','dtspa'];
            if (el && el.tagName && 'INPUT' == el.tagName) {
                var i = $.inArray(k, _chk), _this = this;
                if (i >= 0) {
                    if (i < 4) {
                        el.onclick = function(){
                            _this.onReset();
                        }
                    } else if (i == 4) {
                        el.onclick = function () {
                            _this.drawCross();
                        }
                    } else  {
                        el.onclick = function () {
                            _this.onDtReset && (_this.onDtReset.call(this.form, _this));
                        }
                    }
                    this._btnCancel[k] = el;
                }
            }
        },
        /**
         * 點擊切換玩法執行事件
         * @param me ChShow物件
         */
        onSwitchClk : function (me) {
            var _val = this.value;
            me._nowRtype = _val;
            if (_val == 'CH_32' || _val == 'CH_3') {
                me.minChk = 3;
                me.maxDanChk = 2;
                if (!me._switchSub.xf.checked) {
                    $(me.rsTableTag).show();
                    $(me.tab2).show();
                }
                $(me.tab3).hide();
                $(me.tab4).hide();
                $(me._switchSub.spa).prop({checked:false,disabled:true});
                $(me._switchSub.fin).prop({checked:false,disabled:true});
                $(me._switchSub.xf).prop({checked:false,disabled:true});
            } else if (_val == 'CH_4') {
                me.minChk = 4;
                me.maxDanChk = 3;
                if (me._switchSub.xf.checked == false) {
                    $(me.rsTableTag).show();
                    $(me.tab2).show();
                }
                $(me.tab3).hide();
                $(me.tab4).hide();
                $(me._switchSub.spa).prop({checked:false,disabled:true});
                $(me._switchSub.fin).prop({checked:false,disabled:true});
                $(me._switchSub.xf).prop({checked:false,disabled:true});
            } else {
                me.minChk = 2;
                me.maxDanChk = 3;
                if (me._switchSub.spa.checked || me._switchSub.fin.checked || me._switchSub.xf.checked) {
                    $(me.rsTableTag).hide();
                } else {
                    $(me.rsTableTag).show();
                }
                $(me._switchSub.spa).prop('disabled',false);
                $(me._switchSub.fin).prop('disabled',false);
                $(me._switchSub.xf).prop({disabled:false, checked:false});
            }
            $(me.rsTableTag).hide();//隐藏正/副号
            $(me._inpNum).each(function() {this.checked = false;});
            var _numColor = numColor;
            var td, span, inp, k;
            if (me._switchSub.dt.checked) {
                for (k in me._inpDtD) {
                    inp = me._inpDtD[k], td = inp.parentNode, span = td.getElementsByTagName('span')[0];
                    inp.checked = false;
                    td.style.backgroundColor = '';
                    td.className = "b" + (_numColor[inp.value]).substr(1, 6);
                    span.style.display = '';
                }
                for (k in me._inpDtT) {
                    inp = me._inpDtT[k], td = inp.parentNode, span = td.getElementsByTagName('span')[0];
                    inp.checked = false;
                    td.style.backgroundColor = '';
                    td.className = "b" + (_numColor[inp.value]).substr(1, 6);
                    span.style.display = '';
                }
            }
            if (me._switchSub.dtc.checked) {
                me._btnR.x = 0;
                me._btnG.x = 0;
                me._btnB.x = 0;
                for (k in me._inpDtcD) {
                    inp = me._inpDtcD[k], td = inp.parentNode, span = td.getElementsByTagName('span')[0];
                    inp.checked = false;
                    td.style.backgroundColor = '';
                    td.className = "b" + (_numColor[inp.value]).substr(1, 6);
                    span.style.display = '';
                }
                for (k in me._inpDtcC) {
                    inp = me._inpDtcC[k], td = inp.parentNode, span = td.getElementsByTagName('span')[0];
                    inp.checked = false;
                    td.style.backgroundColor = '';
                    td.className = "b" + (_numColor[inp.value]).substr(1, 6);
                    span.style.display = '';
                }
            }
            if (me._switchSub.dtspa.checked) {
                for (k in me._inpDtspaD) {
                    inp = me._inpDtspaD[k], td = inp.parentNode, span = td.getElementsByTagName('span')[0];
                    inp.checked = false;
                    td.style.backgroundColor = '';
                    td.className = "b" + (_numColor[inp.value]).substr(1, 6);
                    span.style.display = '';
                }
                for (k in me._inpDtspaS) {
                    inp = me._inpDtspaS[k],
                    inp.checked = false;
                    inp.parentNode.parentNode.className = '';
                }
            }
            $(me._switchSub.cf).prop({disabled:false, checked:false});
            $(me._switchSub.dt).prop({disabled:false, checked:false});
            $(me._switchSub.dtc).prop({disabled:false, checked:false});
            $(me._switchSub.dtspa).prop({disabled:false, checked:false});
            if (me._switchSub.cf.checked) {
                me.drawCross();
            } else {
                me.showDefaultTab();
            }
            me.selectRS('R');
            me._switchRS.checked = false;
            me.toggleRS();
            me._RnumTag.innerHTML = '';
            me._SnumTag.innerHTML = '';
            me.clearBgColor();
            me.enableForm('Y');
            me.nowChk = 1;
            var msg = Lang('Msg1_NI');
            me._ballTag.innerHTML = '<p style="color:rgb(187,187,187)">' + msg.replace("%s", me.minChk) + '<span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></p>';
            me.filterRound();
        },
        /**
         * 切換下注玩法事件
         * @param me ChShow物件
         */
        onSubClk : function(me) {
            var k = this.x;
            if (this.checked) {
                for ( var s in me._switchSub) {
                    if (s != k) {
                        me._switchSub[s].checked = false;
                    } 
                }
                switch (k) {
                    case 'spa':
                        me.hideAllTag();
                        $(me.tab3).show();
                        me._switchRS.checked = false;
                        me.selectRS('R');
                        me.toggleRS();
                        break;
                    case 'fin' :
                        me.hideAllTag();
                        $(me.tab4).show();
                        me._switchRS.checked = false;
                        me.selectRS('R');
                        me.toggleRS();
                        break;
                    case 'xf' :
                        me.hideAllTag();
                        me._switchRS.checked = false;
                        me.selectRS('R');
                        me.toggleRS();
                        me.drawXF();
                        $(me.xfDivTag).show();
                        break;
                    case 'cf' :
                        me._switchRS.checked = false;
                        me.selectRS('R');
                        me.toggleRS();
                        me.drawCross();
                        break;
                    case 'dt' :
                        me.drawDantuo();
                        break;
                    case 'dtc' :
                        me.drawDantuoC();
                        break;
                    case 'dtspa' :
                        me.drawDantuoSpa();
                        break;
                }  
            } else {
                me.showDefaultTab();
            }
            me.filterRound();
        },
        /**
         * 點擊連碼checkbox的事件
         * @param me ChShow物件
         */
        onCbClk : function (me) {
            if (this.checked == false) {
                me.nowChk--;
            }
            if (this.checked && me._rsStatus == 'R') {
                me._inpR.value = this.value;
                me.selectRS('S');
            }
            me._RnumTag.innerHTML = '';
            me._SnumTag.innerHTML = '';
            var _numColor = numColor, _nowChk = me.nowChk, _inpNum = me._inpNum, _isRS = me._switchRS.checked, r = me._inpR.value, a = [], v;
            for (var i = 0, m = _inpNum.length; i < m; i++) {
                if (_inpNum[i].checked) {
                    v = _inpNum[i].value;
                    if (_isRS) {//这里目前都是false，因为隐藏了正副號checkbox
                        if (r == '') {
                            me._inpR.value = v;
                            r = v;
                        }
                        if (r == v) {
                            me._RnumTag.innerHTML = '<span class="' + _numColor[v]+ '">' + v + '</span>';
                            a.push("rs_r=" + r);
                        } else {
                            me._SnumTag.innerHTML += '<span class="' + _numColor[v]+ '">' + v + '</span>';
                            a.push('num[]=' + v);
                        }
                    } else {
                        a.push(v);
                    }
                }
            }
            var totalArray = [];
            //初始化第一个数据
            var tmp2Array = [];
            for(var n=0;n<me.minChk;n++){
                tmp2Array.push(a[n]);
            }
            totalArray.push(tmp2Array.join(", "));
            if (_nowChk <= me.maxChk && _nowChk >= me.minChk) {
                if(a.length > me.minChk){
                    var totalSelectArray = me.compile_array(a.length, me.minChk);
                    //获取剩下组合
                    for(var j=0;j<totalSelectArray.length;j++){
                        var subArray = [];
                        for(var k=0;k<me.minChk;k++){
                            subArray.push(a[totalSelectArray[j][k]-1]);
                        }
                        totalArray.push(subArray.join(", "));
                    }
                }
                var pageString = '<p>组合共 <font id="TotalBall" color="red">'+totalArray.length+'</font> 组</p>';
                for(var m=0;m<totalArray.length;m++){
                    if(m==totalArray.length-1){
                        pageString += '<p><div style="color:rgb(187,187,255);font-weight:bold;clear:both;">组合'+(m+1)+':</div><p>'+totalArray[m]+'</p><span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></p>';
                    }else{
                        pageString += '<p><div style="color:rgb(187,187,255);font-weight:bold;clear:both;">组合'+(m+1)+':</div><p>'+totalArray[m]+'</p></p>';
                    }
                }
                var _this = me;
                _this._ballTag.innerHTML = pageString;
            } else {
                var msg = Lang('Msg1_NI');
                me._ballTag.innerHTML = '<p style="color:rgb(187,187,187)">' + msg.replace("%s", me.minChk) + '<span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></p>';
            }
            if (this.checked) {
                if (_nowChk == me.maxChk) {
                    me.enableForm('N');
                } 
                if (_nowChk > me.maxChk) {
                    new_alert(Lang('Msg3_CH'));
                    me.nowChk--;
                    this.checked = false;
                }
                me.nowChk++;
            } else {
                me.enableForm('Y');
            }
            if (this.checked) {
                this.parentNode.parentNode.style.backgroundColor = 'yellow';
            } else {
                this.parentNode.parentNode.style.backgroundColor = '';
            }
        },
        /**
         * 點擊生肖對碰checkbox的事件
         * @param me ChShow物件
         */
        onSpaClk : function(me) {
            if (this.checked == false) {
                me.nowSpa--;
            } 
            var a = [];
            if (me.nowSpa == 2) {
                for (var i = 0, m = me._inpSpa.length; i < m; i++) {
                    if (me._inpSpa[i].checked) {
                        a.push(me._inpSpa[i].value);
                    }
                }
                var totalArray = [];
                var a1 = a[0].split(", ");
                if(a[1]){
                    var a2 = a[1].split(", ");

                    for(var i2=0;i2<a1.length;i2++){
                        for(var i3=0;i3<a2.length;i3++){
                            totalArray.push(a1[i2] + ", " + a2[i3]);
                        }
                    }
                    var pageString = '<p>组合共 <font id="TotalBall" color="red">'+totalArray.length+'</font> 组</p>';
                    for(var m=0;m<totalArray.length;m++){
                        if(m==totalArray.length-1){
                            pageString += '<p><div style="color:rgb(187,187,255);font-weight:bold;clear:both;">组合'+(m+1)+':</div><p>'+totalArray[m]+'</p><span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></p>';
                        }else{
                            pageString += '<p><div style="color:rgb(187,187,255);font-weight:bold;clear:both;">组合'+(m+1)+':</div><p>'+totalArray[m]+'</p></p>';
                        }
                    }
                }else{
                    pageString = '<p>组合共 <font id="TotalBall" color="red">0</font> 组</p>';
                }

                var _this = me;
                _this._ballTag.innerHTML = pageString;
            }

            if (this.checked) {
                if (me.nowSpa == 2) {
                    me.enableSpa('N');
                } 
                if (me.nowSpa > 2) {
                    new_alert((Lang('Msg2_AN')).replace('%s',2));
                    me.nowSpa--;
                    this.checked = false;
                }
                me.nowSpa++;
            } else {
                me.enableSpa('Y');
            }
            if (this.checked) {
                this.parentNode.parentNode.style.backgroundColor = 'yellow';
            } else {
                this.parentNode.parentNode.style.backgroundColor = '';
            }
        },
        /**
         * 點擊尾數對碰checkbox的事件
         * @param me ChShow物件
         */
        onFinClk : function (me) {
            if (this.checked == false) {
                me.nowFin--;
            } 
            var a = [];
            if (me.nowFin == 2) {
                for (var i = 0, m = me._inpFin.length; i < m; i++) {
                    if (me._inpFin[i].checked) {
                        a.push(me._inpFin[i].value);
                    }
                }

                var totalArray = [];
                var a1 = a[0].split(", ");
                if(a[1]){
                    var a2 = a[1].split(", ");

                    for(var i2=0;i2<a1.length;i2++){
                        for(var i3=0;i3<a2.length;i3++){
                            totalArray.push(a1[i2] + ", " + a2[i3]);
                        }
                    }
                    var pageString = '<p>组合共 <font id="TotalBall" color="red">'+totalArray.length+'</font> 组</p>';
                    for(var m=0;m<totalArray.length;m++){
                        if(m==totalArray.length-1){
                            pageString += '<p><div style="color:rgb(187,187,255);font-weight:bold;clear:both;">组合'+(m+1)+':</div><p>'+totalArray[m]+'</p><span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></p>';
                        }else{
                            pageString += '<p><div style="color:rgb(187,187,255);font-weight:bold;clear:both;">组合'+(m+1)+':</div><p>'+totalArray[m]+'</p></p>';
                        }
                    }
                }else{
                    pageString = '<p>组合共 <font id="TotalBall" color="red">0</font> 组</p>';
                }

                var _this = me;
                _this._ballTag.innerHTML = pageString;
            }
            if (this.checked) {
                if (me.nowFin == 2) {
                    me.enableFin('N');
                } 
                if (me.nowFin > 2) {
                    new_alert((Lang('Msg2_LF')).replace('%s',2));
                    me.nowFin--;
                    this.checked = false;
                }
                me.nowFin++;
            } else {
                me.enableFin('Y');
            }
            if (this.checked) {
                this.parentNode.parentNode.style.backgroundColor = 'yellow';
            } else {
                this.parentNode.parentNode.style.backgroundColor = '';
            }
        },
        /**
         * 點擊肖串尾數「主肖checkbox」的事件
         * @param me ChShow物件
         */
        onXClk : function(me) {
            if (this.checked) {
                $('tr.Choice', me.tab5).removeClass('Choice');
                $(this.parentNode.parentNode.parentNode).addClass('Choice');
            }
            var X = this.value
            var F = $("input[name='F']:checked", me.tab6).val();
            $('td.wColorR, td.wColorG, td.wColorB', me.tab6).each(function() {
                this.className = 'c' + (this.className).substr(1, 6);
            });
            var _rep = [], td;
            $("tr.Choice > td > span", me.tab5).each(function() {
                _rep.push(this.innerHTML);
            });
            $("tr.Choice > td > span", me.tab6).each(function() {
                if ($.inArray(this.innerHTML,_rep) >= 0) {
                    td = this.parentNode;
                    td.className = 'w' + (td.className).substr(1, 6);
                }
            });
            me.ajaxXF(X,F);
        },
        /**
         * 點擊肖串尾數「拖尾數checkbox」的事件
         * @param me ChShow物件
         */
        onFClk : function(me) {
            if (this.checked) {
                $('tr.Choice', me.tab6).removeClass('Choice');
                $(this.parentNode.parentNode.parentNode).addClass('Choice');
            }
            var F = this.value;
            var X = $("input[name='X']:checked", me.tab5).val();
            $('td.wColorR, td.wColorG, td.wColorB').each(function() {
                this.className = 'c' + (this.className).substr(1, 6);
            });
            var _rep = [], td;
            $("tr.Choice > td > span", me.tab5).each(function() {
                _rep.push(this.innerHTML);
            });
            $("tr.Choice > td > span", me.tab6).each(function() {
                if ($.inArray(this.innerHTML,_rep) >= 0) {
                    td = this.parentNode;
                    td.className = 'w' + (td.className).substr(1, 6);
                }
            });
            me.ajaxXF(X, F);
        },
        /**
         * 點擊交差碰 「新增柱列」 的事件
         * @param me ChShow物件
         */
        onCrossAddClk : function (me) {
            var hit = me._hit, divs = hit.getElementsByTagName('div');
            var _d = Lang('del');
            if ((divs.length - 1) >= 49) {
                new_alert(Lang('Msg8_OfTouch4'));
            } else {
                _p.innerHTML = 'X';
                var p = _p.cloneNode(1);
                hit.insertBefore(p, hit.lastChild);
                div = _div.cloneNode(1), inp = _inp.cloneNode(1);
                var _d = Lang('del');
                inp.type = 'button';
                inp.value = _d;
                inp.disabled = true;
                inp.onclick = function() {me.onCrossDelClk.call(this, me);}
                div.appendChild(inp);
                inp = $("<input type='radio' name='Over' class='CRadio' />");
                inp.click(function() {me.onRadioClk.call(this);});
                $(div).append(inp);
                inp = $("<input type='hidden' name='Cross[]' />");
                $(div).append(inp);
                hit.insertBefore(div, hit.lastChild);
            }
            var _Over = me._form.Over;
            for (var i = 0, m = _Over.length; i < m; i++) {
                if (i == m - 1) {
                    _Over[i].checked = true;
                    _Over[i].parentNode.style.border = '2px solid red';
                } else {
                    _Over[i].checked = false;
                    _Over[i].parentNode.style.border = '1px solid #454545';
                }
            }
            var _Del = hit.getElementsByTagName('input');
            for (i = 0, m = _Del.length; i < m; i++) {
                if (_Del[i].type == 'button' && _Del[i].value == _d) {
                    _Del[i].disabled = false;
                }
            }
        },
        /**
         * 點擊交差碰 「刪除柱列」 的事件
         * @param me ChShow物件
         */
        onCrossDelClk : function (me) {
            var chk = this.nextSibling, inp = chk.nextSibling, div = this.parentNode, v = inp.value, ary = v.split(','), is = false;
            is = chk.checked;
            var node, span;
            for (var i = 0, m = ary.length; i < m; i++) {
                if (document.getElementById('B' + ary[i])) {
                    node = document.getElementById('B' + ary[i]);
                    node.style.backgroundColor = _nColor;
                    span = $(node).find('span:eq(0)').each(function(){
                        this.x = 0;
                        $(this).show();
                    });
                }
            }
            var p = div.nextSibling;
            if (p.tagName != 'P') {
                p = div.previousSibling;
            }
            div.parentNode.removeChild(div);
            p.parentNode.removeChild(p);
            var divs = me._hit.getElementsByTagName('div');
            var d = Lang('del');
            if (me.minChk >= (divs.length - 1)) {
                var inps = me._hit.getElementsByTagName('input');
                for (i = 0, m = inps.length; i < m; i++) {
                    if (inps[i].type == 'button' && inps[i].value == d) {
                        inps[i].disabled = true;
                    }
                }
            }
            if (is) {
                me._form.Over[0].checked = true;
                me._form.Over[0].parentNode.style.border = '2px solid red';
            }
            me.ajaxCross();
        },
        /**
         * 點擊交差碰 「選擇柱列checkobx」 的事件
         */
        onRadioClk : function() {
            var _form = this.form;
            for (var i = 0, m = _form.Over.length; i < m; i++) {
                _form.Over[i].parentNode.style.border = '1px dotted #454545';
            }
            if (this.checked) {
                this.parentNode.style.border = '2px solid red';
            } else {
                this.parentNode.style.border = '1px dotted #454545';
            }
        },
        /**
         * 點擊交差碰 「號碼」 的事件
         * @param me ChShow物件
         */
        onNumClk : function (me) {
            if (this.x != 1) {
                this.parentNode.style.backgroundColor = _cColor;
                this.x = 1;
                var Over = me._form.Over, _now = null;
                for (var i = 0, m = Over.length; i < m; i++) {
                    if (Over[i].checked) {
                        _now = Over[i];
                        break;
                    }
                }
                var n = this.innerHTML, inp = _now.nextSibling, div = _now.parentNode, span = _span.cloneNode(1);
                if (inp.value == '') {
                    inp.value = n;
                } else {
                    inp.value += ',' + n;
                }
                span.className = numColor[n];
                span.innerHTML = n;
                span.onclick = function() {me.onBallClk.call(this, me);}
                div.appendChild(span);
                this.style.display = 'none';
                me.ajaxCross();
            } else {
                this.parentNode.style.backgroundColor = _nColor;
                this.x = 0;
                var n = this.innerHTML;
                this.style.display = '';
                $(me._hit).find('span').each(function() {
                    if (this.innerHTML == n) {
                        var div = this.parentNode, inps = div.getElementsByTagName('input'), inp = inps[2], v = inp.value, a = v.split(','), _a = [];
                        for (var i = 0, m = a.length; i < m; i++) {
                            if (a[i] != this.innerHTML) {
                                _a.push(a[i]);
                            }
                        }
                        inp.value = _a.join(',');
                        div.removeChild(this);
                        me.ajaxCross();
                    }
                });
            }
        },
        /**
         * 點擊交差碰 「取消號碼」 的事件
         * @param me ChShow物件
         */
        onBallClk : function (me) {
            if (document.getElementById('B' + this.innerHTML)) {
                var td = document.getElementById('B' + this.innerHTML);
                td.style.backgroundColor = _nColor;
                //$('span', td).attr('x', 0).css('background-color',_nColor).show(); 
                $(td).find('span').each(function() {
                    this.x = 0;
                    this.style.display = '';
                });
                var div = this.parentNode, inps = div.getElementsByTagName('input'), inp = inps[2], v = inp.value, a = v.split(','), _a = [];
                for (var i = 0, m = a.length; i < m; i++) {
                    if (a[i] != this.innerHTML) {
                        _a.push(a[i]);
                    }
                }
                inp.value = _a.join(',');
                div.removeChild(this);
                me.ajaxCross();
            }
        },
        /**
         * 點擊交差碰 「快選」 的事件
         * @param me ChShow物件
         */
        onQuickAtagClk : function (me) {
            var key = this.x;
            //色波                        生肖                                                                 尾數                          選取的號碼陣列
            var _color = ['r', 'b', 'g'], _an = ['a1','a2','a3','a4','a5','a6','a7','a8','a9','aa','ab','ac'], _fin = ['0','1','2','3','4','5','6','7','8','9'], _sel = [];
            if ($.inArray(key, _color) >= 0) {
                var _numColor = numColor;
                for (var k in _numColor) {
                    if (_numColor[k].substr(6,1) == key.toUpperCase()) {
                        _sel.push(k);
                    }
                }
            } else if ($.inArray(key, _an) >= 0) {
                var idx = $.inArray(key, _an); 
                _sel = (me.an2no[11-idx].replace(new RegExp(' ',"gm"),'')).split(','); 
            } else if ($.inArray(key, _fin) >= 0) {
                var n;
                for (var i = 0; i < 5; i++) {
                    n = i * 10 + parseInt(key, 10); 
                    if (n > 0) {
                        _sel.push(numFormat(n));
                    }
                }
            }
            var td, span;
            for (var j = 0, m = _sel.length; j < m; j++) {
                td = document.getElementById('B' + _sel[j]);
                span = td.getElementsByTagName('span')[0];
                (span.x != 1) && (me.onNumClk.call(span, me));
            }
        },
        /**
         * 點擊膽拖 「膽碼」 的事件
         * @param me ChShow物件
         */
        onDtDClk : function (me) {
            var td = this.parentNode, inp = me._inpDtD[this.innerHTML], v = inp.value, inpT = me._inpDtT[v], tdT = inpT.parentNode, spanT = tdT.getElementsByTagName('span')[0];
            if (inp.checked) {
                inp.checked = false;
                td.style.backgroundColor = '';
                inpT.checked = false;
                spanT.style.display = '';
                tdT.className = 'b' + (numColor[v]).substr(1, 6);
            } else {
                var _count = $("input[name='Dantuo1[]']:checked", me.dtDivTag).length;
                if (_count >= me.maxDanChk) {
                    new_alert((Lang('Msg1_OfTouch5')).replace('%',me.maxDanChk));
                    return false;
                }
                inp.checked = true;
                td.style.backgroundColor = 'yellow';
                inpT.checked = false;
                spanT.style.display = 'none';
                tdT.className = '';
            }
            me.ajaxDt();
        },
        /**
         * 點擊膽拖 「拖碼」 的事件
         * @param me ChShow物件
         */
        onDtTClk : function (me) {
            var td = this.parentNode, inp = me._inpDtT[this.innerHTML], v = inp.value, inpD = me._inpDtD[v], tdD = inpD.parentNode, spanD = tdD.getElementsByTagName('span')[0];
            if (inp.checked) {
                inp.checked = false;
                td.style.backgroundColor = '';
                inpD.checked = false;
                spanD.style.display = '';
                tdD.className = 'b' + (numColor[v]).substr(1, 6);
            } else {
                inp.checked = true;
                td.style.backgroundColor = 'yellow';
                inpD.checked = false;
                spanD.style.display = 'none';
                tdD.className = '';
            }
            me.ajaxDt();
        },
        /**
         * 點擊膽拖色波 「膽碼」 的事件
         * @param me ChShow物件
         */
        onDtcDClk : function(me) {
            var td = this.parentNode, inp = td.getElementsByTagName('input')[0], v = inp.value, inpC = me._inpDtcC[v], tdC = inpC.parentNode, spanC = tdC.getElementsByTagName('span')[0];
            if (inp.checked) {
                inp.checked = false;
                td.style.backgroundColor = '';
                inpC.checked = false;
                spanC.style.display = '';
                tdC.className = 'b' + (numColor[v]).substr(1,6);
            } else {
                var _count = $("input[name='DantuoC1[]']:checked", me.dtcDivTag).length;
                if (_count >= me.maxDanChk) {
                    new_alert((Lang('Msg1_OfTouch5')).replace('%',me.maxDanChk));
                    return false;
                }
                inp.checked = true;
                td.style.backgroundColor = 'yellow';
                inpC.checked = false;
                spanC.style.display = 'none';
                tdC.className = '';
            }
            me.ajaxDtc();
        },
        /**
         * 點擊膽拖色波 「色波」 的事件
         * @param me ChShow物件
         */
        onDtcCClk : function(me) {
            var _class = 's' + (this.parentNode.className).substr(1,6), _numColor = numColor, x = this.x, inpD, tdD, spanD, inpC, tdC, spanC;
            for ( var k in me._inpDtcC) {
                if ((_numColor[k] == _class) && (!me._inpDtcD[k].checked)) {
                    inpD = me._inpDtcD[k];
                    tdD = inpD.parentNode;
                    spanD = tdD.getElementsByTagName('span')[0];
                    inpC = me._inpDtcC[k];
                    tdC = inpC.parentNode;
                    spanC = tdC.getElementsByTagName('span')[0];
                    if (x == 1) {
                        inpC.checked = false;
                        spanC.style.display = '';
                        tdC.style.backgroundColor = '';
                        inpD.checked = false;
                        spanD.style.display = '';
                        tdD.className = 'b' + _class.substr(1,6);
                    } else {
                        inpC.checked = true;
                        spanC.style.display = '';
                        tdC.style.backgroundColor = 'yellow';
                        inpD.checked = false;
                        spanD.style.display = 'none';
                        tdD.className = '';
                    }
                }
            }
            if (x == 1){
                this.x = 0;
            } else {
                this.x = 1;
            }
            me.ajaxDtc();
        },
        /**
         * 點擊膽拖生肖 「膽碼」 的事件
         * @param me ChShow物件
         */
        onDtSpaDClk : function (me) {
            var td = this.parentNode, inp = me._inpDtspaD[this.innerHTML];
            if (inp.checked) {
                inp.checked = false;
                td.style.backgroundColor = '';
            } else {
                var _count = $("input[name='DantuoSpa1[]']:checked").length;
                if (_count >= me.maxDanChk) {
                    new_alert((Lang('Msg1_OfTouch5')).replace('%',me.maxDanChk));
                    return false;
                }
                inp.checked = true;
                td.style.backgroundColor = 'yellow';
            }
            var tables = me.dtspaDivTag.getElementsByTagName('table');
            $('td.wColorR, td.wColorG, td.wColorB', tables[1]).each(function() {
                this.className = 'c' + (this.className).substr(1, 6);
            });
            var _chk = [], _numColor = numColor;
            $("input[name='DantuoSpa1[]']:checked").each(function() {
                _chk.push(this.value);
            });
            $('span', tables[1]).each(function() {
                if ($.inArray(this.innerHTML, _chk) >= 0) {
                    this.parentNode.className = 'w' + (_numColor[this.innerHTML]).substr(1,6);
                } 
            });
            me.ajaxDtspa();
        },
        /**
         * 點擊膽拖生肖 「生肖」 的事件
         * @param me ChShow物件
         */
        onDtSpaSClk : function (me) {
            var tr = this.parentNode.parentNode.parentNode;
            if (this.checked) {
                tr.className = "Choice";
            } else {
                tr.className = "";
            }
            var tables = me.dtspaDivTag.getElementsByTagName('table');
            $('td.wColorR, td.wColorG, td.wColorB', tables[1]).each(function() {
                this.className = 'c' + (this.className).substr(1, 6);
            });
            var _chk = [], _numColor = numColor;
            $("input[name='DantuoSpa1[]']:checked").each(function() {
                _chk.push(this.value);
            });
            $('span', tables[1]).each(function() {
                if ($.inArray(this.innerHTML, _chk) >= 0) {
                    this.parentNode.className = 'w' + (_numColor[this.innerHTML]).substr(1,6);
                } 
            });
            me.ajaxDtspa();
        },
        /**
         * 表單執行送出的事件
         * @param me ChShow物件
         */
        onFormSubmit : function (me) {
            var _count = 0;
            for (var i = 0, m = me._switch.length; i < m; i++) {
                 if (me._switch[i].checked) {
                     _count++;
                 }
            }
            if (_count == 0) {
                new_alert(Lang('ALERT_PLS_SELECT_WAGERS_TYPE'));
                return false;
            }
            _count = 0;
            $(me._inpNum).each(function (){
                if (this.checked) {
                    _count++;
                }
            });
            if (me._switchRS.checked) {
                _count--;
            }
            if (me._switchRS.checked && me._inpR.value == '') {
                new_alert(Lang('Msg4_CH'));
                me.selectRS('R');
                return false;
            }
            if (_count > me.maxChk) {
                new_alert(Lang('Msg3_CH'));
                return false;
            }
            var isSub = false;
            for (var sub in me._switchSub) {
                if (me._switchSub[sub].checked) {
                    isSub = true;
                }
            }
            if (_count < me.minChk && !isSub) {
                new_alert(Lang('Msg1_NI').replace('%s',me.minChk));
                return false;
            } else {
                $.ajax({
                    url:this.action,
                    dataType : 'script',
                    data : $(this).serialize(),
                    type : 'POST'
                });
            }
        },
        /**
         * 表單執行取消的事件
         * @param me ChShow物件
         */
        onReset : function () {
            this._form.reset();
            this.nowChk = 1;
            this.nowSpa = 1;
            this.nowFin = 1;
            this.clearBgColor();
            this.enableSpa('Y');
            this.enableFin('Y');
            this.enableForm('N');
            this._switchRS.checked = false;
            this.selectRS('R');
            this.toggleRS();
            this.hideAllTag();
            $(this.tab2).show();
            for ( k in this._switchSub) {
                $(this._switchSub[k]).prop({checked:false,disabled:true});
            }
            $('tr.Choice', this.tab5).removeClass('Choice');
            $('tr.Choice', this.tab6).removeClass('Choice');
            this._ballTag.innerHTML = "<p>" + Lang('Msg4_Quick') + "<span style=background-color:rgb(0,255,0)>&nbsp;&nbsp;&nbsp;</span></p>";
            this.filterRound();
        },
        /**
         * 膽拖玩法點擊「取消」的事件
         * @param me ChShow物件
         */
        onDtReset : function(me) {
            var td, span, _numColor = numColor;
            $("input[name^=Dantuo][type=checkbox]", this).each(function() {
                this.checked = false;
                if (this.name == 'DantuoSpa2[]') {
                    this.parentNode.parentNode.parentNode.className = ''; 
                } else {
                    td = this.parentNode;
                    span = td.getElementsByTagName('span')[0];
                    td.style.backgroundColor = '';
                    if (this.value.match(/[0-9]{2,}/)) {
                        td.className = 'b' + (_numColor[this.value]).substr(1,6);
                    }
                    if (typeof span != 'undefined') {
                        span.style.display = '';
                    }
                }
            });
            me._btnSend['dt'].disabled = true;
            me._btnSend['dtc'].disabled = true;
            me._btnSend['dtspa'].disabled = true;
            var msg = Lang('Msg1_NI');
            me._ballTag.innerHTML = '<p style="color:rgb(187,187,187)">' + msg.replace("%s", me.minChk) + '<span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></p>';
        },
        /**
         * 停用用啟用連碼checkbox
         * @param YN 停用(N)或啟用(N)
         */
        enableForm : function (YN) {
            $(this._inpNum).each(function() {
                if (YN == 'N' && !this.checked) {
                    this.disabled = true;
                }
                if (YN == 'Y') {
                    this.disabled = false;
                }
            });
        },
        /**
         * 停用用啟用生肖對碰checkbox
         * @param YN 停用(N)或啟用(N)
         */
        enableSpa : function (YN) {
            $(this._inpSpa).each(function() {
                if (YN == 'N' && !this.checked) {
                    this.disabled = true;
                }
                if (YN == 'Y') {
                    this.disabled = false;
                }
            });
        },
        /**
         * 停用用啟用尾數對碰checkbox
         * @param YN 停用(N)或啟用(N)
         */
        enableFin : function (YN) {
            $(this._inpFin).each(function() {
                if (YN == 'N' && !this.checked) {
                    this.disabled = true;
                }
                if (YN == 'Y') {
                    this.disabled = false;
                }
            });
        },
        /**
         * 用js畫出肖串尾數html
         */
        drawXF : function () {
            this.hideAllTag();
            var _numColor = numColor;
            var tbody = _tbody.cloneNode(1);
            if (this.tab5.rows.length == 0) {
                var tr, td, inp;
                var aAN = ['A1','A2','A3','A4','A5','A6','A7','A8','A9','AA','AB','AC'];
                var _an = [Lang('game_type11_A1'),Lang('game_type11_A2'),Lang('game_type11_A3'),Lang('game_type11_A4'),Lang('game_type11_A5'),Lang('game_type11_A6'),Lang('game_type11_A7'),Lang('game_type11_A8'),Lang('game_type11_A9'),Lang('game_type11_AA'),Lang('game_type11_AB'),Lang('game_type11_AC')];
                tr = _tr.cloneNode(1);
                tr.className = 'title_tr';
                td = _td.cloneNode(1);
                td.colSpan = 7;
                td.innerHTML = Lang('Msg1_OfTouch3');
                tr.appendChild(td);
                tbody.appendChild(tr);
                var _this = this, a, an;
                var _clickX = function() {
                    _this.onXClk instanceof Function && (_this.onXClk.call(this, _this));
                }
                for (var i = 0; i < 12; i++) {
                    tr = _tr.cloneNode(1);
                    td = _td.cloneNode(1);    
                    td.className = 'cc';
                    inp = $("<input name='X' type='radio' />");
                    inp.val(aAN[i]);
                    inp.click(_clickX);
                    $(td).append(_$label.clone(1).addClass('padding_label').append(inp));
                    tr.appendChild(td);
                    td = _td.cloneNode(1);
                    td.innerHTML = _an[i];
                    tr.appendChild(td);
                    a = this.an2no[11-i].split(',');
                    for (var j = 0, m = a.length; j < m; j++) {
                        an = a[j].replace(' ','');
                        td = _td.cloneNode(1);
                        td.className = (_numColor[an]).replace('sC', 'cC');
                        td.style.width = '35px';
                        td.innerHTML = '<span>' + an + '</span>';
                        tr.appendChild(td);
                    }
                    if (m == 4) {
                        td = _td.cloneNode(1);
                        tr.appendChild(td);
                    }
                    tbody.appendChild(tr);
                }
            }
            this.tab5.appendChild(tbody);
            $(this.tab5).show();
            tbody = _tbody.cloneNode(1);
            if (this.tab6.rows.length == 0) {
                tr = _tr.cloneNode(1);
                tr.className = 'title_tr';
                td = _td.cloneNode(1);
                td.colSpan = 6;
                td.innerHTML = Lang('Msg2_OfTouch3');
                tr.appendChild(td);
                tbody.appendChild(tr);
                var Ball, n, v;
                var _clickF = function() {
                    _this.onFClk instanceof Function && (_this.onFClk.call(this, _this));
                }
                for (var i = 0; i < 10; i++) { 
                    tr = _tr.cloneNode(1);
                    td = _td.cloneNode(1);
                    td.className = 'cc';
                    inp = $("<input type='radio' name='F' />");
                    v = (i + 1)%10;
                    inp.val(v);
                    inp.click(_clickF);
                    $(td).append(_$label.clone(1).addClass('padding_label').append(inp).append(document.createTextNode(v)));
                    tr.appendChild(td);
                    tbody.appendChild(tr);
                    for (var j = 0; j < 5; j++) {
                        Ball = (i + 1) + j * 10;
                        n = numFormat(Ball);
                        td = _td.cloneNode(1);
                        if (Ball < 50) {
                            td.className = (_numColor[n]).replace('sC', 'cC');
                            td.style.width = '35px';
                            td.innerHTML = '<span>' + n + '</span>';
                        }
                        tr.appendChild(td);
                    }
                    tbody.appendChild(tr);
                }
            }
            this.tab6.appendChild(tbody);
            $(this.tab6).show();
            $('#XF_Send').show();
        },
        /**
         * 用js畫出交差碰html
         */
        drawCross : function () {
            this.hideAllTag();
            $(this.crossOverTag).show();
            this._switchRS.checked = false;
            this.selectRS('R');
            this.toggleRS();
            this._warn.innerHTML = '';
            this._hit.innerHTML = '';
            _p.innerHTML = 'X';
            var _d = Lang('del');
            var me = this;
            var _clickC = function() {me.onCrossDelClk.call(this, me);}
            var _clickR = function() {me.onRadioClk.call(this);}
            for (var i = 0; i < this.minChk; i++) {
                var div = _div.cloneNode(1), inp = _inp.cloneNode(1); 
                inp.type = 'button';
                inp.value = _d;
                inp.disabled = true;
                inp.name = 'delCf';
                //綁定刪除交差碰function
                inp.onclick = _clickC;
                div.appendChild(inp);
                if (i == 0) {
                    inp = $("<input type='radio' name='Over' class='Cradio' checked='checked' />");
                    div.style.border = '2px solid red';
                } else {
                    inp = $("<input type='radio' name='Over' class='Cradio' />");
                }
                inp.click(_clickR);
                $(div).append(inp);
                inp = $("<input type='hidden' name='Cross[]' />");
                $(div).append(inp);
                this._hit.appendChild(div);
                if (i < (this.minChk - 1)) {
                    var p = _p.cloneNode(1);
                    this._hit.appendChild(p);
                }
            }
            this._btnSend['dt'].disabled = true;
            this._btnSend['dtc'].disabled = true;
            this._btnSend['dtspa'].disabled = true;

            div = _div.cloneNode(1);
            div.setAttribute('id', 'AddCross');
            inp = _inp.cloneNode(1);
            inp.type = 'button';
            inp.value = Lang('Msg1_OfTouch4');
            inp.name = 'addCf';
            inp.onclick = function() {me.onCrossAddClk.call(this, me);}
            div.appendChild(inp);
            this._hit.appendChild(div);
            var numDiv = this._numBtnDiv;
            var tables = numDiv.getElementsByTagName('table'), table, divs;
            if (tables.length == 0) {
                table = _table.cloneNode(1); 
                divs = numDiv.getElementsByTagName('div'), div = divs[0];
                numDiv.insertBefore(table, div);
            } else {
                table = tables[0];
                while (table.rows.length > 0) {
                    table.deleteRow(-1);
                }
            }
            var tr, td, span, n, s, c, _numColor = numColor, tbody = _tbody.cloneNode(1);
            var _clickSpan = function (){me.onNumClk.call(this, me);};
            for (i = 0; i < 10; i++) {
                tr = _tr.cloneNode(1);
                tr.style.height = '25px';
                for (var j = 0; j < 5; j++) {
                    td = _td.cloneNode(1);
                    n = j * 10+ i + 1;
                    s = numFormat(n);
                    if (n < 50) {
                        td.setAttribute('id', 'B' + s); 
                        span = _span.cloneNode(1);
                        switch (_numColor[s]) {
                            case 'sColorR' :
                                c = 'red';
                                break;
                            case 'sColorG' :
                                c = 'green';
                                break;
                            case 'sColorB' :
                                c = 'blue';
                                break;
                            deafult :
                                c = 'black';
                        }
                        span.style.color = c;
                        span.innerHTML = s;
                        span.onclick = _clickSpan;
                        td.appendChild(span);
                    } else {
                        td.className = 'ball_td';
                    }
                    tr.appendChild(td);
                }
                tbody.appendChild(tr);
            }
            table.appendChild(tbody);
            this._btnSend['cf'].disabled = true;
            
        },
        /**
         * 用js畫出膽拖 html
         */
        drawDantuo : function () {
            this._switchRS.checked = false;
            this.selectRS('R');
            this.toggleRS();
            this.hideAllTag();
            var tables = this.dtDivTag.getElementsByTagName('table');
            var _dClick = function () {
                (_this.onDtDClk instanceof Function) && _this.onDtDClk.call(this, _this);
            }
            var _tClick = function () {
                (_this.onDtTClk instanceof Function) && _this.onDtTClk.call(this, _this);
            }
            if (tables.length == 0) {
                var divs = this.dtDivTag.getElementsByTagName('div'), divD = divs[0], divT = divs[1], _this = this;
                //$(_inp).prop('type', 'checkbox');
                var tableD = _table.cloneNode(1), tableT, n, no, _numColor = numColor, tr, td, span, tbody = _tbody.cloneNode(1);
                for (var i = 0; i < 10; i++) {
                    tr = _tr.cloneNode(1);
                    for (var j = 0; j < 5; j++) {
                        n = j * 10 + i + 1;
                        no = numFormat(n);
                        if (n < 50) {
                            td = _td.cloneNode(1);
                            td.setAttribute('id', 'D1' + no);
                            td.className = (numColor[no]).replace('sC','bC');
                            span = _span.cloneNode(1);
                            span.onclick = _dClick;
                            span.innerHTML = no;
                            td.appendChild(span);
                            inp = _inp.cloneNode(1);
                            inp.setAttribute('name', 'Dantuo1[]');
                            inp.setAttribute('type', 'checkbox');
                            inp.value = no;
                            this._inpDtD[no] = inp;
                            td.appendChild(inp);

                            tr.appendChild(td);
                        } else {
                            td = _td.cloneNode(1);
                            tr.appendChild(td);
                        }
                    }
                    tbody.appendChild(tr);
                }
                tableD.appendChild(tbody);
                tableT = tableD.cloneNode(1);
                $('span', tableT).each(function () {
                    td = this.parentNode;
                    inp = td.getElementsByTagName('input')[0];
                    td.setAttribute('id', 'D2' + this.innerHTML);
                    this.onclick = _tClick;
                    inp.setAttribute('name', 'Dantuo2[]');
                    _this._inpDtT[inp.value] = inp;
                });

                divD.appendChild(tableD);
                divT.appendChild(tableT);
            } else {
                (this._btnCancel['dt']) && (this._btnCancel['dt'].onclick());
            } 
            $(this.dtDivTag).show();
        },
        /**
         * 用js畫出膽拖色波 html
         */
        drawDantuoC : function() {
            this._switchRS.checked = false;
            this.selectRS('R');
            this.toggleRS();
            this.hideAllTag();
            var tables = this.dtcDivTag.getElementsByTagName('table');
            if (tables.length == 0) {
                var divs = this.dtcDivTag.getElementsByTagName('div'), divD = divs[0], divC = divs[1], tr, td, span, inp, _this = this, tbody = _tbody.cloneNode(1);
                //$(_inp).prop('type', 'checkbox'); 
                var tableD = _table.cloneNode(1);
                var _clickC = function () {
                    (_this.onDtcDClk instanceof Function) && _this.onDtcDClk.call(this, _this);
                }
                for (var i = 0; i < 10; i++) {
                    tr = _tr.cloneNode(1);
                    for (var j = 0; j < 5; j++) {
                        n = j * 10 + i + 1;
                        no = numFormat(n);
                        if (n < 50) {
                            td = _td.cloneNode(1);
                            td.setAttribute('id', 'C' + no);
                            td.className = (numColor[no]).replace('sC','bC');
                            span = _span.cloneNode(1);
                            span.onclick = _clickC;
                            span.innerHTML = no;
                            td.appendChild(span);
                            inp = _inp.cloneNode(1);
                            inp.setAttribute('name', 'DantuoC1[]');
                            inp.setAttribute('type', 'checkbox');
                            inp.value = no;
                            this._inpDtcD[no] = inp;
                            td.appendChild(inp);

                            tr.appendChild(td);
                        } else {
                            td = _td.cloneNode(1);
                            tr.appendChild(td);
                        }
                    }
                    tbody.appendChild(tr);
                }
                tableD.appendChild(tbody);
                tableC = tableD.cloneNode(1);
                $('span', tableC).each(function () {
                    td = this.parentNode;
                    inp = td.getElementsByTagName('input')[0];
                    this.onclick = function (){};
                    td.setAttribute('id', 'RGB' + this.innerHTML);
                    inp.setAttribute('name', 'DantuoC2[]');
                    _this._inpDtcC[inp.value] = inp;
                });
                tr =_tr.cloneNode(1);
                var rgb = ['R', 'G', 'B'], c;
                var _clickCC = function() {
                    _this.onDtcCClk && _this.onDtcCClk.call(this,_this);
                }
                for (i = 0; i < 3; i++) {
                    td = _td.cloneNode(1);
                    c = rgb[i]
                    td.className = 'bColor' + c;
                    span = _span.cloneNode(1);
                    span.setAttribute('id', 'btn' + c);
                    span.style.fontSize = '7pt';
                    span.appendChild(document.createTextNode(Lang('SP_' + c)));
                    span.onclick = _clickCC;
                    td.appendChild(span);
                    tr.appendChild(td);
                    this['_btn' + c] = span;
                }
                tbody  = tableC.getElementsByTagName('tbody')[0];
                var firstTR = tbody.firstChild;
                tbody.insertBefore(tr, firstTR);
                divD.appendChild(tableD);
                divC.appendChild(tableC);
            } else {
                (this._btnCancel['dtc']) && (this._btnCancel['dtc'].onclick());
            }
            $(this.dtcDivTag).show();
        },
        /**
         * 用js畫出膽拖生肖 html
         */
        drawDantuoSpa : function (me) {
            this._switchRS.checked = false;
            this.selectRS('R');
            this.toggleRS();
            this.hideAllTag();
            var tables = this.dtspaDivTag.getElementsByTagName('table');
            if (tables.length == 0) {
                var divs = this.dtspaDivTag.getElementsByTagName('div'), divD = divs[0], divSpa = divs[1], tr, td, span, inp, _this = this, tbody = _tbody.cloneNode(1);
                var _clickSpaD = function () {
                    (_this.onDtSpaDClk instanceof Function) && _this.onDtSpaDClk.call(this, _this);
                };
                //$(_inp).prop('type', 'checkbox'); 
                var tableD = _table.cloneNode(1);
                for (var i = 0; i < 10; i++) {
                    tr = _tr.cloneNode(1);
                    for (var j = 0; j < 5; j++) {
                        n = j * 10 + i + 1;
                        no = numFormat(n);
                        if (n < 50) {
                            td = _td.cloneNode(1);
                            td.setAttribute('id', 'S1' + no);
                            td.className = (numColor[no]).replace('sC','bC');
                            span = _span.cloneNode(1);
                            span.onclick = _clickSpaD;
                            span.innerHTML = no;
                            td.appendChild(span);
                            inp = _inp.cloneNode(1);
                            inp.setAttribute('name', 'DantuoSpa1[]');
                            inp.type = 'checkbox';
                            inp.value = no;
                            this._inpDtspaD[no] = inp;
                            td.appendChild(inp);
                            tr.appendChild(td);
                        } else {
                            td = _td.cloneNode(1);
                            tr.appendChild(td);
                        }
                    }
                    tbody.appendChild(tr);
                }
                tableD.appendChild(tbody);
                divD.appendChild(tableD);
                var tableS = _table.cloneNode(1), _an = ['A1','A2','A3','A4','A5','A6','A7','A8','A9','AA','AB','AC'], _numColor = numColor;
                tableS.className = 's';
                tbody = _tbody.cloneNode(1);
                var _lang = [Lang('game_type11_A1'),Lang('game_type11_A2'),Lang('game_type11_A3'),Lang('game_type11_A4'),Lang('game_type11_A5'),Lang('game_type11_A6'),Lang('game_type11_A7'),Lang('game_type11_A8'),Lang('game_type11_A9'),Lang('game_type11_AA'),Lang('game_type11_AB'),Lang('game_type11_AC')];
                var _clickSpaS = function () {
                    (_this.onDtSpaSClk instanceof Function) && _this.onDtSpaSClk.call(this, _this);
                }
                for (i = 0; i < 12; i++) {
                    tr = _tr.cloneNode(1);
                    td = _td.cloneNode(1);
                    inp = _inp.cloneNode(1);
                    inp.setAttribute('name', 'DantuoSpa2[]');
                    inp.setAttribute('type', 'checkbox');
                    inp.value = _an[i];
                    inp.onclick = _clickSpaS;
                    this._inpDtspaS[_an[i]] = inp;
                    $(td).append(_$label.clone(1).addClass('padding_label').append(inp).append(document.createTextNode(_lang[i])));
                    tr.appendChild(td);
                    var a = (this.an2no[11-i].replace(new RegExp(' ',"gm"),'')).split(','), _a ;
                    for (j = 0; j < 5; j++) {
                        td = _td.cloneNode(1);
                        if (typeof a[j] != 'undefined') {
                            _a = a[j];
                            td.className = 'c' + (_numColor[_a]).substr(1,6);
                            span = _span.cloneNode(1);
                            span.innerHTML = _a;
                            td.appendChild(span);
                        } 
                        tr.appendChild(td);
                    } 
                    tr.appendChild(td);
                    tbody.appendChild(tr);
                }
                tableS.appendChild(tbody);
                divSpa.appendChild(tableS);
            } else {
                (this._btnCancel['dtspa']) && (this._btnCancel['dtspa'].onclick());
            }
            $(this.dtspaDivTag).show();
        },
        /**
         * 肖串尾數統計組合的ajax事件
         * @param X 生肖
         * @param F 尾數
         */
        ajaxXF : function(X, F) {
            var _chkF = ['0','1','2','3','4','5','6','7','8','9'];
            var _chkX = ['A1','A2','A3','A4','A5','A6','A7','A8','A9','AA','AB','AC'];
            var _resultF = {'0':["10","20","30","40"],'1':["01","11","21","31","41"],'2':["02","12","22","32","42"],'3':["03","13","23","33","43"],'4':["04","14","24","34","44"],'5':["05","15","25","35","45"],'6':["06","16","26","36","46"],'7':["07","17","27","37","47"],'8':["08","18","28","38","48"],'9':["09","19","29","39","49"]};
            //马年
            //var _resultX = {'A1':["07","19","31","43"],'A2':["06","18","30","42"],'A3':["05","17","29","41"],'A4':["04","16","28","40"],'A5':["03","15","27","39"],'A6':["02","14","26","38"],'A7':["01","13","25","37","49"],'A8':["12","24","36","48"],'A9':["11","23","35","47"],'AA':["10","22","34","46"],'AB':["09","21","33","45"],'AC':["08","20","32","44"]};

            //羊年
            var _resultX = {'A1':["08","20","32","44"],'A2':["07","19","31","43"],'A3':["06","18","30","42"],'A4':["05","17","29","41"],'A5':["04","16","28","40"],'A6':["03","15","27","39"],'A7':["02","14","26","38"],'A8':["01","13","25","37","49"],'A9':["12","24","36","48"],'AA':["11","23","35","47"],'AB':["10","22","34","46"],'AC':["09","21","33","45"]};
            if (($.inArray(X, _chkX) != -1) && ($.inArray(F, _chkF) != -1)) {

                var totalArray = [];
                var a1 = _resultX[X];
                var a2 = _resultF[F];

                for(var i2=0;i2<_resultX[X].length;i2++){
                    for(var i3=0;i3<_resultF[F].length;i3++){
                        if(_resultX[X][i2] == _resultF[F][i3]){
                            a2.splice($.inArray(_resultF[F][i3],a2),1);
                        }
                    }
                }

                for(var i2=0;i2<a1.length;i2++){
                    for(var i3=0;i3<a2.length;i3++){
                        totalArray.push(a1[i2] + ", " + a2[i3]);
                    }
                }
                var pageString = '<p>组合共 <font id="TotalBall" color="red">'+totalArray.length+'</font> 组</p>';
                for(var m=0;m<totalArray.length;m++){
                    if(m==totalArray.length-1){
                        pageString += '<p><div style="color:rgb(187,187,255);font-weight:bold;clear:both;">组合'+(m+1)+':</div><p>'+totalArray[m]+'</p><span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></p>';
                    }else{
                        pageString += '<p><div style="color:rgb(187,187,255);font-weight:bold;clear:both;">组合'+(m+1)+':</div><p>'+totalArray[m]+'</p></p>';
                    }
                }
                this._ballTag.innerHTML = pageString;
            }
        },
        /**
         * 交差碰統計組合的ajax事件
         */
        ajaxCross : function() {
            var inps = this._form["Cross[]"], t = 0, a = [];
            for (var i = 0, m = inps.length; i < m; i++) {
                if (inps[i].value != '') {
                    t++;
                    a.push("Cross[]=" + inps[i].value);
                }
            }
            var min = this.minChk;
            if (t >= min) {
                var url = this._urlBall + '?ballnum=' + min + '&' + a.join('&') + '&Show=JS';
                var _this = this;
                $.get(url, function (data) {
                    _this._ballTag.innerHTML = data;
                    var total = document.getElementById('TotalBall').innerHTML;
                    if ((total > 286 && min > 2) || (total > 253 && min)) {
                        switch (min) {
                            case 2 :
                                _this._warn.innerHTML = Lang('Msg2_OfTouch4');
                                break;
                            case 3 :
                                _this._warn.innerHTML = Lang('Msg3_OfTouch4');
                                break;
                            case 4:
                                _this._warn.innerHTML = Lang('Msg4_OfTouch4');
                                break;
                        }     
                        _this._btnSend['cf'].disabled = true;
                    } else {
                        _this._btnSend['cf'].disabled = false;
                        _this._warn.innerHTML = '';
                    }
                });
            } else {
                var msg = Lang('Msg1_NI');
                this._ballTag.innerHTML = '<p style="color:rgb(187,187,187)">' + msg.replace("%s", min) + '<span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></p>';
                this._warn.innerHTML = '';
                this._btnSend['cf'].disabled = true;
            }
        },
        /**
         * 膽拖統計組合的ajax事件
         */
        ajaxDt : function () {
            //膽碼
            var d = [], t = [];
            $("input[name='Dantuo1[]']:checked", this.dtDivTag).each(function () {
                d.push(this.value);
            });
            $("input[name='Dantuo2[]']:checked", this.dtDivTag).each(function () {
                t.push(this.value);
            });
            if (d.length > 0 && ((t.length >= this.minChk - 1) && this.minChk == 2) || ((d.length + t.length >= this.minChk) && this.minChk > 2)) {
                var totalArray = [];
                var a1 = d;
                var a2 = t;

                if(this.minChk == 2){//两个球的玩法
                    for(var i2=0;i2<a1.length;i2++){
                        for(var i3=0;i3<a2.length;i3++){
                            totalArray.push(a1[i2] + ", " + a2[i3]);
                        }
                    }
                }else if(this.minChk == 3){//三个球的玩法
                    if(a1.length==1){
                        var minChk = 2;
                        var totalArray_21 = [];
                        //初始化第一个数据
                        var tmp2Array = [];
                        for(var n=0;n<minChk;n++){
                            tmp2Array.push(a2[n]);
                        }
                        totalArray_21.push(tmp2Array);
                        if(a2.length > minChk){
                            var totalSelectArray_21 = this.compile_array(a2.length, minChk);
                            //获取剩下组合
                            for(var j=0;j<totalSelectArray_21.length;j++){
                                var subArray_21 = [];
                                for(var k=0;k<minChk;k++){
                                    subArray_21.push(a2[totalSelectArray_21[j][k]-1]);
                                }
                                totalArray_21.push(subArray_21);
                            }
                        }
                        for(var i2=0;i2<totalArray_21.length;i2++){
                            totalArray.push(a1[0]+ ", "+ totalArray_21[i2][0] + ", " + totalArray_21[i2][1]);
                        }
                    }else if(a1.length==2){
                        for(var i3=0;i3<a2.length;i3++){
                            totalArray.push(a1[0]+ ", "+ a1[1] + ", " + a2[i3]);
                        }
                    }
                }else if(this.minChk == 4){//四个球的玩法
                    if(a1.length==1 || a1.length==2){
                        if(a1.length==1){
                            var minChk = 3;
                        }else if(a1.length==2){
                            var minChk = 2;
                        }
                        var totalArray_21 = [];
                        //初始化第一个数据
                        var tmp2Array = [];
                        for(var n=0;n<minChk;n++){
                            tmp2Array.push(a2[n]);
                        }
                        totalArray_21.push(tmp2Array);
                        if(a2.length > minChk){
                            var totalSelectArray_21 = this.compile_array(a2.length, minChk);
                            //获取剩下组合
                            for(var j=0;j<totalSelectArray_21.length;j++){
                                var subArray_21 = [];
                                for(var k=0;k<minChk;k++){
                                    subArray_21.push(a2[totalSelectArray_21[j][k]-1]);
                                }
                                totalArray_21.push(subArray_21);
                            }
                        }
                        if(a1.length==1){
                            for(var i2=0;i2<totalArray_21.length;i2++){
                                totalArray.push(a1[0]+ ", "+ totalArray_21[i2][0] + ", " + totalArray_21[i2][1]+ ", " + totalArray_21[i2][2]);
                            }
                        }else if(a1.length==2){
                            for(var i2=0;i2<totalArray_21.length;i2++){
                                totalArray.push(a1[0]+ ", " + a1[1]+ ", " + totalArray_21[i2][0] + ", " + totalArray_21[i2][1]);
                            }
                        }
                    }else if(a1.length==3){
                        for(var i3=0;i3<a2.length;i3++){
                            totalArray.push(a1[0]+ ", "+ a1[1] + ", "+ a1[2]+ ", " + a2[i3]);
                        }
                    }
                }

                var pageString = '<p>组合共 <font id="TotalBall" color="red">'+totalArray.length+'</font> 组</p>';
                for(var m=0;m<totalArray.length;m++){
                    if(m==totalArray.length-1){
                        pageString += '<p><div style="color:rgb(187,187,255);font-weight:bold;clear:both;">组合'+(m+1)+':</div><p>'+totalArray[m]+'</p><span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></p>';
                    }else{
                        pageString += '<p><div style="color:rgb(187,187,255);font-weight:bold;clear:both;">组合'+(m+1)+':</div><p>'+totalArray[m]+'</p></p>';
                    }
                }
                this._ballTag.innerHTML = pageString;
                this.dantuoChk('dt');
            } else {
                var msg = Lang('Msg1_NI');
                this._ballTag.innerHTML = '<p style="color:rgb(187,187,187)">' + msg.replace("%s", this.minChk) + '<span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></p>';
                this._btnSend['dt'].disabled = true; 
            }
        },
        /**
         * 膽拖色波統計組合的ajax事件
         */
        ajaxDtc : function () {
            //膽碼
            var d = [], c = [];
            $("input[name='DantuoC1[]']:checked", this.dtcDivTag).each(function () {
                d.push('DantuoC1[]=' + this.value);    
            });
            $("input[name='DantuoC2[]']:checked", this.dtcDivTag).each(function () {
                c.push('DantuoC2[]=' + this.value);    
            });
            if (d.length > 0 && ((c.length >= this.minChk - 1) && this.minChk == 2) || ((d.length + c.length >= this.minChk) && this.minChk > 2)) {
                var url = this._urlBall + '?ballnum=' + this.minChk + '&' + d.join('&') + '&' + c.join('&') + '&Show=JS';
                var _this = this;
                $.get(url, function (data) {
                    _this._ballTag.innerHTML = data;
                    _this.dantuoChk('dtc');
                });
            } else {
                var msg = Lang('Msg1_NI');
                this._ballTag.innerHTML = '<p style="color:rgb(187,187,187)">' + msg.replace("%s", this.minChk) + '<span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></p>';
                this._btnSend['dtc'].disabled = true; 
            } 
        },
        /**
         * 膽拖生肖統計組合的ajax事件
         */
        ajaxDtspa : function() {
            //膽碼
            var d = [], s = [];
            $("input[name='DantuoSpa1[]']:checked", this.dtspaDivTag).each(function () {
                d.push('DantuoSpa1[]=' + this.value);    
            });
            $("input[name='DantuoSpa2[]']:checked", this.dtspaDivTag).each(function () {
                s.push('DantuoSpa2[]=' + this.value);    
            });
            if (d.length > 0 && s.length > 0) {
                var url = this._urlBall + '?ballnum=' + this.minChk + '&' + d.join('&') + '&' + s.join('&') + '&Show=JS';
                var _this = this;
                $.get(url, function (data) {
                    _this._ballTag.innerHTML = data;
                    _this.dantuoChk('dtspa');
                });
            } else {
                var msg = Lang('Msg1_NI');
                this._ballTag.innerHTML = '<p style="color:rgb(187,187,187)">' + msg.replace("%s", this.minChk) + '<span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></p>';
                this._btnSend['dtspa'].disabled = true; 
            }
        },
        /**
         * 膽拖組合的檢查
         * @param k 索引key
         */
        dantuoChk : function (k) {
            var _total = document.getElementById('TotalBall').innerHTML, min = this.minChk, msg;
            if ((_total > 286 && min > 2) || (_total > 253 && min == 2)) {
                switch (min) {
                    case 2:
                        msg = Lang('Msg2_OfTouch4');
                        break;
                    case 3:
                        msg = Lang('Msg3_OfTouch4');
                        break;
                    case 4:
                        msg = Lang('Msg4_OfTouch4');
                        break;
                }
                this._warn.innerHTML = msg;
                new_alert(msg);
            } else {
                this._warn.innerHTML = '';
                this._btnSend[k].disabled = false;
            }
        },
        /**
         * 切換正副號
         * @param s 正號(R)或副號(S)
         */
        selectRS : function (s) {
            if (s == 'R') {
                this._RnumLabel.style.color = 'red';
                this._SnumLabel.style.color = 'white';
            } else {
                this._RnumLabel.style.color = 'white';
                this._SnumLabel.style.color = 'red';
            }
            this._rsStatus = s;
        },
        /**
         * 切換正副號後執行的動作
         */
        toggleRS : function () {
            var _isRS = this._switchRS.checked;
            if (_isRS) {
                $(this._RnumLabel).show();
                $(this._RnumTag).show();
                $(this._SnumLabel).show();
                $(this._SnumTag).show();
            } else {
                $(this._RnumLabel).hide();
                $(this._RnumTag).hide();
                $(this._SnumLabel).hide();
                $(this._SnumTag).hide();
            }
            if (this.nowChk <= this.maxChk && this.nowChk >= this.minChk) {
                var b = [], n, v, r = this._inpR.value;
                for (var i = 0, m = this._inpNum.length; i < m; i++) {
                    n = this._inpNum[i];
                    v = n.value;
                    if (n.checked) {
                        if (_isRS) {
                            if (r == '') {
                                this._inpR.value = v;
                                r = v 
                            }
                            if (r == v) {
                                b.push("rs_r=" + r); 
                            } else {
                                b.push("num[]=" + v); 
                            }
                        } else {
                            b.push("num[]=" + v); 
                        }
                    }
                }
                if (b.length) {
                    var u = this._urlBall + '?ballnum=' + this.minChk + '&' + b.join('&') + '&Show=JS';
                    var _this = this;
//                    $.get(u, function(data) {
//                        _this._ballTag.innerHTML = data;
//                    });
                }
            }
        },
        /**
         * 綁定生肖對應號碼陣列
         * @param ary 生肖對應球號陣列
         */
        sortZodiac : function (ary) {
             this.an2no = ary;
        },
        /**
         * 隱藏所有玩法html tag
         */
        hideAllTag : function () {
            var _this = this
            var k = ['rsTableTag','tab2','tab3','tab4','tab5','tab6','dtDivTag','dtcDivTag','dtspaDivTag','xfDivTag','crossOverTag'];
            $(k).each(function () { $(_this[this]).hide(); });
            $('#XF_Send').show();
        },
        /**
         * 顯示預設連碼玩法的html tag
         */
        showDefaultTab : function() {
            this.hideAllTag();
            $(this.rsTableTag).hide();//隐藏正/副号
            $(this.tab2).show();
        },
        /**
         * 清除底色
         */
        clearBgColor : function () {
            $(this._inpNum).each(function () {
                this.parentNode.parentNode.style.backgroundColor = '';
            });
            $(this._inpSpa).each(function () {
                this.parentNode.parentNode.style.backgroundColor = '';
            });
            $(this._inpFin).each(function () {
                this.parentNode.parentNode.style.backgroundColor = '';
            });
        },

        /**
         * 获取顺序组合
         */
        compile_array: function (m, n) {//m为大数，n为小数，如5选3,m=5，n=3
            var returnArray = [];
            var end = false;
            var number = [];
            for (var t = 0; t < m; t++) {
                if (t < n) {
                    number[t] = 1;
                } else {
                    number[t] = 0;
                }
            }
            var i, k, l;

            while (!end) {
                var findfirst = false;
                var swap = false; //标志复位

                for (i = 0; i < m; i++) {
                    if (!findfirst && number[i] != 0) {
                        k = i; //k记录下扫描到的第一个1的位置
                        findfirst = true; //设置标志
                    }
                    if ((number[i] != 0) && (number[i + 1] == 0)) {
                        //从左到右扫描第一个“10”组合
                        number[i] = 0;
                        number[i + 1] = 1;
                        swap = true; //设置交换标志
                        for (l = 0; l < i - k; l++)
                            number[l] = number[k + l];
                        for (l = i - k; l < i; l++)
                            number[l] = 0; //交换后将之前的“1”全部移动到最左端
                        if ((k == i) && (i + 1 == m - n))
                        //如果第一个“1”已经移动到了m-n的位置，说明这是最后一个组合了。
                            end = true;
                    }
                    if (swap) //交换一次后就不用继续找“10”组合了
                        break;
                }
                var outputString = [];
                for (var b = 0; b < m; b++) {
                    if (number[b] == 1) {
                        outputString.push(b + 1);
                    }
                }
                returnArray.push(outputString);
            }
            return returnArray;
        },
        /**
         * 過濾框線
         */
        filterRound : function () {
            this.roundDiv.each(function () {
                if (this.id != 'randomball') {
                    if($('table', this).css('display') == 'none') {
                        this.style.display = 'none';
                    } else {
                        this.style.display = '';
                    }
                }
            });
        }

    };
    GameSpace.ChShow.instance = function () {
        if (!this._instance && document.body) {
            this._instance = new this;
        }
        return this._instance;
    };
})(self);
