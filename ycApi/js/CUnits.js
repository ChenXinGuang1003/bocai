//var CUnits = {};
(function ($) {
    window.CUnits = {};
    CUnits.getUrlParam = function (name) {
        try {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return unescape(r[2]);
        } catch (e) { }
        return null;
    };
    CUnits.ToInt = function (source, r) {
        var TmpR = parseInt(r, 10);
        source = parseInt(source, 10);
        if (isNaN(source)) {
            if (r == null || isNaN(TmpR)) source = 0;
            else source = r;
        }
        else
            if (!isNaN(TmpR) && source < r) source = r;
        return source;
    };

    //格式为百分比
    CUnits.FormatPercent = function (source) {
        var reg = /[\$,%]/g;
        var key = (parseFloat(String(source).replace(reg, '')).toFixed(4)) * 100; // toFixed小数点后4位  
        if (isNaN(key)) {
            return "0.00%"
        } else {
            return key.toFixed(2) + "%"
        }
    };

    CUnits.CallHistory = function (id, dt) {
        var ClientSize = CUnits.ClientSize();
        var minW = ClientSize.width - 10, minH = ClientSize.height - 10;
        if (minW < 600) minW = 600;
        if (minH < 300) minH = 300;
		 jQuery.layer({
                type: 2,
                title: ['录音信息', 'background:#5fa1eb;color:#fff;'],
                maxmin: false, fadeIn: 300, border: [0],
                shadeClose: false,
                area: [minW + 'px', minH + 'px'],
                btns: 0,
                iframe: {
                    src: _vir_ + '/Layer/Layer/GetCallHistory?id=' + id+'&dt='+dt,
                    scrolling: 'yes'
                }, close: function (index) {
                    try {
                        
                    } catch (err) {
                        CUnits.log("录音信息" + err)
                    }
                },

                end: function () { layer.closeAll(); }
            });
	}
    CUnits.Tant = function (id, cid, date, HIS_ID) {
        jQuery.layer({
            type: 2,   //0-4的选择,
            title: ['录音质检', 'background:#5fa1eb;color:#fff;'],
            bgcolor: '#fff',
            fadeIn: 300,
            border: [0],
            closeBtn: [0, true],
            shadeClose: false,
            area: ['850px', '445px'],
            shade: [0.3, '#000'],
            maxmin: true,
            btns: 0,
            iframe: {
                src: _vir_ + '/qc/qczj/getitemfen?tsid=' + id + "&callid=" + cid + "&hisid=" + HIS_ID + "&date=" + date,
                scrolling: 'yes'
            },
            success: function (layero) {//层弹出成功后的回调函数. 
            },
            close: function (index) {
                $("iframe[name='xubox_iframe" + index + "']")[0].contentWindow.Stop();
            },//层右上角关闭按钮的点击事件触发回调函数。
            end: function () { layer.closeAll(); }
        });
    }

    CUnits.trim = function (o, defValue, IFvalueTodefvalue) {
        if (defValue == null) defValue = "";
        o = jQuery.trim(o) + "";
        if (IFvalueTodefvalue == o) o = defValue;
        return (o == "" ? defValue : o);
    };
    CUnits.split = function (source, separator, limit, unknown) {
        source = CUnits.trim(source);
        source = source + "";
        if (source == "") return [];
        else return source.split(separator, limit, unknown);
    };
    CUnits.format = function (source, params) {
        if (arguments.length == 1)
            return function () {
                var args = $.makeArray(arguments);
                args.unshift(source);
                return $.format.apply(this, args);
            };
        if (arguments.length > 2 && params.constructor != Array)
            params = $.makeArray(arguments).slice(1);

        if (params.constructor != Array) params = [params];
        $.each(params, function (i, n) {
            source = source.replace(new RegExp("\\{" + i + "\\}", "g"), n);
        });
        return source;
    };
    CUnits.Alt = function (key, callback, args) {
        var isAlt = false;
        $(document).keydown(function (e) {
            if (e.which === 18)
                isAlt = true;
            if (e.which === key.toUpperCase().charCodeAt(0) && isAlt === true) {
                if ($.isFunction(callback)) {
                    e.preventDefault();
                    e.stopPropagation();
                    if (!$.isArray(args)) args = [];
                    callback.apply(this, args);
                }
                isAlt = false;
                return false;
            }
        }).keyup(function (e) {
            if (e.which === 18) isAlt = false;
        });
    };

    CUnits.CtrlEnter = function (id, callback, args) {
        jQuery(id).keypress(function (e) {
            if (e.ctrlKey && e.which == 13 || e.which == 10) {
                if (!$.isArray(args)) args = [];
                callback.apply(this, args);
                return false;
            }
        });
    };
    CUnits.delHtmlTag = function (str) {
        return CUnits.trim(str).replace(/<[^>]+>/g, "");//去掉所有的html标记  
    }
    CUnits.Ajax = function (settings) {
        try {
            var rvfKey = '__RequestVerificationToken';
            var rvftoken = $('input[name=' + rvfKey + ']');
            if (rvftoken.length > 0) {
                if (settings.data != null) {
                    if ($.isArray(settings.data)) {
                        settings.data.push({ name: rvfKey, value: rvftoken.val() });
                    }
                    else {
                        settings.data[rvfKey] = rvftoken.val();
                    }
                } else {
                    settings.data = {};
                    settings.data[rvfKey] = rvftoken.val();
                }
            }
        } catch (err) {  }
        var paras = $.extend({
            //contentType:"application/x-www-form-urlencoded",//发送信息至服务器时内容编码类型
            type: "post",//post、get
            dataType: "json"//DataType:xml、html、script[纯文本]、json、jsonp、text
            //url: Url,
            //data: Params,
            //async: async,//默认值: true
            //beforeSend:function(XHR){},//XMLHttpRequest对象，如果返回 false可取消本次ajax请求
            //cache: false//默认值:true，dataType为 script和jsonp时默认为 false
            //complete:function(XHR, TS){},//请求完成后回调函数
            //dataFilter: function (data, type) {}//返回数据的预处理函数
        }, settings);

        paras = $.extend(paras, {
            success: function (data) {
                if ($.isFunction(paras.cb))
                    paras.cb(data);
            },
            error: function (emsg) {
                if ($.isFunction(paras.cb)) {
                    paras.cb({
                        success: false,
                        code: "err02",
                        msg: "请求异常！",
                        source: emsg
                    });
                }
            }
            , complete: function (XHR, TS) { XHR = null; }
        });
        return jQuery.ajax(paras);
    };
    CUnits.Enter = function (id, CallBack) {
        jQuery(id).unbind("keydown").bind("keydown", function (e) {
            if (e.keyCode == 13) {
                e.preventDefault(); //阻止默认行为
                e.stopPropagation();

                try {
                    if ($(e.target).attr("onfocus").toLowerCase().indexOf("wdatepicker") != -1) {
                        return;//此控件无法释放焦点，禁用回车
                    }
                } catch (err) { }

                if ($.isFunction(CallBack)) {
                    $("input").blur();
                    CallBack(e);
                }
                else alert('非函数');
            }
        });
    };
    CUnits.stringify = function (obj) {
        var arr = [];
        try {
            $.each(obj, function (key, val) {
                var next = CUnits.format('"{0}":"{1}"', key, val);
                arr.push(next);
            });
        } catch (err) { }
        return '{' + arr.join(',') + '}';
    };

    CUnits.log = function (c) {
        try {
            window.console = window.console || {};
            console.log || (console.log = opera.postError);
            console.log(c);
        } catch (err) { }
    };

    CUnits.DNetDate = function (t) {
        console.log(t);
        return new Date(parseInt(t.replace("/Date(", "").replace(")/", ""), 10));
    };

    CUnits.TimeSpan = function (t) {
        return t.split('.')[0];
    };

    CUnits.StrToDate = function (strDate) {
        if (strDate == null) strDate = "";
        var date = eval('new Date(' + strDate.replace(/\d+(?=-[^-]+$)/,
            function (a) { return parseInt(a, 10) - 1; }).match(/\d+/g) + ')');
        return date;
    }

    CUnits.ClientSize = function () {
        //主操作区域高
        var wHeight = (window.document.documentElement.clientHeight
            || window.document.body.clientHeight
            || window.innerHeight);

        //需要html,body的height：100%,overflow: hidden;支持
        var bHeight = $(document.body).height() * 2 - $(document.body).outerHeight(true),
            bWidth = $(document.body).width();

        return { width: bWidth, height: bHeight };
    };

    CUnits.CharacterForN = function (chr, len) {
        var result = "";
        len = CUnits.ToInt(len);
        if (len < 1) return result;
        else {
            while (len > 0) {
                result += chr;
                len--;
            }
        }
        return result;
    };

    CUnits.ExportHtml = function (settings, totalPage, url, jsonData) {
        
        var oid = "eh" + new Date().getTime(),
            otilte = "",
            tp = 0;
        var downPage = function () {
            jsonData = jsonData || {};
            jsonData["exportType"] = CUnits.ToInt($('#' + oid + " [name=pgsel]:checked").val());
            jsonData["exportStartPage"] = CUnits.ToInt($('#' + oid + " [name=exportStartPage]").val());
            jsonData["exportEndPage"] = CUnits.ToInt($('#' + oid + " [name=exportEndPage]").val());
            CUnits.Open(url, null, jsonData, "", true);
        };
        tp = CUnits.ToInt(totalPage);
        if (totalPage != null) otilte = '(共' + tp + '页)';

        if (jsonData != null && CUnits.trim(jsonData["treeGrid"]).toLowerCase() == "true") {
            downPage();//treeGrid只能是全部数据
            return;
        }

        var ohtml = '<div id="' + oid + '" class="bc_export">'
                + '     <div><label><input value="0" name="pgsel" type="radio" checked />全部'
                        + otilte + '</label></div>'
                + '     <div><input value="1" name="pgsel" type="radio" />从<input name="exportStartPage" class="pg" maxlength="10" value="1" data-max="' + tp + '" />页到<input name="exportEndPage" class="pg" maxlength="10"  data-max="' + tp + '" value="' + tp + '" />页'
                + '     </div>'
                + '</div>';
        var sucfun = settings.success,
            yesfun = settings.yes;
        var paras = $.extend({
            type: 1,   //0-4的选择,
            title: ['导出', 'background:#5fa1eb;color:#fff;'],
            bgcolor: '#fff',
            fadeIn: 300,
            border: [0],
            closeBtn: [0, true],
            shadeClose: false,
            area: ['300px', '160px'],
            shade: [0.3, '#000'],
            maxmin: false,
            btns: 2,
            btn: ['导出', '取消'],
            page: {
                html: ohtml
            }
        }, settings, {
            success: function (layero) {//层弹出成功后的回调函数. 
                try {
                    $("#" + oid + " [name=pgsel]").change(function () {
                        if ($(this).attr("checked")) {
                            $(this).closest("div").siblings().find("[name=pgsel]").attr("checked", false);
                        }
                    });
                    $("#" + oid + " .pg").click(function () {
                        $(this).prevAll("[name=pgsel]").attr("checked", true).trigger("change");
                    });

                    function eyz(_tobj) {
                        var ovalue = $(_tobj).val(),
                            rvalue = ovalue.replace(/\D/g, ""),
                            maxvalue = CUnits.ToInt($(_tobj).attr("data-max")),
                            rname = CUnits.trim($(_tobj).attr("name")).toLowerCase();

                        if (ovalue != rvalue) {
                            $(_tobj).val(rvalue);
                        }
                        var rvalue_i = CUnits.ToInt(rvalue);
                        if (rvalue_i > maxvalue) {
                            rvalue_i = maxvalue;
                            $(_tobj).val(maxvalue);
                        }

                        switch (rname) {
                            case "exportstartpage":
                                var lastpage = CUnits.trim($(_tobj).next("input[name=exportEndPage]").val(), 0);
                                if (rvalue_i > lastpage) {
                                    $(_tobj).val(lastpage);
                                }
                                break;
                            case "exportendpage"://exportStartPage exportEndPage
                                var firstpage = CUnits.trim($(_tobj).prev("input[name=exportStartPage]").val(), 0);
                                if (rvalue_i < firstpage) {
                                    $(_tobj).val(firstpage);
                                }
                                break;
                        }
                    };

                    $("#" + oid + " [name=exportStartPage]").blur(function () {
                        eyz(this);
                    }).keyup(function () {
                        eyz(this);
                    });

                    $("#" + oid + " [name=exportEndPage]").blur(function () {
                        eyz(this);
                    }).keyup(function () {
                        eyz(this);
                    });
                    // onblur="CUnits.e_int(this)" onkeyup="CUnits.e_int(this)"

                    //添加回车事件
                    CUnits.Enter($("#" + oid + " input"), function () {
                        downPage();
                        return false;
                    });
                } catch (err) { }
                if ($.isFunction(sucfun)) sucfun(layero);
            },
            yes: function (cindex) {//按钮一的回调函数 
                downPage();
                if ($.isFunction(yesfun)) yesfun(cindex);
                try {
                    layer.close(cindex);
                } catch (err) { }
            }
        });

        $.layer(paras);
    };

    CUnits.Open = function (url, name, urlParas, parameters, isPost) {
       
        var oid = "tmp" + new Date().getTime();
        if (isPost == true) {
            name = CUnits.trim(name);
            if (CUnits.trim(name) == "") name = new Date().getTime() + "";

            var formhtml = CUnits.format('<form id="{0}" name="{0}" method="get" action="{1}" target="{2}" onsubmit="CUnits.Open(\'about:blank\',\'{2}\',null,\'{3}\')"></form>', "dp" + oid, url, name.replace(/-/g, ""), CUnits.trim(parameters));
            $(document.body).append($(formhtml));
            urlParas = urlParas || {};
            for (var m in urlParas) {
                var ggg = CUnits.format('<input type="hidden" name="{0}" value=\'{1}\'>', m, urlParas[m]);
                $('#' + "dp" + oid).append(ggg);
            }
            $('#' + "dp" + oid)[0].submit();
            $('#' + "dp" + oid).remove();
        }
        else {
            if (CUnits.trim(url).indexOf("?") == -1 && $.isArray(urlParas) && urlParas.length > 0) {
                url = CUnits.trim(url) + "?";
                url += urlParas.join('&');
            }
            window.open(url, name, parameters);
        }
    };

    /*onblur="CUnits.e_int(this)" onkeyup="CUnits.e_int(this)"*/
    CUnits.e_dec = function (obj) {
        obj.value = obj.value.replace(/[^\d.]/g, "");  //清除“数字”和“.”以外的字符
        obj.value = obj.value.replace(/^\./g, "");  //验证第一个字符是数字而不是.
        obj.value = obj.value.replace(/\.{2,}/g, "."); //只保留第一个. 清除多余的.
        obj.value = obj.value.replace(".", "$#$").replace(/\./g, "").replace("$#$", ".");
    };
    CUnits.e_dec1 = function (obj) {
        obj.value = obj.value.replace(/[^\-?\d.]/g, '');
    };
    CUnits.e_int = function (obj) {
        obj.value = obj.value.replace(/\D/g, "");
    }
    CUnits.e_mail = function (v) {
        var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        return myreg.test(v);
    };

    CUnits.isUndefined = function (variable) {
        return typeof variable == 'undefined' ? true : false;
    };

    CUnits.HTMLEncode = function (text) {
        if (!text)
            return '';

        text = text.replace(/&/g, '&amp;');
        text = text.replace(/</g, '&lt;');
        text = text.replace(/>/g, '&gt;');
        return text;
    }


    CUnits.HTMLDecode = function (text) {
        if (!text)
            return '';

        text = text.replace(/&gt;/g, '>');
        text = text.replace(/&lt;/g, '<');
        text = text.replace(/&amp;/g, '&');

        return text;
    };

    CUnits.PhoneRidZero = function (phone) {
        phone = CUnits.trim(phone);
        if (phone.length > 11 && phone.slice(0, 3) != "010" && phone.slice(0, 2) == "01")
            phone = phone.slice(1);
        return phone;
    }

    $.CPlaceholder = function (e) { }
    $.CPlaceholder_value = function (e) {
        return $(e).val();
    }
})(jQuery);

