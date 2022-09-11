$(function () {
  $("#nav-placeholder").load("assets/nav.html");
});
$(function () {
  $("#footer-placeholder").load("assets/footer.html");
});
$(function () {
  $("#carousel-placeholder").load("assets/carousel.html");
});

$(function () {
  $("#cards-container").load("assets/cards.html");
});

$(function () {
  $("#login-placeholder").load("assets/login.html");
});



$(window).scroll(function() {
  if ($(this).scrollTop() > 200) { //use `this`, not `document`
      $('.icon-scroll').css({
          'display': 'none'
      });
  }
});


$(document).ready(function(){
  $('.modal').modal({
    opacity:1,
    preventScrolling:true,
    dismissible: false,
    closeIcon: true
  });
});
        

$('modal-trigger').leanModal({
  closeIcon: true
});