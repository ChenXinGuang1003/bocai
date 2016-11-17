"use strict";

(function(ns){//觀察模式
    function clone(o, source, keys)
    {
        if ('length' in keys && source) {
            ! o && (o = {});
            for (var i=0,L=keys.length; i<L; i++) {
                var key = keys[i];
                o[key] = source[key];
            }
        }
    }
    var default_event = 'default_event';
    function observable()
    {
        var is_notice = true;
        var observers = [];

        var instance = this;

        instance.silence = function(bool)
        {
            if (typeof bool == 'undefined') {
                bool = true;
            }

            is_notice = ! bool;

            return instance;
        }

        instance.register = function()
        {
            var observer = null;
            if (arguments[0] instanceof Function) {
                observer = {
                    caller: this,
                    callback: arguments[0],
                    event: arguments[1],
                    key: arguments[2]
                };
            } else if (arguments[1] in arguments[0] && (arguments[0][arguments[1]] instanceof Function)) {
                observer = {
                    caller: arguments[0],
                    callback: arguments[0][arguments[1]],
                    event: arguments[2],
                    key: arguments[3]
                };
            }

            observer.event = observer.event || default_event;

            if (observer) {
                var exists = false;
                for (var i = 0, L = observers.length; i < L; ++i) {
                    var _obs = observers[i];
                    if (_obs['callback'] == observer['callback']) {
                        exists = true;
                        break;
                    }
                }
                ! exists && observers.push(observer);
            }

            return instance;
        };

        instance.notice = function(data, event)
        {
            event = event || default_event;
            var retval = true;
            if (observers && is_notice) {
                for (var i=0, L=observers.length; i<L; i++) {
                    var o = observers[i]['caller'],
                         m = observers[i]['callback'],
                         k = observers[i]['key'],
                         e = observers[i]['event'],
                         type_k = typeof k;
                    var ret = {};
                    if (event === e) {
                        if ('string' == type_k) {
                            ret = data[k];
                        } else if ('undefined' == type_k) {
                            ret = data;
                        } else if ('length' in k) {
                            clone(ret, data, k);
                        }
                        if (m) {
                            try {
                                if (false === m.call(o, ret)) {
                                    retval = false;
                                }
                            } catch (exception) {
                                if (self.console) {
                                    console.log( m, exception.stack);
                                } else {
                                    alert(Lang('debugMsg')+': ' + exception.message);
                                }
                            }
                        }
                    }
                }
            }

            return retval;
        };
    }

    var _class = observable;
    _class._name = _class.name || _class.toString().match(/^function\s*([^\s(]+)/)[1];

    ns[_class._name] = _class;
    if ( typeof define === "function") {
        define(function(){return _class;});
    }

})(self);