/*
*日期格式化
* e.g1 var now = new Date();
*      var nowStr = now.format("yyyy-MM-dd hh:mm:ss");
*      var testStr = now.format("YYYY年MM月dd日hh小时mm分ss秒");
* e.g2 new Date().Format("yyyy年MM月dd日")
*
*/
Date.prototype.format = function (format) {
    var o = {
        "M+": this.getMonth() + 1, //month
        "d+": this.getDate(), //day
        "h+": this.getHours(), //hour
        "m+": this.getMinutes(), //minute
        "s+": this.getSeconds(), //second
        "q+": Math.floor((this.getMonth() + 3) / 3), //quarter
        "S": this.getMilliseconds() //millisecond
    }

    if (/(y+)/.test(format)) {
        format = format.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    }
    for (var k in o) {
        if (new RegExp("(" + k + ")").test(format)) {
            format = format.replace(RegExp.$1, RegExp.$1.length == 1 ? o[k] : ("00" + o[k]).substr(("" + o[k]).length));
        }
    }
    return format;
};

var RVToken = {
    k: '__RequestVerificationToken',
    v: function () {
        return $('input[name=' + RVToken.k + ']').val();
    },
    json: function () {
        return { name: RVToken.k, value: RVToken.v() };
    },
    json1: function () {
        var p = {};
        p[RVToken.k] = RVToken.v();
        return p;
    }
};

