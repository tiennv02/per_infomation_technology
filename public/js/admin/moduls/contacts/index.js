/**
 * Created by tien.nguyen on 6/10/2016.
 */
function searchContacts() {
    var formData = {
        searchName: $("#tblSearch").find("[name=searchName]").val(),
        searchEmail: $("#tblSearch").find("[name=searchEmail]").val(),
        searchPhone: $("#tblSearch").find("[name=searchPhone]").val(),
        searchType: $("#tblSearch").find("[name=searchType]").val()
    }
    $('.loadingPanel').toggle();
    $.ajax({
        type: "GET",
        url: "contacts/searchContacts",
        data: formData,
        dataType: 'json',
        success: function (data) {
            if (data.resultCode == 'OK') {
                $('.loadingPanel').toggle();
                reloadDivContent(data);
            } else {
                notifications('danger', data.resultMessage);
            }
        },
        error: function (data) {
        }
    });
}

function deleteContacts(customerId) {
    if (confirm('Bạn chắc chắn muốn xóa thông tin liên hệ?')) {
        $('.loadingPanel').toggle();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'DELETE',
            url: 'contacts/delete/' + customerId,
            success: function (data) {
                if (data.resultCode == 'OK') {
                    $('.loadingPanel').toggle();
                    notifications('success', 'Xóa dữ liệu thành công');
                    reloadDivContent(data);
                } else {
                    notifications('danger', data.resultMessage);
                }
            },
            error: function (data) {
                $('.loadingPanel').toggle();
                notifications('danger', 'Thất bại')
            }
        });
    }
}

function reloadDivContent(data) {
    $("#dataTables_tbody").empty();
    if (data.resultCode == 'OK') {
        var html = "";
        if (data.lstContacts && data.lstContacts != null) {
            for (i in data.lstContacts.data) {
                var item = data.lstContacts.data[i];
                var text = '<tr role="row" class="odd">'
                    + '<td class="sorting_1">'
                    + '<samp class="glyphicon glyphicon-edit" name="lk_show_dialog_info"></samp>&nbsp;'
                    + '<samp class="glyphicon glyphicon-trash" name="lk_delete_customer"></samp>'
                    + '<input type="hidden" name="contactsId" value="' + item.id + '">'
                    + '</td>'
                    + '<td class="sorting_1">' + item.name + '</td>'
                    + '<td>' + item.email + '</td>'
                    + '<td>' + item.phone + '</td>'
                    + '<td>' + (item.type == 2 ? 'Ðã xử lý' : 'Chưa xử lý') + '</td>'
                    + '<td class="word-break-all-200p"><div class="text-overflow-hide">' + item.content + '</div></div></td>'
                    + '<td>' + item.created_at + '</td>'
                    + '<td>' + item.updated_at + '</td>'
                    + '</tr>';
                html += text;
            }
        }
        $("#dataTables_tbody").html(html);
        enableAction();
    }
}

function enableAction() {
    $("[name=lk_show_dialog_info]").unbind();
    $("[name=lk_show_dialog_info]").click(function () {
        var id = $(this).closest("tr").find("[name=contactsId]").val();
        getDataContactsById(id);
    });
    $("[name=lk_delete_customer]").unbind();
    $("[name=lk_delete_customer]").click(function () {
        var id = $(this).closest("tr").find("[name=contactsId]").val();
        deleteContacts(id);
    });
    $("[name=btnSearch]").unbind();
    $("[name=btnSearch]").click(function () {
        searchContacts();
    });
}

$(document).ready(function () {
    enableAction();
});
