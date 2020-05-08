<?php
    $navbar = '
        <header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
            <div class="container">
                <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"> '.$name_session.' </a>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">Bookings <span class="text-white divCountNT"></span><b class="glyphicon glyphicon-bell"></b></a>
                    </li>
                    <li>
                        <a href="visa_requests.php" id="visa">Visa <span class="text-white divCountNT" id="datacount"></span> <b class="glyphicon glyphicon-bell"></b></a>
                    </li>
                    <li>
                        <a href="logout.php">Logout <span class="text-white divCountNT"></span> <b class="glyphicon glyphicon-log-out"></b></a>
                    </li>
                </ul>
                </nav>
            </div>
        </header>
    ';

    $footer = '
        <script type="text/javascript">
            $(function(){
                $("#datacount").focus();
            });


            $(document).ready(function(){
                var intervalo, carregaDiv;
                (carregaDiv = function(){
                    $("#datacount").load("fetch.php", function(){
                        intervalo = setTimeout(carregaDiv, 1000);
                    });
                })();
                $("#visa").on("click", function (){
                    clearTimeout(intervalo);
                    $.ajax({
                        url: "update.php",
                        complete: function()
                        {
                            setTimeout(carregaDiv, 500);
                        }
                    });
                });
            });
        </script>
    ';
?>