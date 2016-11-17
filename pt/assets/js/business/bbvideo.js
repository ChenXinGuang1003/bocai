"use strict";

if ( ! self.Pitaya) {
    throw new Error('no Pitaya');
}

(function(ns, $){
    var instance;

    function BBVideo()
    {
        if (!instance) {
            instance = this;
            // 視訊視窗
            instance.video_win = null;
            // 視訊網址
            instance.vedio_url = '';//Pitaya.prop('bb_vedio_url');
            // 是否開啟過視窗
            instance.isFirst = $.cookie('bbinwin');
        }
        return instance;
    }

    BBVideo.prototype = {
        // 開啟視訊視窗
        win_open: function()
        {
            if ('' != this.vedio_url) {
                if( ! this.video_win || (this.video_win && this.video_win.closed)) {
                    this.video_win = window.open(this.vedio_url, 'BBLIVE', "width=900, height=550, fullscreen=0, location=0, menubar=0, resizable=0, scrollbars=0, status=0");
                    this.isFirst = 'false';
                    $.cookie('bbinwin', 'false', {  path: '/' });
                }
                if (this.video_win) {
                    this.video_win.focus();
                }
            }
        },
        // 判斷是否開啟視訊
        win_triger: function()
        {
            if (this.isFirst === 'true') {
                this.win_open();
            } else if (this.video_win) {
                this.video_win.focus();
            }
        }
    };
    ns.BBVideo = BBVideo;
    if ( typeof define === "function") {
        define(function(){return BBVideo;});
    }
})(self, jQuery);