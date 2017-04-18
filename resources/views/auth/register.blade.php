@extends('layouts.app')
@section('pageTitle','Register')
@section('styles')
<link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Register</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Registration Form</h4>

                <form role="form" method="post" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    @if (Session::has('avatar') && Session::has('email'))
                    <div class="form-group row">
                        <label for="avatar" class="col-sm-2 form-control-label">
                            Profile Picture
                        </label>

                        <div class="col-sm-10">
                                <img id="avatar" src="{{ Session::get('avatar') }}" class="rounded float-left" alt="Avatar">
                                <span>Currently logged in with Google.</span>
                            <span>Not your account? <a href="{{ url('/logout') }}">Click here to logout.</a></span>
                        </div>
                    </div>
                        @else
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <a href="{{ url('/auth/google') }}">
                                    <button type="button" class="btn btn-googleplus waves-effect waves-light">
                                        <i class="fa fa-google-plus m-r-5"></i> Sign in with Google
                                    </button>
                                </a>
                            </div>
                        </div>

                    @endif
                    <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email"
                               class="col-sm-2 form-control-label">Email</label>
                        <div class="col-sm-10">
                            <input id="email" type="email" class="form-control" name="email" value="@if(!old('email')) @if (Session::has('email')){{ Session::get('email') }} @endif @else {{ old('email') }} @endif" required autofocus autocomplete="off">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label for="first_name"
                               class="col-sm-2 form-control-label">First Name</label>
                        <div class="col-sm-10">
                            <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label for="last_name"
                               class="col-sm-2 form-control-label">Last Name</label>
                        <div class="col-sm-10">
                            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-sm-2 form-control-label">Password</label>
                        <div class="col-sm-10">
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="off">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password-confirm" class="col-sm-2 form-control-label">Password Confirm</label>
                        <div class="col-sm-10">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="country" class="col-sm-2 form-control-label">Country</label>
                        <div class="col-sm-10">
                            <country></country>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Register</label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script>
        $(".select2").select2();
    </script>
@endsection