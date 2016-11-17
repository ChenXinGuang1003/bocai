(function (namespace) {
    //timer
    _timer = null;
    /**
     * 計算秒數的格式
     * @param sec 秒數
     * @return r 
     */
    function _time_format (sec) {
        var r = {}, _date, _reg = new RegExp(/[0-9]{2}$/i);
        if (sec) {
            _date = new Date(Math.round(sec*1000));
        } else {
            _date = new Date();
        }
        r.Y = _date.getFullYear();
        r.m = ('0' + Math.round(_date.getMonth() + 1)).match(_reg);
        r.d = ('0' + _date.getDate()).match(_reg);
        r.H = ('0' + _date.getHours()).match(_reg);
        r.i = ('0' + _date.getMinutes()).match(_reg);
        r.s = ('0' + _date.getSeconds()).match(_reg);
        return r;
    }
    /**
     * timeclock建構式
     */
    namespace.timeclock = function () {
        if (arguments.length >= 1) {
            (arguments[0].tagName) && (this.showNode = arguments[0]);
        } else {
            this.showNode = document.createElement('span');
            document.body.appendChild(this.showNode);
        }
        if (arguments.length >= 2) {
            if (arguments[1].tagName && arguments[1].tagName.toUpperCase() == 'INPUT') {
                this.timeInput = arguments[1];
            }
        }
    };
    namespace.timeclock.prototype = {
        //秒數的input
        timeInput : null,
        /**
         * 更新秒數
         * @param _node html node
         * @param _sec int 秒數
         */
        UpdateTime : function (_node, _sec) {
            var _datetime = _time_format(_sec), YmdHis = _datetime.Y + '-' + _datetime.m + '-' + _datetime.d + ' ' + _datetime.H + ':' + _datetime.i + ':' + _datetime.s;
            _node.innerHTML = YmdHis;
            (this.timeInput) && (this.timeInput.value = Math.round(_sec + 1));
        },
        /**
         * 開始
         */
        run : function () {
            var me = this, _fn = function () {
                var _sec = (me.timeInput) ? parseInt(me.timeInput.value, 10) : null; 
                (me.UpdateTime) && me.UpdateTime(me.showNode, _sec);
            };
            _timer = setInterval(_fn, 1000);
        }
    };
    namespace.timeclock.instance = function () {
        if (!this._instance) {
            this._instance = new this(arguments[0], arguments[1]);
        }
        return this._instance;
    };
    namespace.timeclock.install = function (_node, _timeInput) {
        var obj = namespace.timeclock.instance(_node, _timeInput);
        obj.run();
    }

})(self);
