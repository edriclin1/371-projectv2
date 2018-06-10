$(document).ready(function(){
    $("img").click(function(){
        $(this).hide();
        var h = document.createElement("h3");
        var t = document.createTextNode("CIS 371 RULES!");
        h.appendChild(t);
        document.getElementById("middle").appendChild(h);
    });
});