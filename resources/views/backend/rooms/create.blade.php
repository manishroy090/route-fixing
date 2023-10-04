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
        <form action="{{route('backend.rooms_store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header">
                            <h3 class="card-title">Rooms</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="form-group col-md-9">
                                    <label for="room_title">Title</label>
                                    <input id="room_title" class="form-control slug_source" type="text" name="room_title" value="{{isset($aboutRestaurant->room_title) ? $aboutRestaurant->room_title : ''}}">
                                    @if($errors->has('room_title'))
                                    <span class="text-danger">
                                        {{ $errors->first('room_title') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="room_slug">Room Slug</label>
                                    <input id="room_slug" class="form-control slug_field" type="text" name="room_slug" value="{{isset($aboutRestaurant->room_slug) ? $aboutRestaurant->room_slug : ''}}">
                                    @if($errors->has('room_slug'))
                                    <span class="text-danger">
                                        {{ $errors->first('room_slug') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="room_description">Description</label>
                                    <textarea name="room_description" id="room_descriptionn" class="form-control editor" autocomplete="off">{{ old('room_description') ? old('room_description') : '' }}</textarea>
                                    @if($errors->has('room_description'))
                                    <span class="text-danger">
                                        {{ $errors->first('room_description') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-9">
                                    <label for="room_category">Category</label>
                                    <select id="room_category" name="room_category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($roomCategories as $roomcategory)
                                        <option value="{{$roomcategory->id}}">{{$roomcategory->room_category}}</option>
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
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Rs</span>
                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="room_price" value="">
                                    </div>
                                    @if($errors->has('room_price'))
                                    <span class="text-danger">
                                        {{ $errors->first('room_price') }}
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-9">
                                    <img src="{{(($banners->banner_image ?? '' != '' ) && file_exists(public_path('images/aboutus/thumb/'.$banners->banner_image))) ? asset('images/aboutus/thumb/'.$banners->banner_image) : getFallBackImage(586, 458, 'default') }}" alt="About Image" class=" rounded img-fluid" id="room_image_preview">
                                </div>

                                <div class="card-body">
                                    <div class="form-group col-md-9 ">
                                        <input type="file" name="room_images" id="room_images" class="form-control file_video_upload" onchange="showPreview(event,'room_image_preview','1903','485')" \>
                                        @if ($errors->has('room_images'))
                                        <span class="text-danger">
                                            {{ $errors->first('room_images') }}
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label for="room_capacity">Room Capacity</label>
                                        <input type="number" id="room_capacity" class="form-control" name="room_capacity" value="{{ old('room_capacity') ? old('room_capacity') : '' }}">
                                        @if ($errors->has('room_capacity'))
                                        <span class="text-danger">
                                            {{ $errors->first('room_capacity') }}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="meta_title">Meta Title</label>
                                        <input id="meta_title" class="form-control" type="text" name="meta_title">
                                        @if($errors->has('meta_title'))
                                        <span class="text-danger">
                                            {{ $errors->first('meta_title') }}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <input id="meta_keywords" class="form-control" type="text" name="meta_keywords">
                                        @if($errors->has('meta_keywords'))
                                        <span class="text-danger">
                                            {{ $errors->first('meta_keywords') }}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea name="meta_description" id="meta_description" class="form-control"></textarea>
                                        @if($errors->has('meta_description'))
                                        <span class="text-danger">
                                            {{ $errors->first('meta_description') }}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="about_us_schema">Schema</label>
                                        <textarea name="schema" id="schema" class="form-control"></textarea>
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