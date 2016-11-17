function saveOdds(){
    if($(".active").html()=="正码特"){
        saveNumberOdds();
    }else if($(".active").html()=="总和 龙虎和"){
        saveSpecialOdds();
    }else if($(".active").html()=="顺子 杂六"){
        saveSeasonsOdds();
    }else if($(".active").html()=="一中一"){
        saveChooseOdds();
    }


    function saveSpecialOdds(){
        $.ajax({
            type: "POST",
            url: "../lottery/oddssetting/GD11/save/saveTigerOdds.php",
            data: {
                ball_1: [$("#tiger-ball_1-h1").val(),$("#tiger-ball_1-h2").val(),$("#tiger-ball_1-h3").val(),$("#tiger-ball_1-h4").val(),$("#tiger-ball_1-h5").val(),
                    $("#tiger-ball_1-h6").val(),$("#tiger-ball_1-h7").val()
                ]
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }

    function saveNumberOdds(){
        $.ajax({
            type: "POST",
            url: "../lottery/oddssetting/GD11/save/saveNumberOdds.php",
            data: {
                ball_1: [$("#number-ball_1-h1").val(),$("#number-ball_1-h2").val(),$("#number-ball_1-h3").val(),$("#number-ball_1-h4").val(),$("#number-ball_1-h5").val(),
                            $("#number-ball_1-h6").val(),$("#number-ball_1-h7").val(),$("#number-ball_1-h8").val(),$("#number-ball_1-h9").val(),$("#number-ball_1-h10").val(),
                            $("#number-ball_1-h11").val(),$("#number-ball_1-h12").val(),$("#number-ball_1-h13").val(),$("#number-ball_1-h14").val(),$("#number-ball_1-h15").val(),
                            $("#number-ball_1-h16").val(),$("#number-ball_1-h17").val(),$("#number-ball_1-h18").val(),$("#number-ball_1-h19").val()
                ],
                ball_2: [$("#number-ball_2-h1").val(),$("#number-ball_2-h2").val(),$("#number-ball_2-h3").val(),$("#number-ball_2-h4").val(),$("#number-ball_2-h5").val(),
                            $("#number-ball_2-h6").val(),$("#number-ball_2-h7").val(),$("#number-ball_2-h8").val(),$("#number-ball_2-h9").val(),$("#number-ball_2-h10").val(),
                            $("#number-ball_2-h11").val(),$("#number-ball_2-h12").val(),$("#number-ball_2-h13").val(),$("#number-ball_2-h14").val(),$("#number-ball_2-h15").val(),
                            $("#number-ball_2-h16").val(),$("#number-ball_2-h17").val(),$("#number-ball_2-h18").val(),$("#number-ball_2-h19").val()
                ],
                ball_3: [$("#number-ball_3-h1").val(),$("#number-ball_3-h2").val(),$("#number-ball_3-h3").val(),$("#number-ball_3-h4").val(),$("#number-ball_3-h5").val(),
                            $("#number-ball_3-h6").val(),$("#number-ball_3-h7").val(),$("#number-ball_3-h8").val(),$("#number-ball_3-h9").val(),$("#number-ball_3-h10").val(),
                            $("#number-ball_3-h11").val(),$("#number-ball_3-h12").val(),$("#number-ball_3-h13").val(),$("#number-ball_3-h14").val(),$("#number-ball_3-h15").val(),
                            $("#number-ball_3-h16").val(),$("#number-ball_3-h17").val(),$("#number-ball_3-h18").val(),$("#number-ball_3-h19").val()
                ],
                ball_4: [$("#number-ball_4-h1").val(),$("#number-ball_4-h2").val(),$("#number-ball_4-h3").val(),$("#number-ball_4-h4").val(),$("#number-ball_4-h5").val(),
                            $("#number-ball_4-h6").val(),$("#number-ball_4-h7").val(),$("#number-ball_4-h8").val(),$("#number-ball_4-h9").val(),$("#number-ball_4-h10").val(),
                            $("#number-ball_4-h11").val(),$("#number-ball_4-h12").val(),$("#number-ball_4-h13").val(),$("#number-ball_4-h14").val(),$("#number-ball_4-h15").val(),
                            $("#number-ball_4-h16").val(),$("#number-ball_4-h17").val(),$("#number-ball_4-h18").val(),$("#number-ball_4-h19").val()
                ],
                ball_5: [$("#number-ball_5-h1").val(),$("#number-ball_5-h2").val(),$("#number-ball_5-h3").val(),$("#number-ball_5-h4").val(),$("#number-ball_5-h5").val(),
                    $("#number-ball_5-h6").val(),$("#number-ball_5-h7").val(),$("#number-ball_5-h8").val(),$("#number-ball_5-h9").val(),$("#number-ball_5-h10").val(),
                    $("#number-ball_5-h11").val(),$("#number-ball_5-h12").val(),$("#number-ball_5-h13").val(),$("#number-ball_5-h14").val(),$("#number-ball_5-h15").val(),
                    $("#number-ball_5-h16").val(),$("#number-ball_5-h17").val(),$("#number-ball_5-h18").val(),$("#number-ball_5-h19").val()
                ]
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }

    function saveSeasonsOdds(){
        $.ajax({
            type: "POST",
            url: "../lottery/oddssetting/GD11/save/saveSeasonsOdds.php",
            data: {
                ball_1: [$("#shunzi-ball_1-h1").val(),$("#shunzi-ball_1-h2").val(),$("#shunzi-ball_1-h3").val()
                ],
                ball_2: [$("#shunzi-ball_2-h1").val(),$("#shunzi-ball_2-h2").val(),$("#shunzi-ball_2-h3").val()
                ],
                ball_3: [$("#shunzi-ball_3-h1").val(),$("#shunzi-ball_3-h2").val(),$("#shunzi-ball_3-h3").val()
                ]
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }

    function saveChooseOdds(){
        $.ajax({
            type: "POST",
            url: "../lottery/oddssetting/GD11/save/saveChooseOdds.php",
            data: {
                ball_1: [$("#choose-ball_1-h1").val(),$("#choose-ball_1-h2").val(),$("#choose-ball_1-h3").val(),$("#choose-ball_1-h4").val(),$("#choose-ball_1-h5").val(),
                    $("#choose-ball_1-h6").val(),$("#choose-ball_1-h7").val(),$("#choose-ball_1-h8").val(),$("#choose-ball_1-h9").val(),$("#choose-ball_1-h10").val(),
                    $("#choose-ball_1-h11").val()
                ]
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }
}