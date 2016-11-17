var BBINWIN = {
    bbwin: null,
    isIPL: false,
    isFirst: $.cookie('bbinwin'),
    bbwin_open: function(){
        if( ! this.bbwin || (this.bbwin && this.bbwin.closed)) {
            if (this.isIPL == true) {
                this.bbwin = window.open($.cookie('casino_url') + '/cl/?module=MFunction&method=BB3DLive', 'BBLIVE', "width=900, height=550, fullscreen=0, location=0, menubar=0, resizable=0, scrollbars=0, status=0")
            }else{
                this.bbwin = window.open('/member/video.php', 'BBLIVE', "width=900, height=550, fullscreen=0, location=0, menubar=0, resizable=0, scrollbars=0, status=0")
            }
            this.isFirst = false;
            $.cookie('bbinwin', 'false');
        }
        this.bbwin.focus();
    },
    bbwin_triger: function(){
        if (this.isFirst === 'true') {
            this.bbwin_open();
        } else if (this.bbwin) {
            this.bbwin.focus();
        }
    }
}

window.onunload=function() {
    if (BBINWIN.bbwin) {
        BBINWIN.bbwin.close();
    }
    // 各自開啟頁面關閉
    if (bbwin) {
        bbwin.close();
    }
}
