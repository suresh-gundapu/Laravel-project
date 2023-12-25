$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#form-student-add").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            email: "required",
            mobile: "required",
            profile: "required",
            address: "required",
            course: "required",
            status: "required",
        },
        messages: {
            first_name: "Please enter First Name",
            last_name: "Please enter Last Name",
            email: "Please enter Email",
            mobile: "Please enter Mobile",
            profile: "Please enter Profile",
            address: "Please enter Address",
            course: "Please enter Course",
            status: "Please enter Status",
        },

        errorPlacement: function (error, element) {
            if (element.attr("name") === "first_name") {
                $("#first_name_err").html(error);
            }
            if (element.attr("name") === "last_name") {
                $("#last_name_err").html(error);
            }
            if (element.attr("name") === "email") {
                $("#email_err").html(error);
            }
            if (element.attr("name") === "mobile") {
                $("#mobile_err").html(error);
            }
            if (element.attr("name") === "profile") {
                $("#profile_err").html(error);
            }
            if (element.attr("name") === "address") {
                $("#address_err").html(error);
            }
            if (element.attr("name") === "course") {
                $("#course_err").html(error);
            }
            if (element.attr("name") === "status") {
                $("#status_err").html(error);
            }
        },
    });
});
