jQuery(".p2").fitText(0.48);


$(".hd").hover(function(){

  $(this).css({


   "width":"75%",

    "background-position": "right"

  }),
  
  $(".vs").css({


   "width":"25%",
    "background-size": "0%"

  }),


  $(".hd_lat").css({


    "background-size": "auto 100% "

  }),





  $(".hd_usp").fadeIn('slow'),
  
  $(".vs-inner").fadeOut(),
  $(".hd_country_con").fadeIn('slow');



},function()


{


  $(this).css({


   "width":"50%"



  }),

  $(".vs").css({


   "width":"50%",
      "background-size": "contain"

  }),

  $(".vs-inner").fadeIn(),


  $(".hd_lat").css({


    "background-size": "0px 0px"

  }),




  $(".hd_usp").fadeOut('fast'),

$(".hd_country_con").fadeOut();




});













/*Dropdown Menu*/
$('.dropdown_sd').click(function () {


        $(this).attr('tabindex', 1).focus();
        $(this).toggleClass('active');
        $(this).find('.dropdown-menu_sd').slideToggle(300);
    });
    $('.dropdown_sd').focusout(function () {
        $(this).removeClass('active');
        $(this).find('.dropdown-menu_sd').slideUp(300);
    });
    $('.dropdown_sd .dropdown-menu_sd li').click(function () {
        $(this).parents('.dropdown_sd').find('span').text($(this).text());
        // $(this).parents('.dropdown_sd').find('input').attr('value', $(this).attr('id'));
        var x=$(this).attr('id');
      
        
        $(this).parent().parent().parent().find(".selected_coun").val(x);
        
    });
/*End Dropdown Menu*/


// $('.dropdown-menu_sd li').click(function () {
//   var input = '<strong>' + $(this).parents('.dropdown_sd').find('input').val() + '</strong>',
//       msg = '<span class="msg">Hidden input value: ';
//   $('.msg').html(msg + input + '</span>');
// }); 

























$(".vs").hover(function(){

  $(this).css({


   "width":"75%",
    "background-position": "-7% 0%"

  }),




  $(".vs_lat").css({



    "background-size": "auto 100% "

  }),





  
  $(".hd").css({


   "width":"25%",
    "background-size": "0%"

  }),

  $(".vs_usp").fadeIn('slow'),
  
  $(".hd-inner").fadeOut(),
  $(".visa_country_con").fadeIn('slow');



},function()


{


  $(this).css({


   "width":"50%"

  }),

  $(".hd").css({


   "width":"50%",
      "background-size": "contain"

  }),

  $(".vs_usp").fadeOut('fast'),


  $(".hd-inner").fadeIn(),
$(".visa_country_con").fadeOut(),


  


  $(".vs_lat").css({


    "background-size": "0 0 "

  })


});











jQuery(window).scroll(startCounter);
function startCounter() {
    var hT = jQuery('.love_counter').offset().top,
        hH = jQuery('.love_counter').outerHeight(),
        wH = jQuery(window).height();
    if (jQuery(window).scrollTop() > hT+hH-wH) {
        jQuery(window).off("scroll", startCounter);
        jQuery('.love_count').each(function () {
            var $this = jQuery(this);
            jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
                duration: 2000,
                easing: 'swing',
                step: function () {
                    $this.text(Math.ceil(this.Counter) );
                }
            });
        });
    }
}