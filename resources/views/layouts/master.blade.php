<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title') - Permissions Management</title>


@section('css')
	<!-- App Icons -->
		<link href="{{asset('assets/images/favicon.ico')}}" rel="shortcut icon">

		<!-- C3 charts css -->
		<link href="{{asset('assets/plugins/c3/c3.min.css')}}" rel="stylesheet" type="text/css">

		<!-- Basic Css files -->
		<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('assets/style.css')}}" rel="stylesheet" type="text/css">

	<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
	@show()
</head>

<body class="fixed-left">

<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div id="wrapper">
	@section('sidebar')

	@show()
</div>

<!-- Start right Content here -->
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		@include('layouts.header')
		@yield('content')
	</div> <!-- content -->

	@section('footer')
	@show

</div>
<!-- End Right content here -->
@section('javascripts')
	<script>
		var base_url = '{{ url('') }}';

		var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;


		window.Laravel = <?php echo json_encode([
				'csrfToken' => csrf_token(),
		]); ?>

	</script>

	<!-- jQuery  -->

	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/tether.min.js')}}"></script><!-- Tether for Bootstrap -->
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/modernizr.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
	<script src="{{asset('assets/js/waves.js')}}"></script>
	<script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
	<script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>

	<!-- Peity chart JS -->
	<script src="{{asset('assets/plugins/peity-chart/jquery.peity.min.js')}}"></script>

	<!--C3 Chart-->
	<script type="text/javascript" src="{{asset('assets/plugins/d3/d3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/plugins/c3/c3.min.js')}}"></script>

	<!-- KNOB JS -->
	<script src="{{asset('assets/plugins/jquery-knob/excanvas.js')}}"></script>
	<script src="{{asset('assets/plugins/jquery-knob/jquery.knob.js')}}"></script>

    <!-- Alertify js -->
    <script src="{{asset('assets/plugins/alertify/js/alertify.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".confirm-submit").on('click',function(event){
                event.preventDefault();
                var form = $(this).closest('form');
                var confirm = alertify.confirm("Are you sure you want to submit details ?",function (e) {
                    if(e){
                        form.submit();
                    }
                    else{
                        return false;
                    }
                });
            });

        });
    </script>

	<!-- App js -->
	<script src="{{asset('assets/js/app.js')}}"></script>

	<!-- Laravel App -->
	<!-- <script src="{{ asset('js/app.js') }}"></script> -->

@show

</body>
</html>