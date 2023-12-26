$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#form-register").validate({
        rules: {
            name: "required",
            username: "required",
            email: "required",
            password: "required",
            password: {
                minlength: 5,
                required: true,
            },
            password_confirmation: {
                minlength: 5,
                required: true,
                equalTo: "#password",
            },
        },
        messages: {
            name: "Please enter Name",
            username: "Please enter UserName",

            email: "Please enter Email",
            password: {
                required: "Please enter Password",
                minlength: "Password should be atleast 5 charecters",
            },
            password_confirmation: {
                required: "Please enter Confirm Password",
                minlength: "Confirm Password should be atleast 5 charecters",
                equalTo: "Confirm password should be matched with password",
            },
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
            if (element.attr("name") === "name") {
                $("#name_err").html(error);
            }
            if (element.attr("name") === "password_confirmation") {
                $("#cpassword_err").html(error);
            }
            if (element.attr("name") === "username") {
                $("#username_err").html(error);
            }
        },
    });
});
