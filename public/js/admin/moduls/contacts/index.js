/**
 * Created by tien.nguyen on 6/10/2016.
 */
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
                    reloadDivContent();
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

function reloadDivContent() {
    //$.ajax({
    //    type: "GET",
    //    url: "customers/getListCustomers",
    //    success: function (data) {
    //        $("#dataTables_tbody").empty();
    //        if (data.resultCode == 'OK') {
    //            var html = "";
    //            for (i in data.lstCustomers.data) {
    //                var item = data.lstCustomers.data[i];
    //                var text = '<tr class="gradeA odd" role="row">'
    //                    + '<td>'
    //                    + '<samp class="glyphicon glyphicon-edit" name="lk_show_dialog_info"></samp>&nbsp;'
    //                    + '<samp class="glyphicon glyphicon-trash" name="lk_delete_customer"></samp>'
    //                    + '<input type="hidden" name="customerId" value="' + item.id + '"/>'
    //                    + '</td>'
    //                    + '<td>' + item.name + '</td>'
    //                    + '<td>' + item.email + '</td>'
    //                    + '<td>' + item.descriptions + '</td>'
    //                    + '<td class="center">' + item.created_at + '</td>'
    //                    + '<td class="center">' + item.updated_at + '</td>'
    //                    + '</tr>';
    //                html += text;
    //            }
    //            $("#dataTables_tbody").html(html);
    //            enableAction();
    //        }
    //    },
    //    error: function (data) {
    //    }
    //});
}

function enableAction() {
    $("[name=lk_show_dialog_info]").click(function () {
        var id = $(this).closest("tr").find("[name=contactsId]").val();
        getDataContactsById(id);
    });
    $("[name=lk_delete_customer]").click(function () {
        var id = $(this).closest("tr").find("[name=contactsId]").val();
        deleteContacts(id);
    });
}

$(document).ready(function () {
    enableAction();
});
