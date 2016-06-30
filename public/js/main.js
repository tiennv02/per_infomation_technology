/**
 * Created by Administrator on 6/30/2016.
 */
function sendContact() {
    $('.loadingPanel').toggle();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var formData = {
        name: $('#contact [name=name]').val(),
        email: $('#contact [name=email]').val(),
        phone: $('#contact [name=phone]').val(),
        content: $('#contact [name=content]').val(),
    };
    $.ajax({
        type: "POST",
        url: 'contacts/create',
        data: formData,
        dataType: 'json',
        success: function (data) {
            $('.loadingPanel').toggle();
            if (data.resultCode == 'OK') {
                notifications('success', 'Hoàn thành');
            } else {
                notifications('danger', data.resultMessage);
            }
        },
        error: function (data) {
            $('.loadingPanel').toggle();
            if (data.status === 401)//Unauthorized
            {
            } else if (data.status === 422)//422 Unprocessable Entity
            {
            } else {
                notifications('danger', 'Fail');
            }
        }
    });
}

$(document).ready(function () {
    $('#contact [name=btnSendContact]').click(function () {
        sendContact();
    });
});