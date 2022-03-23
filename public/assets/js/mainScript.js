$(document).ready(function() {

    $('.owl-carousel-home').owlCarousel({
      autoplay:false,
      autoplayTimeout:5000,
      autoplayHoverPause:true,
        items:1,
        loop:true,
        nav:true,
        navText:["<i class='fal fa-chevron-left'></i>","<i class='fal fa-chevron-right'></i>"],
        videoWidth: true, // Default false; Type: Boolean/Number
        videoHeight: true, // Default false; Type: Boolean/Number


})
$('.product-carousel').owlCarousel({

    items:1,
    loop:true,
    nav:true,
    navText:["<i class='fal fa-chevron-left'></i>","<i class='fal fa-chevron-right'></i>"],


})



$('.carouselProduct').owlCarousel({
  autoplay:true,
    items:4,
    loop:true,
    nav:true,

    navText:["<i class='fal fa-chevron-left'></i>","<i class='fal fa-chevron-right'></i>"],

    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            loop:true,
    nav:true,

        },
        600:{
            items:2,
            loop:true,
    nav:true,
         },
        1000:{
            items:4,
            loop:true,
    nav:true
        }
    }
})

$(".img-container").popupLightbox({
    width: 700,
    height: 550
}
  );





  // $(".showCart").click(function () {
  //
  // $(".overlay").show();
  // $(".cartProducts").addClass("slideCartProducts");
  //
  // });


  $(".closeCart").click(function () {

    $(".overlay").hide();
    $(".cartProducts").removeClass("slideCartProducts");
    });



  $(".btn-next").append("<i class='fal fa-chevron-right'></i>")
  $(".btn-prev").append("<i class='fal fa-chevron-left'></i>")

window.onscroll = function() {
FixedNavbar()};
function FixedNavbar() {
  if (window.pageYOffset >= 100) {
    $(".navbar").addClass("fixed-top")
  } else {
    $(".navbar").removeClass("fixed-top");
  }
}





// $('.minus').click(function () {
//   var $input = $(this).parent().find('input');
//   var count = parseInt($input.val()) - 1;
//   count = count < 1 ? 1 : count;
//   $input.val(count);
//   $input.change();
//   return false;
// });
// $('.plus').click(function () {
//   var $input = $(this).parent().find('input');
//   $input.val(parseInt($input.val()) + 1);
//   $input.change();
//   return false;
// });








});

