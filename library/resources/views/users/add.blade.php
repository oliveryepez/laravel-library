@extends('home')

@section('page_title')
    {{ 'Add user' }}
@endsection

@section('page_description')
    {{ 'Fill all the fields for add a new User'  }}
@endsection

@section('page_content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">New User</h3>
        </div>
        <form role="form" action="/dashboard/user/add" method="post">
        <div class="box-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-xs-6">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <select name="role" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{ $role->id  }}">{{ $role->name  }}</option>
                        @endforeach
                    </select>
                </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right">Add user</button>
        </div>
        </form>
    </div>
@endsection