var CusTpower;
jQuery(document).ready(function () {
    $('body').keydown(function (e) {
        var $target = $(e.target);
        if (e.which == 8) {
            return $target.is('input:enabled,textarea:enabled') && !$target.is('input[readOnly],textarea[readOnly]');
        }
    });


    CusTpower = function () {
        if ("undefined" == typeof _power_) return;
        if (typeof _noPowercc != 'undefined' && _noPowercc == "1") return;
        var powarr = CUnits.split(_power_, ',');
        if (powarr.length > 0) {
            $("[data-power]").each(function () {
                var curvalue = CUnits.trim($(this).attr("data-power")).toLowerCase();
                if ($.inArray(curvalue, powarr) == -1)
                    $(this).remove();
            });
        }
    };
    CusTpower();
});

CUnits.OpenTab = function (Id, Url, Name, Refresh) {
    try {
        var tabobj = null;
        if ("undefined" != typeof ttcc_addtab) {
            tabobj = ttcc_addtab;
        }
        if (tabobj == null)
            tabobj = parent.window.ttcc_addtab;
        if (tabobj == null)
            tabobj = parent.parent.window.ttcc_addtab;
        if (tabobj == null)
            tabobj = parent.parent.parent.window.ttcc_addtab;
        tabobj(Id, Url, Name, Refresh);
    } catch (err) {
        CUnits.log(err);
        window.open(Url, Id);
    }
};

