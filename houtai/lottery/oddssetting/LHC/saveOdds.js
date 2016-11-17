function saveLhcOdds(){
    $.ajax({
        type: "POST",
        url: "../lottery/oddssetting/LHC/save/saveLhcOdds.php",
        data:$('#formLhc').serialize()
    }).done(function( msg ) {
            alert(msg);
        }).fail(function(error){
            alert(error.responseText);
        });
}

function saveLhcOddsOther(){
    $.ajax({
        type: "POST",
        url: "../lottery/oddssetting/LHC/save/saveLhcOddsOther.php",
        data:$('#formLhc').serialize()
    }).done(function( msg ) {
            alert(msg);
        }).fail(function(error){
            alert(error.responseText);
        });
}

function saveLhcSPAside(){
    $.ajax({
        type: "POST",
        url: "../lottery/oddssetting/LHC/save/saveLhcSPAside.php",
        data:$('#formLhc').serialize()
    }).done(function( msg ) {
            alert(msg);
        }).fail(function(error){
            alert(error.responseText);
        });
}