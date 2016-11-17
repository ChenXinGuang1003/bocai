function queryResult_lhc(id){
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
        alert("请选择正码一开奖号码");
        $("#ball_1").focus();
        return false;
    }
    if($("#ball_2").val()==""){
        alert("请选择正码二开奖号码");
        $("#ball_2").focus();
        return false;
    }
    if($("#ball_3").val()==""){
        alert("请选择正码三开奖号码");
        $("#ball_3").focus();
        return false;
    }
    if($("#ball_4").val()==""){
        alert("请选择正码四开奖号码");
        $("#ball_4").focus();
        return false;
    }
    if($("#ball_5").val()==""){
        alert("请选择第五球开奖号码");
        $("#ball_5").focus();
        return false;
    }
    if($("#ball_6").val()==""){
        alert("请选择正码六开奖号码");
        $("#ball_6").focus();
        return false;
    }
    if($("#ball_7").val()==""){
        alert("请选择特别号开奖号码");
        $("#ball_7").focus();
        return false;
    }
    return true;
}
