@extends('home')
@section('page_title')
    {{ 'Search Roles'  }}
@endsection
@section('page_description')
    {{ 'Please type any info of the role that you want search'  }}
@endsection
@section('page_content')

    @if($roles)
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header">
                        <h3 class="box-title">System Roles</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px">
                               <input type="text" name="role_search" class="form-control pull-right" placeholder="Search" />
                               <div class="input-group-btn">
                                   <button type="submit" class="btn btn-default">
                                       <i class="fa fa-search"></i>
                                   </button>
                               </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Details</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                @foreach($roles as $role)

                                    <tr>
                                        <td>{{ $role->id  }}</td>
                                        <td>{{ $role->name  }}</td>
                                        <td>{{ $role->details  }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-warning btn-xs">
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-xs">
                                                <i class="fa fa-eraser"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection