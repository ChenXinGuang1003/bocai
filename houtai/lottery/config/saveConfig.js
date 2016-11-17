function saveConfig(){
    if($(".active").attr("group")=="553"){
        saveConfigNormal();
    }else if($(".active").attr("group")=="735"){
        saveConfigSilver();
    }else if($(".active").attr("group")=="804"){
        saveConfigGold();
    }else if($(".active").attr("group")=="866"){
        saveConfigFour();
    }else if($(".active").attr("group")=="972"){
        saveConfigFive();
    }

    function saveConfigNormal(){
        $.ajax({
            type: "POST",
            url: "../../lottery/config/saveConfig.php",
            data: {
                config: [$("#ball_1-h1").val(),$("#ball_1-h2").val(),$("#ball_1-h3").val(),$("#ball_1-h4").val(),$("#ball_1-h5").val(),
                    $("#ball_1-h6").val(),$("#ball_1-h7").val(),$("#ball_1-h8").val(),$("#ball_1-h9").val(),$("#ball_1-h10").val(),
                    $("#ball_1-h11").val(),$("#ball_1-h12").val(),$("#ball_1-h13").val(),$("#ball_1-h14").val(),$("#ball_1-h15").val(),
                    $("#ball_1-h16").val(),$("#ball_1-h17").val(),$("#ball_1-h18").val(),$("#ball_1-h19").val(),$("#ball_1-h20").val(),
                    $("#ball_1-h21").val(),$("#ball_1-h22").val(),$("#ball_1-h23").val(),$("#ball_1-h24").val(),$("#ball_1-h25").val(),
                    $("#ball_1-h26").val(),$("#ball_1-h27").val(),$("#ball_1-h28").val(),$("#ball_1-h29").val(),$("#ball_1-h30").val(),
                    $("#ball_1-h31").val(),$("#ball_1-h32").val(),$("#ball_1-h33").val(),$("#ball_1-h34").val(),$("#ball_1-h35").val(),
                    $("#ball_1-h36").val(),$("#ball_1-h37").val(),$("#ball_1-h38").val(),$("#ball_1-h39").val(),$("#ball_1-h40").val(),
                    $("#ball_1-h41").val(),$("#ball_1-h42").val(),$("#ball_1-h43").val(),$("#ball_1-h44").val(),$("#ball_1-h45").val(),
                    $("#ball_1-h46").val(),$("#ball_1-h47").val(),$("#ball_1-h48").val(),$("#ball_1-h49").val(),$("#ball_1-h50").val(),
                    $("#ball_1-h51").val(),$("#ball_1-h52").val(),$("#ball_1-h53").val(),$("#ball_1-h54").val(),$("#ball_1-h55").val(),
                    $("#ball_1-h56").val(),$("#ball_1-h57").val(),$("#ball_1-h58").val(),$("#ball_1-h59").val()
                ],
                group_id: 553
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }

    function saveConfigSilver(){
        $.ajax({
            type: "POST",
            url: "../../lottery/config/saveConfig.php",
            data: {
                config: [$("#silver_ball_1-h1").val(),$("#silver_ball_1-h2").val(),$("#silver_ball_1-h3").val(),$("#silver_ball_1-h4").val(),$("#silver_ball_1-h5").val(),
                    $("#silver_ball_1-h6").val(),$("#silver_ball_1-h7").val(),$("#silver_ball_1-h8").val(),$("#silver_ball_1-h9").val(),$("#silver_ball_1-h10").val(),
                    $("#silver_ball_1-h11").val(),$("#silver_ball_1-h12").val(),$("#silver_ball_1-h13").val(),$("#silver_ball_1-h14").val(),$("#silver_ball_1-h15").val(),
                    $("#silver_ball_1-h16").val(),$("#silver_ball_1-h17").val(),$("#silver_ball_1-h18").val(),$("#silver_ball_1-h19").val(),$("#silver_ball_1-h20").val(),
                    $("#silver_ball_1-h21").val(),$("#silver_ball_1-h22").val(),$("#silver_ball_1-h23").val(),$("#silver_ball_1-h24").val(),$("#silver_ball_1-h25").val(),
                    $("#silver_ball_1-h26").val(),$("#silver_ball_1-h27").val(),$("#silver_ball_1-h28").val(),$("#silver_ball_1-h29").val(),$("#silver_ball_1-h30").val(),
                    $("#silver_ball_1-h31").val(),$("#silver_ball_1-h32").val(),$("#silver_ball_1-h33").val(),$("#silver_ball_1-h34").val(),$("#silver_ball_1-h35").val(),
                    $("#silver_ball_1-h36").val(),$("#silver_ball_1-h37").val(),$("#silver_ball_1-h38").val(),$("#silver_ball_1-h39").val(),$("#silver_ball_1-h40").val(),
                    $("#silver_ball_1-h41").val(),$("#silver_ball_1-h42").val(),$("#silver_ball_1-h43").val(),$("#silver_ball_1-h44").val(),$("#silver_ball_1-h45").val(),
                    $("#silver_ball_1-h46").val(),$("#silver_ball_1-h47").val(),$("#silver_ball_1-h48").val(),$("#silver_ball_1-h49").val(),$("#silver_ball_1-h50").val(),
                    $("#silver_ball_1-h51").val(),$("#silver_ball_1-h52").val(),$("#silver_ball_1-h53").val(),$("#silver_ball_1-h54").val(),$("#silver_ball_1-h55").val(),
                    $("#silver_ball_1-h56").val(),$("#silver_ball_1-h57").val(),$("#silver_ball_1-h58").val(),$("#silver_ball_1-h59").val()
                ],
                group_id: 735
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }

    function saveConfigGold(){
        $.ajax({
            type: "POST",
            url: "../../lottery/config/saveConfig.php",
            data: {
                config: [$("#gold_ball_1-h1").val(),$("#gold_ball_1-h2").val(),$("#gold_ball_1-h3").val(),$("#gold_ball_1-h4").val(),$("#gold_ball_1-h5").val(),
                    $("#gold_ball_1-h6").val(),$("#gold_ball_1-h7").val(),$("#gold_ball_1-h8").val(),$("#gold_ball_1-h9").val(),$("#gold_ball_1-h10").val(),
                    $("#gold_ball_1-h11").val(),$("#gold_ball_1-h12").val(),$("#gold_ball_1-h13").val(),$("#gold_ball_1-h14").val(),$("#gold_ball_1-h15").val(),
                    $("#gold_ball_1-h16").val(),$("#gold_ball_1-h17").val(),$("#gold_ball_1-h18").val(),$("#gold_ball_1-h19").val(),$("#gold_ball_1-h20").val(),
                    $("#gold_ball_1-h21").val(),$("#gold_ball_1-h22").val(),$("#gold_ball_1-h23").val(),$("#gold_ball_1-h24").val(),$("#gold_ball_1-h25").val(),
                    $("#gold_ball_1-h26").val(),$("#gold_ball_1-h27").val(),$("#gold_ball_1-h28").val(),$("#gold_ball_1-h29").val(),$("#gold_ball_1-h30").val(),
                    $("#gold_ball_1-h31").val(),$("#gold_ball_1-h32").val(),$("#gold_ball_1-h33").val(),$("#gold_ball_1-h34").val(),$("#gold_ball_1-h35").val(),
                    $("#gold_ball_1-h36").val(),$("#gold_ball_1-h37").val(),$("#gold_ball_1-h38").val(),$("#gold_ball_1-h39").val(),$("#gold_ball_1-h40").val(),
                    $("#gold_ball_1-h41").val(),$("#gold_ball_1-h42").val(),$("#gold_ball_1-h43").val(),$("#gold_ball_1-h44").val(),$("#gold_ball_1-h45").val(),
                    $("#gold_ball_1-h46").val(),$("#gold_ball_1-h47").val(),$("#gold_ball_1-h48").val(),$("#gold_ball_1-h49").val(),$("#gold_ball_1-h50").val(),
                    $("#gold_ball_1-h51").val(),$("#gold_ball_1-h52").val(),$("#gold_ball_1-h53").val(),$("#gold_ball_1-h54").val(),$("#gold_ball_1-h55").val(),
                    $("#gold_ball_1-h56").val(),$("#gold_ball_1-h57").val(),$("#gold_ball_1-h58").val(),$("#gold_ball_1-h59").val()
                ],
                group_id: 804
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }

    function saveConfigFour(){
        $.ajax({
            type: "POST",
            url: "../../lottery/config/saveConfig.php",
            data: {
                config: [$("#four_ball_1-h1").val(),$("#four_ball_1-h2").val(),$("#four_ball_1-h3").val(),$("#four_ball_1-h4").val(),$("#four_ball_1-h5").val(),
                    $("#four_ball_1-h6").val(),$("#four_ball_1-h7").val(),$("#four_ball_1-h8").val(),$("#four_ball_1-h9").val(),$("#four_ball_1-h10").val(),
                    $("#four_ball_1-h11").val(),$("#four_ball_1-h12").val(),$("#four_ball_1-h13").val(),$("#four_ball_1-h14").val(),$("#four_ball_1-h15").val(),
                    $("#four_ball_1-h16").val(),$("#four_ball_1-h17").val(),$("#four_ball_1-h18").val(),$("#four_ball_1-h19").val(),$("#four_ball_1-h20").val(),
                    $("#four_ball_1-h21").val(),$("#four_ball_1-h22").val(),$("#four_ball_1-h23").val(),$("#four_ball_1-h24").val(),$("#four_ball_1-h25").val(),
                    $("#four_ball_1-h26").val(),$("#four_ball_1-h27").val(),$("#four_ball_1-h28").val(),$("#four_ball_1-h29").val(),$("#four_ball_1-h30").val(),
                    $("#four_ball_1-h31").val(),$("#four_ball_1-h32").val(),$("#four_ball_1-h33").val(),$("#four_ball_1-h34").val(),$("#four_ball_1-h35").val(),
                    $("#four_ball_1-h36").val(),$("#four_ball_1-h37").val(),$("#four_ball_1-h38").val(),$("#four_ball_1-h39").val(),$("#four_ball_1-h40").val(),
                    $("#four_ball_1-h41").val(),$("#four_ball_1-h42").val(),$("#four_ball_1-h43").val(),$("#four_ball_1-h44").val(),$("#four_ball_1-h45").val(),
                    $("#four_ball_1-h46").val(),$("#four_ball_1-h47").val(),$("#four_ball_1-h48").val(),$("#four_ball_1-h49").val(),$("#four_ball_1-h50").val(),
                    $("#four_ball_1-h51").val(),$("#four_ball_1-h52").val(),$("#four_ball_1-h53").val(),$("#four_ball_1-h54").val(),$("#four_ball_1-h55").val(),
                    $("#four_ball_1-h56").val(),$("#four_ball_1-h57").val(),$("#four_ball_1-h58").val(),$("#four_ball_1-h59").val()
                ],
                group_id: 866
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }

    function saveConfigFive(){
        $.ajax({
            type: "POST",
            url: "../../lottery/config/saveConfig.php",
            data: {
                config: [$("#five_ball_1-h1").val(),$("#five_ball_1-h2").val(),$("#five_ball_1-h3").val(),$("#five_ball_1-h4").val(),$("#five_ball_1-h5").val(),
                    $("#five_ball_1-h6").val(),$("#five_ball_1-h7").val(),$("#five_ball_1-h8").val(),$("#five_ball_1-h9").val(),$("#five_ball_1-h10").val(),
                    $("#five_ball_1-h11").val(),$("#five_ball_1-h12").val(),$("#five_ball_1-h13").val(),$("#five_ball_1-h14").val(),$("#five_ball_1-h15").val(),
                    $("#five_ball_1-h16").val(),$("#five_ball_1-h17").val(),$("#five_ball_1-h18").val(),$("#five_ball_1-h19").val(),$("#five_ball_1-h20").val(),
                    $("#five_ball_1-h21").val(),$("#five_ball_1-h22").val(),$("#five_ball_1-h23").val(),$("#five_ball_1-h24").val(),$("#five_ball_1-h25").val(),
                    $("#five_ball_1-h26").val(),$("#five_ball_1-h27").val(),$("#five_ball_1-h28").val(),$("#five_ball_1-h29").val(),$("#five_ball_1-h30").val(),
                    $("#five_ball_1-h31").val(),$("#five_ball_1-h32").val(),$("#five_ball_1-h33").val(),$("#five_ball_1-h34").val(),$("#five_ball_1-h35").val(),
                    $("#five_ball_1-h36").val(),$("#five_ball_1-h37").val(),$("#five_ball_1-h38").val(),$("#five_ball_1-h39").val(),$("#five_ball_1-h40").val(),
                    $("#five_ball_1-h41").val(),$("#five_ball_1-h42").val(),$("#five_ball_1-h43").val(),$("#five_ball_1-h44").val(),$("#five_ball_1-h45").val(),
                    $("#five_ball_1-h46").val(),$("#five_ball_1-h47").val(),$("#five_ball_1-h48").val(),$("#five_ball_1-h49").val(),$("#five_ball_1-h50").val(),
                    $("#five_ball_1-h51").val(),$("#five_ball_1-h52").val(),$("#five_ball_1-h53").val(),$("#five_ball_1-h54").val(),$("#five_ball_1-h55").val(),
                    $("#five_ball_1-h56").val(),$("#five_ball_1-h57").val(),$("#five_ball_1-h58").val(),$("#five_ball_1-h59").val()
                ],
                group_id: 972
            }
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert(error.responseText);
            });
    }
}