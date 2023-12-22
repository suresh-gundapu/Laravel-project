$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#form-login").validate({
        rules: {
            email: "required",
            password: "required",
        },
        messages: {
            email: "Please enter Email",
            password: "Please enter Password",
        },

        errorPlacement: function (error, element) {
            if (element.attr("name") === "email") {
                $("#email_err").html(error);
            } else {
                error.insertAfter(element.parent());
            }
            if (element.attr("name") === "password") {
                $("#password_err").html(error);
            }
        },
    });
});
