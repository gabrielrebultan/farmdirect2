
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('fonts/mainfonts.css') }}" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Glyphicons -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/clean.css') }}" rel="stylesheet">
    <link href="{{ asset('css/star-rating.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

    <!-- Lightbox for Images -->
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" > <!--jquery ui-->

    <link href="{{ asset('css/photogrid.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alerts.css') }}" rel="stylesheet">

    @section('styles')
    @show

</head>

<body id="farmDirectHomepage" data-spy="scroll" data-target=".navbar" data-offset="60" style="background-color: #eee;">


    <!--
    style="background-image: url('{{ asset('images/homepage/HomepageBanner.png') }}'); background-attachment:fixed; background-position:center;"
    -->

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="{{ asset('images/homepage/logo.jpg') }}" alt=""></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    
                    @section('links')
                    @show
                    
                    <li class="nav-item"><a class="nav-link" href="/sales">Sales</a></li>
                       
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- /.Navigation -->

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('images/homepage/HomepageBanner.png') }}'); background-attachment:fixed; background-position:top; background-position:fixed;">
      <div class="container text-center">
        <div class="row">
          <div class="mx-auto">
            <div class="site-heading">
            @section('banner')
            @show
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Page Content -->
    @section('body')
    @show

    <!-- /.container -->

    <!-- footer -->
    <div class="container text-center">

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Farm Direct 2017 | University of Baguio - School of Information Technology</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.footer -->

    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lightbox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/clean.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/star-rating.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/photogrid.js') }}"></script>
    <script>
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });  
    </script>

    <script>
        $(document).ready(function(){
        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#farmDirectHomepage']").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {

            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
            scrollTop: $(hash).offset().top
            }, 900, function(){

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
            });
            } // End if
        });
        });

        $(window).scroll(function() {
        $(".slideanim").each(function(){
            var pos = $(this).offset().top;

            var winTop = $(window).scrollTop();
            if (pos < winTop + 600) {
            $(this).addClass("slide");
            }
        });
        });
    </script>

    @section('searchscript')
    @show

    @section('scripts')
    @show

</bod>

</html>
