$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $("#form-login").validate({
        rules: {
            username: "required",
            password: "required",
        },
        messages: {
            username: "Please enter UserName",
            password: "Please enter Password",
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "username") {
                $("#username_err").html(error);
            } else {
                error.insertAfter(element.parent());
            }
            if (element.attr("name") === "password") {
                $("#password_err").html(error);
            }
        },
    });
});
