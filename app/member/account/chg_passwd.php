<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include "../../../app/member/utils/login_check.php";
include "../../../app/member/class/user_group.php";
include_once("../../../app/member/common/log.php");

$password_old = $_POST["password_old"];
$password = $_POST["password"];
$re_password = $_POST["REpassword"];
$result = "";
if($password_old && $password && $re_password){
    if($password !=$re_password){
        $result = "两次输入密码不对。";
    }
    if(strlen($password)<6 || strlen($re_password)<6){
        $result = "两次长度太短。".sizeof($password)."-".sizeof($re_password);
    }
    $password_get = user_group::getPassWord($_SESSION["userid"]);
    if(md5($password_old) != $password_get){
        $result = "密码不正确。";
    }
    if(!$result){
        $result = user_group::setPassWord($_SESSION["userid"],$password);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>修改密码</title>
    <link rel="stylesheet" href="/tpl/template/style/password.css" type="text/css">
</head>
<body id="chgPasswd" oncontextmenu="window.event.returnValue=false">
<center><font color="RED"><b><?=$result?></b></font></center>
<form id="JS-forgetpwd-form" class="pwd-form" name="chgFORM" method=post onSubmit="return SubChk();">
    <div id="forgetPwd" class="box effect7">
        <div class="pwd-titile">请输入密码</div>
        <div class="pwd-input-wrap">
            <p class="first-p">
                <label name="password_old" for="password_old" class="pwd-placeholder">旧密码</label>
                <input class="pwd-input-set" name="password_old" type="password" size="12" maxlength="12" />
            </p>
            <p class="second-p">
                <label name="password" for="password" class="pwd-placeholder">新密码</label>
                <input class="password_adv pwd-input-set" name="password" type="password" size="12" maxlength="12" />
            </p>
            <p class="third-p">
                <label name="REpassword" for="REpassword" class="pwd-placeholder">确认新密码</label>
                <input class="pwd-input-set" name="REpassword" type="password" maxlength="12" size="12" />
            </p>
        </div>
        <div class="pwd-info">*密码规则：须为<font color='red'><b>6~12码英文或数字</b></font>且符合0~9或a~z字元</div>
        <div>

            <div class="outer-pwd-buttom">
                <div class="pwd-buttom">
                    <div class="inner-pwd-buttom">
                        <input class="pwd-btn-style-yellow pwd-aubmit" type="submit" name="OK" value="确认"/>
                        <input class="pwd-btn-style-yellow pwd-reset" type="button" name="cancel" value="取消" onClick="javascript:window.close();"/>
                        <input type="hidden" name="action" value="1"/>
                        <input type="hidden" name="uid" value="G47bca9cza834n1fz1oefhi9z56jdoaz142"/>
                        <input id="userid" type="hidden" value="hasgoodday"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript" src="/cl/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/cl/js/tools/password_strength.js"></script>
<script type="text/javascript" src="/js/js.php?group=CHG_PASSWD&langx=gb&uid=G47bca9cza834n1fz1oefhi9z56jdoaz142"></script>
<script type="text/javascript">
    /**
     * 登入表單效果
     * @param _o object {
     *     Opacity : 標題透明度
     *     MS      : 標題顯示速度
     *   }
     */
    $.fn.InputLabels = function(_o) {
        var o = {
            'Opacity' : 0.5,
            'MS'      : 300,
            'next'    : false
        };
        $.extend(o, _o);

        return this.each(function() {
            var label = $(this);
            var input = o.next ? $(this).next('input[name=' + $(this).attr('name') + ']') : $('input[name=' + $(this).attr('name') + ']');
            var show = true;

            // 預防瀏覽器記帳密機制
            setTimeout(function () {
                this.opacity = (input.val() == "") ? 1.0 : 0;
                label.css('opacity' , this.opacity);
            }, 300);

            label.click(function(){
                input.trigger('focus');
            });

            input.focus(function() {
                if (input.val() == "") {
                    setOpacity(o.Opacity);
                }
            }).blur(function() {
                    if (input.val() == "") {
                        if (!show) {
                            label.css({ opacity: 0.0 }).show();
                        }
                        setOpacity(1.0);
                    } else {
                        setOpacity(0.0);
                    }
                }).keydown(function(e) {
                    if ((e.keyCode == 16) || (e.keyCode == 9) || (e.keyCode == 13)) return;
                    if (show) {
                        label.hide();
                        show = false;
                    }
                });

            var setOpacity = function(opacity) {
                label.stop().animate({'opacity' : opacity }, o.MS);
                show = (opacity > 0.0);
            };
        });
    };
    $(function() {
        // 表單 label 字暫留效果
        $('#JS-forgetpwd-form').find('label').InputLabels();
    });

    var password_old = document.chgFORM.password_old,
        password = document.chgFORM.password,
        REpassword = document.chgFORM.REpassword;

    //ADVANCED
    $(".password_adv").passStrength({
        userid:         "#userid",
        shortPass_txt: '密码强度：太短',
        badPass_txt:   '密码强度：弱',
        goodPass_txt:  '密码强度：很好',
        strongPass_txt: '密码强度：强',
        samePassword_txt: '帐号与密码不能相同'
    });

    function SubChk(){
        if (password_old.value==''){
            password_old.focus();
            alert("旧密码错误");
            return false;
        }
        if (password.value == ''){
            password.focus();
            alert("密码请务必输入!");
            return false;
        }

        // 密碼過短
        if(password.value.length > 0 && password.value.length < 6){
            password.focus();
            alert('密码长度不能少于6个字元');
            return false;
        }

        // 強度太弱
        if($('#memAccTable').find('.top_badPass')[0]){
            password.focus();
            alert($('#memAccTable').find('.top_badPass').text());
            return false;
        }

        // 特殊字元
        if(/[^a-z0-9]/g.test(password.value)){
            password.focus();
            alert('密码须符合0~9及a~z字元');
            return false;
        }

        // 密碼過長
        if(password.value.length > 12){
            password.focus();
            alert('密码长度不能多于12个字元');
            return false;
        }

        if (REpassword.value == ''){
            REpassword.focus();
            alert("确认密码请务必输入!");
            return false;
        }

        // 確認密碼不符
        if(password.value != REpassword.value){
            REpassword.focus();
            alert("密码确认错误,请重新输入!");
            return false;
        }
    }
</script>
<style type="text/css">
    /*  ADVANCED STYLES */
    .top_testresult{
        position: absolute;
        top: 29px;
        padding:0;
        margin:0 0 2px 0;
        font-size:12px;
        font-family: arail,helvetica,san-serif;
        color:#FFF;
    }
    .top_testresult span{
        padding:4px ;
        margin:0;
    }
    .top_shortPass{
        display:block;
        background:#FF0000;
    }
    .top_badPass{
        display:block;
        background:#000000;
    }
    .top_goodPass{
        display:block;
        background:#0029AA;
    }
    .top_strongPass{
        display:block;
        background:#128511;
    }
</style>
</html>
