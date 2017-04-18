@extends('layouts.app')
@section('pageTitle','Login')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Login</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Login Form</h4>

                <form role="form" method="post" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <a href="{{ url('/auth/google') }}">
                                <button type="button" class="btn btn-googleplus waves-effect waves-light">
                                    <span class="btn-label"><i class="fa fa-google-plus"></i></span>Sign in with Google
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="inputEmail3"
                               class="col-sm-2 form-control-label">Email</label>
                        <div class="col-sm-10">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="inputPassword3" class="col-sm-2 form-control-label">Password</label>
                        <div class="col-sm-10">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Remember</label>
                        <div class="col-sm-10">
                            <div class="checkbox checkbox-primary">
                                <input id="rememberMe" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="rememberMe">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 form-control-label">Login</label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
