var searchText, menuText;
window.scrollMain = false;
window.scrollLeft = false;
window.scrollBottom = false;
var onAniEnd = function () {
    if (this.className == 'zBack') {
        document.getElementById('memberMenu').setAttribute('class', 'inCenter');
        document.getElementById('Main').setAttribute('class', 'inRight');
    } else if (this.className == 'zGo') {
        document.getElementById('memberMenu').setAttribute('class', 'inLeft');
        document.getElementById('Main').setAttribute('class', 'inCenter');
    } else if (this.className == 'betGo') {
        document.getElementById('Main').setAttribute('class', 'inLeft');
        document.getElementById('LeftMain').setAttribute('class', 'inCenter');
        if (window.scrollLeft) {
            window.scrollLeft = new iScroll("LeftMain");
        }
    } else if (this.className == 'betBack') {
        document.getElementById('Main').setAttribute('class', 'inCenter');
        document.getElementById('LeftMain').setAttribute('class', 'inRight');
    } 
    this.className = '';
}
function isTouchDevice(){
    /* Added Android 3.0 honeycomb detection because touchscroll.js breaks
       the built in div scrolling of android 3.0 mobile safari browser */
    if((navigator.userAgent.match(/android 3/i)) || (navigator.userAgent.match(/honeycomb/i))) {
        return false;
    }
    try{
        document.createEvent("TouchEvent");
        return true;
    }catch(e){
        return false;
    }
}
function getOverflowStyle (obj) {
    if (obj) {
        return document.defaultView.getComputedStyle(obj, null).getPropertyValue('-webkit-overflow-scrolling');
    }
}
var onScrollLoad = function () {
    var _main = null, _left = null, _bottom = null;
    if (document.getElementById('Main')) {
        _main = document.getElementById('Main');
    }
    if (document.getElementById('LeftMain')) {
        _left = document.getElementById('LeftMain');
    }
    if (document.getElementById('BottomMain')) {
        _bottom = document.getElementById('BottomMain');
    }
    if (getOverflowStyle(_main) == 'touch') {
    } else if (isTouchDevice()) {
        if (_main) {
            window.scrollMain = new iScroll('Main');   
        }
        if (_left) {
            window.scrollLeft = true;
        }
        if (_bottom) {
            window.scrollBottom = new iScroll('BottomMain');
        }
    }
}
/**
 * 高級會員介面，退回選單區塊
 * @param obj 點擊的a tag
 */
function backMenu (obj) {
    obj.className = 'hide';
    document.getElementById('adminBody').className = 'slide2';
    setTimeout(function() {
         document.getElementById('work').style.left = '100%';
         document.getElementById('menu').style.left = '0';
    },500);
}
/**
 * 高級會員介面，退回log搜尋區塊
 * @param obj 點擊的a tag
 */
function backSearch (obj) {
    obj.innerHTML = menuText;
    obj.onclick = function () {
        backMenu(this);
    };
    document.getElementById('subZone').className = 'slide2';
    setTimeout(function() {
        document.getElementById('subMenu').className = 'centerZone';
        document.getElementById('subWork').className = 'leftZone';
    },500);
}
/**
 * 高級會員介面，前往選單
 */
function goMenu () {
    //var h1 = document.getElementsByTagName('h1');
    var obj = document.getElementById('adminHeader').getElementsByTagName('a')[0];
    obj.className = '';
    document.getElementById('work').style.left = '';
    document.getElementById('menu').style.left = '';
    document.getElementById('adminBody').className = 'slide';
}
/**
 * 高級會員介面，執行log搜尋的滑動動作
 */
function onSearch () {
    var obj = document.getElementById('adminHeader').getElementsByTagName('a')[0];
    obj.innerHTML = searchText;
    obj.onclick = function () {
        backSearch(this);
    }
    document.getElementById('subZone').className = 'slide';
    setTimeout(function(){
        document.getElementById('subMenu').className = 'leftZone';
        document.getElementById('subWork').className = 'centerZone';
    },500);
}
/**
 * 高級會員介面，換頁不執行滑動動作
 */
