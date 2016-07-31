/**
 * Created by Administrator on 6/30/2016.
 */
function Common_formatDateTime(date, formatDate = null) {
    var year = date.getFullYear();
    var month = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth();
    var day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate();
    var hour = date.getHours() < 10 ? '0' + date.getHours() : date.getHours();
    var min = date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes();
    var seconds = date.getSeconds() < 10 ? '0' + date.getSeconds() : date.getSeconds();
    switch (formatDate) {
        case 'dd/MM/yyyy hh:MM:ss':
            return day + '/' + month + '/' + year + ' ' + hour + ':' + min + ':' + seconds;
            break;
        default:
            return day + '/' + month + '/' + year;
            break;
    }
    return '';
}
/**
 *  show message notifications
 * @param type = {info, success, warning, danger, inverse, blackgloss}
 * @param text
 */
function Common_notifications(type, msg) {
    $('.notifications').notify({
        type: type,
        message: {html: msg, text: msg}
    }).show();
}
/**
 * get string by object
 */
function Common_getString(object) {
    return (object && object != null && object != '') ? object : '';
}
/**
 * show message error
 */
function Common_showErrors(status, msg) {
    console.log('status: ' + status + ' ----- msg: ' + JSON.stringify(msg));
    if (status === 401)//Unauthorized
    {
    } else if (status === 422)//422 Unprocessable Entity
    {
        Common_notifications('danger', msg);
    } else {
        Common_notifications('danger', 'Thất bại');
    }
}