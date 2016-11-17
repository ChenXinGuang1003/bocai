"use strict";

(function(ns){
    function in_array(val, arr)
    {
        for (var i = 0, L = arr.length; i < L; ++i) {
            if (val == arr[i]) {
                return true;
            }
        }

        return false;
    }

    function array_map(callback, src)
    {
        if ( ! ('call' in callback)) {
            throw new Error('argument 1 must be a function');
        }
        var retval;
        if ('length' in src && 'push' in src) {
            retval = [];
            for (var i = 0, L=src.length; i < L; i++) {
                retval.push(callback.call(src[i], i));
            }
        } else {
            retval = {};
            for (var k in src) {
                retval[k] = callback.call(src[k], k);
            }
        }
        return retval;
    }

    function array_unique(source)
    {
        var ret = [];
        var tmp = {};
        array_map(function(){
            var item = this;
            tmp[item.toString()] = item;
        }, source);

        for (var item in tmp) {
            ret[ret.length] = tmp[item];
        }

        return ret;
    }

    function array_keys(source)
    {
        var arr = [];
        array_map(function(i){
            arr[arr.length] = i;
        }, source);

        return arr;
    }

    ns.in_array = in_array;
    ns.array_map = array_map;
    ns.array_unique = array_unique;
    ns.array_keys = array_keys;

    var extensions = {
        in_array: in_array,
        array_map: array_map,
        array_unique: array_unique,
        array_keys: array_keys
    };

    if (typeof define != 'undefined') {
        define(function(){return extensions;});
    }
})(self);