function onRight() {
    var obj = document.getElementById('adminHeader').getElementsByTagName('a')[0];
    obj.innerHTML = searchText;
    obj.onclick = function () {
        backSearch(this);
    }
    document.getElementById('subMenu').className = 'leftZone';
    document.getElementById('subWork').className = 'centerZone';
} 
var bakText;
/**
 * 樹狀選單，前往子選單
 * @param obj   點擊的aTag物件
 * @param label 選單代號
 */
function asideGo(obj, label) {
    var as = obj.parentNode.parentNode.getElementsByTagName('a');
    var div = document.getElementById('menuNav').parentNode;
    var back = document.getElementById('adminHeader').getElementsByTagName('a')[0];
    var uls = document.getElementById('subMenuNav').getElementsByTagName('ul');
    var h1 = document.getElementById('adminHeader').getElementsByTagName('h1')[0];
    h1.innerHTML = '';
    h1.appendChild(obj.childNodes[0].cloneNode(true));
    for (var i=0; i < as.length; i++) {
        as[i].className = '';
    }
    obj.className = 'Now';
    for (var i=0; i < uls.length; i++) {
        uls[i].style.display = 'none';
    }
    document.getElementById(label+'_ul').style.display = '';
    back.className = '';
    back.onclick = function () {
        asideBack(this);
    }
    div.className = 'slide';
    setTimeout(function() {
        document.getElementById('menuNav').className = 'leftZone';
        document.getElementById('subMenuNav').className = 'centerZone';
    },500);
}
/**
 * 樹狀選單回上一層
 * @param obj   點擊的a tag物件
 */
function asideBack(obj) {
    obj.className = 'hide';
    var h1 = document.getElementById('adminHeader').getElementsByTagName('h1')[0];
    h1.innerHTML = '';
    var div = document.getElementById('menuNav').parentNode;
    div.className = 'slide2';
    setTimeout(function() {
        document.getElementById('menuNav').className = 'centerZone';
        document.getElementById('subMenuNav').className = 'leftZone';
    },500);

}
/**
 * 退回子選單
 * @param obj   點擊的a tag物件
 */
function menuBack(obj) {
    var h1 = document.getElementById('adminHeader').getElementsByTagName('h1')[0];
    h1.innerHTML = obj.innerHTML;
    obj.innerHTML = bakText;
    obj.onclick = function () {
        asideBack(this);
    };
    if (document.getElementById('TopMenu')) {
        document.getElementById('TopMenu').style.display = 'none';
    }
    if (document.getElementById('Pad3D')) {
        document.getElementById('Pad3D').style.display = 'none';
    }
    document.getElementById('agentBody').className = 'slide2';
    setTimeout(function() {
        document.getElementById('agentMenu').className = 'centerZone';
        document.getElementById('agentWork').className = 'rightZone';
    },500);

}
/**
 * 重回頁面主要區塊
 */
function cancelMenu() {
    var h1 = document.getElementById('adminHeader').getElementsByTagName('h1')[0];
    var as = document.getElementById('subMenuNav').getElementsByTagName('a');
    var obj = document.getElementById('adminHeader').getElementsByTagName('a')[0];
    obj.innerHTML = h1.innerHTML;
    for (var i=0; i<as.length; i++) {
        if (as[i].className == 'Now') {
            h1.innerHTML = '';
            h1.appendChild(as[i].childNodes[0].cloneNode(true));
        }
    }
    obj.onclick = function () {
        menuBack(this);
    };
    document.getElementById('agentMenu').className = 'leftZone';
    document.getElementById('agentWork').className = 'centerZone';
    document.getElementById('agentBody').className = 'slide';
    setTimeout(function() {
        if (document.getElementById('TopMenu')) {
            document.getElementById('TopMenu').style.display = '';
        }
        if (document.getElementById('Pad3D')) {
            document.getElementById('Pad3D').style.display = '';
        }
    },500);
}
/**
 * 注單介面，退回注單搜尋的區域
 * @param obj  點擊的a tag物件
 */
