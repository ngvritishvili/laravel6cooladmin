$(document).ready(function() {
    $("#time").on("click",function() {
        $("#time_div").show();
        $("#price_div").hide();
        $("#choice_div").hide();
    });
    $("#price").on("click",function() {
        $("#time_div").hide();
        $("#price_div").show();
        $("#choice_div").hide();
    });
    $("#choice").on("click",function() {
        $("#time_div").hide();
        $("#price_div").hide();
        $("#choice_div").show();
    });

    });
