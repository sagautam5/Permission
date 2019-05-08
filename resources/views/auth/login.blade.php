@extends('auth.layouts.master')
@section('title','Sign In')

@section('css')
    @parent
@endsection

@section('form')
<p class="text-center">Sign in @if(isset($setting)) to {{$setting->title}}@endif</p>
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    @endif
@endforeach

    <form class="form-horizontal m-t-30 " id="login-form" method="POST" action="{{ route('login') }}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="username">Email</label>
            <input type="text" data-parsley-type="email" name="email" class="form-control" id="username" placeholder="Enter username" required value="{{old('email')}}">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="userpassword">Password</label>
            <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row m-t-20">
            <div class="col-sm-6">
                <label class="custom-control mt-2 custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                    <input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Remember me</span>
                </label>
            </div>
            <div class="col-sm-6 text-right">
                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
            </div>
        </div>

        <div class="form-group m-t-10 mb-0 row">
            <div class="col-12 m-t-20 text-center">
                <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock    "></i> Forgot your password ?</a>
            </div>
        </div>
    </form>
@endsection

@section('javascript')
    @parent
@endsection