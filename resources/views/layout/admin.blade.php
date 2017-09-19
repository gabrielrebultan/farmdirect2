<!--

    NOTES: 
    This page currently uses Bootstrap 3.3.7 Framework
    All child pages with data tables are dependent to it.
    Changing the bootstrap framework might destroy the Data Table's Formats
    I am currently waiting for the updates of the data tables for bootstrap 4.

-->


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Farm Direct | Admin</title>

    <link href="{{ asset('fonts/mainfonts.css') }}" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/sb-2-bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('css/metisMenu.css') }}" rel="stylesheet">

    <!-- DataTables and DataTables:Responsive CSS -->
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.responsive.css') }}" rel="stylesheet">

    <!-- Date-time Picker CSS -->
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main-admin.css') }}" rel="stylesheet">

    <!-- Font awesome -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Star Rating -->
    <link href="{{ asset('css/star-rating.css') }}" rel="stylesheet">

</head>

<body>

    @section('modals')
    @show

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom:0; color:#eee:">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">FarmDirect Admin</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="/admin/reports/"><i class="fa fa-line-chart"></i> Reports</a>
                </li>
                <!--test logout-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> {{ Auth::user()->fname.' '.Auth::user()->middleinitial.' '.Auth::user()->lname }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="fa fa-power-off">&nbsp</span> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                <!--test logout-->
            </ul>

            <div class="sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="/admin/home/"><i class="fa fa-th"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-user"></i> Users<i class="fa fa-chevron-down pull-right"></i></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/admin/registrants/">Registrants</a>
                                </li>
                                <li>
                                    <a href="/admin/users/">Active Users</a>
                                </li>
                                <li>
                                    <a href="/admin/deactivatedusers/">Deactivated Users</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/admin/farm-products/"><i class="fa fa-tree"></i> Farm Products</a>
                        </li>
                        <li>
                            <a href="/admin/feedbacks/"><i class="fa fa-comment"></i> Feedbacks</a>
                        </li>
                        <li>
                            <a href="/admin/sales/"><i class="fa fa-shopping-cart"></i> Sales</a>
                        </li>
                        <li>
                            <a href="/admin/looking-to-buy/"><i class="fa fa-search"></i> Looking to buy</a>
                        </li>
                        @if(Auth::user()->type == "Super Admin")
                        <li>
                            <a href="/fd-sAdmin/system-personnel-registration"><i class="fa fa-plus"></i> Add System Personnel</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /Navigation -->

        <div id="page-wrapper">
            <div class="row" style="padding:20px 5px;">
                <div class="col-lg-12">

                    @section('body')
                    @show

                </div>
                <!-- /.col-lg-12 -->
            </div>
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/sb-2-bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" src="{{ asset('js/metisMenu.min.js') }}"></script>

    <!-- DataTables JavaScript -->
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/star-rating.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>
    
    @section('Datatable')
    @show

</body>

</html>
