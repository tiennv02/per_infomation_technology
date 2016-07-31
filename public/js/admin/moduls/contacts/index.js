/**
 * Created by tien.nguyen on 6/10/2016.
 */
function initSearch() {
    var currentPage = 1;
    if ($('[name=pagingDiv]')) {
        currentPage = $('[name=pagingDiv] .active div').html();
    }
    var data = {
        searchName: $("#tblSearch").find("[name=searchName]").val(),
        searchEmail: $("#tblSearch").find("[name=searchEmail]").val(),
        searchPhone: $("#tblSearch").find("[name=searchPhone]").val(),
        searchType: $("#tblSearch").find("[name=searchType]").val(),
        limitRows: $("[name=slRowsInPage]").val(),
        pages: currentPage
    };
    return data;
}

function selectRowsInPage() {
    selectPage();
}

function searchContacts() {
    $('.loadingPanel').toggle();
    var searchData = initSearch();
    searchData['pages'] = 1;
    $.ajax({
        type: "GET",
        url: "contacts/searchContacts",
        data: searchData,
        dataType: 'json',
        success: function (data) {
            if (data.resultCode == 'OK') {
                $('.loadingPanel').toggle();
                reloadDivContent(data);
                var objectPaging = data.lstContacts;
                intPaging($('[name=pagingDiv]'), objectPaging.limitRows, objectPaging.count, objectPaging.currentPage, objectPaging.lastPage, objectPaging.showLinkTotal);
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
        var currentPage = $('[name=currentPage]').val();
        $('.loadingPanel').toggle();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = {
            pages: currentPage,
        }
        $.ajax({
            type: 'DELETE',
            url: 'contacts/delete/' + customerId,
            data: formData,
            dataType: 'json',
            success: function (data) {
                if (data.resultCode == 'OK') {
                    $('.loadingPanel').toggle();
                    notifications('success', 'Xóa dữ liệu thành công');
                    reloadDivContent(data);
                    var objectPaging = data.lstContacts;
                    intPaging($('[name=pagingDiv]'), objectPaging.limitRows, objectPaging.count, objectPaging.currentPage, objectPaging.lastPage, objectPaging.showLinkTotal);
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

function selectPage(page) {
    $('.loadingPanel').toggle();
    var formData = initSearch();
    formData['pages'] = page;
    $.ajax({
        type: "GET",
        url: 'contacts/getLstContacts',
        data: formData,
        dataType: 'json',
        success: function (data) {
            $('.loadingPanel').toggle();
            if (data.resultCode == 'OK') {
                reloadDivContent(data);
                var objectPaging = data.lstContacts;
                intPaging($('[name=pagingDiv]'), objectPaging.limitRows, objectPaging.count, objectPaging.currentPage, objectPaging.lastPage, objectPaging.showLinkTotal);
            } else {
                notifications('danger', data.resultMessage);
            }
        },
        error: function (data) {
            $('.loadingPanel').toggle();
            Common_showErrors('danger', 'Thất bại');
        }
    });
}

function reloadDivContent(data) {
    $("#dataTables_tbody").empty();
    if (data.resultCode == 'OK') {
        var html = "";
        if (data.lstContacts
            && data.lstContacts != null
            && data.lstContacts.lstContacts
            && data.lstContacts.lstContacts != null) {
            for (i in data.lstContacts.lstContacts) {
                var item = data.lstContacts.lstContacts[i];
                var text = '<tr role="row" class="odd">'
                    + '<td>'
                    + '<samp class="glyphicon glyphicon-edit" name="lk_show_dialog_info"></samp>&nbsp;'
                    + '<samp class="glyphicon glyphicon-trash" name="lk_delete_customer"></samp>'
                    + '<input type="hidden" name="contactsId" value="' + item.id + '">'
                    + '</td>'
                    + '<td>' + item.name + '</td>'
                    + '<td>' + item.email + '</td>'
                    + '<td>' + item.phone + '</td>'
                    + '<td>' + (item.type == 2 ? 'Ðã xử lý' : 'Chưa xử lý') + '</td>'
                    + '<td class="word-break-all-200p"><div class="text-overflow-hide">' + item.content + '</div></div></td>'
                    + '<td>' + Common_formatDateTime(new Date(item.created_at), 'dd/MM/yyyy hh:MM:ss') + '</td>'
                    + '<td>' + Common_formatDateTime(new Date(item.updated_at), 'dd/MM/yyyy hh:MM:ss')  + '</td>'
                    + '</tr>';
                html += text;
            }
        }
        $("#dataTables_tbody").html(html);
        $("[name=totalRowPage]").text(data.lstContacts.lstContacts.length);
        $("[name=countRows]").text(data.lstContacts.count);
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
