@extends('auth.layouts.master')
@section('title','Password Reset')

@section('css')
    @parent
@endsection

@section('form')

    <h4 class="text-muted font-18 m-b-5 text-center">Password Reset</h4>
    @if (session('status'))
        <p class="alert alert-success">{{ session('status') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    @endif
    <form class="form-horizontal m-t-30" method="POST" action="{{ route('password.request') }}">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <label for="useremail">Email Address</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
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
                <button class="btn btn-primary w-md waves-effect waves-light confirm-submit" type="submit">Reset</button>
            </div>
        </div>
    </form>

@endsection

@section('javascript')
    @parent
@endsection