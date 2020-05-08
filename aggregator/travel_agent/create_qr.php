<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - QR Code Generator</title>


</head>
<body>
<!-- partial:index.partial.html -->
<div class="container-fluid">
  <div class="text-center">
    <img src="https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0"
         id="myimg">

  </div>

  <div class="form-horizontal">
    <div class="form-group">
  
      <div class="col-sm-10">
        <input type="text" class="form-control" id="content" placeholder="Enter content">
      </div>
    </div>
    <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10">
        <button type="button" class="btn btn-default" id="generate">Generate</button>
      </div>
    </div>
  </div>
</div>



  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>






<script type="text/javascript">
  



function htmlEncode (value){
  return $('<div/>').text(value).html();
}


$(function() {
  $("#generate").click(function() {




  



    var url="www.abcde.com?id="+$("#content").val();




    for(i=0;i<10;i++)
    {



     
    

    // $(".qr-code").attr("src", "https://chart.googleapis.com/chart?cht=qr&chl=" + htmlEncode($("#content").val()) + "&chs=160x160&chld=L|0");


    var urf=url+"_"+i;


    // // alert(urf);
    // $(".text-center").append("<img src='https://chart.googleapis.com/chart?cht=qr&chl=" + htmlEncode(urf)+ "&chs=160x160&chld=L|0' class='qr-code img-thumbnail img-responsive'>");




    var urt="https://chart.googleapis.com/chart?cht=qr&chl=" + htmlEncode(urf)+ "&chs=160x160&chld=L|0";


    $.post("up.php",
         {
            url: urt,
            count:i
         },
         function(data, status){
            
            
            
            
         });

}
  });




});























// var node = document.getElementById('my-node');
// var btn = document.getElementById('foo');

// btn.onclick = function() {



// node.innerHTML = "I'm an image now.";
//   domtoimage.toBlob(document.getElementById('my-node'))
//     .then(function(blob) {
//       window.saveAs(blob, 'my-node.png');
//     });
// }








</script>
</body>
</html>
