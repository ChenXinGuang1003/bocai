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
    return true;
}
