'use strict';

//pitaya業務核心
(function(ns){
    var data = {};

    var Pitaya = {
        extend: function(target)
        {
            for (var i = 1, L = arguments.length; i < L; ++i) {
                var o = arguments[i];
                for (var prop in o) {
                    if (o.hasOwnProperty(prop)) {
                        target[prop] = o[prop];
                    }
                }
            }

            return target;
        },

        update: function(source)
        {
            var pitaya = this;
            if (source instanceof Object) {
                pitaya.extend(data, source);
            }

            return pitaya;
        },

        prop: function(key, value)
        {
            var pitaya = this;
            if (typeof key == 'undefined') {
                return pitaya.extend({}, data);
            } else if (typeof value == 'undefined') {
                return data[key];
            }

            data[key] = value;

            return this;
        }
    };

    (function(){
        //由於fuel無法精準判斷 http / https
        var scripts, re, src;
        scripts = document.getElementsByTagName('script');
        re = /pitaya\.js/;
        for (var i = 0, leng = scripts.length; i < leng; i++) {
            if (re.test(scripts[i].src)) {
                src = scripts[i].src;
                break;
            }
        }
        //註冊根目錄
        Pitaya.prop('root', src.replace(/\/assets\/.+$/, ''));

        //註冊是否為測試模式
        Pitaya.prop('is_debug', !! self.location.href.match(/debug/));

        var debug_node = self.document.createElement('span');
        debug_node.style.cssText = '\
            position: fixed;\
            top: 0;\
            right: 0;\
            background: #C00;\
            color: #FFF;\
            padding: 3px;\
            font-size: 12px;\
            display: none;\
            border-radius: 3px;\
            box-shadow: 0px 0px 3px #055;\
            z-index: 20001;\
        ';

        Pitaya.dump = function(msg){
            debug_node.innerHTML = msg && msg.replace(/</g, '&lt;').replace(/>/g, '&gt;');
        };

        //除錯模式才顯示
        if (Pitaya.prop('is_debug')) {
            debug_node.style.display = '';
            self.document.body.appendChild(debug_node);
        }

        document.oncontextmenu = function () {
            return Pitaya.prop('is_debug');
        };

    })();

    ns.Pitaya = Pitaya;

})(self);