CUnits.CloseTab = function (Id) {
    try {
        var tabobj = null;
        if ("undefined" != typeof ttcc_closetab) {
            tabobj = ttcc_closetab;
        }
        if (tabobj == null)
            tabobj = parent.window.ttcc_closetab;
        if (tabobj == null)
            tabobj = parent.parent.window.ttcc_closetab;
        if (tabobj == null)
            tabobj = parent.parent.parent.window.ttcc_closetab;
        tabobj(Id);
    } catch (err) {
        CUnits.log(err);
    }
};


CUnits.HomeObj = function () {//获取主页的对象
    var tabobj = null;
    try {
        var tabobj = null;
        if ("undefined" != typeof mainoper) {
            tabobj = mainoper;
        }
        if (tabobj == null)
            tabobj = parent.window.mainoper;
        if (tabobj == null)
            tabobj = parent.parent.window.mainoper;
        if (tabobj == null)
            tabobj = parent.parent.parent.window.mainoper;
    } catch (err) {
        tabobj = null;
        CUnits.log("coper.HomeObj err>>" + err);
    }
    return tabobj;
}

CUnits.dial = function (phone) {
    try {
        return CUnits.HomeObj().dial(phone);
    } catch (err) {
        CUnits.log("CUnits.dial err>>" + err);
        return false;
    }
};

CUnits.Intrude = function (phone) {
    try {
        return CUnits.HomeObj().Intrude(phone);
    } catch (err) {
        CUnits.log("CUnits.Intrude err>>" + err);
        return false;
    }
};

CUnits.Intercept = function (phone) {
    try {
        return CUnits.HomeObj().Intercept(phone);
    } catch (err) {
        CUnits.log("CUnits.Intercept err>>" + err);
        return false;
    }
};

CUnits.interceptCall = function (phone) {
    try {
        return CUnits.HomeObj().interceptCall(phone);
    } catch (err) {
        CUnits.log("CUnits.interceptCall err>>" + err);
        return false;
    }
};

CUnits.forceHangupCall = function (phone) {
    try {
        return CUnits.HomeObj().forceHangupCall(phone);
    } catch (err) {
        CUnits.log("CUnits.forceHangupCall err>>" + err);
        return false;
    }
};

CUnits.KickOut = function (phone) {
    try {
        return CUnits.HomeObj().KickOut(phone);
    } catch (err) {
        CUnits.log("CUnits.KickOut err>>" + err);
        return false;
    }
};