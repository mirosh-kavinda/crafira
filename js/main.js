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
  $("#cards-container").load("assets/listing.html");
});

$(function () {
  $("#login-placeholder").load("assets/login.html");
});

<<<<<<< HEAD
=======

// Back to top button 
>>>>>>> 9dc83265281d8615aa8b1e3e67bb2c1d86715f12
$(window).scroll(function() {
  if ($(this).scrollTop() > 200) { //use `this`, not `document`
      $('.icon-scroll').css({
          'display': 'none'
      });
  }
});
<<<<<<< HEAD


var modal = document.getElementById('id01');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
=======
$(document).ready(function(){
  $('.scrollspy').scrollSpy();
});
     
>>>>>>> 9dc83265281d8615aa8b1e3e67bb2c1d86715f12
