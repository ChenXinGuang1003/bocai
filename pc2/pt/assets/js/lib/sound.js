"use strict";

(function(ns, $){
    var instance;
    function Sound()
    {
        if ( ! (this instanceof Sound)) {
            return new Sound();
        }

        if ( ! instance) {
            instance = this;
            instance.sources = {};
        }

        return instance;
    }

    Sound.createSWF = function(swf_url)
    {
        var t = (new Date).getTime();
        return $('<div style="width: 0; height: 0; overflow: hidden">\n\
<object width="0" height="0" data="'+swf_url+'?'+t+'" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="https://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0">\n\
<param name="src" value="'+swf_url+'?'+t+'">\n\
<embed src="'+swf_url+'?'+t+'" width="0" height="0"></embed>\n\
</object>\n\
</div>');
    }

    Sound.createMP3 = function(mp3_url)
    {
        var t = (new Date).getTime();
        return $('<embed src="'+mp3_url+'?'+t+'" width="0" height="0" autostart="true" loop="1"></embed>');
    }

    Sound.prototype = {
        play: function(url, time) {
            var me = this;

            if ( ! this.sources[url] || ! this.sources[url].data('playing')) {
                //IE8 有Flash快取bug
                if (1 || ! this.sources[url]) {
                    var m = url.match(/\.(\w+)$/i);
                    var method = 'create' + m[1].toUpperCase();
                    if (m && (method in Sound )) {
                        this.sources[url] = Sound[method](url);
                    } else {
                        throw new Error('Does not support '+ m[1]);
                    }
                }

                if (this.sources[url]) {
                    this.sources[url].appendTo(self.document.body);
                    this.sources[url].data('playing', true);
                    setTimeout(function(){
                        me.sources[url].remove();
                        me.sources[url].data('playing', false);
                    }, parseInt(time, 10) || 1000);
                }
            }

            return this;
        }
    };

    var _class = Sound;
    _class._name = _class.name || _class.toString().match(/^function\s*([^\s(]+)/)[1];

    ns[_class._name] = _class;
    if (typeof define == 'function') {
        define(function(){return _class;});
    }

})(self, jQuery);