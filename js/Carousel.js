$(document).ready(function () {
    $('.carousel').carousel(
        {
            fullWidth: false,
            indicators: false
        }
    );
});
const elems = document.querySelector('.carousel');
const duration = 3000; //milliseconds 

// Init
M.Carousel.init(elems);
// Time loop function
setInterval(function () {
    M.Carousel.getInstance(elems).next();
}, duration);