$(document).ready(function () {
    $('.btn-upload-img').click(function () {
        $('#input-image').trigger('click');
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(".foto-upload").css("background-image", "url(" + e.target.result + ")");
            $(".foto-upload").css({ "display": "block" });
            $(".bukti-text").css({ "display": "block" });
            $(".btn-upload-img").css({ "display": "none" });
            $(".text-upload").css({ "display": "none" });
        };
        reader.readAsDataURL(input.files[0]);
    }
}
function showtext() {
    $('.bca-text').css({ "display": "block" });
    $('.icon-show').attr("onclick", "hidetext()");
    $('.icon-show').removeClass("fa-arrow-down");
    $('.icon-show').addClass("fa-arrow-up");
}
function hidetext() {
    $('.bca-text').css({ "display": "none" });
    $('.icon-show').attr("onclick", "showtext()");
    $('.icon-show').removeClass("fa-arrow-up");
    $('.icon-show').addClass("fa-arrow-down");
}

