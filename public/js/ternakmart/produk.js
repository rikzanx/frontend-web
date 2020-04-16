$(document).ready(function () {
    listenWidth();
});
var lat = '';
var lng = '';
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}
function showPosition(position) {
    window.lat = position.coords.latitude;
    window.lng = position.coords.longitude;
    location.href = "produk?lat=" + position.coords.latitude + "&lng=" + position.coords.longitude;
}
function setLocation(lat, lng) {
    location.href = "produk?lat=" + lat + "&lng=" + lng;
}
function change_category(id) {
    let searchParams = new URLSearchParams(window.location.search);
    var loc = searchParams.has('lat');
    if (loc == true) {
        location.href = "produk?lat=" + searchParams.get('lat') + "&lng=" + searchParams.get('lng') + "&category=" + id;
    } else {
        location.href = "produk?category=" + id;
    }
}
function change_page(page) {
    let searchParams = new URLSearchParams(window.location.search);
    var category = '13';
    if (searchParams.has('category')) {
        category = searchParams.get('category');
    }
    location.href = "produk?lat=" + searchParams.get('lat') + "&lng=" + searchParams.get('lng') + "&category=" + category + "&page=" + page;
}

function prev_page(count_page) {
    let searchParams = new URLSearchParams(window.location.search);
    var category = '13';
    var page = '1';
    if (searchParams.has('category')) {
        category = searchParams.get('category');
    }
    if (searchParams.has('page')) {
        page = parseInt(searchParams.get('page'));
        if (page != 1) {
            page--;
        }
    }
    location.href = "produk?lat=" + searchParams.get('lat') + "&lng=" + searchParams.get('lng') + "&category=" + category + "&page=" + page;
}
function next_page(next_page) {
    let searchParams = new URLSearchParams(window.location.search);
    var category = '13';
    var page = '1';
    if (searchParams.has('category')) {
        category = searchParams.get('category');
    }
    if (searchParams.has('page')) {
        page = parseInt(searchParams.get('page'));
        if (page != parseInt(next_page)) {
            page--;
        }
    }
    location.href = "produk?lat=" + searchParams.get('lat') + "&lng=" + searchParams.get('lng') + "&category=" + category + "&page=" + page;
}
function showdetail() {

}
function showmodal(id) {
    var div = ".modal." + id;
    $(div).modal('show');

}
function closemodal(id) {
    var div = ".modal-show-detail." + id;
    $(div).addClass("modal-hide");
}
function showcart() {
    location.href = "checkout";
}
function btnbeli(id, nama, harga) {
    var btnbeli = ".btn-beli." + id;
    var btnbeli_modal = ".btn-beli-modal." + id;
    var btnjumlah = ".btn-jumlah." + id;
    $.ajax({
        type: "POST",
        url: "/ternakmart/addSessionCart",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id,
            name: nama,
            harga: parseInt(harga),
            jumlah: '1'
        },
        success: function (data) {
            var elemen_jumlah = ".jumlah." + id;
            var elemen_jumlah_modal = ".jumlah-modal." + id;
            var jumlah = parseInt($(elemen_jumlah).text());
            jumlah += 1;
            $(elemen_jumlah).text(jumlah);
            $(elemen_jumlah_modal).text(jumlah);
            $(btnbeli).css({ "display": "none" });
            $(btnbeli_modal).css({ "display": "none" });
            $(btnjumlah).css({ "display": "flex" });
            jumlah_blnj = parseInt($('.cart-jumlah').text());
            var total = parseInt($('.total-harga').text());
            jumlah_blnj += 1;
            total += parseInt(harga);
            $('.cart-jumlah').text(jumlah_blnj);
            $('.total-harga').text(total);
        },
        error: function (errorMessage) {
            alert("gagal");
            alert(errorMessage);
        }
    });
}
function btnminus(id, nama, harga) {
    var btnbeli = ".btn-beli." + id;
    var btnbeli_modal = ".btn-beli-modal." + id;
    var btnjumlah = ".btn-jumlah." + id;
    var elemen_jumlah = ".jumlah." + id;
    var jumlah = parseInt($(elemen_jumlah).text());
    console.log(jumlah);
    $.ajax({
        type: "POST",
        url: "/ternakmart/deleteSessionCart",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id,
            name: nama,
            harga: parseInt(harga),
            jumlah: '1'
        },
        success: function (data) {
            console.log(jumlah);
            if (jumlah >= 2) {
                jumlah -= 1;
                $(elemen_jumlah).text(jumlah);
            } else {
                jumlah = 0;
                $(btnjumlah).css({ "display": "none" });
                $(btnbeli).css({ "display": "flex" });
                $(btnbeli_modal).css({ "display": "flex" });
                $(elemen_jumlah).text(jumlah);
            }
            var jumlah_cart = parseInt($('.cart-jumlah').text());
            var total = parseInt($('.total-harga').text());
            if (total == 1) {
                jumlah_cart = 0;
                total = 0;
            } else {
                jumlah_cart -= 1;
                total -= parseInt(harga);
            }
            $('.cart-jumlah').text(jumlah_cart);
            $('.total-harga').text(total);
        },
        error: function (errorMessage) {
            alert("gagal");
            alert(errorMessage);
        }
    });

}
function btnplus(id, nama, harga) {
    var elemen_jumlah = ".jumlah." + id;
    var elemen_jumlah_modal = ".jumlah-modal." + id;
    var jumlah = parseInt($(elemen_jumlah).text());
    console.log(jumlah);
    $.ajax({
        type: "POST",
        url: "/ternakmart/addSessionCart",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id,
            name: nama,
            harga: parseInt(harga),
            jumlah: '1'
        },
        success: function (data) {
            jumlah += 1;
            $(elemen_jumlah).text(jumlah);
            $(elemen_jumlah_modal).text(jumlah);
            var jumlah_blnj = parseInt($('.cart-jumlah').text());
            var total = parseInt($('.total-harga').text());
            jumlah_blnj += 1;
            total += parseInt(harga);
            $('.cart-jumlah').text(jumlah_blnj);
            $('.total-harga').text(total);
        },
        error: function (errorMessage) {
            alert("gagal");
            alert(errorMessage);
        }
    });
}
function modal_prev(key, jumlah) {

    if (key > 0) {
        var modal = ".modal-" + key;
        var prev = parseInt(key) - 1;
        var prev_modal = ".modal-" + prev;
        $(prev_modal).removeClass("modal-hide");
        $(modal).addClass("modal-hide");
    }
}
function modal_next(key, jumlah) {
    jumlah = parseInt(jumlah) - 1;
    if (key >= jumlah) {

    } else {
        var modal = ".modal-" + key;
        var prev = parseInt(key) + 1;
        var prev_modal = ".modal-" + prev;
        $(prev_modal).removeClass("modal-hide");
        $(modal).addClass("modal-hide");
    }
}


$('#navbarToggler').click(function () {
    if ($('#navbarToggler').hasClass('menu-hidden')) {
        $('.icon-close').show();
        $('.icon-bars').hide();
        $('#logo').hide();
        $('#logoText').hide();
        $('#logoOrange').show();
        $('#logoTextBlack').show();
        $('#navbarToggler').removeClass('menu-hidden');
        $('body').addClass('no-scroll');
        $('#navBar').removeClass('navbar-floating');
        $('#navBar').addClass('navbar-mobile-show');
    } else {
        $('.icon-close').hide();
        $('#navbarToggler').addClass('menu-hidden');
        $('body').removeClass('no-scroll');
        $('.icon-bars').show();
        $('#logo').hide();
        $('#logoText').hide();
        $('#logoOrange').show();
        $('#logoTextBlack').show();
        $('#navBar').addClass('navbar-floating');
        $('#navBar').removeClass('navbar-mobile-show');
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


$(window).resize(function () {
    listenWidth();
});

$(window).scroll(function () {
    var batas = $(document).height() - $('#footer').height();
    var scroll = $(document).scrollTop() + $(window).height();
    if (scroll >= batas) {
        $('.floating-div').hide();
    } else {
        $('.floating-div').show();
    }
});
