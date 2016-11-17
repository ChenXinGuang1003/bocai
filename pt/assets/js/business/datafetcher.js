"use strict";

(function(ns, $, observable, singleton){

    function DataFetcher()
    {
        if ( ! singleton.call(this, DataFetcher, arguments)) {
            return DataFetcher.instance();
        }

        var data_fetcher = this;

        observable.call(data_fetcher);

        // 定時器 for interval
        data_fetcher._timer_interval = null;

        // 定時器 for timeout
        data_fetcher._timer_timeout = null;

        //紀錄物件是否啟動中
        data_fetcher._is_working = false;

        //HttpRequest
        data_fetcher.request = null;

        //資料更新失敗計數
        data_fetcher._fetch_error_cnt = 0;

        //資料更新失敗次數限制
        data_fetcher._fetch_error_max = 5;

        return data_fetcher;
    }

    var _class = DataFetcher;
    _class._name = _class.name || _class.toString().match(/^function\s*([^\s(]+)/)[1];

    _class.EVENT_FETCH_BEFORE = 'fetch_before';
    _class.EVENT_FETCH_AFTER = 'fetch_after';
    _class.EVENT_FETCH_ERROR = 'fetch_error';
    _class.EVENT_SLEEP = 'sleep';
    _class.EVENT_WAKEUP = 'wakeup';

    _class.prototype = {
        _getCurrentTime: function()
        {
            return (new Date).getTime() / 1000;
        },

        setInterval: function(interval)
        {
            var data_fetcher = this;

            interval = (parseFloat(interval) || 10);
            data_fetcher._interval = interval;
            //如果有啟動更新才呼叫sleep重置間隔
            data_fetcher._timer_interval && data_fetcher.sleep(data_fetcher._interval);

            return data_fetcher;
        },
        getInterval: function()
        {
            var data_fetcher = this;

            return data_fetcher._interval;
        },

        setTimeout: function(timeout)
        {
            var data_fetcher = this;

            timeout = (parseFloat(timeout) || 30);
            data_fetcher.timeout = timeout;

            return data_fetcher;
        },
        setURL: function(url)
        {
            var data_fetcher = this;

            if (url && url.match(/./)) {
                data_fetcher.url = url;
            }

            return data_fetcher;
        },

        fetch: function()
        {
            var data_fetcher = this;

            if (data_fetcher.url) {

                var query_data = {};
                data_fetcher.notice(query_data, _class.EVENT_FETCH_BEFORE);

                var current_time = data_fetcher._getCurrentTime();

                typeof data_fetcher._fetch_time == 'undefined'
                && (data_fetcher._fetch_time = current_time);

                if (
                    data_fetcher.request
                    && current_time - data_fetcher._fetch_time >= data_fetcher.timeout
                ) {
                    data_fetcher.request.abort();
                    data_fetcher.request = null;
                }

                (null === data_fetcher.request)//確認資料並非發送中
                && (data_fetcher._fetch_time = current_time)//置換更新時間紀錄
                && (data_fetcher.request = $.ajax({
                    cache: false,
                    url: data_fetcher.url,
                    data: query_data,
                    type: 'get',
                    dataType: 'json',

                    success: function(json, msg, xhr){
                        data_fetcher.notice(json, _class.EVENT_FETCH_AFTER);
                        data_fetcher._fetch_error_cnt = 0;
                    },

                    error: function(xhr, msg){
                        if (
                            401 == xhr.status
                                || data_fetcher._fetch_error_cnt >= data_fetcher._fetch_error_max
                        ) {
                            data_fetcher.logout instanceof Function && data_fetcher.logout();
                        }

                        data_fetcher.notice(msg, _class.EVENT_FETCH_ERROR);
                        data_fetcher._fetch_error_cnt++;
                    },

                    complete: function(){
                        data_fetcher.request = null;
                        var now = ((new Date).getTime() / 1000);

                        //執行超過n秒就自動調整下次發送時間點
                        (now - data_fetcher._fetch_time > 3)
                        && data_fetcher.sleep(data_fetcher._interval);
                    }
                }));
            }

            return data_fetcher;
        },

        wakeup: function()
        {
            var data_fetcher = this;
            var interval = data_fetcher.getInterval();

            data_fetcher._is_working = true;

            if ( ! data_fetcher._timer_interval && interval) {
                data_fetcher._timer_interval = setInterval(function(){
                    data_fetcher.fetch();
                }, interval * 1000);
            }

            data_fetcher.notice(interval, _class.EVENT_WAKEUP);
            
            return data_fetcher;
        },

        sleep: function(time)
        {
            var data_fetcher = this;

            data_fetcher._timer_interval && clearInterval(data_fetcher._timer_interval);
            data_fetcher._timer_interval = null;
            data_fetcher._is_working = false;

            time = parseFloat(time);//單位秒
            if ( ! isNaN(time) && 0 < time) {
                data_fetcher._timer_timeout && clearTimeout(data_fetcher._timer_timeout);
                data_fetcher._timer_timeout = setTimeout(function(){
                    data_fetcher.fetch();
                    data_fetcher.wakeup();
                    data_fetcher._timer_timeout = null;
                }, time * 1000);
            }

            data_fetcher.notice(time, _class.EVENT_SLEEP);

            return data_fetcher;
        },

        isSleep: function()
        {
            var data_fetcher = this;

            return ! data_fetcher._is_working;
        },

        logout: function()
        {/** 空實作 */}
    };

    ns[_class._name] = _class;
    if ( typeof define === "function") {
        define(function () { return _class; } );
    }
    
})(self, jQuery, observable, singleton);