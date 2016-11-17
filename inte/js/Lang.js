(function(ns){
    var _scripts = document.getElementsByTagName('script'),
        _src = _scripts[_scripts.length-1].getAttribute('src'),
        __DIR__ = _src.replace(/\/*\w+\.js(?:\?.+){0,1}$/, ''),
        _m = _src.match(/\?.*key=(\w+)/),
        _key = _m && _m[1] || 'charset';
    var source = {};
    var instance = null;
    function Lang()
    {
        if ( ! (this instanceof Lang))
        {
            ! instance && new Lang;
            return instance.fetch(arguments[0], arguments[1]);
        }
        else if ( ! instance)
        {
            instance = this;
        }
        return instance;
    }
    Lang.load = function()
    {
        var re = new RegExp(_key+'=([-\\w]+)');
        var _match = null;
        var _char = (_match = document.cookie.match(re, '$1'))? _match[1] : null;
        var path = Lang['package'][_char] || Lang['package']['default'];
//        self.console && self.console.log(document.cookie, _key, _char, path);//除錯用
        document.write('<script type="text\/javascript" src="'+path+'"><\/script>');
    }
    Lang.setSource = function(_source)
    {
        source = _source;
    }
    Lang.prototype = {
        fetch : function(key, data)
        {
            var ret = typeof source[key] == 'undefined' ? key : source[key];
            if (data && ret) {
                for (var n in data) {
                    var re = new RegExp(':'+n, 'g');
                    ret = ret.replace(re, data[n]);
                }
            }
            
            return ret;
        }
    };

    ns.Lang = Lang;
    ns.__ = Lang;

})(self);