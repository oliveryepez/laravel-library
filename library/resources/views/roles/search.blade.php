@extends('home')
@section('page_title')
    {{ 'Search Roles'  }}
@endsection
@section('page_description')
    {{ 'Please type any info of the role that you want search'  }}
@endsection
@section('page_content')

    <div class="modal fade modal-danger" id="mdl_confirm_delete" role="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h3 class="modal-title">Deleting role</h3>
                </div>
                <div class="modal-body" id="delete_confirmation">
                    <h3>Are you sure that you want to delete the <b id="lbl_role_name"></b> Role?: </h3>

                </div>
                <div class="modal-body loading-img text-center" id="loading_spinner" style="display: none;">
                    <i class="fa fa-circle-o-notch fa-spin fa-2x"></i>
                    Loading
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_cancel_delete" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" id="btn_delete_role" class="btn btn-success">Delete Role</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mdl_add_role" role="modal">
        <form role="form" id="frm_add_role">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="modal-title">Add role</h3>
                    </div>
                    <div class="modal-body" id="form_elements">
                        <div class="form-group">
                            <input type="text" class="form-control" name="new_name" id="new_name" placeholder="Enter Role Name" />
                        </div>
                        <div class="form-group">
                            <textarea name="new_details" id="new_details" rows="3" class="form-control" placeholder="Enter Role details"></textarea>
                        </div>
                    </div>
                    <div class="modal-body loading-img text-center" id="loading_spinner" style="display: none;">
                        <i class="fa fa-circle-o-notch fa-spin fa-2x"></i>
                        Loading
                    </div>
                    <div class="modal-footer">
                        <div id="form_buttons">
                            <button type="button" id="btn_cancel_add_role" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" id="btn_add_role" class="btn btn-success">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @if(!empty($roles))
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form action="/dashboard/role/search" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-header">
                            <h3 class="box-title">System Roles</h3>
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 250px">

                                    <div class="input-group-btn">
                                        <button type="button" id="btn_add_role" class="btn btn-success pull-right" data-toggle="modal" data-backdrop="false" data-target="#mdl_add_role">
                                            <i class="fa fa-plus"></i>
                                            Add Role
                                        </button>
                                    </div>
                                        <input type="text" name="role_search" class="form-control pull-right" placeholder="Search" />
                                        <div class="input-group-btn">
                                           <button type="submit" class="btn btn-default">
                                               <i class="fa fa-search"></i>
                                           </button>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </form>

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
                                    <tr id="{{ "role_info_" . $role->id  }}" data-row="row_display">
                                        <td>{{ $role->id  }}</td>
                                        <td>{{ ucfirst($role->name) }}</td>
                                        <td>{{ $role->details  }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-warning btn-xs" id="ln_edit_role">
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-xs" id="ln_delete_role" data-id="{{ $role->id }}" data-name="{{ $role->name }}">
                                                <i class="fa fa-eraser"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <tr id="{{ "frm_role_" . $role->id  }}" style="display: none">
                                        <td>{{ $role->id  }}</td>
                                        <td>
                                            <input type="text" class="form-control" name="role_name_{{ $role->id  }}" id="role_name_{{ $role->id  }}"
                                                   style="width: 200px;" value="{{ $role->name  }}">
                                        </td>
                                        <td>
                                            <textarea name="role_details" style="width: 250px" rows="3" class="form-control" id="role_details_{{ $role->id  }}">{{ $role->details }}</textarea>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-success btn-xs" id="btn_save_role_info" data-id="{{ $role->id  }}">
                                                <i class="fa fa-check"></i>
                                                Save
                                            </a>
                                            <a class="btn btn-danger btn-xs" id="btn_cancel_role_info" >
                                                <i class="fa fa-close"></i>
                                                Cancel
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

@section('js_scripts')
    <script type="text/javascript">

        $('#mdl_confirm_delete').modal({
                show: false,
                keyboard: false,
                backdrop: false
                })

        /**
         * Add new Role
         */

        $('#frm_add_role').submit(function(e){

            e.preventDefault();

            var name = $('#new_name').val();
            var details = $('#new_details').val();

            $('#form_elements').remove();
            $('#form_buttons').remove();
            $('#loading_spinner').show();

            $.ajax({
                type: "POST",
                url: '/dashboard/role/add',
                data:{
                    _token: $('meta[name=csrf-token]').attr('content'),
                    name: name,
                    details: details
                },
                success: function(response) {
                    setInterval(function() {
                        window.location.reload();
                    }, 5900);
                }
            }, "json");
        });


        /**
         * Handle Edit role button
         * @type
        */


        var lnkEdit = {

            onClick: function(){
                var links = $('a#ln_edit_role');

                $(links).each(function(link){

                    $(this).click(function(){
                        $('#role_info_' + (link + 1)).hide();
                        $('#frm_role_' + (link + 1)).show();
                    });
                });
            },

            onSave: function(){
                var links = $('a#btn_save_role_info');

                $(links).each(function(link){

                    var role_id = $(this).data('id');

                    $(this).click(function(){

                        $.ajax({
                            type: "POST",
                            url: '/dashboard/role/edit',
                            data:{
                                _token: $('meta[name=csrf-token]').attr('content'),
                                id:role_id,
                                name:$('#role_name_' + role_id).val(),
                                details:$('#role_details_' + role_id).val()
                            },
                            success: function (response) {
                                console.log(response);
                            }
                        }, "json");
                    });
                });
            },

            onCancel: function(){
                var cancel_links = $('a#btn_cancel_role_info');

                $(cancel_links).each(function(link){
                    $(this).click(function(){
                        $('#role_info_' + (link + 1)).show();
                        $('#frm_role_' + (link + 1)).hide();
                    });
                });
            },
        };

        lnkEdit.onClick();
        lnkEdit.onSave();
        lnkEdit.onCancel();


        /**
         * Handle Delete role button
         */
        var lnkDelete ={

            onClick: function(){

                var links = $('a#ln_delete_role');

                $(links).each(function(){
                    $(this).click(function(){

                        var role_id =   $(this).data('id');
                        var role_name = $(this).data('name');

                        $('#lbl_role_name').html(role_name);
                        $('#mdl_confirm_delete').modal('show');

                        $('#btn_delete_role').click(function(){

                            $('#delete_confirmation').remove();
                            $('#form_buttons').remove();
                            $('#loading_spinner').show();

                            $.ajax({
                                type: "POST",
                                url: '/dashboard/role/delete',
                                data:{
                                    _token: $('meta[name=csrf-token]').attr('content'),
                                    id:role_id,
                                },
                                success: function (response) {
                                    setInterval(function() {
                                        window.location.reload();
                                    }, 5900);
                                }
                            }, 'json');
                        });

                    });
                });
            }
        };

        lnkDelete.onClick();
    </script>
@endsection