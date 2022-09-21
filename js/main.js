
$(function () {
  $("#nav-placeholder").load("assets/nav.html");
});
$(function () {
  $("#footer-placeholder").load("assets/footer.html");
});

$(function () {
  $("#login-placeholder").load("assets/login.html");
});


$("a").click(function(){
  alert("The paragraph was clicked.");
});

// Back to top button 
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


