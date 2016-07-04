/**
 * Created by Administrator on 6/30/2016.
 */
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