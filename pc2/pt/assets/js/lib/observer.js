'use strict';

(function(ns){
    function observer()
    {
        var listeners = {};

        this.getListener = function(name)
        {
            return listeners[name];
        };

        this.setListener = function(name, listener)
        {
            if (typeof listener != 'function') {
                throw new Error('listener must be callable!!');
            } else if (typeof listeners[name] != 'undefined') {
                throw new Error('listener has exists!!');
            }

            return listeners[name] = listener;
        };
    }

    var _class = observer;
    _class._name = _class.name || _class.toString().match(/^function\s*([^\s(]+)/)[1];

    ns[_class._name] = _class;
    if ( typeof define === "function") {
        define(function(){return _class;});
    }

})(self);