@extends('errors.master')
@section('title','- Error 404')
@section('css')
    @parent
@endsection

@section('page-title','Error 404')

@section('content')
<div class="page-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card">
                    <div class="card-block">
                        <div class="ex-page-content text-center">
                            <h1 class="">404!</h1>
                            <h3 class=""> {{ $exception->getMessage() ? $exception->getMessage() : 'Sorry, page not found' }}</h3><br/>
                            <a class="btn btn-primary mb-5 waves-effect waves-light" href="{{url('/')}}">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection

@section('javascripts')
    @parent
@endsection