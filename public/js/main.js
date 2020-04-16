var scrollPoint = 200;

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
    if ($(window).width() <= 576) {
        $("#copyright").remove().insertAfter($("#faq"));
    } else {
        $("#copyright").remove().insertBefore($("#socialMedia"));
    }

    // ubah grid footer atas
    if ($(window).width() <= 576) {
        $('#ftSec1').removeClass('col');
        $('#ftSec2').removeClass('col-2');
        $('#ftSec3').removeClass('col');
        $('#ftSec4').removeClass('col');
        $('#ftSec5').removeClass('col-3');
        $('#ftSec1').addClass('col-12');
        $('#ftSec2').addClass('col-4');
        $('#ftSec2').addClass('offset-2');
        $('#ftSec3').addClass('col-6');
        $('#ftSec4').addClass('col-12');
        $('#ftSec5').addClass('col-12');
        $('#imgStore').addClass('row justify-content-center');
        $('.store-item').addClass('col-auto');
    } else {
        $('#ftSec1').removeClass('col-12');
        $('#ftSec2').removeClass('col-4');
        $('#ftSec2').removeClass('offset-2');
        $('#ftSec3').removeClass('col-6');
        $('#ftSec4').removeClass('col-12');
        $('#ftSec5').removeClass('col-12');
        $('#imgStore').removeClass('row justify-content-center');
        $('.store-item').removeClass('col-auto');

        $('#ftSec1').addClass('col');
        $('#ftSec2').addClass('col-2');
        $('#ftSec3').addClass('col');
        $('#ftSec4').addClass('col');
        $('#ftSec5').addClass('col-3');
    }
}

$(document).ready(function() {
    listenWidth();
});

$(window).resize(function() {
    listenWidth();
});