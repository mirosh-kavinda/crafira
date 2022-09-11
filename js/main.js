$(function () {
  $("#nav-placeholder").load("../CRAFIRA/assets/nav.html");
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

$(window).scroll(function() {
  if ($(this).scrollTop() > 200) { //use `this`, not `document`
      $('.icon-scroll').css({
          'display': 'none'
      });
  }
});