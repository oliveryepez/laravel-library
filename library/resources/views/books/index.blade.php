@extends('home')
@section('page_title')
    {{ 'Books'  }}
@endsection
@section('page_description')
    {{ 'Books system administration'  }}
@endsection
@section('page_content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <form action="/dashboard/books" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-header">
                        <h3 class="box-title">Books table</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 250px">

                                <div class="input-group-btn">
                                    <button type="button" id="btn_add_book" class="btn btn-success pull-right" data-toggle="modal" data-backdrop="false" data-target="#mdl_add_role">
                                        <i class="fa fa-plus"></i>
                                        Add Book
                                    </button>
                                </div>
                                <input type="text" name="books_search" class="form-control pull-right" placeholder="Search" />
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection