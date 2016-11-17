function saveOdds(){
    if($(".active").html()=="其他"){
        saveOtherOdds();
    }else if($(".active").html()=="选号"){
        saveMultiChooseOdds();
    }

    function saveOtherOdds(){
        $.ajax({
            type: "POST",
            url: "../lottery/oddssetting/BJKN/save/saveOtherOdds.php",
            data: {
                ball_1: [$("#ball_1-h1").val(),$("#ball_1-h2").val(),$("#ball_1-h3").val(),$("#ball_1-h4").val(),$("#ball_1-h5").val(),
                    $("#ball_1-h6").val(),$("#ball_1-h7").val(),$("#ball_1-h8").val(),$("#ball_1-h9").val(),$("#ball_1-h10").val(),
                    $("#ball_1-h11").val(),$("#ball_1-h12").val(),$("#ball_1-h13").val(),$("#ball_1-h14").val(),$("#ball_1-h15").val(),
                    $("#ball_1-h16").val(),$("#ball_1-h17").val(),$("#ball_1-h18").val(),$("#ball_1-h19").val(),$("#ball_1-h20").val()
                ]
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }
    
    function saveMultiChooseOdds(){
        $.ajax({
            type: "POST",
            url: "../lottery/oddssetting/BJKN/save/saveMultiChooseOdds.php",
            data: {
                ball_1: [$("#multi-choose-ball_1-h1").val(),$("#multi-choose-ball_1-h2").val(),$("#multi-choose-ball_1-h3").val(),$("#multi-choose-ball_1-h4").val(),$("#multi-choose-ball_1-h5").val(),
                    $("#multi-choose-ball_1-h6").val(),$("#multi-choose-ball_1-h7").val(),$("#multi-choose-ball_1-h8").val(),$("#multi-choose-ball_1-h9").val(),$("#multi-choose-ball_1-h10").val()
                ]
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }
}