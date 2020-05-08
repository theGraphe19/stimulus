var swiper = new Swiper('.blog-slider', {
      spaceBetween: 30,
      effect: 'fade',
      loop: true,
      mousewheel: {
        invert: false,
      },
      // autoHeight: true,
      pagination: {
        el: '.blog-slider__pagination',
        clickable: true,
      }
    });


var mySwiper = document.querySelector('.blog-slider').swiper;

// Now you can use all slider methods like


var mySwiper2 = document.querySelector('.blog-slider2').swiper;



var mySwiper3 = document.querySelector('.blog-slider3').swiper;



for(var i=0;i<9;i++)
{
   setInterval(function(){  
    mySwiper.slideNext();
}, 6000);
}



for(var i=0;i<9;i++)
{
   setInterval(function(){  
    mySwiper2.slideNext();
}, 5000);
}





for(var i=0;i<9;i++)
{
   setInterval(function(){  
    mySwiper3.slideNext();
}, 4000);
}