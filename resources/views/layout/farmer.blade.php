<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel') }} | Farmer</title>

    <link href="{{ asset('fonts/mainfonts.css') }}" rel="stylesheet">
   
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- for glyphicons -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Main CSS styling -->
    <link href="{{ asset('css/clean.css') }}" rel="stylesheet">

    <!-- Custom -->
    <link href="{{ asset('css/main-farmer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alerts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/imagecontrol.css') }}" rel="stylesheet">

    <!-- Plugins -->
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/star-rating.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet"> <!--jquery ui-->
    <link href="{{ asset('css/photogrid.css') }}" rel="stylesheet">
    
    @section('styles')
    @show

</head>

<body style="background-color:#eee; ">

    @section('modal')
    @show

    <!-- Navigation -->
    <nav class="navbar navbar-expand fixed-top navbar-light" style="background-color:white;">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <a class="navbar-brand" href="/farmer"><img src="{{ asset('images/homepage/logo.jpg') }}" alt=""></a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/farmer">
                            <i class="fa fa-dollar fa-2x">&nbsp;</i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/farmer/looking-for">
                            <i class="fa fa-search fa-2x">&nbsp;</i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/farmer/add-sale">
                            <i class="fa fa-plus fa-2x">&nbsp;</i>
                        </a>
                    </li>
                    <!--logout-->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user fa-2x">&nbsp;</i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <a class="dropdown-item" href="/farmer/editprofile">
                                <span class="fa fa-user-o"></span> My Profile
                            </a>
                            <a class="dropdown-item" href="/farmer/transaction-history" data-toggle="tooltip" data-placement="bottom" title="Transaction History">
                                <span class="fa fa-star-o"></span> Transaction History
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="fa fa-power-off"></span> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                    <!--logout-->
                </ul>
            </div>
            <!-- Notification -->
            <div class="form-inline ml-auto">
                <div class="btn-group dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <div class="fa-stack fa-1x">
                            <i class="fa fa-bell-o fa-stack-2x"></i>
                            <span class="fa-stack-1x circle-text "><strong class="badge badge-danger pull-right">0</strong></span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-notifications" role="menu">
                        <div class="dropdown-item">
                            <small>No notifications available</small>
                        </div>
                        <i class="divider"></i>
                    </div>
                </div>   

                <!-- logout -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                <!-- logout-->

            </div>
            <!-- END OF Notification -->
        </div>
    </nav>
    <!-- /.Navigation -->

    <!-- Page Header -->
    @section('banner')
    @show

    <!-- Page Content -->
    <div class="container">

        @section('body')
        @show

    </div>

    <!-- footer -->
    @section('footer')
    <footer>
    <div class="container text-center">
        <p>Copyright &copy; Farm Direct 2017 | University of Baguio - School of Information Technology</p>
    </div>
    </footer>
    @show
    <!-- /.footer -->

    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/clean.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/star-rating.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lightbox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script> <!--bago-->
    <script type="text/javascript" src="{{ asset('js/photogrid.js') }}"></script>
    <script>
        $("#alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });  
    </script>

    @section('scripts')
    @show


</body>

</html>
