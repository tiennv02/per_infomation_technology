/**
 * Created by Administrator on 6/30/2016.
 */
/**
 *  show message notifications
 * @param type = {info, success, warning, danger, inverse, blackgloss}
 * @param text
 */
function notifications(type, text) {
    $('.notifications').notify({
        type: type,
        message: {text: text}
    }).show();
}