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
                $("#dialog_addAndEdit").find("[name=contactsType]").val(data.type);
                $("#dialog_addAndEdit").find("[name=contactsContent]").val(data.content);
                $("#dialog_addAndEdit").find("[name=contactsCreateAt]").val(data.created_at);
                $("#dialog_addAndEdit").find("[name=contactsUpdateAt]").val(data.updated_at);
                $('#dialog_addAndEdit').modal('show');
            }
        },
        error: function (data) {
            notifications('danger', 'Thất bại');
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
                    notifications('success', 'Thành công');
                    //reloadDivContent();
                } else {
                    $('.loadingPanel').toggle();
                    notifications('danger', data.resultMessage);
                }
            },
            error: function (data) {
                $('.loadingPanel').toggle();
                if (data.status === 401)//Unauthorized
                {
                } else if (data.status === 422)//422 Unprocessable Entity
                {
                    var errors = data.responseJSON;
                    if (errors && errors != null) {
                        $('#dialog_addAndEdit [name=div-errors]').show();
                        var lstErrors = $('#dialog_addAndEdit [name=list-error]');
                        lstErrors.empty();
                        var html = "";
                        var total = 0;
                        if (errors['contactsType']) {
                            html += "<li>" + errors['contactsType'] + "</li>";
                            total++;
                        }
                        lstErrors.html(html);
                        $('#dialog_addAndEdit [name=total-errors]').html(total);
                    }
                } else {
                    notifications('danger', 'Thất bại');
                }
            }
        });
    });
});