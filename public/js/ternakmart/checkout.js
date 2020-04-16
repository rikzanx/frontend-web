$(document).ready(function () {
    listenWidth();
    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
});
function order(){
    var metode_bayar = 'cod';
    var payment_bank_id = '';
    var no_rekening = '';
    var nama_rekening = '';
    var delivery_date = $('#datepicker').val();
    delivery_date= delivery_date+" 08:00:00";
    var nama_pembeli = $('#nama').val();
    var email_pembeli= $('#email').val();
    var val = $("input[name='metode']:checked").val();
    if(val != 'cod'){
        metode_bayar = 'transfer';
        payment_bank_id =  val;
        no_rekening =  $(".no_rek."+val).val();
        nama_rekening = $(".nama_rek."+val).val();
    }
    $.ajax({
        type: "POST",
        url: "/ternakmart/order",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            metode_bayar : metode_bayar,
            payment_bank_id : payment_bank_id,
            no_rekening : no_rekening,
            nama_rekening : nama_rekening,
            delivery_date : delivery_date,
            nama_pembeli : nama_pembeli,
            email_pembeli : email_pembeli
        },
        success: function (data) {
            if(data['status'] == 'ok'){
                console.log(data);
                $('#modalsukses').modal('show');
                var link = "tagihan/"+data['no_tagihan'];
                $('.lihat-tagihan').attr("href",link);
            }else if(data['status'] == 'gagal'){
                alert('gagal');
            }else if(data['status'] == 'lokasi'){
                location.href = "produk";
            }else{
                location.href = "/login";
            }
        },
        error: function (errorMessage) {
            alert("gagal");
            alert(errorMessage);
        }
    });
    
}
function ubahmetode() {
    var val = $("input[name='metode']:checked").val();
    var text = $(".nama_bank."+val).val();
    $('.metode-byr').text(text);
}

function showform() {
    $('.form-penerima').removeClass('hilang');
    $(".show-hide-icon").attr("onclick", "hideform()");
    $(".show-hide-icon").removeClass('fa-arrow-down');
    $(".show-hide-icon").addClass('fa-arrow-up');
}
function showform_down() {
    $('html, body').animate({
        scrollTop: $("#memesan").offset().top - 80
    }, 1000);
    $('.form-penerima').removeClass('hilang');
    $(".show-hide-icon").attr("onclick", "hideform()");
    $(".show-hide-icon").removeClass('fa-arrow-down');
    $(".show-hide-icon").addClass('fa-arrow-up');
}
function hideform() {
    $('.form-penerima').addClass('hilang');
    $(".show-hide-icon").attr("onclick", "showform()");
    $(".show-hide-icon").removeClass('fa-arrow-up');
    $(".show-hide-icon").addClass('fa-arrow-down');
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
