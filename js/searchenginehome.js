// function searchq() {
//     var searchTxt = $("input[name='mainSearch']").val();

//     $.post("advancesearch.php", {searchVal: searchTxt}, function (echo) {
//         $('.quesarea').html(echo);
//     });
// }
// $(document).ready(function() {
//   $('#mainSearch').on("change keyup paste", function () {
//       if ($('#mainSearch').val().length > 0) {
//           $('#mainSearch').animate({marginTop: '1.5%'}, 350);
//           $('#mainSearch').animate({marginLeft: '5%'}, 350);
//           $('.mainSearch').css("text-align", "left");
//           // $('.mainSearch').css("background", "#fff");
//           $('.quesDisplay').css("display", "block");
//           // $('body').css("background", "#fff");
//       } else {
//           $('#mainSearch').animate({marginTop: '15%'}, 350);
//           $('.mainSearch').css("text-align", "center");
//           $('#mainSearch').animate({marginLeft: '0'}, 350);
//           $('.mainSearch').css("background", "transparent");
//           $('.quesDisplay').css("display", "none");
//           $('body').style.backgroundImage="url(../images/search1.png)";
//       }
//   });

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
          $('.loadfin').css("display", "block");
          $('.loadingmsg').css("display", "none");
          action = 'active';
        }
        else {
          $('.loadingmsg').css("display", "block");
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
  // $(document).click(function (e) {
  //   e.stopPropagation();
  //     $('.togbar').animate({width: '0px'}, 350);
  // });
  $('.searchtog').mouseenter(function() {
      var sicons = document.getElementByClassName('sicon-bar');
      $(sicons).css("background", "#fff");
  });
});
