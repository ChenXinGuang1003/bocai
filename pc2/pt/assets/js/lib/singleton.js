'use strict';

(function(ns){
    var instances = {};
    //最多支援5個建構參數
    function singleton(constructor, args)
    {
        var name = constructor.name || constructor.toString().match(/^function\s*([^\s(]+)/)[1];
        var is_self = (this instanceof constructor);

        if ( ! instances[name]) {
            var obj = null;
            if (is_self) {
                obj = this;
            } else {
                switch (args.length) {
                    case 0:
                        obj = new constructor();
                        break;
                    case 1:
                        obj = new constructor(args[1]);
                        break;
                    case 2:
                        obj = new constructor(args[1], args[2]);
                        break;
                    case 3:
                        obj = new constructor(args[1], args[2], args[3]);
                        break;
                    case 4:
                        obj = new constructor(args[1], args[2], args[3], args[4]);
                        break;
                    case 5:
                        obj = new constructor(args[1], args[2], args[3], args[4], args[5]);
                        break;
                    default:
                        throw new Error('only allow 0 ~ 5 arguments for ' + name);
                }
            }
            instances[name] = obj;
        } else if (is_self) {
            //不允許new 2 次
            throw new Error('can\'t init [' + name + '] 2 time!!');
        }

        if ( ! constructor.instance) {
            constructor.instance = function() {
                return instances[name];
            };
        }

        return is_self;
    }

    var _class = singleton;
    _class._name = _class.name || _class.toString().match(/^function\s*([^\s(]+)/)[1];

    ns[_class._name] = _class;
    if (typeof define == 'function') {
        define(function(){return _class;});
    }

})(self);