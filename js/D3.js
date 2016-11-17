var aHead = new Array();
var aMid = new Array();
var aEnd = new Array();

function SetHead( obj, he){
    var formname = obj.form;
    var num = obj.value;
    if( obj.x == 1 ){
        obj.x = 0;
        obj.style.color = '';
        var sHead = aHead.join('');
        aHead = ( sHead.replace(num,'') ).split('');
    }else{
        obj.x = 1;
        obj.style.color = 'red';
        if( $.inArray( num ,aHead ) == -1 ){
            aHead.push( num );
        }
    }
    var chk = document.getElementsByTagName("input");
    var iChkMax = chk.length;
    for( i=0; i< iChkMax; i++ ){
        var oo = chk[i];
        if (oo.name == 'concede[]'){
            var bHead = false;
            var bMid = false;
            var bEnd = false;
            if ($.inArray(oo.value.substr(he, 1), aHead) >= 0 || (aHead.length == 0 && (aMid.length != 0 || aEnd.length != 0))) {
                bHead = true;
            }
            if ($.inArray(oo.value.substr(he + 1, 1), aMid) >= 0 || (aMid.length == 0 && (aHead.length != 0 || aEnd.length != 0))) {
                bMid = true;
            }
            if ($.inArray(oo.value.substr(he + 2, 1), aEnd) >= 0 || (aEnd.length == 0 && (aHead.length != 0 || aMid.length != 0))) {
                bEnd = true;
            }
            oo.checked = (bHead && bMid && bEnd);
        }
        if( oo.type == 'checkbox' && oo.checked ){
            oo.parentNode.style.backgroundColor = 'yellow';
        }else if( oo.type == 'checkbox' && !oo.checked ){
            oo.parentNode.style.backgroundColor = '';
        }
    }
    checknum( formname, num, "1", "D3" );
}
function SetGS( obj ){
    var formname = obj.form;
    var num = obj.value;
    if( obj.x == 1 ){
         obj.x = 0;
        obj.style.color = '';
        var sHead = aHead.join('');
        aHead = ( sHead.replace(num,'') ).split('');
    }else{
        obj.x = 1;
        obj.style.color = 'red';
        if( $.inArray( num ,aHead ) == -1 ){
            aHead.push( num );
        }
    }
    $("input[type=checkbox][name='concede[]']",formname).attr('checked',false).filter(function(i){
        return ( ( $.inArray(this.value.substr(2,1) ,aHead ) >= 0 ) && ( $.inArray(this.value.substr(3,1) ,aHead ) >= 0 ) && ( $.inArray(this.value.substr(4,1) ,aHead ) >= 0 )  );
    }).attr("checked",true);
    var chk = document.getElementsByTagName("input");
    var iChkMax = chk.length;
    for( i=0; i< iChkMax; i++ ){
        var oo = chk[i];
        if( oo.type == 'checkbox' && oo.checked ){
            oo.parentNode.style.backgroundColor = 'yellow';
        }else if( oo.type == 'checkbox' && !oo.checked ){
            oo.parentNode.style.backgroundColor = '';
        }
    }
    checknum( formname, num, "1", "D1" );
}
function SetMid(obj, he){
    var formname = obj.form;
    var num = obj.value;
    if( obj.x == 1 ){
        obj.x = 0;
        obj.style.color = '';
        var sMid = aMid.join('');
        aMid = ( sMid.replace(num,'') ).split('');
    }else{
        obj.x = 1;
        obj.style.color = 'red';
        if( $.inArray( num ,aMid ) == -1 ){
            aMid.push( num );
        }
    }
    var chk = document.getElementsByTagName("input");
    var iChkMax = chk.length;
    for( i=0; i< iChkMax; i++ ){
        var oo = chk[i];
        if (oo.name == 'concede[]'){
            var bHead = false;
            var bMid = false;
            var bEnd = false;
            if ($.inArray(oo.value.substr(he, 1), aHead) >= 0 || (aHead.length == 0 && (aMid.length != 0 || aEnd.length != 0))) {
                bHead = true;
            }
            if ($.inArray(oo.value.substr(he + 1, 1), aMid) >= 0 || (aMid.length == 0 && (aHead.length != 0 || aEnd.length != 0))) {
                bMid = true;
            }
            if ($.inArray(oo.value.substr(he + 2, 1), aEnd) >= 0 || (aEnd.length == 0 && (aHead.length != 0 || aMid.length != 0))) {
                bEnd = true;
            }
            oo.checked = (bHead && bMid && bEnd);
        }
        if( oo.type == 'checkbox' && oo.checked ){
            oo.parentNode.style.backgroundColor = 'yellow';
        }else if( oo.type == 'checkbox' && !oo.checked ){
            oo.parentNode.style.backgroundColor = '';
        }
    }
    checknum( formname, num, "2", "D3" );
}
function OverTD(o){
    o.style.backgroundColor = 'yellow';
}
function OutTD(o){
    if( $(o).children("input:eq(0)").attr("checked")  ){
    
    }else{
        o.style.backgroundColor = '';
    }
}
function ClkTD(o){
    /*
    if( $(o).children("input:eq(0)").attr("checked")  ){
        $(o).children("input").attr("checked",false);
        checkbox_total($(o).children("input:eq(0)"));
    }else{
        $(o).children("input").attr("checked",true);
        checkbox_total($(o).children("input:eq(0)"));
    }
    */
}
function SetEnd(obj, he){
    var formname = obj.form;
    var num = obj.value;
    if( obj.x == 1 ){
        obj.x = 0;
        obj.style.color = '';
        var sEnd = aEnd.join('');
        aEnd = ( sEnd.replace(num,'') ).split('');
    }else{
        obj.x = 1;
        obj.style.color = 'red';
        if( $.inArray( num ,aEnd ) == -1 ){
            aEnd.push( num );
        }
    }

    var chk = document.getElementsByTagName("input");
    var iChkMax = chk.length;
    for( i=0; i< iChkMax; i++ ){
        var oo = chk[i];
        if (oo.name == 'concede[]'){
            var bHead = false;
            var bMid = false;
            var bEnd = false;
            if ($.inArray(oo.value.substr(he, 1), aHead) >= 0 || (aHead.length == 0 && (aMid.length != 0 || aEnd.length != 0))) {
                bHead = true;
            }
            if ($.inArray(oo.value.substr(he + 1, 1), aMid) >= 0 || (aMid.length == 0 && (aHead.length != 0 || aEnd.length != 0))) {
                bMid = true;
            }
            if ($.inArray(oo.value.substr(he + 2, 1), aEnd) >= 0 || (aEnd.length == 0 && (aHead.length != 0 || aMid.length != 0))) {
                bEnd = true;
            }
            oo.checked = (bHead && bMid && bEnd);
        }
        if( oo.type == 'checkbox' && oo.checked ){
            oo.parentNode.style.backgroundColor = 'yellow';
        }else if( oo.type == 'checkbox' && !oo.checked ){
            oo.parentNode.style.backgroundColor = '';
        }
    }
    checknum( formname, num, "3", "D3" );
}
function set_radio_head(obj, he) {
    var formname = obj.form;
    var num = obj.value;
    if( obj.x == 1 ){
        obj.x = 0;
        obj.style.color = '';
        aHead = aHead.join('').replace(num,'').split('');
    }else{
        obj.x = 1;
        obj.style.color = 'red';
        if( $.inArray( num ,aHead ) == -1 ){
            aHead.push( num );
        }
    }
    var bHead, bEnd;
    $("input[type=checkbox][name*=concede]",formname).attr('checked',false).filter(function(i){
        bHead = false;
        bEnd = false;
        if( $.inArray(this.value.substr(he,1) ,aHead) >= 0 | (aHead.length == 0 && aEnd.length != 0) ){
            bHead = true;
        }
        if( $.inArray(this.value.substr(he+1,1),aEnd) >= 0 | (aEnd.length == 0 && aHead.length != 0 ) ){
            bEnd = true;
        } 
        return (bHead && bEnd);
    }).attr("checked",true);
    $("input[type=checkbox][name*=concede]",formname).filter(function(){return this.checked}).parent("td").css("background-color",'yellow');
    $("input[type=checkbox][name*=concede]",formname).filter(function(){return !this.checked}).parent("td").css("background-color",'');
    checknum( formname, num, "1", "D2" );
}
function set_radio_end(obj, he ) {
    var formname = obj.form;
    var num = obj.value;
    if( obj.x == 1 ){
        obj.x = 0;
        obj.style.color = '';
        aEnd = aEnd.join('').replace(num,'').split('');
    }else{
        obj.x = 1;
        obj.style.color = 'red';
        if( $.inArray( num ,aEnd ) == -1 ){
            aEnd.push( num );
        }
    }
    var bHead, bEnd;
    $("input[type=checkbox][name*=concede]",formname).attr('checked',false).filter(function(i){
        bHead = false;
        bEnd = false;
        if( $.inArray(this.value.substr(he,1) ,aHead) >= 0 || (aHead.length == 0 && aEnd.length != 0) ){
            bHead = true;
        }
        if( $.inArray(this.value.substr(he + 1,1),aEnd) >= 0  || (aEnd.length == 0 && aHead.length != 0 )){
            bEnd = true;
        }
        return (bHead && bEnd);
    }).attr("checked",true);
    $("input[type=checkbox][name*=concede]",formname).filter(function(){return this.checked}).parent("td").css("background-color",'yellow');
    $("input[type=checkbox][name*=concede]",formname).filter(function(){return !this.checked}).parent("td").css("background-color",'');
    checknum( formname, num, "3", "D2" );
}

