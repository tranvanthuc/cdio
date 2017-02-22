<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Startmin - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('admin/css/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ asset('admin/css/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('admin/css/startmin.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('admin/css/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ asset('admin/js/ckeditor/ckeditor.js') }}"> </script>
    <script type="text/javascript" >
    var baseUrl = "{{ url('/') }}";
    </script>

    <script type="text/javascript" src="{{ asset('admin/js/func_ckfinder.js') }}"> </script>


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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Startmin</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ route('getLogout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar " role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                    </li>
                    <li>
                        <a href="{{ url('/admin/dashboard') }}" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    @if(Auth::user()->level_id < 2)
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> User management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('getAddUser') }}"><i class="fa fa-plus-square" aria-hidden="true"></i> Add User</a>
                                </li>
                                <li>
                                    <a href="{{ route('getListUser') }}"><i class="fa fa-list" aria-hidden="true"></i> List Users</a>
                                    
                                </li>
                            </ul>
                        </li>
                    @endif

                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> News management<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('getAddNews') }}"><i class="fa fa-plus-square" aria-hidden="true"></i> Add News</a>
                            </li>

                            <li>
                                <a href="{{ route('getListNews') }}"><i class="fa fa-list" aria-hidden="true"></i> List News</a>
                                
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('getReport') }}"><i class="fa fa-flag" aria-hidden="true"></i> Report</a>
                        
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">

        <div class="container-fluid">
                
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="col-md-12"><h1 class="page-header">@yield('title')</h1></div>
                    <div class="col-md-12">
                        @include('admin.blocks.flash')
                        @include('admin.blocks.errors')
                    </div>
                </div>
                
            </div>

            <!-- ... Your content goes here ... -->
            
            <div class="row">
               
                @yield('content')
            </div>


        </div>
    </div>

</div>

<!-- jQuery -->
<script src="{{ asset('admin/js/jquery.min.js')}}"></script>

<script src="{{ asset('admin/js/myscript.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('admin/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('admin/js/metisMenu.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('admin/js/startmin.js')}}"></script>

</body>
</html>
