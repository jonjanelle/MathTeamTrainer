
$(document).ready(function(){
  $(".fade-in").fadeIn(300);
});


/*Carousel on landing page*/
$(document).ready(function(){
  $('.carousel').slick({
    dots: true,
    arrows: true,
    speed: 300,
    slidesToShow: 1,
    autoplay: true,
    autoplayspeed: 3000,
    centerMode: true,
  });
});