function getrandom(len){
    var seed = new Array('9876543210','1928374650','0123456789');
    var idx,i;
    var result = '';
    for (i=0; i<len; i++){
        idx = Math.floor(Math.random()*3);
        result += seed[idx].substr(Math.floor(Math.random()*(seed[idx].length)), 1);
    }
    return result;
}

function putAll(){
    $("input[@name='bet_gold[]']:text").val($("input[@name=qk_gold]:text").val());
}

function getNumAsm(Num){
    Num = Num +"";
    var intChkDbl = 0 ;
    var intChkCnt = 1 ;
    var intChkDblCnt = 1 ;
    for( Asm_i = Num.length ; Asm_i > 0 ; Asm_i-- ){
        intChkCnt *= Asm_i;
    }
    for( Asm_i = 1 ; Asm_i <= Num.length ; Asm_i++ ){
      for( Asm_j = Num.length ; Asm_j >0 ; Asm_j-- ){
          if(Asm_i != Asm_j){
              if(Num.substr(Asm_i-1,1) == Num.substr(Asm_j-1,1)){
                 intChkDbl++; 
              }
          }
      }
    }
    if( intChkDbl < 1){intChkDbl = 1;}
    if( intChkDbl == (Num.length*(Num.length-1)) ){
        return 1;
    }else{
        return (intChkCnt/intChkDbl);
    }
}

