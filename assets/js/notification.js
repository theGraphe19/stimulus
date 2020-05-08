    $(function()
    {
        $("#datacount").focus();
    });


    $(document).ready(function(){
        var intervalo, carregaDiv;
        (carregaDiv = function(){
            $("#datacount").load("../../admin/fetch.php", function(){
                intervalo = setTimeout(carregaDiv, 1000);
            });
        })();
        $("#visa").on("click", function (){
            clearTimeout(intervalo);
            $.ajax({
                url: "../../admin/update.php",
                complete: function()
                {
                    setTimeout(carregaDiv, 500);
                }
            });
        });
    });