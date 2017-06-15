$(document).ready(function () {
  var pac_btn = $('.row_thin_in');
  var pac_drp = $('.packages');

  $(pac_btn).click(function() {
    $(pac_drp).fadeIn('slow');
    $('html, body').animate({
      scrollTop: $(pac_drp).offset().top
    }, 'slow');
  });
});
