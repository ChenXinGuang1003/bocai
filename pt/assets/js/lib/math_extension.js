"use strict";

(function(ns){
    //階層演算法
    function factorial(start, end)
    {
        var retval = 1;
        var max = 0;
        var min = 0;
        if (start == end) {
            return start;
        } else if (start > end) {
            max = start;
            min = end;
        } else {
            max = end;
            min = start;
        }

        for (var i = max; i >= min; --i) {
            retval *= i;
        }

        return retval;
    }

    ns.factorial = factorial;

    var extensions = {
        factorial: factorial
    };

    if (typeof define != 'undefined') {
        define(function(){return extensions;});
    }
})(self);
