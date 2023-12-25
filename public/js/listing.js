function ajaxRequest(params) {
    $.get(listingUrl + "?" + $.param(params.data)).then(function (res) {
        params.success({
            rows: res.data,
            total: res.count,
        });
    });
}

function LinkFormatter(value, row, index) {
    var versionNo =
        row.version_id == undefined || row.version_id == ""
            ? ""
            : row.version_id;
    if (row.id) {
        if (versionNo) {
            return (
                "<a href=" +
                edit_url +
                "/" +
                row.id +
                "/" +
                versionNo +
                ">" +
                value +
                "</a>"
            );
        }
        return "<a href='edit/" + row.id + "'>" + value + "</a>";
    }
}
function MultiLinkFormatter(value, row, index) {
    var parentId =
        row.parent_id == undefined || row.parent_id == "" ? "" : row.parent_id;
    if (row.id) {
        if (parentId) {
            return (
                "<a href=" +
                editUrl +
                "/" +
                parentId +
                "/" +
                row.id +
                ">" +
                value +
                "</a>"
            );
        }
        return "<a href='edit/" + row.id + "'>" + value + "</a>";
    }
}
function dateFormatter(value, row, index) {
    if (value) {
        return moment(value).format("DD/MM/YYYY hh:mm");
    }
}

function ThemeLinkFormatter(value, row, index) {
    var themeTypeId =
        row.theme_type_id == undefined || row.theme_type_id == ""
            ? ""
            : row.theme_type_id;

    if (row.id) {
        if (themeTypeId) {
            return (
                "<a href='edit/" +
                themeTypeId +
                "/" +
                row.id +
                "'>" +
                value +
                "</a>"
            );
        }
        return "<a href='edit/" + row.id + "'>" + value + "</a>";
    }
}

function ImageFormatter(value, row, index) {
    return `<img src="${imageUrl}/${value}" style="width:100px;height:100px" >`;
}
