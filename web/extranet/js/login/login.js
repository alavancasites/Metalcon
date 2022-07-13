(function (a) {
    a.fn.vAlign = function () {
        return this.each(function () {
            var b = a(this).height(), c = a(this).outerHeight(), b = (b + (c - b)) / 2;
            a(this).css("margin-top", "-" + b + "px");
            a(this).css("top", "50%");
            a(this).css("position", "absolute")
        })
    }
})(jQuery);
(function (a) {
    a.fn.hAlign = function () {
        return this.each(function () {
            var b = a(this).width(), c = a(this).outerWidth(), b = (b + (c - b)) / 2;
            a(this).css("margin-left", "-" + b + "px");
            a(this).css("left", "50%");
            a(this).css("position", "absolute")
        })
    }
})(jQuery);
$(document).ready(function () {
    if ($('#login-wrapper').length) {
        $("#login-wrapper").vAlign().hAlign()
    }
    ;
    if ($('#login-validate').length) {
        $('#login-validate').validate({
            onkeyup: false,
            errorClass: 'error',
            rules: {
                login_name: {required: true},
                login_password: {required: true}
            }
        })
    }
    if ($('#forgot-validate').length) {
        $('#forgot-validate').validate({
            onkeyup: false,
            errorClass: 'error',
            rules: {
                forgot_email: {required: true, email: true}
            }
        })
    }
    $('#pass_login').click(function () {
        $('.panel:visible').slideUp('200', function () {
            $('.panel').not($(this)).slideDown('200');
        });
        $(this).children('span').toggle();
    });
});