function ClearOdds(){
    $("td.odds").text('');
    $("input[name='bet_num[]']").css("background-color",'#ffffff').css("border",'1px solid black');
}

function randomNum(s){
  $.ajax({
        url:'odds2_action.php',
        type: 'POST',
        dataType: 'json',
        timeout: 5000,
        data:"rtype=Random&gid="+$("#gid").val()+"&sRow="+$("input[@name^=bet_num]").length,
        success: function(res){
          if(res[0] == 'N'){
  $("input[@name^=bet_num]").each(function(i){
              this.value = res[1][i];
      this.style.border = "0px";
      this.style.backgroundColor="#d5e2e3";
  });
  GetOddsAll();
          }else{
            alert(Lang('MSG_Wix3_ClosedBy_SinglePlay'));
           $("input[@name^=bet_num]").each(function(i){
              this.value = '';
                  this.style.border = "";
              this.style.backgroundColor="#ffffff";
           });
            $("input[@name^=bet_num]").each(function(i){
                    $("td.odds:eq("+i+")").html("&nbsp;");
                }).css("background-color","#ffffff").css("border","1px solid black");
          }
       }
  });
}

function randomNumH(s){
  $.ajax({
        url:'odds3_action.php',
        type: 'POST',
        dataType: 'json',
        timeout: 5000,
        data:"rtype=Random&gid="+$("#gid").val()+"&sRow="+$("input[@name^=bet_num]").length,
        success: function(res){
          if(res[0] == 'N'){
              $("input[@name^=bet_num]").each(function(i){
                  this.value = res[1][i];
                  this.style.border = "0px";
                  this.style.backgroundColor="#d5e2e3";
              });
              GetOddsAllH();
          }else{
            alert(Lang('MSG_Wix3_ClosedBy_SinglePlay'));
           $("input[@name^=bet_num]").each(function(i){
              this.value = '';
              this.style.border = "";
              this.style.backgroundColor="#ffffff";
           });
            $("input[@name^=bet_num]").each(function(i){
                    $("td.odds:eq("+i+")").html("&nbsp;");
                }).css("background-color","#ffffff").css("border","1px solid black");
          }
       }
  });
}
function GetOddsAllH(){
    var strNum = "";
    $("input[@name^=bet_num]:text").each(function(i){
        strNum += "&num[]="+this.value;
    });
    $.ajax({
        url:'odds3_action.php',
        type: 'POST',
        dataType: 'json',
        timeout: 5000,
        data:"rtype=D3MCU&gid="+$("#gid").val()+strNum,
        success: function(res){
            $("input[@name^=bet_num]").each(function(i){
                if( $(this).val().length == 3 ){
                    $("td.odds:eq("+i+")").html(res["No"+i]);
                }else{
                    $("td.odds:eq("+i+")").html("&nbsp;");
                }
            });
        }
    });
}
function GetOddsAll(){
    var strNum = "";
    $("input[@name^=bet_num]:text").each(function(i){
        strNum += "&num[]="+this.value;
    });
    $.ajax({
        url:'odds2_action.php',
        type: 'POST',
        dataType: 'json',
        timeout: 5000,
        data:"rtype=D3MCU&gid="+$("#gid").val()+strNum,
        success: function(res){
            $("input[@name^=bet_num]").each(function(i){
                if( $(this).val().length == 3 ){
                    $("td.odds:eq("+i+")").html(res["No"+i]);
                }else{
                    $("td.odds:eq("+i+")").html("&nbsp;");
                }
            });
        }
    });
}

