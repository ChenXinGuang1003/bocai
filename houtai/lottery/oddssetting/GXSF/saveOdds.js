function saveOdds(){
    if($(".active").html()=="主盘势"){
        saveGeneralOdds();
    }else if($(".active").html()=="特别号"){
        saveSpecialOdds();
    }else if($(".active").html()=="正码特"){
        saveNumberOdds();
    }else if($(".active").html()=="四季五行"){
        saveSeasonsOdds();
    }else if($(".active").html()=="一中一"){
        saveChooseOdds();
    }else if($(".active").html()=="总和/龙虎"){
        saveTigerOdds();
    }else if($(".active").html()=="顺子杂六"){
        saveShunziOdds();
    }

    function saveGeneralOdds(){
        $.ajax({
            type: "POST",
            url: "../lottery/oddssetting/GXSF/save/saveGeneralOdds.php",
            data: {
                ball_1: [$("#ball_1-h1").val(),$("#ball_1-h2").val(),$("#ball_1-h3").val(),$("#ball_1-h4").val(),$("#ball_1-h5").val(),$("#ball_1-h6").val(),$("#ball_1-h7").val(),$("#ball_1-h8").val()],
                ball_2: [$("#ball_2-h1").val(),$("#ball_2-h2").val(),$("#ball_2-h3").val(),$("#ball_2-h4").val(),$("#ball_2-h5").val(),$("#ball_2-h6").val(),$("#ball_2-h7").val(),$("#ball_2-h8").val()],
                ball_3: [$("#ball_3-h1").val(),$("#ball_3-h2").val(),$("#ball_3-h3").val(),$("#ball_3-h4").val(),$("#ball_3-h5").val(),$("#ball_3-h6").val(),$("#ball_3-h7").val(),$("#ball_3-h8").val()],
                ball_4: [$("#ball_4-h1").val(),$("#ball_4-h2").val(),$("#ball_4-h3").val(),$("#ball_4-h4").val(),$("#ball_4-h5").val(),$("#ball_4-h6").val(),$("#ball_4-h7").val(),$("#ball_4-h8").val()],
                ball_5: [$("#ball_5-h1").val(),$("#ball_5-h2").val(),$("#ball_5-h3").val(),$("#ball_5-h4").val(),$("#ball_5-h5").val(),$("#ball_5-h6").val(),$("#ball_5-h7").val(),$("#ball_5-h8").val()]
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }

    function saveSpecialOdds(){
        $.ajax({
            type: "POST",
            url: "../lottery/oddssetting/GXSF/save/saveSpecialOdds.php",
            data: {
                ball_5: [$("#number-ball_5-h1").val(),$("#number-ball_5-h2").val(),$("#number-ball_5-h3").val(),$("#number-ball_5-h4").val(),$("#number-ball_5-h5").val(),
                    $("#number-ball_5-h6").val(),$("#number-ball_5-h7").val(),$("#number-ball_5-h8").val(),$("#number-ball_5-h9").val(),$("#number-ball_5-h10").val(),
                    $("#number-ball_5-h11").val(),$("#number-ball_5-h12").val(),$("#number-ball_5-h13").val(),$("#number-ball_5-h14").val(),$("#number-ball_5-h15").val(),
                    $("#number-ball_5-h16").val(),$("#number-ball_5-h17").val(),$("#number-ball_5-h18").val(),$("#number-ball_5-h19").val(),$("#number-ball_5-h20").val(),
                    $("#number-ball_5-h21").val(),$("#number-ball_5-h22").val(),$("#number-ball_5-h23").val(),$("#number-ball_5-h24").val(),$("#number-ball_5-h25").val(),
                    $("#number-ball_5-h26").val(),$("#number-ball_5-h27").val(),$("#number-ball_5-h28").val(),$("#number-ball_5-h29").val(),$("#number-ball_5-h30").val(),
                    $("#number-ball_5-h31").val(),$("#number-ball_5-h32").val(),$("#number-ball_5-h33").val(),$("#number-ball_5-h34").val(),$("#number-ball_5-h35").val(),
                    $("#number-ball_5-h36").val()
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
            url: "../lottery/oddssetting/GXSF/save/saveNumberOdds.php",
            data: {
                ball_1: [$("#number-ball_1-h1").val(),$("#number-ball_1-h2").val(),$("#number-ball_1-h3").val(),$("#number-ball_1-h4").val(),$("#number-ball_1-h5").val(),
                            $("#number-ball_1-h6").val(),$("#number-ball_1-h7").val(),$("#number-ball_1-h8").val(),$("#number-ball_1-h9").val(),$("#number-ball_1-h10").val(),
                            $("#number-ball_1-h11").val(),$("#number-ball_1-h12").val(),$("#number-ball_1-h13").val(),$("#number-ball_1-h14").val(),$("#number-ball_1-h15").val(),
                            $("#number-ball_1-h16").val(),$("#number-ball_1-h17").val(),$("#number-ball_1-h18").val(),$("#number-ball_1-h19").val(),$("#number-ball_1-h20").val(),
                            $("#number-ball_1-h21").val(),$("#number-ball_1-h22").val(),$("#number-ball_1-h23").val(),$("#number-ball_1-h24").val(),$("#number-ball_1-h25").val(),
                            $("#number-ball_1-h26").val(),$("#number-ball_1-h27").val(),$("#number-ball_1-h28").val(),$("#number-ball_1-h29").val(),$("#number-ball_1-h30").val(),
                            $("#number-ball_1-h31").val(),$("#number-ball_1-h32").val(),$("#number-ball_1-h33").val(),$("#number-ball_1-h34").val(),$("#number-ball_1-h35").val(),
                            $("#number-ball_1-h36").val()
                ],
                ball_2: [$("#number-ball_2-h1").val(),$("#number-ball_2-h2").val(),$("#number-ball_2-h3").val(),$("#number-ball_2-h4").val(),$("#number-ball_2-h5").val(),
                            $("#number-ball_2-h6").val(),$("#number-ball_2-h7").val(),$("#number-ball_2-h8").val(),$("#number-ball_2-h9").val(),$("#number-ball_2-h10").val(),
                            $("#number-ball_2-h11").val(),$("#number-ball_2-h12").val(),$("#number-ball_2-h13").val(),$("#number-ball_2-h14").val(),$("#number-ball_2-h15").val(),
                            $("#number-ball_2-h16").val(),$("#number-ball_2-h17").val(),$("#number-ball_2-h18").val(),$("#number-ball_2-h19").val(),$("#number-ball_2-h20").val(),
                            $("#number-ball_2-h21").val(),$("#number-ball_2-h22").val(),$("#number-ball_2-h23").val(),$("#number-ball_2-h24").val(),$("#number-ball_2-h25").val(),
                            $("#number-ball_2-h26").val(),$("#number-ball_2-h27").val(),$("#number-ball_2-h28").val(),$("#number-ball_2-h29").val(),$("#number-ball_2-h30").val(),
                            $("#number-ball_2-h31").val(),$("#number-ball_2-h32").val(),$("#number-ball_2-h33").val(),$("#number-ball_2-h34").val(),$("#number-ball_2-h35").val(),
                            $("#number-ball_2-h36").val()
                ],
                ball_3: [$("#number-ball_3-h1").val(),$("#number-ball_3-h2").val(),$("#number-ball_3-h3").val(),$("#number-ball_3-h4").val(),$("#number-ball_3-h5").val(),
                            $("#number-ball_3-h6").val(),$("#number-ball_3-h7").val(),$("#number-ball_3-h8").val(),$("#number-ball_3-h9").val(),$("#number-ball_3-h10").val(),
                            $("#number-ball_3-h11").val(),$("#number-ball_3-h12").val(),$("#number-ball_3-h13").val(),$("#number-ball_3-h14").val(),$("#number-ball_3-h15").val(),
                            $("#number-ball_3-h16").val(),$("#number-ball_3-h17").val(),$("#number-ball_3-h18").val(),$("#number-ball_3-h19").val(),$("#number-ball_3-h20").val(),
                            $("#number-ball_3-h21").val(),$("#number-ball_3-h22").val(),$("#number-ball_3-h23").val(),$("#number-ball_3-h24").val(),$("#number-ball_3-h25").val(),
                            $("#number-ball_3-h26").val(),$("#number-ball_3-h27").val(),$("#number-ball_3-h28").val(),$("#number-ball_3-h29").val(),$("#number-ball_3-h30").val(),
                            $("#number-ball_3-h31").val(),$("#number-ball_3-h32").val(),$("#number-ball_3-h33").val(),$("#number-ball_3-h34").val(),$("#number-ball_3-h35").val(),
                            $("#number-ball_3-h36").val()
                ],
                ball_4: [$("#number-ball_4-h1").val(),$("#number-ball_4-h2").val(),$("#number-ball_4-h3").val(),$("#number-ball_4-h4").val(),$("#number-ball_4-h5").val(),
                            $("#number-ball_4-h6").val(),$("#number-ball_4-h7").val(),$("#number-ball_4-h8").val(),$("#number-ball_4-h9").val(),$("#number-ball_4-h10").val(),
                            $("#number-ball_4-h11").val(),$("#number-ball_4-h12").val(),$("#number-ball_4-h13").val(),$("#number-ball_4-h14").val(),$("#number-ball_4-h15").val(),
                            $("#number-ball_4-h16").val(),$("#number-ball_4-h17").val(),$("#number-ball_4-h18").val(),$("#number-ball_4-h19").val(),$("#number-ball_4-h20").val(),
                            $("#number-ball_4-h21").val(),$("#number-ball_4-h22").val(),$("#number-ball_4-h23").val(),$("#number-ball_4-h24").val(),$("#number-ball_4-h25").val(),
                            $("#number-ball_4-h26").val(),$("#number-ball_4-h27").val(),$("#number-ball_4-h28").val(),$("#number-ball_4-h29").val(),$("#number-ball_4-h30").val(),
                            $("#number-ball_4-h31").val(),$("#number-ball_4-h32").val(),$("#number-ball_4-h33").val(),$("#number-ball_4-h34").val(),$("#number-ball_4-h35").val(),
                            $("#number-ball_4-h36").val()
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
            url: "../lottery/oddssetting/GXSF/save/saveSeasonsOdds.php",
            data: {
                ball_1: [$("#seasons-ball_1-h1").val(),$("#seasons-ball_1-h2").val(),$("#seasons-ball_1-h3").val(),$("#seasons-ball_1-h4").val(),$("#seasons-ball_1-h5").val(),
                    $("#seasons-ball_1-h6").val(),$("#seasons-ball_1-h7").val(),$("#seasons-ball_1-h8").val(),$("#seasons-ball_1-h9").val()
                ],
                ball_2: [$("#seasons-ball_2-h1").val(),$("#seasons-ball_2-h2").val(),$("#seasons-ball_2-h3").val(),$("#seasons-ball_2-h4").val(),$("#seasons-ball_2-h5").val(),
                    $("#seasons-ball_2-h6").val(),$("#seasons-ball_2-h7").val(),$("#seasons-ball_2-h8").val(),$("#seasons-ball_2-h9").val()
                ],
                ball_3: [$("#seasons-ball_3-h1").val(),$("#seasons-ball_3-h2").val(),$("#seasons-ball_3-h3").val(),$("#seasons-ball_3-h4").val(),$("#seasons-ball_3-h5").val(),
                    $("#seasons-ball_3-h6").val(),$("#seasons-ball_3-h7").val(),$("#seasons-ball_3-h8").val(),$("#seasons-ball_3-h9").val()
                ],
                ball_4: [$("#seasons-ball_4-h1").val(),$("#seasons-ball_4-h2").val(),$("#seasons-ball_4-h3").val(),$("#seasons-ball_4-h4").val(),$("#seasons-ball_4-h5").val(),
                    $("#seasons-ball_4-h6").val(),$("#seasons-ball_4-h7").val(),$("#seasons-ball_4-h8").val(),$("#seasons-ball_4-h9").val()
                ],
                ball_5: [$("#seasons-ball_5-h1").val(),$("#seasons-ball_5-h2").val(),$("#seasons-ball_5-h3").val(),$("#seasons-ball_5-h4").val(),$("#seasons-ball_5-h5").val(),
                    $("#seasons-ball_5-h6").val(),$("#seasons-ball_5-h7").val(),$("#seasons-ball_5-h8").val(),$("#seasons-ball_5-h9").val()
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
            url: "../lottery/oddssetting/GXSF/save/saveChooseOdds.php",
            data: {
                ball_1: [$("#choose-ball_1-h1").val(),$("#choose-ball_1-h2").val(),$("#choose-ball_1-h3").val(),$("#choose-ball_1-h4").val(),$("#choose-ball_1-h5").val(),
                    $("#choose-ball_1-h6").val(),$("#choose-ball_1-h7").val(),$("#choose-ball_1-h8").val(),$("#choose-ball_1-h9").val(),$("#choose-ball_1-h10").val(),
                    $("#choose-ball_1-h11").val(),$("#choose-ball_1-h12").val(),$("#choose-ball_1-h13").val(),$("#choose-ball_1-h14").val(),$("#choose-ball_1-h15").val(),
                    $("#choose-ball_1-h16").val(),$("#choose-ball_1-h17").val(),$("#choose-ball_1-h18").val(),$("#choose-ball_1-h19").val(),$("#choose-ball_1-h20").val(),
                    $("#choose-ball_1-h21").val()
                ]
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }

    function saveTigerOdds(){
        $.ajax({
            type: "POST",
            url: "../lottery/oddssetting/GXSF/save/saveTigerOdds.php",
            data: {
                ball_1: [$("#tiger-ball_1-h1").val(),$("#tiger-ball_1-h2").val(),$("#tiger-ball_1-h3").val(),$("#tiger-ball_1-h4").val(),$("#tiger-ball_1-h5").val(),
                    $("#tiger-ball_1-h6").val(),$("#tiger-ball_1-h7").val(),$("#tiger-ball_1-h8").val()
                ]
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }

    function saveShunziOdds(){
        $.ajax({
            type: "POST",
            url: "../lottery/oddssetting/GXSF/save/saveShunziOdds.php",
            data: {
                ball_1: [$("#shun-ball_1-h1").val(),$("#shun-ball_1-h2").val(),$("#shun-ball_1-h3").val(),$("#shun-ball_1-h4").val(),$("#shun-ball_1-h5").val()
                ],
                ball_2: [$("#shun-ball_2-h1").val(),$("#shun-ball_2-h2").val(),$("#shun-ball_2-h3").val(),$("#shun-ball_2-h4").val(),$("#shun-ball_2-h5").val()
                ],
                ball_3: [$("#shun-ball_3-h1").val(),$("#shun-ball_3-h2").val(),$("#shun-ball_3-h3").val(),$("#shun-ball_3-h4").val(),$("#shun-ball_3-h5").val()
                ]
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }
}