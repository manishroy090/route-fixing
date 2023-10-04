@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }} | About Us
@endsection
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                @include('flashMessage.message')
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <form action="{{route('backend.restaurant_update')}}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header">
                            <h3 class="card-title">About Restaurent</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group col-md-9">
                                <label for="restaurent_title">Title</label>
                                <input id="restaurent_title" class="form-control" type="text" name="restaurent_title" value="{{isset($aboutRestaurant->restaurent_title) ? $aboutRestaurant->restaurent_title : ''}}">
                                @if($errors->has('restaurent_title'))
                                <span class="text-danger">
                                    {{ $errors->first('restaurent_title') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-9">
                                <label for="restaurent_description">Description</label>
                                <textarea name="restaurent_description" id="restaurent_description" class="form-control editor">{{isset($aboutRestaurant->restaurent_description) ? $aboutRestaurant->restaurent_description : ''}}</textarea>
                                @if($errors->has('restaurent_description'))
                                <span class="text-danger">
                                    {{ $errors->first('restaurent_description') }}
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-9">
                            <img src="{{(($aboutRestaurant->restaurent_images ?? ''   != '' ) && file_exists(public_path('images/restaurent/thumb/'.$aboutRestaurant->restaurent_images))) ? asset('images/restaurent/thumb/'.$aboutRestaurant->restaurent_images) : getFallBackImage(586, 458, 'default') }}" alt="About Image" class=" rounded img-fluid" id="restaurent_images_preview">
                        </div>

                        <div class="card-body">
                            <div class="form-group col-md-9 ">
                                <input type="file" name="restaurent_images" id="restaurent_images" class="form-control file_video_upload" onchange="showPreview(event,'restaurent_images_preview','1903','485')" \>
                                @if ($errors->has('restaurent_images'))
                                <span class="text-danger">
                                    {{ $errors->first('restaurent_images') }}
                                </span>
                                @endif
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Update">
                                <a href="#" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
@endsection