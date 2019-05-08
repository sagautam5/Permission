@extends('layouts.master')
@section('title','Edit Role')
@section('css')
    @parent
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('page-title','Edit Role')

@section('content')
    <div class="page-content-wrapper">
        <div class="container">
            @include('common.partials.errors')
            <div class="row">
                <div class="col-lg-6">
                    <div class="card m-b-20">
                        <div class="card-block">
                            <form class="" action="{{route('roles.update',$role->id)}}" method="POST">
                                <input type="text" name="_method" value="PATCH" style="display: none;">
                                @include('backend.roles.form')
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
    <!-- Parsley js -->
    <script type="text/javascript" src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var form = $('form').parsley();
        });
    </script>
@endsection

