<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>@if(isset($setting)) {{$setting->title}} - @endif @yield('title')</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        @section('css')
        <!-- Basic Css files -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
        @show
    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>


        <!-- Begin page -->

        <div class="accountbg" @if(isset($setting)) style="background: url({{asset('uploads/settings/'.$setting->image)}});" @else style="background: url({{asset('assets/images/bg.jpg')}});" @endif></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-block">

                    <h3 class="text-center m-0">
                        <a href="{{URL::to('/')}}" class="logo logo-admin"><img src="{{asset('assets/images/logo.png')}}" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        @yield('form')
                    </div>

                </div>
            </div>
        </div>

        @section('javascript')
        <!-- jQuery  -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/tether.min.js')}}"></script><!-- Tether for Bootstrap -->
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('assets/js/waves.js')}}"></script>
        <script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>
        @show
    </body>
</html>