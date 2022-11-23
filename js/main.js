// loading html element to the  main layout
$(function () {
  $("#nav-placeholder").load("assets/nav.html");
});
$(function () {
  $("#footer-placeholder").load("assets/footer.html");
});


// Back to top scrolling button
$(window).scroll(function () {
  if ($(this).scrollTop() > 200) {
    //use `this`, not `document`
    $(".icon-scroll").css({
      display: "none",
    });
  }
});
$(document).ready(function () {
  $(".scrollspy").scrollSpy();
});

$(document).ready(function () {
  $(".carousel").carousel({
    fullWidth: false,
    indicators: false,
  });
});

const elems = document.querySelector('.carousel');
const duration = 3000; //milliseconds

// Init
if(elems){
  M.Carousel.init(elems);
  // Time loop function
  setInterval(function () {
    M.Carousel.getInstance(elems).next();
  }, duration);
}


