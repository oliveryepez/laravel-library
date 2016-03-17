@extends('home')
@section('page_title')
    {{ 'Search User'  }}
@endsection
@section('page_description')
    {{ 'Please type any info of the user that you want search'  }}
@endsection
@section('page_content')
    <form class="search-form" method="post" action="/dashboard/users/search">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <span class="input-group-btn">
                <button type="submit" name="submit" class="btn btn-warning btn-flat">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>

    @if(!empty($users))
      <div class="row">
          <div class="col-xs-12">
              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Users found</h3>
                  </div>
                  <div class="box-body">
                      <div id="userFoundTable" class="dataTables_wrapper form-inline dt-bootstrap">
                          <div class="row"></div>
                          <div class="row">
                              <div class="col-sm-12">
                                  <table id="tbl_users" class="table table-bordered table-striped dataTable" role="grid">
                                      <thead>
                                        <tr role="row">
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Display name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                            $row = 1;
                                        ?>
                                        @foreach($users as $user)
                                            <tr role="row" class="{{ (($row % 2) == 0) ? 'even' : 'odd'   }}">
                                                <td>{{ ucwords($user->first_name)  }}</td>
                                                <td>{{ ucwords($user->last_name)  }}</td>
                                                <td>{{ ucwords($user->display_name)  }}</td>
                                                <td>{{ $user->username  }}</td>
                                                <td>{{ $user->email  }}</td>
                                            </tr>
                                        @endforeach
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    @endif
@endsection