function ShowBorder(k){
    $("input[@name='bet_num[]']:eq("+k+")").css("background-color","#ffffff").css("border","1px solid black");
}

function NoBorderH(k){
    var str = $("input[@name='bet_num[]']:eq("+k+")").val();
    if(str.length == 3){
        $("input[@name='bet_num[]']:eq("+k+")").css("background-color","#d5e2e3").css("border","0px");
        $.ajax({
            url:'oddsH3_action.php',
            type: 'GET',
            dataType: 'json',
            timeout: 5000,
            data:"rtype=D3MCU&num="+str+"&gid="+$("#gid").val(),
            success: function(res){
                $("td.odds:eq("+k+")").text(res.odds);
            }
        });
    }else{
        $("input[@name='bet_num[]']:eq("+k+")").css("background-color","#ffffff").css("border","1px solid black");
        $("td.odds:eq("+k+")").html("&nbsp;");
    }
}

function NoBorder(k){
    var str = $("input[@name='bet_num[]']:eq("+k+")").val();
    if(str.length == 3){
        $("input[@name='bet_num[]']:eq("+k+")").css("background-color","#d5e2e3").css("border","0px");
        $.ajax({
            url:'odds_action.php',
            type: 'GET',
            dataType: 'json',
            timeout: 5000,
            data:"rtype=D3MCU&num="+str+"&gid="+$("#gid").val(),
            success: function(res){
                $("td.odds:eq("+k+")").text(res.odds);
            }
        });
    }else{
        $("input[@name='bet_num[]']:eq("+k+")").css("background-color","#ffffff").css("border","1px solid black");
        $("td.odds:eq("+k+")").html("&nbsp;");
    }
}

