function confirmChangeMoney(){
        if(confirm("确定转账吗?")){
            if(!$("#zz_money").val()){
                alert("请输入转账金额");
                return;
            }
            var regu = /^[-]{0,1}[0-9]{1,}$/;
            if(!regu.test($("#zz_money").val())){
                alert('请输入整数');
                return;
            }
            //获取php变量 
            var min=parseInt($('#min_money').text());
            if( ($("#zz_money").val()<min)){
                alert("小于最低转账金额，请重新输入。");
                return;
            }

            if(($("#zz_type").val()==1 || $("#zz_type").val()==7) && ($("#MBallCredit").text()-$("#zz_money").val()<0)){
                alert("主账户余额 小于 转账金额，请重新输入");
                return;
            }
            
            //-------0406---------------------------------
            if($("#zz_type").val()==1){
                $("#agframe")[0].contentWindow.bb_change($("#zz_money").val(),1);
                setTimeout('ALL_money()','1000');
                setTimeout('AG_money()','2000');
                $('#zz_money').val('');
                return;
            }
            if($("#zz_type").val()==2){
                $("#agframe")[0].contentWindow.bb_change($("#zz_money").val(),0);
                setTimeout('ALL_money()','1000');
                setTimeout('AG_money()','2000');
                $('#zz_money').val('');
                return;
            }
			
			if($("#zz_type").val()==7){
				$("#bbframe")[0].contentWindow.bb_change($("#zz_money").val(),1);
                setTimeout('ALL_money()','1000');
                setTimeout('BB_money()','2000');
                $('#zz_money').val('');
				return;
			}
			if($("#zz_type").val()==8){
				$("#bbframe")[0].contentWindow.bb_change($("#zz_money").val(),0);
                setTimeout('ALL_money()','1000');
                setTimeout('BB_money()','2000');
                $('#zz_money').val('');
				return;
			}
            //---------0409------------------------------
            $.ajax({
                type: "POST",
                url: "/cl/pages/money_change_ajax.php",
                data: {
                    change_money: $("#zz_money").val(),
                    change_type: $("#zz_type").val()
                }
            }).done(function( msg ) {
                    if(msg=="不允许转账到真人，请联系客服。"
                        || msg=="您尚未加入真人娱乐场,加入条件为:\n充值金额大于100,系统便会自动将您加入真人娱乐场"
                        || msg=="小于最低转账金额，请重新输入。"
                        ){
                        alert(msg);
                        return;
                    }
                    f_com.MChgPager({method: 'liveHistory'});
                }).fail(function(error){
                    alert(error.responseText);
                });
        }
    }
   
    //------------------

    function AG_money(){
        $.get("/newag2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#MSunplusCredit").html(data.general);
        });
    }
    function ALL_money(){
        $.getJSON("/app/member/getdata.php?callback=?",function (json){
            if (json.close == 1) {
                parent.location.href = '/close.php';
            }
            $("#MBallCredit").html(json.user_money);
        });
    }
    function BB_money(){
        $.get("/newbbin2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general").html(data.general);
        });
    }
    function fr_bbmoney(){
        var dom=$("#bbframe")[0].contentWindow.document;
        var aa=dom.getElementById('general').innerHTML;
        $('#general').text(aa);
    }
    function loadmoney(){
        BB_money();
        AG_money();
        ALL_money();
    }
    $(document).ready(function(){
        setTimeout('loadmoney();',1000); 
    });
