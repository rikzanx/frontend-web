$('.carousel').carousel();
$(function() {
    $('.semangatKamiContent').click(function() {
        $('#semangatKamiDiv').scrollLeft(this.offsetLeft - 48);
    });
});
function listenHeight() {
    if ($(window).width() <= 703) $('#banner').height($('#bannerContent .displayPhone img').height() - 50);
    else $('#banner').height(853);
}
listenWidth();
listenHeight();

const scrollPoint = 200;
$(window).scroll(function() {
    if ($(window).scrollTop() > scrollPoint) {
        $('#navBar').removeClass('navbar-main');
        $('#navBar').addClass('navbar-floating');
        $('.nav-search').addClass('nav-search-floating');
        $('#logo').hide();
        $('#logoText').hide();
        $('#logoOrange').show();
        $('#logoTextBlack').show();
        $('#bars').hide();
        $('#barsBlack').show();
    } else {
        $('#navBar').removeClass('navbar-floating');
        $('#navBar').addClass('navbar-main');
        $('.nav-search').removeClass('nav-search-floating');
        $('#logoOrange').hide();
        $('#logoTextBlack').hide();
        $('#logo').show();
        $('#logoText').show();
        $('#barsBlack').hide();
        $('#bars').show();
    }
});
$('#navbarToggler').click(function() {
    if ($('#navbarToggler').hasClass('menu-hidden')) {
        $('.icon-close').show();
        $('.icon-bars').hide();
        $('#logo').hide();
        $('#logoText').hide();
        $('#logoOrange').show();
        $('#logoTextBlack').show();
        $('#navbarToggler').removeClass('menu-hidden');
        $('body').addClass('no-scroll');

        if ($(window).scrollTop() > scrollPoint) {
            $('#navBar').removeClass('navbar-floating');
            $('#navBar').addClass('navbar-mobile-show');
        } else {
            $('#navBar').removeClass('navbar-main');
            $('#navBar').addClass('navbar-mobile-show');
        }
    } else {
        $('.icon-close').hide();
        $('#navbarToggler').addClass('menu-hidden');
        $('body').removeClass('no-scroll');

        if ($(window).scrollTop() > scrollPoint) {
            $('#barsBlack').show();
            $('#logo').hide();
            $('#logoText').hide();
            $('#logoOrange').show();
            $('#logoTextBlack').show();
            $('#navBar').addClass('navbar-floating');
            $('#navBar').removeClass('navbar-mobile-show');
        } else {
            $('#bars').show();
            $('#logoOrange').hide();
            $('#logoTextBlack').hide();
            $('#logo').show();
            $('#logoText').show();
            $('#navBar').addClass('navbar-main');
            $('#navBar').removeClass('navbar-mobile-show');
        }
    }
});

function listenWidth(e) {
    // ubah posisi footer bawah
    if ($(window).width() <= 576) $("#copyright").remove().insertAfter($("#faq"));
    else $("#copyright").remove().insertBefore($("#socialMedia"));

    // ubah grid footer atas
    if ($(window).width() <= 992) {
        $('#ftSec1').removeClass('col-4');
        $('#imgStore').addClass('row justify-content-center');
        $('.store-item').addClass('col-auto');
    } else {
        $('#ftSec1').removeClass('col-12');
        $('#imgStore').removeClass('row justify-content-center');
        $('.store-item').removeClass('col-auto');
    }
    if($(window).width() <= 574) $('#ftSec2').addClass('offset-3');
    else $('#ftSec2').removeClass('offset-3');
}

$(window).resize(function() {
    listenWidth();
    listenHeight();
});