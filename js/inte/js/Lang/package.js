(function(ns){
    var _scripts = document.getElementsByTagName('script'),
         re = /package\.js(\?.*){0,1}$/,
         __DIR__, webvar = '';
    for (var i = 0, L = _scripts.length; i < L; i++) {
        var m = null;
        if (m = _scripts[i].src.match(re)) {
            __DIR__ = _scripts[i].src.replace(re, '');
            webvar = m[1] || '';
            break;
        }
    }

    ns['package'] = {
        'big5'  : __DIR__+'lang_tw.js'+webvar,//繁體中文
        'zh-tw'  : __DIR__+'lang_tw.js'+webvar,//繁體中文
        'en' : __DIR__+'lang_en.js'+webvar,//英文
        'en-us' : __DIR__+'lang_en.js'+webvar,//英文
        'es'     : __DIR__+'lang_en.js'+webvar,//西班牙
        'jp'     : __DIR__+'lang_en.js'+webvar,//日文
        'khm'    : __DIR__+'lang_en.js'+webvar,//高綿語 (柬埔塞)
        'ko'     : __DIR__+'lang_en.js'+webvar,//韓文
        'lao'    : __DIR__+'lang_en.js'+webvar,//寮語
        'th-tis': __DIR__+'lang_en.js'+webvar,//泰文
        'vi'      : __DIR__+'lang_en.js'+webvar,//越南文
        'gb'     : __DIR__+'lang_cn.js'+webvar,//簡體中文
        'ug'     : __DIR__+'lang_cn.js',//維吾爾文
        'default': __DIR__+'lang_cn.js'+webvar//簡體中文
    };
    ns.load();
})(self.Lang);
