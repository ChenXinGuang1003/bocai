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
        alert("请选择特别号开奖号码");
        $("#ball_5").focus();
        return false;
    }
    if($.inArray($("#ball_1").val(),[$("#ball_2").val(),$("#ball_3").val(),$("#ball_4").val(),$("#ball_5").val()]) != -1){
        alert("开奖号码不能重复。");
        return false;
    }
    if($.inArray($("#ball_2").val(),[$("#ball_1").val(),$("#ball_3").val(),$("#ball_4").val(),$("#ball_5").val()]) != -1){
        alert("开奖号码不能重复。");
        return false;
    }
    if($.inArray($("#ball_3").val(),[$("#ball_1").val(),$("#ball_2").val(),$("#ball_4").val(),$("#ball_5").val()]) != -1){
        alert("开奖号码不能重复。");
        return false;
    }
    if($.inArray($("#ball_4").val(),[$("#ball_2").val(),$("#ball_3").val(),$("#ball_1").val(),$("#ball_5").val()]) != -1){
        alert("开奖号码不能重复。");
        return false;
    }
    if($.inArray($("#ball_5").val(),[$("#ball_2").val(),$("#ball_3").val(),$("#ball_4").val(),$("#ball_1").val()]) != -1){
        alert("开奖号码不能重复。");
        return false;
    }
    return true;
}
