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
    if($("#kaipan_time").val()==""){
        alert("请填写开盘时间");
        $("#kaipan_time").focus();
        return false;
    }
    if($("#fenpan_time").val()==""){
        alert("请填写封盘时间");
        $("#fenpan_time").focus();
        return false;
    }
    if($("#kaijiang_time").val()==""){
        alert("请填写开奖时间");
        $("#kaijiang_time").focus();
        return false;
    }
    return true;
}
