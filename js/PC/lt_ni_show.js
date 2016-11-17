(function (GameSpace) {
    GameSpace.NiShow = function(){
    }
    GameSpace.NiShow.prototype = {
        //最多勾選
        maxChk : 10,
        //最少勾選
        minChk : 5,
        //現在勾選數
        nowChk : 1,
        //玩法from
        _form: null,
        //切換自選不中玩法開關
        _switch : [],
        //現在玩法
        _nowRtype : null,
        //自選不中勾選input集合
        _inpNum : [],
        //表單送出button
        _btnSend : null,
        //表單取消button
        _btnCancel : null,
        //球號組合的ajax網址
        _urlBall : '/member/lt_ni/Ball.php',
        //球號組合視窗
        _ballTag : null,
        /**
         * 初始化，綁定自選不中的html物件
         */
        init : function () {
            var me = this;
            //綁定form
            if (typeof document.lt_form != 'undefined') {
                var _form = document.lt_form;
                this._form = _form;
                //綁定切換玩法開關
                var _this = this;
                $("input[type=radio][name=rtype]",_form).each(function () {
                    _this.bindSwitch(this);
                });
                //綁定球號組合視窗
                this.bindHtmlTag(document.getElementById('Ball'), '_ballTag');
                //綁定表單的送出與取消button
                this.bindHtmlTag(_form.btnSubmit, '_btnSend');
                this.bindHtmlTag(_form.btnReset, '_btnCancel');
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
                //綁定自選不中勾選input
                this._inpNum = [];
                var n = document.getElementsByName('num[]');
                for (i=0, t = n.length; i < t; i++) {
                    if ('INPUT' == n[i].tagName.toUpperCase() && 'CHECKBOX' == n[i].type.toUpperCase()) {
                        n[i].onclick = function () {
                            _this.onCbClk instanceof Function && (_this.onCbClk.call(this,_this));
                        }
                        this._inpNum.push(n[i]);
                    }
                }
            }
        },
        /**
         * 綁定自選不中玩法區塊
         * @param el html tag
         * @param k key名稱
         */
        bindHtmlTag : function (el, k) {
            var _chk = ['_ballTag','_btnSend','_btnCancel'];
            if (el && el.tagName) {
                if ($.inArray(k, _chk) != -1) {
                    this[k] = el;
                }
            }
        },
        /**
         * 綁定自選不中切換玩法開關
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
         * 點擊切換玩法執行事件
         * @param me NiShow物件
         */
        onSwitchClk : function (me) {
            var _val = this.value;
            me._nowRtype = _val;
            me.minChk = parseInt(parseInt(_val.substr(2,1),16),10);
            switch (me.minChk) {
                case 5:
                case 6:
                case 7:
                    me.maxChk = 10;
                    break;
                case 8:
                    me.maxChk = 11;
                    break;
                case 9:
                    me.maxChk = 12;
                    break;
                case 10:
                case 11:
                    me.maxChk = 13;
                    break;
                case 12:
                    me.maxChk = 14;
                    break;
            }
            $(me._inpNum).each(function() {this.checked = false;});
            me.clearBgColor();
            me.enableForm('Y');
            me.nowChk = 1;
            var msg = Lang('Msg1_NI');
            me._ballTag.innerHTML = '<p style="color:rgb(187,187,187)">' + msg.replace("%s", me.minChk) + '<span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></p>';
        },
        /**
         * 點擊自選不中checkbox的事件
         * @param me NiShow物件
         */
        onCbClk : function (me) {
            if (this.checked == false) {
                me.nowChk--;
            }
            var _nowChk = me.nowChk, _inpNum = me._inpNum, a = [], v;
            for (var i = 0, m = _inpNum.length; i < m; i++) {
                if (_inpNum[i].checked) {
                    v = _inpNum[i].value;
                    a.push(v);
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
                    var totalSelectArray = compile_array(a.length, me.minChk);
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
         * 表單執行送出的事件
         * @param me NiShow物件
         */
        onFormSubmit : function(me) {
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
            if (_count > me.maxChk) {
                new_alert(Lang('Msg3_CH'));
                return false;
            }
            if (_count < me.minChk) {
                new_alert(Lang('Msg1_NI').replace('%s',me.minChk));
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
        },
        /**
         * 表單執行取消的事件
         * @param me ChShow物件
         */
        onReset : function (me) {
            this.reset();
            me.nowChk = 1;
            me.clearBgColor();
            me.enableForm('N');
            me._ballTag.innerHTML = "<p>" + Lang('Msg4_Quick') + "<span style=background-color:rgb(0,255,0)>&nbsp;&nbsp;&nbsp;</span></p>";
            $('div.ok').removeClass('ok');
        },
        /**
         * 停用用啟用自選不中checkbox
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
         * 清除底色
         */
        clearBgColor : function () {
            $(this._inpNum).each(function () {
                 this.parentNode.parentNode.style.backgroundColor = "";
            });
        }
    };
    GameSpace.NiShow.instance = function () {
        if (!this._instance && document.body) {
            this._instance = new this;
        }
        return this._instance;
    };
})(self);
