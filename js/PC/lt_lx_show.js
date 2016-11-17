(function (GameSpace){
    var aMax = {LX2:2,LX3:3,LX4:4,LX5:5,LF2:2,LF3:3,LF4:4,LF5:5};
    GameSpace.LfxShow = function () {
    }
    GameSpace.LfxShow.prototype = {
        //最多勾選
        maxChk : 6,
        //最少勾選
        minChk : 0,
        //現在勾選數
        nowChk : 0,
        //賠率陣列
        _aOdds: {},
        //賠率html tag
        _oddsTag : {},
        //玩法from
        _form: null,
        //tabl1 html tag
        tab1 : null,
        //tabl2 html tag
        tab2 : null,
        //tabl3 html tag
        tab3 : null,
        //切換連肖連尾玩法開關
        _switch : [],
        //現在玩法
        _nowRtype : null,
        //連肖玩法input checkbox
        _inpLx : [],
        //連尾玩法input checkbox
        _inpLf : [],
        //表單送出button
        _btnSend : null,
        //表單取消button
        _btnCancel : null,
        //球號組合的ajax網址
        _urlBall : '/member/lt_lx/Ball.php',
        //球號組合視窗
        _ballTag : null,
        /**
         * 初始化，綁定連肖連尾的html物件
         */
        init : function () {
            var _this = this, me = this;
            $(window.parent.document).find("#mainFrame").height(720);
            if (typeof document.lt_form != 'undefined') {
                this._form = document.lt_form;
                //綁定切換玩法開關
                $("input[type=radio][name=rtype]",this._form).each(function () {
                    _this.bindSwitch(this);
                });
                //綁定遊戲table
                var _tab = {tab1 : 'table1', tab2 : 'table2', tab3 : 'table3'};
                for (var k in _tab) {
                    this.bindHtmlTag(document.getElementById(_tab[k]), k);
                }
                //綁定球號組合視窗
                this.bindHtmlTag(document.getElementById('Ball'), '_ballTag');
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
                //綁定連肖checkbox
                this._inpLx = [];
                this._inpLf = [];
                var inps = document.getElementsByName('lx[]');
                var _click = function () {
                    _this.onCbClk && _this.onCbClk.call(this, _this);
                }
                for (var i = 0, t = inps.length; i < t; i++ ) {
                    inps[i].onclick = _click;
                    this._inpLx.push(inps[i]);
                    this._oddsTag[inps[i].value] = document.getElementById(inps[i].value);
                }
                //綁定連尾checkbox
                inps = document.getElementsByName('lf[]');
                var f;
                for (i = 0, t = inps.length; i < t; i++ ) {
                    inps[i].onclick = _click;
                    this._inpLf.push(inps[i]);
                    f = 'Fn' + inps[i].value;
                    this._oddsTag[inps[i].value] = document.getElementById(f);
                }
                if (arguments.length == 1) {
                    this._aOdds = arguments[0];
                }
            }
        },
        /**
         * 綁定連碼玩法區塊
         * @param el html tag
         * @param k key名稱
         */
        bindHtmlTag : function (el, k) {
            var _chk = ['tab1', 'tab2', 'tab3', '_ballTag', '_btnSend', '_btnCancel'];
            if (el && el.tagName) {
                if ($.inArray(k, _chk) != -1) {
                    this[k] = el;
                }
            }
        },
        /**
         * 綁定連肖連尾切換玩法開關
         * @param el html tag
         */
        bindSwitch : function (el) {
            if (el && el.tagName && 'RADIO' == el.type.toUpperCase()) {
                var _this = this;
                el.onclick = function() {
                    _this.onSwitchClk && (_this.onSwitchClk.call(this,_this));   
                }
                this._switch.push[el];
            }
        },
        /**
         * 點擊切換玩法執行事件
         * @param me LfxShow物件
         */
        onSwitchClk : function (me) {
            var aOdds = me._aOdds;
            me.nowChk = 0;
            me.minChk = aMax[this.value];
            me.maxChk = 6;
            var bChk = this.checked, _show;
            if (bChk) {
                me._nowRtype = this.value;
            } else {
                me._nowRtype = null;
            }
            var bLx = (me._nowRtype.substr(0,2) == 'LX') ? 1 : 0;
            for (var k in me._oddsTag) {
                me._oddsTag[k].innerHTML = '';       
            }
            if (bLx) {
                _show = ['A1','A2','A3','A4','A5','A6','A7','A8','A9','AA','AB','AC'];
            } else {
                _show = ['0','1','2','3','4','5','6','7','8','9'];
            }
            for (var i = 0, t = _show.length; i < t; i++) {
                var k = _show[i], sConcede = (bLx) ? me._nowRtype + '_' + k.substr(1,1) : me._nowRtype + k;
                me._oddsTag[k].innerHTML = aOdds[sConcede];
            }
            for (i = 0; i < 12; i++) {
                me._inpLx[i].checked = false;
            }
            for (i = 0; i < 10; i++) {
                me._inpLf[i].checked = false;
            }
            me.clearBgColor();
            if (bLx) {
                me.enableFormLx('Y');
                $(me.tab2).show();
                $(me.tab3).hide();
                me.tab2.parentNode.style.display = '';
                me.tab3.parentNode.style.display = 'none';
            } else {
                me.enableFormLf('Y');
                $(me.tab2).hide();
                $(me.tab3).show();
                me.tab2.parentNode.style.display = 'none';
                me.tab3.parentNode.style.display = '';
            }
            var msg = (bLx) ? Lang('Msg1_AN') : Lang('Msg1_LF');
            me._ballTag.innerHTML = '<p style="color:rgb(187,187,187)">' + msg.replace('%s', me.minChk) + '<span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></span>';
        },
        /**
         * 點擊連碼checkbox的事件
         * @param me LfxShow物件
         */
        onCbClk : function (me) {
            if (me._nowRtype == null) {
                this.checked = false;
                new_alert(Lang('Msg4_Quick'));
            } else {
                var bLx = (me._nowRtype.substr(0,2) == 'LX') ? 1 : 0;
                if (this.checked == false) {
                    me.nowChk--;
                }
                if (me.nowChk < me.maxChk && (me.nowChk+1) >= me.minChk) {
                    var _inp = (bLx) ? me._inpLx : me._inpLf, t = _inp.length, aNum = [];
                    var tmpArray = {};
                    var tmpArrayCount = 1;
                    for (var i = 0; i < t; i++) {
                        if (_inp[i].checked) {
                            aNum.push(_inp[i].value);
                            tmpArray[tmpArrayCount.toString()] = _inp[i].value;
                            tmpArrayCount += 1;
                        }
                    }
                    var animalArray = {A1:"鼠",A2:"牛",A3:"虎",A4:"兔",A5:"龙",A6:"蛇",A7:"马",A8:"羊",A9:"猴",AA:"鸡",AB:"狗",AC:"猪"};
                    var totalArray = [];
                    //初始化第一个数据
                    var tmp2Array = [];
                    for(var n=1;n<=me.minChk;n++){
                        if(bLx){
                            tmp2Array.push(animalArray[tmpArray[n]]);
                        }else{
                            tmp2Array.push(tmpArray[n]);
                        }
                    }
                    totalArray.push(tmp2Array.join(","));
                    if(aNum.length > me.minChk){
                        var totalSelectArray = compile_array(aNum.length, me.minChk);

                        //获取剩下组合
                        for(var j=0;j<totalSelectArray.length;j++){
                            var subArray = [];
                            for(var k=0;k<me.minChk;k++){
                                if(bLx){
                                    subArray.push(animalArray[tmpArray[totalSelectArray[j][k]]]);
                                }else{
                                    subArray.push(tmpArray[totalSelectArray[j][k]]);
                                }
                            }
                            totalArray.push(subArray.join(","));
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

                    function compile_array(m,n){//m为大数，n为小数，如5选3,m=5，n=3
                        var returnArray = [];
                        var end = false;
                        var number = [];
                        for(var t=0;t <m;t++){
                            if(t<n){
                                number[t]=1;
                            }else{
                                number[t]=0;
                            }
                        }
                        var i,k,l;

                        while(!end){
                            var findfirst=false;
                            var swap=false; //标志复位

                            for(i=0; i<m; i++){
                                if(!findfirst && number[i] != 0 ){
                                    k=i; //k记录下扫描到的第一个1的位置
                                    findfirst=true; //设置标志
                                }
                                if( (number[i] != 0) && (number[i+1] == 0) ){
                                    //从左到右扫描第一个“10”组合
                                    number[i]=0;
                                    number[i+1]=1;
                                    swap=true; //设置交换标志
                                    for(l=0; l<i-k; l++)
                                        number[l]=number[k+l];
                                    for(l=i-k; l<i; l++)
                                        number[l]=0; //交换后将之前的“1”全部移动到最左端
                                    if( (k == i) && (i+1 == m-n) )
                                    //如果第一个“1”已经移动到了m-n的位置，说明这是最后一个组合了。
                                        end=true;
                                }
                                if(swap) //交换一次后就不用继续找“10”组合了
                                    break;
                            }
                            var outputString = [];
                            for(var b=0;b <m;b++){
                                if(number[b]==1){
                                    outputString.push(b+1);
                                }
                            }
                            returnArray.push(outputString);
                        }
                        return returnArray;
                    }

                } else {
                    var msg = (bLx) ? Lang('Msg1_AN') : Lang('Msg1_LF');
                    me._ballTag.innerHTML = '<p style="color:rgb(187,187,187)">' + msg.replace('%s', me.minChk) + '<span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></span>';
                }
            }
            if (this.checked) {
                if (me.nowChk == 5) {
                    me.enableFormLx('N');
                    me.enableFormLf('N');
                }
                if (me.nowChk > 5) {
                    new_alert(Lang('Msg2_AN').replace('%s', me.maxChk));
                    me.nowChk--;
                    this.checked = false;
                }
                me.nowChk++;
            } else {
                me.enableFormLx('Y');
                me.enableFormLf('Y');
            }
            if (this.checked) {
                this.parentNode.parentNode.style.backgroundColor = 'yellow';
            } else {
                this.parentNode.parentNode.style.backgroundColor = '';
            }
        },
        /**
         * 表單執行送出的事件
         * @param me LfxShow物件
         */
        onFormSubmit : function(me) {
            if (me._nowRtype == null) {
                new_alert(Lang('Msg4_Quick'));
                return false;
            }
            var bLx = (me._nowRtype.substr(0,2) == 'LX') ? 1 : 0;
            if (me.nowChk < me.minChk) {
                var msg = (bLx) ? Lang('Msg1_AN') : Lang('Msg1_LF');
                new_alert(msg.replace('%s',me.minChk));
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
         * @param me LfxShow物件
         */
        onReset : function (me) {
            this.reset();
            me.clearBgColor();
            me.enableFormLx('Y');
            me.enableFormLf('Y');
            for (var k in me._oddsTag) {
                me._oddsTag[k].innerHTML = '';       
            }
            me._nowRtype = null;
            me.nowChk = 0;
            $(me.tab2).show();
            $(me.tab3).show();
            me.tab2.parentNode.style.display = '';
            me.tab3.parentNode.style.display = '';
            me._ballTag.innerHTML = "<p>" + Lang('Msg4_Quick') + "<span style=background-color:rgb(0,255,0)>&nbsp;&nbsp;&nbsp;</span></p>";
        },
        /**
         * 停用用啟用連肖checkbox
         * @param YN 停用(N)或啟用(N)
         */
        enableFormLx : function (YN) {
            $(this._inpLx).each(function() {
                if (YN == 'N' && !this.checked) {
                    this.disabled = true;
                }
                if (YN == 'Y') {
                    this.disabled = false;
                }
            });
        },
        /**
         * 停用用啟用連尾checkbox
         * @param YN 停用(N)或啟用(N)
         */
        enableFormLf : function (YN) {
            $(this._inpLf).each(function() {
                if (YN == 'N' && !this.checked) {
                    this.disabled = true;
                }
                if (YN == 'Y') {
                    this.disabled = false;
                }
            });
        },
        /**
         * 清除底色
         */
        clearBgColor : function () {
            for (var k in this._inpLx) {
                 this._inpLx[k].parentNode.parentNode.style.backgroundColor = '';
            }
            for (var k in this._inpLf) {
                 this._inpLf[k].parentNode.parentNode.style.backgroundColor = '';
            }
        }
    };
    GameSpace.LfxShow.instance = function () {
        if (!this._instance && document.body) {
            this._instance = new this;
        }
        return this._instance;
    };
})(self);
