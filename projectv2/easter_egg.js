//Final Version

$(document).ready(function(){
    $("#cis").hide();

    $("#easter_egg").on("click", function(){
        $("#easter_egg").hide();
        $("#cis").show();
    });
    
    $("#cis").on("click", function(){
        $("#cis").hide();
        $("#easter_egg").show();
    });

});