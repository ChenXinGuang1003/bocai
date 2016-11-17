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
        alert("请选择冠军车号");
        $("#ball_1").focus();
        return false;
    }
    if($("#ball_2").val()==""){
        alert("请选择亚军车号");
        $("#ball_2").focus();
        return false;
    }
    if($("#ball_3").val()==""){
        alert("请选择第三名车号");
        $("#ball_3").focus();
        return false;
    }
    if($("#ball_4").val()==""){
        alert("请选择第四名车号");
        $("#ball_4").focus();
        return false;
    }
    if($("#ball_5").val()==""){
        alert("请选择第五名车号");
        $("#ball_5").focus();
        return false;
    }
    if($("#ball_6").val()==""){
        alert("请选择第六名车号");
        $("#ball_6").focus();
        return false;
    }
    if($("#ball_7").val()==""){
        alert("请选择第七名车号");
        $("#ball_7").focus();
        return false;
    }
    if($("#ball_8").val()==""){
        alert("请选择第八名车号");
        $("#ball_8").focus();
        return false;
    }
    if($("#ball_9").val()==""){
        alert("请选择第九名车号");
        $("#ball_9").focus();
        return false;
    }
    if($("#ball_10").val()==""){
        alert("请选择第十名车号");
        $("#ball_10").focus();
        return false;
    }
    return true;
}
