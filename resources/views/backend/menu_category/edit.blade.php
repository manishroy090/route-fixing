@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }} | Banner Add
@endsection
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                @include('flashMessage.message')
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <form action="{{route('backend.menucategories_update',$menuCategoryToEdit->id)}}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header">
                            <h3 class="card-title">Banner</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group col-md-9 ">
                                <label for="menu_category">Room Category</label>
                                <input type="text" name="menu_category" id="menu_category" class="form-control" value="{{$menuCategoryToEdit->menu_category}}">
                                @if ($errors->has('menu_category'))
                                <span class="text-danger">
                                    {{ $errors->first('menu_category') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="form-group col-md-9">
                                <input type="submit" class="btn btn-primary" value="Create">
                                <a href="" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>

                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </form>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection