function listenInvestWidth(e) {
    if ($(window).width() <= 576) {
        $(".content-2-text").empty();
        $(".content-2-text").append("<p class='text-19 font-weight-bold'>TernakInvest telah</p><p class='text-19 font-weight-bold'>membantu lebih dari</p><p class='font-weight-bold text-orange text-32'>30 Peternak Lokal</p>");

        $("#investNavButton").removeClass('col');
        $("#investNavButton").addClass('col-auto');
    } else {
        $(".content-2-text").empty();
        $(".content-2-text").append("<p class='text-19 font-weight-bold'>Bersama Investor TernakInvest telah membantu</p><p class='text-19 font-weight-bold'>lebih dari <span class='text-orange text-32'>30 Peternak Lokal</span></p>");

        $("#investNavButton").removeClass('col-auto');
        $("#investNavButton").addClass('col');
    }
}

$(document).ready(function() {
    listenInvestWidth();
});

$(window).resize(function() {
    listenInvestWidth();
});