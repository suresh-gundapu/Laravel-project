$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#form-register").validate({
        rules: {
            name: "required",
            email: "required",
            password: "required",
            password_confirmation: "required",
        },
        messages: {
            name: "Please enter Name",
            email: "Please enter Email",
            password: "Please enter Password",
            password_confirmation: "Please enter Confirm Password",
        },

        errorPlacement: function (error, element) {
            if (element.attr("name") === "name") {
                $("#name_err").html(error);
            }
            if (element.attr("name") === "email") {
                $("#email_err").html(error);
            }
            if (element.attr("name") === "password") {
                $("#password_err").html(error);
            }
            if (element.attr("name") === "password_confirmation") {
                $("#cpassword_err").html(error);
            } else {
                error.insertAfter(element.parent());
            }
        },
    });
});
