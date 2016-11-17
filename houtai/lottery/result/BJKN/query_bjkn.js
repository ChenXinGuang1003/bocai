function queryLottery(){
    var timeParam = $("#s_time").val();
    if(!timeParam){
        alert("请选择日期。");
        return false;
    }
    return true;
}

function queryResult(id){
    if($("#prev_text"+id).val()){
        alert($("#prev_text"+id).val());
    }else{
        alert("该条记录未被修改过。");
    }
}

function check_submit(){
    if($("#qishu").val()==""){
        alert("请填写开奖期数");
        $("#qishu").focus();
        return false;
    }
    if($("#datetime").val()==""){
        alert("请填写开奖时间");
        $("#datetime").focus();
        return false;
    }
    if($("#ball_1").val()==""){
        alert("请选择第一球开奖号码");
        $("#ball_1").focus();
        return false;
    }
    if($("#ball_2").val()==""){
        alert("请选择第二球开奖号码");
        $("#ball_2").focus();
        return false;
    }
    if($("#ball_3").val()==""){
        alert("请选择第三球开奖号码");
        $("#ball_3").focus();
        return false;
    }
    if($("#ball_4").val()==""){
        alert("请选择第四球开奖号码");
        $("#ball_4").focus();
        return false;
    }
    if($("#ball_5").val()==""){
        alert("请选择第五球开奖号码");
        $("#ball_5").focus();
        return false;
    }
    if($("#ball_6").val()==""){
        alert("请选择第六球开奖号码");
        $("#ball_6").focus();
        return false;
    }
    if($("#ball_7").val()==""){
        alert("请选择第七球开奖号码");
        $("#ball_7").focus();
        return false;
    }
    if($("#ball_8").val()==""){
        alert("请选择第八球开奖号码");
        $("#ball_8").focus();
        return false;
    }
    if($("#ball_9").val()==""){
        alert("请选择第九球开奖号码");
        $("#ball_9").focus();
        return false;
    }
    if($("#ball_10").val()==""){
        alert("请选择第十球开奖号码");
        $("#ball_10").focus();
        return false;
    }
    if($("#ball_11").val()==""){
        alert("请选择第十一球开奖号码");
        $("#ball_11").focus();
        return false;
    }
    if($("#ball_12").val()==""){
        alert("请选择第十二球开奖号码");
        $("#ball_12").focus();
        return false;
    }
    if($("#ball_13").val()==""){
        alert("请选择第十三球开奖号码");
        $("#ball_13").focus();
        return false;
    }
    if($("#ball_14").val()==""){
        alert("请选择第十四球开奖号码");
        $("#ball_14").focus();
        return false;
    }
    if($("#ball_15").val()==""){
        alert("请选择第十五球开奖号码");
        $("#ball_15").focus();
        return false;
    }
    if($("#ball_16").val()==""){
        alert("请选择第十六球开奖号码");
        $("#ball_16").focus();
        return false;
    }
    if($("#ball_17").val()==""){
        alert("请选择第十七球开奖号码");
        $("#ball_17").focus();
        return false;
    }
    if($("#ball_18").val()==""){
        alert("请选择第十八球开奖号码");
        $("#ball_18").focus();
        return false;
    }
    if($("#ball_19").val()==""){
        alert("请选择第十九球开奖号码");
        $("#ball_19").focus();
        return false;
    }
    if($("#ball_20").val()==""){
        alert("请选择第二十球开奖号码");
        $("#ball_20").focus();
        return false;
    }
    return true;
}
