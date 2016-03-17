@extends('layouts.master')

@section('title')
    Login
@endsection

@section('content')
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#">
                    <b>Cyberfuel</b>
                    Library
                </a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Add your email and password to start a session</p>
                <form action="/auth/login" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="email" value="{{ old('email')  }}" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                </form>
                <a href="#">I forgot my password</a>
                <br>
                <a href="/auth/register" class="text-center">Register a new user</a>
            </div>
        </div>
    </body>
@endsection