function reSearch(obj) {
    obj.innerHTML = menuText;
    obj.onclick = function () {
        menuBack(this);
    };
    document.getElementById('subZone').className = 'slide2';
    setTimeout(function() {
        document.getElementById('subMenu').className = 'centerZone';
        document.getElementById('subWork').className = 'rightZone';
    },500);
}
/**
 * 執行注單搜尋的滑動function
 */
function wagerSearch () {
    var obj = document.getElementById('adminHeader').getElementsByTagName('a')[0];
    obj.innerHTML = searchText;
    obj.onclick = function () {
        reSearch(this);
    }
    document.getElementById('subZone').className = 'slide';
    setTimeout(function(){
        document.getElementById('subMenu').className = 'leftZone';
        document.getElementById('subWork').className = 'centerZone';
    },500);
}
/**
 * 注單換頁不用執行滑動效果
 */
function wRight() {
    var obj = document.getElementById('adminHeader').getElementsByTagName('a')[0];
    obj.innerHTML = searchText;
    obj.onclick = function () {
        reSearch(this);
    }
    document.getElementById('subMenu').className = 'leftZone';
    document.getElementById('subWork').className = 'centerZone';
} 
/**
 * 回上一層
 * @param obj   點擊的a tag物件
 */
function backAside (obj) {
    obj.className = 'hide';
    var h1 = document.getElementById('memberTop').getElementsByTagName('h1')[0];
    h1.innerHTML = obj.innerHTML;
    if (document.getElementById('Pad3D')) {
        document.getElementById('Pad3D').style.display = 'none';
    }
    if (document.getElementById('Pad5D')) {
        document.getElementById('Pad5D').style.display = 'none';
    }
    document.getElementById('memberZone').setAttribute('class', 'zBack');
    //setTimeout(function() {
    //    document.getElementById('memberMenu').setAttribute('class', 'inCenter');
    //    document.getElementById('Main').setAttribute('class', 'inRight');
    //},500);
}
/**
 * 回下注頁       
 * @param obj   點擊的a tag物件
 */
function goAside(a) {
    var obj = document.getElementById('memberTop').getElementsByTagName('a')[0];
    var h1 = document.getElementById('memberTop').getElementsByTagName('h1')[0];
    h1.innerHTML = '';
    h1.appendChild(a.childNodes[0].cloneNode(true));
    obj.className = '';    
    if (document.getElementById('Pad3D')) {
        document.getElementById('Pad3D').style.display = '';
    }
    if (document.getElementById('Pad5D')) {
        document.getElementById('Pad5D').style.display = '';
    }
    document.getElementById('memberZone').setAttribute('class', 'zGo');
    //setTimeout(function() {
    //    document.getElementById('memberMenu').setAttribute('class', 'inLeft');
    //    document.getElementById('Main').setAttribute('class', 'inCenter');
    //},500);
}
/**
 * 下注       
 */
function goBet() {
    if (document.getElementById('LeftMain').className == 'inRight') {
        var obj = document.getElementById('memberTop').getElementsByTagName('a')[0];
        var h1 = document.getElementById('memberTop').getElementsByTagName('h1')[0];
        var h2 = document.getElementById('LeftMain').getElementsByTagName('h2')[0];
        menuText = obj.innerHTML;
        searchText = h1.innerHTML;
        h1.innerHTML = h2.innerHTML;
        obj.innerHTML = searchText;
        obj.className = '';
        obj.onclick = backBet;
        if (document.getElementById('Pad3D')) {
            document.getElementById('Pad3D').style.display = 'none';
        }
        if (document.getElementById('Pad5D')) {
            document.getElementById('Pad5D').style.display = 'none';
        }
        if (document.getElementById('QuickBar')) {
            var q = document.getElementById('QuickBar');
            if (q.x == 1) {
                q.style.display = 'none';
                q.x = 0;
            }
        }
        if (document.getElementById('QuickDiv')) {
            var qd = document.getElementById('QuickDiv');
            if (qd.x == 1) {
                qd.style.display = 'none';
                qd.x = 0;
            }
        }
        document.getElementById('memberZone').setAttribute('class', 'betGo');
        //setTimeout(function() {
        //    document.getElementById('Main').setAttribute('class', 'inLeft');
        //    document.getElementById('LeftMain').setAttribute('class', 'inCenter');
        //},500);
    }
}
/**
 * 消取下注       
 */
