"use strict";

(function($){
    $.fn.extend({
        tabs: function(options){
            options = options || {};
            var tabs = this.find('[tabs]').addClass('tabs-btn');
            if (tabs.length) {
                var me = this;
                this.addClass('tabs-box');
                var $tabs_view = {};
                this.find('[tabs-view]').each(function(){
                    $tabs_view[this.getAttribute('tabs-view')] = $(this).addClass('tabs-view');
                });
                var $tabs = {};
                tabs.each(function(){
                    var key = this.getAttribute('tabs');
                    $tabs[key] = $(this).data('view', $tabs_view[key]);
                    $tabs_view[key].data('tab', $tabs[key]);
                });

                tabs.bind('click', function(){
                    var active = this.getAttribute('tabs');
                    me.data('tabs-active', active);
                    for (var k in $tabs_view) {
                        if (k == active) {
                            $tabs_view[k].addClass('active');
                            $tabs_view[k].data('tab').addClass('active');
                            $tabs_view[k].show();
                        } else {
                            $tabs_view[k].removeClass('active');
                            $tabs_view[k].data('tab').removeClass('active');
                            $tabs_view[k].hide();
                        }
                    }


                    options['onchange']
                    && options['onchange'] instanceof Function
                    && options['onchange'].call(me, $tabs_view[k].data('tab'));
                });

                this.tab_focus = function(val) {
                    if ($tabs[val]) {
                        $tabs[val].click();
                    } else {
                        for (var n in $tabs) {
                            $tabs[n].click();
                            break;
                        }
                    }
                }

                this.tab_focus(options['current']);
            }
        }
    });
})(jQuery);