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
        <form action="{{route('backend.menues_store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header">
                            <h3 class="card-title">Food Menu</h3>
                        </div>
                        <div class="form-group col-md-9">

                        </div>
                        <div class="card-body">
                            <div class="form-group col-md-9">
                                <label for="food_name">Food Name</label>
                                <input type="text" id="food_name" class="form-control" name="food_name" value="{{ old('food_name') ? old('food_name') : '' }}">
                                @if ($errors->has('food_name'))
                                <span class="text-danger">
                                    {{ $errors->first('food_name') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-9">
                                <label for="food_price">Price</label>
                                <input type="text" id="food_price" class="form-control" name="food_price" value="{{ old('food_price') ? old('food_price') : '' }}">
                                @if ($errors->has('food_price'))
                                <span class="text-danger">
                                    {{ $errors->first('food_price') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-9">
                                <label for="food_category">Category</label>
                                <select id="food_category" name="food_category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($foodMenuCategories as $key => $foodMenuCategory)
                                    <option value="{{$foodMenuCategory->id}}">{{$foodMenuCategory->menu_category}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('food_category_id'))
                                <span class="text-danger">
                                    {{ $errors->first('food_category_id') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-9">
                                <label for="food_description">Description</label>
                                <textarea name="food_description" id="food_description" class="form-control"></textarea>
                                @if($errors->has('food_description'))
                                <span class="text-danger">
                                    {{ $errors->first('food_description') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="form-group col-md-9">
                                <input type="submit" class="btn btn-primary" value="Publish">
                                <a href="{{ route('banners.index') }}" class="btn btn-danger">Cancel</a>
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