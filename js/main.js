
$(function () {
  $("#nav-placeholder").load("assets/nav.html");
});
$(function () {
  $("#footer-placeholder").load("assets/footer.html");
});

$(function () {
  $("#login-placeholder").load("assets/login.html");
});




// Back to top scrolling button
$(window).scroll(function() {
  if ($(this).scrollTop() > 200) { //use `this`, not `document`
      $('.icon-scroll').css({
          'display': 'none'
      });
  }
});
$(document).ready(function(){
  $('.scrollspy').scrollSpy();
});


