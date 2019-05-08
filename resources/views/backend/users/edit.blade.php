@extends('layouts.master')
@section('title','Edit User')
@section('css')
    @parent
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('page-title','Edit User')

@section('content')
    <div class="page-content-wrapper">
        <div class="container">
            @include('common.partials.errors')
            <div class="row">
                <div class="col-lg-6">
                    <div class="card m-b-20">
                        <div class="card-block">
                            <form class="" action="{{route('users.update',$user->id)}}" method="POST">
                                <input type="text" name="_method" value="PATCH" style="display: none;">
                                @include('backend.users.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('layouts.footer')
@endsection

@section('javascripts')
    @parent

    <!-- Plugins js -->
    <script src="{{asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('assets/pages/form-advanced.js')}}"></script>

    <!-- Parsley js -->
    <script type="text/javascript" src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var form = $('form').parsley();

        });
    </script>
@endsection
