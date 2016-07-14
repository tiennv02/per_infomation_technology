/**
 * Created by forever-pc on 12/07/2016.
 */
function getDataContactsById(contactsId) {
    $.ajax({
        type: "GET",
        url: 'contacts/get/' + contactsId,
        success: function (data) {
            if (data && data != null) {
                $('#dialog_addAndEdit [name=div-errors]').hide();
                $("#dialog_addAndEdit").find("[name=contactsId]").val(data.id);
                $("#dialog_addAndEdit").find("[name=contactsName]").val(data.name);
                $("#dialog_addAndEdit").find("[name=contactsEmail]").val(data.email);
                $("#dialog_addAndEdit").find("[name=contactsPhone]").val(data.phone);
                $("#dialog_addAndEdit [name=contactsType] option[value='" + data.type + "']").prop("selected", true);
                $("#dialog_addAndEdit").find("[name=contactsContent]").val(data.content);
                $("#dialog_addAndEdit").find("[name=contactsCreateAt]").val(data.created_at);
                $("#dialog_addAndEdit").find("[name=contactsUpdateAt]").val(data.updated_at);
                $('#dialog_addAndEdit').modal('show');
            }
        },
        error: function (data) {
            Common_showErrors('danger', 'Thất bại');
        }
    });
}

function saveContacts() {
    $('.loadingPanel').toggle();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var formData = {
        contactsType: $("#dialog_addAndEdit").find("[name=contactsType]").val()
    }
    var contactsId = $("#dialog_addAndEdit").find("[name=contactsId]").val();
    var type = "PUT";
    var url = "contacts/update/" + contactsId;
    $.ajax({
        type: type,
        url: url,
        data: formData,
        dataType: 'json',
        success: function (data) {
            if (data.resultCode == 'OK') {
                $('#dialog_addAndEdit').modal('hide');
                $('.loadingPanel').toggle();
                Common_notifications('success', 'Thành công');
                reloadDivContent(data);
            } else {
                $('.loadingPanel').toggle();
                Common_showErrors('danger', data.resultMessage);
            }
        },
        error: function (data) {
            $('.loadingPanel').toggle();
            if (data.status === 401)//Unauthorized
            {
            } else if (data.status === 422)//422 Unprocessable Entity
            {
                var errors = '';
                for (datos in data.responseJSON) {
                    errors += data.responseJSON[datos] + '<br/>';
                }
                Common_showErrors(data.status, errors);
            } else {
                Common_showErrors('danger', 'Thất bại');
            }
        }
    });
}

function resetValueFormDailog() {
    $('#dialog_addAndEdit [name=div-errors]').hide();
    $("#dialog_addAndEdit").find("[name=contactsId]").val('');
    $("#dialog_addAndEdit").find("[name=contactsName]").val('');
    $("#dialog_addAndEdit").find("[name=contactsEmail]").val('');
    $("#dialog_addAndEdit").find("[name=contactsPhone]").val('');
    $("#dialog_addAndEdit").find("[name=contactsType]").val('');
    $("#dialog_addAndEdit").find("[name=contactsContent]").val('');
    $("#dialog_addAndEdit").find("[name=contactsCreateAt]").val('');
    $("#dialog_addAndEdit").find("[name=contactsUpdateAt]").val('');
}

$(document).ready(function () {
    $('#dialog_addAndEdit [name=dialog_addAndEdit_close]').click(function () {
        $('#dialog_addAndEdit').modal('hide');
    });
    $('#dialog_addAndEdit [name=dialog_addAndEdit_save]').click(function (e) {
        saveContacts();
    });
});