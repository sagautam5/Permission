@extends('layouts.master')

@section('title', 'Dashboard')

@section('css')
    @parent
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('page-title','Dashboard')

@section('content')
    <!--==================
    PAGE CONTENT START
    ================== -->

    <div class="page-content-wrapper">

        <div class="container">
            @include('common.partials.errors')
            <div class="row">

            </div>
        </div><!-- container -->

    </div> <!-- Page content Wrapper -->
@endsection

@section('footer')
    @include('layouts.footer')
@endsection

@section('javascripts')
    @parent
    <!-- Page specific js -->
    <script src="{{asset('assets/pages/dashboard.js')}}"></script>
@endsection