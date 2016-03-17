@extends('layouts.master')

@section('title')
    Register
@endsection

@section('content')

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="#">
                <b>Cyberfuel</b>
                Library
            </a>
        </div>
        <div class="register-box-body">
            <p class="login-box-msg">Fill all the info for register a new user</p>
            <form action="/auth/register" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token()  }}">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="first_name" placeholder="First name">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="last_name" placeholder="Last name">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" placeholder="Email address">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8"></div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                </div>
            </form>
            <a href="/auth/login">Already have a account</a>
        </div>
    </div>
</body>

@endsection