function backBet() {
    var obj = document.getElementById('memberTop').getElementsByTagName('a')[0];
    var h1 = document.getElementById('memberTop').getElementsByTagName('h1')[0];
    h1.innerHTML = searchText;
    obj.innerHTML = menuText;
    obj.className = '';
    obj.onclick = function () {
        backAside(this);
    }
    if (document.getElementById('Pad3D')) {
        document.getElementById('Pad3D').style.display = '';
    }
    if (document.getElementById('Pad5D')) {
        document.getElementById('Pad5D').style.display = '';
    }
    if (document.getElementById('QuickBar')) {
        var q = document.getElementById('QuickBar');
        if (q.x == 1) {
            q.style.display = 'none';
            q.x = 0;
        }
    }
    if (document.getElementById('QuickDiv')) {
        var qd = document.getElementById('QuickDiv');
        if (qd.x == 1) {
            qd.style.display = 'none';
            qd.x = 0;
        }
    }
    document.getElementById('memberZone').setAttribute('class', 'betBack');
    //setTimeout(function() {
    //    document.getElementById('Main').setAttribute('class', 'inCenter');
    //    document.getElementById('LeftMain').setAttribute('class', 'inRight');
    //},500);
}
/**
 * 呼叫搜尋功能
 */
function goTop() {
    removeClass(document.getElementById('BottomMain'), 'hide');
    addClass(document.getElementById('BottomMain'), 'topGo');
}
/**
 * 取消搜尋功能
 */
function backTop() {
    addClass(document.getElementById('BottomMain'), 'topBack');
}
/**
 * 使用javascript捉取Query字串值
 * @param paramName param的名稱 
 * @param locationStr 網址字串 
 */
function getParamString( paramName, locationStr ){
　　paramName = paramName.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]").toLowerCase();
　　var reg = "[\\?&]"+paramName +"=([^&#]*)";
　　var regex = new RegExp( reg );
　　var regResults = regex.exec( locationStr );
　　if( regResults == null ) return "";
　　else return regResults [1];
} 
if (window.addEventListener) {
    window.addEventListener("load", function () { 
        if (document.getElementById('agentBody')){
            document.getElementById('agentBody').style.display = ''; 
        }
        if (document.getElementById('agentMenu')) {
            var as = document.getElementById('menuNav').getElementsByTagName('a');
            var a = document.getElementById('adminTop').getElementsByTagName('a')[0];
            bakText = a.innerHTML;
            for (var i=0; i<as.length; i++) {
                if (as[i].className == 'Now') {
                    a.innerHTML = '';
                    a.appendChild(as[i].childNodes[0].cloneNode(true));
                }
            }
        }
        var animationEnd = (navigator.vendor && "webkitAnimationEnd") || ( window.opera && "oanimationend") || "animationend"; 
        if (document.getElementById('memberZone')) {
            document.getElementById('memberZone').addEventListener(animationEnd, onAniEnd, false);
        }
        if (document.getElementById('BottomMain')) {
            document.getElementById('BottomMain').addEventListener(animationEnd, function () {
                if (hasClass(this, 'inBottom')) {
                    this.setAttribute('class', 'inCenter');
                    if (window.scrollBottom) {
                        window.scrollBottom.refresh();
                    }
                } else if (hasClass(this, 'inCenter')) {
                    this.setAttribute('class', 'inBottom hide');
                }
            }, false);
        }
        if (document.getElementById('topBack')) {
            document.getElementById('topBack').onclick = backTop;
        }
        setTimeout(onScrollLoad, 100);
    }, false);
    if (typeof(window.orientation) != 'undefined') {
        window.addEventListener("load", function () { window.scrollTo(0,1); }, false);
        window.addEventListener("orientationchange", function () { window.scrollTo(0,1); }, false);
    }
} 

if (window.attachEvent) {
    window.attachEvent("onload", function() {
        if (document.getElementById('agentBody')){
            document.getElementById('agentBody').style.display = ''; 
        }
    });
}