function radio_total(obj){
    var RadioName = obj.name;
    var RadioForm = obj.form;
    for( var i=0; i< RadioForm[RadioName].length; i++ ){
        if(RadioForm[RadioName][i].checked){
            $(RadioForm[RadioName][i]).parent("td").css('background-color','yellow');
        }else{
            $(RadioForm[RadioName][i]).parent("td").css('background-color','');
        }
    }
}


function show_array(shownum){
    return shownum.sort().join(',');
}
//棄用由 startBallRandom 取代
function proBallRandom(){
    var i;
    if( $("#num").text() != '' ){
        for( i = iResultCount; i <= 5; i++ ){
            var iShow = Math.ceil(Math.random()*10%10);
            if( iShow == 10 ){ iShow = "0"; }
            $("#final_0"+i).text(iShow);
        }
    }
}
(function(){
    var timer = null, 
        final_cols = null,
        _num_col = null;
    _test = function(){
        console.log(timer, final_cols, _num_col);
    };
    startBallRandom = function(num_col)
    {
        if (num_col && num_col.length)
        {
            _num_col = num_col; 
            final_cols = final_cols || num_col.parent().find('td').slice(1);
            ! timer && (timer = setInterval(function(){
                run(final_cols);
            }, 100));
        }
        return timer;
    }
    stopBallRandom = function()
    {
        timer && (timer = clearInterval(timer));
        _num_col = null;
        final_cols = null;
        return timer;
    }
    function run(cols)
    {
        if (_num_col.text().match(/^[-_\d]+$/))
        {
            for( i = 0, L=cols.length; i < L; i++ ){
                var iShow = Math.ceil(Math.random()*10%10);
                if( iShow == 10 ){ iShow = "0"; }
                cols[i].innerHTML = iShow;
            }
        }
    }
})();

function showCountdown(){
    
    if( self.game_status && self.game_status.isCancel )
    {
        $('#FCDL').hide();
    }
    else
    {
        $('#FCDL').show();
    }

}
function Countdown(){
    if (self.game_status && self.game_status.isCancel)
    {
        $('#Game').html('<div class="game_is_cancel">'+Lang('game_canceled')+'('+self.game_status.iNum+')</div>');
        return;
    }
    iRefresh --;
    var _FCDS = $('#FCDS').text() -1;
    var d = Math.floor(_FCDS / (24 * 3600));
    var h = Math.floor((_FCDS % (24*3600))/3600);
    var m = Math.floor((_FCDS % 3600)/(60));
    var s = Math.floor(_FCDS % 60);
 
    if( _FCDS > 0 ){
	var His = "";
        His += (h+(d*24) < 10)?"0"+(h+(d*24))+":":(h+(d*24))+ ":";
	His += (m < 10)?"0"+m+":":m+":";
	His += (s < 10)?"0"+s:s;
        $('#FCDS').text(_FCDS);
	$('#FCDH').text(His);
    }else{
        $('#FCDL').hide();
        $('#FCDS').text(_FCDS);
	$('#FCDH').text("00:00:00");
    }
    if( _FCDS < 0 ){
        $('#Game form').hide();
        if ($('#sGtype').val() == 'BT' && parent.header.$.cookie('bbinwin') == 'true' && $.trim($('#YearNum').html()) != '') {
            parent.header.BBINWIN.bbwin_triger();
        }
    }else{
        $('#Game form').show();
    }
}
function ResultGO( idx, obj ){
    $('div#tab ul li.onTagClick').removeClass('onTagClick').addClass('unTagClick');
    $(obj.parentNode).addClass('onTagClick');
    $('#Result1,#Result2').hide();
    $('#Result'+idx).show();
}

//function ResultQ(idx){
//    $("#Q0,#Q1").attr('class','unTagClick');
//    $('#Q'+idx).attr('class','onTagClick');
//    $('#Result0,#Result1').hide();
//    $('#Result'+idx).show();
//}

