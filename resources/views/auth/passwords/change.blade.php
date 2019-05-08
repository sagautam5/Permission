@extends('auth.layouts.master')
@section('title','Change Password')

@section('css')
    @parent
@endsection

@section('form')
    <h4 class="text-muted font-18 m-b-5 text-center">Change Password</h4>
    @if (session('status'))
        <p class="alert alert-success">{{ session('status') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    @endif
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
    @endforeach
    <form class="form-horizontal m-t-30" method="POST" action="{{url('password/change')}}">
        {{ csrf_field() }}
        
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input id="current_password" type="password" class="form-control" name="current_password" required placeholder="Enter Password">
            @if ($errors->has('current_password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" name="password" required placeholder="Enter at least 6 Character" data-parsley-minlength="6">
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password" data-parsley-equalto="#password">
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <div class="col-12 text-center">
                <button class="btn btn-primary w-md waves-effect waves-light confirm-submit" type="submit">Submit</button>
            </div>
        </div>
    </form>
@endsection

@section('javascript')
    @parent
@endsection