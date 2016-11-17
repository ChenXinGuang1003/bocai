//公用方法
(function ($) {
    //格式化字符串
    $.String = {
        Format: function () {
            if (arguments.length == 0)
                return null;
            var str = arguments[0];
            for (var i = 1; i < arguments.length; i++) {
                var re = new RegExp('\\{' + (i - 1) + '\\}', 'gm');
                str = str.replace(re, arguments[i]);
            }
            return str;
        },
        replaceNull: function () {
            var str = arguments[0];
            if (str == null)
                return "";
            else {
                return str;
            }
        }
    };
    //格式日期
    //var time1 = $.Date.Format("yyyy-MM-dd",date);
    //var time2 = $.Date.Format("yyyy-MM-dd hh:mm:ss",date);  
    $.Date = {
        Format: function (fmt, datestr) {
            if (datestr == "/Date(-62135596800000)/") {
                return "";
            }
            var dateMilliseconds = new Date(parseInt(datestr.replace(/\D/igm, "")));
            var o = {
                "M+": dateMilliseconds.getMonth() + 1, //月份 
                "d+": dateMilliseconds.getDate(), //日 
                "h+": dateMilliseconds.getHours(), //小时 
                "m+": dateMilliseconds.getMinutes(), //分 
                "s+": dateMilliseconds.getSeconds(), //秒 
                "q+": Math.floor((dateMilliseconds.getMonth() + 3) / 3), //季度 
                "S": dateMilliseconds.getMilliseconds() //毫秒 
            };
            if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (dateMilliseconds.getFullYear() + "").substr(4 - RegExp.$1.length));
            for (var k in o)
                if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
            return fmt;
        },
        FormatData: function (fmt, datestr) {
            var dateMilliseconds = datestr;
            var o = {
                "M+": dateMilliseconds.getMonth() + 1, //月份 
                "d+": dateMilliseconds.getDate(), //日 
                "h+": dateMilliseconds.getHours(), //小时 
                "m+": dateMilliseconds.getMinutes(), //分 
                "s+": dateMilliseconds.getSeconds(), //秒 
                "q+": Math.floor((dateMilliseconds.getMonth() + 3) / 3), //季度 
                "S": dateMilliseconds.getMilliseconds() //毫秒 
            };
            if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (dateMilliseconds.getFullYear() + "").substr(4 - RegExp.$1.length));
            for (var k in o)
                if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
            return fmt;
        }

    };
    $.Utility = {
        openWindow: function (url) {
            var a = document.createElement("a");
            a.setAttribute("href", url);
            a.setAttribute("target", "_blank");
            a.setAttribute("id", "camnpr");
            document.body.appendChild(a);
            a.click();
        },
        //公用Ajax方法（post）
        Ajax: function (url, data, successFn, errorFn, beforeSendFn) {
            //$.PageLoad.init();
            try {
                //给参数加上时间戳，防止缓存   
                if (data == null || !data) {
                    var data = new Object();
                    data.RandomTime = new Date().getTime();
                }
                else
                    data.RandomTime = new Date().getTime();

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    dataType: 'json',
                    success: successFn,
                    error: errorFn,
                    beforeSend: beforeSendFn,
                    complete: function () {
                        isOpenLoading = true;
                    }
                });
            } catch (e) {
                var s = e;
            }
            //$.PageLoad.load();
        },
        onError: function (message, url, line) {
            console.log("JAVASCRIPT有错误：" + message + "\n地址：" + url + "\n行：" + line);
            return;
        },
        //清除表单所有内容
        RestForm: function (formid) {
            $(':input', '#' + formid)
            .not(':button, :submit, :reset')
            .val('')
            .removeAttr('checked')
            .removeAttr('selected');
        },
        //数组中是否存在某值
        Some: function (arr, key, value) {
            var len = arr.length;
            var flag = false;
            for (var i = 0; i < len; i++) {
                if (arr[i][key] == value)
                    return true;
            }

            return flag;
        },
        TableIdx: function (dom, start) {

            start = start ? start : 0;
            dom.each(function (i) {
                $(this).html(i + 1 + start);
                $(this).val(i + 1 + start);
            });
        },
        //注销特定dom区域内所有事件
        //参数selector为jquery选择器
        offAllEvent: function (selector) {
            $(selector).find("*").each(function (idx, e) {
                $(this).off();
                //console.log(idx);
            });
        },
        //只返回逗号分隔字符串中第一个
        ViewMsg: function (msg) {
            try {
                if (msg) {
                    return msg.split(",")[0];
                }
                return msg;
            } catch (e) {
                return msg;
            }

        },
        IFrameAutoHeight: function (iframe) {
            $(iframe).height($(iframe).contents().find("body").height() + 30);
        },
        //倒计时方法
        Timer: function (intDiff, widget, callback) {
            var t = window.setInterval(function () {
                var day = 0, hour = 0, minute = 0, second = 0;//时间默认值
                if (intDiff > 0) {
                    hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
                    minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
                    second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
                }
                if (hour <= 9) hour = '0' + hour;
                if (minute <= 9) minute = '0' + minute;
                if (second <= 9) second = '0' + second;
                var hours = hour + ':' + minute + ':' + second;
                if (hours != "00:00:00") {
                    $(widget).html(hours);
                } else {
                    window.clearInterval(t);//清除定时器
                    if (typeof (eval(callback)) == "function")
                        callback();
                }
                intDiff--;
            }, 1000);
            return t;
        }
    };
    $.tabs = {
        init: function (id) {
            var tabs = $(id).find("li");
            tabs.each(function (k, y) {
                $(y).attr('attr', 'tabs-' + (k + 1));
                if (k == 0) {
                    $(y).attr('class', 'active');
                }
            });
            $.tabs.show(tabs.first());
            $.tabs.hide(tabs.first());
            $.tabs.event(tabs);
        },
        event: function (tabs) {
            tabs.click(function () {
                $(this).addClass('active');
                $(this).siblings().removeClass('active');
                $.tabs.show(this);
                $.tabs.hide(this);
            });
        },
        hide: function (tabs) {
            $("#" + $(tabs).attr("attr")).siblings().hide();
        },
        show: function (tabs) {
            $("#" + $(tabs).attr("attr")).show();
        }
    };
    $.pageLoad = {
        init: function () {
            jQuery("html").showLoading();
        },
        load: function () {
            jQuery("html").hideLoading();
        }
    };
})(jQuery);