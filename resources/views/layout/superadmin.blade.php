<!-- 
MASTER PAGE OF ADMIN
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

    <!-- DataTables CSS -->
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('css/dataTables.responsive.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom:0;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Farm Direct | Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!--test logout-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        
                        {{ Auth::user()->fname.' '.Auth::user()->middleinitial.' '.Auth::user()->lname }} <span class="caret"></span>
                        
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="glyphicon glyphicon-off">&nbsp</span> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                <!--test logout-->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="/admin/home/"><i class="glyphicon glyphicon-th pull-right"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Users<span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/admin/registrants/">Registrants <span class="glyphicon glyphicon-pencil pull-right"></a>
                                </li>
                                <li>
                                    <a href="/admin/users/">Active Users <span class="glyphicon glyphicon-user pull-right"></a>
                                </li>
                                <li>
                                    <a href="/admin/deactivatedusers/">Deactivated Users <span class="glyphicon glyphicon-floppy-disk pull-right"></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Farm Products<span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/admin/farm-products/">Farm Products <span class="glyphicon glyphicon-tree-deciduous pull-right"></a>
                                </li>
                                <li>
                                    <a href="/admin/add-farm-products/">Add new <span class="glyphicon glyphicon-plus pull-right"></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/admin/feedbacks/"><i class="glyphicon glyphicon-comment pull-right"></i> Feedbacks</a>
                        </li>
                        <li>
                            <a href="/admin/sales/"><i class="glyphicon glyphicon-shopping-cart pull-right"></i> Sales</a>
                        </li>
                        <li>
                            <a href="/admin/looking-to-buy/"><i class="glyphicon glyphicon-search pull-right"></i> Looking to buy</a>
                        </li>
                        @if(Auth::user()->type == "Super Admin")
                        <li>
                            <a href="/fd-sAdmin/system-personnel-registration"><i class="glyphicon glyphicon-plus pull-right"></i> Add System Personnel</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /Navigation -->

        <div id="page-wrapper">
            <div class="row">
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
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/sb-2-bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('js/metisMenu.min.js') }}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>
    
    @section('Datatable')
    @show

</body>

</html>
