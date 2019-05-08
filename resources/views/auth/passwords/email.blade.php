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
    <form class="form-horizontal m-t-30" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="useremail">Email Address</label>
            <input id="email" type="text" data-parsley-type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row m-t-20">
            <div class="col-12 text-center">
                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Send Password Reset Link</button>
            </div>
        </div>

    </form>
@endsection

@section('javascript')
    @parent
@endsection
