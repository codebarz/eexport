function searchq() {
    var searchTxt = $("input[name='mainSearch']").val();

    $.post("searchfetch.php", {searchVal: searchTxt}, function (echo) {
        $('.quesarea').html(echo);
    });
}
$(document).ready(function() {
  $('#mainSearch').on("change keyup paste", function () {
      if ($('#mainSearch').val().length > 0) {
          $('#mainSearch').css("margin-top", "1.5%");
          $('#mainSearch').css("margin-left", "5%");
          $('.mainSearch').css("text-align", "left");
          $('.mainSearch').css("background", "#fff");
          $('.quesDisplay').css("display", "block");
          $('body').css("background", "#fff");
      } else {
          $('#mainSearch').css("margin-top", "15%");
          $('.mainSearch').css("text-align", "center");
          $('#mainSearch').css("margin-left", "0");
          $('.mainSearch').css("background", "transparent");
          $('.quesDisplay').css("display", "none");
          $('body, html').css("background", "#f7f7f7");
      }
  });

  var limit = 7;
  var start = 0;
  var action = 'inactive';

  function load_data (limit, satrt) {
    $.ajax({
      url: "searchfetch.php",
      method: "POST",
      data: {limit:limit, start:start},
      cache: false,
      success: function(data) {
        $('.quesarea').append(data);
        if (data == '') {
          $('.loadingmsg').html("No data Found");
          action = 'active';
        }
        else {
          $('.loadingmsg').html("Loading...");
          action = 'inactive';
        }
      }
    });
  }

  if (action =='inactive') {
    action = 'active';
    load_data(limit, start);
  }
  $(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() > $(".quesarea").height() && action == 'inactive') {
      action = 'active';
      start = start + limit;
      setTimeout(function() {
        load_data(limit, start);
      }, 1000);
    }
  });

  $('.searchtog').click(function (e) {
    e.stopPropagation();
      $('.togbar').animate({width: 'toggle'}, 350);
  });
  $('.closetogbar').click(function (e) {
    e.stopPropagation();
      $('.togbar').animate({width: 'toggle'}, 350);
  });
  $(document).click(function (e) {
    e.stopPropagation();
      $('.togbar').animate({width: 'toggle'}, 350);
  });
  $('.searchtog').mouseenter(function() {
      var sicons = document.getElementByClassName('sicon-bar');
      $(sicons).css("background", "#fff");
  });
});
