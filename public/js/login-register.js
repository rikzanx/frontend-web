$(document).ready(function () {
    $('.pass').click(function () {
        if ($('.password').attr('type') == "password") {
            $('.password').attr('type', 'text');
            $(".pass").addClass("fa-eye-slash");
        } else {
            $('.password').attr('type', 'password');
            $(".pass").removeClass("fa-eye-slash")
        }
    });
    $('.pass-verif').click(function () {
        if ($('.password-verif').attr('type') == "password") {
            $('.password-verif').attr('type', 'text');
            $(".pass-verif").addClass("fa-eye-slash");
        } else {
            $('.password-verif').attr('type', 'password');
            $(".pass-verif").removeClass("fa-eye-slash")
        }
    });

});