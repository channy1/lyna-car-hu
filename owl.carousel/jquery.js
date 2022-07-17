$(document).ready(function(){
    $(".owl-carousel").owlCarousel();
});
var owl = $('.owl-carousel');
owl.owlCarousel({
    // items:4,
    ltr: true,
    loop:true,
    margin:0,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    responsiveClass: true,
    responsiveRefreshRate: true,
    responsive : {
          0 : {
              items: 1
          },
          768 : {
              items: 1
          },
          960 : {
              items: 4
          },
          1200 : {
              items: 4
          },
          1920 : {
              items: 4
          }
      }

});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})

// center image for customers section