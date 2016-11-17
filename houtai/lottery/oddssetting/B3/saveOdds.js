function saveB3Odds(){
    $.ajax({
        type: "POST",
        url: "../lottery/oddssetting/B3/save/saveB3Odds.php",
        data:$('#formB3').serialize()
    }).done(function( msg ) {
            alert(msg);
        }).fail(function(error){
            alert(error.responseText);
        });
}

function saveB3OddsByPart(){
    $.ajax({
        type: "POST",
        url: "../lottery/oddssetting/B3/save/saveB3OddsByPart.php",
        data:$('#formB3').serialize()
    }).done(function( msg ) {
            alert(msg);
        }).fail(function(error){
            alert(error.responseText);
        });
}