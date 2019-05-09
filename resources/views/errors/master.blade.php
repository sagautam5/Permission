<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Permissions @yield('title')</title>
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        @section('css')
            <!-- App Icons -->
            <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

            <!-- C3 charts css -->
            <link href="{{asset('assets/plugins/c3/c3.min.css')}}" rel="stylesheet" type="text/css" />

            <!-- Basic Css files -->
            <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
            <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
            <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
        @show
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">
            

            <!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    @yield('content')
                </div> <!-- content -->

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->
        @section('javascripts')
        <!-- jQuery  -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/tether.min.js')}}"></script><!-- Tether for Bootstrap -->
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('assets/js/waves.js')}}"></script>
        <script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>
        @show
    </body>
</html>