function saveOdds(){
    if($(".active").html()=="主盘势"){
        saveGeneralOdds();
    }else if($(".active").html()=="定位"){
        saveNumberOdds();
    }else if($(".active").html()=="冠亚军和"){
        saveSumFirstOdds();
    }else if($(".active").html()=="冠亚军和-快速"){
        saveSumFirstQuickOdds();
    }else if($(".active").html()=="选号"){
        saveMultiChooseOdds();
    }

    function saveGeneralOdds(){
        $.ajax({
            type: "POST",
            url: "../lottery/oddssetting/BJPK/save/saveGeneralOdds.php",
            data: {
                ball_1: [$("#ball_1-h1").val(),$("#ball_1-h2").val(),$("#ball_1-h3").val(),$("#ball_1-h4").val(),$("#ball_1-h5").val(),$("#ball_1-h6").val()],
                ball_2: [$("#ball_2-h1").val(),$("#ball_2-h2").val(),$("#ball_2-h3").val(),$("#ball_2-h4").val(),$("#ball_2-h5").val(),$("#ball_2-h6").val()],
                ball_3: [$("#ball_3-h1").val(),$("#ball_3-h2").val(),$("#ball_3-h3").val(),$("#ball_3-h4").val(),$("#ball_3-h5").val(),$("#ball_3-h6").val()],
                ball_4: [$("#ball_4-h1").val(),$("#ball_4-h2").val(),$("#ball_4-h3").val(),$("#ball_4-h4").val(),$("#ball_4-h5").val(),$("#ball_4-h6").val()],
                ball_5: [$("#ball_5-h1").val(),$("#ball_5-h2").val(),$("#ball_5-h3").val(),$("#ball_5-h4").val(),$("#ball_5-h5").val(),$("#ball_5-h6").val()],
                ball_6: [$("#ball_6-h1").val(),$("#ball_6-h2").val(),$("#ball_6-h3").val(),$("#ball_6-h4").val()],
                ball_7: [$("#ball_7-h1").val(),$("#ball_7-h2").val(),$("#ball_7-h3").val(),$("#ball_7-h4").val()],
                ball_8: [$("#ball_8-h1").val(),$("#ball_8-h2").val(),$("#ball_8-h3").val(),$("#ball_8-h4").val()],
                ball_9: [$("#ball_9-h1").val(),$("#ball_9-h2").val(),$("#ball_9-h3").val(),$("#ball_9-h4").val()],
                ball_10: [$("#ball_10-h1").val(),$("#ball_10-h2").val(),$("#ball_10-h3").val(),$("#ball_10-h4").val()]
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
            url: "../lottery/oddssetting/BJPK/save/saveNumberOdds.php",
            data: {
                ball_1: [$("#number-ball_1-h1").val(),$("#number-ball_1-h2").val(),$("#number-ball_1-h3").val(),$("#number-ball_1-h4").val(),$("#number-ball_1-h5").val(),
                            $("#number-ball_1-h6").val(),$("#number-ball_1-h7").val(),$("#number-ball_1-h8").val(),$("#number-ball_1-h9").val(),$("#number-ball_1-h10").val()
                ],
                ball_2: [$("#number-ball_2-h1").val(),$("#number-ball_2-h2").val(),$("#number-ball_2-h3").val(),$("#number-ball_2-h4").val(),$("#number-ball_2-h5").val(),
                            $("#number-ball_2-h6").val(),$("#number-ball_2-h7").val(),$("#number-ball_2-h8").val(),$("#number-ball_2-h9").val(),$("#number-ball_2-h10").val()
                ],
                ball_3: [$("#number-ball_3-h1").val(),$("#number-ball_3-h2").val(),$("#number-ball_3-h3").val(),$("#number-ball_3-h4").val(),$("#number-ball_3-h5").val(),
                            $("#number-ball_3-h6").val(),$("#number-ball_3-h7").val(),$("#number-ball_3-h8").val(),$("#number-ball_3-h9").val(),$("#number-ball_3-h10").val()
                ],
                ball_4: [$("#number-ball_4-h1").val(),$("#number-ball_4-h2").val(),$("#number-ball_4-h3").val(),$("#number-ball_4-h4").val(),$("#number-ball_4-h5").val(),
                            $("#number-ball_4-h6").val(),$("#number-ball_4-h7").val(),$("#number-ball_4-h8").val(),$("#number-ball_4-h9").val(),$("#number-ball_4-h10").val()
                ],
                ball_5: [$("#number-ball_5-h1").val(),$("#number-ball_5-h2").val(),$("#number-ball_5-h3").val(),$("#number-ball_5-h4").val(),$("#number-ball_5-h5").val(),
                            $("#number-ball_5-h6").val(),$("#number-ball_5-h7").val(),$("#number-ball_5-h8").val(),$("#number-ball_5-h9").val(),$("#number-ball_5-h10").val()
                ],
                ball_6: [$("#number-ball_6-h1").val(),$("#number-ball_6-h2").val(),$("#number-ball_6-h3").val(),$("#number-ball_6-h4").val(),$("#number-ball_6-h5").val(),
                            $("#number-ball_6-h6").val(),$("#number-ball_6-h7").val(),$("#number-ball_6-h8").val(),$("#number-ball_6-h9").val(),$("#number-ball_6-h10").val()
                ],
                ball_7: [$("#number-ball_7-h1").val(),$("#number-ball_7-h2").val(),$("#number-ball_7-h3").val(),$("#number-ball_7-h4").val(),$("#number-ball_7-h5").val(),
                            $("#number-ball_7-h6").val(),$("#number-ball_7-h7").val(),$("#number-ball_7-h8").val(),$("#number-ball_7-h9").val(),$("#number-ball_7-h10").val()
                ],
                ball_8: [$("#number-ball_8-h1").val(),$("#number-ball_8-h2").val(),$("#number-ball_8-h3").val(),$("#number-ball_8-h4").val(),$("#number-ball_8-h5").val(),
                    $("#number-ball_8-h6").val(),$("#number-ball_8-h7").val(),$("#number-ball_8-h8").val(),$("#number-ball_8-h9").val(),$("#number-ball_8-h10").val()
                ],
                ball_9: [$("#number-ball_9-h1").val(),$("#number-ball_9-h2").val(),$("#number-ball_9-h3").val(),$("#number-ball_9-h4").val(),$("#number-ball_9-h5").val(),
                    $("#number-ball_9-h6").val(),$("#number-ball_9-h7").val(),$("#number-ball_9-h8").val(),$("#number-ball_9-h9").val(),$("#number-ball_9-h10").val()
                ],
                ball_10: [$("#number-ball_10-h1").val(),$("#number-ball_10-h2").val(),$("#number-ball_10-h3").val(),$("#number-ball_10-h4").val(),$("#number-ball_10-h5").val(),
                    $("#number-ball_10-h6").val(),$("#number-ball_10-h7").val(),$("#number-ball_10-h8").val(),$("#number-ball_10-h9").val(),$("#number-ball_10-h10").val()
                ]
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }

    function saveSumFirstOdds(){
        $.ajax({
            type: "POST",
            url: "../lottery/oddssetting/BJPK/save/saveSumFirstOdds.php",
            data: {
                ball_1: [$("#sum-in-ball_1-h1").val(),$("#sum-in-ball_1-h2").val(),$("#sum-in-ball_1-h3").val(),$("#sum-in-ball_1-h4").val(),$("#sum-in-ball_1-h5").val(),
                    $("#sum-in-ball_1-h6").val(),$("#sum-in-ball_1-h7").val(),$("#sum-in-ball_1-h8").val(),$("#sum-in-ball_1-h9").val()
                ]
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }

    function saveSumFirstQuickOdds(){
        $.ajax({
            type: "POST",
            url: "../lottery/oddssetting/BJPK/save/saveSumFirstQuickOdds.php",
            data: {
                ball_1: [$("#quick_sum-in-ball_1-h1").val(),$("#quick_sum-in-ball_1-h2").val(),$("#quick_sum-in-ball_1-h3").val(),$("#quick_sum-in-ball_1-h4").val(),$("#quick_sum-in-ball_1-h5").val(),
                    $("#quick_sum-in-ball_1-h6").val(),$("#quick_sum-in-ball_1-h7").val(),$("#quick_sum-in-ball_1-h8").val(),$("#quick_sum-in-ball_1-h9").val(),$("#quick_sum-in-ball_1-h10").val(),
                    $("#quick_sum-in-ball_1-h11").val(),$("#quick_sum-in-ball_1-h12").val(),$("#quick_sum-in-ball_1-h13").val(),$("#quick_sum-in-ball_1-h14").val(),$("#quick_sum-in-ball_1-h15").val(),
                    $("#quick_sum-in-ball_1-h16").val(),$("#quick_sum-in-ball_1-h17").val(),$("#quick_sum-in-ball_1-h18").val(),$("#quick_sum-in-ball_1-h19").val(),$("#quick_sum-in-ball_1-h20").val(),
                    $("#quick_sum-in-ball_1-h21").val()
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
            url: "../lottery/oddssetting/BJPK/save/saveMultiChooseOdds.php",
            data: {
                ball_1: [$("#multi-choose-ball_1-h1").val(),$("#multi-choose-ball_1-h2").val(),$("#multi-choose-ball_1-h3").val(),$("#multi-choose-ball_1-h4").val(),$("#multi-choose-ball_1-h5").val(),
                    $("#multi-choose-ball_1-h6").val(),$("#multi-choose-ball_1-h7").val()
                ]
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }
}