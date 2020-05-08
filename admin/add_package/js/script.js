jQuery(".p2").fitText(0.48);


$(".hd").hover(function(){

  $(this).css({


   "width":"90%"

  }),
  
  $(".vs").css({


   "width":"10%",
    "background-size": "0%"

  }),

  $(".vs-inner").fadeOut()



},function()


{


  $(this).css({


   "width":"50%"



  }),

  $(".vs").css({


   "width":"50%",
      "background-size": "contain"

  }),

  $(".vs-inner").fadeIn()








});





$(".vs").hover(function(){

  $(this).css({


   "width":"90%",
    "background-position": "left"

  }),
  
  $(".hd").css({


   "width":"10%",
    "background-size": "0%"

  }),

  $(".hd-inner").fadeOut()



},function()


{


  $(this).css({


   "width":"50%"

  }),

  $(".hd").css({


   "width":"50%",
      "background-size": "contain"

  }),

  $(".hd-inner").fadeIn()








});


