"use strict";

(function(ns, observer, observable){

    function Countdown(deadline)
    {

        var countdown = this;

        observable.call(countdown);
        observer.call(countdown);

        countdown._is_timeout = false;
        countdown.items = null;
        countdown.setDeadline(deadline);
        countdown.has_notice_timeout = countdown.isTimeout();
        countdown.clock_now = null;

        countdown.setListener(Countdown.LISTENER_CLOCK, function(num){
            countdown.clock_now = num;
            countdown.refresh('timer');
        });

        return countdown;
    }

    var _class = Countdown;
    _class._name = _class.name || _class.toString().match(/^function\s*([^\s(]+)/)[1];
    _class.LISTENER_CLOCK = 'listener_clock';
    _class.LISTENER_REFRESH = 'listener_refresh';
    _class.EVENT_TIMEOUT = 'timeout';
    _class.EVENT_RESTART = 'restart';
    _class.EVENT_TIMER = 'timer';

    _class.prototype = {
        bind: function(items){
            var countdown = this;

            countdown.items = items;

            return countdown;
        },

        //重新設定剩餘時間
        setDeadline: function(num)
        {
            var countdown = this;

            num = parseFloat(num);
            if ( ! isNaN(num)) {
                countdown.deadline = num;
                countdown.deadline > countdown.getNowTimestamp() && (countdown._is_timeout = false);
                countdown.refresh('reset deadline');

                return true;
            }

            return false;
        },

        isTimeout: function()
        {
            var countdown = this;

            return countdown._is_timeout;
        },

        refresh: function(reason)
        {
            var countdown = this;
            var des = countdown.getTimes();
            if ( ! countdown.isTimeout()) {
                countdown._is_timeout = (0 >= des);
                countdown._is_timeout && (des = 0);
                countdown.notice(des, _class.EVENT_TIMER);

                var _hours = (des / 3600) >> 0;
                var _minutes = ((des % 3600) / 60) >> 0;
                var _seconds = (des % 60) >> 0;

                var str = _hours.toFixed(0).replace(/^(\d)$/, '0$1')
                    + ':' + _minutes.toFixed(0).replace(/^(\d)$/, '0$1')
                    + ':' + _seconds.toFixed(0).replace(/^(\d)$/, '0$1');

                countdown.items && countdown.items.text(str);
            }

            if (countdown.isTimeout()) {
                if ( ! countdown.has_notice_timeout) {
                    countdown.has_notice_timeout = true;
                    countdown.notice(countdown, _class.EVENT_TIMEOUT);
                }
            } else {
                if (countdown.has_notice_timeout) {
                    countdown.has_notice_timeout = false;
                    countdown.notice(countdown, _class.EVENT_RESTART);
                }
            }

//            self.console && console.log(des, reason);//模組主功能測試,不要刪除

            return countdown;
        },

        getTimes: function()
        {
            var countdown = this;

            return Math.round(countdown.deadline - countdown.getNowTimestamp());
        },

        getNowTimestamp: function()
        {
            var countdown = this;

            if (countdown.clock_now) {
                return countdown.clock_now;
            }

            return (new Date).getTime()/1000;
        }
    };

    ns[_class._name] = _class;
    if (typeof define === "function") {
        define(function(){return _class;});
    }

})(self, observer, observable);