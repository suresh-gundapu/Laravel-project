var $table = $("#table");
var $statusButton = $(".status");
var $remove = $("#remove");
$(function () {
    var popoverTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="popover"]')
    );
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
    $table.on(
        "check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table",
        function () {
            $remove.prop(
                "disabled",
                !$table.bootstrapTable("getSelections").length
            );
        }
    );
    $remove.on("click", function (event) {
        var ids = $.map($table.bootstrapTable("getSelections"), function (row) {
            return row.id;
        });

        var labelElem = "<div />";
        var labelText = "Are you sure want to delete selected records ?";
        var postdata = {
            id: ids,
        };
        var optionParams = {
            title: "Delete",
            dialogClass: "dialog-confirm-box grid-status-btn-cnf",
            buttons: [
                {
                    text: "Ok",
                    bt_type: "ok",
                    click: function () {
                        $.ajax({
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            url: deleteUrl,
                            type: "POST",
                            data: postdata,
                            success: function (response) {
                                $table
                                    .bootstrapTable("destroy")
                                    .bootstrapTable();
                                toastr.success(response.message);
                                $table.bootstrapTable("remove", {
                                    field: "id",
                                    values: ids,
                                });
                                $remove.prop("disabled", true);
                            },
                        });
                        $(this).remove();
                    },
                },
                {
                    text: "Cancel",
                    bt_type: "cancel",
                    click: function () {
                        $(this).remove();
                    },
                },
            ],
        };
        jqueryUIdialogBox(labelElem, labelText, optionParams);
    });
    $statusButton.on("click", function (event) {
        var status = event.currentTarget.dataset.status;
        var ids = $.map($table.bootstrapTable("getSelections"), function (row) {
            return row.id;
        });
        if (!Array.isArray(ids) || !ids.length) {
            var alertMsg = "Please select any one record";
            jqueryUIalertBox(alertMsg, "Status");
            return false;
        }
        var labelElem = "<div />";
        var labelText = "Are you sure want to update the status ?";
        var postdata = {
            status: status,
            id: ids,
        };
        var optionParams = {
            title: "Status",
            dialogClass: "dialog-confirm-box grid-status-btn-cnf",
            buttons: [
                {
                    text: "Ok",
                    bt_type: "ok",
                    click: function () {
                        $.ajax({
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            url: updateUrl,
                            type: "POST",
                            data: postdata,
                            success: function (response) {
                                $table
                                    .bootstrapTable("destroy")
                                    .bootstrapTable();
                                toastr.success(response.message);
                            },
                        });
                        $(this).remove();
                    },
                },
                {
                    text: "Cancel",
                    bt_type: "cancel",
                    click: function () {
                        $(this).remove();
                    },
                },
            ],
        };
        jqueryUIdialogBox(labelElem, labelText, optionParams);
    });
});

function jqueryUIalertBox(msg, title, btn, width, height) {
    var labelElem = '<div class="dialog-alert-box"></div>';
    var labelText = msg;
    var optionParams = {
        title: title,
        width: width ? width : 300,
        height: height ? height : "auto",
        buttons: [
            {
                text: btn ? btn : "Ok",
                btn_alert: "ok",
                click: function () {
                    $(this).remove();
                },
            },
        ],
    };
    jqueryUIdialogBox(labelElem, labelText, optionParams);
}

function jqueryUIdialogBox(labelElem, labelText, optionParams) {
    var basicParams = {
        title: "Alert",
        autoOpen: true,
        bgiframe: true,
        modal: true,
        open: function (button_icons_arr) {},
    };
    var finalParams = $.extend({}, basicParams, optionParams);
    $(labelElem).html(labelText).dialog(finalParams);
}
