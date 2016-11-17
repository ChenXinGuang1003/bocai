"use strict";

(function($){

    $.fn.msg = function(options)
    {
        options = options || {};
        var me = this,
            head = $('<div class="msg-header"></div>'),
             contents = $('<div class="msg-contents"></div>'),
             footer = $('<div class="msg-footer"></div>'),
             btn_hide = $('<input type="button" class="msg-btn-hide" />').attr('value', options['text_leave']);

        this.data('msg_options', options);
        this.data('msg_head', head);
        this.data('msg_box', this.clone().empty().addClass('ui-msg').append(head).append(contents).append(footer.append(btn_hide)));
        this.data('msg_contents', contents);
        btn_hide.bind('click', function(){
            me.msg_hide();
        });
        this.after(this.data('msg_box').hide());

        return this;
    }

    $.fn.msg_show = function(str, title)
    {
        var me = this, timeout = parseInt(this.data('msg_options')['timeout'], 10) || false;
        this.hide();
        this.data('msg_head').html(title || '');
        this.data('msg_contents').html(str);
        this.data('msg_box').show();
        var _timer = this.data('timer');
        _timer && clearTimeout(_timer);
        if (timeout) {
            _timer = setTimeout(function(){
                me.msg_hide();
            }, timeout * 1000);
            this.data('timer', _timer);
        }
        
        return this;
    }

    $.fn.msg_hide = function(){
        this.show();
        this.data('msg_box').hide();
        this.data('msg_contents').empty();

        return this;
    }

})(self.jQuery);