//兩面包組
function Packge( obj, sType ){
    var formname = obj.form;
    var aType = {'ODD':[1,3,5,7,9], 'EVEN':[0,2,4,6,8,10], 'OVER':[5,6,7,8,9], 'UNDER':[0,1,2,3,4], 'PRIME':[1,2,3,5,7], 'COMPO':[0,4,6,8,9]};
    
    
    $("input[type=checkbox][name='concede[]']",formname).attr('checked',false).filter(function(i){
        return ( $.inArray( i , aType[sType] ) >= 0 );
    }).attr("checked",true);
    var chk = document.getElementsByTagName("input");
    var iChkMax = chk.length;
    for( i=0; i< iChkMax; i++ ){
        var oo = chk[i];
        if( oo.type == 'checkbox' ){
            checkbox_total(oo);
        }
    }
    //checknum( formname, num, "0", "D1" );
}
function getReload(){
   // window.navigate(location);
   self.location.reload();
}
function ReloadFinal(ball_type){
    if (ball_type == 'B5') {
        var TagName = [
            [
                ["num","final_01","final_02","final_03","final_04","final_05"],
                ["WOE","GOE","MOE","COE","UOE"],
                ["WOU","GOU","MOU","COU","UOU"],
                ["WPC","GPC","MPC","CPC","UPC"]
            ],
            [
                ["num","MCS","MUS","CUS","MCUS"],
                ["MCOE","MUOE","CUOE","MCUOE"],
                ["MCOU","MUOU","CUOU","MCUOU"],
                ["MCPC","MUPC","CUPC","MCUPC"]
            ]
        ];
    } else {
        var TagName = [
            [
                ["num","final_01","final_02","final_03"],
                ["MOE","COE","UOE"],
                ["MOU","COU","UOU"],
                ["MPC","CPC","UPC"]
            ],
            [
                ["num","MCS","MUS","CUS","MCUS"],
                ["MCOE","MUOE","CUOE","MCUOE"],
                ["MCOU","MUOU","CUOU","MCUOU"],
                ["MCPC","MUPC","CUPC","MCUPC"]
            ]
        ];
    } 
    
    var row_of_cancel_1 = $("#Result1 tr.row_of_cancel"),
        row_of_result_1 = $("#Result1 tr.row_of_result");
        if (ball_type=='B5')
        {
            var row_of_cancel_2 = row_of_result_2 = null;
        }
        else
        {
            var row_of_cancel_2 = $("#Result2 tr.row_of_cancel"),
            row_of_result_2 = $("#Result2 tr.row_of_result");
        }


    for(var i = 0 ; i < aFinal.length ; i++){
        for(var j = 0 ; j < 4 ; j++){
            var _num = j+(i*4),
                _row_result_1 = $(row_of_result_1[_num]),
                _row_cancel_1 = $(row_of_cancel_1[_num]),
                _row_result_2 = row_of_result_2? $(row_of_result_2[_num]): null,
                _row_cancel_2 = row_of_cancel_2? $(row_of_cancel_2[_num]):null
                ;

            if (aFinal[i]['isCancel']) 
            {
                _row_cancel_1.show();
                _row_cancel_2 && _row_cancel_2.show();
                _row_result_1.hide();
                _row_result_2 && _row_result_2.hide();
            }
            else
            {
                _row_cancel_1.hide();
                _row_cancel_2 && _row_cancel_2.hide();
                _row_result_1.show();
                _row_result_2 && _row_result_2.show();
            }
            
            $('#Result1 tr[row='+(i+1)+'] td.num_col').text(aFinal[i]['num']);
            $('#Result2 tr[row='+(i+1)+'] td.num_col').text(aFinal[i]['num']);
            
            setResult1(_row_result_1.find('td'), aFinal[i], TagName[0][j]);
            _row_result_2 && setResult2(_row_result_2.find('td'), aFinal[i], TagName[1][j]);
        }
    }
}
function setResult1(cols,Final,Tag){
    for(var i = 0 ; i < cols.length ; i++){
        cols.get(i).innerHTML = Final[Tag[i]];
    }
}
function setResult2(cols,Final,Tag){
    for(var i = 0 ; i < cols.length ; i++){
        if( Final[Tag[i]] == '' ){
            Final[Tag[i]] = '0';
        }
        cols.get(i).innerHTML = Final[Tag[i]];
    }
}
