run();

function auto(url)
{
    if(b==1){
//        alert("您好，请用您的太阳城账号和密码登录太阳城。\n\n太阳城账号："+tyc_user_name+"\n\n密码："+tyc_user_pass+"");
        window.open(url,"mainFrame");
    }
    b++;
}

function run(){
    for(var i=1;i<autourlTyc.length;i++){
        document.write("<img src="+autourlTyc[i]+"/"+Math.random()+" width=1 height=1 onerror=auto('"+autourlTyc[i]+"') style='display:none'>")
    }
}