/**
 * Created by ORUME on 12/17/2016.
 */

function formOpen() {

    var loginBtn = $('.loginBtn');

    if (loginBtn) {
        $('.forms').fadeIn('slow');
        $('.formArea').effect("bounce", {times:20});
    }
}
function formClose() {
    var close = document.getElementsByClassName("close");

    if (close) {
        $('.forms').fadeOut('slow');
    }
}


