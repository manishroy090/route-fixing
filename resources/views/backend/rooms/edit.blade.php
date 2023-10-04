@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }} | Rooms Add
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                @include('flashMessage.message')
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <form action="{{route('backend.update',$roomToEdit->id)}}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header">
                            <h3 class="card-title">Rooms</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group col-md-9">
                                <label for="room_description">Description</label>
                                <textarea name="room_description" id="room_descriptionn" class="form-control editor" autocomplete="off">{{isset($roomToEdit->room_description) ?  $roomToEdit->room_description : '' }}</textarea>
                                @if($errors->has('room_description'))
                                <span class="text-danger">
                                    {{ $errors->first('room_description') }}
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-9">

                                <label for="room_category_id">Category</label>
                                <select name="room_category_id" class="form-control" id="room_category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($roomCategories as $key=> $roomCategory)
                                    <option value="{{$roomCategory->id}}" {{($roomToEdit->room_category_id == $roomCategory->id) ?  'selected' : ''}}>{{$roomCategory->room_category}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('room_category'))
                                <span class="text-danger">
                                    {{ $errors->first('room_category') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-9">
                                <label for="room_price">Price</label>
                                <input type="text" id="room_price" class="form-control" name="room_price" value="{{$roomToEdit->room_price}}" />
                                @if($errors->has('room_price'))
                                <span class="text-danger">
                                    {{ $errors->first('room_price') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-9">
                                <label for="product_images_preview">Image</label>
                            </div>
                            <div class="form-group col-md-9 mt-5">
                                <img src="{{ (($roomToEdit->room_images != '') && file_exists(public_path('images/rooms/thumb/'.$roomToEdit->room_images))) ? asset('images/rooms/thumb/'.$roomToEdit->room_images) : asset('fallback-logo.png') }}" alt="Banner Image" class="rounded border border-secondary" id="room_image" style="height: 200px;width: 700px;object-fit: contain;">

                            </div>
                            <div class="form-group col-md-9">
                                <div class="form-group col-md-9 ">
                                    <input type="file" name="room_images" onchange="document.getElementById('room_image').src = window.URL.createObjectURL(this.files[0])" accept="image/*">
                                    @if($errors->has('banner_image'))
                                    <span class="text-danger">
                                        {{ $errors->first('banner_image') }}
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group col-md-9">
                                <label for="room_capacity">Room Capacity</label>
                                <input type="number" id="room_capacity" class="form-control" name="room_capacity" value="{{isset($roomToEdit->room_capacity) ?  $roomToEdit->room_capacity : ''}}">
                                @if ($errors->has('room_capacity'))
                                <span class="text-danger">
                                    {{ $errors->first('room_capacity') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-9">
                                <label for="meta_title">Meta Title</label>
                                <input id="meta_title" class="form-control" type="text" name="meta_title" value="{{$roomToEdit->meta_title}}">
                                @if($errors->has('meta_title'))
                                <span class="text-danger">
                                    {{ $errors->first('meta_title') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-9">
                                <label for="meta_keywords">Meta Keywords</label>
                                <input id="meta_keywords" class="form-control" type="text" name="meta_keywords" value="{{isset($roomToEdit->meta_keywords) ? $roomToEdit->meta_keywords : ''}}">
                                @if($errors->has('meta_keywords'))
                                <span class="text-danger">
                                    {{ $errors->first('meta_keywords') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-9">
                                <label for="meta_description">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" class="form-control">{{isset($roomToEdit->meta_description) ? $roomToEdit->meta_description : ''}}</textarea>
                                @if($errors->has('meta_description'))
                                <span class="text-danger">
                                    {{ $errors->first('meta_description') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-9">
                                <label for="about_us_schema">Schema</label>
                                <textarea name="schema" id="schema" class="form-control">{{isset($roomToEdit->schema) ? $roomToEdit->schema : ''}}</textarea>
                                @if($errors->has('schema'))
                                <span class="text-danger">
                                    {{ $errors->first('schema') }}
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Publish">
                                <a href="" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div>
        </form>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection