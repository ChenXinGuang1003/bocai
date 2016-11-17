(function(GameSpace) {
    GameSpace.NapShow = function() {
    }
    GameSpace.NapShow.prototype = {
        //表單
        _form : null,
        _inpNap : [],
        _btnSend : null,
        _btnCancel : null,
        /**
         * 初始化，綁定正碼過關的html物件
         */
        init : function () {
            var me = this;

            $(window.parent.document).find("#mainFrame").height(1100);

            if (typeof document.lt_form != 'undefined') {
                this._form = document.lt_form;
                for (var i = 1; i <= 6; i++) {
                    this._inpNap[i] = document.getElementsByName('game' + i);
                }
                //綁定表單的送出與取消button
                this.bindHtmlTag(this._form.btnSubmit, '_btnSend');
                this.bindHtmlTag(this._form.btnReset, '_btnCancel');
                var _this = this;
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
                //radio變色事件
                $("input[type=radio]", this._form).click(function(){
                    var f = this.form;
                    var n = this.name
                    for (var i = 0, t = f[n].length; i < t; i++) {
                        if (f[n][i].checked) {
                            f[n][i].parentNode.parentNode.style.backgroundColor = 'yellow';
                        } else {
                            f[n][i].parentNode.parentNode.style.backgroundColor = '';
                        }
                    }
                });
            }
        },
        /**
         * 綁定正碼過關html node
         * @param el html tag
         * @param k key名稱
         */
        bindHtmlTag : function (el, k) {
            var _chk = ['_btnSend','_btnCancel'];
            if (el && el.tagName) {
                if ($.inArray(k, _chk) != -1) {
                    this[k] = el;
                }
            }
        },
        /**
         * 表單執行送出的事件
         * @param me NiShow物件
         */
        onFormSubmit : function(me) {
            var _count = 0;
            for (var i = 1; i <= 6; i++) {
                for (var j = 0; j < 13; j++) {
                    if (me._inpNap[i][j].checked) {
                        _count++;
                    }
                }
            }
            if (_count <= 1) {
                new_alert(Lang('Msg2_NAP'));
                return false;
            } else if (_count >= 2) {
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
         * @param me NapShow物件
         */
        onReset : function(me) {
            this.reset();
            me.clearBgColor();
            $('div.ok').removeClass('ok');
        },
        /**
         * 清除底色
         */
        clearBgColor : function () {
            $("input[type=radio]", this._form).each(function () {
                 this.parentNode.parentNode.style.backgroundColor = '';
            });
        }
    };
    GameSpace.NapShow.instance = function () {
        if (!this._instance && document.body) {
            this._instance = new this;
        }
        return this._instance;
    };
})(self);
