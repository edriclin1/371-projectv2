$(document).ready(function(){
    document.getElementById("cis").style.display = "none";

    $("#easter_egg").on("click", function(){
        $(this).hide();
        document.getElementById("cis").style.display = "block";
    });
    
    $("#cis").on("click", function(){
        $(this).hide();
        document.getElementById("easter_egg").style.display = "block";
    });

});