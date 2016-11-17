function saveB5Odds(){
    $.ajax({
        type: "POST",
        url: "../lottery/oddssetting/B5/save/saveB5Odds.php",
        data:$('#formB5').serialize()
    }).done(function( msg ) {
            alert(msg);
        }).fail(function(error){
            alert(error.responseText);
        });
}

function saveB5OddsByPart(){
    $.ajax({
        type: "POST",
        url: "../lottery/oddssetting/B5/save/saveB5OddsByPart.php",
        data:$('#formB5').serialize()
    }).done(function( msg ) {
            alert(msg);
        }).fail(function(error){
            alert(error.responseText);
        });
}

function saveB5Odds535(){
    $.ajax({
        type: "POST",
        url: "../lottery/oddssetting/B5/save/saveB5Odds535.php",
        data:$('#formB5').serialize()
    }).done(function( msg ) {
            alert(msg);
        }).fail(function(error){
            alert(error.responseText);
        });
}