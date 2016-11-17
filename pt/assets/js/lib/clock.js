"use strict";

(function(ns, observer, observable, singleton){
    var timer;//單位秒

    function pad_left()
    {
        return this.toString().replace(/^(\d)$/, '0$1');
    }

    function date_format(date, format)
    {
        var retval = format || 'H:i:s';
        if(date instanceof Date){

            retval = retval
                .replace(/Y/g, date.getFullYear())
                .replace(/m/g, pad_left.call(date.getMonth()+1))
                .replace(/j/g, pad_left.call(date.getDate()))
                .replace(/H/g, pad_left.call(date.getHours()))
                .replace(/i/g, pad_left.call(date.getMinutes()))
                .replace(/s/g, pad_left.call(date.getSeconds()))
            ;
        }

        return retval;
    }
    
    function Clock()
    {
        if ( ! singleton.call(this, Clock, arguments)) {
            return Clock.instance();
        }

        var clock = this;

        observable.call(clock);
        observer.call(clock);

        clock.items = null;
        clock._date = new Date();
        clock._timezone_offset = clock._date.getTimezoneOffset();
        clock._display(clock._date);
        timer = setInterval(function(){
            clock._date.setTime(clock.getTime() * 1000 + 1000);
            clock._display(clock._date);
            clock.notice(clock._date.getTime()/1000);
        }, 1000);

        //與伺服器校時
        clock.setListener(Clock.LISTENER_REFRESH, function(data)
        {
            clock._timezone_offset = parseInt(data['timezone_offset'], 10) || 0;
            var server_time = parseFloat(data['server_time']),
                execute_time = parseFloat(data['execute_time']);
            if ( ! isNaN(server_time) && ! isNaN(execute_time)) {
                clock.setTime(server_time + execute_time, clock._timezone_offset);
//                        console.log(server_time, execute_time);//測試秒差,別移除
            }
        });

        return clock;
    }

    var _class = Clock;
    _class._name = _class.name || _class.toString().match(/^function\s*([^\s(]+)/)[1];
    _class.LISTENER_REFRESH = 'listener_refresh';

    _class.prototype = {
        _format: 'Y-m-j H:i:s',

        format: function(format)
        {
            var clock = this;

            clock._format = format;

            return clock;
        },

        //單位秒
        setTime: function(timestamp, timezone_offset)
        {
            var clock = this;

            timestamp && clock._date.setTime(timestamp * 1000);
            timezone_offset && (clock._timezone_offset = timezone_offset);
            
            return clock;
        },

        //單位秒
        getTime: function()
        {
            var clock = this;

            return clock._date.getTime()/1000;
        },

        bind: function(items)
        {
            var clock = this;

            clock.items = items;

            return clock;
        },

        _display: function(date)
        {
            var clock = this;
            var _d = new Date(date.getTime() + (date.getTimezoneOffset() * 60000) - (clock._timezone_offset * 60000));

            clock.items && clock.items.text(date_format(_d, clock._format));
        }
    };

    ns[_class._name] = _class;
    if (typeof define === "function") {
        define(function () {return _class;});
    }
})(self, observer, observable, singleton);